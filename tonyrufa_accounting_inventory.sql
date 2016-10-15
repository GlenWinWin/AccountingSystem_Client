-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2016 at 12:46 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tonyrufa_accounting_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `id` int(10) unsigned NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `commission` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `distributor_id`, `commission`, `created_at`, `updated_at`) VALUES
(1, 49, 10515.812, NULL, NULL),
(2, 57, 2414.45, NULL, NULL),
(3, 58, 2017.65, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(10) unsigned NOT NULL,
  `item_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_sub_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `item_subcostPrice` double NOT NULL,
  `item_sellingPrice` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_category`, `item_sub_category`, `item_name`, `item_quantity`, `item_costPrice`, `item_subcostPrice`, `item_sellingPrice`) VALUES
(1, '1', '2', 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 4546, 27.5, 30, 100.02),
(2, '1', '1', 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 4228, 180, 207, 280.75),
(3, '1', '3', 'GIDEON PORTABLE EYEWASH - YELLOW', 4712, 4500, 5175, 14000);

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
(3, 1, 0, 0, 1, 0),
(4, 0, 1, 1, 0, 1),
(10, 0, 0, 0, 0, 0),
(41, 0, 0, 0, 0, 0),
(42, 1, 1, 1, 1, 1),
(55, 0, 0, 0, 0, 0);

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
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivings`
--

CREATE TABLE IF NOT EXISTS `receivings` (
  `receiving_id` int(11) NOT NULL,
  `clerk_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `trans_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receivings`
--

INSERT INTO `receivings` (`receiving_id`, `clerk_id`, `created_at`, `trans_ID`, `updated_at`) VALUES
(1, 42, '2016-10-14 12:04:36', 'TRANS-0000000002', '2016-10-14 12:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_details`
--

CREATE TABLE IF NOT EXISTS `receiving_details` (
  `receiving_detail_id` int(10) unsigned NOT NULL,
  `receiving_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receive_quantity` int(11) NOT NULL,
  `receive_subtotal` double NOT NULL,
  `receive_price` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receiving_details`
--

INSERT INTO `receiving_details` (`receiving_detail_id`, `receiving_id`, `item_id`, `item_name`, `receive_quantity`, `receive_subtotal`, `receive_price`) VALUES
(1, 1, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 2, 55, 27.5);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `clerk_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `trans_ID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `distributor_id`, `clerk_id`, `created_at`, `trans_ID`, `updated_at`) VALUES
(1, 49, 3, '2016-10-14 12:00:51', 'TRANS-0000000001', '2016-10-14 12:00:51'),
(2, 49, 3, '2016-10-14 12:06:19', 'TRANS-0000000003', '2016-10-14 12:06:19'),
(3, 57, 3, '2016-10-14 13:02:21', 'TRANS-0000000004', '2016-10-14 13:02:21'),
(4, 49, 3, '2016-10-14 13:49:03', 'TRANS-0000000005', '2016-10-14 13:49:03'),
(5, 49, 3, '2016-10-14 14:11:10', 'TRANS-0000000006', '2016-10-14 14:11:10'),
(6, 49, 3, '2016-10-14 14:22:35', 'TRANS-0000000007', '2016-10-14 14:22:35'),
(7, 49, 3, '2016-10-14 14:25:39', 'TRANS-0000000008', '2016-10-14 14:25:39'),
(8, 49, 3, '2016-10-14 14:29:18', 'TRANS-0000000009', '2016-10-14 14:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `sale_detail_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_price` double NOT NULL,
  `sales_subtotal` double NOT NULL,
  `sales_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sale_detail_id`, `item_id`, `item_name`, `sales_quantity`, `sales_price`, `sales_subtotal`, `sales_id`) VALUES
(1, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 80, 100.02, 8001.6, 1),
(2, 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 50, 280.75, 14037.5, 1),
(3, 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 86, 280.75, 24144.5, 2),
(4, 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 22, 280.75, 6176.5, 3),
(5, 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 14000, 14000, 3),
(6, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 56, 100.02, 5601.12, 4),
(7, 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 48, 280.75, 13476, 4),
(8, 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 50, 280.75, 14037.5, 5),
(9, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 20, 100.02, 2000.4, 5),
(10, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 100, 100.02, 10002, 6),
(11, 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 2, 14000, 28000, 7),
(12, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 100, 100.02, 10002, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_receivings_details`
--

CREATE TABLE IF NOT EXISTS `temporary_receivings_details` (
  `temporary_receivings_details_id` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `clerk_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sales`
--

CREATE TABLE IF NOT EXISTS `temporary_sales` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temporary_sales`
--

INSERT INTO `temporary_sales` (`id`, `created_at`, `updated_at`) VALUES
(14, '2016-10-14 20:55:11', '2016-10-14 20:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sales_details`
--

CREATE TABLE IF NOT EXISTS `temporary_sales_details` (
  `temporary_sales_details_id` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `clerk_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temporary_sales_details`
--

INSERT INTO `temporary_sales_details` (`temporary_sales_details_id`, `id`, `item_id`, `item_name`, `item_quantity`, `item_costPrice`, `clerk_id`) VALUES
(16, 14, 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 1, 100.02, 42);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `transactID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `typeOfTransaction` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `distributor_id`, `created_at`, `transactID`, `typeOfTransaction`, `updated_at`) VALUES
(1, 49, '2016-10-14 12:00:51', 'TRANS-0000000001', 0, '2016-10-14 12:00:51'),
(2, 0, '2016-10-14 12:04:35', 'TRANS-0000000002', 1, '2016-10-14 12:04:35'),
(3, 57, '2016-10-14 12:06:19', 'TRANS-0000000003', 0, '2016-10-14 12:07:29'),
(4, 58, '2016-10-14 13:02:21', 'TRANS-0000000004', 0, '2016-10-14 13:02:59'),
(5, 49, '2016-10-14 13:49:03', 'TRANS-0000000005', 0, '2016-10-14 13:49:03'),
(6, 49, '2016-10-14 14:11:10', 'TRANS-0000000006', 0, '2016-10-14 14:11:10'),
(7, 49, '2016-10-14 14:22:35', 'TRANS-0000000007', 0, '2016-10-14 14:22:35'),
(8, 49, '2016-10-14 14:25:39', 'TRANS-0000000008', 0, '2016-10-14 14:25:39'),
(9, 49, '2016-10-14 14:29:18', 'TRANS-0000000009', 0, '2016-10-14 14:29:18');

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
('TRANS-0000000001', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 80, 100.02, 8001.6),
('TRANS-0000000001', 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 50, 280.75, 14037.5),
('TRANS-0000000002', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 2, 27.5, 55),
('TRANS-0000000003', 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 86, 280.75, 24144.5),
('TRANS-0000000004', 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 22, 280.75, 6176.5),
('TRANS-0000000004', 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 14000, 14000),
('TRANS-0000000005', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 56, 100.02, 5601.12),
('TRANS-0000000005', 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 48, 280.75, 13476),
('TRANS-0000000006', 2, 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 50, 280.75, 14037.5),
('TRANS-0000000006', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 20, 100.02, 2000.4),
('TRANS-0000000007', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 100, 100.02, 10002),
('TRANS-0000000008', 3, 'GIDEON PORTABLE EYEWASH - YELLOW', 2, 14000, 28000),
('TRANS-0000000009', 1, 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 100, 100.02, 10002);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
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
  `targetGroupSales` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `name`, `username`, `email`, `password`, `address`, `contact`, `typeOfUser`, `channelPosition`, `distributor_id`, `connectCounter`, `monthCounter`, `totalSalesMonth`, `totalSales`, `totalNewMemberMonth`, `totalNewMember`, `profile_path`, `remember_token`, `created_at`, `updated_at`, `passsword_text`, `userID`, `dateToFinish`, `totalPersonalSales`, `totalGroupSales`, `totalNewCAMonth`, `targetGroupSales`) VALUES
(1, 'Admin', 'System', 'Admin System', 'admin', 'admin@gmail.com', '$2y$10$rPwvV.3D3Ip4uTzC6DIT4u17WqO7LJtjM0vk6LKhe/woaUQbHkucu', 'tondo', '09358217701', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/Koala.jpg', 'WsVWTeNsDjUaptVzMH1MytE3r4yLPb3G0Q9ELDd1aFJUxoK1wtMjnUqvtojR', NULL, '2016-09-29 11:49:46', 'eyJpdiI6Ijd5SzhKZUpEV1Q3ck9yR2tLUXpuMEE9PSIsInZhbHVlIjoiTTNncHV2a2lvOEFcL0dDdWdhMGptXC93PT0iLCJtYWMiOiJkYWM3NDUzYmNmZTAyNDU1MzljMWU5NTUwMGYzNDNlZjEzNzRiZTJjYjc0NDQ5ZjM0MmI5NTE4YjRkOGVhZjQyIn0=', '', '', 0, 0, 0, 0),
(3, 'Marco', 'Barrera', 'Marco Barrera', 'c_mbarrera', 'marcobarrera@gmail.com', '$2y$10$hssQ.8assSnhk9CWlcAOK.5DN7XHlnrWFYLddXfhAM3d4ZfvVRgxG', 'Boxing St. Suntukan Manila', '09488867723', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/DAVID_OBAJE.jpg', 'kmIt8hpWv87vLLhndXQy2gvi6x7DxEDmGlFFNAZn454yL1HDxLqkACkPIvxV', NULL, '2016-10-10 12:23:08', 'eyJpdiI6InJSRlFLRWZUS2Y2bGh6RmRnM3pPM2c9PSIsInZhbHVlIjoiVXpWRVNYTlh0TXpCXC9aSUJpUUVOMmc9PSIsIm1hYyI6IjE5MDBjM2JhOWM0MGQzYmFiY2NhZmU1M2QyNGYyZjZmZjRiMzM2ZjViMTZkZGQwOTVlMjFjZjg5M2YxOTg0MmEifQ==', '', '', 0, 0, 0, 0),
(4, 'Freedy', 'Morales', 'Freedy Morales', 'c_frmorales', 'freedy@gmail.com', '$2y$10$OdPte6gcgzcbyJ1UmhNWfe5nGjxJtlUM/s4vkW9aqnFF/AcBoI6xq', 'Free Place', '09352347890', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', '32FiyhmZPClx7nocCzWfswov5Gp4J7znxbd7a6S7KcZ5egfMdkuaLBGC7xOH', NULL, '2016-09-13 23:20:00', 'eyJpdiI6IlFtd0NSaVRJeEVWTlRiZENhOVJtNGc9PSIsInZhbHVlIjoiMHRHSE5EK0FsbUVaQjlcLzRTUU9pMUE9PSIsIm1hYyI6IjFmMWNjYjE0M2FhMThlNzQ3NWM4NGJlM2NkYTllNmFmMThjYTZiZTVlMzJhZTM5ZmNiMWE3Y2I0ZTA1MWU4OTAifQ==', '', '', 0, 0, 0, 0),
(41, 'Charlotte', 'Napolis', 'Charlotte Napolis', 'c_cnapolis', 'chanapolis22@gmail.com', '$2y$10$CJ6HrjZeUEr.gHpHlAaij.X663xTG7kuO//leRHCauzpEwK7.c2qu', 'valenzuela', '09067856347', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', NULL, '2016-09-21 13:57:38', '2016-09-21 13:57:38', 'eyJpdiI6IllFdkJwR1JqcCt3MDBzR3NTc3orT3c9PSIsInZhbHVlIjoiemR6ODFVeUpaamp1cThcL2RINmxJdFE9PSIsIm1hYyI6IjVmYjJlYjUxNmY0YzEyZTM2NTYzODNlMjMwOGZhOGJkMzc0MDhkMWFhNDNkM2FlM2NlMzBhYTE4NzIzYjM0MjIifQ==', '', '', 0, 0, 0, 0),
(42, 'Felix', 'Hilo', 'Felix Hilo', 'c_fhilo', 'felixh@gmail.com', '$2y$10$et1JI2DMDenJJrEVJijP0.0qKEc6B0WKqWRFakDCL3u9v3WrDt3/e', 'bundok', '09081786890', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', 'svJwYW5U16d3XBtj18vWGriUByg3YLiWz3EjpSyOYvRqCQrsxrS5uwal4UUG', '2016-09-21 13:58:55', '2016-10-13 10:12:35', 'eyJpdiI6IkxrQjhCa3N4NVwvMHZkYVlcL2VxMVdydz09IiwidmFsdWUiOiJtNjRDM0FBSEQreitNYXNMdXRcL3hTdz09IiwibWFjIjoiODAzZjUyYzViMThmMzZjZjNhYTQyNzc3Y2YxYzVhOGFlYmI2OGEyOGUxYzQ2Nzg4NzRiMmEwMzFjYjU3MTMxZSJ9', '', '', 0, 0, 0, 0),
(49, 'The', 'Owner', 'The Owner', 'd_towner', 'theowner@gmail.com', '$2y$10$wWi8Kv/Sa.g9HASC/bLcIusj9DSczz.Wp2cYi4vdjwCWFG.q0MtdO', 'Comp. Inc.', '09078907653', 2, 1, 0, 1, 0, 300000, 149479.12, 1, 1, 'assets/images/profile_pictures/lock.png', 'VHBSnijqHLdL7tBdVLHazn8X5rB5UDQANbvweveFHbV60PVjCdbb8FZBtCTB', '2016-09-22 00:27:39', '2016-10-14 14:29:18', 'eyJpdiI6InhRQTJvQVFsaitPTmdiTGFHc2hsbHc9PSIsInZhbHVlIjoiVUFGVWV1eE1BNHlpVUdpdTlHZmVrUT09IiwibWFjIjoiOGJkZTBhMDFmMjVjMzliY2Q2MGMxMzI1ZGIxMTUyNGMwYWQzZGE1MGU5M2U0MWMyMzJmZTZlODZhMmI4MThhYSJ9', 'DIST-0000049', '2016-10-31', 105158.12, 149479.12, 0, 0),
(57, 'Dazzle', 'Turbo', 'Dazzle Turbo', 'd_dturbo', 'dazzlingturbo@gmail.com', '$2y$10$P7cZ0AFohG8nhHKDarA2t.YRgqQ8ESSE7KYTJGnXCdtm80X.YyTzq', 'turbo tondo', '09358217701', 2, 1, 49, 1, 0, 300000, 44321, 1, 1, 'assets/images/user.png', 'GSgdSHIs334L8s6wBgwdqRTZde0aaFUBixm2f9SLCrxs3vGoRlzrFv5yMQQa', '2016-10-14 12:07:29', '2016-10-14 13:02:21', 'eyJpdiI6InNPVjhzWE5oeHlvVWFGbXZmUmhZN1E9PSIsInZhbHVlIjoieTJBSmV5eFBscmcwQkl1NGZVNzY3dz09IiwibWFjIjoiMTgwOTkyZmU3ZjNmNWE5NzBkODU2OTdmYjI0MjY0NWFiNjRjNzJiYTAzMGM3MTdjZDE2ODY4YmRlYTg4NDE2YiJ9', 'DIST-0000057', '2016-10-31', 24144.5, 44321, 0, 0),
(58, 'Glenwin', 'Bernabe', 'Glenwin Bernabe', 'd_gbernabe', 'glenwinbernabe@gmail.com', '$2y$10$XEGzSMSVtKzDbN25WZntveTczgig.QOth8yUQfRr.Q8lAVhOxp87W', 'tondo manila ', '09358217701', 2, 1, 57, 0, 0, 300000, 20176.5, 0, 0, 'assets/images/user.png', NULL, '2016-10-14 13:02:59', '2016-10-14 13:02:59', 'eyJpdiI6IkhDTWZLbnpqVVpsdzBoMXFXMHNScFE9PSIsInZhbHVlIjoiUk1wYmt0YWJkbUk1RkFkWGticEdHdz09IiwibWFjIjoiNWQwMTQ5NmVlOGMyZTg0NzZhYzE4MjY2MzUzNDliYjI4NmQ4ZDk5YjFjZmFjNTVmY2E2ODUyNjhmZDY5OGM3YiJ9', 'DIST-0000058', '2016-10-31', 20176.5, 20176.5, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `receivings`
--
ALTER TABLE `receivings`
  ADD PRIMARY KEY (`receiving_id`);

--
-- Indexes for table `receiving_details`
--
ALTER TABLE `receiving_details`
  ADD PRIMARY KEY (`receiving_detail_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sale_detail_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_receivings`
--
ALTER TABLE `temporary_receivings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_receivings_details`
--
ALTER TABLE `temporary_receivings_details`
  ADD PRIMARY KEY (`temporary_receivings_details_id`);

--
-- Indexes for table `temporary_sales`
--
ALTER TABLE `temporary_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_sales_details`
--
ALTER TABLE `temporary_sales_details`
  ADD PRIMARY KEY (`temporary_sales_details_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `receivings`
--
ALTER TABLE `receivings`
  MODIFY `receiving_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `receiving_details`
--
ALTER TABLE `receiving_details`
  MODIFY `receiving_detail_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `temporary_receivings`
--
ALTER TABLE `temporary_receivings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temporary_receivings_details`
--
ALTER TABLE `temporary_receivings_details`
  MODIFY `temporary_receivings_details_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temporary_sales`
--
ALTER TABLE `temporary_sales`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `temporary_sales_details`
--
ALTER TABLE `temporary_sales_details`
  MODIFY `temporary_sales_details_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
