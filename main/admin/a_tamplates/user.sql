-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2025 at 07:07 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_info`
--

DROP TABLE IF EXISTS `a_info`;
CREATE TABLE IF NOT EXISTS `a_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `a_info`
--

INSERT INTO `a_info` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `liked_song`
--

DROP TABLE IF EXISTS `liked_song`;
CREATE TABLE IF NOT EXISTS `liked_song` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sn` int NOT NULL,
  `s_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `liked_song`
--

INSERT INTO `liked_song` (`id`, `sn`, `s_id`) VALUES
(33, 22, 11),
(24, 22, 1),
(28, 22, 12),
(32, 22, 15),
(26, 22, 14);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `p_sn` int NOT NULL AUTO_INCREMENT,
  `playlist_id` int NOT NULL,
  `playlist_image` varchar(100) NOT NULL,
  `playlist_name` varchar(100) NOT NULL,
  `song_id` int NOT NULL,
  PRIMARY KEY (`p_sn`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`p_sn`, `playlist_id`, `playlist_image`, `playlist_name`, `song_id`) VALUES
(24, 2, 'songs/p2.jpg', 'The killer bee', 15),
(25, 1, 'songs/p6.jpg', 'the bangers', 3),
(4, 2, 'songs/p2.jpg', 'The killer bee', 1),
(22, 1, 'songs/p6.jpg', 'the bangers', 1),
(23, 1, 'songs/p6.jpg', 'the bangers', 2),
(26, 1, 'songs/p6.jpg', 'the bangers', 14),
(27, 2, 'songs/p2.jpg', 'The killer bee', 14),
(28, 2, 'songs/p2.jpg', 'The killer bee', 11);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `user_id` int NOT NULL,
  `bank_name` varchar(90) NOT NULL,
  `account_number` int NOT NULL,
  `ifsc_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `duration` int NOT NULL,
  `amount` int NOT NULL,
  `sub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`user_id`, `bank_name`, `account_number`, `ifsc_code`, `duration`, `amount`, `sub_date`) VALUES
(22, 'HDFC', 4567, '895687', 12, 1599, '2025-02-15 20:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `s_details`
--

DROP TABLE IF EXISTS `s_details`;
CREATE TABLE IF NOT EXISTS `s_details` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `cover_image` varchar(100) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `s_details`
--

INSERT INTO `s_details` (`s_id`, `title`, `artist`, `album`, `file_path`, `cover_image`) VALUES
(1, 'Bajrang Baan', 'Lofi', 'Bajrang', 'songs/Bajrang Baan (Lofi)(MP3_160K).mp3', 'songs/p2.jpg'),
(2, 'Lose Yourself', 'Eminem', 'Eminem101', 'songs/Eminem - Lose Yourself [HD](MP3_320K).mp3', 'songs/p12.jpg'),
(3, 'Pactaoge', 'Arijit Sing', 'Dard', 'songs/Arijit Singh_ Pachtaoge _ Vicky Kaushal_ Nora Fatehi _Jaani_ B Praak_ Arvindr Khaira _ Bhushan', 'songs/p4.jpg'),
(4, 'Arti', 'this is te', 'this is te', 'songs/अवध में राम आए है _ Full Bhajan _ Jaya Kishori(MP3_160K).mp3', 'songs/pp.png'),
(11, 'Black Top Billi', 'Billi Eyelish', 'The secreat', 'songs/Armani White - BILLIE EILISH. (Official Video)(MP3_320K).mp3', 'songs/p8.jpg'),
(12, 'Millioner', 'Honey Bhai', 'Millioners', 'songs/MIllioner.m4a', 'songs/p22.jpg'),
(14, 'jmjm', 'e4o4kto0k', 'wf8j', 'songs/01 Dilbar - Satyameva Jayate.mp3', 'songs/p9.jpg'),
(15, 'How You Like That', 'BLACKPINLK', 'NCE', 'songs/BLACKPINK - _How You Like That_ DANCE PERFORMANCE VIDEO(MP3_320K).mp3', 'songs/p18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `u_info`
--

DROP TABLE IF EXISTS `u_info`;
CREATE TABLE IF NOT EXISTS `u_info` (
  `sn` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile_photo` varchar(400) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `hobbies` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscription` varchar(15) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`sn`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `u_info`
--

INSERT INTO `u_info` (`sn`, `email`, `phone`, `profile_photo`, `dob`, `gender`, `description`, `hobbies`, `username`, `password`, `date`, `subscription`) VALUES
(22, 'user@user', '54698745', 'images/pp.png', '2025-02-02', 'male', 'This is the user', 'I like Music', 'user', 'user', '2025-02-11 18:12:26', 'YES'),
(21, 'sad@ewfd', '3243425', 'images/p6.jpg', '2024-12-04', 'male', 'adsf', 'sdcfve', 'ex2', 'ex2', '2024-12-26 20:43:22', 'NO'),
(9, 'ex@1', '54370000', 'images/p9.jpg', '2004-07-25', 'male', '   ertyuio   ', 'rfgvquhddiuhcoicycjoh cq dj0iqh 9ijqpopjo0i qwhdi0j ', 'ex1', 'ex1', '2024-12-22 21:36:38', 'NO'),
(8, 'admin@admin', '8293818300', 'images/p17.jpg', '2004-07-20', 'trance', ' this is me ', 'singing', 'admin1', 'admin1', '2024-12-22 15:40:11', 'NO'),
(20, 'priyanshu03@gmail.com', '9631574207', 'images/p1.jpg', '2005-01-03', 'male', 'i konw about this website', 'ndjn', 'ppp', '123', '2024-12-26 12:27:04', 'NO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
