-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2020 at 09:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `MyProducts`
--

CREATE TABLE `MyProducts` (
  `pid` int(15) NOT NULL,
  `name` varchar(120) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MyProducts`
--

INSERT INTO `MyProducts` (`pid`, `name`, `quantity`) VALUES
(100, 'Burger', 10);

-- --------------------------------------------------------

--
-- Table structure for table `MyUsers`
--

CREATE TABLE `MyUsers` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Images` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MyUsers`
--

INSERT INTO `MyUsers` (`Name`, `Email`, `Gender`, `Password`, `Images`) VALUES
('vcjvj', '123@gsjdh.com', 'Male', '1234', '6-ans.png'),
('aa', 'aa@aaa.com', 'Male', '1234', '1-tab.png'),
('qwer', 'aaa@aghsggcy.com', 'Male', '1234', '4-ans.png'),
('Sumo Pagol', 'muchkihasi@gmail.com', 'Female', 'amipagol', '72484811-funny-clipart-of-a-female-doctor.jpg'),
('abc', 'xyz@gmail.com', 'Male', '1234', 'index.png');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `dob` varchar(12) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`name`, `username`, `email`, `password`, `gender`, `dob`, `image`) VALUES
('Md Shamil Hossain', 'alsany', 'aa@aaa.com', '12345', 'male', '2020-03-01', 'images.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `MyProducts`
--
ALTER TABLE `MyProducts`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `MyUsers`
--
ALTER TABLE `MyUsers`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
