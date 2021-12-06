-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 09:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- 
-- Database: `finaldb`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `classes`
-- 

CREATE TABLE `classes` (
  `pk` int(255) NOT NULL,
  `className` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- RELATIONSHIPS FOR TABLE `classes`:
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `labs`
-- 

CREATE TABLE `labs` (
  `pk` int(255) NOT NULL,
  `className` varchar(255) NOT NULL,
  `labName` varchar(255) NOT NULL,
  `question1` mediumtext NOT NULL,
  `question2` mediumtext DEFAULT NULL,
  `question3` mediumtext DEFAULT NULL,
  `question4` mediumtext DEFAULT NULL,
  `question5` mediumtext DEFAULT NULL,
  `question6` mediumtext DEFAULT NULL,
  `question7` mediumtext DEFAULT NULL,
  `question8` mediumtext DEFAULT NULL,
  `question9` mediumtext DEFAULT NULL,
  `question10` mediumtext DEFAULT NULL,
  `answer1` mediumtext NOT NULL,
  `answer2` mediumtext DEFAULT NULL,
  `answer3` mediumtext DEFAULT NULL,
  `answer4` mediumtext DEFAULT NULL,
  `answer5` mediumtext DEFAULT NULL,
  `answer6` mediumtext DEFAULT NULL,
  `answer7` mediumtext DEFAULT NULL,
  `answer8` mediumtext DEFAULT NULL,
  `answer9` mediumtext DEFAULT NULL,
  `answer10` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- RELATIONSHIPS FOR TABLE `labs`:
--   `className`
--       `classes` -> `className`
--   `labName`
--       `studentanswers` -> `labName`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `registration`
-- 

CREATE TABLE `registration` (
  `pk` int(255) NOT NULL,
  `beeCard` int(255) NOT NULL,
  `className` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- RELATIONSHIPS FOR TABLE `registration`:
--   `beeCard`
--       `users` -> `beeCard`
--   `className`
--       `classes` -> `className`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `studentanswers`
-- 

CREATE TABLE `studentanswers` (
  `pk` int(255) NOT NULL,
  `labName` varchar(255) NOT NULL,
  `beeCard` int(255) NOT NULL,
  `answer1` mediumtext DEFAULT NULL,
  `answer2` mediumtext DEFAULT NULL,
  `answer3` mediumtext DEFAULT NULL,
  `answer4` mediumtext DEFAULT NULL,
  `answer5` mediumtext DEFAULT NULL,
  `answer6` mediumtext DEFAULT NULL,
  `answer7` mediumtext DEFAULT NULL,
  `answer8` mediumtext DEFAULT NULL,
  `answer9` mediumtext DEFAULT NULL,
  `answer10` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- RELATIONSHIPS FOR TABLE `studentanswers`:
--   `beeCard`
--       `users` -> `beeCard`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `beeCard` int(25) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 
-- RELATIONSHIPS FOR TABLE `users`:
-- 

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`beeCard`, `name`, `email`, `password`) VALUES
(82323, 'onrnroovljno2ln', 'jopgnwovwl', 'wjbewekv'),
(97235, 'Joseph', 'owbwobvw@gmail.com', 'ivbvwvbw'),
(787887, 'iunqeuqbc', 'vnovoavaiuvb', 'nciqiubuycq'),
(974337, 'Joseph Hednerson', 'joedhedeniss', 'hello'),
(4092525, 'vbivwvwu', 'skdv sd jvdkj', 'jgbwqojvqo'),
(34853535, 'idbsivsd', 'asjaicbub', 'ubacau');

-- 
-- Indexes for dumped tables
-- 

-- 
-- Indexes for table `classes`
-- 
ALTER TABLE `classes`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `foreign` (`className`);

-- 
-- Indexes for table `labs`
-- 
ALTER TABLE `labs`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `foreign` (`labName`,`className`),
  ADD KEY `className` (`className`);

-- 
-- Indexes for table `registration`
-- 
ALTER TABLE `registration`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `foreign` (`beeCard`,`className`),
  ADD KEY `className` (`className`);

-- 
-- Indexes for table `studentanswers`
-- 
ALTER TABLE `studentanswers`
  ADD PRIMARY KEY (`pk`),
  ADD UNIQUE KEY `foreign` (`labName`,`beeCard`),
  ADD KEY `beeCard` (`beeCard`);

-- 
-- Indexes for table `users`
-- 
ALTER TABLE `users`
  ADD PRIMARY KEY (`beeCard`);

-- 
-- AUTO_INCREMENT for dumped tables
-- 

-- 
-- AUTO_INCREMENT for table `classes`
-- 
ALTER TABLE `classes`
  MODIFY `pk` int(255) NOT NULL AUTO_INCREMENT;

-- 
-- AUTO_INCREMENT for table `labs`
-- 
ALTER TABLE `labs`
  MODIFY `pk` int(255) NOT NULL AUTO_INCREMENT;

-- 
-- AUTO_INCREMENT for table `registration`
-- 
ALTER TABLE `registration`
  MODIFY `pk` int(255) NOT NULL AUTO_INCREMENT;

-- 
-- AUTO_INCREMENT for table `studentanswers`
-- 
ALTER TABLE `studentanswers`
  MODIFY `pk` int(255) NOT NULL AUTO_INCREMENT;

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `labs`
-- 
ALTER TABLE `labs`
  ADD CONSTRAINT `labs_ibfk_1` FOREIGN KEY (`className`) REFERENCES `classes` (`className`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `labs_ibfk_2` FOREIGN KEY (`labName`) REFERENCES `studentanswers` (`labName`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `registration`
-- 
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`beeCard`) REFERENCES `users` (`beeCard`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`className`) REFERENCES `classes` (`className`) ON DELETE CASCADE ON UPDATE NO ACTION;

-- 
-- Constraints for table `studentanswers`
-- 
ALTER TABLE `studentanswers`
  ADD CONSTRAINT `studentanswers_ibfk_1` FOREIGN KEY (`beeCard`) REFERENCES `users` (`beeCard`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
