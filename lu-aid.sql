-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2023 at 03:33 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lu-aid`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `head_name` varchar(255) NOT NULL,
  `head_email` varchar(255) NOT NULL,
  `head_phone` varchar(255) NOT NULL,
  `head_description` varchar(255) NOT NULL,
  `head_photo` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `head_name`, `head_email`, `head_phone`, `head_description`, `head_photo`, `date`) VALUES
(6, 'Computer Science & Engineering', 'Rumel M. S. Rahman Pir', 'rumelpir@lus.ac.bd', '+88-01758228736', '<div>Biography</div><div>PhD. (Ongoing) 2020- Present</div><div>Shahjalal University of Science and Technology (SUST)</div><div>Digital Privacy and Security of Children in Global South</div><div><br></div><div>M.Sc in Satellite Communications and Space Sy', 'Rumel.jpg', '2023-03-09 00:00:00'),
(7, 'Business Administration', 'Md. Jahangir Alam', 'jalam160@lus.ac.bd', '+8801711009899', '<div class=\"author-paragraph\" style=\"color: rgba(51, 51, 51, 0.7); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><h2 style=\"font-family: Roboto, sans-serif; line-height: 19.8', 'BA.jpg', '2023-03-09 00:00:00'),
(8, 'English', 'Rumpa Sharmin', 'rumpasharmin@lus.ac.bd', '01711147833', '<div class=\"author-paragraph\" style=\"color: rgba(51, 51, 51, 0.7); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><h2 style=\"font-family: Roboto, sans-serif; line-height: 19.8', 'Rumpa.jpg', '2023-03-09 00:00:00'),
(9, 'Electrical & Electronic Engineering', 'Rafiqul Islam', 'rafiqulzyl@lus.ac.bd', '01716 446071', '<h2 style=\"font-family: Roboto, sans-serif; line-height: 19.8px; color: rgb(69, 90, 100); margin: 20px 0px 10px; font-size: 18px; background-color: rgb(255, 255, 255);\">Area of Study</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; ', 'EEE.jpg', '2023-03-09 00:00:00'),
(10, 'Civil Engineering', 'Syeda Zehan Farzana', 'zehan_farzana@lus.ac.bd', '01911017626', '<div class=\"author-paragraph\" style=\"color: rgba(51, 51, 51, 0.7); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><h2 style=\"font-family: Roboto, sans-serif; line-height: 19.8', 'Civil.jpg', '2023-03-09 00:00:00'),
(12, 'Law', 'Md. Abdul Musabbir Chowdhury', 'head_law@lus.ac.bd', '+88 01717568792', '<div class=\"author-paragraph\" style=\"color: rgba(51, 51, 51, 0.7); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><h2 style=\"font-family: Roboto, sans-serif; line-height: 19.8', 'Law.jpg', '2023-03-09 00:00:00'),
(13, 'Islamic Studies', 'Fazly Ealahi Mamun', 'head_ist@lus.ac.bd', '01712153905/01612153905', '<div class=\"author-paragraph\" style=\"color: rgba(51, 51, 51, 0.7); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);\"><h2 style=\"font-family: Roboto, sans-serif; line-height: 19.8', 'Islamic.jpg', '2023-03-09 00:00:00'),
(14, 'Public Health', 'Musa. Halima Begum', 'musa.halimabegum@yahoo.com', '01913946475', '<p>Empty</p>', 'Musa.-Halima-Begum.jpg', '2023-03-09 00:00:00'),
(15, 'Tourism and Hospitality Management', 'Md. Mahbubur Rahaman', 'mahbub9305@gmail.com', '01717019305', '<p>Empty</p>', 'T.jpg', '2023-03-09 00:00:00'),
(16, 'Bangla', 'Dr. Mohammad Mostak Ahmed', 'head_bangla@lus.ac.bd', '01715003049', '<p>Empty</p>', '81b0eed1515ae2ac95deeaeda3d19a93.png', '2023-03-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int NOT NULL,
  `st_id` int NOT NULL,
  `department` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verify` int NOT NULL DEFAULT '0',
  `user_role` varchar(255) NOT NULL DEFAULT 'student',
  `create_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `st_id`, `department`, `dob`, `blood_group`, `password`, `profile`, `verification_code`, `is_verify`, `user_role`, `create_date`) VALUES
(2, 'Rased  Ahmed 2', 'cse_2020019230@lus.ac.bd', 1892932900, 2020019230, '6', '1999-01-02', 'A-', '123', 'Bill-Gates-Source-Wikipedia.png', '6e6eaaee572192904e5fc38c56bcbb49', 0, 'super_admin', '2023-07-11 14:25:22.900191'),
(3, 'Nehru Mccarthy', 'cse_2020228287@lus.ac.bd', 1898987899, 2020228287, '16', '1993-02-05', 'O+', '123', 'favicon.png', '72f0aeb4f3a551d1c116c4145dbfeb69', 0, 'student', '2023-07-11 16:39:26.722944');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
