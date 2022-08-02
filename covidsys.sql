-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 02, 2022 at 11:10 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

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

CREATE TABLE `articles` (
  `artID` int(11) NOT NULL,
  `publish_date` timestamp NULL DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `major_topic` varchar(255) DEFAULT NULL,
  `minor_topic` varchar(255) DEFAULT NULL,
  `discription` text,
  `removal_date` timestamp NULL DEFAULT NULL,
  `aID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `aID` int(11) NOT NULL,
  `subscribers` int(11) DEFAULT NULL,
  `resID` int(11) DEFAULT NULL,
  `orgID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `cID` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `populations` int(11) DEFAULT NULL,
  `deaths` int(11) DEFAULT NULL,
  `infected` int(11) DEFAULT NULL,
  `vaccinated` int(11) DEFAULT NULL,
  `gov_agency` varchar(255) DEFAULT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `report_date` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`cID`, `country_name`, `populations`, `deaths`, `infected`, `vaccinated`, `gov_agency`, `region_name`, `report_date`) VALUES
(1, 'Canada', 1500000, 10000, 399, 1234, 'Canada agency', 'Americas', 1632283200),
(2, 'India', 2000000, 3000, 200, 122, 'Indian agency', 'Asia', 1632283200),
(3, 'Algeria', 3000000, 2034, 300, 543, 'Algerian agency', 'Middle-east', 1632283200);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
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

CREATE TABLE `organisations` (
  `orgID` int(11) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `org_type` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `resID` int(11) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `resID` int(11) NOT NULL,
  `orgID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `aID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
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
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `citizenship`, `user_type`, `dob`, `suspension_date`, `cID`, `status`) VALUES
(1, 'admin', '1234', 'admin', 'admin', 'admin@gmail.com', '514123412', NULL, 1, '1999-09-01', NULL, NULL, 1),
(2, 'covidhealthcare', '2222', 'WHO', 'WHO', 'Organisation@gmail.com', '514126333', NULL, 2, '2000-03-24', NULL, NULL, 1),
(3, 'Sam', '3333', 'samainder', 'khan', 'sam@gmail.com', '438123412', NULL, 3, '1989-09-01', NULL, NULL, 1),
(4, 'sajistero3', '3333', 'sajeed', 'islam', 'saji@gmail.com', '438123412', NULL, 4, '1998-12-01', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`artID`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`aID`),
  ADD KEY `resID` (`resID`),
  ADD KEY `orgID` (`orgID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`orgID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `aID` (`aID`),
  ADD KEY `resID` (`resID`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`resID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `orgID` (`orgID`),
  ADD KEY `aID` (`aID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cID` (`cID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `artID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `orgID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `resID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
