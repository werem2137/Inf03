-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 10, 2026 at 07:19 PM
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
-- Database: `wodospady`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontynenty`
--

CREATE TABLE `kontynenty` (
  `idKontynent` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL,
  `kolejnosc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `kontynenty`
--

INSERT INTO `kontynenty` (`idKontynent`, `nazwa`, `kolejnosc`) VALUES
(1, 'Azja', 1),
(2, 'Afryka', 2),
(3, 'Ameryka Północna', 3),
(4, 'Ameryka Południowa', 4),
(5, 'Australazja', 6),
(6, 'Europa', 5),
(7, 'Antarktyda', 7),
(8, 'Inne', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `turysci`
--

CREATE TABLE `turysci` (
  `idTurysta` int(11) NOT NULL,
  `nick` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `turysci`
--

INSERT INTO `turysci` (`idTurysta`, `nick`) VALUES
(1, 'adam'),
(2, 'ewa'),
(3, 'janek'),
(4, 'kasia'),
(5, 'refil');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wodospady`
--

CREATE TABLE `wodospady` (
  `idWodospadu` int(11) NOT NULL,
  `idKontynent` int(11) NOT NULL,
  `panstwo` varchar(50) NOT NULL,
  `nazwa` varchar(80) NOT NULL,
  `wysokosc` int(11) NOT NULL,
  `plik` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `wodospady`
--

INSERT INTO `wodospady` (`idWodospadu`, `idKontynent`, `panstwo`, `nazwa`, `wysokosc`, `plik`) VALUES
(1, 6, 'Polska', 'Kamieńczyk', 27, 'kamienczyk.jpg'),
(2, 6, 'Polska', 'Mała Siklawa', 10, 'siklawa.jpg'),
(3, 6, 'Polska', 'Wielka Siklawa', 18, 'siklawa.jpg'),
(4, 6, 'Polska', 'Siklawica', 23, 'siklawica.jpg'),
(5, 6, 'Polska', 'Wilczki', 22, 'wilczki.jpg'),
(6, 6, 'Polska', 'Wodogrzmoty', 80, 'wodogrzmoty.jpg'),
(7, 6, 'Islandia', 'Hengifoss', 60, NULL),
(8, 6, 'Islandia', 'Haifoss', 122, NULL),
(9, 6, 'Islandia', 'Skogafoss', 60, NULL),
(10, 6, 'Islandia', 'Gullfoss', 32, NULL),
(11, 2, 'Rwanda', 'Kigali Genocide', 151, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wpisy`
--

CREATE TABLE `wpisy` (
  `idWpis` int(11) NOT NULL,
  `idWodospadu` int(11) NOT NULL,
  `idTurysta` int(11) NOT NULL,
  `dataWpisu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kontynenty`
--
ALTER TABLE `kontynenty`
  ADD PRIMARY KEY (`idKontynent`);

--
-- Indeksy dla tabeli `turysci`
--
ALTER TABLE `turysci`
  ADD PRIMARY KEY (`idTurysta`);

--
-- Indeksy dla tabeli `wodospady`
--
ALTER TABLE `wodospady`
  ADD PRIMARY KEY (`idWodospadu`),
  ADD KEY `idKontynent` (`idKontynent`);

--
-- Indeksy dla tabeli `wpisy`
--
ALTER TABLE `wpisy`
  ADD PRIMARY KEY (`idWpis`),
  ADD KEY `idWodospadu` (`idWodospadu`),
  ADD KEY `idTurysta` (`idTurysta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `turysci`
--
ALTER TABLE `turysci`
  MODIFY `idTurysta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wpisy`
--
ALTER TABLE `wpisy`
  MODIFY `idWpis` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wodospady`
--
ALTER TABLE `wodospady`
  ADD CONSTRAINT `wodospady_ibfk_1` FOREIGN KEY (`idKontynent`) REFERENCES `kontynenty` (`idKontynent`);

--
-- Constraints for table `wpisy`
--
ALTER TABLE `wpisy`
  ADD CONSTRAINT `wpisy_ibfk_1` FOREIGN KEY (`idWodospadu`) REFERENCES `wodospady` (`idWodospadu`),
  ADD CONSTRAINT `wpisy_ibfk_2` FOREIGN KEY (`idTurysta`) REFERENCES `turysci` (`idTurysta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
