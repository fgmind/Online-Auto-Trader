-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2016 at 05:22 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `miotigam_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `recipient` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `thumbnail` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `postid`, `image`, `thumbnail`) VALUES
(1, 7, 'd4ded9834c7e6b9a0c8a4fe7191331b658c1cffa.', 1),
(2, 8, '33b09533bc2f0d9faf25c09d6aa74dbe86ac7900.', 1),
(3, 9, '04faf779271a4a2ef20c7a6a279d3e3e31b567e7.JPG', 1),
(4, 10, '7c45ee4d4156712a5ee525bc52dac3cdf277f9aa.JPG', 1),
(5, 10, '3b0fb02c361e83064c01473ed842811d1351a8b3.jpg', 0),
(6, 10, 'e9c2d6dfbf83d814cec65327f4cf50320951d2bb.JPG', 0),
(7, 10, '144c93b635a34676bd3bd6b34801443be43ea9a9.png', 0),
(8, 10, '9544af2e892560082ca57ae6195a666e1c9f6ed4.png', 0),
(9, 11, 'bb4e17ed167d15ba87866382d106aaf7ba755d2b.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `address`) VALUES

(1, 'login', '5f4dcc3b5aa765d61d8327deb882cf99', 'user@something.com', 'user', 'user', '123456789', '12 somthing '),
(2, 'gilles', 'eb7abf5f00d2dd1678fd3763b90d5ea7', 'f_gmind@hotmail.com', 'Gilles', 'Mindiel', '45645456', '1897123379 '),
(3, 'francois', 'eb7abf5f00d2dd1678fd3763b90d5ea7', 'ksdjfhsdk@email.com', 'francois', 'mindiel', '456456456', 'ksfjdhjjdx ');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL,
  `registration` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `make` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `mileage` int(11) NOT NULL,
  `description` text NOT NULL,
  `sellerID` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `registration`, `type`, `make`, `model`, `price`, `year`, `mileage`, `description`, `sellerID`) VALUES
(5, 'ym7160', 'Hatchback', 'Toyota', 'corolla', 5000, 2000, 200000, 'blue car ', 2),
(6, '234254', 'Convertible', 'Audi', 'modeldf', 456, 2000, 456, 'sdasdfas ', 2),
(7, 'this', 'Sedan', 'Honda', 'Civic', 2500, 2011, 150000, ' This is the default description of the honda civic!', 1),
(8, 'this2', 'Convertible', 'Audi', 'R8', 400000, 2012, 60000, ' description', 1),
(11, 'erf23', 'Sedan', 'Hyundai', 'Elantra', 8200, 2011, 44000, 'Low KM Hyundai Elantra! Very excited to be selling this car because it has never let me down! White, nice rims and goes fast. Please contact me ASAP to arrange a test-drive.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
