-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 07:03 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `username` varchar(64) NOT NULL,
  `folder` varchar(64) NOT NULL,
  `upload_image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`username`, `folder`, `upload_image`) VALUES
('klt', '/xampp/htdocs/Assignment/images/', 'meal.jpeg'),
('trainer', '/xampp/htdocs/Assignment/images/', '');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `registeredSessions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `fullName`, `email`, `level`, `registeredSessions`) VALUES
('AA', 'AA', 'Aaron', 'a@gmail.com', 'Beginner', '1,3,4,13,14,15'),
('kl', 'kl', 'Kary Lim', 'kl@gmail.com', 'Advanced', ''),
('zara', 'zara', 'Zara', 'zara@gmail.com', 'Beginner', '2,3,6,9');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(1) NOT NULL,
  `comments` text NOT NULL,
  `sessionID` int(10) NOT NULL,
  `sessionTrainer` varchar(20) NOT NULL,
  `reviewedBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `specialty` varchar(20) NOT NULL,
  `averageRating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`username`, `password`, `fullName`, `email`, `specialty`, `averageRating`) VALUES
('klt', 'klt', 'tkl', 'tkl@gmail.com', 'martial arts', 0),
('trainer', 'tina', 'Tina Lee', 'tina@gmail.com', 'Zumba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainingsessions`
--

CREATE TABLE `trainingsessions` (
  `sessionID` int(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sessionDate` date NOT NULL,
  `sessionTime` time NOT NULL,
  `sessionFee` double NOT NULL,
  `maxPax` int(100) NOT NULL,
  `numPax` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `classType` varchar(50) NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 NOT NULL,
  `notes` varchar(100) CHARACTER SET latin1 NOT NULL,
  `sessionTrainer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainingsessions`
--

INSERT INTO `trainingsessions` (`sessionID`, `title`, `sessionDate`, `sessionTime`, `sessionFee`, `maxPax`, `numPax`, `type`, `classType`, `status`, `notes`, `sessionTrainer`) VALUES
(1, 'Get Personal with Trainer Tina', '2017-12-12', '22:00:00', 20, 1, 1, 'Personal', '-', 'Available', '', 'trainer'),
(2, 'Dance Your Heart Out with Zumba', '2017-11-01', '13:00:00', 0, 10, 1, 'Group', 'Dance', 'Completed', '', 'trainer'),
(3, 'Fighting Spirit', '2017-12-27', '09:00:00', 5, 1, 2, 'Personal', '-', 'Available', '', 'trainer'),
(4, 'MMA Special Workshop', '2017-12-30', '20:30:00', 8, 30, 1, 'Group', 'MMA', 'Available', '', 'trainer'),
(5, 'Fancy Football Footworks For Fun', '2017-12-06', '14:02:00', 2, 9, 0, 'Group', 'Sport', 'Cancelled', '', 'klt'),
(6, 'Kung fu', '2018-02-07', '14:00:00', 2, 1, 1, 'Personal', '', 'Cancelled', 'Had to be cancelled.', 'klt'),
(7, 'Zumba', '2018-04-14', '04:00:00', 2, 10, 0, 'Group', 'Dance', 'Available', '', 'klt'),
(8, 'Badminton', '2017-11-06', '18:00:00', 2, 1, 0, 'Personal', 'Sport', 'Completed', '', 'klt'),
(9, 'Taichi', '2017-10-03', '09:02:00', 2, 20, 1, 'Group', 'Sport', 'Completed', '', 'klt'),
(10, 'Fitness', '2018-02-05', '15:00:00', 2, 1, 0, 'Personal', 'Sport', 'Available', '', 'klt'),
(11, 'Yoga', '2018-02-05', '17:30:00', 2, 1, 0, 'Personal', 'Dance', 'Available', '', 'klt'),
(12, 'Qi Gong', '2018-04-17', '11:00:00', 2, 20, 0, 'Group', 'MMA', 'Available', '', 'klt'),
(13, 'Kali', '2018-02-05', '02:02:00', 2, 1, 1, 'Personal', 'MMA', 'Available', '', 'klt'),
(14, 'Tango', '2018-03-21', '10:30:00', 5, 1, 1, 'Personal', 'Dance', 'Available', 'work more on footwork', 'klt'),
(15, 'Salsa', '2018-02-05', '02:02:00', 2, 1, 1, 'Personal', 'Dance', 'Available', '', 'klt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD UNIQUE KEY `timestamp` (`timestamp`),
  ADD KEY `reviews_reviewedBy` (`reviewedBy`),
  ADD KEY `reviews_sessionTrainer` (`sessionTrainer`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `trainingsessions`
--
ALTER TABLE `trainingsessions`
  ADD PRIMARY KEY (`sessionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trainingsessions`
--
ALTER TABLE `trainingsessions`
  MODIFY `sessionID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
