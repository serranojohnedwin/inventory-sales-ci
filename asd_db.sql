-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 07:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `password` char(60) NOT NULL,
  `role` char(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `last_seen` datetime NOT NULL,
  `last_edited` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account_status` char(1) NOT NULL DEFAULT '1',
  `deleted` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile1`, `mobile2`, `password`, `role`, `created_on`, `last_login`, `last_seen`, `last_edited`, `account_status`, `deleted`) VALUES
(16, 'Billie christine', 'Panopio', 'admin@gmail.com', '0912301203213', '0912301203214', '$2y$10$2CJ78/BEVxoN6yUlvf7Py.VDHkoPu6E1quopMbhqQI4kBNgnOIICq', 'Super', '2021-11-25 16:18:10', '2022-04-13 15:46:54', '2022-04-13 17:14:05', '2022-04-13 09:14:05', '1', '0'),
(32, 'John Edwin', 'Serrano', 'cashier@gmail.com', '09675564556', '', '$2y$10$sY4d3SMW56t2AH8wuMzkHuClIJWYYklWC7B9tCHF7UU9UJ8M3C6x2', 'Cashier', '2021-12-16 12:14:45', '2021-12-20 20:30:50', '2021-12-20 21:14:08', '2021-12-20 13:14:08', '1', '0'),
(33, 'Marc', 'Maceda', 'marc@gmail.com', '09234234222', '09234234222', '$2y$10$pKaSvWLoaDjBzXL86wyGxuUi/f.A0TmP7OX2k79G92COMHdij2H0.', 'Cashier', '2021-12-20 20:09:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-20 12:09:33', '1', '0'),
(34, 'Bill', 'Maceda', 'bill@gmail.com', '09239492394', '0039492394923', '$2y$10$Bfd5yA5k5jGN/Xrmst9qoOQ.c.vmNId27Q27/tURPCvNVD1lcBt0q', 'Cashier', '2021-12-20 20:11:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-20 12:23:36', '0', '0'),
(35, 'Christian', 'Maceda', 'christian@gmail.com', '09949294923', '09949294924', '$2y$10$yHULUPwlSfWR8tJKxBULDewNdIMZle9HKRkFFdqaEExGvb3XH.0ve', 'Cashier', '2021-12-20 20:12:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-20 12:12:51', '1', '0'),
(36, 'Bill panopio -', 'Maceda', 'bill2@gmail.com', '09492394922', '092394923943', '$2y$10$gwrTn1g72eeuFTkuAJfQd.f02TM1Qc7JXp2ubwVBjyyPuH0KBB4aG', 'Cashier', '2021-12-20 20:13:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-20 12:13:37', '1', '0'),
(37, 'Sabrina', 'Panopio', 'sab@gmail.com', '09394929492', '09394929493', '$2y$10$sSzR9iwy8k5uLA7A1TXMAO4WKBtZRYZnzeSu5VOCFbKTGuNFIb.Pi', 'Cashier', '2021-12-20 20:24:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-20 12:24:58', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `eventlog`
--

CREATE TABLE `eventlog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(200) NOT NULL,
  `eventRowIdOrRef` varchar(20) DEFAULT NULL,
  `eventDesc` text DEFAULT NULL,
  `eventTable` varchar(20) DEFAULT NULL,
  `staffInCharge` bigint(20) UNSIGNED NOT NULL,
  `eventTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlog`
--

INSERT INTO `eventlog` (`id`, `event`, `eventRowIdOrRef`, `eventDesc`, `eventTable`, `staffInCharge`, `eventTime`) VALUES
(45, 'Creation of new item', '26', 'Addition of 30 quantities of a new item \'AMD RYZEN 5 3400g\' with a unit price of $16,000.00 to stock', 'items', 1, '2021-11-13 07:48:01'),
(46, 'Creation of new item', '27', 'Addition of 30 quantities of a new item \'NVIDIA RTX 3090\' with a unit price of $90,000.00 to stock', 'items', 1, '2021-11-13 07:48:26'),
(47, 'Creation of new item', '28', 'Addition of 30 quantities of a new item \'Vengeance RGB 16gb\' with a unit price of $5,000.00 to stock', 'items', 1, '2021-11-13 07:49:22'),
(48, 'New Transaction', '62099326', '1 items totalling $91,726.96 with reference number 62099326 was purchased', 'transactions', 4, '2021-11-13 07:56:29'),
(49, 'Creation of new item', '29', 'Addition of 30 quantities of a new item \'ASUS Motherboard\' with a unit price of $10,000.00 to stock', 'items', 1, '2021-11-13 08:20:41'),
(50, 'Creation of new item', '30', 'Addition of 30 quantities of a new item \'wa\' with a unit price of $20.00 to stock', 'items', 1, '2021-11-13 08:21:14'),
(51, 'Creation of new item', '31', 'Addition of 30 quantities of a new item \'saf\' with a unit price of $30.00 to stock', 'items', 1, '2021-11-13 08:21:55'),
(52, 'Creation of new item', '32', 'Addition of 30 quantities of a new item \'CV 750\' with a unit price of $4,000.00 to stock', 'items', 1, '2021-11-13 08:36:46'),
(53, 'New Transaction', '9714725', '1 items totalling $90,844.97 with reference number 9714725 was purchased', 'transactions', 4, '2021-11-13 08:39:30'),
(54, 'New Transaction', '038756', '1 items totalling $90,000.00 with reference number 038756 was purchased', 'transactions', 6, '2021-11-14 10:22:35'),
(55, 'New Transaction', '968225', '0 items totalling $0.00 with reference number 968225 was purchased', 'transactions', 6, '2021-11-14 10:23:14'),
(56, 'New Transaction', '152769130', '1 items totalling $5,000.00 with reference number 152769130 was purchased', 'transactions', 6, '2021-11-14 10:23:30'),
(57, 'New Transaction', '180476', '1 items totalling $16,000.00 with reference number 180476 was purchased', 'transactions', 4, '2021-11-25 06:48:26'),
(58, 'Creation of new item', '33', 'Addition of 20 quantities of a new item \'test\' with a unit price of $5,700.00 to stock', 'items', 12, '2021-11-25 07:58:40'),
(59, 'New Transaction', '249112073', '1 items totalling $28,500.00 with reference number 249112073 was purchased', 'transactions', 30, '2021-11-25 09:51:39'),
(60, 'New Transaction', '5926205', '1 items totalling $90,000.00 with reference number 5926205 was purchased', 'transactions', 30, '2021-11-25 10:13:14'),
(61, 'New Transaction', '16023492', '1 items totalling $79,800.00 with reference number 16023492 was purchased', 'transactions', 30, '2021-11-25 10:16:37'),
(62, 'New Transaction', '908135840', '1 items totalling $180,000.00 with reference number 908135840 was purchased', 'transactions', 30, '2021-11-25 10:24:02'),
(63, 'Stock Update (New Stock)', '27', '<p>30 quantities of NVIDIA RTX 3090 was added to stock</p>\n                Reason: <p>New items were purchased</p>', 'items', 16, '2021-11-25 10:50:46'),
(64, 'New Transaction', '068258603', '0 items totalling $0.00 with reference number 068258603 was purchased', 'transactions', 30, '2021-11-25 10:56:53'),
(65, 'New Transaction', '4972070', '1 items totalling $100,000.00 with reference number 4972070 was purchased', 'transactions', 30, '2021-11-25 10:57:18'),
(66, 'New Transaction', '03917950', '1 items totalling $900,000.00 with reference number 03917950 was purchased', 'transactions', 28, '2021-12-07 18:56:53'),
(67, 'New Transaction', '786209', '1 items totalling $90,000.00 with reference number 786209 was purchased', 'transactions', 28, '2021-12-11 21:10:32'),
(68, 'New Transaction', '679684', '1 items totalling $170,000.00 with reference number 679684 was purchased', 'transactions', 28, '2021-12-11 21:12:13'),
(69, 'Stock Update (New Stock)', '29', '<p>16 quantities of ASUS Motherboard was added to stock</p>\n                Reason: <p>New items were purchased</p>', 'items', 16, '2021-12-11 21:13:28'),
(70, 'New Transaction', '87609386', '0 items totalling $0.00 with reference number 87609386 was purchased', 'transactions', 28, '2021-12-15 12:29:05'),
(71, 'New Transaction', '13654295', '1 items totalling $16,000.00 with reference number 13654295 was purchased', 'transactions', 28, '2021-12-15 12:29:22'),
(72, 'Creation of new item', '34', 'Addition of 15 quantities of a new item \'Test Item 32 GB\' with a unit price of $150,000.00 to stock', 'items', 16, '2021-12-16 03:57:47'),
(73, 'Stock Update (New Stock)', '28', '<p>500 quantities of Vengeance RGB 16gb was added to stock</p>\n                Reason: <p>New items were purchased</p>', 'items', 16, '2021-12-16 03:58:08'),
(74, 'Item Update', '28', 'Details of item with code \'3\' was updated', 'items', 16, '2021-12-16 03:58:43'),
(75, 'New Transaction', '62731867', '1 items totalling $149,940.00 with reference number 62731867 was purchased', 'transactions', 32, '2021-12-16 04:27:31'),
(76, 'Item Update', '34', 'Details of item with code \'5\' was updated', 'items', 16, '2021-12-16 05:00:04'),
(77, 'Stock Update (New Stock)', '29', '<p>15 quantities of ASUS Motherboard was added to stock</p>\n                Reason: <p>New items were purchased</p>', 'items', 16, '2021-12-16 05:43:54'),
(78, 'New Transaction', '201254', '1 items totalling $90,000.00 with reference number 201254 was purchased', 'transactions', 32, '2021-12-16 05:44:50'),
(79, 'New Transaction', '84297048', '2 items totalling $106,000.00 with reference number 84297048 was purchased', 'transactions', 32, '2021-12-16 05:46:46'),
(80, 'New Transaction', '36241328', '1 items totalling $15,998.40 with reference number 36241328 was purchased', 'transactions', 32, '2021-12-16 06:42:20'),
(81, 'New Transaction', '92504586', '2 items totalling $85,648.00 with reference number 92504586 was purchased', 'transactions', 32, '2021-12-20 12:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `quantity` int(6) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `code`, `description`, `unitPrice`, `quantity`, `dateAdded`, `lastUpdated`) VALUES
(26, 'AMD RYZEN 5 3400g', '1', 'Processors\r\n', '16000.00', 25, '2021-11-13 15:48:01', '2021-12-20 12:27:40'),
(27, 'NVIDIA RTX 3090', '2', 'Video Cards', '90000.00', 40, '2021-11-13 15:48:26', '2021-12-20 12:27:40'),
(29, 'ASUS Motherboard', '4', 'Motherboard', '10000.00', 19, '2021-11-13 16:20:41', '2021-12-16 05:43:54'),
(34, 'Vengeance RGB 32gb', '5', 'RAM', '150000.00', 15, '2021-12-16 11:57:47', '2021-12-16 05:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `lk_sess`
--

CREATE TABLE `lk_sess` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transId` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(10) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `itemCode` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(6) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `totalMoneySpent` decimal(10,2) NOT NULL,
  `amountTendered` decimal(10,2) NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `discount_percentage` decimal(10,2) NOT NULL,
  `vatPercentage` decimal(10,2) NOT NULL,
  `vatAmount` decimal(10,2) NOT NULL,
  `changeDue` decimal(10,2) NOT NULL,
  `modeOfPayment` varchar(20) NOT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `cust_phone` varchar(15) DEFAULT NULL,
  `cust_email` varchar(50) DEFAULT NULL,
  `transType` char(1) NOT NULL,
  `staffId` bigint(20) UNSIGNED NOT NULL,
  `transDate` datetime NOT NULL,
  `lastUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cancelled` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transId`, `ref`, `itemName`, `itemCode`, `description`, `quantity`, `unitPrice`, `totalPrice`, `totalMoneySpent`, `amountTendered`, `discount_amount`, `discount_percentage`, `vatPercentage`, `vatAmount`, `changeDue`, `modeOfPayment`, `cust_name`, `cust_phone`, `cust_email`, `transType`, `staffId`, `transDate`, `lastUpdated`, `cancelled`) VALUES
(37, '36241328', 'AMD RYZEN 5 3400g', '1', '', 1, '16000.00', '16000.00', '15998.40', '16000.00', '160.00', '1.00', '1.00', '158.40', '1.60', 'Cash', 'Yuri Garcia', '0897348384487', 'yuri@gmail.com', '1', 32, '2021-12-16 14:42:20', '2021-12-16 06:42:20', '0'),
(38, '92504586', 'AMD RYZEN 5 3400g', '1', '', 1, '16000.00', '16000.00', '85648.00', '160000.00', '21200.00', '20.00', '1.00', '848.00', '74352.00', 'Cash', 'Ed Sheeran', '09249923942', 'ed@gmail.com', '1', 32, '2021-12-20 20:27:40', '2021-12-20 12:27:40', '0'),
(39, '92504586', 'NVIDIA RTX 3090', '2', '', 1, '90000.00', '90000.00', '85648.00', '160000.00', '21200.00', '20.00', '1.00', '848.00', '74352.00', 'Cash', 'Ed Sheeran', '09249923942', 'ed@gmail.com', '1', 32, '2021-12-20 20:27:40', '2021-12-20 12:27:40', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile1` (`mobile1`);

--
-- Indexes for table `eventlog`
--
ALTER TABLE `eventlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `eventlog`
--
ALTER TABLE `eventlog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
