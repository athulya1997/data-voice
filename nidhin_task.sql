-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 11:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nidhin_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_point`
--

CREATE TABLE `check_point` (
  `id` int(11) NOT NULL,
  `tour_package_id` int(11) NOT NULL,
  `status_field` int(11) NOT NULL DEFAULT 0,
  `image_field` int(11) NOT NULL DEFAULT 0,
  `description_field` int(11) NOT NULL DEFAULT 0,
  `name_field` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `check_point`
--

INSERT INTO `check_point` (`id`, `tour_package_id`, `status_field`, `image_field`, `description_field`, `name_field`, `updated_at`, `created_at`) VALUES
(1, 3, 1, 1, 0, 1, '2023-12-25 07:01:30', '2023-12-24 13:02:35'),
(2, 2, 0, 1, 1, 1, '2023-12-25 09:31:21', '2023-12-24 13:02:50'),
(3, 1, 0, 1, 0, 0, '2023-12-25 09:54:34', '2023-12-25 09:54:34'),
(4, 4, 0, 0, 0, 0, '2023-12-25 10:00:29', '2023-12-25 10:00:02'),
(5, 7, 0, 1, 1, 1, '2023-12-25 10:33:56', '2023-12-25 10:12:31'),
(6, 6, 1, 1, 1, 1, '2023-12-25 10:22:05', '2023-12-25 10:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `tour_package`
--

CREATE TABLE `tour_package` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_package`
--

INSERT INTO `tour_package` (`id`, `name`, `image`, `description`, `status`, `updated_at`, `created_at`) VALUES
(3, 'nidhin josephddd', 'logo3.png', '', '1', '2023-12-25 04:33:47', '2023-12-24 08:57:41'),
(5, 'sfsf', '', '', '1', '2023-12-25 10:02:08', '2023-12-25 10:01:49'),
(6, 'tetst', '360_F_301109382_IRzpC9mqbNVQ71cAl53EEHxU7fZ7wqK4.jpg', '', '', '2023-12-25 10:34:16', '2023-12-25 10:02:38'),
(7, 'arunnn  sss', 'logo31.png', 'sssssssssssss', '', '2023-12-25 10:34:01', '2023-12-25 10:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_point`
--
ALTER TABLE `check_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_package`
--
ALTER TABLE `tour_package`
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
-- AUTO_INCREMENT for table `check_point`
--
ALTER TABLE `check_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tour_package`
--
ALTER TABLE `tour_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
