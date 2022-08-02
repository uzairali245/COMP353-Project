-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 02, 2022 at 09:46 PM
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
  `artID` int(11) NOT NULL AUTO_INCREMENT,
  `publish_date` timestamp NULL DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `major_topic` varchar(255) DEFAULT NULL,
  `minor_topic` varchar(255) DEFAULT NULL,
  `discription` text,
  `removal_date` timestamp NULL DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`artID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `aID` int(11) NOT NULL,
  `subscribers` int(11) DEFAULT NULL,
  `resID` int(11) DEFAULT NULL,
  `orgID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`aID`),
  KEY `resID` (`resID`),
  KEY `orgID` (`orgID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `report_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `email` varchar(255) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  `sent_date` timestamp NULL DEFAULT NULL,
  `subject` text,
  `body` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `suspension_date` timestamp NULL DEFAULT NULL,
  `cID` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `cID` (`cID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
