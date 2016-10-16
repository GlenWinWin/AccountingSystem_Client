-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 04:51 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accounting_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Safety Equipments'),
(2, 'Appliances'),
(3, 'Cleaning tools');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE IF NOT EXISTS `commissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `commission` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `distributor_id`, `commission`, `created_at`, `updated_at`) VALUES
(1, 6, 1518.077, NULL, NULL),
(2, 67, 1440, NULL, NULL),
(3, 68, 2911.112, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_sub_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `item_subcostPrice` double NOT NULL,
  `item_sellingPrice` double NOT NULL,
  `item_image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_category`, `item_sub_category`, `item_name`, `item_quantity`, `item_costPrice`, `item_subcostPrice`, `item_sellingPrice`, `item_image_path`) VALUES
(1, '1', '2', 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 4275, 27.5, 30, 100.02, 'assets/images/item_pictures/spectacles.jpg'),
(2, '1', '1', 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 4032, 180, 207, 280.75, 'assets/images/item_pictures/hardhat.jpg'),
(3, '1', '3', 'GIDEON PORTABLE EYEWASH - YELLOW', 4687, 4500, 5175, 14000, 'assets/images/item_pictures/eyewash.jpg'),
(6, '3', '13', 'The Mop', 458, 450.55, 345.75, 555.56, 'assets/images/item_pictures/mop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `manage_privileges`
--

CREATE TABLE IF NOT EXISTS `manage_privileges` (
  `clerk_id` int(11) NOT NULL,
  `sales_encoding` int(11) NOT NULL,
  `account_registration` int(11) NOT NULL,
  `add_clerk` int(11) NOT NULL,
  `use_inventory` int(11) NOT NULL,
  `generate_report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manage_privileges`
--

INSERT INTO `manage_privileges` (`clerk_id`, `sales_encoding`, `account_registration`, `add_clerk`, `use_inventory`, `generate_report`) VALUES
(2, 0, 0, 0, 1, 0),
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_02_140808_create_table_items', 1),
('2016_08_02_144052_create_table_transactions', 1),
('2016_08_02_144400_create_table_transaction_details', 1),
('2016_08_02_150322_create_table_manage_privileges', 1),
('2016_08_02_150807_create_table_receivings', 1),
('2016_08_02_151025_create_table_receiving_details', 1),
('2016_08_02_151535_create_table_sales', 1),
('2016_08_02_152115_create_table_sales_details', 1),
('2016_08_17_093358_create_category_table', 2),
('2016_08_17_094009_create_subcategory_table', 3),
('2016_08_21_022242_create_temporary_sales', 4),
('2016_08_21_140715_create_temporary_sales_main_table', 4),
('2016_08_23_213509_create_temporary_receivings', 5),
('2016_08_23_213521_create_temporary_receivings_details', 5),
('2016_09_14_143814_create_table_commissions', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivings`
--

CREATE TABLE IF NOT EXISTS `receivings` (
  `receiving_id` int(11) NOT NULL AUTO_INCREMENT,
  `clerk_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `trans_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receiving_details`
--

CREATE TABLE IF NOT EXISTS `receiving_details` (
  `receiving_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receiving_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receive_quantity` int(11) NOT NULL,
  `receive_subtotal` double NOT NULL,
  `receive_price` double NOT NULL,
  PRIMARY KEY (`receiving_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `clerk_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `trans_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `distributor_id`, `clerk_id`, `created_at`, `trans_ID`, `updated_at`) VALUES
(1, 6, 2, '2016-10-16 04:04:26', 'TRANS-0000000001', '2016-10-16 04:04:26'),
(2, 6, 2, '2016-10-16 04:06:05', 'TRANS-0000000002', '2016-10-16 04:06:05'),
(3, 67, 2, '2016-10-16 04:08:32', 'TRANS-0000000003', '2016-10-16 04:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_price` double NOT NULL,
  `sales_subtotal` double NOT NULL,
  `sales_id` int(11) NOT NULL,
  PRIMARY KEY (`sale_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sale_detail_id`, `item_id`, `item_name`, `sales_quantity`, `sales_price`, `sales_subtotal`, `sales_id`) VALUES
(1, 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 14000, 14000, 1),
(2, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 1, 100.02, 100.02, 1),
(3, 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 1, 280.75, 280.75, 1),
(4, 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 14000, 14000, 2),
(5, 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 2, 14000, 28000, 3),
(6, 6, 'The Mop', 2, 555.56, 1111.12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'Head'),
(2, 1, 'Eye'),
(3, 1, 'Eyewash'),
(4, 1, 'Ear'),
(5, 1, 'Respiratory'),
(6, 1, 'Body'),
(7, 1, 'Full'),
(8, 1, 'Hand'),
(9, 1, 'Safety Shoes'),
(10, 1, 'Rescue'),
(11, 1, 'Elbow'),
(12, 2, 'Microwave'),
(13, 3, 'Bathroom');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_receivings`
--

CREATE TABLE IF NOT EXISTS `temporary_receivings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_receivings_details`
--

CREATE TABLE IF NOT EXISTS `temporary_receivings_details` (
  `temporary_receivings_details_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `clerk_id` int(11) NOT NULL,
  PRIMARY KEY (`temporary_receivings_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sales`
--

CREATE TABLE IF NOT EXISTS `temporary_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sales_details`
--

CREATE TABLE IF NOT EXISTS `temporary_sales_details` (
  `temporary_sales_details_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `clerk_id` int(11) NOT NULL,
  PRIMARY KEY (`temporary_sales_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `transactID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `typeOfTransaction` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `distributor_id`, `created_at`, `transactID`, `typeOfTransaction`, `updated_at`) VALUES
(1, 6, '2016-10-16 04:04:26', 'TRANS-0000000001', 0, '2016-10-16 04:04:26'),
(2, 67, '2016-10-16 04:06:05', 'TRANS-0000000002', 0, '2016-10-16 04:06:31'),
(3, 68, '2016-10-16 04:08:32', 'TRANS-0000000003', 0, '2016-10-16 04:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE IF NOT EXISTS `transaction_details` (
  `transaction_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_quantity` int(11) NOT NULL,
  `transaction_costPrice` double NOT NULL,
  `transaction_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`transaction_id`, `item_id`, `item_name`, `transaction_quantity`, `transaction_costPrice`, `transaction_subtotal`) VALUES
('TRANS-0000000001', 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 14000, 14000),
('TRANS-0000000001', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 1, 100.02, 100.02),
('TRANS-0000000001', 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 1, 280.75, 280.75),
('TRANS-0000000002', 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 14000, 14000),
('TRANS-0000000003', 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 2, 14000, 28000),
('TRANS-0000000003', 6, 'The Mop', 2, 555.56, 1111.12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `typeOfUser` int(11) NOT NULL,
  `channelPosition` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `connectCounter` int(11) NOT NULL,
  `monthCounter` int(11) NOT NULL,
  `totalSalesMonth` double NOT NULL,
  `totalSales` double NOT NULL,
  `totalNewMemberMonth` int(11) NOT NULL,
  `totalNewMember` int(11) NOT NULL,
  `profile_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passsword_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateToFinish` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `totalPersonalSales` double NOT NULL,
  `totalGroupSales` double NOT NULL,
  `totalNewCAMonth` int(11) NOT NULL,
  `targetGroupSales` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=69 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `name`, `username`, `email`, `password`, `address`, `contact`, `typeOfUser`, `channelPosition`, `distributor_id`, `connectCounter`, `monthCounter`, `totalSalesMonth`, `totalSales`, `totalNewMemberMonth`, `totalNewMember`, `profile_path`, `remember_token`, `created_at`, `updated_at`, `passsword_text`, `userID`, `dateToFinish`, `totalPersonalSales`, `totalGroupSales`, `totalNewCAMonth`, `targetGroupSales`) VALUES
(1, 'Admin', 'System', 'Admin System', 'admin', 'admin@gmail.com', '$2y$10$rPwvV.3D3Ip4uTzC6DIT4u17WqO7LJtjM0vk6LKhe/woaUQbHkucu', 'tondo', '09358217701', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/joker.jpg', 'wfdXDl40PLUeKmcFxgdFycUFPXnrb4z2xpSqVspymQ1DCWtQJWvcFbnhj8SB', NULL, '2016-10-15 21:03:32', 'eyJpdiI6Ijd5SzhKZUpEV1Q3ck9yR2tLUXpuMEE9PSIsInZhbHVlIjoiTTNncHV2a2lvOEFcL0dDdWdhMGptXC93PT0iLCJtYWMiOiJkYWM3NDUzYmNmZTAyNDU1MzljMWU5NTUwMGYzNDNlZjEzNzRiZTJjYjc0NDQ5ZjM0MmI5NTE4YjRkOGVhZjQyIn0=', '', '', 0, 0, 0, 0),
(2, 'Marco', 'Barrera', 'Marco Barrera', 'm_mbarrera', 'marcobarrera@gmail.com', '$2y$10$hssQ.8assSnhk9CWlcAOK.5DN7XHlnrWFYLddXfhAM3d4ZfvVRgxG', 'Boxing St. Suntukan Manila', '09488867723', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/DAVID_OBAJE.jpg', '6ewcgfw47NOpwIBUasBZQ0018UFqSaXdqQS3DAdAzOoluThW0RzZ5vEsRywL', NULL, '2016-10-10 12:23:08', 'eyJpdiI6InJSRlFLRWZUS2Y2bGh6RmRnM3pPM2c9PSIsInZhbHVlIjoiVXpWRVNYTlh0TXpCXC9aSUJpUUVOMmc9PSIsIm1hYyI6IjE5MDBjM2JhOWM0MGQzYmFiY2NhZmU1M2QyNGYyZjZmZjRiMzM2ZjViMTZkZGQwOTVlMjFjZjg5M2YxOTg0MmEifQ==', '', '', 0, 0, 0, 0),
(3, 'Freedy', 'Morales', 'Freedy Morales', 'm_frmorales', 'freedy@gmail.com', '$2y$10$OdPte6gcgzcbyJ1UmhNWfe5nGjxJtlUM/s4vkW9aqnFF/AcBoI6xq', 'Free Place', '09352347890', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', '32FiyhmZPClx7nocCzWfswov5Gp4J7znxbd7a6S7KcZ5egfMdkuaLBGC7xOH', NULL, '2016-09-13 23:20:00', 'eyJpdiI6IlFtd0NSaVRJeEVWTlRiZENhOVJtNGc9PSIsInZhbHVlIjoiMHRHSE5EK0FsbUVaQjlcLzRTUU9pMUE9PSIsIm1hYyI6IjFmMWNjYjE0M2FhMThlNzQ3NWM4NGJlM2NkYTllNmFmMThjYTZiZTVlMzJhZTM5ZmNiMWE3Y2I0ZTA1MWU4OTAifQ==', '', '', 0, 0, 0, 0),
(4, 'Charlotte', 'Napolis', 'Charlotte Napolis', 'm_cnapolis', 'chanapolis22@gmail.com', '$2y$10$CJ6HrjZeUEr.gHpHlAaij.X663xTG7kuO//leRHCauzpEwK7.c2qu', 'valenzuela', '09067856347', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', NULL, '2016-09-21 13:57:38', '2016-09-21 13:57:38', 'eyJpdiI6IllFdkJwR1JqcCt3MDBzR3NTc3orT3c9PSIsInZhbHVlIjoiemR6ODFVeUpaamp1cThcL2RINmxJdFE9PSIsIm1hYyI6IjVmYjJlYjUxNmY0YzEyZTM2NTYzODNlMjMwOGZhOGJkMzc0MDhkMWFhNDNkM2FlM2NlMzBhYTE4NzIzYjM0MjIifQ==', '', '', 0, 0, 0, 0),
(5, 'Felix', 'Hilo', 'Felix Hilo', 'm_fhilo', 'felixh@gmail.com', '$2y$10$et1JI2DMDenJJrEVJijP0.0qKEc6B0WKqWRFakDCL3u9v3WrDt3/e', 'bundok', '09081786890', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', 'svJwYW5U16d3XBtj18vWGriUByg3YLiWz3EjpSyOYvRqCQrsxrS5uwal4UUG', '2016-09-21 13:58:55', '2016-10-13 10:12:35', 'eyJpdiI6IkxrQjhCa3N4NVwvMHZkYVlcL2VxMVdydz09IiwidmFsdWUiOiJtNjRDM0FBSEQreitNYXNMdXRcL3hTdz09IiwibWFjIjoiODAzZjUyYzViMThmMzZjZjNhYTQyNzc3Y2YxYzVhOGFlYmI2OGEyOGUxYzQ2Nzg4NzRiMmEwMzFjYjU3MTMxZSJ9', '', '', 0, 0, 0, 0),
(6, 'The', 'Owner', 'The Owner', 'c_towner', 'theowner@gmail.com', '$2y$10$y/cWLkK5BsyXEg.tyVWLBep5Wz3P8qT5tAGn32/dlB3pUsC997nlG', 'Comp. Inc.', '09078907653', 2, 1, 0, 2, 0, 300000, 57491.89, 2, 2, 'assets/images/profile_pictures/lock.png', 'RR8lJwe9YUmwfpqOMZoqhcj8gKEJozt9MIaCrVIbZDGmszi4yBaCTvQnE7kz', '2016-09-22 00:27:39', '2016-10-16 04:08:33', 'eyJpdiI6IkdJc0dJam43OG5jZnNRTGdBbG5oS0E9PSIsInZhbHVlIjoiU1hVdWlNSkFQTzNyR1FkbXQwbUhSZz09IiwibWFjIjoiNjk0MTAyNGE3ZTk4NGNhNjliODhhNGVhOTdiZDY0YjVkOTAxNjgzZTNkNTZmMmY3NDhkNmJlNmQ2ZGMwNTJmOCJ9', 'DIST-0000006', '2016-10-31', 14380.77, 57491.89, 0, 0),
(67, 'Glenwin', 'Bernabe', 'Glenwin Bernabe', 'c_gbernabe', 'glenwinbernabe@gmail.com', '$2y$10$o4X27iP9ppjgU.sL13RNxuquDAqVkcFzsIvW/Hr2Ju84qtXsh.DYO', 'tondo', '09358217701', 2, 1, 6, 1, 0, 300000, 43111.12, 1, 1, 'assets/images/user.png', NULL, '2016-10-16 04:06:31', '2016-10-16 04:08:33', 'eyJpdiI6IjhlZ3RoNVAzZmVxdUYyS2l5bmQwSVE9PSIsInZhbHVlIjoiS2JmZkVsbzFtTWpKa1cxUnBJY1wvdUE9PSIsIm1hYyI6IjM4YmVhNTdhYTg3OGZlYzgyOTMzYzdmZDIxOGZhZTQ0M2Q1OTRjZDNjODRlNDUyZjQ4ODUwNGNlMTJjOWZhN2EifQ==', 'DIST-0000067', '2016-10-31', 14000, 43111.12, 0, 0),
(68, 'Geisher', 'Bernabe', 'Geisher Bernabe', 'c_gbernabe', 'geisherbernabe@gmail.com', '$2y$10$RLEgN/Q8U9U5EP/Blnb6K.b7nvvpzf0TB/i1UnMHM.dsCYXwUPP9G', 'tondo', '09284569056', 2, 1, 67, 0, 0, 300000, 29111.12, 0, 0, 'assets/images/user.png', NULL, '2016-10-16 04:09:05', '2016-10-16 04:09:05', 'eyJpdiI6IjNKcDFKRDZoeWh0N3kxU1wvcmVydlFRPT0iLCJ2YWx1ZSI6InNRVHljdHN3UzBFeGkzS1hFNEM3a1E9PSIsIm1hYyI6IjMwMzIzYmI4YTUxYzE2OGRmZDFmOTMxMDcwYzgwNzQ3OGFmODI4MTkzODZmM2IxMTcyOGE1MjMxOGQ5OGE2ZDUifQ==', 'DIST-0000068', '2016-10-31', 29111.12, 29111.12, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
