-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 06:03 AM
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
(45, 'EWF269043587', '2022-09-30', '2023-09-30', 'Monthly', 1, 'Cash Basis Taxes', 0),
(46, 'YPE230517496', '2022-10-03', '2023-10-03', 'Monthly', 1, 'Exchange Difference', 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_list`
--

CREATE TABLE `account_list` (
  `account_id` int(30) NOT NULL,
  `account_name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`account_id`, `account_name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
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
(29, 'Service Revenue', 'Service Revenue', 1, 0, '2022-02-01 10:17:55', '2022-10-26 14:40:06'),
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
(43, 'Sales expense', 'Sales expense', 1, 0, '2022-02-01 11:43:21', '2022-10-26 15:43:13'),
(44, 'Salaries expense', 'Salaries expense', 1, 0, '2022-02-01 11:43:31', NULL),
(45, 'Income taxes expense', 'Income taxes expense', 1, 0, '2022-02-01 11:43:44', NULL),
(46, 'Warranty expense', 'Warranty expense', 1, 0, '2022-02-01 11:44:01', NULL),
(47, 'Utilities expense', 'Utilities expense', 1, 0, '2022-02-01 11:44:10', NULL),
(48, 'Selling expense', 'Selling expense', 1, 0, '2022-02-01 11:44:23', NULL),
(49, 'Sample101', 'Sample101', 0, 1, '2022-02-01 11:45:03', '2022-02-01 11:45:23'),
(50, 'Discounts', 'Discounts', 1, 0, '2022-08-23 17:46:44', '2022-08-23 17:49:13'),
(51, 'Miscellaneous', 'Miscellaneous Operations', 1, 0, '2022-10-19 09:29:51', NULL),
(52, 'Current Assets', 'Current Assets', 1, 0, '2022-10-26 09:12:55', NULL),
(53, 'Outstanding Receipts', 'Outstanding Receipts', 1, 0, '2022-10-26 09:14:25', NULL),
(54, 'Outstanding Payments', 'Outstanding Payments', 1, 0, '2022-10-26 09:14:59', NULL),
(55, 'Bank', 'Bank', 1, 0, '2022-10-26 09:17:07', NULL),
(56, 'Liquidity Transfer', 'Liquidity Transfer', 1, 0, '2022-10-26 09:18:53', NULL),
(57, 'Current Liabilities', 'Current Liabilities', 1, 0, '2022-10-26 09:25:58', NULL),
(58, 'Capital', 'Capital', 1, 0, '2022-10-26 14:25:16', NULL),
(59, 'Equipment', 'Equipment', 1, 0, '2022-10-26 14:28:09', NULL),
(60, 'Notes Payable', 'The amount of promissory notes with a maturity of over one year issued by a company', 1, 0, '2022-10-26 15:49:08', '2022-10-26 15:49:39'),
(61, 'Bonds Payable', 'The amount of outstanding bonds with a maturity of over one year issued by a company', 1, 0, '2022-10-26 15:50:14', NULL),
(62, 'Sales Tax Payable', 'Sales Tax Payable', 1, 0, '2022-10-26 15:57:56', NULL),
(63, 'Prepaid Insurance', 'Prepaid Insurance', 1, 0, '2022-11-04 10:53:18', NULL),
(64, 'Withdrawals', 'Withdrawals', 1, 0, '2022-11-04 11:00:45', NULL),
(65, 'Charitable Contribution', 'Donations on Charity', 1, 0, '2022-11-04 11:10:16', NULL);

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
(1, 'admin', '$2y$10$fCOiMky4n5hCJx3cpsG20Od4wHtlkCLKmO6VLobJNRIg9ooHTkgjK', 'Roge', 'Catubig', 'profilepic.jpg', '2018-04-30', 'admin'),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '', '2022-08-01', 'Admin'),
(3, 'admin', '$2y$10$fCOiMky4n5hCJx3cpsG20Od4wHtlkCLKmO6VLobJNRIg9ooHTkgjK', 'Roge', 'Catubig', 'profilepic.jpg', '2018-04-30', 'admin');

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
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `bank_account_id` int(11) NOT NULL,
  `bank_account_name` varchar(150) NOT NULL,
  `bank_account_number` varchar(50) NOT NULL,
  `bank_company` varchar(150) NOT NULL,
  `bank_email` varchar(150) NOT NULL,
  `bank_phone` varchar(50) NOT NULL,
  `bank_zip_code` int(11) NOT NULL,
  `bank_address` varchar(150) NOT NULL,
  `bank_country` varchar(150) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`bank_account_id`, `bank_account_name`, `bank_account_number`, `bank_company`, `bank_email`, `bank_phone`, `bank_zip_code`, `bank_address`, `bank_country`, `bank_id`, `delete_flag`) VALUES
(1, 'Steven Edward Lizada', '0054654321', 'VPD Business Solutions Inc.', 'stevie.vpd@gmail.com', '09782321545', 1128, '69 Morningstar Dr Ext. Culiat QC', '1', 7, 0),
(2, 'Boston Hailan', '000863413231', 'Bulla Crave ', 'Boston@gmail.com', '09651654663', 4508, 'General Ave, Tandang Sora QC', '1', 13, 0),
(43, 'Am BDO ', '0000846546354', 'BDO ', 'bdo@gmail.com', '+639897654665', 4588, 'dbo philippines', '1', 2, 0),
(44, 'chingchong', '08654321654', 'chiong', 'ting@gmail.com', '09623216542', 123, 'yungin', '1', 6, 0),
(45, 'Union bank', '00886551321', 'Union Banks', 'union@gmail.com', '09654613211', 6549, 'Union PH', '1', 8, 0),
(46, 'Brew Fresh', '000065465132', 'Bodum', 'w@gnal.com', '09865652321', 654, 'Caloocan Ave', '1', 9, 0),
(47, 'trial', '6346546546646', 'trial', 'trial@gmail.com', '096565656566', 4567, 'trial', '0', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank_meta_data`
--

CREATE TABLE `bank_meta_data` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `bank_branch` varchar(150) NOT NULL,
  `bank_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_meta_data`
--

INSERT INTO `bank_meta_data` (`bank_id`, `bank_name`, `bank_branch`, `bank_image`) VALUES
(1, 'Bank of the Philippine Island (BPI)\r\n', 'BPI NCR', 'bpi.png'),
(2, 'Banco de Oro (BDO)', 'BDO NCR', 'bdo.png'),
(3, 'Metropolitan Bank and Trust Co.', 'Metro Bank NCR', 'metrobank.png'),
(4, 'LAND BANK OF THE PHILIPPINES', 'LAND BANK NCR', 'landbank.png'),
(5, 'PHIL NATIONAL BANK', 'PNB NCR', 'pnb.png'),
(6, 'CHINA BANKING CORP', 'CHINA BANK NCR', 'chinabank.png'),
(7, 'SECURITY BANK CORP', 'SECURITY BANK NCR', 'securitybank.png'),
(8, 'UNION BANK OF THE PHILS', 'UNION BANK NCR', 'unionbank.png'),
(9, 'EAST WEST BANKING CORP', 'EAST WEST BANK NCR', 'eastwestbank.png'),
(10, 'ROBINSONS BANK CORPORATION', 'ROBINSONS BANK NCR', 'robinsonsbank.png'),
(11, 'DEVELOPMENT BANK OF THE PHIL', 'DEVELOPMENT BANK NCR', 'developmentbank.png'),
(12, 'RIZAL COMM\'L BANKING CORP', 'RIZAL COMM\'L BANK NCR', 'rizalbank.png'),
(13, 'PHILIPPINE VETERANS BANK', 'PHILIPPINE VETERANS BANK NCR', 'phivetbank.png');

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
-- Table structure for table `credit_note`
--

CREATE TABLE `credit_note` (
  `id` int(11) NOT NULL,
  `credit_id` varchar(150) NOT NULL,
  `credit_date` date NOT NULL,
  `credit_duedate` date NOT NULL,
  `credit_subtotal` decimal(10,0) NOT NULL,
  `credit_discount` varchar(50) NOT NULL,
  `credit_grandtotal` decimal(10,2) NOT NULL,
  `credit_notes` varchar(150) NOT NULL,
  `credit_terms` varchar(50) NOT NULL,
  `credit_sales_person` varchar(50) NOT NULL,
  `credit_payment_reference` varchar(150) NOT NULL,
  `credit_currency` varchar(50) NOT NULL,
  `credit_journal` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0=unpaid 1=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_note`
--

INSERT INTO `credit_note` (`id`, `credit_id`, `credit_date`, `credit_duedate`, `credit_subtotal`, `credit_discount`, `credit_grandtotal`, `credit_notes`, `credit_terms`, `credit_sales_person`, `credit_payment_reference`, `credit_currency`, `credit_journal`, `status`) VALUES
(11, 'CRN-102022-0011', '2022-10-24', '2022-10-29', '26', '0.00', '28.60', '', '0', 'Cina mona', '', 'PHP', 'Customer Invoice', 0),
(12, 'CRN-102022-0012', '2022-10-24', '2022-11-05', '1938', '0.00', '2131.80', '', '0', 'Steve', 'BANK', 'PHP', 'Customer Invoice', 0),
(13, 'CRN-102022-0013', '2022-10-24', '0000-00-00', '15204', '1686.17', '16724.21', '', '90 Days', 'Sam Milby', '', 'PHP', 'Customer Invoice', 0),
(14, 'CRN-102022-0014', '2022-10-24', '0000-00-00', '9861', '0.00', '10847.10', '', '0', 'Rin rin', 'QUICK PAY', 'PHP', 'Customer Invoice', 0),
(15, 'CRN-102022-0015', '2022-10-05', '0000-00-00', '123133', '0.00', '135446.30', '', '15 Days', 'Cina mona', 'PREFER', 'PHP', 'Customer Invoice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_items`
--

CREATE TABLE `credit_note_items` (
  `id` int(11) NOT NULL,
  `credit_id` varchar(150) NOT NULL,
  `credit_product` varchar(150) NOT NULL,
  `credit_quantity` int(11) NOT NULL,
  `credit_price` decimal(10,0) NOT NULL,
  `credit_discount` varchar(50) NOT NULL,
  `credit_items_subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_note_items`
--

INSERT INTO `credit_note_items` (`id`, `credit_id`, `credit_product`, `credit_quantity`, `credit_price`, `credit_discount`, `credit_items_subtotal`) VALUES
(14, 'CRN-102022-0011', 'Beat', 13, '1', '', '13'),
(15, 'CRN-102022-0011', 'Click 125i', 1, '13', '', '13'),
(16, 'CRN-102022-0012', 'Click 125i', 1, '426', '', '426'),
(17, 'CRN-102022-0012', 'Beat', 2, '756', '', '1512'),
(18, 'CRN-102022-0012', 'Click 125i', 1, '0', '', '0'),
(19, 'CRN-102022-0013', 'Beat', 13, '67', '2%', '854'),
(20, 'CRN-102022-0013', 'Click 125i', 14, '421', '150', '5744'),
(21, 'CRN-102022-0013', 'HP laptop RGX', 15, '675', '15%', '8606'),
(22, 'CRN-102022-0014', 'Click 125i', 12, '123', '', '1476'),
(23, 'CRN-102022-0014', 'Click 125i', 13, '645', '', '8385'),
(24, 'CRN-102022-0015', 'Click 125i', 1, '123133', '', '123133');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `invoice_id` varchar(150) NOT NULL COMMENT 'Foreign Key',
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_contact` int(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `customer_type` tinyint(4) NOT NULL COMMENT '0= INVOICE\r\n1=Credit NOTE',
  `credit_id` varchar(150) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `invoice_id`, `customer_name`, `customer_email`, `customer_contact`, `address`, `customer_type`, `credit_id`, `delete_flag`) VALUES
(64, '', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 1, 'CRN-2022-1', 0),
(65, '', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 1, 'CRN-2022-2', 0),
(66, '', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 1, 'CRN-2022-9', 0),
(67, 'INV-2022-10', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 0, '', 0),
(68, 'INV-2022-11', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 0, '', 0),
(69, 'INV-2022-60', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 0, '', 0),
(70, 'INV-2022-61', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 0, '', 0),
(71, 'INV-2022-62', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 0, '', 0),
(72, '', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 1, 'CRN-102022-10', 0),
(73, 'INV-102022-0063', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 0, '', 0),
(74, '', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 1, 'CRN-102022-0011', 0),
(75, 'INV-102022-0064', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 0, '', 0),
(76, 'INV-102022-0065', 'Peculiar Company', 'pc@gmail.com', 965654645, 'Tandang Sora QC 213', 0, '', 0),
(77, '', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 1, 'CRN-102022-0012', 0),
(78, '', 'VPD Business', 'vpd@gmail.com', 964643213, 'Tandang Sora General Ave Quezon City', 1, 'CRN-102022-0013', 0),
(79, '', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 1, 'CRN-102022-0014', 0),
(80, '', 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 1, 'CRN-102022-0015', 0),
(81, 'INV-102022-0066', 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_invoice`
--

CREATE TABLE `customer_invoice` (
  `cus_invoice_id` int(11) NOT NULL,
  `invoice_num` varchar(30) NOT NULL COMMENT 'INVOICE DATA',
  `customer_id` int(11) NOT NULL COMMENT 'CUSTOMER NAME',
  `invoice_date` date NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'SALES PERSON',
  `reference` varchar(30) NOT NULL,
  `due_date` date NOT NULL,
  `terms` varchar(20) NOT NULL,
  `journal` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'PRODUCT',
  `account_id` int(11) NOT NULL COMMENT 'ACCOUNT LIST',
  `quantity` int(11) NOT NULL,
  `price` decimal(15,3) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total` decimal(15,3) NOT NULL,
  `note` varchar(30) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_invoice`
--

INSERT INTO `customer_invoice` (`cus_invoice_id`, `invoice_num`, `customer_id`, `invoice_date`, `employee_id`, `reference`, `due_date`, `terms`, `journal`, `currency`, `product_id`, `account_id`, `quantity`, `price`, `sub_total`, `tax`, `discount`, `total`, `note`, `delete_flag`) VALUES
(4, 'CINV-2022-0013', 2, '2022-10-05', 80, 'TRIAL', '0000-00-00', '21 Days', 'Customer Invoice', 'PHP', 2, 7, 2, '80000.000', '0.00', '0.00', '0.00', '160000.000', 'date', 0),
(5, 'CINV-2022-0017', 2, '0000-00-00', 80, 'MOTOR', '0000-00-00', '15 Days', 'Customer Invoice', 'PHP', 2, 17, 1, '1.000', '0.00', '0.00', '0.00', '1.000', '1', 0),
(6, 'CINV-2022-0016', 1, '0000-00-00', 81, 'CLICK', '0000-00-00', '15 Days', 'Customer Invoice', '', 2, 16, 1, '1.000', '0.00', '0.00', '0.00', '1.000', '1', 0),
(7, 'CINV-2022-0015', 2, '0000-00-00', 80, 'REF', '0000-00-00', '21 Days', 'Customer Invoice', 'PHP', 2, 17, 23232, '323232323.000', '0.00', '0.00', '0.00', '999999999999.999', '2131232', 0),
(8, 'CINV-2022-0014', 1, '2022-10-05', 80, 'REFERENCE', '2022-10-13', '21 Days', 'Customer Invoice', 'USD', 2, 17, 2, '222.000', '0.00', '0.00', '0.00', '444.000', '2', 0),
(9, 'CINV-2022-0018', 1, '2022-10-04', 81, 'EQUIPMENT', '2022-10-30', '30 Days', 'Customer Invoice', 'PHP', 2, 7, 3, '150000.000', '0.00', '0.00', '0.00', '450000.000', 'equipment', 0);

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
(80, 10, 51, 8, 'ABC000000000', 'Steven Edward', 'Lizada', 'Emerald lane, Culiat Quezon City', '1997-12-12', '09615089172', '', 'pogi.png', '2022-09-01 14:01:45', '2022-09-01 14:01:45', 0),
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
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Debit, 2= Credit',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1= Active',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes ',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_list`
--

INSERT INTO `group_list` (`group_id`, `group_name`, `description`, `type`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Current Assets', 'The cash, inventory, and other resources you owned.', 1, 1, 0, '2022-02-01 09:56:35', '2022-10-26 15:45:30'),
(2, 'Revenue', 'Cash coming into your business through sales and other types of payments', 2, 1, 0, '2022-02-01 09:57:45', NULL),
(3, 'Expenses', 'The amount you’re spending on services and other items, like payroll, utility bills, and fees for contractors.', 1, 1, 0, '2022-02-01 09:58:09', '2022-02-01 09:59:13'),
(4, 'Current liabilities', 'The money you still owe on loans, debts, and other obligations.', 2, 1, 0, '2022-02-01 09:58:34', '2022-10-26 15:47:06'),
(5, 'Equity', 'How much is remaining after you subtract liabilities from assets.', 2, 1, 0, '2022-02-01 09:59:05', NULL),
(6, 'Withdrawals', 'Form of income that shareholders of corporations receive for each share of stock that they hold.', 1, 1, 0, '2022-02-01 10:00:13', '2022-08-23 17:45:44'),
(8, 'Non-current assets', ' assets whose benefits will be realized over more than one year and cannot easily be converted into cash', 1, 1, 0, '2022-10-26 15:46:01', NULL),
(9, 'Non-current liabilities', 'Liabilities are those that are due after more than one year.', 2, 1, 0, '2022-10-26 15:47:52', '2022-10-26 15:48:06');

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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `photo`, `product_id`, `description`, `quantity`, `cost`, `price`, `stamp`, `created_on`, `updated_on`, `delete_flag`) VALUES
(25, 'tanjero.jpg', 2147483647, 'Ballpen', 22, 22, 22, '2022-08-12 18:57:25', '2022-11-02 11:22:24', '2022-11-02 11:22:24', 0),
(26, 'ballpen.jpg', 2147483647, 'Ballpen', 522, 242, 42, '2022-08-12 18:59:07', '2022-11-02 11:22:24', '2022-11-02 11:22:24', 0),
(27, 'flashdrive.png', 2147483647, '2242', 2424, 2424, 2424, '2022-08-12 18:59:21', '2022-11-02 11:22:24', '2022-11-02 11:22:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(150) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_duedate` date NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `grandtotal` decimal(10,2) NOT NULL,
  `notes` varchar(150) NOT NULL,
  `terms` varchar(50) NOT NULL,
  `sales_person` varchar(50) NOT NULL,
  `payment_reference` varchar(150) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `journal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_id`, `invoice_date`, `invoice_duedate`, `subtotal`, `discount`, `grandtotal`, `notes`, `terms`, `sales_person`, `payment_reference`, `currency`, `journal`) VALUES
(63, 'INV-102022-0063', '2022-10-24', '2022-11-26', '1477', '0.00', '1624.70', '', '30 Days', 'Steven Edward Lizada', 'CASH', 'PHP', 'Customer Invoice'),
(64, 'INV-102022-0064', '2022-10-24', '2022-10-29', '5473', '185.06', '6020.23', '', '90 Days', 'Edward Collins', 'PETTY', 'PHP', 'Customer Invoice'),
(65, 'INV-102022-0065', '2022-10-24', '2022-10-28', '10846', '109.56', '11931.08', '', '60 Days', 'SAM', 'ATM', 'PHP', 'Customer Invoice'),
(66, 'INV-102022-0066', '2022-10-25', '0000-00-00', '220', '22.00', '242.00', '', '15 Days', '12313', '123', 'PHP', 'Customer Invoice');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(150) NOT NULL,
  `invoice_product` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `items_subtotal` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `invoice_product`, `quantity`, `price`, `discount`, `items_subtotal`) VALUES
(101, 'INV-102022-0063', 'Beat', 1, '123', '', '123'),
(102, 'INV-102022-0063', 'Click 125i', 1, '123', '', '123'),
(103, 'INV-102022-0063', 'Peculiar', 1, '1231', '', '1231'),
(104, 'INV-102022-0064', 'Beat', 12, '123', '13', '1463'),
(105, 'INV-102022-0064', 'Click 125i', 11, '123', '132', '1221'),
(106, 'INV-102022-0064', 'Beat', 12, '123', '13', '1463'),
(107, 'INV-102022-0064', 'HP laptop RGX', 11, '123', '2%', '1326'),
(108, 'INV-102022-0065', 'Beat', 2, '456', '1%', '903'),
(109, 'INV-102022-0065', 'Click 125i', 54, '45', '1%', '2406'),
(110, 'INV-102022-0065', 'Click 125i', 78, '45', '1%', '3475'),
(111, 'INV-102022-0065', 'Beat', 9, '456', '1%', '4063'),
(112, 'INV-102022-0066', 'Beat', 11, '11', '11', '110'),
(113, 'INV-102022-0066', 'Click 125i', 11, '11', '11', '110');

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
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `journal_entry_id` int(30) NOT NULL,
  `journal_entry_code` varchar(100) NOT NULL,
  `journal_date` date NOT NULL,
  `journal_entry_description` text NOT NULL,
  `employee_id` int(30) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `partner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_entries`
--

INSERT INTO `journal_entries` (`journal_entry_id`, `journal_entry_code`, `journal_date`, `journal_entry_description`, `employee_id`, `date_created`, `date_updated`, `partner`) VALUES
(20, 'JRE-112022-0020', '2022-12-01', 'BANK TRANSFER TO BUSINESS', 81, '2022-11-04 10:38:43', NULL, 'JYEFU'),
(21, 'JRE-112022-0021', '2022-12-03', 'PURCHASE SERVICE VEHICLE', 81, '2022-11-04 10:48:40', NULL, 'JYEFU'),
(22, 'JRE-112022-0022', '2022-12-04', 'ELECTRICITY BILLS', 81, '2022-11-04 10:50:31', NULL, 'JYEFU'),
(23, 'JRE-112022-0023', '2022-12-04', 'INSURANCE', 81, '2022-11-04 10:55:41', NULL, 'JYEFU'),
(24, 'JRE-112022-0024', '2022-12-06', 'COMPUTER EQUIPMENTS', 81, '2022-11-04 10:57:36', NULL, 'JYEFU'),
(25, 'JRE-112022-0025', '2022-12-10', 'WITHDRAWALS', 81, '2022-11-04 11:01:58', NULL, 'JYEFU'),
(26, 'JRE-112022-0026', '2022-12-11', 'PURCHASE OFFICE SUPPLIES', 81, '2022-11-04 11:04:06', NULL, 'JYEFU'),
(27, 'JRE-112022-0027', '2022-12-15', 'RECEIVED CASH SERVICE RENDERED FROM CUSTOMER', 81, '2022-11-04 11:07:04', NULL, 'JYEFU'),
(28, 'JRE-112022-0028', '2022-12-18', 'DONATED CASH TO RED CROSS', 81, '2022-11-04 11:11:10', NULL, 'JYEFU'),
(29, 'JRE-112022-0029', '2022-12-25', 'OFFICE RENTS', 81, '2022-11-04 11:12:21', NULL, 'JYEFU'),
(30, 'JRE-112022-0030', '2022-12-25', 'PAYMENT ON NOTES PAYABLE', 81, '2022-11-04 11:17:40', NULL, 'JYEFU'),
(31, 'JRE-112022-0031', '2022-12-30', 'PAID SALARIES', 81, '2022-11-04 11:19:09', NULL, 'JYEFU'),
(32, 'JRE-112022-0032', '2022-11-01', 'TRANSFER CASH TO BANK ACCOUNT', 80, '2022-11-05 13:16:32', NULL, 'VPD BUSINESS Solutions'),
(33, 'JRE-112022-0033', '2022-11-03', 'PURCHASE NEW VEHICHEL', 80, '2022-11-05 13:21:08', NULL, 'VPD BUSINESS Solutions'),
(34, 'JRE-112022-0034', '2022-11-04', 'PURCHASE PAINTING SUPPLY(ON ACCOUNT)', 80, '2022-11-05 13:25:43', '2022-11-05 13:26:10', 'VPD BUSINESS Solutions'),
(35, 'JRE-112022-0035', '2022-11-05', 'COMPLETE JOB (BILL BY CUSTOMER)', 80, '2022-11-05 13:29:06', NULL, 'VPD BUSINESS Solutions'),
(36, 'JRE-112022-0036', '2022-11-08', 'RECEIVED CASH AFTER PAINTING JOB', 80, '2022-11-05 13:30:42', NULL, 'VPD BUSINESS Solutions'),
(37, 'JRE-112022-0037', '2022-11-15', 'PAID ASSITANT', 80, '2022-11-05 13:32:28', NULL, 'VPD BUSINESS Solutions'),
(38, 'JRE-112022-0038', '2022-11-20', 'PAYMENT ON NOVEMBER 5 ', 80, '2022-11-05 13:37:01', NULL, 'VPD BUSINESS Solutions'),
(39, 'JRE-112022-0039', '2022-11-22', 'ELECTRICITY BILLS', 80, '2022-11-05 13:37:57', NULL, 'VPD BUSINESS Solutions'),
(40, 'JRE-112022-0040', '2022-11-25', 'PAID NOTE PAYABLE ON NOV 3', 80, '2022-11-05 13:39:29', NULL, 'VPD BUSINESS Solutions'),
(41, 'JRE-112022-0041', '2022-11-30', 'PAYMENT FOR PAINTING JOB', 80, '2022-11-05 13:41:35', NULL, 'VPD BUSINESS Solutions');

-- --------------------------------------------------------

--
-- Table structure for table `journal_items`
--

CREATE TABLE `journal_items` (
  `id` int(11) NOT NULL,
  `journal_entry_code` varchar(150) NOT NULL,
  `account_id` int(30) NOT NULL,
  `group_id` int(30) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `amount_type` int(11) NOT NULL COMMENT 'DEBIT = 1 | CREDIT = 2',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `account_name` varchar(150) NOT NULL,
  `group_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal_items`
--

INSERT INTO `journal_items` (`id`, `journal_entry_code`, `account_id`, `group_id`, `amount`, `amount_type`, `date_created`, `account_name`, `group_name`) VALUES
(40, 'JRE-112022-0020', 1, 1, '1500000.00', 1, '2022-11-04 10:38:43', 'Cash', 'Current Assets'),
(41, 'JRE-112022-0020', 58, 5, '1500000.00', 2, '2022-11-04 10:38:43', 'Capital', 'Equity'),
(42, 'JRE-112022-0021', 59, 8, '600000.00', 1, '2022-11-04 10:48:40', 'Equipment', 'Non-current assets'),
(43, 'JRE-112022-0021', 1, 1, '200000.00', 2, '2022-11-04 10:48:40', 'Cash', 'Current Assets'),
(44, 'JRE-112022-0021', 60, 4, '400000.00', 2, '2022-11-04 10:48:40', 'Notes Payable', 'Current liabilities'),
(45, 'JRE-112022-0022', 47, 3, '1600.00', 1, '2022-11-04 10:50:31', 'Utilities expense', 'Expenses'),
(46, 'JRE-112022-0022', 1, 1, '1600.00', 2, '2022-11-04 10:50:31', 'Cash', 'Current Assets'),
(47, 'JRE-112022-0023', 63, 1, '12000.00', 1, '2022-11-04 10:55:41', 'Prepaid Insurance', 'Current Assets'),
(48, 'JRE-112022-0023', 1, 1, '12000.00', 2, '2022-11-04 10:55:41', 'Cash', 'Current Assets'),
(49, 'JRE-112022-0024', 6, 1, '10000.00', 1, '2022-11-04 10:57:36', 'Office Supplies', 'Current Assets'),
(50, 'JRE-112022-0024', 1, 1, '10000.00', 2, '2022-11-04 10:57:36', 'Cash', 'Current Assets'),
(51, 'JRE-112022-0025', 64, 6, '5000.00', 1, '2022-11-04 11:01:58', 'Withdrawals', 'Withdrawals'),
(52, 'JRE-112022-0025', 1, 1, '5000.00', 2, '2022-11-04 11:01:58', 'Cash', 'Current Assets'),
(53, 'JRE-112022-0026', 6, 8, '2500.00', 1, '2022-11-04 11:04:06', 'Office Supplies', 'Non-current assets'),
(54, 'JRE-112022-0026', 7, 4, '2500.00', 2, '2022-11-04 11:04:06', 'Accounts Payable', 'Current liabilities'),
(55, 'JRE-112022-0027', 1, 1, '135000.00', 1, '2022-11-04 11:07:04', 'Cash', 'Current Assets'),
(56, 'JRE-112022-0027', 29, 2, '135000.00', 2, '2022-11-04 11:07:04', 'Service Revenue', 'Revenue'),
(57, 'JRE-112022-0028', 65, 3, '10000.00', 1, '2022-11-04 11:11:10', 'Charitable Contribution', 'Expenses'),
(58, 'JRE-112022-0028', 1, 1, '10000.00', 2, '2022-11-04 11:11:10', 'Cash', 'Current Assets'),
(59, 'JRE-112022-0029', 32, 3, '15000.00', 1, '2022-11-04 11:12:21', 'Rent revenue', 'Expenses'),
(60, 'JRE-112022-0029', 1, 1, '15000.00', 2, '2022-11-04 11:12:21', 'Cash', 'Current Assets'),
(61, 'JRE-112022-0030', 60, 4, '11000.00', 1, '2022-11-04 11:17:40', 'Notes Payable', 'Current liabilities'),
(62, 'JRE-112022-0030', 1, 1, '11000.00', 2, '2022-11-04 11:17:40', 'Cash', 'Current Assets'),
(63, 'JRE-112022-0031', 44, 3, '12000.00', 1, '2022-11-04 11:19:09', 'Salaries expense', 'Expenses'),
(64, 'JRE-112022-0031', 1, 1, '12000.00', 2, '2022-11-04 11:19:09', 'Cash', 'Current Assets'),
(65, 'JRE-112022-0032', 1, 1, '250000.00', 1, '2022-11-05 13:16:32', 'Cash', 'Current Assets'),
(66, 'JRE-112022-0032', 58, 5, '250000.00', 2, '2022-11-05 13:16:32', 'Capital', 'Equity'),
(67, 'JRE-112022-0033', 59, 8, '50000.00', 1, '2022-11-05 13:21:08', 'Equipment', 'Non-current assets'),
(68, 'JRE-112022-0033', 1, 1, '30000.00', 2, '2022-11-05 13:21:08', 'Cash', 'Current Assets'),
(69, 'JRE-112022-0033', 60, 4, '20000.00', 2, '2022-11-05 13:21:08', 'Notes Payable', 'Current liabilities'),
(70, 'JRE-112022-0034', 59, 1, '3300.00', 1, '2022-11-05 13:25:43', 'Equipment', 'Current Assets'),
(71, 'JRE-112022-0034', 7, 4, '3300.00', 2, '2022-11-05 13:25:43', 'Accounts Payable', 'Current liabilities'),
(72, 'JRE-112022-0035', 4, 1, '6500.00', 1, '2022-11-05 13:29:06', 'Accounts Receivable', 'Current Assets'),
(73, 'JRE-112022-0035', 29, 2, '6500.00', 2, '2022-11-05 13:29:06', 'Service Revenue', 'Revenue'),
(74, 'JRE-112022-0036', 1, 1, '2500.00', 1, '2022-11-05 13:30:42', 'Cash', 'Current Assets'),
(75, 'JRE-112022-0036', 29, 2, '2500.00', 2, '2022-11-05 13:30:42', 'Service Revenue', 'Revenue'),
(76, 'JRE-112022-0037', 44, 3, '7500.00', 1, '2022-11-05 13:32:28', 'Salaries expense', 'Expenses'),
(77, 'JRE-112022-0037', 1, 1, '7500.00', 2, '2022-11-05 13:32:28', 'Cash', 'Current Assets'),
(78, 'JRE-112022-0038', 1, 1, '6500.00', 1, '2022-11-05 13:37:01', 'Cash', 'Current Assets'),
(79, 'JRE-112022-0038', 4, 1, '6500.00', 2, '2022-11-05 13:37:01', 'Accounts Receivable', 'Current Assets'),
(80, 'JRE-112022-0039', 47, 3, '800.00', 1, '2022-11-05 13:37:57', 'Utilities expense', 'Expenses'),
(81, 'JRE-112022-0039', 1, 1, '800.00', 2, '2022-11-05 13:37:57', 'Cash', 'Current Assets'),
(82, 'JRE-112022-0040', 60, 4, '5000.00', 1, '2022-11-05 13:39:29', 'Notes Payable', 'Current liabilities'),
(83, 'JRE-112022-0040', 1, 1, '5000.00', 2, '2022-11-05 13:39:29', 'Cash', 'Current Assets'),
(84, 'JRE-112022-0041', 1, 1, '5600.00', 1, '2022-11-05 13:41:35', 'Cash', 'Current Assets'),
(85, 'JRE-112022-0041', 29, 2, '5600.00', 2, '2022-11-05 13:41:35', 'Service Revenue', 'Revenue');

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
(6, 'Roge Hardware Supplies', 'roge123@gmail.com', 2147483647, 'Hardware supplies of offices and home', 1, 0),
(7, 'Sam Boutique', 'sambal2022@gmail.com', 2147483647, 'Food and Drugs Supplies', 5, 0),
(8, 'Mondragon Pet shop', 'donmondragon050@gmail.com', 2147483647, 'Nationwide Pets Breed', 3, 0),
(9, 'Awesome Appliances ', 'awesomeappliances0808@gmail.com', 2147483647, 'Branded of all Appliances', 1, 0),
(10, 'Coffee Shop', 'miyacalifacoffeeshop@gmail.com', 2147483647, 'We serves coffee of various types, notably espresso, latte, and cappuccino.', 5, 0),
(12, 'Amazing Super Market', 'amazingsupermarket@gmail.com', 2147483647, '', 2, 0),
(13, 'Huawei', 'a@g.com', 423, '', 2, 0);

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
-- Table structure for table `store_customer`
--

CREATE TABLE `store_customer` (
  `store_customer_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_email` varchar(150) NOT NULL,
  `store_contact` int(11) NOT NULL,
  `store_address` varchar(150) NOT NULL,
  `delete_flag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_customer`
--

INSERT INTO `store_customer` (`store_customer_id`, `store_name`, `store_email`, `store_contact`, `store_address`, `delete_flag`) VALUES
(1, 'Avid Mermer', 'me@gmail.com', 777777777, 'Tandang Sora Manila City', 0),
(2, 'La Vida', 'cida@gmail.com', 555555555, 'General Ave  Manila City', 0);

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
(2, 'Tax 15.00%', 'Purchases', '15.00', 'Goods', 1, 0),
(4, 'try me', 'None', '14.00', 'Goods', 0, 1),
(5, '2', 'Sales', '0.00', 'Services', 0, 0);

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
  ADD PRIMARY KEY (`account_id`);

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
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`bank_account_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `bank_meta_data`
--
ALTER TABLE `bank_meta_data`
  ADD PRIMARY KEY (`bank_id`);

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
-- Indexes for table `credit_note`
--
ALTER TABLE `credit_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_id` (`credit_id`);

--
-- Indexes for table `credit_note_items`
--
ALTER TABLE `credit_note_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_id` (`credit_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  ADD PRIMARY KEY (`cus_invoice_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `account_id` (`account_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

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
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`journal_entry_id`);

--
-- Indexes for table `journal_items`
--
ALTER TABLE `journal_items`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `store_customer`
--
ALTER TABLE `store_customer`
  ADD PRIMARY KEY (`store_customer_id`);

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
  MODIFY `accounting_periods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `account_list`
--
ALTER TABLE `account_list`
  MODIFY `account_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `account_type_list`
--
ALTER TABLE `account_type_list`
  MODIFY `account_type_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `bank_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `customer_invoice`
--
ALTER TABLE `customer_invoice`
  MODIFY `cus_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `group_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `journal_entry_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `journal_items`
--
ALTER TABLE `journal_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

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
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_ibfk_1` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`stage_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `supplier_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
