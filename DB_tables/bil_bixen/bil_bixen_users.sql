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
-- Table structure for table `bil_bixen_users`
--

CREATE TABLE `bil_bixen_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(120) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '2',
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_bixen_users`
--

INSERT INTO `bil_bixen_users` (`user_id`, `username`, `email`, `password`, `level`, `role_id`) VALUES
(1, 'admin', 'aile0015@cvkweb.dk', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 1, 1),
(2, 'bent', 'bo@bo.dk', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(3, 'Hans Auto', 'hans@hans.de', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(4, 'Bil Børge', 'aile0015@cvkweb.dk', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(5, 'Fiona', 'aile0015@cvkweb.dk', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(10, 'Aileen', 'aileenmw@gmail.com', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 1),
(12, 'snoopy', 'du@pin.com', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 1),
(14, 'Betty Boop', 'betty@bo.op', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(15, 'Einstein', 'ein@stein.de', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(16, 'SusieQ', 'su@si.q.com', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 1),
(17, 'Bono', 'bo@no.com', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(18, 'Kalle P', 'kel@le.de', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3),
(19, 'admin', 'admin@admin.dk', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 1, 1),
(20, 'LindaP', 'lin@da.dk', '$2y$10$AA2zIGR5H..GZRCVASqGnOKlBdvZwuLLEsBmq6kyocBPK3rP.LzTK', 2, 3),
(21, 'Bil Børge', 'mail@mail.dk', '$2y$10$g2Zoru3YHDdMypFlyA10O.Vsx7XfZZBwGnsHdfndLf4XpNe4dXb7K', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen_users`
--
ALTER TABLE `bil_bixen_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen_users`
--
ALTER TABLE `bil_bixen_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
