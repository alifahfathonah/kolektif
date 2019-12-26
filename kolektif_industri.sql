-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 10:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kolektif_industri`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_field`
--

CREATE TABLE `business_field` (
  `id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(128) NOT NULL,
  `contact` varchar(64) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `created_date`, `updated_date`, `name`, `contact`, `address`) VALUES
(1, '2019-12-26 13:59:53', '2019-12-26 07:02:21', 'Muhammad khotib2', '0998899', 'Jl. Prof Dr. Supomo no30A, Umbulharjo, PT. Docotel Branch 3 Jogja'),
(3, '2019-12-26 15:35:39', '2019-12-26 08:35:39', 'Haha', '121121', 'Jl. Keputih 3C nomor 50B'),
(4, '2019-12-26 15:36:31', '2019-12-26 08:36:37', 'asas', '1222', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_sku` varchar(32) DEFAULT NULL,
  `product_name` varchar(128) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `retail_price` float DEFAULT 0,
  `brand` int(11) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `on_hand` int(11) DEFAULT 0,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(64) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order`
--

CREATE TABLE `sale_order` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sale_id` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_date`, `updated_date`) VALUES
(1, 'Muhammad khotib', 'admin', '$2y$10$1wpMLeQ.crH5QvnRfB7aEu.TNCO3DAIeeWROdaCjjNPwgBaL9U/DK', 0, '2019-12-24 11:22:51', '2019-12-26 07:09:57'),
(2, 'Sales User', 'sales', '$2y$10$a/hjcSI5222OD2cTKL9cnOsos7dbiBgx9VYGtsm/GD78tuG5l5nXO', 1, '2019-12-25 01:05:57', '2019-12-24 18:05:57'),
(3, 'pur', 'purchasing', '$2y$10$oJ4ApCeVkImGFo0N77U33OlXQYQM71WfETC8qAZzNYIAEz1VR8mn.', 3, '2019-12-25 17:43:58', '2019-12-25 11:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
