-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Jaan 23, 2024 kell 01:39 PL
-- Serveri versioon: 10.4.27-MariaDB
-- PHP versioon: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `rasmus`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `raamat`
--

CREATE TABLE `raamat` (
  `Id` int(11) NOT NULL,
  `Nimi` varchar(100) DEFAULT NULL,
  `Autor` varchar(100) DEFAULT NULL,
  `Laenutus_kp` date DEFAULT NULL,
  `Laenu_pikkus` int(11) DEFAULT NULL,
  `Saadavus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `raamat`
--

INSERT INTO `raamat` (`Id`, `Nimi`, `Autor`, `Laenutus_kp`, `Laenu_pikkus`, `Saadavus`) VALUES
(2, 'teee', 'dgd', '2024-02-15', 11, 0),
(4, 'Raaamtttt44', 'ataaarr', '2024-01-21', 0, 0),
(8, 'Soo', 'Oskar Luts', '2024-01-23', 20, 0);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `raamat`
--
ALTER TABLE `raamat`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `raamat`
--
ALTER TABLE `raamat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
