-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 04:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `accounting_periods`
--

CREATE TABLE `accounting_periods` (
  `accounting_periods_id` int(11) NOT NULL,
  `accounting_periods_code` varchar(50) NOT NULL,
  `opening_date` date NOT NULL,
  `fiscal_year_end` date NOT NULL,
  `periodicity` varchar(50) NOT NULL,
  `reminder` bigint(50) NOT NULL,
  `journal` varchar(50) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounting_periods`
--

INSERT INTO `accounting_periods` (`accounting_periods_id`, `accounting_periods_code`, `opening_date`, `fiscal_year_end`, `periodicity`, `reminder`, `journal`, `delete_flag`) VALUES
(12, 'IUC163479508', '2022-09-19', '2023-09-19', '', 0, '', 0),
(13, 'MLJ809745621', '2022-09-19', '2023-09-19', 'Semi-Annually', 100, 'Miscellaneous Operations', 0),
(14, 'GLP962578301', '2022-09-20', '2023-09-20', 'Annually', 45, 'Exchange Difference', 0),
(15, 'AEB382764901', '2022-09-20', '2023-09-20', 'Annually', 10, 'Cash Basis Taxes', 0),
(16, 'NJD720459861', '2022-09-20', '2023-09-20', 'Monthly', 10, 'Miscellaneous Operations', 0),
(17, 'CNF241659730', '2022-09-28', '2023-09-28', 'Quarterly', 3, 'Point of Sale', 0),
(18, 'QHJ430928571', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Miscellaneous Operations', 0),
(19, 'XJV219587034', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Point of Sale', 0),
(20, 'XLH316805742', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Inventory Valuation', 0),
(21, 'JRG698710345', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Inventory Valuation', 0),
(22, 'BUO974031286', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Point of Sale', 0),
(23, 'KGB261374850', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Point of Sale', 0),
(24, 'USC249507836', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Exchange Difference', 0),
(25, 'WRA481576390', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Miscellaneous Operations', 0),
(26, 'YUM820714936', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Miscellaneous Operations', 0),
(27, 'JXY506813972', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Miscellaneous Operations', 0),
(28, 'YRM286713940', '2022-09-30', '2023-09-30', 'Monthly', 1, '3', 0),
(29, 'BUZ628517934', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Exchange Difference', 0),
(30, 'DRM528496031', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Exchange Difference', 0),
(31, 'BTA534987061', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Cash Basis Taxes', 0),
(32, 'IZL680139452', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(33, 'UFL823450769', '2022-09-30', '2023-09-30', 'Monthly', 6, '2', 0),
(34, 'PQC093785461', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(35, 'MHS830725649', '2022-09-30', '2023-09-30', 'Monthly', 2, '1', 0),
(36, 'MAR429763850', '2022-09-30', '2023-09-30', 'Monthly', 2, '1', 0),
(37, 'KEV259604173', '2022-09-30', '2023-09-30', 'Monthly', 2, '1', 0),
(38, 'NHJ457193068', '2022-09-30', '2023-09-30', 'Monthly', 2, '1', 0),
(39, 'RNJ943805716', '2022-09-30', '2023-09-30', 'Monthly', 2, '1', 0),
(40, 'GYZ532794061', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(41, 'KZT539486017', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(42, 'YFD347650819', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(43, 'HRO851609243', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(44, 'DON918750462', '2022-09-30', '2023-09-30', 'Monthly', 1, '1', 0),
(45, 'EWF269043587', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Cash Basis Taxes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_list`
--

CREATE TABLE `account_list` (
  `account_id` int(11) NOT NULL,
  `account_code` varchar(50) NOT NULL,
  `account_description` varchar(50) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `allow_reconciliation` tinyint(4) NOT NULL,
  `debit` decimal(10,2) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  `opening_balance` decimal(10,2) NOT NULL,
  `default_taxes` varchar(20) NOT NULL,
  `tags` varchar(50) NOT NULL,
  `journal_id` int(11) NOT NULL COMMENT 'ALLOWED JOURNAL',
  `deprecated` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`account_id`, `account_code`, `account_description`, `account_name`, `allow_reconciliation`, `debit`, `credit`, `opening_balance`, `default_taxes`, `tags`, `journal_id`, `deprecated`, `delete_flag`) VALUES
(1, '2022-0001', 'Current Assets', 'Current Assets', 1, '5.00', '5.00', '5.00', '5', '5', 2, '', 0),
(2, '2022-0002', 'Account Receivable (PoS)', 'Receivable', 1, '12.00', '13.00', '13.00', '13', '', 1, '', 0),
(3, '2022-0003', 'Bank Suspense Account', 'Current Assets', 1, '0.00', '0.00', '0.00', '1', '', 1, '', 0),
(4, '2022-0004', 'Outstanding  Receipts', 'Current Assets', 1, '0.00', '0.00', '0.00', '13', '13', 1, '', 0),
(5, '2022-0005', 'Outstanding Payments', 'Current Assets', 1, '0.00', '0.00', '0.00', '00', '', 1, '', 0),
(6, '2022-0006', 'Bank', 'Bank and Cash', 0, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(7, '2022-0007', 'Cash', 'Bank and Cash', 1, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(8, '2022-0008', 'Liquidity Transfer', 'Current Assets', 0, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(9, '2022-0009', 'Stock  Valuation', 'Current Assets', 0, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(10, '2022-0010', 'Stock Interim (Received)', 'Current Assets', 0, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(11, '2022-0011', 'Stock Interim (Delivered)', 'Current Assets', 1, '0.00', '0.00', '0.00', '00', '', 1, '', 0),
(12, '2022-0012', 'Account Receivable', 'Receivable', 0, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(13, '2022-0013', 'Products to receive', 'Current Assets', 0, '0.00', '0.00', '0.00', '', '', 1, '', 0),
(14, '2022-0014', 'Tax Paid', 'Current Assets', 1, '0.00', '0.00', '0.00', '00', '', 1, '', 0),
(15, '2022-0015', 'Tax Receivable', 'Current Assets', 0, '0.00', '0.00', '0.00', '00', 'None', 2, '', 0),
(16, '2022-0016', 'Prepayments', 'Prepayments', 0, '0.00', '0.00', '0.00', '00', '00', 5, '', 0),
(17, '2022-0017', 'Fixed Asset', 'Fixed Assets', 1, '0.00', '0.00', '0.00', '00', '', 3, '', 0),
(644, '2022-0018', 'Non-current assets', 'Non-current Assets', 1, '0.00', '0.00', '0.00', '00', '00', 3, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_type_list`
--

CREATE TABLE `account_type_list` (
  `account_type_list_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type_list`
--

INSERT INTO `account_type_list` (`account_type_list_id`, `account_name`, `type`, `delete_flag`) VALUES
(1, 'Bank and Cash', 'Liquidity', 0),
(2, 'Cost of Revenue', 'Regular', 0),
(3, 'Credit Card', 'Liquidity', 0),
(4, 'Current Assets', 'Regular', 0),
(5, 'Current Liabilities', 'Regular', 0),
(6, 'Current Year Earnings', 'Regular', 0),
(7, 'Depreciation', 'Regular', 0),
(8, 'Equity', 'Regular', 0),
(9, 'Expenses', 'Regular', 0),
(10, 'Fixed Assets', 'Regular', 0),
(11, 'Income', 'Regular', 0),
(12, 'Non-current Assets', 'Regular', 0),
(13, 'Non-current Liabilities', 'Regular', 0),
(14, 'Off-Balance Sheet', 'Regular', 0),
(15, 'Other Income', 'Regular', 0),
(16, 'Payable', 'Payable', 0),
(17, 'Prepayments', 'Regular', 0),
(18, 'Receivable', 'Receivable', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
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
(1, 'admin', '$2y$10$rvKMwNpFI3J1vMSEAMDQr.RLpGq6rp4/QwZOFbWQDdRX3hoDmCACy', 'steven', 'lizada', '', '2022-08-18', 'admin');

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

--
-- Dumping data for table `cashadvance`
--

INSERT INTO `cashadvance` (`cashadvance_id`, `date_advance`, `employee_id`, `amount`, `created_on`, `updated_on`, `delete_flag`) VALUES
(2, '2022-09-20', 81, 65462, '2022-09-30 09:49:05', '2022-09-30 09:49:05', 0);

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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `description`, `duration`) VALUES
(2, 'IT', '1 month'),
(3, 'cs', '2months'),
(4, 'IS', '3 months');

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE `credit_notes` (
  `credit_notes_id` int(11) NOT NULL,
  `credit_notes_code` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `terms` varchar(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_reference` varchar(20) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `delete_flag` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_notes`
--

INSERT INTO `credit_notes` (`credit_notes_id`, `credit_notes_code`, `customer_id`, `invoice_date`, `due_date`, `terms`, `employee_id`, `product_id`, `label`, `account_id`, `quantity`, `price`, `tax`, `subtotal`, `total_amount`, `currency`, `payment_status`, `payment_reference`, `notes`, `delete_flag`) VALUES
(4, 'ujuuy', 2, '2022-09-17', '2022-09-17', '0', 80, 3, '2', 17, '10.00', '10.00', '10.71', '89.29', '100.00', 'USD', 'tutyu', 'uutyu', '', 0),
(5, 'sasdasadsadsd', 2, '2022-09-17', '2022-09-17', '1 Month', 81, 3, '2', 19, '10.00', '10.00', '10.71', '89.29', '100.00', 'USD', '', 'dsadsadsasad', '', 0),
(6, 'fafafsasfa', 2, '2022-10-07', '0000-00-00', '15 Days', 80, 2, '2', 16, '10.00', '10.00', '10.71', '89.29', '100.00', 'PHP', '', 'faaafs', 'faffaf', 0);

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

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_contact_info`, `customer_address`, `customer_created_on`, `employee_id`, `created_on`, `updated_on`, `delete_flag`) VALUES
(1, 'Steve', 'Lizada', '09451221', 'QC', '2022-09-15 03:26:40', 80, '2022-09-15 11:26:40', '2022-09-15 11:26:40', 0),
(2, 'Maang', 'Conar', '0969222', 'Paco Manila', '2022-09-16 16:52:09', 81, '2022-09-15 15:52:55', '2022-09-15 15:52:55', 0);

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
(10, 'IT', '2022-09-01 11:30:29', '2022-09-01 11:30:29', 0),
(11, 'Accounting', '2022-09-01 11:30:38', '2022-09-01 11:30:38', 0),
(12, 'Sales', '2022-09-01 11:30:45', '2022-09-01 11:30:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `employee_code` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL COMMENT '[1] - True [0] - False'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `department_id`, `job_id`, `schedule_id`, `employee_code`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `photo`, `created_on`, `updated_on`, `delete_flag`) VALUES
(80, 10, 51, 8, 'ABC000000000', 'Steven Edward', 'Lizada', 'Emerald lane, Culiat Quezon City', '1997-12-12', '09615089172', 'Male', 'pogi.png', '2022-09-01 14:01:45', '2022-09-01 14:01:45', 0),
(81, 11, 51, 8, 'ABC000000000', 'Edward', 'Collins', 'USA', '1997-12-12', '121231232', 'Male', 'pogi.png', '2022-09-01 14:02:05', '2022-09-01 14:02:05', 0),
(82, 12, 51, 8, 'ABC000000000', 'Roge', 'Cawaters', 'Manila', '2022-09-01', '121231212', '', 'fguck.png', '2022-09-01 14:23:54', '2022-09-01 14:23:54', 0),
(84, 10, 51, 8, 'FXH624098573', 'Cina', 'mona', 'saldkj', '1996-12-12', '54', 'male', '', '2022-09-24 17:26:06', '2022-09-24 17:26:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE `group_list` (
  `group_id` int(30) NOT NULL,
  `group_name` text NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= Debit, 1= Credit',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes ',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`group_id`, `group_name`, `description`, `type`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Assets', 'The cash, inventory, and other resources you owned.', 0, 1, 0, '2022-02-01 09:56:35', '2022-08-29 13:33:53'),
(2, 'Revenue', 'Cash coming into your business through sales and other types of payments', 1, 1, 0, '2022-02-01 09:57:45', '2022-09-02 20:55:05'),
(3, 'Expenses', 'The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.', 0, 1, 0, '2022-02-01 09:58:09', '2022-09-02 20:55:11'),
(4, 'Liabilities', 'The money you still owe on loans, debts, and other obligations.', 1, 1, 0, '2022-02-01 09:58:34', '2022-09-02 20:55:14'),
(5, 'Equity', 'How much is remaining after you subtract liabilities from assets.', 1, 1, 0, '2022-02-01 09:59:05', '2022-09-03 15:56:54'),
(6, 'Withdrawals', 'Form of income that shareholders of corporations receive for each share of stock that they hold.', 0, 1, 0, '2022-02-01 10:00:13', '2022-09-03 15:56:46');

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
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_code` varchar(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `label` varchar(50) NOT NULL,
  `account_id` int(50) NOT NULL,
  `quantity` bigint(50) NOT NULL,
  `price` double NOT NULL,
  `taxes` double NOT NULL,
  `subtotal` double NOT NULL,
  `amount_total` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `currency` varchar(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `terms` varchar(11) NOT NULL,
  `payment_reference` varchar(20) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `invoice_notes` varchar(50) NOT NULL,
  `delete_flag` tinyint(11) NOT NULL COMMENT '[1] - True [0] - False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_code`, `product_id`, `label`, `account_id`, `quantity`, `price`, `taxes`, `subtotal`, `amount_total`, `customer_id`, `currency`, `invoice_date`, `due_date`, `terms`, `payment_reference`, `employee_id`, `invoice_notes`, `delete_flag`) VALUES
(33, 'CINV-2022-01', 0, '3', 1, 1, 79000, 8464.29, 70535.71, 79000, 0, 'USD', '2022-09-17', '0000-00-00', '15 Days', 'pay-001', 0, '', 0),
(34, 'CINV-2022-2', 0, '2', 1, 1, 79999, 8571.32, 71427.68, 79999, 0, 'PHP', '2022-09-17', '2022-09-17', '15 Days', 'pay-001', 0, 'Motorcycle', 0),
(35, 'cust-inv-2020', 0, '2', 20, 100, 10, 10.71, 89.29, 100, 0, 'PHP', '2022-09-17', '0000-00-00', '21 Days', 'bank transfer', 0, 'just do it', 0),
(36, 'tilapia', 0, '3', 20, 10, 100, 107.14, 892.86, 1000, 0, 'USD', '2022-09-30', '2022-09-28', '45 Days', 'dsasasad', 0, '1100', 0);

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
  `department_id` int(11) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `department_id`, `job_name`, `description`, `rate`, `created_on`, `updated_on`, `delete_flag`) VALUES
(51, 11, 'Accountant', 'Accountant', 550, '2022-09-01 13:59:38', '2022-09-01 13:59:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `journal_id` int(11) NOT NULL,
  `journal_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`journal_id`, `journal_name`) VALUES
(1, 'Cash Basis Taxes'),
(2, 'Exchange Difference'),
(3, 'Inventory Valuation'),
(4, 'Miscellaneous Operations'),
(5, 'Point of Sale');

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `journal_entries_id` int(11) NOT NULL,
  `journal_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `journal_entries_code` varchar(50) NOT NULL,
  `partner` varchar(50) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'Active or Inactive',
  `type` tinyint(4) NOT NULL COMMENT 'Debit or Credit',
  `to_check` varchar(50) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL COMMENT '	[1] - True [0] - False'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_entries`
--

INSERT INTO `journal_entries` (`journal_entries_id`, `journal_id`, `date`, `journal_entries_code`, `partner`, `reference`, `total`, `status`, `type`, `to_check`, `delete_flag`) VALUES
(1, 1, '2022-09-29 09:12:36', 'sadfsdfasdfajksdfa', 'VPD Business Solutions Inc', 'TRANS0001', '1000000.00', 0, 1, '', 0),
(3, 1, '2022-09-07 15:56:00', 'CABA09635', 'VPD BUSINESS Solutions', '234234', '150.23', 1, 1, '', 0),
(4, 2, '2022-09-23 16:25:00', 'CABA 09635', 'VPD BUSINESS SOLUTIONS', 'BANK TRANSFER', '45.65', 1, 0, '', 0),
(5, 3, '2022-09-14 17:31:00', 'INV-002', 'Bek', 'pancit canton', '23.00', 1, 0, '', 0),
(6, 4, '2022-09-29 16:00:00', 'MISC', 'Direk', 'Crackers', '15.50', 1, 1, '', 0),
(7, 1, '2022-10-01 10:49:00', '524', 'kikikik', '321', '0.03', 1, 0, '', 0),
(8, 1, '2022-10-01 13:24:00', 'sada', 'sadad', 'asdd', '0.02', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journal_items`
--

CREATE TABLE `journal_items` (
  `journal_id` int(30) NOT NULL,
  `account_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_items`
--

INSERT INTO `journal_items` (`journal_id`, `account_id`, `group_id`, `amount`, `date_created`) VALUES
(3, 1, 1, 15000, '2022-02-01 14:52:56'),
(3, 14, 5, 15000, '2022-02-01 14:52:56'),
(4, 42, 3, 5000, '2022-02-01 15:55:46'),
(4, 11, 4, 5000, '2022-02-01 15:55:46'),
(5, 31, 2, 5000, '2022-02-01 15:59:34'),
(5, 31, 2, 3000, '2022-02-01 15:59:34'),
(5, 4, 1, 8000, '2022-02-01 15:59:34'),
(7, 1, 1, 19800, '2022-08-23 16:43:23'),
(7, 1, 1, 200, '2022-08-23 16:43:23'),
(7, 4, 4, 20000, '2022-08-23 16:43:23'),
(8, 1, 1, 19800, '2022-08-23 16:57:56'),
(8, 45, 1, 200, '2022-08-23 16:57:56'),
(8, 4, 4, 20000, '2022-08-23 16:57:56'),
(9, 1, 1, 24000, '2022-08-23 17:50:42'),
(9, 50, 1, 1000, '2022-08-23 17:50:42'),
(9, 4, 4, 25000, '2022-08-23 17:50:42'),
(10, 1, 1, 20000, '2022-08-24 17:00:40'),
(10, 4, 4, 20000, '2022-08-24 17:00:40'),
(13, 7, 3, 100, '2022-08-26 14:38:23'),
(13, 4, 1, 100, '2022-08-26 14:38:23'),
(13, 50, 4, 1000, '2022-08-26 14:38:23'),
(13, 37, 1, 800, '2022-08-26 14:38:23'),
(13, 7, 1, 1, '2022-08-26 14:38:23'),
(13, 7, 4, 1, '2022-08-26 14:38:23'),
(14, 1, 1, 1000, '2022-09-02 14:52:07'),
(14, 4, 4, 1000, '2022-09-02 14:52:07'),
(3, 7, 6, 100, '2022-09-02 17:58:03'),
(3, 7, 6, 100, '2022-09-02 17:58:06'),
(15, 7, 1, 100, '2022-09-02 20:09:09'),
(15, 7, 1, 100, '2022-09-02 20:09:11'),
(17, 1, 2, 5000, '2022-09-02 20:12:08'),
(17, 1, 2, 5000, '2022-09-02 20:12:10'),
(18, 4, 1, 150, '2022-09-02 20:17:00'),
(18, 4, 1, 150, '2022-09-02 20:17:00'),
(18, 7, 4, 300, '2022-09-02 20:17:00'),
(23, 1, 5, 500, '2022-09-03 08:48:20'),
(23, 7, 1, 100, '2022-09-03 08:51:30'),
(23, 7, 1, 100, '2022-09-03 08:51:32'),
(24, 4, 1, 150, '2022-09-03 08:55:06'),
(24, 7, 4, 150, '2022-09-03 08:55:06'),
(25, 7, 1, 1000, '2022-09-05 18:07:34'),
(25, 4, 4, 1000, '2022-09-05 18:07:34'),
(26, 1, 1, 30000, '2022-09-10 10:45:15'),
(26, 1, 4, 30000, '2022-09-10 10:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `stage_id` int(11) NOT NULL DEFAULT 1,
  `delete_flag` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `name`, `email`, `contact_number`, `description`, `stage_id`, `delete_flag`) VALUES
(6, 'Roge Hardware Supplies', 'roge123@gmail.com', 2147483647, 'Hardware supplies of offices and home', 2, 0),
(7, 'Sam Boutique', 'sambal2022@gmail.com', 2147483647, 'Food and Drugs Supplies', 5, 0),
(8, 'Mondragon Pet shop', 'donmondragon050@gmail.com', 2147483647, 'Nationwide Pets Breed', 1, 0),
(9, 'Awesome Appliances ', 'awesomeappliances0808@gmail.com', 2147483647, 'Branded of all Appliances', 3, 0),
(10, 'Coffee Shop', 'miyacalifacoffeeshop@gmail.com', 2147483647, 'We serves coffee of various types, notably espresso, latte, and cappuccino.', 5, 0),
(12, 'Amazing Super Market', 'amazingsupermarket@gmail.com', 2147483647, '', 4, 0),
(13, 'Huawei', 'a@g.com', 423, '', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `name`, `user_name`, `password`) VALUES
(1, 'steven', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `vat` float(10,2) NOT NULL,
  `tax` float(10,2) NOT NULL,
  `total_amount` float(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `bill_id` int(11) NOT NULL,
  `Payment_type` varchar(50) NOT NULL,
  `credit_amount` int(11) DEFAULT NULL,
  `credit_date` date DEFAULT NULL,
  `debited_amount` int(11) DEFAULT NULL,
  `debited_date` date DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `product_description` text NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `product_description`, `created_on`, `updated_on`, `delete_flag`) VALUES
(2, 'AACCS32113', 'Beat', 'Entry level scooter', '2022-08-31 18:05:31', '0000-00-00 00:00:00', 0),
(3, 'MMNDS12331', 'Click 125i', 'Bigger scooter', '2022-08-31 18:05:58', '0000-00-00 00:00:00', 0);

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
  `employee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `vat` float NOT NULL,
  `tax` float NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` int(11) NOT NULL,
  `department` varchar(32) NOT NULL,
  `employees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`, `department`, `employees`) VALUES
(1, 'IT', 5),
(2, 'Sales', 20),
(3, 'Technical', 30),
(4, 'Billing', 50),
(5, 'Marketing', 30);

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
(8, '09:00:00', '18:00:00', '2022-08-25 17:06:07', '2022-08-25 17:06:07', 0),
(9, '07:00:00', '16:00:00', '2022-08-25 17:06:29', '2022-08-25 17:06:29', 0),
(10, '13:00:00', '18:00:00', '2022-09-01 11:29:59', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE `stage` (
  `stage_id` int(11) NOT NULL,
  `stage_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`stage_id`, `stage_status`) VALUES
(1, 'Prospect'),
(2, 'Access'),
(3, 'Proposition'),
(4, 'Award'),
(5, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_code`, `name`, `address`, `email`, `course_id`, `delete_flag`) VALUES
(2, '', 'sadad2323232', ' 4545454', 'adadad@asd.hj2323232', 3, 1),
(3, '', 'sadad2323232', ' 4545454', 'adadad@asd.hj2323232', 3, 1),
(5, '', 'sadad2323232', ' 4545454', 'adadad@asd.hj2323232', 3, 1),
(9, '', 'sadad2323232sadsada', ' 12s21sa2d1', 'adadad@asd.hj2323232', 4, 0),
(10, '', 'sadad2323232', ' 4545454', 'adadad@asd.hj2323232', 3, 0),
(11, '', 'sadad2323232', '  4545454', 'd@asd.hj23', 2, 0),
(12, 'GIZ534176892', 'sadad', 'adsada', 'asdad@g.coamn', 3, 0);

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
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_code`, `photo`, `business_name`, `address`, `email`, `phone_number`, `created_on`, `updated_on`, `delete_flag`) VALUES
(2, 'SL005704546', '', 'Honda', 'Gilid Gilid', 'honda@gmail.com', 123456789, '2022-08-31 18:04:09', '0000-00-00 00:00:00', 0),
(3, 'FASD12345', '', 'Suzuki', 'Sa turo turo', 'suzuki@email.com', 123456798, '2022-08-31 18:04:54', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`supplier_id`, `product_id`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `tax_id` int(11) NOT NULL,
  `tax_name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `scope` varchar(20) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`tax_id`, `tax_name`, `type`, `amount`, `scope`, `active`, `delete_flag`) VALUES
(1, 'Tax 15.00%', 'Sales', '15.00', 'Services', 1, 0),
(2, 'Tax 15.00%', 'Purchases', '15.00', 'Goods', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_periods`
--
ALTER TABLE `accounting_periods`
  ADD PRIMARY KEY (`accounting_periods_id`);

--
-- Indexes for table `account_list`
--
ALTER TABLE `account_list`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `account_name` (`account_name`),
  ADD KEY `journal_id` (`journal_id`);

--
-- Indexes for table `account_type_list`
--
ALTER TABLE `account_type_list`
  ADD PRIMARY KEY (`account_type_list_id`),
  ADD KEY `account_name` (`account_name`);

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
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`credit_notes_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `account_id` (`account_id`);

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
-- Indexes for table `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`journal_entries_id`),
  ADD KEY `journal_id` (`journal_id`);

--
-- Indexes for table `journal_items`
--
ALTER TABLE `journal_items`
  ADD KEY `journal_id` (`journal_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`),
  ADD KEY `stage_id` (`stage_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`overtime_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `payment_terms`
--
ALTER TABLE `payment_terms`
  ADD PRIMARY KEY (`payment_terms_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stage_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD KEY `supplier_id` (`supplier_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`tax_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_periods`
--
ALTER TABLE `accounting_periods`
  MODIFY `accounting_periods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `account_list`
--
ALTER TABLE `account_list`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=645;

--
-- AUTO_INCREMENT for table `account_type_list`
--
ALTER TABLE `account_type_list`
  MODIFY `account_type_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cashadvance`
--
ALTER TABLE `cashadvance`
  MODIFY `cashadvance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `credit_notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `group_list`
--
ALTER TABLE `group_list`
  MODIFY `group_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `journal_entries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD CONSTRAINT `credit_notes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `credit_notes_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `credit_notes_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `deductions`
--
ALTER TABLE `deductions`
  ADD CONSTRAINT `deductions_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_6` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_7` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD CONSTRAINT `journal_entries_ibfk_1` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`journal_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_ibfk_1` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`stage_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `payment` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `overtime`
--
ALTER TABLE `overtime`
  ADD CONSTRAINT `overtime_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD CONSTRAINT `supplier_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_product_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
