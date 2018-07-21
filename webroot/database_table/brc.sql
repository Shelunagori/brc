-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 07:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `table_id` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `tax_id` int(10) NOT NULL,
  `round_off` decimal(5,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `voucher_no`, `table_id`, `total`, `tax_id`, `round_off`, `grand_total`, `customer_id`, `created_on`) VALUES
(1, '1', 1, '700.20', 1, '-0.19', '665.00', NULL, '2018-07-09 12:00:29'),
(2, '2', 2, '319.75', 1, '0.24', '304.00', NULL, '2018-07-09 12:00:29'),
(3, '3', 1, '198.00', 1, '-0.10', '188.00', NULL, '2018-07-09 12:00:29'),
(4, '4', 1, '1218.00', 1, '-0.10', '1157.00', NULL, '2018-07-09 12:00:29'),
(5, '5', 1, '594.00', 1, '-0.30', '564.00', 20, '2018-07-09 12:00:29'),
(6, '6', 1, '287.10', 1, '0.26', '273.00', 20, '2018-07-09 12:00:29'),
(7, '7', 1, '267.30', 1, '0.07', '254.00', 24, '2018-07-09 12:00:29'),
(8, '8', 1, '675.18', 1, '-0.42', '641.00', 20, '2018-07-09 12:00:29'),
(9, '9', 3, '921.24', 1, '-0.18', '875.00', 0, '2018-07-09 12:00:29'),
(10, '10', 14, '350.46', 1, '0.06', '333.00', 27, '2018-07-09 12:00:29'),
(11, '11', 1, '225.72', 1, '-0.43', '214.00', 28, '2018-07-09 12:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `bill_rows`
--

CREATE TABLE `bill_rows` (
  `id` int(10) NOT NULL,
  `bill_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount_per` decimal(10,2) DEFAULT '0.00',
  `net_amount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_rows`
--

INSERT INTO `bill_rows` (`id`, `bill_id`, `item_id`, `quantity`, `rate`, `amount`, `discount_per`, `net_amount`) VALUES
(1, 1, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(2, 1, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(3, 1, 3, '1.00', '99.00', '99.00', NULL, '99.00'),
(4, 1, 7, '3.60', '112.00', '403.20', NULL, '403.20'),
(5, 2, 2, '1.00', '99.00', '99.00', '10.36', '88.74'),
(6, 2, 3, '1.00', '99.00', '99.00', NULL, '99.00'),
(7, 2, 4, '1.00', '99.00', '99.00', '66.66', '33.01'),
(8, 2, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(9, 3, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(10, 3, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(11, 4, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(12, 4, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(13, 4, 3, '1.00', '99.00', '99.00', NULL, '99.00'),
(14, 4, 4, '1.00', '99.00', '99.00', NULL, '99.00'),
(15, 4, 7, '2.00', '112.00', '224.00', NULL, '224.00'),
(16, 4, 8, '2.00', '299.00', '598.00', NULL, '598.00'),
(17, 5, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(18, 5, 2, '2.00', '99.00', '198.00', NULL, '198.00'),
(19, 5, 3, '2.00', '99.00', '198.00', NULL, '198.00'),
(20, 5, 4, '1.00', '99.00', '99.00', NULL, '99.00'),
(21, 6, 1, '1.00', '99.00', '99.00', '10.00', '89.10'),
(22, 6, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(23, 6, 3, '1.00', '99.00', '99.00', NULL, '99.00'),
(24, 7, 1, '1.00', '99.00', '99.00', '10.00', '89.10'),
(25, 7, 3, '1.00', '99.00', '99.00', '10.00', '89.10'),
(26, 7, 4, '1.00', '99.00', '99.00', '10.00', '89.10'),
(27, 8, 7, '1.10', '112.00', '123.20', '10.00', '110.88'),
(28, 8, 5, '1.00', '99.00', '99.00', '10.00', '89.10'),
(29, 8, 6, '1.00', '99.00', '99.00', '10.00', '89.10'),
(30, 8, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(31, 8, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(32, 8, 3, '1.00', '99.00', '99.00', '10.00', '89.10'),
(33, 8, 4, '1.00', '99.00', '99.00', NULL, '99.00'),
(34, 9, 7, '3.60', '112.00', '403.20', '10.00', '362.88'),
(35, 9, 1, '1.00', '99.00', '99.00', NULL, '99.00'),
(36, 9, 4, '1.00', '99.00', '99.00', '36.00', '63.36'),
(37, 9, 5, '2.00', '99.00', '198.00', NULL, '198.00'),
(38, 9, 6, '2.00', '99.00', '198.00', NULL, '198.00'),
(39, 10, 1, '1.00', '99.00', '99.00', '10.00', '89.10'),
(40, 10, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(41, 10, 3, '1.00', '99.00', '99.00', '36.00', '63.36'),
(42, 10, 4, '1.00', '99.00', '99.00', NULL, '99.00'),
(43, 11, 1, '1.00', '99.00', '99.00', '36.00', '63.36'),
(44, 11, 2, '1.00', '99.00', '99.00', NULL, '99.00'),
(45, 11, 4, '1.00', '99.00', '99.00', '36.00', '63.36');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text,
  `mobile_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `mobile_no`) VALUES
(1, 'Abhilash', 'jdbfjksdbgdfgsdfsgsg', '987654321'),
(2, 'Abhilash', 'jdbfjksdbgdfgsdfsgsg', '987654321'),
(3, 'Abhilash', 'jdbfjksdbgdfgsdfsgsg', '987654321'),
(4, 'Abhilash', 'jdbfjksdbgdfgsdfsgsg', '987654321'),
(5, 'sfddf', ' sdfsdf\ndsfdsf', '98765432'),
(6, 'sda', ' dasd', '9876543211'),
(7, 'saasd', ' sadsadas', '9876543'),
(8, 'sdas', ' dsadasd', '987654323'),
(9, 's', ' asdasd', '23434'),
(10, 'asdsa', ' dsad', '5654'),
(11, 'sd', ' asdasd', '345'),
(12, 'sd', ' asdasd', '345'),
(13, 'sad', ' asdasd', '98765432e'),
(14, 'dsfsdf', ' sdfdsf', '54654'),
(15, 'gdfg', 'dfg', '3454'),
(16, 'sfsd', ' fdsf', '657567'),
(17, 'erwe', ' rewre', '43'),
(18, 'weewr', ' werwr', '33'),
(19, 'sdsf', ' sdfsdf', '32423'),
(20, 'Abhilash Lohar', 'Hiran  Mangri\nSec 4 ', '9636653883'),
(21, 'Vivek', 'sosdfsdf adas fs ', '9636653883'),
(22, 'qwe', ' qwe', '9636653883'),
(23, 'Manoj tanwar', '', '1234567890'),
(24, 'Priyanka jingar', 'Hiran mangri \nsec 5', '9694561206'),
(25, 'Gourav parmar', 'qwert sdfsdf dsfsdf\nsadfsdf ds ', '1123456765'),
(26, 'Rahul Jain', 'bla bla bla...', '9785055571'),
(27, 'Test USer', 'wefweg\nwefsdf', '9999999999'),
(28, 'Dashrath Menaria', 'asfsefasda\nfsdfadsfdf\nsfdsf', '9636653888');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_sub_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_sub_category_id`, `name`, `rate`, `created_on`, `created_by`, `is_deleted`) VALUES
(1, 1, 'FIVE GUYS', '99.00', '2018-06-28 12:07:31', 0, 0),
(2, 1, 'IN-N-OUT', '99.00', '2018-06-28 12:07:31', 0, 0),
(3, 1, 'ARBY''S', '99.00', '2018-06-28 12:07:31', 0, 0),
(4, 1, 'MCDONALD''S', '99.00', '2018-06-28 12:07:31', 0, 0),
(5, 2, 'SHAKESHACK', '99.00', '2018-06-28 12:07:31', 0, 0),
(6, 2, 'STEAK ''N SHAKE', '99.00', '2018-06-28 12:07:31', 0, 0),
(7, 3, 'Panjabi Paneer Masala', '112.00', '2018-07-03 15:21:02', 1, 0),
(8, 3, 'American Lamb Chopsuey', '299.00', '2018-07-03 15:21:53', 1, 0),
(9, 6, 'Item One', '169.00', '2018-07-07 13:10:52', 1, 0),
(10, 7, 'Item Two', '200.00', '2018-07-07 13:11:14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `is_deleted`) VALUES
(1, 'Fast Food', 0),
(2, 'Main Course', 0),
(3, 'Category one', 0),
(4, 'Category two', 0),
(5, 'Category three', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_sub_categories`
--

CREATE TABLE `item_sub_categories` (
  `id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL COMMENT '0 = active, 1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_sub_categories`
--

INSERT INTO `item_sub_categories` (`id`, `item_category_id`, `name`, `is_deleted`) VALUES
(1, 1, 'Fries', 0),
(2, 1, 'Burgers', 0),
(3, 2, 'Paneer Group', 0),
(4, 3, 'Sub Category One', 0),
(5, 4, 'Sub Category Two', 0),
(6, 4, 'Sub Category Three', 0),
(7, 5, 'Sub Category Four', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kots`
--

CREATE TABLE `kots` (
  `id` int(10) NOT NULL,
  `voucher_no` varchar(100) NOT NULL,
  `table_id` int(10) NOT NULL,
  `bill_pending` varchar(10) NOT NULL DEFAULT 'yes',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bill_id` int(10) DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kots`
--

INSERT INTO `kots` (`id`, `voucher_no`, `table_id`, `bill_pending`, `created_on`, `bill_id`, `created_by`, `amount`) VALUES
(1, '1', 8, 'yes', '2018-07-20 17:48:54', NULL, 7, '99.00'),
(2, '2', 8, 'yes', '2018-07-20 17:49:17', NULL, 7, '396.00'),
(3, '3', 8, 'yes', '2018-07-20 18:37:57', NULL, 7, '198.00');

-- --------------------------------------------------------

--
-- Table structure for table `kot_rows`
--

CREATE TABLE `kot_rows` (
  `id` int(10) NOT NULL,
  `kot_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kot_rows`
--

INSERT INTO `kot_rows` (`id`, `kot_id`, `item_id`, `quantity`, `rate`, `amount`) VALUES
(1, 1, 2, '1.00', '99.00', '99.00'),
(2, 2, 3, '1.00', '99.00', '99.00'),
(3, 2, 2, '1.00', '99.00', '99.00'),
(4, 2, 1, '1.00', '99.00', '99.00'),
(5, 2, 4, '1.00', '99.00', '99.00'),
(6, 3, 3, '1.00', '99.00', '99.00'),
(7, 3, 4, '1.00', '99.00', '99.00');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `c_mobile` varchar(10) DEFAULT NULL,
  `no_of_pax` int(10) DEFAULT NULL,
  `occupied_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `status`, `c_name`, `c_mobile`, `no_of_pax`, `occupied_time`) VALUES
(1, '101', 'occupied', 'Abhilash Lohar', '4354354356', 2, '2018-07-18 05:48:32'),
(2, '102', 'occupied', 'Dasharath', '9999999999', 5, '2018-07-18 06:42:58'),
(3, '103', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(4, '104', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(5, '105', 'occupied', 'Manoj', '9999999999', 5, '2018-07-20 10:33:20'),
(6, '106', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(7, '107', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(8, '108', 'occupied', 'Manoj Tanwar', '9876543210', 2, '2018-07-20 10:37:07'),
(9, '109', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(10, '110', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(11, '111', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(12, '112', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(13, '113', 'vacant', '', '', 0, '2018-07-18 05:26:57'),
(14, '114', 'vacant', '', '', 0, '2018-07-18 05:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `tax_per` decimal(5,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `tax_per`, `status`) VALUES
(1, '5%', '5.00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`) VALUES
(5, 'Admin', 'admin', '$2y$10$Sv9bnkMkpq73/2IdianeQOEg7rx2LjAVC2mLaRE/e3Hs14SEojRB.', 'admin'),
(6, 'Guard', 'guard', '$2y$10$ngw6acQ8TZVeeD6rGRx0NeTX8i4l/8FE8LZok/Yqamp47xMbj.rui', 'guard'),
(7, 'Steward 1', 'steward1', '$2y$10$DbCiQapncmFqFM5OovtosO6TBN3zkAjBkZi3NpGEtCxLJnDq8MkY6', 'steward'),
(8, 'Steward 2', 'steward2', '$2y$10$cbEMVOsAc98FKJqosnynoujvYT34xn8iwjSC7D.HNVMahHUG4NBLy', 'steward'),
(9, 'Cook', 'cook', '$2y$10$wzM5iwPGbYmSFqS66ILFOugJD.DxQuJjtRWuRMaPgIcGuNbfjD37m', 'cook'),
(10, 'Cashier', 'cashier', '$2y$10$ZsDFQYugfdzA9gadw3SQIu7kbrx2Xs3Qw61M6Xn557CqrUgB9vCYW', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_rows`
--
ALTER TABLE `bill_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_sub_categories`
--
ALTER TABLE `item_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kots`
--
ALTER TABLE `kots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kot_rows`
--
ALTER TABLE `kot_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bill_rows`
--
ALTER TABLE `bill_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `item_sub_categories`
--
ALTER TABLE `item_sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kots`
--
ALTER TABLE `kots`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kot_rows`
--
ALTER TABLE `kot_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
