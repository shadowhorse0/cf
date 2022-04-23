-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2022 at 02:00 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cf`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempted`
--

CREATE TABLE `attempted` (
  `id` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `question_id` int DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `flag` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attempted`
--

INSERT INTO `attempted` (`id`, `username`, `question_id`, `answer`, `flag`) VALUES
(21, 'trialuser16', 27, '20', 0),
(23, 'trialuser18', 32, '7-x', 1),
(24, 'trialuser7', 25, 'WelcometoMazecoders', 0),
(25, 'trialuser6', 32, '', 0),
(26, 'trialuser1', 32, '5', 0),
(27, 'trialuser15', 26, 'replace', 1),
(28, 'trialuser5', 26, 'replace', 1),
(29, 'trialuser12', 25, '11:21', 0),
(30, 'trialuser10', 26, 'swap', 0),
(31, 'trialuser13', 32, '4', 0),
(32, 'trialuser9', 26, '21', 0),
(33, 'trialuser11', 27, '20', 0),
(34, 'trialuser14', 27, '1/2', 0),
(35, 'trialuser18', 27, '1/2', 0),
(36, 'trialuser16', 32, '7-x', 1),
(37, 'trialuser6', 25, '', 0),
(38, 'trialuser3', 27, '400', 0),
(39, 'trialuser18', 25, '', 0),
(40, 'trialuser6', 27, '', 0),
(41, 'trialuser18', 26, 'update', 0),
(44, 'trialuser19', 32, '7-x', 1),
(45, 'trialuser15', 32, 'x', 0),
(46, 'trialuser14', 25, '11:21', 0),
(47, 'trialuser8', 32, '', 0),
(48, 'trialuser6', 26, 'replace', 1),
(49, 'trialuser5', 25, '9,18', 0),
(51, 'trialuser19', 25, 'b', 0),
(52, 'trialuser10', 27, '20', 0),
(53, 'trialuser16', 25, '9,18', 0),
(54, 'trialuser12', 32, 'x', 0),
(55, 'trialuser11', 25, 'WelcometoMazeCoders2022', 0),
(56, 'trialuser39', 32, '6', 0),
(58, 'trialuser19', 26, 's', 0),
(59, 'trialuser5', 27, '20', 0),
(60, 'trialuser8', 26, '21', 0),
(63, 'trialuser19', 27, '20', 0),
(64, 'trialuser10', 32, '7-x', 1),
(65, 'trialuser9', 25, '56', 0),
(66, 'trialuser11', 26, 'replace', 1),
(67, 'trialuser16', 26, 'replace', 1),
(68, 'trialuser15', 27, '0.5', 1),
(69, 'trialuser13', 26, 'replace', 1),
(70, 'trialuser7', 32, '7-x', 1),
(71, 'trialuser12', 27, '1/2', 0),
(72, 'trialuser14', 26, 'replace', 1),
(74, 'trialuser39', 27, '1/2', 0),
(75, 'trialuser3', 32, '2', 0),
(76, 'trialuser14', 32, '7-x', 1),
(77, 'trialuser5', 32, '7-x', 1),
(78, 'trialuser8', 25, '11,20', 0),
(79, 'trialuser13', 27, '0.5', 1),
(80, 'trialuser15', 25, 'string', 0),
(81, 'trialuser7', 26, 'update', 0),
(82, 'trialuser28', 26, 'replace', 1),
(83, 'trialuser12', 26, 'replace', 1),
(84, 'trialuser35', 27, '20', 0),
(85, 'trialuser39', 25, '12:21', 0),
(87, 'trialuser35', 25, '10,20', 0),
(88, 'trialuser13', 25, '11:21', 0),
(91, 'trialuser10', 25, '11:22', 0),
(92, 'trialuser27', 32, '5+2=7', 0),
(93, 'trialuser7', 27, '1/2', 0),
(94, 'trialuser39', 26, 'change', 0),
(97, 'trialuser35', 26, 'replace', 1),
(98, 'trialuser1', 27, '0.5', 1),
(99, 'trialuser11', 32, '7-x', 1),
(101, 'trialuser35', 32, '7.x', 0),
(108, 'trialuser3', 26, 'replace', 1),
(109, 'trialuser8', 27, '0.5', 1),
(111, 'trialuser28', 32, '7-x', 1),
(113, 'trialuser9', 32, '18', 0),
(114, 'trialuser9', 27, '67', 0),
(117, 'trialuser28', 25, '11:21', 0),
(119, 'trialuser3', 25, '12:21', 0),
(120, 'trialuser1', 25, '11to22', 0),
(124, 'trialuser1', 26, 'replace', 1),
(125, 'trialuser28', 27, '2', 0),
(126, 'trialuser27', 26, 'replace', 1),
(127, 'trialuser27', 25, 'repalce', 0),
(128, 'trialuser27', 27, '1/2', 0),
(129, 'vaibhav', 32, 'asd', 0),
(130, 'vaibhav', 27, 'asd', 0),
(131, 'vaibhav', 25, 'adf', 0),
(132, 'vaibhav', 26, 'asdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `answer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`) VALUES
(25, 'Print MazeCoders\nb = \"Welcome to MazeCoders 2022\"\nprint(b[___]', '11:20'),
(26, 'Change the year 2021 to 2022\na = \"Welcome to MazeCoders 2022\"\nprint(a._______(\"21\", \"22\"))', 'replace'),
(27, 'Find SquareRoot of 400\nnum_sqrt = 400 ** __\nprint(num_sqrt)', '0.5'),
(32, 'Given Sum on opposite sides of dice is 7 and x is the top side find the value on opposite of the x\nx = int(input())\nprint(___)', '7-x');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `candidate_name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `score` int DEFAULT NULL,
  `time_left` int DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `candidate_name`, `password`, `score`, `time_left`, `status`) VALUES
(1, 'admin', 'Admin', 'Admin@12345', 0, 0, NULL),
(34, 'trialuser1', 'trialuser1', 'trialuser1', 2, 18, 'completed'),
(36, 'trialuser3', 'trialuser3', 'trialuser3', 1, 77, 'completed'),
(38, 'trialuser5', 'trialuser5', 'trialuser5', 2, 321, 'completed'),
(39, 'trialuser6', 'trialuser6', 'trialuser6', 1, 497, 'completed'),
(40, 'trialuser7', 'trialuser7', 'trialuser7', 1, 291, 'completed'),
(41, 'trialuser8', 'trialuser8', 'trialuser8', 1, 277, 'completed'),
(42, 'trialuser9', 'trialuser9', 'trialuser9', 0, 176, 'completed'),
(43, 'trialuser10', 'trialuser10', 'trialuser10', 1, 205, 'completed'),
(44, 'trialuser11', 'trialuser11', 'trialuser11', 2, 266, 'completed'),
(45, 'trialuser12', 'trialuser12', 'trialuser12', 1, 273, 'completed'),
(46, 'trialuser13', 'trialuser13', 'trialuser13', 2, 193, 'completed'),
(47, 'trialuser14', 'trialuser14', 'trialuser14', 2, 203, 'completed'),
(48, 'trialuser15', 'trialuser15', 'trialuser15', 2, 306, 'completed'),
(49, 'trialuser16', 'trialuser16', 'trialuser16', 2, 218, 'completed'),
(51, 'trialuser18', 'trialuser18', 'trialuser18', 1, 224, 'completed'),
(52, 'trialuser19', 'trialuser19', 'trialuser19', 1, 488, 'completed'),
(53, 'trialuser20', 'trialuser20', 'trialuser20', 0, 600, 'not_attempted'),
(54, 'trialuser21', 'trialuser21', 'trialuser21', 0, 600, 'not_attempted'),
(55, 'trialuser22', 'trialuser22', 'trialuser22', 0, 600, 'not_attempted'),
(56, 'trialuser23', 'trialuser23', 'trialuser23', 0, 600, 'not_attempted'),
(57, 'trialuser24', 'trialuser24', 'trialuser24', 0, 600, 'not_attempted'),
(58, 'trialuser25', 'trialuser25', 'trialuser25', 0, 600, 'not_attempted'),
(59, 'trialuser26', 'trialuser26', 'trialuser26', 0, 600, 'not_attempted'),
(60, 'trialuser27', 'trialuser27', 'trialuser27', 1, 208, 'completed'),
(61, 'trialuser28', 'trialuser28', 'trialuser28', 2, 145, 'completed'),
(62, 'trialuser29', 'trialuser29', 'trialuser29', 0, 600, 'not_attempted'),
(63, 'trialuser30', 'trialuser30', 'trialuser30', 0, 600, 'not_attempted'),
(64, 'trialuser31', 'trialuser31', 'trialuser31', 0, 600, 'not_attempted'),
(66, 'trialuser33', 'trialuser33', 'trialuser33', 0, 600, 'not_attempted'),
(68, 'trialuser35', 'trialuser35', 'trialuser35', 1, 369, 'completed'),
(69, 'trialuser36', 'trialuser36', 'trialuser36', 0, 600, 'not_attempted'),
(70, 'trialuser37', 'trialuser37', 'trialuser37', 0, 600, 'not_attempted'),
(72, 'trialuser39', 'trialuser39', 'trialuser39', 0, 403, 'completed'),
(74, 'vaibhav', 'vaibhav', 'vaibhav', 0, 581, 'completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempted`
--
ALTER TABLE `attempted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `attempted`
--
ALTER TABLE `attempted`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
