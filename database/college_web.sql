-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 05:50 PM
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
(1, 'Shadab MASTAN KHAN', 'ks615044@gmail.com', '9165452854', 'admin_profile.jpg', 'AD_121', '$2y$10$JVSclNRLjucwLSPFSbu9j.MxtGI4BLnZJRes0LSlb9RBo8IocBs/2', 'Sayedd manzil, abc 104, kajhh, kasss , Mumbra - 40061', '2021-05-24 15:00:53', '1990-05-04', 1, '2021-05-04 13:41:00', '', 3806536, 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `branch_code` varchar(10) NOT NULL,
  `academic_pattern` varchar(10) NOT NULL,
  `no_of_sem_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `status`, `branch_code`, `academic_pattern`, `no_of_sem_year`) VALUES
(1, 'Computer', 1, 'CO', 'Semester', 9),
(2, 'Mechanical', 1, 'MECH', 'Semester', 6),
(3, 'Civil', 1, 'Civil', 'Semester', 6),
(4, 'Search Engine Optimization', 1, 'SEO', 'Year', 2);

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
(1, '2', '1', 'hey', '2021-05-24 02:07 pm', '', 1),
(2, '2', '1', 'hii shadab', '2021-05-24 02:18 pm', '', 1),
(3, '2', '1', 'hello', '2021-05-24 02:56 pm', '', 1),
(4, '2', '1', 'hey', '2021-05-25 09:31 pm', '', 1),
(5, '2', '1', 'hello', '2021-06-07 09:01 pm', '', 1),
(6, '2', '1', 'hey', '2021-06-22 11:32 am', '', 1);

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
  `leaving_date` varchar(255) NOT NULL,
  `reset_password_code_faculty` int(20) NOT NULL,
  `new_login_faculty` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `faculty_login_id`, `first_name`, `middle_name`, `last_name`, `faculty_alias`, `faculty_email`, `mb_number`, `faculty_image`, `password`, `dob`, `desgination`, `branch_id`, `salary`, `joining_date`, `leaving_date`, `reset_password_code_faculty`, `new_login_faculty`, `status`) VALUES
(3, 'SK6247', 'Shadab', 'Khan', 'Alam', 'Mk', 'ks615044@gmail.com', '2545857585', '2021-05-12_030514_passport_photo_2f02bea3.jpg', '$2y$10$gss8Mv/RjscT.fG/DoHB9.D32alX0Q8QqpPQF77b87IoybCg5VEvm', '1998-02-25', 'Developer', 1, 250000, '2021-02-08', '', 1589355, 1, 1),
(5, 'SK7571', 'Sakiru', 'Khan', 'Shaikh', 'SS', 'shadaikh@gmail.com', '5252458565', '2021-05-12_031753_anydesk00000.png', '$2y$10$YAGR.a1uMciODDOeCgU3WOIaPiTeSClOsk8ZQbrDJmKzeuwrPBmGy', '1998-02-15', 'Developer', 1, 5000, '2020-02-25', '', 0, 0, 1);

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
(9, 1994, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-05-03', ' ', '2021-05-03', '10:40 pm', 1),
(10, 1993, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-05-07', ' ', '2021-05-07', '06:25 pm', 1),
(11, 2, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-05-22', ' ', '2021-05-22', '10:30 pm', 1),
(12, 1, 'Requested to update a profle', 'We take upto 2 working days to update your profile. <br> Requested at 2021-05-24', ' ', '2021-05-24', '12:25 pm', 1);

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
(12, 1994, 'Change Date Of Birth  to 29 Apr, 1998', '', '2021-05-03 10:40:00', '', 0),
(13, 1993, 'hello sir how are youu?\n\nKaise ho tum', '', '2021-05-07 06:25:00', '', 0),
(14, 2, 'Update My Details. Waiting Siince From Tommorrow', '', '2021-05-22 10:30:00', '', 0),
(15, 1, 'My First Name is Wrong Update it..', '', '2021-05-24 12:25:00', '', 0);

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
(27, 5, 'Dev', 'Dev'),
(28, 5, 'Dev', 'sk'),
(29, 5, 'Dev', 'mk');

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
(5, 1, 'Shadab Kon Hai?', 'SK6247', '1', 1, 'Basic GK', 2, '2021-05-28', '2021-05-28 6:00 pm', 1);

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
(1, 1, '2021-05-23', '12:15 - 01:00', '3', 'SK5252', 1, '2021-05-05 12:17:20'),
(2, 1, '2021-05-24', '12:15 - 06:00', '4', '', 1, '2021-05-24 12:19:13');

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
  `Payment_Status` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fees_details`
--

INSERT INTO `student_fees_details` (`id`, `Admission_No`, `Std_EnrollNo`, `Total_fees`, `Paid_Fees`, `Balance_Fees`, `Payment_Date`, `Payment_Status`, `payment_mode`) VALUES
(1, 1, 'CSN5727', 96500, 12000, 44500, '2021-04-12 05:11:14', 'Paid\r\n', 'paytm'),
(4, 1, 'CSN5727', 96500, 20000, 42000, '2021-04-12 05:11:14', 'Paid\r\n', 'paytm'),
(5, 2, 'CSN2998', 96500, 20000, 42000, '2021-04-12 05:11:14', 'Paid\r\n', 'paytm');

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
  `new_login` int(11) NOT NULL DEFAULT '0',
  `student_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `Admission_NO`, `firstname`, `last_name`, `student_email`, `student_password`, `picture_link`, `STUDENT_DOB`, `student_phone`, `MOTHERNAME`, `PLACEOFBIRTH`, `GENDER`, `ADDRESS`, `FATHERMOBILEPHONE`, `MOTHERMOBILEPHONE`, `FATHERPROFESSION`, `MOTHERPROFESSION`, `FATHERNAME`, `enroll_no`, `DEPARTMENT`, `BRANCH`, `semester`, `reset_password_code`, `added_on`, `online_status`, `new_login`, `student_status`) VALUES
(22, 1, 'Khan', 'Shadab Alam', 'ks615044@gmail.com', '$2y$10$0yzkOWMnsbsS8oqR5ZtoceaeOAYfsdcXYXz1cTC60profpmyxaaqi', '2021-05-13_112624_Lighthouse.jpg', '1998-02-28', '9452458548', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, Opp, Irani Petrol Pump', '8575485263', '85889966552', 'Bottle Supp', 'HouseWife', 'Jamal Ahmed Khan', 'CSN5727', 'Computer Engineering', '1', 3, '1881413', '2021-05-13 11:26:24', '', 1, 1),
(23, 2, 'Khan ', 'Mehatb', 'skshadabkhojo@gmail.com', '$2y$10$mcooS2YwGniTa3N7XW0E.uCVhGo.VmL53y46FGm/3ePHd1.zE6lEe', '2021-05-18_082332_Desert.jpg', '1999-02-25', '9167263576', 'Jascimunasuyt', 'Mumbai', 'Male', 'Sayeed Manzil, asasasasas', '4585754585', '8575485754', 'Job Helper', 'Housewife', 'Khan', 'CSN6970', 'Computer Engineering', '1', 3, '', '2021-05-18 08:23:32', '', 1, 1);

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
  `subject_type` varchar(255) NOT NULL,
  `scheme` varchar(11) NOT NULL,
  `Theory_marks` int(11) NOT NULL,
  `practical_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `subject_alias`, `semester`, `branch_id`, `subject_code`, `subject_type`, `scheme`, `Theory_marks`, `practical_marks`) VALUES
(1, 'Data Structure', 'DSA', 3, 1, 'CSC301', 'Core', 'A', 90, 20),
(2, 'Maths - III', 'EM-III', 3, 1, 'CSC302', 'Core', 'I', 80, 20),
(3, 'Discrete Structure & Graph Theory', 'DSGT', 3, 1, 'CSC303', 'Core', 'C', 80, 20),
(4, 'Digital Logic & Communication Application', 'DLCA', 3, 1, 'CSC304', 'Core', 'C', 80, 20),
(6, 'Math III (Probability & Statistics)', 'EM-III', 3, 2, 'MSC301', 'Core', 'A', 80, 20),
(8, 'Data management', 'DMS', 4, 1, 'DMS2134', 'Core', 'I', 50, 25);

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
(4, '1', 3, 'Monday', '11:30 am', '12:15 pm', '6', 'SK5252', '', 1),
(5, '1', 3, 'Monday', '12:15 pm', '6:00 pm', '4', 'SK5252', 'https://meet.google.com/hxw-ydid-qat', 1),
(6, '1', 3, 'Tuesday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(7, '1', 3, 'Tuesday', '10:00 am', '10:45 am', '6', 'SK5252', '', 1),
(8, '1', 3, 'Tuesday', '10:45 am', '11:30 am', '3', 'SK5252', '', 1),
(9, '1', 3, 'Tuesday', '11:30 am', '12:15 pm', '4', 'SK5252', '', 1),
(10, '1', 3, 'Tuesday', '12:15 pm', '1:00 pm', '2', 'SK5252', '', 1),
(11, '1', 3, 'Wednesday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(12, '1', 3, 'Wednesday', '10:00 am', '10:45 am', '2', 'SK5252', '', 1),
(13, '1', 3, 'Wednesday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(14, '1', 3, 'Wednesday', '11:30 am', '12:15 pm', '6', 'SK5252', '', 1),
(15, '1', 3, 'Wednesday', '12:15 pm', '1:00 pm', '3', 'SK5252', '', 1),
(16, '1', 3, 'Thursday', '9:15 am', '10:00 am', '1', 'SK5252', '', 1),
(17, '1', 3, 'Thursday', '10:00 am', '10:45 am', '2', 'SK5252', '', 1),
(18, '1', 3, 'Thursday', '10:45 am', '11:30 am', '6', 'SK5252', '', 1),
(19, '1', 3, 'Thursday', '11:30 am', '12:15 pm', '4', 'SK5252', '', 1),
(20, '1', 3, 'Thursday', '12:15 pm', '1:00 pm', '2', 'SK5252', '', 1),
(21, '1', 3, 'Friday', '9:15 am', '10:00 am', '2', 'SK5252', '', 1),
(22, '1', 3, 'Friday', '10:00 am', '10:45 am', '3', 'SK5252', '', 1),
(23, '1', 3, 'Friday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(24, '1', 3, 'Friday', '11:30 am', '12:15 pm', '6', 'SK5252', '', 1),
(25, '1', 3, 'Friday', '12:15 pm', '1:00 pm', '1', 'SK5252', 'https://meet.google.com/hxw-ydid-qat', 1),
(26, '2', 3, 'Thursday', '9:15 am', '10:45am', '6', 'SK5252', '', 1),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `college_notice`
--
ALTER TABLE `college_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profle_update_request`
--
ALTER TABLE `profle_update_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quiz_choices`
--
ALTER TABLE `quiz_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quiz_student_answer`
--
ALTER TABLE `quiz_student_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_fees_details`
--
ALTER TABLE `student_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
