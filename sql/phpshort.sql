-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 03:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpshort`
--
CREATE DATABASE IF NOT EXISTS `phpshort` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpshort`;

-- --------------------------------------------------------

--
-- Table structure for table `short_urls`
--

CREATE TABLE `short_urls` (
  `id` int(11) NOT NULL,
  `original_url` text NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `clicks` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `uemail` varchar(255) DEFAULT NULL,
  `upass` varchar(255) DEFAULT NULL,
  `utime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `short_urls`
--
ALTER TABLE `short_urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_code` (`short_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uemail` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `short_urls`
--
ALTER TABLE `short_urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `short_urls`
--
ALTER TABLE `short_urls`
  ADD CONSTRAINT `short_urls_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
