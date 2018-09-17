-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 12:14 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `image`) VALUES
(1, '.NET', 'Gain hands-on experience with C#, Visual Basic, Windows programming, and ASP.NET. In this training course, you will leverage Visual Studio for code generation, user interface design, testing, and debugging, as well as building and accessing SQL Server databases. Visual Studio and the .NET Framework provide a suite of tools that allows you to develop modern software applications for your organization.', 'Uploads/dotnet.png'),
(2, 'C#', 'C# Fundamentals with C# 5.0 is designed to give you everything you need to become a productive C# developer on the .NET platform.', 'Uploads/csharp.png'),
(3, 'PYTHON', 'This course is a great introduction to both fundamental programming concepts and the Python programming language. By the end, you''ll be familiar with Python syntax and you''ll be able to put into practice what you''ll have learned in a final project you''ll develop locally.', 'Uploads/python.jpg'),
(4, 'C++', 'If you''ve never programmed before, and you think you''d like to learn C++, why not learn it first? This course covers what you need to start writing real applications in C++.', 'Uploads/c++.jpg'),
(5, 'LINUX SYSTEM ADMINISTRATOR', 'Linux system administration is one of the most in-demand skills in IT. Whether you''re looking for expert test prep for the Linux Foundation Certified System Administration certification, need training to help start a new Linux IT career, transition to Linux from another platform, or you''re just brushing up on your sysadmin skills, this course will teach you what you need to know.', 'Uploads/linux.png'),
(18, 'Full Stack Web Dev', 'Learn front-end and mobile hybrid development, build back-end support, and implement a fully functional application.', 'Uploads/fullStack.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL,
  `courses` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `email`, `image`, `courses`) VALUES
(2, 'Jeramie Bernasek', '052-555-0131', 'jbernasek0@nyu.edu', 'Uploads/student_default1.jpg', 'C#'),
(3, 'Nert Laughtisse', '054-916-2254', 'nlaughtisse1@e-recht24.de', 'Uploads/student_default2.jpg', '.NET'),
(4, 'Farly Feeham', '050-1541868', 'ffeeham2@spiegel.de', 'Uploads/student_default3.jpg', 'C++'),
(5, 'Claiborne Roseburgh', '054-884-6051', 'croseburgh3@freewebs.com', 'Uploads/student_default4.jpg', 'FULL STACK WEB DEV'),
(12, 'Henrieta Fullun', '050-1434674', 'hfullun4@digg.com', 'Uploads/student_default5.jpg', 'C++'),
(13, 'Richart Ratchford', '050-867-1631', 'rratchford6@so-net.ne.jp', 'Uploads/student_default6.jpg', '.NET');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  `role` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`, `phone`, `email`) VALUES
(1, 'admin1', '$2y$10$2FHGA9W9XUMZBeXGDntTXuE5NYnH/v6waAtsrbk/Eh4d1TBEJGIXu', 'O', '0547730130', 'ownerUser@gmail.com'),
(2, 'admin2', '$2y$10$4ZpSuOgByOW9UDfb9PMhpuAI3Axx.Txi6t1Oc1hmS1Oi3SJ6u.qFK', 'M', '0547730138', 'managerUser@gmail.com'),
(3, 'manager1', '$2y$10$gVPbG13qxRV.Ht.SxTDdCOk9LaAJzZdPOwFUpE4aSsmERLTEkJp/u', 'S', '0547730139', 'salesUser@gmail.com'),
(4, 'manager2', '$2y$10$zoitSSMQ/F8Z4meDnlURzenPiB4HNNzk0Jo2a8IMV/6iHqg0Dqeuu', 'S', '0547730139', 'salesUser@gmail.com'),
(5, 'sales1', '$2y$10$/NA8pmCALtNirdxMAcPrnOguh/ifmVKWCbyNIDLY9X6/vsoghDmWO', 'S', '0547730139', 'salesUser@gmail.com'),
(6, 'sales2', '$2y$10$h6DNiTakJoeffcVmTDvUxe52x5KtBznsN3lmcPblUQCXI/CJ7c2AS', 'S', '0547730139', 'salesUser@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
