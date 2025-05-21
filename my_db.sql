-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 06:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(255) NOT NULL,
  `event_title` varchar(155) NOT NULL,
  `event_date` date NOT NULL,
  `event_description` varchar(255) NOT NULL,
  `event_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_date`, `event_description`, `event_image`) VALUES
(2, 'Arnold brisben', '2025-04-03', '<p>Best learning practice for java programme</p>', '1743652630_blog-1.jpg'),
(9, 'Arnold brisben', '2025-02-05', '<p>Best learning practice for java programme</p>', '1743655043_blog-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `registername` varchar(100) NOT NULL,
  `registeremail` varchar(100) NOT NULL,
  `registerpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `registername`, `registeremail`, `registerpassword`) VALUES
(1, 'tt', 'tt@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'tt', 'tt1@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Admin', 'admin@gmail.com', '123'),
(4, 'Gopal', 'Gopal@gmail.com', 'Gopal@123'),
(5, 'Arun', 'arun@gmail.com', 'Arun@123'),
(6, 'sarab', 'saran@gmail.com', '1234'),
(7, 'saran', 'saran1@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Raja2', '2', '2024-12-27 05:45:31', '2025-02-28 03:41:47'),
(2, 'Ravi', '2', '2024-12-27 05:45:31', '2025-02-12 13:04:14'),
(3, 'Ramu', '1', '2024-12-27 05:45:31', '2025-02-12 13:57:35'),
(4, 'Rajesh', 'Non-Teaching', '2024-12-27 05:45:31', '2024-12-27 05:45:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
