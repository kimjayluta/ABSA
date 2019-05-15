-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 03:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(255) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `usn`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `player_id` int(255) NOT NULL,
  `sched_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `player_id`, `sched_id`) VALUES
(1, 4, 10),
(2, 4, 10),
(3, 4, 10),
(4, 4, 10),
(5, 4, 10),
(6, 5, 10),
(7, 4, 10),
(8, 5, 10),
(9, 5, 10),
(10, 5, 10),
(11, 4, 10),
(12, 5, 10),
(13, 5, 10),
(14, 5, 10),
(15, 4, 10),
(16, 4, 10),
(17, 4, 10),
(18, 4, 10),
(19, 5, 10),
(20, 5, 10),
(21, 4, 10),
(22, 5, 10),
(23, 4, 10),
(24, 5, 10),
(25, 5, 10),
(26, 4, 10),
(27, 5, 10),
(28, 4, 10),
(29, 5, 10),
(30, 4, 10),
(31, 5, 10),
(32, 4, 10),
(33, 5, 10),
(34, 4, 10),
(35, 5, 10),
(36, 5, 10),
(37, 6, 10),
(38, 9, 10),
(39, 6, 10),
(40, 9, 10),
(41, 4, 10),
(42, 7, 10),
(43, 8, 10),
(44, 9, 10),
(45, 5, 10),
(46, 6, 10),
(47, 4, 10),
(48, 5, 10),
(49, 6, 10),
(50, 7, 10),
(51, 8, 10),
(52, 9, 10),
(53, 4, 10),
(54, 5, 10),
(55, 6, 10),
(56, 7, 10),
(57, 8, 10),
(58, 9, 10),
(59, 4, 10),
(60, 6, 10),
(61, 7, 10),
(62, 8, 10),
(63, 9, 10),
(64, 4, 10),
(65, 5, 10),
(66, 6, 10),
(67, 7, 10),
(68, 8, 10),
(69, 9, 10),
(70, 5, 10),
(71, 6, 10),
(72, 5, 10),
(73, 6, 10),
(74, 7, 10),
(75, 5, 10),
(76, 6, 10),
(77, 7, 10),
(78, 8, 10),
(79, 9, 10),
(80, 7, 10),
(81, 8, 10),
(82, 4, 10),
(83, 5, 10),
(84, 6, 10),
(85, 7, 10),
(86, 8, 10),
(87, 9, 10),
(88, 4, 10),
(89, 6, 10),
(90, 7, 10),
(91, 8, 10),
(92, 6, 10),
(93, 7, 10),
(94, 8, 10),
(95, 9, 10),
(96, 4, 10),
(97, 7, 10),
(98, 8, 10),
(99, 9, 10),
(100, 7, 10),
(101, 8, 10),
(102, 9, 10),
(103, 6, 10),
(104, 7, 10),
(105, 8, 10),
(106, 9, 10),
(107, 5, 10),
(108, 6, 10),
(109, 7, 10),
(110, 8, 10),
(111, 9, 10),
(112, 4, 10),
(113, 5, 10),
(114, 6, 10),
(115, 7, 10),
(116, 8, 10),
(117, 9, 10),
(118, 4, 10),
(119, 5, 10),
(120, 6, 10),
(121, 7, 10),
(122, 8, 10),
(123, 9, 10),
(124, 6, 10),
(125, 7, 10),
(126, 8, 10),
(127, 9, 10),
(128, 9, 10),
(129, 9, 10),
(130, 9, 10),
(131, 9, 10),
(132, 9, 10),
(133, 4, 10),
(134, 5, 10),
(135, 7, 10),
(136, 8, 10),
(137, 9, 10),
(138, 8, 10),
(139, 9, 10),
(140, 7, 10),
(141, 8, 10),
(142, 9, 10),
(143, 9, 10),
(144, 4, 10),
(145, 5, 10),
(146, 6, 10),
(147, 7, 10),
(148, 8, 10),
(149, 9, 10),
(150, 4, 10),
(151, 5, 10),
(152, 8, 10),
(153, 9, 10),
(154, 5, 10),
(155, 6, 10),
(156, 7, 10),
(157, 8, 10),
(158, 9, 10),
(159, 8, 10),
(160, 9, 10),
(161, 9, 10),
(162, 9, 10),
(163, 9, 10),
(164, 7, 10),
(165, 8, 10),
(166, 9, 10),
(167, 9, 10),
(168, 9, 10),
(169, 9, 10),
(170, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `position` enum('pg','sg','pf','sf','c') NOT NULL,
  `jersey_num` int(255) NOT NULL,
  `height` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `team_id` int(11) NOT NULL,
  `tour_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `position`, `jersey_num`, `height`, `weight`, `team_id`, `tour_id`) VALUES
(4, 'djajawkdjk', 'jjadawjdjk', 'sg', 10, 10, 10, 8, 3),
(5, 'Test', 'Whhohoho', 'sg', 9, 10, 10, 8, 3),
(6, 'Cras', ' ultricies ', 'sg', 8, 10, 10, 8, 3),
(7, 'asd12', ' Ed ', 'sg', 7, 10, 10, 8, 3),
(8, 'CAras', ' aNB ', 'sg', 6, 10, 10, 8, 3),
(9, 'HCras', ' UKultricies ', 'sg', 5, 10, 10, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(255) NOT NULL,
  `teamone_id` int(255) NOT NULL,
  `teamtwo_id` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `game_type` enum('elimination','finals') NOT NULL DEFAULT 'elimination',
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `teamone_id`, `teamtwo_id`, `date`, `time`, `game_type`, `tour_id`) VALUES
(9, 8, 9, '2019-05-17', '01:59:00', 'elimination', 3),
(10, 8, 9, '2019-05-23', '14:00:00', 'elimination', 3);

-- --------------------------------------------------------

--
-- Table structure for table `score_info`
--

CREATE TABLE `score_info` (
  `id` int(255) NOT NULL,
  `player_id` int(11) NOT NULL,
  `free_throw` int(11) NOT NULL,
  `free_throw_missed` int(255) NOT NULL,
  `two_points` int(11) NOT NULL,
  `two_points_missed` int(255) NOT NULL,
  `three_points` int(11) NOT NULL,
  `three_points_missed` int(255) NOT NULL,
  `blocks` int(11) NOT NULL,
  `steals` int(11) NOT NULL,
  `assist` int(11) NOT NULL,
  `o_rebound` int(11) NOT NULL,
  `d_rebound` int(255) NOT NULL,
  `foul` int(11) NOT NULL,
  `turn_over` int(255) NOT NULL,
  `scorer_id` int(11) NOT NULL,
  `sched_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `coach` varchar(255) NOT NULL,
  `tour_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `coach`, `tour_id`) VALUES
(8, 'AMAs', 'coach ansay', 3),
(9, 'AMA TWO', 'coach ansey', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comissioner` varchar(255) NOT NULL,
  `ref_one` varchar(255) NOT NULL,
  `ref_two` varchar(255) NOT NULL,
  `ref_three` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `name`, `comissioner`, `ref_one`, `ref_two`, `ref_three`) VALUES
(3, 'Paliga sana man s', 'mayo', 'mayo man', 'mayo pa', 'mayo talaga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_type` enum('0','1','2','3') NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usn`, `pass`, `user_type`, `tour_id`) VALUES
(2, 'password', 'password', '0', 3),
(3, 'kim', 'test', '1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `sched_id` (`sched_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `teamone_id` (`teamone_id`),
  ADD KEY `teamtwo_id` (`teamtwo_id`);

--
-- Indexes for table `score_info`
--
ALTER TABLE `score_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scorer_id` (`scorer_id`),
  ADD KEY `sched_id` (`sched_id`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `tour_id_2` (`tour_id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `score_info`
--
ALTER TABLE `score_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`sched_id`) REFERENCES `schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`teamone_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`teamtwo_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score_info`
--
ALTER TABLE `score_info`
  ADD CONSTRAINT `score_info_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_info_ibfk_2` FOREIGN KEY (`scorer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_info_ibfk_3` FOREIGN KEY (`sched_id`) REFERENCES `schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `score_info_ibfk_4` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
