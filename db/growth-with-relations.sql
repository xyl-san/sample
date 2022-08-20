-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 05:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `growth-with-relations`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`, `type`) VALUES
(1, 'admin', '$2y$10$x1t9AUtZte8K07Z83AkPau/rZZaN1xbhoJjl6oWbbjMq6rTLRvTcy', 'steven', 'lizada', '', '2022-08-18', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashadvance`
--

CREATE TABLE `cashadvance` (
  `cashadvance_id` int(11) NOT NULL,
  `date_advance` date NOT NULL,
  `employee_id` int(15) NOT NULL,
  `amount` double NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(50) NOT NULL,
  `customer_lastname` varchar(50) NOT NULL,
  `customer_contact_info` varchar(50) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  `customer_created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_id` int(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `deduction_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `created_on`, `updated_on`, `delete_flag`) VALUES
(1, 'IT Department', '2022-08-16 15:43:47', '2022-08-16 15:43:47', 0),
(2, 'Accounting Department', '2022-08-18 10:29:35', '2022-08-18 10:29:35', 0),
(3, 'Billing Department', '2022-08-18 10:29:59', '2022-08-18 10:29:59', 0),
(4, 'Marketing Department', '2022-08-18 10:31:48', '2022-08-18 10:31:48', 0),
(5, 'Production Department', '2022-08-18 10:32:51', '2022-08-18 10:32:51', 0),
(6, 'Engineering Department', '2022-08-18 10:33:34', '2022-08-18 10:33:34', 0),
(7, 'Risk Management Department', '2022-08-18 10:34:57', '2022-08-18 10:34:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_code` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `job_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL COMMENT '[1] - True [0] - False'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_code`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `job_id`, `department_id`, `schedule_id`, `photo`, `created_on`, `updated_on`, `delete_flag`) VALUES
(76, 'VUW314698250', 'Roge', 'Catubig', 'Paco, Metro Manila', '0001-11-11', '09090909', 'male', 1, 1, 8, '', '2022-08-20 10:04:16', '2022-08-20 10:04:16', 0),
(77, 'BRL547690812', '1', '1', '1', '0011-01-11', '1', 'male', 17, 1, 8, '', '2022-08-20 10:07:42', '2022-08-20 10:07:42', 0),
(78, 'YCB027846531', '1', '1', '1', '0001-01-12', '1', 'male', 18, 1, 8, '', '2022-08-20 10:09:39', '2022-08-20 10:09:39', 0),
(79, 'ZEA684915073', '1', '1', '1', '0001-11-11', '1', 'male', 17, 2, 8, '', '2022-08-20 10:13:12', '2022-08-20 10:13:12', 0),
(81, 'MEG517068439', '1', '1', '1', '0001-11-11', '1', 'male', 18, 1, 8, '', '2022-08-20 10:51:09', '2022-08-20 10:51:09', 0),
(82, 'VJQ531986742', 'ASD', 'Cadugyot', 'Gloria III Tandang Sora Quezon City', '0000-00-00', '023', 'male', 2, 2, 8, '', '2022-08-20 11:18:53', '2022-08-20 11:18:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `product_id` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` float NOT NULL,
  `price` float NOT NULL,
  `stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_unit` varchar(10) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_total` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `description`, `rate`, `created_on`, `updated_on`, `delete_flag`) VALUES
(1, 'Programmer', 550, '2022-08-16 15:42:08', '2022-08-16 15:42:08', 0),
(2, 'Software Developer', 537, '2022-08-18 10:28:13', '2022-08-18 10:28:13', 0),
(3, 'Computer Hardware', 537, '2022-08-18 10:36:42', '2022-08-18 10:36:42', 0),
(4, 'Troubleshooting', 537, '2022-08-18 10:37:22', '2022-08-18 10:37:22', 0),
(5, 'IT Technician', 750, '2022-08-18 10:38:54', '2022-08-18 10:38:54', 0),
(6, 'Support Specialist', 850, '2022-08-18 10:39:18', '2022-08-18 10:39:18', 0),
(7, 'IT Security Specialist', 850, '2022-08-18 10:41:54', '2022-08-18 10:41:54', 0),
(8, 'System Analyst', 850, '2022-08-18 10:41:54', '2022-08-18 10:41:54', 0),
(9, 'Network Engineer', 850, '2022-08-18 10:41:54', '2022-08-18 10:41:54', 0),
(10, 'Software Engineer', 850, '2022-08-18 10:41:54', '2022-08-18 10:41:54', 0),
(11, 'Accounting Manager', 850, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(12, 'Accounting officer', 650, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(13, 'Accounting Clerk', 537, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(14, 'General accountant', 750, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(15, 'Auditor', 537, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(16, 'Treasurer', 537, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(17, 'Financial Analyst', 537, '2022-08-18 10:48:54', '2022-08-18 10:48:54', 0),
(18, 'Billing Manager', 850, '2022-08-18 10:52:18', '2022-08-18 10:52:18', 0),
(19, 'Billing Specialist', 650, '2022-08-18 10:52:18', '2022-08-18 10:52:18', 0),
(20, 'Billing Clerk', 0, '2022-08-18 10:52:18', '2022-08-18 10:52:18', 0),
(21, 'Billing Officer', 0, '2022-08-18 10:52:18', '2022-08-18 10:52:18', 0),
(22, 'Chief Marketing Officer (CMO)', 950, '2022-08-18 10:56:15', '2022-08-18 10:56:15', 0),
(23, 'Financial Analyst', 750, '2022-08-18 10:56:15', '2022-08-18 10:56:15', 0),
(24, 'Digital Marketing Manager', 650, '2022-08-18 10:56:15', '2022-08-18 10:56:15', 0),
(25, 'Communications Manager', 537, '2022-08-18 10:56:15', '2022-08-18 10:56:15', 0),
(26, 'Content Marketing Specialist', 537, '2022-08-18 10:56:15', '2022-08-18 10:56:15', 0),
(27, 'Production Manager', 950, '2022-08-18 11:08:52', '2022-08-18 11:08:52', 0),
(28, 'Production Supervisor', 850, '2022-08-18 11:08:52', '2022-08-18 11:08:52', 0),
(29, 'Production Operator', 650, '2022-08-18 11:08:52', '2022-08-18 11:08:52', 0),
(30, 'Production Monitoring', 650, '2022-08-18 11:08:52', '2022-08-18 11:08:52', 0),
(31, 'Production Officer', 537, '2022-08-18 11:08:52', '2022-08-18 11:08:52', 0),
(32, 'Chief Engineering', 1500, '2022-08-18 11:14:03', '2022-08-18 11:14:03', 0),
(33, 'VP Engineering', 1000, '2022-08-18 11:14:03', '2022-08-18 11:14:03', 0),
(34, 'Director Of Engineering', 950, '2022-08-18 11:14:03', '2022-08-18 11:14:03', 0),
(35, 'Engineering Manager', 850, '2022-08-18 11:14:03', '2022-08-18 11:14:03', 0),
(36, 'Individual Contributors ', 750, '2022-08-18 11:14:03', '2022-08-18 11:14:03', 0),
(37, ' Environmental Compliance Specialist', 2500, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(38, 'Loss Control Consultant', 2000, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(39, ' Compliance Consultant', 1800, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(40, ' Compliance Officer', 1500, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(41, 'Risk Analyst', 1300, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(42, 'Risk and Compliance Investigator', 1000, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(43, ' Model Risk Specialist', 850, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(44, 'Regulatory Affairs Managers', 750, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(47, 'Risk Manager', 650, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0),
(48, 'Chief Risk Officer', 537, '2022-08-18 11:24:05', '2022-08-18 11:24:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `overtime_id` int(11) NOT NULL,
  `employee_id` int(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_terms`
--

CREATE TABLE `payment_terms` (
  `payment_terms_id` int(11) NOT NULL,
  `payment_methods` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchase_order_id` int(11) NOT NULL,
  `purchase_order_code` varchar(12) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` float NOT NULL,
  `subtotal` float NOT NULL,
  `sales_tax` float NOT NULL,
  `total` float NOT NULL,
  `purchase_date` date NOT NULL,
  `expected_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL COMMENT '[0] - Pending [1] - Received\r\n',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `time_in`, `time_out`, `created_on`, `updated_on`, `delete_flag`) VALUES
(8, '09:00:00', '00:00:18', '2022-08-20 10:03:57', '2022-08-20 10:03:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_code` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` bigint(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `id` int(11) NOT NULL,
  `supplier_product_id` varchar(50) NOT NULL,
  `supplier_product_name` varchar(80) NOT NULL,
  `supplier_product_description` varchar(80) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD PRIMARY KEY (`cashadvance_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`deduction_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `position_id` (`job_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`overtime_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`payment_terms_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `cashadvance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `overtime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_terms`
--
ALTER TABLE `payment_terms`
  MODIFY `payment_terms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_product`
--
ALTER TABLE `supplier_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD CONSTRAINT `cashadvance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deductions`
--
ALTER TABLE `deductions`
  ADD CONSTRAINT `deductions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `overtime`
--
ALTER TABLE `overtime`
  ADD CONSTRAINT `overtime_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
