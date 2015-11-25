-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 01:11 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` int(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `AuthorName` varchar(50) NOT NULL,
  `NumberOfCopies` int(11) NOT NULL,
  `NumberBorrwed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `name`, `AuthorName`, `NumberOfCopies`, `NumberBorrwed`) VALUES
(7576, 'Ù‡ÙŠØ¨ØªØ§', 'Ù…Ø­Ù…Ø¯ ØµØ§Ø¯Ù‚', 1, 0),
(12345, 'Ø§Ù„Ø£Ø³ÙˆØ¯ ÙŠÙ„ÙŠÙ‚ Ø¨Ùƒ ', 'Ø£Ø­Ù„Ø§Ù… Ù…Ø³ØªØºØ§Ù†Ù…ÙŠ', 2, 1),
(33235, 'Ø±Ø¨Ø¹ Ø¬Ø±Ø§Ù…', 'Ø¹ØµØ§Ù… ÙŠÙˆØ³Ù', 2, 0),
(235552, '2 Ø¶Ø¨Ø§Ø·', 'Ø¹ØµØ§Ù… ÙŠÙˆØ³Ù', 2, 0),
(543643, '1919', 'Ø§Ø­Ù…Ø¯ Ù…Ø±Ø§Ø¯', 0, 1),
(634643, 'ØªØ±Ø§Ø¨ Ø§Ù„Ù…Ø§Ø³', 'Ø§Ø­Ù…Ø¯ Ù…Ø±Ø§Ø¯', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`) VALUES
('ahmed reda', 'aboreda9600@gmail.com', 'f6be962663dfe1b674bb4f81188f177b'),
('Hossam', 'hossam.elfar2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
('Hossam Ahmed bahaa', 'hossam.elfar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
