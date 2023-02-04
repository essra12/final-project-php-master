-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2022 at 04:36 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filesharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `e_no` int(8) NOT NULL,
  `e_content` varchar(150) NOT NULL,
  `e_date` date DEFAULT NULL,
  `e_time` time DEFAULT NULL,
  `stu_group` int(8) NOT NULL,
  PRIMARY KEY (`e_no`),
  KEY `fk_stu_group_e` (`stu_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `f_no` int(8) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_type` varchar(4) DEFAULT NULL,
  `f_size` int(4) DEFAULT NULL,
  `stu_group` int(8) NOT NULL,
  `tr_group` int(8) NOT NULL,
  PRIMARY KEY (`f_no`),
  KEY `fk_stu_group_f` (`stu_group`),
  KEY `fk_tr_group_f` (`tr_group`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `g_no` int(8) NOT NULL,
  `g_name` varchar(25) NOT NULL,
  `g_img` blob,
  PRIMARY KEY (`g_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `r_no` int(8) NOT NULL,
  `r_content` varchar(250) NOT NULL,
  `r_data` date DEFAULT NULL,
  `r_time` time DEFAULT NULL,
  `e_no` int(8) NOT NULL,
  `tr_group` int(8) NOT NULL,
  PRIMARY KEY (`r_no`),
  KEY `fk_tr_group_r` (`tr_group`),
  KEY `fk_e_no_r` (`e_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `stu_Specialization` varchar(25) NOT NULL,
  PRIMARY KEY (`stu_id`),
  KEY `fk_user_id_s` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
CREATE TABLE IF NOT EXISTS `student_group` (
  `stu_group` int(8) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`stu_group`),
  KEY `fk_stu_id_sg` (`stu_id`),
  KEY `fk_g_no_sg` (`g_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `tr_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `tr_phone_no` int(10) NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `fk_user_id_tr` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_group`
--

DROP TABLE IF EXISTS `teacher_group`;
CREATE TABLE IF NOT EXISTS `teacher_group` (
  `tr_group` int(8) NOT NULL,
  `tr_id` int(8) NOT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`tr_group`),
  KEY `fk_tr_id_tg` (`tr_id`),
  KEY `fk_g_no_tg` (`g_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `u_img` blob,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
