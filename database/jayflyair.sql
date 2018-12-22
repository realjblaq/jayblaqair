-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2018 at 10:26 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jayflyair`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE IF NOT EXISTS `airports` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `airport_name` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `airport_name` (`airport_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`aid`, `airport_name`) VALUES
(1, 'Kotoka (ACC)'),
(2, 'Kumasi (KSI)'),
(5, 'Murtala Muhammed (LOS)'),
(4, 'Takoradi (TKD)'),
(3, 'Tamale (TML)');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `flight_name` varchar(200) NOT NULL,
  `wherefrom` varchar(200) NOT NULL,
  `whereto` varchar(200) NOT NULL,
  `trip_type` varchar(200) NOT NULL,
  `passengers` int(11) NOT NULL,
  `departure_date` date NOT NULL,
  `cost` double NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `uid`, `full_name`, `flight_name`, `wherefrom`, `whereto`, `trip_type`, `passengers`, `departure_date`, `cost`) VALUES
(17, 10, 'Mercy Tsoo Markwei', 'Air France', 'Kotoka (ACC)', 'Takoradi (TKD)', 'oneway', 6, '2018-01-26', 30000),
(21, 12, 'jblaq', 'Air France', 'Kotoka (ACC)', 'Kumasi (KSI)', 'oneway', 1, '2018-01-01', 15000),
(22, 12, 'Mercy Markwei', 'British Airways', 'Kotoka (ACC)', 'Murtala Muhammed (LOS)', 'roundtrip', 7, '2018-01-05', 28000),
(30, 6, 'Markwei', 'Delta', 'Kotoka (ACC)', 'Takoradi (TKD)', 'oneway', 1, '2018-01-01', 10000),
(32, 6, 'dfd', 'Delta', 'Kotoka (ACC)', 'Takoradi (TKD)', 'oneway', 1, '2018-01-01', 10000),
(33, 6, 'SDa', 'Delta', 'Kotoka (ACC)', 'Takoradi (TKD)', 'oneway', 1, '2018-01-01', 10000),
(34, 6, 'SDa', 'Delta', 'Kotoka (ACC)', 'Takoradi (TKD)', 'oneway', 1, '2018-01-01', 10000),
(35, 6, 'sss', 'Delta', 'Kotoka (ACC)', 'Takoradi (TKD)', 'oneway', 1, '2018-01-01', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE IF NOT EXISTS `flights` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  PRIMARY KEY (`fid`),
  KEY `fname` (`fname`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`fid`, `fname`) VALUES
(4, 'Air France'),
(1, 'British Airways'),
(7, 'Delta'),
(8, 'Egypt Air'),
(3, 'Emirates'),
(2, 'KLM'),
(10, 'RwandaAir'),
(9, 'South African Airways'),
(6, 'TAP Air Portugal'),
(5, 'Turkish Airlines');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` int(11) NOT NULL,
  `trip_type` enum('oneway','roundtrip') NOT NULL,
  `wherefrom` int(11) NOT NULL,
  `whereto` int(11) NOT NULL,
  `deptime` time NOT NULL,
  `arrtime` time NOT NULL,
  `firstclass_cost` double NOT NULL,
  `businessclass_cost` double NOT NULL,
  `economyclass_cost` double NOT NULL,
  `eta` varchar(255) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `wherefrom` (`wherefrom`),
  KEY `whereto` (`whereto`),
  KEY `fname` (`fname`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`tid`, `fname`, `trip_type`, `wherefrom`, `whereto`, `deptime`, `arrtime`, `firstclass_cost`, `businessclass_cost`, `economyclass_cost`, `eta`) VALUES
(1, 7, 'oneway', 1, 4, '06:00:00', '08:00:00', 50000, 35000, 10000, '2 Hrs'),
(2, 8, 'roundtrip', 1, 5, '09:00:00', '15:00:00', 80000, 65000, 25000, '6 Hrs'),
(3, 4, 'oneway', 1, 2, '06:00:00', '07:00:00', 75000, 50000, 15000, '1 Hour'),
(4, 2, 'roundtrip', 3, 4, '09:00:00', '12:00:00', 48000, 32000, 12000, '3 Hours'),
(5, 4, 'oneway', 1, 4, '02:00:00', '11:00:00', 70000, 5000, 2000, '3 Hrs'),
(6, 2, 'roundtrip', 5, 1, '10:00:00', '16:00:00', 1000, 900, 500, '1 hr'),
(7, 1, 'roundtrip', 1, 5, '02:00:00', '06:00:00', 5000, 4000, 2000, '4Hrs'),
(8, 2, 'oneway', 2, 4, '07:00:00', '13:00:00', 4000, 3000, 500, '6Hrs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `user_id`, `email`, `password`) VALUES
(6, 'jblaq', 'info@jblaq.com', '099b3b060154898840f0ebdfb46ec78f'),
(10, 'tsotsoo', 'info@tsotsoo.com', '099b3b060154898840f0ebdfb46ec78f'),
(11, 'Edd Essien', 'edd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'Emmanuella Asare', 'akuaasabea23@gmail.com', '213bbfc131434dac0099f6f78912c04c'),
(13, 'eazy', 'eazy1234567@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'janji', 'info@janji.com', '3eb8a3a724c42e17df521b5c4939f8e6'),
(15, 'rek', 'reked@live.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `flightname` FOREIGN KEY (`fname`) REFERENCES `flights` (`fid`),
  ADD CONSTRAINT `wherefrom` FOREIGN KEY (`wherefrom`) REFERENCES `airports` (`aid`),
  ADD CONSTRAINT `whereto` FOREIGN KEY (`whereto`) REFERENCES `airports` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
