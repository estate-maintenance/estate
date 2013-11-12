-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2013 at 08:00 AM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `123`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `username` varchar(100) NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `Lab` char(20) DEFAULT NULL,
  `Toilet` char(10) DEFAULT NULL,
  `Office` char(20) DEFAULT NULL,
  `Classroom` char(10) DEFAULT NULL,
  `description` tinyint(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `area` tinyint(2) NOT NULL,
  `room` varchar(50) NOT NULL,
  `timing` tinyint(3) unsigned NOT NULL,
  `timedesc` char(10) DEFAULT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactPerson` varchar(100) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `descText` mediumtext NOT NULL,
  `finishedTime` text NOT NULL,
  `dispatchedTime` text NOT NULL,
  `indent_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`username`, `id`, `name`, `designation`, `location`, `Lab`, `Toilet`, `Office`, `Classroom`, `description`, `time`, `processed`, `area`, `room`, `timing`, `timedesc`, `contact`, `email`, `contactPerson`, `contactNumber`, `descText`, `finishedTime`, `dispatchedTime`, `indent_status`) VALUES
('205111060', 1, 'M Yusuf', 'Student', 'Agate', '', '', '', '', 1, '2013-02-28 09:30:51', 2, 1, '141', 1, NULL, '8015458487', '205111060', 'ccc', '9489066206', '', '06/04/2013 18:48:24', '07/03/2013 19:17:52', 0),
('tech1', 2, 'Test', 'Student', 'Agate', '', '', '', '', 1, '2013-03-06 08:15:38', 2, 1, '21', 7, NULL, '1234567890', 'tech1', 'aaa', '2222222222', 'Problem', '06/03/2013 13:47:11', '', 1),
('msmoorthy', 3, 'M Sooriyammorthy', 'Staff', 'G', '', '', '', '', 2, '2013-03-07 09:28:57', 2, 2, '26', 7, NULL, '9486001188', 'msmoorthy', 'bbb', '9486001188', 'TL not working', '06/04/2013 18:48:37', '', 1),
('user1', 4, 'RAVIKUMAR P', 'Staff', 'Admin Block', '', '', '', '', 2, '2013-03-07 09:59:07', 2, 5, 'NotApplicable', 8, NULL, '9442571452', 'user1', 'ddd', '9489066206', '', '06/04/2013 18:48:34', '', 1),
('msmoorthy', 5, 'M Sooriyammorthy', 'Staff', 'B', '', '', '', '', 63, '2013-03-11 08:57:06', 2, 2, '256', 7, NULL, '9486001188', 'msmoorthy', 'bbb', '9489066206', 'test', '11/03/2013 15:27:26', '11/03/2013 14:34:13', 1),
('user1', 6, 'sooriyamoorthy', 'Staff', 'Agate', '', '', '', '', 8, '2013-03-11 10:32:04', 2, 1, '269', 7, NULL, '9486001188', 'user1', 'ddd', '9489066206', '', '06/04/2013 18:48:32', '', 1),
('user1', 7, 'nallathambi', 'Staff', 'H', '', '', '', '', 4, '2013-03-11 11:05:26', 2, 2, '16', 7, NULL, '9489066205', 'user1', 'ddd', '9489066205', '', '11/03/2013 16:40:22', '', 1),
('msmoorthy', 8, 'Sooriyammorthy', 'Staff', '7', '', '', '', '', 2, '2013-04-04 12:25:14', 2, 2, '26', 7, NULL, '9486001188', 'msmoorthy', 'aaa', '9489066206', '', '06/04/2013 18:43:13', '', 1),
('user1', 9, 'arumugam', 'Student', 'Agate', '', '', '', '', 1, '2013-04-06 12:08:45', 2, 1, '126', 7, NULL, '9489066205', 'user1', 'ddd', '9489066205', '', '06/04/2013 18:42:23', '', 1),
('user1', 10, 'Suresh Kumar G', 'Staff', '13-A', '', '', '', '', 48, '2013-07-10 06:12:02', 2, 2, '25', 7, NULL, '9677663669', 'user1', 'ddd', '8887775540', '', '10/07/2013 11:55:37', '10/07/2013 11:43:57', 1),
('user1', 11, 'xxx', 'Student', 'Mess A', '', '', '', '', 2, '2013-07-10 06:36:23', 2, 4, 'NotApplicable', 7, NULL, '1234567890', 'user1', 'bbb', '9638521470', 'Rotor may be fault', '12/07/2013 14:37:49', '', 1),
('user1', 12, 'xxx', 'Staff', 'Agate', '', '', '', '', 1, '2013-07-10 06:45:34', 2, 1, '16', 1, NULL, '1234567890', 'user1', 'bbb', '9638521470', '', '12/07/2013 14:37:47', '', 1),
('user1', 13, 'xxx', 'Staff', 'Architecture', '', '', '', '', 10, '2013-07-10 06:46:56', 2, 3, 'NotApplicable', 8, NULL, '1234567890', 'user1', 'ccc', '8523699870', '', '12/07/2013 14:37:44', '', 1),
('msmoorthy', 14, 'M Sooriyammorthy', 'Staff', '7', '', '', '', '', 1, '2013-07-12 08:44:09', 2, 2, '26', 7, NULL, '9486001188', 'msmoorthy', 'aaa', '9489066206', '', '12/07/2013 14:37:32', '12/07/2013 14:21:07', 1),
('user1', 15, 'M Sooriyammorthy', 'Faculty', 'Admin Block', '', '', '', '', 1, '2013-07-12 10:16:24', 1, 5, 'NotApplicable', 8, NULL, '2503835', 'user1', 'ddd', '4564654464', '', '', '', 1),
('user1', 16, 'msmoorthy', 'Student', 'Architecture', '', '', '', '', 16, '2013-07-12 10:24:22', 1, 3, 'NotApplicable', 8, NULL, '9489066205', 'user1', 'aaa', '9696969696', '', '', '', 1),
('205111013', 17, 'Sk', 'Student', 'Megamess-I', '', '', '', '', 63, '2013-07-13 04:52:46', 1, 1, '151', 0, NULL, '9629587387', '205111013', 'Ram', '5656565656', 'Everything not working', '', '13/07/2013 10:23:50', 1),
('user1', 18, 'Test', 'Student', 'Aquamarine-A', '', '', '', '', 63, '2013-07-15 12:56:01', 1, 1, '151', 1, NULL, '9629587387', 'user1', 'ccc', '9595959595', '', '', '2013-07-15 18:26:37', 1),
('user1', 19, 'Ser', 'Student', '11', '', '', '', '', 63, '2013-07-15 13:04:29', 1, 2, '12', 7, NULL, '9696969696', 'user1', '123', '1231231234', '', '', '2013-07-15 18:35:11', 1),
('user1', 20, 'Textbo', 'Student', 'Agate', '', '', '', '', 32, '2013-07-15 13:22:08', 1, 1, '12', 7, NULL, '9659659658', 'user1', 'ABCD', '9696969696', '', '', '15/07/2013 19:04:02', 1),
('user1', 21, 'Try', 'Staff', '1', '', '', '', '', 4, '2013-07-15 13:22:24', 1, 2, '23', 7, NULL, '8181818181', 'user1', 'Ad', '9696969696', '', '', '2013-07-15 19:19:19', 1),
('user1', 22, 'Treyr', 'Student', '1', '', '', '', '', 32, '2013-07-15 13:53:50', 1, 2, '121', 7, NULL, '9629587387', 'user1', 'Try', '9696969696', '', '', '15/07/2013 19:26:34', 1),
('user1', 23, 'Fgr', 'Student', 'Aquamarine-A', '', '', '', '', 32, '2013-07-15 15:04:40', 1, 1, '125', 1, NULL, '9629587387', 'user1', 'Frt', '9696969696', '', '', '15/07/2013 20:41:09', 1),
('user1', 24, 'payal', 'Faculty', 'Agate', '', '', '', '', 20, '2013-10-22 00:13:02', 0, 1, '12', 1, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 25, 'payal', 'Student', 'Agate', '', '', '', '', 20, '2013-11-05 06:15:17', 0, 1, '12', 1, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 26, 'payal', 'Student', '1', '', '', '', '', 32, '2013-11-05 06:21:11', 0, 2, '12', 7, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 27, 'neha', 'Student', 'Agate', '', '', '', '', 40, '2013-11-05 06:57:14', 0, 1, '12', 1, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 28, 'omg', 'Student', 'Ruby', '', '', '', '', 4, '2013-11-05 07:09:46', 0, 1, '11', 4, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 29, 'hello', 'Student', 'Ruby', '', '', '', '', 4, '2013-11-05 07:32:01', 0, 1, '12', 7, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 30, 'payal', 'Student', 'Architecture', '', '', '', '', 2, '2013-11-08 05:53:27', 0, 3, 'NotApplicable', 8, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 31, 'jkd', 'Student', 'Chemical Engineering', '', '', '', '', 4, '2013-11-08 06:49:45', 0, 3, 'NotApplicable', 9, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 32, 'liya', 'Student', 'Architecture', '', '', '', '', 2, '2013-11-08 07:03:48', 0, 3, 'NotApplicable', 12, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 33, 'mi', 'Student', 'Architecture', '', '', '', '', 4, '2013-11-08 07:06:49', 0, 3, 'NotApplicable', 22, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 34, 'payal', 'Student', 'Agate', '', '', '', '', 2, '2013-11-08 16:27:06', 0, 1, '12', 6, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 35, 'payal', 'Student', 'Agate', '', '', '', '', 4, '2013-11-08 18:38:59', 0, 1, '12', 1, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 36, 'shruti', 'Student', 'Agate', '', '', '', '', 2, '2013-11-08 18:43:43', 0, 1, '123', 1, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 37, 'hello', 'Student', 'Agate', '', '', '', '', 8, '2013-11-08 18:54:20', 0, 1, '12', 2, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 38, 'dd', 'Student', 'Chemical Engineering', '', '', '', '', 4, '2013-11-08 22:04:11', 0, 3, 'NotApplicable', 0, '3', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 39, 'gg', 'Student', 'Architecture', '', '', '', '', 4, '2013-11-08 22:09:27', 0, 3, 'NotApplicable', 1, '6-7pm', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 40, 'pp', 'Student', 'Agate', '', '', '', '', 20, '2013-11-08 22:11:55', 0, 1, '12', 9, '6-7pm', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 41, 'pp', 'Student', 'Admin Block', NULL, NULL, NULL, NULL, 16, '2013-11-09 03:22:58', 0, 3, 'NotApplicable', 2, NULL, '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 42, 'pp', 'Student', 'Admin Block', NULL, NULL, NULL, NULL, 4, '2013-11-09 03:35:32', 0, 3, 'NotApplicable', 2, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 43, 'pp', 'Student', 'Admin Block', NULL, NULL, NULL, NULL, 16, '2013-11-09 03:36:16', 0, 3, 'NotApplicable', 0, '3 to 6', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 44, 'pp', 'Student', 'Admin Block', 'cse', NULL, NULL, NULL, 16, '2013-11-09 03:39:36', 0, 3, 'NotApplicable', 0, '3 to 6', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 45, 'pp', 'Student', 'Admin Block', 'cse', NULL, NULL, NULL, 16, '2013-11-09 03:47:57', 0, 3, 'NotApplicable', 2, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 46, 'pp', 'Student', 'Admin Block', 'cse', '', '', '', 16, '2013-11-09 03:51:19', 0, 3, 'NotApplicable', 2, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 47, 'pp', 'Student', 'Admin Block', '', '33', '', '', 16, '2013-11-09 03:52:08', 0, 3, 'NotApplicable', 2, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 48, 'user', 'Faculty', 'Shopping_complex', '', '', '', '', 8, '2013-11-09 03:56:34', 0, 5, 'NotApplicable', 2, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 49, 'pp', 'Student', 'Admin Block', 'csa', '', '', '', 8, '2013-11-09 05:14:50', 0, 3, 'NotApplicable', 1, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 50, 'pp', 'Student', 'Agate', '', '', '', '', 16, '2013-11-09 05:16:23', 0, 1, '12', 0, '3 to 6', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 51, 'avani', 'Student', 'Admin Block', '', 'mosquito', '', '', 32, '2013-11-09 05:41:19', 0, 3, 'NotApplicable', 1, '', '1234567890', 'user1', '', '', '', '', '', 0),
('user1', 52, 'pp', 'Faculty', 'Admin Block', NULL, NULL, NULL, NULL, 4, '2013-11-09 05:47:06', 0, 3, 'NotApplicable', 0, NULL, '1234567890', 'user1', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delinventory`
--

CREATE TABLE IF NOT EXISTS `delinventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(10) NOT NULL,
  `item` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `reason` text NOT NULL,
  `trans_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `delinventory`
--

INSERT INTO `delinventory` (`id`, `itemid`, `item`, `quantity`, `reason`, `trans_date`) VALUES
(1, 1108, 'TESTFAN', 200, '', '26/03/2013 08:52:33'),
(2, 1090, '1-PVC-Spring-Hose', 200, '', '12/07/2013 15:33:56'),
(3, 1086, '100-Amps-Rewireable-Fuse-Unit', 1000, '', '12/07/2013 15:33:58'),
(4, 1037, '12.5MFD-440-V-Keltron', 720, '', '12/07/2013 15:33:59'),
(5, 1046, '14-W-CFL-Philips', 869, '', '12/07/2013 15:34:00'),
(6, 1093, '15-Amps-3-Pin-top', 1091, '', '12/07/2013 15:34:00'),
(7, 1056, '150-W-SON-Philips', -52, '', '12/07/2013 15:34:01'),
(8, 1058, '150W-MH-Tube-CDMT-Philips', 1038, '', '12/07/2013 15:34:02'),
(9, 1031, '16-A-2-in-One-Socket', 1028, '', '12/07/2013 15:34:03'),
(10, 1029, '16-A-Switch', 1024, '', '12/07/2013 15:34:04'),
(11, 1017, '16/-20-Amps-Lisha-Socket-(Brown-&-White);', 1007, '', '12/07/2013 15:34:05'),
(12, 1016, '16/20-Amps-Lisha-Switch(Brown-&-White);', 1014, '', '12/07/2013 15:34:05'),
(13, 1049, '18-W-2-Ft-Tube-Philips', 1049, '', '12/07/2013 15:34:06'),
(14, 1047, '18-W-CFL-Philips', 1041, '', '12/07/2013 15:34:07'),
(15, 1035, '2-MFD-440-V-Keltron', 1035, '', '12/07/2013 15:34:07'),
(16, 1022, '2-Module-Plate', 1022, '', '12/07/2013 15:34:07'),
(17, 1036, '2.5MFD-440-V-Keltron', 1036, '', '12/07/2013 15:34:08'),
(18, 1012, '20-Amps-SP-C-curve', 1018, '', '12/07/2013 15:34:08'),
(19, 1038, '20-MFD-440-V-Keltron', 1038, '', '12/07/2013 15:34:09'),
(20, 1091, '20-W-starter,110-V', 1091, '', '12/07/2013 15:34:09'),
(21, 1087, '200-Amps-Rewireable-Fuse-Unit', 1087, '', '12/07/2013 15:34:09'),
(22, 1066, '250-W-Metal-Halide-crompton', 1066, '', '12/07/2013 15:34:10'),
(23, 1065, '250-W-Metal-Halide-Philips', 1065, '', '12/07/2013 15:34:11'),
(24, 1060, '250-W-MH-CDMT-Crompton', 1060, '', '12/07/2013 15:34:12'),
(25, 1059, '250-W-MH-CDMT-Philips', 1059, '', '12/07/2013 15:34:13'),
(26, 1057, '250-W-SON-Philips', 1057, '', '12/07/2013 15:34:13'),
(27, 1023, '3-Module-Plate', 1035, '', '12/07/2013 15:34:14'),
(28, 1089, '3/4-PVC-Spring-Hose', 1089, '', '12/07/2013 15:34:15'),
(29, 1088, '32-A-,-240-V-Bosma-/-Gem-Main-switch', 1100, '', '12/07/2013 15:34:15'),
(30, 1013, '32-Amps-SP-C-curve', 1013, '', '12/07/2013 15:34:16'),
(31, 1039, '33-MFD-440-V-Keltron', 1033, '', '12/07/2013 15:34:41'),
(32, 1051, '36-Watts-Philips', 1051, '', '12/07/2013 15:34:46'),
(33, 1110, 'fuse', 1, '', '13/07/2013 11:54:20'),
(34, 1114, 'ter', 123, '', '15/07/2013 20:48:10'),
(35, 1115, 'mor', 200, '', '16/07/2013 07:56:24'),
(36, 1117, 'rty', 4567, '', '16/07/2013 07:57:49'),
(37, 1116, 'miu', 456, 'Just-Delete', '16/07/2013 07:59:52'),
(38, 1118, 'why', 234, 'Just-Check', '16/07/2013 08:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `edinventory`
--

CREATE TABLE IF NOT EXISTS `edinventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(10) NOT NULL,
  `item` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `reason` text NOT NULL,
  `trans_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `edinventory`
--

INSERT INTO `edinventory` (`id`, `itemid`, `item`, `quantity`, `reason`, `trans_date`) VALUES
(1, 1115, 'mor', 1542, 'Because-wrongly-entered', '16/07/2013 07:45:41'),
(2, 1115, 'mor', 1234, 'Wrong', '16/07/2013 07:49:17'),
(3, 1115, 'mor', 5000, 'All-Wokking-Correct', '16/07/2013 07:50:33'),
(4, 1115, 'mor', 200, 'Retest-Retest', '16/07/2013 07:53:10'),
(5, 1119, 'where', 500, 'Just-Check', '16/07/2013 08:08:58'),
(6, 1119, 'where', 700, 'Just-Check', '16/07/2013 08:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `feed` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user`, `feed`, `time`) VALUES
(30, 'user1', 'Service is Excellent', '2013-07-12 10:21:43'),
(29, 'user1', 'Value3', '2013-07-10 06:48:09'),
(28, 'user1', 'Value1', '2013-07-10 06:47:57'),
(27, 'msmoorthy', 'test', '2013-03-11 08:59:02'),
(26, 'user1', 'complaints not attended', '2013-03-07 13:43:06'),
(31, 'user1', 'Service is Very Poor', '2013-11-05 05:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item` longtext NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1120 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item`, `quantity`) VALUES
(1000, 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Multistrand-1.1KV-Grade', 200),
(1001, 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Single-1.1KV-Grade', 1001),
(1002, 'FR-PVC-insulated-1.0-Sq-mm-Copper-Wire-Multistrand-Coil-1.1KV-Grade', 970),
(1003, 'FR-PVC-insulated-1.5-Sq-mm-Copper-Wire-Multistarnd-Coil-1.1KV-Grade', 1003),
(1004, 'Aluminium-7/2-Coil-1.1KV-Grade', 1017),
(1005, 'FR-PVC-insulated-2.5-Sq-mm-multistrand-Copper-Wire-Coil-1.1KV-Grade', 1005),
(1006, 'FR-PVC-insulated-4.0-Sq-mm-Copper-Wire-Coil-1.1KV', 1006),
(1007, 'FR-PVC-insulated-6.0-Sq-mm-Copper-Wire-Coil-1.1KV', 983),
(1008, 'FR-PVC-insulated-10.0-Sq-mm-Copper-Wire-Coil-1.1KV', 1008),
(1009, '4-Pole-63-Amps-C-Curve', 1009),
(1010, '4-Pole-100-Amps-C-Curve', 1034),
(1011, '4-Pole-125-Amps-C-Curve', 1026),
(1119, 'where', 130),
(1014, '5/6-Amps-Switch-Lisha-Dishno(Brown-&-White);', 1014),
(1015, '5/6-Amps-Lisha-Socket-(Brown-&-White);', 1015),
(1018, '5/6-Amps-Switch-Anchor-Delux-Ivory', 1018),
(1019, '5/6-Amps-Anchor-Switch-Cherry', 1011),
(1020, 'Socket-Type-Step-Regulator', 1020),
(1021, 'Lisha-5-in-One-(16/6A-);', 1021),
(1024, '4-Module-Plate', 23),
(1025, '6-Module-Plate', 1025),
(1026, '8-Module-Plate', 1024),
(1027, 'Modular-Swiches-&-Sockets', 1027),
(1028, '6-A-Switch', 1023),
(1030, '6-A-2-in-One-Socket', 1030),
(1033, '4-Module-Plate', 23),
(1034, '8-Module-Plate', 1032),
(1040, 'Pls-865/2P-9-W-Philips', 1040),
(1041, 'Pls-865/2P-11-W-Philips', 1041),
(1042, 'Pl-C-865/2P-13-W-Philips', 1042),
(1043, 'Pl-C-865/2P-18W-Philips', 1043),
(1044, 'Pl-C-865/4P-18W-Philips', 1044),
(1045, '4-pin-36-Watts-2''', 1045),
(1048, 'T5-14-W-2ft-Philips', 1048),
(1050, 'T5--28W-Philips', 1050),
(1109, 'pvc', 10),
(1052, 'Philips-40-watts', 1042),
(1053, '70-W-SON-I-Philips', 1055),
(1054, '70-W-Sodium-Tube-Philips', 1055),
(1055, '70-W-MH-Tube-CDMT-Philips', 1057),
(1061, '400-W-MH-CDMT-Philips', 1061),
(1062, '400-W-MH-CDMT-Crompton', 1062),
(1063, '70-W-SON-/-MH-Philips', 1065),
(1064, '70-W-SON-/-MH-Crompton', 1023),
(1067, '400-W-Metal-Halide-Philips', 1067),
(1068, '400-W-Metal-Halide-Cropmton', 1068),
(1069, 'PL-C-18-W-Choke', 1069),
(1070, 'PL-C-18-W-E-Choke', 1070),
(1071, 'PL-S-11-W-Choke', 1071),
(1072, 'SN-51', 1072),
(1073, 'SN-57', 1063),
(1074, 'SN-58', 1074),
(1075, '4X4', 1075),
(1076, '6X4', 1076),
(1077, '8X4', 1100),
(1078, 'PVC-8mm', 1078),
(1079, 'PVC-10-mm', 1079),
(1080, 'Fibre-5-mm', 1058),
(1081, 'Fibre-8-mm', 1081),
(1082, 'Fibre-10-mm', 1082),
(1083, 'Pendent', 1083),
(1084, 'Pattern', 1081),
(1085, 'Angle', 1085),
(1092, '5-Amps-3-Pin-top', 1092),
(1094, 'PVC-Insulation-Tape', 1033);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `hostel` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `mess` varchar(50) DEFAULT NULL,
  `other` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `hostel`, `department`, `mess`, `other`, `street`) VALUES
(1, 'Agate', 'Architecture', 'Mess A', '', 'Central Library Street'),
(2, 'Beryl', 'Chemical Engineering', 'Mess B', '', 'Sports Street'),
(3, 'Coral', 'Chemistry', 'Mess C', '', 'Octa Street'),
(4, 'Diamond', 'Civil Engineering', 'Mess D', 'Annexe Lab', 'Annex Street'),
(5, 'Emerald', 'Computer Applications', 'Mess E', '', 'Admin Street'),
(6, 'Pearl', 'Computer Science and Engineering', 'Mess F', 'Shopping_complex', 'Shopping Complex Street'),
(7, 'Topaz', 'Electrical and Electronics Engineering', 'Mess G', 'Swimming_pool', 'Hospital Street'),
(8, 'Sapphire', 'Electronics and Communication Engineering', 'Megamess-I', '', 'QIP Quarters'),
(9, 'Jade', 'Humanities (English)', 'Megamess-II', NULL, 'Temple'),
(10, 'Ruby', 'Instrumentation and Control Engineering', 'O-Mess', NULL, '1'),
(11, 'Opal-A', 'Management Studies', NULL, NULL, '2'),
(12, 'Garnett-A', 'Mathematics', NULL, NULL, '3'),
(13, 'Garnett-B', 'Mechanical Engineering', NULL, NULL, '4'),
(14, 'Zircon-A', 'Metallurgical and Materials Engineering', NULL, NULL, '5'),
(15, 'Zircon-B', 'Physics', NULL, NULL, '6'),
(16, 'Opal-B', 'Production Engineering', NULL, NULL, '7'),
(17, 'Opal-C', 'Admin Block', NULL, NULL, '8'),
(18, 'Aquamarine-A', 'CSG', NULL, NULL, '9'),
(19, 'Zircon-C', 'CEESAT', NULL, NULL, '10'),
(20, 'Opal-D', 'Library', NULL, NULL, '11'),
(21, 'Opal-E', 'TP', NULL, NULL, '12'),
(22, 'Amber-A', 'Physical Education', NULL, NULL, '13-A'),
(23, 'Amber-B', 'Estate Maintenance', NULL, NULL, '13-B'),
(24, 'Garnet-C', 'Electrical Centre', NULL, NULL, '16'),
(25, 'Aquamarine-B', 'Hospital', NULL, NULL, '17'),
(26, 'Garnett-C', 'Transport Dept.', NULL, NULL, '18'),
(27, 'Lapis', 'Lecture Hall', NULL, NULL, '19'),
(28, NULL, NULL, NULL, NULL, 'PG'),
(29, NULL, NULL, NULL, NULL, 'Gurunath Street'),
(30, NULL, NULL, NULL, NULL, '1A'),
(31, NULL, NULL, NULL, NULL, 'NF'),
(32, NULL, NULL, NULL, NULL, 'Professor Quarters'),
(33, NULL, NULL, NULL, NULL, '14'),
(34, NULL, NULL, NULL, NULL, '15'),
(35, NULL, NULL, NULL, NULL, '20'),
(36, NULL, NULL, NULL, NULL, '21'),
(37, NULL, NULL, NULL, NULL, '22'),
(38, NULL, NULL, NULL, NULL, '23');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `indentNo` int(100) NOT NULL AUTO_INCREMENT,
  `complaintNo` varchar(100) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `items` text NOT NULL,
  `count` text NOT NULL,
  `returned` text,
  `indentOpen_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indentClose_date` text NOT NULL,
  PRIMARY KEY (`indentNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`indentNo`, `complaintNo`, `status`, `items`, `count`, `returned`, `indentOpen_date`, `indentClose_date`) VALUES
(1, 'ELTEST01', 2, '12.5MFD-440-V-Keltron$20$', '1', '12.5MFD-440-V-Keltron->8<br />', '2013-03-11 07:27:33', '11/03/2013 12:58:54'),
(2, 'ELTEST02', 2, '12.5MFD-440-V-Keltron$10$', '1', '12.5MFD-440-V-Keltron->fhj<br />', '2013-03-11 07:29:54', '11/03/2013 13:00:30'),
(3, 'ELTEST04', 2, '150W-MH-Tube-CDMT-Philips$20$12.5MFD-440-V-Keltron$20$', '2', '150W-MH-Tube-CDMT-Philips->10<br />12.5MFD-440-V-Keltron->10<br />', '2013-03-11 07:31:06', '11/03/2013 13:01:42'),
(4, 'ELTEST05', 2, '15-Amps-3-Pin-top$2$1-PVC-Spring-Hose$100$', '2', '15-Amps-3-Pin-top->www<br />1-PVC-Spring-Hose->www<br />', '2013-03-11 07:32:35', '11/03/2013 13:04:02'),
(5, 'ELTEST06', 2, '1-PVC-Spring-Hose$100$', '1', '1-PVC-Spring-Hose->20<br />', '2013-03-11 07:35:07', '11/03/2013 13:06:21'),
(6, 'TESTTEST', 2, '100-Amps-Rewireable-Fuse-Unit$90$', '1', '100-Amps-Rewireable-Fuse-Unit->80<br />', '2013-03-11 08:01:53', '11/03/2013 13:32:26'),
(7, 'TESTTE04', 2, '100-Amps-Rewireable-Fuse-Unit$500$', '1', '100-Amps-Rewireable-Fuse-Unit->300<br />', '2013-03-11 08:09:44', '11/03/2013 13:39:56'),
(8, 'TESTTE04', 2, '12.5MFD-440-V-Keltron$150$', '1', '12.5MFD-440-V-Keltron->90<br />', '2013-03-11 08:11:20', '11/03/2013 13:41:41'),
(9, 'el000004', 2, '16/20-Amps-Lisha-Switch(Brown-&-White);$2$', '1', '16/20-Amps-Lisha-Switch(Brown-&-White);->1<br />', '2013-03-11 09:14:06', '11/03/2013 14:44:49'),
(10, 'EL000067', 2, '14-W-CFL-Philips$100$150-W-SON-Philips$20$', '2', '14-W-CFL-Philips->0<br />150-W-SON-Philips->0<br />', '2013-03-11 10:13:58', '06/04/2013 18:46:50'),
(11, 'EL000007', 2, '16-A-Switch$1$', '1', '16-A-Switch->0<br />', '2013-03-11 11:09:29', '12/07/2013 14:32:44'),
(12, 'TESTCCCC', 2, '1-PVC-Spring-Hose$100$', '1', '1-PVC-Spring-Hose->30<br />', '2013-03-26 02:23:15', '26/03/2013 07:53:31'),
(13, '3', 1, '12.5MFD-440-V-Keltron$20$', '1', NULL, '2013-03-26 03:24:10', ''),
(14, '9', 2, '16-A-2-in-One-Socket$1$16-A-2-in-One-Socket$1$16-A-2-in-One-Socket$1$', '3', '16-A-2-in-One-Socket->1<br />16-A-2-in-One-Socket->1<br />16-A-2-in-One-Socket-><br />', '2013-04-06 12:23:38', '06/04/2013 17:57:48'),
(15, '8', 2, '18-W-CFL-Philips$8$', '1', '18-W-CFL-Philips->7<br />', '2013-04-06 12:59:54', '06/04/2013 18:31:02'),
(16, '6', 2, '1-PVC-Spring-Hose$10$', '1', '1-PVC-Spring-Hose->10<br />', '2013-04-06 13:10:19', '06/04/2013 18:41:14'),
(17, '4', 2, '1-PVC-Spring-Hose$45$', '1', '14-W-CFL-Philips->0<br />', '2013-04-06 13:14:45', '06/04/2013 18:46:50'),
(18, '', 1, '70-W-Sodium-Tube-Philips$1$', '1', NULL, '2013-07-10 06:17:24', ''),
(19, '', 1, '1-PVC-Spring-Hose$2$14-W-CFL-Philips$1$', '2', NULL, '2013-07-10 07:12:22', ''),
(20, '', 1, '150-W-SON-Philips$100$150-W-SON-Philips$1000$', '2', NULL, '2013-07-11 04:21:14', ''),
(21, '', 1, '150-W-SON-Philips$2$', '1', NULL, '2013-07-12 08:58:31', ''),
(22, '', 1, '1-PVC-Spring-Hose$2$16-A-Switch$4$', '2', NULL, '2013-07-12 09:00:21', ''),
(23, '', 2, 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Multistrand-1.1KV-Grade$2$', '1', 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Multistrand-1.1KV-Grade->1<br />', '2013-07-13 05:32:14', '13/07/2013 11:02:22'),
(24, '', 1, 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Multistrand-1.1KV-Grade$1000$', '1', NULL, '2013-07-15 14:19:58', ''),
(25, '', 1, 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Multistrand-1.1KV-Grade$10$', '1', NULL, '2013-07-15 14:29:18', ''),
(26, '', 2, 'where$546$', '1', 'where->500<br />', '2013-07-16 02:37:14', '16/07/2013 09:02:23'),
(27, '', 2, 'where$600$', '1', 'where-><br />', '2013-07-16 02:39:14', '16/07/2013 08:21:20'),
(28, '', 1, '', '0', NULL, '2013-07-16 02:57:41', ''),
(29, '', 1, '', '0', NULL, '2013-07-16 03:06:43', ''),
(30, '', 1, '', '0', NULL, '2013-07-16 03:27:54', ''),
(31, '', 2, 'where$200$', '1', 'where->50<br />', '2013-07-16 03:35:28', '16/07/2013 09:27:13'),
(32, '', 1, 'where$300$Philips-40-watts$10$', '2', NULL, '2013-07-16 03:38:35', ''),
(33, '', 1, 'where$100$', '1', NULL, '2013-07-16 03:44:26', ''),
(34, '23', 2, 'where$20$', '1', 'where->10<br />', '2013-07-16 03:48:29', '16/07/2013 09:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` text NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `time` text NOT NULL,
  `complaintid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `itemid`, `quantity`, `time`, `complaintid`) VALUES
(21, 'where', 10, '16/07/2013 09:21:02', '000023'),
(22, 'where', 150, '16/07/2013 09:27:13', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `report_old`
--

CREATE TABLE IF NOT EXISTS `report_old` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noOfcomplaints` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `trans_date` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `item`, `quantity`, `trans_date`) VALUES
(8, '32-A-,-240-V-Bosma-/-Gem-Main-switch', 12, '28/02/2013 15:01:46'),
(9, '1-PVC-Spring-Hose', 2000, '06/03/2013 13:45:04'),
(10, 'led', 5, '07/03/2013 19:41:10'),
(11, '1-PVC-Spring-Hose', 100, '11/03/2013 13:04:30'),
(12, 'TESTFAN', 677, '11/03/2013 13:04:42'),
(13, 'TESTFAN', 123, '26/03/2013 08:50:11'),
(14, 'TESTFAN', 200, '26/03/2013 08:52:10'),
(15, '1-PVC-Spring-Hose', 100, '06/04/2013 18:15:41'),
(16, '1-PVC-Spring-Hose', 23, '06/04/2013 18:19:37'),
(17, '1-PVC-Spring-Hose', 50, '06/04/2013 18:21:11'),
(18, '1-PVC-Spring-Hose', 10, '11/07/2013 10:11:49'),
(19, '1-PVC-Spring-Hose', 10, '11/07/2013 10:12:03'),
(20, '1-PVC-Spring-Hose', 200, '12/07/2013 15:32:38'),
(21, 'pvc', 10, '12/07/2013 15:40:21'),
(22, 'fuse', 1, '13/07/2013 11:53:41'),
(23, 'FR-PVC-insulated-0.5-Sq-mm-Copper-Wire-Multistrand', 1000, '15/07/2013 20:00:11'),
(24, 'test', 1000, '15/07/2013 20:12:19'),
(25, 'testinh', 2323, '15/07/2013 20:15:07'),
(26, 'ter', 345, '15/07/2013 20:47:44'),
(27, 'ter', 123, '15/07/2013 20:47:59'),
(28, 'mor', 345, '16/07/2013 07:16:58'),
(29, 'miu', 456, '16/07/2013 07:57:36'),
(30, 'rty', 4567, '16/07/2013 07:57:44'),
(31, 'why', 234, '16/07/2013 08:00:37'),
(32, 'where', 345, '16/07/2013 08:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('ravi.p', 'fef3214c38bdba3eb4d83badcb70922ae986c9e4', 2),
('suresh', '4d2a071bd0372676a13d496664fde35e25dffa6f', 4),
('tech1', '40807e40aa0602559be12b1ee786e225d17a8dd6', 1),
('tech2', 'fa3abec7ffc000fb54a0d786b0de1f8f5bed98e8', 2),
('tech3', '9364f6f48c8e3fd96ce8487d7b3516cad73ab138', 3),
('tech4', 'edb9e3ffaa0a7719635456a86b36e24712003991', 4),
('tech5', '79f7e82f303840fb03b8c68ff5b4d3234fbb28a6', 5),
('testuser2', '3b5bb7e7d12fe3e56bc69bdc0dbcc356f64c1d73', 2),
('user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 1),
('user2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 2),
('user3', '0b7f849446d3383546d15a480966084442cd2193', 3),
('user4', '06e6eef6adf2e5f54ea6c43c376d6d36605f810e', 4),
('user5', '7d112681b8dd80723871a87ff506286613fa9cf6', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
