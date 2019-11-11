-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 07:30 AM
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
('abhishek.cse.1702@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'mess', 1),
('administration', '1a1dc91c907325c69271ddf0c944bc72', 'Academic', 1),
('aman.cse.1708@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'Academic', 2),
('director', 'a181a603769c1f98ad927e7367c7aa51', 'all', 0),
('hemanth.cse.1715@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'hostel', 2),
('hostel', '1a1dc91c907325c69271ddf0c944bc72', 'hostel', 1),
('kumar.cse.1721@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'sports', 2),
('mehul.cse.1724@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'mess', 2),
('sports', '1a1dc91c907325c69271ddf0c944bc72', 'sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_box`
--

CREATE TABLE `complaint_box` (
  `complain_number` varchar(16) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 0,
  `subject` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `arrival_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Declaration` varchar(3) NOT NULL DEFAULT 'YES',
  `inbox_read` int(1) NOT NULL DEFAULT 1,
  `uploaded_filename` varchar(50) NOT NULL DEFAULT 'none',
  `solved_by` varchar(50) NOT NULL DEFAULT 'NONE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_box`
--

INSERT INTO `complaint_box` (`complain_number`, `user_id`, `category`, `level`, `subject`, `description`, `arrival_date`, `Declaration`, `inbox_read`, `uploaded_filename`, `solved_by`) VALUES
('1713000121', 'anuranjan.cse.1713@iiitbh.ac.in', 'hostel', 2, 'requirements of ups', 'provide ups and free gpu', '2019-11-10 20:22:05', 'YES', 1, 'none', 'NONE'),
('1713000123', 'anuranjan.cse.1713@iiitbh.ac.in', 'Academic', 2, 'Less no. of Systems in CSE Lab', 'There is less no.of systems than the students,so it is difficult to program and understand class. ', '2019-11-10 20:22:05', 'YES', 1, 'none', 'NONE'),
('1713000124', 'anuranjan.cse.1713@iiitbh.ac.in', 'mess', 1, 'Makkhi in food', 'Even now and then we found good quality of insects in our meal.so please provide us less quality food.', '2019-11-10 21:29:15', 'YES', 1, 'none', 'NONE'),
('2019100031713', 'anuranjan.cse.1713@iiitbh.ac.in', 'mess', 1, 'Invitation To CodingClub IIITBH', 'ibicjwbc', '2019-11-10 21:38:51', 'YES', 1, 'none', 'NONE'),
('2019100041713', 'anuranjan.cse.1713@iiitbh.ac.in', 'academic', 2, '[Fwd: Result of JAN-APR 2019 Semester]', 'kjbckwck\r\njbvjekwbjke', '2019-11-10 20:22:05', 'YES', 1, 'none', 'NONE'),
('201911101001', 'anuranjan.cse.1713@iiitbh.ac.in', 'hostel', 1, 'hello world', 'heavy waterfall', '2019-11-10 20:37:17', 'YES', 1, 'none', 'NONE'),
('201911111001', 'anuranjan.cse.1713@iiitbh.ac.in', 'mess', 2, 'naam mein kya hai', 'sjchaic', '2019-11-10 21:55:39', 'YES', 1, 'none', 'mehul.cse.1724@iiitbh.ac.in'),
('201911111002', 'anuranjan.cse.1713@iiitbh.ac.in', 'hostel', 2, 'naam ', 'shhs', '2019-11-10 20:22:05', 'YES', 1, 'none', 'NONE'),
('201911111003', 'anuranjan.cse.1713@iiitbh.ac.in', 'academic', 0, 'hello world', 'lll aahhbs', '2019-11-11 06:08:47', 'YES', 1, 'none', 'NONE'),
('201911111004', 'anuranjan.cse.1713@iiitbh.ac.in', 'others', 0, 'have a good day', 'nice', '2019-11-11 06:20:00', 'YES', 1, '', 'NONE'),
('201911111005', 'anuranjan.cse.1713@iiitbh.ac.in', 'sports', 0, 'kkkjh', 'ffaff', '2019-11-11 06:28:06', 'YES', 1, '201911111005.png', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `no_of_complains`
--

CREATE TABLE `no_of_complains` (
  `value` int(8) NOT NULL,
  `prev_date` date NOT NULL DEFAULT '2019-11-10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no_of_complains`
--

INSERT INTO `no_of_complains` (`value`, `prev_date`) VALUES
(1005, '2019-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `solved_complain`
--

CREATE TABLE `solved_complain` (
  `complain_number` varchar(16) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 0,
  `subject` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `arrival_date` timestamp NOT NULL DEFAULT '2017-08-04 18:30:00',
  `completion_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `solved_by` varchar(50) NOT NULL,
  `Remarks` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solved_complain`
--

INSERT INTO `solved_complain` (`complain_number`, `user_id`, `category`, `level`, `subject`, `description`, `arrival_date`, `completion_date`, `solved_by`, `Remarks`) VALUES
('1725010003', 'kush.ece.1725@iiitbh.ac.in', 'Academic', 1, 'Avaibility of Audrino boards', 'There is no audrino boards to practice IoT .', '2019-08-05 01:40:55', '2019-10-28 16:39:50', 'administration', 'feel free to contact,we are here to help.'),
('2019100041713', 'anuranjan.cse.1713@iiitbh.ac.in', 'academic', 0, '[Fwd: Result of JAN-APR 2019 Semester]', 'kjbckwck\r\njbvjekwbjke', '2019-11-06 17:56:29', '2019-11-07 07:45:24', 'administration', 'jsbcjzcmk jsnbckjs'),
('201911111001', 'anuranjan.cse.1713@iiitbh.ac.in', 'mess', 2, 'naam mein kya hai', 'sjchaic', '2019-11-10 20:22:05', '2019-11-10 21:39:39', 'mehul.cse.1724@iiitbh.ac.in', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_table`
--

CREATE TABLE `suggestion_table` (
  `suggestion_number` int(10) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `suggestion` text NOT NULL,
  `arrival_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `level` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestion_table`
--

INSERT INTO `suggestion_table` (`suggestion_number`, `user_id`, `subject`, `category`, `suggestion`, `arrival_date`, `level`) VALUES
(1000015, 'anuranjan.cse.1713@iiitbh.ac.in', 'placement cell formation', 'Academic', 'two students\r\n1 proff', '2019-11-06 18:37:54', 1),
(1000017, 'anuranjan.cse.1713@iiitbh.ac.in', 'giweic', 'hostel', '', '2019-11-06 18:46:15', 1),
(1000018, 'anuranjan.cse.1713@iiitbh.ac.in', 'giweic', 'academic', '', '2019-11-06 18:48:26', 1),
(1000020, 'anuranjan.cse.1713@iiitbh.ac.in', 'gggg', 'mess', 'ffff\r\njjj\r\n', '2019-11-06 20:31:27', 1),
(1000021, 'anuranjan.cse.1713@iiitbh.ac.in', 'hello', 'hostel', 'abg', '2019-11-07 09:43:41', 1);

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
  ADD PRIMARY KEY (`complain_number`) USING BTREE;

--
-- Indexes for table `suggestion_table`
--
ALTER TABLE `suggestion_table`
  ADD PRIMARY KEY (`suggestion_number`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `suggestion_table`
--
ALTER TABLE `suggestion_table`
  MODIFY `suggestion_number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
