-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 09:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalfinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `aaron`
--

CREATE TABLE `aaron` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `income` int(11) DEFAULT 0,
  `expenditure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `abhay`
--

CREATE TABLE `abhay` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `income` int(11) DEFAULT 0,
  `expenditure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `abhishek`
--

CREATE TABLE `abhishek` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `income` int(11) DEFAULT 0,
  `expenditure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abhishek`
--

INSERT INTO `abhishek` (`id`, `date`, `description`, `income`, `expenditure`) VALUES
(5, '0000-00-00', '', 10000, 0),
(6, '0000-00-00', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jaydeep`
--

CREATE TABLE `jaydeep` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `income` int(11) DEFAULT 0,
  `expenditure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new`
--

CREATE TABLE `new` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `income` int(11) DEFAULT 0,
  `expenditure` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('aaron', '$2y$10$raPsmRumzINJO1e05GrP3.HNMVh/vC3lzq/49EmyFvLQfkmtofQhi'),
('abhay', '$2y$10$L8CjvG0Ft04PEWs7XUOsCeteQ1UozXErNMMzbca4wNtik4Gp2izOu'),
('abhishek', '$2y$10$X/5fvfhm2vMkwR60Pkfcrurk/8nre5FyEvgpiBuUQrOyq78z3aBOK'),
('jaydeep ', '$2y$10$Mxq4k9kAlf1qtZXwOvmJ2eBXg42AM5SsIuviA0ch5uPcUAunrXLVy'),
('new', '$2y$10$rH40WQjAnujE/jRBQRWSb.x.MQkYi7pUUGF/KdSNtoo/yLU.2ql2m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aaron`
--
ALTER TABLE `aaron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abhay`
--
ALTER TABLE `abhay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abhishek`
--
ALTER TABLE `abhishek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaydeep`
--
ALTER TABLE `jaydeep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aaron`
--
ALTER TABLE `aaron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `abhay`
--
ALTER TABLE `abhay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `abhishek`
--
ALTER TABLE `abhishek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jaydeep`
--
ALTER TABLE `jaydeep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new`
--
ALTER TABLE `new`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
