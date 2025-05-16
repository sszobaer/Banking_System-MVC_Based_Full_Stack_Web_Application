-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 10:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNo` int(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `accountType` varchar(20) NOT NULL,
  `depositAmount` float NOT NULL,
  `nid/passport` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `presentAddress` int(100) NOT NULL,
  `permanentAddress` varchar(100) NOT NULL,
  `imageUrl` varchar(100) NOT NULL,
  `createdAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updatedAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `phoneNo`, `dob`, `gender`, `accountType`, `depositAmount`, `nid/passport`, `password`, `presentAddress`, `permanentAddress`, `imageUrl`, `createdAt`, `updatedAt`) VALUES
(1, 'Aronno', 'Prasad', 'user@fake.com', 1405098447, '2025-05-15', 'male', 'savings', 1212, 3243233474, '$2y$10$O7kPZGyW6cccZw/sCNS6g.O0PYTEj91qEoP7Fzs38HL8xEL39A2l.', 0, 'Dhaka, Bangladesh', '../assets/uploads/profilePicture/', '2025-05-16 15:41:58.000000', '2025-05-16 15:41:58.000000'),
(2, 'Zobaer', 'Ahmed', 'zobaer@fake.com', 1995325949, '2025-05-02', 'male', 'savings', 1212, 1251625671, '$2y$10$MswU/0ty4G1XMAFuhHOABO/Vxzkfkk37BXW/fbrhFrjGbM8qE/Ysa', 0, 'Dhaka, Bangladesh', '../assets/uploads/profilePicture/', '2025-05-16 15:55:37.000000', '2025-05-16 15:55:37.000000'),
(3, 'Jahid', 'Ahmed', 'fake@test.com', 1536346346, '2025-05-01', 'male', 'checking', 121111, 2121212121, '$2y$10$FvjR/ZChwl5trZt7tAUAeOjja1QzlunYfiqH6lSRbd.TwFzhbL5hi', 0, 'Noakhali, Nohaillah', '../assets/uploads/profilePicture/1747425692.png', '2025-05-16 16:01:31.000000', '2025-05-16 16:01:31.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `updatedAt` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
