-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2022 at 07:12 PM
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
  `e_no` int(8) NOT NULL AUTO_INCREMENT,
  `e_content` varchar(150) NOT NULL,
  `e_date` date DEFAULT NULL,
  `e_time` time DEFAULT NULL,
  `stu_group` int(8) NOT NULL,
  PRIMARY KEY (`e_no`),
  KEY `fk_stu_group_e` (`stu_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `f_no` int(8) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(225) NOT NULL,
  `p_no` int(8) NOT NULL,
  PRIMARY KEY (`f_no`),
  KEY `p_no` (`p_no`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`f_no`, `f_name`, `p_no`) VALUES
(25, '1670699387_2.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `g_no` int(8) NOT NULL AUTO_INCREMENT,
  `tr_id` int(8) NOT NULL,
  `g_name` varchar(25) NOT NULL,
  PRIMARY KEY (`g_no`),
  KEY `tr_id` (`tr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`g_no`, `tr_id`, `g_name`) VALUES
(99, 52, 'Math'),
(100, 56, 'database'),
(101, 57, 'BPM'),
(102, 58, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `p_no` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `Datatime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stu_group` int(8) DEFAULT NULL,
  `g_no` int(8) DEFAULT NULL,
  PRIMARY KEY (`p_no`),
  KEY `stu_group` (`stu_group`),
  KEY `g_no` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_no`, `title`, `description`, `Datatime`, `stu_group`, `g_no`) VALUES
(18, 'i am yakeen in math group', 'i am yakeen in math group', '2022-12-10 21:09:47', 36, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `r_no` int(8) NOT NULL AUTO_INCREMENT,
  `r_content` varchar(250) NOT NULL,
  `r_data` date DEFAULT NULL,
  `r_time` time DEFAULT NULL,
  `e_no` int(8) NOT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`r_no`),
  KEY `fk_e_no_r` (`e_no`),
  KEY `g_no` (`g_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `stu_specialization` varchar(25) NOT NULL,
  PRIMARY KEY (`stu_id`),
  KEY `fk_user_id_s` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `user_id`, `stu_specialization`) VALUES
(172091, 162, 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
CREATE TABLE IF NOT EXISTS `student_group` (
  `stu_group` int(8) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`stu_group`),
  KEY `fk_stu_id_sg` (`stu_id`),
  KEY `fk_g_no_sg` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`stu_group`, `stu_id`, `g_no`) VALUES
(36, 172091, 99),
(37, 172091, 100);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `tr_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `tr_phone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`tr_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tr_id`, `user_id`, `tr_phone_no`) VALUES
(52, 158, '0925778899'),
(56, 165, '0921111111'),
(57, 166, '0958762436'),
(58, 167, '0925778822');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `u_img` varchar(225) DEFAULT NULL,
  `role` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `password`, `u_img`, `role`) VALUES
(143, 'abdalftah', '$2y$10$/u/0ujf3HN4j/Io.um6K0eLxU6DSzqBZkP3V8ALzddUvxX7z/V62.', '1670191676_1668186840_profile_man2.png', 'admin'),
(158, 'noor ali', '$2y$10$of6RjkoxQjrrZVXVstcTh.vtd8j.b/zCcEKt5SVmEiSkvndLvDc8i', 'blue_rectangle_with_user.JPG', 'teacher'),
(162, 'yakeen zr', '$2y$10$Flp1tIky8sdyNd4CJO.y/.5fHk1c3X/oUlwcu3dsxWXQ2D8Ud/DsC', 'blue_rectangle_with_user.JPG', ''),
(165, 'zena zr', '$2y$10$zpcs32RnMuRg/qGIMSIk0.ZdD.R13pjnST2Yn/ugG7icbud806v7O', 'blue_rectangle_with_user.JPG', 'teacher'),
(166, 'belal hamed', '$2y$10$p8vQgDwIzACDc.KazQ2TyOn.Nx7WCNNsIua5VMESY3T0o8yMbbGXe', '1670697172_profile_image_boy.png', 'teacher'),
(167, 'karema salh', '$2y$10$mWcTZgkv0lrugs5.Ays6Iu36v4UfhWby/afQoicw/xqwDVcs5Cg7K', '1670697231_girl_profile.JPG', 'teacher');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`p_no`) REFERENCES `post` (`p_no`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`tr_id`) REFERENCES `teacher` (`tr_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`stu_group`) REFERENCES `student_group` (`stu_group`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`g_no`) REFERENCES `groups` (`g_no`);

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`g_no`) REFERENCES `groups` (`g_no`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
