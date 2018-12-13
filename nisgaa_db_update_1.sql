-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 09:16 PM
-- Server version: 8.0.12
-- PHP Version: 7.3.0

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `cat_desc` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_desc`, `status`) VALUES
(1, 'Event', 'Active'),
(2, 'News', 'Active'),
(3, 'Entertainment', 'Active'),
(4, 'Holidays', 'Active'),
(5, 'Language & Culture', 'Active'),
(6, 'Achievements', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(7) NOT NULL,
  `event_id` varchar(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_shortname` varchar(255) NOT NULL,
  `event_desc` text NOT NULL,
  `event_type` enum('Single','Continuous','Segmented') NOT NULL,
  `event_color_code` varchar(9) NOT NULL,
  `event_location` text,
  `school` int(5) NOT NULL,
  `user` int(5) NOT NULL,
  `post` int(11) DEFAULT NULL,
  `status` enum('Active','Cancelled','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_id`, `event_name`, `event_shortname`, `event_desc`, `event_type`, `event_color_code`, `event_location`, `school`, `user`, `post`, `status`) VALUES
(19, 'EVNT9980257', 'One Day Event', 'One day', 'A one day event', 'Single', '524feb', 'Tech Office', 1, 3, 20, 'Cancelled'),
(20, 'EVNT4281753', 'A Continuous Event', 'Continuous', 'A continuous event, lasting for 2 days or more', 'Continuous', 'bb9365', 'Tech Office', 1, 3, 21, 'Active'),
(21, 'EVNT9637469', 'A segmented event', 'Segmented', 'An event that last for a couple of days, but non-consecutively', 'Segmented', '1d961f', 'Tech Office', 1, 3, 22, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_days`
--

CREATE TABLE `event_days` (
  `id` int(11) NOT NULL,
  `event_date_day_start` date NOT NULL,
  `event_date_day_end` date NOT NULL,
  `event_date_time` time NOT NULL,
  `event` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_days`
--

INSERT INTO `event_days` (`id`, `event_date_day_start`, `event_date_day_end`, `event_date_time`, `event`) VALUES
(7, '2018-12-15', '2018-12-15', '16:00:00', 19),
(8, '2018-12-19', '2018-12-25', '17:00:00', 20),
(9, '2018-12-27', '2018-12-27', '14:00:00', 21),
(10, '2018-12-31', '2018-12-31', '03:00:00', 21),
(11, '2019-01-03', '2019-01-03', '17:00:00', 21);

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
  `open_date` date DEFAULT NULL,
  `close_date` date DEFAULT NULL,
  `job_type` enum('Full-Time','Part-Time','Casual','Remote','Seasonal') NOT NULL,
  `file` text NOT NULL,
  `status` enum('Open','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_id`, `school`, `title`, `job_desc`, `user`, `open_date`, `close_date`, `job_type`, `file`, `status`) VALUES
(7, 'JOB17-598', 5, 'Temporary Nisga\'a Language Teacher (GES)', 'School District No. 92 (Nisga\'a) invites applications for a K-7 Nisga\'a Language teacher. This is a temporary, full-time position starting as soon as possible and lasting until June 28, 2019.', 3, '2018-12-17', '2019-06-28', 'Full-Time', 'GES Temporary Language Teacher.docx', 'Open'),
(8, 'JOB17-599', 6, 'Temporary Nisga’a Arts Teacher', 'School District No. 92 (Nisga’a) invites applications for a K-7 Nisga’a Arts teacher. This is a temporary, half-time (.5) position starting as soon as possible and lasting until June 28, 2019.', 1, '2018-12-21', '2019-06-28', 'Part-Time', 'NBES_ART_TEACHER.docx', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `link_id` varchar(10) NOT NULL,
  `link_name` varchar(255) NOT NULL,
  `link_type` enum('File','Link') NOT NULL,
  `link_tag` enum('Quick Links','Finance','Learning Resources','Teacher Resources','Web Media Resources') NOT NULL,
  `link_desc` text NOT NULL,
  `link_content` text NOT NULL,
  `user` int(5) NOT NULL,
  `school` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(115, 'LOG4224757', 'Created the event: One day', 3, '2018-12-13 18:01:44'),
(116, 'LOG4250667', 'Created the event: Continuous', 3, '2018-12-13 18:04:42'),
(117, 'LOG3884175', 'Created the event: Segmented', 3, '2018-12-13 18:07:09'),
(118, 'LOG4273260', 'Cancelled the event:  One day', 3, '2018-12-13 18:08:51'),
(119, 'LOG7275079', 'Modified the event information for event ID: EVNT4281753', 3, '2018-12-13 18:11:06'),
(120, 'LOG3515362', 'Modified the user display image for rbarrameda', 3, '2018-12-13 18:12:19'),
(121, 'LOG7051486', 'Modified the user account password for rbarrameda', 3, '2018-12-13 18:16:15'),
(122, 'LOG5172092', 'Modified the user account password for rbarrameda', 3, '2018-12-13 18:16:53'),
(123, 'LOG6635656', 'Disabled the user account for cstewart', 3, '2018-12-13 18:17:12'),
(124, 'LOG4995619', 'Reactivated the user account for cstewart', 3, '2018-12-13 18:17:18'),
(125, 'LOG5236169', 'Added a new user account for randerson', 3, '2018-12-13 18:37:35'),
(127, 'LOG7941489', 'Opened a job posting for job ID: JOB17-599', 1, '2018-12-13 19:19:51'),
(128, 'LOG8942664', 'Modified the job posting for job ID: JOB17-599', 1, '2018-12-13 19:21:24'),
(129, 'LOG6877157', 'Modified the job posting for job ID: JOB17-599', 1, '2018-12-13 19:21:44'),
(130, 'LOG5430814', 'Closed the job posting for job ID:  JOB17-599', 1, '2018-12-13 19:21:59'),
(131, 'LOG5776878', 'Reopened the job posting for job ID: JOB17-599', 8, '2018-12-13 19:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_id` varchar(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_type` enum('Post','Media') NOT NULL,
  `post_author` int(5) NOT NULL,
  `post_school` int(11) NOT NULL,
  `post_text` longtext NOT NULL,
  `status` enum('Active','Archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `post_title`, `post_date`, `post_type`, `post_author`, `post_school`, `post_text`, `status`) VALUES
(20, 'PST3913102', 'A One Day Event', '2018-12-13', 'Post', 3, 1, '<p><strong>To test if one day events can be created with no issues. You\'re all invite!</strong></p>', 'Archived'),
(21, 'PST1534092', 'A Continuous Event', '2018-12-13', 'Post', 3, 1, '<p><strong>An event that will last for a couple of days. You\'re all invited!</strong></p>', 'Active'),
(22, 'PST4640900', 'A Segmented Event', '2018-12-13', 'Post', 3, 1, '<p><span style=\"font-size: 12pt;\"><strong>An event that lasts for a couple of days, but non-consecutively. You\'re all invited!</strong></span></p>', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `cat_id`) VALUES
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 22, 2);

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
(3, 'HMNR48051', 'Human Resources Manager'),
(4, 'SREP79524', 'School Administrator Representative');

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
(7, 'MO', 'Maintenance Office', NULL),
(8, 'DW', 'District-Wide', NULL);

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
(3, 'rbarrameda', 'Rugie', 'Narciso', 'rbarrameda@nisgaa.bc.ca', 'c113241856b03df2f484b48ba241dc5e', 1, 1, '48370297_359221241308829_3758873644231557120_n.jpg', 'Active'),
(8, 'mswinn', 'Martha', 'Swinn', 'mswinn@nisgaa.bc.ca', 'ee784621d80ea57aa8275134cf86c5af', 3, 2, 'user.png', 'Active'),
(9, 'ktanner', 'Kory', 'Tanner', 'ktanner@nisgaa.bc.ca', '9b9bf8517da10e75dc1d05256b6e0583', 1, 2, 'user.png', 'Active'),
(10, 'blaird', 'Bobby', 'Laird', 'blaird@nisgaa.bc.ca', '19c87ad6541da64be544e7e017cf3332', 1, 1, 'user.png', 'Active'),
(11, 'warnold', 'Wolfgang', 'Arnold', 'warnold@nisgaa.bc.ca', '4f24a1018882302ae29e4e61a4b55a57', 1, 1, 'user.png', 'Active'),
(12, 'sgrandison', 'Sharlene', 'Grandison', 'sgrandison@nisgaa.bc.ca', 'b09db052a0e623cf4d5eb69bb3d84312', 2, 2, 'user.png', 'Active'),
(13, 'mcox', 'Marty', 'Cox', 'mcox@nisgaa.bc.ca', 'e7ca3a5a1b0344b2f0feb2e199a25b8e', 4, 3, 'user.png', 'Active'),
(14, 'tmazak', 'Tanya', 'Azak', 'tmazak@nisgaa.bc.ca', '3d50f3136c58ba1feecda909d9aa7388', 4, 5, 'user.png', 'Active'),
(15, 'astewart', 'Alison', 'Stewart', 'astewart@nisgaa.bc.ca', '63eba81b782ccbf2c283fc8d4dc9d293', 4, 4, 'user.png', 'Active'),
(16, 'lrobinson', 'Lavita', 'Robinson', 'lrobinson@nisgaa.bc.ca', '2913ccd8ff6b00198f5bb01604ae984f', 4, 6, 'user.png', 'Active'),
(17, 'cstewart', 'Carey', 'Stewart', 'cstewart@nisgaa.bc.ca', '0959457b5bf792b9a8e83352cfcc5362', 2, 2, 'user.png', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`,`user`),
  ADD KEY `user` (`user`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `event_days`
--
ALTER TABLE `event_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event` (`event`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school` (`school`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`,`school`),
  ADD KEY `school` (`school`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `post_school` (`post_school`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `event_days`
--
ALTER TABLE `event_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`post`) REFERENCES `posts` (`id`);

--
-- Constraints for table `event_days`
--
ALTER TABLE `event_days`
  ADD CONSTRAINT `event_days_ibfk_1` FOREIGN KEY (`event`) REFERENCES `events` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`school`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `links_ibfk_2` FOREIGN KEY (`school`) REFERENCES `schools` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_school`) REFERENCES `schools` (`id`);

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

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
