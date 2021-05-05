-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 03:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_mode`
--

CREATE TABLE `admin_mode` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_number` varchar(255) NOT NULL,
  `admin_picture` varchar(255) NOT NULL,
  `admin_login_id` varchar(10) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_last_login` varchar(255) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_status` int(11) NOT NULL,
  `admin_added_on` datetime NOT NULL,
  `admin_retirement_date` varchar(50) NOT NULL,
  `admin_reset_password_code` int(11) NOT NULL,
  `new_login_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_mode`
--

INSERT INTO `admin_mode` (`id`, `fullname`, `admin_email`, `admin_number`, `admin_picture`, `admin_login_id`, `admin_password`, `admin_address`, `admin_last_login`, `admin_dob`, `admin_status`, `admin_added_on`, `admin_retirement_date`, `admin_reset_password_code`, `new_login_admin`) VALUES
(1, 'Shadab MASTAN KHAN', 'ks615044@gmail.com', '9165452854', 'admin_profile.jpg', 'AD_121', '$2y$10$XzWjxL.SPfB0SyHN2ch6/OQEaxjW/XgAlHeeUGNgzh4iZ5Tu5BhE6', 'Sayedd manzil, abc 104, kajhh, kasss , Mumbra - 40061', '02-05-2021 10:40:45 am', '2021-05-04', 1, '2021-05-04 13:41:00', '', 1516003, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `status`) VALUES
(1, 'Computer', 1),
(2, 'Mechanical', 1),
(3, 'Civil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `incoming_id` varchar(50) NOT NULL,
  `outgoing_id` varchar(50) NOT NULL,
  `messages` varchar(500) NOT NULL,
  `message_send_time` varchar(255) NOT NULL,
  `messeage_seen_time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `incoming_id`, `outgoing_id`, `messages`, `message_send_time`, `messeage_seen_time`, `status`) VALUES
(1, '1994', '1993', 'Hey\r\n', '2021-05-05 03:26:15 pm', '2021-05-05 03:28:15 pm', 1),
(2, '1993', '1994', 'Awesome\r\n', '2021-05-05 03:28:15 pm', '', 1),
(3, '1994', '1993', 'How are you?', '2021-05-05 03:26:15 pm', '2021-05-05 03:28:15 pm', 1),
(4, '1995', '1993', 'Fine', '2021-05-05 03:28:15 pm', '2021-05-05 03:28:15 pm', 1),
(5, '1994', '1993', 'asass', '2021-05-05 05:23 pm', ' ', 1),
(6, '1994', '1993', 'shada', '2021-05-05 05:27 pm', '', 1),
(7, '1993', '1994', 'james bond', '2021-05-05 05:43 pm', '', 1),
(8, '1995', '1993', 'hello', '2021-05-05 05:45 pm', '', 1),
(9, '1995', '1993', 'hello', '2021-05-05 05:45 pm', '', 1),
(10, '1995', '1993', 'nice', '2021-05-05 05:46 pm', '', 1),
(11, '1995', '1993', 'nice', '2021-05-05 05:46 pm', '', 1),
(12, '1995', '1993', 'hjot', '2021-05-05 05:46 pm', '', 1),
(13, '1995', '1993', 'hello', '2021-05-05 05:50 pm', '', 1),
(14, '1995', '1993', 'hello', '2021-05-05 05:50 pm', '', 1),
(15, '1995', '1993', 'asa', '2021-05-05 05:50 pm', '', 1),
(16, '1995', '1993', 'asa', '2021-05-05 05:50 pm', '', 1),
(17, '1995', '1993', 'asasaadsdas', '2021-05-05 05:50 pm', '', 1),
(18, '1995', '1993', 'asasaadsdas', '2021-05-05 05:50 pm', '', 1),
(19, '1995', '1993', 'sdadasdsa', '2021-05-05 05:53 pm', '', 1),
(20, '1995', '1993', 'sdsadas', '2021-05-05 06:00 pm', '', 1),
(21, '1994', '1993', 'hello', '2021-05-05 06:03 pm', '', 1),
(22, '1995', '1993', 'hee', '2021-05-05 06:23 pm', '', 1),
(23, '1995', '1993', 'hee', '2021-05-05 06:23 pm', '', 1),
(24, '1994', '1993', 'hell', '2021-05-05 06:24 pm', '', 1),
(25, '1994', '1993', 'hey', '2021-05-05 06:24 pm', '', 1),
(26, '1994', '1993', 'hey', '2021-05-05 06:24 pm', '', 1),
(27, '1994', '1993', 'sasa', '2021-05-05 06:25 pm', '', 1),
(28, '1994', '1993', 'sweet', '2021-05-05 06:25 pm', '', 1),
(29, '1995', '1993', 'data', '2021-05-05 06:27 pm', '', 1),
(30, '1994', '1993', 'fa', '2021-05-05 06:29 pm', '', 1),
(31, '1994', '1993', 'dasdasdsa', '2021-05-05 06:29 pm', '', 1),
(32, '1994', '1993', 'sadasfdfdf', '2021-05-05 06:29 pm', '', 1),
(33, '1995', '1993', 'sdsadas', '2021-05-05 06:29 pm', '', 1),
(34, '1994', '1993', 'asdasdsa', '2021-05-05 06:29 pm', '', 1),
(35, '1994', '1993', 'dsdadsadsa', '2021-05-05 06:29 pm', '', 1),
(36, '1995', '1993', 'sa', '2021-05-05 06:29 pm', '', 1),
(37, '1995', '1993', 'sasasa', '2021-05-05 06:30 pm', '', 1),
(38, '1995', '1993', 'asssalam', '2021-05-05 06:31 pm', '', 1),
(39, '1995', '1993', 'hey allah', '2021-05-05 06:32 pm', '', 1),
(40, '1995', '1993', 'dasdas', '2021-05-05 06:32 pm', '', 1),
(41, '1995', '1993', 'sss', '2021-05-05 06:33 pm', '', 1),
(42, '1994', '1993', 'aaaa', '2021-05-05 06:33 pm', '', 1),
(43, '1994', '1993', 'hfdg', '2021-05-05 06:37 pm', '', 1),
(44, '\'.$incoming_id.\'', '1993', 'hell', '2021-05-05 06:38 pm', '', 1),
(45, '\'.$incoming_id.\'', '1993', 'saasasa', '2021-05-05 06:38 pm', '', 1),
(46, '\'.$incoming_id.\'', '1993', 'asasasasa', '2021-05-05 06:38 pm', '', 1),
(47, '\'.$incoming_id.\'', '1993', 'asasa', '2021-05-05 06:39 pm', '', 1),
(48, '1994', '1993', 'saddas', '2021-05-05 06:45 pm', '', 1),
(49, '1995', '1993', 'juliet', '2021-05-05 06:46 pm', '', 1),
(50, '1993', '1995', 'hello', '2021-05-05 06:48 pm', '', 1),
(51, '1995', '1993', 'how are you', '2021-05-05 06:49 pm', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college_notice`
--

CREATE TABLE `college_notice` (
  `id` int(11) NOT NULL,
  `college_notice_title` varchar(255) NOT NULL,
  `college_notice_short_desc` varchar(500) NOT NULL,
  `college_notice_date` varchar(255) NOT NULL,
  `college_notice_link` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `send_to` varchar(255) NOT NULL,
  `college_notice_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college_notice`
--

INSERT INTO `college_notice` (`id`, `college_notice_title`, `college_notice_short_desc`, `college_notice_date`, `college_notice_link`, `branch_id`, `send_to`, `college_notice_status`) VALUES
(1, 'Result Declare of Civil DSE 2020-2021 SEM III', 'result declare check it now on this link', '2021-04-10 10:10 am', 'http://localhost/shadab/college_project/Student', 3, 'all', 1),
(2, 'Result Declare of Computer DSE 2020-2021 SEM IV', 'result declare check it now on this link', '2021-04-30 10:40 am', '', 1, 'all', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `id` int(11) NOT NULL,
  `faculty_login_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `faculty_alias` varchar(5) NOT NULL,
  `faculty_email` varchar(255) NOT NULL,
  `mb_number` varchar(10) NOT NULL,
  `faculty_image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `desgination` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `leaving_date` date NOT NULL,
  `reset_password_code_faculty` int(20) NOT NULL,
  `new_login_faculty` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `faculty_login_id`, `first_name`, `middle_name`, `last_name`, `faculty_alias`, `faculty_email`, `mb_number`, `faculty_image`, `password`, `dob`, `desgination`, `branch_id`, `salary`, `joining_date`, `leaving_date`, `reset_password_code_faculty`, `new_login_faculty`, `status`) VALUES
(1, 'SK5252', 'Shadab', 'Alam', 'Khan', 'SK', 'KS579265@gmail.com', '9167582452', 'teacher3.png', '$2y$10$nO0t4uMMSehuov2zoQbUcOck146KYGQ8b4MX8A2g6oGf/.K3JJ.OO', '2017-02-07', 'Programmer', 1, 20000, '2021-04-09', '2021-04-23', 6701321, 1, 1),
(2, 'SK5253', 'Mahesh', 'Thakur', '', 'MK', 'mahesh.csmit@gmail.com', '1234567890', 'teacher1.png', '$2y$10$J4OQxGoHqTLkRHwgdrbMDuk8uEVYpHMHYSSoP0Ggkqe5T0s/GboJS', '1991-03-08', 'Structure Exper Analysis', 3, 50000, '2021-04-19', '0000-00-00', 0, 1, 1),
(3, 'SK5254', 'Gajana', 'Patel', 'Usman', 'GP', 'gajana@gmail.com', '5254526352', 'teacher2.png', 'shadabkhan', '1992-04-19', 'Data Scientist', 1, 100000, '2021-04-19', '0000-00-00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `notice_admit_no` int(11) NOT NULL,
  `notice_title` varchar(255) NOT NULL,
  `notice_short_desc` varchar(255) NOT NULL,
  `notice_links` varchar(255) NOT NULL,
  `notice_date` varchar(255) NOT NULL,
  `notice_time` varchar(255) NOT NULL,
  `notice_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `notice_admit_no`, `notice_title`, `notice_short_desc`, `notice_links`, `notice_date`, `notice_time`, `notice_status`) VALUES
(1, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile.', ' ', '2021-04-29', '05:23 pm', 1),
(2, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile.', ' ', '2021-04-29', '06:07 pm', 1),
(3, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile.', ' ', '2021-04-29', '06:11 pm', 1),
(4, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile.', ' ', '2021-04-29', '06:12 pm', 1),
(5, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-04-29', ' ', '2021-04-29', '06:24 pm', 1),
(6, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-04-29', ' ', '2021-04-29', '06:35 pm', 1),
(7, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-04-29', ' ', '2021-04-29', '10:02 pm', 1),
(8, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-05-01', ' ', '2021-05-01', '03:43 pm', 1),
(9, 1994, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-05-03', ' ', '2021-05-03', '10:40 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profle_update_request`
--

CREATE TABLE `profle_update_request` (
  `id` int(11) NOT NULL,
  `admit_no` int(11) NOT NULL,
  `description` text NOT NULL,
  `admin_response` varchar(255) NOT NULL,
  `request_added_on` datetime NOT NULL,
  `request_updated_on` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profle_update_request`
--

INSERT INTO `profle_update_request` (`id`, `admit_no`, `description`, `admin_response`, `request_added_on`, `request_updated_on`, `status`) VALUES
(1, 1993, 'hello sir my lastname is khan and firstname is Shadab Alam. Please Update it fast', '', '2021-04-29 15:31:33', '', 0),
(2, 1993, 'Check my name it is Shadab Khan Not Khan Shadab', '', '2021-04-29 06:07:00', '', 0),
(3, 1993, 'Update My Mail id Change it to skshadabbkhojo@gmail.com', '', '2021-04-29 06:11:00', '', 0),
(4, 1993, 'Update My Mail id Change it to skshadabbkhojo@gmail.com', '', '2021-04-29 06:12:00', '', 0),
(5, 1993, 'f there is any mistake in your profile then only send message. Don\'t Send message without any issue Strickly Warning.', '', '2021-04-29 06:20:00', '', 0),
(6, 1993, 'hello sir my lastname is khan and firstname is Shadab Alam. Please Update it fast', '', '2021-04-29 06:22:00', '', 0),
(7, 1993, 'hello sir my lastname is khan and firstname is Shadab Alam. Please Update it fast', '', '2021-04-29 06:23:00', '', 0),
(8, 1993, 'hello sir my lastname is khan and firstname is Shadab Alam. Please Update it fast', '', '2021-04-29 06:24:00', '', 0),
(9, 1993, 'If there is any mistake in your profile then only send message. Don\'t Send message without any issue Strickly Warning.', '', '2021-04-29 06:35:00', '', 0),
(10, 1993, 'Update My Name and set Shadab khan', '', '2021-04-29 10:02:00', '', 0),
(11, 1993, 'Didn;t Reply what happen to my profile', '', '2021-05-01 03:43:00', '', 0),
(12, 1994, 'Change Date Of Birth  to 29 Apr, 1998', '', '2021-05-03 10:40:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_choices`
--

CREATE TABLE `quiz_choices` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `choices` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_choices`
--

INSERT INTO `quiz_choices` (`id`, `question_id`, `correct_answer`, `choices`) VALUES
(1, 1, 'recursive', 'illegal call'),
(2, 1, 'recursive', 'reverse polish'),
(3, 1, 'recursive', 'recursive'),
(4, 1, 'recursive', 'none of the above\r\n'),
(5, 2, '2k+1 ? 1', '2k ? 1'),
(6, 2, '2k+1 ? 1', '2k+1 ? 1'),
(7, 2, '2k+1 ? 1', '2k-1 ? 1'),
(8, 2, '2k+1 ? 1', '2k+2 ? 1'),
(9, 3, '2', '5'),
(10, 3, '2', '4'),
(11, 3, '2', '3'),
(12, 3, '2', '2'),
(13, 4, 'Binary Search', 'Binary Search'),
(14, 4, 'Binary Search', 'Interpolation Search'),
(15, 4, 'Binary Search', 'Linear Search'),
(16, 4, 'Binary Search', 'All of the above'),
(17, 5, 'a step by step procedure to solve problem.', 'a piece of code to be executed'),
(18, 5, 'a step by step procedure to solve problem.', 'a loosely written code to make final code.'),
(19, 5, 'a step by step procedure to solve problem.', 'a step by step procedure to solve problem.'),
(20, 5, 'a step by step procedure to solve problem.', 'all of the above.'),
(21, 6, 'Selection Sort', 'Selection Sort'),
(22, 6, 'Selection Sort', 'Bubble Sort'),
(23, 6, 'Selection Sort', 'Merge Sort'),
(24, 6, 'Selection Sort', 'Insertion Sort'),
(25, 7, 'two pointers are maintained to store next and previous nodes.', 'a pointer is maintained to store both next and previous nodes.'),
(26, 7, 'two pointers are maintained to store next and previous nodes.', 'two pointers are maintained to store next and previous nodes.'),
(27, 7, 'two pointers are maintained to store next and previous nodes.', 'a pointer to self is maintained for each node.'),
(28, 7, 'two pointers are maintained to store next and previous nodes.', 'none of the above.'),
(29, 8, 'complete binary tree', 'complete binary tree'),
(30, 8, 'complete binary tree', 'spanning tree'),
(31, 8, 'complete binary tree', 'sparse tree'),
(32, 8, 'complete binary tree', 'binary search tree'),
(33, 9, 'we will get the same spanning tree', 'we will get a different spanning tree'),
(34, 9, 'we will get the same spanning tree', 'we will get the same spanning tree'),
(35, 9, 'we will get the same spanning tree', 'spanning will have less edges.'),
(36, 9, 'we will get the same spanning tree', 'spanning will not cover all vertices.'),
(37, 10, 'all other factors like CPU speed are constant and have no effect on implementation', 'the algorithm has been tested before in real environment'),
(38, 10, 'all other factors like CPU speed are constant and have no effect on implementation', 'all other factors like CPU speed are constant and have no effect on implementation'),
(39, 10, 'all other factors like CPU speed are constant and have no effect on implementation', 'the algorithm needs not to be practical.'),
(40, 10, 'all other factors like CPU speed are constant and have no effect on implementation', 'none of the above');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `faculty_created_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `quiz_branch_id` int(11) NOT NULL,
  `quiz_topic` varchar(255) NOT NULL,
  `question_marks` int(11) NOT NULL,
  `quiz_date` varchar(255) NOT NULL,
  `quiz_start_time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`id`, `quiz_question_id`, `question_name`, `faculty_created_id`, `subject_name`, `quiz_branch_id`, `quiz_topic`, `question_marks`, `quiz_date`, `quiz_start_time`, `status`) VALUES
(1, 1, 'A procedure that calls itself is called', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(2, 2, 'Maximum number of nodes in a binary tree with height k, where root is height 0, is', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(3, 3, 'Minimum number of queues required for priority queue implementation?', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(4, 4, 'Which of the following searching techniques do not require the data to be in sorted form', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(5, 5, 'An algorithm is', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(6, 6, 'Which of the below mentioned sorting algorithms are not stable?', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(7, 7, 'In doubly linked lists', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(8, 8, 'Heap is an example of', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-21', '2021-04-21 06:00 pm', 1),
(9, 1, ' If we choose Prim\'s Algorithm for uniquely weighted spanning tree instead of Kruskal\'s Algorithm, then', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-24', '2021-04-21 06:00 pm', 1),
(10, 2, 'Apriori analysis of an algorithm assumes that ?', 'SK5252', 'Data Structure', 1, 'Basic of DS', 2, '2021-04-24', '2021-04-21 06:00 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_answer`
--

CREATE TABLE `quiz_student_answer` (
  `id` int(11) NOT NULL,
  `quiz_student_Admit_No` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `quiz_student_answer` varchar(255) NOT NULL,
  `marks_get` int(11) NOT NULL,
  `quiz_date` date NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_student_answer`
--

INSERT INTO `quiz_student_answer` (`id`, `quiz_student_Admit_No`, `quiz_question_id`, `quiz_student_answer`, `marks_get`, `quiz_date`, `subject_name`) VALUES
(1, 1993, 1, 'recursive', 2, '2021-04-21', 'Data Structure'),
(2, 1993, 2, '2k+1 ? 1', 2, '2021-04-21', 'Data Structure'),
(3, 1993, 3, '2', 2, '2021-04-21', 'Data Structure'),
(4, 1993, 4, 'Binary Search', 2, '2021-04-21', 'Data Structure'),
(5, 1993, 5, 'a step by step procedure to solve problem.', 2, '2021-04-21', 'Data Structure'),
(6, 1993, 6, 'Selection Sort', 2, '2021-04-21', 'Data Structure'),
(7, 1993, 7, 'two pointers are maintained to store next and previous nodes.', 2, '2021-04-21', 'Data Structure'),
(26, 1994, 11, 'we will get the same spanning tree', 2, '2021-04-22', 'Data Structure'),
(27, 1994, 12, 'all other factors like CPU speed are constant and have no effect on implementation', 2, '2021-04-22', 'Data Structure'),
(32, 1993, 9, 'we will get a different spanning tree', 0, '2021-04-24', 'Data Structure'),
(33, 1993, 10, 'all other factors like CPU speed are constant and have no effect on implementation', 2, '2021-04-24', 'Data Structure');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `Students_Admit_No` int(11) NOT NULL,
  `Lecture_Date` date NOT NULL,
  `Lecture_Time` varchar(100) NOT NULL,
  `Lecture_Name` varchar(255) NOT NULL,
  `Teacher_id` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0',
  `Joining_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `Students_Admit_No`, `Lecture_Date`, `Lecture_Time`, `Lecture_Name`, `Teacher_id`, `Status`, `Joining_Time`) VALUES
(1, 1993, '2021-05-05', '12:15 - 01:00', '3', 'SK5252', 1, '2021-05-05 12:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees_details`
--

CREATE TABLE `student_fees_details` (
  `id` int(11) NOT NULL,
  `Admission_No` int(11) NOT NULL,
  `Std_EnrollNo` varchar(11) NOT NULL,
  `Total_fees` int(11) NOT NULL,
  `Paid_Fees` int(11) NOT NULL,
  `Balance_Fees` int(11) NOT NULL,
  `Payment_Date` datetime NOT NULL,
  `Payment_Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fees_details`
--

INSERT INTO `student_fees_details` (`id`, `Admission_No`, `Std_EnrollNo`, `Total_fees`, `Paid_Fees`, `Balance_Fees`, `Payment_Date`, `Payment_Status`) VALUES
(1, 1993, 'CSN1221', 96500, 52000, 44500, '2021-04-12 05:11:14', 'Paid\r\n'),
(2, 1994, 'CSN1222', 96500, 0, 96500, '2021-04-12 05:11:14', 'Paid\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `id` int(11) NOT NULL,
  `Admission_NO` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `STUDENT_DOB` date NOT NULL,
  `student_phone` varchar(11) NOT NULL,
  `MOTHERNAME` varchar(255) NOT NULL,
  `PLACEOFBIRTH` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `ADDRESS` text NOT NULL,
  `FATHERMOBILEPHONE` varchar(255) NOT NULL,
  `MOTHERMOBILEPHONE` varchar(255) NOT NULL,
  `FATHERPROFESSION` varchar(11) NOT NULL,
  `MOTHERPROFESSION` varchar(11) NOT NULL,
  `FATHERNAME` varchar(255) NOT NULL,
  `enroll_no` varchar(255) NOT NULL,
  `DEPARTMENT` varchar(255) NOT NULL,
  `BRANCH` varchar(255) NOT NULL,
  `semester` int(1) NOT NULL DEFAULT '0',
  `reset_password_code` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  `online_status` varchar(255) NOT NULL,
  `new_login` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `Admission_NO`, `firstname`, `last_name`, `student_email`, `student_password`, `picture_link`, `STUDENT_DOB`, `student_phone`, `MOTHERNAME`, `PLACEOFBIRTH`, `GENDER`, `ADDRESS`, `FATHERMOBILEPHONE`, `MOTHERMOBILEPHONE`, `FATHERPROFESSION`, `MOTHERPROFESSION`, `FATHERNAME`, `enroll_no`, `DEPARTMENT`, `BRANCH`, `semester`, `reset_password_code`, `added_on`, `online_status`, `new_login`) VALUES
(18, 1993, 'Khan', 'Shadab', 'ks615044@gmail.com', '$2y$10$fehA1zWAKI19KEmSqc19aewSMEWa9.8f.Bwe8xZN4PWwGzsk19BN.', 'https://pbs.twimg.com/profile_images/932986247642939392/CDq_0Vcw_400x400.jpg', '2000-04-30', '9152458575', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1221', 'Computer Engineering', '1', 3, '4782026', '2021-04-14 00:00:00', '', 1),
(19, 1994, 'Khan', 'Cruz', 'cruz.jk@gmail.com', '$2y$10$DR/iX00eIhUSdcpNsiV16OiHSLF5EIQIX43JC5G4gbRqh3KCqavyW', 'https://teemusk.com/wp-content/uploads/2020/07/portrait.jpg', '1995-04-30', '8545758245', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1222', 'Civil Engineering', '3', 3, '2726136', '2021-04-12 09:00:00', '', 1),
(20, 1995, 'Sakil', 'Ahmed', 'shakil.jk@gmail.com', '$2y$10$DR/iX00eIhUSdcpNsiV16OiHSLF5EIQIX43JC5G4gbRqh3KCqavyW', 'https://pbs.twimg.com/profile_images/932986247642939392/CDq_0Vcw_400x400.jpg', '1995-04-30', '8545758245', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1223', 'Computer Engineering', '1', 3, '2726136', '2021-04-12 09:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_alias` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `scheme` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `subject_alias`, `semester`, `branch_id`, `subject_code`, `scheme`) VALUES
(1, 'Data Structure', 'DSA', 3, 1, 'CSC301', 'C'),
(2, 'EM-III', 'EM-III', 3, 1, 'CSC302', 'C'),
(3, 'Discrete Structure & Graph Theory', 'DSGT', 3, 1, 'CSC303', 'C'),
(4, 'Digital Logic & Communication Application', 'DLCA', 3, 1, 'CSC304', 'C'),
(5, 'Computer Graphics', 'CG', 3, 1, 'CSC305', 'C'),
(6, 'Math III (Probability & Statistics)', 'EM-III', 3, 2, 'MSC301', 'A'),
(7, 'Introduction to Material Science and\r\nEngineering', 'IMSE', 3, 2, 'MSC302', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `subject_assign_faculty`
--

CREATE TABLE `subject_assign_faculty` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timetable_all_dept`
--

CREATE TABLE `timetable_all_dept` (
  `id` int(11) NOT NULL,
  `Department_Name` varchar(255) NOT NULL,
  `Semester_No` int(2) NOT NULL,
  `Day_Name` varchar(255) NOT NULL,
  `Lecture_Start_at` varchar(100) NOT NULL,
  `Lecture_end_at` varchar(100) NOT NULL,
  `Lecture_Name` varchar(255) NOT NULL,
  `Teacher_id` varchar(255) NOT NULL,
  `lecture_join_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_all_dept`
--

INSERT INTO `timetable_all_dept` (`id`, `Department_Name`, `Semester_No`, `Day_Name`, `Lecture_Start_at`, `Lecture_end_at`, `Lecture_Name`, `Teacher_id`, `lecture_join_link`, `status`) VALUES
(1, '1', 3, 'Monday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(2, '1', 3, 'Monday', '10:00 am', '10:45 am', '2', 'SK5253', '', 1),
(3, '1', 3, 'Monday', '10:45 am', '11:30 am', '3', 'SK5254', '', 1),
(4, '1', 3, 'Monday', '11:30 am', '12:15 pm', '5', 'SK5252', '', 1),
(5, '1', 3, 'Monday', '12:15 pm', '1:00 pm', '4', 'SK5252', '', 1),
(6, '1', 3, 'Tuesday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(7, '1', 3, 'Tuesday', '10:00 am', '10:45 am', '5', 'SK5252', '', 1),
(8, '1', 3, 'Tuesday', '10:45 am', '11:30 am', '3', 'SK5252', '', 1),
(9, '1', 3, 'Tuesday', '11:30 am', '12:15 pm', '4', 'SK5252', '', 1),
(10, '1', 3, 'Tuesday', '12:15 pm', '1:00 pm', '2', 'SK5252', '', 1),
(11, '1', 3, 'Wednesday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(12, '1', 3, 'Wednesday', '10:00 am', '10:45 am', '2', 'SK5252', '', 1),
(13, '1', 3, 'Wednesday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(14, '1', 3, 'Wednesday', '11:30 am', '12:15 pm', '5', 'SK5252', '', 1),
(15, '1', 3, 'Wednesday', '12:15 pm', '1:00 pm', '3', 'SK5252', '', 1),
(16, '1', 3, 'Thursday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(17, '1', 3, 'Thursday', '10:00 am', '10:45 am', '2', 'SK5252', '', 1),
(18, '1', 3, 'Thursday', '10:45 am', '11:30 am', '5', 'SK5252', '', 1),
(19, '1', 3, 'Thursday', '11:30 am', '12:15 pm', '4', 'SK5252', '', 1),
(20, '1', 3, 'Thursday', '12:15 pm', '1:00 pm', '3', 'SK5252', '', 1),
(21, '1', 3, 'Friday', '9:15 am', '10:00 am', '2', 'SK5252', '', 1),
(22, '1', 3, 'Friday', '10:00 am', '10:45 am', '1', 'SK5252', '', 1),
(23, '1', 3, 'Friday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(24, '1', 3, 'Friday', '11:30 am', '12:15 pm', '5', 'SK5252', '', 1),
(25, '1', 3, 'Friday', '12:15 pm', '1:00 pm', '3', 'SK5252', '', 1),
(26, '2', 3, 'Thursday', '9:15 am', '10:45am', '6', 'SK5253', '', 1),
(27, '2', 3, 'Thursday', '10:45 am', '11:45 am', '7', 'SK5252', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_mode`
--
ALTER TABLE `admin_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_notice`
--
ALTER TABLE `college_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profle_update_request`
--
ALTER TABLE `profle_update_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_choices`
--
ALTER TABLE `quiz_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_student_answer`
--
ALTER TABLE `quiz_student_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fees_details`
--
ALTER TABLE `student_fees_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_assign_faculty`
--
ALTER TABLE `subject_assign_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable_all_dept`
--
ALTER TABLE `timetable_all_dept`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_mode`
--
ALTER TABLE `admin_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `college_notice`
--
ALTER TABLE `college_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profle_update_request`
--
ALTER TABLE `profle_update_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_choices`
--
ALTER TABLE `quiz_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_student_answer`
--
ALTER TABLE `quiz_student_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_fees_details`
--
ALTER TABLE `student_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_assign_faculty`
--
ALTER TABLE `subject_assign_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable_all_dept`
--
ALTER TABLE `timetable_all_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
