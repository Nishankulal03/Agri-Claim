-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2024 at 12:30 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmers_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'nishankulal45@gmail.com', 'Nishan');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_claims`
--

DROP TABLE IF EXISTS `insurance_claims`;
CREATE TABLE IF NOT EXISTS `insurance_claims` (
  `id` int NOT NULL AUTO_INCREMENT,
  `farmerName` varchar(100) DEFAULT NULL,
  `rtcNo` varchar(100) DEFAULT NULL,
  `cropType` varchar(100) DEFAULT NULL,
  `totalLoss` int DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `photos` text,
  `complaintBox` text,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `insurance_claims`
--

INSERT INTO `insurance_claims` (`id`, `farmerName`, `rtcNo`, `cropType`, `totalLoss`, `location`, `photos`, `complaintBox`, `latitude`, `longitude`) VALUES
(1, 'koragappa', '45846912', 'paddy', 15000, 'perne', '[\"AGRI-CLAIM.png\"]', 'more complaint', 12.8745472, 75.1632384),
(2, 'Narayan', '4875692', 'Aracanet', 25000, 'kadeshvalya', '[\"Screenshot 2024-07-15 003445.png\"]', 'fulll loss', 12.8745472, 75.1632384),
(3, 'nishan', '856146585', 'paddy', 15000, 'vogga', '[\"Screenshot (5).png\"]', 'total full loss', 12.8745472, 75.1632384),
(4, 'Kusappa', '72/5', 'aracanet', 25000, 'kadeshvalya', '[\"Screenshot (6).png\"]', 'full box', 12.8745472, 75.1632384),
(5, 'Ramesh', '132/7', 'paddy', 15000, 'benjanpadav', '[\"Screenshot (7).png\"]', 'full loss', 12.976128, 77.5979008);

-- --------------------------------------------------------

--
-- Table structure for table `schemes`
--

DROP TABLE IF EXISTS `schemes`;
CREATE TABLE IF NOT EXISTS `schemes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schemes`
--

INSERT INTO `schemes` (`id`, `name`, `description`) VALUES
(1, 'pradhana mantri kisaan yojana', 'farmer helper'),
(3, 'kisaan bagya yojana', 'farmer donation'),
(5, 'pradhana mantri avaas yojana', 'ajdbsugcusagchc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7359 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(7356, 'Koragappa\r\n', 'karthikp45@gmail.com', 'KarthikSSV'),
(7357, 'Nishan', 'nishankulal03@gmail.com', '$2y$10$d2ivHDItf9HQC3HDGV7iOOZQm8fFJsVSs5m5Nyrj2JNzWemxNRZK2'),
(7358, 'shobha', 'shobhanarayan7413@gmail.com', '$2y$10$nIq.PJFfDbjrOmRe/wN40.M//6zoxDu3h6CIC49OPdxcvQVNNU6Ry');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
