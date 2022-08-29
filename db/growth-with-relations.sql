-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 05:25 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_description` varchar(100) NOT NULL,
  `account_contactnumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `account_list`
--

CREATE TABLE `account_list` (
  `account_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`account_id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Cash', 'Cash', 1, 0, '2022-02-01 10:09:26', NULL),
(2, 'Petty Cash', 'Petty Cash', 1, 0, '2022-02-01 10:09:40', NULL),
(3, 'Cash Equivalents', 'Cash Equivalents', 1, 0, '2022-02-01 10:09:56', NULL),
(4, 'Accounts Receivable', 'Accounts Receivable', 1, 0, '2022-02-01 10:10:22', NULL),
(5, 'Interest Receivable', 'Interest Receivable', 1, 0, '2022-02-01 10:10:57', NULL),
(6, 'Office Supplies', 'Office Supplies', 1, 0, '2022-02-01 10:11:13', NULL),
(7, 'Accounts Payable', 'Accounts Payable', 1, 0, '2022-02-01 10:11:55', NULL),
(8, 'Insurance Payable', 'Insurance Payable', 1, 0, '2022-02-01 10:12:07', NULL),
(9, 'Interest Payable', 'Interest Payable', 1, 0, '2022-02-01 10:12:20', NULL),
(10, 'Legal Fees Payable', 'Legal Fees Payable', 1, 0, '2022-02-01 10:12:35', NULL),
(11, 'Office Salaries Payable', 'Office Salaries Payable', 1, 0, '2022-02-01 10:12:51', NULL),
(12, 'Salaries Payable', 'Salaries Payable', 1, 0, '2022-02-01 10:13:03', NULL),
(13, 'Wages Payable', 'Wages Payable', 1, 0, '2022-02-01 10:13:24', NULL),
(14, 'Owner’s Capital', 'Owner’s Capital', 1, 0, '2022-02-01 10:13:54', NULL),
(15, 'Owner’s Withdrawals', 'Owner’s Withdrawals', 1, 0, '2022-02-01 10:14:04', NULL),
(16, 'Common Stock, Par Value', 'Common Stock, Par Value', 1, 0, '2022-02-01 10:14:25', NULL),
(17, 'Common stock, no par value', 'Common stock, no par value', 1, 0, '2022-02-01 10:14:34', NULL),
(18, 'Common stock dividend distributable', 'Common stock dividend distributable', 1, 0, '2022-02-01 10:14:50', NULL),
(19, 'Paid-in capital in excess of par value, Common stock', 'Paid-in capital in excess of par value, Common\r\nstock', 1, 0, '2022-02-01 10:15:02', NULL),
(20, 'Paid-in capital in excess of stated value, No-par common stock', 'Paid-in capital in excess of stated value, No-par\r\ncommon stock', 1, 0, '2022-02-01 10:15:11', NULL),
(21, 'Retained earnings', 'Retained earnings', 1, 0, '2022-02-01 10:15:31', NULL),
(22, 'Cash dividends', 'Cash dividends', 1, 0, '2022-02-01 10:15:44', NULL),
(23, 'Stock dividends', 'Stock dividends', 1, 0, '2022-02-01 10:15:58', NULL),
(24, 'Treasury stock, Common', 'Treasury stock, Common', 1, 0, '2022-02-01 10:16:48', NULL),
(25, 'Unrealized gain-Equity', 'Unrealized gain-Equity', 1, 0, '2022-02-01 10:16:57', NULL),
(26, 'Unrealized loss-Equity', 'Unrealized loss-Equity', 1, 0, '2022-02-01 10:17:05', NULL),
(27, 'Fees earned from product one', 'Fees earned from product one', 1, 0, '2022-02-01 10:17:27', NULL),
(28, 'Fees earned from product two', 'Fees earned from product two', 1, 0, '2022-02-01 10:17:43', NULL),
(29, 'Service revenue one', 'Service revenue one', 1, 0, '2022-02-01 10:17:55', NULL),
(30, 'Service revenue two', 'Service revenue two', 1, 0, '2022-02-01 10:18:04', NULL),
(31, 'Commissions earned', 'Commissions earned', 1, 0, '2022-02-01 10:18:14', NULL),
(32, 'Rent revenue', 'Rent revenue', 1, 0, '2022-02-01 10:18:26', NULL),
(33, 'Dividends revenue', 'Dividends revenue', 1, 0, '2022-02-01 10:18:40', NULL),
(34, 'Earnings from investments in “blank”', 'Earnings from investments in “blank”', 1, 0, '2022-02-01 10:18:51', NULL),
(35, 'Interest revenue', 'Interest revenue', 1, 0, '2022-02-01 10:19:03', NULL),
(36, 'Sinking fund earnings', 'Sinking fund earnings', 1, 0, '2022-02-01 11:41:57', NULL),
(37, 'Amortization expense', 'Amortization expense', 1, 0, '2022-02-01 11:42:08', NULL),
(38, 'Depletion expense', 'Depletion expense', 1, 0, '2022-02-01 11:42:16', NULL),
(39, 'Depreciation expense-Automobiles', 'Depreciation expense-Automobiles', 1, 0, '2022-02-01 11:42:25', NULL),
(40, 'Depreciation expense-Building', 'Depreciation expense-Building', 1, 0, '2022-02-01 11:42:34', NULL),
(41, 'Depreciation expense-Furniture', 'Depreciation expense-Furniture', 1, 0, '2022-02-01 11:43:02', NULL),
(42, 'Office salaries expense', 'Office salaries expense', 1, 0, '2022-02-01 11:43:12', NULL),
(43, 'Sales salaries expense', 'Sales salaries expense', 1, 0, '2022-02-01 11:43:21', NULL),
(44, 'Salaries expense', 'Salaries expense', 1, 0, '2022-02-01 11:43:31', NULL),
(45, 'Income taxes expense', 'Income taxes expense', 1, 0, '2022-02-01 11:43:44', NULL),
(46, 'Warranty expense', 'Warranty expense', 1, 0, '2022-02-01 11:44:01', NULL),
(47, 'Utilities expense', 'Utilities expense', 1, 0, '2022-02-01 11:44:10', NULL),
(48, 'Selling expense', 'Selling expense', 1, 0, '2022-02-01 11:44:23', NULL),
(49, 'Sample101', 'Sample101', 0, 1, '2022-02-01 11:45:03', '2022-02-01 11:45:23');

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
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL,
  `campaignmember_id` int(11) NOT NULL,
  `campaign_objectives` varchar(50) NOT NULL,
  `campaign_startdate` datetime NOT NULL,
  `campaign_enddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_member`
--

CREATE TABLE `campaign_member` (
  `campaignmember_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `contact_address` varchar(50) NOT NULL,
  `contract_contact_details` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `contract_status` varchar(20) NOT NULL,
  `contract_approval` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(75, 'LAV00202208', 'Lovely Anne', 'Viado', 'Mangan-Vaca Subic Zambales', '1997-12-12', '0909090909', '', 26, 2, 8, '', '2022-08-25 17:09:18', '2022-08-25 17:09:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_list`
--

CREATE TABLE `group_list` (
  `accountgroup_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Debit, 2= Credit',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes ',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`accountgroup_id`, `name`, `description`, `type`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Assets', 'The cash, inventory, and other resources you owned.', 1, 1, 0, '2022-02-01 09:56:35', '2022-02-01 09:56:58'),
(2, 'Revenue', 'Cash coming into your business through sales and other types of payments', 2, 1, 0, '2022-02-01 09:57:45', NULL),
(3, 'Expenses', 'The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.', 1, 1, 0, '2022-02-01 09:58:09', '2022-02-01 09:59:13'),
(4, 'Liabilities', 'The money you still owe on loans, debts, and other obligations.', 2, 1, 0, '2022-02-01 09:58:34', NULL),
(5, 'Equity', 'How much is remaining after you subtract liabilities from assets.', 2, 1, 0, '2022-02-01 09:59:05', NULL),
(6, 'Dividend', 'Form of income that shareholders of corporations receive for each share of stock that they hold.', 1, 1, 0, '2022-02-01 10:00:13', NULL),
(7, 'Sample101', 'Sample', 1, 0, 1, '2022-02-01 10:01:35', '2022-02-01 10:03:28');

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
(6, 'Roge Hardware Supplies', 'roge123@gmail.com', 2147483647, 'Hardware supplies of offices and home', 5, 0),
(7, 'Sam Boutique', 'sambal2022@gmail.com', 2147483647, 'Food and Drugs Supplies', 4, 0),
(8, 'Mondragon Pet shop', 'donmondragon050@gmail.com', 2147483647, 'Nationwide Pets Breed', 4, 0),
(9, 'Awesome Appliances ', 'awesomeappliances0808@gmail.com', 2147483647, 'Branded of all Appliances', 1, 0),
(10, 'Coffee Shop', 'miyacalifacoffeeshop@gmail.com', 2147483647, 'We serves coffee of various types, notably espresso, latte, and cappuccino.', 5, 0),
(12, 'Amazing Super Market', 'amazingsupermarket@gmail.com', 2147483647, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE `opportunity` (
  `opportunity_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `opportunity_description` varchar(100) NOT NULL,
  `opportunity_stage` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `total` int(11) NOT NULL,
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

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`bill_id`, `Payment_type`, `credit_amount`, `credit_date`, `debited_amount`, `debited_date`, `balance`) VALUES
(12345, 'Cash', NULL, NULL, NULL, NULL, NULL);

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
(8, '09:00:00', '18:00:00', '2022-08-25 17:06:07', '2022-08-25 17:06:07', 0),
(9, '07:00:00', '16:00:00', '2022-08-25 17:06:29', '2022-08-25 17:06:29', 0);

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
(1, 'New'),
(2, 'Qualified Opportunity'),
(3, 'Proposition'),
(4, 'Won'),
(5, 'Lost');

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
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `account_list`
--
ALTER TABLE `account_list`
  ADD PRIMARY KEY (`account_id`);

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
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`),
  ADD KEY `campaignmember_id` (`campaignmember_id`) USING BTREE;

--
-- Indexes for table `campaign_member`
--
ALTER TABLE `campaign_member`
  ADD PRIMARY KEY (`campaignmember_id`),
  ADD KEY `campaign_id` (`campaign_id`),
  ADD KEY `lead_id` (`lead_id`),
  ADD KEY `contact_id` (`contact_id`);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
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
  ADD PRIMARY KEY (`accountgroup_id`);

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
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`),
  ADD KEY `stage_id` (`stage_id`);

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD PRIMARY KEY (`opportunity_id`),
  ADD KEY `account_id` (`account_id`);

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
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`stage_id`);

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
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_list`
--
ALTER TABLE `account_list`
  MODIFY `account_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaign_member`
--
ALTER TABLE `campaign_member`
  MODIFY `campaignmember_id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `group_list`
--
ALTER TABLE `group_list`
  MODIFY `accountgroup_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
  MODIFY `opportunity_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
  MODIFY `stage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`campaignmember_id`) REFERENCES `campaign_member` (`campaignmember_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign_member`
--
ALTER TABLE `campaign_member`
  ADD CONSTRAINT `campaign_member_ibfk_1` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`lead_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_member_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`contact_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaign_member_ibfk_3` FOREIGN KEY (`campaign_id`) REFERENCES `campaign` (`campaign_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cashadvance`
--
ALTER TABLE `cashadvance`
  ADD CONSTRAINT `cashadvance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_ibfk_1` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`stage_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opportunity`
--
ALTER TABLE `opportunity`
  ADD CONSTRAINT `opportunity_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
