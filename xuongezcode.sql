-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 09:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xuongezcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumbnail`, `status`, `parent_id`) VALUES
(1, 'abcaaaa', 'hagjhajhajhgaaaaaa66', '', 'active', 0),
(2, 'abcaaa', 'hihih', 'Screenshot (13).png', 'active', 0),
(3, 'abcaaaa', '', '', 'active', 1),
(4, 'abcaaaa', '', '', 'active', 1),
(5, 'abcaaaa', '', '', 'active', 1),
(6, 'abcaaaa', '', '', 'active', 1),
(7, 'abcaaaa', '', '', 'active', 1),
(8, 'abcaaaa', '', '', 'active', 1),
(9, 'abcaaaa', '', '', 'active', 0),
(10, 'abcaaaa', '', '', 'active', 0),
(11, 'abcaaaa', '', '', 'active', 0),
(12, 'abcaaaa', '', '', 'active', 0),
(13, 'abcaaaa', '', '', 'active', 0),
(14, 'abcaaaa', '', '', 'active', 0),
(15, 'abcaaaa', '', '', 'active', 0),
(16, 'abcaaaa', '', '', 'active', 0),
(17, 'abcaaaa', '', '', 'active', 0),
(18, 'abcaaaa', '', '', 'active', 0),
(19, 'abcaaaa', '', '', 'active', 0),
(20, 'abcaaaa', '', '', 'active', 0),
(21, 'abcaaaa', '', '', 'active', 0),
(22, 'abcaaaa', '', '', 'active', 0),
(23, 'abcaaaa', '', '', 'active', 0),
(24, 'abcaaaa', '', '', 'active', 0),
(25, 'abcaaaa', '', '', 'active', 0),
(26, 'abcaaaa', '', '', 'active', 0),
(27, 'abcaaaa', '', '', 'active', 0),
(28, 'abcaaaa', '', '', 'active', 0),
(29, 'abcaaaa', '', '', 'active', 0),
(30, 'abcaaaa', '', '', 'active', 0),
(31, 'abcaaaa', '', '', 'active', 0),
(32, 'abcaaaa', '', '', 'active', 0),
(33, 'abcaaaa', '', '', 'active', 0),
(34, 'hahahaha', '', '', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_courses`
--

CREATE TABLE `category_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_courses`
--

INSERT INTO `category_courses` (`id`, `course_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 2),
(4, 2, 1),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `course_id`, `image`, `date`, `status`) VALUES
(7, 'hihihihi', 2, 3, '', '2024-02-12', 'active'),
(8, 'hahahaha', 5, 5, '', '2024-02-13', 'active'),
(9, 'hihihihsssi', 2, 3, '', '2024-02-12', 'active'),
(10, 'hahahaha', 5, 5, '', '2024-02-13', 'active'),
(16, 'hahahaha', 5, 5, '', '2024-02-13', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `total_register` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `price`, `status`, `thumbnail`, `total_register`) VALUES
(1, 'abc', 'acbd', 11111, 'active', 'abcdabcd', 1111),
(2, 'bababa', 'adadada', 22222, 'active', 'aadadadadad', 11111);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `course_id`, `value`, `note`, `image`, `created_at`) VALUES
(12, 3, 5, 2, NULL, NULL, '2024-02-21'),
(14, 3, 5, 2, NULL, NULL, '2024-02-21'),
(15, 1, 2, 4, 'hihihihi', NULL, '2024-02-07'),
(16, 3, 5, 2, NULL, NULL, '2024-02-21'),
(19, 1, 2, 4, 'hihihihi', NULL, '2024-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `tel` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('admin','client') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `dob`, `avatar`, `gender`, `tel`, `address`, `role`, `status`, `created_at`, `update_at`) VALUES
(1, 'a', 'Đinh Quang Hiến', '   abc@gmail.com', '$2y$10$MlRFa8xLpKghuZsyXHZNC.I/5Jjl67oT4NxRp2/6dKJp1mHFhoULm', '2004-08-04', 'Screenshot (7).png', 'male', '0345987599', 'Hải Hậu', 'admin', 'active', '2024-02-18', '2024-02-19'),
(2, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '1', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-28', '2024-02-19'),
(3, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', 'dqh@1234', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-28', '2024-02-19'),
(4, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', 'dqh@1234', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-28', '2024-02-19'),
(5, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', 'dqh@1234', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-28', '2024-02-19'),
(9, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-28', '2024-02-19'),
(14, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-28', '2024-02-19'),
(17, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-29', '2024-02-19'),
(18, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-29', '2024-02-19'),
(19, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-29', '2024-02-19'),
(20, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-01-29', '2024-02-19'),
(21, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$x2Ek1VX5afyQptQzeC9MKuD89NbK2HoEifPt4phPi/sbqvxLzWFxW', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(22, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$NlQlsTJ4fdU/VGf9bNsjqujVF/OTodhnbIZm1X8nlNyZ.5tzRwSJ.', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(23, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$oAfFn5qu/zYli/UFKHlEruFp8DfmAVT3RlxJwat4AfhAb1JTrpB8u', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(24, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$ZroeLCfr7oIWClPdgwe9jOv.cNoPfO/021lm5VRYQqkh2WeuimKsy', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(27, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$igER4BecNU.QJeayqNVqfe4K0HAlQjh6ZNzjCOheLcAZHIr5eBdA2', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(28, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$yRemX08dcWMkcLLhy.OcpOWeqFIuf9eEwKtndI3wcztd0LD1lJcN.', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(29, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$PDCt8RyQjxQHVsGDUVtWmuUbGrJlaVpYuWj/7KZxjhTzHsRJTPbDm', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(30, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$4sf2p8V0A.o02f/jt9Hz7eV/NRHfNrvVllTnmikMOn54K3s1oHRLG', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(31, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$scQENylmBYaPvpVAJFQKoenoxdqNvu.HuqOncaSlhadfL3jYe7RM6', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(32, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$ZzG9NcHIVWR2OKQKGmXeDe3n65LTovZfUqjgdOFvICTpxL5VY5OVO', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(33, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$MUBaW5OpZ2BuH2ltZ63HZeK0lHhFjJQilvhQQw3SZ6j4BMXbtwDOS', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(34, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$H.fNiPAV8a21J9UtZLrarOeW7ExwOCH.Rji3noImHy0ScXlsM7gfy', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(35, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$zd2BjipjbpgEhBoAc/vw3uMm5VTmQLOOOuQ60hb0ZZ4yIBrJk4.jW', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(36, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$/UEFeuEii2R6g0Tg2EYWAuzQLZ803GxMiSszXhncGxHgkTLBsjEVC', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(37, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$NfMYnlpxu/7rE1Ehkifbw.PtZ9pG/SkKvTYreZHEnNdpLmvzXmpqK', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(38, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$K2zl6kEggupPIfwUfpUt0uCLMRXRHgWWL0k32R2kxUdgWAE5uG.CO', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(39, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$xEbW5lJo0mUPEOPPLLtylu3bmUjrxcWkHx2KZFEAGLTWBOgsiLKHu', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(40, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$RoAM4VXtvNGMcOGbP6uRNuOpByQ0Lzqgq6fBAkOM83DEYDf0UCo.6', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(41, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$uh4R4pEkRyk6M19/l4gKz.KpAA4NPw5lI5266mEfoM0GqQGfrgura', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-01', '2024-02-19'),
(51, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$mtFQMq8wdSQBCmms1FEmQOhLYqsjSbJPT352xRcXpFU0s5dmQmZTW', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(52, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$qvYeJ8ptC1JJoRNtyUm/V.jBV3YhcgyK5ef/DuYa94.y3Db2bVYGq', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(53, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$Cgzjmw53MGJS84Lua45NceOrAX3LhhJZxAaCGDdQ.EPfbDfGtbPou', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(54, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$ncxg5us1RN/tUUTo.zRQTejVC4ZX2TByw8uym.dmMn9KO1D4JlTxq', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(55, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$1h9sZkscAUtghDaGYmrPUuWJ5Sb9Sz/6EsfTi6JnDNi4b5WC7iLSa', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(56, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$ohH0UzXMutmc3JcKdqB3GehjwOMETpUQmB21OQPlaPXXs6v2xQbi2', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(58, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$yUZOyxN354a1M2Yc9yWyW.n0JFlE2WprPrf6/.IMfEX7wzXfuwuTm', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(59, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$dFQoBDHpvZV.dWYT.fl9c.PKtsaqJu0Q7LCvamCaPwrGt/XFT0.d6', '2004-08-04', 'Screenshot (8).png', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(61, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$vDd6oLjQAU4NXFy.0bk66uAy4hdIjjfdDxkWig8Hcs.Vl8sF6CIfe', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(62, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$62joE4Jbz.kNcEdl0nNzc.2is1VIP.gTv7EN58Kow7L2sOa8XqTzS', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(63, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$AzwkFLlShnD8Ac3UCWqBbOba9zS/4JbY10lUPgwO.V17z0E5Fj/Vu', '2004-08-04', '', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19'),
(64, 'a', 'Đinh Quang Hiến', '  abc@gmail.com', '$2y$10$X5AS93qGQoQ4vJ1wsWfFfOUoGtapfJVkadIQvCoMdUaVwlGM0ifdW', '2004-08-04', 'Screenshot (15).png', 'male', '0345987599', 'Hải Hậu', 'client', 'active', '2024-02-18', '2024-02-19');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `payment_status` enum('Paid','Unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_courses`
--
ALTER TABLE `category_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category_courses`
--
ALTER TABLE `category_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
