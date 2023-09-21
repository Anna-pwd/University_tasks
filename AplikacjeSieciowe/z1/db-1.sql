-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql01.abagniewska.beep.pl:3306
-- Czas generowania: 08 Paź 2021, 20:42
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
-- Baza danych: `db-1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `domeny`
--

CREATE TABLE `domeny` (
  `id` int(11) NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `domeny`
--

INSERT INTO `domeny` (`id`, `adres`) VALUES
(1, 'facebook.com'),
(2, 'youtube.com'),
(3, 'pbs.edu.pl'),
(4, 'interia.pl'),
(5, 'wp.pl'),
(6, 'wp.plll');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `domeny`
--
ALTER TABLE `domeny`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `domeny`
--
ALTER TABLE `domeny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
