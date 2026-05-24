import configparser
import os
import re
from typing import Iterable, List

import mysql.connector
from mysql.connector import Error

POLISH_LETTERS = "aąbcćdeęfghijklłmnńoópqrsśtuvwxyzźż"
POLISH_LETTER_SET = set(POLISH_LETTERS)
WORD_RE = re.compile(r"[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+", re.UNICODE)
SENTENCE_SPLIT_RE = re.compile(r"(?<=[.!?…])\s+|\n+")
IDENT_RE = re.compile(r"^[A-Za-z_][A-Za-z0-9_]*$")


def load_config(path: str = "letter_counter.config") -> configparser.ConfigParser:
    config = configparser.ConfigParser()
    loaded = config.read(path, encoding="utf-8")
    if not loaded:
        raise FileNotFoundError(f"Nie znaleziono pliku konfiguracyjnego: {path}")
    return config


def normalize_word(word: str) -> str:
    word = word.lower()
    return "".join(ch for ch in word if ch in POLISH_LETTER_SET)


def split_into_sentences(text: str) -> List[str]:
    parts = SENTENCE_SPLIT_RE.split(text)
    return [part.strip() for part in parts if part.strip()]


def extract_words(sentence: str) -> List[str]:
    return [normalize_word(match.group(0)) for match in WORD_RE.finditer(sentence)]


def iter_txt_files(folder: str) -> Iterable[str]:
    for root, _, files in os.walk(folder):
        for file_name in sorted(files):
            if file_name.lower().endswith(".txt"):
                yield os.path.join(root, file_name)


def validate_identifier(value: str, label: str) -> str:
    if not IDENT_RE.match(value):
        raise ValueError(f"Niepoprawna nazwa {label}: {value}")
    return value


def connect_mysql_server(config: configparser.ConfigParser):
    return mysql.connector.connect(
        host=config.get("mysql", "host", fallback="127.0.0.1"),
        port=config.getint("mysql", "port", fallback=3306),
        user=config.get("mysql", "user"),
        password=config.get("mysql", "password", fallback=""),
        charset=config.get("mysql", "charset", fallback="utf8mb4"),
        use_unicode=True,
        autocommit=False,
    )


def connect_mysql_database(config: configparser.ConfigParser):
    return mysql.connector.connect(
        host=config.get("mysql", "host", fallback="127.0.0.1"),
        port=config.getint("mysql", "port", fallback=3306),
        user=config.get("mysql", "user"),
        password=config.get("mysql", "password", fallback=""),
        database=config.get("mysql", "database"),
        charset=config.get("mysql", "charset", fallback="utf8mb4"),
        use_unicode=True,
        autocommit=False,
    )


def ensure_database(config: configparser.ConfigParser) -> None:
    db_name = validate_identifier(
        config.get("mysql", "database", fallback="sylaby_db"),
        "bazy danych"
    )
    charset = config.get("mysql", "charset", fallback="utf8mb4")

    connection = connect_mysql_server(config)
    try:
        cursor = connection.cursor()
        try:
            cursor.execute(
                f"CREATE DATABASE IF NOT EXISTS `{db_name}` CHARACTER SET {charset} COLLATE utf8mb4_polish_ci"
            )
            connection.commit()
        finally:
            cursor.close()
    finally:
        connection.close()


def ensure_table(cursor, table_name: str) -> None:
    cursor.execute(f'''
        CREATE TABLE IF NOT EXISTS `{table_name}` (
            znak VARCHAR(4) NOT NULL,
            wystapienia BIGINT NOT NULL DEFAULT 0,
            PRIMARY KEY (znak)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci
    ''')


def upsert_letter(cursor, table_name: str, letter: str) -> None:
    cursor.execute(
        f'''
        INSERT INTO `{table_name}` (znak, wystapienia)
        VALUES (%s, 1)
        ON DUPLICATE KEY UPDATE wystapienia = wystapienia + 1
        ''',
        (letter,)
    )


def process_file(connection, table_name: str, file_path: str, commit_every: int) -> tuple[int, int, int]:
    sentence_count = 0
    word_count = 0
    letter_count = 0
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
                for letter in word:
                    if letter not in POLISH_LETTER_SET:
                        continue
                    upsert_letter(cursor, table_name, letter)
                    letter_count += 1
                    operations += 1
                    if commit_every > 0 and operations % commit_every == 0:
                        connection.commit()

        connection.commit()
    finally:
        cursor.close()

    return sentence_count, word_count, letter_count


def main() -> None:
    config = load_config()
    sample_dir = config.get("paths", "sample_dir", fallback="próbka")
    table_name = validate_identifier(
        config.get("mysql", "table_name", fallback="litery"),
        "tabeli"
    )
    reset_table = config.getboolean("mysql", "reset_table", fallback=False)
    commit_every = config.getint("mysql", "commit_every", fallback=1000)

    if not os.path.isdir(sample_dir):
        raise NotADirectoryError(f"Folder z próbką nie istnieje: {sample_dir}")

    files = list(iter_txt_files(sample_dir))
    if not files:
        raise FileNotFoundError(f"Nie znaleziono plików .txt w folderze: {sample_dir}")

    ensure_database(config)
    connection = connect_mysql_database(config)

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
        total_letters = 0

        for file_path in files:
            sentences, words, letters = process_file(connection, table_name, file_path, commit_every)
            total_sentences += sentences
            total_words += words
            total_letters += letters
            print(f"Przetworzono: {file_path} | zdania={sentences}, słowa={words}, litery={letters}")

        print("\nGotowe.")
        print(f"Plików: {len(files)}")
        print(f"Zdań: {total_sentences}")
        print(f"Słów: {total_words}")
        print(f"Liter: {total_letters}")
        print(f"Tabela MySQL: {table_name}")
    except Error as e:
        raise RuntimeError(f"Błąd MySQL: {e}") from e
    finally:
        connection.close()


if __name__ == "__main__":
    main()