-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 11:59 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `special_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `username` varchar(255) NOT NULL,
  `announcement` text NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`username`, `announcement`, `user_image`) VALUES
('admin', 'OT Paaaaa!!', 'assets/img/userimages/1520181816.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_in_out`
--

CREATE TABLE `t_in_out` (
  `time_in` varchar(255) NOT NULL,
  `date_in` varchar(255) NOT NULL,
  `time_out` varchar(255) NOT NULL,
  `date_out` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `statusform` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_in_out`
--

INSERT INTO `t_in_out` (`time_in`, `date_in`, `time_out`, `date_out`, `username`, `statusform`) VALUES
('0 : 44 : 31', '5 / 3 / 2018', '---', '---', 'admin', 'On Work');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `contact_number` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`first_name`, `middle_name`, `last_name`, `email_address`, `contact_number`, `username`, `password`, `user_image`, `status`, `position`) VALUES
('admin', 'admin', 'admin', 'admin@gmail.com', 909, 'admin', 'admin', 'assets/img/userimages/1520181816.png', 'On Work', 'Admin'),
('art', 'art', 'art', 'art', 223, 'dianne', 'dianne', 'assets/img/userimages/1520176610.jpg', 'Out', 'Admin'),
('employee', 'employee', 'employee', 'employee@gmail.com', 909, 'employee', 'employee', 'assets/img/userimages/1520181731.png', 'Out', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
