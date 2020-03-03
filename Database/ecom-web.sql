-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2020 at 02:30 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom-web`
--
CREATE DATABASE IF NOT EXISTS `ecom-web` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecom-web`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

DROP TABLE IF EXISTS `admin_register`;
CREATE TABLE IF NOT EXISTS `admin_register` (
  `ad_id` int(10) NOT NULL AUTO_INCREMENT,
  `ad_username` varchar(50) NOT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_phone` varchar(50) NOT NULL,
  `ad_password` varchar(50) NOT NULL,
  `ad_address` varchar(90) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`ad_id`, `ad_username`, `ad_email`, `ad_phone`, `ad_password`, `ad_address`) VALUES
(2, 'pp1', 'pp@gmail.com1', '01234567891', '81dc9bdb52d04dc20036dbd8313ed055', 'Phnom Penh, Cambodia1'),
(3, 'Vichea', 'Vichea@gmail.com', '0123456789', '81dc9bdb52d04dc20036dbd8313ed055', 'Phnom Penh, Cambodia'),
(4, 'admin', 'admin@gmail.com', '0123456789', '81dc9bdb52d04dc20036dbd8313ed055', 'Phnom Penh, Cambodia'),
(5, 'PichVichea', 'PichVichea@gmail.com', '0123456789', 'e10adc3949ba59abbe56e057f20f883e', 'Phnom Penh, Cambodia'),
(6, 'PVC', 'pp@gmail.com', '0123456789', '25f9e794323b453885f5181f1b624d0b', 'Phnom Penh, Cambodia');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL,
  `page_des` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_title` varchar(90) NOT NULL,
  `pro_price` int(10) NOT NULL,
  `available_id` int(10) NOT NULL,
  `pro_des` varchar(255) NOT NULL,
  `pro_img1` varchar(90) NOT NULL,
  `pro_img2` varchar(90) NOT NULL,
  `pro_img3` varchar(90) NOT NULL,
  `pro_img4` varchar(90) NOT NULL,
  `pro_keyword` varchar(50) NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pro_avai`
--

DROP TABLE IF EXISTS `pro_avai`;
CREATE TABLE IF NOT EXISTS `pro_avai` (
  `available_id` int(10) NOT NULL AUTO_INCREMENT,
  `available_name` varchar(50) NOT NULL,
  PRIMARY KEY (`available_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pro_category`
--

DROP TABLE IF EXISTS `pro_category`;
CREATE TABLE IF NOT EXISTS `pro_category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` char(30) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pro_type`
--

DROP TABLE IF EXISTS `pro_type`;
CREATE TABLE IF NOT EXISTS `pro_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` char(30) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

DROP TABLE IF EXISTS `user_register`;
CREATE TABLE IF NOT EXISTS `user_register` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_firstname` char(15) NOT NULL,
  `user_lastname` char(30) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_address` varchar(90) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `user_firstname`, `user_lastname`, `user_username`, `user_email`, `user_phone`, `user_address`, `user_password`) VALUES
(1, 'OR', 'Pichvichea', 'Pichvichea', 'pichvicheaor9@gmail.com', '0123456789', 'Sen sok, Phnom Penh, Cambodia', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
