-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 07:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `password`, `category`, `level`) VALUES
('administration', '1a1dc91c907325c69271ddf0c944bc72', 'Academic', 1),
('aman.cse.1708@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'Academic', 0),
('director', 'a181a603769c1f98ad927e7367c7aa51', 'all', 2),
('hemanth.cse.1715@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'hostel', 0),
('hostel', '1a1dc91c907325c69271ddf0c944bc72', 'hostel', 1),
('kumar.cse.1721@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'sports', 0),
('mehul.cse.1724@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'mess', 0),
('mess', '1a1dc91c907325c69271ddf0c944bc72', 'mess', 1),
('sports', '1a1dc91c907325c69271ddf0c944bc72', 'sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_box`
--

CREATE TABLE `complaint_box` (
  `complain_number` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `priority` int(1) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `porposed_solution` text NOT NULL,
  `arrival_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Declaration` varchar(3) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_box`
--

INSERT INTO `complaint_box` (`complain_number`, `user_id`, `category`, `priority`, `subject`, `description`, `porposed_solution`, `arrival_date`, `Declaration`) VALUES
(1713000123, 'anuranjan.cse.1713@iiitbh.ac.in', 'Academic', 0, 'Less no. of Systems in CSE Lab', 'There is less no.of systems than the students,so it is difficult to program and understand class. ', 'increase no. of systems', '2019-10-28 17:04:01', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `solved_complain`
--

CREATE TABLE `solved_complain` (
  `complain_number` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `priority` int(1) NOT NULL DEFAULT 0,
  `subject` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `porposed_solution` text NOT NULL,
  `arrival_date` timestamp NOT NULL DEFAULT '2017-08-04 18:30:00',
  `completion_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `solved_by` varchar(50) NOT NULL,
  `Remarks` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solved_complain`
--

INSERT INTO `solved_complain` (`complain_number`, `user_id`, `category`, `priority`, `subject`, `description`, `porposed_solution`, `arrival_date`, `completion_date`, `solved_by`, `Remarks`) VALUES
(1725010003, 'kush.ece.1725@iiitbh.ac.in', 'Academic', 1, 'Avaibility of Audrino boards', 'There is no audrino boards to practice IoT .', 'Provide as soon as possible', '2019-08-05 01:40:55', '2019-10-28 16:39:50', 'administration', 'feel free to contact,we are here to help.');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_box`
--

CREATE TABLE `suggestion_box` (
  `suggetion_number` int(8) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `arrival_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestion_box`
--

INSERT INTO `suggestion_box` (`suggetion_number`, `user_id`, `category`, `subject`, `description`, `arrival_date`) VALUES
(1702000027, 'abhishek.cse.1702@iiitbh.ac.in', 'hostel', 'washing machine', 'There is no dhobi near our campus and dry cleaning is too far,so pls make washing machine available in the hostels.', '2019-10-28 16:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `password`) VALUES
('abhishek.cse.1702@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99'),
('anuranjan.cse.1713@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99'),
('kush.ece.1725@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99'),
('user', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_box`
--
ALTER TABLE `complaint_box`
  ADD PRIMARY KEY (`complain_number`);

--
-- Indexes for table `solved_complain`
--
ALTER TABLE `solved_complain`
  ADD PRIMARY KEY (`complain_number`,`user_id`);

--
-- Indexes for table `suggestion_box`
--
ALTER TABLE `suggestion_box`
  ADD PRIMARY KEY (`suggetion_number`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
