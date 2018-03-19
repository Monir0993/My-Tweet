-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2016 at 04:28 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_my_tweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_description` text NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friend`
--

CREATE TABLE IF NOT EXISTS `tbl_friend` (
  `connection_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `friend_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_friend`
--

INSERT INTO `tbl_friend` (`connection_id`, `user_id`, `friend_id`, `friend_since`) VALUES
(13, 51, 54, '2016-02-26 21:14:19'),
(14, 51, 49, '2016-02-26 21:14:23'),
(17, 51, 47, '2016-02-26 21:16:40'),
(18, 51, 46, '2016-02-26 21:16:48'),
(19, 51, 50, '2016-02-26 21:16:51'),
(21, 51, 55, '2016-02-26 21:30:33'),
(22, 56, 51, '2016-02-27 07:17:28'),
(24, 44, 54, '2016-02-27 07:27:19'),
(25, 51, 57, '2016-02-27 07:36:24'),
(26, 51, 58, '2016-02-27 07:44:15'),
(27, 44, 58, '2016-02-28 18:02:35'),
(28, 44, 57, '2016-02-28 18:02:45'),
(30, 46, 44, '2016-02-28 18:34:35'),
(31, 48, 44, '2016-02-28 18:35:20'),
(34, 44, 51, '2016-02-28 19:17:31'),
(35, 49, 44, '2016-03-01 08:46:04'),
(36, 49, 58, '2016-03-01 08:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friend_request`
--

CREATE TABLE IF NOT EXISTS `tbl_friend_request` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requested_user_id` int(11) NOT NULL,
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_friend_request`
--

INSERT INTO `tbl_friend_request` (`request_id`, `user_id`, `requested_user_id`, `request_time`, `request_status`) VALUES
(40, 54, 57, '2016-02-27 07:36:57', 0),
(42, 45, 57, '2016-02-27 07:37:11', 0),
(45, 47, 58, '2016-02-27 07:58:24', 0),
(46, 55, 58, '2016-02-27 07:58:34', 0),
(47, 54, 58, '2016-02-27 07:58:47', 0),
(48, 45, 58, '2016-02-27 07:58:50', 0),
(50, 47, 44, '2016-02-28 18:17:44', 0),
(51, 50, 44, '2016-02-28 18:17:50', 0),
(53, 45, 51, '2016-02-28 18:45:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE IF NOT EXISTS `tbl_like` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `user_like_id` int(11) NOT NULL,
  `like_type` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=751 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE IF NOT EXISTS `tbl_photo` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `photo_type` tinyint(1) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`photo_id`, `user_id`, `post_id`, `user_photo`, `photo_type`, `upload_time`) VALUES
(16, 45, 21, './user_imge/Kumu2.jpg', 3, '2016-02-19 11:13:38'),
(17, 44, 22, './user_imge/monir.jpg', 4, '2016-02-19 11:16:00'),
(18, 44, 23, './user_imge/Saitama_OK.jpg', 4, '2016-02-19 11:17:13'),
(19, 44, 24, './user_imge/monir1.jpg', 3, '2016-02-19 14:43:59'),
(20, 44, 25, './user_imge/img9.jpg', 2, '2016-02-19 15:15:39'),
(21, 44, 26, './user_imge/Untitled.jpg', 2, '2016-02-19 15:17:00'),
(22, 44, 27, './user_imge/tea.jpg', 2, '2016-02-19 15:19:59'),
(23, 45, 28, './user_imge/img2.jpg', 1, '2016-02-19 15:23:56'),
(24, 47, 29, './user_imge/abu.jpg', 3, '2016-02-19 15:35:45'),
(25, 46, 30, './user_imge/alamin.jpg', 3, '2016-02-19 15:36:41'),
(26, 46, 31, './user_imge/alm.jpg', 1, '2016-02-19 15:36:56'),
(27, 44, 32, './user_imge/alm1.jpg', 1, '2016-02-19 15:38:24'),
(28, 48, 33, './user_imge/sumcov.jpg', 2, '2016-02-20 18:48:46'),
(29, 48, 34, './user_imge/sumit.jpg', 3, '2016-02-20 18:49:31'),
(30, 49, 35, './user_imge/rok.jpg', 3, '2016-02-20 18:53:08'),
(31, 49, 36, './user_imge/rokcov.jpg', 1, '2016-02-20 18:53:18'),
(32, 50, 37, './user_imge/is.jpg', 3, '2016-02-20 18:56:32'),
(33, 50, 38, './user_imge/ism.jpg', 1, '2016-02-20 18:56:46'),
(34, 51, 39, './user_imge/598464_202432366559608_333440388_n.jpg', 3, '2016-02-20 19:01:47'),
(35, 51, 40, NULL, 2, '2016-02-20 19:03:19'),
(36, 51, 41, './user_imge/7576775duFeZqJQvM_ph.jpg', 1, '2016-02-20 19:06:31'),
(37, 52, 42, './user_imge/nurin.jpg', 1, '2016-02-21 20:49:13'),
(38, 52, 43, './user_imge/nurpro.jpg', 3, '2016-02-21 20:49:37'),
(39, 53, 44, './user_imge/now.jpg', 3, '2016-02-21 20:55:43'),
(40, 53, 45, './user_imge/nofc.jpg', 1, '2016-02-21 20:56:00'),
(41, 54, 46, './user_imge/red.jpg', 3, '2016-02-21 20:59:42'),
(42, 54, 47, './user_imge/redc.jpg', 1, '2016-02-21 20:59:57'),
(43, 48, 48, './user_imge/41817104nERtRF_ph.jpg', 2, '2016-02-22 16:06:10'),
(44, 48, 49, './user_imge/52038356EaNkoh_ph.jpg', 1, '2016-02-22 19:00:23'),
(45, 47, 50, './user_imge/52065256IjLhOt_ph.jpg', 2, '2016-02-26 12:50:28'),
(46, 47, 51, './user_imge/011.jpg', 1, '2016-02-26 12:51:09'),
(47, 55, 52, './user_imge/piku-image-2-saree-traditional-look.jpg', 3, '2016-02-26 13:07:32'),
(48, 55, 53, './user_imge/994926_239025092917572_1831561795_n.jpg', 1, '2016-02-26 13:07:57'),
(49, 56, 54, './user_imge/10888481_1256472997713178_7328614634416890970_n.jpg', 3, '2016-02-26 13:12:40'),
(50, 56, 55, './user_imge/Deepika-Padukone-is-the-bestest-deepika-padukone-36020315-2560-1600.jpg', 1, '2016-02-26 13:13:31'),
(51, 57, 56, './user_imge/10407718_842876422421464_2995062003582497576_n.jpg', 3, '2016-02-27 07:33:59'),
(52, 57, 57, './user_imge/1488322_636479589727816_2037012561_n.jpg', 2, '2016-02-27 07:34:33'),
(53, 57, 58, './user_imge/156167_334052736657562_212605325468971_900177_1598655351_n.jpg', 1, '2016-02-27 07:35:27'),
(54, 58, 59, './user_imge/35888_332465586816277_212605325468971_895975_1036631919_n.jpg', 1, '2016-02-27 07:41:52'),
(55, 58, 60, './user_imge/shakib_al_hasan11.jpg', 3, '2016-02-27 07:43:49'),
(59, 51, 63, NULL, 5, '2016-02-28 22:35:51'),
(61, 55, 65, './user_imge/12540975_1567484003574111_3116856790509708402_n1.jpg', 5, '2016-02-28 22:57:50'),
(62, 56, 66, './user_imge/12208610_1258755727484905_867102665667603537_n.jpg', 5, '2016-03-01 08:56:10'),
(63, 51, 67, NULL, 5, '2016-03-01 09:15:08'),
(64, 51, 68, NULL, 5, '2016-03-01 09:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_description` text,
  `privacy_status` tinyint(1) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `user_id`, `post_description`, `privacy_status`, `post_time`) VALUES
(21, 45, '', 2, '2016-02-19 11:13:38'),
(22, 44, '', 2, '2016-02-19 11:16:00'),
(23, 44, '', 2, '2016-02-19 11:17:12'),
(24, 44, '', 2, '2016-02-19 14:43:59'),
(25, 44, '', 2, '2016-02-19 15:15:39'),
(26, 44, '', 2, '2016-02-19 15:17:00'),
(27, 44, '', 2, '2016-02-19 15:19:59'),
(28, 45, '', 2, '2016-02-19 15:23:56'),
(29, 47, '', 2, '2016-02-19 15:35:45'),
(30, 46, '', 2, '2016-02-19 15:36:41'),
(31, 46, '', 2, '2016-02-19 15:36:56'),
(32, 44, '', 2, '2016-02-19 15:38:24'),
(33, 48, '', 2, '2016-02-20 18:48:46'),
(34, 48, '', 2, '2016-02-20 18:49:31'),
(35, 49, '', 2, '2016-02-20 18:53:07'),
(36, 49, '', 2, '2016-02-20 18:53:18'),
(37, 50, '', 1, '2016-02-20 18:56:32'),
(38, 50, '', 2, '2016-02-20 18:56:46'),
(39, 51, '', 2, '2016-02-20 19:01:47'),
(40, 51, '', 2, '2016-02-20 19:03:19'),
(41, 51, '', 2, '2016-02-20 19:06:30'),
(42, 52, '', 2, '2016-02-21 20:49:13'),
(43, 52, '', 2, '2016-02-21 20:49:37'),
(44, 53, '', 2, '2016-02-21 20:55:43'),
(45, 53, '', 2, '2016-02-21 20:55:59'),
(46, 54, '', 2, '2016-02-21 20:59:42'),
(47, 54, '', 2, '2016-02-21 20:59:57'),
(48, 48, 'একাকি রাজপথে নিঃসঙ্গ পথচলা\r\nপথের অন্তরালে তুমি আর তোমার ছায়া;\r\nনিস্তব্ধ দ্রোহের মায়াজালে\r\nশূন্যতার প্রতিশ্রুতি তুমি\r\nঅন্ধকার, চারিদিকে অন্ধকার।\r\n\r\nচারুশিল্পের অস্পৃশ্য ছোঁয়ায়\r\nসিক্ত হৃদয় আমার;\r\nধ্রুপদী নৃত্যের মায়াবি আঘাতে\r\nঝরে পরছে ছেলেবেলার স্বপ্নগুলো\r\nআর তারি সাথে তুমিও।\r\n\r\nতোমায় লেখা শেষ চিঠিটি\r\nসময়ের বিড়ম্বনায় অসমাপ্তই রয়ে গেলো\r\nতাই বিবর্তনের মাঝেও অসম্পূর্ণ আজ\r\nএই ‘আমি’।\r\n', 2, '2016-02-22 16:06:09'),
(49, 48, 'This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading.This is Heading..', 2, '2016-02-22 19:00:23'),
(50, 47, '', 2, '2016-02-26 12:50:28'),
(51, 47, '', 1, '2016-02-26 12:51:08'),
(52, 55, '', 2, '2016-02-26 13:07:32'),
(53, 55, '', 2, '2016-02-26 13:07:57'),
(54, 56, '', 2, '2016-02-26 13:12:40'),
(55, 56, '', 2, '2016-02-26 13:13:30'),
(56, 57, '', 2, '2016-02-27 07:33:59'),
(57, 57, '', 2, '2016-02-27 07:34:33'),
(58, 57, '', 2, '2016-02-27 07:35:27'),
(59, 58, '', 2, '2016-02-27 07:41:51'),
(60, 58, '', 2, '2016-02-27 07:43:49'),
(63, 51, 'Kumu tultul kumu tultul', 1, '2016-02-28 22:35:51'),
(65, 55, 'Depeeka Padukon', 2, '2016-02-28 22:57:50'),
(66, 56, 'Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.Sabnam Faria.', 2, '2016-03-01 08:56:10'),
(67, 51, 'kumu jannatun tultul', 2, '2016-03-01 09:15:08'),
(68, 51, 'jannatun nayeem kumu', 3, '2016-03-01 09:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply`
--

CREATE TABLE IF NOT EXISTS `tbl_reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_description` text NOT NULL,
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email_address` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_mobile_number` varchar(14) DEFAULT NULL,
  `user_current_address` text,
  `user_parmanent_address` text,
  `user_birth_date` date DEFAULT NULL,
  `user_sex` varchar(10) DEFAULT NULL,
  `user_raligious_view` varchar(25) DEFAULT NULL,
  `user_relationship_status` varchar(20) DEFAULT NULL,
  `user_about_you` text
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email_address`, `user_password`, `user_mobile_number`, `user_current_address`, `user_parmanent_address`, `user_birth_date`, `user_sex`, `user_raligious_view`, `user_relationship_status`, `user_about_you`) VALUES
(44, 'Monir Ahmed', 'monir.ahmed0993@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(45, 'Jannatun Kumu', 'jannat.nayeem01@gmail.com', '3d2172418ce305c7d16d4b05597c6a59', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL),
(46, 'Alamin Mia', 'alamin01@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(47, 'Abu Bokor', 'abu@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(48, 'Sakhawat Sumit', 'sumit03@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(49, 'Md. Rokon Uzzaman', 'rokon01@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(50, 'Md. Ismail Hossain', 'ismail01@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(51, 'Jannatun Nayeem', 'jannat.nayeem050@hotmail.com', '3d2172418ce305c7d16d4b05597c6a59', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL),
(52, 'Sadia Nawrin', 'sadia01@gmail.com', '3d2172418ce305c7d16d4b05597c6a59', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL),
(53, 'Woaraka Been Mahbub Nowfel', 'nowfel01@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(54, 'Jm Redwan', 'redwan01@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL),
(55, 'Depeeka Padukon', 'depeeka01@gmail.com', '3d2172418ce305c7d16d4b05597c6a59', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL),
(56, 'Sabnam Faria', 'faria01@gmail.com', '3d2172418ce305c7d16d4b05597c6a59', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL),
(57, 'Koel Mullik', 'koel01@gmail.com', '3d2172418ce305c7d16d4b05597c6a59', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL),
(58, 'Sakib Al Hassan', 'sakib01@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_friend`
--
ALTER TABLE `tbl_friend`
  ADD PRIMARY KEY (`connection_id`);

--
-- Indexes for table `tbl_friend_request`
--
ALTER TABLE `tbl_friend_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_friend`
--
ALTER TABLE `tbl_friend`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_friend_request`
--
ALTER TABLE `tbl_friend_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=751;
--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
