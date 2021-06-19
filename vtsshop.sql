-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 04:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vtsshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `termékek`
--

CREATE TABLE `termékek` (
  `Termek_Azon` int(10) NOT NULL,
  `Termek_Neve` char(50) NOT NULL,
  `Termek_Ara` char(50) NOT NULL,
  `Kep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `termékek`
--

INSERT INTO `termékek` (`Termek_Azon`, `Termek_Neve`, `Termek_Ara`, `Kep`) VALUES
(1, 'Hoodie', '2500', 'hoodie.jpg'),
(2, 'Póló', '1500', 'póló.jpg'),
(3, 'Bögre', '250', 'Bögre.jpg'),
(4, 'Sapka', '1000', 'Cap.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `termékek`
--
ALTER TABLE `termékek`
  ADD PRIMARY KEY (`Termek_Azon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `termékek`
--
ALTER TABLE `termékek`
  MODIFY `Termek_Azon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
