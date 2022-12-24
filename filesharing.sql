-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2022 at 12:40 PM
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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `an_no` int(8) NOT NULL AUTO_INCREMENT,
  `an_content` varchar(250) NOT NULL,
  `an_Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` date DEFAULT NULL,
  `grade` float DEFAULT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`an_no`),
  KEY `g_no` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`an_no`, `an_content`, `an_Datetime`, `due_date`, `grade`, `g_no`) VALUES
(6, 'hi hi hi', '2022-12-23 21:53:51', NULL, NULL, 114),
(8, 'the second assignment', '2022-12-24 00:49:30', '2023-01-01', 10, 114),
(9, 'the third assignment', '2022-12-24 00:51:25', '2023-01-07', 10, 114),
(10, 'the fourth assignment', '2022-12-24 01:48:16', '2022-12-22', 10, 114),
(11, 'the five assignment', '2022-12-24 02:17:55', '2022-12-26', 10, 114),
(12, 'the six assignment', '2022-12-24 02:18:38', '2022-12-26', 10, 114),
(13, 'the seven assignment', '2022-12-24 13:38:08', '2022-12-26', 10, 114),
(14, 'the eight assignment', '2022-12-24 13:39:03', '2022-12-24', 10, 114),
(15, 'the nine assignment', '2022-12-24 13:39:37', '2022-12-23', 10, 114),
(16, 'the ten assignment', '2022-12-24 13:40:01', '2023-01-07', 10, 114);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `e_no` int(8) NOT NULL AUTO_INCREMENT,
  `e_content` varchar(150) NOT NULL,
  `e_Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`f_no`, `f_name`, `p_no`) VALUES
(73, '1671837271_Ù…Ù‚ØªØ±Ø­_Ø§Ù„Ù…Ø´Ø±ÙˆØ¹_ØªØ³Ù„ÙŠÙ…_ÙØ±ÙˆØ¶_Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©.docx', 44),
(74, '1671837271_Ù…Ù‚ØªØ±Ø­_Ø§Ù„Ù…Ø´Ø±ÙˆØ¹_ØªØ³Ù„ÙŠÙ…_ÙØ±ÙˆØ¶_Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©.pdf', 44),
(75, '1671839648_Ù…Ù‚ØªØ±Ø­_Ø§Ù„Ù…Ø´Ø±ÙˆØ¹_ØªØ³Ù„ÙŠÙ…_ÙØ±ÙˆØ¶_Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©.docx', 45),
(76, '1671839648_Ù…Ù‚ØªØ±Ø­_Ø§Ù„Ù…Ø´Ø±ÙˆØ¹_ØªØ³Ù„ÙŠÙ…_ÙØ±ÙˆØ¶_Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©.pdf', 45),
(77, '1671841687_Ù…Ù‚ØªØ±Ø­_Ø§Ù„Ù…Ø´Ø±ÙˆØ¹_ØªØ³Ù„ÙŠÙ…_ÙØ±ÙˆØ¶_Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©.pdf', 46),
(78, '1671841722_1.png', 47);

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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`g_no`, `tr_id`, `g_name`) VALUES
(101, 57, 'BPM'),
(102, 58, 'english'),
(105, 61, 'Android'),
(107, 62, 'Report 1'),
(114, 64, 'database');

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
  `an_no` int(8) DEFAULT NULL,
  PRIMARY KEY (`p_no`),
  KEY `stu_group` (`stu_group`),
  KEY `g_no` (`g_no`),
  KEY `an_no` (`an_no`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_no`, `title`, `description`, `Datatime`, `stu_group`, `g_no`, `an_no`) VALUES
(44, 'i am doing the second assignment', '', '2022-12-24 01:14:31', 65, NULL, 8),
(45, 'i am in third assignment', '', '2022-12-24 01:54:08', 65, NULL, 9),
(46, 'four assinment', '', '2022-12-24 02:28:07', 65, NULL, 10),
(47, 'five assignment', '', '2022-12-24 02:28:42', 65, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `r_no` int(8) NOT NULL AUTO_INCREMENT,
  `r_content` varchar(250) NOT NULL,
  `r_ Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
(171825, 183, 'english'),
(171925, 184, 'programming'),
(172020, 181, 'networks'),
(172036, 182, 'control'),
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`stu_group`, `stu_id`, `g_no`) VALUES
(36, 172091, 99),
(37, 172091, 100),
(43, 172091, 103),
(44, 172091, 101),
(45, 171925, 99),
(46, 171925, 100),
(47, 171925, 108),
(48, 171925, 107),
(49, 171825, 102),
(50, 171825, 106),
(51, 171825, 105),
(52, 172036, 102),
(53, 172036, 107),
(54, 172036, 108),
(55, 172020, 100),
(56, 172020, 102),
(57, 172020, 108),
(58, 172020, 101),
(59, 172020, 105),
(60, 172091, 102),
(61, 172091, 105),
(62, 172091, 106),
(63, 172091, 107),
(64, 172091, 108),
(65, 172091, 114);

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tr_id`, `user_id`, `tr_phone_no`) VALUES
(57, 166, '0958762436'),
(58, 167, '0925778822'),
(61, 179, '0925555555'),
(62, 180, '0925478111'),
(63, 185, '0914788885'),
(64, 186, '0925877555');

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
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `password`, `u_img`, `role`) VALUES
(143, 'abdalftah zr', '$2y$10$hE0E0pQ7J/V40KjTlOVoAencrSfFWDd/tWS6zT6F7dLbxoOVlTkf6', '1670191676_1668186840_profile_man2.png', 'admin'),
(162, 'yakeen zr', '$2y$10$bdJWvge98PcE4EaKllOISeacYpCeN105ECU7bGYtyXyfxCpxVH2oK', '1671306897_profile_image_girl.png', ''),
(166, 'belal hamed', '$2y$10$p8vQgDwIzACDc.KazQ2TyOn.Nx7WCNNsIua5VMESY3T0o8yMbbGXe', '1670697172_profile_image_boy.png', 'teacher'),
(167, 'karema salh', '$2y$10$mWcTZgkv0lrugs5.Ays6Iu36v4UfhWby/afQoicw/xqwDVcs5Cg7K', '1670697231_girl_profile.JPG', 'teacher'),
(177, 'admin admin', '$2y$10$yelvt4SABxNuGZYd2n8gp.XQHh36bHwC04i0tzCu9NBpSf/PvCGoa', '1671528573_profile_woman2.png', 'admin'),
(179, 'nada naser', '$2y$10$6Zp0v.3CuHvDstdMD8PWEe4V0E/GwJDqCggOalhhXZjHvgiUszBya', '1671541638_profile_image_girl.png', 'teacher'),
(180, 'hamed lutfi', '$2y$10$Vze28xNN9KiPcGK3.5sgd.a.HkENe6bm2NuWwW9G8BYvzRShYWmOy', '1671571108_profile_man2.png', 'teacher'),
(181, 'khaled moner', '$2y$10$kviNEyVeP9rc/.zef9J60OzNMHLUbK/Bvc6a2JyX4Fb/FwE021dbm', '1671571388_profile_image_boy.png', ''),
(182, 'amira mohammed', '$2y$10$DEHT87Qi8tflAxW3LkIlCeBDTBHxxKpRGf6o5.S4RDq0zrNx/9ZhC', '1671571510_profile_woman2.png', ''),
(183, 'slsabel esaa', '$2y$10$d35ufiv9bYB.t1Cc9hrX4.H6rgBTMNTL/HGGjVnYVba9/fzDtZdDW', '1671571633_girl_profile.JPG', ''),
(184, 'ziad omar', '$2y$10$skLYsCKsfwnl9mx9845GH.ovIRrYr3SQ.wpkmmkqCQF1Ik9t0PJWO', '1671571764_profile_man2.png', ''),
(185, 'saleh omar', '$2y$10$VPayjaO3CjcujXN8Oq6hdOmJ9x6JG8xRqzElW.ldcqdVFXkNe32dK', 'blue_rectangle_with_user.JPG', 'teacher'),
(186, 'zena zr', '$2y$10$mo1xkb13.QUtlkxTlIUrZ.ClhJOtY7eBn2ShjU4GwDEnrhZeuioQ6', '1671725727_profile_woman2.png', 'teacher');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`g_no`) REFERENCES `groups` (`g_no`);

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
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`g_no`) REFERENCES `groups` (`g_no`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`an_no`) REFERENCES `announcement` (`an_no`);

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
