-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2023 at 10:19 PM
-- Server version: 8.0.33-0ubuntu0.22.10.2
-- PHP Version: 8.1.7-1ubuntu3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barabar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `status` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `sw_password` varchar(255) NOT NULL,
  `app_icon` varchar(255) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `contact_us` text NOT NULL,
  `minimum_amount` int NOT NULL,
  `fcm` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `loged_in` varchar(255) NOT NULL DEFAULT '1',
  `date_of_birth` date NOT NULL,
  `pincode` int NOT NULL,
  `gender` varchar(255) NOT NULL,
  `occupation_id` int NOT NULL,
  `education_id` int NOT NULL,
  `hobby_id` int NOT NULL,
  `heard_about_us_id` int NOT NULL,
  `area_of_interest_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `email_id`, `permissions`, `role`, `status`, `password`, `sw_password`, `app_icon`, `app_name`, `terms`, `contact_us`, `minimum_amount`, `fcm`, `created_date`, `updated_date`, `isDeleted`, `loged_in`, `date_of_birth`, `pincode`, `gender`, `occupation_id`, `education_id`, `hobby_id`, `heard_about_us_id`, `area_of_interest_id`) VALUES
(1, 'Super 1234', 'Admin', 'admin@gmail.com', '', 0, 1, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'logo.png', 'Bikk\'s Bikaner Sweets and Fastfood', '<h1>Terms and Conditions</h1>\r\n\r\n<p>&nbsp;</p>\r\n', '<h2><strong>Welcome In Bikk&#39;s Bikaner Sweets and Fastfood</strong></h2>\r\n\r\n<p>If you face any Problem Please Call us&nbsp; -</p>\r\n\r\n<p>Or Whatsapp US -</p>\r\n\r\n<p>Or Mail Us -&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Powered By&nbsp; www.androappstech.com</p>\r\n\r\n<p>info@androappstech.com</p>\r\n', 50, 'dB84lZUggSM:APA91bErIUYuHZtWvIop6mVqeqDxNlGkwL71Bhq5cUw3hLjleEppW0R3fuvfk2bvooYSCE8QsBx67Y6l7DSV7-d9gVN2RhNvfgEmQZQ5XSCu5RfjL4LV0DLXMY5CsNQS-pfKKGmVUpe5', '2020-02-02 19:10:54', '2020-04-26 08:47:52', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(19, 'Ninad', 'Pawar', 'ninad@gmail.com', '', 2, 1, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'logo.png', 'Bikk\'s Bikaner Sweets and Fastfood', '<h1>Terms and Conditions</h1>\r\n\r\n<p>&nbsp;</p>\r\n', '<h2><strong>Welcome In Bikk&#39;s Bikaner Sweets and Fastfood</strong></h2>\r\n\r\n<p>If you face any Problem Please Call us&nbsp; -</p>\r\n\r\n<p>Or Whatsapp US -</p>\r\n\r\n<p>Or Mail Us -&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Powered By&nbsp; www.androappstech.com</p>\r\n\r\n<p>info@androappstech.com</p>\r\n', 50, 'dB84lZUggSM:APA91bErIUYuHZtWvIop6mVqeqDxNlGkwL71Bhq5cUw3hLjleEppW0R3fuvfk2bvooYSCE8QsBx67Y6l7DSV7-d9gVN2RhNvfgEmQZQ5XSCu5RfjL4LV0DLXMY5CsNQS-pfKKGmVUpe5', '2020-02-02 19:10:54', '2020-04-26 08:47:52', 0, '1', '2000-02-23', 499986, 'female', 7, 6, 5, 5, 5),
(20, 'swati', 'Karande', 'swati@gmail.com', '', 2, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-12 08:19:13', '2023-07-12 08:20:01', 0, '1', '1999-12-31', 343540, 'female', 7, 1, 4, 6, 2),
(21, 'Shruti', '', 'shruti@gmail.com', 'BANNER_PER,USERS_PER,CREATOR_PER', 1, 1, '12345', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 0, '', '2023-07-12 10:14:50', '2023-07-12 10:14:50', 1, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(22, 'Kiran', '', 'kiran@gmail.com', '', 1, 0, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-12 10:16:13', '2023-07-12 10:16:13', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(23, 'Nivya', '', 'nivya@gmail.com', '', 1, 0, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-12 10:17:06', '2023-07-12 10:17:06', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(24, 'Ravi1', ' More', 'ravi@gmail.com', '', 2, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-13 09:30:19', '2023-07-13 09:36:41', 1, '1', '1998-02-12', 4000789, 'female', 0, 3, 0, 3, 5),
(25, 'Nisha', '', 'nisha@gmail.com', 'USERS_PER,OUR_COURSE_PER,CREATOR_COURSE_PER', 1, 0, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-13 09:55:10', '2023-07-13 09:55:10', 1, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(26, 'Vidya', '', 'vidya@gmail.com', 'OUR_COURSE_PER,CREATOR_PER,MANAGER_PER', 1, 1, '1234', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 0, '', '2023-07-13 09:57:49', '2023-07-13 09:57:49', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(27, 'faizan1', '', 'faizan@gmail.com', 'USERS_PER,OUR_COURSE_PER,MANAGER_PER,SETTING_PER', 1, 1, '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', 0, '', '2023-07-14 11:17:31', '2023-07-14 11:17:31', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(28, 'test', 'test', 'test@gmail.com', '', 2, 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '', '', 0, '', '2023-07-14 12:03:21', '2023-07-14 12:03:21', 1, '1', '2023-07-14', 400043, 'male', 5, 6, 4, 6, 3),
(29, 'Sumi', 'kamble', 'sumi@gmail.com', '', 2, 0, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-17 06:48:06', '2023-07-17 06:48:06', 1, '1', '2000-02-03', 243242, 'female', 0, 1, 0, 6, 6),
(30, 'Anisha', '', 'anisha@gmail.com', 'USERS_PER,CREATOR_PER,MANAGER_PER', 1, 1, '12345', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', 0, '', '2023-07-17 07:19:45', '2023-07-17 07:19:45', 1, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(31, 'Ninad', 'pawar', 'ninad12453@gmail.com', '', 2, 1, '123', '202cb962ac59075b964b07152d234b70', '', '', '', '', 0, '', '2023-07-17 10:24:36', '2023-07-29 05:38:43', 0, '1', '2023-07-24', 123456, 'male', 0, 3, 0, 1, 4),
(32, 'Ravi', '', 'ravi@gmail.com', 'COURSE_APPRO_PER,OUR_COURSE_PER,CREATOR_COURSE_PER', 1, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-26 09:39:30', '2023-07-26 09:39:30', 1, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(33, 'Ravi', '', 'ravi@gmail.com', 'COURSE_APPRO_PER,OUR_COURSE_PER,CREATOR_COURSE_PER,CREATOR_PER', 1, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-26 09:53:41', '2023-07-26 09:53:41', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0),
(34, 'Amit', 'Shinde', 'amit@gmail.com', '', 2, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-07-29 05:34:39', '2023-07-29 05:42:33', 0, '1', '2002-02-27', 400079, 'male', 7, 1, 4, 1, 1),
(35, 'Ninad', 'Pawar', 'pawarninad199924@gmail.com', '', 2, 1, '7890', 'cdaeb1282d614772beb1e74c192bebda', '', '', '', '', 0, '', '2023-08-02 06:53:31', '2023-08-02 06:54:26', 0, '1', '2023-08-01', 76456, 'male', 7, 6, 5, 7, 4),
(36, 'Sumi', 'Pawar', 'sumi@gamil.com', '', 2, 2, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-08-10 05:37:10', '2023-08-17 10:31:54', 0, '1', '2022-06-10', 555555, 'female', 7, 7, 5, 6, 5),
(37, 'Nivya5', 'Karande', 'nivya5@gmail.com', '', 2, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-08-10 06:44:30', '2023-08-10 06:59:27', 0, '1', '2023-08-01', 243434, 'female', 7, 4, 3, 3, 4),
(38, 'Ashish', 'sharda', 'ashish@gmail.com', '', 2, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-08-17 10:35:29', '2023-08-17 10:35:41', 0, '1', '1985-02-17', 400054, 'male', 7, 7, 5, 6, 3),
(39, 'Ashish', '', 'ashish123@gmail.com', 'USERS_PER,COURSE_APPRO_PER,OUR_COURSE_PER,CREATOR_COURSE_PER,CREATOR_PER', 1, 1, '12345', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', 0, '', '2023-08-17 10:37:02', '2023-08-17 10:37:02', 0, '1', '0000-00-00', 0, '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area_interest`
--

CREATE TABLE `tbl_area_interest` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_area_interest`
--

INSERT INTO `tbl_area_interest` (`id`, `name`, `isDeleted`, `created_date`, `updated_date`) VALUES
(1, 'Blogging', 0, '2023-07-12 06:10:11', '2023-07-12 06:10:11'),
(2, 'Learning programming languages', 0, '2023-07-12 06:10:41', '2023-07-12 06:10:41'),
(3, 'Volunteering and community involvement', 0, '2023-07-12 06:11:54', '2023-07-12 06:11:54'),
(4, 'Travel', 0, '2023-07-12 06:12:25', '2023-07-12 06:12:25'),
(5, 'Photography', 0, '2023-07-12 06:14:19', '2023-07-12 06:14:19'),
(6, 'Playing baseball', 0, '2023-07-12 06:14:52', '2023-07-12 06:14:52'),
(7, 'Blogging', 1, '2023-07-17 09:57:36', '2023-07-17 09:57:36'),
(8, 'Blogging', 1, '2023-07-17 09:57:51', '2023-07-17 09:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int NOT NULL,
  `img` varchar(255) NOT NULL COMMENT 'Banner image',
  `course_type_id` int NOT NULL,
  `isDeleted` int NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `img`, `course_type_id`, `isDeleted`, `created_date`, `updated_date`) VALUES
(1, 'Test1.jpg', 6, 0, '2023-07-12 06:15:24', '2023-07-12 06:16:44'),
(2, 'share_mark.jpg', 4, 0, '2023-07-12 06:15:36', '2023-07-12 06:15:36'),
(3, 'Des.jpg', 2, 0, '2023-07-12 06:15:48', '2023-07-12 06:15:48'),
(4, 'Finance.jpg', 1, 0, '2023-07-12 06:15:59', '2023-07-12 06:15:59'),
(5, 'IT_softw1.jpg', 3, 0, '2023-07-12 06:16:13', '2023-07-12 06:16:27'),
(6, 'Dev.jpg', 8, 0, '2023-07-12 06:16:58', '2023-08-11 10:40:21'),
(7, 'download_card.jpeg', 2, 1, '2023-07-21 09:29:29', '2023-07-21 09:29:29'),
(8, 'IMG_20170930_210207.jpg', 4, 1, '2023-07-21 09:31:49', '2023-07-21 09:31:49'),
(9, 'Screenshot_(9).png', 3, 1, '2023-07-21 09:59:36', '2023-07-21 10:01:51'),
(10, 'mec_icon.jpg', 1, 1, '2023-07-24 06:31:37', '2023-07-24 06:31:37'),
(11, 'qpix-virtual-class.PNG', 1, 1, '2023-07-24 06:32:58', '2023-07-24 06:32:58'),
(12, 'punch.PNG', 4, 1, '2023-07-25 09:27:13', '2023-07-25 09:27:13'),
(13, 'questpix-ui.JPEG', 3, 1, '2023-07-25 09:28:32', '2023-07-26 09:56:09'),
(14, 'Mysql.png', 5, 1, '2023-07-31 05:49:20', '2023-07-31 05:49:20'),
(15, 'CA.jpg', 5, 0, '2023-08-09 05:47:58', '2023-08-11 10:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bot_ques`
--

CREATE TABLE `tbl_bot_ques` (
  `id` int NOT NULL,
  `ques` varchar(255) NOT NULL,
  `ans` text NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_bot_ques`
--

INSERT INTO `tbl_bot_ques` (`id`, `ques`, `ans`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 'How are you', 'I am fine be', '2023-08-01 13:26:46', '2023-08-01 15:38:33', 1),
(2, 'Ask another question', 'ok', '2023-08-01 15:09:57', '2023-08-01 15:09:57', 0),
(3, 'How can i get this course free', 'Get this course free by inviting your friends', '2023-08-01 15:49:05', '2023-08-01 15:49:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chapter`
--

CREATE TABLE `tbl_chapter` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `chapter_no` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chapter`
--

INSERT INTO `tbl_chapter` (`id`, `name`, `course_id`, `description`, `chapter_no`, `sort`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 'test', '4', 'test', 'test', 123, '2023-07-12 07:36:59', '2023-07-12 07:36:59', 0),
(2, 'pentration', '5', 'vvbdf', '2', 1, '2023-07-12 08:36:36', '2023-07-12 08:36:36', 0),
(3, 'SDLC', '2', 'Introduction of SDLC module', '1', 22, '2023-07-12 08:53:16', '2023-07-12 08:53:16', 0),
(4, 'Mettods', '7', 'Methods', '1', 23244, '2023-07-12 09:29:14', '2023-07-12 09:29:14', 0),
(5, 'Multithreading', '7', 'In computer architecture, multithreading is the ability of a central processing unit to provide multiple threads of execution concurrently, supported by the operating system. This approach differs from multiprocessing.', '2', 12345, '2023-07-12 11:56:51', '2023-07-12 11:56:51', 0),
(6, 'Exception handling', '7', 'In computing and computer programming, exception handling is the process of responding to the occurrence of exceptions – anomalous or exceptional conditions requiring special processing – during the execution of a program.', '3', 3, '2023-07-12 11:57:53', '2023-07-12 11:57:53', 0),
(7, 'english', '9', 'xdwcwc', '1', 1, '2023-07-13 05:04:39', '2023-07-13 05:04:39', 0),
(8, 'What is regression testing', '11', 'What is regression in QA testing?\r\nWhat is Regression Testing? Every little change in the software and code of your digital product can have unexpected consequences. Regression testing in software QA means testing the software after a development cycle to ensure everything works as intended.', '1', 11, '2023-07-14 07:58:20', '2023-07-14 07:58:20', 0),
(9, 'Accounting Introduction', '12', 'Accounting focuses on the analysis of information and recording financial transactions. While finance concentrates on the management of money and the funds of a business.', '1', 11, '2023-07-14 10:12:21', '2023-07-14 10:12:21', 0),
(10, 'Test Java', '1', 'testing', '1', 123, '2023-07-18 09:38:43', '2023-07-18 09:38:43', 0),
(11, 'Mathematics for Data Science 1 - Introduction', '13', 'The fundamental pillars of mathematics that you will use daily as a data analyst is linear algebra, probability, and statistics. ', '01', 1, '2023-07-18 11:09:47', '2023-07-18 11:09:47', 0),
(12, 'Differential Equation of First Order and First Degree', '14', 'A differential equation of first order and first degree can be written as f( x, y, dy/dx) = 0. A differential equation of first order and first degree can be written as f( x, y, dy/dx) = 0.', '1', 1, '2023-07-20 13:37:29', '2023-07-20 13:37:29', 0),
(13, 'Basic Concept of Accounting', '15', 'Chartered accountants work in all fields of business and finance, including auditing, taxation, financial and general management. Some are engaged in public ...', '1', 1, '2023-07-20 14:47:24', '2023-07-20 14:47:24', 0),
(14, 'Government Accounting Revision for CMA', '15', 'Lecture note government accounting government accounting refers to the system of financial accounting that is ... CMA Inter Auditing Rapid Revision SJC.\r\n', '2', 2, '2023-07-20 14:51:32', '2023-07-20 14:51:32', 0),
(15, 'What is Appium ??', '17', 'Appium is an open-source automation mobile testing tool, which is used to test the application. It is developed and supported by Sauce Labs to automate native and hybrid mobile apps. It is a cross-platform mobile automation tool, which means that it allows the same test to be run on multiple platforms. Multiple devices can be easily tested by Appium in parallel.\r\n\r\nIn today\'s development area, the demand for mobile applications is high. Currently, people are converting their websites into mobile apps. Therefore, it is very important to know about mobile software automation testing technology and also stay connected with new technology. Appium is a mobile application testing tool that is currently trending in Mobile Automation Testing Technology.', '01', 240799, '2023-07-25 10:36:43', '2023-07-25 10:36:43', 0),
(16, 'Introduction Of Mysql', '18', ' What is MySQL? | Types of Database & How to Create It? | MySQL Tutorial for Beginners', '1', 1, '2023-07-25 16:17:23', '2023-07-25 16:34:26', 0),
(17, 'What is JavaScript ', '19', '   JavaScript (js) is a light-weight object-oriented programming language which is used by several websites for scripting the webpages. It is an interpreted, full-fledged programming language that enables dynamic interactivity on websites when applied to an HTML document. It was introduced in the year 1995 for adding programs to the webpages in the Netscape Navigator browser. Since then, it has been adopted by all other graphical web browsers. With JavaScript, users can build modern web applications to interact directly without reloading the page every time. The traditional website uses js to provide several forms of interactivity and simplicity.', '03', 3, '2023-07-25 16:49:52', '2023-08-17 13:02:59', 1),
(18, ' Create a Table in MySQL', '18', '    In this video, learn How to Create a Table in MySQL? | MySQL Tutorial for Beginners. Find all the videos of the MySQL Course in this playlist.', '2', 1, '2023-07-25 17:23:39', '2023-07-25 17:55:20', 0),
(19, 'Where to Write JavaScript Code in HTML', '19', ' The list of places in HTML where we can write our JavaScript code is as follows:\r\n\r\n<HEAD>\r\n<BODY>\r\nThat is, either we can write our JavaScript code anywhere between <HEAD> and </HEAD> or anywhere between <BODY> and </BODY>.\r\n\r\nNote: We can also write our JavaScript code in both the HEAD and BODY section of an HTML document.\r\n\r\nWrite JavaScript in the HEAD Section of an HTML Document\r\nBefore writing JavaScript code inside an HTML document, open a <SCRIPT> tag, and after the JavaScript code is', '02', 2, '2023-07-25 17:47:09', '2023-08-17 13:02:56', 1),
(20, 'JavaScript keywords: definition, list, and examples', '19', '   JavaScript keywords are reserved words that cannot be used as variable or function names due to their special significance in the language. For example:\r\n\r\nHTML with JavaScript Code\r\n<!DOCTYPE html>\r\n<html>\r\n<body>\r\n\r\n   <p id=\"xyz\"></p>\r\n\r\n   <script>\r\n      var x = 10;\r\n      if (x == 0) {\r\n         document.getElementById(\"xyz\").innerHTML = \"The value of \'x\' is equal to 0.\";\r\n      }\r\n      else if (x > 0) {\r\n         document.getElementById(\"xyz\").innerHTML = \"The value of \'x\' is a positive number.\";\r\n      }\r\n      else {\r\n         document.getElementById(\"xyz\").innerHTML = \"The value of \'x\' is a negative number.\";\r\n      }\r\n   </script>\r\n\r\n</body>\r\n</html>\r\nOutput\r\nThe value of \'x\' is a positive number.\r\n\r\nIn the above example, the var, if, and else are keywords. The var keyword is used to declare a variable. The if is used when we need to execute some block of code when the specified condition evaluates to be true. The else is used in conjunction with if to specify an alternative statement to execute when the if condition is false.\r\n\r\nNote: Do not use any keyword as an identifier. If you do so, then that word acts the way it is defined by the developer. So avoid using any keyword as an identifier or variable.\r\n\r\nAn identifier is a name given to a variable, function, or object in JavaScript. It is used to identify and refer to a particular program element. Identifiers are case-sensitive and may contain letters, numbers, and underscores, but must begin with a letter, dollar sign, or underscore. Some valid identifiers in JavaScript are: myVariable, firstName, _myFunction, total_marks, $myName, xyz, abc, etc.\r\n\r\nJavaScript keyword list\r\nThe following is a list of keywords available in the JavaScript language.\r\n\r\nawait\r\nbreak\r\ncase\r\ncatch\r\nclass\r\nconst\r\ncontinue\r\ndebugger\r\ndefault\r\ndelete\r\ndo\r\nelse\r\nexport\r\nextends\r\nfalse\r\nfinally\r\nfor\r\nfunction\r\nif\r\nimplements\r\nimport\r\nin\r\ninstanceof\r\ninterface\r\nlet\r\nnew\r\nnull\r\npackage\r\nprivate\r\nprotected\r\npublic\r\nreturn\r\nsuper\r\nswitch\r\nstatic\r\nthis\r\nthrow\r\ntrue\r\ntry\r\ntypeof\r\nvar\r\nvoid\r\nwhile\r\nwith\r\nyield\r\nPlease be aware that certain keywords, such as \"await\" and \"yield,\" are only used in asynchronous programming with generators and promises.\r\n\r\nYou will learn these keywords, or the ones that are most widely and frequently used, one by one as you progress through this JavaScript tutorial. But for now, I\'m willing to write an example that uses and demonstrates the use of keywords in JavaScript:\r\n\r\n<script>\r\n   let secretNumber = Math.floor(Math.random() * 100) + 1;\r\n   let guess;\r\n   let attempts = 0;\r\n\r\n   while (guess !== secretNumber) {\r\n      guess = parseInt(prompt(\"Guess a number between 1 and 100:\"));\r\n\r\n      if (isNaN(guess)) {\r\n         alert(\"Please enter a valid number.\");\r\n         continue;\r\n      }\r\n\r\n      attempts++;\r\n\r\n      if (guess === secretNumber) {\r\n         alert(\"Congratulations! You guessed the secret number in ${attempts} attempts.\");\r\n      } else if (guess < secretNumber) {\r\n         alert(\"Too low! Guess again.\");\r\n      } else {\r\n         alert(\"Too high! Guess again.\");\r\n      }\r\n   }\r\n\r\n</script>\r\nNow, if you put the above JavaScript code in a file, say an HTML file called \"codescracker.html,\" which makes it easy to execute directly through a web browser, the following is the initial output:\r\n\r\njavascript keyword example\r\nThat allows the user to guess a number between 1 and 100. So try to enter a number between 1 and 100 and hit the \"OK\" button to check if your guessed number is the same number that is generated randomly through the program at this particular execution. So if the guessed number does not match the randomly generated number, then the code will continue receiving or asking for the user to guess and enter the number.\r\n\r\nIf you enter a number, say 12, and hit the \"OK\" button, and if 12 is greater than the secretly or randomly generated number, then we will get an output like this:\r\n\r\nkeywords example javascript\r\nSo because we get the message saying that the guessed number is less than 12, at our next attempt we need to try with a number less than 12. Therefore,  I tried 10 and I got the message \"Too low,\" which makes me confirm that the number will be 11. So I tried 11, and here is the output I got.\r\n\r\njavascript keywords example program\r\nNow just click on the \"OK\" button to stop the execution of the code. That\'s it.\r\n\r\nNow if we go through the demonstration of keywords used in the above JavaScript code, then I must say that there are multiple keywords, properties, and methods used. So here is the description of the keywords used in the above JavaScript code:\r\n\r\nlet: used to declare and initialize variables (secretNumber, guess, and attempts).\r\nwhile: a loop statement that executes a block of code while a specified condition is true.\r\nif: a conditional statement that executes a block of code if a specified condition is true.\r\ncontinue: a keyword that stops the current iteration of a loop and continues with the next iteration.\r\nWhatever the programming language we use, keywords are the terms that are required everywhere to define the particular task in the code, as described above. That is, when we need to declare a variable, we use let, var, or const. Or when we need to execute some block of code multiple times, we use while, for, or another keyword or statement, let\'s say do-while, and so on. So these are the usage and importance of keywords not only in JavaScript but also in other programming languages like \"Java\", \"Python\", \"C\" \"C++\", etc.\r\n\r\nKeep in mind that other languages support different keywords with different syntax and formats.', '01', 1, '2023-07-25 17:49:13', '2023-08-17 13:02:53', 1),
(21, 'MySQL Add Data Into Tables', '18', ' It is possible to write the INSERT INTO statement in two ways: 1. Specify both the column names and the values to be inserted: INSERT INTO table_name (column1, ...\r\n?MySQL INSERT() Function · ?SQL NULL Values', '3', 1, '2023-07-25 17:56:42', '2023-07-25 17:56:57', 0),
(22, ' Java – Overview ', '20', ' Java programming language was originally developed by Sun Microsystems which was\r\ninitiated by James Gosling and released in 1995 as core component of Sun Microsystems\'\r\nJava platform (Java 1.0 [J2SE]).\r\nThe latest release of the Java Standard Edition is Java SE 8. With the advancement of Java\r\nand its widespread popularity, multiple configurations were built to suit various types of\r\nplatforms. For example: J2EE for Enterprise Applications, J2ME for Mobile Applications.\r\nThe new J2 versions were renamed as Java SE, Java EE, and Java ME respectively. Java\r\nis guaranteed to be Write Once, Run Anywhere.', '01', 1, '2023-07-25 18:10:15', '2023-07-26 11:51:36', 0),
(23, 'History of Java', '20', 'James Gosling initiated Java language project in June 1991 for use in one of his many settop box projects. The language, initially called ‘Oak’ after an oak tree that stood outside\r\nGosling\'s office, also went by the name ‘Green’ and ended up later being renamed as Java,\r\nfrom a list of random words.\r\nSun released the first public implementation as Java 1.0 in 1995. It promised Write Once,\r\nRun Anywhere (WORA), providing no-cost run-times on popular platforms.\r\nOn 13 November, 2006, Sun released much of Java as free and open source software\r\nunder the terms of the GNU General Public License (GPL).', '02', 2, '2023-07-25 18:23:30', '2023-07-25 18:23:30', 0),
(24, 'Java - Environment Setup ', '20', 'You really do not need to set up your own environment to start learning Java programming\r\nlanguage. Reason is very simple, we already have Java Programming environment setup\r\nonline, so that you can compile and execute all the available examples online at the same\r\ntime when you are doing your theory work. This gives you confidence in what you are\r\nreading and to check the result with different options. Feel free to modify any example\r\nand execute it online.\r\n', '03', 3, '2023-07-25 18:24:28', '2023-07-25 18:24:28', 0),
(25, 'Local Environment Setup', '20', 'If you are still willing to set up your environment for Java programming language, then\r\nthis section guides you on how to download and set up Java on your machine. Following\r\nare the steps to set up the environment.\r\nJava SE is freely available from the link Download Java. You can download a version based\r\non your operating system.\r\nFollow the instructions to download Java and run the .exe to install Java on your machine.\r\nOnce you installed Java on your machine, you will need to set environment variables to\r\npoint to correct installation directories:', '04', 4, '2023-07-25 18:25:31', '2023-07-25 18:25:31', 0),
(26, 'Domain Integrity Constraint in SQL', '18', 'Domain Integrity Constraint in SQL | Default, Not Null and Check Constraints | Oracle Database', '4', 4, '2023-07-26 12:19:01', '2023-07-26 12:19:01', 0),
(27, 'Overview of Java', '21', 'ava is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible. It is intended to let application developers write once, and run anywhere (WORA), meaning that compiled Java code can run on all platforms that support Java without the need for recompilation. Java was first released in 1995 and is widely used for developing applications for desktop, web, and mobile devices. Java is known for its simplicity, robustness, and security features, making it a popular choice for enterprise-level applications.\r\n\r\nJAVA was developed by James Gosling at Sun Microsystems Inc in the year 1995 and later acquired by Oracle Corporation. It is a simple programming language. Java makes writing, compiling, and debugging programming easy.', '01', 1, '2023-07-27 10:18:07', '2023-07-27 10:18:07', 0),
(28, 'Basics of Java', '21', 'Java program is an object-oriented programming language, that means java is the collection of objects, and these objects communicate through method calls to each other to work together. Here is a brief discussion on the Classes and Objects, Method, Instance variables, syntax, and semantics of Java.\r\n\r\nBasic terminologies in Java\r\n1. Class: The class is a blueprint (plan) of the instance of a class (object). It can be defined as a logical template that share common properties and methods.\r\n\r\nExample1: Blueprint of the house is class.\r\nExample2: In real world, Alice is an object of the “Human” class.\r\n2. Object: The object is an instance of a class. It is an entity that has behavior and state.\r\n\r\nExample: Dog, Cat, Monkey etc. are the object of “Animal” class.\r\nBehavior: Running on the road.\r\n3. Method: The behavior of an object is the method.', '02', 2, '2023-07-27 10:20:04', '2023-07-27 10:20:04', 0),
(29, 'Input/Output in Java', '21', 'Java brings various Streams with its I/O package that helps the user to perform all the input-output operations. These streams support all types of objects, data types, characters, files, etc to fully execute the I/O operations. There are two ways by which we can take input from the user or from a file\r\n\r\nBufferedReader Class\r\nScanner Class\r\n1. BufferedReader\r\nIt is a simple class that is used to read a sequence of characters. It has a simple function that reads a character another read which reads, an array of characters, and a readLine() function which reads a line.\r\n\r\nInputStreamReader() is a function that converts the input stream of bytes into a stream of characters so that it can be read as BufferedReader expects a stream of characters.\r\n\r\nBufferedReader can throw checked Exceptions', '03', 3, '2023-07-27 10:21:47', '2023-07-27 10:21:47', 0),
(30, 'Operators in Java', '21', 'Operators constitute the basic building block to any programming language. Java too provides many types of operators which can be used according to the need to perform various calculations and functions, be it logical, arithmetic, relational, etc. They are classified based on the functionality they provide. Here are a few types: \r\n\r\nArithmetic Operators\r\nUnary Operators\r\nAssignment Operator\r\nRelational Operators\r\nLogical Operators\r\nTernary Operator\r\nBitwise Operators\r\nShift Operators\r\nThis article explains all that one needs to know regarding Arithmetic Operators. ', '04', 4, '2023-07-27 10:23:04', '2023-07-27 10:23:04', 0),
(31, 'Strings in Java', '21', 'In the given example only one object will be created. Firstly JVM will not find any string object with the value “Welcome” in the string constant pool, so it will create a new object. After that it will find the string with the value “Welcome” in the pool, it will not create a new object but will return the reference to the same instance. In this article, we will learn about Java Strings.\r\n\r\nWhat are Strings in Java?\r\nStrings are the type of objects that can store the character of values. A string acts the same as an array of characters in Java.\r\n\r\nExample:  \r\n\r\nString name = \"Geeks\";', '05', 5, '2023-07-27 10:24:45', '2023-07-27 10:24:45', 0),
(32, 'Arrays in Java', '21', 'Array in java is a group of like-typed variables referred to by a common name. Arrays in Java work differently than they do in C/C++. Following are some important points about Java arrays. \r\n\r\nIn Java, all arrays are dynamically allocated. (discussed below)\r\nArrays are stored in contiguous memory [consecutive memory locations].\r\nSince arrays are objects in Java, we can find their length using the object property length. This is different from C/C++, where we find length using sizeof.\r\nA Java array variable can also be declared like other variables with [] after the data type.\r\nThe variables in the array are ordered, and each has an index beginning with 0.\r\nJava array can also be used as a static field, a local variable, or a method parameter.\r\nThe size of an array must be specified by int or short value and not long.\r\nThe direct superclass of an array type is Object.\r\nEvery array type implements the interfaces Cloneable and java.io.Serializable. \r\nThis storage of arrays helps us randomly access the elements of an array [Support Random Access].\r\nThe size of the array cannot be altered(once initialized).  However, an array reference can be made to point to another array.\r\nAn array can contain primitives (int, char, etc.) and object (or non-primitive) references of a class depending on the definition of the array. In the case of primitive data types, the actual values are stored in contiguous memory locations. In the case of class objects, the actual objects are stored in a heap segment. ', '06', 6, '2023-07-27 10:25:27', '2023-07-27 10:25:27', 0),
(33, 'OOPS in Java', '21', 'As the name suggests, Object-Oriented Programming or OOPs refers to languages that use objects in programming, they use objects as a primary source to implement what is to happen in the code. Objects are seen by the viewer or user, performing tasks assigned by you. Object-oriented programming aims to implement real-world entities like inheritance, hiding, polymorphism etc. in programming. The main aim of OOP is to bind together the data and the functions that operate on them so that no other part of the code can access this data except that function. \r\n\r\nOOPS COncepts in Java\r\n\r\nLet us discuss prerequisites by polishing concepts of method declaration and message passing. Starting off with the method declaration, it consists of six components: \r\n\r\nAccess Modifier: Defines the access type of the method i.e. from where it can be accessed in your application. In Java, there are 4 types of access specifiers: \r\npublic: Accessible in all classes in your application.\r\nprotected: Accessible within the package in which it is defined and in its subclass(es) (including subclasses declared outside the package).\r\nprivate: Accessible only within the class in which it is defined.\r\ndefault (declared/defined without using any modifier): Accessible within the same class and package within which its class is defined.\r\nThe return type: The data type of the value returned by the method or void if it does not return a value.\r\nMethod Name: The rules for field names apply to method names as well, but the convention is a little different.\r\nParameter list: Comma-separated list of the input parameters that are defined, preceded by their data type, within the enclosed parentheses. If there are no parameters, you must use empty parentheses ().\r\nException list: The exceptions you expect the method to throw. You can specify these exception(s).\r\nMethod body: It is the block of code, enclosed between braces, that you need to execute to perform your intended operation', '07', 7, '2023-07-27 10:26:53', '2023-07-27 10:26:53', 0),
(34, 'Introduction of Python', '25', ' Python tutorial provides basic and advanced concepts of Python. Our Python tutorial is designed for beginners and professionals.', '01', 1, '2023-07-27 14:53:31', '2023-07-28 10:33:24', 0),
(35, 'IF - ELSE ', '25', '   Decision making is the most important aspect of almost all the programming languages. As the name implies, decision making allows us to run a particular block of code for a particular decision. Here, the decisions are made on the validity of the particular conditions. Condition checking is the backbone of decision making.\r\n\r\nIn python, decision making is performed by the following statements.\r\n\r\nStatement	Description\r\nIf Statement	The if statement is used to test a specific condition. If the condition is true, a block of code (if-block) will be executed.\r\nIf - else Statement	The if-else statement is similar to if statement except the fact that, it also provides the block of the code for the false case of the condition to be checked. If the condition provided in the if statement is false, then the else statement will be executed.\r\nNested if Statement	Nested if statements enable us to use if ? else statement inside an outer if statement.\r\nIndentation in Python\r\nFor the ease of programming and to achieve simplicity, python doesn\'t allow the use of parentheses for the block level code. In Python, indentation is used to declare a block. If two statements are at the same indentation level, then they are the part of the same block.\r\n\r\nGenerally, four spaces are given to indent the statements which are a typical amount of indentation in python.', '02', 2, '2023-07-28 10:33:07', '2023-07-28 10:34:53', 0),
(36, 'test', '26', 'test\r\n', '1245', 12345, '2023-07-28 10:55:27', '2023-07-28 10:55:27', 0),
(37, 'Array ', '25', 'In this article, we are discussing Arrays in Python. The Array is used in every programming language, like C, C++, Java, Python, R, JavaScript, etc. By using an array, we can store more than one data. The Array is a process of memory allocation. It is performed as a dynamic memory allocation. We can declare an array like x[100], storing 100 data in x. It is a container that can hold a fixed number of items, and these items should be the same type. An array is popular in most programming languages like C/C++, JavaScript, etc.', '03', 3, '2023-07-28 17:20:22', '2023-07-28 17:20:22', 0),
(38, 'Strings ', '25', ' Till now, we have discussed numbers as the standard data-types in Python. In this section of the tutorial, we will discuss the most popular data type in Python, i.e., string.\r\n\r\nPython string is the collection of the characters surrounded by single quotes, double quotes, or triple quotes. The computer does not understand the characters; internally, it stores manipulated character as the combination of the 0\'s and 1\'s.\r\n\r\nEach character is encoded in the ASCII or Unicode character. So we can say that Python strings are also called the collection of Unicode characters.\r\n\r\nIn Python, strings can be created by enclosing the character or the sequence of characters in the quotes. Python allows us to use single quotes, double quotes, or triple quotes to create the string.\r\n', '04', 4, '2023-07-28 18:24:04', '2023-07-28 18:24:24', 0),
(39, 'Selenium Introduction', '28', 'Selenium Introductory Notes and Syllabus\r\n', '1', 1, '2023-08-01 12:22:40', '2023-08-01 12:22:40', 0),
(40, 'Install Java & Selenium', '28', 'Get Started with basic steps of the Selenium Webdriver ', '2', 2, '2023-08-01 12:25:18', '2023-08-01 12:25:18', 0),
(41, 'Brush up Java concepts', '28', 'Introduction to Java variables and Data types with examples  |  What are Arrays in Java? How to initialize and retrieve the values of array\r\n', '3', 3, '2023-08-01 12:26:44', '2023-08-01 12:26:44', 0),
(42, 'Shares', '30', 'desv', 'chapter 1', 123, '2023-08-02 15:24:21', '2023-08-02 15:24:21', 0),
(43, 'Algebra Class1', '32', ' Algebra 1 is a high school math course exploring how to use letters (called variables) and numbers with mathematical symbols to solve problems', '1', 1, '2023-08-02 16:56:52', '2023-08-02 17:00:31', 0),
(44, 'Linear Equation class 2', '32', ' Algebra is one of the major parts of Mathematics in which general symbols and letters are used to represent quantities and numbers in equations and formulae.', '2', 2, '2023-08-02 16:59:40', '2023-08-02 17:00:41', 0),
(45, 'Matrix Class 3', '32', 'In mathematics, a matrix is a rectangular array or table of numbers, symbols, or expressions, arranged in rows and columns,', '3', 3, '2023-08-02 17:00:22', '2023-08-02 17:00:22', 0),
(46, 'Html', '33', 'html', '1', 11, '2023-08-04 11:04:16', '2023-08-04 11:04:16', 0),
(47, 'css ', '33', 'css', '2', 22, '2023-08-04 11:04:45', '2023-08-04 11:04:45', 0),
(48, 'Basics of Web Designing.', '35', 'Basics of Web Designing.1223245', '1', 1, '2023-08-04 11:43:54', '2023-08-04 11:43:54', 0),
(49, 'Introduction to Web Design & Applications.', '35', 'Introduction to Web Design & Applications.', '2', 2, '2023-08-04 12:01:37', '2023-08-04 12:01:37', 0),
(50, 'Raster Graphics:', '37', 'Raster Graphics:', '1', 1, '2023-08-07 11:28:13', '2023-08-07 11:28:13', 0),
(51, 'Regression Testing', '40', 'Regression Testing', '1', 1, '2023-08-10 13:18:25', '2023-08-10 13:18:25', 0),
(52, 'Regression Testing', '39', 'Regression Testing', '1', 2, '2023-08-17 12:06:35', '2023-08-17 12:06:35', 0),
(53, 'testque1', '39', 'testque1', '3', 2, '2023-08-17 12:08:20', '2023-08-17 12:08:20', 0),
(54, 'Jira', '28', 'Jira', '4', 4, '2023-08-17 12:44:15', '2023-08-17 12:44:15', 0),
(55, 'Appium Tutorial', '19', 'Appium Tutorial', '1', 1, '2023-08-17 13:03:24', '2023-08-17 13:03:24', 0),
(56, 'Mobile Testing - Appium Framework', '19', 'Mobile Testing - Appium Framework', '2', 2, '2023-08-17 13:11:52', '2023-08-17 13:11:52', 0),
(57, 'Mobile Automation Testing with Appium - An Introduction', '19', 'Mobile Automation Testing with Appium - An Introduction', '3', 3, '2023-08-17 13:16:53', '2023-08-17 13:16:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_history`
--

CREATE TABLE `tbl_chat_history` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text NOT NULL,
  `status` tinyint NOT NULL,
  `communicate` varchar(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat_history`
--

INSERT INTO `tbl_chat_history` (`id`, `room_id`, `sender_id`, `receiver_id`, `message`, `status`, `communicate`, `added_date`, `isDeleted`) VALUES
(1, 1, 145, 1, 'hii', 1, 'sender', '2023-07-31 16:33:42', 0),
(2, 1, 145, 1, 'no answer please reply', 1, 'sender', '2023-07-31 16:43:53', 0),
(3, 1, 1, 145, 'hello', 1, 'receiver', '2023-07-31 16:52:44', 0),
(4, 1, 145, 1, 'is these free course ', 1, 'sender', '2023-07-31 16:56:33', 0),
(5, 2, 139, 1, 'hiiiiiiiii', 1, 'sender', '2023-07-31 17:10:13', 0),
(6, 2, 1, 139, 'hello', 1, 'receiver', '2023-07-31 17:10:59', 0),
(7, 1, 1, 145, 'yes', 1, 'receiver', '2023-08-01 11:54:11', 0),
(8, 4, 154, 1, 'Hello sir ', 1, 'sender', '2023-08-01 13:26:55', 0),
(9, 4, 1, 154, 'hii', 1, 'receiver', '2023-08-01 13:27:43', 0),
(10, 4, 1, 154, 'how are you', 1, 'receiver', '2023-08-01 13:27:52', 0),
(11, 4, 154, 1, 'How are you', 1, 'sender', '2023-08-01 15:15:37', 0),
(12, 4, 154, 1, 'How are you', 1, 'sender', '2023-08-01 15:20:23', 0),
(13, 4, 154, 1, 'How are you', 1, 'receiver', '2023-08-01 15:20:23', 0),
(14, 3, 151, 1, 'How can i get this course free', 1, 'sender', '2023-08-01 15:49:15', 0),
(15, 3, 151, 1, 'How can i get this course free', 1, 'receiver', '2023-08-01 15:49:15', 0),
(16, 4, 154, 1, 'How can i get this course free', 1, 'sender', '2023-08-01 15:51:15', 0),
(17, 4, 154, 1, 'How can i get this course free', 1, 'receiver', '2023-08-01 15:51:15', 0),
(18, 4, 154, 1, 'How can i get this course free', 1, 'sender', '2023-08-01 16:00:00', 0),
(19, 4, 154, 1, 'How can i get this course free', 1, 'receiver', '2023-08-01 16:00:00', 0),
(20, 4, 154, 1, 'but how to share', 1, 'sender', '2023-08-01 16:00:11', 0),
(21, 3, 1, 151, 'you have to pay for the courses', 1, 'receiver', '2023-08-01 16:14:48', 0),
(22, 4, 1, 154, 'dont share', 1, 'receiver', '2023-08-01 16:15:11', 1),
(23, 4, 154, 1, 'How can i get this course free', 1, 'receiver', '2023-08-01 16:59:57', 0),
(24, 4, 154, 1, 'How can i get this course free', 1, 'sender', '2023-08-01 16:59:57', 0),
(25, 4, 154, 1, 'How can i get this course free', 1, 'sender', '2023-08-01 18:46:50', 0),
(26, 4, 154, 1, 'How can i get this course free', 1, 'receiver', '2023-08-01 18:46:50', 0),
(27, 5, 157, 1, 'How can i get this course free', 1, 'sender', '2023-08-02 12:10:46', 0),
(28, 5, 157, 1, 'How can i get this course free', 1, 'receiver', '2023-08-02 12:10:46', 0),
(29, 5, 157, 1, 'How can i get this course free', 1, 'sender', '2023-08-02 12:12:01', 0),
(30, 5, 157, 1, 'How can i get this course free', 1, 'receiver', '2023-08-02 12:12:01', 0),
(31, 5, 157, 1, 'jf ft', 1, 'sender', '2023-08-02 12:12:23', 0),
(32, 5, 1, 157, 'hello', 1, 'receiver', '2023-08-02 12:12:50', 0),
(33, 5, 157, 1, 'How can i get this course free', 1, 'sender', '2023-08-02 12:13:58', 0),
(34, 5, 157, 1, 'How can i get this course free', 1, 'receiver', '2023-08-02 12:13:58', 0),
(35, 2, 139, 1, 'How can i get this course free', 1, 'sender', '2023-08-03 12:33:01', 0),
(36, 2, 139, 1, 'How can i get this course free', 1, 'receiver', '2023-08-03 12:33:01', 0),
(37, 1, 1, 145, 'hiiii', 1, 'receiver', '2023-08-04 17:32:16', 0),
(38, 6, 118, 1, 'How can i get this course free', 1, 'sender', '2023-08-07 18:04:14', 0),
(39, 6, 118, 1, 'How can i get this course free', 1, 'receiver', '2023-08-07 18:04:14', 0),
(40, 6, 118, 1, 'hii', 1, 'sender', '2023-08-07 18:04:24', 0),
(41, 7, 36, 1, 'How can i get this course free', 1, 'sender', '2023-08-08 15:08:52', 0),
(42, 7, 36, 1, 'How can i get this course free', 1, 'receiver', '2023-08-08 15:08:52', 0),
(43, 2, 139, 1, 'hiii', 1, 'sender', '2023-08-08 18:24:19', 0),
(44, 2, 139, 1, 'How can i get this course free', 1, 'sender', '2023-08-08 18:24:23', 0),
(45, 2, 139, 1, 'How can i get this course free', 1, 'receiver', '2023-08-08 18:24:23', 0),
(46, 2, 139, 1, 'hii', 1, 'sender', '2023-08-08 18:24:33', 0),
(47, 2, 1, 139, 'hiiiiiiiiii ', 1, 'receiver', '2023-08-08 18:25:12', 0),
(48, 8, 131, 1, 'hii', 1, 'sender', '2023-08-09 17:12:05', 0),
(49, 8, 1, 131, 'hello', 1, 'receiver', '2023-08-09 17:12:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat_room`
--

CREATE TABLE `tbl_chat_room` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `vendor_id` int NOT NULL,
  `product_id` int NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat_room`
--

INSERT INTO `tbl_chat_room` (`id`, `user_id`, `vendor_id`, `product_id`, `added_date`) VALUES
(1, 145, 1, 0, '2023-07-31 16:33:28'),
(2, 139, 1, 0, '2023-07-31 17:10:05'),
(3, 151, 1, 0, '2023-08-01 10:23:22'),
(4, 154, 1, 0, '2023-08-01 13:26:41'),
(5, 157, 1, 0, '2023-08-02 12:10:17'),
(6, 118, 1, 0, '2023-08-07 18:04:12'),
(7, 36, 1, 0, '2023-08-08 15:08:45'),
(8, 131, 1, 0, '2023-08-09 17:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int NOT NULL,
  `creator_id` int NOT NULL,
  `course_type_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `mrp` double(10,2) NOT NULL,
  `percent` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `view` int NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `max_age` int NOT NULL,
  `min_age` int NOT NULL,
  `gender` varchar(255) NOT NULL,
  `chapter` varchar(6) NOT NULL,
  `occupation_id` int NOT NULL,
  `hobby_id` int NOT NULL,
  `education_id` int NOT NULL,
  `heard_about_us_id` int NOT NULL,
  `area_of_interest_id` int NOT NULL,
  `reject_reason` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `creator_id`, `course_type_id`, `name`, `title`, `description`, `writer`, `language`, `duration`, `price`, `mrp`, `percent`, `image`, `videos`, `video_link`, `view`, `pincode`, `max_age`, `min_age`, `gender`, `chapter`, `occupation_id`, `hobby_id`, `education_id`, `heard_about_us_id`, `area_of_interest_id`, `reject_reason`, `status`, `sort`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 1, 5, 'Advance Java', 'Development', '   Learn Java In This Course And Become a Computer Programmer. Obtain valuable Core Java Skills And Java Certification', 'Vijay kaur', 'English', '90', '2000', 0.00, '', 'Dev3.jpg', '', 'https://www.youtube.com/embed/yRpLlJmRo2w', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 92738, '2023-07-12 07:18:32', '2023-08-04 11:54:48', 0),
(2, 1, 6, 'Software Testing Bootcamp', 'Software Testing ', ' Software Testing Tutorial Introduction and Course Topics - Software Testing Bootcamp', 'Lisa Crispin', 'English', '60', '3000', 0.00, '', 'Test1.jpg', '', 'https://www.youtube.com/embed/ZWGiBbZdO1Q', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 635276, '2023-07-12 07:27:55', '2023-08-04 11:54:48', 1),
(3, 1, 4, 'Basics of Stock Market For Beginners', 'Share Market', ' A share market is a platform where sellers and buyers jointly assemble to trade on publicly listed shares', ' Rachana Ranade', 'English', '180', '5000', 0.00, '', 'share_mark1.jpg', '', 'https://www.youtube.com/embed/Xn7KWR9EOGQ', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 223434, '2023-07-12 07:31:39', '2023-08-04 11:54:48', 0),
(4, 19, 6, 'test123', 'test', '    1234', 'test', 'test', '23', '', 0.00, '', 'Screenshot_from_2023-07-27_13-21-541.png', '', 'https://www.youtube.com/embed/0n7AWxYCj9I', 1, '410208,288996,258063,4000102', 0, 0, '0', 'yes', 1, 0, 0, 0, 0, 'test', 2, 1234, '2023-07-12 07:36:46', '2023-08-04 11:54:48', 1),
(5, 20, 6, 'Basics of testing', 'Software testing', ' Software testing', 'Lisa Crispin', 'English', '100', '1000', 0.00, '', 'Test3.jpg', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 345455, '2023-07-12 08:27:46', '2023-08-04 11:54:48', 1),
(6, 20, 5, 'C++', 'Development', ' Programming language', 'Vijay kaur', 'English', '200', '2500', 0.00, '', 'Dev5.jpg', '', 'https://www.youtube.com/watch?v=bL-o2xBENY0', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 565778, '2023-07-12 08:31:04', '2023-08-04 11:54:48', 0),
(7, 1, 5, 'Core Java', 'java', ' Basics of java', 'Lisa Crispin', 'English', '120', '1000', 0.00, '', '11_min1.jpg', '', 'https://www.youtube.com/embed/CFD9EFcNZTQ', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 234343, '2023-07-12 09:27:46', '2023-08-04 11:54:48', 0),
(8, 1, 3, 'Ninad', 'penetration', 'ffdv', 'Ninad pawar', 'Hindi', '12', '155', 0.00, '', 'wheel1.png', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-07-12 13:34:09', '2023-08-04 11:54:48', 1),
(9, 1, 4, 'english', 'english', 'dvsdvd', 'Ninad pawar', 'English', '100', '500', 0.00, '', 'wheel3.png', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-07-13 04:56:17', '2023-08-04 11:54:48', 1),
(10, 1, 6, 'Regression Testing', 'Software testing', 'Regression Testing is a type of testing in the software development cycle that runs after every change to ensure that the change introduces no unintended breaks. Regression testing addresses a common issue that developers face — the emergence of old bugs with the introduction of new changes.', 'Dinesh mourya', 'English', '30', '1000', 0.00, '', 'regession1.png', '', 'https://www.youtube.com/embed/xF1Jp_6ZRWw', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 9, '2023-07-14 07:50:21', '2023-08-04 11:54:48', 1),
(11, 1, 6, 'Regression Testing', 'Software Testing', 'Regression Testing is a type of testing in the software development cycle that runs after every change to ensure that the change introduces no unintended breaks. Regression testing addresses a common issue that developers face — the emergence of old bugs with the introduction of new changes.', 'Vijay chavan', 'English', '60', '1000', 0.00, '', 'regession3.png', '', 'https://www.youtube.com/embed/xF1Jp_6ZRWw', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 123, '2023-07-14 07:56:54', '2023-08-04 11:54:48', 1),
(12, 20, 1, 'Finance', 'Finance ', 'The difference between finance and accounting is that accounting focuses on the day-to-day flow of money in and out of a company or institution, whereas finance is a broader term for the management of assets and liabilities and the planning of future growth.', 'V.k ', 'English', '120', '2000', 0.00, '', 'finance11.png', '', 'https://www.youtube.com/embed/PbldLCsspgE', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 8, '2023-07-14 10:06:38', '2023-08-04 11:54:48', 0),
(13, 20, 1, 'mathematics', 'Mathematics', 'Mathematics is the science and study of quality, structure, space, and change. Mathematicians seek out patterns, formulate new conjectures, and establish truth by rigorous deduction from appropriately chosen axioms and definitions.', 'Pooja publication', 'Hindi', '100', '5000', 0.00, '', 'maths1.jpg', '', 'https://www.youtube.com/embed/F9BZ5JsnjYM', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-07-18 11:02:31', '2023-08-04 11:54:48', 0),
(14, 1, 1, 'Engineering Mathematics-II', 'Mathematics', 'This book Engineering Mathematics-II is designed as a self-contained, comprehensive classroom text for the second semester B.E. Classes of Visveswaraiah Technological University as per the Revised new Syllabus.', 'G. Balasubramanian', 'English', '200', '5000', 0.00, '', 'Maths11.jpg', '', 'https://www.youtube.com/embed/TH4Kd9mfIgI', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-07-20 13:35:17', '2023-08-04 11:54:48', 0),
(15, 20, 1, 'chartered accountant', 'chartered accountant', 'Chartered accountants work in all fields of business and finance, including auditing, taxation, financial and general management. Some are engaged in public', ' ?Mary Harris Smith', 'English', '100', '2000', 0.00, '', 'CA1.jpg', '', 'https://www.youtube.com/embed/mq6KNVeTE3A', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 2, '2023-07-20 14:46:43', '2023-08-08 16:50:00', 0),
(16, 1, 6, 'Abhishek Tiwari', 'Appium ', ' Appium for Mobile App Testing | Introduction to Mobile Testing and Appium', 'abhishek ', 'English', '180', '', 0.00, '', 'images1.png', '', 'https://youtu.be/yTW7hZZfTYo', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 18564, '2023-07-24 15:41:28', '2023-08-04 11:54:48', 1),
(17, 1, 6, 'Appium Testing ', 'Appium ', 'Appium Beginner Tutorial 1 | What is Appium', 'Raghav ', 'Hindi ', '90', '5000', 0.00, '', 'images3.png', '', 'https://youtu.be/mAylNVddfJc', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 240799, '2023-07-25 10:35:37', '2023-08-04 11:54:48', 0),
(18, 1, 3, 'MySQL', 'MySQL Database', ' MySQL is an open-source relational database management system. Its name is a combination of \"My\", the name of co-founder Michael Widenius\'s daughter My, and \"SQL\", the acronym for Structured Query Language', ' David Axmark', 'English', '150', '', 0.00, '', 'Mysql1.png', '', 'https://www.youtube.com/embed/nnBMsGrwuUE', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 10, '2023-07-25 16:12:20', '2023-08-04 11:54:48', 0),
(19, 1, 5, 'JavaScript ', 'JavaScript', ' JavaScript ', 'Raghav ', 'Hindi ', '90', '', 0.00, '', 'appi1.png', '', 'https://youtu.be/hKB-YGF14SY', 0, '0', 0, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 17, '2023-07-25 16:46:56', '2023-08-17 13:21:51', 0),
(20, 1, 5, 'JAVA', ' JAVA', '  Introduction to Java + Installing Java JDK and IntelliJ IDEA for Java', 'Code with Harry ', 'English', '120', '', 0.00, '', 'java-programming-tutorials-tips1.png', '', 'https://youtu.be/ntLJmHOJ0ME', 0, '0', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1234, '2023-07-25 18:06:50', '2023-08-04 11:54:48', 1),
(21, 1, 5, 'JAVA', 'JAVA', 'Developed first in 1995 by Sun Microsystems, Java is a concurrent, class-based, and object-oriented programming language based on the syntax of C and C++. Java is fast, secure, and extremely versatile. Thus, it\'s preferred to develop applications like software design, gaming technology, and web and mobile applications', 'Code with Harry ', 'English', '120', '20000', 0.00, '', 'java-programming-tutorials-tips3.png', '', 'https://youtu.be/ntLJmHOJ0ME', 0, '', 0, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-07-27 10:16:24', '2023-08-04 11:54:48', 0),
(22, 1, 6, 'test', 'test', ' test', 'test', 'test', '20', '', 0.00, '', 'Screenshot_from_2023-07-27_13-21-543.png', '', 'https://www.youtube.com/embed/0n7AWxYCj9I', 1, '410208,343554,2580369', 100, 50, 'male', 'yes', 0, 0, 0, 0, 0, '', 0, 1234, '2023-07-27 13:15:13', '2023-08-04 11:54:48', 1),
(23, 1, 4, 'test', 'terst', 'test', 'test', 'test', '232', '2323', 0.00, '', 'Screenshot_from_2023-07-27_13-22-051.png', '', 'https://www.youtube.com/embed/0n7AWxYCj9I', 1, '324254,4800080,440010', 100, 36, '2', 'yes', 0, 0, 0, 0, 0, '', 0, 123, '2023-07-27 14:46:04', '2023-08-04 11:54:48', 1),
(24, 1, 4, 'test', 'terst', ' test', 'test', 'test', '232', '', 0.00, '', 'Screenshot_from_2023-07-27_13-22-055.png', '', 'https://www.youtube.com/embed/0n7AWxYCj9I', 1, '324254,4800080,440010', 100, 36, '2', 'yes', 0, 0, 0, 7, 0, '', 0, 123, '2023-07-27 14:46:04', '2023-08-04 11:54:48', 1),
(25, 1, 5, 'Python ', 'Python', 'Python is an interpreted, object-oriented, high-level programming language with dynamic semantics developed by Guido van Rossum. It was originally released in 1991. Designed to be easy as well as fun, the name \"Python\" is a nod to the British comedy group Monty Python.', 'Code with Harry ', 'Hindi ', '120', '15000', 0.00, '', 'Python1.png', '', 'https://youtu.be/7wnove7K-ZQ', 0, '', 100, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 2, 1999, '2023-07-27 14:51:55', '2023-08-04 11:54:48', 0),
(26, 19, 5, 'test', 'test', 'test', 'test', 'test', '23', '1234', 0.00, '', 'test1.jpg', '', 'https://www.youtube.com/embed/ZWGiBbZdO1Q', 0, '', 100, 0, '0', 'yes', 0, 0, 0, 0, 0, '', 1, 1234, '2023-07-28 10:55:00', '2023-08-04 11:54:48', 1),
(27, 1, 8, 'QA anayst ', 'Software Testing ', '  Software testing is the process of evaluating and verifying that a software product or application does what it is supposed to do. The benefits of testing include preventing bugs, reducing development costs and improving performance. Test management plan.', 'Mr.Pawan ', 'Hindi ', '90', '', 0.00, '', 'qpix-virtual-class1.PNG', '', 'https://youtu.be/oOvURgHcd4w', 1, '324254,400080', 25, 1, '2', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-07-31 16:12:03', '2023-08-09 13:25:16', 0),
(28, 1, 6, 'Selenium WebDriver', 'Tester', 'Selenium WebDriver with Java -Basics to Advanced + Frameworks', 'Rahul Shetty', 'English', '30', '2500', 0.00, '', 'maxresdefault1.jpg', '', 'https://www.youtube.com/embed/QLCrVmy61Co', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 12445567, '2023-08-01 12:16:22', '2023-08-17 12:56:52', 0),
(29, 35, 3, 'Cyber Forensic', 'hgv', 'dff', 'Ninad pawar', 'python', '100', '2345', 0.00, '', 'ss1.png', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 1, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-02 12:27:14', '2023-08-04 11:54:48', 0),
(30, 1, 1, 'Share Market', 'Share Market Title', 'Share Market Desc', 'Ais Sir', 'English', '2', '0', 0.00, '', '16843882487893.JPEG', '', 'https://www.youtube.com/embed/fdLeHXpfST4', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 1234, '2023-08-02 15:23:49', '2023-08-04 11:54:48', 0),
(31, 1, 6, 'Mathmatics', 'Mathmatics', 'Mathmatics', 'Sunny', 'English', '30', '0', 0.00, '', 'Screenshot_2023-04-02_at_7_31_26_AM1.png', '', 'https://www.youtube.com/embed/GwwhmxS8IgE', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 1000000, '2023-08-02 16:50:17', '2023-08-04 11:54:48', 1),
(32, 1, 6, 'Mathematics', 'Maths', 'By 12th grade, most students will have completed Algebra I, Algebra II, and Geometry', 'Vijay kaur', 'English', '30', '0', 0.00, '', 'Maths13.jpg', '', 'https://www.youtube.com/embed/ZIB6RSwtGig', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 12345, '2023-08-02 16:55:56', '2023-08-04 11:54:48', 0),
(33, 1, 2, 'CSS', 'Web Design', 'Web Design', 'Lisa Crispin', 'English', '30', '0', 0.00, '', 'Mysql3.png', '', 'https://www.youtube.com/embed/BsDoLVMnmZs', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 11, '2023-08-04 11:03:45', '2023-08-04 11:24:18', 1),
(34, 1, 2, 'Sets And Relations', 'gfjjh', 'rerstd', 'Vijay kaur', 'English', '30', '0', 0.00, '', 'CA3.jpg', '', 'https://www.youtube.com/embed/S5oem2R8IDI', 0, '', 100, 0, 'male', 'no', 0, 0, 0, 0, 0, '', 2, 2, '2023-08-04 11:13:21', '2023-08-04 11:24:04', 1),
(35, 1, 2, 'Web Designing', 'Web Designing', 'Web Designing', 'Vijay kaur', 'HTML', '30', '30', 0.00, '', 'Web1.jpg', '', 'https://www.youtube.com/embed/tPPffuMYsfs', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-04 11:43:01', '2023-08-04 12:01:48', 0),
(36, 1, 2, 'Computer Graphics.', 'Computer Graphics.', 'Computer Graphics.', 'Lisa Crispin', 'Hindi', '30', '0', 0.00, '', 'graphic1.jpg', '', 'https://www.youtube.com/embed/uTBKa1PSyf8', 0, '', 100, 0, 'male', 'no', 0, 0, 0, 0, 0, '', 2, 2, '2023-08-04 12:07:10', '2023-08-04 12:12:59', 0),
(37, 1, 2, 'Compute Graphics', 'Compute Graphics', 'Compute Graphics', 'Lisa Crispin', 'English', '30', '0', 0.00, '', 'graphic3.jpg', '', 'https://www.youtube.com/embed/nnBMsGrwuUE', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-07 11:25:34', '2023-08-07 11:31:12', 0),
(38, 1, 8, 'Sets And Relations', 'Sets And Relations', ' Sets And Relations', 'Lisa Crispin', 'hindi', '30', '', 0.00, '', 'rummychamp-dialy_bonus1.PNG', '', 'https://www.youtube.com/embed/T4Qi0lN0BDI', 1, '693555,400607', 100, 0, '2', 'yes', 0, 0, 0, 0, 0, '', 2, 2, '2023-08-07 11:34:36', '2023-08-10 13:27:42', 0),
(39, 1, 3, 'Cyber Forensic', 'jdfnir', 'dhbcweyj', 'Ninad pawar', 'python', '123', '0', 0.00, '', 'ss3.png', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, '', 100, 0, 'male', 'yes', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-07 12:12:06', '2023-08-17 12:27:29', 0),
(40, 1, 2, 'Types of Computer Graphics', 'Types of Computer Graphics', ' Types of Computer Graphics', 'Lisa Crispin', 'Hindi', '30', '', 0.00, '', 'punch1.PNG', '', 'https://www.youtube.com/embed/3TOoPk3sgzk', 1, '440010,693555,400607', 100, 0, '2', 'yes', 0, 0, 0, 0, 0, '', 2, 9, '2023-08-07 13:11:27', '2023-08-10 13:21:07', 0),
(41, 1, 2, '3d graphics', '3d graphics', '3d graphics', 'bvdg', 'Hindi', '30', '30', 0.00, '', 'Web5.jpg', '', 'https://www.youtube.com/embed/l95BztHFk5g', 0, '', 100, 0, 'male', 'no', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-07 16:22:07', '2023-08-07 17:34:55', 0),
(42, 20, 2, 'Interior Design', 'Interior Design', 'Interior Design', 'Lisa Crispin', 'English', '30', '0', 0.00, '', 'intre1.jpg', '', 'https://www.youtube.com/embed/8GzNcg1pi9Y', 0, '', 100, 0, 'male', 'no', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-08 13:30:43', '2023-08-08 16:54:35', 0),
(43, 1, 3, 'Networking hardware', 'Networking hardware', 'Networking hardware', 'Lisa Crispin', 'Hindi', '30', '0', 0.00, '', 'netw1.jpg', '', 'https://www.youtube.com/embed/KK9dksbVF5I', 1, '400080', 100, 21, '2', 'no', 7, 5, 5, 1, 2, '', 2, 11, '2023-08-09 12:47:10', '2023-08-09 13:09:11', 0),
(44, 1, 8, 'Cyber Forensic', 'Cyber Forensic', ' Cyber Forensic', 'Ninad pawar', 'python', '100', '', 0.00, '', '16812129870971.JPEG', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 1, '693555,400607', 100, 0, '2', 'yes', 1, 1, 6, 1, 1, '', 2, 1, '2023-08-09 14:26:53', '2023-08-10 12:58:05', 0),
(45, 1, 8, 'Database Testing', 'Data Structure', 'Data Structure', 'Lisa Crispin', 'English', '30', '0', 0.00, '', 'questpix-ui3.JPEG', '', 'https://www.youtube.com/embed/Q3SnLBVWOGI', 1, '400614', 100, 0, '2', 'no', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-09 15:34:22', '2023-08-10 11:16:16', 0),
(46, 1, 1, 'data science', 'data science', 'jhdveqvqg', 'Ninad pawar', 'English', '100', '0', 0.00, '', 'ss7.png', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 1, '4000102', 50, 45, 'female', 'no', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-09 18:23:48', '2023-08-09 18:38:03', 0),
(47, 1, 8, ' Accounting Revision for CMA', ' Accounting Revision for CMA', ' Accounting Revision for CMA', 'Vijay kaur', 'Hindi', '32', '0', 0.00, '', 'MOM-GameZone1.PNG', '', 'https://www.youtube.com/embed/T4Qi0lN0BDI', 1, '693555', 100, 0, '2', 'no', 0, 0, 0, 0, 0, '', 2, 1, '2023-08-10 13:12:37', '2023-08-10 13:14:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coursevideo`
--

CREATE TABLE `tbl_coursevideo` (
  `id` int NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `chapter_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `videos` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `content_type` tinyint NOT NULL,
  `sort` int NOT NULL,
  `minute` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_coursevideo`
--

INSERT INTO `tbl_coursevideo` (`id`, `course_id`, `chapter_id`, `name`, `title`, `description`, `videos`, `video_link`, `content_type`, `sort`, `minute`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, '', '1', 'test', 'test', '1234', '', 'https://www.youtube.com/embed/0n7AWxYCj9I', 0, 32323, '20', '2023-07-12 07:37:16', '2023-07-12 07:37:16', 0),
(2, '', '2', 'pentration', 'eee', ' cddv', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, 1, '12', '2023-07-12 08:38:18', '2023-07-12 08:40:31', 0),
(3, '', '2', 'pentration', 'test', 'test', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, 121212, '19', '2023-07-12 08:40:48', '2023-07-12 08:40:48', 0),
(4, '', '2', 'test', 'test', 'test', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, 1234, '10', '2023-07-12 08:41:00', '2023-07-12 08:41:00', 0),
(5, '', '3', 'Basics of SDLC', 'Test', ' Basics of SDLC', '', 'https://www.youtube.com/embed/kSU2MPeptpM', 0, 2, '10', '2023-07-12 08:54:31', '2023-07-12 08:54:40', 0),
(6, '', '4', 'Methods', 'java', 'Basics of methods', '', 'https://www.youtube.com/embed/7AanUxN-NzI', 0, 12, '10', '2023-07-12 09:30:46', '2023-07-12 09:30:46', 0),
(7, '', '4', 'OOps concept', 'Java', 'Java OOPs Concepts - Classes, Objects and Methods in Java', '', 'https://www.youtube.com/embed/7WhnYwoBY24', 0, 1234, '10', '2023-07-12 11:46:47', '2023-07-12 11:46:47', 0),
(8, '', '6', 'Exception Handling', 'Java', 'In computing and computer programming, exception handling is the process of responding to the occurrence of exceptions – anomalous or exceptional conditions requiring special processing – during the execution of a program.', '', 'https://www.youtube.com/embed/8WTVLa1Xtsk', 0, 123, '11', '2023-07-12 12:01:03', '2023-07-12 12:01:03', 0),
(9, '', '6', 'Java Practical Part 1 Try Catch', 'Exception Handling in Java Practical Part 1 Try Catch', ' Throwable class is used to handle all exception which is extended by exception and error. In exception there are two types, checked exception and unchecked exception.\r\n', '', 'https://www.youtube.com/embed/RrKmwLBEv-U', 0, 1234, '12', '2023-07-12 12:03:17', '2023-07-12 12:04:22', 0),
(10, '', '7', 'english', 'english', 'cdvsvs', '', 'https://www.youtube.com/embed/2DLIuZjuyrU', 0, 1, '12', '2023-07-13 05:05:06', '2023-07-13 06:03:02', 1),
(11, '11', '8', 'Regression Testing', 'abcd', 'Regression testing in software QA means testing the software after a development cycle to ensure everything works as intended.', '', 'https://www.youtube.com/embed/S5oem2R8IDI', 0, 11, '10', '2023-07-14 08:00:58', '2023-07-27 12:46:31', 1),
(12, '11', '8', 'Regression Testing 1', 'abde', 'What is regression testing best example?\r\nWhat is Regression Testing? Explained with Test Cases, Tools ...\r\nRegression testing is conducted after every such change. For instance, when a tester reports a broken login button. Once developers fix the bug, the login button is tested for expected results, but simultaneously, tests are also performed for other functionalities related to the login button.', '', 'https://www.youtube.com/embed/S5oem2R8IDI', 0, 12, '10', '2023-07-14 08:03:08', '2023-07-27 12:46:31', 1),
(13, '12', '9', ' Basic Introduction of Financial Accounting', 'Financial Accounting', 'Accounting is more about accurate reporting of what has already happened and compliance with laws and standards. Finance is about looking forward and growing a pot of money or mitigating losses. If you like thinking in terms of a longer time horizon, you may be happier in finance than in accounting.', '', 'https://www.youtube.com/embed/mq6KNVeTE3A', 0, 12345, '12', '2023-07-14 10:15:35', '2023-07-14 10:15:35', 0),
(14, '1', '10', 'Test java video', 'Test java video', 'Test java video', '', 'https://youtu.be/ntLJmHOJ0ME', 0, 1234, '10', '2023-07-18 09:39:45', '2023-07-18 09:39:45', 0),
(15, '13', '11', '1', '1', '1', '', 'https://www.youtube.com/embed/F9BZ5JsnjYM', 0, 1, '10', '2023-07-18 11:11:27', '2023-07-18 11:11:27', 0),
(16, '13', '11', 'Lec 02 - Rational Numbers', '2', '2', '', 'https://www.youtube.com/embed/jHBIJ50DhJQ', 0, 2, '12', '2023-07-18 11:13:35', '2023-07-18 11:13:35', 0),
(17, '13', '11', 'Lec 02 - Rational Numbers', '3', '  Rational Numbers', '', 'https://www.youtube.com/embed/jHBIJ50DhJQ', 0, 3, '12', '2023-07-18 11:26:52', '2023-07-18 11:27:02', 0),
(18, '14', '12', 'Differential Equation of First Order and First Degree', 'Differential Equation of First Order and First Degree', 'A differential equation of first order and first degree can be written as f( x, y, dy/dx) = 0. A differential equation of first order and first degree can be written as f( x, y, dy/dx) = 0.', '', 'https://www.youtube.com/embed/WXZETpHneec', 0, 1, '11', '2023-07-20 13:38:35', '2023-07-20 13:38:35', 0),
(19, '15', '13', 'Basic Concept of Accounting ', 'Basic Concept of Accounting ', 'A chartered accountant (CA) is a financial professional who is qualified to execute certain accounting procedures. It also refers to an accounting ', '', 'https://www.youtube.com/embed/eaJosm9Y5dQ', 0, 1, '13', '2023-07-20 14:48:32', '2023-07-20 14:48:32', 0),
(20, '15', '13', 'Journal Entries Accounting', 'Journal Entries Accounting', 'A journal is a concise record of all transactions a business conducts; journal entries detail how transactions affect accounts and balances.', '', 'https://www.youtube.com/embed/zjo57RIE3mk', 0, 2, '12', '2023-07-20 14:49:55', '2023-07-20 14:49:55', 0),
(21, '15', '14', 'Government Accounting Revision for CMA', 'Government Accounting Revision for CMA', 'What is the basic government accounting?\r\nGovernment accounting is the recording and management of all financial transactions carried out by a government at any level: local, state or federal. Its purpose is to track revenue, from sources such as taxes, and expenditures on public services and goods. That primary purpose encompasses several activities.', '', 'https://www.youtube.com/embed/T4Qi0lN0BDI', 0, 2, '12', '2023-07-20 14:52:51', '2023-07-20 14:52:51', 0),
(22, '15', '14', 'Government Accounting Revision for CMA', 'Government Accounting Revision for CMA', 'What is the basic government accounting?\r\nGovernment accounting is the recording and management of all financial transactions carried out by a government at any level: local, state or federal. Its purpose is to track revenue, from sources such as taxes, and expenditures on public services and goods. That primary purpose encompasses several activities.', '', 'https://www.youtube.com/embed/T4Qi0lN0BDI', 0, 2, '12', '2023-07-20 14:53:31', '2023-07-20 14:53:31', 0),
(23, '18', '16', 'What is MySQL? | Types of Database & How to Create It?', 'Types of Database & How to Create It?', 'A database consists of one or more tables. You will need special CREATE privileges to create or to delete a MySQL database.\r\n', '', 'https://www.youtube.com/embed/nnBMsGrwuUE', 0, 1, '12', '2023-07-25 16:47:35', '2023-07-25 16:47:35', 0),
(24, '19', '17', 'Abhishek Tiwari', 'java scrpt', 'ere are following features of JavaScript:\n\nAll popular web browsers support JavaScript as they provide built-in execution environments.\nJavaScript follows the syntax and structure of the C programming language. Thus, it is a structured programming language.\nJavaScript is a weakly typed language, where certain types are implicitly cast (depending on the operation).\nJavaScript is an object-oriented programming language that uses prototypes rather than using classes for inheritance.\nIt is a light-weighted and interpreted language.\nIt is a case-sensitive language.\nJavaScript is supportable in several operating systems including, Windows, macOS, etc.\nIt provides good control to the users over the web browsers.\nHistory of JavaScript\nIn 1993, Mosaic, the first popular web browser, came into existence. In the year 1994, Netscape was founded by Marc Andreessen. He realized that the web needed to become more dynamic. Thus, a \'glue language\' was believed to be provided to HTML to make web designing easy for designers and part-time programmers. Consequently, in 1995, the company recruited Brendan Eich intending to implement and embed Scheme programming language to the browser. But, before Brendan could start, the company merged with Sun Microsystems for adding Java into its Navigator so that it could compete with Microsoft over the web technologies and platforms. Now, two languages were there: Java and the scripting language. Further, Netscape decided to give a similar name to the scripting language as Java\'s. It led to \'Javascript\'. Finally, in May 1995, Marc Andreessen coined the first code of Javascript named \'Mocha\'. Later, the marketing team replaced the name with \'LiveScript\'. But, due to trademark reasons and certain other reasons, in December 1995, the language was finally renamed to \'JavaScript\'. From then, JavaScript came into existence.', '', 'https://youtu.be/hKB-YGF14SY', 0, 1, '56', '2023-07-25 16:52:19', '2023-07-26 18:40:51', 1),
(25, '18', '18', 'How to Create a Table in MySQL?', ' MySQL Tutorial for Beginners', 'In this video, learn How to Create a Table in MySQL? | MySQL Tutorial for Beginners. Find all the videos of the MySQL Course in this playlistIn this video, learn How to Create a Table in MySQL? | MySQL Tutorial for Beginners. Find all the videos of the MySQL Course in this playlistIn this video, learn How to Create a Table in MySQL? | MySQL Tutorial for Beginners. Find all the videos of the MySQL Course in this playlist', '', 'https://www.youtube.com/embed/uIcGi4jK5gk', 0, 1, '15', '2023-07-25 17:32:31', '2023-07-25 17:32:31', 0),
(26, '18', '21', 'MySQL Add Data Into Tables using the INSERT Query ', 'MySQL Tutorial for Beginners', '  It is possible to write the INSERT INTO statement in two ways: 1. Specify both the column names and the values to be inserted: INSERT INTO table_name (column1, ...\r\n?MySQL INSERT() Function ', '', 'https://www.youtube.com/embed/8_iQLPPVboM', 0, 2, '12', '2023-07-25 17:59:20', '2023-07-25 18:04:27', 0),
(27, '18', '21', 'MySQL IN 10 MINUTES | Introduction to Databases, SQL, & MySQL', 'MySQ', 'This tutorial provides and introduction to Databases, SQL and the open source relational database- MySQL.\r\n\r\nVideo Timestamps: \r\n\r\n00:12 Introduction to Databases\r\n04:56 Introduction to SQL\r\n06:53 Introduction to MySQL\r\n', '', 'https://www.youtube.com/embed/2bW3HuaAUcY', 0, 3, '11', '2023-07-25 18:03:59', '2023-07-25 18:03:59', 0),
(28, '20', '22', 'JAVA', 'JAVA', '  Introduction to Java + Installing Java JDK and IntelliJ IDEA for Java', '', 'https://www.youtube.com/embed/X0zdAG7gfgs', 0, 1234, '10', '2023-07-25 18:20:54', '2023-07-27 10:07:44', 1),
(29, '18', '16', 'What Is MySQL ', 'Mysql', 'Learn what is MySQL, the most popular open-source relational database management system. Start your online journey now with Hostinger web hosting ', '', 'https://www.youtube.com/embed/spplA2eetXc', 0, 2, '12', '2023-07-26 11:25:16', '2023-07-26 11:25:16', 0),
(30, '18', '16', 'What is SQL?', 'What is SQL? Future Career Scope & Resources', 'What is SQL? Future Career Scope & Resources', '', 'https://www.youtube.com/embed/UOJZTqA5Loc', 0, 2, '14', '2023-07-26 11:26:20', '2023-07-26 11:26:20', 0),
(31, '18', '16', 'Introduction to Oracle Database ', 'What is Oracle? full Explanation', 'Introduction to Oracle Database | What is Oracle? full Explanation', '', 'https://www.youtube.com/embed/jgbomQbLc74', 0, 2, '12', '2023-07-26 11:27:24', '2023-07-26 11:27:24', 0),
(32, '18', '21', 'Oracle Database Objects', 'Oracle Database Objects | Learn Coding', '\r\nIn Oracle Forms, code is placed in triggers, which execute the code when that trigger event occurs. Implementing complex logic may require scattering its code across multiple triggers', '', 'https://www.youtube.com/embed/TXDoyN9LO-M', 0, 4, '12', '2023-07-26 12:05:40', '2023-07-26 12:05:40', 0),
(33, '18', '26', 'Oracle Database Constraints ', 'Domain Integrity Constraint in SQL | Default, Not Null and Check Constraints', 'Domain Integrity Constraint in SQL | Default, Not Null and Check Constraints123', '', 'https://www.youtube.com/embed/lVq_5653MBo', 0, 4, '12', '2023-07-26 12:24:10', '2023-07-26 12:24:10', 0),
(34, '20', '23', 'Variables in Java', 'Java123', 'Variables in Java by Deepak (Hindi) - Part 1', '', 'https://www.youtube.com/embed/aI5zJoiw8nw', 0, 1, '12', '2023-07-26 13:04:46', '2023-07-27 10:07:44', 1),
(35, '21', '27', 'JAVA', 'JAVA', 'Introduction to Java + Installing Java JDK and IntelliJ IDEA for Java', '', 'https://youtu.be/ntLJmHOJ0ME', 0, 1, '18', '2023-07-27 11:34:04', '2023-07-27 11:34:04', 0),
(36, '21', '27', 'JAVA', 'JAVA', 'Basic Structure of a Java Program: Understanding our First Java Hello World Program', '', 'https://youtu.be/zIdg7hkqNE0', 0, 2, '18', '2023-07-27 11:36:03', '2023-07-27 11:36:03', 0),
(37, '21', '27', 'JAVA', 'Java Tutorial:', 'Java Tutorial: Variables and Data Types in Java Programming', '', 'https://youtu.be/X0zdAG7gfgs', 0, 3, '30', '2023-07-27 11:37:46', '2023-07-27 11:37:46', 0),
(38, '21', '28', 'JAVA', 'Java Tutorial', ' Literals in Java', '', 'https://youtu.be/b2VJmyarV3I', 0, 1, '10', '2023-07-27 11:47:20', '2023-07-27 11:47:20', 0),
(39, '21', '28', 'JAVA', 'Java Tutorial', '  Getting User Input in Java', '', 'https://youtu.be/HRfmLqqvzUs', 0, 2, '18', '2023-07-27 11:48:15', '2023-07-27 11:48:43', 0),
(40, '21', '28', 'JAVA', 'Java Programming Exercise 1', 'CBSE Board Percentage Calculator', '', 'https://youtu.be/C5me8SeuW9M', 0, 3, '18', '2023-07-27 11:50:31', '2023-07-27 11:50:31', 0),
(41, '25', '34', 'Python ', 'Introduction ', 'Introduction to Programming & Python | Python Tutorial', '', 'https://youtu.be/7wnove7K-ZQ', 0, 1, '12', '2023-07-27 14:57:16', '2023-07-27 14:57:16', 0),
(42, '25', '34', 'Python ', 'IF- Else ', 'Short hand if else statements', '', 'https://youtu.be/Qqx_zNmQVGI', 0, 2, '10', '2023-07-27 15:01:31', '2023-07-27 15:04:45', 1),
(43, '25', '34', 'Python ', 'Loops ', 'For Loops in Python | Python Tutorial ', '', 'https://youtu.be/fIYVzKp0q5w', 0, 3, '12', '2023-07-27 15:03:55', '2023-07-27 15:04:48', 1),
(44, '25', '34', 'Python ', 'Python Tutorial', 'Some Amazing Python Programs - The Power of Python ', '', 'https://youtu.be/Tto8TS-fJQU', 0, 2, '10', '2023-07-27 15:06:16', '2023-07-27 15:06:16', 0),
(45, '25', '34', 'Python ', ' Python Tutorial', ' Modules and Pip ', '', 'https://youtu.be/xwKO_y2gHxQ', 0, 3, '12', '2023-07-27 15:08:29', '2023-07-27 15:38:52', 0),
(46, '25', '34', 'Python ', ' Python Tutorial', 'Our First Python Program |', '', 'https://youtu.be/7IWOYhfAcVg', 0, 4, '15', '2023-07-27 15:12:35', '2023-07-27 15:12:35', 0),
(47, '25', '34', 'Python ', 'Python Tutorial', 'Variables and Data Types | ', '', 'https://youtu.be/ORCuz7s5cCY', 0, 5, '20', '2023-07-27 15:38:29', '2023-07-27 15:38:29', 0),
(48, '4', '1', 'test123213', 'test123213', 'test123213', '', 'https://www.youtube.com/embed/0n7AWxYCj9I', 0, 245, '20', '2023-07-28 10:47:05', '2023-07-31 12:47:37', 1),
(49, '25', '35', 'Python ', 'Python Tutorial', 'If Else Conditional Statements in Python ', '', 'https://youtu.be/ceiuLR2ysas', 0, 1, '15', '2023-07-28 10:56:09', '2023-07-28 10:56:09', 0),
(50, '26', '36', 'test', 'test', 'test', '', 'https://www.youtube.com/embed/ZWGiBbZdO1Q', 0, 1213, '23', '2023-07-28 10:56:31', '2023-07-31 12:49:30', 1),
(51, '26', '36', 'another video', 'test', 'test', '', 'https://www.youtube.com/embed/8JhdiDiZMNE', 0, 12345, '20', '2023-07-28 10:57:24', '2023-07-31 12:49:30', 1),
(52, '25', '35', 'Python ', ' Python Tutorial', ' Exercise 2: Good Morning Sir ', '', 'https://youtu.be/d7ng_aV4qdI', 0, 2, '10', '2023-07-28 10:58:27', '2023-07-28 10:58:27', 0),
(53, '25', '35', 'Python ', ' Python Tutorial', 'Match Case Statements in Python ', '', 'https://youtu.be/bthQCK1QAmQ', 0, 3, '15', '2023-07-28 11:02:35', '2023-07-28 11:02:35', 0),
(54, '25', '37', 'Python ', 'Python Tutorial', ' For Loops in Python | ', '', 'https://youtu.be/fIYVzKp0q5w', 0, 1, '15', '2023-07-28 17:22:46', '2023-07-28 17:23:08', 0),
(55, '25', '37', 'Python ', 'Python Tutorial ', 'While Loops in Python ', '', 'https://youtu.be/-tCFyIyKVx0', 0, 2, '12', '2023-07-28 17:24:57', '2023-07-28 17:24:57', 0),
(56, '25', '37', 'Python ', 'break and continue in Python | Python Tutorial ', 'break and continue in Python ', '', 'https://youtu.be/RkwJnjdrm70', 0, 4, '18', '2023-07-28 17:27:15', '2023-07-28 17:27:15', 0),
(57, '25', '37', 'Python ', 'Python Tutorial', 'Functions in Python | ', '', 'https://youtu.be/dyvxxJSGUsE', 0, 4, '12', '2023-07-28 17:31:40', '2023-07-28 17:31:40', 0),
(58, '25', '38', 'Python ', ' Python Tutorial', '\r\nf-strings in Python', '', 'https://youtu.be/ixmxgUf8yIg', 0, 1, '18', '2023-07-29 11:32:22', '2023-07-29 11:32:22', 0),
(59, '25', '38', 'Python ', 'Python Tutorial', 'Docstrings in Python | ', '', 'https://youtu.be/SJzsNd7SM0g', 0, 2, '18', '2023-07-29 11:34:18', '2023-07-29 11:34:18', 0),
(60, '25', '38', 'Python ', ' Python Tutorial', 'Recursion in Python', '', 'https://youtu.be/XYwJKFB8DUk', 0, 3, '10', '2023-07-29 11:44:42', '2023-07-29 11:44:42', 0),
(61, '25', '38', 'Python ', '  Python Tutorial', 'Sets in Python', '', 'https://youtu.be/l3kCO8cVA6o', 0, 4, '15', '2023-07-29 11:46:20', '2023-07-29 11:46:20', 0),
(62, '19', '20', 'JavaScript ', ' JavaScript Tutorial ', 'Introduction to JavaScript + Setup', '', 'https://youtu.be/ER9SspLe4Hg', 0, 1, '15', '2023-07-29 13:56:46', '2023-08-17 13:02:53', 1),
(63, '19', '20', 'JavaScript ', ' JavaScript Tutorial', 'Variables in JavaScript', '', 'https://youtu.be/Q4p8vRQX8uY', 0, 2, '18', '2023-07-29 13:58:00', '2023-08-17 13:02:53', 1),
(64, '19', '20', 'JavaScript ', 'JavaScript Tutorial', 'const, let and var in JavaScript', '', 'https://youtu.be/Icev9Oxf0WA', 0, 3, '12', '2023-07-29 13:59:17', '2023-08-17 13:02:53', 1),
(65, '19', '20', 'JavaScript ', ' JavaScript Tutorial', 'Primitives and Objects in JavaScript', '', 'https://youtu.be/qpU3WIqRz9I', 0, 4, '15', '2023-07-29 14:00:34', '2023-08-17 13:02:53', 1),
(66, '19', '19', 'JavaScript ', ' JavaScript Tutorial', 'JavaScript Operators and Expressions ', '', 'https://youtu.be/lsV8JQgSW1s', 0, 1, '30', '2023-07-29 14:02:44', '2023-08-17 13:02:56', 1),
(67, '28', '40', 'Install Java and Eclipse', 'Setup of Java', 'Install Java and Eclipse || Setup of Java. Find the video of Selenium Java course in this playlist.', '', 'https://www.youtube.com/embed/xXrPA_ONxK4', 0, 1, '8', '2023-08-01 15:13:38', '2023-08-01 15:13:38', 0),
(68, '28', '41', 'Course Strategy to learn Java basics for Selenium Automation', 'Introduction to Java variables and Data type', ' What are Arrays in Java? How to initialize and retrieve the values of array. || Strings in Java - How to declare Strings & Important String methods', '', 'https://www.youtube.com/embed/X0zdAG7gfgs', 0, 1, '25', '2023-08-01 15:58:09', '2023-08-01 15:58:45', 0),
(69, '30', '42', 'share video', 'share video', 'share video', '', 'https://www.youtube.com/embed/fdLeHXpfST4', 0, 134, '30', '2023-08-02 15:24:43', '2023-08-02 15:32:33', 0),
(70, '30', '42', 'Share video 2', 'Share video 2', 'sdsa', '', 'https://www.youtube.com/embed/GwwhmxS8IgE', 0, 12341, '20', '2023-08-02 15:36:34', '2023-08-02 15:36:34', 0),
(71, '32', '43', 'Algebra', 'Algebra', 'Algebra 1', '', 'https://www.youtube.com/embed/MyuqyXViG5I', 0, 1, '12', '2023-08-02 16:58:04', '2023-08-02 16:58:04', 0),
(72, '32', '44', 'Linear Equation class 2', 'Linear Equation class 2', 'Linear Equation class 2', '', 'https://www.youtube.com/embed/01EqB4UIhGE', 0, 2, '10', '2023-08-02 17:01:43', '2023-08-02 17:01:43', 0),
(73, '32', '45', 'Matrix', 'Matrix', 'Matrix', '', 'https://www.youtube.com/embed/0AjHSUA31E0', 0, 3, '10', '2023-08-02 17:06:01', '2023-08-02 17:06:01', 0),
(74, '33', '46', 'Css', 'css', 'sdxfdgfbdff', '', 'https://www.youtube.com/embed/EUtlj7xdO1o', 0, 11, '12', '2023-08-04 11:05:38', '2023-08-04 11:24:18', 1),
(75, '33', '46', 'asdad', 'sdsafa', 'dzdffgrfwr', '', 'https://www.youtube.com/embed/tPPffuMYsfs', 0, 2, '10', '2023-08-04 11:06:11', '2023-08-04 11:24:18', 1),
(76, '34', '', 'Sets And Relations', 'sdadfsd', 'sdfsdgsfgf', '', 'https://www.youtube.com/embed/mq6KNVeTE3A', 0, 1, '10', '2023-08-04 11:13:42', '2023-08-04 11:24:04', 1),
(77, '34', '', 'dgfdfgg', 'fgfdhh', 'bfbdfgbfg', '', 'https://www.youtube.com/embed/jHBIJ50DhJQ', 0, 11, '10', '2023-08-04 11:13:58', '2023-08-04 11:24:04', 1),
(78, '35', '48', 'Basics of Web Designing.', 'Basics of Web Designing.', 'Basics of Web Designing.', '', 'https://www.youtube.com/embed/K4evu-L0teQ', 0, 1, '12', '2023-08-04 11:44:50', '2023-08-04 11:44:50', 0),
(79, '35', '48', 'Web Technologies.', 'Web Technologies.', ' Web Technologies.', '', 'https://www.youtube.com/embed/BMzp_U6IkoY', 0, 2, '10', '2023-08-04 11:45:57', '2023-08-04 11:46:09', 0),
(80, '36', '', '2d computer graphics', '2d computer graphics', '2d computer graphics', '', 'https://www.youtube.com/embed/sqSJpEbu7jc', 0, 2, '12', '2023-08-04 12:08:47', '2023-08-04 12:08:47', 0),
(81, '36', '', '3d computer graphics', '3d computer graphics', '3d computer graphics', '', 'https://www.youtube.com/embed/k_oSY-TBQEc', 0, 2, '12', '2023-08-04 12:09:37', '2023-08-04 12:09:37', 0),
(82, '37', '50', 'Raster Graphics:', 'Raster Graphics:', 'Raster Graphics:', '', 'https://www.youtube.com/embed/l5N6dv-qBzE', 0, 1, '10', '2023-08-07 11:28:49', '2023-08-07 11:28:49', 0),
(83, '37', '50', 'Vector Scan Display', 'Vector Scan Display', 'Vector Scan Display', '', 'https://www.youtube.com/embed/31nXNF14q9E', 0, 2, '12', '2023-08-07 11:30:00', '2023-08-07 11:30:00', 0),
(84, '37', '50', 'aster and Random scan Systems', 'aster and Random scan Systems', 'aster and Random scan Systems', '', 'https://www.youtube.com/embed/DnsRfFC3514', 0, 3, '10', '2023-08-07 11:30:51', '2023-08-07 11:30:51', 0),
(85, '42', '', 'Basic interior design', 'Basic interior design', 'Basic interior design', '', 'https://www.youtube.com/embed/8GzNcg1pi9Y', 0, 1, '12', '2023-08-08 16:35:10', '2023-08-08 16:35:10', 0),
(86, '42', '', 'Elements of Design', 'Elements of Design', 'Elements of Design', '', 'https://www.youtube.com/embed/qW7KxKZsCRk', 0, 2, '10', '2023-08-08 16:36:19', '2023-08-08 16:36:19', 0),
(87, '42', '', 'Principles of Design', 'Principles of Design', 'Principles of Design', '', 'https://www.youtube.com/embed/n7XTPwp0k5o', 0, 3, '12', '2023-08-08 16:37:16', '2023-08-08 16:37:16', 0),
(88, '42', '', 'Interior Design Styles', 'Interior Design Styles', 'Interior Design Styles', '', 'https://www.youtube.com/embed/QiHJVP6oFpw', 0, 4, '12', '2023-08-08 16:38:11', '2023-08-08 16:38:11', 0),
(89, '42', '', 'Silk VS Cotton (Interior Fabrics)', 'Silk VS Cotton (Interior Fabrics)', 'Silk VS Cotton (Interior Fabrics)', '', 'https://www.youtube.com/embed/jQJjSsjIp6k', 0, 5, '12', '2023-08-08 16:39:40', '2023-08-08 16:39:40', 0),
(90, '43', '', 'How to Connect Two Computers and share files using Lan Cable', 'How to Connect Two Computers and share files using Lan Cable', 'How to Connect Two Computers and share files using Lan Cable', '', 'https://www.youtube.com/embed/192gA8F8ULM', 0, 11, '10', '2023-08-09 12:48:45', '2023-08-09 12:48:45', 0),
(91, '43', '', 'How to transfer files from PC to PC using WiFi Windows ', 'How to transfer files from PC to PC using WiFi Windows ', 'How to transfer files from PC to PC using WiFi Windows ', '', 'https://www.youtube.com/embed/yNtzVoZ_rrs', 0, 12, '12', '2023-08-09 12:51:32', '2023-08-09 12:51:32', 0),
(92, '43', '', 'CompTIA A+ Certification Video Course 220-801', 'CompTIA A+ Certification Video Course 220-801', 'CompTIA A+ Certification Video Course 220-801', '', 'https://www.youtube.com/embed/pgJEhzIRfMY', 0, 13, '10', '2023-08-09 12:52:33', '2023-08-09 12:52:33', 0),
(93, '28', '39', 'Manual Software Testing Training Part-1', 'Manual Software Testing Training Part-1', 'Manual Software Testing Training Part-1', '', 'https://www.youtube.com/embed/oOvURgHcd4w', 0, 1, '10', '2023-08-09 13:19:20', '2023-08-09 13:19:20', 0),
(94, '28', '39', 'Manual Software Testing Training Part-7', 'Manual Software Testing Training Part-7', 'Manual Software Testing Training Part-7', '', 'https://www.youtube.com/embed/_AnZUfQigr0', 0, 2, '12', '2023-08-09 13:20:10', '2023-08-09 13:20:10', 0),
(95, '28', '39', 'Manual Software Testing Training Part-5', 'Manual Software Testing Training Part-5', 'Manual Software Testing Training Part-5', '', 'https://www.youtube.com/embed/0gpm4llQ06Y', 0, 3, '12', '2023-08-09 13:20:58', '2023-08-09 13:20:58', 0),
(96, '45', '', 'Database Testing | Environment Setup', 'Database Testing | Environment Setup', 'Database Testing | Environment Setup', '', 'https://www.youtube.com/embed/MiihLu66ERI', 0, 11, '12', '2023-08-09 15:35:51', '2023-08-09 15:35:51', 0),
(97, '45', '', 'Database Testing | Stored Procedure Testing', 'Database Testing | Stored Procedure Testing', 'Database Testing | Stored Procedure Testing', '', 'https://www.youtube.com/embed/gzZwsBWshiU', 0, 2, '10', '2023-08-09 15:36:57', '2023-08-09 15:36:57', 0),
(98, '47', '', ' Accounting Revision for CMA ', ' Accounting Revision for CMA ', ' Accounting Revision for CMA ', '', 'https://www.youtube.com/embed/T4Qi0lN0BDI', 0, 1, '10', '2023-08-10 13:13:55', '2023-08-10 13:13:55', 0),
(99, '40', '51', 'Regression Testing', 'Regression Testing', 'Regression Testing', '', 'https://www.youtube.com/embed/T4Qi0lN0BDI', 0, 1, '12', '2023-08-10 13:18:43', '2023-08-10 13:18:43', 0),
(100, '39', '52', 'Regression Testing 1', 'Regression Testing 1', ' Regression Testing 1', '', '16812129870973.JPEG', 1, 1, '12', '2023-08-17 12:09:49', '2023-08-17 17:00:21', 0),
(101, '39', '52', 'Sets And Relations', 'Sets And Relations', 'Sets And Relations', '', 'Barabar_Equal_opportunity11.pdf', 2, 1, '', '2023-08-17 12:22:44', '2023-08-17 12:22:44', 0),
(102, '28', '54', 'Testpad', 'Testpad', 'Testpad', '', 'Untitled1.png', 1, 2, '', '2023-08-17 12:45:42', '2023-08-17 17:00:18', 0),
(103, '28', '54', 'TestComplete', 'TestComplete', 'TestComplete', '', 'https://www.youtube.com/embed/S5oem2R8IDI', 0, 2, '10', '2023-08-17 12:46:34', '2023-08-17 17:00:00', 0),
(104, '28', '54', 'TestLink', 'TestLink', 'TestLink', '', 'Barabar_Equal_opportunity13.pdf', 2, 3, '', '2023-08-17 12:47:07', '2023-08-17 12:47:07', 0),
(105, '19', '55', 'Appium Tutorial – A Detailed Guide On Appium Testing', 'Appium Tutorial – A Detailed Guide On Appium Testing', 'Appium Tutorial – A Detailed Guide On Appium Testing', '', 'appium1.png', 1, 1, '', '2023-08-17 13:05:16', '2023-08-17 16:59:48', 0),
(106, '19', '56', 'Introduction To Appium: What Is Appium And Its Architecture', 'Introduction To Appium: What Is Appium And Its Architecture', 'Introduction To Appium: What Is Appium And Its Architecture', '', 'https://www.youtube.com/embed/mq6KNVeTE3A', 0, 3, '15', '2023-08-17 13:12:26', '2023-08-17 16:59:40', 0),
(107, '19', '57', 'Introduction to mobile automation testing', 'Introduction to mobile automation testing', 'Introduction to mobile automation testing', '', 'Barabar_Equal_opportunity15.pdf', 2, 3, '', '2023-08-17 13:18:20', '2023-08-17 13:18:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_purchase`
--

CREATE TABLE `tbl_course_purchase` (
  `id` int NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course_purchase`
--

INSERT INTO `tbl_course_purchase` (`id`, `course_id`, `user_id`, `amount`, `purchase_date`, `expiry_date`, `payment_status`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, '1', '1', '2000', '2023-07-12 07:34:48', '2023-10-10 07:34:48', '1', '2023-07-12 07:34:48', '2023-07-12 07:34:48', 0),
(2, '9', '92', '500', '2023-07-17 11:14:48', '2023-10-25 11:14:48', '1', '2023-07-17 11:14:48', '2023-07-17 11:14:48', 0),
(3, '12', '92', '2000', '2023-07-17 12:33:37', '2023-11-14 12:33:37', '1', '2023-07-17 12:33:37', '2023-07-17 12:33:37', 0),
(4, '6', '36', '0', '2023-07-18 07:43:02', '2023-08-17 13:13:02', '1', '2023-07-18 07:44:12', '2023-07-18 07:44:27', 0),
(5, '3', '92', '5000', '2023-07-18 10:23:03', '2024-01-14 10:23:03', '1', '2023-07-18 10:23:03', '2023-07-18 10:23:03', 0),
(6, '7', '115', '1000', '2023-07-19 13:12:07', '2023-11-16 13:12:07', '1', '2023-07-19 13:12:07', '2023-07-19 13:12:07', 0),
(7, '13', '116', '5000', '2023-07-19 13:34:25', '2023-10-27 13:34:25', '1', '2023-07-19 13:34:25', '2023-07-19 13:34:25', 0),
(8, '13', '121', '5000', '2023-07-20 11:04:05', '2023-10-28 11:04:05', '1', '2023-07-20 11:04:05', '2023-07-20 11:04:05', 0),
(9, '14', '129', '0', '2023-07-20 15:17:38', '2023-08-24 15:17:38', '1', '2023-07-20 15:17:56', '2023-07-20 15:17:56', 0),
(10, '14', '128', '5000', '2023-07-20 15:46:53', '2024-02-05 15:46:53', '1', '2023-07-20 15:46:53', '2023-07-20 15:46:53', 0),
(11, '14', '128', '5000', '2023-07-20 18:06:18', '2024-02-05 18:06:18', '1', '2023-07-20 18:06:18', '2023-07-20 18:06:18', 0),
(12, '5', '136', '1000', '2023-07-24 11:40:30', '2023-11-01 11:40:30', '1', '2023-07-24 11:40:30', '2023-07-24 11:40:30', 0),
(13, '11', '126', '1000', '2023-07-24 11:41:00', '2023-09-22 11:41:00', '1', '2023-07-24 11:41:00', '2023-07-24 11:41:00', 0),
(14, '6', '136', '2500', '2023-07-24 11:52:36', '2024-02-09 11:52:36', '1', '2023-07-24 11:52:36', '2023-07-25 11:31:54', 1),
(15, '4', '136', '2323', '2023-07-24 12:24:41', '2023-08-16 12:24:41', '1', '2023-07-24 12:24:41', '2023-07-25 11:32:04', 1),
(16, '2', '136', '3000', '2023-07-24 12:25:31', '2023-09-22 12:25:31', '1', '2023-07-24 12:25:31', '2023-07-24 12:25:31', 0),
(17, '14', '136', '5000', '2023-07-24 12:52:45', '2024-02-09 12:52:45', '1', '2023-07-24 12:52:45', '2023-07-24 12:52:45', 0),
(18, '7', '136', '1000', '2023-07-24 12:53:11', '2023-11-21 12:53:11', '1', '2023-07-24 12:53:11', '2023-07-24 12:53:11', 0),
(19, '2', '2', '3000', '2023-07-24 12:53:44', '2023-09-22 12:53:44', '1', '2023-07-24 12:53:44', '2023-07-24 12:53:44', 0),
(20, '5', '136', '1000', '2023-07-24 12:54:54', '2023-11-01 12:54:54', '1', '2023-07-24 12:54:54', '2023-07-24 12:54:54', 0),
(21, '15', '137', '2000', '2023-07-24 17:10:34', '2023-11-01 17:10:34', '1', '2023-07-24 17:10:34', '2023-07-24 17:10:34', 0),
(22, '14', '137', '5000', '2023-07-24 18:16:14', '2024-02-09 18:16:14', '1', '2023-07-24 18:16:14', '2023-07-24 18:16:14', 0),
(23, '17', '137', '5000', '2023-07-25 10:53:37', '2023-10-23 10:53:37', '1', '2023-07-25 10:53:37', '2023-07-25 10:53:37', 0),
(24, '13', '129', '5000', '2023-07-25 11:42:53', '2023-11-02 11:42:53', '1', '2023-07-25 11:42:53', '2023-07-25 11:42:53', 0),
(25, '14', '139', '5000', '2023-07-25 13:22:39', '2024-02-10 13:22:39', '1', '2023-07-25 13:22:39', '2023-07-25 13:22:39', 0),
(26, '17', '140', '5000', '2023-07-25 15:16:41', '2023-10-23 15:16:41', '1', '2023-07-25 15:16:41', '2023-07-25 15:16:41', 0),
(27, '6', '140', '2500', '2023-07-25 16:16:59', '2024-02-10 16:16:59', '1', '2023-07-25 16:16:59', '2023-07-25 16:16:59', 0),
(28, '15', '139', '2000', '2023-07-25 16:22:58', '2023-11-02 16:22:58', '1', '2023-07-25 16:22:58', '2023-07-25 16:22:58', 0),
(29, '18', '139', '', '2023-07-26 13:24:39', '2023-12-23 13:24:39', '1', '2023-07-26 13:24:39', '2023-07-26 13:24:39', 0),
(30, '18', '139', '', '2023-07-26 13:25:37', '2023-12-23 13:25:37', '1', '2023-07-26 13:25:37', '2023-07-26 13:25:37', 0),
(31, '9', '99', '500', '2023-07-26 16:14:52', '2023-11-03 16:14:52', '1', '2023-07-26 16:14:52', '2023-07-26 16:14:52', 0),
(32, '1', '99', '2000', '2023-07-26 17:45:47', '2023-10-24 17:45:47', '1', '2023-07-26 17:45:47', '2023-07-26 17:45:47', 0),
(33, '18', '99', '', '2023-07-26 17:55:18', '2023-12-23 17:55:18', '1', '2023-07-26 17:55:18', '2023-07-26 17:55:18', 0),
(34, '6', '131', '2500', '2023-07-27 11:53:31', '2024-02-12 11:53:31', '1', '2023-07-27 11:53:31', '2023-07-27 11:53:31', 0),
(35, '21', '131', '20000', '2023-07-27 12:35:47', '2023-11-24 12:35:47', '1', '2023-07-27 12:35:47', '2023-07-31 12:41:50', 1),
(36, '7', '139', '1000', '2023-07-27 14:48:16', '2023-11-24 14:48:16', '1', '2023-07-27 14:48:16', '2023-07-27 14:48:16', 0),
(37, '12', '145', '2000', '2023-07-31 11:40:41', '2023-11-28 11:40:41', '1', '2023-07-31 11:40:41', '2023-07-31 11:40:41', 0),
(38, '1', '145', '2000', '2023-07-31 11:41:18', '2023-10-29 11:41:18', '1', '2023-07-31 11:41:18', '2023-07-31 11:41:18', 0),
(39, '13', '139', '5000', '2023-07-31 12:53:27', '2023-11-08 12:53:27', '1', '2023-07-31 12:53:27', '2023-07-31 12:53:27', 0),
(40, '13', '151', '5000', '2023-07-31 16:57:08', '2023-11-08 16:57:08', '1', '2023-07-31 16:57:08', '2023-07-31 16:57:08', 0),
(41, '15', '151', '2000', '2023-07-31 17:00:24', '2023-11-08 17:00:24', '1', '2023-07-31 17:00:24', '2023-07-31 17:00:24', 0),
(42, '18', '154', '', '2023-07-30 13:14:26', '2023-07-31 13:14:26', '1', '2023-08-01 13:14:26', '2023-08-01 15:33:03', 0),
(43, '18', '154', '', '2023-08-01 14:51:13', '2023-12-29 14:51:13', '1', '2023-08-01 14:51:13', '2023-08-01 14:51:13', 0),
(44, '13', '157', '5000', '2023-08-02 11:56:31', '2023-08-01 11:56:31', '1', '2023-08-02 11:56:31', '2023-08-02 11:58:34', 0),
(45, '13', '157', '5000', '2023-08-02 11:59:09', '2023-11-10 11:59:09', '1', '2023-08-02 11:59:09', '2023-08-02 11:59:09', 0),
(46, '32', '176', '0', '2023-08-03 18:10:25', '2023-09-02 18:10:25', '1', '2023-08-03 18:10:25', '2023-08-03 18:10:25', 0),
(47, '34', '139', '0', '2023-08-04 11:20:50', '2023-09-03 11:20:50', '1', '2023-08-04 11:20:50', '2023-08-04 11:20:50', 0),
(48, '36', '139', '0', '2023-08-04 14:54:29', '2023-09-03 14:54:29', '1', '2023-08-04 14:54:29', '2023-08-07 11:51:31', 1),
(49, '1', '139', '2000', '2023-08-07 18:38:34', '2023-11-05 18:38:34', '1', '2023-08-07 18:38:34', '2023-08-07 18:38:34', 0),
(50, '36', '139', '0', '2023-08-08 15:18:00', '2023-09-07 15:18:00', '1', '2023-08-08 15:18:00', '2023-08-08 15:18:00', 0),
(51, '42', '139', '0', '2023-08-08 16:55:56', '2023-09-07 16:55:56', '1', '2023-08-08 16:55:56', '2023-08-08 16:55:56', 0),
(52, '41', '189', '30', '2023-08-08 18:50:10', '2023-09-07 18:50:10', '1', '2023-08-08 18:50:10', '2023-08-08 18:50:10', 0),
(53, '36', '36', '0', '2023-08-08 21:21:00', '2023-09-07 21:21:00', '1', '2023-08-08 21:21:00', '2023-08-08 21:21:00', 0),
(54, '13', '36', '5000', '2023-08-08 21:29:51', '2023-11-16 21:29:51', '1', '2023-08-08 21:29:51', '2023-08-08 21:29:51', 0),
(55, '37', '36', '0', '2023-08-08 21:33:37', '2023-09-07 21:33:37', '1', '2023-08-08 21:33:37', '2023-08-08 21:33:37', 0),
(56, '18', '36', '', '2023-08-08 21:34:44', '2024-01-05 21:34:44', '1', '2023-08-08 21:34:44', '2023-08-08 21:34:44', 0),
(57, '42', '36', '0', '2023-08-08 22:02:13', '2023-09-07 22:02:13', '1', '2023-08-08 22:02:13', '2023-08-08 22:02:13', 0),
(58, '35', '36', '30', '2023-08-09 10:32:01', '2023-09-08 10:32:01', '1', '2023-08-09 10:32:01', '2023-08-09 10:32:01', 0),
(59, '18', '151', '', '2023-08-09 11:29:51', '2024-01-06 11:29:51', '1', '2023-08-09 11:29:51', '2023-08-09 11:29:51', 0),
(60, '35', '36', '30', '2023-08-09 11:30:15', '2023-09-08 11:30:15', '1', '2023-08-09 11:30:15', '2023-08-09 11:30:15', 0),
(61, '12', '154', '2000', '2023-08-09 11:30:43', '2023-12-07 11:30:43', '1', '2023-08-09 11:30:43', '2023-08-09 11:30:43', 0),
(62, '30', '151', '0', '2023-08-09 11:38:47', '2023-08-11 11:38:47', '1', '2023-08-09 11:38:47', '2023-08-09 11:38:47', 0),
(63, '30', '151', '0', '2023-08-09 12:21:25', '2023-08-11 12:21:25', '1', '2023-08-09 12:21:25', '2023-08-09 12:21:25', 0),
(64, '42', '13', '0', '2023-08-09 13:30:04', '2023-09-08 13:30:04', '1', '2023-08-09 13:30:04', '2023-08-09 13:30:04', 0),
(65, '42', '118', '0', '2023-08-09 13:30:50', '2023-09-08 13:30:50', '1', '2023-08-09 13:30:50', '2023-08-09 13:30:50', 0),
(66, '42', '131', '0', '2023-08-09 16:30:59', '2023-09-08 16:30:59', '1', '2023-08-09 16:30:59', '2023-08-09 16:30:59', 0),
(67, '42', '151', '0', '2023-08-09 16:40:45', '2023-09-08 16:40:45', '1', '2023-08-09 16:40:45', '2023-08-09 16:40:45', 0),
(68, '36', '131', '0', '2023-08-09 16:41:39', '2023-09-08 16:41:39', '1', '2023-08-09 16:41:39', '2023-08-09 16:41:39', 0),
(69, '35', '131', '30', '2023-08-11 15:27:00', '2023-09-10 15:27:00', '1', '2023-08-11 15:27:00', '2023-08-11 15:27:00', 0),
(70, '47', '139', '0', '2023-08-11 16:51:11', '2023-09-12 16:51:11', '1', '2023-08-11 16:51:11', '2023-08-11 16:51:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_share`
--

CREATE TABLE `tbl_course_share` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `img_4` varchar(255) NOT NULL,
  `img_5` varchar(255) NOT NULL,
  `img_6` varchar(255) NOT NULL,
  `img_7` varchar(255) NOT NULL,
  `img_8` varchar(255) NOT NULL,
  `img_9` varchar(255) NOT NULL,
  `img_10` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=pending,1=approved,2=reject',
  `reason` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_course_share`
--

INSERT INTO `tbl_course_share` (`id`, `user_id`, `course_id`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `img_7`, `img_8`, `img_9`, `img_10`, `status`, `reason`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 90, 12, '64b52aa0def01.jpg', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '', '2023-07-17 11:48:48', '2023-07-17 11:48:48', 0),
(2, 90, 12, '64b52acb1261a.jpg', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '', '2023-07-17 11:49:31', '2023-07-17 11:49:31', 0),
(3, 90, 12, '64b52c389cdb0.jpg', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '', '2023-07-17 11:55:36', '2023-07-17 11:55:36', 0),
(4, 36, 6, '64b536207e653.jpg', '64b536207e89e.jpg', '64b536207e908.jpg', '64b536207e97e.jpg', '64b536207eb51.jpg', '64b536207f14b.jpg', '64b536207f3c0.jpg', '64b536207f490.jpg', '64b536207f99b.jpg', '64b536207fc4d.jpg', 1, '', '2023-07-17 12:37:52', '2023-07-18 07:41:24', 0),
(5, 13, 13, '64b6804cef3c8.jpg', '64b6804cef4af.jpg', '64b6804cef5b2.jpg', '64b6804cef6b5.jpg', '64b6804cef7c8.jpg', '64b6804cef948.jpg', '64b6804cefa51.jpg', '64b6804cefb40.jpg', '64b6804cefc56.jpg', '64b6804cefd26.jpg', 0, '', '2023-07-18 12:06:36', '2023-07-18 12:06:36', 0),
(6, 2, 2, '64b7aa14a355a.jpg', '64b7aa14a3677.jpg', '64b7aa14a3706.jpg', '64b7aa14a3794.jpg', '64b7aa14a385f.jpg', '64b7aa14a38f1.jpg', '64b7aa14a3984.jpg', '64b7aa14a39fb.jpg', '64b7aa14a3a95.jpg', '64b7aa14a3b2d.jpg', 0, '', '2023-07-19 14:47:08', '2023-07-19 14:47:08', 0),
(7, 2, 2, '64b7aa157346f.jpg', '64b7aa1573577.jpg', '64b7aa15735f7.jpg', '64b7aa157366f.jpg', '64b7aa157371f.jpg', '64b7aa15737bf.jpg', '64b7aa157385c.jpg', '64b7aa15738d6.jpg', '64b7aa1573962.jpg', '64b7aa15739cf.jpg', 0, '', '2023-07-19 14:47:09', '2023-07-19 14:47:09', 0),
(8, 2, 2, '0', '0', '0', '64b7aa37ac643.jpg', '64b7aa37ac753.jpg', '64b7aa37ac7dd.jpg', '64b7aa37ac88d.jpg', '64b7aa37ac927.jpg', '0', '64b7aa37ac96e.jpg', 0, '', '2023-07-19 14:47:43', '2023-07-19 14:47:43', 0),
(9, 2, 2, '0', '0', '0', '64b7aa81641fb.jpg', '64b7aa8164337.jpg', '64b7aa81643f9.jpg', '64b7aa81644b9.jpg', '64b7aa81645a7.jpg', '0', '64b7aa8164662.jpg', 0, '', '2023-07-19 14:48:57', '2023-07-19 14:48:57', 0),
(10, 2, 2, '0', '0', '0', '64b7aaa1800dd.jpg', '64b7aaa180224.jpg', '64b7aaa1802b8.jpg', '64b7aaa180353.jpg', '64b7aaa1803cf.jpg', '0', '64b7aaa180416.jpg', 0, '', '2023-07-19 14:49:29', '2023-07-19 14:49:29', 0),
(11, 2, 2, '0', '0', '0', '64b7aad1039d8.jpg', '64b7aad103af4.jpg', '64b7aad103bdb.jpg', '64b7aad103c77.jpg', '64b7aad103cf3.jpg', '0', '64b7aad103d3d.jpg', 1, '', '2023-07-19 14:50:17', '2023-07-24 12:53:44', 0),
(12, 116, 6, '64b7ab426e627.jpg', '64b7ab426e956.jpg', '64b7ab426ea53.jpg', '64b7ab426eb7a.jpg', '64b7ab426ebd7.jpg', '64b7ab426ebff.jpg', '64b7ab426ed66.jpg', '64b7ab426eee0.jpg', '64b7ab426ef85.jpg', '64b7ab426f068.jpg', 0, '', '2023-07-19 14:52:10', '2023-07-19 14:52:10', 0),
(13, 116, 6, '64b7ab48b9ff7.jpg', '64b7ab48ba3b6.jpg', '64b7ab48ba4a5.jpg', '64b7ab48ba583.jpg', '64b7ab48ba5e1.jpg', '64b7ab48ba612.jpg', '64b7ab48ba73e.jpg', '64b7ab48ba88f.jpg', '64b7ab48ba927.jpg', '64b7ab48baa1b.jpg', 2, 'testing', '2023-07-19 14:52:16', '2023-07-20 15:47:40', 0),
(14, 118, 13, '64b7ac9a0189c.jpg', '64b7ac9a02346.jpg', '64b7ac9a02cb5.jpg', '64b7ac9a036ff.jpg', '64b7ac9a0405b.jpg', '64b7ac9a049cd.jpg', '64b7ac9a05381.jpg', '64b7ac9a05cdd.jpg', '64b7ac9a06739.jpg', '64b7ac9a0723b.jpg', 1, '', '2023-07-19 14:57:54', '2023-07-19 14:59:56', 0),
(15, 118, 13, '64b7ad825396c.jpg', '64b7ad8254056.jpg', '64b7ad82546e7.jpg', '64b7ad8254d87.jpg', '64b7ad825544c.jpg', '64b7ad8255a9d.jpg', '64b7ad8255ce6.jpg', '64b7ad825613e.jpg', '64b7ad8256737.jpg', '64b7ad8256e93.jpg', 1, '', '2023-07-19 15:01:46', '2023-07-19 15:02:09', 0),
(16, 36, 13, '64b7af3fdc5f5.jpg', '64b7af3fdc801.jpg', '64b7af3fdc858.jpg', '64b7af3fdc8fb.jpg', '64b7af3fdca19.jpg', '64b7af3fdcb1b.jpg', '64b7af3fdcb64.jpg', '64b7af3fdcc80.jpg', '64b7af3fdccf9.jpg', '64b7af3fdcddb.jpg', 1, '', '2023-07-19 15:09:11', '2023-07-20 12:48:42', 0),
(17, 128, 14, '64b8fe9b05c3a.jpg', '64b8fe9b05d56.jpg', '64b8fe9b05e2e.jpg', '64b8fe9b05f6a.jpg', '64b8fe9b060fc.jpg', '64b8fe9b06279.jpg', '64b8fe9b06396.jpg', '64b8fe9b0649e.jpg', '64b8fe9b0654f.jpg', '64b8fe9b06639.jpg', 1, '', '2023-07-20 15:00:03', '2023-07-20 15:46:53', 0),
(18, 129, 14, '64b9024cd62f0.jpg', '64b9024cd6bd0.jpg', '64b9024cd7376.jpg', '64b9024cd7b59.jpg', '64b9024cd7e7d.jpg', '64b9024cd7fe5.jpg', '64b9024cd80e2.jpg', '64b9024cd8189.jpg', '64b9024cd82bb.jpg', '64b9024cd8448.jpg', 1, '', '2023-07-20 15:15:48', '2023-07-20 15:17:01', 0),
(19, 128, 14, '64b928f5a41d9.png', '64b928f5a42cd.png', '64b928f5a43b3.png', '64b928f5a4513.png', '64b928f5a464b.png', '64b928f5a47be.png', '64b928f5a490b.png', '64b928f5a4a7a.png', '64b928f5a4b6c.png', '64b928f5a4c50.png', 1, '', '2023-07-20 18:00:45', '2023-07-20 18:06:18', 0),
(20, 129, 12, '64be66db69642.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-24 17:26:11', '2023-07-24 17:26:11', 0),
(21, 129, 7, '64be6a3743596.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-24 17:40:31', '2023-07-24 17:40:31', 0),
(22, 137, 14, '64be71b3b0b61.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-24 18:12:27', '2023-07-24 18:16:14', 0),
(23, 129, 13, '64bf5bb33f06e.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-25 10:50:51', '2023-07-25 11:42:53', 0),
(24, 137, 17, '64bf5bda29c5c.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-25 10:51:30', '2023-07-25 10:51:30', 0),
(25, 137, 17, '64bf5bdc09ebf.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-25 10:51:32', '2023-07-25 10:51:32', 0),
(26, 137, 17, '64bf5bdd941f1.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-25 10:51:33', '2023-07-25 10:51:33', 0),
(27, 137, 17, '64bf5bf0daa16.png', '', '', '', '', '', '', '', '', '', 2, 'jgu', '2023-07-25 10:51:52', '2023-07-25 10:54:54', 0),
(28, 137, 17, '64bf5bf452796.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-25 10:51:56', '2023-07-25 10:51:56', 0),
(29, 137, 17, '64bf5c19a80b6.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-25 10:52:33', '2023-07-25 10:53:37', 0),
(30, 131, 17, '64bf6971a4dde.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-25 11:49:29', '2023-07-25 11:49:29', 0),
(31, 131, 17, '64bf69b128b30.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-25 11:50:33', '2023-07-25 11:50:33', 0),
(32, 139, 14, '64bf7f0c2de53.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-25 13:21:40', '2023-07-25 13:22:39', 0),
(33, 139, 18, '64c0d02675f65.png', '', '', '', '', '', '', '', '', '', 2, 'fddsrrtrrtr', '2023-07-26 13:19:58', '2023-07-26 13:21:09', 0),
(34, 139, 18, '64c0d115b3e54.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-26 13:23:57', '2023-07-26 13:25:37', 0),
(35, 139, 18, '64c0d120bd980.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-26 13:24:08', '2023-07-26 13:24:39', 0),
(36, 99, 9, '64c0f8358b8cb.png', '', '', '', '', '', '', '', '', '', 2, 'dssdsda', '2023-07-26 16:10:53', '2023-07-26 16:11:54', 0),
(37, 99, 9, '64c0f8f62b8b9.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-26 16:14:06', '2023-07-26 16:14:06', 0),
(38, 99, 9, '64c0f8fe34b0e.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-26 16:14:14', '2023-07-26 16:14:52', 0),
(39, 99, 1, '64c102234ead1.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-26 16:53:15', '2023-07-26 17:45:47', 0),
(40, 99, 18, '64c10fb3872ee.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-26 17:51:07', '2023-07-26 17:55:18', 0),
(41, 99, 13, '64c1404f1803a.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-26 21:18:31', '2023-07-26 21:18:31', 0),
(42, 131, 6, '64c20d3292d96.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-27 11:52:42', '2023-07-27 11:53:31', 0),
(43, 131, 21, '64c217273d7c7.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-27 12:35:11', '2023-07-27 12:35:47', 0),
(44, 131, 21, '64c217c304cbf.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-27 12:37:47', '2023-07-27 12:37:47', 0),
(45, 131, 21, '64c217e827217.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-07-27 12:38:24', '2023-07-27 12:38:24', 0),
(46, 139, 7, '64c23622860dc.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-27 14:47:22', '2023-07-27 14:48:16', 0),
(47, 145, 12, '64c74c9d20f21.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-31 11:24:37', '2023-07-31 11:40:41', 0),
(48, 145, 1, '64c7507fb413b.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-31 11:41:11', '2023-07-31 11:41:18', 0),
(49, 139, 13, '64c761352cde2.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-31 12:52:29', '2023-07-31 12:53:27', 0),
(50, 151, 13, '64c79a7c27f92.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-31 16:56:52', '2023-07-31 16:57:08', 0),
(51, 151, 15, '64c79b43bec52.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-07-31 17:00:11', '2023-07-31 17:00:24', 0),
(52, 145, 13, '64c8b153c7aa1.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-01 12:46:35', '2023-08-01 12:46:35', 0),
(53, 154, 18, '64c8b79f236fc.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-01 13:13:27', '2023-08-01 13:14:26', 0),
(54, 154, 18, '64c8ce72e4063.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-01 14:50:50', '2023-08-01 14:51:13', 0),
(55, 154, 12, '64c8e0e4adbc5.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-01 16:09:32', '2023-08-09 11:30:44', 0),
(56, 157, 13, '64c9f54563c0e.png', '', '', '', '', '', '', '', '', '', 2, 'sas', '2023-08-02 11:48:45', '2023-08-02 11:53:53', 0),
(57, 157, 14, '64c9f5c3b5ab5.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-02 11:50:51', '2023-08-02 11:50:51', 0),
(58, 157, 13, '64c9f7075775a.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-02 11:56:15', '2023-08-02 11:56:31', 0),
(59, 139, 25, '64c9f74094539.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-02 11:57:12', '2023-08-02 11:57:12', 0),
(60, 157, 13, '64c9f7a7db48e.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-02 11:58:55', '2023-08-02 11:59:09', 0),
(61, 157, 30, '64ca2b8b8359d.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-02 15:40:19', '2023-08-02 15:40:19', 0),
(62, 36, 1, '64ca3d9900469.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-02 16:57:21', '2023-08-02 16:57:21', 0),
(63, 36, 3, '64ca3def27a56.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-02 16:58:47', '2023-08-02 16:58:47', 0),
(64, 36, 31, '64ca3f2a3964f.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-02 17:04:02', '2023-08-08 21:32:54', 0),
(65, 36, 13, '64ca3ff5d1c0b.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-02 17:07:25', '2023-08-08 21:29:51', 0),
(66, 139, 34, '64cc9110579ee.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-04 11:18:00', '2023-08-04 11:20:50', 0),
(67, 139, 36, '64ccc3b587ac1.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-04 14:54:05', '2023-08-08 15:18:01', 0),
(68, 139, 1, '64d0ecc16adf5.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-07 18:38:17', '2023-08-07 18:38:34', 0),
(69, 139, 12, '64d1cee46bffc.png', '', '', '', '', '', '', '', '', '', 2, 'asdfgjhk', '2023-08-08 10:43:08', '2023-08-08 15:21:25', 0),
(70, 139, 30, '64d210a31828a.png', '', '', '', '', '', '', '', '', '', 2, 'zxcbn,lk', '2023-08-08 15:23:39', '2023-08-08 15:24:33', 0),
(71, 139, 42, '64d2263708a82.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-08 16:55:43', '2023-08-08 16:55:56', 0),
(72, 36, 36, '64d2645771c33.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-08 21:20:47', '2023-08-08 21:21:00', 0),
(73, 36, 37, '64d26750b7330.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-08 21:33:28', '2023-08-08 21:33:37', 0),
(74, 36, 18, '64d267933a5ac.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-08 21:34:35', '2023-08-08 21:34:45', 0),
(75, 36, 42, '64d26df243f58.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-08 22:01:46', '2023-08-08 22:02:13', 0),
(76, 36, 12, '64d26e57903d4.png', '', '', '', '', '', '', '', '', '', 2, 'not proper image', '2023-08-08 22:03:27', '2023-08-08 22:03:46', 0),
(77, 36, 15, '64d31d97d3122.png', '', '', '', '', '', '', '', '', '', 2, 'afd', '2023-08-09 10:31:11', '2023-08-09 10:32:17', 0),
(78, 36, 35, '64d31db94d306.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-09 10:31:45', '2023-08-09 11:30:16', 0),
(79, 151, 18, '64d3282b19a06.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-09 11:16:19', '2023-08-09 11:29:51', 0),
(80, 151, 30, '64d32d06620c5.png', '', '', '', '', '', '', '', '', '', 2, 'test', '2023-08-09 11:37:02', '2023-08-09 12:22:59', 0),
(81, 151, 30, '64d32d63635ce.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-09 11:38:35', '2023-08-09 12:21:25', 0),
(82, 151, 42, '64d340956f664.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-09 13:00:29', '2023-08-09 16:40:45', 0),
(83, 13, 42, '64d3472b922dd.png', '', '', '', '', '', '', '', '', '', 2, 'ssda', '2023-08-09 13:28:35', '2023-08-09 13:28:53', 0),
(84, 13, 42, '64d3475bd00e2.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-09 13:29:23', '2023-08-09 13:30:04', 0),
(85, 118, 42, '64d347a8d5b8e.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-09 13:30:40', '2023-08-09 13:30:51', 0),
(86, 131, 42, '64d371cecbfa0.png', '', '', '', '', '', '', '', '', '', 0, 'test', '2023-08-09 16:30:30', '2023-08-09 16:44:04', 0),
(87, 131, 36, '64d37238c23c7.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-09 16:32:16', '2023-08-09 16:44:07', 0),
(88, 195, 42, '64d38ed5ca3ab.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-09 18:34:21', '2023-08-09 18:34:21', 0),
(89, 131, 35, '64d605cd3aa07.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-11 15:26:29', '2023-08-11 15:27:01', 0),
(90, 139, 47, '64d619853acc9.png', '', '', '', '', '', '', '', '', '', 1, '', '2023-08-11 16:50:37', '2023-08-11 16:51:12', 0),
(91, 139, 39, '64ddd074b2044.png', '', '', '', '', '', '', '', '', '', 0, '', '2023-08-17 13:17:00', '2023-08-17 13:17:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_type`
--

CREATE TABLE `tbl_course_type` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_course_type`
--

INSERT INTO `tbl_course_type` (`id`, `name`, `img`, `created_date`, `updated_date`, `isDeleted`) VALUES
(1, 'Finance & Accounting', 'Group_44.png', '2023-07-12 05:59:30', '2023-08-07 16:02:30', 0),
(2, 'Design', 'Group_39.png', '2023-07-12 06:00:55', '2023-08-07 16:00:44', 0),
(3, 'IT & Software', 'Group_40.png', '2023-07-12 06:01:56', '2023-08-07 16:02:12', 0),
(4, 'Share Marketing', 'Group_41.png', '2023-07-12 06:03:09', '2023-08-07 16:01:44', 0),
(5, 'Development', 'Group_42.png', '2023-07-12 06:04:21', '2023-08-07 16:01:06', 0),
(6, '12 Standard', 'Screenshot_2023-05-10_at_12_37_55_PM.png', '2023-07-12 06:08:09', '2023-08-08 15:27:27', 1),
(7, 'Design', 'Mysql.png', '2023-07-26 17:02:06', '2023-07-26 17:04:35', 1),
(8, 'Tester', 'Group_43.png', '2023-08-08 15:36:00', '2023-08-08 15:36:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation`
--

CREATE TABLE `tbl_donation` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` int NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donation`
--

INSERT INTO `tbl_donation` (`id`, `user_id`, `amount`, `added_at`) VALUES
(1, 145, 10, '2023-08-17 06:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`id`, `name`, `isDeleted`, `created_date`, `updated_date`) VALUES
(1, ' BE', 0, '2023-07-12 06:20:05', '2023-07-12 06:20:05'),
(2, 'Bsc', 0, '2023-07-12 06:20:18', '2023-07-12 06:20:18'),
(3, 'Bsc IT', 0, '2023-07-12 06:20:35', '2023-07-12 06:20:35'),
(4, 'Bcom', 0, '2023-07-12 06:20:54', '2023-07-12 06:20:54'),
(5, 'BMS', 0, '2023-07-12 06:21:24', '2023-07-12 06:21:24'),
(6, 'MSC', 0, '2023-07-12 06:21:40', '2023-07-12 06:21:40'),
(7, 'BTech', 0, '2023-07-12 06:22:56', '2023-07-12 06:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_heard_about_us`
--

CREATE TABLE `tbl_heard_about_us` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_heard_about_us`
--

INSERT INTO `tbl_heard_about_us` (`id`, `name`, `isDeleted`, `created_date`, `updated_date`) VALUES
(1, 'Google.com', 0, '2023-07-12 06:23:37', '2023-07-12 06:23:37'),
(2, 'Social Media', 0, '2023-07-12 06:24:29', '2023-07-12 06:24:29'),
(3, 'Organic Content (videos, pictures, stories)', 0, '2023-07-12 06:25:41', '2023-07-12 06:25:41'),
(4, 'Customer testimonials.', 1, '2023-07-12 06:26:23', '2023-07-12 06:26:23'),
(5, 'Customer testimonials', 0, '2023-07-12 06:26:36', '2023-07-12 06:26:36'),
(6, 'Referral', 0, '2023-07-12 06:27:15', '2023-07-12 06:27:15'),
(7, 'Google/Search Engines', 0, '2023-07-12 06:30:24', '2023-07-12 06:30:24'),
(8, 'test', 1, '2023-07-12 06:35:54', '2023-07-12 06:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hobby`
--

CREATE TABLE `tbl_hobby` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_hobby`
--

INSERT INTO `tbl_hobby` (`id`, `name`, `isDeleted`, `created_date`, `updated_date`) VALUES
(1, 'Drawing', 0, '2023-07-12 06:32:36', '2023-07-12 06:32:36'),
(2, 'Reading ', 0, '2023-07-12 06:37:29', '2023-07-12 06:37:29'),
(3, 'Cooking', 0, '2023-07-12 06:37:39', '2023-07-12 06:37:39'),
(4, 'Listening Music', 0, '2023-07-12 06:38:05', '2023-07-12 06:38:05'),
(5, 'Playing', 0, '2023-07-12 06:38:37', '2023-07-12 06:38:37'),
(6, 'Drawing', 1, '2023-07-17 10:46:04', '2023-07-17 10:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notepad`
--

CREATE TABLE `tbl_notepad` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_notepad`
--

INSERT INTO `tbl_notepad` (`id`, `user_id`, `title`, `description`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 90, 'Test', 'Desc Test', '2023-07-18 11:10:53', '2023-07-18 11:10:53', 0),
(2, 90, 'Test', 'Desc Test', '2023-07-18 11:13:49', '2023-07-18 11:13:49', 0),
(3, 90, 'Test', 'Desc Test', '2023-07-18 11:48:48', '2023-07-18 11:48:48', 0),
(4, 90, 'Test', 'Desc Test', '2023-07-18 12:02:35', '2023-07-18 12:02:35', 0),
(5, 90, 'Test', 'Desc Test', '2023-07-18 12:03:19', '2023-07-18 12:03:19', 0),
(6, 90, 'Test', 'Desc Test', '2023-07-18 12:03:25', '2023-07-18 12:03:25', 0),
(7, 90, 'Test', 'Desc Test', '2023-07-18 12:03:28', '2023-07-18 12:03:28', 0),
(8, 90, 'Test', 'Desc Test', '2023-07-18 12:07:03', '2023-07-18 12:07:03', 0),
(9, 90, 'Test', 'Desc Test', '2023-07-18 12:07:25', '2023-07-18 12:07:25', 0),
(10, 90, 'Test', 'Desc Test', '2023-07-18 17:43:48', '2023-07-18 17:43:48', 0),
(11, 90, 'Test', 'Desc Test', '2023-07-18 17:44:42', '2023-07-18 17:44:42', 0),
(12, 90, 'Test', 'Desc Test', '2023-07-18 17:51:12', '2023-07-18 17:51:12', 0),
(13, 90, 'Test', 'Desc Test', '2023-07-18 17:51:25', '2023-07-18 17:51:25', 0),
(14, 90, 'Test', 'Desc Test', '2023-07-18 17:58:51', '2023-07-18 17:58:51', 0),
(15, 90, 'Test', 'Desc Test', '2023-07-18 17:59:07', '2023-07-18 17:59:07', 0),
(16, 90, 'Test', 'Desc Test', '2023-07-18 17:59:13', '2023-07-18 17:59:13', 0),
(17, 90, '11 min', 'hello', '2023-07-18 18:10:17', '2023-07-18 18:10:17', 0),
(18, 90, '11 min', 'hello', '2023-07-18 18:11:07', '2023-07-18 18:11:07', 0),
(19, 90, 'Ashwini', 'hii this is Ashwini', '2023-07-18 18:16:30', '2023-07-18 18:16:30', 0),
(20, 90, 'yhuvyvyv', 'ygyggg', '2023-07-18 18:18:38', '2023-07-18 18:18:38', 0),
(21, 90, 'raj', 'maurya', '2023-07-18 18:20:53', '2023-07-18 18:20:53', 0),
(22, 90, 'hcyfiggckhgj', 'hgxguxhgxgjxgjgjcgjxfjxfxfhxfufhfhfjxgjxgjxgjdfjxgjxgjxgxtixigjxgjjchjckhccifiyfiycgjcxtixigcgicgjcgcgjcgjcgjcixgciycigcifitcgiigcgicifigcgcyicigciyfiyfiyc', '2023-07-18 18:28:50', '2023-07-18 18:28:50', 0),
(23, 90, 'hhjk', 'ghjk', '2023-07-18 18:32:17', '2023-07-18 18:32:17', 0),
(24, 90, 'Test', 'Desc Test', '2023-07-19 11:17:43', '2023-07-19 11:17:43', 0),
(25, 90, 'my test', 'final test', '2023-07-19 12:03:36', '2023-07-19 12:03:36', 0),
(26, 90, 'one more', 'one', '2023-07-19 12:05:06', '2023-07-19 12:05:06', 0),
(27, 90, 'recy', 'evg', '2023-07-19 12:06:25', '2023-07-19 12:06:25', 0),
(28, 90, 'asdffg', 'xxcfg', '2023-07-19 12:22:35', '2023-07-19 12:22:35', 0),
(29, 90, 'asdffg', 'xxcfg', '2023-07-19 12:22:38', '2023-07-19 12:22:38', 0),
(30, 90, 'asdffg', 'xxcfg', '2023-07-19 12:22:41', '2023-07-19 12:22:41', 0),
(31, 90, 'asdffg', 'xxcfg', '2023-07-19 12:22:52', '2023-07-19 12:22:52', 0),
(32, 90, 'asdffg', 'xxcfg', '2023-07-19 12:22:52', '2023-07-19 12:22:52', 0),
(33, 90, 'fhhj', 'xbh', '2023-07-19 12:51:42', '2023-07-19 12:51:42', 0),
(34, 90, 'Dr gg', 'cfg', '2023-07-19 13:46:45', '2023-07-19 13:46:45', 0),
(35, 90, 'guhu', 'hvuvuvu', '2023-07-19 14:24:03', '2023-07-19 14:24:03', 0),
(36, 90, 'ashu', 'this is ashu', '2023-07-19 14:24:21', '2023-07-19 14:24:21', 0),
(37, 90, 'raj', 'raj\n', '2023-07-19 14:25:03', '2023-07-19 14:25:03', 0),
(38, 90, 'hhjnnm', 'hujki', '2023-07-19 14:25:57', '2023-07-19 14:25:57', 0),
(39, 90, 'poojajjj', 'pojjjjjmmmmmm', '2023-07-19 14:26:12', '2023-07-19 14:26:12', 0),
(40, 90, 'rutuja', 'bhjhhnnnh', '2023-07-19 14:26:42', '2023-07-19 14:26:42', 0),
(41, 90, 'india', 'india india', '2023-07-19 14:30:27', '2023-07-19 14:30:27', 0),
(42, 90, 't7tui6ryr', 'hkoyfu', '2023-07-19 15:01:48', '2023-07-19 15:01:48', 0),
(43, 90, 'rutujjjaa', 'rutujjjaarutujjjaarutujjjaarutujjjaa', '2023-07-19 15:12:51', '2023-07-19 15:12:51', 0),
(44, 90, 'tyuuhhh', 'jjjkkjjhhh', '2023-07-19 15:33:29', '2023-07-19 15:33:29', 0),
(45, 90, 'cgggy', 'Abhi Nahi \nToh Kabhi Nahi!\n\nBiggest Home Festival By Runwal Group\n\nHOME FESTIVAL PROJECT \n▪ Runwal Sancturay Mulund\n2 & 3 BHK Home Starting From\n1.69 Cr**\n▪ Runwal OYT Wadala \n2 & 3 BHK Home Starting From\n4.06 Cr**\n▪ Runwal 25Hour Life Thane\n2 & 3 BHK Home Starting From\n93 Lac**\n\nPROJECT HIGHLIGHTS:\n✔️Located in prime location\n✔️world-class amenities\n✔️Super Spacious 2, 3 & 4 BHK Home\n\nEXCLUSIVE OFFER\nPay just 5% Now & Book\nAvail Special Payment Plan Offers\n\nRegister Now To Get Offers & Schedule Site Visit', '2023-07-19 15:34:16', '2023-07-19 15:34:16', 0),
(46, 90, 'nikita', 'njjhhhvhhuhj', '2023-07-19 16:52:56', '2023-07-19 16:52:56', 0),
(47, 90, 'suyog', 'cfgvnnnbbbhbgggtggghhhhhhjuuuuuuuuii', '2023-07-21 22:24:56', '2023-07-21 22:24:56', 0),
(48, 90, 'raj', 'raj', '2023-07-22 13:34:02', '2023-07-22 13:34:02', 0),
(49, 129, 'raj', 'raj', '2023-07-22 14:21:21', '2023-07-22 14:27:29', 1),
(50, 129, 'rutu', 'rutuja', '2023-07-22 14:21:34', '2023-07-22 14:35:56', 1),
(51, 129, 'hii', 'hii', '2023-07-22 14:32:02', '2023-07-22 14:32:46', 1),
(52, 129, 'bye', 'bye', '2023-07-22 14:32:09', '2023-07-22 14:32:55', 1),
(53, 129, 'hii', 'hii', '2023-07-22 14:35:07', '2023-07-22 14:35:17', 1),
(54, 129, 'bye', 'bye', '2023-07-22 14:35:12', '2023-07-22 14:35:37', 1),
(55, 129, 'hii', 'hii', '2023-07-22 14:35:19', '2023-07-24 10:40:16', 1),
(56, 129, 'bye', 'bye', '2023-07-22 14:35:38', '2023-07-25 12:57:49', 1),
(57, 129, 'rutu', 'rutuja', '2023-07-22 14:35:58', '2023-07-22 14:36:54', 1),
(58, 129, 'vhm', 'vjmkjc', '2023-07-22 20:37:38', '2023-07-22 20:38:06', 1),
(59, 129, 'vvhb', 'vvv', '2023-07-22 20:37:54', '2023-07-22 20:38:08', 1),
(60, 129, 'ccvv', 'ccvv\n', '2023-07-22 20:38:03', '2023-07-24 10:24:31', 1),
(61, 129, 'hi', 'hiiiii', '2023-07-24 11:21:12', '2023-07-24 11:21:15', 1),
(62, 137, 'dtyygg', 'ryyy', '2023-07-24 18:05:37', '2023-07-24 18:05:37', 0),
(63, 137, 'xdthh', 'tryhh', '2023-07-24 18:05:45', '2023-07-24 18:06:37', 1),
(64, 137, 'drtggbvv', 'ffffffffgggghhhhjjbcdddghhbvctgyujjnnbvxdrtyhbbbgtuiijj', '2023-07-24 18:25:17', '2023-07-24 18:25:17', 0),
(65, 137, 'rjffj', 'vdufyk', '2023-07-25 00:40:49', '2023-07-25 00:40:49', 0),
(66, 129, 'hello', 'hi', '2023-07-25 10:48:25', '2023-07-25 12:52:57', 1),
(67, 129, 'hiic', 'fghj', '2023-07-25 12:57:56', '2023-07-25 12:59:15', 1),
(68, 129, 'fvh', 'ffv', '2023-07-25 12:59:24', '2023-07-25 12:59:24', 0),
(69, 129, 'fsciaxa', 'vach', '2023-07-25 13:23:24', '2023-07-25 13:23:24', 0),
(70, 129, 'fgcah', ' gCjb', '2023-07-25 13:23:28', '2023-07-25 13:23:28', 0),
(71, 129, 'my title', 'This email is notifying you about important service information regarding your Firebase project', '2023-07-25 15:03:10', '2023-07-25 15:03:10', 0),
(72, 139, 'th', 'ggyy', '2023-07-25 15:51:35', '2023-07-25 15:51:49', 1),
(73, 139, 'my title 2', 'my notes 256\n', '2023-07-25 15:51:58', '2023-08-08 15:13:47', 0),
(74, 139, 'VIP NOTE', 'wsdfghiklmnbbcdzwertyuiopqadjlgdscbnmhffhhfghbnnbvccghnbbv', '2023-07-26 14:33:27', '2023-08-08 11:26:32', 0),
(75, 99, 'intro', 'my name is ninad', '2023-07-28 10:37:00', '2023-07-28 12:43:49', 0),
(76, 99, 'new title ', 'my notes ', '2023-07-28 10:51:13', '2023-07-28 10:51:13', 0),
(77, 151, 'abc', 'qwegfhhtabcdfg', '2023-07-31 16:26:29', '2023-08-11 12:43:10', 0),
(78, 154, 'VIP', 'asdfgghjjkkllmbccdtyhj', '2023-08-01 15:59:29', '2023-08-01 15:59:57', 1),
(79, 154, 'VIP', 'bshdudurhrhhrhdhdheh', '2023-08-01 16:00:19', '2023-08-01 16:00:23', 1),
(80, 157, 'high helli', 'hello hdhdhhdnj', '2023-08-02 11:45:34', '2023-08-02 11:47:46', 0),
(81, 118, 'My fav', 'qwryjgkhlj123', '2023-08-07 18:13:44', '2023-08-09 15:48:14', 0),
(82, 139, 'ddf', 'ccdd', '2023-08-07 18:27:42', '2023-08-07 18:27:42', 0),
(83, 151, 'wwer', 'fhhfghg', '2023-08-08 10:48:49', '2023-08-08 10:48:53', 1),
(84, 139, 'game', 'start123tyuooo', '2023-08-08 11:22:43', '2023-08-08 11:24:40', 0),
(85, 139, 'new1', 'dyggigi12345', '2023-08-08 13:21:10', '2023-08-08 15:16:28', 0),
(86, 131, 'टीटीटीटीई', 'क्वार्टर', '2023-08-09 16:52:39', '2023-08-09 16:52:39', 0),
(87, 131, 'fz,zfzxtx', 'uffyfy', '2023-08-09 16:52:56', '2023-08-09 16:52:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupation`
--

CREATE TABLE `tbl_occupation` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_occupation`
--

INSERT INTO `tbl_occupation` (`id`, `name`, `isDeleted`, `created_date`, `updated_date`) VALUES
(1, 'Engineer', 0, '2023-07-12 06:39:59', '2023-07-12 06:39:59'),
(2, 'Teacher', 0, '2023-07-12 06:40:18', '2023-07-12 06:40:18'),
(3, 'Designer', 0, '2023-07-12 06:40:38', '2023-07-12 06:40:38'),
(4, 'Scientist', 0, '2023-07-12 06:41:25', '2023-07-12 06:41:25'),
(5, 'Consultant', 0, '2023-07-12 06:41:36', '2023-07-12 06:41:36'),
(6, 'Trader', 0, '2023-07-12 06:42:20', '2023-07-12 06:42:20'),
(7, 'Creator', 0, '2023-07-12 07:40:46', '2023-07-12 07:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `id` int NOT NULL,
  `promocode` varchar(20) NOT NULL,
  `use_per_user` int NOT NULL,
  `amount` int NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_till` datetime NOT NULL,
  `isDeleted` int NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `user_id` int NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `promocode` varchar(50) NOT NULL,
  `amount` int NOT NULL,
  `final_amount` int NOT NULL,
  `discount` int NOT NULL,
  `coupoun_amount` varchar(255) DEFAULT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `payment` tinyint NOT NULL COMMENT '0=pending,1=done',
  `delivery_status` tinyint NOT NULL COMMENT '0=pending,1=process,2=dispatch,4=delivered',
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `name`, `landmark`, `flat`, `street`, `locality`, `pincode`, `user_id`, `course_id`, `promocode`, `amount`, `final_amount`, `discount`, `coupoun_amount`, `razorpay_order_id`, `payment`, `delivery_status`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, 'test', '', '', '', '', '', 1, '1', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-12 07:34:48', '0000-00-00 00:00:00', 0),
(2, 'ashwini', '', '', '', '', '', 92, '9', '', 500, 500, 0, NULL, 'CASH', 1, 0, '2023-07-17 11:14:48', '0000-00-00 00:00:00', 0),
(3, 'ashwini', '', '', '', '', '', 92, '12', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-17 12:33:37', '0000-00-00 00:00:00', 0),
(4, 'ashwini', '', '', '', '', '', 92, '3', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-18 10:23:03', '0000-00-00 00:00:00', 0),
(5, '', '', '', '', '', '', 115, '7', '', 1000, 1000, 0, NULL, 'CASH', 1, 0, '2023-07-19 13:12:07', '0000-00-00 00:00:00', 0),
(6, 'ghj', '', '', '', '', '', 116, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-19 13:34:25', '0000-00-00 00:00:00', 0),
(7, '', '', '', '', '', '', 121, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-20 11:04:05', '0000-00-00 00:00:00', 0),
(8, 'asdf', '', '', '', '', '', 128, '14', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-20 15:46:53', '0000-00-00 00:00:00', 0),
(9, 'asdf', '', '', '', '', '', 128, '14', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-20 18:06:18', '0000-00-00 00:00:00', 0),
(10, 'Abhishek', '', '', '', '', '', 136, '5', '', 1000, 1000, 0, NULL, 'CASH', 1, 0, '2023-07-24 11:40:30', '0000-00-00 00:00:00', 0),
(11, 'Raj', '', '', '', '', '', 126, '11', '', 1000, 1000, 0, NULL, 'CASH', 1, 0, '2023-07-24 11:41:00', '0000-00-00 00:00:00', 0),
(12, 'Abhishek', '', '', '', '', '', 136, '6', '', 2500, 2500, 0, NULL, 'CASH', 1, 0, '2023-07-24 11:52:36', '0000-00-00 00:00:00', 0),
(13, 'Abhishek', '', '', '', '', '', 136, '4', '', 2323, 2323, 0, NULL, 'CASH', 1, 0, '2023-07-24 12:24:41', '0000-00-00 00:00:00', 0),
(14, 'Abhishek', '', '', '', '', '', 136, '2', '', 3000, 3000, 0, NULL, 'CASH', 1, 0, '2023-07-24 12:25:31', '0000-00-00 00:00:00', 0),
(15, 'Abhishek', '', '', '', '', '', 136, '14', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-24 12:52:45', '0000-00-00 00:00:00', 0),
(16, 'Abhishek', '', '', '', '', '', 136, '7', '', 1000, 1000, 0, NULL, 'CASH', 1, 0, '2023-07-24 12:53:11', '0000-00-00 00:00:00', 0),
(17, 'Anisha', '', '', '', '', '', 2, '2', '', 3000, 3000, 0, NULL, 'CASH', 1, 0, '2023-07-24 12:53:44', '0000-00-00 00:00:00', 0),
(18, 'Abhishek', '', '', '', '', '', 136, '5', '', 1000, 1000, 0, NULL, 'CASH', 1, 0, '2023-07-24 12:54:54', '0000-00-00 00:00:00', 0),
(19, 'Malti', '', '', '', '', '', 137, '15', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-24 17:10:34', '0000-00-00 00:00:00', 0),
(20, 'Malti', '', '', '', '', '', 137, '14', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-24 18:16:14', '0000-00-00 00:00:00', 0),
(21, 'Malti', '', '', '', '', '', 137, '17', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-25 10:53:37', '0000-00-00 00:00:00', 0),
(22, 'swati', '', '', '', '', '', 129, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-25 11:42:53', '0000-00-00 00:00:00', 0),
(23, 'gemy', '', '', '', '', '', 139, '14', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-25 13:22:39', '0000-00-00 00:00:00', 0),
(24, 'Veer', '', '', '', '', '', 140, '17', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-25 15:16:41', '0000-00-00 00:00:00', 0),
(25, 'Veer', '', '', '', '', '', 140, '6', '', 2500, 2500, 0, NULL, 'CASH', 1, 0, '2023-07-25 16:16:59', '0000-00-00 00:00:00', 0),
(26, 'gemy', '', '', '', '', '', 139, '15', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-25 16:22:58', '0000-00-00 00:00:00', 0),
(27, 'gemy', '', '', '', '', '', 139, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-07-26 13:24:39', '0000-00-00 00:00:00', 0),
(28, 'gemy', '', '', '', '', '', 139, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-07-26 13:25:37', '0000-00-00 00:00:00', 0),
(29, 'Raj', '', '', '', '', '', 99, '9', '', 500, 500, 0, NULL, 'CASH', 1, 0, '2023-07-26 16:14:52', '0000-00-00 00:00:00', 0),
(30, 'Raj', '', '', '', '', '', 99, '1', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-26 17:45:47', '0000-00-00 00:00:00', 0),
(31, 'Raj', '', '', '', '', '', 99, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-07-26 17:55:18', '0000-00-00 00:00:00', 0),
(32, 'Abhishek', '', '', '', '', '', 131, '6', '', 2500, 2500, 0, NULL, 'CASH', 1, 0, '2023-07-27 11:53:31', '0000-00-00 00:00:00', 0),
(33, 'Abhishek', '', '', '', '', '', 131, '21', '', 20000, 20000, 0, NULL, 'CASH', 1, 0, '2023-07-27 12:35:47', '0000-00-00 00:00:00', 0),
(34, 'gemy', '', '', '', '', '', 139, '7', '', 1000, 1000, 0, NULL, 'CASH', 1, 0, '2023-07-27 14:48:16', '0000-00-00 00:00:00', 0),
(35, 'Raj', '', '', '', '', '', 145, '12', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-31 11:40:41', '0000-00-00 00:00:00', 0),
(36, 'Raj', '', '', '', '', '', 145, '1', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-31 11:41:18', '0000-00-00 00:00:00', 0),
(37, 'gemy', '', '', '', '', '', 139, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-31 12:53:27', '0000-00-00 00:00:00', 0),
(38, 'Anisha', '', '', '', '', '', 151, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-07-31 16:57:08', '0000-00-00 00:00:00', 0),
(39, 'Anisha', '', '', '', '', '', 151, '15', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-07-31 17:00:24', '0000-00-00 00:00:00', 0),
(40, 'Savi', '', '', '', '', '', 154, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-01 13:14:26', '0000-00-00 00:00:00', 0),
(41, 'Savi', '', '', '', '', '', 154, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-01 14:51:13', '0000-00-00 00:00:00', 0),
(42, 'Arun', '', '', '', '', '', 157, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-08-02 11:56:31', '0000-00-00 00:00:00', 0),
(43, 'Arun', '', '', '', '', '', 157, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-08-02 11:59:09', '0000-00-00 00:00:00', 0),
(44, '', '', '', '', '', '', 176, '32', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-03 18:10:25', '0000-00-00 00:00:00', 0),
(45, 'gemy', '', '', '', '', '', 139, '34', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-04 11:20:50', '0000-00-00 00:00:00', 0),
(46, 'gemy', '', '', '', '', '', 139, '36', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-04 14:54:29', '0000-00-00 00:00:00', 0),
(47, 'gemy', '', '', '', '', '', 139, '1', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-08-07 18:38:34', '0000-00-00 00:00:00', 0),
(48, 'gemy', '', '', '', '', '', 139, '36', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-08 15:18:00', '0000-00-00 00:00:00', 0),
(49, 'gemy', '', '', '', '', '', 139, '42', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-08 16:55:56', '0000-00-00 00:00:00', 0),
(50, '', '', '', '', '', '', 189, '41', '', 30, 30, 0, NULL, 'CASH', 1, 0, '2023-08-08 18:50:10', '0000-00-00 00:00:00', 0),
(51, 'raj', '', '', '', '', '', 36, '36', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-08 21:21:00', '0000-00-00 00:00:00', 0),
(52, 'raj', '', '', '', '', '', 36, '13', '', 5000, 5000, 0, NULL, 'CASH', 1, 0, '2023-08-08 21:29:51', '0000-00-00 00:00:00', 0),
(53, 'raj', '', '', '', '', '', 36, '37', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-08 21:33:37', '0000-00-00 00:00:00', 0),
(54, 'raj', '', '', '', '', '', 36, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-08 21:34:44', '0000-00-00 00:00:00', 0),
(55, 'raj', '', '', '', '', '', 36, '42', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-08 22:02:13', '0000-00-00 00:00:00', 0),
(56, 'raj', '', '', '', '', '', 36, '35', '', 30, 30, 0, NULL, 'CASH', 1, 0, '2023-08-09 10:32:01', '0000-00-00 00:00:00', 0),
(57, 'Anisha', '', '', '', '', '', 151, '18', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 11:29:51', '0000-00-00 00:00:00', 0),
(58, 'raj', '', '', '', '', '', 36, '35', '', 30, 30, 0, NULL, 'CASH', 1, 0, '2023-08-09 11:30:15', '0000-00-00 00:00:00', 0),
(59, 'Savi', '', '', '', '', '', 154, '12', '', 2000, 2000, 0, NULL, 'CASH', 1, 0, '2023-08-09 11:30:43', '0000-00-00 00:00:00', 0),
(60, 'Anisha', '', '', '', '', '', 151, '30', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 11:38:47', '0000-00-00 00:00:00', 0),
(61, 'Anisha', '', '', '', '', '', 151, '30', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 12:21:25', '0000-00-00 00:00:00', 0),
(62, 'Amol', '', '', '', '', '', 13, '42', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 13:30:04', '0000-00-00 00:00:00', 0),
(63, 'shreya', '', '', '', '', '', 118, '42', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 13:30:50', '0000-00-00 00:00:00', 0),
(64, 'Abhishek', '', '', '', '', '', 131, '42', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 16:30:59', '0000-00-00 00:00:00', 0),
(65, 'Anisha', '', '', '', '', '', 151, '42', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 16:40:45', '0000-00-00 00:00:00', 0),
(66, 'Abhishek', '', '', '', '', '', 131, '36', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-09 16:41:39', '0000-00-00 00:00:00', 0),
(67, 'Abhishek', '', '', '', '', '', 131, '35', '', 30, 30, 0, NULL, 'CASH', 1, 0, '2023-08-11 15:27:00', '0000-00-00 00:00:00', 0),
(68, 'gemy', '', '', '', '', '', 139, '47', '', 0, 0, 0, NULL, 'CASH', 1, 0, '2023-08-11 16:51:11', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_product`
--

CREATE TABLE `tbl_order_product` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `added_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `isDeleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` int NOT NULL,
  `otp` int NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `added_date` datetime NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz`
--

CREATE TABLE `tbl_quiz` (
  `id` int NOT NULL,
  `question_no` int NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `correct_ans` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `video_id` int NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quiz`
--

INSERT INTO `tbl_quiz` (`id`, `question_no`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_ans`, `video_id`, `created_at`, `updated_at`, `isDeleted`) VALUES
(1, 1, 'what is java numberic value datatype?what is java numberic value datatype?what is java numberic value datatype?what is java numberic value datatype?what is java numberic value datatype?what is java numberic value datatype?what is java numberic value datat', 'string', 'int', 'float', 'double', 'opt_2', 14, '2023-07-18 09:40:20.269781', '2023-07-18 09:40:20.269781', 0),
(2, 2, 'what is java full form?', 'j', 'k', 'l', 'h', 'opt_1', 14, '2023-07-18 09:40:44.815547', '2023-07-18 09:40:44.815547', 0),
(3, 1, '121 Divided by 11 is ..?', '10', '19', '11', '18', 'opt_3', 15, '2023-07-18 11:40:02.810943', '2023-07-18 11:40:02.810943', 0),
(4, 2, ' 60 Times of 8 Equals to ?', '480  ', '300  ', '250 ', ' 400', 'opt_1', 15, '2023-07-18 11:40:50.296176', '2023-07-18 11:40:50.296176', 0),
(5, 3, ' What is the Next Prime Number after 7 ?', '13', '12', '14', '11', 'opt_4', 15, '2023-07-18 11:41:42.687774', '2023-07-18 11:41:42.687774', 0),
(6, 4, ' The Product of 131 × 0 × 300 × 4', '11 ', ' 0  ', '46 ', ' 45', 'opt_2', 15, '2023-07-18 11:42:36.715909', '2023-07-18 11:42:36.715909', 0),
(7, 5, 'Solve 23 + 3 ÷ 3', '24', '25', '26', '27', 'opt_1', 15, '2023-07-18 11:43:24.737494', '2023-07-18 11:43:24.737494', 0),
(8, 3, 'fsadfsfsdf', 'dfsdf', 'sdfsdf', 'sdfsdf', 'sdfdf', 'opt_1', 14, '2023-07-18 18:47:51.952053', '2023-07-18 18:47:51.952053', 0),
(9, 1, '	 The degree of the differential equation  1 + � � � � 3 2 3 = � � 2 � � � 2  is', '3', '2', '6', '1', 'opt_1', 18, '2023-07-20 13:40:52.712120', '2023-07-20 13:40:52.712120', 0),
(10, 2, ' A solution which can’t be obtained from a general solution is called…....solution.', 'General', 'Particular', 'Singular', 'None', 'opt_3', 18, '2023-07-20 13:42:22.199307', '2023-07-20 13:42:22.199307', 0),
(11, 3, ' Numerical techniques more commonly involve _______', ' Elimination method ', 'Reduction method', 'Iterative method', ' Direct method', 'opt_3', 18, '2023-07-20 14:39:35.212247', '2023-07-20 14:39:35.212247', 0),
(12, 4, 'Which of the following is an iterative method?', 'Gauss Seidel ', 'Gauss Jordan', ' Factorization', 'Gauss Elimination', 'opt_2', 18, '2023-07-20 14:40:28.341060', '2023-07-20 14:40:28.341060', 0),
(13, 1, ' MySQL runs on which operating systems ?', 'Unix, Linux, Windows and others', ' Any operating system at all', ' Unix and Linux only', ' Linux and Mac OS-X only', 'opt_2', 23, '2023-07-25 16:54:00.281885', '2023-07-25 16:54:00.281885', 0),
(14, 1, 'Javascript is a _____ language.', 'Programming ', 'Application ', 'Scripting ', 'None of the above ', 'opt_3', 24, '2023-07-25 17:00:45.721706', '2023-07-25 17:00:45.721706', 0),
(15, 2, ' Which of the following can add a row to a table ?', 'Alter ', 'Update', ' Insert ', 'Add', 'opt_2', 23, '2023-07-25 17:13:05.006940', '2023-07-25 17:13:05.006940', 0),
(16, 3, 'MySQL written in', 'C ', ' C++', ' Both the above ', 'None of the above', 'opt_4', 23, '2023-07-25 17:14:18.158517', '2023-07-25 17:14:18.158517', 0),
(17, 4, 'To use MySQL on your computer, you will need ?', 'Perl, PHP or Java  ', 'A Browser', 'FTP and Telnet ', 'Some sort of client program to access the databases', 'opt_3', 23, '2023-07-25 17:16:16.250858', '2023-07-25 17:16:16.250858', 0),
(18, 5, 'Which SQL statement is used to insert a new data in a database ?', 'INSERT NEW  ', 'ADD', 'UPDATE ', 'INSERT INTO', 'opt_4', 23, '2023-07-25 17:18:11.419669', '2023-07-25 17:18:11.419669', 0),
(19, 6, 'A NULL value is treated as a blank or 0.', 'False', 'True', ' All of the above', 'None of the above', 'opt_3', 23, '2023-07-25 17:19:27.765435', '2023-07-25 17:19:27.765435', 0),
(20, 2, 'JavaScript is a _____ Side Scripting Language.', 'Server ', 'Browser', ' ISP', ' None of the above', 'opt_3', 24, '2023-07-25 17:28:10.952521', '2023-07-25 17:28:10.952521', 0),
(21, 3, 'Which of the following purpose, JavaScript is designed for ?', 'To Execute Query Related to DB on Server ', 'To Style HTML Pages ', 'To Perform Server Side Scripting Opertion ', 'To add interactivity to HTML Pages.', 'opt_2', 24, '2023-07-25 17:29:18.336254', '2023-07-25 17:29:18.336254', 0),
(22, 4, 'JavaScript can be written', 'directly on the Server ', 'Script directly into HTML pages ', 'All of the above ', 'None of the above', 'opt_3', 24, '2023-07-25 17:30:22.134973', '2023-07-25 17:30:22.134973', 0),
(23, 5, 'JavaScript code is written inside file having extension', '.jvs ', '.js ', '.jsc', ' .javascript', 'opt_2', 24, '2023-07-25 17:31:25.996361', '2023-07-25 17:31:25.996361', 0),
(24, 6, 'Why JavaScript is called as Lightweight Programming Language ?', ' because JS is client side scripting ', 'because JS is available free of cost. ', 'because we can add programming functionality inside JS', ' because JS can provide programming functionality inside but up to certain extend.', 'opt_2', 24, '2023-07-25 17:34:17.918660', '2023-07-25 17:34:17.918660', 0),
(25, 7, 'JavaScript is also called as', 'Server Side Scripting Language', ' Client Side Scripting Language ', 'All of the above', ' None of the above', 'opt_4', 24, '2023-07-25 17:35:31.176187', '2023-07-25 17:35:31.176187', 0),
(26, 8, 'Local Browser used for validations on the Web Pages uses ', 'JS ', 'Java ', 'HTML', ' CSS', 'opt_3', 24, '2023-07-25 17:36:27.774376', '2023-07-25 17:36:27.774376', 0),
(27, 9, 'JavaScript code can be called by using', 'RMI', 'Processer ', ' Function / Method', ' None of the above', 'opt_2', 24, '2023-07-25 17:38:35.123269', '2023-07-25 17:38:35.123269', 0),
(28, 10, 'var txt1 = \"codes_\"; var txt2 = \"cracker\"; document.getElementById(\"demo\").innerHTML = txt1 + txt2;', 'error', ' codes_ cracker ', 'undefined ', 'codes_cracker', 'opt_4', 24, '2023-07-25 17:39:30.365753', '2023-07-25 17:39:30.365753', 0),
(29, 1, 'Which function used to get the current time in MySQL ?', 'Time()', ' NOW()', ' getTime()', ' None of the above', 'opt_1', 25, '2023-07-25 17:43:14.736906', '2023-07-25 17:43:14.736906', 0),
(30, 2, ' Which of the following is not a valid aggregate function ?', 'MIN ', 'MAX ', 'COMPUTE', ' COUNT', 'opt_3', 25, '2023-07-25 17:44:20.314094', '2023-07-25 17:44:20.314094', 0),
(31, 3, 'What SQL clause is used to restrict the rows returned by a query ?', 'FROM ', 'HAVING', ' WHERE ', 'AND', 'opt_3', 25, '2023-07-25 17:45:06.295214', '2023-07-25 17:45:06.295214', 0),
(32, 4, 'Which of the following is used to delete an entire MySQL database ?', 'mysql_drop_entiredb ', 'mysql_drop_database', ' mysql_drop_dbase', ' mysql_drop_db', 'opt_1', 25, '2023-07-25 17:46:36.308974', '2023-07-25 17:46:36.308974', 0),
(33, 5, 'The USE command', 'has been deprecated and should be avoided for security reasons ', ' is a pseudonym for the SELECT command', ' is used to load code from another file', 'should be used to choose the database you want to use once you have connected to MySQL', 'opt_4', 25, '2023-07-25 17:50:23.342251', '2023-07-25 17:50:23.342251', 0),
(34, 5, 'The USE command', 'has been deprecated and should be avoided for security reasons ', ' is a pseudonym for the SELECT command', ' is used to load code from another file', 'should be used to choose the database you want to use once you have connected to MySQL', 'opt_4', 25, '2023-07-25 17:53:34.917102', '2023-07-25 17:53:34.917102', 0),
(35, 1, 'Which statement is used to access an existing Database ?', 'USE databasename; use database.', 'use database', 'name Use', ' None of the above', 'opt_4', 27, '2023-07-25 18:07:41.122659', '2023-07-25 18:07:41.122659', 0),
(36, 2, 'The MySQL command line tool formats are bounded by', '+-} +-/  +-|', '+-/', '+-*', '+^', 'opt_2', 27, '2023-07-25 18:12:00.666814', '2023-07-25 18:12:00.666814', 0),
(37, 4, ' Which command is used for taking server side help in MySQL command line tool', '/h', '/c', '/e', 'None of the above', 'opt_3', 27, '2023-07-25 18:20:40.506748', '2023-07-25 18:20:40.506748', 0),
(38, 4, 'MySQL command line tool is used to show, how many rows are returned and how long SQL command took to execute', 'Depend ', 'Undetermined False', 'False', ' True', 'opt_3', 27, '2023-07-25 18:22:04.482717', '2023-07-25 18:22:04.482717', 0),
(39, 1, ' BLOB data type can have default column value.', 'False True Either', 'True ', ' True or False ', 'None of the above', 'opt_3', 26, '2023-07-25 18:28:12.854674', '2023-07-25 18:28:12.854674', 0),
(40, 2, 'User() function return the current user name and', 'host name  ', 'password', 'All of the above ', 'None of the above', 'opt_1', 26, '2023-07-25 18:29:23.042413', '2023-07-25 18:29:23.042413', 0),
(41, 3, ' How much storage space does DATETIME require ? ', '1', '2', '4', '8', 'opt_2', 26, '2023-07-25 18:30:33.790808', '2023-07-25 18:30:33.790808', 0),
(42, 4, ' What is a candidate key ?', 'Alias for foreign key ', ' Used to identify a column ', 'Alias for primary key', 'Used to uniquely identify a row', 'opt_2', 26, '2023-07-25 18:32:01.836719', '2023-07-25 18:32:01.836719', 0),
(43, 1, 'Which of these return a result to the client?', 'Stored functions  Events', ' Stored procedures', 'Triggers', ' Events', 'opt_2', 29, '2023-07-26 11:29:24.564899', '2023-07-26 11:29:24.564899', 0),
(44, 2, 'What executes on a time activated basis according to a schedule?', 'Stored program', 'Events', 'Triggers', '  Stored procedures', 'opt_3', 29, '2023-07-26 11:32:08.316696', '2023-07-26 11:32:08.316696', 0),
(45, 3, 'Which statements does not modify the table?', 'INSERT  ', 'UPDATE', ' DELETE', ' SELECT', 'opt_4', 29, '2023-07-26 11:33:18.611628', '2023-07-26 11:33:18.611628', 0),
(46, 4, ' To produce a stored function, which statement is used?', 'PRODUCE FUNCTION ', ' CREATE FUNCTION', ' PRODUCE PROCEDURE', 'CREATE PROCEDURE', 'opt_1', 29, '2023-07-26 11:34:22.334147', '2023-07-26 11:34:22.334147', 0),
(47, 1, 'Which statement is used to create a trigger?', 'CREATE TRIGGER', ' CREATE TRIGGERS', 'PRODUCE TRIGGER', '  PRODUCE TRIGGERS', 'opt_2', 30, '2023-07-26 11:40:15.130056', '2023-07-26 11:40:15.130056', 0),
(48, 2, 'For which are triggers not supported?', 'delete ', 'update ', 'insert', ' views', 'opt_1', 30, '2023-07-26 11:56:58.081327', '2023-07-26 11:56:58.081327', 0),
(49, 3, ' Which of these is a stored program associated with a schedule?', 'Trigger', ' Event ', 'Stored function ', 'Stored procedure', 'opt_1', 30, '2023-07-26 11:58:23.849953', '2023-07-26 11:58:23.849953', 0),
(50, 4, ' Which log does the event scheduler log to?', 'error', ' record ', 'library ', 'update', 'opt_3', 30, '2023-07-26 12:01:06.381846', '2023-07-26 12:01:06.381846', 0),
(51, 5, 'Which clause specifies periodic execution at fixed intervals?', 'EVERY ', 'ALL ', 'AT', ' ALTERNATE', 'opt_4', 30, '2023-07-26 12:02:32.699239', '2023-07-26 12:02:32.699239', 0),
(52, 1, ' The default definer of an event is the user who ____', 'created the database', ' created the event ', 'created the table', ' created the column', 'opt_2', 32, '2023-07-26 12:09:32.602519', '2023-07-26 12:09:32.602519', 0),
(53, 2, 'Which case does InnoDB store database names in?', 'lower   ', 'upper', 'mixed', 'random', 'opt_2', 32, '2023-07-26 12:12:12.341538', '2023-07-26 12:12:12.341538', 0),
(54, 3, ' Which is case sensitive in MySQL?', 'Event names  Column names', 'Logfile group names', 'Column names', ' Indexes', 'opt_4', 32, '2023-07-26 12:13:19.722746', '2023-07-26 12:13:19.722746', 0),
(55, 4, 'What is AI in terms of database collation?', 'Accent Insensitive', ' Augment Insensitive', 'Articulate Insensitive', '  Addition Insensitive', 'opt_1', 32, '2023-07-26 12:14:44.684800', '2023-07-26 12:14:44.684800', 0),
(56, 1, 'What does UTF stand for int utf8?', 'Universal Transformation Format ', ' Unicode Transformation Format', 'Universal Transformation Formula ', 'Unicode Transformation Formula', 'opt_2', 33, '2023-07-26 12:27:59.469501', '2023-07-26 12:27:59.469501', 0),
(57, 2, 'Prior to MySQL 6.0, utf8 was ____', '3 bytes', ' 4 bytes', ' 8 bytes ', '9 bytes', 'opt_3', 33, '2023-07-26 12:28:51.635476', '2023-07-26 12:28:51.635476', 0),
(58, 3, 'Which statement is used to select a default database?', 'USE', ' CREATE ', 'DROP ', 'SCHEMA', 'opt_1', 33, '2023-07-26 12:29:56.132197', '2023-07-26 12:29:56.132197', 0),
(59, 4, 'Which keyword is the synonym for DATABASE?', 'TABLE ', ' OBJECT', ' DB', 'SCHEMA', 'opt_3', 33, '2023-07-26 12:32:07.505574', '2023-07-26 12:32:07.505574', 0),
(60, 1, ' Java is a ?', 'high-level programming language', ' object-oriented (class-based) programming language ', 'functional, imperative and reflective programming language ', 'All the above', 'opt_1', 28, '2023-07-26 12:56:23.709199', '2023-07-26 12:56:23.709199', 0),
(61, 2, 'Java is designed by', 'Dennis Ritchie   ', 'James Gosling', 'Charles Babbage', 'Guido van Rossum', 'opt_2', 28, '2023-07-26 12:57:34.795961', '2023-07-26 12:57:34.795961', 0),
(62, 3, 'Java first appeared in', 'May 23, 1995   ', '23 July, 1994', '18 August, 2001', '13 September, 1983', 'opt_2', 28, '2023-07-26 12:59:40.688755', '2023-07-26 12:59:40.688755', 0),
(63, 4, 'Java influenced by', 'C++', 'Objective-C', '  Ada ', 'All the above', 'opt_3', 28, '2023-07-26 13:01:01.009350', '2023-07-26 13:01:01.009350', 0),
(64, 1, 'What is the value of the expression 9/9 ?', ' 1 ', '10 ', 'none of the above', '0', 'opt_3', 34, '2023-07-26 13:06:33.881189', '2023-07-26 13:06:33.881189', 0),
(65, 2, ' What is the stored in the object obj in \"box obj;\" lines of code ?', 'Garbage  ', 'Any arbitrary pointer ', 'NULL', 'Memory address of allocated memory of object.', 'opt_2', 34, '2023-07-26 13:09:24.530835', '2023-07-26 13:09:24.530835', 0),
(66, 1, ' ___ they are the present obligations arising from past events. It also arises when an asset is created or acquired.', 'Asset', ' Liabilities', 'Equity', 'All', 'opt_2', 19, '2023-07-26 17:45:54.058055', '2023-07-26 17:45:54.058055', 0),
(67, 2, '___ is a residual interest in the assets after deducting liabilities', ' Income', ' Equity', ' Expenses', 'None', 'opt_2', 19, '2023-07-26 17:48:27.989553', '2023-07-26 17:48:27.989553', 0),
(68, 3, '___concept tells that to recognize revenue it has to be realized.', ' Accrual concept ccct c)d) ', ' Matching concept', ' Realization concept ', 'None View bAnswer', 'opt_3', 19, '2023-07-26 17:51:35.705090', '2023-07-26 17:51:35.705090', 0),
(69, 4, ' Prepaid Insurance A/cis ___ A/c', ' Real', ' Nominal ', 'Personal ', 'None', 'opt_2', 19, '2023-07-26 17:58:47.302041', '2023-07-26 17:58:47.302041', 0),
(70, 5, '___ is a brief explanation to a journal entry, given below the journal entry, within brackets', 'Narration ', ' Ledger', 'Credit', ' Debit', 'opt_1', 19, '2023-07-26 18:01:03.732592', '2023-07-26 18:01:03.732592', 0),
(71, 5, '___ is a brief explanation to a journal entry, given below the journal entry, within brackets', 'Narration ', ' Ledger', 'Credit', ' Debit', 'opt_1', 19, '2023-07-26 18:01:19.953065', '2023-07-26 18:01:19.953065', 0),
(72, 1, 'Mines quarries is the example of ___ assets', ' Fictitious assets ', ' Liquid assets ', 'Intangible assets ', 'Wasting assets', 'opt_4', 20, '2023-07-26 18:09:58.040175', '2023-07-26 18:09:58.040175', 0),
(73, 1, 'Mines quarries is the example of ___ assets', ' Fictitious assets ', ' Liquid assets ', 'Intangible assets ', 'Wasting assets', 'opt_4', 20, '2023-07-26 18:10:14.309164', '2023-07-26 18:10:14.309164', 1),
(74, 2, 'Sale proceeds of fixed assets are a', 'Capital profit ', ' Revenue profit', 'Capital receipt ', 'Revenue receipt', 'opt_3', 20, '2023-07-26 18:12:46.751256', '2023-07-26 18:12:46.751256', 0),
(75, 1, 'Real account records ', 'Gains and losses  ', 'Dealings in commodities', ' Dealings with creditors or debtors', ' All of the above', 'opt_3', 20, '2023-07-26 18:15:16.133628', '2023-07-26 18:15:16.133628', 0),
(76, 4, 'Balance sheets are prepared', 'Annually ', 'Daily', '  Monthly', 'Weekly', 'opt_1', 20, '2023-07-26 18:16:36.823077', '2023-07-26 18:16:36.823077', 0),
(77, 5, 'What is the capital of India ?', 'Mumbai', 'Delhi', 'Chennai', 'Indore', 'opt_1', 14, '2023-07-27 11:47:13.864730', '2023-07-27 11:47:13.864730', 0),
(78, 1, 'RAD stands for', ' Rapid Application Development ', ' Required Application Development ', 'Rapid Application Developers ', ' Rapid Application Dispositio', 'opt_1', 5, '2023-07-27 12:52:19.442222', '2023-07-27 12:52:19.442222', 0),
(79, 2, 'Which of the following are valid step in SDLC framework?', 'Requirement Gathering  ', ' System Analysis ', 'Software Design', 'All of the above', 'opt_4', 5, '2023-07-27 12:53:18.734709', '2023-07-27 12:53:18.734709', 0),
(80, 3, 'Which of the following is the first step in SDLC framwork?', 'Feasibility Study B. Requirement Gathering ', ' Requirement Gathering ', ' Communication ', 'System Analysis', 'opt_3', 5, '2023-07-27 12:54:28.010551', '2023-07-27 12:54:28.010551', 0),
(81, 1, 'xgter', 'dg', 'fd', 'dg', 'dg', 'opt_2', 35, '2023-07-27 12:54:49.765270', '2023-07-27 12:54:49.765270', 1),
(82, 4, 'Which of the following is not correct model in Software Development Paradigm?', 'Waterfall Model ', 'P model', 'Spiral Model', 'V model', 'opt_2', 5, '2023-07-27 12:57:41.296444', '2023-07-27 12:57:41.296444', 0),
(83, 5, 'Waterfall model is not suitable for:', 'Small projects ', 'Complex projects ', 'Accommodating changes ', 'Maintenance Projects', 'opt_3', 5, '2023-07-27 13:05:36.588467', '2023-07-27 13:05:36.588467', 0),
(84, 6, 'Which type of integration testing uses stubs?', 'Top down testing ', 'Bottom up testing', 'Both in top down and bottom up testing', 'System testing', 'opt_1', 5, '2023-07-27 13:06:41.415280', '2023-07-27 13:06:41.415280', 0),
(85, 7, 'Which one of the following is a functional requirement?', 'Maintainability ', ' Portability', 'Business needs', 'Reliability', 'opt_3', 5, '2023-07-27 13:08:39.746028', '2023-07-27 13:08:39.746028', 0),
(86, 8, 'What is the major drawback of using RAD Model?', 'Highly specialized & skilled developers/designers are required ', ' Increases reusability of components ', ' Encourages customer/client feedback ', ' Increases reusability of components, Highly specialized & skilled developers/designers are required', 'opt_4', 5, '2023-07-27 13:09:44.190560', '2023-07-27 13:09:44.190560', 0),
(87, 9, ' Which type of integration testing uses stubs?', 'Top down testing ', 'Bottom up testing', 'Both in top down and bottom up testing', ' System testing', 'opt_1', 5, '2023-07-27 13:11:03.423207', '2023-07-27 13:11:03.423207', 0),
(88, 10, 'In the maintenance phase the product must be tested against previous test cases. This is known as __________ testing.', 'Unit ', 'Regression ', ' Acceptance', ' Integration', 'opt_2', 5, '2023-07-27 13:12:02.169381', '2023-07-27 13:12:02.169381', 0),
(89, 1, 'Java is a Successor to which programming language?', 'B', ' C', ' C++', ' D', 'opt_3', 35, '2023-07-27 13:12:38.115429', '2023-07-27 13:12:38.115429', 0),
(90, 2, 'Who invented Java language?', 'Dennis Ritchie', ' James Gosling ', ' Larry Page ', ' Serge Page', 'opt_2', 35, '2023-07-27 13:15:11.895501', '2023-07-27 13:15:11.895501', 0),
(91, 1, ' What is the return type of a method that does not return any value?', ' int', ' float ', ' void ', ' double', 'opt_3', 6, '2023-07-27 13:16:07.224788', '2023-07-27 13:16:07.224788', 0),
(92, 2, 'What is the process of defining more than one method in a class differentiated by method signature?', 'Function overriding ', ' Function overloading', ' Function doubling', 'None of the mentioned', 'opt_2', 6, '2023-07-27 13:17:14.969387', '2023-07-27 13:17:14.969387', 0),
(93, 3, 'What is the original name of Java Programming language?', 'J++', ' C++ ', 'OAK ', ' TEAK', 'opt_3', 35, '2023-07-27 13:18:14.320776', '2023-07-27 13:18:14.320776', 0),
(94, 3, 'Which of the following is a method having same name as that of it’s class?', ' finalize', 'delete ', ' class', 'constructor', 'opt_4', 6, '2023-07-27 13:18:19.790252', '2023-07-27 13:18:19.790252', 0),
(95, 4, ' Which method can be defined only once in a program?', 'main method ', ' finalize method', 'static method', 'private method', 'opt_1', 6, '2023-07-27 13:19:34.239300', '2023-07-27 13:19:34.239300', 0),
(96, 2, 'Which keyword is used by the method to refer to the object that invoked it?', ' import b c) d) ', 'catch', 'abstract', 'this', 'opt_4', 6, '2023-07-27 13:21:19.740090', '2023-07-27 13:21:19.740090', 0),
(97, 4, 'Which laboratory was Java invented or developed in? ', ' Bell Laboratory', 'Sun Microsystems ', ' Dennis Ritchie Office ', 'Johnson and Johnson', 'opt_2', 35, '2023-07-27 13:21:46.655032', '2023-07-27 13:21:46.655032', 0),
(98, 5, 'The name \"JAVA\" is known to the world as?', ' A Tea Brand in India ', ' A Coffee Brand in Africa', ' An Island in Indonesia', ' Ragi Malt Juice', 'opt_3', 35, '2023-07-27 13:23:55.144416', '2023-07-27 13:23:55.144416', 0),
(99, 1, 'Who developed object-oriented programming?', 'Adele Goldberg', ' Dennis Ritchie', ' Alan Kay ', 'Andrea Ferro', 'opt_3', 7, '2023-07-27 13:24:41.033295', '2023-07-27 13:24:41.033295', 0),
(100, 2, 'Which of the following is not an OOPS concept?', 'Encapsulation  ', 'Polymorphism', ' Exception', 'Abstraction', 'opt_3', 7, '2023-07-27 13:25:56.022167', '2023-07-27 13:25:56.022167', 0),
(101, 3, 'Which of the following language supports polymorphism but not the classes?', 'C++ programming language', 'ada programming language', 'Java programming language', 'C# programming language', 'opt_2', 7, '2023-07-27 13:28:48.678847', '2023-07-27 13:28:48.678847', 0),
(102, 4, ' Define the programming language, which does not support all four types of inheritance?', 'Smalltalk ', ' C++', 'Kotlin', 'Java', 'opt_4', 7, '2023-07-27 13:30:48.736144', '2023-07-27 13:30:48.736144', 0),
(103, 5, ' Which feature of OOPS described the reusability of code?', 'Abstraction ', 'Encapsulation', 'Polymorphism', ' Inheritance', 'opt_1', 7, '2023-07-27 13:32:35.646123', '2023-07-27 13:32:35.646123', 0),
(104, 1, 'Which of the following OOP concept is not true for the C++ programming language?', 'A class must have member functions', 'C++ Program can be easily written without the use of classes', 'At least one instance should be declared within the C++ program', 'C++ Program must contain at least one class', 'opt_4', 8, '2023-07-27 13:43:48.868580', '2023-07-27 13:43:48.868580', 0),
(105, 2, 'Which of the following language uses the classes but not the polymorphism concept?', 'Procedure Oriented language', 'Object-based language', 'Class-based language', 'If classes are used, then the polymorphism concept will always be used in the programming languages.', 'opt_2', 8, '2023-07-27 13:44:37.574082', '2023-07-27 13:44:37.574082', 0),
(106, 3, 'Is it true to use polymorphism in the C programming language?', 'True', ' False', '23', '45', 'opt_1', 8, '2023-07-27 13:45:35.794898', '2023-07-27 13:45:35.794898', 0),
(107, 4, ' Which function best describe the concept of polymorphism in programming languages?', 'Class member function', 'Virtual function', 'Inline function', 'Undefined function', 'opt_2', 8, '2023-07-27 13:46:29.645528', '2023-07-27 13:46:29.645528', 0),
(108, 5, 'Which of the following feature is also known as run-time binding or late binding?', 'Dynamic typing', 'Dynamic loading', 'Dynamic binding', 'Data hiding', 'opt_3', 8, '2023-07-27 13:47:33.599811', '2023-07-27 13:47:33.599811', 0),
(109, 1, ' What is the size of a class?', 'Sum of the size of all inherited variables along with the variables of the same class', 'The size of the class is the largest size of the variable of the same class', 'Classes in the programming languages do not have any size', 'Sum of the size of all the variables within a class.', 'opt_3', 9, '2023-07-27 13:49:17.953579', '2023-07-27 13:49:17.953579', 0),
(110, 2, 'Which class cannot create its instance?', 'Parent class', 'Nested class', 'Anonymous class', 'Abstract class', 'opt_4', 9, '2023-07-27 13:50:09.843326', '2023-07-27 13:50:09.843326', 0),
(111, 1, ' Which of the following variable violates the definition of encapsulation?', 'Array variables', 'Local variables', 'Global variables', 'Public variables', 'opt_3', 9, '2023-07-27 14:36:33.161323', '2023-07-27 14:36:33.161323', 0),
(112, 4, 'How can the concept of encapsulation be achieved in the program?', 'By using the Access specifiers', 'By using the concept of Abstraction', 'By using only private members', 'By using the concept of Inheritance', 'opt_1', 9, '2023-07-27 14:37:31.785095', '2023-07-27 14:37:31.785095', 0),
(113, 5, 'Encapsulation is_____?', 'technique of combining more than one member functions into a single unit.', 'mechanism of combining more than one data member into a single unit.', 'mechanism of combining more than one data members and member functions that implement on those data members into a single unit', 'technique of combining more than one data members and member functions into a single unit, which can manipulate any data.', 'opt_3', 9, '2023-07-27 14:38:41.123285', '2023-07-27 14:38:41.123285', 0),
(114, 1, 'Which of the following is TRUE about variables in Python?', 'Variables can change in value.', ' The kind of data pointed by the variable can be changed later. ', 'All of these are correct.', ' There is no need to declare the type of variable.', 'opt_3', 41, '2023-07-27 16:04:13.124923', '2023-07-27 16:04:13.124923', 0),
(115, 2, 'What is the output of the following code? print (bool(1), bool(0))', 'False True ', 'True False', ' 1 0', ' 1,0', 'opt_2', 41, '2023-07-27 16:05:51.702606', '2023-07-27 16:05:51.702606', 0),
(116, 3, 'Which of the following is TRUE about Python?', 'Python scripts only run on Windows Operating System.', ' None of these. ', 'In Python, the statements ends with a semi-colon.', ' Python scripts end with .python', 'opt_2', 41, '2023-07-27 16:08:20.206067', '2023-07-27 16:08:20.206067', 0),
(117, 4, 'How can we convert the following string variable into  an  integer? num = \"5\"', 'By using the float() function. ', 'A string variable cannot be converted to an integer. ', 'By using the integer() function. ', 'By using the int() function.', 'opt_3', 41, '2023-07-27 16:11:09.837658', '2023-07-27 16:11:09.837658', 0),
(118, 6, 'What is the output of the following code? print (str(bool(1) + float(10)/float(2)))', '\"2.5\" ', '6.0 ', '\"6.0\" ', '1.5', 'opt_2', 41, '2023-07-27 16:17:26.989088', '2023-07-27 16:17:26.989088', 0),
(119, 1, 'What values do True and False represent?', 'True, -1 - False ', 'None of these ', '1 - True, 0 - False ', '0 - True, 1 - False', 'opt_3', 44, '2023-07-27 16:42:03.510963', '2023-07-27 16:42:03.510963', 0),
(120, 2, 'How can we run a Python script file named \"hello.py\" from the command line?', 'python hello ', 'python hello.py', ' py hello ', 'hello.py', 'opt_2', 44, '2023-07-27 16:43:57.033839', '2023-07-27 16:43:57.033839', 0),
(121, 3, 'What is the output of the following code? print (1+3)', ' 1+3', ' None of these.', ' 4', ' 13', 'opt_3', 44, '2023-07-27 17:17:25.981755', '2023-07-27 17:17:25.981755', 0),
(122, 4, 'A Python script file has ________ as its file extension', 'py ', 'pyth', ' python ', 'pi', 'opt_1', 44, '2023-07-27 17:19:57.858263', '2023-07-27 17:19:57.858263', 0),
(123, 1, 'How can we  convert the following variable to a string? num = 5', 'string(num) ', 'All of these. ', 'str(num) ', 'num + \"\"', 'opt_3', 45, '2023-07-27 18:01:54.791275', '2023-07-27 18:01:54.791275', 0),
(124, 2, 'Which of the following is FALSE about variables?', 'Variables can be one of the reserved Python keywords like def, elif etc', 'All of these are TRUE.', ' Variables must begin with a letter.', ' Variables can contain letters, numbers, and underscores.', 'opt_1', 45, '2023-07-27 18:03:47.743327', '2023-07-27 18:03:47.743327', 0),
(125, 3, 'Which statement is used to print text to the output console?', 'display ', 'echo ', 'Any of these.', ' print', 'opt_4', 45, '2023-07-27 18:07:50.331402', '2023-07-27 18:07:50.331402', 0),
(126, 4, ' Which one of these is incorrect?', 'float(‘nan’)  ', ' float(‘inf’)  ', ' float(’12+34′) ', 'float(’56’+’78’)', 'opt_3', 45, '2023-07-28 10:10:15.537261', '2023-07-28 10:10:15.537261', 0),
(127, 1, ' The value of the Python expression given below would be:  4+2**5//10', '77  ', ' 0 ', ' 3  ', ' 7', 'opt_4', 47, '2023-07-28 10:15:28.296813', '2023-07-28 10:15:28.296813', 0),
(128, 2, 'The return value for trunc() would be:', 'bool  ', ' float ', ' int ', 'None', 'opt_3', 47, '2023-07-28 10:25:55.605852', '2023-07-28 10:25:55.605852', 0),
(129, 3, 'The output of this Python code would be:  s=\'{0}, {1}, and {2}’  s.format(‘hi’, ‘great’, ‘day’)', 'hi, great, and day’ ', ' ‘hi great and day’ ', ' ‘hi, great, day’  ', ' Error', 'opt_1', 47, '2023-07-28 10:27:42.620187', '2023-07-28 10:27:42.620187', 0),
(130, 4, 'Which arithmetic operators can we NOT use with strings?', '–  ', ' + ', '  *  ', ' All of the above', 'opt_1', 47, '2023-07-28 10:28:50.505266', '2023-07-28 10:28:50.505266', 0),
(131, 1, ' Which function removes a set’s first and the last element from a list?', ' pop  ', 'remove ', ' dispose  ', ' discard', 'opt_1', 49, '2023-07-28 11:06:08.134269', '2023-07-28 11:06:08.134269', 0),
(132, 2, 'The output of this Python code would be:  sum(1,2,3)  sum([2,4,6])', '6, 12 ', ' Error, Error  ', ' Error, 12  ', ' 6, Error', 'opt_3', 49, '2023-07-28 11:08:12.769901', '2023-07-28 11:08:12.769901', 0),
(133, 3, 'Which of these functions can NOT be defined under the sys module?', 'sys.argv ', 'sys.readline ', ' sys.path  ', ' sys.platform', 'opt_2', 49, '2023-07-28 11:10:44.810310', '2023-07-28 11:10:44.810310', 0),
(134, 4, 'Which function doesn’t accept any argument?', 're.compile ', ' b. re.findall  ', 'c. re.match  ', 'd. re.purge', 'opt_4', 49, '2023-07-28 11:15:58.385727', '2023-07-28 11:15:58.385727', 0),
(135, 1, 'In Python, the primary use of the tell() method is that:', 'within the file, it tells the end position', '  within the file, it tells the current position  ', 'it tells us if the file is opened  ', ' none of the above', 'opt_2', 53, '2023-07-28 11:18:50.169202', '2023-07-28 11:18:50.169202', 0),
(136, 2, 'The hasattr(obj,name) is used to:  ', ' check if any specific attribute exists ', 'set an attribute  ', ' access the object’s attribute ', 'delete an attribute', 'opt_1', 53, '2023-07-28 11:19:57.933076', '2023-07-28 11:19:57.933076', 0),
(137, 2, 'In Python, find which one isn’t an exception handling keyword. ', ' accept ', ' finally', '  try  ', ' except', 'opt_1', 53, '2023-07-28 11:21:04.620027', '2023-07-28 11:21:04.620027', 0),
(138, 4, 'The hasattr(obj,name) is used to: ', ' check if any specific attribute exists ', ' set an attribute ', ' access the object’s attribute ', ' delete an attribute', 'opt_1', 53, '2023-07-28 11:27:40.172708', '2023-07-28 11:27:40.172708', 0),
(139, 1, 'A FOR-NEXT loop is also described as being what?', 'condition-controlled', ' count-controlled', ' Uncontrolled loop ', 'Controlled loop', 'opt_3', 57, '2023-07-28 17:45:15.951656', '2023-07-28 17:45:15.951656', 0),
(140, 2, 'How are data items added to an array?', 'Items are appended to the next free index ', 'In alphabetical order ', 'Data may only be read from an array, sorry ', 'Whichever way you want', 'opt_2', 57, '2023-07-28 17:47:01.971955', '2023-07-28 17:47:01.971955', 0),
(141, 3, 'What is the index of the lower bound of the following array? Dim Student(24) as string', '24', ' 25 ', '23', ' 0', 'opt_4', 57, '2023-07-28 17:48:31.090517', '2023-07-28 17:48:31.090517', 0),
(142, 4, 'What is the maximum possible length of an identifier?', '16 ', '32 ', '64 ', 'None of these above', 'opt_4', 57, '2023-07-28 17:50:54.527696', '2023-07-28 17:50:54.527696', 0),
(143, 5, ' Who developed the Python language?', 'Zim Den', ' Guido van Rossum ', 'Niene Stom ', 'Wick van Rossum', 'opt_2', 57, '2023-07-28 17:52:41.395840', '2023-07-28 17:52:41.395840', 0),
(144, 1, ' What will be the output of above Python code?  str1=\"6/4\"  print(\"str1\")', ' 1', '  6/4 ', '1.5 ', 'str1', 'opt_4', 58, '2023-07-29 11:48:30.682554', '2023-07-29 11:48:30.682554', 0),
(145, 2, 'Which of the following will result in an error?  str1=\"python\"', ' print(str1[2]) ', ' str1[1]=\"x\" ', ' print(str1[0:9]) ', ' Both (b) and (c)', 'opt_2', 58, '2023-07-29 11:49:36.944758', '2023-07-29 11:49:36.944758', 0),
(146, 3, 'Which of the following is False? ', 'String is immutable.', 'capitalize() function in string is used to return a string by converting the whole given string into uppercase. ', ' lower() function in string is used to return a string by converting the whole given string into lowercase.', 'None of these.', 'opt_2', 58, '2023-07-29 11:51:01.168448', '2023-07-29 11:51:01.168448', 0),
(147, 4, 'What will be the output of below Python code?  str1=\"Information\"  print(str1[2:8])  ', ' format ', ' formatio ', 'orma ', ' ormat', 'opt_1', 58, '2023-07-29 11:52:07.222629', '2023-07-29 11:52:07.222629', 0),
(148, 1, 'What will be the output of below Python code?  str1=\"Aplication\"  str2=str1.replace(\'a\',\'A\')  print(str2)  ', 'application', ' Application', 'ApplicAtion', 'applicAtion', 'opt_3', 59, '2023-07-29 11:53:54.419331', '2023-07-29 11:53:54.419331', 0),
(149, 2, ' What will be the output of below Python code?  str1=\"poWer\"  str1.upper()  print(str1)  ', 'POWER', 'Power ', 'power ', ' poWer', 'opt_4', 59, '2023-07-29 11:55:03.959581', '2023-07-29 11:55:03.959581', 0),
(150, 3, 'What will the below Python code will return?  If str1=', ' It returns the first index position of the first occurance of ', ' It returns the last index position of the last occurance of ', ' It returns the last index position of the first occurance of ', ' It returns the first index position of the first occurance of ', 'opt_1', 59, '2023-07-29 12:05:13.514120', '2023-07-29 12:05:13.514120', 0),
(151, 4, 'What will the below Python code will return?  list1=[0,2,5,1]  str1=\"7\"  for i in list1:  	str1=str1+i  print(str1)  ', ' 70251', ' 7 ', '15 ', 'Error', 'opt_4', 59, '2023-07-29 13:09:38.295268', '2023-07-29 13:09:38.295268', 0),
(152, 1, 'Which of the following will give \"Simon\" as output?  If str1=\"John,Simon,Aryan\" ', ' print(str1[-7:-12]) ', ' print(str1[-11:-7]) ', 'print(str1[-11:-6]) ', ' print(str1[-7:-11])', 'opt_3', 61, '2023-07-29 13:11:44.576982', '2023-07-29 13:11:44.576982', 0),
(153, 2, 'What will following Python code return?  str1=\"Stack of books\" print(len(str1))', ' 13 ', ' 14', ' 15 ', '16', 'opt_2', 61, '2023-07-29 13:14:20.831568', '2023-07-29 13:14:20.831568', 0),
(154, 3, ' Which of the following would give an error?  ', ' list1=[] ', 'list1=[]*3 ', 'list1=[2,8,7] ', 'None of the above', 'opt_4', 61, '2023-07-29 13:15:56.672491', '2023-07-29 13:15:56.672491', 0),
(155, 4, 'Which of the following is True regarding lists in Python?  ', 'Lists are immutable', ' Size of the lists must be specified before its initialization ', ' Elements of lists are stored in contagious memory location.', '  size(list1) command is used to find the size of lists.', 'opt_3', 61, '2023-07-29 13:20:08.171041', '2023-07-29 13:20:08.171041', 0),
(156, 1, 'What is Eclipse?   ', 'a) A programming language ', 'b) A software development environment', 'c) An operating system', 'd) A hardware device Answer: ', 'opt_2', 67, '2023-08-01 15:16:00.643861', '2023-08-01 15:16:00.643861', 0),
(157, 2, 'Which programming languages are supported by Eclipse?    ', 'a) Only Java', 'b) Java and C++', 'c) Java, C++, and Python', 'd) Java, C++, Python, and many other languages', 'opt_4', 67, '2023-08-01 15:29:51.093480', '2023-08-01 15:29:51.093480', 0),
(158, 3, 'Which of the following is not a view in the Eclipse IDE?   ', 'a) Package Explorer', 'b) Console', 'c) Properties', ' d) Compiler', 'opt_4', 67, '2023-08-01 15:34:19.987695', '2023-08-01 15:34:19.987695', 0),
(159, 1, 'What is capital in share market?', 'Capital markets are financial markets that bring buyers and sellers together to trade stocks, bonds, currencies, and other financial assets.', 'op', 'oi', 'iu', 'opt_1', 69, '2023-08-02 15:25:31.298387', '2023-08-02 15:25:31.298387', 0),
(160, 2, 'What are the other terms used instead of word Share?', 'Share is equal to Scrip, Equity and Stock. So if anyone uses these words in future then it will mean the same thing.', 'UHY', 'UU', 'JJ', 'opt_1', 69, '2023-08-02 15:26:00.452018', '2023-08-02 15:26:00.452018', 0),
(161, 3, 'Why is capital market important?', 'Capital markets are important because they finance the economy, allocate risk, and support economic growth and financial stability.', 'sd', 'fd', 'df', 'opt_1', 69, '2023-08-02 15:26:24.088007', '2023-08-02 15:26:24.088007', 0),
(162, 4, 'What are the Major Market Participants?', 'The main participants of the capital markets are savers (also known as investors), borrowers, and stockholders.', 'qwe', 'qwesd', 'sdf', 'opt_1', 69, '2023-08-02 15:26:45.227161', '2023-08-02 15:26:45.227161', 0),
(163, 4, 'What is a regulatory framework?', 'Regulatory frameworks are legal mechanisms that exist on national and international levels. They can be mandatory and coercive (national laws and regulations, contractual obligations) or voluntary (integrity pacts, codes of conduct, arms control agreement', 'asd', 'fg', 'fdv', 'opt_1', 69, '2023-08-02 15:27:01.202133', '2023-08-02 15:27:01.202133', 0),
(164, 1, 'testing', '1', '2', '3', '4', 'opt_1', 70, '2023-08-02 15:36:53.227349', '2023-08-02 15:36:53.227349', 0),
(165, 2, 'testing 2', '1', '2', '3', '4', 'opt_1', 70, '2023-08-02 15:37:07.535255', '2023-08-02 15:37:07.535255', 0),
(166, 3, 'testing 3', '1', '23', '3q4', '5', 'opt_1', 70, '2023-08-02 15:37:24.537839', '2023-08-02 15:37:24.537839', 0),
(167, 1, 'What will be the value of x in this equation-  2x - 4 = 0', '0', '2', '1', '4', 'opt_2', 72, '2023-08-02 17:02:38.028269', '2023-08-02 17:02:38.028269', 0),
(168, 2, ' Solve: 4/2 + 7/2 =', '5 1/4', ' 5 1/2', '11/4', '  7/4', 'opt_1', 72, '2023-08-02 17:03:26.857871', '2023-08-02 17:03:26.857871', 0),
(169, 1, 'Use the formula above to find a when b = 4, c = 5.', '2', '1', '3', '6', 'opt_3', 71, '2023-08-02 17:04:18.257382', '2023-08-02 17:04:18.257382', 0),
(170, 2, ' 12t – 10 = 14q + 2. Find q. ', '8', '6', '-6', '0', 'opt_3', 71, '2023-08-02 17:04:53.468753', '2023-08-02 17:04:53.468753', 0),
(171, 1, 'Sample Question Y = 7x + 3Where does this line cross the y-axis?', '32', '55', '66', '34334', 'opt_2', 73, '2023-08-02 17:08:54.242173', '2023-08-02 17:08:54.242173', 0),
(172, 2, 'The USE command', '10', ' Ledger', 'Both in top down and bottom up testing', 'None of the above', 'opt_4', 73, '2023-08-02 17:09:18.305432', '2023-08-02 17:09:18.305432', 0),
(173, 1, ' What is CSS?', 'CSS is a style sheet language', 'CSS is designed to separate the presentation and content, including layout, colors, and fonts', 'CSS is the language used to style the HTML documents', 'All of the mentioned', 'opt_4', 75, '2023-08-04 11:08:24.657710', '2023-08-04 11:08:24.657710', 0),
(175, 3, 'Which of the following CSS selectors are used to specify a group of elements?', 'tag', 'id', 'class', 'both class and tag', 'opt_3', 75, '2023-08-04 11:09:54.856358', '2023-08-04 11:09:54.856358', 0),
(176, 1, 'What is CSS?', 'CSS is a style sheet language', ' CSS is designed to separate the presentation and content, including layout, colors, and fonts', 'CSS is the language used to style the HTML documents', 'All of the mentioned', 'opt_4', 78, '2023-08-04 11:47:31.201196', '2023-08-04 11:47:31.201196', 0),
(178, 3, 'Which of the following CSS selectors are used to specify a group of elements?', 'tag', 'id', 'class', 'both', 'opt_3', 78, '2023-08-04 11:51:43.909303', '2023-08-04 11:51:43.909303', 0),
(179, 4, ' Which of the following CSS framework is used to create a responsive design?', 'django', 'rails', 'larawell', ' bootstrap', 'opt_4', 78, '2023-08-04 11:53:05.785836', '2023-08-04 11:53:05.785836', 0),
(180, 5, ' Which of the following type of HTML tag is used to define an internal style sheet?', '<script>', '<link>', '<class>', '<style>', 'opt_4', 78, '2023-08-04 11:54:54.787873', '2023-08-04 11:54:54.787873', 0),
(181, 1, 'Which of the following CSS property is used to make the text bold?', 'text-decoration: bold', 'font-weight: bold', ' font-style: bold', 'text-align: bold', 'opt_2', 79, '2023-08-04 11:56:14.162933', '2023-08-04 11:56:14.162933', 0),
(182, 2, ' Which of the following CSS style property is used to specify an italic text?', 'style', 'font', 'font-style', '@font-face', 'opt_3', 79, '2023-08-04 11:57:04.929050', '2023-08-04 11:57:04.929050', 0),
(183, 3, ' Which of the following is the correct way to apply CSS Styles?', 'in an external CSS file', ' inside an HTML element', 'inside the <head> section of an HTML page', 'all of the mentioned', 'opt_4', 79, '2023-08-04 11:58:34.097456', '2023-08-04 11:58:34.097456', 0),
(184, 1, ' Which of the following statements define Computer Graphics?', ' It refers to designing plans', 'It means designing computers', 'It refers to designing images', 'None of the mentioned View Answer', 'opt_3', 80, '2023-08-04 12:10:49.641776', '2023-08-04 12:10:49.641776', 0),
(185, 2, 'Among the given scientists/inventor who is known as the father of Computer Graphics?', ' Nikola Tesla', ' Ivan Sutherland', 'Ada Lovelace', 'Marie Curie', 'opt_2', 80, '2023-08-04 12:11:36.617247', '2023-08-04 12:11:36.617247', 0),
(186, 3, 'Which of the following is a Computer Graphics type?', ' Raster and Vector', 'Raster and Scalar', ' Scalar only', ' All of the above', 'opt_1', 80, '2023-08-04 12:12:43.959501', '2023-08-04 12:12:43.959501', 0),
(187, 1, 'test 3123123123123', '1', '2', '3', '4', 'opt_1', 14, '2023-08-04 12:41:50.200000', '2023-08-04 12:41:50.200000', 0),
(188, 1, 'test 3123123123123', '1', '2', '3', '4', 'opt_1', 14, '2023-08-04 12:42:08.125123', '2023-08-04 12:42:08.125123', 0),
(189, 1, 'test 3123123123123', '1', '2', '3', '4', 'opt_1', 78, '2023-08-04 12:47:56.099917', '2023-08-04 12:47:56.099917', 0),
(190, 6, 'What is the capital of India ?', 'Mumbai', 'Delhi', 'Chennai', 'Indore', 'opt_2', 25, '2023-08-05 09:43:44.746916', '2023-08-05 09:43:44.746916', 0),
(191, 1, '  A path made by a moving point.', 'line', 'space', 'shape', 'Texture', 'opt_2', 85, '2023-08-08 17:50:04.179321', '2023-08-08 17:50:04.179321', 0),
(192, 2, 'Texture is...', ' The way the surface feels or looks.', 'The area above an object.', 'A path made by a moving point.', 'None of the above.', 'opt_2', 85, '2023-08-08 17:53:01.055939', '2023-08-08 17:53:01.055939', 0),
(193, 3, 'By joining lines you can create:', 'Shapes', 'Color', 'Space`', 'Texture', 'opt_1', 85, '2023-08-08 17:54:32.680530', '2023-08-08 17:54:32.680530', 0),
(194, 4, 'Excitement and interest in artworks are created using:', 'Contrast', 'Rhythm', 'value', 'Symmetrical', 'opt_2', 85, '2023-08-08 18:18:05.838308', '2023-08-08 18:18:05.838308', 0),
(195, 5, '  A  plan for selecting colors for a composition is also known as a ________.', 'Color spectrum', 'Color Wheel', '  Color Scheme', 'Color Mix', 'opt_3', 85, '2023-08-08 18:18:59.878022', '2023-08-08 18:18:59.878022', 0),
(196, 1, ' Select the wrong data communication system component', 'Protocol   ', 'Medium', 'Transits', 'Receiver', 'opt_1', 90, '2023-08-09 13:00:51.025358', '2023-08-09 13:00:51.025358', 0),
(197, 2, 'Time required for a message to travel from one device to another is known as', 'Wait time ', 'Response time ', 'Transit time ', 'Dialogue time', 'opt_2', 90, '2023-08-09 13:01:41.589841', '2023-08-09 13:01:41.589841', 0),
(198, 3, 'If one link fails, only that link is affected. All other links remain active. Which topology does this ?', 'Star topology ', 'Mesh topology ', 'Physical topology ', 'Bus topology', 'opt_2', 90, '2023-08-09 13:02:26.164010', '2023-08-09 13:02:26.164010', 0),
(199, 4, 'OSI model means', 'Operating source interconnection  ', 'Open source interconnection', ' Open systems interconnection', 'Operating system interconnection', 'opt_3', 90, '2023-08-09 13:03:11.891472', '2023-08-09 13:03:11.891472', 0),
(200, 5, ' Select the correct cable that transport signals in the form of light', 'Shielded Twisted Pair  ', 'cable Coaxial Cable', 'Twisted-Pair cable ', 'Fiber optic cable', 'opt_4', 90, '2023-08-09 13:04:12.690144', '2023-08-09 13:04:12.690144', 0),
(201, 6, 'Twisted pair wires, coaxial cable, optical fiber cables are the examples of', 'Wireless Media', ' Wired Media ', 'All of the above ', 'None of the above', 'opt_2', 90, '2023-08-09 13:05:11.098923', '2023-08-09 13:05:11.098923', 0),
(202, 1, 'Office salaries, advertising and sales commissions are the examples of:', 'Financial Expenses', 'Operating Expenses', 'Marketing Expenses ', ' D.  Direct Expenses', 'opt_2', 98, '2023-08-11 16:32:37.124422', '2023-08-11 16:32:37.124422', 0),
(203, 2, '  Under the diminishing balance method, depreciation is calculated on:', ' The original cost', 'The scrap value ', ' Book value', 'Both original cost and Scrap value', 'opt_3', 98, '2023-08-11 16:34:38.190004', '2023-08-11 16:34:38.190004', 0),
(204, 3, ' In a single entry system, it is NOT possible to prepare:', 'rial balance ', ' Statement of affairs  ', ' Balance Sheet  ', '  Sales accounts', 'opt_1', 98, '2023-08-11 16:36:50.588222', '2023-08-11 16:36:50.588222', 0),
(205, 4, 'Cash book is a part of _________ .', 'Voucher', 'General Journal', 'General Ledger', 'Trial Balance', 'opt_3', 98, '2023-08-11 16:39:12.636228', '2023-08-11 16:39:12.636228', 0),
(206, 4, 'Which of the following assets are shown at written down value in balance sheet?', 'Current assets ', 'Liquid assets', '  Floating assets   ', ' Fixed assets', 'opt_4', 98, '2023-08-11 16:40:44.485764', '2023-08-11 16:40:44.485764', 0),
(207, 5, 'Under the straight line method of depreciation:', 'Amount of depreciation increases every year  B.  Amount of depreciation remains constant for every year   Amount of depreciation increases every year  B.  Amount of depreciation remains constant for every year  C.  Amount of depreciation decreases every y', 'Amount of depreciation remains constant for every year', ' Amount of depreciation increases every yea', ' Amount of depreciation increases every yeaone of the given options', 'opt_1', 98, '2023-08-11 16:45:24.248536', '2023-08-11 16:45:24.248536', 0),
(208, 2, 'Which of the following CSS selectors are used to specify a group of elements?', 'Narration ', ' Ledger', 'All of the above ', 'None of the above', 'opt_3', 100, '2023-08-17 12:23:16.721276', '2023-08-17 12:23:16.721276', 0),
(209, 1, 'Which of the following tag is used to embed css in html page?', 'Top down testing ', ' Liquid assets ', 'Triggers', 'None', 'opt_4', 102, '2023-08-17 12:47:35.130893', '2023-08-17 12:47:35.130893', 0),
(210, 2, 'Mines quarries is the example of ___ assets', 'Narration ', ' Liquid assets ', 'All of the above ', 'None', 'opt_3', 102, '2023-08-17 12:47:54.197055', '2023-08-17 12:47:54.197055', 0),
(211, 3, 'Which of the following CSS selectors are used to specify a group of elements?', 'Narration ', ' Liquid assets ', 'Credit', '<style>', 'opt_2', 102, '2023-08-17 12:48:17.597884', '2023-08-17 12:48:17.597884', 0),
(212, 4, 'Which of the following tag is used to embed css in html page?', 'CSS is a style sheet language', ' is a pseudonym for the SELECT command', 'Triggers', 'None of the above', 'opt_1', 102, '2023-08-17 12:48:42.665904', '2023-08-17 12:48:42.665904', 0),
(213, 5, 'The USE command', 'CSS is a style sheet language', ' is a pseudonym for the SELECT command', 'Both in top down and bottom up testing', 'None', 'opt_1', 102, '2023-08-17 12:49:40.668666', '2023-08-17 12:49:40.668666', 0),
(214, 1, 'Which of the following tag is used to embed css in html page?', 'Narration ', ' is a pseudonym for the SELECT command', 'Both in top down and bottom up testing', ' Events', 'opt_1', 103, '2023-08-17 12:51:47.077029', '2023-08-17 12:51:47.077029', 0),
(215, 2, '___ is a brief explanation to a journal entry, given below the journal entry, within brackets', '10', ' Liquid assets ', 'Both in top down and bottom up testing', ' Events', 'opt_2', 103, '2023-08-17 12:52:24.481604', '2023-08-17 12:52:24.481604', 0),
(216, 4, 'Which of the following CSS selectors are used to specify a group of elements?', ' Fictitious assets ', ' C++', 'Triggers', 'None', 'opt_4', 103, '2023-08-17 12:52:48.099649', '2023-08-17 12:52:48.099649', 0),
(217, 4, 'Mines quarries is the example of ___ assets', '10', ' Ledger', 'Both in top down and bottom up testing', ' Events', 'opt_3', 103, '2023-08-17 12:53:12.586579', '2023-08-17 12:53:12.586579', 0),
(218, 2, 'The USE command', 'Narration ', ' C++', 'All of the above ', 'None of the above', 'opt_4', 104, '2023-08-17 12:53:56.758172', '2023-08-17 12:53:56.758172', 0),
(219, 2, 'Which of the following tag is used to embed css in html page?', 'Top down testing ', ' is a pseudonym for the SELECT command', 'Both in top down and bottom up testing', 'None', 'opt_4', 104, '2023-08-17 12:54:16.433165', '2023-08-17 12:54:16.433165', 0),
(220, 3, 'Mines quarries is the example of ___ assets', ' Fictitious assets ', ' is a pseudonym for the SELECT command', 'Both in top down and bottom up testing', ' None of the above', 'opt_4', 104, '2023-08-17 12:54:43.855372', '2023-08-17 12:54:43.855372', 0),
(221, 4, 'Mines quarries is the example of ___ assets', ' Fictitious assets ', ' Ledger', 'Both in top down and bottom up testing', ' None of the above', 'opt_4', 104, '2023-08-17 12:54:59.477317', '2023-08-17 12:54:59.477317', 0),
(222, 5, 'Mines quarries is the example of ___ assets', ' Fictitious assets ', ' is a pseudonym for the SELECT command', ' is used to load code from another file', ' Events', 'opt_2', 104, '2023-08-17 12:55:25.161068', '2023-08-17 12:55:25.161068', 0),
(223, 1, '. What is Appium? ', ' is an open source test automation framework for use with native, , hybrid and mobile web apps  None of the above', 'hybrid and mobile web apps   is an open source test automation Language for use with native', ' hybrid and mobile web apps  is an open source test automation hardware for use with native,', ' None of the above', 'opt_2', 105, '2023-08-17 13:06:55.855967', '2023-08-17 13:06:55.855967', 0);
INSERT INTO `tbl_quiz` (`id`, `question_no`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_ans`, `video_id`, `created_at`, `updated_at`, `isDeleted`) VALUES
(224, 2, 'Which of the following are Appium\'s abilities? ', ' It does not require recompilation of App.', ' It has no dependency on mobile device.', ' Support automation test on physical device as well as similar or emulator both.', ' All of the above', 'opt_2', 105, '2023-08-17 13:07:53.424491', '2023-08-17 13:07:53.424491', 0),
(225, 3, 'What do you mean by test automation framework? ', ' It does not require recompilation of App.', ' It has no dependency on mobile device.', 'Support automation test on physical device as well as similar or emulator both.', 'All of the above', 'opt_3', 105, '2023-08-17 13:08:50.612674', '2023-08-17 13:08:50.612674', 0),
(226, 4, 'What do you mean by test automation framework? ', ' processes to support automated documentation of any application', ' a collection of tools and processes working together to support automated testing of any application', ' Both A and B', 'All of the above', 'opt_3', 105, '2023-08-17 13:10:51.252505', '2023-08-17 13:10:51.252505', 0),
(227, 1, ' Appium automates the testing for: ', 'Native Mobile Applications', ' Mobile Web Applications', ' Hybrid Mobile Applications', ' All of the above', 'opt_4', 106, '2023-08-17 13:13:13.011696', '2023-08-17 13:13:13.011696', 0),
(228, 2, ' Which of the following language does Appium support?', 'Java', 'php', 'c#', 'none', 'opt_2', 106, '2023-08-17 13:13:52.319920', '2023-08-17 13:13:52.319920', 0),
(229, 3, 'What is defect tracking tool or bug tracking tool in software testing? ', '  can help record, report, assign and track the bugs in a software development project', ' Can help to debug the code', 'Both A and B', 'All of the above', 'opt_3', 106, '2023-08-17 13:14:34.841947', '2023-08-17 13:14:34.841947', 0),
(230, 4, 'Which of the following is true regarding the Appium? ', ' Testing is the process in which tester can identifies bug/error/defect in a software.', ' Debugging is the process of finding errors', 'Algorithms are written by Tester.', 'All of the above', 'opt_2', 106, '2023-08-17 13:15:17.534607', '2023-08-17 13:15:17.534607', 0),
(231, 5, 'Appium is a tool for:', 'Automation Testing', ' Manual Testing', ' Both A and B', 'None of the above', 'opt_3', 106, '2023-08-17 13:16:10.745320', '2023-08-17 13:16:10.745320', 0),
(232, 1, 'What are the requirements to write Appium tests? ', 'Driver client', ' Appium Session', 'Driver Command', 'All of the above', 'opt_2', 107, '2023-08-17 13:19:09.569377', '2023-08-17 13:19:09.569377', 0),
(233, 2, 'Mention the list of Selenium Commands That Work With Appium as well? ', 'Locate commands using ID or class names.', 'Raise events on elements e.g. Click().', ' Text commands like type().', 'All of the above', 'opt_2', 107, '2023-08-17 13:19:51.283663', '2023-08-17 13:19:51.283663', 0),
(234, 3, 'What do you know about Appium Doctor? ', 'Tool to verify Appium installation', ' Tool to test Appium installation', ' Both A and B', ' None of the above', 'opt_4', 107, '2023-08-17 13:20:39.699438', '2023-08-17 13:20:39.699438', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refer`
--

CREATE TABLE `tbl_refer` (
  `id` int NOT NULL,
  `amount` varchar(255) NOT NULL,
  `isDeleted` int NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refer_history`
--

CREATE TABLE `tbl_refer_history` (
  `id` int NOT NULL,
  `referal_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `useReferal` varchar(255) NOT NULL,
  `useReferal_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `isDeleted` int NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int NOT NULL,
  `about_us` text NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `contact_us` text NOT NULL,
  `terms` text NOT NULL,
  `email_us` text NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `about_us`, `vision`, `mission`, `contact_us`, `terms`, `email_us`, `added_date`, `updated_date`, `isDeleted`) VALUES
(1, '<p><strong>About Us -&nbsp;</strong></p>\r\n\r\n<p>A Proprietorship firm named Collective Wisdom here in after called ECS ,was formed on 24-07-2023&nbsp;at Navi Mumbai ,India .The Proprietor is a trainer of selling skills, team leadership , public speaking and life coach Mr.Lal Singh.</p>\r\n\r\n<p><strong>Vision</strong>:<br />\r\nA vision of ECS is to establish a strong and progressive management system by upgrading it as private limited company by 15 April 2023 with involving minimum 2 directors by similar potential, skill and mindset and to upgrade as public limited company by 15 April 2025 with involving minimum 8 more directors of same ability<br />\r\n<br />\r\n<strong>Mission</strong>:<br />\r\nThe mission of ECS is to train people of India to take self- employment in selling business by providing team best training of selling skills ,team leadership and public speaking</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></p>\r\n', '<p><strong>Vision:</strong><br />\r\nA vision of collective wisdom&nbsp;is to establish a strong and progressive management system by upgrading it as private limited company by 15 April 2023 with involving minimum 2 directors by similar potential, skill and mindset and to upgrade as public limited company by 15 April 2025 with involving minimum 8 more directors of same ability</p>\r\n', '<ul>\r\n	<li>Test&nbsp;&quot;a taste for mathematicsthe mathematical aspects of something.</li>\r\n	<li>dgdfg&quot;a taste for mathematicsthe mathematical aspects of something.</li>\r\n</ul>\r\n', '<p><strong>Contact us</strong></p>\r\n\r\n<p>Mr.Arun Gupta</p>\r\n\r\n<p>Mob -&nbsp;+919004977321</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<h2><strong>h</strong></h2>\r\n', '<p>collectivewisdom@gmail.com</p>\r\n', '2021-03-18 15:30:30', '2023-07-12 08:58:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_quiz`
--

CREATE TABLE `tbl_student_quiz` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `total_question` int NOT NULL,
  `attempted_question` int NOT NULL,
  `total_marks` int NOT NULL,
  `obtained_marks` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_quiz`
--

INSERT INTO `tbl_student_quiz` (`id`, `user_id`, `video_id`, `total_question`, `attempted_question`, `total_marks`, `obtained_marks`, `created_at`, `updated_at`, `isDeleted`) VALUES
(1, 151, 19, 6, 0, 6, 0, '2023-07-31 16:58:48', '2023-07-31 16:58:48', 0),
(2, 151, 19, 6, 6, 6, 1, '2023-07-31 16:58:58', '2023-07-31 16:59:06', 0),
(3, 139, 15, 5, 0, 5, 0, '2023-07-31 17:16:34', '2023-07-31 17:16:34', 0),
(4, 139, 19, 6, 0, 6, 0, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(5, 139, 20, 4, 0, 4, 0, '2023-07-31 17:16:51', '2023-07-31 17:16:51', 0),
(6, 139, 19, 6, 1, 6, 0, '2023-07-31 17:16:53', '2023-07-31 17:16:56', 0),
(7, 139, 19, 6, 5, 6, 0, '2023-07-31 17:17:05', '2023-07-31 17:17:13', 0),
(8, 151, 14, 4, 4, 4, 0, '2023-08-01 10:25:54', '2023-08-01 10:26:09', 0),
(9, 1, 14, 4, 0, 4, 0, '2023-08-01 10:29:01', '2023-08-01 10:29:01', 0),
(10, 1, 14, 4, 0, 4, 0, '2023-08-01 10:29:22', '2023-08-01 10:29:22', 0),
(11, 154, 23, 6, 0, 6, 0, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(12, 154, 23, 6, 6, 6, 1, '2023-08-01 13:04:02', '2023-08-01 13:04:59', 0),
(13, 154, 23, 6, 0, 6, 0, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(14, 154, 25, 6, 0, 6, 0, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(15, 154, 25, 6, 0, 6, 0, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(16, 154, 25, 6, 6, 6, 2, '2023-08-01 13:15:27', '2023-08-01 13:15:47', 0),
(17, 154, 19, 6, 0, 6, 0, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(18, 154, 25, 6, 5, 6, 1, '2023-08-01 14:52:11', '2023-08-01 14:52:24', 0),
(19, 154, 23, 6, 0, 6, 0, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(20, 154, 29, 4, 4, 4, 2, '2023-08-01 15:57:52', '2023-08-01 15:58:08', 0),
(21, 154, 18, 4, 4, 4, 1, '2023-08-01 16:32:55', '2023-08-01 16:33:01', 0),
(22, 157, 15, 5, 5, 5, 5, '2023-08-02 11:59:35', '2023-08-02 12:01:08', 0),
(23, 157, 15, 5, 0, 5, 0, '2023-08-02 12:03:31', '2023-08-02 12:03:31', 0),
(24, 139, 29, 4, 0, 4, 0, '2023-08-02 12:04:54', '2023-08-02 12:04:54', 0),
(25, 139, 30, 5, 0, 5, 0, '2023-08-02 12:04:59', '2023-08-02 12:04:59', 0),
(26, 139, 33, 4, 0, 4, 0, '2023-08-02 12:05:04', '2023-08-02 12:05:04', 0),
(27, 139, 69, 5, 0, 5, 0, '2023-08-02 15:33:41', '2023-08-02 15:33:41', 0),
(28, 139, 69, 5, 5, 5, 5, '2023-08-02 16:16:36', '2023-08-02 16:16:49', 0),
(29, 139, 78, 5, 0, 5, 0, '2023-08-04 12:14:45', '2023-08-04 12:14:45', 0),
(30, 139, 8, 5, 0, 5, 0, '2023-08-04 17:02:59', '2023-08-04 17:02:59', 0),
(31, 139, 9, 5, 0, 5, 0, '2023-08-04 17:04:00', '2023-08-04 17:04:00', 0),
(32, 139, 6, 5, 0, 5, 0, '2023-08-04 17:04:05', '2023-08-04 17:04:05', 0),
(33, 139, 7, 5, 0, 5, 0, '2023-08-04 17:04:07', '2023-08-04 17:04:07', 0),
(34, 139, 14, 6, 0, 6, 0, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(35, 139, 49, 4, 0, 4, 0, '2023-08-04 17:04:24', '2023-08-04 17:04:24', 0),
(36, 139, 45, 4, 0, 4, 0, '2023-08-04 17:17:12', '2023-08-04 17:17:12', 0),
(37, 139, 33, 4, 0, 4, 0, '2023-08-04 17:19:56', '2023-08-04 17:19:56', 0),
(38, 139, 80, 3, 0, 3, 0, '2023-08-05 11:04:20', '2023-08-05 11:04:20', 0),
(39, 139, 78, 5, 0, 5, 0, '2023-08-05 11:05:01', '2023-08-05 11:05:01', 0),
(40, 151, 14, 6, 0, 6, 0, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(41, 151, 49, 4, 1, 4, 1, '2023-08-05 11:13:31', '2023-08-05 11:13:37', 0),
(42, 151, 19, 6, 0, 6, 0, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(43, 151, 23, 6, 6, 6, 2, '2023-08-05 11:19:15', '2023-08-05 11:19:27', 0),
(44, 139, 23, 6, 5, 6, 1, '2023-08-05 11:22:17', '2023-08-05 11:22:27', 0),
(45, 151, 23, 6, 5, 6, 0, '2023-08-05 11:23:21', '2023-08-05 11:23:27', 0),
(46, 139, 80, 3, 0, 3, 0, '2023-08-05 12:50:43', '2023-08-05 12:50:43', 0),
(47, 118, 23, 6, 0, 6, 0, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(48, 139, 78, 5, 0, 5, 0, '2023-08-07 18:58:48', '2023-08-07 18:58:48', 0),
(49, 139, 85, 3, 0, 3, 0, '2023-08-08 18:11:47', '2023-08-08 18:11:47', 0),
(50, 139, 85, 3, 3, 3, 0, '2023-08-08 18:11:54', '2023-08-08 18:12:04', 0),
(51, 139, 85, 5, 5, 5, 0, '2023-08-08 18:33:32', '2023-08-08 18:33:40', 0),
(52, 139, 29, 4, 4, 4, 1, '2023-08-08 18:35:11', '2023-08-08 18:35:15', 0),
(53, 139, 85, 5, 5, 5, 1, '2023-08-08 18:36:02', '2023-08-08 18:36:09', 0),
(54, 139, 85, 5, 1, 5, 0, '2023-08-08 18:38:08', '2023-08-08 18:38:09', 0),
(55, 139, 85, 5, 2, 5, 1, '2023-08-08 18:55:08', '2023-08-08 18:55:11', 0),
(56, 139, 85, 5, 5, 5, 0, '2023-08-08 18:55:17', '2023-08-08 18:55:25', 0),
(57, 36, 15, 5, 0, 5, 0, '2023-08-08 21:40:10', '2023-08-08 21:40:10', 0),
(58, 36, 15, 5, 5, 5, 0, '2023-08-08 21:40:29', '2023-08-08 21:40:36', 0),
(59, 36, 80, 3, 0, 3, 0, '2023-08-08 21:41:53', '2023-08-08 21:41:53', 0),
(60, 36, 80, 3, 0, 3, 0, '2023-08-08 21:41:59', '2023-08-08 21:41:59', 0),
(61, 36, 80, 3, 3, 3, 1, '2023-08-08 21:42:16', '2023-08-08 21:42:20', 0),
(62, 36, 18, 4, 4, 4, 1, '2023-08-08 21:43:53', '2023-08-08 21:43:58', 0),
(63, 36, 33, 4, 4, 4, 0, '2023-08-08 22:20:10', '2023-08-08 22:20:16', 0),
(64, 151, 41, 5, 0, 5, 0, '2023-08-08 22:59:11', '2023-08-08 22:59:11', 0),
(65, 151, 35, 5, 0, 5, 0, '2023-08-08 22:59:56', '2023-08-08 22:59:56', 0),
(66, 151, 78, 5, 5, 5, 0, '2023-08-08 23:00:38', '2023-08-08 23:00:57', 0),
(67, 118, 85, 5, 0, 5, 0, '2023-08-09 10:40:21', '2023-08-09 10:40:21', 0),
(68, 139, 85, 5, 0, 5, 0, '2023-08-09 10:42:14', '2023-08-09 10:42:14', 0),
(69, 139, 85, 5, 5, 5, 2, '2023-08-09 10:42:34', '2023-08-09 10:42:42', 0),
(70, 151, 78, 5, 5, 5, 0, '2023-08-09 10:42:56', '2023-08-09 10:43:11', 0),
(71, 139, 85, 5, 5, 5, 1, '2023-08-09 10:43:49', '2023-08-09 10:44:05', 0),
(72, 36, 85, 5, 5, 5, 2, '2023-08-09 10:44:09', '2023-08-09 10:44:15', 0),
(73, 139, 85, 5, 5, 5, 2, '2023-08-09 11:02:57', '2023-08-09 11:03:04', 0),
(74, 151, 23, 6, 5, 6, 1, '2023-08-09 11:17:04', '2023-08-09 11:17:10', 0),
(75, 139, 15, 5, 5, 5, 2, '2023-08-09 11:27:58', '2023-08-09 11:28:03', 0),
(76, 139, 80, 3, 3, 3, 1, '2023-08-09 11:30:09', '2023-08-09 11:30:13', 0),
(77, 36, 69, 5, 5, 5, 0, '2023-08-09 11:49:32', '2023-08-09 11:49:39', 0),
(78, 139, 85, 5, 5, 5, 1, '2023-08-09 11:58:18', '2023-08-09 11:58:24', 0),
(79, 36, 78, 5, 5, 5, 1, '2023-08-09 12:01:08', '2023-08-09 12:01:15', 0),
(80, 36, 78, 5, 0, 5, 0, '2023-08-09 12:02:04', '2023-08-09 12:02:04', 0),
(81, 36, 80, 3, 3, 3, 0, '2023-08-09 12:40:44', '2023-08-09 12:40:51', 0),
(82, 36, 80, 3, 3, 3, 0, '2023-08-09 12:41:56', '2023-08-09 12:42:00', 0),
(83, 36, 80, 3, 3, 3, 0, '2023-08-09 12:43:17', '2023-08-09 12:43:21', 0),
(84, 36, 78, 5, 5, 5, 0, '2023-08-09 12:43:48', '2023-08-09 12:43:53', 0),
(85, 151, 85, 5, 5, 5, 2, '2023-08-09 13:00:48', '2023-08-09 13:00:58', 0),
(86, 131, 85, 5, 5, 5, 2, '2023-08-09 16:31:36', '2023-08-09 16:31:45', 0),
(87, 131, 80, 3, 0, 3, 0, '2023-08-09 16:50:34', '2023-08-09 16:50:34', 0),
(88, 131, 80, 3, 3, 3, 0, '2023-08-09 16:50:50', '2023-08-09 16:50:53', 0),
(89, 131, 78, 5, 2, 5, 0, '2023-08-09 16:54:13', '2023-08-09 16:54:40', 0),
(90, 131, 78, 5, 0, 5, 0, '2023-08-09 16:55:31', '2023-08-09 16:55:31', 0),
(91, 131, 80, 3, 3, 3, 1, '2023-08-09 17:13:07', '2023-08-09 17:13:44', 0),
(92, 195, 78, 5, 5, 5, 1, '2023-08-09 18:28:12', '2023-08-09 18:28:26', 0),
(93, 195, 85, 5, 1, 5, 0, '2023-08-09 18:29:16', '2023-08-09 18:29:19', 0),
(94, 131, 78, 5, 0, 5, 0, '2023-08-10 11:21:44', '2023-08-10 11:21:44', 0),
(95, 151, 78, 5, 0, 5, 0, '2023-08-10 11:22:47', '2023-08-10 11:22:47', 0),
(96, 151, 78, 5, 0, 5, 0, '2023-08-10 11:23:16', '2023-08-10 11:23:16', 0),
(97, 195, 14, 6, 0, 6, 0, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(98, 195, 35, 5, 1, 5, 0, '2023-08-11 13:42:39', '2023-08-11 13:42:43', 0),
(99, 131, 18, 4, 1, 4, 0, '2023-08-11 15:10:46', '2023-08-11 15:10:51', 0),
(100, 131, 18, 4, 2, 4, 0, '2023-08-11 15:11:06', '2023-08-11 15:11:12', 0),
(101, 131, 18, 4, 4, 4, 2, '2023-08-11 15:11:31', '2023-08-11 15:11:38', 0),
(102, 131, 80, 3, 3, 3, 1, '2023-08-11 15:21:24', '2023-08-11 15:21:34', 0),
(103, 131, 78, 5, 0, 5, 0, '2023-08-11 15:25:49', '2023-08-11 15:25:49', 0),
(104, 131, 78, 5, 5, 5, 2, '2023-08-11 15:28:14', '2023-08-11 15:28:21', 0),
(105, 131, 79, 3, 3, 3, 0, '2023-08-11 15:29:26', '2023-08-11 15:29:38', 0),
(106, 151, 78, 5, 1, 5, 0, '2023-08-11 15:53:09', '2023-08-11 15:53:11', 0),
(107, 139, 98, 6, 6, 6, 0, '2023-08-11 16:51:31', '2023-08-11 16:51:48', 0),
(108, 195, 14, 6, 0, 6, 0, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(109, 195, 35, 5, 0, 5, 0, '2023-08-14 11:44:34', '2023-08-14 11:44:34', 0),
(110, 139, 32, 4, 4, 4, 1, '2023-08-14 15:07:29', '2023-08-14 15:07:43', 0),
(111, 151, 78, 5, 5, 5, 1, '2023-08-16 13:09:24', '2023-08-16 13:09:38', 0),
(112, 139, 100, 1, 0, 1, 0, '2023-08-17 13:16:48', '2023-08-17 13:16:48', 0),
(113, 139, 98, 6, 0, 6, 0, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(114, 139, 80, 3, 0, 3, 0, '2023-08-17 16:25:05', '2023-08-17 16:25:05', 0),
(115, 139, 105, 4, 0, 4, 0, '2023-08-17 16:25:46', '2023-08-17 16:25:46', 0),
(116, 139, 106, 5, 0, 5, 0, '2023-08-17 16:26:03', '2023-08-17 16:26:03', 0),
(117, 139, 107, 3, 0, 3, 0, '2023-08-17 16:26:22', '2023-08-17 16:26:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_quiz_report`
--

CREATE TABLE `tbl_student_quiz_report` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `student_quiz_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_quiz_report`
--

INSERT INTO `tbl_student_quiz_report` (`id`, `user_id`, `video_id`, `student_quiz_id`, `quiz_id`, `answer`, `is_correct`, `created_at`, `updated_at`, `isDeleted`) VALUES
(1, 151, 19, 1, 66, '', NULL, '2023-07-31 16:58:49', '2023-07-31 16:58:49', 0),
(2, 151, 19, 1, 67, '', NULL, '2023-07-31 16:58:49', '2023-07-31 16:58:49', 0),
(3, 151, 19, 1, 68, '', NULL, '2023-07-31 16:58:49', '2023-07-31 16:58:49', 0),
(4, 151, 19, 1, 69, '', NULL, '2023-07-31 16:58:49', '2023-07-31 16:58:49', 0),
(5, 151, 19, 1, 70, '', NULL, '2023-07-31 16:58:49', '2023-07-31 16:58:49', 0),
(6, 151, 19, 1, 71, '', NULL, '2023-07-31 16:58:49', '2023-07-31 16:58:49', 0),
(7, 151, 19, 2, 66, 'opt_1', 0, '2023-07-31 16:58:58', '2023-07-31 16:58:59', 0),
(8, 151, 19, 2, 67, 'opt_3', 0, '2023-07-31 16:58:58', '2023-07-31 16:59:00', 0),
(9, 151, 19, 2, 68, 'opt_2', 0, '2023-07-31 16:58:58', '2023-07-31 16:59:01', 0),
(10, 151, 19, 2, 69, 'opt_4', 0, '2023-07-31 16:58:58', '2023-07-31 16:59:03', 0),
(11, 151, 19, 2, 70, 'opt_2', 0, '2023-07-31 16:58:58', '2023-07-31 16:59:04', 0),
(12, 151, 19, 2, 71, 'opt_1', 1, '2023-07-31 16:58:58', '2023-07-31 16:59:06', 0),
(13, 139, 15, 3, 3, '', NULL, '2023-07-31 17:16:34', '2023-07-31 17:16:34', 0),
(14, 139, 15, 3, 4, '', NULL, '2023-07-31 17:16:34', '2023-07-31 17:16:34', 0),
(15, 139, 15, 3, 5, '', NULL, '2023-07-31 17:16:34', '2023-07-31 17:16:34', 0),
(16, 139, 15, 3, 6, '', NULL, '2023-07-31 17:16:34', '2023-07-31 17:16:34', 0),
(17, 139, 15, 3, 7, '', NULL, '2023-07-31 17:16:34', '2023-07-31 17:16:34', 0),
(18, 139, 19, 4, 66, '', NULL, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(19, 139, 19, 4, 67, '', NULL, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(20, 139, 19, 4, 68, '', NULL, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(21, 139, 19, 4, 69, '', NULL, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(22, 139, 19, 4, 70, '', NULL, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(23, 139, 19, 4, 71, '', NULL, '2023-07-31 17:16:45', '2023-07-31 17:16:45', 0),
(24, 139, 20, 5, 72, '', NULL, '2023-07-31 17:16:51', '2023-07-31 17:16:51', 0),
(25, 139, 20, 5, 74, '', NULL, '2023-07-31 17:16:51', '2023-07-31 17:16:51', 0),
(26, 139, 20, 5, 75, '', NULL, '2023-07-31 17:16:51', '2023-07-31 17:16:51', 0),
(27, 139, 20, 5, 76, '', NULL, '2023-07-31 17:16:51', '2023-07-31 17:16:51', 0),
(28, 139, 19, 6, 66, '', NULL, '2023-07-31 17:16:53', '2023-07-31 17:16:53', 0),
(29, 139, 19, 6, 67, '', NULL, '2023-07-31 17:16:53', '2023-07-31 17:16:53', 0),
(30, 139, 19, 6, 68, '', NULL, '2023-07-31 17:16:53', '2023-07-31 17:16:53', 0),
(31, 139, 19, 6, 69, '', NULL, '2023-07-31 17:16:53', '2023-07-31 17:16:53', 0),
(32, 139, 19, 6, 70, '', NULL, '2023-07-31 17:16:53', '2023-07-31 17:16:53', 0),
(33, 139, 19, 6, 71, 'opt_3', 0, '2023-07-31 17:16:53', '2023-07-31 17:16:56', 0),
(34, 139, 19, 7, 66, 'opt_3', 0, '2023-07-31 17:17:05', '2023-07-31 17:17:06', 0),
(35, 139, 19, 7, 67, 'opt_3', 0, '2023-07-31 17:17:05', '2023-07-31 17:17:07', 0),
(36, 139, 19, 7, 68, 'opt_2', 0, '2023-07-31 17:17:05', '2023-07-31 17:17:09', 0),
(37, 139, 19, 7, 69, 'opt_3', 0, '2023-07-31 17:17:05', '2023-07-31 17:17:10', 0),
(38, 139, 19, 7, 70, 'opt_3', 0, '2023-07-31 17:17:05', '2023-07-31 17:17:13', 0),
(39, 139, 19, 7, 71, '', NULL, '2023-07-31 17:17:05', '2023-07-31 17:17:05', 0),
(40, 151, 14, 8, 1, 'opt_1', 0, '2023-08-01 10:25:54', '2023-08-01 10:25:57', 0),
(41, 151, 14, 8, 2, 'opt_2', 0, '2023-08-01 10:25:54', '2023-08-01 10:26:02', 0),
(42, 151, 14, 8, 8, 'opt_3', 0, '2023-08-01 10:25:54', '2023-08-01 10:26:04', 0),
(43, 151, 14, 8, 77, 'opt_2', 0, '2023-08-01 10:25:54', '2023-08-01 10:26:09', 0),
(44, 1, 14, 9, 1, '', NULL, '2023-08-01 10:29:01', '2023-08-01 10:29:01', 0),
(45, 1, 14, 9, 2, '', NULL, '2023-08-01 10:29:01', '2023-08-01 10:29:01', 0),
(46, 1, 14, 9, 8, '', NULL, '2023-08-01 10:29:01', '2023-08-01 10:29:01', 0),
(47, 1, 14, 9, 77, '', NULL, '2023-08-01 10:29:01', '2023-08-01 10:29:01', 0),
(48, 1, 14, 10, 1, '', NULL, '2023-08-01 10:29:22', '2023-08-01 10:29:22', 0),
(49, 1, 14, 10, 2, '', NULL, '2023-08-01 10:29:22', '2023-08-01 10:29:22', 0),
(50, 1, 14, 10, 8, '', NULL, '2023-08-01 10:29:22', '2023-08-01 10:29:22', 0),
(51, 1, 14, 10, 77, '', NULL, '2023-08-01 10:29:22', '2023-08-01 10:29:22', 0),
(52, 154, 23, 11, 13, '', NULL, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(53, 154, 23, 11, 15, '', NULL, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(54, 154, 23, 11, 16, '', NULL, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(55, 154, 23, 11, 17, '', NULL, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(56, 154, 23, 11, 18, '', NULL, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(57, 154, 23, 11, 19, '', NULL, '2023-08-01 13:03:43', '2023-08-01 13:03:43', 0),
(58, 154, 23, 12, 13, 'opt_1', 0, '2023-08-01 13:04:02', '2023-08-01 13:04:04', 0),
(59, 154, 23, 12, 15, 'opt_3', 0, '2023-08-01 13:04:02', '2023-08-01 13:04:05', 0),
(60, 154, 23, 12, 16, 'opt_4', 1, '2023-08-01 13:04:02', '2023-08-01 13:04:07', 0),
(61, 154, 23, 12, 17, 'opt_1', 0, '2023-08-01 13:04:02', '2023-08-01 13:04:08', 0),
(62, 154, 23, 12, 18, 'opt_2', 0, '2023-08-01 13:04:02', '2023-08-01 13:04:10', 0),
(63, 154, 23, 12, 19, 'opt_2', 0, '2023-08-01 13:04:02', '2023-08-01 13:04:59', 0),
(64, 154, 23, 13, 13, '', NULL, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(65, 154, 23, 13, 15, '', NULL, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(66, 154, 23, 13, 16, '', NULL, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(67, 154, 23, 13, 17, '', NULL, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(68, 154, 23, 13, 18, '', NULL, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(69, 154, 23, 13, 19, '', NULL, '2023-08-01 13:08:40', '2023-08-01 13:08:40', 0),
(70, 154, 25, 14, 29, '', NULL, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(71, 154, 25, 14, 30, '', NULL, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(72, 154, 25, 14, 31, '', NULL, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(73, 154, 25, 14, 32, '', NULL, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(74, 154, 25, 14, 33, '', NULL, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(75, 154, 25, 14, 34, '', NULL, '2023-08-01 13:14:55', '2023-08-01 13:14:55', 0),
(76, 154, 25, 15, 29, '', NULL, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(77, 154, 25, 15, 30, '', NULL, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(78, 154, 25, 15, 31, '', NULL, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(79, 154, 25, 15, 32, '', NULL, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(80, 154, 25, 15, 33, '', NULL, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(81, 154, 25, 15, 34, '', NULL, '2023-08-01 13:15:18', '2023-08-01 13:15:18', 0),
(82, 154, 25, 16, 29, 'opt_1', 1, '2023-08-01 13:15:27', '2023-08-01 13:15:30', 0),
(83, 154, 25, 16, 30, 'opt_2', 0, '2023-08-01 13:15:27', '2023-08-01 13:15:32', 0),
(84, 154, 25, 16, 31, 'opt_3', 1, '2023-08-01 13:15:27', '2023-08-01 13:15:34', 0),
(85, 154, 25, 16, 32, 'opt_4', 0, '2023-08-01 13:15:27', '2023-08-01 13:15:35', 0),
(86, 154, 25, 16, 33, 'opt_1', 0, '2023-08-01 13:15:27', '2023-08-01 13:15:38', 0),
(87, 154, 25, 16, 34, 'opt_2', 0, '2023-08-01 13:15:27', '2023-08-01 13:15:47', 0),
(88, 154, 19, 17, 66, '', NULL, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(89, 154, 19, 17, 67, '', NULL, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(90, 154, 19, 17, 68, '', NULL, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(91, 154, 19, 17, 69, '', NULL, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(92, 154, 19, 17, 70, '', NULL, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(93, 154, 19, 17, 71, '', NULL, '2023-08-01 13:25:47', '2023-08-01 13:25:47', 0),
(94, 154, 25, 18, 29, 'opt_2', 0, '2023-08-01 14:52:11', '2023-08-01 14:52:19', 0),
(95, 154, 25, 18, 30, 'opt_1', 0, '2023-08-01 14:52:11', '2023-08-01 14:52:18', 0),
(96, 154, 25, 18, 31, 'opt_3', 1, '2023-08-01 14:52:11', '2023-08-01 14:52:21', 0),
(97, 154, 25, 18, 32, 'opt_4', 0, '2023-08-01 14:52:11', '2023-08-01 14:52:22', 0),
(98, 154, 25, 18, 33, 'opt_3', 0, '2023-08-01 14:52:11', '2023-08-01 14:52:24', 0),
(99, 154, 25, 18, 34, '', NULL, '2023-08-01 14:52:11', '2023-08-01 14:52:11', 0),
(100, 154, 23, 19, 13, '', NULL, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(101, 154, 23, 19, 15, '', NULL, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(102, 154, 23, 19, 16, '', NULL, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(103, 154, 23, 19, 17, '', NULL, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(104, 154, 23, 19, 18, '', NULL, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(105, 154, 23, 19, 19, '', NULL, '2023-08-01 15:57:49', '2023-08-01 15:57:49', 0),
(106, 154, 29, 20, 43, 'opt_1', 0, '2023-08-01 15:57:52', '2023-08-01 15:57:57', 0),
(107, 154, 29, 20, 44, 'opt_3', 1, '2023-08-01 15:57:52', '2023-08-01 15:58:01', 0),
(108, 154, 29, 20, 45, 'opt_4', 1, '2023-08-01 15:57:53', '2023-08-01 15:58:03', 0),
(109, 154, 29, 20, 46, 'opt_3', 0, '2023-08-01 15:57:53', '2023-08-01 15:58:08', 0),
(110, 154, 18, 21, 9, 'opt_2', 0, '2023-08-01 16:32:55', '2023-08-01 16:32:57', 0),
(111, 154, 18, 21, 10, 'opt_3', 1, '2023-08-01 16:32:55', '2023-08-01 16:32:59', 0),
(112, 154, 18, 21, 11, 'opt_4', 0, '2023-08-01 16:32:55', '2023-08-01 16:33:00', 0),
(113, 154, 18, 21, 12, 'opt_1', 0, '2023-08-01 16:32:55', '2023-08-01 16:33:01', 0),
(114, 157, 15, 22, 3, 'opt_3', 1, '2023-08-02 11:59:35', '2023-08-02 11:59:39', 0),
(115, 157, 15, 22, 4, 'opt_1', 1, '2023-08-02 11:59:35', '2023-08-02 12:00:10', 0),
(116, 157, 15, 22, 5, 'opt_4', 1, '2023-08-02 11:59:35', '2023-08-02 12:00:38', 0),
(117, 157, 15, 22, 6, 'opt_2', 1, '2023-08-02 11:59:35', '2023-08-02 12:00:48', 0),
(118, 157, 15, 22, 7, 'opt_1', 1, '2023-08-02 11:59:35', '2023-08-02 12:01:08', 0),
(119, 157, 15, 23, 3, '', NULL, '2023-08-02 12:03:31', '2023-08-02 12:03:31', 0),
(120, 157, 15, 23, 4, '', NULL, '2023-08-02 12:03:31', '2023-08-02 12:03:31', 0),
(121, 157, 15, 23, 5, '', NULL, '2023-08-02 12:03:31', '2023-08-02 12:03:31', 0),
(122, 157, 15, 23, 6, '', NULL, '2023-08-02 12:03:31', '2023-08-02 12:03:31', 0),
(123, 157, 15, 23, 7, '', NULL, '2023-08-02 12:03:31', '2023-08-02 12:03:31', 0),
(124, 139, 29, 24, 43, '', NULL, '2023-08-02 12:04:54', '2023-08-02 12:04:54', 0),
(125, 139, 29, 24, 44, '', NULL, '2023-08-02 12:04:54', '2023-08-02 12:04:54', 0),
(126, 139, 29, 24, 45, '', NULL, '2023-08-02 12:04:54', '2023-08-02 12:04:54', 0),
(127, 139, 29, 24, 46, '', NULL, '2023-08-02 12:04:54', '2023-08-02 12:04:54', 0),
(128, 139, 30, 25, 47, '', NULL, '2023-08-02 12:04:59', '2023-08-02 12:04:59', 0),
(129, 139, 30, 25, 48, '', NULL, '2023-08-02 12:04:59', '2023-08-02 12:04:59', 0),
(130, 139, 30, 25, 49, '', NULL, '2023-08-02 12:04:59', '2023-08-02 12:04:59', 0),
(131, 139, 30, 25, 50, '', NULL, '2023-08-02 12:04:59', '2023-08-02 12:04:59', 0),
(132, 139, 30, 25, 51, '', NULL, '2023-08-02 12:04:59', '2023-08-02 12:04:59', 0),
(133, 139, 33, 26, 56, '', NULL, '2023-08-02 12:05:04', '2023-08-02 12:05:04', 0),
(134, 139, 33, 26, 57, '', NULL, '2023-08-02 12:05:04', '2023-08-02 12:05:04', 0),
(135, 139, 33, 26, 58, '', NULL, '2023-08-02 12:05:04', '2023-08-02 12:05:04', 0),
(136, 139, 33, 26, 59, '', NULL, '2023-08-02 12:05:04', '2023-08-02 12:05:04', 0),
(137, 139, 69, 27, 159, '', NULL, '2023-08-02 15:33:41', '2023-08-02 15:33:41', 0),
(138, 139, 69, 27, 160, '', NULL, '2023-08-02 15:33:41', '2023-08-02 15:33:41', 0),
(139, 139, 69, 27, 161, '', NULL, '2023-08-02 15:33:41', '2023-08-02 15:33:41', 0),
(140, 139, 69, 27, 162, '', NULL, '2023-08-02 15:33:41', '2023-08-02 15:33:41', 0),
(141, 139, 69, 27, 163, '', NULL, '2023-08-02 15:33:41', '2023-08-02 15:33:41', 0),
(142, 139, 69, 28, 159, 'opt_1', 1, '2023-08-02 16:16:36', '2023-08-02 16:16:42', 0),
(143, 139, 69, 28, 160, 'opt_1', 1, '2023-08-02 16:16:36', '2023-08-02 16:16:44', 0),
(144, 139, 69, 28, 161, 'opt_1', 1, '2023-08-02 16:16:36', '2023-08-02 16:16:46', 0),
(145, 139, 69, 28, 162, 'opt_1', 1, '2023-08-02 16:16:36', '2023-08-02 16:16:48', 0),
(146, 139, 69, 28, 163, 'opt_1', 1, '2023-08-02 16:16:36', '2023-08-02 16:16:49', 0),
(147, 139, 78, 29, 176, '', NULL, '2023-08-04 12:14:45', '2023-08-04 12:14:45', 0),
(148, 139, 78, 29, 177, '', NULL, '2023-08-04 12:14:45', '2023-08-04 12:14:45', 0),
(149, 139, 78, 29, 178, '', NULL, '2023-08-04 12:14:45', '2023-08-04 12:14:45', 0),
(150, 139, 78, 29, 179, '', NULL, '2023-08-04 12:14:45', '2023-08-04 12:14:45', 0),
(151, 139, 78, 29, 180, '', NULL, '2023-08-04 12:14:45', '2023-08-04 12:14:45', 0),
(152, 139, 8, 30, 104, '', NULL, '2023-08-04 17:02:59', '2023-08-04 17:02:59', 0),
(153, 139, 8, 30, 105, '', NULL, '2023-08-04 17:02:59', '2023-08-04 17:02:59', 0),
(154, 139, 8, 30, 106, '', NULL, '2023-08-04 17:02:59', '2023-08-04 17:02:59', 0),
(155, 139, 8, 30, 107, '', NULL, '2023-08-04 17:02:59', '2023-08-04 17:02:59', 0),
(156, 139, 8, 30, 108, '', NULL, '2023-08-04 17:02:59', '2023-08-04 17:02:59', 0),
(157, 139, 9, 31, 109, '', NULL, '2023-08-04 17:04:00', '2023-08-04 17:04:00', 0),
(158, 139, 9, 31, 110, '', NULL, '2023-08-04 17:04:00', '2023-08-04 17:04:00', 0),
(159, 139, 9, 31, 111, '', NULL, '2023-08-04 17:04:00', '2023-08-04 17:04:00', 0),
(160, 139, 9, 31, 112, '', NULL, '2023-08-04 17:04:00', '2023-08-04 17:04:00', 0),
(161, 139, 9, 31, 113, '', NULL, '2023-08-04 17:04:00', '2023-08-04 17:04:00', 0),
(162, 139, 6, 32, 91, '', NULL, '2023-08-04 17:04:05', '2023-08-04 17:04:05', 0),
(163, 139, 6, 32, 92, '', NULL, '2023-08-04 17:04:05', '2023-08-04 17:04:05', 0),
(164, 139, 6, 32, 94, '', NULL, '2023-08-04 17:04:05', '2023-08-04 17:04:05', 0),
(165, 139, 6, 32, 95, '', NULL, '2023-08-04 17:04:05', '2023-08-04 17:04:05', 0),
(166, 139, 6, 32, 96, '', NULL, '2023-08-04 17:04:05', '2023-08-04 17:04:05', 0),
(167, 139, 7, 33, 99, '', NULL, '2023-08-04 17:04:07', '2023-08-04 17:04:07', 0),
(168, 139, 7, 33, 100, '', NULL, '2023-08-04 17:04:07', '2023-08-04 17:04:07', 0),
(169, 139, 7, 33, 101, '', NULL, '2023-08-04 17:04:07', '2023-08-04 17:04:07', 0),
(170, 139, 7, 33, 102, '', NULL, '2023-08-04 17:04:07', '2023-08-04 17:04:07', 0),
(171, 139, 7, 33, 103, '', NULL, '2023-08-04 17:04:07', '2023-08-04 17:04:07', 0),
(172, 139, 14, 34, 1, '', NULL, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(173, 139, 14, 34, 2, '', NULL, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(174, 139, 14, 34, 8, '', NULL, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(175, 139, 14, 34, 77, '', NULL, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(176, 139, 14, 34, 187, '', NULL, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(177, 139, 14, 34, 188, '', NULL, '2023-08-04 17:04:16', '2023-08-04 17:04:16', 0),
(178, 139, 49, 35, 131, '', NULL, '2023-08-04 17:04:24', '2023-08-04 17:04:24', 0),
(179, 139, 49, 35, 132, '', NULL, '2023-08-04 17:04:24', '2023-08-04 17:04:24', 0),
(180, 139, 49, 35, 133, '', NULL, '2023-08-04 17:04:24', '2023-08-04 17:04:24', 0),
(181, 139, 49, 35, 134, '', NULL, '2023-08-04 17:04:24', '2023-08-04 17:04:24', 0),
(182, 139, 45, 36, 123, '', NULL, '2023-08-04 17:17:12', '2023-08-04 17:17:12', 0),
(183, 139, 45, 36, 124, '', NULL, '2023-08-04 17:17:12', '2023-08-04 17:17:12', 0),
(184, 139, 45, 36, 125, '', NULL, '2023-08-04 17:17:12', '2023-08-04 17:17:12', 0),
(185, 139, 45, 36, 126, '', NULL, '2023-08-04 17:17:12', '2023-08-04 17:17:12', 0),
(186, 139, 33, 37, 56, '', NULL, '2023-08-04 17:19:56', '2023-08-04 17:19:56', 0),
(187, 139, 33, 37, 57, '', NULL, '2023-08-04 17:19:56', '2023-08-04 17:19:56', 0),
(188, 139, 33, 37, 58, '', NULL, '2023-08-04 17:19:56', '2023-08-04 17:19:56', 0),
(189, 139, 33, 37, 59, '', NULL, '2023-08-04 17:19:56', '2023-08-04 17:19:56', 0),
(190, 139, 80, 38, 184, '', NULL, '2023-08-05 11:04:20', '2023-08-05 11:04:20', 0),
(191, 139, 80, 38, 185, '', NULL, '2023-08-05 11:04:20', '2023-08-05 11:04:20', 0),
(192, 139, 80, 38, 186, '', NULL, '2023-08-05 11:04:20', '2023-08-05 11:04:20', 0),
(193, 139, 78, 39, 176, '', NULL, '2023-08-05 11:05:01', '2023-08-05 11:05:01', 0),
(194, 139, 78, 39, 178, '', NULL, '2023-08-05 11:05:01', '2023-08-05 11:05:01', 0),
(195, 139, 78, 39, 179, '', NULL, '2023-08-05 11:05:01', '2023-08-05 11:05:01', 0),
(196, 139, 78, 39, 180, '', NULL, '2023-08-05 11:05:01', '2023-08-05 11:05:01', 0),
(197, 139, 78, 39, 189, '', NULL, '2023-08-05 11:05:01', '2023-08-05 11:05:01', 0),
(198, 151, 14, 40, 1, '', NULL, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(199, 151, 14, 40, 2, '', NULL, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(200, 151, 14, 40, 8, '', NULL, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(201, 151, 14, 40, 77, '', NULL, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(202, 151, 14, 40, 187, '', NULL, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(203, 151, 14, 40, 188, '', NULL, '2023-08-05 11:12:25', '2023-08-05 11:12:25', 0),
(204, 151, 49, 41, 131, 'opt_1', 1, '2023-08-05 11:13:31', '2023-08-05 11:13:37', 0),
(205, 151, 49, 41, 132, '', NULL, '2023-08-05 11:13:31', '2023-08-05 11:13:31', 0),
(206, 151, 49, 41, 133, '', NULL, '2023-08-05 11:13:31', '2023-08-05 11:13:31', 0),
(207, 151, 49, 41, 134, '', NULL, '2023-08-05 11:13:31', '2023-08-05 11:13:31', 0),
(208, 151, 19, 42, 66, '', NULL, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(209, 151, 19, 42, 67, '', NULL, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(210, 151, 19, 42, 68, '', NULL, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(211, 151, 19, 42, 69, '', NULL, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(212, 151, 19, 42, 70, '', NULL, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(213, 151, 19, 42, 71, '', NULL, '2023-08-05 11:14:57', '2023-08-05 11:14:57', 0),
(214, 151, 23, 43, 13, 'opt_2', 1, '2023-08-05 11:19:16', '2023-08-05 11:19:18', 0),
(215, 151, 23, 43, 15, 'opt_2', 1, '2023-08-05 11:19:16', '2023-08-05 11:19:20', 0),
(216, 151, 23, 43, 16, 'opt_2', 0, '2023-08-05 11:19:16', '2023-08-05 11:19:21', 0),
(217, 151, 23, 43, 17, 'opt_2', 0, '2023-08-05 11:19:16', '2023-08-05 11:19:22', 0),
(218, 151, 23, 43, 18, 'opt_3', 0, '2023-08-05 11:19:16', '2023-08-05 11:19:24', 0),
(219, 151, 23, 43, 19, 'opt_2', 0, '2023-08-05 11:19:16', '2023-08-05 11:19:27', 0),
(220, 139, 23, 44, 13, 'opt_2', 1, '2023-08-05 11:22:17', '2023-08-05 11:22:20', 0),
(221, 139, 23, 44, 15, 'opt_3', 0, '2023-08-05 11:22:17', '2023-08-05 11:22:23', 0),
(222, 139, 23, 44, 16, 'opt_3', 0, '2023-08-05 11:22:17', '2023-08-05 11:22:24', 0),
(223, 139, 23, 44, 17, 'opt_2', 0, '2023-08-05 11:22:17', '2023-08-05 11:22:25', 0),
(224, 139, 23, 44, 18, 'opt_3', 0, '2023-08-05 11:22:17', '2023-08-05 11:22:27', 0),
(225, 139, 23, 44, 19, '', NULL, '2023-08-05 11:22:17', '2023-08-05 11:22:17', 0),
(226, 151, 23, 45, 13, 'opt_1', 0, '2023-08-05 11:23:21', '2023-08-05 11:23:21', 0),
(227, 151, 23, 45, 15, 'opt_3', 0, '2023-08-05 11:23:21', '2023-08-05 11:23:23', 0),
(228, 151, 23, 45, 16, 'opt_3', 0, '2023-08-05 11:23:21', '2023-08-05 11:23:24', 0),
(229, 151, 23, 45, 17, 'opt_2', 0, '2023-08-05 11:23:21', '2023-08-05 11:23:26', 0),
(230, 151, 23, 45, 18, 'opt_2', 0, '2023-08-05 11:23:21', '2023-08-05 11:23:27', 0),
(231, 151, 23, 45, 19, '', NULL, '2023-08-05 11:23:21', '2023-08-05 11:23:21', 0),
(232, 139, 80, 46, 184, '', NULL, '2023-08-05 12:50:43', '2023-08-05 12:50:43', 0),
(233, 139, 80, 46, 185, '', NULL, '2023-08-05 12:50:43', '2023-08-05 12:50:43', 0),
(234, 139, 80, 46, 186, '', NULL, '2023-08-05 12:50:43', '2023-08-05 12:50:43', 0),
(235, 118, 23, 47, 13, '', NULL, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(236, 118, 23, 47, 15, '', NULL, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(237, 118, 23, 47, 16, '', NULL, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(238, 118, 23, 47, 17, '', NULL, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(239, 118, 23, 47, 18, '', NULL, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(240, 118, 23, 47, 19, '', NULL, '2023-08-07 18:07:07', '2023-08-07 18:07:07', 0),
(241, 139, 78, 48, 176, '', NULL, '2023-08-07 18:58:48', '2023-08-07 18:58:48', 0),
(242, 139, 78, 48, 178, '', NULL, '2023-08-07 18:58:48', '2023-08-07 18:58:48', 0),
(243, 139, 78, 48, 179, '', NULL, '2023-08-07 18:58:48', '2023-08-07 18:58:48', 0),
(244, 139, 78, 48, 180, '', NULL, '2023-08-07 18:58:48', '2023-08-07 18:58:48', 0),
(245, 139, 78, 48, 189, '', NULL, '2023-08-07 18:58:48', '2023-08-07 18:58:48', 0),
(246, 139, 85, 49, 191, '', NULL, '2023-08-08 18:11:47', '2023-08-08 18:11:47', 0),
(247, 139, 85, 49, 192, '', NULL, '2023-08-08 18:11:47', '2023-08-08 18:11:47', 0),
(248, 139, 85, 49, 193, '', NULL, '2023-08-08 18:11:47', '2023-08-08 18:11:47', 0),
(249, 139, 85, 50, 191, 'opt_3', 0, '2023-08-08 18:11:54', '2023-08-08 18:11:56', 0),
(250, 139, 85, 50, 192, 'opt_4', 0, '2023-08-08 18:11:54', '2023-08-08 18:12:02', 0),
(251, 139, 85, 50, 193, 'opt_3', 0, '2023-08-08 18:11:54', '2023-08-08 18:12:04', 0),
(252, 139, 85, 51, 191, 'opt_4', 0, '2023-08-08 18:33:32', '2023-08-08 18:33:33', 0),
(253, 139, 85, 51, 192, 'opt_4', 0, '2023-08-08 18:33:32', '2023-08-08 18:33:34', 0),
(254, 139, 85, 51, 193, 'opt_2', 0, '2023-08-08 18:33:32', '2023-08-08 18:33:36', 0),
(255, 139, 85, 51, 194, 'opt_1', 0, '2023-08-08 18:33:32', '2023-08-08 18:33:37', 0),
(256, 139, 85, 51, 195, 'opt_4', 0, '2023-08-08 18:33:32', '2023-08-08 18:33:40', 0),
(257, 139, 29, 52, 43, 'opt_3', 0, '2023-08-08 18:35:11', '2023-08-08 18:35:12', 0),
(258, 139, 29, 52, 44, 'opt_4', 0, '2023-08-08 18:35:11', '2023-08-08 18:35:13', 0),
(259, 139, 29, 52, 45, 'opt_2', 0, '2023-08-08 18:35:11', '2023-08-08 18:35:14', 0),
(260, 139, 29, 52, 46, 'opt_1', 1, '2023-08-08 18:35:11', '2023-08-08 18:35:15', 0),
(261, 139, 85, 53, 191, 'opt_1', 0, '2023-08-08 18:36:02', '2023-08-08 18:36:03', 0),
(262, 139, 85, 53, 192, 'opt_2', 1, '2023-08-08 18:36:02', '2023-08-08 18:36:05', 0),
(263, 139, 85, 53, 193, 'opt_3', 0, '2023-08-08 18:36:02', '2023-08-08 18:36:06', 0),
(264, 139, 85, 53, 194, 'opt_4', 0, '2023-08-08 18:36:02', '2023-08-08 18:36:07', 0),
(265, 139, 85, 53, 195, 'opt_4', 0, '2023-08-08 18:36:02', '2023-08-08 18:36:09', 0),
(266, 139, 85, 54, 191, 'opt_4', 0, '2023-08-08 18:38:08', '2023-08-08 18:38:09', 0),
(267, 139, 85, 54, 192, '', NULL, '2023-08-08 18:38:08', '2023-08-08 18:38:08', 0),
(268, 139, 85, 54, 193, '', NULL, '2023-08-08 18:38:08', '2023-08-08 18:38:08', 0),
(269, 139, 85, 54, 194, '', NULL, '2023-08-08 18:38:08', '2023-08-08 18:38:08', 0),
(270, 139, 85, 54, 195, '', NULL, '2023-08-08 18:38:08', '2023-08-08 18:38:08', 0),
(271, 139, 85, 55, 191, 'opt_2', 1, '2023-08-08 18:55:08', '2023-08-08 18:55:10', 0),
(272, 139, 85, 55, 192, 'opt_4', 0, '2023-08-08 18:55:08', '2023-08-08 18:55:11', 0),
(273, 139, 85, 55, 193, '', NULL, '2023-08-08 18:55:08', '2023-08-08 18:55:08', 0),
(274, 139, 85, 55, 194, '', NULL, '2023-08-08 18:55:08', '2023-08-08 18:55:08', 0),
(275, 139, 85, 55, 195, '', NULL, '2023-08-08 18:55:08', '2023-08-08 18:55:08', 0),
(276, 139, 85, 56, 191, 'opt_1', 0, '2023-08-08 18:55:17', '2023-08-08 18:55:19', 0),
(277, 139, 85, 56, 192, 'opt_3', 0, '2023-08-08 18:55:17', '2023-08-08 18:55:21', 0),
(278, 139, 85, 56, 193, 'opt_2', 0, '2023-08-08 18:55:17', '2023-08-08 18:55:22', 0),
(279, 139, 85, 56, 194, 'opt_4', 0, '2023-08-08 18:55:17', '2023-08-08 18:55:23', 0),
(280, 139, 85, 56, 195, 'opt_2', 0, '2023-08-08 18:55:17', '2023-08-08 18:55:25', 0),
(281, 36, 15, 57, 3, '', NULL, '2023-08-08 21:40:10', '2023-08-08 21:40:10', 0),
(282, 36, 15, 57, 4, '', NULL, '2023-08-08 21:40:10', '2023-08-08 21:40:10', 0),
(283, 36, 15, 57, 5, '', NULL, '2023-08-08 21:40:10', '2023-08-08 21:40:10', 0),
(284, 36, 15, 57, 6, '', NULL, '2023-08-08 21:40:10', '2023-08-08 21:40:10', 0),
(285, 36, 15, 57, 7, '', NULL, '2023-08-08 21:40:10', '2023-08-08 21:40:10', 0),
(286, 36, 15, 58, 3, 'opt_1', 0, '2023-08-08 21:40:29', '2023-08-08 21:40:30', 0),
(287, 36, 15, 58, 4, 'opt_2', 0, '2023-08-08 21:40:29', '2023-08-08 21:40:33', 0),
(288, 36, 15, 58, 5, 'opt_2', 0, '2023-08-08 21:40:29', '2023-08-08 21:40:34', 0),
(289, 36, 15, 58, 6, 'opt_3', 0, '2023-08-08 21:40:29', '2023-08-08 21:40:35', 0),
(290, 36, 15, 58, 7, 'opt_3', 0, '2023-08-08 21:40:29', '2023-08-08 21:40:36', 0),
(291, 36, 80, 59, 184, '', NULL, '2023-08-08 21:41:53', '2023-08-08 21:41:53', 0),
(292, 36, 80, 59, 185, '', NULL, '2023-08-08 21:41:53', '2023-08-08 21:41:53', 0),
(293, 36, 80, 59, 186, '', NULL, '2023-08-08 21:41:53', '2023-08-08 21:41:53', 0),
(294, 36, 80, 60, 184, '', NULL, '2023-08-08 21:41:59', '2023-08-08 21:41:59', 0),
(295, 36, 80, 60, 185, '', NULL, '2023-08-08 21:41:59', '2023-08-08 21:41:59', 0),
(296, 36, 80, 60, 186, '', NULL, '2023-08-08 21:41:59', '2023-08-08 21:41:59', 0),
(297, 36, 80, 61, 184, 'opt_1', 0, '2023-08-08 21:42:16', '2023-08-08 21:42:17', 0),
(298, 36, 80, 61, 185, 'opt_2', 1, '2023-08-08 21:42:16', '2023-08-08 21:42:19', 0),
(299, 36, 80, 61, 186, 'opt_2', 0, '2023-08-08 21:42:16', '2023-08-08 21:42:20', 0),
(300, 36, 18, 62, 9, 'opt_1', 1, '2023-08-08 21:43:53', '2023-08-08 21:43:54', 0),
(301, 36, 18, 62, 10, 'opt_2', 0, '2023-08-08 21:43:53', '2023-08-08 21:43:56', 0),
(302, 36, 18, 62, 11, 'opt_2', 0, '2023-08-08 21:43:53', '2023-08-08 21:43:57', 0),
(303, 36, 18, 62, 12, 'opt_3', 0, '2023-08-08 21:43:53', '2023-08-08 21:43:58', 0),
(304, 36, 33, 63, 56, 'opt_1', 0, '2023-08-08 22:20:10', '2023-08-08 22:20:11', 0),
(305, 36, 33, 63, 57, 'opt_2', 0, '2023-08-08 22:20:10', '2023-08-08 22:20:13', 0),
(306, 36, 33, 63, 58, 'opt_2', 0, '2023-08-08 22:20:10', '2023-08-08 22:20:14', 0),
(307, 36, 33, 63, 59, 'opt_2', 0, '2023-08-08 22:20:10', '2023-08-08 22:20:16', 0),
(308, 151, 41, 64, 114, '', NULL, '2023-08-08 22:59:11', '2023-08-08 22:59:11', 0),
(309, 151, 41, 64, 115, '', NULL, '2023-08-08 22:59:11', '2023-08-08 22:59:11', 0),
(310, 151, 41, 64, 116, '', NULL, '2023-08-08 22:59:11', '2023-08-08 22:59:11', 0),
(311, 151, 41, 64, 117, '', NULL, '2023-08-08 22:59:11', '2023-08-08 22:59:11', 0),
(312, 151, 41, 64, 118, '', NULL, '2023-08-08 22:59:11', '2023-08-08 22:59:11', 0),
(313, 151, 35, 65, 89, '', NULL, '2023-08-08 22:59:56', '2023-08-08 22:59:56', 0),
(314, 151, 35, 65, 90, '', NULL, '2023-08-08 22:59:56', '2023-08-08 22:59:56', 0),
(315, 151, 35, 65, 93, '', NULL, '2023-08-08 22:59:56', '2023-08-08 22:59:56', 0),
(316, 151, 35, 65, 97, '', NULL, '2023-08-08 22:59:56', '2023-08-08 22:59:56', 0),
(317, 151, 35, 65, 98, '', NULL, '2023-08-08 22:59:56', '2023-08-08 22:59:56', 0),
(318, 151, 78, 66, 176, 'opt_1', 0, '2023-08-08 23:00:38', '2023-08-08 23:00:41', 0),
(319, 151, 78, 66, 178, 'opt_4', 0, '2023-08-08 23:00:38', '2023-08-08 23:00:45', 0),
(320, 151, 78, 66, 179, 'opt_3', 0, '2023-08-08 23:00:38', '2023-08-08 23:00:48', 0),
(321, 151, 78, 66, 180, 'opt_2', 0, '2023-08-08 23:00:38', '2023-08-08 23:00:52', 0),
(322, 151, 78, 66, 189, 'opt_3', 0, '2023-08-08 23:00:38', '2023-08-08 23:00:57', 0),
(323, 118, 85, 67, 191, '', NULL, '2023-08-09 10:40:21', '2023-08-09 10:40:21', 0),
(324, 118, 85, 67, 192, '', NULL, '2023-08-09 10:40:21', '2023-08-09 10:40:21', 0),
(325, 118, 85, 67, 193, '', NULL, '2023-08-09 10:40:21', '2023-08-09 10:40:21', 0),
(326, 118, 85, 67, 194, '', NULL, '2023-08-09 10:40:21', '2023-08-09 10:40:21', 0),
(327, 118, 85, 67, 195, '', NULL, '2023-08-09 10:40:21', '2023-08-09 10:40:21', 0),
(328, 139, 85, 68, 191, '', NULL, '2023-08-09 10:42:14', '2023-08-09 10:42:14', 0),
(329, 139, 85, 68, 192, '', NULL, '2023-08-09 10:42:14', '2023-08-09 10:42:14', 0),
(330, 139, 85, 68, 193, '', NULL, '2023-08-09 10:42:14', '2023-08-09 10:42:14', 0),
(331, 139, 85, 68, 194, '', NULL, '2023-08-09 10:42:14', '2023-08-09 10:42:14', 0),
(332, 139, 85, 68, 195, '', NULL, '2023-08-09 10:42:14', '2023-08-09 10:42:14', 0),
(333, 139, 85, 69, 191, 'opt_2', 1, '2023-08-09 10:42:34', '2023-08-09 10:42:36', 0),
(334, 139, 85, 69, 192, 'opt_4', 0, '2023-08-09 10:42:34', '2023-08-09 10:42:38', 0),
(335, 139, 85, 69, 193, 'opt_1', 1, '2023-08-09 10:42:34', '2023-08-09 10:42:39', 0),
(336, 139, 85, 69, 194, 'opt_3', 0, '2023-08-09 10:42:34', '2023-08-09 10:42:40', 0),
(337, 139, 85, 69, 195, 'opt_4', 0, '2023-08-09 10:42:34', '2023-08-09 10:42:42', 0),
(338, 151, 78, 70, 176, 'opt_3', 0, '2023-08-09 10:42:56', '2023-08-09 10:42:59', 0),
(339, 151, 78, 70, 178, 'opt_2', 0, '2023-08-09 10:42:56', '2023-08-09 10:43:03', 0),
(340, 151, 78, 70, 179, 'opt_1', 0, '2023-08-09 10:42:56', '2023-08-09 10:43:06', 0),
(341, 151, 78, 70, 180, 'opt_2', 0, '2023-08-09 10:42:56', '2023-08-09 10:43:08', 0),
(342, 151, 78, 70, 189, 'opt_2', 0, '2023-08-09 10:42:56', '2023-08-09 10:43:11', 0),
(343, 139, 85, 71, 191, 'opt_3', 0, '2023-08-09 10:43:49', '2023-08-09 10:43:51', 0),
(344, 139, 85, 71, 192, 'opt_4', 0, '2023-08-09 10:43:49', '2023-08-09 10:43:52', 0),
(345, 139, 85, 71, 193, 'opt_1', 1, '2023-08-09 10:43:49', '2023-08-09 10:43:54', 0),
(346, 139, 85, 71, 194, 'opt_4', 0, '2023-08-09 10:43:49', '2023-08-09 10:43:56', 0),
(347, 139, 85, 71, 195, 'opt_2', 0, '2023-08-09 10:43:49', '2023-08-09 10:44:05', 0),
(348, 36, 85, 72, 191, 'opt_1', 0, '2023-08-09 10:44:09', '2023-08-09 10:44:11', 0),
(349, 36, 85, 72, 192, 'opt_2', 1, '2023-08-09 10:44:09', '2023-08-09 10:44:13', 0),
(350, 36, 85, 72, 193, 'opt_3', 0, '2023-08-09 10:44:09', '2023-08-09 10:44:13', 0),
(351, 36, 85, 72, 194, 'opt_2', 1, '2023-08-09 10:44:09', '2023-08-09 10:44:14', 0),
(352, 36, 85, 72, 195, 'opt_2', 0, '2023-08-09 10:44:09', '2023-08-09 10:44:15', 0),
(353, 139, 85, 73, 191, 'opt_2', 1, '2023-08-09 11:02:57', '2023-08-09 11:02:58', 0),
(354, 139, 85, 73, 192, 'opt_2', 1, '2023-08-09 11:02:57', '2023-08-09 11:03:00', 0),
(355, 139, 85, 73, 193, 'opt_3', 0, '2023-08-09 11:02:57', '2023-08-09 11:03:01', 0),
(356, 139, 85, 73, 194, 'opt_4', 0, '2023-08-09 11:02:57', '2023-08-09 11:03:02', 0),
(357, 139, 85, 73, 195, 'opt_2', 0, '2023-08-09 11:02:57', '2023-08-09 11:03:04', 0),
(358, 151, 23, 74, 13, 'opt_3', 0, '2023-08-09 11:17:04', '2023-08-09 11:17:06', 0),
(359, 151, 23, 74, 15, 'opt_3', 0, '2023-08-09 11:17:04', '2023-08-09 11:17:07', 0),
(360, 151, 23, 74, 16, 'opt_3', 0, '2023-08-09 11:17:04', '2023-08-09 11:17:08', 0),
(361, 151, 23, 74, 17, 'opt_3', 1, '2023-08-09 11:17:04', '2023-08-09 11:17:09', 0),
(362, 151, 23, 74, 18, 'opt_3', 0, '2023-08-09 11:17:04', '2023-08-09 11:17:10', 0),
(363, 151, 23, 74, 19, '', NULL, '2023-08-09 11:17:04', '2023-08-09 11:17:04', 0),
(364, 139, 15, 75, 3, 'opt_3', 1, '2023-08-09 11:27:58', '2023-08-09 11:27:59', 0),
(365, 139, 15, 75, 4, 'opt_3', 0, '2023-08-09 11:27:58', '2023-08-09 11:28:00', 0),
(366, 139, 15, 75, 5, 'opt_4', 1, '2023-08-09 11:27:58', '2023-08-09 11:28:01', 0),
(367, 139, 15, 75, 6, 'opt_3', 0, '2023-08-09 11:27:58', '2023-08-09 11:28:02', 0),
(368, 139, 15, 75, 7, 'opt_3', 0, '2023-08-09 11:27:58', '2023-08-09 11:28:03', 0),
(369, 139, 80, 76, 184, 'opt_2', 0, '2023-08-09 11:30:09', '2023-08-09 11:30:10', 0),
(370, 139, 80, 76, 185, 'opt_2', 1, '2023-08-09 11:30:09', '2023-08-09 11:30:11', 0),
(371, 139, 80, 76, 186, 'opt_3', 0, '2023-08-09 11:30:09', '2023-08-09 11:30:13', 0),
(372, 36, 69, 77, 159, 'opt_2', 0, '2023-08-09 11:49:32', '2023-08-09 11:49:34', 0),
(373, 36, 69, 77, 160, 'opt_3', 0, '2023-08-09 11:49:32', '2023-08-09 11:49:36', 0),
(374, 36, 69, 77, 161, 'opt_2', 0, '2023-08-09 11:49:32', '2023-08-09 11:49:36', 0),
(375, 36, 69, 77, 162, 'opt_3', 0, '2023-08-09 11:49:32', '2023-08-09 11:49:37', 0),
(376, 36, 69, 77, 163, 'opt_4', 0, '2023-08-09 11:49:32', '2023-08-09 11:49:39', 0),
(377, 139, 85, 78, 191, 'opt_2', 1, '2023-08-09 11:58:18', '2023-08-09 11:58:20', 0),
(378, 139, 85, 78, 192, 'opt_4', 0, '2023-08-09 11:58:18', '2023-08-09 11:58:21', 0),
(379, 139, 85, 78, 193, 'opt_2', 0, '2023-08-09 11:58:18', '2023-08-09 11:58:22', 0),
(380, 139, 85, 78, 194, 'opt_4', 0, '2023-08-09 11:58:18', '2023-08-09 11:58:23', 0),
(381, 139, 85, 78, 195, 'opt_1', 0, '2023-08-09 11:58:18', '2023-08-09 11:58:24', 0),
(382, 36, 78, 79, 176, 'opt_2', 0, '2023-08-09 12:01:08', '2023-08-09 12:01:10', 0),
(383, 36, 78, 79, 178, 'opt_3', 1, '2023-08-09 12:01:08', '2023-08-09 12:01:12', 0),
(384, 36, 78, 79, 179, 'opt_2', 0, '2023-08-09 12:01:08', '2023-08-09 12:01:13', 0),
(385, 36, 78, 79, 180, 'opt_2', 0, '2023-08-09 12:01:08', '2023-08-09 12:01:14', 0),
(386, 36, 78, 79, 189, 'opt_3', 0, '2023-08-09 12:01:08', '2023-08-09 12:01:15', 0),
(387, 36, 78, 80, 176, '', NULL, '2023-08-09 12:02:04', '2023-08-09 12:02:04', 0),
(388, 36, 78, 80, 178, '', NULL, '2023-08-09 12:02:04', '2023-08-09 12:02:04', 0),
(389, 36, 78, 80, 179, '', NULL, '2023-08-09 12:02:04', '2023-08-09 12:02:04', 0),
(390, 36, 78, 80, 180, '', NULL, '2023-08-09 12:02:04', '2023-08-09 12:02:04', 0),
(391, 36, 78, 80, 189, '', NULL, '2023-08-09 12:02:04', '2023-08-09 12:02:04', 0),
(392, 36, 80, 81, 184, 'opt_1', 0, '2023-08-09 12:40:44', '2023-08-09 12:40:47', 0),
(393, 36, 80, 81, 185, 'opt_3', 0, '2023-08-09 12:40:44', '2023-08-09 12:40:49', 0),
(394, 36, 80, 81, 186, 'opt_2', 0, '2023-08-09 12:40:44', '2023-08-09 12:40:51', 0),
(395, 36, 80, 82, 184, 'opt_2', 0, '2023-08-09 12:41:56', '2023-08-09 12:41:57', 0),
(396, 36, 80, 82, 185, 'opt_3', 0, '2023-08-09 12:41:56', '2023-08-09 12:41:59', 0),
(397, 36, 80, 82, 186, 'opt_4', 0, '2023-08-09 12:41:56', '2023-08-09 12:42:00', 0),
(398, 36, 80, 83, 184, 'opt_2', 0, '2023-08-09 12:43:17', '2023-08-09 12:43:19', 0),
(399, 36, 80, 83, 185, 'opt_4', 0, '2023-08-09 12:43:17', '2023-08-09 12:43:20', 0),
(400, 36, 80, 83, 186, 'opt_2', 0, '2023-08-09 12:43:17', '2023-08-09 12:43:21', 0),
(401, 36, 78, 84, 176, 'opt_1', 0, '2023-08-09 12:43:48', '2023-08-09 12:43:49', 0),
(402, 36, 78, 84, 178, 'opt_2', 0, '2023-08-09 12:43:48', '2023-08-09 12:43:50', 0),
(403, 36, 78, 84, 179, 'opt_3', 0, '2023-08-09 12:43:48', '2023-08-09 12:43:51', 0),
(404, 36, 78, 84, 180, 'opt_2', 0, '2023-08-09 12:43:48', '2023-08-09 12:43:52', 0),
(405, 36, 78, 84, 189, 'opt_3', 0, '2023-08-09 12:43:48', '2023-08-09 12:43:53', 0),
(406, 151, 85, 85, 191, 'opt_3', 0, '2023-08-09 13:00:48', '2023-08-09 13:00:51', 0),
(407, 151, 85, 85, 192, 'opt_2', 1, '2023-08-09 13:00:48', '2023-08-09 13:00:52', 0),
(408, 151, 85, 85, 193, 'opt_2', 0, '2023-08-09 13:00:48', '2023-08-09 13:00:54', 0),
(409, 151, 85, 85, 194, 'opt_2', 1, '2023-08-09 13:00:48', '2023-08-09 13:00:55', 0),
(410, 151, 85, 85, 195, 'opt_2', 0, '2023-08-09 13:00:48', '2023-08-09 13:00:58', 0),
(411, 131, 85, 86, 191, 'opt_2', 1, '2023-08-09 16:31:36', '2023-08-09 16:31:37', 0),
(412, 131, 85, 86, 192, 'opt_2', 1, '2023-08-09 16:31:36', '2023-08-09 16:31:41', 0),
(413, 131, 85, 86, 193, 'opt_4', 0, '2023-08-09 16:31:36', '2023-08-09 16:31:43', 0),
(414, 131, 85, 86, 194, 'opt_3', 0, '2023-08-09 16:31:36', '2023-08-09 16:31:44', 0),
(415, 131, 85, 86, 195, 'opt_4', 0, '2023-08-09 16:31:36', '2023-08-09 16:31:45', 0),
(416, 131, 80, 87, 184, '', NULL, '2023-08-09 16:50:34', '2023-08-09 16:50:34', 0),
(417, 131, 80, 87, 185, '', NULL, '2023-08-09 16:50:34', '2023-08-09 16:50:34', 0),
(418, 131, 80, 87, 186, '', NULL, '2023-08-09 16:50:34', '2023-08-09 16:50:34', 0),
(419, 131, 80, 88, 184, 'opt_1', 0, '2023-08-09 16:50:50', '2023-08-09 16:50:51', 0),
(420, 131, 80, 88, 185, 'opt_3', 0, '2023-08-09 16:50:50', '2023-08-09 16:50:52', 0),
(421, 131, 80, 88, 186, 'opt_4', 0, '2023-08-09 16:50:50', '2023-08-09 16:50:53', 0),
(422, 131, 78, 89, 176, '', NULL, '2023-08-09 16:54:13', '2023-08-09 16:54:13', 0),
(423, 131, 78, 89, 178, 'opt_4', 0, '2023-08-09 16:54:13', '2023-08-09 16:54:19', 0),
(424, 131, 78, 89, 179, '', NULL, '2023-08-09 16:54:13', '2023-08-09 16:54:13', 0),
(425, 131, 78, 89, 180, 'opt_2', 0, '2023-08-09 16:54:13', '2023-08-09 16:54:40', 0),
(426, 131, 78, 89, 189, '', NULL, '2023-08-09 16:54:13', '2023-08-09 16:54:13', 0),
(427, 131, 78, 90, 176, '', NULL, '2023-08-09 16:55:31', '2023-08-09 16:55:31', 0),
(428, 131, 78, 90, 178, '', NULL, '2023-08-09 16:55:31', '2023-08-09 16:55:31', 0),
(429, 131, 78, 90, 179, '', NULL, '2023-08-09 16:55:31', '2023-08-09 16:55:31', 0),
(430, 131, 78, 90, 180, '', NULL, '2023-08-09 16:55:31', '2023-08-09 16:55:31', 0),
(431, 131, 78, 90, 189, '', NULL, '2023-08-09 16:55:31', '2023-08-09 16:55:31', 0),
(432, 131, 80, 91, 184, 'opt_3', 1, '2023-08-09 17:13:07', '2023-08-09 17:13:23', 0),
(433, 131, 80, 91, 185, 'opt_4', 0, '2023-08-09 17:13:07', '2023-08-09 17:13:34', 0),
(434, 131, 80, 91, 186, 'opt_2', 0, '2023-08-09 17:13:07', '2023-08-09 17:13:44', 0),
(435, 195, 78, 92, 176, 'opt_2', 0, '2023-08-09 18:28:12', '2023-08-09 18:28:16', 0),
(436, 195, 78, 92, 178, 'opt_1', 0, '2023-08-09 18:28:12', '2023-08-09 18:28:21', 0),
(437, 195, 78, 92, 179, 'opt_1', 0, '2023-08-09 18:28:12', '2023-08-09 18:28:23', 0),
(438, 195, 78, 92, 180, 'opt_1', 0, '2023-08-09 18:28:12', '2023-08-09 18:28:25', 0),
(439, 195, 78, 92, 189, 'opt_1', 1, '2023-08-09 18:28:12', '2023-08-09 18:28:26', 0),
(440, 195, 85, 93, 191, 'opt_1', 0, '2023-08-09 18:29:16', '2023-08-09 18:29:19', 0),
(441, 195, 85, 93, 192, '', NULL, '2023-08-09 18:29:16', '2023-08-09 18:29:16', 0),
(442, 195, 85, 93, 193, '', NULL, '2023-08-09 18:29:16', '2023-08-09 18:29:16', 0),
(443, 195, 85, 93, 194, '', NULL, '2023-08-09 18:29:16', '2023-08-09 18:29:16', 0),
(444, 195, 85, 93, 195, '', NULL, '2023-08-09 18:29:16', '2023-08-09 18:29:16', 0),
(445, 131, 78, 94, 176, '', NULL, '2023-08-10 11:21:44', '2023-08-10 11:21:44', 0),
(446, 131, 78, 94, 178, '', NULL, '2023-08-10 11:21:44', '2023-08-10 11:21:44', 0),
(447, 131, 78, 94, 179, '', NULL, '2023-08-10 11:21:44', '2023-08-10 11:21:44', 0),
(448, 131, 78, 94, 180, '', NULL, '2023-08-10 11:21:44', '2023-08-10 11:21:44', 0),
(449, 131, 78, 94, 189, '', NULL, '2023-08-10 11:21:44', '2023-08-10 11:21:44', 0),
(450, 151, 78, 95, 176, '', NULL, '2023-08-10 11:22:47', '2023-08-10 11:22:47', 0),
(451, 151, 78, 95, 178, '', NULL, '2023-08-10 11:22:47', '2023-08-10 11:22:47', 0),
(452, 151, 78, 95, 179, '', NULL, '2023-08-10 11:22:47', '2023-08-10 11:22:47', 0),
(453, 151, 78, 95, 180, '', NULL, '2023-08-10 11:22:47', '2023-08-10 11:22:47', 0),
(454, 151, 78, 95, 189, '', NULL, '2023-08-10 11:22:47', '2023-08-10 11:22:47', 0),
(455, 151, 78, 96, 176, '', NULL, '2023-08-10 11:23:16', '2023-08-10 11:23:16', 0),
(456, 151, 78, 96, 178, '', NULL, '2023-08-10 11:23:16', '2023-08-10 11:23:16', 0),
(457, 151, 78, 96, 179, '', NULL, '2023-08-10 11:23:16', '2023-08-10 11:23:16', 0),
(458, 151, 78, 96, 180, '', NULL, '2023-08-10 11:23:16', '2023-08-10 11:23:16', 0),
(459, 151, 78, 96, 189, '', NULL, '2023-08-10 11:23:16', '2023-08-10 11:23:16', 0),
(460, 195, 14, 97, 1, '', NULL, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(461, 195, 14, 97, 2, '', NULL, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(462, 195, 14, 97, 8, '', NULL, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(463, 195, 14, 97, 77, '', NULL, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(464, 195, 14, 97, 187, '', NULL, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(465, 195, 14, 97, 188, '', NULL, '2023-08-11 13:22:39', '2023-08-11 13:22:39', 0),
(466, 195, 35, 98, 89, 'opt_1', 0, '2023-08-11 13:42:39', '2023-08-11 13:42:43', 0),
(467, 195, 35, 98, 90, '', NULL, '2023-08-11 13:42:39', '2023-08-11 13:42:39', 0),
(468, 195, 35, 98, 93, '', NULL, '2023-08-11 13:42:39', '2023-08-11 13:42:39', 0),
(469, 195, 35, 98, 97, '', NULL, '2023-08-11 13:42:39', '2023-08-11 13:42:39', 0),
(470, 195, 35, 98, 98, '', NULL, '2023-08-11 13:42:39', '2023-08-11 13:42:39', 0),
(471, 131, 18, 99, 9, '', NULL, '2023-08-11 15:10:46', '2023-08-11 15:10:46', 0),
(472, 131, 18, 99, 10, '', NULL, '2023-08-11 15:10:46', '2023-08-11 15:10:46', 0),
(473, 131, 18, 99, 11, '', NULL, '2023-08-11 15:10:46', '2023-08-11 15:10:46', 0),
(474, 131, 18, 99, 12, 'opt_1', 0, '2023-08-11 15:10:46', '2023-08-11 15:10:51', 0),
(475, 131, 18, 100, 9, 'opt_2', 0, '2023-08-11 15:11:06', '2023-08-11 15:11:08', 0),
(476, 131, 18, 100, 10, 'opt_1', 0, '2023-08-11 15:11:06', '2023-08-11 15:11:12', 0),
(477, 131, 18, 100, 11, '', NULL, '2023-08-11 15:11:06', '2023-08-11 15:11:06', 0),
(478, 131, 18, 100, 12, '', NULL, '2023-08-11 15:11:06', '2023-08-11 15:11:06', 0),
(479, 131, 18, 101, 9, 'opt_1', 1, '2023-08-11 15:11:31', '2023-08-11 15:11:34', 0),
(480, 131, 18, 101, 10, 'opt_2', 0, '2023-08-11 15:11:31', '2023-08-11 15:11:36', 0),
(481, 131, 18, 101, 11, 'opt_3', 1, '2023-08-11 15:11:31', '2023-08-11 15:11:37', 0),
(482, 131, 18, 101, 12, 'opt_4', 0, '2023-08-11 15:11:31', '2023-08-11 15:11:38', 0),
(483, 131, 80, 102, 184, 'opt_1', 0, '2023-08-11 15:21:24', '2023-08-11 15:21:30', 0),
(484, 131, 80, 102, 185, 'opt_2', 1, '2023-08-11 15:21:24', '2023-08-11 15:21:32', 0),
(485, 131, 80, 102, 186, 'opt_3', 0, '2023-08-11 15:21:24', '2023-08-11 15:21:33', 0),
(486, 131, 78, 103, 176, '', NULL, '2023-08-11 15:25:49', '2023-08-11 15:25:49', 0),
(487, 131, 78, 103, 178, '', NULL, '2023-08-11 15:25:49', '2023-08-11 15:25:49', 0),
(488, 131, 78, 103, 179, '', NULL, '2023-08-11 15:25:49', '2023-08-11 15:25:49', 0),
(489, 131, 78, 103, 180, '', NULL, '2023-08-11 15:25:49', '2023-08-11 15:25:49', 0),
(490, 131, 78, 103, 189, '', NULL, '2023-08-11 15:25:49', '2023-08-11 15:25:49', 0),
(491, 131, 78, 104, 176, 'opt_1', 0, '2023-08-11 15:28:14', '2023-08-11 15:28:16', 0),
(492, 131, 78, 104, 178, 'opt_2', 0, '2023-08-11 15:28:14', '2023-08-11 15:28:17', 0),
(493, 131, 78, 104, 179, 'opt_3', 0, '2023-08-11 15:28:14', '2023-08-11 15:28:18', 0),
(494, 131, 78, 104, 180, 'opt_4', 1, '2023-08-11 15:28:14', '2023-08-11 15:28:19', 0),
(495, 131, 78, 104, 189, 'opt_1', 1, '2023-08-11 15:28:14', '2023-08-11 15:28:21', 0),
(496, 131, 79, 105, 181, 'opt_1', 0, '2023-08-11 15:29:26', '2023-08-11 15:29:32', 0),
(497, 131, 79, 105, 182, 'opt_2', 0, '2023-08-11 15:29:26', '2023-08-11 15:29:35', 0),
(498, 131, 79, 105, 183, 'opt_3', 0, '2023-08-11 15:29:26', '2023-08-11 15:29:38', 0),
(499, 151, 78, 106, 176, 'opt_3', 0, '2023-08-11 15:53:09', '2023-08-11 15:53:11', 0),
(500, 151, 78, 106, 178, '', NULL, '2023-08-11 15:53:09', '2023-08-11 15:53:09', 0),
(501, 151, 78, 106, 179, '', NULL, '2023-08-11 15:53:09', '2023-08-11 15:53:09', 0),
(502, 151, 78, 106, 180, '', NULL, '2023-08-11 15:53:09', '2023-08-11 15:53:09', 0),
(503, 151, 78, 106, 189, '', NULL, '2023-08-11 15:53:09', '2023-08-11 15:53:09', 0),
(504, 139, 98, 107, 202, 'opt_1', 0, '2023-08-11 16:51:31', '2023-08-11 16:51:35', 0),
(505, 139, 98, 107, 203, 'opt_2', 0, '2023-08-11 16:51:31', '2023-08-11 16:51:36', 0),
(506, 139, 98, 107, 204, 'opt_3', 0, '2023-08-11 16:51:31', '2023-08-11 16:51:38', 0),
(507, 139, 98, 107, 205, 'opt_4', 0, '2023-08-11 16:51:31', '2023-08-11 16:51:39', 0),
(508, 139, 98, 107, 206, 'opt_1', 0, '2023-08-11 16:51:31', '2023-08-11 16:51:41', 0),
(509, 139, 98, 107, 207, 'opt_4', 0, '2023-08-11 16:51:31', '2023-08-11 16:51:48', 0),
(510, 195, 14, 108, 1, '', NULL, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(511, 195, 14, 108, 2, '', NULL, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(512, 195, 14, 108, 8, '', NULL, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(513, 195, 14, 108, 77, '', NULL, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(514, 195, 14, 108, 187, '', NULL, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(515, 195, 14, 108, 188, '', NULL, '2023-08-14 11:43:34', '2023-08-14 11:43:34', 0),
(516, 195, 35, 109, 89, '', NULL, '2023-08-14 11:44:34', '2023-08-14 11:44:34', 0),
(517, 195, 35, 109, 90, '', NULL, '2023-08-14 11:44:34', '2023-08-14 11:44:34', 0),
(518, 195, 35, 109, 93, '', NULL, '2023-08-14 11:44:34', '2023-08-14 11:44:34', 0),
(519, 195, 35, 109, 97, '', NULL, '2023-08-14 11:44:34', '2023-08-14 11:44:34', 0),
(520, 195, 35, 109, 98, '', NULL, '2023-08-14 11:44:34', '2023-08-14 11:44:34', 0),
(521, 139, 32, 110, 52, 'opt_2', 1, '2023-08-14 15:07:29', '2023-08-14 15:07:38', 0),
(522, 139, 32, 110, 53, 'opt_3', 0, '2023-08-14 15:07:29', '2023-08-14 15:07:41', 0),
(523, 139, 32, 110, 54, 'opt_2', 0, '2023-08-14 15:07:29', '2023-08-14 15:07:42', 0),
(524, 139, 32, 110, 55, 'opt_3', 0, '2023-08-14 15:07:29', '2023-08-14 15:07:43', 0),
(525, 151, 78, 111, 176, 'opt_1', 0, '2023-08-16 13:09:24', '2023-08-16 13:09:28', 0),
(526, 151, 78, 111, 178, 'opt_2', 0, '2023-08-16 13:09:24', '2023-08-16 13:09:32', 0),
(527, 151, 78, 111, 179, 'opt_2', 0, '2023-08-16 13:09:24', '2023-08-16 13:09:35', 0),
(528, 151, 78, 111, 180, 'opt_2', 0, '2023-08-16 13:09:24', '2023-08-16 13:09:37', 0),
(529, 151, 78, 111, 189, 'opt_1', 1, '2023-08-16 13:09:24', '2023-08-16 13:09:38', 0),
(530, 139, 100, 112, 208, '', NULL, '2023-08-17 13:16:48', '2023-08-17 13:16:48', 0),
(531, 139, 98, 113, 202, '', NULL, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(532, 139, 98, 113, 203, '', NULL, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(533, 139, 98, 113, 204, '', NULL, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(534, 139, 98, 113, 205, '', NULL, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(535, 139, 98, 113, 206, '', NULL, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(536, 139, 98, 113, 207, '', NULL, '2023-08-17 16:24:56', '2023-08-17 16:24:56', 0),
(537, 139, 80, 114, 184, '', NULL, '2023-08-17 16:25:05', '2023-08-17 16:25:05', 0),
(538, 139, 80, 114, 185, '', NULL, '2023-08-17 16:25:05', '2023-08-17 16:25:05', 0),
(539, 139, 80, 114, 186, '', NULL, '2023-08-17 16:25:05', '2023-08-17 16:25:05', 0),
(540, 139, 105, 115, 223, '', NULL, '2023-08-17 16:25:46', '2023-08-17 16:25:46', 0),
(541, 139, 105, 115, 224, '', NULL, '2023-08-17 16:25:46', '2023-08-17 16:25:46', 0),
(542, 139, 105, 115, 225, '', NULL, '2023-08-17 16:25:46', '2023-08-17 16:25:46', 0),
(543, 139, 105, 115, 226, '', NULL, '2023-08-17 16:25:46', '2023-08-17 16:25:46', 0),
(544, 139, 106, 116, 227, '', NULL, '2023-08-17 16:26:03', '2023-08-17 16:26:03', 0),
(545, 139, 106, 116, 228, '', NULL, '2023-08-17 16:26:03', '2023-08-17 16:26:03', 0),
(546, 139, 106, 116, 229, '', NULL, '2023-08-17 16:26:03', '2023-08-17 16:26:03', 0),
(547, 139, 106, 116, 230, '', NULL, '2023-08-17 16:26:03', '2023-08-17 16:26:03', 0),
(548, 139, 106, 116, 231, '', NULL, '2023-08-17 16:26:03', '2023-08-17 16:26:03', 0),
(549, 139, 107, 117, 232, '', NULL, '2023-08-17 16:26:22', '2023-08-17 16:26:22', 0),
(550, 139, 107, 117, 233, '', NULL, '2023-08-17 16:26:22', '2023-08-17 16:26:22', 0),
(551, 139, 107, 117, 234, '', NULL, '2023-08-17 16:26:22', '2023-08-17 16:26:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `id` int NOT NULL,
  `creator_id` int NOT NULL,
  `survey_type_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `mrp` double(10,2) NOT NULL,
  `percent` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `videos` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `view` int NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `max_age` int NOT NULL,
  `min_age` int NOT NULL,
  `gender` varchar(255) NOT NULL,
  `chapter` varchar(4) NOT NULL,
  `occupation_id` int NOT NULL,
  `hobby_id` int NOT NULL,
  `education_id` int NOT NULL,
  `heard_about_us_id` int NOT NULL,
  `area_of_interest_id` int NOT NULL,
  `reject_reason` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_chapter`
--

CREATE TABLE `tbl_survey_chapter` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `survey_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `chapter_no` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_quiz`
--

CREATE TABLE `tbl_survey_quiz` (
  `id` int NOT NULL,
  `question_no` int NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `correct_ans` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `video_id` int NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `updated_at` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_share`
--

CREATE TABLE `tbl_survey_share` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `survey_id` int NOT NULL,
  `img_1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_5` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_6` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_7` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_8` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_9` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img_10` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0=pending,1=approved,2=reject',
  `reason` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_student_quiz`
--

CREATE TABLE `tbl_survey_student_quiz` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `total_question` int NOT NULL,
  `attempted_question` int NOT NULL,
  `total_marks` int NOT NULL,
  `obtained_marks` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_student_quiz_report`
--

CREATE TABLE `tbl_survey_student_quiz_report` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `video_id` int NOT NULL,
  `student_quiz_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_correct` tinyint DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_type`
--

CREATE TABLE `tbl_survey_type` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_video`
--

CREATE TABLE `tbl_survey_video` (
  `id` int NOT NULL,
  `survey_id` varchar(255) NOT NULL,
  `chapter_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `videos` varchar(255) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `sort` int NOT NULL,
  `minute` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isDeleted` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sw_password` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `alternate_no` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` int NOT NULL,
  `bank_detail` varchar(255) NOT NULL,
  `adhar_card` int NOT NULL,
  `upi` varchar(255) NOT NULL,
  `fcm` varchar(300) NOT NULL,
  `occupation_id` int NOT NULL,
  `education_id` int NOT NULL,
  `hobby_id` int NOT NULL,
  `heard_about_us_id` int NOT NULL,
  `area_of_interest_id` int NOT NULL,
  `imei_no` varchar(255) NOT NULL,
  `imei_status` varchar(255) NOT NULL,
  `flag` tinyint NOT NULL,
  `refferal` varchar(255) NOT NULL,
  `userefferal` varchar(255) NOT NULL,
  `wallet` varchar(255) NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_Blocked` tinyint NOT NULL,
  `isDeleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `last_name`, `email`, `img`, `password`, `sw_password`, `mobile`, `alternate_no`, `gender`, `date_of_birth`, `address`, `pincode`, `bank_detail`, `adhar_card`, `upi`, `fcm`, `occupation_id`, `education_id`, `hobby_id`, `heard_about_us_id`, `area_of_interest_id`, `imei_no`, `imei_status`, `flag`, `refferal`, `userefferal`, `wallet`, `added_date`, `updated_date`, `is_Blocked`, `isDeleted`) VALUES
(1, 'faizan', 'faizan', 'asdasd@gmail.com', '', '', '92c4c073eacab5b45d30ee0aaa29ae52', '7304094851', '1234567890', 'female', '1994-07-31', 'mumbai', 4000102, '', 0, '', '0', 1, 1, 1, 1, 1, '', '', 0, '', '', '0', '2023-07-12 06:50:27', '2023-08-09 18:47:42', 0, 1),
(3, 'Ashwini', '', '', '', '', '', '9594539777', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'EXC681959', '', '0', '2023-07-12 06:58:23', '2023-07-13 05:39:02', 0, 1),
(4, 'Rutu', 'Kharat', '', '', '', '', '7039604021', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'EXC215703', '', '0', '2023-07-12 07:03:22', '2023-07-19 13:19:46', 0, 1),
(5, 'Sunny', 'Gupta', 'sunny@gmail.com', '', '', '', '9969157484', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'EXC680996', '', '0', '2023-07-12 07:39:45', '2023-07-12 08:39:42', 0, 0),
(6, 'Rahul', 'Gupta', 'rahul@gmail.com', '', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '9969157483', '', 'male', '1990-01-01', '', 410208, '', 0, '', '0', 6, 6, 1, 6, 4, '', '', 0, '', '', '0', '2023-07-12 07:47:17', '2023-07-12 07:47:17', 0, 0),
(7, 'ninad', 'pawar', 'ninad@gmail.com', '', '123', '202cb962ac59075b964b07152d234b70', '625372537', '76478364782', 'male', '0000-00-00', '', 0, '', 0, '', '0', 1, 1, 2, 2, 1, '', '', 0, 'NIN506625', '', '0', '2023-07-12 07:56:16', '2023-07-12 07:56:16', 0, 0),
(8, '', '', '', '', '', '', '9004977621', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW423900', '', '0', '2023-07-12 07:58:12', '2023-07-12 08:00:20', 0, 1),
(9, 'ninad', 'pawar', 'ninad123@gmail.com', '', '123', '202cb962ac59075b964b07152d234b70', '98766543', '76478364782', 'male', '0000-00-00', '', 0, '', 0, '', '0', 1, 1, 2, 2, 1, '', '', 0, 'NIN787987', '', '0', '2023-07-12 07:59:22', '2023-07-12 07:59:22', 0, 0),
(10, '', '', '', '', '', '', '9004977621', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW120900', '', '0', '2023-07-12 08:00:33', '2023-07-12 12:27:56', 0, 1),
(11, '', '', '', '', '', '', '8104525751', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW239810', '', '0', '2023-07-12 08:02:10', '2023-07-31 15:55:33', 0, 1),
(12, '', '', '', '', '', '', '9594340066', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 0, 'CW426959', '', '0', '2023-07-12 08:13:43', '2023-07-31 15:55:41', 0, 1),
(13, 'Amol', 'patil', 'amol@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '9004977421', '', 'male', '1992-02-03', '', 324254, '', 0, '', 'e7-2mYKlQnqFfnpHAKRTgE:APA91bHjzCcBEL1H9DCD3ijEY5wpDi-h_4wUeGzUopeOxRYqaMFyJB3Bt7v9_TXhjw-FMXVAM3U7J7dsGph2M2ZeG6rsF67NltbzzX2HWNmtafXp2QEUtdxgHi65Kt9sYP0hV4Kgff4b', 7, 3, 2, 5, 5, '', '0', 0, '', '', '0', '2023-07-12 08:21:56', '2023-08-09 13:26:34', 0, 0),
(14, 'Veer', 'Lwate', 'veer@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '9004977421', '', 'male', '1999-02-08', '', 343554, '', 0, '', '0', 7, 7, 5, 7, 6, '', '', 0, '', '', '0', '2023-07-12 08:22:43', '2023-07-12 08:22:43', 0, 0),
(15, '', '', '', '', '', '', '9969157482', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW887996', '', '0', '2023-07-12 08:24:48', '2023-08-08 12:22:15', 0, 1),
(16, 'abinasf', 'bnjj', '', '', '', '', '8108904982', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 4, 8, 2, 1, 0, '', '0', 0, 'CW740810', '', '0', '2023-07-12 11:43:10', '2023-07-31 15:55:55', 0, 1),
(17, '', '', '', '', '', '', '8369326767', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW928836', '', '0', '2023-07-12 12:02:18', '2023-07-19 11:26:11', 0, 0),
(18, 'Renu', 'kamble', 'renu@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '9999999999', '', 'female', '1999-02-03', '', 344555, '', 0, '', '0', 7, 7, 2, 6, 1, '', '0', 0, '', '', '0', '2023-07-12 12:25:48', '2023-07-19 12:33:07', 0, 0),
(19, '', '', '', '', '', '', '9004977621', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW621900', '', '0', '2023-07-12 12:28:08', '2023-07-12 12:34:52', 0, 1),
(20, '', '', '', '', '', '', '9004977621', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW429900', '', '0', '2023-07-12 12:42:58', '2023-07-13 05:14:32', 0, 1),
(21, 'Swati', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW853900', '', '0', '2023-07-13 05:14:52', '2023-07-14 05:34:30', 0, 1),
(22, '', '', '', '', '', '', '9594539777', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW186959', '', '0', '2023-07-13 05:39:15', '2023-07-13 05:54:00', 0, 1),
(23, 'ashu', 'ghj', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW565986', '', '0', '2023-07-13 05:54:07', '2023-07-13 07:32:04', 0, 0),
(24, '', '', '', '', '', '', '9567834225', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW267956', '', '0', '2023-07-13 07:17:25', '2023-07-13 07:17:25', 0, 0),
(25, 'ashu', 'beloshe', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW935986', '', '0', '2023-07-13 07:37:11', '2023-07-13 08:27:14', 0, 0),
(26, 'swati', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW934900', '', '0', '2023-07-13 07:55:29', '2023-07-14 05:34:24', 0, 1),
(27, 'ddd', 'xcv', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW775986', '', '0', '2023-07-13 08:27:21', '2023-07-31 15:58:19', 0, 1),
(28, 'raj', 'maurya', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW679123', '', '0', '2023-07-13 08:34:10', '2023-07-13 08:38:18', 0, 0),
(29, 'pooja', 'bekisgr', '', '', '', '', '', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW951986', '', '0', '2023-07-13 08:38:38', '2023-07-13 08:41:59', 0, 0),
(30, '', '', '', '', '', '', '9867834225', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW807986', '', '0', '2023-07-13 08:45:00', '2023-07-13 08:52:00', 0, 1),
(31, '', '', '', '', '', '', '9999999999', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW367999', '', '0', '2023-07-13 08:46:54', '2023-07-31 15:56:26', 0, 1),
(32, 'ss', 'ss', '', '', '', '', '0000000000', '', 'male', '0000-00-00', '', 288996, '', 0, '', '0', 6, 1, 5, 6, 2, '', '1', 0, 'CW363000', '', '0', '2023-07-13 08:48:07', '2023-07-31 15:57:47', 0, 1),
(33, 'mohini', 'fhh', '', '', '', '', '', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW262986', '', '0', '2023-07-13 08:52:36', '2023-07-13 09:00:37', 0, 0),
(34, 'ashwini', 'beloshe', '', '', '', '', '9867834225', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 4, 12, 1, 1, 0, '', '0', 0, 'CW865986', '', '0', '2023-07-13 09:11:42', '2023-07-13 11:50:08', 0, 1),
(35, '', '', '', '', '', '', '9892262454', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW115989', '', '0', '2023-07-13 09:38:20', '2023-07-13 09:41:34', 0, 1),
(36, 'raj', 'maurya', '', '', '', '', '9892262454', '', 'male', '1996-04-29', '', 400080, '', 0, '', 'e7-2mYKlQnqFfnpHAKRTgE:APA91bHjzCcBEL1H9DCD3ijEY5wpDi-h_4wUeGzUopeOxRYqaMFyJB3Bt7v9_TXhjw-FMXVAM3U7J7dsGph2M2ZeG6rsF67NltbzzX2HWNmtafXp2QEUtdxgHi65Kt9sYP0hV4Kgff4b', 0, 0, 0, 0, 0, '', '0', 0, 'CW878989', '', '0', '2023-07-13 09:41:56', '2023-08-09 13:12:50', 0, 0),
(37, 'puja', 'kole', '', '', '', '', '9594539777', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 4, 1, 1, 3, 0, '', '0', 0, 'CW662959', '', '0', '2023-07-13 10:47:37', '2023-07-31 15:58:37', 0, 1),
(38, '', '', '', '', '', '', '9892262464', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW849989', '', '0', '2023-07-13 11:21:15', '2023-07-13 11:21:15', 0, 0),
(39, '', '', '', '', '', '', '1472580963', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW816147', '', '0', '2023-07-13 11:26:28', '2023-07-13 11:26:28', 0, 0),
(40, 'ahhh', 'hjjuh', '', '', '', '', '1234567890', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 3, 8, 2, 2, 0, '', '0', 0, 'CW539123', '', '0', '2023-07-13 11:28:34', '2023-07-13 11:35:14', 0, 0),
(41, 'Ashuuuuu', 'beloshe', '', '', '', '', '9867834225', '', 'male', '2023-07-27', '', 400078, '', 0, '', '0', 3, 9, 1, 3, 0, '', '0', 0, 'CW533986', '', '0', '2023-07-13 11:50:34', '2023-07-14 05:35:00', 0, 1),
(42, 'tedghh', 'vhgghh', '', '', '', '', '9632587410', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 3, 9, 3, 2, 0, '', '0', 0, 'CW137963', '', '0', '2023-07-13 12:09:30', '2023-07-13 12:12:18', 0, 0),
(43, 'ninad', 'pawar', 'ninad@gmail.com', '', '123', '', '1234567891', '', 'male', '0000-00-00', '', 0, '', 0, '', '0', 1, 2, 2, 3, 1, '', '0', 0, 'CW545987', '', '0', '2023-07-13 12:13:41', '2023-07-13 12:50:50', 0, 1),
(44, 'swati', 'karande', '', '', '', '', '9004977621', '', 'male', '1995-07-13', '', 400553, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW785900', '', '0', '2023-07-13 13:22:49', '2023-07-14 05:28:39', 0, 1),
(45, 'swati', 'karande', '', '', '', '', '9004977621', '', 'male', '1994-04-09', '', 258036, '', 0, '', '0', 6, 12, 3, 1, 0, '', '0', 0, 'CW388900', '', '0', '2023-07-14 05:28:53', '2023-07-14 05:31:22', 0, 1),
(46, 'swati', 'karande', '', '', '', '', '9004977621', '', 'male', '2023-07-14', '', 258036, '', 0, '', '0', 1, 12, 4, 4, 0, '', '0', 0, 'CW243900', '', '0', '2023-07-14 05:31:33', '2023-07-14 05:34:58', 0, 1),
(47, 'jayu', 'chikne', '', '', '', '', '9004977621', '', 'male', '2023-07-14', '', 85353, '', 0, '', '0', 3, 12, 3, 4, 0, '', '0', 0, 'CW207900', '', '0', '2023-07-14 05:35:04', '2023-07-18 05:27:27', 0, 1),
(48, 'Ashwini', 'Beloshe', '', '', '', '', '9867834225', '', 'male', '2023-07-29', '', 400080, '', 0, '', '0', 3, 13, 3, 1, 0, '', '0', 0, 'CW654986', '', '0', '2023-07-14 05:37:32', '2023-07-14 07:27:38', 0, 1),
(49, 'kk', 'kk', '', '', '', '', '9076113655', '', 'male', '2023-07-14', '', 250033, '', 0, '', '0', 3, 13, 4, 4, 0, '', '0', 0, 'CW799907', '', '0', '2023-07-14 05:59:19', '2023-07-14 06:02:17', 0, 1),
(50, 'kk', 'sd', '', '', '', '', '9076113655', '', 'male', '2023-07-14', '', 0, '', 0, '', '0', 3, 12, 3, 4, 0, '', '0', 0, 'CW313907', '', '0', '2023-07-14 06:02:22', '2023-07-14 06:04:31', 0, 1),
(51, 'nita', 'patil', '', '', '', '', '9076113655', '', 'male', '2023-07-14', '', 369805, '', 0, '', '0', 6, 10, 4, 4, 0, '', '1', 0, 'CW758907', '', '0', '2023-07-14 06:04:53', '2023-07-19 14:38:57', 0, 1),
(52, 'Ashu', 'beloshr', '', '', '', '', '9867834225', '', 'male', '2023-07-26', '', 400078, '', 0, '', '0', 2, 1, 1, 1, 0, '', '0', 0, 'CW566986', '', '0', '2023-07-14 07:27:44', '2023-07-14 07:46:53', 0, 1),
(53, 'Ashuuu', 'belosher', '', '', '', '', '9867834225', '', 'male', '2023-07-29', '', 48582566, '', 0, '', '0', 2, 2, 2, 2, 0, '', '0', 0, 'CW389986', '', '0', '2023-07-14 07:47:04', '2023-07-14 09:15:59', 0, 0),
(54, 'kk', 'kk', '', '', '', '', '5555555555', '', 'female', '2023-05-31', '', 400089, '', 0, '', '0', 1, 1, 5, 3, 5, '', '0', 0, 'CW263555', '', '0', '2023-07-14 09:16:32', '2023-07-31 15:56:54', 0, 1),
(55, '', '', '', '', '', '', '4444444444', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW725444', '', '0', '2023-07-14 10:08:27', '2023-07-31 15:57:08', 0, 1),
(56, '', '', '', '', '', '', '5858585858', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW160585', '', '0', '2023-07-14 10:11:55', '2023-07-31 15:57:16', 0, 1),
(57, '', '', '', '', '', '', '9797979797', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW627979', '', '0', '2023-07-14 10:32:06', '2023-07-31 15:57:25', 0, 1),
(58, '', '', '', '', '', '', '9898989898', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW175989', '', '0', '2023-07-14 10:33:56', '2023-07-31 15:57:32', 0, 1),
(59, '', '', '', '', '', '', '2323232323', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW922232', '', '0', '2023-07-14 10:40:28', '2023-07-14 10:40:28', 0, 0),
(60, '', '', '', '', '', '', '5656565656', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW727565', '', '0', '2023-07-14 10:42:37', '2023-07-31 15:58:06', 0, 1),
(61, '', '', '', '', '', '', '1212121212', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW728121', '', '0', '2023-07-14 10:43:36', '2023-07-14 10:43:36', 0, 0),
(62, '', '', '', '', '', '', '9393939393', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW357939', '', '0', '2023-07-14 10:50:37', '2023-07-14 10:50:37', 0, 0),
(63, '', '', '', '', '', '', '1231231231', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW617123', '', '0', '2023-07-14 11:12:57', '2023-07-14 11:12:57', 0, 0),
(64, '', '', '', '', '', '', '9856985236', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW841985', '', '0', '2023-07-14 11:29:53', '2023-07-14 11:29:53', 0, 0),
(65, '', '', '', '', '', '', '6969696969', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW171696', '', '0', '2023-07-14 11:34:14', '2023-07-14 11:34:14', 0, 0),
(66, '', '', '', '', '', '', '2582582525', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW382258', '', '0', '2023-07-14 11:36:31', '2023-07-14 11:36:31', 0, 0),
(67, '', '', '', '', '', '', '1471471471', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW858147', '', '0', '2023-07-14 11:37:47', '2023-07-14 11:37:47', 0, 0),
(68, 'test', 'kojj', '', '', '', '', '2583692583', '', 'Female', '2023-07-19', '', 70000, '', 0, '', '0', 3, 3, 2, 3, 2, '', '0', 0, 'CW130258', '', '0', '2023-07-14 11:44:47', '2023-07-15 05:58:49', 0, 0),
(69, '', '', '', '', '', '', '5858569856', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW971585', '', '0', '2023-07-14 11:49:16', '2023-07-31 15:54:43', 0, 1),
(70, '', '', '', '', '', '', '3216549871', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW561321', '', '0', '2023-07-14 11:52:42', '2023-07-14 11:52:42', 0, 0),
(71, 'anisha', 'shaha', '', '', '', '', '2582580250', '', 'male', '2023-08-25', '', 400078, '', 0, '', '0', 3, 4, 2, 3, 0, '', '0', 0, 'CW689258', '', '0', '2023-07-14 11:53:25', '2023-07-14 11:56:59', 0, 0),
(72, 'test', 'test', 'test@gmail.com', '', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', '', 'male', '2023-07-14', '', 400043, '', 0, '', '0', 5, 6, 5, 6, 6, '', '', 0, 'cw961', '', '0', '2023-07-14 11:55:04', '2023-07-14 11:55:04', 0, 0),
(73, '', '', '', '', '', '', '6547896547', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW442654', '', '0', '2023-07-14 11:57:05', '2023-07-14 11:57:05', 0, 0),
(74, '', '', '', '', '', '', '9720267264', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW299972', '', '0', '2023-07-14 12:06:36', '2023-07-14 12:06:36', 0, 0),
(75, '', '', '', '', '', '', '3697412525', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW706369', '', '0', '2023-07-14 12:29:50', '2023-07-14 12:29:50', 0, 0),
(76, '', '', '', '', '', '', '1258258089', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW304125', '', '0', '2023-07-14 12:31:22', '2023-07-31 15:55:13', 0, 1),
(77, '', '', '', '', '', '', '1258536985', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW283125', '', '0', '2023-07-14 12:32:47', '2023-07-31 15:55:06', 0, 1),
(78, '', '', '', '', '', '', '8526369852', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW495852', '', '0', '2023-07-14 12:33:12', '2023-07-14 12:33:12', 0, 0),
(79, '', '', '', '', '', '', '6986524632', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW111698', '', '0', '2023-07-14 12:34:32', '2023-07-31 15:54:57', 0, 1),
(80, '', '', '', '', '', '', '1472582582', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW997147', '', '0', '2023-07-14 12:56:34', '2023-07-31 15:54:50', 0, 1),
(81, '', '', '', '', '', '', '1253698567', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW339125', '', '0', '2023-07-14 13:20:55', '2023-07-31 15:54:35', 0, 1),
(82, 'sdghjnn', 'vhn', '', '', '', '', '1236985542', '', 'Female', '2023-07-19', '', 400896, '', 0, '', '0', 5, 2, 3, 2, 3, '', '0', 0, 'CW901123', '', '0', '2023-07-14 13:32:55', '2023-07-15 05:30:17', 0, 0),
(83, 'namrata', 'kolekar', '', '', '', '', '2583692586', '', 'Female', '2023-07-21', '', 400078, '', 0, '', '0', 1, 1, 1, 1, 1, '', '0', 0, 'CW464258', '', '0', '2023-07-15 05:30:28', '2023-07-15 05:32:36', 0, 0),
(84, 'nam', 'test', '', '', '', '', '6541239876', '', 'Female', '2023-07-29', '', 400078, '', 0, '', '0', 1, 1, 1, 1, 1, '', '0', 0, 'CW395654', '', '0', '2023-07-15 05:32:43', '2023-07-15 05:34:02', 0, 0),
(85, 'suyog', 'bekoshe', '', '', '', '', '6325987456', '', 'male', '2023-07-20', '', 4000899, '', 0, '', '0', 1, 1, 1, 1, 1, '', '0', 0, 'CW169632', '', '0', '2023-07-15 05:34:09', '2023-07-15 06:13:07', 0, 0),
(86, '', '', '', '', '', '', '3571593692', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW758357', '', '0', '2023-07-15 05:45:16', '2023-07-31 15:54:14', 0, 1),
(87, '', '', '', '', '', '', '6842684268', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW528684', '', '0', '2023-07-15 05:48:00', '2023-07-31 15:54:24', 0, 1),
(88, '', '', '', '', '', '', '9892610807', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW636989', '', '0', '2023-07-15 05:52:48', '2023-07-31 15:53:24', 0, 1),
(89, 'Anisha', 'Shah', '', '', '', '', '8639326767', '', 'male', '2023-07-31', '', 421201, '', 0, '', '0', 1, 1, 1, 1, 1, '', '1', 0, 'CW578863', '', '0', '2023-07-15 05:59:32', '2023-07-15 06:12:30', 0, 0),
(91, '', '', '', '', '', '', '9925836925', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW519992', '', '0', '2023-07-17 07:41:48', '2023-07-19 13:21:58', 0, 1),
(92, 'ashwini', 'beloshe', '', '', '', '', '2582583695', '', 'female', '2023-07-13', '', 400078, '', 0, '', '0', 4, 5, 2, 2, 4, '', '0', 0, 'CW719258', '', '0', '2023-07-17 07:42:30', '2023-07-17 10:34:05', 0, 0),
(93, 'sa', 'as', 'asdf@gmail.vh', '', 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', '', '', 'female', '1233-03-04', '', 34343, '', 0, '', '0', 5, 7, 5, 7, 1, '', '', 0, 'cw133', '', '0', '2023-07-17 11:59:33', '2023-07-19 13:21:48', 0, 1),
(94, '', '', '', '', '', '', '9004977621', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW644900', '', '0', '2023-07-18 05:33:21', '2023-07-19 10:51:34', 0, 1),
(95, 'Raj', 'Maurya', '', '', '', '', '', '', 'male', '1996-04-29', '', 400080, '', 0, '', '0', 7, 5, 3, 1, 5, '', '0', 0, 'CW916RAJ', '', '0', '2023-07-18 09:56:41', '2023-07-18 10:08:40', 0, 0),
(99, 'Raj', '', '', '', '', '', '', '', '', '1970-01-01', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 0, 'CW840RAJ', '', '0', '2023-07-18 11:07:29', '2023-07-28 17:33:33', 0, 0),
(100, '', '', 'swatikarande.androapps@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW710SWA', '', '0', '2023-07-18 11:44:20', '2023-07-19 13:20:48', 0, 1),
(101, '', '', '', '', '', '', '8286695657', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW853828', '', '0', '2023-07-18 12:04:16', '2023-07-19 13:20:40', 0, 1),
(102, '', '', '', '', '', '', '9004977621', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW545900', '', '0', '2023-07-19 10:52:26', '2023-07-19 13:20:33', 0, 1),
(103, '', '', '', '', '', '', '1593574268', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW442159', '', '0', '2023-07-19 10:54:31', '2023-07-19 13:20:58', 0, 1),
(104, '', '', '', '', '', '', '4569871230', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW625456', '', '0', '2023-07-19 10:56:12', '2023-07-19 13:21:25', 0, 1),
(105, '', '', 'skarande472@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW305SKA', '', '0', '2023-07-19 10:58:20', '2023-07-19 13:20:26', 0, 1),
(106, '', '', '', '', '', '', '1593574268', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW154159', '', '0', '2023-07-19 10:58:31', '2023-07-19 13:21:30', 0, 1),
(107, '', '', '', '', '', '', '9876543210', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW827987', '', '0', '2023-07-19 11:02:31', '2023-07-19 13:21:17', 0, 1),
(108, '', '', '', '', '', '', '7412589638', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW715741', '', '0', '2023-07-19 11:05:00', '2023-07-19 13:21:12', 0, 1),
(109, 'raj', 'maurya', '', '', '', '', '1593574268', '', 'male', '0000-00-00', '', 400080, '', 0, '', '0', 3, 4, 1, 4, 2, '', '0', 0, 'CW218159', '', '0', '2023-07-19 11:25:50', '2023-07-19 11:45:58', 0, 0),
(110, '', '', '', '', '', '', '1593574269', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '0', 1, 'CW761159', '', '0', '2023-07-19 11:46:13', '2023-07-19 13:21:39', 0, 1),
(111, 'Raj', 'Maurya', '', '', '', '', '1593574269', '', 'male', '0000-00-00', '', 4800080, '', 0, '', '0', 4, 5, 3, 2, 4, '', '0', 0, 'CW621159', '', '0', '2023-07-19 11:51:31', '2023-07-19 13:23:22', 0, 0),
(112, 'daff', 'fag', 'anisha.androapps@gmail.com', '', '', '', '', '', 'female', '0000-00-00', '', 258036, '', 0, '', '0', 6, 7, 4, 6, 4, '', '0', 0, 'CW971ANI', '', '0', '2023-07-19 12:09:30', '2023-07-19 13:19:52', 0, 1),
(113, 'fag', 'gsh', '', '', '', '', '0852369741', '', 'female', '0000-00-00', '', 816834, '', 0, '', '0', 3, 7, 4, 5, 2, '', '0', 0, 'CW259085', '', '0', '2023-07-19 12:19:42', '2023-07-19 13:19:18', 0, 1),
(114, 'Anisha1', 'Shah', '', '', '', '', '1472583690', '', 'female', '0000-00-00', '', 558086, '', 0, '', '0', 4, 2, 2, 5, 1, '', '0', 0, 'CW440147', '', '0', '2023-07-19 12:26:28', '2023-07-19 13:18:47', 0, 1),
(115, 'faizan', 'mirza', 'mirzafaizan1931@gmail.com', '0', '', '', '', '', 'male', '2023-05-07', '', 400043, '', 0, '', '0', 7, 7, 5, 6, 6, '', '0', 0, 'CW684MIR', '', '0', '2023-07-19 12:57:09', '2023-07-20 11:19:16', 0, 0),
(116, 'ghj', 'vvhi', '', '', '', '', '7039604021', '', 'male', '0000-00-00', '', 258058, '', 0, '', '0', 3, 3, 2, 2, 3, '', '0', 0, 'CW648703', '', '0', '2023-07-19 13:23:38', '2023-07-31 15:52:54', 0, 1),
(117, '', '', 'anisha.androapps@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW805ANI', '', '0', '2023-07-19 14:22:18', '2023-07-31 15:51:49', 0, 1),
(118, 'shreya', 'lawate', '', '', '', '', '9004977621', '', 'female', '0000-00-00', '', 258036, '', 0, '', 'e7-2mYKlQnqFfnpHAKRTgE:APA91bEo2fpcycanQxjb5Nv01rz6ZYMAGjLPBoB02kTG4fOBlazFJ7dlIZR-v6hNU1L7qaTE3DgUnlarGWaqFLVfriFrf2ILmMsoLXeXXYAkLbNeslryDmM33ABdgc9-sV09i44-hzMz', 1, 4, 4, 4, 5, '', '0', 0, 'CW804900', '', '0', '2023-07-19 14:27:14', '2023-08-09 15:16:26', 0, 0),
(119, '', '', 'shubhangibhorkade.androapps@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW391SHU', '', '0', '2023-07-19 14:34:48', '2023-07-31 15:53:04', 0, 1),
(120, 'test', 'test', '', '', '', '', '9076113655', '', 'male', '2012-05-07', '', 400043, '', 0, '', '0', 1, 1, 1, 1, 1, '', '0', 0, 'CW827907', '', '0', '2023-07-19 14:39:33', '2023-07-20 11:07:42', 0, 1),
(121, '', '', '', '', '', '', '9076113655', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW666907', '', '0', '2023-07-19 14:44:21', '2023-07-31 15:52:44', 0, 1),
(122, 'jayu', 'kadam', '', '0', '', '', '9004977696', '', 'female', '0000-00-00', '', 258036, '', 0, '', '0', 2, 4, 4, 2, 4, '', '0', 0, 'CW213900', '', '0', '2023-07-20 11:08:07', '2023-07-20 11:29:03', 0, 1),
(123, 'faizan testsetset', 'faizan', 'test@gmail.com', '0', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '730409323', '23232323232', 'male', '2023-12-10', '', 0, '', 0, '', '0', 2, 2, 2, 2, 2, '', '', 0, 'FAI223730', '', '0', '2023-07-20 11:26:05', '2023-07-20 11:27:59', 0, 0),
(124, 'jayu', 'kamble', '', '0', '', '', '9004977696', '', 'female', '0000-00-00', '', 258063, '', 0, '', '0', 5, 6, 3, 3, 4, '', '1', 0, 'CW293900', '', '0', '2023-07-20 11:29:13', '2023-07-20 11:31:20', 0, 0),
(125, 'faizan testsetset', 'faizan', 'test@gmail.com', '0', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '730409321', '23232323232', 'male', '0000-00-00', '', 0, '', 0, '', '0', 2, 2, 2, 2, 2, '', '', 0, 'FAI797730', '', '0', '2023-07-20 11:42:00', '2023-07-20 11:42:00', 0, 0),
(126, 'Raj', 'Maurya', '', '0', '', '', '8286695657', '', 'male', '0000-00-00', '', 400080, '', 0, '', '0', 7, 5, 3, 1, 5, '', '0', 0, 'CW273828', '', '0', '2023-07-20 12:12:43', '2023-07-20 13:28:22', 0, 0),
(127, '', '', '', '', '', '', '8286695657', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW573828', '', '0', '2023-07-20 12:55:19', '2023-07-31 15:53:12', 0, 1),
(128, 'asdf', 'addf', '', '0', '', '', '9638527410', '', 'female', '0000-00-00', '', 2580369, '', 0, '', '0', 4, 1, 1, 6, 4, '', '0', 0, 'CW993963', '', '0', '2023-07-20 13:12:16', '2023-07-20 18:10:15', 0, 0),
(129, 'swati', 'lawate', '', '0', '', '', '9004977721', '', 'female', '0000-00-00', '', 258036, '', 0, '', '0', 2, 3, 3, 4, 5, '', '0', 0, 'CW949900', '', '0', '2023-07-20 15:10:15', '2023-07-25 16:44:00', 0, 0),
(130, 'andro', 'team', 'support@androappstech.com', '', '', '', '', '', 'male', '2023-07-04', '', 132568, '', 0, '', '0', 7, 7, 5, 6, 6, '', '1', 0, 'CW164SUP', '', '0', '2023-07-20 18:10:24', '2023-07-31 15:51:39', 0, 1),
(131, 'Abhishek', 'Tiwari', 'abhi@gmail.com', '', '', '', '8237061291', '', 'male', '2000-11-28', '', 400614, '', 0, '', 'e7-2mYKlQnqFfnpHAKRTgE:APA91bEo2fpcycanQxjb5Nv01rz6ZYMAGjLPBoB02kTG4fOBlazFJ7dlIZR-v6hNU1L7qaTE3DgUnlarGWaqFLVfriFrf2ILmMsoLXeXXYAkLbNeslryDmM33ABdgc9-sV09i44-hzMz', 6, 6, 4, 3, 1, '', '0', 0, 'CW196823', '', '0', '2023-07-21 11:01:18', '2023-08-11 12:46:24', 0, 0),
(132, '', '', '', '', '', '', '8468596484', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW195846', '', '0', '2023-07-21 11:49:40', '2023-07-31 15:51:23', 0, 1),
(133, '', '', '', '', '', '', '6482795688', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW939648', '', '0', '2023-07-21 11:50:05', '2023-07-21 12:14:41', 0, 1),
(134, '', '', '', '', '', '', '8237061288', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW149823', '', '0', '2023-07-21 11:59:30', '2023-07-21 12:14:36', 0, 1),
(135, 'PIYUSH', 'SHINDE', '', '', '', '', '9004977622', '', 'female', '1999-01-01', '', 428898, '', 0, '', '0', 3, 6, 2, 5, 5, '', '0', 0, 'CW470900', '', '0', '2023-07-21 15:06:08', '2023-07-25 17:08:18', 1, 0),
(136, 'Abhishek', 'tiwari ', 'abhishektiwari.androapps@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '9822756181', '', 'male', '2000-11-28', '', 440010, '', 0, '', '0', 3, 3, 4, 2, 4, '', '0', 0, 'cw308', '', '0', '2023-07-24 10:01:13', '2023-08-09 15:26:29', 0, 0),
(137, 'Malti', 'sharma', '', '', '', '', '9004966666', '', 'female', '2000-07-24', '', 555555, '', 0, '', '0', 7, 6, 5, 6, 6, '', '0', 0, 'CW542900', '', '0', '2023-07-24 16:52:20', '2023-07-25 17:36:37', 1, 0),
(138, '', '', '', '', '', '', '2333333333', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW315233', '', '0', '2023-07-25 12:49:14', '2023-07-31 15:51:11', 0, 1),
(139, 'gemy', 'gong', 'gemy@gmail.com', '', '', '', '2222222222', '', 'female', '2000-07-04', '', 693555, '', 0, '', 'fUtqvoc6QCGVbwA5rdBbs9:APA91bFx8q2yAGwvcyOxXsgA2wGln93YPtyRZyiro_6gsq35htbpY7sdWGHEvdI-H2AQVxxDVhqC8kg0v7RXc2qpIz61R5rodE5Sf8iDc-InmYbnJgGkXJ0-HvoDUYWZXeiYify9yLcN', 7, 7, 4, 5, 3, '', '0', 0, 'CW545222', '', '0', '2023-07-25 12:49:54', '2023-08-17 17:48:09', 0, 0),
(140, 'Veer', 'Pawar', 'veer@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '3333333333', '', 'male', '2023-05-25', '', 2344457, '', 0, '', '0', 6, 2, 1, 1, 5, '', '', 0, 'cw843', '', '0', '2023-07-25 15:16:07', '2023-07-25 16:22:41', 0, 1),
(141, '', '', '', '', '', '', '9632581470', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW207963', '', '0', '2023-07-25 16:59:18', '2023-07-26 15:27:42', 0, 1),
(142, '', '', '', '', '', '', '2222222223', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW224222', '', '0', '2023-07-25 16:59:49', '2023-07-26 15:27:23', 0, 1),
(143, 'Ninad', 'pawar', 'ninadpawar.androapps@gmail.com', '', '789', '68053af2923e00204c3ca7c6a3150cf7', '9892610807', '', 'male', '2023-07-24', '', 410206, '', 0, '', '0', 1, 6, 1, 1, 4, '', '', 0, 'cw342', '', '0', '2023-07-26 10:16:08', '2023-07-26 10:16:08', 0, 0),
(144, '', '', 'swatikarande.androapps@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW184SWA', '', '0', '2023-07-29 10:42:01', '2023-07-31 15:50:19', 0, 1),
(145, 'Raj', 'Maurya', 'rajmaurya.androapps@gmail.com', '', '', '', '', '', 'male', '1996-04-29', '', 400080, '', 0, '', 'dbwDzkY2TLqsF82kAcWvkC:APA91bH68mKKjSncBG8obSQEK88dmva9PX9IT4cWixq9Q9FdH9St2IPXFGlOtbxXSGrECvNE_WGJRgQa8ojkyQycHInXj8BlVmenja-oqInGN-iPl2BxrclC4p5z-YbMM1udo7TNqPmT', 1, 3, 3, 2, 2, '', '0', 0, 'CW516RAJ', '', '490', '2023-07-29 20:11:43', '2023-08-17 17:48:28', 0, 0),
(146, 'omi', 'omi', 'omi@gmail.com', '', '', '', '3333333333', '', 'female', '2010-07-31', '', 400079, '', 0, '', 'e7-2mYKlQnqFfnpHAKRTgE:APA91bE62keDzB7yqY9vk27wTM4kknLnxZrNo4yMcmvzQZZTp2vjb8wDADueQTafvKOlFdmATafa6bOIsv_zMbKCTgC3GnZZwu-hp6pVze6KD1ThorNZ5tYkcyAqjwFeMGH-BZOkYixA', 1, 1, 1, 1, 6, '', '0', 0, 'CW268333', '', '0', '2023-07-31 11:19:40', '2023-08-08 15:37:21', 0, 0),
(147, 'aa', 'aa', 'aa@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '7777777777', '', 'male', '2023-07-31', '', 400089, '', 0, '', '0', 7, 7, 5, 2, 5, '', '', 0, 'cw504', '', '0', '2023-07-31 11:59:57', '2023-07-31 15:50:31', 0, 1),
(148, 'Arjun ', 'Batra ', 'Abhidhohr@iuhrf.gmail.com', '', 'abhishek', 'f589a6959f3e04037eb2b3eb0ff726ac', '8237061991', '', 'male', '2000-08-26', '', 44010, '', 0, '', '0', 3, 2, 4, 2, 4, '', '', 0, 'cw551', '', '0', '2023-07-31 12:14:42', '2023-07-31 12:14:42', 0, 0),
(149, '', '', 'aryangupta27q8@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW237ARY', '', '0', '2023-07-31 12:23:05', '2023-07-31 15:51:03', 0, 1),
(150, 'Arun', 'M', '', '', '', '', '8779799941', '', 'male', '1995-01-13', '', 421201, '', 0, '', '0', 2, 2, 2, 2, 2, '', '0', 0, 'CW956877', '', '0', '2023-07-31 16:14:46', '2023-07-31 16:21:42', 0, 0),
(151, 'Anisha', 'Shah', '', '', '', '', '9702267264', '', 'female', '1994-07-31', '', 400607, '', 0, '', 'ccjKyoSRQ_2u4jB7hzLXTG:APA91bF1V3OuqcaL_0SwIxp90P8SCDVPGzz-d7N-gWIMnBlXoKbrLoLesFpvNAldj8FZf_hAHX5ElNcGHF8px2uUWj_ENqjnKj20E16U9oYrmdJEQptCkEqem7ENy1nKIvsKW1Acg0U-', 3, 3, 3, 3, 3, '', '0', 0, 'CW279970', '', '0', '2023-07-31 16:23:22', '2023-08-17 17:30:03', 0, 0),
(152, '', '', '', '', '', '', '2222222226', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW298222', '', '0', '2023-08-01 12:07:52', '2023-08-01 12:29:21', 0, 1),
(153, 'pk', 'pk', 'skarande472@gmail.com', '', '', '', '', '', 'male', '2023-08-01', '', 25803, '', 0, '', '0', 4, 5, 4, 3, 6, '', '0', 0, 'CW122SKA', '', '0', '2023-08-01 12:22:16', '2023-08-01 12:50:32', 0, 1),
(154, 'Savi', 'Patil', '', '', '', '', '9076113655', '', 'female', '2000-01-01', '', 400089, '', 0, '', '0', 1, 1, 5, 6, 6, '', '0', 0, 'CW834907', '', '0', '2023-08-01 12:32:30', '2023-08-02 14:59:04', 0, 1),
(155, 'kkk', 'kkk', '', '', '', '', '1111111111', '', 'female', '1997-08-01', '', 369800, '', 0, '', '0', 5, 5, 4, 3, 6, '', '0', 0, 'CW655111', '', '0', '2023-08-01 12:50:40', '2023-08-08 12:21:37', 0, 1),
(156, 'asdfhjj', 'affagsdhh', '', '', '', '', '7575757575', '', 'female', '1988-08-01', '', 400089, '', 0, '', '0', 6, 5, 1, 1, 6, '', '1', 0, 'CW415757', '', '0', '2023-08-01 12:52:40', '2023-08-08 12:21:44', 0, 1),
(157, 'Arun', 'M', 'arun.androapps@gmail.com', '', '', '', '', '', 'male', '2023-08-02', '', 400612, '', 0, '', '0', 2, 2, 2, 2, 2, '', '0', 0, 'CW740ARU', '', '0', '2023-08-02 11:19:10', '2023-08-07 15:36:50', 0, 0),
(158, '', '', '', '', '', '', '1470852639', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW892147', '', '0', '2023-08-02 13:39:59', '2023-08-02 14:58:55', 0, 1),
(159, '', '', '', '', '', '', '1408526396', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW428140', '', '0', '2023-08-02 13:41:21', '2023-08-02 14:58:49', 0, 1),
(160, 'ashish', 'sharda', '', '', '', '', '8454947431', '', 'male', '2003-08-07', '', 410210, '', 0, '', '0', 4, 3, 1, 5, 5, '', '1', 0, 'CW589845', '', '0', '2023-08-02 15:14:22', '2023-08-02 15:16:04', 0, 0),
(161, '', '', '', '', '', '', '1239874560', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW502123', '', '0', '2023-08-02 15:27:59', '2023-08-08 12:17:35', 0, 1),
(162, '', '', '', '', '', '', '1590784562', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW757159', '', '0', '2023-08-02 15:34:45', '2023-08-08 12:17:43', 0, 1),
(163, '', '', '', '', '', '', '5556856384', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW934555', '', '0', '2023-08-02 15:36:52', '2023-08-08 12:17:51', 0, 1),
(164, '', '', '', '', '', '', '6566858898', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW986656', '', '0', '2023-08-02 15:37:32', '2023-08-08 12:17:57', 0, 1),
(165, '', '', '', '', '', '', '8686868585', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW570868', '', '0', '2023-08-02 15:56:24', '2023-08-08 12:18:03', 0, 1),
(166, '', '', '', '', '', '', '8565656565', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW542856', '', '0', '2023-08-02 16:02:12', '2023-08-08 12:18:17', 0, 1),
(167, '', '', '', '', '', '', '9886886868', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW374988', '', '0', '2023-08-02 16:03:03', '2023-08-08 12:18:25', 0, 1),
(168, '', '', '', '', '', '', '3568986866', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW363356', '', '0', '2023-08-02 16:06:58', '2023-08-08 12:19:12', 0, 1),
(169, '', '', '', '', '', '', '8865655656', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW965886', '', '0', '2023-08-02 16:09:53', '2023-08-08 12:19:02', 0, 1),
(170, '', '', '', '', '', '', '8686868335', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW393868', '', '0', '2023-08-02 16:10:34', '2023-08-08 12:17:17', 0, 1),
(171, '', '', '', '', '', '', '3757577582', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW200375', '', '0', '2023-08-02 16:13:50', '2023-08-08 12:17:10', 0, 1),
(172, '', '', '', '', '', '', '3886868686', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW990388', '', '0', '2023-08-02 16:14:46', '2023-08-08 12:17:00', 0, 1),
(173, '', '', '', '', '', '', '8686655565', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW357868', '', '0', '2023-08-02 16:15:43', '2023-08-08 12:16:55', 0, 1),
(174, '', '', '', '', '', '', '6565565568', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW456656', '', '0', '2023-08-02 16:18:44', '2023-08-08 12:16:49', 0, 1),
(175, '', '', '', '', '', '', '5565655356', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW265556', '', '0', '2023-08-02 16:19:48', '2023-08-08 12:16:42', 0, 1),
(176, '', '', '', '', '', '', '9076113644', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW227907', '', '0', '2023-08-02 18:15:52', '2023-08-08 12:22:20', 0, 1),
(177, '', '', 'lamarcarlson.64045@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW790LAM', '', '0', '2023-08-05 11:18:24', '2023-08-08 12:16:34', 0, 1),
(178, '', '', 'shizukohoover.43849@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW230SHI', '', '0', '2023-08-05 13:44:13', '2023-08-08 12:16:30', 0, 1),
(179, '', '', 'stephaniesims.90215@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW311STE', '', '0', '2023-08-07 13:53:20', '2023-08-08 12:16:21', 0, 1),
(180, 'Veer', 'Lawate', 'veer@gmail.com', '', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '0000000000', '', 'female', '2023-08-07', '', 243434, '', 0, '', '0', 6, 1, 1, 1, 3, '', '', 0, 'cw347', '', '0', '2023-08-07 14:41:52', '2023-08-08 12:16:16', 0, 1),
(181, '', '', '', '', '', '', '8976688672', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW883897', '', '0', '2023-08-07 15:37:01', '2023-08-08 12:16:11', 0, 1),
(182, '', '', 'haekyle.94821@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '0', 0, 0, 0, 0, 0, '', '1', 1, 'CW633HAE', '', '0', '2023-08-07 18:10:29', '2023-08-08 12:16:06', 0, 1),
(183, '', '', 'shaneriley.76509@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW301SHA', '', '0', '2023-08-08 11:01:09', '2023-08-08 12:16:01', 0, 1),
(184, '', '', '', '', '', '', '7878787878', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW756787', '', '0', '2023-08-08 11:44:21', '2023-08-08 12:15:56', 0, 1),
(185, '', '', 'swatikarande.androapps@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW793SWA', '', '0', '2023-08-08 12:13:00', '2023-08-08 12:15:49', 0, 1),
(186, '', '', 'ramonacastillo.83633@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW341RAM', '', '0', '2023-08-08 12:30:40', '2023-08-11 16:12:50', 0, 1),
(187, '', '', 'joncastro.61284@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW670JON', '', '0', '2023-08-08 14:26:18', '2023-08-11 16:12:58', 0, 1),
(188, '', '', '', '', '', '', '8888888888', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW937888', '', '0', '2023-08-08 15:01:17', '2023-08-11 16:13:07', 0, 1),
(189, '', '', '', '', '', '', '6363936363', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW749636', '', '0', '2023-08-08 15:37:36', '2023-08-11 16:13:14', 0, 1),
(190, 'uiu', 'lk', 'swatikarande.androapps@gmail.com', '', '', '', '', '', 'female', '2023-08-08', '', 369852, '', 0, '', 'e7-2mYKlQnqFfnpHAKRTgE:APA91bE62keDzB7yqY9vk27wTM4kknLnxZrNo4yMcmvzQZZTp2vjb8wDADueQTafvKOlFdmATafa6bOIsv_zMbKCTgC3GnZZwu-hp6pVze6KD1ThorNZ5tYkcyAqjwFeMGH-BZOkYixA', 3, 6, 2, 2, 6, '', '0', 0, 'CW529SWA', '', '0', '2023-08-08 17:07:44', '2023-08-08 18:26:17', 0, 1),
(191, '', '', 'marionwilkins.96522@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW440MAR', '', '0', '2023-08-08 19:40:03', '2023-08-11 16:13:24', 0, 1),
(192, '', '', '', '', '', '', '2222522222', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW952222', '', '0', '2023-08-09 11:06:39', '2023-08-11 16:13:32', 0, 1),
(193, '', '', '', '', '', '', '9004977451', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW282900', '', '0', '2023-08-09 14:42:57', '2023-08-11 16:13:57', 0, 1),
(194, 'Ash', 'ketchum', 'ash@gmail.com', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', '1234567890', '', 'male', '2023-08-01', '', 0, '', 0, '', '', 7, 7, 5, 7, 6, '', '', 0, 'cw614', '', '0', '2023-08-09 18:21:31', '2023-08-10 10:04:15', 0, 0),
(195, 'Ashish', 'Sharda', '', '', '', '', '9967521511', '', 'male', '1970-01-01', '', 410210, '', 0, '', 'cch_QGyUT1Gz52GL1Z9mDU:APA91bFYfbf6Gy7a4KX3A_5z2XoApZLMBhgtTNRIaAoxDdDQmJJ9O3xwqY9PWgMwdvK8KwT7tX6lpDYAXnGHlh4JaLCjMAV1a5PLGJJPU76TB7jJty6grJMQEPSPclXLgEc9vN97hhoy', 6, 1, 4, 4, 6, '', '1', 0, 'CW890996', '', '0', '2023-08-09 18:25:14', '2023-08-09 18:26:37', 0, 0),
(196, '', '', '', '', '', '', '8080804073', '', '', '0000-00-00', '', 0, '', 0, '', '', 0, 0, 0, 0, 0, '', '1', 1, 'CW344808', '', '0', '2023-08-10 19:54:53', '2023-08-11 16:14:04', 0, 1),
(197, 'www', 'www', 'ww@gmail.com', '', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '9000000000', '', 'female', '2023-02-22', '', 400079, '', 0, '', '', 7, 5, 4, 6, 6, '', '', 0, 'cw523', '', '0', '2023-08-11 16:11:58', '2023-08-11 16:12:36', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_withdrawal_log`
--

CREATE TABLE `tbl_withdrawal_log` (
  `id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `coin` float NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 = Pending, 1 = Approved, 2 = Rejected',
  `message` varchar(300) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isDeleted` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_withdrawal_log`
--

INSERT INTO `tbl_withdrawal_log` (`id`, `user_id`, `coin`, `status`, `message`, `created_date`, `updated_date`, `isDeleted`) VALUES
(1, '145', 500, 1, 'On Point', '2023-08-17 12:18:28', '2023-08-17 12:18:28', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area_interest`
--
ALTER TABLE `tbl_area_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bot_ques`
--
ALTER TABLE `tbl_bot_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chapter`
--
ALTER TABLE `tbl_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat_history`
--
ALTER TABLE `tbl_chat_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat_room`
--
ALTER TABLE `tbl_chat_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coursevideo`
--
ALTER TABLE `tbl_coursevideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_purchase`
--
ALTER TABLE `tbl_course_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_share`
--
ALTER TABLE `tbl_course_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course_type`
--
ALTER TABLE `tbl_course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_heard_about_us`
--
ALTER TABLE `tbl_heard_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hobby`
--
ALTER TABLE `tbl_hobby`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notepad`
--
ALTER TABLE `tbl_notepad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_occupation`
--
ALTER TABLE `tbl_occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_refer`
--
ALTER TABLE `tbl_refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_refer_history`
--
ALTER TABLE `tbl_refer_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_quiz`
--
ALTER TABLE `tbl_student_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_quiz_report`
--
ALTER TABLE `tbl_student_quiz_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_chapter`
--
ALTER TABLE `tbl_survey_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_quiz`
--
ALTER TABLE `tbl_survey_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_share`
--
ALTER TABLE `tbl_survey_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_student_quiz`
--
ALTER TABLE `tbl_survey_student_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_student_quiz_report`
--
ALTER TABLE `tbl_survey_student_quiz_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_type`
--
ALTER TABLE `tbl_survey_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_survey_video`
--
ALTER TABLE `tbl_survey_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_withdrawal_log`
--
ALTER TABLE `tbl_withdrawal_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_area_interest`
--
ALTER TABLE `tbl_area_interest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_bot_ques`
--
ALTER TABLE `tbl_bot_ques`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_chapter`
--
ALTER TABLE `tbl_chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_chat_history`
--
ALTER TABLE `tbl_chat_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_chat_room`
--
ALTER TABLE `tbl_chat_room`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_coursevideo`
--
ALTER TABLE `tbl_coursevideo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_course_purchase`
--
ALTER TABLE `tbl_course_purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_course_share`
--
ALTER TABLE `tbl_course_share`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tbl_course_type`
--
ALTER TABLE `tbl_course_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_donation`
--
ALTER TABLE `tbl_donation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_heard_about_us`
--
ALTER TABLE `tbl_heard_about_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_hobby`
--
ALTER TABLE `tbl_hobby`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_notepad`
--
ALTER TABLE `tbl_notepad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_occupation`
--
ALTER TABLE `tbl_occupation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_order_product`
--
ALTER TABLE `tbl_order_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `tbl_refer`
--
ALTER TABLE `tbl_refer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_refer_history`
--
ALTER TABLE `tbl_refer_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_student_quiz`
--
ALTER TABLE `tbl_student_quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tbl_student_quiz_report`
--
ALTER TABLE `tbl_student_quiz_report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_chapter`
--
ALTER TABLE `tbl_survey_chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_quiz`
--
ALTER TABLE `tbl_survey_quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_share`
--
ALTER TABLE `tbl_survey_share`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_student_quiz`
--
ALTER TABLE `tbl_survey_student_quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_student_quiz_report`
--
ALTER TABLE `tbl_survey_student_quiz_report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_type`
--
ALTER TABLE `tbl_survey_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_survey_video`
--
ALTER TABLE `tbl_survey_video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `tbl_withdrawal_log`
--
ALTER TABLE `tbl_withdrawal_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
