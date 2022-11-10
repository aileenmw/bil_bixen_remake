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
-- Table structure for table `bil_bixen_weekdays`
--

CREATE TABLE `bil_bixen_weekdays` (
  `id` int(11) NOT NULL,
  `day` varchar(50) COLLATE latin1_danish_ci DEFAULT NULL,
  `open_id` int(11) DEFAULT NULL,
  `close_id` int(11) DEFAULT NULL,
  `hours_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `bil_bixen_weekdays`
--

INSERT INTO `bil_bixen_weekdays` (`id`, `day`, `open_id`, `close_id`, `hours_id`) VALUES
(1, 'mandag', 5, 0, 1),
(2, 'tirsdag', 8, 25, NULL),
(3, 'onsdag', 0, 0, NULL),
(4, 'torsdag', 0, 0, NULL),
(5, 'fredag', 0, 0, NULL),
(6, 'lørdag', 0, 0, NULL),
(7, 'søndag', 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_weekdays`
--
ALTER TABLE `bil_bixen_weekdays`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_weekdays`
--
ALTER TABLE `bil_bixen_weekdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
