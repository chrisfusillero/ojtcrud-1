-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2025 at 09:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojtdatabase-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `valid` int(5) DEFAULT 1 COMMENT '1 - show, 0 -hide',
  `user` enum('admin','regular') NOT NULL DEFAULT 'regular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `firstname`, `lastname`, `address`, `username`, `email`, `avatar`, `password`, `valid`, `user`) VALUES
(1, 'kyre', 'lastname ko', NULL, NULL, NULL, NULL, NULL, 0, 'regular'),
(57, 'Benson', 'Michaels', 'Los Angeles', 'bensonmichaels123', 'michaels.benson@example.com', NULL, '$2y$10$ZELm4CW0ePSE42kDlHIsOeXHz/sQ7SnnFuMeIxXUD64zH9KvltSmC', 1, 'regular'),
(58, 'Carlo', 'Dela Cruz', 'Cavite', 'delacruzcarlo123', 'carlodc10@example.com', NULL, '$2y$10$e1ppTIC6oYXMUsHLmmVIYOgzckjY.fEtdTBKOyJFBx.6dF9xF7tGS', 1, 'regular'),
(71, 'Ann', 'Gonzales', 'Manila', 'anngonzales', 'anngonzales@example.com', NULL, '$2y$10$vH4gNFoeYh.9sWOavQi4POGBy0M86Ip9xtR3LfDEy/iW8Ho4P4YWO', 1, 'regular'),
(72, 'Chris', 'Fusillero', 'Cavite', 'chrisfusillero', 'chrisfus123@example.com', '1760929751_pic-1.png', '$2y$10$hxbNBVuMs2p/5K0Whi.HmOGk4v8ltHv5hAMXcoivNLswO9cmTrl8a', 1, 'regular'),
(75, 'John', 'Doe', 'Japan', 'johndoe123admin', 'admin.johndoe@example.com', NULL, '$2y$10$OUH.Y1WDFw5NAGoTncFxmOknXI1yKb7kjGj37Mvv2fZ5CYzX7mSt.', 1, 'admin'),
(76, 'Harry', 'Johnson', 'Manila', 'haroldjohns', 'haroldjohnson@example.com', NULL, '$2y$10$KU2uf32fKIU8qLbap7waXeXpwd6/T7yJAUQkmAAf/siskCLc4jvsq', 1, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `like_count` int(11) DEFAULT 0,
  `heart_count` int(11) DEFAULT 0,
  `laugh_count` int(11) DEFAULT 0,
  `sad_count` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valid` int(5) DEFAULT 1 COMMENT '1 - show\r\n0 - hide',
  `total_reactions` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `image`, `like_count`, `heart_count`, `laugh_count`, `sad_count`, `created_at`, `updated_at`, `valid`, `total_reactions`) VALUES
(5, 72, 'Hello World', NULL, 0, 1, 0, 0, '2025-10-14 09:34:40', '2025-10-22 09:58:56', 1, 1),
(9, 72, 'How\'s your day', NULL, 0, 1, 0, 0, '2025-10-14 09:47:07', '2025-10-22 09:59:14', 1, 1),
(14, 72, 'Good Morning', NULL, 0, 1, 0, 0, '2025-10-15 02:04:31', '2025-10-22 10:03:58', 1, 1),
(16, 72, 'Hi, today is Wednesday', NULL, 1, 0, 0, 0, '2025-10-15 02:25:59', '2025-10-22 09:58:45', 1, 1),
(17, 72, 'test', '6d1595485b5736c52deef59558b69afc.jpg', 1, 0, 0, 0, '2025-10-15 02:38:48', '2025-10-22 10:03:47', 1, 1),
(18, 72, 'what a sunset', '1760581031_sunset-2.jpg', 1, 1, 0, 0, '2025-10-15 02:39:05', '2025-10-22 09:58:08', 1, 2),
(21, 57, 'this is my alter ego', NULL, 0, 1, 0, 0, '2025-10-15 03:58:58', '2025-10-22 09:58:30', 1, 1),
(23, 58, 'Good day to you!!', NULL, 0, 1, 0, 0, '2025-10-15 09:06:43', '2025-10-22 09:59:05', 1, 1),
(28, 72, 'Hello everyone!', NULL, 0, 0, 0, 0, '2025-10-16 07:59:31', NULL, 0, 0),
(29, 57, 'How\'s your day', NULL, 0, 2, 0, 0, '2025-10-16 08:00:11', '2025-10-22 09:58:37', 1, 2),
(31, 72, 'saassafdafff', NULL, 0, 0, 0, 0, '2025-10-16 10:46:48', NULL, 0, 0),
(32, 72, 'kkjkkj', NULL, 0, 1, 1, 0, '2025-10-17 03:31:09', '2025-10-17 16:37:50', 0, 0),
(33, 71, 'Good afternoon people', NULL, 0, 2, 0, 0, '2025-10-17 09:43:40', '2025-10-22 10:27:36', 1, 2),
(34, 72, 'iquwiquiqwiwjwqj', NULL, 0, 0, 0, 0, '2025-10-17 09:50:53', '2025-10-17 15:54:37', 0, 0),
(35, 72, '12212', NULL, 0, 0, 0, 0, '2025-10-17 15:55:29', '2025-10-17 15:55:36', 0, 0),
(36, 72, 'Happy Friday everyone!!', NULL, 0, 1, 0, 0, '2025-10-17 16:38:08', '2025-10-20 16:25:28', 0, 0),
(37, 72, '12345', 'post_1761031732.jpg', 0, 1, 0, 0, '2025-10-20 16:28:08', '2025-10-21 15:30:39', 0, 0),
(38, 72, 'bbhbhbhb', NULL, 1, 0, 0, 0, '2025-10-21 14:20:27', '2025-10-21 14:20:45', 0, 0),
(39, 72, 'The beach', 'post_1761089887.jpg', 1, 1, 0, 0, '2025-10-21 15:51:42', '2025-10-22 09:57:25', 1, 2),
(40, 57, 'party party', '68d243fb7f6e0a75d819110c755f34e6.jpg', 1, 1, 0, 0, '2025-10-22 08:20:44', '2025-11-14 07:55:34', 1, 2),
(41, 72, 'Hello, I\'m back!!', NULL, 0, 0, 0, 0, '2025-11-17 09:48:32', '2025-11-17 16:18:08', 1, 0),
(42, 76, 'Hello World', NULL, 0, 0, 0, 0, '2025-11-18 08:04:18', '2025-11-18 08:04:18', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_reactions`
--

CREATE TABLE `post_reactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` enum('like','heart','laugh','sad') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_reactions`
--

INSERT INTO `post_reactions` (`id`, `post_id`, `user_id`, `reaction_type`, `created_at`, `updated_at`) VALUES
(3, 17, 72, 'like', '2025-10-17 08:04:10', NULL),
(8, 32, 72, 'laugh', '2025-10-17 08:47:32', NULL),
(9, 18, 72, 'like', '2025-10-17 08:51:20', NULL),
(10, 16, 72, 'like', '2025-10-17 09:32:45', NULL),
(11, 32, 71, 'heart', '2025-10-17 09:43:43', NULL),
(12, 29, 71, 'heart', '2025-10-17 09:43:52', NULL),
(30, 36, 57, 'heart', '2025-10-20 11:32:38', NULL),
(46, 38, 72, 'like', '2025-10-21 14:20:36', NULL),
(47, 37, 72, 'heart', '2025-10-21 14:46:22', NULL),
(55, 40, 72, 'like', '2025-10-22 09:55:13', NULL),
(56, 39, 72, 'like', '2025-10-22 09:56:50', NULL),
(57, 33, 72, 'heart', '2025-10-22 09:57:12', NULL),
(58, 39, 58, 'heart', '2025-10-22 09:57:25', NULL),
(59, 18, 58, 'heart', '2025-10-22 09:58:08', NULL),
(60, 21, 72, 'heart', '2025-10-22 09:58:30', NULL),
(61, 29, 72, 'heart', '2025-10-22 09:58:37', NULL),
(62, 5, 72, 'heart', '2025-10-22 09:58:56', NULL),
(63, 23, 72, 'heart', '2025-10-22 09:59:05', NULL),
(64, 9, 72, 'heart', '2025-10-22 09:59:14', NULL),
(65, 14, 72, 'heart', '2025-10-22 10:03:58', NULL),
(66, 40, 57, 'heart', '2025-10-22 10:27:26', NULL),
(67, 33, 57, 'heart', '2025-10-22 10:27:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `choices` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `hint` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `question`, `choices`, `answer`, `hint`) VALUES
(1, 'Who is the first president of the Philippines in the 5th republic?', '\"[\\\"Emilio Aguinaldo\\\",\\\"Manuel Quezon\\\",\\\"Ferdinand Marcos\\\",\\\"Corazon Aquino\\\"]\"', 'Corazon Aquino', NULL),
(2, 'What is the largest ocean in the world', '\"[\\\"Atlantic Ocean\\\",\\\"Pacific Ocean\\\",\\\"Arctic Ocean\\\",\\\"Red Sea\\\"]\"', 'Pacific Ocean', NULL),
(3, 'What is the capital of Canada? ', '\"[\\\"Toronto\\\",\\\"Vancouver\\\",\\\"Ottawa\\\",\\\"Winnipeg\\\"]\"', 'Ottawa', NULL),
(4, 'What year was the United Nations established?', '\"[\\\"1943\\\",\\\"1944\\\",\\\"1945\\\",\\\"1946\\\"]\"', '1945', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
