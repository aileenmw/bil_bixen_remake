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
-- Table structure for table `bil_bixen`
--

CREATE TABLE `bil_bixen` (
  `car_id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `doors` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(500) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bil_bixen`
--

INSERT INTO `bil_bixen` (`car_id`, `model`, `reg_date`, `doors`, `km`, `price`, `img`, `category_id`) VALUES
(3, 'Ford Ka 1.3', '1990-05-10', 3, 79000, 33000, '', 1),
(4, 'Ford Sierra 2,0 CL DOHX', '1990-05-01', 4, 278000, 17000, NULL, 1),
(5, 'Mazda 323F 1,6 GLX', '1993-01-01', 5, 23000, 17000, NULL, 1),
(6, 'Mercedes', '1984-01-01', 4, 253000, 10000, NULL, 1),
(8, 'Opel Astra 1,6i GL', '1994-01-01', 3, 190000, 32000, NULL, 1),
(9, 'Toyota Carina 1,60XLi', '1990-01-01', 5, 342000, 14000, NULL, 1),
(10, 'BMW 320i 2,0', '1985-01-01', 2, 45000, 3000, NULL, 2),
(15, 'Ford Escort 1,3', '1985-01-01', 3, 18000, 3000, '', 2),
(16, 'Ford Granada 2,0 st car', '1985-01-01', 3, 267000, 7000, NULL, 2),
(18, 'Ford Sierra 1,6', '1984-02-01', 3, 470000, 4000, NULL, 2),
(19, 'Ford Sierra 2,0 V', '1975-01-01', 5, 167000, 4000, NULL, 2),
(20, 'Ford Sierra 2,0i CLX', '1986-01-01', 3, 456456, 5000, '', 2),
(21, 'Honda Civic 1,3', '1984-01-01', 5, 870000, 3000, NULL, 2),
(22, 'Ford Sierra 2,0i dohc CL', '1991-01-01', 4, 6324110, 4000, NULL, 2),
(23, 'Mercedes 300 TD 3,0 st.car', '1996-01-01', 3, 560000, 2000, NULL, 2),
(24, 'Mercedes Sprinter', '1996-01-01', 2, 321000, 6000, NULL, 3),
(25, 'Mazda E1200 ladvogn', '1989-01-01', 2, 370000, 9000, NULL, 3),
(26, 'Mazda E2200 6,7 d ladvogn', '1986-01-01', 4, 298000, 5000, NULL, 3),
(27, 'Mazda B200', '1989-01-01', 0, 210000, 45000, '', 3),
(28, 'Ford Transit 100L CL 2,5D', '1991-01-01', 2, 462400, 15000, NULL, 3),
(29, 'Ford Transit 100L CL 2,5D', '1997-11-01', 0, 203000, 45000, NULL, 3),
(30, 'VW Transporter Benzin Pick-Up', '1990-01-01', 2, 352400, 6000, NULL, 3),
(31, 'VW Transporter 2,0 Benzin', '1980-01-01', 0, 175400, 18000, NULL, 3),
(32, 'VW Transporter 2,4D', '1995-01-01', 2, 260000, 35000, NULL, 3),
(33, 'VW Golf 1,6', '1986-07-01', 3, 340000, 14000, NULL, 1),
(34, 'Ford Escort 1,3', '1985-01-01', 3, 0, 3000, NULL, 2),
(36, 'Renault Laguna', '1654-01-01', 8, 2000, 10000, NULL, 2),
(37, 'Chrysler 300c', '2003-01-01', 5, 230000, 129000, NULL, 1),
(38, 'Volvo', '1989-01-01', 5, 370000, 23000, NULL, 1),
(39, 'Yugo', '2007-04-03', 3, 570000, 3000, NULL, 2),
(40, 'Plymoth', '1964-02-05', 4, 342000, 323000, NULL, 2),
(41, 'Chrysler 300', '2001-01-01', 5, 230000, 72000, NULL, 1),
(42, 'Plymoth Classic', '1961-05-02', 4, 279000, 423000, NULL, 2),
(43, 'Scania', '1987-12-06', 2, 670000, 276000, NULL, 3),
(44, 'Kenworth', '1971-05-24', 2, 234000, 321000, NULL, 3),
(45, 'DAF', '2007-12-30', 2, 170000, 223000, NULL, 3),
(46, 'Volvo', '0164-03-15', 2, 421000, 65000, NULL, 2),
(47, 'Spacemobil', '2000-01-01', 15, 0, 100000, NULL, 3),
(81, 'Pinky', '2015-04-01', 2, 18500, 202000, '1515201598_pinky.jpg', 1),
(82, 'Woody 2.0', '2018-01-19', 3, 489000, 189000, '1515201728_woody.jpg', 1),
(83, 'Schoe', '2018-01-01', 2, 5600, 201000, '1515201772_shoe.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bil_bixen`
--
ALTER TABLE `bil_bixen`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bil_bixen`
--
ALTER TABLE `bil_bixen`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
