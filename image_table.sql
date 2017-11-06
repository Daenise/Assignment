-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 06:12 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
('kl', '/xampp/htdocs/Assignment/images/', 'WhatsApp Image 2017-05-23 at 18.58.31.jpeg'),
('klt', '/xampp/htdocs/Assignment/images/', 'WhatsApp Image 2017-05-24 at 13.35.44.jpeg'),
('trainer', '/xampp/htdocs/Assignment/images/', 'WhatsApp Image 2017-05-23 at 17.11.20.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
