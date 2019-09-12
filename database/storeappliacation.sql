-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2019 at 12:16 PM
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
-- Database: `storeappliacation`
--
CREATE DATABASE IF NOT EXISTS `storeappliacation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `storeappliacation`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item-name` varchar(100) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_description` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 COMMENT='item description table';

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item-name`, `item_quantity`, `item_price`, `item_description`) VALUES
(34, 'BaseBall', 10, 900, 'My Baseball Stock'),
(36, 'Cricket Bat', 200, 4000, 'My Cricket Stock'),
(37, 'Cricket Ball', 80, 150, 'My Cricket balls collection'),
(38, 'Tennis', 12, 1200, 'Tennis Racket Made in India');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL,
  `status` set('0','1') NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `quantity_purchased`, `item_id`, `status`, `order_date`) VALUES
(1, 19, 1, 12, '0', '2019-09-12 12:49:45'),
(2, 19, 1, 12, '0', '2019-09-12 12:53:04'),
(3, 19, 1, 12, '0', '2019-09-12 12:53:04'),
(4, 19, 2, 15, '0', '2019-09-12 12:53:04'),
(5, 19, 1, 12, '0', '2019-09-12 12:53:04'),
(6, 19, 2, 15, '0', '2019-09-12 12:53:04'),
(7, 19, 1, 23, '0', '2019-09-12 12:53:04'),
(8, 19, 1, 29, '0', '2019-09-12 12:56:55'),
(9, 19, 1, 16, '0', '2019-09-12 12:59:29'),
(10, 19, 1, 13, '0', '2019-09-12 12:59:29'),
(11, 19, 2, 13, '0', '2019-09-12 13:01:56'),
(12, 19, 1, 12, '0', '2019-09-12 13:01:56'),
(13, 19, 2, 12, '0', '2019-09-12 13:02:38'),
(14, 19, 1, 13, '0', '2019-09-12 13:02:38'),
(15, 19, 1, 12, '0', '2019-09-12 13:03:28'),
(16, 19, 1, 13, '0', '2019-09-12 13:03:28'),
(17, 19, 1, 12, '0', '2019-09-12 13:07:13'),
(18, 19, 1, 13, '0', '2019-09-12 13:07:13'),
(19, 19, 1, 12, '0', '2019-09-12 13:07:57'),
(20, 19, 1, 13, '0', '2019-09-12 13:07:57'),
(21, 19, 1, 12, '0', '2019-09-12 13:08:33'),
(22, 19, 1, 13, '0', '2019-09-12 13:08:33'),
(23, 19, 1, 12, '0', '2019-09-12 13:14:24'),
(24, 19, 1, 13, '0', '2019-09-12 13:14:24'),
(25, 19, 1, 12, '0', '2019-09-12 13:16:07'),
(26, 19, 1, 13, '0', '2019-09-12 13:16:07'),
(27, 19, 1, 26, '0', '2019-09-12 17:00:02'),
(28, 19, 1, 12, '0', '2019-09-12 17:00:02'),
(29, 19, 1, 13, '0', '2019-09-12 17:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `userdetail`
--

DROP TABLE IF EXISTS `userdetail`;
CREATE TABLE IF NOT EXISTS `userdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` set('ADMIN','CLIENT') NOT NULL DEFAULT 'CLIENT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetail`
--

INSERT INTO `userdetail` (`id`, `email`, `name`, `dob`, `contact`, `address`, `password`, `user_type`) VALUES
(1, 'sfgd', 'ddd', 'ss', 788, 'ss', 'ssddd', 'CLIENT'),
(2, 'wertyu', 'rtk', '1998-01-01', 45678, 'xcvbnm,', 'fghjkl', 'CLIENT'),
(3, 'wertyu@gmi', '12345', '1996-02-01', 456789, 'hjkl', 'dfgh', 'CLIENT'),
(4, 'sf@afd', 'xfbxfbfx', '1998-02-02', 85269, 'dfghjk', 'dfgh', 'CLIENT'),
(5, 'wertyu@gmi', 'asd', '1997-01-01', 2345678, 'sdfghjksdfghk', 'fghjk', 'CLIENT'),
(6, 'wertyu@gmi', 'asd', '1997-01-01', 2345678, 'sdfghjksdfghk', 'fghjk', 'CLIENT'),
(7, 'wertyu@gmi', '12345', '10091-01-01', 23456, 'hrt', 'sdfgh', 'CLIENT'),
(8, 'wertyu@gmi', '12345', '10091-01-01', 23456, 'hrt', 'sdfgh', 'CLIENT'),
(9, 'wertyu@gmi', '12', '2019-09-10', 23456, 'aesr', 'erdt', 'CLIENT'),
(10, 'wertyu@gmi', '12', '2019-09-10', 23456, 'aesr', 'erdt', 'CLIENT'),
(11, 'wertyu@gmi', 'asdfgh', '2019-09-18', 1234567896, '4542', '456321', 'CLIENT'),
(12, 'wertyu@gmi', 'asdfgh', '2019-09-18', 1234567896, '4542', '456321', 'CLIENT'),
(13, 'pankaj@gmail.com', 'pankaj ', '2019-09-12', 1234567891, 'nanital', 'password', 'CLIENT'),
(14, 'pankaj1@gmail.com', 'xc', '2019-09-26', 1234567890, 'dfgh', 'hhh', 'CLIENT'),
(15, 'pankaj1@gmail.com', 'rtyu', '2019-09-12', 1234567890, 'sdfghjk', '678', 'CLIENT'),
(16, 'pankaj1@gmail.com', 'rtyu', '2019-09-12', 1234567890, 'sdfghjk', '678', 'CLIENT'),
(17, 'p1@gmail.com', 'dfghjk', '2019-09-19', 1231231231, 'cvbnm,', '123', 'CLIENT'),
(18, 'pankaj13323@gmail.com', 'sasadsad', '2019-09-12', 1234567890, 'sadsad', '12345', 'ADMIN'),
(19, 'kiranGood@gmail.com', 'Kilme', '2019-09-11', 11123434, 'sadsad', 'admin', 'CLIENT'),
(20, 'kiranGood@gmail.com', 'Kilme', '2019-09-11', 11123434, 'sadsad', 'admin', 'CLIENT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
