-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2023 at 03:08 AM
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
(1, 1, 1001, 'GK1001', 2, 1, 0, 1, 1, 1, '2023-01-29 02:03:18', '2023-03-20 03:27:14', '2023-01-29 02:03:18', 0, '11.877225', '75.3699867'),
(2, 2, 1002, 'GK1002', 2, 1, 0, 1, 0, 1, '2023-02-14 11:55:32', '2023-02-14 11:55:32', '2023-02-14 11:55:32', 0, NULL, NULL),
(3, 4, 1003, 'GK1003', 1, 2, 0, 1, 0, 1, '2023-02-26 17:58:45', '2023-03-19 15:12:35', '2023-02-26 17:58:45', 1, '11.865142', '75.3800941'),
(4, 12, 1004, 'GK1004', 1, 2, 0, 1, 1, 1, '2023-03-08 18:56:04', '2023-03-21 01:28:01', '2023-03-08 18:56:04', 0, '11.9707991', '75.3114496'),
(20, 14, 1005, 'GK1005', 2, 1, 0, 1, 0, 1, '2023-03-11 15:54:21', '2023-03-11 15:54:21', '2023-03-11 15:54:21', 0, NULL, NULL),
(21, 15, 1006, 'GK1006', 2, 1, 0, 1, 0, 1, '2023-03-11 17:36:52', '2023-03-11 17:36:52', '2023-03-11 17:36:52', 0, NULL, NULL),
(22, 8, 1007, 'GK1007', 2, 3, 0, 1, 1, 1, '2023-03-19 06:57:05', '2023-03-21 19:05:08', '2023-03-19 06:57:05', 0, '11.860321', '75.3795634'),
(23, 18, 1008, 'GK1008', 1, 2, 0, 1, 1, 1, '2023-03-19 06:57:37', '2023-03-20 03:37:54', '2023-03-19 06:57:37', 0, '11.8603198', '75.3795614'),
(24, 29, 1009, 'GK1009', 4, 2, 0, 1, 1, 1, '2023-03-19 07:00:12', '2023-03-21 20:55:49', '2023-03-19 07:00:12', 0, '11.8602976', '75.3796155'),
(25, 28, 1010, 'GK1010', 1, 2, 0, 1, 1, 1, '2023-03-19 07:03:03', '2023-03-21 20:55:25', '2023-03-19 07:03:03', 0, '11.8603142', '75.3795706'),
(26, 26, 1011, 'GK1011', 1, 2, 0, 1, 0, 1, '2023-03-19 17:44:39', '2023-03-19 17:44:39', '2023-03-19 17:44:39', 0, NULL, NULL);

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
(1, 'arun', '9562218794', NULL, 'dvRdUhYLTSy1vvsLEAgabc:APA91bGN3JwjgSrJh-NuljH-2osigVPNHi3WuLcR7_W6-NwmA873rydxKfFrEOhnYs1B8Rfzkf6CeIbtc8ybTWWNbW7kAV5jmRfW-4mb5UKzxRAkTXCkPFOW57D-_wM6uigP7mXs6kf-', '', NULL, 0, NULL, 1, NULL, NULL, '2023-01-28 14:36:18', '2023-03-20 19:40:51'),
(2, 'sachin', '7559913368', NULL, 'cRBMR0YUSbutyFT_52cZsE:APA91bEg9ckClPHdW3O_Ts9xTA8dcHUHF3K398BpHQlTroC_K68Tj-tEePRJddlxqrC9zCaOYZv_vKyXLj5ThsAa-h3-9LLef7TfW2MFWB5gHnRWXcjJM1B3-E5yrAJcpE3CU-m1VJAL', '', NULL, 0, NULL, 1, NULL, NULL, '2023-02-17 17:38:59', '2023-03-19 05:45:00'),
(3, 'Riyas', '9846507050', NULL, 'eoubpZq9Q_uj_7O0NWu7XM:APA91bGtmmEzlbZbYNr61McmLKy2pr5Ao0-T8i1RBziT3jzm2URYbB9uK3CFmnHCet16vkd7QFhw1gO-NhDdiL-K-cBYa91OzT5rJriesUtL_3OkjYey9PYFxb5UQoRfVJ3DYR9wJtqE', '', NULL, 0, NULL, 1, NULL, NULL, '2023-02-17 18:09:09', '2023-02-26 17:20:39'),
(4, 'Riyas', '9562832282', NULL, 'exTXk2MUTKWXAs_GUiuCue:APA91bFj8IkUtZtRC_nBUauLzUBVJL3LZKDT8KQCcsovSHHkMy0xZ-i3diWCTG6NSJy9ZMOIulscmaHMpZvaYiQ9dm9e3avM-m3autVHUAAKi3FZQUD4fOllgLVsqY0uh0Ib_M_6mRaP', '', NULL, 0, NULL, 1, NULL, NULL, '2023-02-17 23:02:49', '2023-03-19 03:36:43'),
(5, 'test', '6238051008', NULL, 'fOufeXMuQBmVrVNnRykCoF:APA91bGG8UBcX5_nn1X8O9gcIEMQLkwamNfbUzPobsjuBsoDte_71yWzwTJPQrV833MDuGdEqIfr8GmWUG5zt-9QZXf_OdqDwMWXX5qi2XwMy19W2KuDNK_gQEuKsTsH7HO6brYUY_HP', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-10 22:37:59', '2023-03-10 22:38:25'),
(6, 'sreerag kk', '9037402492', NULL, 'egZiGhrKQBmN7NnWIB6vrW:APA91bFHN2rh3nNq-Mk0NmznlzDVR2jGv_jThIiXDmLb-EeRTeu93BHLPduNdv_eecLSjgtt6xgenz8gTIyXW100voTL6mrg-9barvERSim0TbgcMQbpWu5n6Vhy6GTXJFPw9rkzLb4y', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-12 00:39:26', '2023-03-13 00:25:36'),
(7, 'an', '9946718230', NULL, 'c9tFzH4dSFmTBtFdssw1BB:APA91bEhJq5yA17UgRERCkRrhJHeQKyY0qmEYgFxfSCf4YS9quxwoH-WRYae7Siod87nhAq6Nq0dAfYjs871da8gE14WSO5UIUZZdF54WyFHk_E1cVisask2EDdFlNF5te4gTUc-5V9p', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-13 19:58:47', '2023-03-13 20:14:21'),
(8, 'nihal gafoor', '9207466884', NULL, 'cqara_kbS0KoccStFk23lj:APA91bEc_ETQ6JqM7Ay_RhiYnkCEr6uLCscyaDmIhpRKEUH5a0IysvLQJ3_KPxPed8RXdKsm289uaf5NhcFuBOhERnrr94ErkxacpMI6nlISVAxZh1FNsx-dyRw9fFsY6LLiKTMNMRj4', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 06:00:51', '2023-03-19 06:01:13'),
(9, 'shabeeb', '8129292267', NULL, 'cgvucshMRvWK3dKmYhkGnZ:APA91bHpEc8uFFrtjBcp0HblrVO0wOh4cDJyxC6_A2WhHLfLp-vB7JANPAavNJHsI_GfScPhM_1gIJRf5_eM5WV_XyJfVvLhm6RJUsAsDOw3gvaroQBKf2anF8l8DBtnw25z1V1k6dnK', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 06:09:38', '2023-03-19 21:54:02'),
(10, 'asd', '9746394947', NULL, 'cECr6XFAR9CAj5NDmk9L24:APA91bHVgqgi4ubW9WE_kBDrA4-9r_gvS8SNycHyXLmVFArfIl9s_4nEieeGmcUQ65jSf3Jtk0eWfWPQUdo0-RrufgE1DhQbsBHaHUGjK-1oMxgWGZzoxrs6PzPL5wXR80Tt5eMNUdpo', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 06:29:48', '2023-03-19 06:29:59'),
(11, 'muhammed hasbeer', '9633166906', NULL, 'dilr_pLQTeSB8pgs-ixshl:APA91bGvZcklGkyrD2C3h-LlNKAwYQT8QGMSn8CMVe4RQ83oOMRsV9B6u9jr3608DCiFPpxS8hVkONfs5L-3yg8Jl7ogyDRQ7anJLQU8zMQowABXxJr4lXICVQr5jKXN5N4tdDESw5HV', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 06:36:35', '2023-03-19 06:37:01'),
(12, 'das', '9633493999', NULL, 'fzODdS0MTQyrvXX33gMU9c:APA91bG0hJfhurEbc5oQdStr1JvFLjz6dzJ3jyCjx93sNVVibOR679qWLx8osMaEtbYyngZ8uupuwC3OTZ2p5Qgtw37LBEQNMktA6HaBEKGYwla-f7azDZ-kWLKwh-evynW8ZdRDB6AY', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 19:01:15', '2023-03-19 19:01:29'),
(13, 'muhammed hazim', '8075814010', NULL, 'fVHmU976RFSeQKtTVNcW2p:APA91bH7gbWKXNVOOvxcRJdo-pkN7apRHHuizPawSWRB0rmtEDMwWm7e8zu0jc4NYlzkJZix7HXdIkECj94zDA_-_vs2fwIx31GatGq2s2kImmkgH5X9Ub-JJwqwGmgR3Mf3xpXAMZ9I', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 19:06:26', '2023-03-19 19:06:40'),
(14, 'hasna nadeer', '9633912678', NULL, 'c5rpG2c-Suy3lsNA5ssHm7:APA91bFcLksgGsZV8e5q00Zsd5m1t4C0RMFvAUqQ4TupkfDLsV6C7GhrHbnG0ga7hS5UxmKCTLXxVxHiVP3b0xs_qz5fKGHY3ZlcePUXDvfoTT0gdAeXsUFd_E1Rj1g1SCkKRFZVOQuz', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 19:08:10', '2023-03-19 19:08:31'),
(15, 'Yashin', '8089288926', NULL, 'f2gwppW4Qr-6AwOrYSWzfe:APA91bFJOjfkcLfn4eUx1V1bGjELmOxgowF2xt0f6DhaqPGW_Iovq8aJNYGsNQJ1JASZOxZ3nveOL-hGACNF04aOSqg7pfZ0O9iCQhiZd-5JNiUScxVMWBYFwL_sW98vo82eICAjMVJG', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 19:19:50', '2023-03-19 19:20:09'),
(16, 'fathimasiraj', '9895212815', NULL, 'efWa7mB7QuulBdp1DUyXOF:APA91bHHoNB3J-KjEqdzqhpu7Q4wCAkB9dAPwDHc4NIG0f-xv7R6TzT8d_cv0kYw-ak0bVOLbH5yajvRYY7eiHvsicVuZwbgTWE1lGADw9eV1oZxTzQx9GuWIm5aDEOz57MIr6H_sCyz', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 19:47:26', '2023-03-19 19:47:52'),
(17, 'nadeer', '9037500289', NULL, 'cUeNhR8BQUONQ2-sl8X6Cx:APA91bE8jEOWHWtTxACvwR5ZmWFN82LD7kow3GTlE-y9i2goNee9fb-j1Y1QHgDcY5zZUMhAiPLDcRKwIEpU0FXghw9rVy-QtSCyMWv6El6iL0KLvrlzZp9c2ac_vTQx9q_83xF5C_Yy', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 20:03:09', '2023-03-19 20:04:40'),
(18, 'jijudas', '9895823646', NULL, 'dqjqjUESRd6UFg02nPcebK:APA91bFShv40kPMnjxjEtns1KNGpoMmD3o1RpgqjbXVmASl1ACdG52Rh3Oo3UUiZM_V8HMnkjVB1hOwYE6adu7CNGIpjwSHJ9suuaoKZtVq1plzLJrmAaj936Q8VAdYDCin7cqExV-fo', '', NULL, 0, NULL, 1, NULL, NULL, '2023-03-19 23:07:39', '2023-03-19 23:07:49');

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
(6, '6', 1, '/driver_license/front1679033208.jpg', '/driver_license/back1679033215.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679033223.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679033231.jpg', NULL, 0, 1, NULL, 0, '2023-02-27 00:07:40', '2023-03-17 18:37:11'),
(7, '7', 1, '/driver_license/front1677511142.jpg', '/driver_license/back1677511142.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1677511142.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1677511142.jpg', NULL, 0, 1, NULL, 0, '2023-02-28 03:47:27', '2023-02-28 03:49:02'),
(8, '9', 1, '/driver_license/front1677647828.jpg', '/driver_license/back1677647828.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1677647828.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1677647828.jpg', NULL, 0, 1, NULL, 0, '2023-03-01 17:46:08', '2023-03-01 17:47:08'),
(9, '10', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 2, '2023-03-02 04:45:40', '2023-03-02 04:49:25'),
(10, '8', 1, '/driver_license/front1679163110.heic', '/driver_license/back1679163212.jpg', 'sfdfdfsf', '0000-00-00', 1, 1, '', 1, 1, '', '/vehicle_rc/1679163230.jpg', 'xzcsfdgdfds', '0464-04-05', 1, 1, '', '/vehicle_insurance/1679163238.jpg', '0004-05-04', 1, 1, '', 1, '2023-03-03 18:13:34', '2023-03-19 06:57:05'),
(11, '11', 1, '/driver_license/front1677822571.jpg', '/driver_license/back1677822571.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1677822571.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1677822571.jpg', NULL, 0, 1, NULL, 0, '2023-03-03 18:18:20', '2023-03-03 18:19:31'),
(12, '12', 1, '/driver_license/front1678256302.jpg', '/driver_license/back1678256004.jpg', 'KL 13 AU 1452', '2023-05-31', 1, 1, '', 1, 1, '', '/vehicle_rc/1678256023.jpg', '5646544', '2023-05-30', 1, 1, '', '/vehicle_insurance/1678256040.jpg', '2023-05-31', 1, 1, '', 1, '2023-03-08 17:59:33', '2023-03-08 18:56:04'),
(13, '13', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-08 18:06:16', '2023-03-08 18:06:16'),
(14, '14', 1, '/driver_license/front1678463862.jpg', '/driver_license/back1678463862.jpg', 'Hahajaj', '2023-07-08', 1, 1, '', 1, 1, '', '/vehicle_rc/1678463862.jpg', 'Hshs', '2023-07-07', 1, 1, '', '/vehicle_insurance/1678463862.jpg', '2023-05-19', 1, 1, '', 1, '2023-03-11 04:26:38', '2023-03-11 15:54:21'),
(15, '15', 1, '/driver_license/front1678510844.jpg', '/driver_license/back1678510844.jpg', 'gdfdfg', '2023-07-12', 1, 1, '', 1, 1, '', '/vehicle_rc/1678510844.jpg', 'trtert', '2023-07-04', 1, 1, '', '/vehicle_insurance/1678510844.jpg', '2023-03-28', 1, 1, '', 1, '2023-03-11 17:30:10', '2023-03-11 17:36:52'),
(16, '16', 1, '/driver_license/front1678694561.jpg', NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-13 20:32:18', '2023-03-13 20:32:41'),
(17, '17', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-14 22:54:15', '2023-03-14 22:54:15'),
(18, '18', 1, '/driver_license/front1678950593.jpg', '/driver_license/back1678950593.jpg', 'ytfrtfu', '0000-00-00', 1, 1, '', 1, 1, '', '/vehicle_rc/1678950593.jpg', 'bfgfdgd', '0000-00-00', 1, 1, '', '/vehicle_insurance/1678950593.jpg', '0076-06-05', 1, 1, '', 1, '2023-03-16 19:38:15', '2023-03-19 06:57:37'),
(19, '20', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-16 20:08:13', '2023-03-16 20:08:13'),
(20, '19', 1, '/driver_license/front1678952607.jpg', '/driver_license/back1678952607.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1678952607.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1678952607.jpg', NULL, 0, 1, NULL, 0, '2023-03-16 20:08:58', '2023-03-16 20:13:27'),
(21, '23', 1, '/driver_license/front1678953752.jpg', '/driver_license/back1678953752.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1678953752.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1678953752.jpg', NULL, 0, 1, NULL, 0, '2023-03-16 20:30:41', '2023-03-16 20:33:40'),
(22, '24', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-17 21:49:47', '2023-03-17 21:49:47'),
(23, '25', 1, '/driver_license/front1679076901.jpg', '/driver_license/back1679076913.jpg', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679076923.jpg', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679076934.jpg', NULL, 0, 1, NULL, 0, '2023-03-18 06:39:01', '2023-03-18 06:45:34'),
(24, '26', 1, '/driver_license/front1679123282.jpg', '/driver_license/back1679123298.jpg', 'KL 13 AU 4595', '2023-05-31', 1, 1, '', 1, 1, '', '/vehicle_rc/1679123311.jpg', '5646544', '2023-04-30', 1, 1, '', '/vehicle_insurance/1679123324.jpg', '2023-06-30', 1, 1, '', 1, '2023-03-18 19:30:21', '2023-03-19 17:44:39'),
(25, '27', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-19 06:19:47', '2023-03-19 06:19:47'),
(26, '28', 1, '/driver_license/front1679162406.jpg', '/driver_license/back1679162428.jpg', 'adsfsf', '2023-05-24', 1, 1, '', 1, 1, '', '/vehicle_rc/1679163018.jpg', 'cdsdsd', '2023-05-24', 1, 1, '', '/vehicle_insurance/1679163278.jpg', '2023-05-24', 1, 1, '', 1, '2023-03-19 06:20:39', '2023-03-19 07:03:03'),
(27, '29', 1, '/driver_license/front1679162085.jpg', '/driver_license/back1679162108.jpg', 'sfsfsf', '2023-05-24', 1, 1, '', 1, 1, '', '/vehicle_rc/1679162272.jpg', 'csfgrhrfes', '2023-05-24', 1, 1, '', '/vehicle_insurance/1679162137.jpg', '2023-05-24', 1, 1, '', 1, '2023-03-19 06:21:58', '2023-03-19 07:00:12'),
(28, '31', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-19 19:17:39', '2023-03-19 19:17:39'),
(29, '32', 1, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, '2023-03-19 19:18:48', '2023-03-19 19:18:48'),
(30, '35', 1, '/driver_license/front1679291465.JPG', '/driver_license/back1679291465.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679291465.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679291465.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 18:19:27', '2023-03-20 18:21:05'),
(31, '36', 1, '/driver_license/front1679291977.JPG', '/driver_license/back1679291977.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679291977.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679291977.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 18:27:51', '2023-03-20 18:29:37'),
(32, '37', 1, '/driver_license/front1679292438.JPG', '/driver_license/back1679292438.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679292438.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679292438.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 18:36:00', '2023-03-20 18:37:18'),
(33, '38', 1, '/driver_license/front1679292832.JPG', '/driver_license/back1679292832.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679292832.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679292832.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 18:42:37', '2023-03-20 18:43:52'),
(34, '39', 1, '/driver_license/front1679293306.JPG', '/driver_license/back1679293306.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679293306.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679293306.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 18:50:27', '2023-03-20 18:52:44'),
(35, '40', 1, '/driver_license/front1679294042.JPG', '/driver_license/back1679294042.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679294042.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679294042.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 19:02:38', '2023-03-20 19:04:02'),
(36, '41', 1, '/driver_license/front1679294466.JPG', '/driver_license/back1679294466.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679294467.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679294467.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 19:09:54', '2023-03-20 19:11:07'),
(37, '42', 1, '/driver_license/front1679294912.JPG', '/driver_license/back1679294912.JPG', NULL, NULL, 0, 1, NULL, 0, 1, NULL, '/vehicle_rc/1679294912.JPG', NULL, NULL, 0, 1, NULL, '/vehicle_insurance/1679294912.JPG', NULL, 0, 1, NULL, 0, '2023-03-20 19:17:32', '2023-03-20 19:18:32');

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
(1, 'GK1001', 'exCP0s-oTsyOb4WI8ckG8k:APA91bFONDrE9R1v_Am2D1dtoOfyTNCVmSkzKOwYcGlBZcp0nTJKJhC7fREu9w9g-1hZRckI0jjF8-fVNsbxdS-x3pmIQvN7Rt-TdDzorxONuualU6uJtwX0OjPnRXu74qOP6_kwnniG', 'Riyas', '9562832282', '$2y$10$ycEXfeFM3LxzwccAxNGvwuPwkOSC2CjtjvnaK/I7.tcwPsj8Bqrb2', '1', '/drivers/1674957372.png', 'O+', 'ads', 'dsfsdf', '253', '10', '44444', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 03:56:38', 1, 2, NULL, NULL, '2023-01-29', '2023-01-29', '2024-01-29', 0, '2023-01-28 14:34:36', '2023-03-19 03:52:05'),
(2, 'GK1002', NULL, 'Arun Kdd', '9562218797', '$2y$10$Py3xCH4IFBlwslSqqZLlPOfdAoA4MdozZDfjtW5tHUVV/7iv50bDa', '1', '/drivers/1676252836.png', 'O+', 'Kannadiparamba', 'dfd', '253', '10', '13323', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '111111', NULL, 1, 2, 'dadwewerw', '2023-02-14', '2023-02-14', '2023-02-14', '2024-02-14', 1, '2023-02-13 01:47:16', '2023-02-14 11:55:32'),
(3, '45646', NULL, 'saneesh', '9995172244', '$2y$10$QC3uQuc4eqIQxKT5L5M6k.5rRj5AOlujLQ26QMqw.vI.K1Mv4mm0u', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '111111', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-02-20 22:38:46', '2023-02-20 22:38:46'),
(4, 'GK1003', 'cxhkdd6iQy-Md97F289IWR:APA91bF4yzrNRQj60lgBdQ4ZZGOQLqqcLIB5nQY_P5s7t1LZaOwoU2afnoqRpYb8mIjuSURd6dPpROPnKGfrzKWHVxA1xcUX6SxHghi_ZgNHBK5ooxwF2RQwOHiA094-e5zWZSEimefK', 'muhammed nihal', '9207466884', '$2y$10$LAcFwjTNrGxugJ5ZyD4Ol.n1KL7LTxgFnz62tXCEFFRl0vpb3hOKu', '1', '/drivers/1677339438.jpg', 'o+ve', 'fabinas', 'kazanakotta', '253', '10', '670012', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 07:22:50', 1, 2, NULL, NULL, '2023-02-26', '2023-02-26', '2024-02-26', 1, '2023-02-26 04:07:18', '2023-03-19 07:18:13'),
(5, '91814', NULL, 'hhh', '9656789098', '$2y$10$U4otEo115cwyeDu3dJGbu.f8ntVPajIVQX3C5.eNqIYvX6LtS3R.S', '1', '/drivers/1677392277.jpg', 'gg', 'dfgg', 'kannur', '253', '10', '670003', 1, 0, '0', 6, 9, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-26 18:47:58', '2023-02-28 03:41:45'),
(6, '82912', 'djfmkXUHS8S1RtwmSo0baS:APA91bGQMHO4Ny8qNP4wK1dP0JP2xudoe1gaWyM_0NOugJTyQzsZ16In3WsVI-vuQmR5Uj36PgDP2T-KhlW0Omu2gQaAxiRtWYoazf2UdekYK7zojd5kd9T9-vy7jrtThTbRaOO3B5pZ', 'sreerag test', '9037402492', '$2y$10$KQ7QqfKisjkZNK0uOn5uCeO.YZUs.pmcxy/MNPcAA6x9W8Xipkl26', '1', '/drivers/1677411451.png', 'O+', 'sreenilayam edakkepuram South kannapuram po cherukunnu', 'edakkepuram', '253', '10', '670301', 1, 1, '', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', '2023-03-17 18:34:22', 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-27 00:07:31', '2023-03-19 06:48:47'),
(7, '41696', NULL, 'niha,', '9858756644', '$2y$10$CSWFdF4bqBcStDGXonOvx.r8zQjGfU4//LV1xK3.qonhRz.4B6sOy', '1', '/drivers/1677511014.jpg', 'o+ve', 'fabinas', 'kaznanakotta', '253', '10', '670012', 1, 1, '', 2, 1, 0, 1, 1, '', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-02-28 03:46:54', '2023-03-05 02:08:06'),
(8, 'GK1007', 'fIcIp5OKSwuhkx_2fJQs50:APA91bExla8uEvbqLid2AZDcbys9UviMBr9Y5VivCJDaBcACW7IhiIyUI0WIpjHpc87ZoNJfnNSdK_X6s0udlvyMGGbtyTTBilGpSYO7IkEIzN3KReXG9vOwsikIucxxD4LUqzLwrXUK', 'mohammed shabeeb', '8129292267', '$2y$10$XpDNZG0pPzL4mxViyNFqK.WM6rQhrqWU842Dk7XwL.W5pV6AY8dgK', '1', '/drivers/1677511702.jpg', 'O+', 'HOWVA NIVAS, Thayatheru, kannur 2, 670002', 'kannur', '253', '10', '670002', 1, 1, '', 2, 3, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 23:25:54', 1, 2, NULL, NULL, '2023-03-18', '2023-03-18', '2024-03-17', 1, '2023-02-28 03:58:23', '2023-03-19 23:21:25'),
(9, '58023', NULL, 'nihal2', '9895297000', '$2y$10$9bEhYYtyUVAm6YwEqwzWWuq4i5DFFAWZclaVEmdS625ZZCNdFGRJy', '1', '/drivers/1677647752.jpg', 'o+ve', 'fabinas2', 'kaznanakotta', '253', '10', '670012', 1, 0, '0', 2, 7, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-01 17:45:52', '2023-03-01 17:47:25'),
(10, '81399', NULL, 'sreerag kk', '7356552492', '$2y$10$UZf3KIpxCS246T5uw.BkSeU5kXJN57v6pjfJhnXQEhigiKQjYhjH2', '1', '/drivers/1677687324.jpg', 'o+', 'abc house', 'kannapuram', '253', '10', '670301', 1, 0, '0', 3, 11, 0, 1, 0, '0', 2, 'abc', '2023-03-01', '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-02 04:45:24', '2023-03-02 04:49:25'),
(11, '25609', NULL, 'haesgt', '9895746677', '$2y$10$plrKaNMTxTFBHC3M/A3Jo.RcIJZNGMu1BdZu9JTEi5UHWPq2Btl/O', '1', '/drivers/1677822492.jpg', 'o+ve', 'nihal', 'kaznanakotta', '253', '10', '670012', 1, 0, '0', 6, 9, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-03 18:18:12', '2023-03-03 18:21:28'),
(12, 'GK1004', 'e7mJbat4SY2u-SkX51ZGUM:APA91bGhLv0ycjPz2jWGtVcHdzEPb1xaDUufqpdq2lRNH4GJGqzqgvjzq_qwDytR1IENlAtCkojRpu4US2WJJ6fSOHTERK1Q2JaDKB8x5hhEOKMBGv7OxIJpCcRPmaLRtHnbHOeC_kFC', 'test', '7559913368', '$2y$10$Hdgk3NyQjJZIKDtbNGjUaOzlzD0.BEFOdxC/GquMh9HD//yWjBmbi', '1', '/drivers/1678255926.jpg', 'O+', 'test', 'kannur', '253', '10', '670301', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 05:44:50', 1, 2, NULL, NULL, '2023-03-08', '2023-03-08', '2024-03-07', 0, '2023-03-08 17:59:33', '2023-03-19 05:40:38'),
(13, '96643', NULL, 'test', '6238051008', '$2y$10$0RvCIxi7GNGujVLOqLRWDuJHpTKV0cDNKwakT0XWr1uR5dRiGdBga', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '111111', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-08 18:06:16', '2023-03-08 18:06:16'),
(14, 'GK1005', NULL, 'New driver', '9847558099', '$2y$10$bL8wcH8L39Md2fNWvs4xYu0m.c0Ku4rBpcIksDx8pddF.TJxwLFlS', '1', '/drivers/1678463752.jpg', 'O+', 'Test', 'Kannur', '253', '10', '670301', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '', NULL, 1, 2, NULL, NULL, '2023-03-11', '2023-03-11', '2024-03-10', 1, '2023-03-11 04:25:52', '2023-03-11 15:54:21'),
(15, 'GK1006', NULL, 'New user2', '9746077133', '$2y$10$zhUH7hHXVB7.p2RAAOIzfOEGRUGSlScYjF1o4zbR0dzYnjucqkT6e', '1', '/drivers/1678510795.jpg', 'O+', 'test', 'KANNUR', '253', '10', '670301', 1, 1, '', 2, 1, 0, 1, 1, '', 1, NULL, NULL, '', NULL, 1, 2, NULL, NULL, '2023-03-11', '2023-03-11', '2024-03-10', 1, '2023-03-11 17:29:55', '2023-03-11 17:36:52'),
(16, '58699', NULL, 'ayyappan', '1234567890', '$2y$10$5oLQzzEb2CLQF4cquclULO6kXOVcoh40oJHrVk80VKKVZR22CbQf2', '1', '/drivers/1678694527.jpg', 'o+ve', 'test', 'cc', '260', '10', '691585', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-13 20:32:07', '2023-03-13 20:32:07'),
(17, '65144', NULL, 'ayyappan', '9946718230', '$2y$10$deFdS99R.IGN5DrPsHVkhOfsG39uMkeYtWuFN/HFjmXaOdVGllbqu', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '212600', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-14 22:54:15', '2023-03-14 22:54:15'),
(18, 'GK1008', 'f62qHAt0RDyRTS1EyacrjN:APA91bGhxiW-4wztFlse6VgqKvsSewuhx-t1YOKjFNELVATazsl6_8Iu8yJl5fXEPWG0bT5iE-iChMzQPVThpKNQ9TDZ3YEBWg391pZnW39oUax5d-fVZzPYTsbi1Ggwq_wV8wDhzCPQ', 'jiju k', '9895823646', '$2y$10$ugwc9EbZIy3aCM7F77lgHuJCcNyYssTF7k7jevWfDPB9UEB1wXh4W', '1', '/drivers/1678950483.jpg', 'B+', 'karitholil house', 'thottada', '253', '10', '670007', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 22:04:45', 1, 2, NULL, NULL, '2023-03-18', '2023-03-18', '2024-03-17', 1, '2023-03-16 19:38:03', '2023-03-19 21:59:56'),
(19, '55225', NULL, 'priyankag', '9778269237', '$2y$10$SdX0ZR2tlVgUQ/74fXVUjucl0lhN40ftSGaH6dKFPUCSWKgkbfU7y', '1', '/drivers/1678951734.jpg', 'B +', 'gowri sankaram', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 19:58:54', '2023-03-16 20:14:09'),
(20, '69335', NULL, 'priyankag', '9895636547', '$2y$10$l6c3TxWryEJCEcnn931FV.kA6unifB0ZawwFnMow5LPg3SBHNfEoC', '1', '/drivers/1678951874.jpg', 'B +', 'gowri sankaram', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:01:14', '2023-03-16 20:01:14'),
(21, '90110', NULL, 'priyanka', '9897565678', '$2y$10$tRyNIrDyfvkeDMLKycFCTuTg1FYCwuzTeTNEkppxxcFLXoC7uniDi', '1', '/drivers/1678952264.jpg', 'B+', 'Gowri  sankaram', 'thottada', '253', '10', '670007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:07:44', '2023-03-16 20:07:44'),
(22, '36113', NULL, 'mohandas', '9896754556', '$2y$10$YTS8cbDijDQrQAaMmeO6wezUFo9Mlw.iJnDNIkaOddyzO8ltiznVK', '1', '/drivers/1678953183.jpg', 'B+', 'bhagavathi', 'mangaiore', '252', '10', '575005', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:23:03', '2023-03-16 20:23:03'),
(23, '74303', NULL, 'mohandas', '9896574545', '$2y$10$laB9EemgvaASEHeoqMXl6.YOJ1OcseNYpB9bigDFZHrTTa8Zi.HF2', '1', '/drivers/1678953563.jpg', 'B+', 'mangaiore', 'kaznanakotta', '252', '10', '878799', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-16 20:29:23', '2023-03-16 20:34:22'),
(24, '89650', 'exCP0s-oTsyOb4WI8ckG8k:APA91bFONDrE9R1v_Am2D1dtoOfyTNCVmSkzKOwYcGlBZcp0nTJKJhC7fREu9w9g-1hZRckI0jjF8-fVNsbxdS-x3pmIQvN7Rt-TdDzorxONuualU6uJtwX0OjPnRXu74qOP6_kwnniG', 'Riyas Tp', '9846507050', '$2y$10$mQ4npOnQGJ//VNXtim4m1uhQMcXD5XpaOyVmTzk.sfvwCXm3XOCnG', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '', '2023-03-17 21:54:47', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-17 21:49:47', '2023-03-17 21:50:02'),
(25, '34167', 'eJvSyTqLRPi4tJCSZ1-V06:APA91bEsfqMNtHB2F6YCPiQ4hcdEoKoT5-JEV4411KOJA0AL1UW5EvoQvtKqG_BW8_zMlW88zMfjh9SLVkPT0rE3OV3ipMmpy6qJqxPMgDf0Sjo5joEw7ZSq85R8UvStxXPqd6Z1UE9n', 'midhun', '8129948012', '$2y$10$LeIkc6gWaX0szYcslz6jlOiGzl2GxNXtkZYbhXEgXQ3CR7vf0vele', '1', '/drivers/1679076884.jpg', 'O+', 'ABC house edakkepuram kannpuram po cherukunnu', 'kannapuram', '253', '10', '670301', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', '2023-03-18 06:47:36', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-18 06:39:01', '2023-03-18 06:44:51'),
(26, 'GK1011', 'fNWjQNwFQnuDeTeiIjDZ6Z:APA91bFMyz0-JiBNcqj9OjUe2OgMufe0ZNKflfsxdwoQeoDMOXvoQSxGIJLka-IttHXH5iNWwszde8VcepeDBOVfUGnZqM7MZ2FfN-j6CXSHJ1Ua8bCvdhjBItMI3I8WFlLhJ0Mrv0_L', 'Arun. K', '9562218794', '$2y$10$VrrTe56quQjzmHfIHBASx.i7HTjpQe6BzsJo/vlxUDpqkXqJMpxce', '1', '/drivers/1679123246.jpg', 'O+', 'sabari', 'kannadiparamba', '253', '10', '670604', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-18 19:35:21', 1, 2, NULL, NULL, '2023-03-19', '2023-03-19', '2024-03-18', 0, '2023-03-18 19:30:21', '2023-03-19 17:44:39'),
(27, '87179', NULL, 'hasbeer', '9633166909', '$2y$10$IaW2T8W4Vg/sKbB9ij30M..B/5XCB1UEPMQzeSP/o0pqL5Q8xzpuq', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '481904', '2023-03-19 06:24:47', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-19 06:19:47', '2023-03-19 06:19:47'),
(28, 'GK1010', 'eEb455lpRuGe0-SydXNrUw:APA91bErazgpPNDBIDoeUqev4_uYsuMozcypR-NzIbxCOpNafdfSRIbq9AQYKk3G_E9Ib1YP-sHb3A_4u7d1nhl66mHrEw-XWVTF9xdc7UmkBw9rABgaQajpsDxLtA0nj9RAZKJULubx', 'hasbeer', '9633166906', '$2y$10$X5TMh8Dhl/yj7d3/Zl21OOkk0JwxtfZxf/.UHhfzauqpyuXpxQoUu', '1', '/drivers/1679162323.jpg', 'A+', 'zuha kazanakotta kannur', 'kannur', '253', '10', '670002', 1, 1, '', 1, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 06:25:39', 1, 2, NULL, NULL, '2023-03-19', '2023-03-19', '2024-03-18', 0, '2023-03-19 06:20:39', '2023-03-19 07:03:03'),
(29, 'GK1009', 'eiL_sI1jTr23T7WQTgvMw7:APA91bE4E4TpVxI0THajZdKjb_9MDI2Xf2gACjmW1-dzpSDHzJI-gn3hlGBZJpty1GscaUaa4RgQMlZ4bBnjxAzMvsGKhBB27Xv0YOPBP7H1YzF4w4htbwzfR3jGR1EpguICrYj4epSy', 'asw', '9746394947', '$2y$10$hbupqZZ4euk4iwVaKA7LNOrHq8J2vD1Iy2yaYGP6WKDkTLJrHdkQC', '1', '/drivers/1679162045.jpg', 'B-', 'kannur', 'Kannur', '253', '10', '670001', 1, 1, '', 4, 2, 0, 1, 1, '', 1, NULL, NULL, '', '2023-03-19 07:15:43', 1, 2, NULL, NULL, '2023-03-19', '2023-03-19', '2024-03-18', 0, '2023-03-19 06:21:58', '2023-03-19 07:10:50'),
(30, '97409', NULL, 'mohamed shabeeb', '8129292268', '$2y$10$SvpxDyoRh5dErsXbS.Rdw.b1i2urdjE8AWMrGiV.ks4KdXRfqSmSW', '1', '/drivers/1679161925.jpg', 'o+', 'howva nivas', 'thayatheru', '253', '10', '670002', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '342676', '2023-03-19 07:22:13', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-19 06:22:05', '2023-03-19 07:17:13'),
(31, '50956', 'fzJmIXqITjeyV6vmfcaXYV:APA91bEXg0tDu1OH6NH58YMKJHGPvXwzK-yNvRm9qvjlDcDVfmMiM0Q6qcZgqgaKidJKn4K69dwuWs5F-pY5r_tGR5tI6nXoCdR7bZXQ4WYvzdplxO26wrdXjQva3y-1roGUnbv0ymki', 'nadeer', '9037500289', '$2y$10$puYwD5hIJfmNcScDv5t4vembG4/oGZYc2MBL7uQqzwAg/cH8RvRGO', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '', '2023-03-19 19:22:39', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-19 19:17:39', '2023-03-19 19:18:09'),
(32, '11736', 'eWWg5632SaSFW07WNS9HeF:APA91bEEROc0c2biUM_os7ZH2E0ndqKLuF3ebVNoR5clBXhTdWfy2JzO2bwjcgx11gJPJ34OABocZG7cgqFETZK-nrPtFmoXjnzfZbTjlGb22vzfO3-TfVxUhgms_ojcxNc5MZOxYAhq', 'hasna nadeer', '9633912678', '$2y$10$y9wxRo4wC/gD8lUizSuiKuZuTvhRIOuRKDjj89yKHc40jPGLJDToK', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 0, 0, 0, 0, 0, '0', 0, NULL, NULL, '', '2023-03-19 19:23:48', 0, 0, NULL, NULL, NULL, NULL, NULL, 0, '2023-03-19 19:18:48', '2023-03-19 19:19:03'),
(33, '25363', NULL, 'jiju k', '9895674567', '$2y$10$MxMenUR2aHDOrcDwepolsuSvdyefw4O9ulMrNV7kAuINgDwIO7WOq', '1', '/drivers/1679290791.JPG', 'o+ve', 'karinthol', 'kaznanakotta', '253', '10', '670012', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:09:51', '2023-03-20 18:09:51'),
(34, '48894', NULL, 'babu', '9887657845', '$2y$10$NkQkX3lVJc/qMaiumiFjqe8G3s8T5Ok5MkGQtC532ntpmRz6iElOu', '1', '/drivers/1679290976.JPG', 'o+ve', 'karinthhol', 'kaznanakotta', '255', '10', '67007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:12:56', '2023-03-20 18:12:56'),
(35, '43628', NULL, 'dinesh', '9496911195', '$2y$10$/m..JPY86haFQdQBa.54qOYlfIqwaxO37QHSjlPiP4vqOnVED5TDK', '1', '/drivers/1679291326.JPG', 'o+ve', 'cheakkar', 'kazanakotta', '258', '10', '99879', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:18:47', '2023-03-20 18:21:31'),
(36, '52652', NULL, 'sivadasn', '9895677864', '$2y$10$juCd.s7l.OeRABHNMipYmO3Yk8L//LyQoMdP5iundgrNExHQI1ahe', '1', '/drivers/1679291848.JPG', 'o+ve', 'general  house', 'kazanakotta', '250', '10', '989700', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:27:28', '2023-03-20 18:30:03'),
(37, '24317', NULL, 'rk  boss', '7560865447', '$2y$10$Mx0dd.N4CoiYtKenwjveyu1Khogd.Zkq1rmFUckFHlMB.YVRP.izS', '1', '/drivers/1679292346.JPG', 'o+ve', 'stk associates', 'palakkad', '252', '10', '670012', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:35:46', '2023-03-20 18:37:42'),
(38, '13042', NULL, 'jayaraj', '9895456789', '$2y$10$Bpy8ix8/AHiqjDomh06u8.p3TYQyD6hECz.jEbAsBdsvbZMxecOh2', '1', '/drivers/1679292740.JPG', 'o+ve', 'bhagavathi', 'mangalore', '250', '10', '575005', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:42:20', '2023-03-20 18:44:15'),
(39, '93072', NULL, 'midhun', '9947017888', '$2y$10$Qm.eRy9nxR74sjJUcU65X.hAWP5PwOsjqUIIShR6uAKXmIvneTcPu', '1', '/drivers/1679293214.JPG', 'o+ve', 'muthappan', 'thavakkara', '253', '10', '76007', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 18:50:14', '2023-03-20 18:53:03'),
(40, '95539', NULL, 'sanjay', '9895674589', '$2y$10$US5vSRumJo55OV7eoRgVK.engA/jcdbBSey4.JzRdXwMX6Mf64AaW', '1', '/drivers/1679293947.JPG', 'o+ve', 'cannara', 'kazanakotta', '255', '10', '897868', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 19:02:27', '2023-03-20 19:04:39'),
(41, '75680', NULL, 'aneesh k', '9897653456', '$2y$10$G1lx57xw3OPNe8io1mbT7OhuKqaKI3Ehh2lqV8Y3Wgt7zPciqg6Wa', '1', '/drivers/1679294370.JPG', 'o+ve', 'manakkattu  house', 'payynur', '253', '10', '670307', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 19:09:30', '2023-03-20 19:11:58'),
(42, '12251', NULL, 'priyag', '9896757845', '$2y$10$uRPMpBEzb4/ybtsP4Kt2/.SuBLXbi1Md6O4ES83eRC6gtGU9HeuVG', '1', '/drivers/1679294834.JPG', 'o+ve', 'shankarm', 'kazanakotta', '252', '10', '678909', 1, 0, '0', 1, 2, 0, 1, 0, '0', 0, NULL, NULL, '', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, '2023-03-20 19:17:14', '2023-03-20 19:18:57');

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
(6, '6', 1, '/pollution_certificate/1679033239.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1679033257.jpg', NULL, 0, 1, NULL, 1, '2022-12-29', '25', '54545454', 0, NULL, 0, '2023-02-27 00:07:40', '2023-03-17 18:37:37'),
(7, '7', 1, '/pollution_certificate/1677511142.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1677511142.jpg', NULL, 0, 1, NULL, 1, '0022-04-08', '25', NULL, 0, NULL, 0, '2023-02-28 03:47:27', '2023-02-28 03:53:51'),
(8, '9', 1, '/pollution_certificate/1677647828.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1677647828.jpg', NULL, 0, 1, NULL, 1, '0023-04-05', '25', NULL, 0, NULL, 0, '2023-03-01 17:46:08', '2023-03-01 17:47:25'),
(9, '10', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 2, '2023-03-02 04:45:40', '2023-03-02 04:49:25'),
(10, '8', 1, '/pollution_certificate/1679163253.jpg', '4544-04-05', 1, 1, '', '/vehicle_permit/1679163312.jpg', '0000-00-00', 1, 1, '', 1, '2023-03-18', '25', 'pay_LT5AQ3JreBBuMY', 0, NULL, 1, '2023-03-03 18:13:34', '2023-03-19 06:57:05'),
(11, '11', 1, '/pollution_certificate/1677822571.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1677822571.jpg', NULL, 0, 1, NULL, 1, '2023-03-03', '25', NULL, 0, NULL, 0, '2023-03-03 18:18:20', '2023-03-03 18:21:28'),
(12, '12', 1, '/pollution_certificate/1678256062.jpg', '2023-05-31', 1, 1, '', '/vehicle_permit/1678256086.jpg', '2023-05-31', 1, 1, '', 1, '2022-12-29', '25', '54545454', 0, NULL, 1, '2023-03-08 17:59:33', '2023-03-08 18:56:04'),
(13, '13', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-08 18:06:16', '2023-03-08 18:06:16'),
(14, '14', 1, '/pollution_certificate/1678463862.jpg', '2023-07-14', 1, 1, '', '/vehicle_permit/1678463862.jpg', '2023-06-16', 1, 1, '', 1, '2023-03-10', '25', NULL, 0, NULL, 1, '2023-03-11 04:26:38', '2023-03-11 15:54:21'),
(15, '15', 1, '/pollution_certificate/1678510844.jpg', '2023-05-24', 1, 1, '', '/vehicle_permit/1678510844.jpg', '2023-05-30', 1, 1, '', 1, '2023-03-14', '25', NULL, 0, NULL, 1, '2023-03-11 17:30:10', '2023-03-11 17:36:52'),
(16, '16', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-13 20:32:18', '2023-03-13 20:32:41'),
(17, '17', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-14 22:54:15', '2023-03-14 22:54:15'),
(18, '18', 1, '/pollution_certificate/1678950593.jpg', '0000-00-00', 1, 1, '', '/vehicle_permit/1678950593.jpg', '0045-05-04', 1, 1, '', 1, '2023-02-05', '25', NULL, 0, NULL, 1, '2023-03-16 19:38:15', '2023-03-19 06:57:37'),
(19, '20', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-16 20:08:13', '2023-03-16 20:08:13'),
(20, '19', 1, '/pollution_certificate/1678952607.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1678952607.jpg', NULL, 0, 1, NULL, 1, '0023-06-06', '25', NULL, 0, NULL, 0, '2023-03-16 20:08:58', '2023-03-16 20:14:09'),
(21, '23', 1, '/pollution_certificate/1678953752.jpg', NULL, 0, 1, NULL, '/pollution_certificate/1678953752.jpg', NULL, 0, 1, NULL, 1, '0923-08-08', '25', NULL, 0, NULL, 0, '2023-03-16 20:30:41', '2023-03-16 20:34:22'),
(22, '24', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 1, '2023-03-17', '25', 'pay_LSXWyPotwIAl94', 0, NULL, 0, '2023-03-17 21:49:47', '2023-03-17 21:50:31'),
(23, '25', 1, '/pollution_certificate/1679076950.jpg', NULL, 0, 1, NULL, '/vehicle_permit/1679076960.jpg', NULL, 0, 1, NULL, 1, '2023-03-17', '25', 'pay_LSgf1aVidIPsaY', 0, NULL, 0, '2023-03-18 06:39:01', '2023-03-18 06:46:30'),
(24, '26', 1, '/pollution_certificate/1679123343.jpg', '2023-07-19', 1, 1, '', '/vehicle_permit/1679123355.jpg', '2023-05-31', 1, 1, '', 1, '2022-12-29', '25', '54545454', 0, NULL, 1, '2023-03-18 19:30:21', '2023-03-19 17:44:39'),
(25, '27', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-19 06:19:47', '2023-03-19 06:19:47'),
(26, '28', 1, '/pollution_certificate/1679163323.jpg', '2023-05-24', 1, 1, '', '/vehicle_permit/1679163171.jpg', '2023-05-24', 1, 1, '', 1, '2023-03-18', '25', 'pay_LT4wjVpONiI3p8', 0, NULL, 1, '2023-03-19 06:20:39', '2023-03-19 07:03:03'),
(27, '29', 1, '/pollution_certificate/1679162293.jpg', '2023-05-24', 1, 1, '', '/vehicle_permit/1679162311.jpg', '2023-05-24', 1, 1, '', 1, '2023-03-18', '25', 'pay_LT4taQTh0V3dnG', 0, NULL, 1, '2023-03-19 06:21:58', '2023-03-19 07:00:12'),
(28, '31', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-19 19:17:39', '2023-03-19 19:17:39'),
(29, '32', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, NULL, NULL, 0, NULL, 0, '2023-03-19 19:18:48', '2023-03-19 19:18:48'),
(30, '35', 1, '/pollution_certificate/1679291465.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679291465.JPG', NULL, 0, 1, NULL, 1, '0023-04-05', '25', NULL, 0, NULL, 0, '2023-03-20 18:19:27', '2023-03-20 18:21:31'),
(31, '36', 1, '/pollution_certificate/1679291977.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679291977.JPG', NULL, 0, 1, NULL, 1, '0023-07-08', '25', NULL, 0, NULL, 0, '2023-03-20 18:27:51', '2023-03-20 18:30:03'),
(32, '37', 1, '/pollution_certificate/1679292438.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679292438.JPG', NULL, 0, 1, NULL, 1, '0023-05-06', '25', NULL, 0, NULL, 0, '2023-03-20 18:36:00', '2023-03-20 18:37:42'),
(33, '38', 1, '/pollution_certificate/1679292832.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679292832.JPG', NULL, 0, 1, NULL, 1, '0023-03-06', '25', NULL, 0, NULL, 0, '2023-03-20 18:42:37', '2023-03-20 18:44:15'),
(34, '39', 1, '/pollution_certificate/1679293306.JPG', NULL, 0, 1, NULL, '/pollution_certificate/1679293306.JPG', NULL, 0, 1, NULL, 1, '0023-03-04', '25', NULL, 0, NULL, 0, '2023-03-20 18:50:27', '2023-03-20 18:53:03'),
(35, '40', 1, '/pollution_certificate/1679294042.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679294042.JPG', NULL, 0, 1, NULL, 1, '0023-04-06', '25', NULL, 0, NULL, 0, '2023-03-20 19:02:38', '2023-03-20 19:04:39'),
(36, '41', 1, '/pollution_certificate/1679294467.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679294467.JPG', NULL, 0, 1, NULL, 1, '0023-05-06', '25', NULL, 0, NULL, 0, '2023-03-20 19:09:54', '2023-03-20 19:11:58'),
(37, '42', 1, '/pollution_certificate/1679294912.JPG', NULL, 0, 1, NULL, '/vehicle_permit/1679294912.JPG', NULL, 0, 1, NULL, 1, '0023-03-06', '25', NULL, 0, NULL, 0, '2023-03-20 19:17:32', '2023-03-20 19:18:57');

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
(2, 1, 2, 25, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2023-03-11 01:46:33', '2023-03-11 01:46:33'),
(3, 2, 3, 25, '50', '5', '0', NULL, NULL, 2, NULL, NULL, '100', '5', '', '2023-03-19 13:58:37', '2023-03-19 13:58:37');

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
(1, 101, 'FR101', 'iurdFGZ9VSUH2fELfMEV4Dm9g0sjQn8ld8RHvDeurb6ZZ5feciowQDTcQ7uy', 'abc', 1, 'mohamed shabeeb', '8129292267', 'dfggd', '10', '253', 'franchise/1677512659.jpg', NULL, 'shabeebshabz179@gmail.com', '$2y$10$JTDbD4uSySvwITiv1kwvCeMpWo9tb2hr0dF5yXZps5DqYPJtVKp1W', '2023-01-31', '2023-08-31', 1, 'bad', '2023-01-21', '75', '11.8742184', '75.3703686', 'Location', '2022-12-09 01:41:19', '2023-03-11 01:36:10'),
(2, 102, 'FR102', '', 'ere', 2, 'manu', '2342343424', 'eeferf', '10', '253', 'franchise/1670550368.png', '32242342342', 'wfwefewfe', '$2y$10$JTDbD4uSySvwITiv1kwvCeMpWo9tb2hr0dF5yXZps5DqYPJtVKp1W', '2022-12-31', '2023-04-30', 1, '', '2022-12-09', NULL, '11.258753', '75.780411', 'Location', '2022-12-09 01:46:09', '2023-01-22 03:08:50'),
(3, 103, 'FR103', NULL, 'dada', 1, 'asad', '9562215895', 'dfggd', '10', '253', 'franchise/default.png', 'adsa', 'dgdgdgdf', '$2y$10$5Woq8e8Yfjqpx2XYrNbEyOGzPjv3g1V3382iWJ8f36K6KX7KbVQmu', '2022-12-17', '2022-12-31', 2, 'dsds', '2023-01-21', NULL, '0', '0', '', '2022-12-17 01:44:52', '2023-01-21 05:57:18'),
(4, 104, 'FR104', NULL, 'wew', 2, 'wew', '2342343424', 'dfggd', '10', '256', 'franchise/default.png', NULL, 'dgdgdgdf', '$2y$10$zazgnyQi5roft6e0fZ0Bdeeiinsgukv3laAvuq6tQakC4yCvimwzW', '2023-01-21', '2024-01-21', 1, '0', '2023-01-21', NULL, '2342343432', '2322', 'Location', '2023-01-21 06:10:32', '2023-01-21 06:10:32'),
(5, 105, 'FR105', NULL, 'qwe', 2, 'fsfswf', '9865325689', 'sfsf', '10', '254', 'franchise/default.png', NULL, 'dsffsw', '$2y$10$23qrU7B0LvFYBAPwdMkla.PrtF7alnGWOZDUTJ2IccNzllGAkRs8W', '2023-02-07', '2024-02-07', 1, '0', '2023-02-07', '75', 'qw2132', '1231321', 'Location', '2023-02-07 07:09:16', '2023-02-07 07:09:16'),
(6, 106, 'DIV106', NULL, 'sss', 2, 'bbb', '2346579801', 'kannur', '10', '253', 'franchise/default.png', NULL, 'fdhdf@gmail.com', '$2y$10$FjfH8q8q2nBmAoHsjOEiWO9DY20NFGituwrgPa/aEuERLa0QWqFwe', '2023-02-26', '2024-02-26', 1, '0', '2023-02-26', '20', '12.834174', '79.703644', 'Location', '2023-02-27 00:34:39', '2023-02-27 00:34:39'),
(7, 107, 'DIV107', NULL, 'div', 1, 'sss', '9037402492', 'kannapuram', '10', '253', 'franchise/1677680011.jpg', '09876533', 'kk333sree@gmail.com', '$2y$10$ZqAky/kVhvz2246u3ePs4uORdPJnD9V0yxyaz5Xa17MblSvD/R4dq', '2023-03-01', '2024-02-29', 1, '0', '2023-03-01', '10', '17.1833', '81.4000', 'Location', '2023-03-02 02:43:31', '2023-03-02 02:52:04'),
(8, 108, 'DIV108', NULL, 'siv', 1, 'aa', '8129948012', 'edakkepuram', '10', '253', 'franchise/1679066627.jpg', '09845673', 'aa@gmail.com', '$2y$10$vxqF17RxzJXwDScQo8ACqeodT3Q86jd48JOO7p9QTiB7xNnLEhb82', '2023-03-17', '2024-03-16', 1, '0', '2023-03-17', '5', '17.1833', '81.4000', 'Location', '2023-03-18 03:53:47', '2023-03-18 03:53:47');

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
('009225e66a599b99982428bc25c740b8c42f676289f9ed5d382018ab369784149172ca9b298817bf', 10, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 06:29:59', '2023-03-19 06:29:59', '2024-03-18 23:29:59'),
('100dd447b524183944d5fa3b4f13b4625c911ed16f485b9837dcb7723a7059b23318c2ce66fa16d4', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 17:55:09', '2023-03-17 17:55:09', '2024-03-17 10:55:09'),
('113aa3b91f13f549b129017a28bdaa164f002374ba6695fb285448f4643cb09bcf31342abf6d5a24', 12, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 02:21:12', '2023-03-19 02:21:12', '2024-03-18 19:21:12'),
('1bea691da3014e5fc9fc110a19a205e4b2ee31df5c69f7b127388bd98d27fe4303ebd88a372fc1ba', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-18 02:33:15', '2023-03-18 02:33:15', '2024-03-17 19:33:15'),
('1bf69196c1bfe0c559e231c3f6fb508c5e78d12f7b55afbdd225725f80f9683085b42e94ec776cfb', 17, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 20:04:40', '2023-03-19 20:04:40', '2024-03-19 13:04:40'),
('1f1845367e0fd0bc29a2c9d2f4ee334076759fa16650a3c7e5169d26568315e629ee8378798a4489', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-20 19:40:51', '2023-03-20 19:40:51', '2024-03-20 12:40:51'),
('2110864e0738296ba25cb9464bc9ae36997bfb9d4a9e4a268919f74be21f6576445d51249576d180', 18, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 23:07:49', '2023-03-19 23:07:49', '2024-03-19 16:07:49'),
('28f7004a15e080f7d2432fe9fa2ab56a8375b64ec86c617264ad193050ef21851b80c3fcd254f628', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-18 20:06:37', '2023-03-18 20:06:37', '2024-03-18 13:06:37'),
('2bb6133ba76465556925cdda3b023f472bb5ba062d0190367d66ce7c02215aa8e6a4079344f3f0de', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-16 02:28:53', '2023-03-16 02:28:53', '2024-03-15 19:28:53'),
('303e017e4413a5fc542b4056a0722a38f7a3612c01df9d59396f71cb49082fa459fe39257ed68b2b', 8, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 06:01:13', '2023-03-19 06:01:13', '2024-03-18 23:01:13'),
('33640e64c61eec289dce5cb6fa798ee3de0ee84274b364015eadfc5b701e8dac4ee1b0ad4cebb86a', 18, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 21:59:56', '2023-03-19 21:59:56', '2024-03-19 14:59:56'),
('39c3862f682d3e4c1f3a59dc485ee595843e0cc1ce5c1fff2db8598d731111400b6137b562f2e78b', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 00:55:23', '2023-03-13 00:55:23', '2024-03-12 17:55:23'),
('43e808dd8cfd7a71b54025ed22ee8c547fc305cfe033def96446e4161f1c30e8a4a98400847c05f1', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-12 23:49:37', '2023-03-12 23:49:37', '2024-03-12 16:49:37'),
('4486d82c53cb62e2a2902e6304134e3a2fc00295d1756ddfcd8679f0caafda7b5939885031bd81be', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-15 00:12:07', '2023-03-15 00:12:07', '2024-03-14 17:12:07'),
('4a59a979e58a28aa845dbb41fea9e4964132cb7c4ef6d3c69b542349ec8d2da4c97e8e4ab3f6c10d', 12, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 19:01:29', '2023-03-19 19:01:29', '2024-03-19 12:01:29'),
('4b081663a264a9aa13967194670d6eadb6b93f947ca6a6f9dc70cd936b1cec76e6e284012e39801a', 32, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 19:19:03', '2023-03-19 19:19:03', '2024-03-19 12:19:03'),
('591608e3da1dcb7f16cbc834d89fcb2b23a5fbcc8955acb31e5557ab4f074e55ce8839ddd8cf14f9', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 03:36:43', '2023-03-19 03:36:43', '2024-03-18 20:36:43'),
('598e0189c9992e1fdebb914e996b44000c60458744317f3cdc7f74068b385186f6b8ec255b0b8061', 9, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 06:09:53', '2023-03-19 06:09:53', '2024-03-18 23:09:53'),
('5998d24ce40f1c542d584c8681e61359640db723bfce7cbe736d2bcb196cf3d255e265efaa970a14', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 00:29:56', '2023-03-19 00:29:56', '2024-03-18 17:29:56'),
('5e37710035c522eb6643f7996d02d8153e3501c6d68143e749a8a2df08f3bf21514459c24861149c', 16, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 19:47:52', '2023-03-19 19:47:52', '2024-03-19 12:47:52'),
('620c32da781ab0e86facecf6fee322c7da142d155cbcf6bc4fd3247c7b56f5f9a298928c5b7f70ad', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-18 02:10:38', '2023-03-18 02:10:38', '2024-03-17 19:10:38'),
('650383920f46db2d49fab3eddb959f010cfbb84a3de470ac68847f7537da7b34d8a564fdf6fb88f3', 7, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 20:14:21', '2023-03-13 20:14:21', '2024-03-13 13:14:21'),
('7c03964e8d2552822fa91cda9123f359143c3dbbca76f7054605bd0faa4a4fb24809562ad56a8250', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-14 22:46:06', '2023-03-14 22:46:06', '2024-03-14 15:46:06'),
('7d8a59f5e0baddb0657f708dff4bf1dfe02dd3ff2d510ee49995ddae08eee846708a6e98a33dc972', 8, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 23:21:25', '2023-03-19 23:21:25', '2024-03-19 16:21:25'),
('80b102f2994993bb89aa81806d6f55ab966ac38b6fca25cbcac3fd7805dba1eb9953341edd701b69', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 00:07:06', '2023-03-19 00:07:06', '2024-03-18 17:07:06'),
('81d6d88852ea9d40d1d21e2c6f87b771436637fa0dfbf55e36613109d61e9218950d64c80ea0cde3', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-15 07:56:27', '2023-03-15 07:56:27', '2024-03-15 00:56:27'),
('8bafe236154a1e25550c2af0397b3a9e0057c33a537906d7578162bcb543a55da747007243a9d451', 28, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 06:21:27', '2023-03-19 06:21:27', '2024-03-18 23:21:27'),
('8d246cd2bd517e581e5e8a2222468d4183bd770fcbd7466d7c8ffc2e8df7f535cf61c9249548543c', 14, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 19:08:31', '2023-03-19 19:08:31', '2024-03-19 12:08:31'),
('9090b0677897cd2d0f9a153edff7e9c38287c527fba97a2ee8db9d2fe81e19c3073eeef2a600dfde', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 17:02:14', '2023-03-17 17:02:14', '2024-03-17 10:02:14'),
('952386ff9808a47fe6ece8f8443f78125e1f9d7f08fa13debd279e294e46ae7ffe9e023fd3174c60', 1, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 03:52:04', '2023-03-19 03:52:05', '2024-03-18 20:52:04'),
('954844d74446f1db7a6923eb3f4d200dd1a1c8e022349c4516a6ab824bd2245c90db09f987ccc805', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 02:22:28', '2023-03-19 02:22:28', '2024-03-18 19:22:28'),
('9e0133944d62c6acadd43df65d1be8468da02632cd3e3e67140267edf8b6e57e569434fa43d00346', 11, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 06:37:01', '2023-03-19 06:37:01', '2024-03-18 23:37:01'),
('9fe3b0a29048f248b61a96a762cdd2fa818209429a40b9d45d1391cb96dc5672cb85221bea608c75', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 21:05:59', '2023-03-13 21:05:59', '2024-03-13 14:05:59'),
('a245cab76caf2ba6ff69897b9e98fcc27dfd78bde6c63405080c9f6c359010a5b9a1c304227e4698', 12, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 05:40:38', '2023-03-19 05:40:38', '2024-03-18 22:40:38'),
('a57eeef3a3c2c78e922a4f83a8089b8f2573ef31f0975c0392ba562eab9b468d75e201b17952f80a', 15, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 19:20:09', '2023-03-19 19:20:09', '2024-03-19 12:20:09'),
('c6dd88afa3c5b1d0a0ed318cd8f9cca1e290b6b1455157ae23e7c5824f8a4be92a3112f31b11c0e8', 29, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-19 07:10:50', '2023-03-19 07:10:50', '2024-03-19 00:10:50'),
('d5b0b7a816a3e99f5fd732dd4f30b181654db60aee17358b688ff124f853944a5e710c4df88593b5', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 22:49:25', '2023-03-17 22:49:25', '2024-03-17 15:49:25'),
('d64547f46b2f579781e3e7e5a2c7d38554060d7ea5692d5d9462b9005567d1f0725eab5af4f1f8bf', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-17 17:00:09', '2023-03-17 17:00:09', '2024-03-17 10:00:09'),
('d68a48945ac49a59ffb4ae076e3fe21d7caf62dec120c0b6c6ab32382c7d1f9fffb400572e69dccb', 2, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 05:45:00', '2023-03-19 05:45:00', '2024-03-18 22:45:00'),
('db2b4fc422f605a43fb16be0436df12bd1d5b1895bbfabe6203474e2e411b72fe643e430f5ff0170', 1, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 05:52:10', '2023-03-19 05:52:10', '2024-03-18 22:52:10'),
('e18f1ae83e2513a1b7a846a8d88d1eab4dc6da02219d0606be3a46d8d68f6f7d6b1cb8e958faf37d', 9, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 21:54:02', '2023-03-19 21:54:02', '2024-03-19 14:54:02'),
('e9d0dcff5e50f78b6d9f3279699e5972098f8caead7beeb29b761b3589cef45adf5fdf9f06696d40', 4, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-13 21:24:28', '2023-03-13 21:24:28', '2024-03-13 14:24:28'),
('f721fcd1d4c0e97e9469350d2b10e2423e61cbe35d7185c016d2319420e6ab7fac2ee37808c51e1d', 13, 1, 'customer-app', '[\"customer\"]', 0, '2023-03-19 19:06:40', '2023-03-19 19:06:40', '2024-03-19 12:06:40'),
('fe5b4a68d117137e6f5b7f67478f2735f464b5839b16e2859770ab836429815a53a75b80ea5a0d9a', 25, 1, 'driver-app', '[\"driver\"]', 0, '2023-03-18 06:42:52', '2023-03-18 06:42:52', '2024-03-17 23:42:52'),
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
(10, 4, '2023-03-16 22:51:17', '2023-03-16 22:52:17', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'reason', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-16 22:51:17', '2023-03-16 22:56:22'),
(11, 4, '2023-03-17 01:14:42', '2023-03-17 01:15:42', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'reason', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 01:14:42', '2023-03-17 01:36:05'),
(12, 4, '2023-03-17 08:09:00', '2023-03-17 08:10:00', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 08:09:00', '2023-03-17 08:10:01'),
(13, 1, '2023-03-17 17:02:59', '2023-03-17 17:03:59', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 17:02:59', '2023-03-17 17:03:53'),
(14, 2, '2023-03-17 17:47:01', '2023-03-17 17:48:01', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 17:47:01', '2023-03-17 17:47:52'),
(15, 1, '2023-03-17 17:56:33', '2023-03-17 17:57:33', '2023-03-17', '12.035137', '75.3610936', 'Thaliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', '10', 0, '100', '136', '8', '12', '158', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 17:56:33', '2023-03-17 17:57:36'),
(16, 1, '2023-03-17 19:16:12', '2023-03-17 19:17:12', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Poor vehicle condition', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 19:16:12', '2023-03-17 19:16:36'),
(18, 1, '2023-03-17 19:24:34', '2023-03-17 19:25:34', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 1, NULL, '50', NULL, 6, NULL, '3', NULL, '2023-03-17 19:24:52', '2023-03-17 19:26:07', '0', '0', NULL, NULL, NULL, NULL, '2023-03-17 19:24:34', '2023-03-17 19:26:12'),
(19, 2, '2023-03-17 19:31:31', '2023-03-17 19:32:31', '2023-03-17', '11.9839615', '75.3142757', 'Railway Ticket Counter, Kannapuram, Kannapuram, Kerala, India', '11.9829926', '75.3137677', 'Madhavi Complex, Kannapuram, Kerala, India', 2, 12, '0.2', '1 min', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 1, '2023-03-17 07:00:00', '22', 'pay_LSVBOPWslcPAqF', 6, NULL, '4', NULL, '2023-03-17 19:31:59', '2023-03-17 19:34:27', '0', '0', NULL, NULL, NULL, NULL, '2023-03-17 19:31:31', '2023-03-17 19:35:16'),
(20, 4, '2023-03-18 02:34:29', '2023-03-18 02:35:29', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 1, '2023-03-17 07:00:00', '143', 'pay_LScOMyUbxYazKo', 6, NULL, NULL, NULL, '2023-03-18 02:35:00', '2023-03-18 03:03:09', '0', '0', NULL, NULL, NULL, NULL, '2023-03-18 02:34:29', '2023-03-18 03:03:09'),
(21, 4, '2023-03-18 03:23:08', '2023-03-18 03:24:08', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 1, '2023-03-17 07:00:00', '143', 'pay_LSdDy5TpYi7Lsn', 6, NULL, NULL, NULL, '2023-03-18 03:24:04', '2023-03-18 03:27:27', '0', '0', NULL, NULL, NULL, NULL, '2023-03-18 03:23:08', '2023-03-18 03:27:27'),
(22, 4, '2023-03-18 03:33:07', '2023-03-18 03:34:07', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 03:33:07', '2023-03-18 03:33:46'),
(23, 4, '2023-03-18 03:33:54', '2023-03-18 03:34:54', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 03:33:54', '2023-03-18 03:35:04'),
(24, 4, '2023-03-18 03:35:26', '2023-03-18 03:36:26', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 03:35:26', '2023-03-18 03:36:08'),
(25, 4, '2023-03-18 03:43:34', '2023-03-18 03:44:34', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', 1, 1, '2023-03-17 07:00:00', '143', 'pay_LSdYaCWZbSLAdY', 6, NULL, '5', NULL, '2023-03-18 03:43:50', '2023-03-18 03:44:32', '0', '0', NULL, NULL, NULL, NULL, '2023-03-18 03:43:34', '2023-03-18 05:46:42'),
(26, 4, '2023-03-18 05:52:34', '2023-03-18 05:53:34', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', 1, 1, '2023-03-17 07:00:00', '143', 'pay_LSfqTWvM1bYlW3', 6, NULL, '4', NULL, '2023-03-18 05:52:47', '2023-03-18 05:58:47', '0', '0', NULL, NULL, NULL, NULL, '2023-03-18 05:52:34', '2023-03-18 05:58:57'),
(27, 4, '2023-03-18 08:00:04', '2023-03-18 08:01:04', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 08:00:04', '2023-03-18 08:02:02'),
(28, 4, '2023-03-18 08:03:10', '2023-03-18 08:04:10', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 08:03:10', '2023-03-18 08:04:11'),
(29, 4, '2023-03-18 08:10:53', '2023-03-18 08:11:53', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 08:10:53', '2023-03-18 08:11:00'),
(30, 4, '2023-03-18 08:22:17', '2023-03-18 08:23:17', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 08:22:17', '2023-03-18 08:22:24'),
(31, 4, '2023-03-18 08:22:34', '2023-03-18 08:23:34', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 08:22:34', '2023-03-18 08:22:41'),
(32, 4, '2023-03-18 08:22:51', '2023-03-18 08:23:51', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 2, 'Driver Rejected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 08:22:51', '2023-03-18 08:22:56'),
(33, 1, '2023-03-18 19:16:19', '2023-03-18 19:17:19', '2023-03-18', '11.8559282', '75.4402993', 'Chala, Kannur, Kerala, India', '12.060481', '75.5802497', 'Payyavoor Shiva Kshethram, Ulikkal - Mundanoor- Payyavoor Road, Payyavoor, Kerala, India', 2, 12, '39.24', '1 hour 3 mins', '1', '372', '10', 0, '100', '372', '8', '31', '413', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-18 19:16:19', '2023-03-18 19:17:35'),
(34, 2, '2023-03-19 02:31:27', '2023-03-19 02:32:27', '2023-03-18', '11.9708992', '75.3116151', 'X8C6+9J5 Kannapuram, Kerala, India', '11.9635165', '75.3208107', 'Irinave, Kannapuram, Kerala, India', 2, 12, '1.89', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, '2023-03-19 02:32:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 02:31:27', '2023-03-19 02:33:11'),
(35, 1, '2023-03-19 02:49:41', '2023-03-19 02:50:41', '2023-03-18', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '12.035137', '75.3610936', 'Thaliparamba, Kerala, India', 2, 12, '18.32', '35 mins', '1', '163', '10', 0, '100', '163', '8', '14', '187', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 02:49:41', '2023-03-19 02:50:41'),
(36, 1, '2023-03-19 02:51:26', '2023-03-19 02:52:26', '2023-03-18', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 02:51:26', '2023-03-19 02:52:27'),
(37, 1, '2023-03-19 02:52:43', '2023-03-19 02:53:43', '2023-03-18', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 02:52:43', '2023-03-19 02:53:43'),
(38, 4, '2023-03-19 03:56:59', '2023-03-19 03:57:59', '2023-03-18', '11.8744767', '75.370365', 'V9FC+Q4X Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 2, 'On another ride', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 03:56:59', '2023-03-19 04:28:35'),
(39, 8, '2023-03-19 06:04:08', '2023-03-19 06:05:08', '2023-03-18', '11.8604721', '75.379657', 'V96H+5VM Thana, Kannur, Kerala, India', '11.8734833', '75.3944605', 'Melechovva shiva temple, Mele Chovva Road, Elayavoor, Kerala, India', 2, 12, '3.29', '9 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-18 07:00:00', '22', 'pay_LT4WRMqTDrwEAv', 6, NULL, NULL, NULL, '2023-03-19 06:06:02', '2023-03-19 06:07:22', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 06:04:08', '2023-03-19 06:07:22'),
(40, 8, '2023-03-19 06:15:32', '2023-03-19 06:16:32', '2023-03-18', '11.8603523', '75.3795674', 'V96H+4RW Thana, Kannur, Kerala, India', '19.2183307', '72.9780897', 'Thane, Maharashtra, India', 2, 12, '1042.89', '20 hours 17 mins', '1', '10409', '10', 0, '100', '10409', '8', '834', '11253', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 06:15:32', '2023-03-19 06:17:02'),
(41, 8, '2023-03-19 06:23:16', '2023-03-19 06:24:16', '2023-03-18', '11.8603829', '75.379565', 'V96H+5R4 Thana, Kannur, Kerala, India', '10.2622168', '76.2110491', 'Kadalayi Juma Masjid, Karumathra, Kerala, India', 1, 1, '226.66', '6 hours 26 mins', '1', '4573', '10', 0, '100', '4573', '5', '229', '4812', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 06:23:16', '2023-03-19 06:25:02'),
(42, 10, '2023-03-19 06:53:10', '2023-03-19 06:54:10', '2023-03-18', '11.8603217', '75.3795604', 'V96H+4RF Thana, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 12, '1.91', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 06:53:10', '2023-03-19 06:53:32'),
(43, 10, '2023-03-19 07:06:43', '2023-03-19 07:07:43', '2023-03-19', '11.8603152', '75.3795728', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 28, '1.91', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 07:06:43', '2023-03-19 07:07:43'),
(44, 10, '2023-03-19 07:07:50', '2023-03-19 07:08:50', '2023-03-19', '11.8603152', '75.3795728', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 28, '1.91', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT5ZMvfIN1oshS', 6, NULL, '1', 'driver sheri illa', '2023-03-19 07:08:03', '2023-03-19 07:08:45', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 07:07:50', '2023-03-19 07:09:02'),
(45, 11, '2023-03-19 07:10:59', '2023-03-19 07:11:59', '2023-03-19', '11.8659314', '75.380833', 'Kazanakotta - Anayidukk Road, Thana, Kannur, Kerala, India', '11.8709768', '75.3828414', 'Thana, Kannur, Kerala, India', 2, 29, '0.64', '2 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 2, 1, NULL, '22', NULL, 6, NULL, '5', NULL, '2023-03-19 07:11:13', '2023-03-19 07:11:37', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 07:10:59', '2023-03-19 07:11:49'),
(46, 10, '2023-03-19 07:25:18', '2023-03-19 07:26:18', '2023-03-19', '11.8603246', '75.379556', 'V96H+4RF Thana, Kannur, Kerala, India', '11.8746827', '75.3759219', 'Caltex, Kannur, Kerala, India', 2, 28, '2.1', '6 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT5rhIG8wB2AMB', 6, NULL, NULL, NULL, '2023-03-19 07:25:26', '2023-03-19 07:26:45', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 07:25:18', '2023-03-19 07:26:45'),
(47, 11, '2023-03-19 07:26:52', '2023-03-19 07:27:52', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8746827', '75.3759219', 'Caltex, Kannur, Kerala, India', 2, 29, '1.96', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT5wXfFD5QyqQV', 6, NULL, NULL, NULL, '2023-03-19 07:27:02', '2023-03-19 07:44:52', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 07:26:52', '2023-03-19 07:44:52'),
(48, 11, '2023-03-19 07:45:29', '2023-03-19 07:46:29', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 29, '1.76', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT6D9EUpulSXJX', 6, NULL, '5', 'koothara', '2023-03-19 07:45:44', '2023-03-19 07:58:58', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 07:45:29', '2023-03-19 07:59:12'),
(49, 11, '2023-03-19 09:36:51', '2023-03-19 09:37:51', '2023-03-19', '11.8684795', '75.3797158', 'V99H+9VW Kannur, Kerala, India', '11.8708925', '75.3946464', 'Chovva Higher Secondary School, Melechowa South, Kannur, Kerala, India', 2, 28, '2.34', '6 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT871MJyg9nqn1', 6, NULL, '5', NULL, '2023-03-19 09:37:18', '2023-03-19 09:38:13', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 09:36:51', '2023-03-19 09:38:19'),
(50, 8, '2023-03-19 14:06:40', '2023-03-19 14:07:40', '2023-03-19', '11.8650393', '75.3801899', 'V98J+238 Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 2, 28, '89.89', '2 hours 45 mins', '1', '879', '10', 0, '100', '879', '8', '71', '960', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 14:06:40', '2023-03-19 14:08:01'),
(51, 8, '2023-03-19 14:09:54', '2023-03-19 14:10:54', '2023-03-19', '11.8651468', '75.3801016', 'V98J+325 Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 3, 8, '89.87', '2 hours 45 mins', '1', '2222', '50', 0, '100', '2222', '5', '114', '2386', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 14:09:54', '2023-03-19 14:10:17'),
(52, 11, '2023-03-19 18:41:45', '2023-03-19 18:42:45', '2023-03-19', '11.8686162', '75.3797943', 'V99H+CWV Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 2, 28, '5.1', '14 mins', '1', '31', '10', 0, '100', '31', '8', '3', '44', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 18:41:45', '2023-03-19 18:42:38'),
(53, 11, '2023-03-19 18:42:44', '2023-03-19 18:43:44', '2023-03-19', '11.8686162', '75.3797943', 'V99H+CWV Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 2, 28, '5.1', '14 mins', '1', '31', '10', 0, '100', '31', '8', '3', '44', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 18:42:44', '2023-03-19 18:42:46'),
(54, 11, '2023-03-19 18:45:53', '2023-03-19 18:46:53', '2023-03-19', '11.8684487', '75.3797325', 'V99H+9VH Kannur, Kerala, India', '11.8688908', '75.3565214', 'Payyambalam, Kannur, Kerala, India', 2, 28, '4.33', '12 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LTHT1vEUNaC6ld', 6, NULL, '5', 'valare nalla manushyan', '2023-03-19 18:46:16', '2023-03-19 18:47:20', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 18:45:53', '2023-03-19 18:47:40'),
(55, 1, '2023-03-19 19:12:07', '2023-03-19 19:13:07', '2023-03-19', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 19:12:07', '2023-03-19 19:14:01'),
(56, 15, '2023-03-19 19:24:19', '2023-03-19 19:25:19', '2023-03-19', '11.8663413', '75.380381', 'Zainameen, Kazanakotta - Anayidukk Road, Anayiduck, Kannur, Kerala, India', '11.8742598', '75.378128', 'Capitol Mall, Thana, Kannur, Kerala, India', 2, 28, '1.61', '4 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, '2023-03-19 19:24:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 19:24:19', '2023-03-19 19:24:46'),
(57, 8, '2023-03-19 20:04:25', '2023-03-19 20:05:25', '2023-03-19', '11.8651441', '75.3800958', 'V98J+325 Kannur, Kerala, India', '11.8700529', '75.3671634', 'oCity Centre. Kannur, Fort Road, Kannur, Kerala, India', 2, 28, '2.77', '9 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:04:25', '2023-03-19 20:05:26'),
(58, 8, '2023-03-19 20:05:47', '2023-03-19 20:06:47', '2023-03-19', '11.8651441', '75.3800958', 'V98J+325 Kannur, Kerala, India', '11.8700529', '75.3671634', 'oCity Centre. Kannur, Fort Road, Kannur, Kerala, India', 2, 28, '2.77', '9 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:05:47', '2023-03-19 20:06:48'),
(59, 17, '2023-03-19 20:07:48', '2023-03-19 20:08:48', '2023-03-19', '11.8699631', '75.3769238', 'Kazhanakotta, Kannur, Kerala, India', '11.8036378', '75.4490386', 'Edakkad, Kerala, India', 3, 8, '13.33', '24 mins', '1', '308', '50', 0, '100', '308', '5', '18', '376', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:07:48', '2023-03-19 20:08:49'),
(60, 17, '2023-03-19 20:10:45', '2023-03-19 20:11:45', '2023-03-19', '11.8680631', '75.3781919', 'V99H+67G Kannur, Kerala, India', '11.2626228', '75.7673095', 'Kozhikode Beach, Kozhikode, Kerala', 2, 28, '90.49', '2 hours 45 mins', '1', '885', '10', 0, '100', '885', '8', '72', '967', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:10:45', '2023-03-19 20:11:40'),
(61, 1, '2023-03-19 20:35:54', '2023-03-19 20:36:54', '2023-03-19', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 20:35:54', '2023-03-19 20:36:55'),
(62, 8, '2023-03-19 21:05:57', '2023-03-19 21:06:57', '2023-03-19', '11.8603203', '75.3795949', 'V96H+4RH Thana, Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.15', '1 min', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, '2023-03-19 21:06:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 21:05:57', '2023-03-19 21:07:56'),
(63, 8, '2023-03-19 21:12:55', '2023-03-19 21:13:55', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 3, 8, '89.05', '2 hours 41 mins', '1', '2201', '50', 0, '100', '2201', '5', '113', '2364', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 21:12:55', '2023-03-19 21:13:55'),
(64, 8, '2023-03-19 21:14:21', '2023-03-19 21:15:21', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 3, 8, '89.05', '2 hours 41 mins', '1', '2201', '50', 0, '100', '2201', '5', '113', '2364', '75', '37.5', '12.5', '0', 2, 1, NULL, '2364', NULL, 6, NULL, '5', 'adipoli trip👍', '2023-03-19 21:15:25', '2023-03-19 21:16:08', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 21:14:21', '2023-03-19 21:16:38'),
(65, 8, '2023-03-19 21:17:14', '2023-03-19 21:18:14', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8639827', '75.3740408', 'Anjukandy - Chirakkalkulam Road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.83', '2 mins', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Poor vehicle condition', NULL, NULL, '2023-03-19 21:17:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 21:17:14', '2023-03-19 21:18:13'),
(66, 8, '2023-03-19 21:19:10', '2023-03-19 21:20:10', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8639827', '75.3740408', 'Anjukandy - Chirakkalkulam Road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.83', '2 mins', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 2, 'Driver Rejected', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 21:19:10', '2023-03-19 21:19:15'),
(67, 8, '2023-03-19 21:29:08', '2023-03-19 21:30:08', '2023-03-19', '11.860379', '75.379559', 'V96H+5R3 Thana, Kannur, Kerala, India', '11.8639827', '75.3740408', 'Anjukandy - Chirakkalkulam Road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.83', '2 mins', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', 1, 1, '2023-03-19 07:00:00', '79', 'pay_LTKeYSrbyqURgw', 3, 'Poor vehicle condition', NULL, NULL, '2023-03-19 21:29:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 21:29:08', '2023-03-19 21:55:14'),
(68, 9, '2023-03-19 22:00:49', '2023-03-19 22:01:49', '2023-03-19', '11.842445', '75.4213622', 'Thottada, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 18, '7.26', '14 mins', '1', '53', '10', 0, '100', '53', '8', '5', '68', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, '2023-03-19 22:01:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 22:00:49', '2023-03-19 22:04:35'),
(69, 9, '2023-03-19 22:06:14', '2023-03-19 22:07:14', '2023-03-19', '11.842445', '75.4213622', 'Thottada, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 18, '7.26', '14 mins', '1', '53', '10', 0, '100', '53', '8', '5', '68', '75', '7.5', '2.5', '0', 2, 1, NULL, '68', NULL, 6, NULL, NULL, NULL, '2023-03-19 22:06:22', '2023-03-19 23:21:21', '0', '0', NULL, NULL, NULL, NULL, '2023-03-19 22:06:14', '2023-03-19 23:21:21'),
(70, 18, '2023-03-19 23:22:09', '2023-03-19 23:23:09', '2023-03-19', '11.8603181', '75.3795543', 'V96H+4RF Thana, Kannur, Kerala, India', '11.8535046', '75.376635', 'Aayikkara Sea View Point, Ayikkara Sea View Road, Burnacherry, Kannur, Kerala, India', 3, 8, '3.01', '8 mins', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, '2023-03-19 23:23:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-19 23:22:09', '2023-03-20 02:39:47'),
(71, 1, '2023-03-20 02:46:29', '2023-03-20 02:47:29', '2023-03-19', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 02:46:29', '2023-03-20 02:48:01'),
(72, 1, '2023-03-20 02:49:29', '2023-03-20 02:50:29', '2023-03-19', '11.9320454', '75.3954791', 'W9JW+R59 Pullooppi, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '9.53', '21 mins', '1', '75', '10', 0, '100', '75', '8', '7', '92', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 02:49:29', '2023-03-20 02:51:02'),
(73, 1, '2023-03-20 02:51:02', '2023-03-20 02:52:02', '2023-03-19', '11.9320681', '75.3954662', 'W9JW+R5G Pullooppi, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 28, '9.53', '21 mins', '1', '75', '10', 0, '100', '75', '8', '7', '92', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 02:51:02', '2023-03-20 02:51:09'),
(74, 1, '2023-03-20 02:54:56', '2023-03-20 02:55:56', '2023-03-19', '11.9320681', '75.3954662', 'W9JW+R5G Pullooppi, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '9.53', '21 mins', '1', '75', '10', 0, '100', '75', '8', '7', '92', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 02:54:56', '2023-03-20 02:56:01'),
(75, 8, '2023-03-20 03:26:44', '2023-03-20 03:27:44', '2023-03-19', '11.8604166', '75.3794648', 'Lilpops, KT Ward, Thana, Kannur, Kerala, India', '11.7539017', '75.492261', 'Thalassery railway station, Railway Station Road, Pallithazhe, Chonadam, Thalassery, Kerala, India', 1, 1, '19.28', '35 mins', '1', '426', '10', 0, '100', '426', '5', '22', '458', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 03:26:44', '2023-03-20 03:27:14'),
(76, 11, '2023-03-20 03:37:38', '2023-03-20 03:38:38', '2023-03-19', '11.8659314', '75.380833', 'Kazanakotta - Anayidukk Road, Thana, Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 2, 18, '0.85', '4 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 03:37:38', '2023-03-20 03:37:54'),
(77, 11, '2023-03-20 03:37:59', '2023-03-20 03:38:59', '2023-03-19', '11.8659314', '75.380833', 'Kazanakotta - Anayidukk Road, Thana, Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 2, 28, '0.85', '4 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LTQpv4jW3mFnVj', 3, 'Wrongly requested', NULL, NULL, '2023-03-20 03:39:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 03:37:59', '2023-03-20 04:10:32'),
(78, 9, '2023-03-20 05:25:25', '2023-03-20 05:26:25', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8699631', '75.3769238', 'Thayatheru, Kannur, Kerala, India', 2, 28, '1.13', '3 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 05:25:25', '2023-03-20 05:27:01'),
(79, 11, '2023-03-20 05:38:50', '2023-03-20 05:39:50', '2023-03-19', '11.8590942', '75.3820734', 'V95J+JRP Kodaparamba, Kannur, Kerala, India', '11.8631307', '75.3922237', 'Marakkarkandy, Kannur, Kerala, India', 2, 28, '1.41', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', 2, 1, NULL, '22', NULL, 6, NULL, NULL, NULL, '2023-03-20 05:39:09', '2023-03-20 05:39:24', '0', '0', NULL, NULL, NULL, NULL, '2023-03-20 05:38:50', '2023-03-20 05:39:24'),
(80, 1, '2023-03-20 05:50:47', '2023-03-20 05:51:47', '2023-03-19', '11.9321028', '75.395462', 'W9JW+R5W Pullooppi, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '6.31', '14 mins', '1', '43', '10', 0, '100', '43', '8', '4', '57', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 05:50:47', '2023-03-20 05:51:47'),
(81, 9, '2023-03-20 06:10:14', '2023-03-20 06:11:14', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 3, 8, '4.56', '11 mins', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 06:10:14', '2023-03-20 06:12:01'),
(82, 1, '2023-03-20 18:07:14', '2023-03-20 18:08:14', '2023-03-20', '11.8478478', '75.4306303', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', '10', 0, '100', '65', '8', '6', '81', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 18:07:14', '2023-03-20 18:08:43'),
(83, 1, '2023-03-20 18:09:25', '2023-03-20 18:10:25', '2023-03-20', '11.8478439', '75.4306285', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', '10', 0, '100', '65', '8', '6', '81', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 18:09:25', '2023-03-20 18:10:39'),
(84, 1, '2023-03-20 18:11:22', '2023-03-20 18:12:22', '2023-03-20', '11.8478439', '75.4306285', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', '10', 0, '100', '65', '8', '6', '81', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 18:11:22', '2023-03-20 18:12:22'),
(85, 9, '2023-03-20 18:27:10', '2023-03-20 18:28:10', '2023-03-20', '11.8683493', '75.3760227', 'Thayatheru Moideen Masjid, Thayatheru, Thavakkara, Kannur, Kerala, India', '11.8455839', '75.4031279', 'KADALAYI SOUTH UP SCHOOL, Adikadalayi Road, Kannur, Kerala, India', 3, 8, '5.33', '12 mins', '1', '108', '50', 0, '100', '108', '5', '8', '166', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 18:27:10', '2023-03-20 18:28:12'),
(86, 1, '2023-03-20 19:03:28', '2023-03-20 19:04:28', '2023-03-20', '11.8478453', '75.4306245', 'RCXJ+46Q Chala, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '12.91', '26 mins', '1', '109', '10', 0, '100', '109', '8', '10', '129', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Poor vehicle condition', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 19:03:28', '2023-03-20 19:03:44'),
(87, 1, '2023-03-20 19:44:11', '2023-03-20 19:45:11', '2023-03-20', '11.8478447', '75.4306262', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', '10', 0, '100', '65', '8', '6', '81', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Delay on driver arrival', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 19:44:11', '2023-03-20 19:44:19'),
(88, 9, '2023-03-20 20:39:45', '2023-03-20 20:40:45', '2023-03-20', '11.8677182', '75.3774694', 'V99G+3XQ Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 3, 8, '1.08', '3 mins', '1', '25', '50', 0, '100', '25', '5', '4', '79', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 20:39:45', '2023-03-20 20:40:46'),
(89, 9, '2023-03-20 20:50:18', '2023-03-20 20:51:18', '2023-03-20', '11.8677819', '75.3777066', 'V99H+438 Kannur, Kerala, India', '11.8455839', '75.4031279', 'KADALAYI SOUTH UP SCHOOL, Adikadalayi Road, Kannur, Kerala, India', 3, 8, '5.41', '13 mins', '1', '110', '50', 0, '100', '110', '5', '8', '168', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-20 20:50:18', '2023-03-21 01:25:32'),
(90, 9, '2023-03-21 01:27:01', '2023-03-21 01:28:01', '2023-03-20', '11.8603838', '75.3796314', 'V96H+5V2 Thana, Kannur, Kerala, India', '11.0357728', '75.9383404', 'Kakkad, Kerala, India', 2, 12, '122.75', '3 hours 32 mins', '1', '1208', '10', 0, '100', '1208', '8', '97', '1315', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 01:27:01', '2023-03-21 01:28:01'),
(91, 8, '2023-03-21 05:36:40', '2023-03-21 05:37:40', '2023-03-20', '11.8655302', '75.3788079', 'V98H+6G7 Kannur, Kerala, India', '19.2183307', '72.9780897', 'Thane, Maharashtra, India', 3, 8, '1042.27', '20 hours 16 mins', '1', '26032', '50', 0, '100', '26032', '5', '1304', '27386', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 05:36:40', '2023-03-21 05:37:07'),
(92, 8, '2023-03-21 05:38:11', '2023-03-21 05:39:11', '2023-03-20', '11.8655811', '75.3787114', 'V98H+6FP Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 2, 28, '4.91', '13 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 05:38:11', '2023-03-21 05:39:01'),
(93, 8, '2023-03-21 19:04:37', '2023-03-21 19:05:37', '2023-03-21', '11.8701694', '75.376252', 'V9CG+3G6 Kannur, Kerala, India', '19.2183307', '72.9780897', 'Thane, Maharashtra, India', 3, 8, '1041.69', '20 hours 15 mins', '1', '26017', '50', 0, '100', '26017', '5', '1303', '27370', '75', '37.5', '12.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Rash Driving', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 19:04:37', '2023-03-21 19:05:08'),
(94, 11, '2023-03-21 19:17:48', '2023-03-21 19:18:48', '2023-03-21', '11.8700809', '75.3762368', 'V9CG+2FQ Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 2, 28, '1.1', '3 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', NULL, 0, NULL, NULL, NULL, 3, 'Wrongly requested', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 19:17:48', '2023-03-21 19:18:09');

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
(2, '17', 'GKB17', 1, '2023-03-17 19:21:48', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-17 07:00:00', '50', 'pay_LSV1r7J1gmwgLe', 6, '', '2', NULL, '2023-03-17 19:22:12', '2023-03-17 19:22:53', NULL, NULL, NULL, NULL, '2023-03-12 04:01:28', '2023-03-21 08:25:02'),
(3, '26', 'GKB26', 4, '2023-03-18 05:52:34', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-17 07:00:00', '143', 'pay_LSfqTWvM1bYlW3', 6, '', '4', NULL, '2023-03-18 05:52:47', '2023-03-18 05:58:47', NULL, NULL, NULL, NULL, '2023-03-13 01:30:47', '2023-03-18 05:58:57'),
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
(15, '9', 'GKB9', 4, '2023-03-16 22:42:43', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', NULL, 1, '2023-03-16 07:00:00', '143', 'pay_LS9ueU7WcAEzWT', 6, '', NULL, NULL, '2023-03-16 22:44:02', '2023-03-16 22:44:37', NULL, NULL, NULL, NULL, '2023-03-16 22:44:37', '2023-03-20 08:25:01'),
(16, '18', 'GKB18', 1, '2023-03-17 19:24:34', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', '10', 0, '100', '36', '8', '4', '50', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '50', NULL, 6, '', '3', NULL, '2023-03-17 19:24:52', '2023-03-17 19:26:07', NULL, NULL, NULL, NULL, '2023-03-17 19:26:07', '2023-03-17 19:26:12'),
(17, '19', 'GKB19', 2, '2023-03-17 19:31:31', '2023-03-17', '11.9839615', '75.3142757', 'Railway Ticket Counter, Kannapuram, Kannapuram, Kerala, India', '11.9829926', '75.3137677', 'Madhavi Complex, Kannapuram, Kerala, India', 2, 12, '0.2', '1 min', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-17 07:00:00', '22', 'pay_LSVBOPWslcPAqF', 6, '', '4', NULL, '2023-03-17 19:31:59', '2023-03-17 19:34:27', NULL, NULL, NULL, NULL, '2023-03-17 19:34:27', '2023-03-17 19:35:16'),
(18, '20', 'GKB20', 4, '2023-03-18 02:34:29', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-17 07:00:00', '143', 'pay_LScOMyUbxYazKo', 6, '', NULL, NULL, '2023-03-18 02:35:00', '2023-03-18 03:03:09', NULL, NULL, NULL, NULL, '2023-03-18 03:03:09', '2023-03-18 03:03:09'),
(19, '21', 'GKB21', 4, '2023-03-18 03:23:08', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-17 07:00:00', '143', 'pay_LSdDy5TpYi7Lsn', 6, '', NULL, NULL, '2023-03-18 03:24:04', '2023-03-18 03:27:27', NULL, NULL, NULL, NULL, '2023-03-18 03:27:27', '2023-03-18 03:27:27'),
(20, '25', 'GKB25', 4, '2023-03-18 03:43:34', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', '10', 0, '100', '126', '5', '7', '143', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-17 07:00:00', '143', 'pay_LSdYaCWZbSLAdY', 6, '', '5', NULL, '2023-03-18 03:43:50', '2023-03-18 03:44:32', NULL, NULL, NULL, NULL, '2023-03-18 03:44:32', '2023-03-18 05:46:42'),
(21, '39', 'GKB39', 8, '2023-03-19 06:04:08', '2023-03-18', '11.8604721', '75.379657', 'V96H+5VM Thana, Kannur, Kerala, India', '11.8734833', '75.3944605', 'Melechovva shiva temple, Mele Chovva Road, Elayavoor, Kerala, India', 2, 12, '3.29', '9 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-18 07:00:00', '22', 'pay_LT4WRMqTDrwEAv', 6, '', NULL, NULL, '2023-03-19 06:06:02', '2023-03-19 06:07:22', NULL, NULL, NULL, NULL, '2023-03-19 06:07:22', '2023-03-19 06:07:22'),
(22, '44', 'GKB44', 10, '2023-03-19 07:07:50', '2023-03-19', '11.8603152', '75.3795728', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 28, '1.91', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT5ZMvfIN1oshS', 6, '', '1', 'driver sheri illa', '2023-03-19 07:08:03', '2023-03-19 07:08:45', NULL, NULL, NULL, NULL, '2023-03-19 07:08:45', '2023-03-19 07:09:02'),
(23, '45', 'GKB45', 11, '2023-03-19 07:10:59', '2023-03-19', '11.8659314', '75.380833', 'Kazanakotta - Anayidukk Road, Thana, Kannur, Kerala, India', '11.8709768', '75.3828414', 'Thana, Kannur, Kerala, India', 2, 29, '0.64', '2 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '22', NULL, 6, '', '5', NULL, '2023-03-19 07:11:13', '2023-03-19 07:11:37', NULL, NULL, NULL, NULL, '2023-03-19 07:11:37', '2023-03-19 07:11:49'),
(24, '46', 'GKB46', 10, '2023-03-19 07:25:18', '2023-03-19', '11.8603246', '75.379556', 'V96H+4RF Thana, Kannur, Kerala, India', '11.8746827', '75.3759219', 'Caltex, Kannur, Kerala, India', 2, 28, '2.1', '6 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT5rhIG8wB2AMB', 6, '', NULL, NULL, '2023-03-19 07:25:26', '2023-03-19 07:26:45', NULL, NULL, NULL, NULL, '2023-03-19 07:26:45', '2023-03-19 07:26:45'),
(25, '47', 'GKB47', 11, '2023-03-19 07:26:52', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8746827', '75.3759219', 'Caltex, Kannur, Kerala, India', 2, 29, '1.96', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT5wXfFD5QyqQV', 6, '', NULL, NULL, '2023-03-19 07:27:02', '2023-03-19 07:44:52', NULL, NULL, NULL, NULL, '2023-03-19 07:44:52', '2023-03-19 07:44:52'),
(26, '48', 'GKB48', 11, '2023-03-19 07:45:29', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 29, '1.76', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT6D9EUpulSXJX', 6, '', '5', 'koothara', '2023-03-19 07:45:44', '2023-03-19 07:58:58', NULL, NULL, NULL, NULL, '2023-03-19 07:58:58', '2023-03-19 07:59:12'),
(27, '49', 'GKB49', 11, '2023-03-19 09:36:51', '2023-03-19', '11.8684795', '75.3797158', 'V99H+9VW Kannur, Kerala, India', '11.8708925', '75.3946464', 'Chovva Higher Secondary School, Melechowa South, Kannur, Kerala, India', 2, 28, '2.34', '6 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LT871MJyg9nqn1', 6, '', '5', NULL, '2023-03-19 09:37:18', '2023-03-19 09:38:13', NULL, NULL, NULL, NULL, '2023-03-19 09:38:13', '2023-03-19 09:38:19'),
(28, '54', 'GKB54', 11, '2023-03-19 18:45:53', '2023-03-19', '11.8684487', '75.3797325', 'V99H+9VH Kannur, Kerala, India', '11.8688908', '75.3565214', 'Payyambalam, Kannur, Kerala, India', 2, 28, '4.33', '12 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', 1, 1, '2023-03-19 07:00:00', '22', 'pay_LTHT1vEUNaC6ld', 6, '', '5', 'valare nalla manushyan', '2023-03-19 18:46:16', '2023-03-19 18:47:20', NULL, NULL, NULL, NULL, '2023-03-19 18:47:20', '2023-03-19 18:47:40'),
(29, '64', 'GKB64', 8, '2023-03-19 21:14:21', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 3, 8, '89.05', '2 hours 41 mins', '1', '2201', '50', 0, '100', '2201', '5', '113', '2364', '75', '37.5', '12.5', '0', '0', '0', NULL, 0, NULL, '2364', NULL, 6, '', '5', 'adipoli trip👍', '2023-03-19 21:15:25', '2023-03-19 21:16:08', NULL, NULL, NULL, NULL, '2023-03-19 21:16:08', '2023-03-19 21:16:38'),
(30, '69', 'GKB69', 9, '2023-03-19 22:06:14', '2023-03-19', '11.842445', '75.4213622', 'Thottada, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 18, '7.26', '14 mins', '1', '53', '10', 0, '100', '53', '8', '5', '68', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '68', NULL, 6, '', NULL, NULL, '2023-03-19 22:06:22', '2023-03-19 23:21:21', NULL, NULL, NULL, NULL, '2023-03-19 23:21:21', '2023-03-19 23:21:21'),
(31, '79', 'GKB79', 11, '2023-03-20 05:38:50', '2023-03-19', '11.8590942', '75.3820734', 'V95J+JRP Kodaparamba, Kannur, Kerala, India', '11.8631307', '75.3922237', 'Marakkarkandy, Kannur, Kerala, India', 2, 28, '1.41', '5 mins', '1', '10', '10', 0, '100', '10', '8', '2', '22', '75', '7.5', '2.5', '0', '0', '0', NULL, 0, NULL, '22', NULL, 6, '', NULL, NULL, '2023-03-20 05:39:09', '2023-03-20 05:39:24', NULL, NULL, NULL, NULL, '2023-03-20 05:39:24', '2023-03-20 05:39:24');

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

--
-- Dumping data for table `unfinished_bookings`
--

INSERT INTO `unfinished_bookings` (`id`, `bid`, `booking_id`, `customer_id`, `booked_at`, `booked_date`, `from_latitude`, `from_longitude`, `from_location`, `to_latitude`, `to_longitude`, `to_location`, `vehicle_type`, `driver_id`, `distance`, `time`, `franchise`, `fare`, `night_ride`, `payment_type`, `payment_status`, `payment_date`, `paid_amount`, `reference_id`, `refund_status`, `total_fare`, `started_at`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, '1', 'GKB1', 1, '2023-03-16 19:01:05', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-11 21:08:01', '2023-03-16 19:01:33'),
(2, '2', 'GKB2', 1, '2023-03-16 19:02:19', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 00:57:02', '2023-03-16 19:05:42'),
(3, '3', 'GKB3', 1, '2023-03-16 19:06:47', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 02:21:34', '2023-03-16 19:14:02'),
(4, '4', 'GKB4', 1, '2023-03-16 19:27:02', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 02:22:47', '2023-03-16 19:29:01'),
(5, '5', 'GKB5', 1, '2023-03-16 19:30:24', '2023-03-16', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.9387372', '75.4038798', 'Kannadiparamba, Kerala, India', 2, 12, '8.76', '17 mins', '1', '68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 03:09:08', '2023-03-16 19:32:01'),
(6, '6', 'GKB6', 1, '2023-03-16 19:33:02', '2023-03-16', '12.035137', '75.3610936', 'Taliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 03:10:59', '2023-03-16 19:35:01'),
(7, '8', 'GKB8', 4, '2023-03-16 21:59:20', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 03:13:24', '2023-03-16 22:01:01'),
(8, '9', 'GKB9', 4, '2023-03-12 03:13:49', '2023-03-11', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 03:15:59', '2023-03-12 03:15:59'),
(9, '7', 'GKB7', 4, '2023-03-16 21:57:27', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 03:19:33', '2023-03-16 21:59:01'),
(10, '10', 'GKB10', 4, '2023-03-16 22:51:17', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 03:22:58', '2023-03-16 22:56:22'),
(11, '12', 'GKB12', 4, '2023-03-17 08:09:00', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-12 03:23:29', '2023-03-17 08:10:01'),
(12, '13', 'GKB13', 1, '2023-03-17 17:02:59', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Delay on driver arrival', '2023-03-12 03:25:00', '2023-03-17 17:03:53'),
(13, '11', 'GKB11', 4, '2023-03-17 01:14:42', '2023-03-16', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 03:25:56', '2023-03-17 01:36:05'),
(14, '14', 'GKB14', 2, '2023-03-17 17:47:01', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-12 03:27:06', '2023-03-17 17:47:52'),
(15, '16', 'GKB16', 1, '2023-03-17 19:16:12', '2023-03-17', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Poor vehicle condition', '2023-03-12 03:41:34', '2023-03-17 19:16:36'),
(16, '19', 'GKB19', 1, '2023-03-12 23:05:42', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 23:06:24', '2023-03-12 23:06:24'),
(17, '20', 'GKB20', 1, '2023-03-12 23:21:39', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 23:22:10', '2023-03-12 23:22:10'),
(18, '21', 'GKB21', 1, '2023-03-12 23:28:51', '2023-03-12', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '12 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-12 23:30:26', '2023-03-12 23:30:26'),
(19, '22', 'GKB22', 4, '2023-03-18 03:33:07', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-12 23:31:37', '2023-03-18 03:33:46'),
(20, '23', 'GKB23', 4, '2023-03-18 03:33:54', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-12 23:59:23', '2023-03-18 03:35:04'),
(21, '24', 'GKB24', 4, '2023-03-18 03:35:26', '2023-03-17', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-13 00:02:08', '2023-03-18 03:36:08'),
(22, '25', 'GKB25', 6, '2023-03-13 00:27:40', '2023-03-12', '11.9635165', '75.3208107', 'Irinave, Kannapuram, Kerala, India', '12.0041132', '75.3004009', 'Cherukunnu, Kerala, India', 2, 12, '6.17', '13 mins', '1', '42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-13 00:29:26', '2023-03-13 00:29:26'),
(23, '27', 'GKB27', 4, '2023-03-18 08:00:04', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'Driver Rejected', '2023-03-13 01:33:11', '2023-03-18 08:02:02'),
(24, '28', 'GKB28', 4, '2023-03-18 08:03:10', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'Driver Rejected', '2023-03-13 01:33:48', '2023-03-18 08:04:11'),
(25, '29', 'GKB29', 4, '2023-03-18 08:10:53', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-13 01:36:01', '2023-03-18 08:11:00'),
(26, '33', 'GKB33', 1, '2023-03-18 19:16:19', '2023-03-18', '11.8559282', '75.4402993', 'Chala, Kannur, Kerala, India', '12.060481', '75.5802497', 'Payyavoor Shiva Kshethram, Ulikkal - Mundanoor- Payyavoor Road, Payyavoor, Kerala, India', 2, 12, '39.24', '1 hour 3 mins', '1', '372', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-13 20:08:30', '2023-03-18 19:17:35'),
(27, '34', 'GKB34', 2, '2023-03-19 02:31:27', '2023-03-18', '11.9708992', '75.3116151', 'X8C6+9J5 Kannapuram, Kerala, India', '11.9635165', '75.3208107', 'Irinave, Kannapuram, Kerala, India', 2, 12, '1.89', '5 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-13 20:44:09', '2023-03-19 02:33:11'),
(28, '36', 'GKB36', 1, '2023-03-19 02:51:26', '2023-03-18', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-13 21:47:39', '2023-03-19 02:52:27'),
(29, '37', 'GKB37', 1, '2023-03-19 02:52:43', '2023-03-18', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-13 21:57:49', '2023-03-19 02:53:43'),
(30, '38', 'GKB38', 4, '2023-03-19 03:56:59', '2023-03-18', '11.8744767', '75.370365', 'V9FC+Q4X Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'On another ride', '2023-03-13 22:13:04', '2023-03-19 04:28:35'),
(31, '39', 'GKB39', 4, '2023-03-13 22:15:29', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-13 22:16:09', '2023-03-13 22:16:09'),
(32, '44', 'GKB44', 4, '2023-03-13 22:42:35', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-13 22:42:48', '2023-03-13 22:42:48'),
(33, '45', 'GKB45', 4, '2023-03-13 22:43:10', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'ppp', '2023-03-13 23:06:04', '2023-03-13 23:06:04'),
(34, '46', 'GKB46', 4, '2023-03-13 23:06:31', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-13 23:06:46', '2023-03-13 23:06:46'),
(35, '47', 'GKB47', 4, '2023-03-13 23:06:56', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-13 23:07:08', '2023-03-13 23:07:08'),
(36, '48', 'GKB48', 4, '2023-03-13 23:07:20', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-13 23:07:28', '2023-03-13 23:07:28'),
(37, '49', 'GKB49', 4, '2023-03-13 23:07:35', '2023-03-13', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-13 23:07:44', '2023-03-13 23:07:44'),
(38, '51', 'GKB51', 8, '2023-03-19 14:09:54', '2023-03-19', '11.8651468', '75.3801016', 'V98J+325 Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 3, 8, '89.87', '2 hours 45 mins', '1', '2222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Rash Driving', '2023-03-14 03:16:23', '2023-03-19 14:10:17'),
(39, '54', 'GKB54', 4, '2023-03-15 09:26:06', '2023-03-15', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.4725502', '76.3820088', 'Devala, Tamil Nadu, India', 1, 1, '164.26', '4 hours 32 mins', '1', '3325', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'reason', '2023-03-15 09:26:38', '2023-03-15 09:26:38'),
(40, '55', 'GKB55', 1, '2023-03-19 19:12:07', '2023-03-19', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-15 09:27:11', '2023-03-19 19:14:01'),
(41, '56', 'GKB56', 15, '2023-03-19 19:24:19', '2023-03-19', '11.8663413', '75.380381', 'Zainameen, Kazanakotta - Anayidukk Road, Anayiduck, Kannur, Kerala, India', '11.8742598', '75.378128', 'Capitol Mall, Thana, Kannur, Kerala, India', 2, 28, '1.61', '4 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-15 09:27:39', '2023-03-19 19:24:46'),
(42, '57', 'GKB57', 8, '2023-03-19 20:04:25', '2023-03-19', '11.8651441', '75.3800958', 'V98J+325 Kannur, Kerala, India', '11.8700529', '75.3671634', 'oCity Centre. Kannur, Fort Road, Kannur, Kerala, India', 2, 28, '2.77', '9 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Rash Driving', '2023-03-15 22:23:53', '2023-03-19 20:05:26'),
(43, '58', 'GKB58', 8, '2023-03-19 20:05:47', '2023-03-19', '11.8651441', '75.3800958', 'V98J+325 Kannur, Kerala, India', '11.8700529', '75.3671634', 'oCity Centre. Kannur, Fort Road, Kannur, Kerala, India', 2, 28, '2.77', '9 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-15 23:27:45', '2023-03-19 20:06:48'),
(44, '59', 'GKB59', 17, '2023-03-19 20:07:48', '2023-03-19', '11.8699631', '75.3769238', 'Kazhanakotta, Kannur, Kerala, India', '11.8036378', '75.4490386', 'Edakkad, Kerala, India', 3, 8, '13.33', '24 mins', '1', '308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'Driver Rejected', '2023-03-16 00:09:46', '2023-03-19 20:08:49'),
(45, '60', 'GKB60', 17, '2023-03-19 20:10:45', '2023-03-19', '11.8680631', '75.3781919', 'V99H+67G Kannur, Kerala, India', '11.2626228', '75.7673095', 'Kozhikode Beach, Kozhikode, Kerala', 2, 28, '90.49', '2 hours 45 mins', '1', '885', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Delay on driver arrival', '2023-03-16 00:13:52', '2023-03-19 20:11:40'),
(46, '61', 'GKB61', 1, '2023-03-19 20:35:54', '2023-03-19', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, 'reason', '2023-03-16 02:49:37', '2023-03-19 20:36:55'),
(47, '62', 'GKB62', 8, '2023-03-19 21:05:57', '2023-03-19', '11.8603203', '75.3795949', 'V96H+4RH Thana, Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.15', '1 min', '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Delay on driver arrival', '2023-03-16 04:25:16', '2023-03-19 21:07:56'),
(48, '15', 'GKB15', 1, '2023-03-17 17:56:33', '2023-03-17', '12.035137', '75.3610936', 'Thaliparamba, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '15.61', '26 mins', '1', '136', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Rash Driving', '2023-03-17 17:57:36', '2023-03-17 17:57:36'),
(49, '30', 'GKB30', 4, '2023-03-18 08:22:17', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-18 08:22:24', '2023-03-18 08:22:24'),
(50, '31', 'GKB31', 4, '2023-03-18 08:22:34', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-18 08:22:41', '2023-03-18 08:22:41'),
(51, '32', 'GKB32', 4, '2023-03-18 08:22:51', '2023-03-18', '11.8744775', '75.3703662', 'Kannur, Kerala, India', '11.8805774', '75.4013081', 'Elayavoor, Kerala, India', 1, 1, '4.3', '9 mins', '1', '126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-18 08:22:56', '2023-03-18 08:22:56'),
(52, '35', 'GKB35', 1, '2023-03-19 02:49:41', '2023-03-18', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '12.035137', '75.3610936', 'Thaliparamba, Kerala, India', 2, 12, '18.32', '35 mins', '1', '163', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 02:50:41', '2023-03-19 02:50:41'),
(53, '40', 'GKB40', 8, '2023-03-19 06:15:32', '2023-03-18', '11.8603523', '75.3795674', 'V96H+4RW Thana, Kannur, Kerala, India', '19.2183307', '72.9780897', 'Thane, Maharashtra, India', 2, 12, '1042.89', '20 hours 17 mins', '1', '10409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 06:17:02', '2023-03-19 06:17:02'),
(54, '41', 'GKB41', 8, '2023-03-19 06:23:16', '2023-03-18', '11.8603829', '75.379565', 'V96H+5R4 Thana, Kannur, Kerala, India', '10.2622168', '76.2110491', 'Kadalayi Juma Masjid, Karumathra, Kerala, India', 1, 1, '226.66', '6 hours 26 mins', '1', '4573', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 06:25:02', '2023-03-19 06:25:02'),
(55, '42', 'GKB42', 10, '2023-03-19 06:53:10', '2023-03-18', '11.8603217', '75.3795604', 'V96H+4RF Thana, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 12, '1.91', '5 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Delay on driver arrival', '2023-03-19 06:53:32', '2023-03-19 06:53:32'),
(56, '43', 'GKB43', 10, '2023-03-19 07:06:43', '2023-03-19', '11.8603152', '75.3795728', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 28, '1.91', '5 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 07:07:43', '2023-03-19 07:07:43'),
(57, '50', 'GKB50', 8, '2023-03-19 14:06:40', '2023-03-19', '11.8650393', '75.3801899', 'V98J+238 Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 2, 28, '89.89', '2 hours 45 mins', '1', '879', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 14:08:01', '2023-03-19 14:08:01'),
(58, '52', 'GKB52', 11, '2023-03-19 18:41:45', '2023-03-19', '11.8686162', '75.3797943', 'V99H+CWV Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 2, 28, '5.1', '14 mins', '1', '31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-19 18:42:38', '2023-03-19 18:42:38'),
(59, '53', 'GKB53', 11, '2023-03-19 18:42:44', '2023-03-19', '11.8686162', '75.3797943', 'V99H+CWV Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 2, 28, '5.1', '14 mins', '1', '31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 18:42:46', '2023-03-19 18:42:46'),
(60, '63', 'GKB63', 8, '2023-03-19 21:12:55', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.2587531', '75.78041', 'Calicut, Kerala, India', 3, 8, '89.05', '2 hours 41 mins', '1', '2201', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-19 21:13:55', '2023-03-19 21:13:55'),
(61, '65', 'GKB65', 8, '2023-03-19 21:17:14', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8639827', '75.3740408', 'Anjukandy - Chirakkalkulam Road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.83', '2 mins', '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Poor vehicle condition', '2023-03-19 21:18:13', '2023-03-19 21:18:13'),
(62, '66', 'GKB66', 8, '2023-03-19 21:19:10', '2023-03-19', '11.8603229', '75.3795699', 'V96H+4RG Thana, Kannur, Kerala, India', '11.8639827', '75.3740408', 'Anjukandy - Chirakkalkulam Road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.83', '2 mins', '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 2, 'Driver Rejected', '2023-03-19 21:19:15', '2023-03-19 21:19:15'),
(63, '67', 'GKB67', 8, '2023-03-19 21:29:08', '2023-03-19', '11.860379', '75.379559', 'V96H+5R3 Thana, Kannur, Kerala, India', '11.8639827', '75.3740408', 'Anjukandy - Chirakkalkulam Road, Thavakkara, Kannur, Kerala, India', 3, 8, '0.83', '2 mins', '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Poor vehicle condition', '2023-03-19 21:55:14', '2023-03-19 21:55:14'),
(64, '68', 'GKB68', 9, '2023-03-19 22:00:49', '2023-03-19', '11.842445', '75.4213622', 'Thottada, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 2, 18, '7.26', '14 mins', '1', '53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Rash Driving', '2023-03-19 22:04:35', '2023-03-19 22:04:35'),
(65, '70', 'GKB70', 18, '2023-03-19 23:22:09', '2023-03-19', '11.8603181', '75.3795543', 'V96H+4RF Thana, Kannur, Kerala, India', '11.8535046', '75.376635', 'Aayikkara Sea View Point, Ayikkara Sea View Road, Burnacherry, Kannur, Kerala, India', 3, 8, '3.01', '8 mins', '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-20 02:39:47', '2023-03-20 02:39:47'),
(66, '71', 'GKB71', 1, '2023-03-20 02:46:29', '2023-03-19', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '5.58', '11 mins', '1', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 02:48:01', '2023-03-20 02:48:01'),
(67, '72', 'GKB72', 1, '2023-03-20 02:49:29', '2023-03-19', '11.9320454', '75.3954791', 'W9JW+R59 Pullooppi, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '9.53', '21 mins', '1', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 02:51:02', '2023-03-20 02:51:02'),
(68, '73', 'GKB73', 1, '2023-03-20 02:51:02', '2023-03-19', '11.9320681', '75.3954662', 'W9JW+R5G Pullooppi, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 28, '9.53', '21 mins', '1', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-20 02:51:09', '2023-03-20 02:51:09'),
(69, '74', 'GKB74', 1, '2023-03-20 02:54:56', '2023-03-19', '11.9320681', '75.3954662', 'W9JW+R5G Pullooppi, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '9.53', '21 mins', '1', '75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 02:56:01', '2023-03-20 02:56:01'),
(70, '75', 'GKB75', 8, '2023-03-20 03:26:44', '2023-03-19', '11.8604166', '75.3794648', 'Lilpops, KT Ward, Thana, Kannur, Kerala, India', '11.7539017', '75.492261', 'Thalassery railway station, Railway Station Road, Pallithazhe, Chonadam, Thalassery, Kerala, India', 1, 1, '19.28', '35 mins', '1', '426', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Delay on driver arrival', '2023-03-20 03:27:14', '2023-03-20 03:27:14'),
(71, '76', 'GKB76', 11, '2023-03-20 03:37:38', '2023-03-19', '11.8659314', '75.380833', 'Kazanakotta - Anayidukk Road, Thana, Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 2, 18, '0.85', '4 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-20 03:37:54', '2023-03-20 03:37:54'),
(72, '77', 'GKB77', 11, '2023-03-20 03:37:59', '2023-03-19', '11.8659314', '75.380833', 'Kazanakotta - Anayidukk Road, Thana, Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 2, 28, '0.85', '4 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Wrongly requested', '2023-03-20 04:10:32', '2023-03-20 04:10:32'),
(73, '78', 'GKB78', 9, '2023-03-20 05:25:25', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8699631', '75.3769238', 'Thayatheru, Kannur, Kerala, India', 2, 28, '1.13', '3 mins', '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 05:27:01', '2023-03-20 05:27:01'),
(74, '80', 'GKB80', 1, '2023-03-20 05:50:47', '2023-03-19', '11.9321028', '75.395462', 'W9JW+R5W Pullooppi, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '6.31', '14 mins', '1', '43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 05:51:47', '2023-03-20 05:51:47'),
(75, '81', 'GKB81', 9, '2023-03-20 06:10:14', '2023-03-19', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 3, 8, '4.56', '11 mins', '1', '25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 06:12:01', '2023-03-20 06:12:01'),
(76, '82', 'GKB82', 1, '2023-03-20 18:07:14', '2023-03-20', '11.8478478', '75.4306303', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 18:08:43', '2023-03-20 18:08:43'),
(77, '83', 'GKB83', 1, '2023-03-20 18:09:25', '2023-03-20', '11.8478439', '75.4306285', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 18:10:39', '2023-03-20 18:10:39'),
(78, '84', 'GKB84', 1, '2023-03-20 18:11:22', '2023-03-20', '11.8478439', '75.4306285', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 18:12:22', '2023-03-20 18:12:22'),
(79, '85', 'GKB85', 9, '2023-03-20 18:27:10', '2023-03-20', '11.8683493', '75.3760227', 'Thayatheru Moideen Masjid, Thayatheru, Thavakkara, Kannur, Kerala, India', '11.8455839', '75.4031279', 'KADALAYI SOUTH UP SCHOOL, Adikadalayi Road, Kannur, Kerala, India', 3, 8, '5.33', '12 mins', '1', '108', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 4, NULL, '2023-03-20 18:28:12', '2023-03-20 18:28:12'),
(80, '86', 'GKB86', 1, '2023-03-20 19:03:28', '2023-03-20', '11.8478453', '75.4306245', 'RCXJ+46Q Chala, Kerala, India', '11.9143611', '75.3630796', 'Puthiyatheru, Kerala, India', 2, 12, '12.91', '26 mins', '1', '109', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 3, 'Poor vehicle condition', '2023-03-20 19:03:44', '2023-03-20 19:03:44'),
(81, '87', 'GKB87', 1, '2023-03-20 19:44:11', '2023-03-20', '11.8478447', '75.4306262', 'RCXJ+47J Chala, Kerala, India', '11.8744775', '75.3703662', 'Kannur, Kerala, India', 2, 12, '8.47', '17 mins', '1', '65', 0, NULL, 0, NULL, '81', NULL, 0, '81', NULL, 3, 'Delay on driver arrival', '2023-03-20 19:44:19', '2023-03-20 19:44:19'),
(82, '88', 'GKB88', 9, '2023-03-20 20:39:45', '2023-03-20', '11.8677182', '75.3774694', 'V99G+3XQ Kannur, Kerala, India', '11.8750524', '75.3741839', 'Caltex Junction, Puzhathi Housing Colony, Kannur, Kerala', 3, 8, '1.08', '3 mins', '1', '25', 0, NULL, 0, NULL, '79', NULL, 0, '79', NULL, 4, NULL, '2023-03-20 20:40:46', '2023-03-20 20:40:46'),
(84, '89', 'GKB89', 9, '2023-03-20 20:50:18', '2023-03-20', '11.8677819', '75.3777066', 'V99H+438 Kannur, Kerala, India', '11.8455839', '75.4031279', 'KADALAYI SOUTH UP SCHOOL, Adikadalayi Road, Kannur, Kerala, India', 3, 8, '5.41', '13 mins', '1', '110', 0, NULL, 0, NULL, '168', NULL, 0, '168', NULL, 3, 'Wrongly requested', '2023-03-21 01:25:32', '2023-03-21 01:25:32'),
(85, '90', 'GKB90', 9, '2023-03-21 01:27:01', '2023-03-20', '11.8603838', '75.3796314', 'V96H+5V2 Thana, Kannur, Kerala, India', '11.0357728', '75.9383404', 'Kakkad, Kerala, India', 2, 12, '122.75', '3 hours 32 mins', '1', '1208', 0, NULL, 0, NULL, '1315', NULL, 0, '1315', NULL, 4, NULL, '2023-03-21 01:28:01', '2023-03-21 01:28:01'),
(86, '91', 'GKB91', 8, '2023-03-21 05:36:40', '2023-03-20', '11.8655302', '75.3788079', 'V98H+6G7 Kannur, Kerala, India', '19.2183307', '72.9780897', 'Thane, Maharashtra, India', 3, 8, '1042.27', '20 hours 16 mins', '1', '26032', 0, NULL, 0, NULL, '27386', NULL, 0, '27386', NULL, 3, 'Rash Driving', '2023-03-21 05:37:07', '2023-03-21 05:37:07'),
(87, '92', 'GKB92', 8, '2023-03-21 05:38:11', '2023-03-20', '11.8655811', '75.3787114', 'V98H+6FP Kannur, Kerala, India', '11.8715435', '75.3508739', 'Payyambalam Beach, Kerala', 2, 28, '4.91', '13 mins', '1', '10', 0, NULL, 0, NULL, '22', NULL, 0, '22', NULL, 3, 'Wrongly requested', '2023-03-21 05:38:52', '2023-03-21 05:38:52'),
(88, '93', 'GKB93', 8, '2023-03-21 19:04:37', '2023-03-21', '11.8701694', '75.376252', 'V9CG+3G6 Kannur, Kerala, India', '19.2183307', '72.9780897', 'Thane, Maharashtra, India', 3, 8, '1041.69', '20 hours 15 mins', '1', '26017', 0, NULL, 0, NULL, '27370', NULL, 0, '27370', NULL, 3, 'Rash Driving', '2023-03-21 19:05:01', '2023-03-21 19:05:01'),
(89, '94', 'GKB94', 11, '2023-03-21 19:17:48', '2023-03-21', '11.8700809', '75.3762368', 'V9CG+2FQ Kannur, Kerala, India', '11.8611111', '75.3786111', 'Kannur City Juma MASJID, road, Thavakkara, Kannur, Kerala, India', 2, 28, '1.1', '3 mins', '1', '10', 0, NULL, 0, NULL, '22', NULL, 0, '22', NULL, 3, 'Wrongly requested', '2023-03-21 19:18:09', '2023-03-21 19:18:09');

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
(8, 'bus', 1, 'vehicle_categories/1677412405.png', 2, '2023-02-27 00:23:25', '2023-03-08 00:55:14'),
(9, 'qaddw', 1, 'vehicle_categories/1679130708.png', 1, '2023-03-18 21:41:48', '2023-03-18 21:41:48');

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
(3, 2, '7 seater', '25', '100', '5', 'vehicle_types/1674397631.png', '50', '5', 100, '0', 2, NULL, NULL, NULL, 1, '2023-01-22 14:27:11', '2023-03-19 13:58:37'),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `fare_histories`
--
ALTER TABLE `fare_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `franchise_details`
--
ALTER TABLE `franchise_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `ride_booking_histories`
--
ALTER TABLE `ride_booking_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `vehicle_categories`
--
ALTER TABLE `vehicle_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
