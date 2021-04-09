-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 08:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabse`
--

-- --------------------------------------------------------

--
-- Table structure for table `google_user`
--

CREATE TABLE `google_user` (
  `id` int(11) NOT NULL,
  `clint_id` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `google_email` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_user`
--

INSERT INTO `google_user` (`id`, `clint_id`, `firstname`, `last_name`, `google_email`, `picture_link`, `status`, `added_on`) VALUES
(24, 2147483647, 'Programming with Shadab', '', 'ks615044@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GgoHw5Xf_aMqb82GbmxM_Fbo8H3eb85tI9z-N4JWQ', 1, '2020-08-15 06:51:44'),
(25, 2147483647, 'all in', 'one video', 'ks579265@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GjyBHyMDzZIiLJOZYIckXU6tuK_i34xKPefO2bE', 1, '2020-08-15 07:12:37'),
(26, 2147483647, 'Khan', 'Shadab', 'ksfjjks@gmail.com', 'https://lh3.googleusercontent.com/-OcI5sGEyhNU/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuckSiRbVxQEynmqjETcZnlY3MAzHvQ/photo.jpg', 1, '2020-08-15 05:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `google_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_link` varchar(255) NOT NULL,
  `verification_code` int(11) NOT NULL,
  `admin_approval_status` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `last_name`, `google_email`, `password`, `picture_link`, `verification_code`, `admin_approval_status`, `status`, `added_on`) VALUES
(13, 'skshadab1234', '', 'ks615044@gmail.com', '$2y$10$l1mVD4q9BklYn.ImtYAFjep0gIoetiex/VMoR/VrVJdSpip1P3XWa', '', 36499, 0, 0, '2020-08-15 05:08:40'),
(14, 'skshadab1234', '', 'sk@gmail.com', '$2y$10$Pa9AGpd/qQhOUoSNxatZk.FKKaCXgg6DRj.TihZnVTnc2a2CYEtSS', '', 77061, 0, 0, '2020-08-15 05:10:15'),
(17, 'Khan Shadab', '', 'ks579265@gmail.com', '$2y$10$6l5R.r/3FF.eMnMkS.ewweppVRXc/PMPWWUlCkJrYzZnP8e.LK8wu', '', 74502, 0, 0, '2020-08-15 05:23:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `google_user`
--
ALTER TABLE `google_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `google_user`
--
ALTER TABLE `google_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
