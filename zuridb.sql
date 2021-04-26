-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 02:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuridb`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Id` int(255) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Id`, `course`, `course_code`, `user_id`, `created`, `updated`) VALUES
(1, 'strength of material', 'mce', 0, '0000-00-00 00:00:00', '2021-04-25 13:09:50'),
(2, 'strength of material in Nigeria', 'ttt', 0, '2021-04-25 14:12:02', '2021-04-25 13:12:02'),
(3, 'strength of material in Nigeria', 'mce', 0, '2021-04-25 14:13:55', '2021-04-25 13:13:55'),
(14, 'threee', '3333333333333333333333333333333333333333333333333333333333333333333', 0, '2021-04-26 00:09:55', '2021-04-25 23:09:55'),
(15, 'strength of material', 'mce', 1, '2021-04-25 23:42:27', '2021-04-25 23:58:53'),
(16, 'strength of material', 'mce45', 1, '2021-04-25 23:42:32', '2021-04-25 23:59:25'),
(17, 'strength of material edited', '111', 1, '2021-04-26 01:05:51', NULL),
(18, 'strength of material edited', '111', 1, '2021-04-26 01:09:06', NULL),
(19, 'strength of material edited', '111', 1, '2021-04-26 01:09:35', NULL),
(20, 'strength of material edited', '111', 1, '2021-04-26 01:10:08', NULL),
(21, 'Machine Design', '312', 1, '2021-04-26 01:12:09', NULL),
(22, 'strength of material edited', 'mce', 1, '2021-04-26 01:14:58', NULL),
(23, 'strength of material edited', 'mce', 1, '2021-04-26 01:16:03', NULL),
(24, 'strength of material ', 'mce222', 2, '2021-04-26 01:20:58', '2021-04-26 00:23:40'),
(25, 'strength of material in Nigeria', 'mce', 2, '2021-04-26 01:23:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(255) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `name`, `email`, `password`) VALUES
(1, 'Ekene', 'ekennyobiasogu@gmail.com', '$2y$10$23Qan5pH5A4TAQ1DMUi0MO3df44p6AztJwQir5KyYy356QtVpfXSq'),
(2, 'Mathew', 'mathewobiasogu@gmail.com', '$2y$10$pfJu8Ir5krJ6CSW81GBhxem4IwHLsiZKGhxDPTwJkDgnKmB/36xFi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
