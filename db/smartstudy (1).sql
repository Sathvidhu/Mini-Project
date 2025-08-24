-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartstudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `page_time`
--

CREATE TABLE `page_time` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `time_spent` int(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `visited_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_time`
--

INSERT INTO `page_time` (`id`, `email`, `time_spent`, `page`, `visited_at`) VALUES
(1, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-07-21 11:12:02'),
(82, 'sathvidhu@gmail.com', 357, 'dashboard.php', '2025-07-21 11:19:18'),
(83, 'sathvidhu@gmail.com', 16, 'dashboard.php', '2025-07-23 14:05:08'),
(84, 'sathvidhu@gmail.com', 63, 'dashboard.php', '2025-07-23 14:05:55'),
(85, 'sathvidhu@gmail.com', 690, 'dashboard.php', '2025-07-23 14:16:22'),
(86, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-07-23 14:16:22'),
(87, 'sathvidhu@gmail.com', 3, 'dashboard.php', '2025-07-23 14:16:26'),
(88, 'sathvidhu@gmail.com', 74, 'dashboard.php', '2025-07-23 14:17:40'),
(89, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-23 14:17:42'),
(90, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-07-23 14:17:43'),
(91, 'sathvidhu@gmail.com', 150, 'dashboard.php', '2025-07-23 14:20:21'),
(92, 'sathvidhu@gmail.com', 5, 'dashboard.php', '2025-07-23 14:20:26'),
(93, 'sathvidhu@gmail.com', 78, 'dashboard.php', '2025-07-23 14:21:43'),
(94, 'sathvidhu@gmail.com', 8, 'dashboard.php', '2025-07-23 14:21:51'),
(95, 'sathvidhu@gmail.com', 48, 'dashboard.php', '2025-07-23 14:22:38'),
(96, 'sathvidhu@gmail.com', 5, 'dashboard.php', '2025-07-23 14:22:43'),
(97, 'sathvidhu@gmail.com', 26, 'dashboard.php', '2025-07-23 14:23:05'),
(98, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-07-23 14:27:31'),
(99, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-23 14:27:33'),
(100, 'sathvidhu@gmail.com', 27, 'dashboard.php', '2025-07-23 14:27:58'),
(101, 'sathvidhu@gmail.com', 31, 'dashboard.php', '2025-07-23 14:28:02'),
(102, 'sathvidhu@gmail.com', 34, 'dashboard.php', '2025-07-23 14:28:05'),
(103, 'sathvidhu@gmail.com', 42, 'dashboard.php', '2025-07-23 14:28:13'),
(104, 'sathvidhu@gmail.com', 8, 'dashboard.php', '2025-07-23 14:28:21'),
(105, 'sathvidhu@gmail.com', 16, 'dashboard.php', '2025-07-23 14:28:29'),
(106, 'sathvidhu@gmail.com', 218, 'dashboard.php', '2025-07-23 14:31:52'),
(107, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-07-23 14:31:54'),
(108, 'sathvidhu@gmail.com', 612, 'dashboard.php', '2025-07-23 14:42:59'),
(109, 'sathvidhu@gmail.com', 30, 'dashboard.php', '2025-07-23 14:46:04'),
(110, 'sathvidhu@gmail.com', 5, 'dashboard.php', '2025-07-23 14:46:10'),
(111, 'sathvidhu@gmail.com', 13, 'dashboard.php', '2025-07-23 14:46:29'),
(112, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-07-23 14:46:30'),
(113, 'sathvidhu@gmail.com', 5, 'dashboard.php', '2025-07-23 14:46:36'),
(114, 'sathvidhu@gmail.com', 248, 'dashboard.php', '2025-07-23 14:50:45'),
(115, 'sathvidhu@gmail.com', 6, 'dashboard.php', '2025-07-23 14:50:51'),
(116, 'anziya@gmail.com', 119, 'dashboard.php', '2025-07-23 14:55:15'),
(117, 'anziya@gmail.com', 0, 'dashboard.php', '2025-07-23 14:55:16'),
(118, 'anziya@gmail.com', 0, 'dashboard.php', '2025-07-23 14:55:16'),
(119, 'anziya@gmail.com', 0, 'dashboard.php', '2025-07-23 14:55:17'),
(120, 'anziya@gmail.com', 0, 'dashboard.php', '2025-07-23 14:55:17'),
(121, 'anziya@gmail.com', 1, 'dashboard.php', '2025-07-23 14:55:18'),
(122, 'sathvidhu@gmail.com', 22, 'dashboard.php', '2025-07-23 14:55:52'),
(123, 'sathvidhu@gmail.com', 657, 'dashboard.php', '2025-07-23 15:06:50'),
(124, 'sathvidhu@gmail.com', 420, 'dashboard.php', '2025-07-23 15:17:22'),
(125, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-07-23 15:19:07'),
(126, 'sathvidhu@gmail.com', 19, 'dashboard.php', '2025-07-23 15:19:31'),
(127, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-23 15:19:34'),
(128, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-23 15:24:08'),
(129, 'sathvidhu@gmail.com', 3208, 'dashboard.php', '2025-07-23 16:50:55'),
(130, 'sathvidha@gmail.com', 23, 'dashboard.php', '2025-07-24 12:06:57'),
(131, 'sathvidha@gmail.com', 3, 'dashboard.php', '2025-07-24 12:07:26'),
(132, 'sathvidhu@gmail.com', 3, 'dashboard.php', '2025-07-24 12:07:35'),
(133, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-24 12:08:25'),
(134, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-24 12:09:41'),
(135, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-24 12:09:59'),
(136, 'sathvidhu@gmail.com', 6, 'dashboard.php', '2025-07-24 12:10:11'),
(137, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-07-24 12:10:17'),
(138, 'sathvidhu@gmail.com', 14, 'dashboard.php', '2025-08-02 18:21:50'),
(139, 'sathvidhu@gmail.com', 355, 'dashboard.php', '2025-08-02 18:27:30'),
(140, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 18:27:31'),
(141, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-08-02 18:27:36'),
(142, 'sathvidhu@gmail.com', 326, 'dashboard.php', '2025-08-02 18:32:57'),
(143, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 18:32:58'),
(144, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 18:32:58'),
(145, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-02 18:32:59'),
(146, 'sathvidhu@gmail.com', 6, 'dashboard.php', '2025-08-02 18:33:04'),
(147, 'sathvidhu@gmail.com', 30, 'dashboard.php', '2025-08-02 18:33:28'),
(148, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-02 18:33:31'),
(149, 'sathvidhu@gmail.com', 115, 'dashboard.php', '2025-08-02 18:35:24'),
(150, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 18:35:24'),
(151, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-02 18:35:26'),
(152, 'sathvidhu@gmail.com', 6, 'dashboard.php', '2025-08-02 18:35:31'),
(153, 'sathvidhu@gmail.com', 12, 'dashboard.php', '2025-08-02 18:35:37'),
(154, 'sathvidhu@gmail.com', 15, 'dashboard.php', '2025-08-02 18:35:40'),
(155, 'sathvidhu@gmail.com', 20, 'dashboard.php', '2025-08-02 18:35:44'),
(156, 'sathvidhu@gmail.com', 22, 'dashboard.php', '2025-08-02 18:35:47'),
(157, 'sathvidhu@gmail.com', 78, 'dashboard.php', '2025-08-02 18:36:42'),
(158, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-02 18:36:45'),
(159, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-08-02 18:36:47'),
(160, 'sathvidhu@gmail.com', 6, 'dashboard.php', '2025-08-02 18:36:49'),
(161, 'sathvidhu@gmail.com', 9, 'dashboard.php', '2025-08-02 18:36:52'),
(162, 'sathvidhu@gmail.com', 3696, 'dashboard.php', '2025-08-02 19:38:19'),
(163, 'sathvidhu@gmail.com', 4075, 'dashboard.php', '2025-08-02 19:44:38'),
(164, 'sathvidhu@gmail.com', 4612, 'dashboard.php', '2025-08-02 19:53:35'),
(165, 'sathvidhu@gmail.com', 502, 'dashboard.php', '2025-08-02 20:01:59'),
(166, 'sathvidhu@gmail.com', 586, 'dashboard.php', '2025-08-02 20:03:22'),
(167, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-02 22:35:57'),
(168, 'sathvidhu@gmail.com', 7, 'dashboard.php', '2025-08-02 22:42:02'),
(169, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-02 22:46:00'),
(170, 'sathvidhu@gmail.com', 47, 'dashboard.php', '2025-08-02 22:46:47'),
(171, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 22:46:48'),
(172, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-08-02 22:46:52'),
(173, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 22:46:52'),
(174, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-02 22:46:55'),
(175, 'sathvidhu@gmail.com', 148, 'dashboard.php', '2025-08-02 22:49:24'),
(176, 'sathvidhu@gmail.com', 28, 'dashboard.php', '2025-08-02 22:49:53'),
(177, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-02 22:49:54'),
(178, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 22:49:55'),
(179, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-08-02 22:50:00'),
(180, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 22:50:00'),
(181, 'sathvidhu@gmail.com', 5, 'dashboard.php', '2025-08-02 22:50:06'),
(182, 'sathvidhu@gmail.com', 9, 'dashboard.php', '2025-08-02 22:50:16'),
(183, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 22:50:17'),
(184, 'sathvidhu@gmail.com', 5, 'dashboard.php', '2025-08-02 22:50:23'),
(185, 'sathvidhu@gmail.com', 28, 'dashboard.php', '2025-08-02 22:50:46'),
(186, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-02 22:50:46'),
(187, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-02 22:50:48'),
(188, 'sathvidhu@gmail.com', 30, 'dashboard.php', '2025-08-02 22:51:16'),
(189, 'sathvidhu@gmail.com', 1992, 'dashboard.php', '2025-08-02 23:23:59'),
(190, 'sathvidhu@gmail.com', 181, 'dashboard.php', '2025-08-03 08:38:56'),
(191, 'sathvidhu@gmail.com', 3680, 'dashboard.php', '2025-08-03 09:37:14'),
(192, 'name@gmail.com', 9, 'dashboard.php', '2025-08-03 19:52:25'),
(193, 'name@gmail.com', 27, 'dashboard.php', '2025-08-03 19:52:42'),
(194, 'name@gmail.com', 36, 'dashboard.php', '2025-08-03 19:52:52'),
(195, 'name@gmail.com', 39, 'dashboard.php', '2025-08-03 19:52:55'),
(196, 'name@gmail.com', 42, 'dashboard.php', '2025-08-03 19:52:58'),
(197, 'name@gmail.com', 51, 'dashboard.php', '2025-08-03 19:53:07'),
(198, 'name@gmail.com', 57, 'dashboard.php', '2025-08-03 19:53:13'),
(199, 'name@gmail.com', 63, 'dashboard.php', '2025-08-03 19:53:19'),
(200, 'name@gmail.com', 4, 'dashboard.php', '2025-08-03 20:00:10'),
(201, 'sathvidhu@gmail.com', 122, 'dashboard.php', '2025-08-11 21:12:16'),
(202, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-11 21:12:17'),
(203, 'sathvidhu@gmail.com', 9, 'dashboard.php', '2025-08-14 20:14:36'),
(204, 'sathvidhu@gmail.com', 21, 'dashboard.php', '2025-08-14 20:14:48'),
(205, 'sathvidhu@gmail.com', 24, 'dashboard.php', '2025-08-14 20:14:51'),
(206, 'sathvidhu@gmail.com', 275, 'dashboard.php', '2025-08-14 20:19:02'),
(207, 'sathvidhu@gmail.com', 338, 'dashboard.php', '2025-08-14 20:20:05'),
(208, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-14 20:20:07'),
(209, 'sathvidhu@gmail.com', 4, 'dashboard.php', '2025-08-14 20:42:29'),
(210, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-14 20:42:32'),
(211, 'sathvidhu@gmail.com', 75, 'dashboard.php', '2025-08-14 20:43:45'),
(212, 'sathvidhu@gmail.com', 132, 'dashboard.php', '2025-08-14 20:44:42'),
(213, 'sathvidhu@gmail.com', 177, 'dashboard.php', '2025-08-14 20:48:27'),
(214, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-14 20:48:30'),
(215, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-14 20:48:32'),
(216, 'sathvidhu@gmail.com', 7, 'dashboard.php', '2025-08-14 22:50:09'),
(217, 'sathvidhu@gmail.com', 184, 'dashboard.php', '2025-08-14 22:53:06'),
(218, 'sathvidhu@gmail.com', 211, 'dashboard.php', '2025-08-14 22:53:33'),
(219, 'sathvidhu@gmail.com', 250, 'dashboard.php', '2025-08-14 22:54:12'),
(220, 'sathvidhu@gmail.com', 253, 'dashboard.php', '2025-08-14 22:54:15'),
(221, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-14 23:04:10'),
(222, 'sathvidhu@gmail.com', 39, 'dashboard.php', '2025-08-14 23:04:47'),
(223, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-14 23:04:49'),
(224, 'sathvidhu@gmail.com', 1, 'dashboard.php', '2025-08-14 23:30:02'),
(225, 'sathvidhu@gmail.com', 41, 'dashboard.php', '2025-08-14 23:30:42'),
(226, 'sathvidhu@gmail.com', 7, 'dashboard.php', '2025-08-14 23:30:49'),
(227, 'sathvidhu@gmail.com', 2, 'dashboard.php', '2025-08-15 11:07:05'),
(228, 'sathvidhu@gmail.com', 0, 'dashboard.php', '2025-08-15 11:11:40'),
(229, 'anziya@gmail.com', 1, 'dashboard.php', '2025-08-15 11:12:08'),
(230, 'anziya@gmail.com', 4, 'dashboard.php', '2025-08-15 16:21:07'),
(231, 'anziya@gmail.com', 2, 'dashboard.php', '2025-08-15 16:24:15'),
(232, 'anziya@gmail.com', 2, 'dashboard.php', '2025-08-15 18:07:50'),
(233, 'anziya@gmail.com', 1, 'dashboard.php', '2025-08-15 18:13:33'),
(234, 'anziya@gmail.com', 1, 'dashboard.php', '2025-08-15 18:14:16'),
(235, 'anziya@gmail.com', 3, 'dashboard.php', '2025-08-15 19:07:53'),
(236, 'ajin@gmail.com', 2, 'dashboard.php', '2025-08-15 19:09:11'),
(237, 'ajin@gmail.com', 2, 'dashboard.php', '2025-08-15 19:19:38'),
(238, 'ajin@gmail.com', 2, 'dashboard.php', '2025-08-15 22:40:18'),
(239, 'swathi@gmail.com', 2, 'dashboard.php', '2025-08-15 22:41:05'),
(240, 'swathi@gmail.com', 1, 'dashboard.php', '2025-08-15 22:42:58'),
(241, 'swathi@gmail.com', 19, 'dashboard.php', '2025-08-15 22:58:00'),
(242, 'swathi@gmail.com', 4, 'dashboard.php', '2025-08-15 22:58:07'),
(243, 'swathi@gmail.com', 126, 'dashboard.php', '2025-08-15 23:00:10'),
(244, 'swathi@gmail.com', 424, 'dashboard.php', '2025-08-15 23:05:07'),
(245, 'swathi@gmail.com', 15, 'dashboard.php', '2025-08-15 23:05:26'),
(246, 'sathvidhu@gmail.com', 11, 'dashboard.php', '2025-08-16 09:08:28'),
(247, 'sathvidhu@gmail.com', 207, 'dashboard.php', '2025-08-16 09:12:19'),
(248, 'dell@gmail.com', 18, 'dashboard.php', '2025-08-16 09:41:23'),
(249, 'anziya@gmail.com', 691, 'dashboard.php', '2025-08-16 10:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `fname` varchar(15) NOT NULL,
  `class` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass1` varchar(15) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `time1` time NOT NULL,
  `time2` time NOT NULL,
  `physicsmark` int(10) NOT NULL,
  `chemistrymark` int(10) NOT NULL,
  `mathsmark` int(10) NOT NULL,
  `biologymark` int(10) NOT NULL,
  `extracurricular` varchar(100) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `attandance` int(11) NOT NULL DEFAULT 0,
  `last_attendance` date DEFAULT NULL,
  `profile` int(5) NOT NULL DEFAULT 0,
  `gender` varchar(10) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `mobilenumber` int(15) NOT NULL,
  `pemail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`fname`, `class`, `age`, `email`, `pass1`, `sname`, `time1`, `time2`, `physicsmark`, `chemistrymark`, `mathsmark`, `biologymark`, `extracurricular`, `hobbies`, `attandance`, `last_attendance`, `profile`, `gender`, `pname`, `mobilenumber`, `pemail`) VALUES
('ajin', '10', 17, 'ajin@gmail.com', 'ajin', 'svrc', '10:00:00', '03:30:00', 54, 87, 98, 88, 'music', 'reading', 1, '2025-08-15', 1, 'male', 'fdoiu', 2147483647, 'ajinmom@gmail.com'),
('anziya', '9', 16, 'anziya@gmail.com', 'anziya', 'svrc', '10:00:00', '03:30:00', 89, 85, 84, 97, 'music', 'coding', 4, '2025-08-16', 1, 'female', 'anzi', 89756421, 'pemail@gmai.com'),
('dell', '10', 15, 'dell@gmail.com', 'dell', 'dell', '10:10:00', '10:10:00', 45, 54, 54, 78, 'coding', 'coding', 1, '2025-08-16', 1, 'Male', 'dell', 2147483647, 'dell1@gmail.com'),
('faaiz', '9', 16, 'faaiz@gmail.com', 'faaiz', '', '00:00:00', '00:00:00', 0, 0, 0, 0, '', '', 0, NULL, 0, 'Male', '', 0, ''),
('nadhil', 'on', 16, 'nadhil@gmail.com', 'nadhil', 'svrc', '10:00:00', '03:30:00', 86, 89, 88, 75, 'trading', 'travelling', 1, '2025-07-19', 1, 'on', '', 0, ''),
('name', '8', 14, 'name@gmail.com', 'name', 'svrc', '10:00:00', '03:30:00', 54, 49, 72, 85, 'music', 'reading', 1, '2025-08-03', 1, 'Male', 'name', 2147483647, 'namee@gmail.com'),
('sathvidha', '9', 16, 'sathvidha@gmail.com', 'sathvidha', 'tdbcs', '09:30:00', '03:30:00', 83, 92, 88, 63, 'writting', 'sleeping', 1, '2025-07-24', 1, 'Female', 'Akhilaja', 2147483647, 'akhilaja@gmail.com'),
('SATHVIDHU', '10', 17, 'sathvidhu@gmail.com', 'sathvidhu', 'svrc', '10:00:00', '03:30:00', 89, 85, 99, 94, 'coding', 'coding', 12, '2025-08-16', 1, 'male', 'Akhilaja', 956730883, 'akhilaja@gmail.com'),
('swathi', '10', 18, 'swathi@gmail.com', 'swathy', '', '00:00:00', '00:00:00', 0, 0, 0, 0, '', '', 1, '2025-08-15', 0, 'Female', '', 0, ''),
('vishnu', '10', 18, 'vishnu@gmail.com', 'vishu', '', '00:00:00', '00:00:00', 0, 0, 0, 0, '', '', 0, NULL, 0, 'Male', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reset_requests`
--

CREATE TABLE `reset_requests` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `request_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `id` int(11) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `activity_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_activity`
--

INSERT INTO `student_activity` (`id`, `student_email`, `activity`, `activity_time`) VALUES
(1, '', 'Login failed', '2025-08-16 04:11:25'),
(2, 'tgheg@gmail.com', 'Login failed', '2025-08-16 04:18:25'),
(3, 'anziya@gmail.com', 'Logged in', '2025-08-16 04:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `subject_rankings`
--

CREATE TABLE `subject_rankings` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `difficulty_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_rankings`
--

INSERT INTO `subject_rankings` (`id`, `email`, `subject`, `difficulty_level`) VALUES
(5, 'anziya@gmail.com', 'Maths', 4),
(6, 'anziya@gmail.com', 'Physics', 3),
(7, 'anziya@gmail.com', 'Chemistry', 2),
(8, 'anziya@gmail.com', 'Biology', 1),
(9, 'ajin@gmail.com', 'Maths', 1),
(10, 'ajin@gmail.com', 'Physics', 2),
(11, 'ajin@gmail.com', 'Chemistry', 5),
(12, 'ajin@gmail.com', 'Biology', 3),
(13, 'swathi@gmail.com', 'Maths', 1),
(14, 'swathi@gmail.com', 'Physics', 2),
(15, 'swathi@gmail.com', 'Chemistry', 5),
(16, 'swathi@gmail.com', 'Biology', 4),
(17, 'sathvidhu@gmail.com', 'Maths', 1),
(18, 'sathvidhu@gmail.com', 'Physics', 2),
(19, 'sathvidhu@gmail.com', 'Chemistry', 5),
(20, 'sathvidhu@gmail.com', 'Biology', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`) VALUES
(1, 'Physics'),
(2, 'Chemistry'),
(3, 'Biology'),
(4, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `table_student_subject_ranking`
--

CREATE TABLE `table_student_subject_ranking` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `difficulty_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_student_subject_ranking`
--

INSERT INTO `table_student_subject_ranking` (`id`, `email`, `subject_name`, `difficulty_level`) VALUES
(13, 'anziya@gmail.com', 'Maths', 1),
(14, 'anziya@gmail.com', 'Physics', 4),
(15, 'anziya@gmail.com', 'Chemistry', 3),
(16, 'anziya@gmail.com', 'Biology', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_timetables`
--

CREATE TABLE `user_timetables` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `week_start` date NOT NULL,
  `schedule_json` longtext NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_timetables`
--

INSERT INTO `user_timetables` (`id`, `email`, `week_start`, `schedule_json`, `created_at`) VALUES
(1, 'anziya@gmail.com', '2025-08-11', '[[{\"start\":1754872200,\"end\":1754875800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":4},{\"start\":1754875800,\"end\":1754876700,\"type\":\"Break\"},{\"start\":1754919000,\"end\":1754922600,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":3},{\"start\":1754922600,\"end\":1754926200,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":4},{\"start\":1754926200,\"end\":1754927100,\"type\":\"Break\"}],[{\"start\":1754958600,\"end\":1754962200,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":2},{\"start\":1755005400,\"end\":1755009000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":1}],[],[],[{\"start\":1755243000,\"end\":1755248400,\"type\":\"Food\"},{\"start\":1755264600,\"end\":1755270000,\"type\":\"Food\"}],[{\"start\":1755329400,\"end\":1755334800,\"type\":\"Food\"},{\"start\":1755351000,\"end\":1755356400,\"type\":\"Food\"}],[{\"start\":1755415800,\"end\":1755421200,\"type\":\"Food\"},{\"start\":1755437400,\"end\":1755442800,\"type\":\"Food\"}]]', '2025-08-15 19:07:38'),
(2, 'ajin@gmail.com', '2025-08-11', '[[{\"start\":1754872200,\"end\":1754875800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1754919000,\"end\":1754922600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1754922600,\"end\":1754923200,\"type\":\"Break\"},{\"start\":1754923200,\"end\":1754926800,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1754926800,\"end\":1754927400,\"type\":\"Break\"}],[{\"start\":1754958600,\"end\":1754962200,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755005400,\"end\":1755009000,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755009000,\"end\":1755009600,\"type\":\"Break\"},{\"start\":1755009600,\"end\":1755013200,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755013200,\"end\":1755013800,\"type\":\"Break\"}],[{\"start\":1755045000,\"end\":1755048600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755091800,\"end\":1755095400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755095400,\"end\":1755096000,\"type\":\"Break\"},{\"start\":1755096000,\"end\":1755099600,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755099600,\"end\":1755100200,\"type\":\"Break\"}],[{\"start\":1755131400,\"end\":1755135000,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755178200,\"end\":1755181800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755181800,\"end\":1755182400,\"type\":\"Break\"},{\"start\":1755182400,\"end\":1755186000,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755186000,\"end\":1755186600,\"type\":\"Break\"}],[{\"start\":1755217800,\"end\":1755221400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755264600,\"end\":1755268200,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755268200,\"end\":1755268800,\"type\":\"Break\"},{\"start\":1755268800,\"end\":1755272400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755272400,\"end\":1755273000,\"type\":\"Break\"}],[{\"start\":1755318600,\"end\":1755322200,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755322200,\"end\":1755322800,\"type\":\"Break\"},{\"start\":1755322800,\"end\":1755326400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755326400,\"end\":1755327000,\"type\":\"Break\"},{\"start\":1755329400,\"end\":1755334800,\"type\":\"Food\"},{\"start\":1755334800,\"end\":1755338400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755338400,\"end\":1755339000,\"type\":\"Break\"},{\"start\":1755339000,\"end\":1755342600,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755342600,\"end\":1755343200,\"type\":\"Break\"},{\"start\":1755343200,\"end\":1755346800,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755346800,\"end\":1755347400,\"type\":\"Break\"},{\"start\":1755347400,\"end\":1755351000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":3},{\"start\":1755351000,\"end\":1755356400,\"type\":\"Food\"},{\"start\":1755356400,\"end\":1755360000,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755360000,\"end\":1755360600,\"type\":\"Break\"}],[{\"start\":1755405000,\"end\":1755408600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755408600,\"end\":1755409200,\"type\":\"Break\"},{\"start\":1755409200,\"end\":1755412800,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755412800,\"end\":1755413400,\"type\":\"Break\"},{\"start\":1755415800,\"end\":1755421200,\"type\":\"Food\"},{\"start\":1755421200,\"end\":1755424800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755424800,\"end\":1755425400,\"type\":\"Break\"},{\"start\":1755425400,\"end\":1755429000,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755429000,\"end\":1755429600,\"type\":\"Break\"},{\"start\":1755429600,\"end\":1755433200,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755433200,\"end\":1755433800,\"type\":\"Break\"},{\"start\":1755433800,\"end\":1755437400,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":3},{\"start\":1755437400,\"end\":1755442800,\"type\":\"Food\"},{\"start\":1755442800,\"end\":1755446400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755446400,\"end\":1755447000,\"type\":\"Break\"}]]', '2025-08-15 20:13:07'),
(5, 'swathi@gmail.com', '2025-08-11', '[[{\"start\":1754872200,\"end\":1754875800,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1754875800,\"end\":1754875800,\"type\":\"Break\"},{\"start\":1754919000,\"end\":1754922600,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1754922600,\"end\":1754922600,\"type\":\"Break\"},{\"start\":1754922600,\"end\":1754926200,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1754926200,\"end\":1754926200,\"type\":\"Break\"},{\"start\":1754926200,\"end\":1754929800,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1754929800,\"end\":1754929800,\"type\":\"Break\"}],[{\"start\":1754958600,\"end\":1754962200,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1754962200,\"end\":1754962200,\"type\":\"Break\"},{\"start\":1755005400,\"end\":1755009000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755009000,\"end\":1755009000,\"type\":\"Break\"},{\"start\":1755009000,\"end\":1755012600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755012600,\"end\":1755012600,\"type\":\"Break\"},{\"start\":1755012600,\"end\":1755016200,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755016200,\"end\":1755016200,\"type\":\"Break\"}],[{\"start\":1755045000,\"end\":1755048600,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755048600,\"end\":1755048600,\"type\":\"Break\"},{\"start\":1755091800,\"end\":1755095400,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755095400,\"end\":1755095400,\"type\":\"Break\"},{\"start\":1755095400,\"end\":1755099000,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755099000,\"end\":1755099000,\"type\":\"Break\"},{\"start\":1755099000,\"end\":1755102600,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755102600,\"end\":1755102600,\"type\":\"Break\"}],[{\"start\":1755131400,\"end\":1755135000,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755135000,\"end\":1755135000,\"type\":\"Break\"},{\"start\":1755178200,\"end\":1755181800,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755181800,\"end\":1755181800,\"type\":\"Break\"},{\"start\":1755181800,\"end\":1755185400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755185400,\"end\":1755185400,\"type\":\"Break\"},{\"start\":1755185400,\"end\":1755189000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755189000,\"end\":1755189000,\"type\":\"Break\"}],[{\"start\":1755217800,\"end\":1755221400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755221400,\"end\":1755221400,\"type\":\"Break\"},{\"start\":1755264600,\"end\":1755268200,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755268200,\"end\":1755268200,\"type\":\"Break\"},{\"start\":1755268200,\"end\":1755271800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755271800,\"end\":1755271800,\"type\":\"Break\"},{\"start\":1755271800,\"end\":1755275400,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755275400,\"end\":1755275400,\"type\":\"Break\"}],[{\"start\":1755318600,\"end\":1755322200,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755322200,\"end\":1755322200,\"type\":\"Break\"},{\"start\":1755322200,\"end\":1755325800,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755325800,\"end\":1755325800,\"type\":\"Break\"},{\"start\":1755325800,\"end\":1755329400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755329400,\"end\":1755334800,\"type\":\"Food\"},{\"start\":1755329400,\"end\":1755329400,\"type\":\"Break\"},{\"start\":1755334800,\"end\":1755338400,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755338400,\"end\":1755338400,\"type\":\"Break\"},{\"start\":1755338400,\"end\":1755342000,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755342000,\"end\":1755342000,\"type\":\"Break\"},{\"start\":1755342000,\"end\":1755345600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755345600,\"end\":1755345600,\"type\":\"Break\"},{\"start\":1755345600,\"end\":1755349200,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755349200,\"end\":1755349200,\"type\":\"Break\"},{\"start\":1755351000,\"end\":1755356400,\"type\":\"Food\"},{\"start\":1755356400,\"end\":1755360000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755360000,\"end\":1755360000,\"type\":\"Break\"}],[{\"start\":1755405000,\"end\":1755408600,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755408600,\"end\":1755408600,\"type\":\"Break\"},{\"start\":1755408600,\"end\":1755412200,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755412200,\"end\":1755412200,\"type\":\"Break\"},{\"start\":1755412200,\"end\":1755415800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755415800,\"end\":1755421200,\"type\":\"Food\"},{\"start\":1755415800,\"end\":1755415800,\"type\":\"Break\"},{\"start\":1755421200,\"end\":1755424800,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755424800,\"end\":1755424800,\"type\":\"Break\"},{\"start\":1755424800,\"end\":1755428400,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":4},{\"start\":1755428400,\"end\":1755428400,\"type\":\"Break\"},{\"start\":1755428400,\"end\":1755432000,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755432000,\"end\":1755432000,\"type\":\"Break\"},{\"start\":1755432000,\"end\":1755435600,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755435600,\"end\":1755435600,\"type\":\"Break\"},{\"start\":1755437400,\"end\":1755442800,\"type\":\"Food\"},{\"start\":1755442800,\"end\":1755446400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755446400,\"end\":1755446400,\"type\":\"Break\"}]]', '2025-08-15 22:41:15'),
(6, 'sathvidhu@gmail.com', '2025-08-11', '[[{\"start\":1754872200,\"end\":1754875800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1754875800,\"end\":1754875800,\"type\":\"Break\"},{\"start\":1754919000,\"end\":1754922600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1754922600,\"end\":1754922600,\"type\":\"Break\"},{\"start\":1754922600,\"end\":1754926200,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1754926200,\"end\":1754926200,\"type\":\"Break\"},{\"start\":1754926200,\"end\":1754929800,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1754929800,\"end\":1754929800,\"type\":\"Break\"}],[{\"start\":1754958600,\"end\":1754962200,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1754962200,\"end\":1754962200,\"type\":\"Break\"},{\"start\":1755005400,\"end\":1755009000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755009000,\"end\":1755009000,\"type\":\"Break\"},{\"start\":1755009000,\"end\":1755012600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755012600,\"end\":1755012600,\"type\":\"Break\"},{\"start\":1755012600,\"end\":1755016200,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755016200,\"end\":1755016200,\"type\":\"Break\"}],[{\"start\":1755045000,\"end\":1755048600,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755048600,\"end\":1755048600,\"type\":\"Break\"},{\"start\":1755091800,\"end\":1755095400,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755095400,\"end\":1755095400,\"type\":\"Break\"},{\"start\":1755095400,\"end\":1755099000,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755099000,\"end\":1755099000,\"type\":\"Break\"},{\"start\":1755099000,\"end\":1755102600,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755102600,\"end\":1755102600,\"type\":\"Break\"}],[{\"start\":1755131400,\"end\":1755135000,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755135000,\"end\":1755135000,\"type\":\"Break\"},{\"start\":1755178200,\"end\":1755181800,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755181800,\"end\":1755181800,\"type\":\"Break\"},{\"start\":1755181800,\"end\":1755185400,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755185400,\"end\":1755185400,\"type\":\"Break\"},{\"start\":1755185400,\"end\":1755189000,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755189000,\"end\":1755189000,\"type\":\"Break\"}],[{\"start\":1755217800,\"end\":1755221400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755221400,\"end\":1755221400,\"type\":\"Break\"},{\"start\":1755264600,\"end\":1755268200,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755268200,\"end\":1755268200,\"type\":\"Break\"},{\"start\":1755268200,\"end\":1755271800,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755271800,\"end\":1755271800,\"type\":\"Break\"},{\"start\":1755271800,\"end\":1755275400,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755275400,\"end\":1755275400,\"type\":\"Break\"}],[{\"start\":1755318600,\"end\":1755322200,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755322200,\"end\":1755322200,\"type\":\"Break\"},{\"start\":1755322200,\"end\":1755325800,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755325800,\"end\":1755325800,\"type\":\"Break\"},{\"start\":1755325800,\"end\":1755329400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755329400,\"end\":1755334800,\"type\":\"Food\"},{\"start\":1755329400,\"end\":1755329400,\"type\":\"Break\"},{\"start\":1755334800,\"end\":1755338400,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755338400,\"end\":1755338400,\"type\":\"Break\"},{\"start\":1755338400,\"end\":1755342000,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755342000,\"end\":1755342000,\"type\":\"Break\"},{\"start\":1755342000,\"end\":1755345600,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755345600,\"end\":1755345600,\"type\":\"Break\"},{\"start\":1755345600,\"end\":1755349200,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755349200,\"end\":1755349200,\"type\":\"Break\"},{\"start\":1755351000,\"end\":1755356400,\"type\":\"Food\"},{\"start\":1755356400,\"end\":1755360000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755360000,\"end\":1755360000,\"type\":\"Break\"}],[{\"start\":1755405000,\"end\":1755408600,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755408600,\"end\":1755408600,\"type\":\"Break\"},{\"start\":1755408600,\"end\":1755412200,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755412200,\"end\":1755412200,\"type\":\"Break\"},{\"start\":1755412200,\"end\":1755415800,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755415800,\"end\":1755421200,\"type\":\"Food\"},{\"start\":1755415800,\"end\":1755415800,\"type\":\"Break\"},{\"start\":1755421200,\"end\":1755424800,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755424800,\"end\":1755424800,\"type\":\"Break\"},{\"start\":1755424800,\"end\":1755428400,\"type\":\"Study\",\"subject\":\"Maths\",\"level\":1},{\"start\":1755428400,\"end\":1755428400,\"type\":\"Break\"},{\"start\":1755428400,\"end\":1755432000,\"type\":\"Study\",\"subject\":\"Biology\",\"level\":2},{\"start\":1755432000,\"end\":1755432000,\"type\":\"Break\"},{\"start\":1755432000,\"end\":1755435600,\"type\":\"Study\",\"subject\":\"Chemistry\",\"level\":5},{\"start\":1755435600,\"end\":1755435600,\"type\":\"Break\"},{\"start\":1755437400,\"end\":1755442800,\"type\":\"Food\"},{\"start\":1755442800,\"end\":1755446400,\"type\":\"Study\",\"subject\":\"Physics\",\"level\":2},{\"start\":1755446400,\"end\":1755446400,\"type\":\"Break\"}]]', '2025-08-16 09:08:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page_time`
--
ALTER TABLE `page_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reset_requests`
--
ALTER TABLE `reset_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_rankings`
--
ALTER TABLE `subject_rankings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_email_subject` (`email`,`subject`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_student_subject_ranking`
--
ALTER TABLE `table_student_subject_ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_timetables`
--
ALTER TABLE `user_timetables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_email_week` (`email`,`week_start`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_time`
--
ALTER TABLE `page_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `reset_requests`
--
ALTER TABLE `reset_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_activity`
--
ALTER TABLE `student_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_rankings`
--
ALTER TABLE `subject_rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_student_subject_ranking`
--
ALTER TABLE `table_student_subject_ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_timetables`
--
ALTER TABLE `user_timetables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
