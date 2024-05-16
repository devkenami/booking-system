-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 08:00 PM
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
(7, 'Simps Son', '09723751826', 'simp@gmail.com'),
(8, 'John Wick', '09723751828', 'john@gmail.com');

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
(10, 8, 'John', '2024-05-16', '01:00', 'Caspin', 'Dog', 'waiting');

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
(7, 8, 'Caspin', 1, 2, 2, 'Dog', 'Male', '1715840090.png'),
(8, 8, 'Aspin', 3, 2, 2, 'Dog', 'Female', '1715877565.png');

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
-- AUTO_INCREMENT for table `user_appointment_table`
--
ALTER TABLE `user_appointment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_pets_table`
--
ALTER TABLE `user_pets_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
