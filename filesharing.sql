-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2023 at 04:18 PM
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
  `an_content` text NOT NULL,
  `an_Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` date DEFAULT NULL,
  `grade` float DEFAULT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`an_no`),
  KEY `g_no` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`an_no`, `an_content`, `an_Datetime`, `due_date`, `grade`, `g_no`) VALUES
(58, 'the first assignment in database ', '2023-01-11 20:40:38', '2023-01-19', 5, 114),
(60, 'the second assignment in database', '2023-01-11 20:42:20', '2023-01-12', 5, 114),
(61, 'the third assignment in database', '2023-01-21 14:04:26', '2023-01-22', 10, 114),
(66, 'the fourth assignment in database', '2023-01-11 21:04:45', '2023-01-12', 4, 114),
(70, 'the first assignment in java', '2023-01-12 15:34:12', '2023-01-27', 10, 122),
(71, 'the second assignment in java', '2023-01-21 13:26:35', '2023-01-25', 5, 122),
(75, 'the first assignment in english', '2023-01-12 20:01:00', '2023-01-19', 10, 124),
(76, 'the third assignment in java', '2023-01-15 00:45:41', '2023-01-19', 6, 122),
(86, 'the forth assignment in java', '2023-01-17 00:22:30', '2023-01-19', 10, 122),
(94, 'the fifth assignment in database', '2023-01-21 14:04:14', '2023-01-23', 0, 114),
(97, 'announcement in database', '2023-01-21 14:31:06', '2023-01-21', NULL, 114),
(98, 'announcement in java', '2023-01-21 14:41:59', '2023-01-21', NULL, 122);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `e_no` int(8) NOT NULL AUTO_INCREMENT,
  `e_content` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stu_group` int(8) NOT NULL,
  PRIMARY KEY (`e_no`),
  KEY `fk_stu_group_e` (`stu_group`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`e_no`, `e_content`, `datetime`, `stu_group`) VALUES
(31, 'hi i am in java enquiry ', '2023-01-12 17:22:20', 92);

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
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`f_no`, `f_name`, `p_no`) VALUES
(132, '1673462148_image.jpg', 89),
(138, '1673555327_image.jpg', 95),
(139, '1673555575_image.jpg', 96),
(144, '1674300458_1.png', 101),
(146, '1674302723_1.png', 103),
(147, '1674398099_1.png', 104);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `g_no` int(8) NOT NULL AUTO_INCREMENT,
  `tr_id` int(8) NOT NULL,
  `g_name` varchar(25) NOT NULL,
  `Datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`g_no`),
  KEY `tr_id` (`tr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`g_no`, `tr_id`, `g_name`, `Datetime`) VALUES
(101, 57, 'BPM', '2022-12-28 13:15:39'),
(105, 61, 'Android', '2022-12-28 13:15:39'),
(114, 64, 'Database', '2022-12-28 13:15:39'),
(122, 64, 'Java', '2023-01-02 21:22:47'),
(123, 72, 'Math', '2023-01-06 17:36:43'),
(124, 62, 'english', '2023-01-07 00:48:13'),
(127, 72, 'Arabic', '2023-01-17 22:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('4df973295545c215c7fb6896e3bb4b7e39b907cd434d8de3c97929391dc4b442df01e9ca78054729', 143, 1, 'AuthToken', '[]', 0, '2023-01-07 12:23:48', '2023-01-07 12:23:48', '2024-01-07 14:23:48'),
('4772c1e6a581f7292925a47854c7d998fc1ed8632efd0c8eee50318d0bebc4562c9321720f992166', 143, 1, 'AuthToken', '[]', 0, '2023-01-07 12:49:38', '2023-01-07 12:49:38', '2024-01-07 14:49:38'),
('2182b02015d78fc998d114985cbe966acdded9f807594a2ad7c6a759e3ed7b9a22f53999ee83108e', 212, 1, 'AuthToken', '[]', 0, '2023-01-17 10:41:19', '2023-01-17 10:41:19', '2024-01-17 12:41:19'),
('053beaa4271e23f2c523962ff5721a14c78bdf14d551e49a8c5f33c146676636093c5725456bcd7c', 186, 1, 'AuthToken', '[]', 0, '2023-01-22 12:29:26', '2023-01-22 12:29:26', '2024-01-22 14:29:26'),
('f8af6b7ebe58e7002868eca2fe94409902d4a61b1adf9981b2cf35801003c47ee03e97f2ffcc2c5a', 177, 1, 'AuthToken', '[]', 0, '2023-01-22 12:31:26', '2023-01-22 12:31:26', '2024-01-22 14:31:26'),
('5f31ef6e1c4453eac7de6f99ded62d541e22b510286afc790b36032b93a87f4c6efa5b334c9e8d23', 215, 1, 'AuthToken', '[]', 0, '2023-01-22 12:35:45', '2023-01-22 12:35:45', '2024-01-22 14:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'QZJxKHmz5Rb88Ah7WgyOXMQKtmKlxPKY0gdG7jcR', NULL, 'http://localhost', 1, 0, 0, '2023-01-07 12:13:34', '2023-01-07 12:13:34'),
(2, NULL, 'Laravel Password Grant Client', 'j3JFGjqxcNr0blEtYGUTId8lb1he0i32im0WOO76', 'users', 'http://localhost', 0, 1, 0, '2023-01-07 12:13:34', '2023-01-07 12:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-07 12:13:34', '2023-01-07 12:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `p_no` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `description` text,
  `Datatime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stu_grade` float DEFAULT NULL,
  `stu_group` int(8) DEFAULT NULL,
  `g_no` int(8) DEFAULT NULL,
  `an_no` int(8) DEFAULT NULL,
  PRIMARY KEY (`p_no`),
  KEY `stu_group` (`stu_group`),
  KEY `g_no` (`g_no`),
  KEY `an_no` (`an_no`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_no`, `title`, `description`, `Datatime`, `stu_grade`, `stu_group`, `g_no`, `an_no`) VALUES
(89, 'the first material in database', '', '2023-01-11 20:35:48', NULL, NULL, 114, NULL),
(95, 'i am abrar student in java first assignment', '', '2023-01-12 22:28:47', 0, 98, 122, 70),
(96, 'the first material in java', '', '2023-01-12 22:32:55', NULL, NULL, 122, NULL),
(101, 'i am abrar in second java assignmet', '', '2023-01-21 13:27:38', 0, 98, 122, 71),
(103, 'i am nono in third database assignment', '', '2023-01-21 14:05:23', 0, 108, 114, 61),
(104, 'i am student stu in second java assignment', '', '2023-01-22 16:34:59', NULL, 110, 122, 71);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE IF NOT EXISTS `response` (
  `r_no` int(8) NOT NULL AUTO_INCREMENT,
  `r_content` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `e_no` int(8) NOT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`r_no`),
  KEY `fk_e_no_r` (`e_no`),
  KEY `g_no` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `stu_specialization` varchar(25) NOT NULL,
  PRIMARY KEY (`stu_id`),
  KEY `fk_user_id_s` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `user_id`, `stu_specialization`) VALUES
(171111, 215, 'programming'),
(172011, 191, 'network'),
(172020, 212, 'network'),
(172025, 195, 'programming'),
(172026, 213, 'network'),
(172036, 182, 'control'),
(172045, 198, 'programming'),
(172050, 190, 'programming'),
(172091, 214, 'programming'),
(172099, 210, 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `student_announcement`
--

DROP TABLE IF EXISTS `student_announcement`;
CREATE TABLE IF NOT EXISTS `student_announcement` (
  `stu_group` int(8) NOT NULL,
  `an_no` int(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  KEY `stu_group` (`stu_group`),
  KEY `an_no` (`an_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_announcement`
--

INSERT INTO `student_announcement` (`stu_group`, `an_no`, `status`) VALUES
(65, 94, 1),
(81, 94, 0),
(82, 94, 0),
(84, 94, 0),
(90, 94, 0),
(65, 97, 0),
(81, 97, 0),
(82, 97, 0),
(84, 97, 0),
(90, 97, 0),
(108, 97, 1),
(89, 98, 0),
(98, 98, 0),
(102, 98, 0),
(103, 98, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

DROP TABLE IF EXISTS `student_group`;
CREATE TABLE IF NOT EXISTS `student_group` (
  `stu_group` int(8) NOT NULL AUTO_INCREMENT,
  `stu_id` int(8) NOT NULL,
  `g_no` int(8) NOT NULL,
  PRIMARY KEY (`stu_group`),
  KEY `fk_stu_id_sg` (`stu_id`),
  KEY `fk_g_no_sg` (`g_no`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`stu_group`, `stu_id`, `g_no`) VALUES
(61, 172091, 105),
(65, 172091, 114),
(81, 172050, 114),
(82, 172011, 114),
(84, 172001, 114),
(89, 172091, 122),
(90, 172099, 114),
(96, 172020, 124),
(98, 172050, 122),
(102, 172011, 122),
(103, 172020, 122),
(104, 172020, 123),
(105, 172020, 105),
(106, 172091, 123),
(107, 172091, 101),
(108, 172020, 114),
(109, 171111, 114),
(110, 171111, 122);

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tr_id`, `user_id`, `tr_phone_no`) VALUES
(57, 166, '0958762436'),
(61, 179, '0925555555'),
(62, 180, '0925478111'),
(64, 186, '0925877555'),
(72, 206, '0926666666');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

DROP TABLE IF EXISTS `testing`;
CREATE TABLE IF NOT EXISTS `testing` (
  `g_no` int(8) NOT NULL,
  `stu_id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`g_no`, `stu_id`) VALUES
(122, 172020),
(122, 172021),
(122, 172022),
(122, 172023),
(122, 172025),
(122, 172026),
(122, 172050);

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
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `password`, `u_img`, `role`) VALUES
(166, 'belal hamed', '$2y$10$p8vQgDwIzACDc.KazQ2TyOn.Nx7WCNNsIua5VMESY3T0o8yMbbGXe', '1670697172_profile_image_boy.png', 'teacher'),
(167, 'karema salh', '$2y$10$mWcTZgkv0lrugs5.Ays6Iu36v4UfhWby/afQoicw/xqwDVcs5Cg7K', '1670697231_girl_profile.JPG', 'teacher'),
(177, 'admin admin', '$2y$10$yelvt4SABxNuGZYd2n8gp.XQHh36bHwC04i0tzCu9NBpSf/PvCGoa', '1671528573_profile_woman2.png', 'admin'),
(179, 'nada naser', '$2y$10$6Zp0v.3CuHvDstdMD8PWEe4V0E/GwJDqCggOalhhXZjHvgiUszBya', '1671541638_profile_image_girl.png', 'teacher'),
(180, 'hamed lutfi', '$2y$10$Vze28xNN9KiPcGK3.5sgd.a.HkENe6bm2NuWwW9G8BYvzRShYWmOy', '1671571108_profile_man2.png', 'teacher'),
(182, 'amira mohammed', '$2y$10$DEHT87Qi8tflAxW3LkIlCeBDTBHxxKpRGf6o5.S4RDq0zrNx/9ZhC', '1671571510_profile_woman2.png', ''),
(185, 'saleh omar', '$2y$10$VPayjaO3CjcujXN8Oq6hdOmJ9x6JG8xRqzElW.ldcqdVFXkNe32dK', 'blue_rectangle_with_user.JPG', 'teacher'),
(186, 'zena zr', '$2y$10$Ui7T4ripJQ6BgUOcsewf/edn/HEOJVZhQhMGzqeYkg5tm47gDCEzi', '1671725727_profile_woman2.png', 'teacher'),
(190, 'abrar abdulftah', '$2y$10$7GoYyYZcBwXPjszy2UAQT.SwSSHYwUfx.zepQEkZ9B7YGDWlTuEgW', '1672513237_profile_image_girl.png', ''),
(191, 'essra abdalbaset', '$2y$10$ivjkBV3UviQMHeBtKDn9Bui6skovDR32qugfkPDWu/wYsP76zhmVu', '1672514384_profile_woman2.png', ''),
(195, 'mona hane', '$2y$10$H83oISxedKgt3n3oeuwCLuKoc5Sr0lOK/vZrLesmsUcOOPaHxJ8Ze', 'blue_rectangle_with_user.JPG', ''),
(198, 'abdlfatah zreba', '$2y$10$U2v57nyocxWNVigL/JJLOuIEqC/HJbKiUxRhKfczskRnILbE4gtta', 'blue_rectangle_with_user.JPG', ''),
(206, 'hala salem', '$2y$10$HOPf6kJWS4RGhoJEvFbLgOCLwVtOh24thmd9FnN8GtSDt6pWj0Uqy', 'blue_rectangle_with_user.JPG', 'teacher'),
(211, 'omar sasi', '$2y$10$mnArLHFaBmQiCysSjE85G..nsRMtK3Mf1B37z39hpYp5pJHvGBVO6', '1673302875_image.jpg', 'admin'),
(212, 'nono no', '$2y$10$dxciX5cqY8.5Ys2R9AlUMeSMZ.XCTWTCgSyzjWuhqy7J76QbmRxrm', '1673734855_girl_profile.JPG', ''),
(213, 'nada foud', '$2y$10$qQlX8ecsKeTWfLaj/341h.bq3OvM0FPd07hyXlKCTbsYVxj6xsecC', 'blue_rectangle_with_user.JPG', ''),
(214, 'yakeen zr', '$2y$10$ElXjWDQSwZn9rt3uslivxOao0xqRzhRweBtnmbemJMgGGIGj61Egu', '1673965450_profile_image_girl.png', ''),
(215, 'student stu', '$2y$10$MBdl/2cTFfUZhZ/78sDdW.hn.4j70.TyG3Ul/zsAZ.zV9mkrNzXL6', '1674398038_profile_woman2.png', '');

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
-- Constraints for table `student_announcement`
--
ALTER TABLE `student_announcement`
  ADD CONSTRAINT `student_announcement_ibfk_1` FOREIGN KEY (`stu_group`) REFERENCES `student_group` (`stu_group`),
  ADD CONSTRAINT `student_announcement_ibfk_2` FOREIGN KEY (`an_no`) REFERENCES `announcement` (`an_no`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
