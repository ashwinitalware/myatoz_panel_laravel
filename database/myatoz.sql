-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2022 at 07:31 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myatoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_customer`
--

DROP TABLE IF EXISTS `add_customer`;
CREATE TABLE IF NOT EXISTS `add_customer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_number` bigint(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` int(11) NOT NULL,
  `nominee_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadhar_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_customer`
--

INSERT INTO `add_customer` (`id`, `first_name`, `middle_name`, `last_name`, `user_id`, `password`, `aadhar_number`, `address`, `contact_no`, `nominee_details`, `customer_photo_name`, `aadhar_photo_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Syed', 'Mehmoodul', 'Hasan', 'quazi123', '$2y$10$TD5P4WurioyJais5EoDQT.emdWlSg2DR8etbktRawoCehSgecIV7W', 123456789012, 'C/O Adarsh Photo Studio', 123456, 'Self', 'uploads/customer_photos/user/1642940599.jfif', 'uploads/customer_aadhar_photos/user/1642940606.jfif', 'active', NULL, '2022-01-22 14:37:10', '2022-01-24 10:28:02'),
(4, 'Quazi', 'Mehmoodul', 'Hasan', 'quazi12589', '$2y$10$kktWjAXHykVTxLJClVxBtO4Vj.hTd/AzWh7nl4EEZHRHoGvReKUES', 123456789012, 'C/O Adarsh Photo Studio', 1234567890, 'Selg', 'uploads/customer_photos/user/1642927937.jfif', 'uploads/customer_aadhar_photos/user/1642927937.jfif', 'active', NULL, '2022-01-23 03:22:17', '2022-01-23 04:14:38'),
(5, 'Quazi Mehmoodul Hasan', 'Mehmoodul', 'Izhar Ahmad', 'quazi123', '$2y$10$6C64mncWHOdsjRoQNKtp7udXTF8lOUb3F/eaAj.SjLnSUmnzwMYKe', 1222222222, 'Jai Housing Society in front of Poona College Camp', 3333333, '3333', 'uploads/customer_photos/user/1642959400.jpg', 'uploads/customer_aadhar_photos/user/1642959400.jfif', 'active', NULL, '2022-01-23 12:06:40', '2022-01-23 12:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `add_driver`
--

DROP TABLE IF EXISTS `add_driver`;
CREATE TABLE IF NOT EXISTS `add_driver` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_insurance_validity_expire_date` date NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` int(11) NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` int(11) NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominee_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_aadhar_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_driver`
--

INSERT INTO `add_driver` (`id`, `first_name`, `middle_name`, `last_name`, `auto_no`, `auto_insurance_validity_expire_date`, `user_id`, `password`, `address`, `contact_no`, `account_holder_name`, `account_number`, `ifsc_code`, `bank_name`, `nominee_details`, `driver_photo_name`, `driver_aadhar_photo_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quazi', 'Mehmoodul', 'Hasan', 'MH27DD658', '2022-01-29', 'quazi123', '$2y$10$n.xcHYdRDSF6w4N0CQVBKepX5zMs8rBgVSo3Dn06h0RiMyJvmfPzu', 'C/O Adarsh Photo Studio', 111111111, 'qqq', 2325525, '1331', 'SBI', 'se', 'uploads/drivers_photo/driver/1642956438.png', 'uploads/driver_photos/drivers_aadhar_photos/1642956438.jfif', 'active', NULL, '2022-01-23 11:17:18', '2022-01-23 11:17:18'),
(2, 'Quazi Mehmoodul Hasan', 'Mehmoodul', 'Izhar Ahmad', 'MH27DD658', '2022-01-23', 'quazi123sd', '$2y$10$43Qr8J4wrDQcLUPi7EYwSO3eWlff5YI8MRzVrdRb9kdYyEIp1tqyS', 'Jai Housing Society in front of Poona College Camp', 333333, 'qqq33', 444444, '1331dd', 'SBIddd', 'self', 'uploads/drivers_photo/driver/1642956773.jfif', 'uploads/driver_photos/drivers_aadhar_photos/1642956773.jfif', 'active', NULL, '2022-01-23 11:22:53', '2022-01-23 13:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `city_id`, `area`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Camp', 'active', '2022-01-22 00:13:49', '2022-01-20 16:46:44', '2022-01-22 00:13:49'),
(2, 3, 'Pathan Chowk', 'active', NULL, '2022-01-20 16:46:44', '2022-01-22 12:21:17'),
(3, 2, 'Rajkamal', 'active', NULL, '2022-01-21 10:28:46', '2022-01-21 10:28:46'),
(4, 3, 'Navsari', 'active', NULL, '2022-01-21 10:29:55', '2022-01-22 12:10:16'),
(5, 3, 'Navsari', 'active', '2022-01-22 12:10:08', '2022-01-21 10:30:12', '2022-01-22 12:10:08'),
(6, 2, 'Badnera', 'active', NULL, '2022-01-21 10:31:05', '2022-01-21 10:31:05'),
(7, 1, 'Paradise', 'active', NULL, '2022-01-21 10:31:55', '2022-01-21 10:31:55'),
(8, 2, 'Jameel Colony', 'active', '2022-01-22 11:56:18', '2022-01-22 11:56:12', '2022-01-22 11:56:18'),
(9, 2, 'Jameel Colony', 'active', NULL, '2022-01-22 11:56:24', '2022-01-22 11:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ACHALPUR', 'active', '2022-01-22 00:17:26', '2022-01-21 11:57:55', '2022-01-22 00:17:26'),
(2, 'Amravati', 'active', NULL, '2022-01-21 11:58:00', '2022-01-21 11:58:00'),
(3, 'DARYAPUR', 'active', NULL, '2022-01-21 11:58:04', '2022-01-21 11:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `driver_management`
--

DROP TABLE IF EXISTS `driver_management`;
CREATE TABLE IF NOT EXISTS `driver_management` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `amount_per_km` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_running_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode_of_payment_id` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_01_19_184329_add_subscription', 1),
(2, '2022_01_19_115222_add_city', 2),
(3, '2022_01_18_152620_add_area', 3),
(9, '2022_01_21_185408_mode_of_payment', 8),
(5, '2022_01_22_060716_add_customer', 5),
(7, '2022_01_22_190946_monthly_insurance', 7),
(10, '2022_01_23_152510_add_driver', 9),
(11, '2022_01_24_165500_driver_management', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

DROP TABLE IF EXISTS `mode_of_payment`;
CREATE TABLE IF NOT EXISTS `mode_of_payment` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mode_of_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mode_of_payment`
--

INSERT INTO `mode_of_payment` (`id`, `mode_of_payment`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Paytm up', 'active', NULL, '2022-01-24 11:30:58', '2022-01-24 11:30:58'),
(2, 'Cash', 'active', NULL, '2022-01-24 11:31:03', '2022-01-24 11:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_insurance`
--

DROP TABLE IF EXISTS `monthly_insurance`;
CREATE TABLE IF NOT EXISTS `monthly_insurance` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `monthly_insurance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_insurance`
--

INSERT INTO `monthly_insurance` (`id`, `monthly_insurance`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '30', 'active', '2022-01-22 14:13:27', '2022-01-22 14:08:58', '2022-01-22 14:13:27'),
(2, '30', 'active', NULL, '2022-01-22 14:13:44', '2022-01-22 14:22:23'),
(3, '200', 'active', '2022-01-22 14:13:55', '2022-01-22 14:13:49', '2022-01-22 14:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscription_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `subscription_type`, `duration`, `amount`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Monthly up', '300', 15000.00, 'active', '2022-01-22 00:20:49', '2022-01-21 12:45:11', '2022-01-22 00:20:49'),
(3, 'Monthly', '30', 100.00, 'active', '2022-01-22 00:21:10', '2022-01-22 00:17:45', '2022-01-22 00:21:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
