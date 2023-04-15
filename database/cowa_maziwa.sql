-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 04:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cowa_maziwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection_centers`
--

CREATE TABLE `collection_centers` (
  `id` int(11) NOT NULL,
  `cooperative_id` varchar(20) NOT NULL,
  `clerk_id` varchar(20) NOT NULL,
  `centerName` varchar(254) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection_centers`
--

INSERT INTO `collection_centers` (`id`, `cooperative_id`, `clerk_id`, `centerName`, `created_at`, `updated_at`) VALUES
(14, '5', '6', 'miriki', '2022-07-29 09:44:22', '2022-07-29 09:44:22'),
(15, '5', '6', 'mbayo', '2022-07-29 09:49:28', '2022-07-29 09:49:28'),
(16, '5', '6', 'cowa', '2022-07-29 14:17:07', '2022-07-29 14:17:07'),
(17, '5', '6', 'Roysambu', '2022-09-06 09:56:56', '2022-09-06 09:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `cooperatives`
--

CREATE TABLE `cooperatives` (
  `id` int(11) NOT NULL,
  `cooperativeName` varchar(254) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cooperatives`
--

INSERT INTO `cooperatives` (`id`, `cooperativeName`, `created_at`, `updated_at`) VALUES
(5, 'Arithi', '2022-07-29 09:39:20', '2022-07-29 09:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_fname` varchar(254) DEFAULT NULL,
  `emp_lname` varchar(254) DEFAULT NULL,
  `item_name` text NOT NULL,
  `date` text NOT NULL,
  `amount` text NOT NULL,
  `total_amount` varchar(254) NOT NULL DEFAULT '0',
  `description` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `farmers_biodata`
--

CREATE TABLE `farmers_biodata` (
  `id` int(11) NOT NULL,
  `fname` varchar(254) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(254) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `farmerID` varchar(254) NOT NULL,
  `contact1` varchar(254) NOT NULL,
  `contact2` varchar(254) DEFAULT NULL,
  `gender` varchar(254) NOT NULL,
  `join_date` varchar(254) NOT NULL,
  `center_id` varchar(254) NOT NULL,
  `location` varchar(254) NOT NULL,
  `marital_status` varchar(254) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_branch` varchar(100) DEFAULT NULL,
  `acc_name` varchar(200) DEFAULT NULL,
  `acc_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers_biodata`
--

INSERT INTO `farmers_biodata` (`id`, `fname`, `mname`, `lname`, `id_number`, `farmerID`, `contact1`, `contact2`, `gender`, `join_date`, `center_id`, `location`, `marital_status`, `bank_name`, `bank_branch`, `acc_name`, `acc_number`, `created_at`, `updated_at`) VALUES
(1, 'Ancent', '', 'Mbithi', '33366869', 'COWA105', '0795974284', '', 'male', '01/09/2022', '17', 'Kitundu', 'single', 'KCB', 'Thika', 'Ancent', '566666', '2022-09-14 18:00:35', '2022-09-14 18:00:35'),
(2, 'Dennis', '', 'Mutuku', '33366860', 'MBA2016', '0789098765', '', 'male', '02/09/2022', '17', 'Kitundu', 'married', 'KCB', 'Thika', 'Denniss', '89076655544', '2022-09-14 18:03:20', '2022-09-14 18:03:20'),
(3, 'Bibian', '', 'Mumo', '33366865', 'MBA2022', '0742789098', '', 'male', '01/09/2022', '17', 'Kitundu', 'single', 'KCB', 'Thika', 'Bibian', '908765432', '2022-09-14 18:04:50', '2022-09-14 18:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `itemName`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Salt', '', '2', '2022-08-31 08:33:44', '2022-08-31 08:33:44'),
(2, 'Hay', '', '2', '2022-08-31 12:57:53', '2022-08-31 12:57:53'),
(3, 'Bucket', '', '2', '2022-08-31 12:58:19', '2022-08-31 12:58:19'),
(4, 'Silage', '', '9', '2022-09-06 10:02:41', '2022-09-06 10:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `milk_collections`
--

CREATE TABLE `milk_collections` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `center_id` varchar(20) NOT NULL,
  `collection_date` varchar(254) NOT NULL,
  `farmerID` varchar(20) NOT NULL,
  `morning` varchar(100) NOT NULL,
  `evening` varchar(100) NOT NULL,
  `rejected` varchar(100) NOT NULL,
  `total` varchar(254) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milk_collections`
--

INSERT INTO `milk_collections` (`id`, `user_id`, `center_id`, `collection_date`, `farmerID`, `morning`, `evening`, `rejected`, `total`, `created_at`, `updated_at`) VALUES
(1, '2', '17', '14/09/2022', 'COWA105', '20', '20', '0', '40', '2022-09-14 18:13:27', '2022-09-14 18:13:27'),
(4, '2', '17', '14/09/2022', 'COWA105', '9', '7', '0', '16', '2022-09-14 20:12:51', '2022-09-14 20:12:51'),
(5, '2', '17', '14/09/2022', 'MBA2016', '6', '8', '0', '14', '2022-09-14 20:12:51', '2022-09-14 20:12:51'),
(6, '2', '17', '14/09/2022', 'MBA2022', '7', '8', '9', '6', '2022-09-14 20:12:51', '2022-09-14 20:12:51'),
(7, '2', '17', '15/09/2022', 'COWA105', '4', '5', '2', '7', '2022-09-15 19:50:03', '2022-09-15 19:50:03'),
(8, '2', '17', '15/09/2022', 'MBA2016', '4', '6', '0', '10', '2022-09-15 19:50:03', '2022-09-15 19:50:03'),
(9, '2', '17', '15/09/2022', 'MBA2022', '12', '12', '0', '24', '2022-09-15 19:50:03', '2022-09-15 19:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `milk_rates`
--

CREATE TABLE `milk_rates` (
  `id` int(11) NOT NULL,
  `rateName` varchar(254) DEFAULT NULL,
  `milkRate` varchar(254) NOT NULL,
  `runs_from` varchar(200) DEFAULT NULL,
  `runs_to` varchar(200) DEFAULT NULL,
  `updated_by` varchar(254) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milk_rates`
--

INSERT INTO `milk_rates` (`id`, `rateName`, `milkRate`, `runs_from`, `runs_to`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'mario', '45', '01/09/2022', '30/09/2022', '2', '2022-08-10 19:40:20', '2022-09-07 08:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `from_date` varchar(100) NOT NULL,
  `to_date` varchar(100) NOT NULL,
  `milkRate` varchar(50) NOT NULL,
  `farmerID` varchar(100) NOT NULL,
  `total_morning` varchar(100) NOT NULL,
  `total_evening` varchar(100) NOT NULL,
  `total_rejected` varchar(80) NOT NULL,
  `total_milk` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `from_date`, `to_date`, `milkRate`, `farmerID`, `total_morning`, `total_evening`, `total_rejected`, `total_milk`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '01/09/2022', '30/09/2022', '45', 'COWA105', '', '', '', '56', '2', '2022-09-14 20:18:35', '2022-09-14 20:18:35'),
(2, '01/09/2022', '30/09/2022', '45', 'MBA2016', '', '', '', '48', '2', '2022-09-14 20:18:35', '2022-09-14 20:18:35'),
(3, '01/09/2022', '30/09/2022', '45', 'MBA2022', '', '', '', '39', '2', '2022-09-14 20:18:35', '2022-09-14 20:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `payment_schedules`
--

CREATE TABLE `payment_schedules` (
  `id` int(11) NOT NULL,
  `scheduleName` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_schedules`
--

INSERT INTO `payment_schedules` (`id`, `scheduleName`, `start_date`, `end_date`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'August', '01/08/2022', '31/08/2022', '2', '2022-09-12 08:44:02', '2022-09-12 08:44:02'),
(2, 'September', '01/09/2022', '30/09/2022', '2', '2022-09-12 08:48:54', '2022-09-12 08:48:54'),
(3, 'July', '01/07/2022', '31/07/2022', '2', '2022-09-14 12:36:22', '2022-09-14 12:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(254) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roleName`, `created_at`, `updated_at`) VALUES
(1, 'Milk Clerk', '2022-07-26 09:00:37', '2022-07-26 09:00:37'),
(2, 'Secretary', '2022-07-26 09:02:07', '2022-07-26 09:02:07'),
(3, 'Super Admin', '2022-07-26 09:16:42', '2022-07-26 09:16:42'),
(4, 'Admin', '2022-07-26 09:16:52', '2022-07-26 09:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `shop_sales`
--

CREATE TABLE `shop_sales` (
  `id` int(11) NOT NULL,
  `farmerID` varchar(100) NOT NULL,
  `date` varchar(200) NOT NULL,
  `itemID` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `qty` varchar(100) NOT NULL,
  `unit_cost` varchar(250) NOT NULL DEFAULT '0',
  `amount` varchar(200) NOT NULL DEFAULT '0',
  `comments` text DEFAULT NULL,
  `user_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_sales`
--

INSERT INTO `shop_sales` (`id`, `farmerID`, `date`, `itemID`, `description`, `qty`, `unit_cost`, `amount`, `comments`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'MBA2022', '14/09/2022', '4', 'rest', '2', '350', '700', '', '2', '2022-09-14 18:15:06', '2022-09-14 18:15:06'),
(2, 'MBA2022', '14/09/2022', '3', 'rest', '3', '2000', '6000', '', '2', '2022-09-14 18:15:06', '2022-09-14 18:15:06'),
(3, 'MBA2016', '14/09/2022', '1', 'rest', '5', '500', '2500', '', '2', '2022-09-14 18:15:45', '2022-09-14 18:15:45'),
(4, 'MBA2016', '14/09/2022', '2', 'rest', '2', '500', '1000', '', '2', '2022-09-14 18:15:45', '2022-09-14 18:15:45'),
(5, 'MBA2022', '14/09/2022', '4', 'rest', '3', '500', '1500', '', '2', '2022-09-14 20:14:08', '2022-09-14 20:14:08'),
(6, 'MBA2022', '14/09/2022', '3', 'rest', '1', '900', '900', '', '2', '2022-09-14 20:14:08', '2022-09-14 20:14:08'),
(7, 'MBA2022', '14/09/2022', '2', 'rest', '3', '760', '2280', '', '2', '2022-09-14 20:14:08', '2022-09-14 20:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `sms_recipients`
--

CREATE TABLE `sms_recipients` (
  `id` int(11) NOT NULL,
  `api_key` varchar(254) NOT NULL,
  `password` varchar(200) NOT NULL,
  `recipients` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms_recipients`
--

INSERT INTO `sms_recipients` (`id`, `api_key`, `password`, `recipients`, `created_at`, `updated_at`) VALUES
(1, 'AJv7a6CRKB2iWzObkwuLn9EFhQIxgZ', 'Admin@2020', '0795974284', '2021-05-05 06:23:27', '2021-05-05 06:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'Admin1@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '', '2021-02-15 12:52:50', '2021-02-15 12:52:50'),
(2, 'Ancent', 'marion', 'Admin@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '', '2021-02-16 03:25:21', '2021-02-16 03:25:21'),
(3, 'Ancent', 'Mbithi', 'adm@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '4', '2022-07-26 12:27:47', '2022-07-26 12:27:47'),
(4, 'James', 'Bundi', 'james@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '3', '2022-07-26 12:42:53', '2022-07-26 12:42:53'),
(5, 'Ancent', 'Mbithi', 'admin1@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '3', '2022-07-26 13:09:13', '2022-07-26 13:09:13'),
(6, 'Milk', 'Clerk', 'milkClerk@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '1', '2022-07-28 08:56:45', '2022-07-28 08:56:45'),
(7, 'david', 'kabage', 'david@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '3', '2022-07-28 14:21:35', '2022-07-28 14:21:35'),
(8, 'cowa', 'NGO', 'cowa@gmail.com', '9e061dc6c341bfb89f01f5bcd11dc99f', '1', '2022-07-29 14:21:15', '2022-07-29 14:21:15'),
(9, 'Leah', 'Wangu', 'leahwangu@gmail.co', '9e061dc6c341bfb89f01f5bcd11dc99f', '4', '2022-09-06 09:54:12', '2022-09-06 09:54:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection_centers`
--
ALTER TABLE `collection_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cooperatives`
--
ALTER TABLE `cooperatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers_biodata`
--
ALTER TABLE `farmers_biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milk_collections`
--
ALTER TABLE `milk_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milk_rates`
--
ALTER TABLE `milk_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_schedules`
--
ALTER TABLE `payment_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_sales`
--
ALTER TABLE `shop_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_recipients`
--
ALTER TABLE `sms_recipients`
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
-- AUTO_INCREMENT for table `collection_centers`
--
ALTER TABLE `collection_centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cooperatives`
--
ALTER TABLE `cooperatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers_biodata`
--
ALTER TABLE `farmers_biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `milk_collections`
--
ALTER TABLE `milk_collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `milk_rates`
--
ALTER TABLE `milk_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_schedules`
--
ALTER TABLE `payment_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_sales`
--
ALTER TABLE `shop_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sms_recipients`
--
ALTER TABLE `sms_recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
