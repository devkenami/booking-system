-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2024 at 04:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_form`
--

CREATE TABLE `admin_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_form`
--

INSERT INTO `admin_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'ken', 'kenethbryan234@gmail.com', '3bdae171e077adbc3dca25941e524fc5', 'admin'),
(2, 'pixel', 'qwe@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'admin'),
(3, 'camille', 'camillepasoquin@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'admin'),
(4, 'kenami', 'kenken@gmail.com', '3bdae171e077adbc3dca25941e524fc5', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_staff_table`
--

CREATE TABLE `admin_staff_table` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_contact_no` varchar(100) NOT NULL,
  `staff_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_staff_table`
--

INSERT INTO `admin_staff_table` (`id`, `staff_name`, `staff_contact_no`, `staff_email`) VALUES
(7, 'archieve', '09723751826', 'simp@gmail.com'),
(8, 'John Wick', '09723751828', 'john@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_account_status` varchar(100) DEFAULT NULL,
  `user_security_key` text DEFAULT NULL,
  `user_security_key_expiry` text DEFAULT NULL,
  `user_ip_address` text DEFAULT NULL,
  `user_host_name` text DEFAULT NULL,
  `user_php_self` text DEFAULT NULL,
  `user_server_name` text DEFAULT NULL,
  `user_http_host` text DEFAULT NULL,
  `user_http_refferer` text DEFAULT NULL,
  `user_http_user_agent` text DEFAULT NULL,
  `user_script_name` text DEFAULT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` datetime DEFAULT NULL,
  `user_login_date_at` datetime DEFAULT NULL,
  `user_logout_date_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type_id`, `user_username`, `user_password`, `user_account_status`, `user_security_key`, `user_security_key_expiry`, `user_ip_address`, `user_host_name`, `user_php_self`, `user_server_name`, `user_http_host`, `user_http_refferer`, `user_http_user_agent`, `user_script_name`, `user_created_at`, `user_updated_at`, `user_login_date_at`, `user_logout_date_at`) VALUES
(1, 1, 'kenethbryan234@gmail.com', '3bdae171e077adbc3dca25941e524fc5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 07:38:54', NULL, NULL, NULL),
(2, 4, 'j@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 08:13:00', NULL, NULL, NULL),
(3, 2, 'simp@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 22:36:28', NULL, NULL, NULL),
(4, 2, 'w@gmail.com', '1234567890', 'not active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-29 23:57:58', NULL, NULL, NULL),
(5, 2, 'q@gmail.com', 'q', 'not active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 00:03:29', NULL, NULL, NULL),
(6, 4, 'a@gmail.com', 'a', 'not active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 00:45:59', NULL, NULL, NULL),
(7, 4, 'e@gamil.com', 'e', 'not active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 00:50:52', NULL, NULL, NULL),
(8, 2, 'd@gmail.com', 'd', 'not active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-30 00:52:08', NULL, NULL, NULL),
(10, 1, 'em1@gmail.com', 'em1', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-31 08:43:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment_table`
--

CREATE TABLE `user_appointment_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_date_appointment` varchar(100) NOT NULL,
  `user_time_appointment` varchar(100) NOT NULL,
  `user_pet_name` varchar(100) NOT NULL,
  `user_pet_type` varchar(100) NOT NULL,
  `appointment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_appointment_table`
--

INSERT INTO `user_appointment_table` (`id`, `user_id`, `user_name`, `user_date_appointment`, `user_time_appointment`, `user_pet_name`, `user_pet_type`, `appointment_status`) VALUES
(8, 8, 'John', '2024-05-16', '01:45', 'Caspin', 'Dog', 'declined'),
(9, 8, 'John', '2024-05-16', '01:02', 'Caspin', 'Dog', 'accepted'),
(10, 8, 'John', '2024-05-16', '01:00', 'Caspin', 'Dog', 'accepted'),
(11, 1, 'j@gmail.com', '2024-05-31', '10:35', 'Aspin', 'Dog', 'accepted'),
(12, 1, 'j@gmail.com', '2024-05-31', '10:35', 'Aspin', 'Dog', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'keneth pogi', 'kenethdin16@gmail.com', '3bdae171e077adbc3dca25941e524fc5', 'user'),
(5, 'sss', 'ken@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'user'),
(6, 'bella', 'bella@gmail.com', '76d80224611fc919a5d54f0ff9fba446', 'user'),
(7, 'camille', 'pasoquincamille@gmail.com', '3bdae171e077adbc3dca25941e524fc5', 'user'),
(8, 'John', 'j@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_pets_table`
--

CREATE TABLE `user_pets_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_pet_name` varchar(100) NOT NULL,
  `user_pet_age` int(11) NOT NULL,
  `user_pet_weight` int(11) NOT NULL,
  `user_pet_height` int(11) NOT NULL,
  `user_pet_type` varchar(100) NOT NULL,
  `user_pet_gender` varchar(10) NOT NULL,
  `user_pet_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_pets_table`
--

INSERT INTO `user_pets_table` (`id`, `user_id`, `user_pet_name`, `user_pet_age`, `user_pet_weight`, `user_pet_height`, `user_pet_type`, `user_pet_gender`, `user_pet_image`) VALUES
(11, 1, 'Aspin', 1, 1, 1, 'Dog', 'Male', '1715914157.png'),
(12, 1, 'Matildo', 1, 1, 1, 'Hamster', 'Female', '1717123022.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_profile_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_profile_first_name` text DEFAULT NULL,
  `user_profile_last_name` text DEFAULT NULL,
  `user_profile_middle_name` text DEFAULT NULL,
  `user_profile_dob` varchar(100) DEFAULT NULL,
  `user_profile_email_address` varchar(100) DEFAULT NULL,
  `user_profile_contact_no` text DEFAULT NULL,
  `user_profile_photo` text DEFAULT NULL,
  `user_profile_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_profile_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_profile_id`, `user_type_id`, `user_profile_first_name`, `user_profile_last_name`, `user_profile_middle_name`, `user_profile_dob`, `user_profile_email_address`, `user_profile_contact_no`, `user_profile_photo`, `user_profile_created_at`, `user_profile_updated_at`) VALUES
(1, 1, 'Ken', 'Chan', 'jackie', NULL, 'kenethbryan234@gmail.com', 'N/A', NULL, '2024-05-29 07:42:24', NULL),
(2, 4, 'sadas', 'dasdas', 'asdas', NULL, 'j@gmail.com', '09876543211', NULL, '2024-05-29 08:15:49', '2024-05-31 03:57:10'),
(3, 2, 'Simppppp', 'Son', 'Po', NULL, 'simp@gmail.com', '09723751826', NULL, '2024-05-29 22:41:24', '2024-05-31 04:04:39'),
(4, 2, 'q', 'e', 'w', '2024-05-09', 'w@gmail.com', '09876543211', NULL, '2024-05-29 23:57:58', NULL),
(5, 2, 'qwertyy', 'q', 'q', '2024-05-10', 'q@gmail.com', '09876543211', NULL, '2024-05-30 00:03:29', '2024-05-31 03:57:36'),
(6, 4, 'aa', 'a', 'a', '2024-04-28', 'a@gmail.com', '09876543212', NULL, '2024-05-30 00:45:59', '2024-05-29 18:50:18'),
(7, 4, 'e', 'e', 'eeeeee', '2024-05-15', 'e@gamil.com', '09876543212', NULL, '2024-05-30 00:50:52', '2024-05-29 18:50:58'),
(8, 2, 'd', 'dddddd', 'd', '2024-05-07', 'd@gmail.com', '09876543211', NULL, '2024-05-30 00:52:08', '2024-05-29 18:52:13'),
(9, 2, '', '', '', '', '', '', NULL, '2024-05-31 08:39:37', NULL),
(10, 1, 'em1', 'em1', 'em1', '2024-05-17', 'em1@gmail.com', '0876543211', NULL, '2024-05-31 08:43:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_account_name` text NOT NULL,
  `user_type_description` mediumtext NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_account_name`, `user_type_description`, `user_created_at`, `user_updated_at`) VALUES
(1, 'Admin', 'User that can manage and has authorization on all functions', '2024-05-29 07:23:34', NULL),
(2, 'Employee', 'User that can manage minimum task on the system', '2024-05-29 07:23:34', NULL),
(3, 'Veterinary', 'Doctors on systems', '2024-05-29 07:24:39', NULL),
(4, 'Customers', 'Consumer on system', '2024-05-29 07:24:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_form`
--
ALTER TABLE `admin_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_staff_table`
--
ALTER TABLE `admin_staff_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_appointment_table`
--
ALTER TABLE `user_appointment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pets_table`
--
ALTER TABLE `user_pets_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_profile_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_form`
--
ALTER TABLE `admin_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_staff_table`
--
ALTER TABLE `admin_staff_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_appointment_table`
--
ALTER TABLE `user_appointment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_pets_table`
--
ALTER TABLE `user_pets_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `user_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
