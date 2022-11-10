-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 09:43 AM
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
-- Table structure for table `bil_bixen_type`
--

CREATE TABLE `bil_bixen_type` (
  `type_id` int(11) NOT NULL,
  `type` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_bixen_type`
--

INSERT INTO `bil_bixen_type` (`type_id`, `type`) VALUES
(1, 'Personbiler'),
(2, 'Vrag'),
(3, 'Varevogn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_type`
--
ALTER TABLE `bil_bixen_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_type`
--
ALTER TABLE `bil_bixen_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
