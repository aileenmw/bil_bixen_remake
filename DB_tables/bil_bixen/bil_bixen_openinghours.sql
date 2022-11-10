-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 09:42 AM
-- Server version: 5.7.40-0ubuntu0.18.04.1
-- PHP Version: 7.0.33-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xai01_wi2_sde_dk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bil_bixen_openinghours`
--

CREATE TABLE `bil_bixen_openinghours` (
  `id` int(11) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `bil_bixen_openinghours`
--

INSERT INTO `bil_bixen_openinghours` (`id`, `open`, `close`) VALUES
(1, '08:00:00', '17:00:00'),
(2, '07:30:00', '16:00:00'),
(3, '08:00:00', '16:00:00'),
(4, '08:00:00', '13:00:00'),
(5, '07:00:00', '15:30:00'),
(6, '07:00:00', '15:00:00'),
(7, '08:30:00', '16:00:00'),
(8, '08:00:00', '15:00:00'),
(9, '08:00:00', '16:30:00'),
(10, '08:00:00', '15:30:00'),
(11, '06:30:00', '14:30:00'),
(12, '10:00:00', '18:00:00'),
(13, '08:30:00', '16:30:00'),
(14, '05:00:00', '10:00:00'),
(15, '07:30:00', '16:30:00'),
(16, '10:00:00', '11:00:00'),
(17, '07:00:00', '16:00:00'),
(18, '07:30:00', '17:30:00'),
(19, '05:00:00', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_openinghours`
--
ALTER TABLE `bil_bixen_openinghours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_openinghours`
--
ALTER TABLE `bil_bixen_openinghours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
