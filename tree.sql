-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Mar 2020, 15:25
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tree`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zwierzeta`
--

CREATE TABLE `zwierzeta` (
  `object_id` int(11) NOT NULL,
  `object_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `zwierzeta`
--

INSERT INTO `zwierzeta` (`object_id`, `object_name`, `parent_id`) VALUES
(2, 'Ssaki', 0),
(3, 'Koty', 2),
(4, 'Psy', 2),
(6, 'Ptaki', 0),
(8, 'Ryby', 0),
(9, 'Płazy', 0),
(18, 'Loty', 6),
(19, 'Nieloty', 6),
(21, 'Jaszczórki', 9),
(22, 'Mops', 4),
(23, 'Shiba', 4),
(24, 'Burek', 23),
(25, 'Pers', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `zwierzeta`
--
ALTER TABLE `zwierzeta`
  ADD PRIMARY KEY (`object_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `zwierzeta`
--
ALTER TABLE `zwierzeta`
  MODIFY `object_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
