-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 01:20 PM
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
-- Database: `dokani`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  `account_bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` bigint(20) DEFAULT NULL,
  `account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_account_id` bigint(20) DEFAULT NULL,
  `transaction_client_id` bigint(20) DEFAULT NULL,
  `transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_opening_balance` bigint(20) DEFAULT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `account_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Like Opening Balance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_transfer`
--

CREATE TABLE `account_transfer` (
  `account_transfer_id` int(10) UNSIGNED NOT NULL,
  `account_from` int(11) NOT NULL,
  `account_to` int(11) NOT NULL,
  `account_transaction_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `branch_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `branch_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_entry_id`, `branch_phone_number`, `branch_address`, `branch_status`, `branch_is_deleted`, `branch_created_by`, `branch_updated_by`, `branch_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Branch', 'Test Brush99568', '0161234879', 'Tet Address 11', '1', 'NO', '2', '2', NULL, '2022-12-31 18:00:00', '2022-12-31 18:00:00'),
(2, 'Test ssss', 'Test ssss24930', '016789456', 'test', '0', 'YES', '2', NULL, '2', '2022-12-31 18:00:00', '2023-01-01 02:21:23'),
(3, 'Test Brunch', 'Test Brush61321', '0189746644', 'address', '0', 'YES', '2', '2', '2', '2023-01-15 18:00:00', '2023-01-16 00:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `client_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `client_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `branch_id`, `client_entry_id`, `client_type`, `client_email`, `client_phone_number`, `client_address`, `client_image`, `client_status`, `client_is_deleted`, `client_created_by`, `client_updated_by`, `client_deleted_by`, `created_at`, `updated_at`) VALUES
(3, 'Test Client', NULL, 'Test Client80078', NULL, NULL, NULL, NULL, '/uploads/1672035556.png', '1', 'NO', '2', '2', NULL, '2022-12-25 18:00:00', '2022-12-25 18:00:00'),
(4, 'Test Client', NULL, 'Test Client80078', NULL, NULL, NULL, NULL, '', '0', 'YES', '2', NULL, '2', '2022-12-25 18:00:00', '2022-12-26 00:36:24'),
(5, 'Shadman Sakib', NULL, 'Shadman Sakib49337', NULL, NULL, NULL, NULL, '', '1', 'NO', '2', NULL, NULL, '2022-12-25 18:00:00', '2022-12-26 00:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `client_ledgers`
--

CREATE TABLE `client_ledgers` (
  `client_ledger_id` int(10) UNSIGNED NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `client_account_id` bigint(20) DEFAULT NULL,
  `client_transaction_id` bigint(20) DEFAULT NULL,
  `client_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `client_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `client_ledger_refund_id` bigint(20) DEFAULT NULL,
  `client_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_last_balance` bigint(20) DEFAULT NULL,
  `client_ledger_dr` bigint(20) DEFAULT NULL,
  `client_ledger_cr` bigint(20) DEFAULT NULL,
  `client_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_transactions`
--

CREATE TABLE `client_transactions` (
  `client_transaction_id` int(10) UNSIGNED NOT NULL,
  `client_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_account_id` bigint(20) DEFAULT NULL,
  `client_transaction_client_id` bigint(20) DEFAULT NULL,
  `client_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `client_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `client_account_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_facebook_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_database_backup_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo_width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `delivery_men_id` int(10) UNSIGNED NOT NULL,
  `delivery_men_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `delivery_men_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `delivery_men_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_men_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_vehicles`
--

CREATE TABLE `delivery_vehicles` (
  `delivery_vehicles_id` int(10) UNSIGNED NOT NULL,
  `delivery_vehicles_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_reg_no` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `delivery_vehicles_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `delivery_vehicles_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_vehicles_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `expense_head_id` bigint(20) DEFAULT NULL,
  `expense_sub_head_id` bigint(20) DEFAULT NULL,
  `expense_account` bigint(20) DEFAULT NULL,
  `expense_amount` bigint(20) DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_heads`
--

CREATE TABLE `expense_heads` (
  `expensehead_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_sub_heads`
--

CREATE TABLE `expense_sub_heads` (
  `expense_sub_head_id` int(10) UNSIGNED NOT NULL,
  `expense_head_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_pos_sales`
--

CREATE TABLE `invoice_pos_sales` (
  `sale_id` int(10) UNSIGNED NOT NULL,
  `invoiceNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `warehouse_id` bigint(20) DEFAULT NULL,
  `staff_id` bigint(20) DEFAULT NULL,
  `invoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTotal` bigint(20) DEFAULT NULL,
  `product_discount` bigint(20) DEFAULT NULL,
  `vat_rate` bigint(20) DEFAULT NULL,
  `vat_amount` bigint(20) DEFAULT NULL,
  `overall_discount` bigint(20) DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `payment_type` bigint(20) DEFAULT NULL,
  `account` bigint(20) DEFAULT NULL,
  `total_paying` bigint(20) DEFAULT NULL,
  `change` bigint(20) DEFAULT NULL,
  `invoice_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `invoice_created_by` bigint(20) DEFAULT NULL,
  `invoice_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_12_24_054443_create_suppliers_table', 2),
(6, '2022_12_26_040821_create_clients_table', 3),
(7, '2022_11_16_062936_create_accounts_table', 4),
(8, '2022_12_26_064550_create_warehouses_table', 5),
(9, '2022_12_26_073251_create_product_categories_table', 6),
(10, '2022_12_26_080623_create_staff_table', 7),
(11, '2022_12_26_093101_create_products_table', 8),
(12, '2022_12_27_080313_create_purchases_table', 9),
(13, '2022_12_27_082335_create_purchase_items_table', 9),
(14, '2023_01_01_075029_create_branches_table', 10),
(15, '2022_11_16_063459_create_account_trasections_table', 11),
(16, '2022_12_28_050116_create_expense_heads_table', 11),
(17, '2023_01_01_053944_create_expense_sub_heads_table', 11),
(18, '2023_01_03_093144_add_purchase_created_at_purchases_table', 11),
(25, '2023_01_04_030208_create_purchase_returns_table', 12),
(26, '2023_01_04_063744_create_purchase_return_items_table', 12),
(27, '2022_11_16_081202_create_client_ledgers_table', 13),
(28, '2022_11_21_080112_create_client_transections_table', 13),
(29, '2022_11_30_054202_create_money_reciept_table', 13),
(30, '2023_01_02_095015_create_delivery_men_table', 13),
(31, '2023_01_03_032511_add_columns_to_account_transactions_table', 13),
(32, '2023_01_03_042552_create_expenses_table', 13),
(33, '2023_01_04_044815_create_account_transfer_table', 13),
(34, '2023_01_04_062223_create_delivery_vehicles_table', 13),
(35, '2023_01_04_081607_create_product_transfer_table', 13),
(36, '2023_01_12_041345_create_barcodes_table', 13),
(37, '2023_01_17_082645_create_warehouse_to_branches_table', 13),
(38, '2023_01_17_082753_create_warehouse_to_branch_items_table', 13),
(39, '2023_01_16_054315_create_company_infos_table', 14),
(40, '2023_01_16_071718_create_invoice_pos_sales_table', 14),
(41, '2023_01_16_085305_create_pos_sale_products_table', 14),
(42, '2023_01_17_094804_create_terms_table', 14),
(43, '2023_01_18_054047_add_status_to_terms', 14),
(44, '2023_01_18_082301_add_created_by_to_terms', 14),
(45, '2023_01_18_101637_create_pos_transfers_table', 14),
(46, '2023_01_18_102305_create_pos_transfer_products_table', 14),
(47, '2023_01_18_104503_add_updated_by_to_terms', 14);

-- --------------------------------------------------------

--
-- Table structure for table `money_receipt`
--

CREATE TABLE `money_receipt` (
  `money_receipt_id` int(10) UNSIGNED NOT NULL,
  `money_receipt_account_transaction_id` bigint(20) DEFAULT NULL,
  `money_receipt_voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_client_id` bigint(20) DEFAULT NULL,
  `money_receipt_client_transaction_id` bigint(20) DEFAULT NULL,
  `money_receipt_payment_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_total_amount` bigint(20) DEFAULT NULL,
  `money_receipt_total_discount` bigint(20) DEFAULT NULL,
  `money_receipt_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_receipt_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `money_receipt_deleted_by` bigint(20) DEFAULT NULL,
  `money_receipt_created_by` bigint(20) DEFAULT NULL,
  `money_receipt_updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_sale_products`
--

CREATE TABLE `pos_sale_products` (
  `sale_product_id` int(10) UNSIGNED NOT NULL,
  `invoiceNo` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `size_id` bigint(20) DEFAULT NULL,
  `color_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subTotal` bigint(20) DEFAULT NULL,
  `discount_amount` bigint(20) DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_transfers`
--

CREATE TABLE `pos_transfers` (
  `transfer_id` int(10) UNSIGNED NOT NULL,
  `transferDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transferNo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fromWarehouseID` bigint(20) DEFAULT NULL,
  `toWarehouseID` bigint(20) DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_transfer_products`
--

CREATE TABLE `pos_transfer_products` (
  `transfer_product_id` int(10) UNSIGNED NOT NULL,
  `transferNo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) DEFAULT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_retail_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_wholesale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `product_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `product_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_entry_id`, `product_category`, `product_code`, `product_retail_price`, `product_wholesale_price`, `product_status`, `product_is_deleted`, `product_created_by`, `product_updated_by`, `product_deleted_by`, `product_created_at`, `created_at`, `updated_at`) VALUES
(1, 'Trabill', 'Trabill36297', '1', '2301181', '1000', '700', '1', 'NO', '2', NULL, NULL, '2023-01-18', '2023-01-17 18:00:00', '2023-01-18 01:09:46'),
(2, 'Dokani', 'Dokani77776', '1', '2301182', '1000', '700', '1', 'NO', '2', NULL, NULL, '2023-01-18', '2023-01-17 18:00:00', '2023-01-18 01:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `product_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `product_category_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `product_category_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `product_category_entry_id`, `product_category_status`, `product_category_is_deleted`, `product_category_created_by`, `product_category_updated_by`, `product_category_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Test category 1', 'Test category92277', '1', 'NO', '2', '2', NULL, '2022-12-25 18:00:00', '2022-12-25 18:00:00'),
(2, 'Test category', 'Test category4480', '0', 'YES', '2', NULL, '2', '2022-12-25 18:00:00', '2022-12-26 02:03:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_transfer`
--

CREATE TABLE `product_transfer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `purchase_warehouse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_po_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_payment_terms` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_net_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `purchase_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `purchase_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_warehouse_id`, `purchase_supplier_id`, `purchase_number`, `purchase_po_reference`, `purchase_payment_terms`, `purchase_date`, `due_date`, `purchase_note`, `purchase_quantity`, `purchase_subtotal`, `purchase_discount`, `purchase_net_total`, `purchase_status`, `purchase_is_deleted`, `purchase_created_by`, `purchase_updated_by`, `purchase_deleted_by`, `created_at`, `updated_at`, `purchase_created_at`) VALUES
(1, '1', '13', '2301231', '2222222', 'payment', '2023-01-22', '2023-01-26', 'test', '8.00', '4000.00', '500', '3500.00', '1', 'NO', '2', NULL, NULL, '2023-01-22 18:00:00', '2023-01-22 22:12:07', '2023/01/23'),
(2, '1', '13', '2301232', '22222', 'test', '2023-01-22', '2023-01-26', 'test', '10', '2500', '250', '2250', '1', 'NO', '2', '2', NULL, '2023-01-22 18:00:00', '2023-01-22 18:00:00', '2023/01/23');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items`
--

CREATE TABLE `purchase_items` (
  `purchase_items_id` int(10) UNSIGNED NOT NULL,
  `purchase_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_items`
--

INSERT INTO `purchase_items` (`purchase_items_id`, `purchase_id`, `purchase_product_id`, `purchase_product_size`, `purchase_product_color`, `purchase_product_quantity`, `purchase_product_price`, `purchase_product_total_price`, `created_at`, `updated_at`) VALUES
(1, '1', '1', NULL, NULL, '3', '500', '1500.00', '2023-01-22 18:00:00', '2023-01-22 22:12:07'),
(2, '1', '2', NULL, NULL, '5', '500', '2500.00', '2023-01-22 18:00:00', '2023-01-22 22:12:07'),
(5, '2', '1', NULL, NULL, '5', '250', '1250.00', '2023-01-22 18:00:00', NULL),
(6, '2', '2', NULL, NULL, '5', '250', '1250', '2023-01-22 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `purchase_return_id` int(10) UNSIGNED NOT NULL,
  `purchase_return_supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_quantity_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_net_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_net_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `purchase_return_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `purchase_return_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_returns`
--

INSERT INTO `purchase_returns` (`purchase_return_id`, `purchase_return_supplier_id`, `purchase_number`, `purchase_return_number`, `purchase_total_quantity`, `purchase_quantity_balance`, `purchase_return_total_quantity`, `purchase_subtotal`, `purchase_return_subtotal`, `purchase_discount`, `purchase_return_discount`, `purchase_net_total`, `purchase_return_net_total`, `purchase_return_status`, `purchase_return_is_deleted`, `purchase_return_created_by`, `purchase_return_updated_by`, `purchase_return_deleted_by`, `purchase_return_created_at`, `created_at`, `updated_at`) VALUES
(1, '13', '2301231', '2301231', '8.00', NULL, '2', '4000.00', '1000', '500', '100', '3500.00', '900', '1', 'NO', '2', '2', NULL, '2023/01/23', '2023-01-22 18:00:00', '2023-01-22 18:00:00'),
(2, '13', '2301231', '2301232', '8.00', NULL, '2', '4000.00', '1000', '500', '200', '3500.00', '800', '1', 'NO', '2', NULL, NULL, '2023/01/23', '2023-01-22 18:00:00', '2023-01-22 22:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_items`
--

CREATE TABLE `purchase_return_items` (
  `purchase_return_item_id` int(10) UNSIGNED NOT NULL,
  `purchase_return_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_return_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_product_total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_return_items`
--

INSERT INTO `purchase_return_items` (`purchase_return_item_id`, `purchase_return_id`, `purchase_number`, `purchase_product_id`, `purchase_product_size`, `purchase_product_color`, `purchase_product_quantity`, `purchase_product_balance`, `purchase_product_return_quantity`, `purchase_product_price`, `purchase_product_total_price`, `purchase_return_product_total_price`, `created_at`, `updated_at`) VALUES
(3, '2', '2301231', '1', NULL, NULL, '3', NULL, '1', '500', '1500.00', '500', '2023-01-22 18:00:00', '2023-01-22 22:30:34'),
(4, '2', '2301231', '2', NULL, NULL, '5', NULL, '1', '500', '2500.00', '500', '2023-01-22 18:00:00', '2023-01-22 22:30:34'),
(5, '1', '2301231', '1', NULL, NULL, '3', NULL, '1', '500', '1500.00', '500', '2023-01-22 18:00:00', '2023-01-22 22:31:09'),
(6, '1', '2301231', '2', NULL, NULL, '5', NULL, '1', '500', '2500.00', '500', '2023-01-22 18:00:00', '2023-01-22 22:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `staff_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `staff_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_entry_id`, `staff_status`, `staff_is_deleted`, `staff_created_by`, `staff_updated_by`, `staff_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Staff', 'Test Staff36659', '0', 'YES', '2', '2', '2', '2022-12-25 18:00:00', '2022-12-26 03:27:28'),
(2, 'Test Staff1', 'Test Staff60624', '1', 'NO', '2', '2', NULL, '2022-12-25 18:00:00', '2023-01-15 18:00:00'),
(3, 'Test Staff', 'Test Staff51735', '0', 'YES', '2', NULL, '2', '2023-01-15 18:00:00', '2023-01-16 00:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `supplier_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `supplier_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `branch_id`, `supplier_entry_id`, `supplier_email`, `supplier_phone_number`, `supplier_opening_balance`, `supplier_address`, `supplier_image`, `supplier_status`, `supplier_is_deleted`, `supplier_created_by`, `supplier_updated_by`, `supplier_deleted_by`, `created_at`, `updated_at`) VALUES
(13, 'Test Supplier', NULL, 'Test Supplier78183', NULL, NULL, NULL, NULL, '/uploads/1672035834.png', '1', 'NO', '2', NULL, NULL, '2022-12-25 18:00:00', '2022-12-25 18:00:00'),
(14, 'Test Supplier', NULL, 'Test Supplier21914', NULL, NULL, NULL, NULL, '', '0', 'YES', '2', NULL, '2', '2022-12-25 18:00:00', '2022-12-26 00:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `terms_id` int(10) UNSIGNED NOT NULL,
  `terms_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `terms_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shofik', 'si.m360ict@gmail.com', NULL, '$2y$10$h96JegNIR7AhlR680Mc71uUeEc2wejPalUqWcSxRhSfIIlkUzzYEK', NULL, '2022-12-11 03:09:42', '2022-12-11 03:09:42'),
(2, 'Shadman Sakib', 'ssk.m360ict@gmail.com', NULL, '$2y$10$Ijfc96TF9.PkbNfKHhI3F.gKZY607Sg68xn1wiUhjp7sgEuyPsAdO', NULL, '2022-12-25 21:41:11', '2022-12-25 21:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` int(10) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `warehouse_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `warehouse_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouse_id`, `warehouse_name`, `warehouse_entry_id`, `warehouse_phone_number`, `warehouse_address`, `warehouse_status`, `warehouse_is_deleted`, `warehouse_created_by`, `warehouse_updated_by`, `warehouse_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Warehouse', 'Test Warehouse91250', '0159463855', 'dhaka', '1', 'NO', '2', NULL, NULL, '2023-01-17 18:00:00', '2023-01-18 01:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_to_branches`
--

CREATE TABLE `warehouse_to_branches` (
  `warehouse_to_branch_transfer_id` int(10) UNSIGNED NOT NULL,
  `warehouse_to_branch_transfer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_transfer_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `warehouse_to_branch_transfer_is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `warehouse_to_branch_transfer_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_to_branches`
--

INSERT INTO `warehouse_to_branches` (`warehouse_to_branch_transfer_id`, `warehouse_to_branch_transfer_number`, `warehouse_id`, `branch_id`, `total_transfer_quantity`, `transfer_note`, `transfer_date`, `warehouse_to_branch_transfer_status`, `warehouse_to_branch_transfer_is_deleted`, `warehouse_to_branch_transfer_created_by`, `warehouse_to_branch_transfer_updated_by`, `warehouse_to_branch_transfer_deleted_by`, `warehouse_to_branch_transfer_created_at`, `created_at`, `updated_at`) VALUES
(1, 'TRANS-5097410000', '1', '1', NULL, 'test', '23-01-2023', '1', 'NO', '2', NULL, NULL, '2023/01/23', '2023-01-22 18:00:00', '2023-01-22 22:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_to_branch_items`
--

CREATE TABLE `warehouse_to_branch_items` (
  `warehouse_to_branch_items_id` int(10) UNSIGNED NOT NULL,
  `warehouse_to_branch_transfer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_to_branch_transfer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_product_available_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_product_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_to_branch_items`
--

INSERT INTO `warehouse_to_branch_items` (`warehouse_to_branch_items_id`, `warehouse_to_branch_transfer_number`, `warehouse_to_branch_transfer_id`, `transfer_product_id`, `transfer_product_available_balance`, `transfer_product_amount`, `created_at`, `updated_at`) VALUES
(1, 'TRANS-5097410000', '1', '2', '8', '6', '2023-01-22 18:00:00', '2023-01-22 22:53:07'),
(2, 'TRANS-5097410000', '1', '1', '6', '3', '2023-01-22 18:00:00', '2023-01-22 22:53:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `account_transfer`
--
ALTER TABLE `account_transfer`
  ADD PRIMARY KEY (`account_transfer_id`);

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_ledgers`
--
ALTER TABLE `client_ledgers`
  ADD PRIMARY KEY (`client_ledger_id`);

--
-- Indexes for table `client_transactions`
--
ALTER TABLE `client_transactions`
  ADD PRIMARY KEY (`client_transaction_id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`delivery_men_id`);

--
-- Indexes for table `delivery_vehicles`
--
ALTER TABLE `delivery_vehicles`
  ADD PRIMARY KEY (`delivery_vehicles_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_heads`
--
ALTER TABLE `expense_heads`
  ADD PRIMARY KEY (`expensehead_id`),
  ADD UNIQUE KEY `expense_heads_title_unique` (`title`);

--
-- Indexes for table `expense_sub_heads`
--
ALTER TABLE `expense_sub_heads`
  ADD PRIMARY KEY (`expense_sub_head_id`),
  ADD UNIQUE KEY `expense_sub_heads_title_unique` (`title`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_pos_sales`
--
ALTER TABLE `invoice_pos_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_receipt`
--
ALTER TABLE `money_receipt`
  ADD PRIMARY KEY (`money_receipt_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pos_sale_products`
--
ALTER TABLE `pos_sale_products`
  ADD PRIMARY KEY (`sale_product_id`);

--
-- Indexes for table `pos_transfers`
--
ALTER TABLE `pos_transfers`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `pos_transfer_products`
--
ALTER TABLE `pos_transfer_products`
  ADD PRIMARY KEY (`transfer_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_transfer`
--
ALTER TABLE `product_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_items`
--
ALTER TABLE `purchase_items`
  ADD PRIMARY KEY (`purchase_items_id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`purchase_return_id`);

--
-- Indexes for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  ADD PRIMARY KEY (`purchase_return_item_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `warehouse_to_branches`
--
ALTER TABLE `warehouse_to_branches`
  ADD PRIMARY KEY (`warehouse_to_branch_transfer_id`);

--
-- Indexes for table `warehouse_to_branch_items`
--
ALTER TABLE `warehouse_to_branch_items`
  ADD PRIMARY KEY (`warehouse_to_branch_items_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_transfer`
--
ALTER TABLE `account_transfer`
  MODIFY `account_transfer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_ledgers`
--
ALTER TABLE `client_ledgers`
  MODIFY `client_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_transactions`
--
ALTER TABLE `client_transactions`
  MODIFY `client_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `delivery_men_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_vehicles`
--
ALTER TABLE `delivery_vehicles`
  MODIFY `delivery_vehicles_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_heads`
--
ALTER TABLE `expense_heads`
  MODIFY `expensehead_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_sub_heads`
--
ALTER TABLE `expense_sub_heads`
  MODIFY `expense_sub_head_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_pos_sales`
--
ALTER TABLE `invoice_pos_sales`
  MODIFY `sale_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `money_receipt`
--
ALTER TABLE `money_receipt`
  MODIFY `money_receipt_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_sale_products`
--
ALTER TABLE `pos_sale_products`
  MODIFY `sale_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_transfers`
--
ALTER TABLE `pos_transfers`
  MODIFY `transfer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos_transfer_products`
--
ALTER TABLE `pos_transfer_products`
  MODIFY `transfer_product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_transfer`
--
ALTER TABLE `product_transfer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_items`
--
ALTER TABLE `purchase_items`
  MODIFY `purchase_items_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `purchase_return_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_return_items`
--
ALTER TABLE `purchase_return_items`
  MODIFY `purchase_return_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `terms_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse_to_branches`
--
ALTER TABLE `warehouse_to_branches`
  MODIFY `warehouse_to_branch_transfer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouse_to_branch_items`
--
ALTER TABLE `warehouse_to_branch_items`
  MODIFY `warehouse_to_branch_items_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
