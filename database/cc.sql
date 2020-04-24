-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 11:12 PM
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

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_body`, `sys_creation_date`, `sys_update_date`, `created_by`) VALUES
(2, 'Which are the best and cheapest hosting for WordPress with good resources in India?', 'There are quite a few options for cheap and good web hosting providers for WordPress in India.\r\n\r\nThe question is: how to choose the best one? To do that, we have to put a few factors into consideration. Now, without further ado, let’s start.\r\n\r\nWhen choosing a host, look for the one that has an easy WP installation and quick setup. Remember that not all hosting providers support WordPress.\r\n\r\nThose who want to keep their budget tight should try to look for hosting with prices starting with no higher than ?45/month. Remember that cheap doesn’t mean low-quality.\r\n\r\nYou can enjoy a good quality WordPress website, without spending a lot of money.\r\nFor the best resources, look for hosting providers who offer unlimited bandwidth and MySQL databases on almost all plans, the disk space should be no less than 10GB.\r\n\r\nAs resources depend on what kind of website you want to host, we at Hostinger\r\n\r\nbelieve that you should pay only for what you actually need.\r\n\r\nIt means that you can start with a plan and upgrade your hosting anytime as your website grows.\r\n\r\nThere are more important factors:\r\n\r\n    Uptime. It is crucial for your website to be up and running with as little downtime as possible. Search for providers that have at least 99.9% uptime, because you surely deserve the best!\r\n\r\nKeep in mind that uptime depends not only on a web hosting company but on your setup as well. If your website is running on old platforms, the chances of errors arise. It is recommended that you always upgrade your software to the latest version. Moreover, wrong configuration settings can be a cause of downtime too.\r\n\r\n    Support. Look for a host that has a customer support service and works 24/7/365 to help you make your webmastering journey as smooth as possible! Maybe someday you will need help in the middle of the night, so it is great to have someone to keep you covered. Time is money, so look for support that has a fast response time.\r\n    .in Domains. If you’re considering registering your website with .in TLD, you should know that not all hosting companies sell those. Of course, you can always buy a domain elsewhere, but then you should know how to point it to your host\r\n\r\n.\r\nTutorials. Always check if your host has a tutorial page\r\n\r\n    or a help center available. That way, you can learn by exploring hundreds of helpful tutorials and how-to guides.\r\n    Payment methods. The most popular payment methods for hosting in India are credit/debit cards and PayPal, so your preferable host should have at least one of these options. For example, with Hostinger, you have an option to pay by eight different payment methods including Bitcoin!\r\n    Freebies. Usually, if you tend to buy a more advanced hosting plan for a more extended period, you get a bunch of freebies, including free SSL, a domain, and emails. So, as a result, you get a better plan and you don’t have to pay for additional features.\r\n    30-day money-back guarantee. If you’re not satisfied with hosting services, it is always great to have the possibility to get your money back.\r\n\r\nTo sum up, the amount of resources depends on the type of website you want to host. I believe that you shouldn’t pay for something you don’t even need.\r\n\r\nMost importantly, you, without a doubt, can enjoy good quality hosting with great support, tutorials, freebies, good resources and more without breaking the bank.\r\n\r\nI wish you to find the most suitable and affordable WordPress hosting in India. Good luck!\r\n', '2020-04-22 13:10:38', NULL, 'ccadmin123');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `blog_id` int(10) NOT NULL,
  `blog_comment_id` int(10) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `commented_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`blog_id`, `blog_comment_id`, `comment`, `sys_creation_date`, `commented_by`) VALUES
(2, 1, ' nice', '2020-04-22 13:10:59', 'ccadmin123'),
(2, 2, 'bvbv', '2020-04-22 13:24:32', ''),
(2, 3, 'jkshg oirhjr', '2020-04-23 21:51:14', 'ccadmin123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `contact_no` bigint(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `feedback_type` varchar(50) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `completion_date` datetime DEFAULT NULL,
  `completion_comments` varchar(500) DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT 'N -> No,\r\nY- > Yes,\r\nC - >Not needed',
  `created_by` varchar(30) DEFAULT NULL,
  `completed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `first_name`, `last_name`, `contact_no`, `email`, `feedback_type`, `query`, `sys_creation_date`, `completion_date`, `completion_comments`, `status`, `created_by`, `completed_by`) VALUES
(1, 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Query', 'Sjfhus iosf iweehjk', '2020-04-19 21:04:58', '2020-04-23 11:42:14', 'Astr', 'Y', '12345678', 'ccadmin123'),
(2, 'Sfjkj', 'Jkdnk', 2222222222, 'jdkgjlkd@gmail.com', 'Query', 'F,.ms.,smf.d,gmdxlbxfkklfjm,fxb', '2020-04-23 01:49:52', NULL, NULL, 'N', 'ccadmin123', NULL);

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
  `job_url` varchar(2086) NOT NULL,
  `job_expiry_date` date NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_update`
--

INSERT INTO `job_update` (`job_id`, `job_title`, `job_type`, `employer_name`, `job_location`, `min_edu_reqd`, `job_url`, `job_expiry_date`, `sys_creation_date`, `created_by`) VALUES
(1, 'Associate/Senior Associate -(Technical)', 'Private', 'Wipro DOP', 'PUNE', 'Graduates (Any Stream) with minimum 6 months of experience in customer service ', 'https://stackoverflow.com/questions/470617/how-do-i-get-the-current-date-and-time-in-php', '2020-04-30', '2020-04-19 22:52:19', 'ccadmin123'),
(2, 'Khfkeh', 'Govt', 'Kldgmlsdk', 'M,fnb,fm', 'mfxnbf,m', 'https://fontawesome.com/icons?d=gallery', '2020-04-23', '2020-04-22 23:48:53', 'ccadmin123'),
(3, 'Ejgskjjlkrjl', 'Govt', 'Fm,sgnlkds', 'Dsmnbd,m', 'msd s,mn,', 'https://fontawesome.com/icons?d=gallery', '2020-04-21', '2020-04-22 23:51:29', 'ccadmin123'),
(4, 'Technical Officer, Technician, DEO & MTS – 117 Pos', 'Private', 'NICPR', '', '0th Class, 12th Class, DMLT, B,Sc, PG (Relevant Discipline)  Read more: Latest Government Jobs Notif', 'http://www.freejobalert.com/nicpr/529463/', '2020-04-30', '2020-04-22 23:53:52', 'ccadmin123');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `contact_no` bigint(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `query` varchar(1000) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `completion_date` datetime DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT 'N -> No,\r\nY- > Yes,\r\nC - >Not needed',
  `completion_comments` varchar(500) DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `completed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `first_name`, `last_name`, `contact_no`, `email`, `service_type`, `query`, `sys_creation_date`, `completion_date`, `status`, `completion_comments`, `created_by`, `completed_by`) VALUES
(1, 'As', 'Df', 1234567899, 'asff@gmail.com', 'Placement Assistance', 'Placemnn geu  iuf  wiefa i ua ui u ieri', '2020-04-19 21:37:49', '2020-04-23 03:08:50', 'Y', 'Jkefeisg jwepogipwoi', '12345678', 'ccadmin123'),
(2, 'Casufhi', 'Jkgehkj', 4444444444, 'jkvnk@ghmak.com', 'Placement Assistance', 'SNKFhcszlkjdgjsdlkglksd;d;', '2020-04-23 02:13:57', '2020-04-23 03:09:26', 'Y', 'Done fudhg', 'ccadmin123', 'ccadmin123'),
(3, 'Chetn', 'Pasa', 8888888888, 'bhcdd@gmail.com', 'Competitive Exam', 'This ifd eio eijg peo j', '2020-04-23 02:45:34', NULL, 'N', NULL, 'ccadmin123', NULL);

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
  `email` varchar(50) NOT NULL,
  `sys_creation_date` datetime NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `is_admin` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `contact_no`, `email`, `sys_creation_date`, `sys_update_date`, `is_admin`) VALUES
(1, '12345678', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 'As', 'Df', 1234567890, 'asdf@gmail.com', '2020-04-19 20:46:20', '2020-04-19 22:15:48', 'N'),
(2, 'ccadmin123', '03072df361cf6a6dbc90a41ae19badc47ca2f079', 'Career', 'Configure', 987654321, 'chetanpawar968@gmail.com', '2020-04-19 20:52:51', '2020-04-24 02:40:45', 'Y');

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
  `workshop_taken_by` varchar(30) DEFAULT NULL,
  `sys_creation_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `sys_update_date` datetime DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `completed_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshop_id`, `workshop_type`, `first_name`, `last_name`, `contact_no`, `email`, `org_name`, `org_address`, `interested_domain`, `other_interested_domain`, `workshop_request_date`, `workshop_expectation`, `workshop_taken_date`, `workshop_taken_by`, `sys_creation_date`, `status`, `sys_update_date`, `created_by`, `completed_by`) VALUES
(1, 'Soft Skills', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Ejkghsekj', 'Fsebhghj', NULL, NULL, '2021-05-20', 'qekjhwqir wei hgoise gerhwraiog ho;wiauroijk o34;i4tuoi3hi ;oh;oiyuoi3;uo', NULL, NULL, '2020-04-19 22:39:19', 'N', NULL, '12345678', NULL),
(2, 'Class 10', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Kaut Oewigoi', 'Uief Hweiu Wui Hgiwuwgiaug ', 'Arts; Commerce; DiplomaAndCourses; Science; Govt-Sector; Other; ', 'Other Selected', '2020-04-30', 'usefhioesig eig hw;iu awpouoei ugiwj ioeerhg hg.', '0000-00-00', '', '2020-04-19 22:41:50', 'N', '2020-04-23 02:01:16', '12345678', 'ccadmin123'),
(3, 'Class 12', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Werfgyuhujkl', 'Dfcghjbwertyuijo', 'Arts; Commerce; Govt-Sector; ', '', '2020-04-09', 'iwqt yow4i i4uo4s t4iouoiy3aiiop', '2020-04-30', 'Jfhsdkj Dkjg', '2020-04-19 22:43:35', 'Y', '2020-04-23 00:57:37', '12345678', 'ccadmin123'),
(4, 'Job', 'As', 'Df', 1234567890, 'asdf@gmail.com', 'Feaoigpo E', 'Jril Lk Joko; Koeji', 'AgriAndFood', NULL, '2021-05-20', 'kwjrjpow iiogjpweo ierki', NULL, NULL, '2020-04-19 22:44:27', 'N', NULL, '12345678', NULL),
(5, 'Job', 'Vjkdnv', 'Dxfcgv', 1234567890, 'ajkfhekg@gmail.com', 'Feaoigpo E;f.', 'Jril Lk Joko; Koejivd,bd', 'Aerospace Engineering', NULL, '2021-05-24', 'jkfsehk jw4oipow4iw o', NULL, NULL, '2020-04-23 01:21:34', 'C', NULL, 'ccadmin123', NULL),
(6, 'Soft Skills', 'Sjfk', 'Kjek', 1111111111, 'asdsgrdhf@gmail.com', 'Ejkghsekjgsgh', 'Dd,b.f.nn.n,.fd/n,/f', NULL, NULL, '0000-00-00', 'tyfy uyyiuliik', '2020-04-22', 'Aaaaaaaaaaaaa', '2020-04-23 01:23:30', 'Y', '2020-04-23 02:04:02', 'ccadmin123', 'ccadmin123'),
(7, 'Soft Skills', 'Hghj', 'Jkhkj', 3333333333, 'gcjhzsj@gmail.com', 'Jkjlkjlkjl', 'Hbhbkjjlkjl', NULL, NULL, '0000-00-00', 'jkwafelk jweogkwe g;', '2020-04-23', 'F Yuy Guygu', '2020-04-23 02:06:47', 'Y', '2020-04-23 02:08:20', 'ccadmin123', 'ccadmin123'),
(8, 'Soft Skills', 'Fghh', 'Hjjh', 6666666666, 'djsakfh@bdnv.com', 'Fghbjnkm,l', 'Gvbhjnm,', NULL, NULL, '2020-03-24', 's v,sdmgsde,s', NULL, NULL, '2020-04-23 03:12:47', 'N', NULL, 'ccadmin123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`blog_id`,`blog_comment_id`);

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
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
