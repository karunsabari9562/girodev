-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2023 at 12:47 AM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambiers`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_drivers`
--

CREATE TABLE `active_drivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dr_id` int(11) DEFAULT NULL,
  `dr_code` int(11) DEFAULT NULL,
  `driver_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_category` int(11) DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL,
  `vehicle_model` int(11) DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `availability_status` int(11) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offlined_at` timestamp NULL DEFAULT NULL,
  `ride_status` int(11) DEFAULT '0',
  `latitude` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) DEFAULT '0',
  `mail_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'admin@gmail.com',
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `instagram` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `name`, `username`, `password`, `remember_token`, `mobile`, `mail_id`, `facebook`, `instagram`, `twitter`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$Vg//bnOyQ345bED6dafgvOHE/l6npbEzIrF.WFUen4zUWGxENKTku', 'wDMRafE0SMUhAxk8Zxcw9tDfacrpljqAqhmCjsvEm7LCN0HO4P34YYwn8hsD', 0, 'karunsabari@gmail.com', '0', '0', '0', '1670310883.png', NULL, '2023-03-05 20:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibleto_driver` bigint(20) DEFAULT NULL,
  `visibleto_passenger` bigint(20) DEFAULT NULL,
  `visibleto_franchise` bigint(20) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_registrations`
--

CREATE TABLE `customer_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_key` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `otp_expiry` timestamp NULL DEFAULT NULL,
  `disability_status` int(11) DEFAULT '0',
  `disability_document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `block_reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disability_documents`
--

CREATE TABLE `disability_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `document` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_upload_status` int(11) DEFAULT '0',
  `document_approval_status` int(11) DEFAULT '0',
  `document_rejection_reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `state_id`, `status`) VALUES
(249, 'Alappuzha', 10, 0),
(250, 'Ernakulam', 10, 0),
(251, 'Idukki', 10, 0),
(252, 'Kollam', 10, 0),
(253, 'Kannur', 10, 1),
(254, 'Kasaragod', 10, 0),
(255, 'Kottayam', 10, 0),
(256, 'Kozhikode', 10, 0),
(257, 'Malappuram', 10, 0),
(258, 'Palakkad', 10, 0),
(259, 'Pathanamthitta', 10, 0),
(260, 'Thrissur', 10, 0),
(261, 'Thiruvananthapuram', 10, 0),
(262, 'Wayanad', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver_account_renewals`
--

CREATE TABLE `driver_account_renewals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `reference_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `approval_status` int(11) DEFAULT NULL,
  `rejection_reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_deactivate_histories`
--

CREATE TABLE `driver_deactivate_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `deactivated_by` int(11) NOT NULL,
  `reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_docs_reuploads`
--

CREATE TABLE `driver_docs_reuploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `franchise` int(11) NOT NULL,
  `doc_type` int(11) DEFAULT NULL,
  `doc_file` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_upload_status` int(11) DEFAULT NULL,
  `doc_approval_status` int(11) DEFAULT NULL,
  `doc_rejection_reason` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_approval` int(11) DEFAULT NULL,
  `admin_approval` int(11) NOT NULL,
  `admin_reject_reason` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_expiry` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_document_histories`
--

CREATE TABLE `driver_document_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `doc_type` int(11) DEFAULT NULL,
  `doc_file` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc_expiry` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_id_regenerations`
--

CREATE TABLE `driver_id_regenerations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `regenerated_at` date DEFAULT NULL,
  `reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_primary_documents`
--

CREATE TABLE `driver_primary_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `license_frontfile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_backfile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_expiry` date DEFAULT NULL,
  `licensefront_approval_status` int(11) DEFAULT '0',
  `licensefront_upload_status` int(11) DEFAULT '0',
  `licensefront_rejection_reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licenseback_approval_status` int(11) NOT NULL DEFAULT '0',
  `licenseback_upload_status` int(11) NOT NULL DEFAULT '0',
  `licenseback_rejection_reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rc_file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rc_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rc_expiry` date DEFAULT NULL,
  `rc_approval_status` int(11) DEFAULT '0',
  `rc_upload_status` int(11) DEFAULT '0',
  `rc_rejection_reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_expiry` date DEFAULT NULL,
  `insurance_approval_status` int(11) DEFAULT '0',
  `insurance_upload_status` int(11) DEFAULT '0',
  `insurance_rejection_reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_profile_rejections`
--

CREATE TABLE `driver_profile_rejections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `profile_type` int(11) DEFAULT NULL,
  `rejected_by` int(11) NOT NULL,
  `rejection_reason` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_reactivate_requests`
--

CREATE TABLE `driver_reactivate_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `requested_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_registrations`
--

CREATE TABLE `driver_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_key` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_upload_status` int(11) DEFAULT '0',
  `profile_approval_status` int(11) DEFAULT '0',
  `profile_reject_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vehicle_category` int(11) DEFAULT '0',
  `vehicle_type` int(11) DEFAULT '0',
  `vehicle_model` int(11) DEFAULT '0',
  `vehicle_upload_status` int(11) DEFAULT '0',
  `vehicle_approval_status` int(11) DEFAULT '0',
  `vehicle_reject_reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `account_reject_reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_rejected_date` date DEFAULT NULL,
  `login_otp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `otp_expiry` timestamp NULL DEFAULT NULL,
  `profile_submission` int(11) DEFAULT '0',
  `admin_approval_status` int(11) NOT NULL,
  `admin_reject_reason` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_rejected_date` date DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `added_by` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_reg_fees`
--

CREATE TABLE `driver_reg_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `timefrom` time DEFAULT NULL,
  `timeto` time DEFAULT NULL,
  `sp_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_renewal_histories`
--

CREATE TABLE `driver_renewal_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `reference_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_salaries`
--

CREATE TABLE `driver_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `driver_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `ride_from` date DEFAULT NULL,
  `ride_to` date DEFAULT NULL,
  `total_ride_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `reference_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `submitted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `driver_secondary_documents`
--

CREATE TABLE `driver_secondary_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` int(11) DEFAULT NULL,
  `pollution_file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pollution_expiry` date DEFAULT NULL,
  `pollution_approval_status` int(11) DEFAULT '0',
  `pollution_upload_status` int(11) DEFAULT '0',
  `pollution_rejection_reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permit_expiry` date DEFAULT NULL,
  `permit_approval_status` int(11) DEFAULT '0',
  `permit_upload_status` int(11) DEFAULT '0',
  `permit_rejection_reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) DEFAULT '0',
  `payment_date` date DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_approval_status` int(11) DEFAULT '0',
  `payment_rejection_reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fare_histories`
--

CREATE TABLE `fare_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) NOT NULL,
  `type` bigint(20) NOT NULL,
  `fare` bigint(20) NOT NULL,
  `service_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ride_tax` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `div_profit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_profit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_ride` int(11) DEFAULT NULL,
  `timefrom` time DEFAULT NULL,
  `timeto` time DEFAULT NULL,
  `minimum_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_distance` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchise_details`
--

CREATE TABLE `franchise_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fid` bigint(20) NOT NULL,
  `franchise_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_type` int(11) NOT NULL,
  `proprietor_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Landline` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `status` bigint(20) DEFAULT '0',
  `reason` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocked_date` date DEFAULT NULL,
  `profit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_location` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchise_renewals`
--

CREATE TABLE `franchise_renewals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fid` bigint(20) NOT NULL,
  `renew_date` date DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `franchise_salaries`
--

CREATE TABLE `franchise_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `franchise` int(11) DEFAULT NULL,
  `ride_from` date DEFAULT NULL,
  `ride_to` date DEFAULT NULL,
  `total_service_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_commission` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `submitted_at` date DEFAULT NULL,
  `reference_id` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_05_31_030430_create_admin_details_table', 1),
(3, '2022_08_19_053802_create_password_resets_table', 1),
(4, '2022_12_06_131429_create_vehicle_types_table', 2),
(5, '2022_12_06_150934_create_vehicle_categories_table', 3),
(6, '2022_12_07_082645_create_vehicle_models_table', 4),
(7, '2022_12_08_190056_create_franchise_details_table', 5),
(8, '2022_12_09_105313_create_franchise_renewals_table', 6),
(9, '2022_12_10_081807_create_fare_histories_table', 7),
(12, '2022_12_11_122218_create_advertisements_table', 9),
(17, '2016_06_01_000001_create_oauth_auth_codes_table', 13),
(18, '2016_06_01_000002_create_oauth_access_tokens_table', 13),
(19, '2016_06_01_000003_create_oauth_refresh_tokens_table', 13),
(20, '2016_06_01_000004_create_oauth_clients_table', 13),
(21, '2016_06_01_000005_create_oauth_personal_access_clients_table', 13),
(22, '2022_12_14_072424_create_driver_reg_fees_table', 14),
(23, '2022_12_15_105051_create_driver_profile_rejections_table', 15),
(24, '2022_12_18_182541_create_active_drivers_table', 16),
(25, '2022_12_20_151543_create_driver_docs_reuploads_table', 17),
(26, '2022_12_22_075924_create_driver_document_histrories_table', 18),
(27, '2022_12_11_113500_create_driver_registrations_table', 19),
(28, '2022_12_11_113526_create_driver_primary_documents_table', 19),
(29, '2022_12_22_075924_create_driver_document_histories_table', 20),
(30, '2022_12_26_075234_create_driver_secondary_documents_table', 20),
(31, '2022_12_31_070135_create_customer_registrations_table', 21),
(32, '2023_01_01_115656_create_disability_documents_table', 22),
(33, '2023_01_03_201123_create_driver_account_renewals_table', 23),
(34, '2023_01_03_201552_create_driver_renewal_histories_table', 24),
(35, '2023_01_08_112433_create_driver_deactivate_histories_table', 25),
(36, '2023_01_08_190443_create_driver_reactivate_requests_table', 26),
(38, '2023_01_16_071210_create_driver_id_regenerations_table', 28),
(49, '2023_01_21_090741_create_rides_bookings_table', 29),
(50, '2023_01_22_065951_create_ride_booking_histories_table', 29),
(51, '2023_01_23_105654_create_unfinished_bookings_table', 29),
(52, '2023_02_08_105137_create_driver_salaries_table', 30),
(54, '2023_02_11_071203_create_franchise_salaries_table', 31);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Ml0ILPCdWs50ELF4sEouFcGCVaTPk3ZN5uuOovnr', NULL, 'http://localhost', 1, 0, 0, '2023-01-03 12:15:10', '2023-01-03 12:15:10'),
(2, NULL, 'Laravel Password Grant Client', 'jQtTOS5qSoXTaecQdUxvyuieSiSTth8L8vVQDzPC', 'users', 'http://localhost', 0, 1, 0, '2023-01-03 12:15:11', '2023-01-03 12:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-03 12:15:11', '2023-01-03 12:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'karunsabari@gmail.com', 'Xt5zR3d6OrlbbBBdHA6GJsCPkoHUVJwEO9TSN5p0loUvLpsQi82vbzUfUZej2z0k', '2023-03-03 18:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rides_bookings`
--

CREATE TABLE `rides_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booked_at` timestamp NULL DEFAULT NULL,
  `timeout` timestamp NULL DEFAULT NULL,
  `booked_date` date DEFAULT NULL,
  `from_latitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_longitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_latitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_longitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `distance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `night_ride` int(11) DEFAULT NULL,
  `driver_percent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_percent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_percent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_ride_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `paid_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star_rating` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `extra_ride_fee` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waiting_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offline_pay_franchise` int(11) DEFAULT NULL,
  `offline_pay_franchisedt` date DEFAULT NULL,
  `offline_pay_admin` int(11) DEFAULT NULL,
  `offline_pay_admindt` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ride_booking_histories`
--

CREATE TABLE `ride_booking_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booked_at` timestamp NULL DEFAULT NULL,
  `booked_date` date DEFAULT NULL,
  `from_latitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_longitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_latitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_longitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `distance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fare` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `night_ride` int(11) DEFAULT NULL,
  `driver_percent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_percent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_percent` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_ride_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_ride_fee` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waiting_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `paid_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star_rating` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `offline_pay_franchise` int(11) DEFAULT NULL,
  `offline_pay_franchisedt` date DEFAULT NULL,
  `offline_pay_admin` int(11) DEFAULT NULL,
  `offline_pay_admindt` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `description` varchar(6000) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `status` bigint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Digital Marketing', '<p>Digital marketing is on the path of becoming the core element of every successful business that exists.Hence, the significance of digital marketing cannot be denied by any smart businessman.</p>\r\n\r\n<p>As the best digital marketing company in Kerala, we can take your company to heights, giving you greater online visibility, branding, traffic, and leads which results in more sales. Reaching a larger audience and the right audience is what can help you achieve that.</p>', '1660720362.jpg', 1, '2022-08-16 20:12:42', '2022-08-18 13:39:39'),
(7, 'Search Engine Optimization', '<p>In an increasingly connected world and a crowded market, how can your brand get the visibility it needs? With Google unleashing algorithm updates by the thousands every year and a constantly evolving landscape, SEO is not just about achieving a top page ranking, it&rsquo;s about sustaining that position. &nbsp;Are you wondering how to get more traffic, sales, and profits for your business through your website? Effective SEO strategies are the key to this. Ambiers is the Best SEO Company in Kerala that helps businesses boost their growth through advanced SEO techniques.</p>\r\n\r\n<p>Under our SEO services, we optimize the content of your website in the most effective way.The motive of our SEO service is to help your website rank in search results.Our SEO includes full-fledged content marketing, link-building process, analysis and reporting..</p>', '1660720457.jpg', 1, '2022-08-16 20:14:17', '2022-08-16 20:18:58'),
(8, 'Social Media Marketing', '<p>Social Media empowers you to reach your target audience on various platforms for different purposes such as - career building platforms like Linkedin, general socializing like Facebook, Instagram or absolute content-driven like Twitter. Social media marketing is the use of these social media platforms to connect with the relevant audience to.</p>\r\n\r\n<p>Social media is considered the second-most effective form of digital marketing, yet more than one-third of businesses have no social media presence at all. This is largely due to small businesses not having the time or resources to invest in social media marketing.Organic growth with targeted campaigning helps you increase brand impact in global communities. We will help you make a difference to the world on social media with our work.</p>\r\n\r\n<p>We offer extensive SMM services tailored for your unique requirements, with the ability to induce significant changes in the shortest time possible. We&rsquo;re capable of thinking from the client&rsquo;s perspective and offer the latest trends in SMM to help you stay on top of your game.</p>', '1660720487.jpg', 1, '2022-08-16 20:14:47', '2022-08-16 20:20:00'),
(9, 'Google Ads', '<p>If you want to reach new customers online, then advertising with Google Ads might be right for you.Google Ads is a product that you can use to promote your business, help sell products or services, raise awareness, and increase traffic to your website.Online advertising lets you target your ads to the type of customers you want, and filter out those you don&#39;t. When you advertise online with Google Ads, you can use different targeting methods to reach potential customers right when they&#39;re searching for your products or services.</p>', '1660720513.jpg', 1, '2022-08-16 20:15:13', '2022-08-16 20:20:44'),
(10, 'Graphic Designing', '<p>The goal of our graphic design wizards is to dazzle with design and make every creation beautiful. Every single creative follows the theme and style guide of your brand.</p>\r\n\r\n<p>Our core team of graphic designers has the necessary skills, expertise, and creativity to bring out awesome designs for you. Our team also actively engages in learning and upskilling themselves to stay the best always.</p>', '1660720531.jpg', 1, '2022-08-16 20:15:31', '2022-08-29 12:20:20'),
(11, 'Website Designing', '<p>A website is a branding tool, a business device, and a destination to drive client conversions. A visually appealing website acts as an accelerator for your business growth, whereas a poor website can harm the brand image, affecting the lead conversions in the process.With several years of experience, we at Ambiers the website development company in Kerala, create just the perfect websites for your business to flourish and grow like never before. We are one of the best web development companies in Kerala, with a special emphasis on compelling visual hierarchy and immaculate user experience to drive high-ranking outcomes.</p>\r\n\r\n<p>If you are looking for a simple yet creative basic type of website, then Static Website is for your business. With fixed pages and content, these websites are the quickest to create and are up and running the very next day. The pages are coded in HTML and are easily manageable by non-tech users.</p>\r\n\r\n<p>Unlike a static website, dynamic websites are functional and technically coded with scripting languages such as JavaScript, PHP, or ASP. These websites are designed to rely on both the client-side and server-side. These websites are more interactive, complex as well as versatile in terms of building and design.</p>\r\n\r\n<p>If you are running a company or a business either on a small scale or on a large scale, it is important to create an online image as well for the success of your business. Web designing is one such step on the ladder to your success. When you are creating an online portal for your business, it means that you want your business to grow and be available to users all round the clock.</p>', '1660720567.jpg', 1, '2022-08-16 20:16:07', '2022-08-16 20:22:38'),
(12, 'App Development', '<p>In a world dominated by portable mobile devices,it can be difficult to find the finest mobile app development firm in Kannur to design your app. A necessary consideration is having a mobile application for your company.</p>\r\n\r\n<p>Android app development offers tremendous strategic and operational benefits. Therefore, regardless of their size, businesses are leveraging android app development to grow their business and improve their revenues.</p>\r\n\r\n<p>The skilled experts have several years of expertise to develop any complex app with advanced features. Being the leading mobile app development company in Kerala, we have successfully delivered 20+ projects. Our clients are happy to receive their products on time with unique solutions.</p>', '1661753274.jpg', 1, '2022-08-29 13:07:54', '2022-08-30 23:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `country_id`) VALUES
(10, 'KERALA', 105);

-- --------------------------------------------------------

--
-- Table structure for table `unfinished_bookings`
--

CREATE TABLE `unfinished_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booked_at` timestamp NULL DEFAULT NULL,
  `booked_date` date DEFAULT NULL,
  `from_latitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_longitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_latitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_longitude` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_location` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `distance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `franchise` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fare` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `night_ride` int(10) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `paid_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_status` int(11) DEFAULT NULL,
  `total_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `started_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_categories`
--

CREATE TABLE `vehicle_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_type` int(11) NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) NOT NULL,
  `type` bigint(20) NOT NULL,
  `model` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(100) DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fare` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_fare` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_distance` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ride_tax` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_profit` int(11) DEFAULT NULL,
  `div_profit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_ride` int(11) DEFAULT NULL,
  `timefrom` time DEFAULT NULL,
  `timeto` time DEFAULT NULL,
  `sp_charge` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(20) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_drivers`
--
ALTER TABLE `active_drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_registrations`
--
ALTER TABLE `customer_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disability_documents`
--
ALTER TABLE `disability_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_account_renewals`
--
ALTER TABLE `driver_account_renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_deactivate_histories`
--
ALTER TABLE `driver_deactivate_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_docs_reuploads`
--
ALTER TABLE `driver_docs_reuploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_document_histories`
--
ALTER TABLE `driver_document_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_id_regenerations`
--
ALTER TABLE `driver_id_regenerations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_primary_documents`
--
ALTER TABLE `driver_primary_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_profile_rejections`
--
ALTER TABLE `driver_profile_rejections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_reactivate_requests`
--
ALTER TABLE `driver_reactivate_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_registrations`
--
ALTER TABLE `driver_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_reg_fees`
--
ALTER TABLE `driver_reg_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_renewal_histories`
--
ALTER TABLE `driver_renewal_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_salaries`
--
ALTER TABLE `driver_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_secondary_documents`
--
ALTER TABLE `driver_secondary_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fare_histories`
--
ALTER TABLE `fare_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchise_details`
--
ALTER TABLE `franchise_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchise_renewals`
--
ALTER TABLE `franchise_renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchise_salaries`
--
ALTER TABLE `franchise_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rides_bookings`
--
ALTER TABLE `rides_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride_booking_histories`
--
ALTER TABLE `ride_booking_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unfinished_bookings`
--
ALTER TABLE `unfinished_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_drivers`
--
ALTER TABLE `active_drivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_registrations`
--
ALTER TABLE `customer_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disability_documents`
--
ALTER TABLE `disability_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `driver_account_renewals`
--
ALTER TABLE `driver_account_renewals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_deactivate_histories`
--
ALTER TABLE `driver_deactivate_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_docs_reuploads`
--
ALTER TABLE `driver_docs_reuploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_document_histories`
--
ALTER TABLE `driver_document_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_id_regenerations`
--
ALTER TABLE `driver_id_regenerations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_primary_documents`
--
ALTER TABLE `driver_primary_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_profile_rejections`
--
ALTER TABLE `driver_profile_rejections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_reactivate_requests`
--
ALTER TABLE `driver_reactivate_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_registrations`
--
ALTER TABLE `driver_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_reg_fees`
--
ALTER TABLE `driver_reg_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_renewal_histories`
--
ALTER TABLE `driver_renewal_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_salaries`
--
ALTER TABLE `driver_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_secondary_documents`
--
ALTER TABLE `driver_secondary_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fare_histories`
--
ALTER TABLE `fare_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise_details`
--
ALTER TABLE `franchise_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise_renewals`
--
ALTER TABLE `franchise_renewals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise_salaries`
--
ALTER TABLE `franchise_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rides_bookings`
--
ALTER TABLE `rides_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ride_booking_histories`
--
ALTER TABLE `ride_booking_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unfinished_bookings`
--
ALTER TABLE `unfinished_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
