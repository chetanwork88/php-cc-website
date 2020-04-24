-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 08:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc`
--

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
  `completion_reason` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`job_id`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `contact_no`, `email`, `qualification`, `stream`, `percentage`, `work_domain`, `other_work_domain`, `pref_comp_1`, `pref_comp_2`, `resume_file_name`, `linkedin_url`, `creation_date`, `job_offered`, `employer_name`, `status`, `completion_date`, `completion_reason`) VALUES
(1, 'Wesdrfgh', '', 'Fcgvhbn', 'M', '2020-04-15', 1234567890, 'asdfghjkl@asd.sdff', 'ITI', 'sdfgh', '22.22', '', NULL, '', '', 'Wesdrfgh_Fcgvhbn_20200412225132.pdf', '', '2020-04-12 22:51:32', 'N', NULL, 'N', NULL, NULL),
(2, 'Awsedfgh', 'Cfgvhbjnk', 'Gvhbjn', 'M', '2020-04-28', 1234567890, 'asdfghjkl@asd.sdff', 'ME', 'sdfgh', '1.22', '', NULL, '', '', 'Awsedfgh_Cfgvhbjnk_Gvhbjn_20200412230448.pdf', '', '2020-04-12 23:04:48', 'N', NULL, 'N', NULL, NULL),
(3, 'Wsedrftgyhuj', 'Dfghjk', 'Dfghjk', 'M', '2020-04-29', 1234567890, 'asdfghjkl@asd.sdff', 'ME', 'sdfghjk', '1.25', 'Automobile; Chemical; Civil; Electrical; Electronics; IT; Mechanical; SalesAndMarketing; Other; ', NULL, 'wakjfh iuwf ui w', 'dywafdwy iiu oifyi', 'Wsedrftgyhuj_Dfghjk_Dfghjk_20200412230736.pdf', 'https://www.w3schools.com/bootstrap4/bootstrap_forms_custom.asp', '2020-04-12 23:07:36', 'N', NULL, 'N', NULL, NULL),
(4, 'Chetan', '', 'Pawar', 'M', '2020-04-14', 987654321, '09876543@gamil.com', '10', 'Comp', '22.22', 'Electronics; IT; ', 'jdskvhjksd', 'vjksehkj', 'jnfds,kj', 'Chetan_Pawar_20200412231447.pdf', '', '2020-04-12 23:14:47', 'N', NULL, 'N', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `job_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
