-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 07:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obe_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bt_level`
--

CREATE TABLE `bt_level` (
  `id` int(11) NOT NULL,
  `bt_no` varchar(256) NOT NULL,
  `level` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bt_level`
--

INSERT INTO `bt_level` (`id`, `bt_no`, `level`, `keywords`) VALUES
(1, '1', '2', 'asdds'),
(2, '1', '21321', 'asdds');

-- --------------------------------------------------------

--
-- Table structure for table `clo`
--

CREATE TABLE `clo` (
  `id` int(11) NOT NULL,
  `clo_no` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clo`
--

INSERT INTO `clo` (`id`, `clo_no`, `name`, `keywords`) VALUES
(1, '1', 'asd', 'asd'),
(2, '12', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'CS'),
(2, 'IT'),
(3, 'C++'),
(4, 'Programing Fundamentals');

-- --------------------------------------------------------

--
-- Table structure for table `course_to_teacher`
--

CREATE TABLE `course_to_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_to_teacher`
--

INSERT INTO `course_to_teacher` (`id`, `teacher_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 3),
(4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'CS'),
(2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `plo_id` int(11) NOT NULL,
  `clo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `type`, `title`, `description`, `plo_id`, `clo_id`) VALUES
(1, 'Paper', 'Visual Programing', '', 1, 1),
(2, 'Quiz', 'HCI', '', 2, 2),
(3, 'Quiz', 'Visual Programing11111', '', 0, 0),
(4, 'Quiz', 'Visual Programing11112', '', 3, 4),
(5, 'Quiz', 'asdfasdf', '', 2, 2),
(6, 'Quiz', 'sdsdfg', 'asdsadf', 2, 2),
(7, 'Quiz', 'Visual Programing', '123123', 1, 1),
(8, 'Quiz', 'asdfasdfasdfasdf', '12321312312', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plo`
--

CREATE TABLE `plo` (
  `id` int(11) NOT NULL,
  `plo_no` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `keywords` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plo`
--

INSERT INTO `plo` (`id`, `plo_no`, `name`, `keywords`) VALUES
(1, '1', 'asdf', 'sadfasd'),
(2, '2', 'asdf', 'sadfasd'),
(3, '2', 'asdf', 'sadfasd123');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `depart_id`, `name`) VALUES
(1, 1, 'Visual Programing'),
(2, 2, 'c ++'),
(3, 1, 'Human computer Intrection'),
(4, 2, 'Human Resource Management'),
(5, 1, 'c ++');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `program_id`, `name`) VALUES
(1, 2, ' fall  20'),
(2, 1, ' fall  19'),
(3, 2, ' fall  18');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `password`) VALUES
(1, 'Kanwer Kaleem', 'kanwalerkaleed7765@gmail.com', 'kanwner123123'),
(2, 'Qasim Niaz', 'qasim.niaz22@gmail.com', 'qasim123'),
(3, 'Dr. Hamid Ghouse', 'hamidghouse71@hotmail.com', 'hamid786'),
(5, 'Ali Usama', 'abhai0548@gmail.com', 'Gettherefast1212');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Jasir Ullah Khan', 'admin@gmail.com', 'adminadmin', 'admin'),
(3, 'Jasir Khan', 'JasirKhan@gmail.com', '123', 'user'),
(4, 'admin ', 'admin@gmail.com', '123123', 'user'),
(5, '1111', 'admin111@gmail.com', 'adminadmin', 'user'),
(6, 'Ali Usama', 'ali0548@gmail.com', '123123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bt_level`
--
ALTER TABLE `bt_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clo`
--
ALTER TABLE `clo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_to_teacher`
--
ALTER TABLE `course_to_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plo`
--
ALTER TABLE `plo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `bt_level`
--
ALTER TABLE `bt_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clo`
--
ALTER TABLE `clo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_to_teacher`
--
ALTER TABLE `course_to_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plo`
--
ALTER TABLE `plo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
