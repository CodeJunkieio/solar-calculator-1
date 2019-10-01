-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 02:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_solar_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `id` int(11) NOT NULL,
  `elect_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `elect_type`) VALUES
(1, 'Laptop'),
(2, 'Radio'),
(3, 'Television'),
(4, 'Cooker');

-- --------------------------------------------------------

--
-- Table structure for table `watts`
--

CREATE TABLE `watts` (
  `id` int(11) NOT NULL,
  `electronics_id` int(11) NOT NULL,
  `power_consumption` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watts`
--

INSERT INTO `watts` (`id`, `electronics_id`, `power_consumption`) VALUES
(1, 1, '20'),
(2, 2, '2'),
(3, 3, '22'),
(4, 4, '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watts`
--
ALTER TABLE `watts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watts`
--
ALTER TABLE `watts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
