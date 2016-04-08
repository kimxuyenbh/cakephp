-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 12:24 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp`
--
CREATE DATABASE IF NOT EXISTS `cakephp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cakephp`;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TaxID` int(11) NOT NULL,
  `Phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IDProduct` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `Name`, `TaxID`, `Phone`, `IDProduct`) VALUES
(1, 'C01', 12, '12312312', 1),
(2, '1231', 12, '2342', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Price` double NOT NULL,
  `Created_date` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=346 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Photo`, `Description`, `Price`, `Created_date`) VALUES
(1, 'Dự án 1', 'duan1', 'dự án 1', 500000, '2000-02-23'),
(2, 'Dự án 2', 'duan2', 'dự án 2', 1000000, '1998-12-07'),
(3, 'Dự án 3', 'duan3', 'dự án 3', 1500000, '2009-12-08'),
(4, 'Dự án 4', 'duan4', 'dự án 4', 2000000, '2010-12-22'),
(5, 'Dự án 5', 'duan5', 'dự án 5', 3000000, '2011-12-14'),
(6, 'Dự án 6', 'duan6', 'Dự án 6', 4000000, '2013-02-09'),
(7, 'Dự án 7', 'duan7', 'Dự án 7', 5000000, '2014-09-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
