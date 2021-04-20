-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 07:50 AM
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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `faculty_login_id`, `first_name`, `middle_name`, `last_name`, `faculty_alias`, `faculty_email`, `mb_number`, `faculty_image`, `password`, `dob`, `desgination`, `branch_id`, `salary`, `joining_date`, `leaving_date`, `status`) VALUES
(1, 'SK5252', 'Shadab', 'Alam', 'Khan', 'SK', 'skshadab@gmal.com', '9167582452', 'http://csmit.in/images/ce/faculty/1.jpg', 'shadabkhan', '2017-02-07', 'Programmer', 1, 20000, '2021-04-09', '2021-04-23', 1),
(2, 'SK5253', 'Mahesh', 'Thakur', '', 'MK', 'mahesh.csmit@gmail.com', '1234567890', 'http://csmit.in/images/ce/faculty/2.jpg', '', '1991-03-08', 'Structure Exper Analysis', 1, 50000, '2021-04-19', '0000-00-00', 1),
(3, 'SK5254', 'Gajana', 'Patel', 'Usman', 'GP', 'gajana@gmail.com', '5254526352', '', '', '1992-04-19', 'Data Scientist', 1, 100000, '2021-04-19', '0000-00-00', 1);

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
(1, 1, 'Container of objects of similar types', 'Container of objects of similar types'),
(4, 1, 'Container of objects of similar types', 'A data structure that shows a hierarchical behavior'),
(5, 1, 'Container of objects of similar types', 'Container of objects of mixed types\r\n'),
(6, 1, 'Container of objects of similar types', 'All of the mentioned'),
(7, 2, 'Recursion', 'CPU Resource Allocation'),
(8, 2, 'Recursion', 'Breadth First Traversal'),
(9, 2, 'Recursion', 'Recursion'),
(10, 2, 'Recursion', 'None of the above'),
(11, 3, 'False', 'True'),
(12, 3, 'False', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `faculty_created_id` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `quiz_topic` varchar(255) NOT NULL,
  `question_marks` int(11) NOT NULL,
  `quiz_date` varchar(255) NOT NULL,
  `quiz_start_time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `question_name`, `faculty_created_id`, `subject_name`, `quiz_topic`, `question_marks`, `quiz_date`, `quiz_start_time`, `status`) VALUES
(1, 'Which of these best describes an array?', 'SK5252', 'Data Structure', 'Basic of data structure', 2, '2021-04-20', '2021-04-19 6:00 pm', 1),
(2, 'Stack is used for', 'SK5252', 'Data Structure', 'Basic of data structure', 2, '2021-04-20', '2021-04-19 6:00 pm', 1),
(3, 'Postfix expression is just a reverse of prefix expression.', 'SK5252', 'Data Structure', 'Basic of data structure', 2, '2021-04-20', '2021-04-19 6:00 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_student_answer`
--

CREATE TABLE `quiz_student_answer` (
  `id` int(11) NOT NULL,
  `quiz_student_Admit_No` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `quiz_student_answer` varchar(255) NOT NULL,
  `marks_get` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_student_answer`
--

INSERT INTO `quiz_student_answer` (`id`, `quiz_student_Admit_No`, `quiz_question_id`, `quiz_student_answer`, `marks_get`) VALUES
(1, 1993, 1, 'Queue', 2);

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
(54, 1993, '2021-04-19', '10:00 - 10:45', '5', 'SK5252', 1, '2021-04-19 10:01:52'),
(55, 1993, '2021-04-19', '11:30 - 12:15', '2', 'SK5252', 1, '2021-04-19 11:31:31'),
(57, 1993, '2021-04-19', '12:15 - 01:00', '1', 'SK5252', 1, '2021-04-19 02:03:59');

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
  `password` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `STUDENT_DOB` date NOT NULL,
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
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`id`, `Admission_NO`, `firstname`, `last_name`, `password`, `picture_link`, `STUDENT_DOB`, `MOTHERNAME`, `PLACEOFBIRTH`, `GENDER`, `ADDRESS`, `FATHERMOBILEPHONE`, `MOTHERMOBILEPHONE`, `FATHERPROFESSION`, `MOTHERPROFESSION`, `FATHERNAME`, `enroll_no`, `DEPARTMENT`, `BRANCH`, `semester`, `added_on`) VALUES
(18, 1993, 'Khan', 'Shadab', '$2y$10$x7SFdvfvxdjodIkjcmVqiexounArLxHIPw7sGRL6dy9i9iL08Iiz2', 'https://pbs.twimg.com/profile_images/932986247642939392/CDq_0Vcw_400x400.jpg', '2000-04-30', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1221', 'Computer Engineering', '1', 3, '2021-04-14 00:00:00'),
(19, 1994, 'Khan', 'Mehtab', '$2y$10$x7SFdvfvxdjodIkjcmVqiexounArLxHIPw7sGRL6dy9i9iL08Iiz2', 'https://teemusk.com/wp-content/uploads/2020/07/portrait.jpg', '2000-04-30', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1222', 'Computer Engineering', '1', 3, '0000-00-00 00:00:00');

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
  `scheme` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `subject_alias`, `semester`, `branch_id`, `scheme`) VALUES
(1, 'Data Structure', 'DSA', 3, 1, 'C'),
(2, 'EM-III', 'EM-III', 3, 1, 'C'),
(3, 'Discrete Structure & Graph Theory', 'DSGT', 3, 1, 'C'),
(4, 'Digital Logic & Communication Application', 'DLCA', 3, 1, 'C'),
(5, 'Computer Graphics', 'CG', 3, 1, 'C');

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
(1, '1', 3, 'Monday', '12:15 pm', '1:00 pm', '1', 'SK5252', '', 1),
(2, '1', 3, 'Monday', '11:30 am', '12:15 pm', '2', 'SK5252', '', 1),
(3, '1', 3, 'Monday', '10:45 am', '11:30 am', '3', 'SK5252', '', 1),
(4, '1', 3, 'Monday', '10:00 am', '10:45 am', '5', 'SK5252', '', 1),
(5, '1', 3, 'Monday', '9:15 am', '10:00 am', '4', 'SK5252', '', 1),
(6, '1', 3, 'Tuesday', '12:15 pm', '1:00 pm', '1', 'SK5252', '', 1),
(7, '1', 3, 'Tuesday', '11:30 am', '12:15 pm', '5', 'SK5252', '', 1),
(8, '1', 3, 'Tuesday', '10:00 am', '10:45 am', '3', 'SK5252', '', 1),
(9, '1', 3, 'Tuesday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(10, '1', 3, 'Tuesday', '9:15 am', '10:00 am', '2', 'SK5252', '', 1),
(11, '1', 3, 'Wednesday', '12:15 pm', '1:00 pm', '1', 'SK5252', '', 1),
(12, '1', 3, 'Wednesday', '11:30 am', '12:15 pm', '2', 'SK5252', '', 1),
(13, '1', 3, 'Wednesday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(14, '1', 3, 'Wednesday', '10:00 am', '10:45 am', '5', 'SK5252', '', 1),
(15, '1', 3, 'Wednesday', '9:15 am', '10:00 am', '3', 'SK5252', '', 1),
(16, '1', 3, 'Thursday', '12:15 pm', '1:00 pm', '1', 'SK5252', '', 1),
(17, '1', 3, 'Thursday', '11:30 am', '12:15 pm', '2', 'SK5252', '', 1),
(18, '1', 3, 'Thursday', '10:45 am', '11:30 am', '5', 'SK5252', '', 1),
(19, '1', 3, 'Thursday', '10:00 am', '10:45 am', '4', 'SK5252', '', 1),
(20, '1', 3, 'Thursday', '9:15 am', '10:00 am', '3', 'SK5252', '', 1),
(21, '1', 3, 'Friday', '11:35 pm', '11:58 pm', '2', 'SK5252', '', 1),
(22, '1', 3, 'Friday', '11:11 pm', '11:35 pm', '1', 'SK5252', '', 1),
(23, '1', 3, 'Friday', '10:45 am', '11:30 am', '4', 'SK5252', '', 1),
(24, '1', 3, 'Friday', '10:00 am', '10:45 am', '3', 'SK5252', '', 1),
(25, '1', 3, 'Friday', '9:15 am', '10:00 am', '5', 'SK5252', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
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
  ADD PRIMARY KEY (`quiz_question_id`);

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
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_choices`
--
ALTER TABLE `quiz_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_student_answer`
--
ALTER TABLE `quiz_student_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `student_fees_details`
--
ALTER TABLE `student_fees_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_assign_faculty`
--
ALTER TABLE `subject_assign_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetable_all_dept`
--
ALTER TABLE `timetable_all_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
