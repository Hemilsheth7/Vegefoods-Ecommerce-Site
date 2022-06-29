-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 05:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegefoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_name` varchar(20) NOT NULL,
  `item_price` int(5) NOT NULL,
  `availability` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_name`, `item_price`, `availability`) VALUES
('Strawberry', 120, 76),
('Bellpepper', 80, 169),
('Carrot', 120, 183),
('Greenbeans', 120, 300),
('Purplecabbage', 120, 100),
('Tomato', 120, 190);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` longtext NOT NULL,
  `phoneno` bigint(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `phoneno`, `email`) VALUES
('ABC PP', 'ABC', '123', 987653215, 'abc@gmail.com'),
('Devansh', 'ctutiee', 'pass@123', 342335432, 'shahdevansh80@gmail.'),
('Hemil', 'Hemil', 'hemil@123', 1234567893, 'hemilsheth7@gmail.co'),
('Kalash Vishwakarma', 'Kalash ', '62c8f38f33abbe75ec84fd983120ea51', 8286406302, 'kalash8286@gmail.com'),
('karan', 'Karan1', 'pass@1234', 324343534, 'nandu@gmail.com'),
('nilam', 'nilam', 'huyuuy', 1324567898, 'nil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_add`
--

CREATE TABLE `user_add` (
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` int(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_add`
--

INSERT INTO `user_add` (`username`, `first_name`, `last_name`, `address`, `city`, `zipcode`, `email`) VALUES
('', 'Pooja', 'Shah', '', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('', 'Pooja', 'Shah', 'Andheri', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash ', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash ', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash ', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash ', 'Pooja', 'Shah', 'Chembur', 'Mumbai', 342, 'kalash8286@gmail.com'),
('Kalash ', '3333333333', '33333333', 'Andheri', 'Mumbai', 400071, 'abc@gmail.com'),
('Kalash ', 'Pooja', 'Shah', '11', '11', 1111, 'kalash8286@gmail.com'),
('Kalash ', 'Pooja', 'Shah', '33', 'Mumbai', 342, 'kalash8286@gmail.com'),
('Kalash', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash', 'Kalash', 'Vishwakarama', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash', 'ssss', 'sss', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash', 'Pooja', 'Shah', 'Chembur', 'Mumbai', 400071, 'kalash8286@gmail.com'),
('Kalash', 'Kalash', 'Vishwakarama', '1111111', '11111111', 111111, 'kalash8286@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
