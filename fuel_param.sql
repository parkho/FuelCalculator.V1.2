-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2013 at 08:56 AM
-- Server version: 5.5.32-cll
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parkhoir_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `fuel_param`
--

CREATE TABLE IF NOT EXISTS `fuel_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aircraft` varchar(12) NOT NULL DEFAULT '',
  `flow` int(12) NOT NULL DEFAULT '0',
  `hour` int(12) NOT NULL DEFAULT '0',
  `frange` int(12) NOT NULL,
  `speed` int(12) NOT NULL DEFAULT '0',
  `alt` int(12) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aircraft` (`aircraft`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
