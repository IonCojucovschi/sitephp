-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2018 at 05:09 AM
-- Server version: 5.5.38-log
-- PHP Version: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ustiraspol`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `description` text,
  `rating` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `downloands_number` int(11) DEFAULT NULL,
  `download_linq` varchar(255) DEFAULT NULL,
  `image_linq` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `pasword` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `login`, `pasword`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, 'ion', 'nustiu', 'login', 'pass'),
(3, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(4, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(5, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(6, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(7, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(8, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(9, 'Ion', 'Cojucovschi', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(10, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(11, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(12, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(13, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(14, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(15, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(16, 'asdfasdf', 'asdfasdfasdf', 'cojucovschi@bk.ru', 'sdfgsfdgs'),
(17, 'fgwfg', 'sdfgsdfgsdfg', 'cojucovschsdfgi@bk.ru', 'sdfgsfdgs');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
