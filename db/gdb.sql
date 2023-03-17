-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2023 at 11:04 PM
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

--
-- Dumping data for table `active_drivers`
--

INSERT INTO `active_drivers` (`id`, `dr_id`, `dr_code`, `driver_id`, `vehicle_category`, `vehicle_type`, `vehicle_model`, `franchise`, `availability_status`, `status`, `created_at`, `updated_at`, `offlined_at`, `ride_status`, `latitude`, `longitude`) VALUES
(1, 1, 1001, 'GK1001', 2, 1, 0, 1, 1, 1, '2023-01-29 02:03:18', '2023-03-17 08:22:04', '2023-01-29 02:03:18', 0, '11.877225', '75.3699867'),
(2, 2, 1002, 'GK1002', 2, 1, 0, 1, 0, 1, '2023-02-14 11:55:32', '2023-02-14 11:55:32', '2023-02-14 11:55:32', 0, NULL, NULL),
(3, 4, 1003, 'GK1003', 1, 2, 0, 1, 0, 1, '2023-02-26 17:58:45', '2023-03-13 21:07:06', '2023-02-26 17:58:45', 1, NULL, NULL),
(4, 12, 1004, 'GK1004', 1, 2, 0, 1, 1, 1, '2023-03-08 18:56:04', '2023-03-17 17:57:36', '2023-03-08 18:56:04', 0, '11.9708492', '75.3116056'),
(20, 14, 1005, 'GK1005', 2, 1, 0, 1, 0, 1, '2023-03-11 15:54:21', '2023-03-11 15:54:21', '2023-03-11 15:54:21', 0, NULL, NULL),
(21, 15, 1006, 'GK1006', 2, 1, 0, 1, 0, 1, '2023-03-11 17:36:52', '2023-03-11 17:36:52', '2023-03-11 17:36:52', 0, NULL, NULL);

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

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `photo`, `visibleto_driver`, `visibleto_passenger`, `visibleto_franchise`, `valid_from`, `valid_to`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ad1', 'advertisements/1672887775.jpg', 1, 1, 1, '2022-12-11', '2023-03-28', 1, '2022-12-11 07:30:49', '2023-03-08 19:02:32'),
(2, 'Ad2', 'advertisements/1672887844.jpg', 1, 0, 1, '2023-01-02', '2023-03-28', 1, '2022-12-11 07:50:34', '2023-03-03 14:35:25'),
(3, 'Ad3', 'advertisements/1672887899.jpg', 1, 1, 1, '2022-12-11', '2023-03-29', 1, '2022-12-11 07:51:03', '2023-03-08 19:02:50'),
(4, 'Ad4', 'advertisements/1670745083.jpeg', 1, 1, 1, '2022-12-11', '2022-12-31', 2, '2022-12-11 07:51:23', '2022-12-11 12:00:52'),
(6, 'New ad', 'advertisements/1677048151.jpg', 1, 1, 1, '2023-02-22', '2023-02-22', 1, '2023-02-22 19:12:31', '2023-02-22 19:16:39'),
(7, 'fist ad', 'advertisements/1677412254.png', 1, 1, 0, '2023-02-26', '2023-02-28', 1, '2023-02-27 00:20:54', '2023-02-27 00:22:11'),
(8, 'naamonn nammalkk otta manass', 'advertisements/1677511762.jpg', 0, 0, 1, '2023-02-27', '2023-02-27', 1, '2023-02-28 03:59:22', '2023-02-28 03:59:22'),
(9, 'congrats mr. nihal', 'advertisements/1677512048.jpg', 0, 0, 1, '2023-02-27', '2023-02-27', 1, '2023-02-28 04:04:08', '2023-02-28 04:04:08');

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

--
-- Dumping data for table `customer_registrations`
--

INSERT INTO `customer_registrations` (`id`, `name`, `mobile`, `reference`, `device_key`, `login_otp`, `otp_expiry`, `disability_status`, `disability_document`, `status`, `block_reason`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'arun', '9562218794', NULL, 'fYYskekuT-umimlVA9816N:APA91bHQLt6fy9Hy3Jv2yYksYF18d9N-KN2huBPEJ93U1oAeB_vayjkFyDs1KLcL5AzKEY7oY5-YhNLKB5Axva7BakLePh1qdaEgjDNj2xtjcCydSpXta26ayiTVOVlwla9zcv5Og9rI', '', NULL, 0, NULL, 1, NULL, NULL, '2023-01-28 14:36:18', '2023-03-17 17:55:09'),
(2, 'sachin', '7559913368', NULL, 'eLj-rerVQRG6Y9G3vdVgYL:APA91bGMJxpFwRN3jCWxQy-f5O2LEqOfCV_dp2Jhm4_4VckGdA0CE1g-tK6_FI6XGcG-g7niQSvPIXqimEZss_an_y-9QVB5qSGMAhDaB_UD59WbpZHhVgsXTGrSrZ4JTh5WVwNbqwON', '', NULL, 0, NULL, 1, NULL, NULL, '2023-02-17 17:38:59', '2023-03-17 17:02:14'),
(3, 'Riyas', '9846507050', NULL, 'eoubpZq9Q_uj_7O0NWu7XM:APA91bGtmmEzlbZbYNr61McmLKy2pr5Ao0-T8i1RBziT3jzm2URYbB9uK3CFmnHCet16vkd7QFhw1gO-NhDdiL-K-cBYa91OzT5rJriesUtL_3OkjYey9PYFxb5UQoRfVJ3DYR9wJtqE', '', NULL, 0, NULL, 1, NULL, NULL, '2023-02-17 18:09:09', '2023-02-26 17:20:39'),
(4, 'Riyas', '9562832282', NULL, 'exTXk2MUTKWXAs_GUiuCue:APA91bFj8IkUtZtRC_nBUauLzUBVJL3LZKDT8KQCcsovSHHkMy0xZ-i3diWCTG6NSJy9ZMOIulscmaHMpZvaYiQ9dm9e3avM-m3autVHUAAKi3FZQUD4fOllgLVsqY0uh0Ib_M_6mRaP', '', NULL, 0, NULL, 1, NULL, NULL, '2023-02-17 23:02:49', '2023-03-15 07:56:27'),
(5, 'test', '6238051008', NULL, 'fOufeXMuQBmVrVNnRykCoF:APA91bGG8UBcX5_nn1X8O9gcIEMQLkwamNfbUzPobsjuBsoDte_71yWzwTJPQrV833MDuGdEqIfr8GmWUG5zt-9QZXf_OdqDwMWXX5qi2XwMy19W2KuDNK_gQEuKsTsH7HO6brYUY_HP', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-10 22:37:59', '2023-03-10 22:38:25'),
(6, 'sreerag kk', '9037402492', NULL, 'egZiGhrKQBmN7NnWIB6vrW:APA91bFHN2rh3nNq-Mk0NmznlzDVR2jGv_jThIiXDmLb-EeRTeu93BHLPduNdv_eecLSjgtt6xgenz8gTIyXW100voTL6mrg-9barvERSim0TbgcMQbpWu5n6Vhy6GTXJFPw9rkzLb4y', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-12 00:39:26', '2023-03-13 00:25:36'),
(7, 'an', '9946718230', NULL, 'c9tFzH4dSFmTBtFdssw1BB:APA91bEhJq5yA17UgRERCkRrhJHeQKyY0qmEYgFxfSCf4YS9quxwoH-WRYae7Siod87nhAq6Nq0dAfYjs871da8gE14WSO5UIUZZdF54WyFHk_E1cVisask2EDdFlNF5te4gTUc-5V9p', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-13 19:58:47', '2023-03-13 20:14:21');

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

--
-- Dumping data for table `driver_docs_reuploads`
--

INSERT INTO `driver_docs_reuploads` (`id`, `driver_id`, `franchise`, `doc_type`, `doc_file`, `doc_upload_status`, `doc_approval_status`, `doc_rejection_reason`, `franchise_approval`, `admin_approval`, `admin_reject_reason`, `doc_expiry`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '/vehicle_rc/1676614956.txt', 1, 0, '', 0, 0, '', NULL, 0, '2023-02-17 18:52:36', '2023-02-17 18:52:36');

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

--
-- Dumping data for table `driver_id_regenerations`
--

INSERT INTO `driver_id_regenerations` (`id`, `driver_id`, `regenerated_at`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-30', 'First time creation.', '2023-01-30 14:14:50', '2023-01-30 14:14:50'),
(2, 1, '2023-01-30', 'wewe', '2023-01-30 14:23:43', '2023-01-30 14:23:43'),
(3, 1, '2023-01-30', 'weeww', '2023-01-30 14:24:56', '2023-01-30 14:24:56'),
(4, 1, '2023-01-30', 'teter', '2023-01-30 14:28:00', '2023-01-30 14:28:00'),
(5, 1, '2023-01-30', 'sffsfse', '2023-01-30 14:30:30', '2023-01-30 14:30:30'),
(6, 1, '2023-01-30', 'dweww', '2023-01-30 14:32:53', '2023-01-30 14:32:53'),
(7, 1, '2023-01-31', 'wddwe', '2023-01-31 14:13:59', '2023-01-31 14:13:59'),
(8, 1, '2023-01-31', 'wdwewerw', '2023-01-31 14:18:14', '2023-01-31 14:18:14'),
(9, 1, '2023-01-31', 'werw', '2023-01-31 14:20:00', '2023-01-31 14:20:00'),
(10, 1, '2023-01-31', 'sfsfsf', '2023-01-31 14:21:11', '2023-01-31 14:21:11'),
(11, 1, '2023-01-31', 'wewww', '2023-01-31 14:24:46', '2023-01-31 14:24:46'),
(12, 1, '2023-01-31', 'wewe', '2023-01-31 14:26:12', '2023-01-31 14:26:12'),
(13, 1, '2023-01-31', 'wewweew', '2023-01-31 14:26:48', '2023-01-31 14:26:48'),
(14, 1, '2023-01-31', 'wwerew', '2023-01-31 14:27:31', '2023-01-31 14:27:31'),
(15, 1, '2023-01-31', 'wewwrwerw', '2023-01-31 14:29:11', '2023-01-31 14:29:11'),
(16, 1, '2023-01-31', 'ergrgrtgrt', '2023-01-31 14:31:20', '2023-01-31 14:31:20'),
(17, 1, '2023-01-31', 'seferer', '2023-01-31 14:32:22', '2023-01-31 14:32:22'),
(18, 1, '2023-01-31', 'wewwrw', '2023-01-31 14:33:19', '2023-01-31 14:33:19'),
(19, 1, '2023-01-31', 'ewretert', '2023-01-31 14:36:54', '2023-01-31 14:36:54'),
(20, 1, '2023-01-31', 'wrwerte', '2023-01-31 14:38:05', '2023-01-31 14:38:05'),
(21, 1, '2023-01-31', 'wetett', '2023-01-31 14:39:06', '2023-01-31 14:39:06'),
(22, 1, '2023-01-31', 'grrtyryrty', '2023-01-31 14:40:05', '2023-01-31 14:40:05'),
(23, 1, '2023-01-31', 'ewww', '2023-01-31 14:41:11', '2023-01-31 14:41:11'),
(24, 1, '2023-01-31', 'sffsfs', '2023-01-31 14:42:13', '2023-01-31 14:42:13'),
(25, 1, '2023-01-31', 'wewere', '2023-01-31 14:43:16', '2023-01-31 14:43:16'),
(26, 1, '2023-01-31', 'ewewe', '2023-01-31 14:44:07', '2023-01-31 14:44:07'),
(27, 1, '2023-01-31', 'eereert', '2023-01-31 14:44:57', '2023-01-31 14:44:57'),
(28, 1, '2023-01-31', 'wwewrwe', '2023-01-31 14:45:35', '2023-01-31 14:45:35'),
(29, 1, '2023-01-31', 'wewwfw', '2023-01-31 14:46:28', '2023-01-31 14:46:28'),
(30, 1, '2023-01-31', 'wewfwewf', '2023-01-31 14:47:20', '2023-01-31 14:47:20'),
(31, 1, '2023-01-31', 'ssfsfsf', '2023-01-31 14:48:10', '2023-01-31 14:48:10'),
(32, 1, '2023-01-31', 'sfsdfsfs', '2023-01-31 14:48:54', '2023-01-31 14:48:54'),
(33, 1, '2023-01-31', 'adasdada', '2023-01-31 14:49:35', '2023-01-31 14:49:35'),
(34, 1, '2023-01-31', 'wewwe', '2023-01-31 14:50:04', '2023-01-31 14:50:04'),
(35, 1, '2023-01-31', 'weewewew', '2023-01-31 14:50:42', '2023-01-31 14:50:42'),
(36, 1, '2023-01-31', 'wewrwerw', '2023-01-31 14:52:25', '2023-01-31 14:52:25'),
(37, 1, '2023-01-31', 'ewfwfwfw', '2023-01-31 14:53:19', '2023-01-31 14:53:19'),
(38, 1, '2023-01-31', 'feferer', '2023-01-31 14:54:04', '2023-01-31 14:54:04'),
(39, 1, '2023-01-31', 'aasdada', '2023-01-31 14:54:58', '2023-01-31 14:54:58'),
(40, 1, '2023-01-31', 'aadasds', '2023-01-31 14:55:36', '2023-01-31 14:55:36'),
(41, 1, '2023-01-31', 'werwrewr', '2023-01-31 14:56:13', '2023-01-31 14:56:13'),
(42, 1, '2023-01-31', 'wefwfwfw', '2023-01-31 14:56:51', '2023-01-31 14:56:51'),
(43, 1, '2023-01-31', 'sdfsdf', '2023-01-31 14:57:28', '2023-01-31 14:57:28'),
(44, 1, '2023-01-31', 'afafafas', '2023-01-31 14:58:17', '2023-01-31 14:58:17'),
(45, 1, '2023-01-31', 'adadsad', '2023-01-31 14:59:17', '2023-01-31 14:59:17'),
(46, 1, '2023-01-31', 'sdfsdfsdfs', '2023-01-31 14:59:59', '2023-01-31 14:59:59'),
(47, 2, '2023-02-14', 'First time creation.', '2023-02-14 14:34:28', '2023-02-14 14:34:28'),
(48, 4, '2023-03-11', 'First time creation.', '2023-03-11 15:58:05', '2023-03-11 15:58:05'),
(49, 14, '2023-03-11', 'First time creation.', '2023-03-11 15:59:06', '2023-03-11 15:59:06'),
(50, 4, '2023-03-15', 'fghjk', '2023-03-16 02:40:25', '2023-03-16 02:40:25');

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

--
-- Dumping data for table `driver_primary_documents`
--

INSERT INTO `driver_primary_documents` (`id`, `driver_id`, `franchise`, `license_frontfile`, `license_backfile`, `license_number`, `license_expiry`, `licensefront_approval_status`, `licensefront_upload_status`, `licensefront_rejection_reason`, `licenseback_approval_status`, `licenseback_upload_status`, `licenseback_rejection_reason`, `rc_file`, `rc_number`, `rc_expiry`, `rc_approval_status`, `rc_upload_status`, `rc_rejection_reason`, `insurance_file`, `insurance_expiry`, `insurance_approval_status`, `insurance_upload_status`, `insurance_rejection_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '/driver_license/front1674957448.pdf', '/driver_license/back1674957473.pdf', '12/25/14521', '2023-05-28', 1, 1, '', 1, 1, '', '/vehicle_rc/1674957496.pdf', 'KL 13 A 4526', '2023-07-26', 1, 1, '', '/vehicle_insurance/1674957512.pdf', '2023-07-27', 1, 1, '', 1, '2023-01-28 14:34:37', '2023-01-29 02:03:20'),
(2, '2', 1, '/driver_license/front1676298156.pdf', '/driver_license/back1676298156.pdf', 'adasdasd', '2023-06-30', 1, 1, '', 1, 1, '', '/vehicle_rc/1676372456.pdf', '35353', '2023-05-31', 1, 1, '', '/vehicle_insurance/1676298156.pdf', '2023-08-31', 1, 1, '', 1, '2023-02-13 01:49:50', '2023-02-14 11:55:32'),
(3, '3', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-02-20 22:38:46', '2023-02-20 22:38:46'),
(4, '4', 1, '/driver_license/front1677339539.jpg', '/driver_license/back1677339539.jpg', 'hjgjk', '2023-03-04', 1, 1, '', 1, 1, '', '/vehicle_rc/1677339539.jpg', 'gjhgh', '2023-05-06', 1, 1, '', '/vehicle_insurance/1677339539.jpg', '2023-03-23', 1, 1, '', 1, '2023-02-26 04:07:37', '2023-02-26 17:58:45'),
(5, '5', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-02-26 18:48:03', '2023-02-28 03:41:48'),
(6, '6', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-02-27 00:07:40', '2023-02-27 00:07:40'),
(7, '7', 1, '/driver_license/front1677511142.jpg', '/driver_license/back1677511142.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1677511142.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1677511142.jpg', NULL, 0, 1, NULL, 0, '2023-02-28 03:47:27', '2023-02-28 03:49:02'),
(8, '9', 1, '/driver_license/front1677647828.jpg', '/driver_license/back1677647828.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1677647828.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1677647828.jpg', NULL, 0, 1, NULL, 0, '2023-03-01 17:46:08', '2023-03-01 17:47:08'),
(9, '10', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 2, '2023-03-02 04:45:40', '2023-03-02 04:49:25'),
(10, '8', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-03 18:13:34', '2023-03-03 18:13:34'),
(11, '11', 1, '/driver_license/front1677822571.jpg', '/driver_license/back1677822571.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1677822571.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1677822571.jpg', NULL, 0, 1, NULL, 0, '2023-03-03 18:18:20', '2023-03-03 18:19:31'),
(12, '12', 1, '/driver_license/front1678256302.jpg', '/driver_license/back1678256004.jpg', 'KL 13 AU 1452', '2023-05-31', 1, 1, '', 1, 1, '', '/vehicle_rc/1678256023.jpg', '5646544', '2023-05-30', 1, 1, '', '/vehicle_insurance/1678256040.jpg', '2023-05-31', 1, 1, '', 1, '2023-03-08 17:59:33', '2023-03-08 18:56:04'),
(13, '13', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-08 18:06:16', '2023-03-08 18:06:16'),
(14, '14', 1, '/driver_license/front1678463862.jpg', '/driver_license/back1678463862.jpg', 'Hahajaj', '2023-07-08', 1, 1, '', 1, 1, '', '/vehicle_rc/1678463862.jpg', 'Hshs', '2023-07-07', 1, 1, '', '/vehicle_insurance/1678463862.jpg', '2023-05-19', 1, 1, '', 1, '2023-03-11 04:26:38', '2023-03-11 15:54:21'),
(15, '15', 1, '/driver_license/front1678510844.jpg', '/driver_license/back1678510844.jpg', 'gdfdfg', '2023-07-12', 1, 1, '', 1, 1, '', '/vehicle_rc/1678510844.jpg', 'trtert', '2023-07-04', 1, 1, '', '/vehicle_insurance/1678510844.jpg', '2023-03-28', 1, 1, '', 1, '2023-03-11 17:30:10', '2023-03-11 17:36:52'),
(16, '16', 1, '/driver_license/front1678694561.jpg', NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-13 20:32:18', '2023-03-13 20:32:41'),
(17, '17', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-14 22:54:15', '2023-03-14 22:54:15'),
(18, '18', 1, '/driver_license/front1678950593.jpg', '/driver_license/back1678950593.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1678950593.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1678950593.jpg', NULL, 0, 1, NULL, 0, '2023-03-16 19:38:15', '2023-03-16 19:39:53'),
(19, '20', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-16 20:08:13', '2023-03-16 20:08:13'),
(20, '19', 1, '/driver_license/front1678952607.jpg', '/driver_license/back1678952607.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1678952607.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1678952607.jpg', NULL, 0, 1, NULL, 0, '2023-03-16 20:08:58', '2023-03-16 20:13:27'),
(21, '23', 1, '/driver_license/front1678953752.jpg', '/driver_license/back1678953752.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1678953752.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1678953752.jpg', NULL, 0, 1, NULL, 0, '2023-03-16 20:30:41', '2023-03-16 20:33:40');

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

--
-- Dumping data for table `driver_profile_rejections`
--

INSERT INTO `driver_profile_rejections` (`id`, `driver_id`, `profile_type`, `rejected_by`, `rejection_reason`, `rejected_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 'Invalid RC', '2023-02-13', 1, '2023-02-13 14:36:02', '2023-02-13 14:36:02'),
(2, 2, 4, 1, 'Invalid RC', '2023-02-14', 1, '2023-02-14 11:08:30', '2023-02-14 11:08:30'),
(3, 2, 7, 2, 'dadwewerw', '2023-02-14', 1, '2023-02-14 11:52:47', '2023-02-14 11:52:47'),
(4, 12, 3, 1, 'Invalid Driving License (Frontside)', '2023-03-08', 1, '2023-03-08 18:45:56', '2023-03-08 18:45:56');

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

--
-- Dumping data for table `driver_registrations`
--

INSERT INTO `driver_registrations` (`id`, `driver_id`, `device_key`, `name`, `mobile`, `password`, `franchise`, `photo`, `blood_group`, `house_name`, `location`, `district`, `state`, `pin`, `profile_upload_status`, `profile_approval_status`, `profile_reject_reason`, `vehicle_category`, `vehicle_type`, `vehicle_model`, `vehicle_upload_status`, `vehicle_approval_status`, `vehicle_reject_reason`, `status`, `account_reject_reason`, `account_rejected_date`, `login_otp`, `otp_expiry`, `profile_submission`, `admin_approval_status`, `admin_reject_reason`, `admin_rejected_date`, `approved_date`, `valid_from`, `valid_to`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'GK1001', 'exCP0s-oTsyOb4WI8ckG8k:APA91bFONDrE9R1v_Am2D1dtoOfyTNCVmSkzKOwYcGlBZcp0nTJKJhC7fREu9w9g-1hZRckI0jjF8-fVNsbxdS-x3pmIQvN7Rt-TdDzorxONuualU6uJtwX0OjPnRXu74qOP6_kwnniG', 'Riyas', '9562832282', '$2y$10$ycEXfeFM3LxzwccAxNGvwuPwkOSC2CjtjvnaK/I7.tcwPsj8Bqrb2', '1', '/drivers/1674957372.png', 'O+', 'ads', 'dsfsdf', '253', '10', '44444', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '889299', NULL, 1, 2, NULL, NULL, '2023-01-29', '2023-01-29', '2024-01-29', 0, '2023-01-28 14:34:36', '2023-03-17 06:40:49'),
(2, 'GK1002', NULL, 'Arun Kdd', '9562218797', '$2y$10$Py3xCH4IFBlwslSqqZLlPOfdAoA4MdozZDfjtW5tHUVV/7iv50bDa', '1', '/drivers/1676252836.png', 'O+', 'Kannadiparamba', 'dfd', '253', '10', '13323', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '111111', NULL, 1, 2, 'dadwewerw', '2023-02-14', '2023-02-14', '2023-02-14', '2024-02-14', 1, '2023-02-13 01:47:16', '2023-02-14 11:55:32'),
(3, '45646', NULL, 'saneesh', '9995172244', '$2y$10$QC3uQuc4eqIQxKT5L5M6k.5rRj5AOlujLQ26QMqw.vI.K1Mv4mm0u', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '111111', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-02-20 22:38:46', '2023-02-20 22:38:46'),
(4, 'GK1003', NULL, 'muhammed nihal', '9207466884', '$2y$10$LAcFwjTNrGxugJ5ZyD4Ol.n1KL7LTxgFnz62tXCEFFRl0vpb3hOKu', '1', '/drivers/1677339438.jpg', 'o+ve', 'fabinas', 'kazanakotta', '253', '10', '670012', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', NULL, 1, 2, NULL, NULL, '2023-02-26', '2023-02-26', '2024-02-26', 1, '2023-02-26 04:07:18', '2023-02-26 17:58:45'),
(5, '91814', NULL, 'hhh', '9656789098', '$2y$10$U4otEo115cwyeDu3dJGbu.f8ntVPajIVQX3C5.eNqIYvX6LtS3R.S', '1', '/drivers/1677392277.jpg', 'gg', 'dfgg', 'kannur', '253', '10', '670003', 1, 0, '0', 6, 9, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-26 18:47:58', '2023-02-28 03:41:45'),
(6, '82912', 'djfmkXUHS8S1RtwmSo0baS:APA91bGQMHO4Ny8qNP4wK1dP0JP2xudoe1gaWyM_0NOugJTyQzsZ16In3WsVI-vuQmR5Uj36PgDP2T-KhlW0Omu2gQaAxiRtWYoazf2UdekYK7zojd5kd9T9-vy7jrtThTbRaOO3B5pZ', 'sreerag test', '9037402492', '$2y$10$KQ7QqfKisjkZNK0uOn5uCeO.YZUs.pmcxy/MNPcAA6x9W8Xipkl26', '1', '/drivers/1677411451.png', 'O+', 'sreenilayam edakkepuram South kannapuram po cherukunnu', 'edakkepuram', '253', '10', '670301', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', '2023-03-17 18:34:22', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-27 00:07:31', '2023-03-17 18:33:42'),
(7, '41696', NULL, 'niha,', '9858756644', '$2y$10$CSWFdF4bqBcStDGXonOvx.r8zQjGfU4//LV1xK3.qonhRz.4B6sOy', '1', '/drivers/1677511014.jpg', 'o+ve', 'fabinas', 'kaznanakotta', '253', '10', '670012', 1, 1, '', 2, 1, 0, 1, 1, '', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-28 03:46:54', '2023-03-05 02:08:06'),
(8, '86607', NULL, 'mohammed shabeeb', '8129292267', '$2y$10$XpDNZG0pPzL4mxViyNFqK.WM6rQhrqWU842Dk7XwL.W5pV6AY8dgK', '1', '/drivers/1677511702.jpg', 'o+', 'howva nivas', 'thayatheru', '253', '10', '670002', 1, 0, '0', 3, 11, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-28 03:58:23', '2023-02-28 03:58:23'),
(9, '58023', NULL, 'nihal2', '9895297000', '$2y$10$9bEhYYtyUVAm6YwEqwzWWuq4i5DFFAWZclaVEmdS625ZZCNdFGRJy', '1', '/drivers/1677647752.jpg', 'o+ve', 'fabinas2', 'kaznanakotta', '253', '10', '670012', 1, 0, '0', 2, 7, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-01 17:45:52', '2023-03-01 17:47:25'),
(10, '81399', NULL, 'sreerag kk', '7356552492', '$2y$10$UZf3KIpxCS246T5uw.BkSeU5kXJN57v6pjfJhnXQEhigiKQjYhjH2', '1', '/drivers/1677687324.jpg', 'o+', 'abc house', 'kannapuram', '253', '10', '670301', 1, 0, '0', 3, 11, 0, 1, 0, '0', 2, 'abc', '2023-03-01', '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-02 04:45:24', '2023-03-02 04:49:25'),
(11, '25609', NULL, 'haesgt', '9895746677', '$2y$10$plrKaNMTxTFBHC3M/A3Jo.RcIJZNGMu1BdZu9JTEi5UHWPq2Btl/O', '1', '/drivers/1677822492.jpg', 'o+ve', 'nihal', 'kaznanakotta', '253', '10', '670012', 1, 0, '0', 6, 9, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-03 18:18:12', '2023-03-03 18:21:28'),
(12, 'GK1004', 'e20qcoMBR6SDlZZxxHVwvO:APA91bFleVMfPEl_JNfuthlFYSFunA51pB1fh-9p0edyyaP7huPC9GIjv1qt_zBGfhip8VHpEAF0xZhiSvJ-PB0Wr3ZWOnxrqGNbhKp9gUfJl0JUo7cLM-JjQBI_ArYV-pen5AmD1sWI', 'test', '7559913368', '$2y$10$Hdgk3NyQjJZIKDtbNGjUaOzlzD0.BEFOdxC/GquMh9HD//yWjBmbi', '1', '/drivers/1678255926.jpg', 'O+', 'test', 'kannur', '253', '10', '670301', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-17 17:03:27', 1, 2, NULL, NULL, '2023-03-08', '2023-03-08', '2024-03-07', 0, '2023-03-08 17:59:33', '2023-03-17 16:58:48'),
(13, '96643', NULL, 'test', '6238051008', '$2y$10$0RvCIxi7GNGujVLOqLRWDuJHpTKV0cDNKwakT0XWr1uR5dRiGdBga', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '111111', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-08 18:06:16', '2023-03-08 18:06:16'),
(14, 'GK1005', NULL, 'New driver', '9847558099', '$2y$10$bL8wcH8L39Md2fNWvs4xYu0m.c0Ku4rBpcIksDx8pddF.TJxwLFlS', '1', '/drivers/1678463752.jpg', 'O+', 'Test', 'Kannur', '253', '10', '670301', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '', NULL, 1, 2, NULL, NULL, '2023-03-11', '2023-03-11', '2024-03-10', 1, '2023-03-11 04:25:52', '2023-03-11 15:54:21'),
(15, 'GK1006', NULL, 'New user2', '9746077133', '$2y$10$zhUH7hHXVB7.p2RAAOIzfOEGRUGSlScYjF1o4zbR0dzYnjucqkT6e', '1', '/drivers/1678510795.jpg', 'O+', 'test', 'KANNUR', '253', '10', '670301', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '', NULL, 1, 2, NULL, NULL, '2023-03-11', '2023-03-11', '2024-03-10', 1, '2023-03-11 17:29:55', '2023-03-11 17:36:52'),
(16, '58699', NULL, 'ayyappan', '1234567890', '$2y$10$5oLQzzEb2CLQF4cquclULO6kXOVcoh40oJHrVk80VKKVZR22CbQf2', '1', '/drivers/1678694527.jpg', 'o+ve', 'test', 'cc', '260', '10', '691585', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-13 20:32:07', '2023-03-13 20:32:07'),
(17, '65144', NULL, 'ayyappan', '9946718230', '$2y$10$deFdS99R.IGN5DrPsHVkhOfsG39uMkeYtWuFN/HFjmXaOdVGllbqu', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '212600', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-14 22:54:15', '2023-03-14 22:54:15'),
(18, '57213', NULL, 'jiju k', '9895823646', '$2y$10$ugwc9EbZIy3aCM7F77lgHuJCcNyYssTF7k7jevWfDPB9UEB1wXh4W', '1', '/drivers/1678950483.jpg', 'B+', 'karitholil house', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 19:38:03', '2023-03-16 19:40:44'),
(19, '55225', NULL, 'priyankag', '9778269237', '$2y$10$SdX0ZR2tlVgUQ/74fXVUjucl0lhN40ftSGaH6dKFPUCSWKgkbfU7y', '1', '/drivers/1678951734.jpg', 'B +', 'gowri sankaram', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 19:58:54', '2023-03-16 20:14:09'),
(20, '69335', NULL, 'priyankag', '9895636547', '$2y$10$l6c3TxWryEJCEcnn931FV.kA6unifB0ZawwFnMow5LPg3SBHNfEoC', '1', '/drivers/1678951874.jpg', 'B +', 'gowri sankaram', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:01:14', '2023-03-16 20:01:14'),
(21, '90110', NULL, 'priyanka', '9897565678', '$2y$10$tRyNIrDyfvkeDMLKycFCTuTg1FYCwuzTeTNEkppxxcFLXoC7uniDi', '1', '/drivers/1678952264.jpg', 'B+', 'Gowri  sankaram', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:07:44', '2023-03-16 20:07:44'),
(22, '36113', NULL, 'mohandas', '9896754556', '$2y$10$YTS8cbDijDQrQAaMmeO6wezUFo9Mlw.iJnDNIkaOddyzO8ltiznVK', '1', '/drivers/1678953183.jpg', 'B+', 'bhagavathi', 'mangaiore', '252', '10', '575005', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:23:03', '2023-03-16 20:23:03'),
(23, '74303', NULL, 'mohandas', '9896574545', '$2y$10$laB9EemgvaASEHeoqMXl6.YOJ1OcseNYpB9bigDFZHrTTa8Zi.HF2', '1', '/drivers/1678953563.jpg', 'B+', 'mangaiore', 'kaznanakotta', '252', '10', '878799', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:29:23', '2023-03-16 20:34:22');

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

--
-- Dumping data for table `driver_reg_fees`
--

INSERT INTO `driver_reg_fees` (`id`, `type`, `fee`, `status`, `timefrom`, `timeto`, `sp_charge`, `created_at`, `updated_at`) VALUES
(1, 'driver registration fee', '25', 1, NULL, NULL, NULL, '2023-01-24 14:18:35', '2023-02-21 00:51:49'),
(2, 'driver renewal fee', '15', 1, NULL, NULL, NULL, '2023-01-24 14:18:35', '2023-02-21 00:52:23'),
(3, 'driver fare percentage', '80', 1, NULL, NULL, NULL, '2023-01-24 14:24:49', '2023-01-24 14:57:37'),
(4, 'tax', '14', 1, NULL, NULL, NULL, '2023-01-24 14:26:15', '2023-01-24 14:59:49'),
(5, 'Night ride status', '0', 0, '23:00:00', '05:00:00', '2', '2023-01-24 14:29:23', '2023-01-26 14:58:42'),
(6, 'franchise commission', '10', 1, NULL, NULL, NULL, '2023-01-24 14:29:45', '2023-01-24 15:02:40');

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

--
-- Dumping data for table `driver_salaries`
--

INSERT INTO `driver_salaries` (`id`, `driver_id`, `driver_code`, `franchise`, `ride_from`, `ride_to`, `total_ride_fare`, `paid_amount`, `payment_date`, `reference_id`, `remarks`, `status`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, '2023-02-08', '2023-02-08', '130', '130', '2023-02-09 01:43:55', '234232', 'wrwrw', 1, '2023-02-09', '2023-02-09 01:43:55', '2023-02-09 01:43:55');

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

--
-- Dumping data for table `driver_secondary_documents`
--

INSERT INTO `driver_secondary_documents` (`id`, `driver_id`, `franchise`, `pollution_file`, `pollution_expiry`, `pollution_approval_status`, `pollution_upload_status`, `pollution_rejection_reason`, `permit_file`, `permit_expiry`, `permit_approval_status`, `permit_upload_status`, `permit_rejection_reason`, `payment_status`, `payment_date`, `amount`, `reference_id`, `payment_approval_status`, `payment_rejection_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '/pollution_certificate/1674957532.pdf', '2023-06-30', 1, 1, '', '/vehicle_permit/1674957550.pdf', '2023-06-30', 1, 1, '', 1, '2022-12-29', '20', '54545454', 0, NULL, 1, '2023-01-28 14:34:38', '2023-01-29 02:03:21'),
(2, '2', 1, '/pollution_certificate/1676298156.pdf', '2023-04-30', 1, 1, '', '/pollution_certificate/1676298156.pdf', '2023-05-31', 1, 1, '', 1, '2023-02-13', '20', NULL, 0, NULL, 1, '2023-02-13 01:49:50', '2023-02-14 11:55:32'),
(3, '3', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-02-20 22:38:46', '2023-02-20 22:38:46'),
(4, '4', 1, '/pollution_certificate/1677339539.jpg', '2024-02-01', 1, 1, '', '/vehicle_permit/1677339539.jpg', '2024-02-02', 1, 1, '', 1, '2023-02-25', '25', NULL, 0, NULL, 1, '2023-02-26 04:07:37', '2023-02-26 17:58:45'),
(5, '5', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 1, '2023-02-27', '25', NULL, 0, NULL, 0, '2023-02-26 18:48:03', '2023-02-28 03:43:03'),
(6, '6', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 1, '2022-12-29', '25', '54545454', 0, NULL, 0, '2023-02-27 00:07:40', '2023-03-17 18:29:59'),
(7, '7', 1, '/pollution_certificate/1677511142.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1677511142.jpg', NULL, 0, 1, NULL, 1, '0022-04-08', '25', NULL, 0, NULL, 0, '2023-02-28 03:47:27', '2023-02-28 03:53:51'),
(8, '9', 1, '/pollution_certificate/1677647828.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1677647828.jpg', NULL, 0, 1, NULL, 1, '0023-04-05', '25', NULL, 0, NULL, 0, '2023-03-01 17:46:08', '2023-03-01 17:47:25'),
(9, '10', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 2, '2023-03-02 04:45:40', '2023-03-02 04:49:25'),
(10, '8', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-03 18:13:34', '2023-03-03 18:13:34'),
(11, '11', 1, '/pollution_certificate/1677822571.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1677822571.jpg', NULL, 0, 1, NULL, 1, '2023-03-03', '25', NULL, 0, NULL, 0, '2023-03-03 18:18:20', '2023-03-03 18:21:28'),
(12, '12', 1, '/pollution_certificate/1678256062.jpg', '2023-05-31', 1, 1, '', '/vehicle_permit/1678256086.jpg', '2023-05-31', 1, 1, '', 1, '2022-12-29', '25', '54545454', 0, NULL, 1, '2023-03-08 17:59:33', '2023-03-08 18:56:04'),
(13, '13', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-08 18:06:16', '2023-03-08 18:06:16'),
(14, '14', 1, '/pollution_certificate/1678463862.jpg', '2023-07-14', 1, 1, '', '/vehicle_permit/1678463862.jpg', '2023-06-16', 1, 1, '', 1, '2023-03-10', '25', NULL, 0, NULL, 1, '2023-03-11 04:26:38', '2023-03-11 15:54:21'),
(15, '15', 1, '/pollution_certificate/1678510844.jpg', '2023-05-24', 1, 1, '', '/vehicle_permit/1678510844.jpg', '2023-05-30', 1, 1, '', 1, '2023-03-14', '25', NULL, 0, NULL, 1, '2023-03-11 17:30:10', '2023-03-11 17:36:52'),
(16, '16', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-13 20:32:18', '2023-03-13 20:32:41'),
(17, '17', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-14 22:54:15', '2023-03-14 22:54:15'),
(18, '18', 1, '/pollution_certificate/1678950593.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1678950593.jpg', NULL, 0, 1, NULL, 1, '2023-02-05', '25', NULL, 0, NULL, 0, '2023-03-16 19:38:15', '2023-03-16 19:40:44'),
(19, '20', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-16 20:08:13', '2023-03-16 20:08:13'),
(20, '19', 1, '/pollution_certificate/1678952607.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1678952607.jpg', NULL, 0, 1, NULL, 1, '0023-06-06', '25', NULL, 0, NULL, 0, '2023-03-16 20:08:58', '2023-03-16 20:14:09'),
(21, '23', 1, '/pollution_certificate/1678953752.jpg', NULL, 0, 1, NULL, '/pollution_certificate/1678953752.jpg', NULL, 0, 1, NULL, 1, '0923-08-08', '25', NULL, 0, NULL, 0, '2023-03-16 20:30:41', '2023-03-16 20:34:22');

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

--
-- Dumping data for table `fare_histories`
--

INSERT INTO `fare_histories` (`id`, `category`, `type`, `fare`, `service_charge`, `ride_tax`, `div_profit`, `driver_profit`, `sp_charge`, `special_ride`, `timefrom`, `timeto`, `minimum_fare`, `minimum_distance`, `ipaddress`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 20, '10', '5', '0', '100', NULL, 2, NULL, NULL, '100', '3', '', '2023-02-14 03:47:23', '2023-02-14 03:47:23'),
(2, 1, 2, 25, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-03-11 01:46:33', '2023-03-11 01:46:33');

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

--
-- Dumping data for table `franchise_details`
--

INSERT INTO `franchise_details` (`id`, `fid`, `franchise_id`, `remember_token`, `franchise_name`, `franchise_type`, `proprietor_name`, `franchise_mobile`, `franchise_location`, `franchise_state`, `franchise_district`, `photo`, `Landline`, `mail_id`, `password`, `valid_from`, `valid_to`, `status`, `reason`, `blocked_date`, `profit`, `latitude`, `longitude`, `geo_location`, `created_at`, `updated_at`) VALUES
(1, 101, 'FR101', '2sVpgbXPbfv5UDoQc0orwqiEDf7k8w6YSJJlpYcfXh1uiIoNXqHLIlxnafi4', 'abc', 1, 'mohamed shabeeb', '8129292267', 'dfggd', '10', '253', 'franchise/1677512659.jpg', NULL, 'shabeebshabz179@gmail.com', '$2y$10$JTDbD4uSySvwITiv1kwvCeMpWo9tb2hr0dF5yXZps5DqYPJtVKp1W', '2023-01-31', '2023-08-31', 1, 'bad', '2023-01-21', '75', '11.8742184', '75.3703686', 'Location', '2022-12-09 01:41:19', '2023-03-11 01:36:10'),
(2, 102, 'FR102', '', 'ere', 2, 'manu', '2342343424', 'eeferf', '10', '253', 'franchise/1670550368.png', '32242342342', 'wfwefewfe', '$2y$10$JTDbD4uSySvwITiv1kwvCeMpWo9tb2hr0dF5yXZps5DqYPJtVKp1W', '2022-12-31', '2023-04-30', 1, '', '2022-12-09', NULL, '11.258753', '75.780411', 'Location', '2022-12-09 01:46:09', '2023-01-22 03:08:50'),
(3, 103, 'FR103', NULL, 'dada', 1, 'asad', '9562215895', 'dfggd', '10', '253', 'franchise/default.png', 'adsa', 'dgdgdgdf', '$2y$10$5Woq8e8Yfjqpx2XYrNbEyOGzPjv3g1V3382iWJ8f36K6KX7KbVQmu', '2022-12-17', '2022-12-31', 2, 'dsds', '2023-01-21', NULL, '0', '0', '', '2022-12-17 01:44:52', '2023-01-21 05:57:18'),
(4, 104, 'FR104', NULL, 'wew', 2, 'wew', '2342343424', 'dfggd', '10', '256', 'franchise/default.png', NULL, 'dgdgdgdf', '$2y$10$zazgnyQi5roft6e0fZ0Bdeeiinsgukv3laAvuq6tQakC4yCvimwzW', '2023-01-21', '2024-01-21', 1, '0', '2023-01-21', NULL, '2342343432', '2322', 'Location', '2023-01-21 06:10:32', '2023-01-21 06:10:32'),
(5, 105, 'FR105', NULL, 'qwe', 2, 'fsfswf', '9865325689', 'sfsf', '10', '254', 'franchise/default.png', NULL, 'dsffsw', '$2y$10$23qrU7B0LvFYBAPwdMkla.PrtF7alnGWOZDUTJ2IccNzllGAkRs8W', '2023-02-07', '2024-02-07', 1, '0', '2023-02-07', '75', 'qw2132', '1231321', 'Location', '2023-02-07 07:09:16', '2023-02-07 07:09:16'),
(6, 106, 'DIV106', NULL, 'sss', 2, 'bbb', '2346579801', 'kannur', '10', '253', 'franchise/default.png', NULL, 'fdhdf@gmail.com', '$2y$10$FjfH8q8q2nBmAoHsjOEiWO9DY20NFGituwrgPa/aEuERLa0QWqFwe', '2023-02-26', '2024-02-26', 1, '0', '2023-02-26', '20', '12.834174', '79.703644', 'Location', '2023-02-27 00:34:39', '2023-02-27 00:34:39'),
(7, 107, 'DIV107', NULL, 'div', 1, 'sss', '9037402492', 'kannapuram', '10', '253', 'franchise/1677680011.jpg', '09876533', 'kk333sree@gmail.com', '$2y$10$ZqAky/kVhvz2246u3ePs4uORdPJnD9V0yxyaz5Xa17MblSvD/R4dq', '2023-03-01', '2024-02-29', 1, '0', '2023-03-01', '10', '17.1833', '81.4000', 'Location', '2023-03-02 02:43:31', '2023-03-02 02:52:04');

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

--
-- Dumping data for table `franchise_renewals`
--

INSERT INTO `franchise_renewals` (`id`, `fid`, `renew_date`, `valid_from`, `valid_to`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-09', '2022-12-09', '2022-12-31', '2022-12-09 05:35:23', '2022-12-09 05:35:23'),
(2, 2, '2022-12-09', '2022-12-09', '2022-12-01', '2022-12-09 06:25:07', '2022-12-09 06:25:07'),
(3, 2, '2023-01-09', '2022-12-09', '2022-12-31', '2023-01-09 06:47:30', '2023-01-09 06:47:30'),
(4, 1, '2023-02-01', '2023-01-01', '2023-01-31', '2023-02-01 01:25:47', '2023-02-01 01:25:47');

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

--
-- Dumping data for table `franchise_salaries`
--

INSERT INTO `franchise_salaries` (`id`, `franchise`, `ride_from`, `ride_to`, `total_service_charge`, `total_commission`, `paid_amount`, `payment_date`, `submitted_at`, `reference_id`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '2023-02-01', '2023-02-28', '10', '7.5', '7.5', '2023-02-11 03:14:34', '2023-02-11', 'Sdggg', 'ggg', 1, '2023-02-11 03:14:34', '2023-02-11 03:14:34');

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

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('100dd447b524183944d5fa3b4f13b4625c911ed16f485b9837dcb7723a7059b23318c2ce66fa16d4', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 17:55:09', '2023-03-17 17:55:09', '2024-03-17 10:55:09'),
('21dc8bed2f2e04486adce8a95d271a719c009bc3b85d14065f869a194951f48cc38cb47d467165ab', 12, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-16 02:27:45', '2023-03-16 02:27:45', '2024-03-15 19:27:45'),
('294fe9a62fcb77455301536f48236dc720afa9d46d51302480c77233320a113be3db99b93fcdc960', 1, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-13 18:50:07', '2023-03-13 18:50:07', '2024-03-13 11:50:07'),
('2bb6133ba76465556925cdda3b023f472bb5ba062d0190367d66ce7c02215aa8e6a4079344f3f0de', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-16 02:28:53', '2023-03-16 02:28:53', '2024-03-15 19:28:53'),
('39c3862f682d3e4c1f3a59dc485ee595843e0cc1ce5c1fff2db8598d731111400b6137b562f2e78b', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 00:55:23', '2023-03-13 00:55:23', '2024-03-12 17:55:23'),
('437053c4bb2e9c77121f550bbedbc220f4c880b4d1dc106b329f77b3b205c2be4f0e1fca93116488', 12, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-16 01:52:43', '2023-03-16 01:52:43', '2024-03-15 18:52:43'),
('43e808dd8cfd7a71b54025ed22ee8c547fc305cfe033def96446e4161f1c30e8a4a98400847c05f1', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-12 23:49:37', '2023-03-12 23:49:37', '2024-03-12 16:49:37'),
('4486d82c53cb62e2a2902e6304134e3a2fc00295d1756ddfcd8679f0caafda7b5939885031bd81be', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-15 00:12:07', '2023-03-15 00:12:07', '2024-03-14 17:12:07'),
('50d9a16eba8aa87e6936962dcbcb15cf39aa7faaac1610137cc4a3eda5c74555bcd247337a088fa8', 1, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-16 20:27:59', '2023-03-16 20:27:59', '2024-03-16 13:27:59'),
('650383920f46db2d49fab3eddb959f010cfbb84a3de470ac68847f7537da7b34d8a564fdf6fb88f3', 7, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 20:14:21', '2023-03-13 20:14:21', '2024-03-13 13:14:21'),
('7c03964e8d2552822fa91cda9123f359143c3dbbca76f7054605bd0faa4a4fb24809562ad56a8250', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-14 22:46:06', '2023-03-14 22:46:06', '2024-03-14 15:46:06'),
('81d6d88852ea9d40d1d21e2c6f87b771436637fa0dfbf55e36613109d61e9218950d64c80ea0cde3', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-15 07:56:27', '2023-03-15 07:56:27', '2024-03-15 00:56:27'),
('85fac583ffbd691bda45929c0d183379f10521f612387791e2c6a89176e30319927f7cd669ad170d', 1, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-13 00:49:51', '2023-03-13 00:49:51', '2024-03-12 17:49:51'),
('9090b0677897cd2d0f9a153edff7e9c38287c527fba97a2ee8db9d2fe81e19c3073eeef2a600dfde', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 17:02:14', '2023-03-17 17:02:14', '2024-03-17 10:02:14'),
('990cf6466f83085d8df9006a2d4115d52090ed7a71558fdad446e3970921e496520b372d59ebd3b2', 1, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-13 01:15:34', '2023-03-13 01:15:34', '2024-03-12 18:15:34'),
('9fe3b0a29048f248b61a96a762cdd2fa818209429a40b9d45d1391cb96dc5672cb85221bea608c75', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 21:05:59', '2023-03-13 21:05:59', '2024-03-13 14:05:59'),
('d5c7bea0de21d3a1aeb16f9901399a1e6e75256177c70fd36b35cfd4545d497c722c8afb18af0152', 6, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-17 18:29:39', '2023-03-17 18:29:39', '2024-03-17 11:29:39'),
('d64547f46b2f579781e3e7e5a2c7d38554060d7ea5692d5d9462b9005567d1f0725eab5af4f1f8bf', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 17:00:09', '2023-03-17 17:00:09', '2024-03-17 10:00:09'),
('e692d1a6082e15cb4d1d5b328b6d72f74978e0eaef6f5e3f2038a702d3ebd620120e35da8a4d7527', 12, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-17 16:58:48', '2023-03-17 16:58:48', '2024-03-17 09:58:48'),
('e9d0dcff5e50f78b6d9f3279699e5972098f8caead7beeb29b761b3589cef45adf5fdf9f06696d40', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 21:24:28', '2023-03-13 21:24:28', '2024-03-13 14:24:28'),
('ffcf396e8f10044251d5ec41acbb7a88b9563521a44f1f8c31db3d99a9deedf964fa94d670d9e21c', 6, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 00:25:36', '2023-03-13 00:25:36', '2024-03-12 17:25:36');

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
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('karunsabari@gmail.com', 'Xt5zR3d6OrlbbBBdHA6GJsCPkoHUVJwEO9TSN5p0loUvLpsQi82vbzUfUZej2z0k', '2023-03-03 18:40:59');

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

--
-- Dumping data for table `rides_bookings`
--

INSERT INTO `rides_bookings` (`id`, `customer_id`, `booked_at`, `timeout`, `booked_date`, `from_latitude`, `from_longitude`, `from_location`, `to_latitude`, `to_longitude`, `to_location`, `vehicle_type`, `driver_id`, `distance`, `time`, `franchise`, `fare`, `service_charge`, `night_ride`, `driver_percent`, `driver_fare`, `tax_percent`, `tax`, `total_fare`, `franchise_percent`, `franchise_fare`, `admin_fare`, `admin_ride_fare`, `payment_type`, `payment_status`, `payment_date`, `paid_amount`, `reference_id`, `status`, `reason`, `star_rating`, `review`, `started_at`, `completed_at`, `extra_ride_fee`, `waiting_charge`, `offline_pay_franchise`, `offline_pay_franchisedt`, `offline_pay_admin`, `offline_pay_admindt`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-03-16 19:01:05', '2023-03-16 19:02:05', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'reason', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 19:01:05', '2023-03-16 19:01:33'),
(2, 1, '2023-03-16 19:02:19', '2023-03-16 19:23:19', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'reason', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 19:02:19', '2023-03-16 19:05:42'),
(3, 1, '2023-03-16 19:06:47', '2023-03-16 19:22:21', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 19:06:47', '2023-03-16 19:24:01'),
(4, 1, '2023-03-16 19:27:02', '2023-03-16 19:28:02', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 19:27:02', '2023-03-16 19:29:01'),
(5, 1, '2023-03-16 19:30:24', '2023-03-16 19:31:24', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.9387372', '75.4038798', 'Kannadiparamba, Kerala, India', 2, 12, '8.76', '17 mins', '1', '68', '10', 0, '100', '68', '8', '6', '84', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 19:30:24', '2023-03-16 19:32:01'),
(6, 1, '2023-03-16 19:33:02', '2023-03-16 19:34:02', '2023-03-16', '12.035137', '75.3610936', 'Taliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', '10', 0, '100', '136', '8', '12', '158', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 19:33:02', '2023-03-16 19:35:01'),
(7, 4, '2023-03-16 21:57:27', '2023-03-16 21:58:27', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', 1, 1, '2023-03-16 07:00:00', '143', 'pay_LS983X4jf210aD', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:57:27', '2023-03-16 21:59:01'),
(8, 4, '2023-03-16 21:59:20', '2023-03-16 22:00:20', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', 1, 1, '2023-03-16 07:00:00', '143', 'pay_LS99Xg7UiaqAg2', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 21:59:20', '2023-03-16 22:01:01'),
(9, 4, '2023-03-16 22:42:43', '2023-03-16 22:43:43', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 1, '2023-03-16 07:00:00', '143', 'pay_LS9ueU7WcAEzWT', 6, NULL, NULL, NULL, '2023-03-16 22:44:02', '2023-03-16 22:44:37', '0', '0', NULL, NULL, NULL, NULL, '2023-03-16 22:42:43', '2023-03-16 22:44:37'),
(10, 4, '2023-03-16 22:51:17', '2023-03-16 22:52:17', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'reason', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 22:51:17', '2023-03-16 22:56:22'),
(11, 4, '2023-03-17 01:14:42', '2023-03-17 01:15:42', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'reason', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 01:14:42', '2023-03-17 01:36:05'),
(12, 4, '2023-03-17 08:09:00', '2023-03-17 08:10:00', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 08:09:00', '2023-03-17 08:10:01'),
(13, 1, '2023-03-17 17:02:59', '2023-03-17 17:03:59', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 17:02:59', '2023-03-17 17:03:53'),
(14, 2, '2023-03-17 17:47:01', '2023-03-17 17:48:01', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 17:47:01', '2023-03-17 17:47:52'),
(15, 1, '2023-03-17 17:56:33', '2023-03-17 17:57:33', '2023-03-17', '12.035137', '75.3610936', 'Thaliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', '10', 0, '100', '136', '8', '12', '158', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 17:56:33', '2023-03-17 17:57:36');

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

--
-- Dumping data for table `ride_booking_histories`
--

INSERT INTO `ride_booking_histories` (`id`, `bid`, `booking_id`, `customer_id`, `booked_at`, `booked_date`, `from_latitude`, `from_longitude`, `from_location`, `to_latitude`, `to_longitude`, `to_location`, `vehicle_type`, `driver_id`, `distance`, `time`, `franchise`, `fare`, `service_charge`, `night_ride`, `driver_percent`, `driver_fare`, `tax_percent`, `tax`, `total_fare`, `franchise_percent`, `franchise_fare`, `admin_fare`, `admin_ride_fare`, `extra_ride_fee`, `waiting_charge`, `payment_type`, `payment_status`, `payment_date`, `paid_amount`, `reference_id`, `status`, `reason`, `star_rating`, `review`, `started_at`, `completed_at`, `offline_pay_franchise`, `offline_pay_franchisedt`, `offline_pay_admin`, `offline_pay_admindt`, `created_at`, `updated_at`) VALUES
(1, '15', 'GKB15', 1, '2023-03-12 03:27:15', '2023-03-11', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '50', NULL, 6, '', '4', 'good', '2023-03-12 03:37:40', '2023-03-12 03:37:51', NULL, NULL, NULL, NULL, '2023-03-12 03:37:51', '2023-03-12 03:38:06'),
(2, '17', 'GKB17', 1, '2023-03-12 03:48:26', '2023-03-11', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '50', NULL, 6, '', NULL, NULL, '2023-03-12 03:52:41', '2023-03-12 04:01:28', NULL, NULL, NULL, NULL, '2023-03-12 04:01:28', '2023-03-12 04:10:41'),
(3, '26', 'GKB26', 4, '2023-03-13 01:26:56', '2023-03-12', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '143', NULL, 6, '', '5', 'good ride', '2023-03-13 01:28:29', '2023-03-13 01:30:47', NULL, NULL, NULL, NULL, '2023-03-13 01:30:47', '2023-03-13 01:31:07'),
(4, '30', 'GKB30', 6, '2023-03-13 03:42:01', '2023-03-12', '11.9635165', '75.3208107', 'Irinave, Kannapuram, Kerala, India', '11.9886615', '75.3093585', 'Cherukunnu Thara Bus Stop, Payangadi-Valapattanam Road, Kannapuram, Kerala, India', 2, 12, '3.85', '8 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '22', NULL, 6, '', NULL, NULL, '2023-03-13 04:01:07', '2023-03-13 18:22:42', NULL, NULL, NULL, NULL, '2023-03-13 18:22:42', '2023-03-13 18:22:42'),
(5, '31', 'GKB31', 1, '2023-03-13 18:23:00', '2023-03-13', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '50', NULL, 6, '', '3', 'ok', '2023-03-13 18:23:19', '2023-03-13 18:23:22', NULL, NULL, NULL, NULL, '2023-03-13 18:23:22', '2023-03-13 18:23:35'),
(6, '32', 'GKB32', 1, '2023-03-13 18:24:18', '2023-03-13', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '10', '60', NULL, 0, NULL, '50', NULL, 6, '', '2', 'ggg', '2023-03-13 18:24:28', '2023-03-13 18:24:40', NULL, NULL, NULL, NULL, '2023-03-13 18:24:40', '2023-03-13 18:24:49'),
(7, '40', 'GKB40', 4, '2023-03-13 22:16:28', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '143', NULL, 6, '', '4', 'jj', '2023-03-13 22:16:45', '2023-03-13 22:16:51', NULL, NULL, NULL, NULL, '2023-03-13 22:16:51', '2023-03-13 22:16:58'),
(8, '41', 'GKB41', 4, '2023-03-13 22:22:12', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '143', NULL, 6, '', NULL, NULL, '2023-03-13 22:23:00', '2023-03-13 22:23:05', NULL, NULL, NULL, NULL, '2023-03-13 22:23:05', '2023-03-13 22:23:05'),
(9, '42', 'GKB42', 4, '2023-03-13 22:24:09', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '10', '10', NULL, 0, NULL, '143', NULL, 6, '', NULL, NULL, '2023-03-13 22:24:22', '2023-03-13 22:24:52', NULL, NULL, NULL, NULL, '2023-03-13 22:24:52', '2023-03-13 22:24:52'),
(10, '43', 'GKB43', 4, '2023-03-13 22:29:43', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '143', NULL, 6, '', NULL, NULL, '2023-03-13 22:29:53', '2023-03-13 22:29:57', NULL, NULL, NULL, NULL, '2023-03-13 22:29:57', '2023-03-13 22:29:57'),
(11, '50', 'GKB50', 4, '2023-03-13 23:33:55', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '143', NULL, 6, '', NULL, NULL, '2023-03-13 23:34:08', '2023-03-14 02:06:30', NULL, NULL, NULL, NULL, '2023-03-14 02:06:30', '2023-03-14 03:15:59'),
(12, '52', 'GKB52', 1, '2023-03-14 22:43:52', '2023-03-14', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '50', NULL, 6, '', '2', NULL, '2023-03-14 22:44:35', '2023-03-14 22:44:39', NULL, NULL, NULL, NULL, '2023-03-14 22:44:39', '2023-03-14 22:44:43'),
(13, '53', 'GKB53', 4, '2023-03-15 00:17:05', '2023-03-14', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '10', '50', NULL, 0, NULL, '143', NULL, 6, '', '4', 'Good Ride', '2023-03-15 00:17:54', '2023-03-15 00:19:46', NULL, NULL, NULL, NULL, '2023-03-15 00:19:46', '2023-03-15 00:19:58'),
(14, '1', 'GKB1', 1, '2023-03-16 17:36:27', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '10', '5', NULL, 0, NULL, '50', NULL, 6, '', '3', 'good', '2023-03-16 17:37:50', '2023-03-16 17:38:03', NULL, NULL, NULL, NULL, '2023-03-16 17:38:03', '2023-03-16 17:46:42'),
(15, '9', 'GKB9', 4, '2023-03-16 22:42:43', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-16 07:00:00', '143', 'pay_LS9ueU7WcAEzWT', 6, '', NULL, NULL, '2023-03-16 22:44:02', '2023-03-16 22:44:37', NULL, NULL, NULL, NULL, '2023-03-16 22:44:37', '2023-03-16 22:44:37');

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
  `status` int(11) DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unfinished_bookings`
--

INSERT INTO `unfinished_bookings` (`id`, `bid`, `booking_id`, `customer_id`, `booked_at`, `booked_date`, `from_latitude`, `from_longitude`, `from_location`, `to_latitude`, `to_longitude`, `to_location`, `vehicle_type`, `driver_id`, `distance`, `time`, `franchise`, `fare`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, '1', 'GKB1', 1, '2023-03-16 19:01:05', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-11 21:08:01', '2023-03-16 19:01:33'),
(2, '2', 'GKB2', 1, '2023-03-16 19:02:19', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-12 00:57:02', '2023-03-16 19:05:42'),
(3, '3', 'GKB3', 1, '2023-03-16 19:06:47', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 4, 'reason', '2023-03-12 02:21:34', '2023-03-16 19:14:02'),
(4, '4', 'GKB4', 1, '2023-03-16 19:27:02', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 4, 'reason', '2023-03-12 02:22:47', '2023-03-16 19:29:01'),
(5, '5', 'GKB5', 1, '2023-03-16 19:30:24', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.9387372', '75.4038798', 'Kannadiparamba, Kerala, India', 2, 12, '8.76', '17 mins', '1', '68', 4, 'reason', '2023-03-12 03:09:08', '2023-03-16 19:32:01'),
(6, '6', 'GKB6', 1, '2023-03-16 19:33:02', '2023-03-16', '12.035137', '75.3610936', 'Taliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', 4, 'reason', '2023-03-12 03:10:59', '2023-03-16 19:35:01'),
(7, '8', 'GKB8', 4, '2023-03-16 21:59:20', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 4, 'reason', '2023-03-12 03:13:24', '2023-03-16 22:01:01'),
(8, '9', 'GKB9', 4, '2023-03-12 03:13:49', '2023-03-11', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-12 03:15:59', '2023-03-12 03:15:59'),
(9, '7', 'GKB7', 4, '2023-03-16 21:57:27', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 4, 'reason', '2023-03-12 03:19:33', '2023-03-16 21:59:01'),
(10, '10', 'GKB10', 4, '2023-03-16 22:51:17', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-12 03:22:58', '2023-03-16 22:56:22'),
(11, '12', 'GKB12', 4, '2023-03-17 08:09:00', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 4, 'reason', '2023-03-12 03:23:29', '2023-03-17 08:10:01'),
(12, '13', 'GKB13', 1, '2023-03-17 17:02:59', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'Delay on driver arrival', '2023-03-12 03:25:00', '2023-03-17 17:03:53'),
(13, '11', 'GKB11', 4, '2023-03-17 01:14:42', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-12 03:25:56', '2023-03-17 01:36:05'),
(14, '14', 'GKB14', 2, '2023-03-17 17:47:01', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', 3, 'Wrongly requested', '2023-03-12 03:27:06', '2023-03-17 17:47:52'),
(15, '16', 'GKB16', 4, '2023-03-12 03:32:49', '2023-03-11', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-12 03:41:34', '2023-03-12 03:41:34'),
(16, '19', 'GKB19', 1, '2023-03-12 23:05:42', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-12 23:06:24', '2023-03-12 23:06:24'),
(17, '20', 'GKB20', 1, '2023-03-12 23:21:39', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-12 23:22:10', '2023-03-12 23:22:10'),
(18, '21', 'GKB21', 1, '2023-03-12 23:28:51', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-12 23:30:26', '2023-03-12 23:30:26'),
(19, '22', 'GKB22', 1, '2023-03-12 23:30:35', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 2, 'Driver Rejected', '2023-03-12 23:31:37', '2023-03-12 23:31:37'),
(20, '23', 'GKB23', 1, '2023-03-12 23:56:57', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 2, 'Driver Rejected', '2023-03-12 23:59:23', '2023-03-12 23:59:23'),
(21, '24', 'GKB24', 1, '2023-03-13 00:00:38', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-13 00:02:08', '2023-03-13 00:02:08'),
(22, '25', 'GKB25', 6, '2023-03-13 00:27:40', '2023-03-12', '11.9635165', '75.3208107', 'Irinave, Kannapuram, Kerala, India', '12.0041132', '75.3004009', 'Cherukunnu, Kerala, India', 2, 12, '6.17', '13 mins', '1', '42', 2, 'Driver Rejected', '2023-03-13 00:29:26', '2023-03-13 00:29:26'),
(23, '27', 'GKB27', 4, '2023-03-13 01:33:03', '2023-03-12', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-13 01:33:11', '2023-03-13 01:33:11'),
(24, '28', 'GKB28', 4, '2023-03-13 01:33:36', '2023-03-12', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-13 01:33:48', '2023-03-13 01:34:56'),
(25, '29', 'GKB29', 4, '2023-03-13 01:35:24', '2023-03-12', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-13 01:36:01', '2023-03-13 01:36:01'),
(26, '33', 'GKB33', 1, '2023-03-13 20:07:48', '2023-03-13', '11.9842763', '75.3994546', 'Parassinikadavu, Kerala, India', '11.9387372', '75.4038798', 'Kannadiparamba, Kerala, India', 2, 12, '10.12', '18 mins', '1', '81', 3, 'reason', '2023-03-13 20:08:30', '2023-03-13 20:08:30'),
(27, '34', 'GKB34', 1, '2023-03-13 20:41:30', '2023-03-13', '11.9842763', '75.3994546', 'Parassinikadavu, Kerala, India', '11.9387372', '75.4038798', 'Kannadiparamba, Kerala, India', 2, 12, '10.12', '18 mins', '1', '81', 3, 'reason', '2023-03-13 20:44:09', '2023-03-13 20:44:09'),
(28, '36', 'GKB36', 1, '2023-03-13 21:13:15', '2023-03-13', '11.9937839', '75.3674516', 'Bakkalam, Kerala, India', '12.035137', '75.3610936', 'Taliparamba, Kerala, India', 2, 12, '5.97', '11 mins', '1', '40', 3, 'reason', '2023-03-13 21:47:39', '2023-03-13 21:47:39'),
(29, '37', 'GKB37', 4, '2023-03-13 21:55:47', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-13 21:57:49', '2023-03-13 21:57:49'),
(30, '38', 'GKB38', 4, '2023-03-13 22:12:55', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-13 22:13:04', '2023-03-13 22:13:04'),
(31, '39', 'GKB39', 4, '2023-03-13 22:15:29', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-13 22:16:09', '2023-03-13 22:16:09'),
(32, '44', 'GKB44', 4, '2023-03-13 22:42:35', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-13 22:42:48', '2023-03-13 22:42:48'),
(33, '45', 'GKB45', 4, '2023-03-13 22:43:10', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'ppp', '2023-03-13 23:06:04', '2023-03-13 23:06:04'),
(34, '46', 'GKB46', 4, '2023-03-13 23:06:31', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-13 23:06:46', '2023-03-13 23:06:46'),
(35, '47', 'GKB47', 4, '2023-03-13 23:06:56', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-13 23:07:08', '2023-03-13 23:07:08'),
(36, '48', 'GKB48', 4, '2023-03-13 23:07:20', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-13 23:07:28', '2023-03-13 23:07:28'),
(37, '49', 'GKB49', 4, '2023-03-13 23:07:35', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-13 23:07:44', '2023-03-13 23:07:44'),
(38, '51', 'GKB51', 4, '2023-03-14 03:16:06', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-14 03:16:23', '2023-03-14 03:16:23'),
(39, '54', 'GKB54', 4, '2023-03-15 09:26:06', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.4725502', '76.3820088', 'Devala, Tamil Nadu, India', 1, 1, '164.26', '4 hours 32 mins', '1', '3325', 3, 'reason', '2023-03-15 09:26:38', '2023-03-15 09:26:38'),
(40, '55', 'GKB55', 4, '2023-03-15 09:26:46', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.4725502', '76.3820088', 'Devala, Tamil Nadu, India', 1, 1, '164.26', '4 hours 32 mins', '1', '3325', 3, 'reason', '2023-03-15 09:27:11', '2023-03-15 09:27:11'),
(41, '56', 'GKB56', 4, '2023-03-15 09:27:16', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.4725502', '76.3820088', 'Devala, Tamil Nadu, India', 1, 1, '164.26', '4 hours 32 mins', '1', '3325', 3, 'reason', '2023-03-15 09:27:39', '2023-03-15 09:27:39'),
(42, '57', 'GKB57', 4, '2023-03-15 21:19:07', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.4725502', '76.3820088', 'Devala, Tamil Nadu, India', 1, 1, '164.26', '4 hours 32 mins', '1', '3325', 3, 'reason', '2023-03-15 22:23:53', '2023-03-15 22:23:53'),
(43, '58', 'GKB58', 4, '2023-03-15 23:25:09', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-15 23:27:45', '2023-03-15 23:27:45'),
(44, '59', 'GKB59', 4, '2023-03-15 23:28:14', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-16 00:09:46', '2023-03-16 00:09:46'),
(45, '60', 'GKB60', 4, '2023-03-16 00:11:57', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 2, 'Driver Rejected', '2023-03-16 00:13:52', '2023-03-16 00:13:52'),
(46, '61', 'GKB61', 4, '2023-03-16 02:10:42', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', 3, 'reason', '2023-03-16 02:49:37', '2023-03-16 02:49:37'),
(47, '62', 'GKB62', 1, '2023-03-16 04:25:08', '2023-03-15', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', 3, 'reason', '2023-03-16 04:25:16', '2023-03-16 04:25:16'),
(48, '15', 'GKB15', 1, '2023-03-17 17:56:33', '2023-03-17', '12.035137', '75.3610936', 'Thaliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', 3, 'Rash Driving', '2023-03-17 17:57:36', '2023-03-17 17:57:36');

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

--
-- Dumping data for table `vehicle_categories`
--

INSERT INTO `vehicle_categories` (`id`, `category`, `category_type`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Auto', 1, 'vehicle_categories/1670635704.png', 1, '2022-12-10 01:28:24', '2023-02-17 19:14:19'),
(2, 'Car', 1, 'vehicle_categories/1670635726.jpg', 1, '2022-12-10 01:28:46', '2022-12-10 01:28:46'),
(3, 'Pick up', 1, 'vehicle_categories/1676616585.svg', 1, '2023-02-17 19:19:45', '2023-02-17 19:19:45'),
(4, 'Bike', 1, 'vehicle_categories/1676616600.svg', 1, '2023-02-17 19:20:00', '2023-02-17 19:20:00'),
(5, 'scooter', 2, 'vehicle_categories/1677389612.jpg', 2, '2023-02-26 18:03:32', '2023-03-08 00:54:29'),
(6, 'ELECTRIC AUTO', 1, 'vehicle_categories/1677389710.jpg', 2, '2023-02-26 18:05:10', '2023-03-08 00:54:38'),
(7, 'CNG AUTO', 1, 'vehicle_categories/1677389731.jpg', 2, '2023-02-26 18:05:31', '2023-03-08 00:54:45'),
(8, 'bus', 1, 'vehicle_categories/1677412405.png', 2, '2023-02-27 00:23:25', '2023-03-08 00:55:14');

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

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`id`, `category`, `type`, `model`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'aaa', 1, '2022-12-11 13:43:02', '2022-12-11 13:43:02');

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
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `category`, `type`, `fare`, `minimum_fare`, `minimum_distance`, `icon`, `service_charge`, `ride_tax`, `driver_profit`, `div_profit`, `special_ride`, `timefrom`, `timeto`, `sp_charge`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '4 Seater', '20', '100', '3', 'vehicle_types/1670641769.jpg', '10', '5', 100, '0', 2, NULL, NULL, NULL, 1, '2022-12-10 03:09:29', '2023-02-14 03:47:23'),
(2, 1, 'Auto', '10', '30', '5', 'vehicle_types/1672318705.png', '10', '8', 100, '0', 2, NULL, NULL, NULL, 1, '2022-12-29 12:58:25', '2023-03-11 01:46:33'),
(3, 2, '7 seater', '25', '100', '5', 'vehicle_types/1674397631.png', '50', '5', NULL, '75', 2, NULL, NULL, NULL, 1, '2023-01-22 14:27:11', '2023-02-01 13:03:29'),
(7, 2, 'sdfs', '10', '100', '5', 'vehicle_types/1675257863.png', '100', '5', NULL, '75', 2, NULL, NULL, NULL, 1, '2023-02-01 13:24:23', '2023-02-01 13:25:59'),
(8, 2, 'ddd', '10', '20', '5', 'vehicle_types/1675678458.png', '10', '5', 100, '75', 2, NULL, NULL, NULL, 1, '2023-02-06 10:14:18', '2023-02-06 10:27:27'),
(9, 6, 'ELECTRIC AUTO', '12', '30', '3', 'vehicle_types/1677389836.jpg', '30', '19', 95, '0', 2, NULL, NULL, NULL, 1, '2023-02-26 18:07:16', '2023-02-26 18:07:16'),
(10, 8, 'bus', '10', '20', '5', 'vehicle_types/1677412667.png', '20', '15', 100, '0', 1, '07:30:00', '08:30:00', '1.5', 1, '2023-02-27 00:27:47', '2023-02-27 00:27:47'),
(11, 3, 'DOSTH', '3', '3', '3', 'vehicle_types/1677511520.jpg', '3', '19', 2, '0', 2, NULL, NULL, NULL, 1, '2023-02-28 03:55:20', '2023-02-28 03:55:20');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_registrations`
--
ALTER TABLE `customer_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_document_histories`
--
ALTER TABLE `driver_document_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_id_regenerations`
--
ALTER TABLE `driver_id_regenerations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `driver_primary_documents`
--
ALTER TABLE `driver_primary_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `driver_profile_rejections`
--
ALTER TABLE `driver_profile_rejections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver_reactivate_requests`
--
ALTER TABLE `driver_reactivate_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_registrations`
--
ALTER TABLE `driver_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `driver_reg_fees`
--
ALTER TABLE `driver_reg_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver_renewal_histories`
--
ALTER TABLE `driver_renewal_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver_salaries`
--
ALTER TABLE `driver_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_secondary_documents`
--
ALTER TABLE `driver_secondary_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `fare_histories`
--
ALTER TABLE `fare_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `franchise_details`
--
ALTER TABLE `franchise_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `franchise_renewals`
--
ALTER TABLE `franchise_renewals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `franchise_salaries`
--
ALTER TABLE `franchise_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rides_bookings`
--
ALTER TABLE `rides_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ride_booking_histories`
--
ALTER TABLE `ride_booking_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
