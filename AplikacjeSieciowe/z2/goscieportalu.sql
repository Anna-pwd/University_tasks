-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql01.abagniewska.beep.pl:3306
-- Czas generowania: 17 Paź 2021, 18:45
-- Wersja serwera: 5.7.31-34-log
-- Wersja PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db-2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `goscieportalu`
--

CREATE TABLE `goscieportalu` (
  `nr` int(11) NOT NULL,
  `ip` text COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `goscieportalu`
--

INSERT INTO `goscieportalu` (`nr`, `ip`, `data`) VALUES
(74, '5.173.150.6', '2021-10-15 18:30:40'),
(77, '94.254.163.30', '2021-10-15 18:41:32'),
(78, '31.13.103.116', '2021-10-15 18:46:34'),
(85, '83.23.18.220', '2021-10-15 19:50:24'),
(90, '89.75.155.17', '2021-10-17 12:50:21'),
(97, '5.173.19.11', '2021-10-15 21:54:32'),
(102, '89.228.4.203', '2021-10-15 22:16:14'),
(105, '94.254.231.22', '2021-10-17 13:06:11'),
(106, '94.254.231.22', '2021-10-17 13:06:48'),
(107, '89.75.155.17', '2021-10-17 13:06:58'),
(108, '89.75.155.17', '2021-10-17 13:12:15'),
(109, '94.254.231.22', '2021-10-17 13:12:31'),
(110, '94.254.231.22', '2021-10-17 13:13:32'),
(111, '89.75.155.17', '2021-10-17 13:15:51'),
(112, '94.254.232.23', '2021-10-17 13:16:35'),
(113, '94.254.232.23', '2021-10-17 13:16:54'),
(114, '89.75.155.17', '2021-10-17 13:17:08'),
(115, '89.75.155.17', '2021-10-17 13:27:03'),
(116, '89.75.155.17', '2021-10-17 13:27:29'),
(117, '89.75.155.17', '2021-10-17 17:34:58'),
(118, '89.75.155.17', '2021-10-17 17:36:11'),
(119, '89.75.155.17', '2021-10-17 17:39:50');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `goscieportalu`
--
ALTER TABLE `goscieportalu`
  ADD PRIMARY KEY (`nr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `goscieportalu`
--
ALTER TABLE `goscieportalu`
  MODIFY `nr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
