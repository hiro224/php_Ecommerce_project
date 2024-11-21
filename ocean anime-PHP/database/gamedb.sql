-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2024 at 03:08 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gamedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mesg` varchar(50) NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`con_id`, `name`, `email`, `phone`, `mesg`) VALUES
(1, 'hiro', 'hiro@gamil.com', '1224', '123444'),
(2, 'Min', 'min@gmail.com', '1224', '13324'),
(3, 'hi', 'hi@gmail.com', '1224', '128989889'),
(4, '', '', '', ''),
(5, 'kaung Myat Linn', 'jjj@gmail.com', '124971348913', 'difhskjvlsdjflnsv'),
(6, 'klkkk', 'jkdflksjal@gmail.com', '12472974', 'jsvkldnerwondv'),
(7, 'jlkjljlj', 'eeee@gmail.com', '13353543', 'khkjhjlkj'),
(8, 'fjsdkklfjlkj', 'jklfnsklvn@gmail.com', '124897198', 'jvndkleoifj'),
(9, 'fjsdkklfjlkj', 'jklfnsklvn@gmail.com', '124897198', 'jvndkleoifj'),
(10, 'winnnn', 'winnn@gmail.com', '1224', '209384023958'),
(11, 'jdfjnvkdsjf', 'jfnsdvdj@gmail.com', '8204982309', 'jdsvndksjfdao');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  `prod_no` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `img`, `prod_no`, `price`) VALUES
(17, 'an1.jpg', 'Gara figure', '120000 Ks'),
(18, 'sanji.jpg', 'Sanji LX studio Bootleg', '30000 Ks'),
(19, 'dr1.jpg', 'skin care', '50$'),
(20, 'earbug 1.jpg', 'Earbug', '500$');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(11) NOT NULL AUTO_INCREMENT,
  `productno` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `order_no` varchar(30) NOT NULL,
  PRIMARY KEY (`ord_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord_id`, `productno`, `price`, `name`, `phone`, `address`, `order_no`) VALUES
(1, 'Gara figure', '120000 Ks', 'min', '12222222', 'yangon', 'ord498'),
(2, 'Gara figure', '120000 Ks', 'kaung myat', '2749374', 'vndlnvksdjf', 'ord256'),
(3, 'Sanji LX studio Bootleg', '30000 Ks', '', '', '', 'ord380'),
(4, 'Gara figure', '120000 Ks', 'wannnn', '94723947', 'djslvnwekncd', 'ord309');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `township` varchar(30) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `name`, `email`, `password`, `phone`, `city`, `township`) VALUES
(1, 'hiro', 'hiro@gamil.com', '1224', '123444', 'Yangon', 'Myanmar'),
(2, 'Min', 'min@gmail.com', '1224', '13324', 'Yangon', 'Myanmar'),
(3, 'hi', 'hi@gmail.com', '1224', '128989889', 'yangon', 'Myanmar (Burma)'),
(4, '', '', '', '', '', ''),
(5, 'kaung Myat Linn', 'jjj@gmail.com', '1249713489', 'difhskjvlsdjflnsv', '', ''),
(6, 'klkkk', 'jkdflksjal@gmail.com', '12472974', 'jsvkldnerwondv', '', ''),
(7, 'jlkjljlj', 'eeee@gmail.com', '13353543', 'khkjhjlkj', '', ''),
(8, 'fjsdkklfjlkj', 'jklfnsklvn@gmail.com', '124897198', 'jvndkleoifj', '', ''),
(9, 'fjsdkklfjlkj', 'jklfnsklvn@gmail.com', '124897198', 'jvndkleoifj', '', ''),
(10, 'winnnn', 'winnn@gmail.com', '1224', '209384023958', 'cnnioevn', 'nvoieniovn'),
(11, 'jdfjnvkdsjf', 'jfnsdvdj@gmail.com', '8204982309', 'jdsvndksjfdao', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `pass`) VALUES
('admin', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
