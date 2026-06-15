import configparser
import os
import re
from typing import Iterable, List

import mysql.connector
from mysql.connector import Error

POLISH_LETTERS = "aąbcćdeęfghijklłmnńoópqrsśtuvwxyzźż"
VOWELS = set("aąeęiouóy")
WORD_RE = re.compile(r"[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+", re.UNICODE)
SENTENCE_SPLIT_RE = re.compile(r"(?<=[.!?…])\s+|\n+")
IDENT_RE = re.compile(r"^[A-Za-z_][A-Za-z0-9_]*$")


def load_config(path: str = "syllable_counter.config") -> configparser.ConfigParser:
    config = configparser.ConfigParser()
    loaded = config.read(path, encoding="utf-8")
    if not loaded:
        raise FileNotFoundError(f"Nie znaleziono pliku konfiguracyjnego: {path}")
    return config


def normalize_word(word: str) -> str:
    word = word.lower()
    return "".join(ch for ch in word if ch in POLISH_LETTERS)


def split_into_sentences(text: str) -> List[str]:
    parts = SENTENCE_SPLIT_RE.split(text)
    return [part.strip() for part in parts if part.strip()]


def extract_words(sentence: str) -> List[str]:
    return [normalize_word(match.group(0)) for match in WORD_RE.finditer(sentence)]


def syllabify_polish(word: str) -> List[str]:
    word = normalize_word(word)
    if not word:
        return []

    vowel_positions = [i for i, ch in enumerate(word) if ch in VOWELS]
    if not vowel_positions:
        return []
    if len(vowel_positions) == 1:
        return [word]

    syllables = []
    start = 0
    for idx in range(len(vowel_positions) - 1):
        current_vowel = vowel_positions[idx]
        next_vowel = vowel_positions[idx + 1]
        consonant_cluster = word[current_vowel + 1:next_vowel]

        if len(consonant_cluster) <= 1:
            split_at = next_vowel
        else:
            split_at = next_vowel - 1

        syllables.append(word[start:split_at])
        start = split_at

    syllables.append(word[start:])
    return [s for s in syllables if s]


def iter_txt_files(folder: str) -> Iterable[str]:
    for root, _, files in os.walk(folder):
        for file_name in sorted(files):
            if file_name.lower().endswith(".txt"):
                yield os.path.join(root, file_name)


def validate_identifier(value: str, label: str) -> str:
    if not IDENT_RE.match(value):
        raise ValueError(f"Niepoprawna nazwa {label}: {value}")
    return value


def connect_mysql(config: configparser.ConfigParser):
    return mysql.connector.connect(
        host=config.get("mysql", "host", fallback="127.0.0.1"),
        port=config.getint("mysql", "port", fallback=3306),
        user=config.get("mysql", "user"),
        password=config.get("mysql", "password"),
        database=config.get("mysql", "database"),
        charset=config.get("mysql", "charset", fallback="utf8mb4"),
        use_unicode=True,
        autocommit=False,
    )


def ensure_table(cursor, table_name: str) -> None:
    cursor.execute(f'''
        CREATE TABLE IF NOT EXISTS `{table_name}` (
            sylaba VARCHAR(64) NOT NULL,
            wystapienia BIGINT NOT NULL DEFAULT 0,
            PRIMARY KEY (sylaba)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci
    ''')


def upsert_syllable(cursor, table_name: str, syllable: str) -> None:
    cursor.execute(
        f'''
        INSERT INTO `{table_name}` (sylaba, wystapienia)
        VALUES (%s, 1)
        ON DUPLICATE KEY UPDATE wystapienia = wystapienia + 1
        ''',
        (syllable,)
    )


def process_file(connection, table_name: str, file_path: str, commit_every: int) -> tuple[int, int, int]:
    sentence_count = 0
    word_count = 0
    syllable_count = 0
    operations = 0

    with open(file_path, "r", encoding="utf-8") as f:
        text = f.read()

    cursor = connection.cursor()
    try:
        for sentence in split_into_sentences(text):
            sentence_count += 1
            for word in extract_words(sentence):
                if not word:
                    continue
                word_count += 1
                syllables = syllabify_polish(word)
                for syllable in syllables:
                    upsert_syllable(cursor, table_name, syllable)
                    syllable_count += 1
                    operations += 1
                    if commit_every > 0 and operations % commit_every == 0:
                        connection.commit()

        connection.commit()
    finally:
        cursor.close()

    return sentence_count, word_count, syllable_count


def main() -> None:
    config = load_config()
    sample_dir = config.get("paths", "sample_dir", fallback="próbka")
    table_name = validate_identifier(config.get("mysql", "table_name", fallback="sylaby"), "tabeli")
    reset_table = config.getboolean("mysql", "reset_table", fallback=False)
    commit_every = config.getint("mysql", "commit_every", fallback=1000)

    if not os.path.isdir(sample_dir):
        raise NotADirectoryError(f"Folder z próbką nie istnieje: {sample_dir}")

    files = list(iter_txt_files(sample_dir))
    if not files:
        raise FileNotFoundError(f"Nie znaleziono plików .txt w folderze: {sample_dir}")

    connection = connect_mysql(config)
    try:
        cursor = connection.cursor()
        try:
            ensure_table(cursor, table_name)
            if reset_table:
                cursor.execute(f"TRUNCATE TABLE `{table_name}`")
            connection.commit()
        finally:
            cursor.close()

        total_sentences = 0
        total_words = 0
        total_syllables = 0

        for file_path in files:
            sentences, words, syllables = process_file(connection, table_name, file_path, commit_every)
            total_sentences += sentences
            total_words += words
            total_syllables += syllables
            print(f"Przetworzono: {file_path} | zdania={sentences}, słowa={words}, sylaby={syllables}")

        print("\nGotowe.")
        print(f"Plików: {len(files)}")
        print(f"Zdań: {total_sentences}")
        print(f"Słów: {total_words}")
        print(f"Sylab: {total_syllables}")
        print(f"Tabela MySQL: {table_name}")
    except Error as e:
        raise RuntimeError(f"Błąd MySQL: {e}") from e
    finally:
        connection.close()


if __name__ == "__main__":
    main()