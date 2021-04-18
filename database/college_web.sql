-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 07:14 PM
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
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `desgination` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `leaving_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `faculty_login_id`, `first_name`, `middle_name`, `last_name`, `faculty_alias`, `faculty_email`, `mb_number`, `password`, `dob`, `desgination`, `salary`, `joining_date`, `leaving_date`, `status`) VALUES
(1, 'SK5252', 'Shadab', 'Alam', 'Khan', 'SK', 'skshadab@gmal.com', '9167582452', 'shadabkhan', '2017-02-07', 'Head of Department', 20000, '2021-04-09', '2021-04-23', 1);

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
(49, 1993, '2021-04-18', '07:00 - 08:00', 'Digital Logic & Communication Applications', 'SK5252', 1, '2021-04-18 10:06:40'),
(50, 1993, '2021-04-18', '06:30 - 07:00', 'Data_Structure', 'SK5252', 1, '2021-04-18 10:06:40'),
(51, 1993, '2021-04-18', '10:41 - 10:44', 'Computer Grphics', 'SK5252', 1, '2021-04-18 10:43:04');

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
(18, 1993, 'Khan', 'Shadab', '$2y$10$x7SFdvfvxdjodIkjcmVqiexounArLxHIPw7sGRL6dy9i9iL08Iiz2', 'https://pbs.twimg.com/profile_images/932986247642939392/CDq_0Vcw_400x400.jpg', '2000-04-30', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1221', 'Computer Engineering', 'Computer ', 3, '2021-04-14 00:00:00'),
(19, 1994, 'Khan', 'Mehtab', '$2y$10$x7SFdvfvxdjodIkjcmVqiexounArLxHIPw7sGRL6dy9i9iL08Iiz2', 'https://teemusk.com/wp-content/uploads/2020/07/portrait.jpg', '2000-04-30', 'Jasimunnisa', 'Mumbai', 'Male', 'Sayeed Manzil, 104, KAUSA MUMBRA', '9175485871', '8545758545', 'businessman', 'housewife', 'Jamal Ahmed Khan', 'CSN1222', 'Computer Engineering', 'Computer ', 3, '0000-00-00 00:00:00');

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
(1, 'Computer', 3, 'Monday', '12:15 am', '1:00 pm', 'Data_Structure', 'SK5252', '', 1),
(2, 'Computer', 3, 'Monday', '11:30 am', '12:15 am', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(3, 'Computer', 3, 'Monday', '10:45 am', '11:30 am', 'Discrete Structure & Graph Theory', 'SK5252', '', 1),
(4, 'Computer', 3, 'Monday', '10:00 am', '10:45 am', 'Computer Grphics', 'SK5252', '', 1),
(5, 'Computer', 3, 'Monday', '9:00 am', '10:00 am', 'Em-III', 'SK5252', '', 1),
(6, 'Computer', 3, 'Tuesday', '12:15 pm', '1:00 pm', 'Data_Structure', 'SK5252', '', 1),
(7, 'Computer', 3, 'Tuesday', '11:30 am', '12:15 pm', 'Computer Grphics', 'SK5252', '', 1),
(8, 'Computer', 3, 'Tuesday', '10:00 am', '10:45 am', 'Discrete Structure & Graph Theory', 'SK5252', '', 1),
(9, 'Computer', 3, 'Tuesday', '10:45 am', '11:30 am', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(10, 'Computer', 3, 'Tuesday', '9:15 am', '10:00 am', 'Em-III', 'SK5252', '', 1),
(11, 'Computer', 3, 'Wednesday', '12:15 am', '1:00 pm', 'Data_Structure', 'SK5252', '', 1),
(12, 'Computer', 3, 'Wednesday', '11:30 am', '12:15 pm', 'Em-III', 'SK5252', '', 1),
(13, 'Computer', 3, 'Wednesday', '10:45 am', '11:30 am', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(14, 'Computer', 3, 'Wednesday', '10:00 am', '10:45 am', 'Computer Grphics', 'SK5252', '', 1),
(15, 'Computer', 3, 'Wednesday', '10:00 pm', '11:00 pm', 'Discrete Structure & Graph Theory', 'SK5252', '', 1),
(16, 'Computer', 3, 'Thursday', '10:00 pm', '11:00 pm', 'Data_Structure', 'SK5252', '', 1),
(17, 'Computer', 3, 'Thursday', '9:00 pm', '10:00 pm', 'Em-III', 'SK5252', '', 1),
(18, 'Computer', 3, 'Thursday', '8:00 pm', '9:00 pm', 'Computer Grphics', 'SK5252', '', 1),
(19, 'Computer', 3, 'Thursday', '7:00 pm', '8:00 pm', 'Discrete Structure & Graph Theory', 'SK5252', '', 1),
(20, 'Computer', 3, 'Thursday', '6:00 pm', '7:00 pm', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(21, 'Computer', 3, 'Friday', '11:35 pm', '11:58 pm', 'Em-III', 'SK5252', '', 1),
(22, 'Computer', 3, 'Friday', '11:11 pm', '11:35 pm', 'Data_Structure', 'SK5252', '', 1),
(23, 'Computer', 3, 'Friday', '10:45 am', '11:30 am', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(24, 'Computer', 3, 'Friday', '10:00 am', '10:45 am', 'Discrete Structure & Graph Theory', 'SK5252', '', 1),
(25, 'Computer', 3, 'Friday', '9:15 am', '10:00 am', 'Computer Grphics', 'SK5252', '', 1),
(26, 'Computer', 3, 'Saturday', '1:00 pm', '2:00 pm', 'Em-III', 'SK5252', '', 1),
(27, 'Computer', 3, 'Saturday', '5:00 pm', '6:00 pm', 'Data_Structure', 'SK5252', '', 1),
(28, 'Computer', 3, 'Saturday', '6:00 pm', '7:00 pm', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(29, 'Computer', 3, 'Saturday', '10:40 pm', '11:45 pm', 'Discrete Structure & Graph Theory', 'SK5252', '', 1),
(30, 'Computer', 3, 'Saturday', '11:45 pm', '11:59 pm', 'Computer Grphics', 'SK5252', '', 1),
(32, 'Computer', 3, 'Sunday', '5:10 pm', '6:00 pm', 'Em-III', 'SK5252', 'https://meet.google.com/hzo-jdqz-xcu?pli=1', 1),
(33, 'Computer', 3, 'Sunday', '6:35 pm', '7:00 pm', 'Data_Structure', 'SK5252', '', 1),
(34, 'Computer', 3, 'Sunday', '7:00 pm', '8:00 pm', 'Digital Logic & Communication Applications', 'SK5252', '', 1),
(35, 'Computer', 3, 'Sunday', '10:05 pm', '10:42 pm', 'Discrete Structure & Graph Theory', 'SK5252', 'https://meet.google.com/hzo-jdqz-xcu?pli=2', 1),
(36, 'Computer', 3, 'Sunday', '10:41 pm', '10:44 pm', 'Computer Grphics', 'SK5252', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
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
-- Indexes for table `timetable_all_dept`
--
ALTER TABLE `timetable_all_dept`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
-- AUTO_INCREMENT for table `timetable_all_dept`
--
ALTER TABLE `timetable_all_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
