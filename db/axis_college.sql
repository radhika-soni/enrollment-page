-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 12:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axis_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `enroll_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `fees` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`enroll_id`, `name`, `mobile`, `address`, `fees`, `created_at`) VALUES
(101, 'abhay', '9775747474', 'bikaner', '11000', '2023-04-23 07:38:58'),
(102, 'krish', '8596421363', 'jaipur', '15000', '2023-04-23 11:02:30'),
(103, 'megha', '7785333333', 'bikaner', '11000', '2023-04-23 11:07:39'),
(104, 'jhanvi ', '8800880088', 'ganganagar', '13000', '2023-04-23 11:13:04'),
(105, 'raj', '9251443529', 'fdsfd', '10000', '2023-04-24 02:11:03'),
(106, 'raju', '9251435299', 'afdsfsd', '10000', '2023-04-24 02:13:31'),
(107, 'kate', '9685747485', 'bikaner', '8000', '2023-04-24 16:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `st_sb`
--

CREATE TABLE `st_sb` (
  `st_id` int(10) NOT NULL,
  `sb_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `st_sb`
--

INSERT INTO `st_sb` (`st_id`, `sb_id`) VALUES
(101, 300),
(101, 304),
(101, 306),
(102, 302),
(102, 306),
(102, 307),
(103, 303),
(103, 304),
(103, 306),
(104, 301),
(104, 305),
(104, 306),
(105, 303),
(105, 304),
(105, 305),
(106, 300),
(106, 301),
(106, 305),
(107, 300),
(107, 301),
(107, 303);

-- --------------------------------------------------------

--
-- Table structure for table `subject_info`
--

CREATE TABLE `subject_info` (
  `id` int(10) NOT NULL,
  `sub_name` varchar(30) DEFAULT NULL,
  `sub_stream` varchar(10) DEFAULT NULL,
  `sub_type` enum('T','P') NOT NULL,
  `sub_fees` int(6) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_info`
--

INSERT INTO `subject_info` (`id`, `sub_name`, `sub_stream`, `sub_type`, `sub_fees`, `updated_at`) VALUES
(300, 'Hindi', 'Arts', 'T', NULL, '2023-04-21 05:52:57'),
(301, 'English', 'Arts', 'T', NULL, '2023-04-21 05:52:57'),
(302, 'Psychology', 'Arts', 'T', NULL, '2023-04-21 05:52:57'),
(303, 'History', 'Arts', 'T', NULL, '2023-04-21 05:52:57'),
(304, 'Political Science', 'Arts', 'T', NULL, '2023-04-21 05:52:57'),
(305, 'Computer Science', 'Arts', 'P', 2000, '2023-04-21 05:52:57'),
(306, 'Drawing', 'Arts', 'P', 3000, '2023-04-21 05:52:57'),
(307, 'Geography', 'Arts', 'P', 4000, '2023-04-21 05:52:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `st_sb`
--
ALTER TABLE `st_sb`
  ADD UNIQUE KEY `st_id` (`st_id`,`sb_id`),
  ADD KEY `sb_id` (`sb_id`);

--
-- Indexes for table `subject_info`
--
ALTER TABLE `subject_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `subject_info`
--
ALTER TABLE `subject_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `st_sb`
--
ALTER TABLE `st_sb`
  ADD CONSTRAINT `st_sb_ibfk_1` FOREIGN KEY (`st_id`) REFERENCES `student_info` (`enroll_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `st_sb_ibfk_2` FOREIGN KEY (`sb_id`) REFERENCES `subject_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
