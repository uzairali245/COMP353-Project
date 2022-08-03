-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 03, 2022 at 07:26 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `artID` int(11) NOT NULL,
  `publish_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `summary` varchar(100) DEFAULT NULL,
  `major_topic` varchar(255) DEFAULT NULL,
  `minor_topic` varchar(255) DEFAULT NULL,
  `discription` text,
  `removal_date` bigint(20) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`artID`, `publish_date`, `summary`, `major_topic`, `minor_topic`, `discription`, `removal_date`, `aID`, `userID`, `status`) VALUES
(1, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor vaccine', 'this is a description', NULL, 2, 1, 1),
(2, '2022-08-03 00:27:31', 'Lorem ipsum dolor sit amet, consectetuer ', 'java', 'inheritance', 'Java is better than c++', NULL, 2, 3, 1),
(3, '2022-08-03 00:27:31', 'Lorem ipsum dolor sit amet, consectetuer ', 'sql', 'my', 'Java is better than c#', NULL, 2, 3, 1),
(4, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 3, 8, 1),
(5, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 4, 9, 1),
(6, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 5, 10, 1),
(7, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 6, 5, 1),
(8, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 3, 8, 1),
(9, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 3, 8, 0),
(10, '2022-08-03 00:27:31', 'this is a summary', 'major covid', 'minor covid', 'c# is better than java', NULL, 5, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `aID` int(11) NOT NULL AUTO_INCREMENT,
  `subscribers` int(11) DEFAULT '0',
  `resID` int(11) DEFAULT NULL,
  `orgID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`aID`),
  KEY `resID` (`resID`),
  KEY `orgID` (`orgID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`aID`, `subscribers`, `resID`, `orgID`, `userID`) VALUES
(1, 0, NULL, 1, 2),
(2, 5, 2, NULL, 3),
(3, 0, 2, NULL, 8),
(4, 10, 3, NULL, 9),
(5, 33, 4, NULL, 10),
(6, 0, NULL, 2, 5),
(7, 25, NULL, 3, 7),
(8, 0, NULL, 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `cID` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  `populations` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  `infected` int(11) DEFAULT NULL,
  `vaccinated` int(11) DEFAULT NULL,
  `gov_agency` varchar(255) DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `report_date` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`cID`, `country_name`, `populations`, `deaths`, `infected`, `vaccinated`, `gov_agency`, `region_name`, `report_date`) VALUES
(1, 'Canada', 1500000, 10000, 399, 1234, 'Canada agency', 'Americas', 1632283200),
(2, 'India', 2000000, 3000, 200, 122, 'Indian agency', 'Asia', 1632283200),
(3, 'Algeria', 3000000, 2034, 300, 543, 'Algerian agency', 'Middle-east', 1632283200),
(4, 'USA', 3310000, 10000, 56857, 90876, 'American agency', 'Americas', 1632283200),
(5, 'UAE', 23124442, 32423, 654645, 32423, 'Emarati Agency', 'Asia', 1632283200),
(6, 'Pakistan', 32142452, 56857, 56857, 56857, 'Pakistani Agency', 'Asia', 1632283200),
(7, 'China', 76845432, 345436, 56857, 23423, 'Chinese Agency', 'Asia', 1632283200),
(8, 'Russia', 4213432, 34532, 654645, 345436, 'Russian Agency', 'Europe', 1632283200),
(9, 'Egypt', 1000000, 45346, 56857, 23423, 'Egyptian Agency', 'Africa', 1632283200),
(10, 'Kenya', 432545, 23423, 90876, 435436, 'Kenyan Agency', 'Africa', 1632283200),
(11, 'Japan', 4213412, 90876, 56857, 435436, 'Japanese Agency', 'Asia', 1632283200),
(12, 'North Korea', 1231245, 654645, 90876, 435436, 'Korean Agency', 'Asia', 1632283200),
(13, 'Brazil', 1353253, 435436, 90876, 23423, 'Brazilian Agency', 'Americas', 1632283200);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `email` varchar(255) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  `sent_date` bigint(20) DEFAULT NULL,
  `subject` text,
  `body` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`email`, `aID`, `sent_date`, `subject`, `body`) VALUES
('somaya@gmail.com', 2, 1632283202, 'This is the subject', 'This is the body'),
('fasgadae@gmail.com', 3, 1632283400, 'This is the subject', 'This is the body'),
('sami@gmail.com', 4, 1632285200, 'This is the subject', 'This is the body'),
('Adam@gmail.com', 5, 1632283300, 'This is the subject', 'This is the body'),
('karen@gmail.com', 6, 1632281200, 'This is the subject', 'This is the body');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

DROP TABLE IF EXISTS `organisations`;
CREATE TABLE IF NOT EXISTS `organisations` (
  `orgID` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) DEFAULT NULL,
  `org_type` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `resID` int(11) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  PRIMARY KEY (`orgID`),
  KEY `userID` (`userID`),
  KEY `aID` (`aID`),
  KEY `resID` (`resID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`orgID`, `org_name`, `org_type`, `userID`, `resID`, `aID`) VALUES
(1, 'covidhealthcare', 1, 2, NULL, 1),
(6, 'Korean agency', 1, 13, NULL, NULL),
(5, 'Not Covid 123', 2, 12, NULL, 8),
(4, 'Kenyan agency', 1, 11, NULL, NULL),
(3, 'Covid 123', 3, 7, NULL, 7),
(2, 'American agency', 1, 5, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

DROP TABLE IF EXISTS `researchers`;
CREATE TABLE IF NOT EXISTS `researchers` (
  `resID` int(11) NOT NULL AUTO_INCREMENT,
  `orgID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  PRIMARY KEY (`resID`),
  KEY `userID` (`userID`),
  KEY `orgID` (`orgID`),
  KEY `aID` (`aID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`resID`, `orgID`, `userID`, `aID`) VALUES
(1, NULL, 3, 2),
(2, 2, 8, 3),
(3, 3, 9, 4),
(4, 4, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `suspension_date` bigint(20) DEFAULT NULL,
  `cID` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `cID` (`cID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `citizenship`, `user_type`, `dob`, `suspension_date`, `cID`, `status`) VALUES
(1, 'admin', '1234', 'admin', 'admin', 'admin@gmail.com', '514123412', 'America', 1, '1999-09-01', NULL, 4, 1),
(2, 'covidhealthcare', '2222', 'WHO', 'WHO', 'Organisation@gmail.com', '514126333', 'Emirats', 2, '2000-03-24', NULL, 5, 1),
(3, 'Sam', '3333', 'samainder', 'khan', 'sam@gmail.com', '438123412', 'Korea', 3, '1989-09-01', NULL, 12, 1),
(4, 'sajistero3', '3333', 'sajeed', 'islam', 'saji@gmail.com', '438123412', 'China', 4, '1998-12-01', NULL, 7, 1),
(5, 'asd98', '1234', 'Adam', 'smith', 'Adam@gmail.com', '514126331', 'America', 2, '1999-09-01', NULL, 4, 1),
(6, 'sd3f3', '1234', 'ali', 'dawy', 'ali@gmail.com', '514126332', 'Emirats', 2, '1999-09-01', NULL, 5, 1),
(7, 'asfg3', '1234', 'karen', 'neri', 'karen1@gmail.com', '514126334', 'Pakistan', 3, '1999-09-01', NULL, 6, 1),
(8, 'hsdf4', '1234', 'somaya', 'pascale', 'somaya@gmail.com', '514126331', 'China', 3, '1999-09-01', NULL, 7, 1),
(9, 'ADSDW3', '1234', 'fasgadae', 'fsafse', 'fasgadae@gmail.com', '514126331', 'Russia', 3, '1999-09-01', NULL, 8, 1),
(10, 'FASFG76', '1234', 'sami', 'sameh', 'sami@gmail.com', '514126331', 'Egyptia', 3, '1999-09-01', NULL, 9, 1),
(11, 'FSAGEr3', '1234', 'aya', 'mossgs', 'aya@gmail.com', '351412633', 'Kenya', 2, '1999-09-01', NULL, 10, 1),
(12, 'fsafeh5', '1234', 'gsdr', 'ergfv', 'gsdr@gmail.com', '551412633', 'Japan', 3, '1999-09-01', NULL, 11, 1),
(13, '424fggb', '1234', 'karen', 'grigio', 'karen@gmail.com', '514126339', 'Korea', 2, '1999-09-01', NULL, 12, 1),
(14, '42224fggb', '12344', 'karen1', 'grig3io', 'kare2n@gmail.com', '514126539', 'Korea', 2, '1999-09-01', NULL, 12, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
