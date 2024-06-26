-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 07:32 AM
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
-- Database: `aridedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(2, 'mujtabasaleemawan12@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_details`
--

CREATE TABLE `assignment_details` (
  `id` int(255) NOT NULL,
  `coursecode` varchar(255) DEFAULT NULL,
  `coursename` varchar(255) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `assignment` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `experience`, `message`) VALUES
(2, 'Ali Haider', 'myhouse13456@gmail.com', 'The prices of Crops are not up-to-Dated please updated them on time', 'Bad', 'Improve your skills.'),
(3, 'Ali Haider', 'myhouse13456@gmail.com', 'The prices of Crops are not up-to-Dated please updated them on time', 'Bad', 'Improve your skills.'),
(4, '', '', '', '', ''),
(5, '', '', '', '', ''),
(6, 'Sultan Ahmad', 'user1@gmail.com', 'oops', 'good', 'hi there this is just for testing!'),
(7, 'happy lemons', 'user1@gmail.com', 'alignment', '1.5 years', 'hi there i\'m happy'),
(8, 'happy ', 'test.com', 'oops', '2 years', 'vxvxc');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` int(30) NOT NULL,
  `coursecode` varchar(255) DEFAULT NULL,
  `coursename` varchar(255) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lecture` longblob DEFAULT NULL,
  `course_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`id`, `coursecode`, `coursename`, `teachername`, `degree`, `description`, `lecture`, `course_image`) VALUES
(42, '1', 'Test Course', 'Test Teacher', 'Test Degree', 'Test Descritption', 0x363634383438316264643230655f363634383365343363316564615f48616e646f757420352e646f63782c363634383438316264643633305f363634383365343363303232615f48616e646f757420332e646f6378, 0x363634383438316264636437635f363634373038643363336135615f6a732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `peper_details`
--

CREATE TABLE `peper_details` (
  `id` int(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `peper` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_details`
--

CREATE TABLE `quiz_details` (
  `id` int(11) NOT NULL,
  `coursecode` varchar(50) DEFAULT NULL,
  `coursename` varchar(100) DEFAULT NULL,
  `teachername` varchar(100) DEFAULT NULL,
  `quizdate` date DEFAULT NULL,
  `quiz` longblob DEFAULT NULL,
  `files` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_details`
--

CREATE TABLE `teacher_details` (
  `id` int(11) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_details`
--

INSERT INTO `teacher_details` (`id`, `teachername`, `position`, `description`, `contact`) VALUES
(34, 'aasx', 'lecturar', '2341233123', 'hi'),
(35, 'Sultan ', 'xXmnbXkj', '33333333333', 'asdfbajksdh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`) VALUES
(36, 'happy ', 'test@gmail.com', 0, '$2y$10$1Jjf2YBwtV8f3gmt4y09CeRMkhhPOlCTrrrAeAKLif.1eJpKCsNC2', 'user'),
(37, 'ahmad', 'adaas@gmail.com', 0, '$2y$10$ysVh6tmi/neetN5Hm.6UY.vbxje07R1KWHgujfjFccX8dc7uPpo/q', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment_details`
--
ALTER TABLE `assignment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peper_details`
--
ALTER TABLE `peper_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_details`
--
ALTER TABLE `quiz_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_details`
--
ALTER TABLE `teacher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignment_details`
--
ALTER TABLE `assignment_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `peper_details`
--
ALTER TABLE `peper_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_details`
--
ALTER TABLE `quiz_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher_details`
--
ALTER TABLE `teacher_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
