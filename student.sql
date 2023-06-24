-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2021 at 11:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `s no.` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `ssc_marks` varchar(100) NOT NULL,
  `hsc` varchar(100) NOT NULL,
  `ug` varchar(100) NOT NULL,
  `pg` varchar(100) NOT NULL,
  `job_name` text NOT NULL,
  `rec_head` text NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `help_contactnum` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`s no.`, `company_name`, `ssc_marks`,`hsc`,`ug`,`pg`, `job_name`, `rec_head`, `email_id`, `help_contactnum`, `password`, `confirm_password`) VALUES
(1, 'admin','34','34','23','12', 'admin', 'admin','adminhead@gmail.com' , '1236549870', 'admin001', 'admin001'),
(10, 'shruti ltd','23','34','56','65', 'analyst', 'shruti rathore', 'shruti@gmail.com', '123654', 'shruti23', 'shruti23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s no.` int(4) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `age` date NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `address` text NOT NULL,
 `ssc_marks` varchar(100) NOT NULL,
  `hsc` varchar(100) NOT NULL,
  `ug` varchar(100) NOT NULL,
  `pg` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `technology` text NOT NULL,
  `password` varchar(8) NOT NULL,
  `confirm_password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s no.`, `first_name`, `last_name`, `age`, `email_id`, `mobile_number`, `address`, `ssc_marks`,`hsc`,`ug`,`pg`, `gender`, `technology`, `password`, `confirm_password`) VALUES
(1, 'admin', 'admin', 20, 'adminhead@gmail.com', '1234567890', 'scsit', '34', '34', '23', '12', 'male', 'all', 'admin001', 'admin001'),
(34, 'Bhoomi', 'S', 20, 'bhoomisamadhiya123@g', '987542345', 'katni', '34', '34', '23' , '12', 'female','all', 'bhoomi12', 'bhoomi12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`s no.`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s no.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `s no.` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s no.` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
