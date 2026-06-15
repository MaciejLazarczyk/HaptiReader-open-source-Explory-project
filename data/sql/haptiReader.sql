DROP DATABASE IF EXISTS haptireader;
CREATE DATABASE haptireader
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_polish_ci;
USE haptireader;

CREATE TABLE braille_pl (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    litera VARCHAR(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
    punkty VARCHAR(6) NOT NULL,
    binarnie CHAR(6) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uq_braille_litera (litera)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

INSERT INTO braille_pl (litera, punkty, binarnie) VALUES
('a',  '1',     '100000'),
('ą',  '16',    '100001'),
('b',  '12',    '110000'),
('c',  '14',    '100100'),
('ć',  '146',   '100110'),
('d',  '145',   '100110'),
('e',  '15',    '100010'),
('ę',  '156',   '100011'),
('f',  '124',   '110100'),
('g',  '1245',  '110110'),
('h',  '125',   '110010'),
('i',  '24',    '010100'),
('j',  '245',   '010110'),
('k',  '13',    '101000'),
('l',  '123',   '111000'),
('ł',  '126',   '110001'),
('m',  '134',   '101100'),
('n',  '1345',  '101110'),
('ń',  '1456',  '100111'),
('o',  '135',   '101010'),
('ó',  '236',   '011001'),
('p',  '1234',  '111100'),
('q',  '12345', '111110'),
('r',  '1235',  '111010'),
('s',  '234',   '011100'),
('ś',  '346',   '001101'),
('t',  '2345',  '011110'),
('u',  '136',   '101001'),
('v',  '1236',  '111001'),
('w',  '2456',  '010111'),
('x',  '1346',  '101101'),
('y',  '13456', '101111'),
('z',  '1356',  '101011'),
('ź',  '356',   '001011'),
('ż',  '23456', '011111');