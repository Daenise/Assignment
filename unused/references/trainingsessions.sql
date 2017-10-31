-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 05:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `trainingsessions`
--

CREATE TABLE `trainingsessions` (
  `sessionID` int(30) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sessionDate` date NOT NULL,
  `sessionTime` time NOT NULL,
  `sessionFee` double NOT NULL,
  `maxPax` int(100) NOT NULL,
  `Type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `classType` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sessionTrainer` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sessionMember` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
  MODIFY `sessionID` int(30) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
