-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 09:41 AM
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
-- Table structure for table `bil_bixen_afdelinger`
--

CREATE TABLE `bil_bixen_afdelinger` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE latin1_danish_ci NOT NULL,
  `address` varchar(250) COLLATE latin1_danish_ci NOT NULL,
  `postal_code` int(4) NOT NULL,
  `town` varchar(250) COLLATE latin1_danish_ci NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `Mandag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `Tirsdag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `Onsdag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `Torsdag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `Fredag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `Lørdag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `Søndag` varchar(20) COLLATE latin1_danish_ci DEFAULT NULL,
  `username` varchar(300) COLLATE latin1_danish_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '2',
  `password` varchar(400) COLLATE latin1_danish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_danish_ci;

--
-- Dumping data for table `bil_bixen_afdelinger`
--

INSERT INTO `bil_bixen_afdelinger` (`id`, `name`, `address`, `postal_code`, `town`, `lat`, `lng`, `Mandag`, `Tirsdag`, `Onsdag`, `Torsdag`, `Fredag`, `Lørdag`, `Søndag`, `username`, `role`, `password`) VALUES
(1, 'Bilbixen A/S', 'Munkebjergvej 130', 5230, 'Odense M', 55.3809, 10.4086, '14', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(2, 'Larsen & Søn', 'Industrivej 10', 7000, 'Fredericia', 55.5905, 9.75907, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(3, 'Bil Børge', 'Industrivej 34', 7171, 'Uldum', 55.852, 9.59146, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'min@email.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(4, 'Bent Bil', 'Odensevej 63', 5700, 'Svendborg', 55.0704, 10.5833, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(5, 'Kjeld og Hilda Biler', 'Odensevej 8', 5300, 'Kerteminde', 55.4467, 10.6589, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(6, 'Monty Motors', 'Industrivej 40', 6070, 'Christiansfeld', 55.3633, 9.48986, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(7, 'Høng Biler', 'Skovvej 3', 4270, 'Høng', 55.5131, 11.2923, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(8, 'Fjordparkens Auto', 'Fjordparken 103', 4000, 'Roskilde City', 55.6625, 12.0911, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'fjord@fjolset.dk', 2, '$2y$10$ZVcN9CxKjGz/1btrQvVHMeIPMvNPI5LDWG.lKSmkqyKCERP7vD4fS'),
(9, 'Jydske Auto', 'Silkeborgvej 68', 8000, 'Århus', 56.1568, 10.1852, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(10, 'Auto Hjørnet', 'Måde Industrivej 25', 6705, 'Esbjerg Ø', 55.4609, 8.50209, '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 17:00', '08:00 - 13:30', 'LUKKET', 'LUKKET', 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K'),
(13, 'Bil Børge', 'Bilvej', 29912, 'Bilby', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mail@mail.dk', 2, '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_afdelinger`
--
ALTER TABLE `bil_bixen_afdelinger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_afdelinger`
--
ALTER TABLE `bil_bixen_afdelinger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
