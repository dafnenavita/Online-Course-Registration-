-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2018 at 02:30 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `major` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`course_id`, `course_name`, `major`) VALUES
(6301, 'Statistical Methods for data sciences', 'Math'),
(6302, 'DAA', 'CS'),
(6303, 'WPL', 'CS'),
(6304, 'R For Data Science', 'CS'),
(6305, 'Telecommunication Networks', 'CS'),
(6306, 'DAA', 'CS'),
(6309, 'Telecommunication', 'CS'),
(6310, 'Machine Learning', 'CS'),
(6311, 'R for Data Science', 'CS'),
(6312, 'Database Design', 'CS'),
(6317, 'R For Data Science', 'CS'),
(6318, 'Operating Systems', 'CS'),
(6342, 'Artificial Intelligence', 'CS'),
(6345, 'Machine Learning', 'CS'),
(6346, 'Web Programming Languages', 'CS'),
(6347, 'Stats for data science', 'CS'),
(6348, 'R For Data Science', 'CS'),
(6350, 'Artificial Intelligence', 'CS'),
(6355, 'Big Data', 'CS'),
(6395, 'Semantic Web', 'CS'),
(6396, 'Telecommunication Networks', 'CS'),
(6397, 'Algorithms', 'CS'),
(6398, 'Web Programming Languages', 'CS'),
(6399, 'Database Design', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(5) NOT NULL,
  `course_id` int(10) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `prof_name` varchar(20) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `availability` int(4) NOT NULL DEFAULT '20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `course_id`, `semester`, `year`, `prof_name`, `flag`, `availability`) VALUES
(2, 6301, 'Fall', 2017, 'Pankaj Choudary', 0, 23),
(3, 6302, 'Fall', 2018, 'Chandrasekharan', 0, 24),
(4, 6303, 'Spring', 2017, 'Nurcan Yuruk', 0, 20),
(5, 6302, 'Spring', 2017, 'Chandrasekhar', 0, 20),
(7, 6310, 'Spring', 2018, 'Anurag Nagar', 0, 22),
(8, 6311, 'Spring', 2018, 'William Semper', 0, 19),
(9, 6312, 'Spring', 2018, 'Chris Davis', 0, 18),
(14, 6342, 'Fall', 2018, 'Richard Min', 1, 19),
(24, 6355, 'Spring', 2018, 'Latifur Khan', 0, 19),
(25, 6317, 'Fall', 2018, 'William Semper', 0, 18),
(26, 6318, 'Fall', 2018, 'Bill', 0, 18),
(27, 6309, 'Fall', 2018, 'Brunette', 0, 18),
(34, 6346, 'Fall', 2017, 'Nurcan Yuruk', 0, 20),
(35, 6347, 'Fall', 2017, 'Semper', 0, 20),
(36, 6348, 'Fall', 2017, 'Semper', 0, 20),
(37, 6301, 'Summer', 2018, 'Chris Davis', 0, 20),
(38, 6302, 'Summer', 2018, 'Nurcan Yuruk', 0, 20),
(39, 6303, 'Summer', 2018, 'Bill Semper', 0, 19),
(40, 6304, 'Summer', 2018, 'Bill Semper', 0, 19),
(41, 6305, 'Summer', 2018, 'Sergey', 0, 19),
(42, 6306, 'Summer', 2018, 'Sergey Brin', 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_id`, `course_id`, `semester`, `year`, `flag`) VALUES
(1, 6310, 'Spring', 2018, 1),
(1, 6311, 'Spring', 2018, 1),
(1, 6312, 'Spring', 2018, 1),
(2, 6302, 'Fall', 2018, 1),
(2, 6309, 'Fall', 2018, 0),
(2, 6311, 'Spring', 2018, 1),
(2, 6312, 'Spring', 2018, 0),
(2, 6317, 'Fall', 2018, 0),
(2, 6318, 'Fall', 2018, 0),
(2, 6342, 'Fall', 2018, 0),
(2, 6355, 'Spring', 2018, 0),
(9, 6301, 'Fall', 2017, 0),
(9, 6302, 'Fall', 2018, 0),
(9, 6309, 'Fall', 2018, 0),
(9, 6317, 'Fall', 2018, 0),
(9, 6318, 'Fall', 2018, 0),
(9, 6342, 'Fall', 2018, 0),
(10, 6301, 'Fall', 2017, 0),
(10, 6302, 'Fall', 2018, 1),
(10, 6303, 'Summer', 2018, 0),
(10, 6304, 'Summer', 2018, 0),
(10, 6305, 'Summer', 2018, 0),
(10, 6306, 'Summer', 2018, 0),
(10, 6309, 'Fall', 2018, 1),
(10, 6310, 'Spring', 2018, 0),
(10, 6311, 'Spring', 2018, 0),
(10, 6312, 'Spring', 2018, 0),
(10, 6317, 'Fall', 2018, 1),
(10, 6318, 'Fall', 2018, 1),
(10, 6342, 'Fall', 2018, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `name`, `email`) VALUES
(1, 'pooja', 'pooja1@gmail.com'),
(2, 'dafne', 'dafne@gmail.com'),
(3, 'priya', 'priya@gmail.com'),
(6, 'varun', 'varun@gmail.com'),
(7, 'David', 'david@gmail.com'),
(8, 'Joseph', 'joseph@gmail.com'),
(9, 'Swarna', 'swarna@gmail.com'),
(10, 'Manju', 'manju@gmail.com'),
(11, 'Sanjana', 'sanjana@gmail.com'),
(12, 'Navita', 'navita@gmail.com'),
(13, 'Meera', 'meera@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_authentication`
--

CREATE TABLE `user_authentication` (
  `user_email_id` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authentication`
--

INSERT INTO `user_authentication` (`user_email_id`, `password`, `admin_flag`) VALUES
('admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
('dafne@gmail.com', '139acbb1819d5491a75f4ee1194a27ff', 0),
('david@gmail.com', '889211b122daa7f9f917d3d3b3475514', 0),
('ghgh@ghghgh', '12c11bc1c24a96dcc9912eea1884309f', 0),
('joseph@gmail.com', '97c8374861d04dd333852eb18fc28793', 0),
('kjkjkj@gmail.com', 'a0b35d576997991fca7215c135a352d6', 0),
('manju@gmail.com', 'c0aecb366d9ce7e998bc31fcf353df38', 0),
('meera@gmail.com', 'f39db19ca0e515862de7c6b6a8d2c696', 0),
('navita@gmail.com', '42f5df694129ac56ba0aa23c7c810433', 0),
('pooja1@gmail.com', '9cbb6aebcf5ae14a9248b4c08165212e', 0),
('priya@gmail.com', '0b1c8bc395a9588a79cd3c191c22a6b4', 0),
('sanjana@gmail.com', 'c0dea58bee03d9ef48fad3d4ae0efc18', 0),
('swarna@gmail.com', '43d1f9ce4dca16627b9ca6265401a295', 0),
('varun@gmail.com', '525f31b2fb25d5affbeeaa73f8595d3e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_id`,`course_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user_authentication`
--
ALTER TABLE `user_authentication`
  ADD PRIMARY KEY (`user_email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
