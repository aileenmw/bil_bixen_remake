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
-- Table structure for table `bil_bixen_close`
--

CREATE TABLE `bil_bixen_close` (
  `id` int(11) NOT NULL,
  `close` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `bil_bixen_close`
--

INSERT INTO `bil_bixen_close` (`id`, `close`) VALUES
(11, '10:00:00'),
(12, '10:30:00'),
(13, '11:00:00'),
(14, '11:30:00'),
(15, '12:00:00'),
(16, '12:30:00'),
(17, '13:00:00'),
(18, '13:30:00'),
(19, '14:00:00'),
(20, '14:30:00'),
(21, '15:00:00'),
(22, '15:30:00'),
(23, '16:00:00'),
(24, '16:30:00'),
(25, '17:00:00'),
(26, '17:30:00'),
(27, '18:00:00'),
(28, '18:30:00'),
(29, '19:00:00'),
(30, '19:30:00'),
(31, '20:00:00'),
(32, '20:30:00'),
(33, '21:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_close`
--
ALTER TABLE `bil_bixen_close`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_close`
--
ALTER TABLE `bil_bixen_close`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
