-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 02:59 AM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `account_number` varchar(20) NOT NULL,
  `account_type` varchar(100) DEFAULT NULL,
  `balance` decimal(12,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `account_status` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `user_id`, `account_number`, `account_type`, `balance`, `currency`, `account_status`, `created_at`, `updated_at`) VALUES
(2, 2, '1604853088', 'checking', 10.00, 'BDT', 'active', '2025-05-27 13:21:43', '2025-05-27 21:04:27'),
(3, 3, '8024815668', 'savings', 755.00, 'BDT', 'active', '2025-05-27 13:27:11', '2025-05-28 03:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(11) NOT NULL,
  `card_type` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp(),
  `expiry_date` date NOT NULL,
  `user_id` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `card_pins`
--

CREATE TABLE `card_pins` (
  `pin_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `deposit_id` int(11) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `deposit_type` varchar(50) NOT NULL,
  `deposit_method` varchar(50) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `amount_per_deposit` decimal(12,2) DEFAULT NULL,
  `deposit_amount` decimal(12,2) DEFAULT NULL,
  `memo` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`deposit_id`, `account_no`, `deposit_type`, `deposit_method`, `currency`, `amount_per_deposit`, `deposit_amount`, `memo`, `user_id`, `account_id`) VALUES
(14, '8024815668', 'fixed', '', 'USD', 10000.00, 10000.00, '', 3, 3),
(15, '8024815668', 'fixed', '', 'USD', 2000.00, 2000.00, '', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposits`
--

CREATE TABLE `fixed_deposits` (
  `deposit_id` int(11) NOT NULL,
  `tenure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fixed_deposits`
--

INSERT INTO `fixed_deposits` (`deposit_id`, `tenure`) VALUES
(14, 36),
(15, 24);

-- --------------------------------------------------------

--
-- Table structure for table `fund_transfers`
--

CREATE TABLE `fund_transfers` (
  `transfer_id` int(11) NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `transfer_type` varchar(100) DEFAULT NULL,
  `transfer_status` varchar(100) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `loan_id` int(11) NOT NULL,
  `employment_type` varchar(100) NOT NULL,
  `currency` int(11) NOT NULL,
  `loan_type` varchar(100) NOT NULL,
  `monthly_income` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `acknowledgement_slip_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_bills`
--

CREATE TABLE `pay_bills` (
  `bill_id` int(11) NOT NULL,
  `dest_account_no` int(11) NOT NULL,
  `biller` varchar(100) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `memo` varchar(100) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `account_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_bills`
--

INSERT INTO `pay_bills` (`bill_id`, `dest_account_no`, `biller`, `currency`, `payment_amount`, `memo`, `receipt`, `user_id`, `account_id`, `account_no`) VALUES
(12, 2147483647, 'internet', 'BDT', 300, '', '../assets/uploads/payBill/1748357403.pdf', 2, 2, 1604853088),
(13, 1212121212, 'internet', 'BDT', 190, '', '../assets/uploads/payBill/1748358267.pdf', 2, 2, 1604853088),
(14, 1892091567, 'phone', 'BDT', 245, '', '../assets/uploads/payBill/1748380485.png', 3, 3, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `recurring_deposits`
--

CREATE TABLE `recurring_deposits` (
  `deposit_id` int(11) NOT NULL,
  `deposit_frequency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
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
  `presentAddress` varchar(100) NOT NULL,
  `permanentAddress` varchar(100) NOT NULL,
  `imageUrl` varchar(100) NOT NULL,
  `createdAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updatedAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstName`, `lastName`, `email`, `phoneNo`, `dob`, `gender`, `accountType`, `depositAmount`, `nid/passport`, `password`, `presentAddress`, `permanentAddress`, `imageUrl`, `createdAt`, `updatedAt`, `role_id`) VALUES
(1, 'S. S. Zobaer', 'Ahmed', 'zobaer@fake.com', 1405098447, '2003-10-25', 'male', 'savings', 50000, 3486701911, 'zobaer123', 'Jagannathpur, Basundhara Road, Vatara, Dhaka - 1229', 'Nawabganj, Nawabganj, Dhaka - 1230', '../assets/uploads/profilePicture/1748346475.jpg', '2025-05-27 12:21:27.188820', '2025-05-27 08:21:27.000000', 1),
(2, 'Najmul Hassan', 'Nayeem', 'dollarnayeem@gmail.com', 1607984450, '2002-02-02', 'male', 'checking', 10, 8735690378, '01405098', 'Airport Road, Dhaka', 'Comilla', '../assets/uploads/profilePicture/1748355580.jpg', '2025-05-27 15:04:27.445380', '2025-05-27 10:19:40.000000', 2),
(3, 'Abid Hossain', 'Mahid', 'abid@fake.com', 1607984450, '2000-02-02', 'male', 'savings', 755, 2323564534, 'abid2232', 'Basundhara C Block', 'Narayanganj', '../assets/uploads/profilePicture/1748345153.jpg', '2025-05-27 21:14:45.047039', '2025-05-27 07:25:52.000000', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `card_pins`
--
ALTER TABLE `card_pins`
  ADD PRIMARY KEY (`pin_id`),
  ADD KEY `card_id` (`card_id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`deposit_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `fund_transfers`
--
ALTER TABLE `fund_transfers`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pay_bills`
--
ALTER TABLE `pay_bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `recurring_deposits`
--
ALTER TABLE `recurring_deposits`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `updatedAt` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_pins`
--
ALTER TABLE `card_pins`
  MODIFY `pin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fund_transfers`
--
ALTER TABLE `fund_transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_bills`
--
ALTER TABLE `pay_bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `card_pins`
--
ALTER TABLE `card_pins`
  ADD CONSTRAINT `card_pins_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `cards` (`card_id`);

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `deposits_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `fixed_deposits`
--
ALTER TABLE `fixed_deposits`
  ADD CONSTRAINT `fixed_deposits_ibfk_1` FOREIGN KEY (`deposit_id`) REFERENCES `deposits` (`deposit_id`) ON DELETE CASCADE;

--
-- Constraints for table `fund_transfers`
--
ALTER TABLE `fund_transfers`
  ADD CONSTRAINT `fund_transfers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fund_transfers_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `loan_applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pay_bills`
--
ALTER TABLE `pay_bills`
  ADD CONSTRAINT `pay_bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pay_bills_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `recurring_deposits`
--
ALTER TABLE `recurring_deposits`
  ADD CONSTRAINT `recurring_deposits_ibfk_1` FOREIGN KEY (`deposit_id`) REFERENCES `deposits` (`deposit_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
