-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 02:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assessment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_tbl`
--

CREATE TABLE `crud_tbl` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userAge` int(20) NOT NULL,
  `emailAdress` varchar(255) NOT NULL,
  `locatedAt` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_tbl`
--

INSERT INTO `crud_tbl` (`id`, `firstName`, `lastName`, `userAge`, `emailAdress`, `locatedAt`, `created_at`) VALUES
(1, 'Johns', 'Doe', 25, 'asdasd2@gmail.com', 'Bulacan', '2023-10-25 11:53:17'),
(2, 'Jane', 'Doe', 23, 'JaneDoe23@gmail.com', 'Manila', '2023-10-25 11:54:37'),
(3, 'Mark', 'Twain', 23, 'asdwe23@gmail.com', 'Pasig', '2023-10-25 11:56:23'),
(4, 'Zoe', 'Lane', 25, 'ZoeLane23@gmail.com', 'Manila', '2023-10-25 11:57:52'),
(9, 'arjhenalyn', 'subo', 69, 'test@gmail.com', 'cavite', '2023-10-26 11:33:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_tbl`
--
ALTER TABLE `crud_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_tbl`
--
ALTER TABLE `crud_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
