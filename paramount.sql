-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2021 at 09:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paramount`
--

-- --------------------------------------------------------

--
-- Table structure for table `patientrecord`
--

DROP TABLE IF EXISTS `patientrecord`;
CREATE TABLE IF NOT EXISTS `patientrecord` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pno` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `lnp` date NOT NULL,
  `sp` varchar(300) NOT NULL,
  `dob` date NOT NULL,
  `refdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientrecord`
--

INSERT INTO `patientrecord` (`id`, `pno`, `name`, `tel`, `address`, `ptype`, `lnp`, `sp`, `dob`, `refdate`) VALUES
(1, 'PSH89484', 'Adeojo Seun', '08065241920', 'Akure, Ondo State', 'LONG', '2020-01-20', '2', '1987-04-05', '2020-01-24'),
(2, 'PSH58491', 'Adeleke Blessing', '08065241920', 'Ikere Ekiti', 'SHORT', '2020-01-02', '11', '2020-01-02', '2020-01-24'),
(3, '20193301', 'Afolabi Olabanke', '08030640109', 'Akure, Ondo State', 'LONG', '2020-01-03', '1', '1987-03-04', '2020-01-24'),
(4, 'PSH59904', 'Adeleke Blessing Ojo', '08065241920', 'Ondo, Ondo State', 'LONG', '2020-02-02', '4', '2002-01-03', '2020-01-24'),
(5, 'PSH15880', 'Adeojo Seun', '08030640109', 'Akure, Ondo State', 'SHORT', '2020-02-08', '11', '1990-01-01', '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `protocol`
--

DROP TABLE IF EXISTS `protocol`;
CREATE TABLE IF NOT EXISTS `protocol` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pid` int(12) NOT NULL,
  `title` varchar(300) NOT NULL,
  `days` int(12) NOT NULL,
  `typ` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `protocol`
--

INSERT INTO `protocol` (`id`, `pid`, `title`, `days`, `typ`) VALUES
(1, 1, 'LMP', 0, 'LONG'),
(2, 2, 'Downregulation (GNRH) Start', 21, 'LONG'),
(3, 3, 'Another Menstral Cycle expected', 7, 'LONG'),
(4, 4, 'Stimulation Begins (HMG)', 1, 'LONG'),
(5, 5, 'Ultra Sound Scan and Continuation of Stimulation', 7, 'LONG'),
(6, 6, 'HCG (Triger)', 4, 'LONG'),
(7, 7, 'Egg Retrieval/Sperm Collection', 2, 'LONG'),
(8, 8, 'Embryo Transfer', 3, 'LONG'),
(9, 9, 'Embryo Transfer', 2, 'LONG'),
(10, 10, 'Pregnancy Test', 12, 'LONG'),
(11, 11, 'Pregnancy Test', 2, 'LONG'),
(12, 12, 'HMG + GNRH (Stimulation + Downregulation)', 0, 'SHORT'),
(13, 13, 'Ultra Sound Scan and Continuation of Stimulation', 7, 'SHORT'),
(14, 14, 'HCG (Triger)', 4, 'SHORT'),
(15, 15, 'Egg Retrieval/Sperm Collection', 2, 'SHORT'),
(16, 16, 'Embryo Transfer', 3, 'SHORT'),
(17, 17, 'Embryo Transfer', 2, 'SHORT'),
(18, 18, 'Pregnancy Test', 12, 'SHORT'),
(19, 19, 'Pregnancy Test', 2, 'SHORT'),
(20, 20, 'Withdrawal Bleeding', 0, 'RECIEPIENT(NON MENSTRATING)'),
(21, 21, 'Oestrogen Buildup', 1, 'RECIEPIENT(NON MENSTRATING)'),
(22, 22, 'Egg Retrieval/Sperm Collection/Progesteron', 15, 'RECIEPIENT(NON MENSTRATING)'),
(23, 23, 'Embryo Transfer', 2, 'RECIEPIENT(NON MENSTRATING)'),
(24, 24, 'Embryo Transfer', 2, 'RECIEPIENT(NON MENSTRATING)'),
(25, 25, 'Pregnancy Test', 12, 'RECIEPIENT(NON MENSTRATING)'),
(26, 26, 'Pregnancy Test', 2, 'RECIEPIENT(NON MENSTRATING)'),
(27, 27, 'Downregulation (GNRH) Start', 0, 'RECIEPIENT(MENSTRATING)'),
(28, 28, 'LMP', 7, 'RECIEPIENT(MENSTRATING)'),
(29, 29, 'Oestrogen Buildup', 1, 'RECIEPIENT(MENSTRATING)'),
(30, 30, 'Egg Retrieval/Sperm Collection/Progesteron', 15, 'RECIEPIENT(MENSTRATING)'),
(31, 31, 'Embryo Transfer', 2, 'RECIEPIENT(MENSTRATING)'),
(32, 32, 'Embryo Transfer', 2, 'RECIEPIENT(MENSTRATING)'),
(33, 33, 'Pregnancy Test', 12, 'RECIEPIENT(MENSTRATING)'),
(34, 34, 'Pregnancy Test', 2, 'RECIEPIENT(MENSTRATING)');

-- --------------------------------------------------------

--
-- Table structure for table `protocol2`
--

DROP TABLE IF EXISTS `protocol2`;
CREATE TABLE IF NOT EXISTS `protocol2` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pid` int(12) NOT NULL,
  `title` varchar(300) NOT NULL,
  `days` int(12) NOT NULL,
  `typ` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `protocol2`
--

INSERT INTO `protocol2` (`id`, `pid`, `title`, `days`, `typ`) VALUES
(1, 1, 'LMP', 0, 'LONG'),
(2, 2, 'Downregulation (GNRH) Start', 21, 'LONG'),
(3, 3, 'Another Menstral Cycle expected', 7, 'LONG'),
(4, 4, 'Stimulation Begins (HMG)', 1, 'LONG'),
(5, 5, 'Ultra Sound Scan and Continuation of Stimulation', 7, 'LONG'),
(6, 6, 'HCG (Triger)', 4, 'LONG'),
(7, 7, 'Egg Retrieval', 2, 'LONG'),
(8, 8, 'Embryo Transfer', 3, 'LONG'),
(9, 9, 'Embryo Transfer', 2, 'LONG'),
(10, 10, 'Pregnancy Test', 12, 'LONG'),
(11, 11, 'Pregnancy Test', 2, 'LONG'),
(12, 12, 'HMG + GNRH (Stimulation + Downregulation)', 0, 'SHORT'),
(13, 13, 'Ultra Sound Scan and Continuation of Stimulation', 7, 'SHORT'),
(14, 14, 'HCG (Triger)', 4, 'SHORT'),
(15, 15, 'Egg Retrieval', 2, 'SHORT'),
(16, 16, 'Embryo Transfer', 3, 'SHORT'),
(17, 17, 'Embryo Transfer', 2, 'SHORT'),
(18, 18, 'Pregnancy Test', 12, 'SHORT'),
(19, 19, 'Pregnancy Test', 2, 'SHORT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
