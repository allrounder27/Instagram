-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2020 at 05:00 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.28-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `imageid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `imageid`, `userid`, `username`) VALUES
(12, 'hey', 46, 8, 'gautam'),
(13, 'hello', 46, 8, 'gautam'),
(14, 'bye', 46, 8, 'gautam'),
(15, 'nice', 45, 7, 'admin'),
(16, 'all set', 45, 7, 'admin'),
(17, 'nice', 46, 7, 'admin'),
(18, 'nice', 57, 8, 'bafnag'),
(19, 'good', 57, 8, 'bafnag');

-- --------------------------------------------------------

--
-- Table structure for table `likedby`
--

CREATE TABLE `likedby` (
  `id` int(11) NOT NULL,
  `imageid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likedby`
--

INSERT INTO `likedby` (`id`, `imageid`, `userid`) VALUES
(9, 55, 8),
(10, 57, 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` mediumblob,
  `caption` varchar(50) NOT NULL,
  `likes` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `caption`, `likes`, `userid`, `time`, `name`, `username`) VALUES
(54, 0x6173736574732f75706c6f61642f70686f6e652e6a706567, 'phone', 0, 8, '2020-03-22 12:56:40', 'phone.jpeg', 'gautam'),
(55, 0x6173736574732f75706c6f61642f696d616765202831292e6a7067, 'new post', 1, 8, '2020-03-22 14:54:55', 'image (1).jpg', 'bafnag'),
(57, 0x6173736574732f75706c6f61642f696d616765202831292e6a7067, 'working', 1, 8, '2020-03-22 14:58:19', 'image (1).jpg', 'bafnag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `pic` blob,
  `picname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `pic`, `picname`) VALUES
(7, 'admin', 'gautam_b@ec', '81dc9bdb52d04dc20036dbd8313ed055', 0x696d616765202831292e6a7067, 'assets/upload/image (1).jpg'),
(8, 'gautam', 'gautam_b@ec.iitr.ac.in', '81dc9bdb52d04dc20036dbd8313ed055', 0x696d616765202831292e6a7067, 'assets/upload/image (1).jpg'),
(16, 'gautambafna', 'gautam_b@ec.iitr.ac', '81dc9bdb52d04dc20036dbd8313ed055', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`imageid`,`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `imageid` (`imageid`);

--
-- Indexes for table `likedby`
--
ALTER TABLE `likedby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `likedby`
--
ALTER TABLE `likedby`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
