-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2021 at 06:56 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nkya`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(50) NOT NULL,
  `bdate` varchar(50) NOT NULL DEFAULT,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `bname`, `bdate`) VALUES
(3, 'fdyeyeetytyyt', '2021-08-30 00:27:59'),
(4, 'trytrytryvbgdhgfhgfhgf', '2021-08-30 00:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `candName` varchar(50) NOT NULL,
  `pos` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cid`, `candName`, `pos`) VALUES
(7, 'erick', 'ceo'),
(5, 'Rajab Eliud', 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pos` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pid`, `pos`) VALUES
(13, 'Rajab Eliud'),
(15, 'ceo'),
(7, 'HOD');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `result` varchar(50) NOT NULL,
  `voter` varchar(50) NOT NULL,
  `yangu` varchar(50) NOT NULL,
  PRIMARY KEY (`rid`),
  UNIQUE KEY `yangu` (`yangu`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `bid`, `result`, `voter`, `yangu`) VALUES
(4, 4, 'NO', 'me', '4me'),
(3, 1, 'YES', 'me', '1me'),
(5, 3, 'YES', 'you', '3you'),
(6, 4, 'YES', 'you', '4you'),
(7, 3, 'NO', 'we', '3we'),
(8, 4, 'YES', 'we', '4we');

-- --------------------------------------------------------

--
-- Table structure for table `userz`
--

DROP TABLE IF EXISTS `userz`;
CREATE TABLE IF NOT EXISTS `userz` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `passwordz` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'user',
  `statuz` varchar(50) NOT NULL DEFAULT 'inactive',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userz`
--

INSERT INTO `userz` (`uid`, `username`, `fullname`, `phone`, `passwordz`, `usertype`, `statuz`) VALUES
(3, 'ooooooo', 'oooooo', 78676767, '$2y$10$.ltxSmdtzaK47sFatwhOK.7xMdUFo3Y/p3Y8X0LiM63f2853X7fK2', 'user', 'active'),
(5, 'me', 'mimi', 45454, '$2y$10$f65YpYVHq/kNmOSjcxStp.LIv5bnep7ZC58Gl1opY0Wt0swIm8acq', 'user', 'active'),
(4, 'ryttr', 'yuuyt', 97977, '$2y$10$TrQBOkdY91gOpvpEH0QhueDLqFL/6w1ntdsGOIgifEq5eD2s4Grkq', 'user', 'active'),
(6, 'you', 'you', 767676, '$2y$10$dQL2.GITw8r9yeJP..Pqq.NyG0DzgL3hwsDNPjUSzXPZXYPoBcJw.', 'user', 'active'),
(7, 'we', 'we', 65646, '$2y$10$AqERSwHeXtmN/abOHH5pWeAXS2lfzxn3G78/ChDAHFiBQUfV4EslW', 'Admin', 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
