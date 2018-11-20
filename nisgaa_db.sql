-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 12:43 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nisgaa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(5) NOT NULL,
  `job_id` varchar(10) NOT NULL,
  `school` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `job_desc` text NOT NULL,
  `user` int(5) NOT NULL,
  `status` enum('Open','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_id`, `school`, `title`, `job_desc`, `user`, `status`) VALUES
(1, 'JOB17308', 1, 'Computer Systems Specialist', 'Computer Systems Specialist', 8, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `log_id` varchar(13) NOT NULL,
  `log_desc` text NOT NULL,
  `user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `log_id`, `log_desc`, `user`, `date`) VALUES
(23, 'LOG6551094', 'Added a new user account for mswinn', 3, '2018-11-20 21:37:39'),
(24, 'LOG6871830', 'Disabled the user account for mswinn', 3, '2018-11-20 21:39:29'),
(25, 'LOG9928837', 'Reactivated the user account for mswinn', 1, '2018-11-20 21:40:00'),
(26, 'LOG9956977', 'Closed the job posting for job ID:  JOB17308', 8, '2018-11-20 23:37:22'),
(27, 'LOG845617', 'Reopened the job posting for job ID: JOB17308', 8, '2018-11-20 23:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(5) NOT NULL,
  `role_abbv` varchar(10) NOT NULL,
  `role_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_abbv`, `role_desc`) VALUES
(1, 'ADMN13082', 'Administrator'),
(2, 'EDTR15897', 'Editor'),
(3, 'HMNR48051', 'Human Resources Manager');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school_abbv` varchar(10) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_addr` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_abbv`, `school_name`, `school_addr`) VALUES
(1, 'TO', 'Tech Office', NULL),
(2, 'SDO', 'School District Office', '4702 Huwilp Road, PO Box 240, Gitlaxt\'aamiks, British Columbia, Canada V0J 1A0'),
(3, 'NESS', 'Nisga\'a Elementary Secondary School', '5000 Skateen Avenue, PO Box 239, Gitlaxt\'aamiks, British Columbia, Canada V0J 1A0'),
(4, 'AAMES', 'Alvin A. McKay Elementary School', '311 Church St., PO Box 220, Laxgalts\'ap, British Columbia, Canada V0J 1X0'),
(5, 'GES', 'Gitwinksihlkw Elementary School', '3000 Lisims Avenue, PO Box 077, Gitwinksihlkw, British Columbia, Canada V0J 3T0'),
(6, 'NBES', 'Nathan Barton Elementary School', '1310 Volunteer St., Gingolx, British Columbia, Canada V0V 1B0'),
(7, 'MO', 'Maintenance Office', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(5) NOT NULL,
  `school` int(5) DEFAULT NULL,
  `display_picture` text,
  `status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `user_type`, `school`, `display_picture`, `status`) VALUES
(1, 'admin', 'IT', 'Manager', 'itmanager@nisgaa.bc.ca', '9b3fe3b23a3f267b9dedda7a86bfc18d', 1, 1, 'user.png', 'Active'),
(3, 'rbarrameda', 'Rugie', 'Barrameda', 'rbarrameda@nisgaa.bc.ca', 'c113241856b03df2f484b48ba241dc5e', 1, 1, 'user.png', 'Active'),
(8, 'mswinn', 'Martha', 'Swinn', 'mswinn@nisgaa.bc.ca', 'ee784621d80ea57aa8275134cf86c5af', 3, 2, 'user.png', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `school` (`school`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`school`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
