-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 12:12 PM
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
  `level` int(1) NOT NULL,
  `otp` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `password`, `category`, `level`, `otp`) VALUES
('abhishek.cse.1702@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'mess', 1, 0),
('aman.cse.1708@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'Academic', 2, 0),
('anuranjan.cse.1713@iiitbh.ac.in', '1a1dc91c907325c69271ddf0c944bc72', 'Academic', 1, 0),
('brbhowmik.cse@iiitbh.ac.in', 'a181a603769c1f98ad927e7367c7aa51', 'all', 0, 0),
('hemanth.cse.1715@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'hostel', 2, 0),
('kanishk.cse.1721@iiitbh.ac.in', '1a1dc91c907325c69271ddf0c944bc72', 'hostel', 1, 0),
('krishang.cse.1720@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'Others', 2, 0),
('kumar.cse.1721@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'sports', 2, 5605),
('kumaranuranjan652@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'sports', 1, 0),
('mehul.cse.1724@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'mess', 2, 5475),
('miriyala.cse.1725@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 'Others', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_box`
--

CREATE TABLE `complaint_box` (
  `complain_number` varchar(16) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 2,
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
('201911141002', 'anuranjan.cse.1713@iiitbh.ac.in', 'mess', 2, 'Food quality is bad', 'The food quality is decreasing day by day ,this must be taken in care else there can be  a \r\nbad impact on the student.\r\n\r\nwith regards,\r\nAnuranjan Kumar', '2019-11-14 06:14:36', 'YES', 1, '201911141002.png', 'mehul.cse.1724@iiitbh.ac.in'),
('201911141003', 'anuranjan.cse.1713@iiitbh.ac.in', 'hostel', 2, 'Water Scarcity in Hostel Nalanda', 'The kent provided in the hostel is not working well, we have complained to our care-taker but no action\r\nhas been taken.\r\nKindly  look into this matter.\r\n\r\nwith regards,\r\nAnuranjan Kumar', '2019-11-14 07:08:04', 'YES', 1, '201911141003.jpg', 'NONE');

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
(1003, '2019-11-14');

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
('201911141002', 'anuranjan.cse.1713@iiitbh.ac.in', 'mess', 2, 'Food quality is bad', 'The food quality is decreasing day by day ,this must be taken in care else there can be  a \r\nbad impact on the student.\r\n\r\nwith regards,\r\nAnuranjan Kumar', '2019-11-14 05:56:47', '2019-11-14 06:14:36', 'mehul.cse.1724@iiitbh.ac.in', 'The complaint has been taken into account. If you are still unhappy\r\nwith the condition, please feel free to contact us.');

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
(1000022, 'anuranjan.cse.1713@iiitbh.ac.in', 'Planting tree near our campus', 'academic', 'For a fresh and healthy environment, we should plant \r\ntree near our campuses. This will make surrounding better\r\nand earth healthier.\r\n\r\nwith regards,\r\nAnuranjan Kumar', '2019-11-14 06:02:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `otp` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `password`, `otp`) VALUES
('abhishek.cse.1702@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
('anuranjan.cse.1713@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 1686),
('kumar.cse.1721@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
('kush.ece.1725@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
('pritam.cse.1740@iiitbh.ac.in', '5f4dcc3b5aa765d61d8327deb882cf99', 0);

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
  MODIFY `suggestion_number` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000023;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
