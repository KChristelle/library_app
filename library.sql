-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2021 at 08:59 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `availability` tinyint NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `calendar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category_id`, `user_id`, `description`, `availability`, `calendar`) VALUES
(1, 'Thursdays', 'Jackson Biko', 6, 2, 'Thursdays is a small book, easy to read even in one sitting. He tackles the subject of struggling artists and with a brush of mental health. It\'s about a music band, vina wira, who play every Thursday and their hunger to make it.', 1, '2021-12-02'),
(5, 'The 4-Hour Workweek', 'Tim Ferriss', 6, 2, 'Tim Ferriss wrote \'The 4-Hour Work Week\' for all those tired of postponing their life until retirement, who instead want to live life large and in the moment, right now. In The 4-Hour Work Week, Ferriss promises a way to get all the rewards of working without having to wait until the end of your career.', 0, '2021-12-03'),
(7, 'Atomic Habits', 'James Clear', 6, 2, 'An atomic habit is a regular practice or routine that is not only small and easy to do but is also the source of incredible power; a component of the system of compound growth. Bad habits repeat themselves again and again not because you don\'t want to change, but because you have the wrong system for change.', 1, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(2, 'Finance', '<p>It\'s important to be financially free. Check it!</p>'),
(5, 'Entrepreneurship', '<p>Entrepreneurship is a great risk on faith, some people are just cut out for it.</p>'),
(6, 'Life', '<p>Life is a journey</p>'),
(7, 'Education', '<p>Education is key</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `access` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `access`) VALUES
(2, 'rachel', 'rachel@gmail.com', 'admin', '$2y$10$EOiYy6FgsG9pumHl3By0eehbDYMMnSncMqIlpghKRJnq6JxJ/9YZW', 1),
(3, 'christine', 'christine@gmail.com', 'admin', '$2y$10$vAg/vhYegsL5Svo0QHMYvugf3R.9A0ziYv53zw3coyPvd8nuymhZO', 1),
(4, 'assistant', 'assit@gmail.com', 'staff', '$2y$10$HDFKlreNBLuPz2Nv4GUOmeU0xHqiN.c74rJHY/RhbeRBhSKyRRl9C', 0),
(6, 'student1', 'student1@gmail.com', 'student', '$2y$10$h01rnvidKat7lcZuWja7c.JSEGiVbRE1U2I319p/In1LEI2aYYSwO', 0),
(7, 'librarian', 'librarian@gmail.com', 'librarian', '$2y$10$fNXcXuKMEfnxqh4UXlMYqurporNOGTYMOGquiceQInhpaBb19/unC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
