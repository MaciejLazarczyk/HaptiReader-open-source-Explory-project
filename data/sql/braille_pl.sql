-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 24, 2026 at 12:56 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haptireader`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `braille_pl`
--

CREATE TABLE `braille_pl` (
  `id` int(10) UNSIGNED NOT NULL,
  `litera` varchar(5) NOT NULL,
  `punkty` varchar(6) NOT NULL,
  `binarnie` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `braille_pl`
--

INSERT INTO `braille_pl` (`id`, `litera`, `punkty`, `binarnie`) VALUES
(1, 'a', '1', '100000'),
(2, 'ą', '16', '100001'),
(3, 'b', '12', '110000'),
(4, 'c', '14', '100100'),
(5, 'ć', '146', '000001'),
(6, 'd', '145', '100110'),
(7, 'e', '15', '100010'),
(8, 'ę', '156', '100011'),
(9, 'f', '124', '110100'),
(10, 'g', '1245', '110110'),
(11, 'h', '125', '110010'),
(12, 'i', '24', '010100'),
(13, 'j', '245', '010110'),
(14, 'k', '13', '101000'),
(15, 'l', '123', '111000'),
(16, 'ł', '126', '110001'),
(17, 'm', '134', '101100'),
(18, 'n', '1345', '101110'),
(19, 'ń', '1456', '100111'),
(20, 'o', '135', '101010'),
(21, 'ó', '236', '011001'),
(22, 'p', '1234', '111100'),
(23, 'q', '12345', '111110'),
(24, 'r', '1235', '111010'),
(25, 's', '234', '011100'),
(26, 'ś', '346', '001101'),
(27, 't', '2345', '011110'),
(28, 'u', '136', '101001'),
(29, 'v', '1236', '111001'),
(30, 'w', '2456', '010111'),
(31, 'x', '1346', '101101'),
(32, 'y', '13456', '101111'),
(33, 'z', '1356', '101011'),
(34, 'ź', '356', '001011'),
(35, 'ż', '23456', '011111'),
(36, 'ni', '345', '001110'),
(37, 'si', '2346', '011101'),
(38, 'ał', '146', '100101'),
(39, 'na', '123456', '111111'),
(40, 'em', '5', '000010'),
(41, 'ki', '3', '001000'),
(42, 'ci', '4', '000100'),
(43, 'zi', '12356', '111011'),
(44, 'wi', '12456', '110111'),
(45, 'ej', '1256', '110011'),
(46, 'że', '2356', '011011'),
(47, 'od', '35', '001010'),
(48, 'ow', '235', '011010'),
(49, 'pan', '12346', '111101'),
(50, 'al', '2', '010000'),
(51, 'to', '23', '011000'),
(52, 'mi', '34', '001100'),
(53, 'jak', '25', '010010'),
(54, 'an', '1246', '110101'),
(55, 'do', '45', '000110'),
(56, 'ze', '3456', '001111'),
(57, 'on', '36', '001001'),
(58, 'eg', '56', '000011'),
(59, 'er', '256', '010011'),
(60, 'zy', '456', '000111'),
(61, 'ił', '246', '010101'),
(62, 'en', '26', '010001'),
(63, 'za', '46', '000101');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `braille_pl`
--
ALTER TABLE `braille_pl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_braille_litera` (`litera`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `braille_pl`
--
ALTER TABLE `braille_pl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
