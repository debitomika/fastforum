-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 17, 2014 at 10:58 AM
-- Server version: 5.1.46
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fast`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nama_data` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`no`, `nama_data`, `deskripsi`, `gambar`) VALUES
(16, 'semoga', 'berhasil amin', 'image/image mL6WIMHr0aPL .png'),
(17, 'akhirnya berhasil', 'juga', '/image/image fT8LVJdaVlJl .png'),
(18, '', '', '/image/image 5XbxSqQ8QJ2Z .png'),
(19, 'test refresh', 'akhirnya bentar', '/image/image qK7Te8tDVSKf .png'),
(20, '', '', '/image/image Ip4W3zCixrkd .png');
