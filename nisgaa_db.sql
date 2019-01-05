-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 09:06 PM
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
(9, 'Entertainment', 'Active'),
(10, 'Media', 'Active'),
(11, 'Holidays', 'Inactive'),
(12, 'Language & Culture', 'Inactive'),
(13, 'News', 'Active'),
(14, 'Announcement', 'Active'),
(15, 'Employment', 'Active'),
(16, 'Activities', 'Active');

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
(24, 'EVNT5828185', 'hit or miss', 'hit or miss', 'I GUESS THEY NEVER MISS HUH', 'Single', '222290', 'sgasg', 2, 1, 35, 'Cancelled'),
(25, 'EVNT2865420', 'hit or miss', 'hit or miss', 'YOU GOTTA BOYFRIEND I BET HE DOESNT KISS YA', 'Continuous', '89978c', 'gasgsh', 2, 1, 36, 'Cancelled'),
(26, 'EVNT4824340', 'hit or miss', 'hit or miss', 'fasd', 'Segmented', '2901ef', 'hasdxvs', 2, 1, 37, 'Cancelled'),
(27, 'EVNT1470911', 'yeet', 'yeet', 'yeet', 'Single', 'b87491', 'yeet', 2, 8, 39, 'Cancelled'),
(28, 'EVNT8264353', 'meeeeeh', 'meeeh', 'mWeeeeeh', 'Single', 'c532a8', 'meeeeh', 2, 12, 41, 'Cancelled'),
(29, 'EVNT8821165', 'ness yeet', 'ness yeet', 'ness yeet!!!!', 'Single', '441097', 'ness yeet', 3, 13, 43, 'Cancelled');

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
(14, '2018-12-31', '2018-12-31', '21:00:00', 24),
(15, '2018-12-31', '2019-01-04', '08:00:00', 25),
(16, '2018-12-31', '2018-12-31', '08:00:00', 26),
(17, '2019-01-02', '2019-01-02', '09:00:00', 26),
(18, '2019-01-04', '2019-01-04', '10:00:00', 26),
(19, '2019-01-02', '2019-01-02', '09:00:00', 27),
(20, '2019-01-09', '2019-01-09', '09:00:00', 28),
(21, '2019-01-03', '2019-01-03', '13:00:00', 29);

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
(9, 'JOB17-594', 5, 'Temporary Elementary Teacher', 'fasdsdg', 1, '2019-01-04', '2019-01-11', 'Part-Time', 'NBES_ART_TEACHER.docx', 'Open'),
(10, 'JOB17-593', 2, 'Heldesk Technician', 'helpdesk', 8, '2019-01-17', '2019-01-25', 'Full-Time', 'NBES_ART_TEACHER.docx', 'Open');

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
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link_id`, `link_name`, `link_type`, `link_tag`, `link_desc`, `link_content`, `user`, `school`, `status`) VALUES
(3, 'LNK6035540', 'Admin Bootstrap', 'Link', 'Quick Links', 'Admin Bootstrap Template', 'file:///Users/rbarrameda/Desktop/AdminBSBMaterialDesign/index.html', 1, 2, 'Active'),
(4, 'LNK3547677', 'Reddit Link', 'Link', 'Quick Links', 'Reddit', 'https://www.reddit.com/', 1, 2, 'Active'),
(5, 'LNK9081475', 'mem', 'File', 'Quick Links', 'meeeeem', '50022172_2388348871194952_7067773816948129792_o.jpg', 1, 2, 'Active'),
(6, 'LNK3399953', 'mwehh', 'Link', 'Quick Links', 'dasfasfas', 'https://www.youtube.com/watch?v=mX0UL6qtDEY', 12, 2, 'Active'),
(7, 'LNK7837962', 'unyuu', 'File', 'Quick Links', 'unyuu', 'Sample.jpg', 12, 2, 'Active'),
(8, 'LNK4242534', 'ness file', 'Link', 'Quick Links', 'nyu', 'https://www.reddit.com/', 13, 3, 'Active'),
(9, 'LNK8539581', 'ness file 2', 'File', 'Quick Links', 'nyuuu', '1200px-722Rowlet.png', 13, 3, 'Inactive');

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
(162, 'LOG4145515', 'Added a new user account for randerson', 1, '2018-12-31 19:23:48'),
(163, 'LOG6988480', 'Modified the user account information for randerson', 1, '2018-12-31 19:24:13'),
(164, 'LOG1918001', 'Disabled the user account for randerson', 1, '2018-12-31 19:24:31'),
(165, 'LOG1885645', 'Reactivated the user account for randerson', 1, '2018-12-31 19:24:42'),
(166, 'LOG5901895', 'Opened a job posting for job ID: JOB17-594', 1, '2018-12-31 19:25:45'),
(167, 'LOG8566360', 'Modified the job posting for job ID: JOB17-594', 1, '2018-12-31 19:26:01'),
(168, 'LOG9818146', 'Modified the job posting for job ID: JOB17-594', 1, '2018-12-31 19:26:20'),
(169, 'LOG6765006', 'Modified the job posting for job ID: JOB17-594', 1, '2018-12-31 19:26:56'),
(170, 'LOG7684931', 'Closed the job posting for job ID:  JOB17-594', 1, '2018-12-31 19:27:13'),
(171, 'LOG1094990', 'Reopened the job posting for job ID: JOB17-594', 1, '2018-12-31 19:27:33'),
(172, 'LOG4466443', 'Created the event: hit or miss', 1, '2018-12-31 19:32:58'),
(173, 'LOG3438156', 'Created the event: hit or miss', 1, '2018-12-31 19:34:36'),
(174, 'LOG2238783', 'Created the event: hit or miss', 1, '2018-12-31 19:35:31'),
(175, 'LOG8507799', 'Cancelled the event:  hit or miss', 1, '2018-12-31 19:36:09'),
(176, 'LOG9708497', 'Modified the event information for event: hit or miss', 1, '2018-12-31 19:45:16'),
(177, 'LOG7957518', 'Modified the event information for event: hit or miss', 1, '2018-12-31 19:45:42'),
(178, 'LOG7473147', 'Created a new category: Entertainment', 1, '2019-01-02 04:35:26'),
(179, 'LOG7981626', 'Created a new category: Media', 1, '2019-01-02 04:35:38'),
(180, 'LOG4968289', 'Created a new category: Holidays', 1, '2019-01-02 04:35:45'),
(181, 'LOG1104030', 'Created a new category: Language & Culture', 1, '2019-01-02 04:35:51'),
(182, 'LOG9990841', 'Created a new category: News', 1, '2019-01-02 04:35:57'),
(183, 'LOG3390116', 'Created a new category: Announcement', 1, '2019-01-02 04:36:10'),
(184, 'LOG6247571', 'Created a new post: PST8485148', 1, '2019-01-02 04:38:58'),
(185, 'LOG2697098', 'Created a new link: LNK6035540', 1, '2019-01-02 05:09:47'),
(186, 'LOG8231770', 'Created a new link: LNK3547677', 1, '2019-01-02 05:12:08'),
(187, 'LOG9592757', 'Created a new link: LNK9081475', 1, '2019-01-02 05:13:02'),
(188, 'LOG1889689', 'Modified link ID: LNK3547677', 1, '2019-01-02 05:14:50'),
(189, 'LOG3980962', 'Disabled link ID: LNK9081475', 1, '2019-01-02 05:15:06'),
(190, 'LOG8689097', 'Edited post ID: New Year\'s Celebration', 1, '2019-01-02 05:19:07'),
(191, 'LOG6542046', 'Archived event post ID: PST3693419', 1, '2019-01-02 05:19:26'),
(192, 'LOG7399851', 'Archived event post ID: PST4378425', 1, '2019-01-02 05:20:01'),
(193, 'LOG4271738', 'Disabled the category Language ', 1, '2019-01-02 05:32:29'),
(194, 'LOG5187507', 'Disabled the category Holidays', 1, '2019-01-02 05:32:38'),
(195, 'LOG5095073', 'Disabled the user account for randerson', 8, '2019-01-02 17:34:03'),
(196, 'LOG1747604', 'Opened a job posting for job ID: JOB17-593', 8, '2019-01-02 17:56:08'),
(197, 'LOG5818054', 'Closed the job posting for job ID:  JOB17-593', 8, '2019-01-02 17:56:30'),
(198, 'LOG6153457', 'Reopened the job posting for job ID: JOB17-593', 8, '2019-01-02 17:56:39'),
(199, 'LOG4948411', 'Created the event: yeet', 8, '2019-01-02 17:58:16'),
(200, 'LOG9970757', 'Cancelled the event:  yeet', 8, '2019-01-02 17:58:58'),
(201, 'LOG8158814', 'Created a new post: PST8731155', 8, '2019-01-02 18:07:02'),
(202, 'LOG2986892', 'Archived post ID: PST8731155', 8, '2019-01-02 18:10:16'),
(203, 'LOG3222092', 'Edited post ID: New Year\'s Celebration', 8, '2019-01-02 18:10:28'),
(204, 'LOG7152173', 'Created a new category: Employment', 8, '2019-01-02 18:13:19'),
(205, 'LOG7576420', 'Disabled the user account for randerson', 12, '2019-01-02 18:15:08'),
(206, 'LOG3566377', 'Created the event: meeeh', 12, '2019-01-02 18:33:49'),
(207, 'LOG7757597', 'Modified the event information for event: meeeh', 12, '2019-01-02 18:34:16'),
(208, 'LOG2873006', 'Cancelled the event:  meeeh', 12, '2019-01-02 18:34:22'),
(209, 'LOG5570490', 'Created a new post: PST2928855', 12, '2019-01-02 18:35:15'),
(210, 'LOG8164119', 'Edited post ID: One Day Event', 12, '2019-01-02 18:35:36'),
(211, 'LOG2028782', 'Archived post ID: PST2928855', 12, '2019-01-02 18:35:53'),
(212, 'LOG9832002', 'Created a new link: LNK3399953', 12, '2019-01-02 18:56:13'),
(213, 'LOG5170722', 'Created a new link: LNK7837962', 12, '2019-01-02 18:56:40'),
(214, 'LOG7894868', 'Reactivated link ID: LNK9081475', 12, '2019-01-02 18:56:53'),
(215, 'LOG7271598', 'Disabled link ID: LNK7837962', 12, '2019-01-02 19:06:21'),
(216, 'LOG9435003', 'Reactivated link ID: LNK7837962', 12, '2019-01-02 19:08:14'),
(217, 'LOG7543985', 'Created a new category: Activities', 12, '2019-01-02 19:08:48'),
(218, 'LOG5322219', 'Created the event: ness yeet', 13, '2019-01-02 19:22:35'),
(219, 'LOG1356800', 'Modified the event information for event: ness yeet', 13, '2019-01-02 19:22:52'),
(220, 'LOG4274467', 'Cancelled the event:  ness yeet', 13, '2019-01-02 19:24:24'),
(221, 'LOG9175321', 'Created a new post: PST6077364', 13, '2019-01-02 19:24:55'),
(222, 'LOG2449311', 'Edited post ID: yeet', 13, '2019-01-02 19:25:07'),
(223, 'LOG9242407', 'Archived post ID: PST6077364', 13, '2019-01-02 19:28:24'),
(224, 'LOG2081993', 'Created a new link: LNK4242534', 13, '2019-01-02 19:31:46'),
(225, 'LOG6837422', 'Created a new link: LNK8539581', 13, '2019-01-02 19:32:31'),
(226, 'LOG5862362', 'Disabled link ID: LNK8539581', 13, '2019-01-02 19:32:42'),
(227, 'LOG9773691', 'Modified link ID: LNK4242534', 13, '2019-01-02 19:32:48'),
(228, 'LOG7753279', 'Edited post ID: ', 1, '2019-01-02 21:44:44'),
(229, 'LOG2667836', 'Edited post ID: ', 1, '2019-01-02 21:45:02'),
(230, 'LOG9672184', 'Edited post ID: New Year\'s Celebration', 1, '2019-01-02 21:46:55');

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
(35, 'PST4378425', 'hit or miss', '2018-12-31', 'Post', 1, 1, '<p>i guess they never miss HUH?????</p>', 'Archived'),
(36, 'PST3693419', 'fsdagsd', '2018-12-31', 'Post', 1, 1, '<p>gasdgasg</p>', 'Archived'),
(37, 'PST8631290', 'hit or miss', '2018-12-31', 'Post', 1, 1, '<p>i guess they never miss HUH???????</p>', 'Archived'),
(38, 'PST8485148', 'New Year\'s Celebration', '2019-01-02', 'Post', 1, 2, '<p><strong>Happy New Year!!! WOOHOO!!! yeet</strong></p>', 'Active'),
(39, 'PST6632585', 'yeet', '2019-01-02', 'Post', 8, 2, '<p>yeet</p>', 'Archived'),
(40, 'PST8731155', 'yeet', '2019-01-02', 'Post', 8, 2, '<p>yeet</p>', 'Archived'),
(41, 'PST5273601', 'MEH', '2019-01-02', 'Post', 12, 2, '<p>WHY U MEH</p>', 'Archived'),
(42, 'PST2928855', 'One Day Event', '2019-01-02', 'Post', 12, 2, '<p>meh! WHY U MEH!</p>', 'Archived'),
(43, 'PST2188509', 'ness yeet', '2019-01-02', 'Post', 13, 3, '<p><strong>ness yeet!!!!</strong></p>', 'Archived'),
(44, 'PST6077364', 'yeet', '2019-01-02', 'Post', 13, 3, '<p>yeet!</p>', 'Archived');

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
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 9),
(39, 38, 11),
(40, 39, 1),
(41, 40, 9),
(42, 41, 1),
(43, 42, 14),
(44, 43, 1),
(45, 44, 15);

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
(3, 'rbarrameda', 'Rugie', 'Barrameda', 'rbarrameda@nisgaa.bc.ca', 'c113241856b03df2f484b48ba241dc5e', 1, 1, '48370297_359221241308829_3758873644231557120_n.jpg', 'Active'),
(8, 'mswinn', 'Martha', 'Swinn', 'mswinn@nisgaa.bc.ca', 'ee784621d80ea57aa8275134cf86c5af', 3, 2, 'user.png', 'Active'),
(9, 'ktanner', 'Kory', 'Tanner', 'ktanner@nisgaa.bc.ca', '9b9bf8517da10e75dc1d05256b6e0583', 1, 2, 'user.png', 'Active'),
(10, 'blaird', 'Bobby', 'Laird', 'blaird@nisgaa.bc.ca', '19c87ad6541da64be544e7e017cf3332', 1, 1, 'user.png', 'Active'),
(11, 'warnold', 'Wolfgang', 'Arnold', 'warnold@nisgaa.bc.ca', '4f24a1018882302ae29e4e61a4b55a57', 1, 1, 'user.png', 'Active'),
(12, 'sgrandison', 'Sharlene', 'Grandison', 'sgrandison@nisgaa.bc.ca', 'b09db052a0e623cf4d5eb69bb3d84312', 2, 2, 'user.png', 'Active'),
(13, 'mcox', 'Marty', 'Cox', 'mcox@nisgaa.bc.ca', 'e7ca3a5a1b0344b2f0feb2e199a25b8e', 4, 3, 'user.png', 'Active'),
(14, 'tmazak', 'Tanya', 'Azak', 'tmazak@nisgaa.bc.ca', '3d50f3136c58ba1feecda909d9aa7388', 4, 5, 'user.png', 'Active'),
(15, 'astewart', 'Alison', 'Stewart', 'astewart@nisgaa.bc.ca', '63eba81b782ccbf2c283fc8d4dc9d293', 4, 4, 'user.png', 'Active'),
(16, 'lrobinson', 'Lavita', 'Robinson', 'lrobinson@nisgaa.bc.ca', '2913ccd8ff6b00198f5bb01604ae984f', 4, 6, 'user.png', 'Active'),
(17, 'cstewart', 'Carey', 'Stewart', 'cstewart@nisgaa.bc.ca', '0959457b5bf792b9a8e83352cfcc5362', 2, 2, 'user.png', 'Active'),
(19, 'randerson', 'Rii', 'Anders', 'randerson@nisgaa.bc.ca', 'c83bda67606474e9052901b36883e30c', 2, 2, 'user.png', 'Active');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `event_days`
--
ALTER TABLE `event_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
