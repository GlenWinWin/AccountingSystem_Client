-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 06:12 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Safety Equipments');

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
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_category`, `item_sub_category`, `item_name`, `item_quantity`, `item_costPrice`, `item_subcostPrice`, `item_sellingPrice`) VALUES
(1, '1', '2', 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 10, 27.5, 30, 100),
(2, '1', '1', 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 1, 180, 207, 280),
(3, '1', '3', 'GIDEON PORTABLE EYEWASH - YELLOW', 1, 4500, 5175, 14000);

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
(3, 1, 0, 1, 1, 0),
(4, 0, 1, 1, 0, 1),
(9, 0, 0, 0, 0, 0);

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
('2016_08_21_140715_create_temporary_sales_main_table', 4);

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
  `clerk_id` int(11) NOT NULL,
  `receiving_id` int(11) NOT NULL,
  `receiving_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receiving_details`
--

CREATE TABLE IF NOT EXISTS `receiving_details` (
  `receiving_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receive_quantity` int(11) NOT NULL,
  `receive_subtotal` double NOT NULL,
  `receive_total` double NOT NULL,
  PRIMARY KEY (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `clerk_id` int(11) NOT NULL,
  `sale_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `sales_id` int(10) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_price` double NOT NULL,
  `sales_subtotal` double NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

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
(10, 1, 'Rescue');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sales`
--

CREATE TABLE IF NOT EXISTS `temporary_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`temporary_sales_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `transaction_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transactID` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `name`, `username`, `email`, `password`, `address`, `contact`, `typeOfUser`, `channelPosition`, `distributor_id`, `connectCounter`, `monthCounter`, `totalSalesMonth`, `totalSales`, `totalNewMemberMonth`, `totalNewMember`, `profile_path`, `remember_token`, `created_at`, `updated_at`, `passsword_text`) VALUES
(1, 'Glenwin', 'Bernabe', 'Glenwin Bernabe', 'admin', 'glenwinbernabe@gmail.com', '$2y$10$rPwvV.3D3Ip4uTzC6DIT4u17WqO7LJtjM0vk6LKhe/woaUQbHkucu', 'tondo', '09358217701', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/admin.png', 'dG4ldRBZcmh0lBB2pwZ7iNdItgTv5Cqm6uMDOOECiHaY8upCRvl6QWufUd7d', NULL, '2016-08-20 05:57:57', 'eyJpdiI6Ijd5SzhKZUpEV1Q3ck9yR2tLUXpuMEE9PSIsInZhbHVlIjoiTTNncHV2a2lvOEFcL0dDdWdhMGptXC93PT0iLCJtYWMiOiJkYWM3NDUzYmNmZTAyNDU1MzljMWU5NTUwMGYzNDNlZjEzNzRiZTJjYjc0NDQ5ZjM0MmI5NTE4YjRkOGVhZjQyIn0='),
(2, 'Frank', 'Moses', 'Frank Moses', 'd_fmoses', 'frankmoses@gmail.com', '$2y$10$i.QJfD061U8mc4xcFxr5zeZR/hHbgUZrdHfaA2wSThemzu.CEBre2', 'Dublin,Ireland', '09358827769', 2, 0, 0, 0, 0, 0, 30000, 0, 0, 'assets/images/user.png', NULL, NULL, NULL, 'eyJpdiI6InZzdjN5V3h3K1dVeHIra1RcL3R4VjNRPT0iLCJ2YWx1ZSI6InA5aWpLcFljTWV5MG03VEl5c0xVYVE9PSIsIm1hYyI6ImZhZTYxMGUxOGZjOGE1ZDE1ODFhODJiZjQ0ZWNiMWY2NmFmOGI1OTlkNWRjMDM3M2Y1OGRkYTVlMjk0NmNiMjQifQ=='),
(3, 'Marco', 'Barrera', 'Marco Barrera', 'c_mbarrera', 'marcobarrera@gmail.com', '$2y$10$hssQ.8assSnhk9CWlcAOK.5DN7XHlnrWFYLddXfhAM3d4ZfvVRgxG', 'Boxing St. Suntukan Manila', '09488867723', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/prof.jpg', '4z3ly0PqSi8Avouhg8KFaVAhLUloe4Pkak4QHBPsM3kpdgtcm753eiNYgbF1', NULL, '2016-08-20 06:02:45', 'eyJpdiI6InJSRlFLRWZUS2Y2bGh6RmRnM3pPM2c9PSIsInZhbHVlIjoiVXpWRVNYTlh0TXpCXC9aSUJpUUVOMmc9PSIsIm1hYyI6IjE5MDBjM2JhOWM0MGQzYmFiY2NhZmU1M2QyNGYyZjZmZjRiMzM2ZjViMTZkZGQwOTVlMjFjZjg5M2YxOTg0MmEifQ=='),
(4, 'Freedy', 'Morales', 'Freedy Morales', 'c_frmorales', 'freedy@gmail.com', '$2y$10$OdPte6gcgzcbyJ1UmhNWfe5nGjxJtlUM/s4vkW9aqnFF/AcBoI6xq', 'Free Place', '09352347890', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', '32FiyhmZPClx7nocCzWfswov5Gp4J7znxbd7a6S7KcZ5egfMdkuaLBGC7xOH', NULL, NULL, 'eyJpdiI6IlFtd0NSaVRJeEVWTlRiZENhOVJtNGc9PSIsInZhbHVlIjoiMHRHSE5EK0FsbUVaQjlcLzRTUU9pMUE9PSIsIm1hYyI6IjFmMWNjYjE0M2FhMThlNzQ3NWM4NGJlM2NkYTllNmFmMThjYTZiZTVlMzJhZTM5ZmNiMWE3Y2I0ZTA1MWU4OTAifQ=='),
(9, 'Dazzle', 'Turbo', 'Dazzle Turbo', 'c_dturbo', 'dazzlingturbo@gmail.com', '$2y$10$6z6CIGTrNgscRHrR4O91EORuH54NmAX/rJ61lfkLWN0V8CFjssQCG', 'tondo', '09358217701', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', 'cNZveNeoImcezsV53BAahhAfnBl7AwdDUw4Z2r0SGXIonM0Kuq8mswJNnngA', NULL, NULL, 'eyJpdiI6Indmc01VYzhZeTRscFpDbXBxYnViclE9PSIsInZhbHVlIjoieTFhKzl5dWdoR3hrSTdtcHNiVkN3QT09IiwibWFjIjoiNjk1ZTRlZjI3NDJjYWNkNjk3Y2JiMWRhNjI2ZGYyYjM2M2E2MmNhZGEwOWNiNDk0YTA4YTM1ZTgyMTNkN2RiMiJ9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
