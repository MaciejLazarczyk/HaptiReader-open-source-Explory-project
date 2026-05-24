import re
from pathlib import Path

INPUT_DIR = Path('Do konwersji')
OUTPUT_DIR = Path('Przekonwertowane')

MAPPING = [
    (0, ' ', '000000'),
    (1, 'a', '100000'),
    (2, 'ą', '100001'),
    (3, 'b', '110000'),
    (4, 'c', '100100'),
    (5, 'ć', '000001'),
    (6, 'd', '100110'),
    (7, 'e', '100010'),
    (8, 'ę', '100011'),
    (9, 'f', '110100'),
    (10, 'g', '110110'),
    (11, 'h', '110010'),
    (12, 'i', '010100'),
    (13, 'j', '010110'),
    (14, 'k', '101000'),
    (15, 'l', '111000'),
    (16, 'ł', '110001'),
    (17, 'm', '101100'),
    (18, 'n', '101110'),
    (19, 'ń', '100111'),
    (20, 'o', '101010'),
    (21, 'ó', '011001'),
    (22, 'p', '111100'),
    (23, 'q', '111110'),
    (24, 'r', '111010'),
    (25, 's', '011100'),
    (26, 'ś', '001101'),
    (27, 't', '011110'),
    (28, 'u', '101001'),
    (29, 'v', '111001'),
    (30, 'w', '010111'),
    (31, 'x', '101101'),
    (32, 'y', '101111'),
    (33, 'z', '101011'),
    (34, 'ź', '001011'),
    (35, 'ż', '011111'),
    (36, 'ni', '001110'),
    (37, 'si', '011101'),
    (38, 'ał', '100101'),
    (39, 'na', '111111'),
    (40, 'em', '000010'),
    (41, 'ki', '001000'),
    (42, 'ci', '000100'),
    (43, 'zi', '111011'),
    (44, 'wi', '110111'),
    (45, 'ej', '110011'),
    (46, 'że', '011011'),
    (47, 'od', '001010'),
    (48, 'ow', '011010'),
    (49, 'pan', '111101'),
    (50, 'al', '010000'),
    (51, 'to', '011000'),
    (52, 'mi', '001100'),
    (53, 'jak', '010010'),
    (54, 'an', '110101'),
    (55, 'do', '000110'),
    (56, 'ze', '001111'),
    (57, 'on', '001001'),
    (58, 'eg', '000011'),
    (59, 'er', '010011'),
    (60, 'zy', '000111'),
    (61, 'ił', '010101'),
    (62, 'en', '010001'),
    (63, 'za', '000101'),
]


def ask_compression_level() -> int:
    while True:
        raw = input('Podaj poziom kompresji (36-63): ').strip()
        if raw.isdigit():
            value = int(raw)
            if 36 <= value <= 63:
                return value
        print('Błędna wartość. Wpisz liczbę od 36 do 63.')


def build_active_mapping(level: int):
    active = [(token.lower(), binary) for idx, token, binary in MAPPING if idx <= level]
    active.sort(key=lambda x: len(x[0]), reverse=True)
    return active, {token: binary for token, binary in active}


def normalize_text(text: str) -> str:
    text = text.lower().replace('\r\n', '\n').replace('\r', '\n')
    text = text.replace('\u00a0', ' ')
    return text


def encode_text(text: str, active_list, active_dict) -> str:
    text = normalize_text(text)
    parts = []
    i = 0
    while i < len(text):
        matched = False
        for token, binary in active_list:
            if text.startswith(token, i):
                parts.append(binary)
                i += len(token)
                matched = True
                break
        if matched:
            continue
        ch = text[i]
        if ch in active_dict:
            parts.append(active_dict[ch])
        i += 1
    return ''.join(parts)


def extract_txt(path: Path) -> str:
    return path.read_text(encoding='utf-8', errors='ignore')


def extract_pdf(path: Path) -> str:
    from pypdf import PdfReader
    reader = PdfReader(str(path))
    return '\n'.join(page.extract_text() or '' for page in reader.pages)


def extract_epub(path: Path) -> str:
    from ebooklib import epub
    from bs4 import BeautifulSoup
    book = epub.read_epub(str(path))
    chunks = []
    for item in book.get_items():
        if item.get_type() == 9:
            soup = BeautifulSoup(item.get_content(), 'html.parser')
            chunks.append(soup.get_text(' ', strip=True))
    return '\n'.join(chunks)


def extract_text(path: Path) -> str:
    suffix = path.suffix.lower()
    if suffix == '.txt':
        return extract_txt(path)
    if suffix == '.pdf':
        return extract_pdf(path)
    if suffix == '.epub':
        return extract_epub(path)
    raise ValueError(f'Nieobsługiwany format: {path.suffix}')


def main():
    level = ask_compression_level()
    active_list, active_dict = build_active_mapping(level)
    INPUT_DIR.mkdir(exist_ok=True)
    OUTPUT_DIR.mkdir(exist_ok=True)
    files = sorted([p for p in INPUT_DIR.iterdir() if p.is_file() and p.suffix.lower() in {'.txt', '.pdf', '.epub'}])
    if not files:
        print("Brak plików w folderze 'Do konwersji'.")
        return
    for path in files:
        try:
            text = extract_text(path)
            encoded = encode_text(text, active_list, active_dict)
            output_path = OUTPUT_DIR / f'{path.stem}.txt'
            output_path.write_text(encoded, encoding='utf-8')
            print(f'Przekonwertowano: {path.name} -> {output_path.name}')
        except Exception as exc:
            print(f'Błąd dla pliku {path.name}: {exc}')


if __name__ == '__main__':
    main()
