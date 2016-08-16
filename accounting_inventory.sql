-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 05:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `item_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_sub_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_costPrice` double NOT NULL,
  `item_subcostPrice` double NOT NULL,
  `item_sellingPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_category`, `item_sub_category`, `item_name`, `item_quantity`, `item_costPrice`, `item_subcostPrice`, `item_sellingPrice`) VALUES
(1, 'Safety Equipments', 'EYE', 'GIDEON SPECTACLES NON ADJUSTABLE - CLEAR', 34, 25, 28.75, 100),
(2, 'Safety Equipments', 'HEAD', 'SPIDERKING EAGLE HARDHAT WITH CHINSTRAP', 17, 180, 207, 280);

-- --------------------------------------------------------

--
-- Table structure for table `manage_privileges`
--

CREATE TABLE `manage_privileges` (
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
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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
('2016_08_02_152115_create_table_sales_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivings`
--

CREATE TABLE `receivings` (
  `clerk_id` int(11) NOT NULL,
  `receiving_id` int(11) NOT NULL,
  `receiving_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receiving_details`
--

CREATE TABLE `receiving_details` (
  `receiving_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receive_quantity` int(11) NOT NULL,
  `receive_subtotal` double NOT NULL,
  `receive_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(10) UNSIGNED NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `clerk_id` int(11) NOT NULL,
  `sale_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sales_quantity` int(11) NOT NULL,
  `sales_total` double NOT NULL,
  `sales_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `transaction_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_quantity` int(11) NOT NULL,
  `transaction_sub_total` double NOT NULL,
  `transaction_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `passsword_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `name`, `username`, `email`, `password`, `address`, `contact`, `typeOfUser`, `channelPosition`, `distributor_id`, `connectCounter`, `monthCounter`, `totalSalesMonth`, `totalSales`, `totalNewMemberMonth`, `totalNewMember`, `profile_path`, `remember_token`, `created_at`, `updated_at`, `passsword_text`) VALUES
(1, 'Glenwin', 'Bernabe', 'Glenwin Bernabe', 'admin', 'glenwinbernabe@gmail.com', '$2y$10$66aI.poQ60pXCleIi65ei.ygA2l7CkpNIrYkI9oEj8MjJg98lIATS', '', '09358217701', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/profile_pictures/admin.png', 'k1zI83AMpKxFIlPqjvbax8OAMTWYy8B4ZJ8xc2H0LOBFHc8hDpa6q9TeKHr7', NULL, '2016-08-15 07:14:03', 'eyJpdiI6IklrdDhjb3h5ZktEeXU1eHUxM0xsc3c9PSIsInZhbHVlIjoiK2VwVFZPbTdCWDJsK0U5K2drQzVMdz09IiwibWFjIjoiZTAyYjMzMWYzZDdhNzk0ZmQyMWNhZjU5Mjk1YWI2YjMzMTlkOTJiOTE5YTk4MmIxMTUxMjAxYzE3YWQxZWNkNiJ9'),
(2, 'Frank', 'Moses', 'Frank Moses', 'd_fmoses', 'frankmoses@gmail.com', '$2y$10$pvpDfv1FswPmQHn.izhd8OvE3KHhV5w8Sbn4GIpiEz8zBpkqRXs6i', 'Dublin,Ireland', '09358827769', 2, 0, 0, 0, 0, 0, 30000, 0, 0, 'assets/images/user.png', NULL, NULL, NULL, ''),
(3, 'Marco', 'Barrera', 'Marco Barrera', 'c_mbarrera', 'marcobarrera@gmail.com', '$2y$10$rFPiinGJocogc5DRAYUVm.X3VNpeExxfiyJrQjY.j3CZoIZt1fr7S', 'Boxing St. Suntukan Manila', '09488867723', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', 'kMvZbPqM5TBwWlB9JdzXCeR2n8XJBmwlBzqU9r0hG7J5H975ObpCkWfoIn3p', NULL, NULL, ''),
(4, 'Freedy', 'Morales', 'Freedy Morales', 'c_frmorales', 'freedy@gmail.com', '$2y$10$PB0oYRZvCOa0ZlUNNN3Zie6v3cUuf9mxI0F3SGqheOl6qWDpUPk7u', 'Free Place', '09352347890', 1, 0, 0, 0, 0, 0, 0, 0, 0, 'assets/images/user.png', NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `receiving_details`
--
ALTER TABLE `receiving_details`
  ADD PRIMARY KEY (`receiving_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `receiving_details`
--
ALTER TABLE `receiving_details`
  MODIFY `receiving_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
