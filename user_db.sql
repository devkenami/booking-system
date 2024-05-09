-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 05:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(7, 'camille', 'pasoquincamille@gmail.com', '3bdae171e077adbc3dca25941e524fc5', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_form`
--
ALTER TABLE `admin_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
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
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
