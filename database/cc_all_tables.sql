-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 07:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc`
--
CREATE DATABASE IF NOT EXISTS `cc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cc`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(10) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_body` varchar(10000) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cgten_workshop`
--

CREATE TABLE `cgten_workshop` (
  `cgten_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_address` varchar(200) NOT NULL,
  `student_interest` varchar(100) DEFAULT NULL,
  `other_interest` varchar(50) DEFAULT NULL,
  `workshop_req_date` date NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `workshop_taken_date` date DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='career guidance workshop for 10th class';

-- --------------------------------------------------------

--
-- Table structure for table `cgtwelve_workshop`
--

CREATE TABLE `cgtwelve_workshop` (
  `cgtwelve_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `college_address` varchar(200) NOT NULL,
  `student_interest` varchar(100) DEFAULT NULL,
  `other_interest` varchar(100) DEFAULT NULL,
  `workshop_req_date` date NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `workshop_taken_date` date DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `sys_update_date` timestamp NULL DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='career guidance workshop for 12th class';

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `contact_ no` bigint(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `feedback_type` varchar(50) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `completion_date` datetime DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT 'N -> No,\r\nY- > Yes,\r\nC - >Not needed',
  `created_by` varchar(30) DEFAULT NULL,
  `completed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `first_name`, `last_name`, `contact_ no`, `email`, `feedback_type`, `feedback`, `sys_creation_date`, `completion_date`, `status`, `created_by`, `completed_by`) VALUES
(1, 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Query', 'Sjfhus iosf iweehjk', '2020-04-19 21:04:58', NULL, 'N', '12345678', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `job_id` bigint(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `stream` varchar(20) NOT NULL,
  `percentage` varchar(5) NOT NULL,
  `work_domain` varchar(200) DEFAULT NULL,
  `other_work_domain` varchar(100) DEFAULT NULL,
  `pref_comp_1` varchar(100) DEFAULT NULL,
  `pref_comp_2` varchar(100) DEFAULT NULL,
  `resume_file_name` varchar(100) DEFAULT NULL,
  `linkedin_url` varchar(2083) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `job_offered` char(1) NOT NULL,
  `employer_name` varchar(100) DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT 'N -> not completed,\r\nI -> In process,\r\nC -> Completed,\r\nR -> Rejected',
  `completion_date` datetime DEFAULT NULL,
  `completion_reason` date DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_update`
--

CREATE TABLE `job_update` (
  `job_id` bigint(10) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_type` varchar(20) NOT NULL,
  `employer_name` varchar(50) NOT NULL,
  `job_location` varchar(50) DEFAULT NULL,
  `min_edu_reqd` varchar(100) NOT NULL,
  `speciality` varchar(50) DEFAULT NULL,
  `job_url` varchar(2086) NOT NULL,
  `job_expiry_date` date NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_update`
--

INSERT INTO `job_update` (`job_id`, `job_title`, `job_type`, `employer_name`, `job_location`, `min_edu_reqd`, `speciality`, `job_url`, `job_expiry_date`, `sys_creation_date`, `created_by`) VALUES
(1, 'Associate/Senior Associate -(Technical)', 'Private', 'Wipro DOP', 'PUNE', 'Graduates (Any Stream) with minimum 6 months of experience in customer service ', NULL, 'https://stackoverflow.com/questions/470617/how-do-i-get-the-current-date-and-time-in-php', '2020-04-30', '2020-04-19 22:52:19', 'ccadmin123');

-- --------------------------------------------------------

--
-- Table structure for table `job_workshop`
--

CREATE TABLE `job_workshop` (
  `job_workshop_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `collge_address` varchar(200) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `workshop_req_date` date NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `workshop_taken_date` date DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `contact_ no` bigint(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `completion_date` date DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT 'N -> No,\r\nY- > Yes,\r\nC - >Not needed',
  `created_by` varchar(30) DEFAULT NULL,
  `completed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `first_name`, `last_name`, `contact_ no`, `email`, `service_type`, `query`, `sys_creation_date`, `completion_date`, `status`, `created_by`, `completed_by`) VALUES
(1, 'As', 'Df', 1234567899, 'asff@gmail.com', 'Placement Assistance', 'Placemnn geu  iuf  wiefa i ua ui u ieri', '2020-04-19 21:37:49', NULL, 'N', '12345678', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soft_skill_workshop`
--

CREATE TABLE `soft_skill_workshop` (
  `ss_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `org_address` varchar(200) NOT NULL,
  `workshop_req_date` date NOT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `workshop_taken_date` date DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(160) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` bigint(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `is_admin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `contact_no`, `email`, `sys_creation_date`, `sys_update_date`, `is_admin`) VALUES
(1, '12345678', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 'As', 'Df', 1234567890, 'asdf@gmail.com', '2020-04-19 20:46:20', '2020-04-19 22:15:48', 'N'),
(2, 'ccadmin123', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 'Admin', 'Cc', 987654321, 'admin@cc.com', '2020-04-19 20:52:51', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshop_id` int(10) NOT NULL,
  `workshop_type` varchar(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `org_address` varchar(200) NOT NULL,
  `interested_domain` varchar(200) DEFAULT NULL,
  `other_interested_domain` varchar(100) DEFAULT NULL,
  `workshop_request_date` date NOT NULL,
  `workshop_expectation` varchar(1000) NOT NULL,
  `workshop_taken_date` date DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `completed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshop_id`, `workshop_type`, `first_name`, `last_name`, `contact_no`, `email`, `org_name`, `org_address`, `interested_domain`, `other_interested_domain`, `workshop_request_date`, `workshop_expectation`, `workshop_taken_date`, `sys_creation_date`, `status`, `sys_update_date`, `created_by`, `completed_by`) VALUES
(1, 'Soft Skills', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Ejkghsekj', 'Fsebhghj', NULL, NULL, '2021-05-20', 'qekjhwqir wei hgoise gerhwraiog ho;wiauroijk o34;i4tuoi3hi ;oh;oiyuoi3;uo', NULL, '2020-04-19 22:39:19', 'N', NULL, '12345678', NULL),
(2, 'Class 10', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Kaut Oewigoi', 'Uief Hweiu Wui Hgiwuwgiaug ', 'Arts; Commerce; DiplomaAndCourses; Science; Govt-Sector; Other; ', 'Other Selected', '2020-04-14', 'usefhioesig eig hw;iu awpouoei ugiwj ioeerhg hg.', NULL, '2020-04-19 22:41:50', 'N', NULL, '12345678', NULL),
(3, 'Class 12', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Werfgyuhujkl', 'Dfcghjbwertyuijo', 'Arts; Commerce; Govt-Sector; ', '', '2020-04-09', 'iwqt yow4i i4uo4s t4iouoiy3aiiop', NULL, '2020-04-19 22:43:35', 'N', NULL, '12345678', NULL),
(4, 'Job', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Feaoigpo E', 'Jril Lk Joko; Koeji', 'AgriAndFood', NULL, '2021-05-20', 'kwjrjpow iiogjpweo ierki', NULL, '2020-04-19 22:44:27', 'N', NULL, '12345678', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cgten_workshop`
--
ALTER TABLE `cgten_workshop`
  ADD PRIMARY KEY (`cgten_id`);

--
-- Indexes for table `cgtwelve_workshop`
--
ALTER TABLE `cgtwelve_workshop`
  ADD PRIMARY KEY (`cgtwelve_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_update`
--
ALTER TABLE `job_update`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_workshop`
--
ALTER TABLE `job_workshop`
  ADD PRIMARY KEY (`job_workshop_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `soft_skill_workshop`
--
ALTER TABLE `soft_skill_workshop`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `job_id` bigint(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
