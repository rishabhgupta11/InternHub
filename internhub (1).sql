-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2020 at 04:22 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `SNo` int(3) NOT NULL AUTO_INCREMENT,
  `postNo` bigint(8) NOT NULL,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `CVfile` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Reviewing','Rejected','Shortlisted') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Reviewing',
  PRIMARY KEY (`SNo`),
  KEY `postNo` (`postNo`),
  KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cv_details`
--

DROP TABLE IF EXISTS `cv_details`;
CREATE TABLE IF NOT EXISTS `cv_details` (
  `CVfile` bigint(7) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Mobile` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Qualification1` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `Institute1` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Grade1` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Year1` int(5) NOT NULL,
  `Qualification2` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `Institute2` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Grade2` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Year2` int(5) DEFAULT NULL,
  `Qualification3` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `Institute3` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Grade3` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Year3` int(5) DEFAULT NULL,
  `Qualification4` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `Institute4` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Grade4` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Year4` int(5) DEFAULT NULL,
  `Qualification5` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `Institute5` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Grade5` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Year5` int(5) DEFAULT NULL,
  `Type1` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Company1` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Title1` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Duration1` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Type2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Company2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Title2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Duration2` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Type3` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Company3` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Title3` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Duration3` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Type4` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Company4` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Title4` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Duration4` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Type5` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Company5` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Title5` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Duration5` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill1` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill3` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill4` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill5` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill6` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill7` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill8` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill9` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Skill10` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Link` varchar(1000) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`CVfile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

DROP TABLE IF EXISTS `invite`;
CREATE TABLE IF NOT EXISTS `invite` (
  `SNo` int(4) NOT NULL AUTO_INCREMENT,
  `companyEmail` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `studentEmail` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`SNo`),
  KEY `companyEmail` (`companyEmail`),
  KEY `studentEmail` (`studentEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postNo` bigint(8) NOT NULL AUTO_INCREMENT,
  `Title` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `companyName` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `companyEmail` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Domain` enum('Web Development','App Development','UI/UX Design','Software Testing') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Duration` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `City` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Stipend` bigint(7) NOT NULL,
  `Description` varchar(2000) COLLATE latin1_general_ci NOT NULL,
  `Requirements` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `Status` enum('Open','Closed') COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`postNo`),
  KEY `Company` (`companyEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `Type` enum('Student','Company') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_cv`
--

DROP TABLE IF EXISTS `user_cv`;
CREATE TABLE IF NOT EXISTS `user_cv` (
  `SNo` int(3) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `CVfile` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`SNo`),
  KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`postNo`) REFERENCES `post` (`postNo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`companyEmail`) REFERENCES `user` (`Email`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `invite_ibfk_2` FOREIGN KEY (`studentEmail`) REFERENCES `user` (`Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`companyEmail`) REFERENCES `user` (`Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_cv`
--
ALTER TABLE `user_cv`
  ADD CONSTRAINT `user_cv_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `user` (`Email`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
