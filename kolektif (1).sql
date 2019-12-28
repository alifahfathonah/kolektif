-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 09:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kolektif`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_field`
--

CREATE TABLE `business_field` (
  `id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_field`
--

INSERT INTO `business_field` (`id`, `created_date`, `updated_date`, `name`) VALUES
(1, '0000-00-00 00:00:00', '2019-12-23 08:35:00', 'Bolpoin'),
(2, '0000-00-00 00:00:00', '2019-12-23 08:35:00', 'Kertas'),
(3, NULL, '2019-12-23 08:35:33', 'Sepeda');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(128) NOT NULL,
  `contact` varchar(64) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `created_date`, `updated_date`, `name`, `contact`, `address`) VALUES
(2, '2019-12-26 15:35:08', '2019-12-26 08:35:08', 'test', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `source_id` int(11) NOT NULL,
  `is_bill` tinyint(1) NOT NULL,
  `file` varchar(128) DEFAULT NULL,
  `price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `final_price` float NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kwitansi_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `file` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `po_line`
--

CREATE TABLE `po_line` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_line`
--

INSERT INTO `po_line` (`id`, `created_date`, `updated_date`, `purchase_id`, `product_id`, `qty`) VALUES
(1, '2019-12-27 15:27:40', '2019-12-27 08:27:40', 32, 2, 0),
(2, '2019-12-27 15:34:08', '2019-12-27 08:34:08', 37, 4, 13),
(3, '2019-12-27 15:34:49', '2019-12-27 08:34:49', 39, 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_sku` varchar(32) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `retail_price` float DEFAULT '0',
  `brand` int(11) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `on_hand` int(11) DEFAULT '0',
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `created_date`, `updated_date`, `product_sku`, `name`, `image`, `retail_price`, `brand`, `uom_id`, `on_hand`, `description`) VALUES
(2, '2019-12-26 15:41:36', '2019-12-26 10:13:14', '', 'test', '210.png', 0, 0, 1, 0, ''),
(4, '2019-12-26 16:01:08', '2019-12-26 09:01:08', '', 'fas', NULL, 0, 0, 1, 0, ''),
(5, '2019-12-26 16:01:57', '2019-12-26 09:01:57', '', 'fa', NULL, 0, 0, 1, 0, ''),
(6, '2019-12-26 16:10:36', '2019-12-26 09:10:36', '', 'fa', '1113.jpg', 0, 0, 1, 0, ''),
(7, '2019-12-26 16:10:58', '2019-12-26 09:10:58', '', 'fasd', '28.png', 0, 0, 1, 0, ''),
(8, '2019-12-26 16:17:11', '2019-12-26 09:17:11', '', 'fdas', NULL, 0, 0, 1, 0, ''),
(9, '2019-12-26 16:22:24', '2019-12-26 09:22:24', '', 'fasdfa', '3.png', 0, 0, 1, 0, ''),
(10, '2019-12-26 16:37:59', '2019-12-26 09:37:59', '', 'fasd', '29.png', 0, 0, 1, 0, ''),
(11, '2019-12-26 16:45:38', '2019-12-26 09:45:38', '', 'dfas', NULL, 0, 0, 1, 0, ''),
(12, '2019-12-26 16:45:59', '2019-12-26 09:45:59', '', 'aku', NULL, 0, 0, 1, 0, ''),
(13, '2019-12-26 16:46:33', '2019-12-26 09:46:33', '', 'saya', NULL, 0, 0, 1, 0, ''),
(14, '2019-12-26 16:47:00', '2019-12-26 09:47:00', '', 'saya2', NULL, 0, 0, 1, 0, ''),
(15, '2019-12-26 17:04:56', '2019-12-26 10:04:56', '', 'fsadf', NULL, 0, 0, 1, 0, ''),
(16, '2019-12-26 17:05:09', '2019-12-26 10:05:09', '', 'saya', NULL, 0, 0, 1, 0, ''),
(17, '2019-12-26 17:05:37', '2019-12-26 10:05:37', '', 'saya2', NULL, 0, 0, 1, 0, ''),
(18, '2019-12-26 17:05:57', '2019-12-26 10:05:57', '', 'saya3', '126.png', 0, 0, 1, 0, ''),
(19, '2019-12-26 17:07:17', '2019-12-26 10:07:17', '', 'fadsf', NULL, 0, 0, 1, 0, ''),
(20, '2019-12-26 17:07:41', '2019-12-26 10:07:41', '', 'saya2', NULL, 0, 0, 1, 0, ''),
(21, '2019-12-26 17:08:14', '2019-12-26 10:08:14', '', 'fasd', NULL, 0, 0, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(64) DEFAULT '/',
  `vendor_id` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `created_date`, `updated_date`, `name`, `vendor_id`, `state`) VALUES
(1, '2019-12-27 14:37:13', '2019-12-27 07:37:13', NULL, NULL, NULL),
(2, '2019-12-27 14:39:14', '2019-12-27 07:39:14', NULL, NULL, NULL),
(3, '2019-12-27 14:44:48', '2019-12-27 08:38:55', 'PO2', 17, NULL),
(4, '2019-12-27 14:46:18', '2019-12-27 07:46:18', NULL, NULL, NULL),
(5, '2019-12-27 14:46:52', '2019-12-27 07:46:52', NULL, NULL, NULL),
(6, '2019-12-27 14:48:05', '2019-12-27 07:48:05', NULL, NULL, NULL),
(7, '2019-12-27 14:48:07', '2019-12-27 07:48:07', NULL, NULL, NULL),
(8, '2019-12-27 14:49:46', '2019-12-27 07:49:46', NULL, NULL, NULL),
(9, '2019-12-27 14:50:25', '2019-12-27 07:50:25', NULL, NULL, NULL),
(10, '2019-12-27 14:50:25', '2019-12-27 07:50:25', '', NULL, NULL),
(11, '2019-12-27 14:56:51', '2019-12-27 07:56:51', NULL, NULL, NULL),
(12, '2019-12-27 15:04:45', '2019-12-27 08:04:45', NULL, NULL, NULL),
(13, '2019-12-27 15:05:11', '2019-12-27 08:05:11', NULL, NULL, NULL),
(14, '2019-12-27 15:06:25', '2019-12-27 08:06:25', NULL, NULL, NULL),
(15, '2019-12-27 15:07:00', '2019-12-27 08:07:00', NULL, NULL, NULL),
(16, '2019-12-27 15:08:23', '2019-12-27 08:08:23', NULL, NULL, NULL),
(17, '2019-12-27 15:13:39', '2019-12-27 08:13:39', NULL, NULL, NULL),
(18, '2019-12-27 15:14:00', '2019-12-27 08:14:00', NULL, NULL, NULL),
(19, '2019-12-27 15:14:39', '2019-12-27 08:14:39', NULL, NULL, NULL),
(20, '2019-12-27 15:15:20', '2019-12-27 08:15:20', NULL, NULL, NULL),
(21, '2019-12-27 15:15:50', '2019-12-27 08:15:50', NULL, NULL, NULL),
(22, '2019-12-27 15:17:02', '2019-12-27 08:17:02', NULL, NULL, NULL),
(23, '2019-12-27 15:17:41', '2019-12-27 08:17:41', NULL, NULL, NULL),
(24, '2019-12-27 15:17:52', '2019-12-27 08:17:52', NULL, NULL, NULL),
(25, '2019-12-27 15:18:31', '2019-12-27 08:18:31', NULL, NULL, NULL),
(26, '2019-12-27 15:23:49', '2019-12-27 08:23:49', NULL, NULL, NULL),
(27, '2019-12-27 15:23:58', '2019-12-27 08:23:58', NULL, NULL, NULL),
(28, '2019-12-27 15:24:12', '2019-12-27 08:24:12', NULL, NULL, NULL),
(29, '2019-12-27 15:25:42', '2019-12-27 08:25:42', NULL, NULL, NULL),
(30, '2019-12-27 15:26:26', '2019-12-27 08:26:26', NULL, NULL, NULL),
(31, '2019-12-27 15:26:55', '2019-12-27 08:26:55', NULL, NULL, NULL),
(32, '2019-12-27 15:27:23', '2019-12-27 08:27:23', NULL, NULL, NULL),
(33, '2019-12-27 15:30:08', '2019-12-27 08:30:08', NULL, NULL, NULL),
(34, '2019-12-27 15:32:04', '2019-12-27 08:32:04', NULL, NULL, NULL),
(35, '2019-12-27 15:32:16', '2019-12-27 08:32:16', NULL, NULL, NULL),
(36, '2019-12-27 15:33:37', '2019-12-27 08:33:37', NULL, NULL, NULL),
(37, '2019-12-27 15:33:55', '2019-12-27 08:33:55', NULL, NULL, NULL),
(38, '2019-12-27 15:34:35', '2019-12-27 08:34:35', NULL, NULL, NULL),
(39, '2019-12-27 15:34:36', '2019-12-27 08:36:23', 'PO1', 17, NULL),
(40, '2019-12-27 15:41:10', '2019-12-27 08:41:10', NULL, NULL, NULL),
(41, '2019-12-27 15:45:55', '2019-12-27 08:45:55', NULL, NULL, NULL),
(42, '2019-12-27 15:45:56', '2019-12-27 08:45:56', NULL, NULL, NULL),
(43, '2019-12-27 15:48:00', '2019-12-27 08:48:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `so_line`
--

CREATE TABLE `so_line` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sale_id` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_move`
--

CREATE TABLE `stock_move` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reference` varchar(32) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_qty` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `state` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `create_date`, `update_date`, `name`) VALUES
(1, '0000-00-00 00:00:00', '2019-12-26 07:47:22', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_date`, `updated_date`) VALUES
(1, 'Muhammad khotib', 'admin', '$2y$10$1wpMLeQ.crH5QvnRfB7aEu.TNCO3DAIeeWROdaCjjNPwgBaL9U/DK', 0, '2019-12-24 11:22:51', '2019-12-25 12:18:42'),
(2, 'Sales User', 'sales', '$2y$10$a/hjcSI5222OD2cTKL9cnOsos7dbiBgx9VYGtsm/GD78tuG5l5nXO', 1, '2019-12-25 01:05:57', '2019-12-24 18:05:57'),
(3, 'pur', 'purchasing', '$2y$10$oJ4ApCeVkImGFo0N77U33OlXQYQM71WfETC8qAZzNYIAEz1VR8mn.', 3, '2019-12-25 17:43:58', '2019-12-25 11:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(128) NOT NULL,
  `field_id` int(11) NOT NULL,
  `npwp` char(16) DEFAULT NULL,
  `contact` varchar(64) DEFAULT NULL,
  `account_number` varchar(128) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `attachment` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `created_date`, `updated_date`, `name`, `field_id`, `npwp`, `contact`, `account_number`, `address`, `attachment`) VALUES
(17, '2019-12-24 12:58:42', '2019-12-24 06:00:16', 'Muhammad Khotib', 2, '9827891789', '0838383838', '8793879', 'Jl. Keputih 3C nomor 50B', NULL),
(18, '2019-12-24 15:01:05', '2019-12-24 08:01:05', 'Administrator', 1, '1256612787', '0838383838', '8793879', 'Jl. Keputih 3C nomor 50B', NULL),
(19, '2019-12-24 15:53:22', '2019-12-24 08:53:22', 'Administrator', 1, '1256612787', '0838383838', '8793879', 'Jl. Keputih 3C nomor 50B', NULL),
(20, '2019-12-26 10:41:41', '2019-12-26 03:41:41', 'saaas', 1, '21112', '121212', '11212', 'Jl. Prof Dr. Supomo no30A, Umbulharjo, PT. Docotel Branch 3 Jogja', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_field`
--
ALTER TABLE `business_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_line`
--
ALTER TABLE `po_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_order`
--
ALTER TABLE `sale_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_line`
--
ALTER TABLE `so_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_move`
--
ALTER TABLE `stock_move`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_field`
--
ALTER TABLE `business_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `po_line`
--
ALTER TABLE `po_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `sale_order`
--
ALTER TABLE `sale_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `so_line`
--
ALTER TABLE `so_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_move`
--
ALTER TABLE `stock_move`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
