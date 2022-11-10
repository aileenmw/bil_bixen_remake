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
-- Table structure for table `bil_bixen_basket`
--

CREATE TABLE `bil_bixen_basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `list` varchar(800) COLLATE latin1_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `bil_bixen_basket`
--

INSERT INTO `bil_bixen_basket` (`id`, `user_id`, `list`) VALUES
(1, 5, '3,6,5'),
(2, 5, '3,2,5'),
(3, 5, '2,4,6'),
(4, 5, '2,5,4'),
(5, 5, ''),
(6, 5, '2,5,4'),
(7, 5, '8,5,4'),
(8, 5, '4,4,4'),
(9, 5, '2,3,4'),
(10, 5, '2,6'),
(28, 5, '6,5,4'),
(29, 5, '2,4,8,33'),
(30, 5, '2,3,4'),
(31, 5, '2,3,4'),
(32, 5, '5,6,8'),
(33, 5, '8,6,5'),
(34, 5, '4,3,6,5,5,41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_basket`
--
ALTER TABLE `bil_bixen_basket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_basket`
--
ALTER TABLE `bil_bixen_basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
