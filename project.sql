-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 09:28 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_no` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_no`, `city_name`, `pro_name`, `dist_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 301, 'Dehiwala', 'Colombo', 'Western', 'active', '2020-07-06 01:15:19', '2020-07-10 08:25:05'),
(2, 302, 'Hikkaduwa', 'Southern', 'Galle', 'active', '2020-07-06 01:25:35', '2020-07-06 06:57:10'),
(3, 303, 'Malabe', 'Western', 'Colombo', 'active', '2020-07-06 03:48:32', '2020-07-06 03:48:32'),
(5, 304, 'Waligama', 'Southern', 'Matara', 'active', '2020-07-06 06:55:09', '2020-07-06 21:25:19'),
(13, 305, 'Aruppola', 'Central', 'Kandy', 'active', '2020-07-06 07:34:53', '2020-07-06 07:36:28'),
(15, 306, 'Hokandara', 'Western', 'Colombo', 'active', '2020-07-07 01:15:08', '2020-07-07 01:15:08'),
(16, 307, 'Hakmana', 'Southern', 'Matara', 'active', '2020-07-07 01:16:47', '2020-07-07 01:16:47'),
(17, 308, 'Mathugama', 'Western', 'Kaluthara', 'active', '2020-07-09 00:54:11', '2020-07-09 00:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clients_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clients_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clients_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(15) NOT NULL,
  `lat` decimal(18,15) NOT NULL,
  `long` decimal(18,15) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clients_id`, `clients_name`, `clients_add`, `pro_name`, `dist_name`, `city_name`, `mobile`, `lat`, `long`, `status`, `created_at`, `updated_at`) VALUES
(6, '950000000', 'Aruna Pharmacy', 'Hakmana, Matara', 'Southern', 'Matara', 'Hakmana', 757170764, '0.785412540000000', '78.000000000000000', 'active', '2020-07-08 05:04:25', '2020-07-08 05:04:25'),
(7, '950760710', 'City Pharmacy', '202/2 Wakwella road, galle', 'Southern', 'Galle', 'Hikkaduwa', 712782201, '0.125471231230000', '0.125421312300000', 'active', '2020-07-08 06:23:30', '2020-07-08 06:23:30'),
(8, '9500000000', 'abc Company', 'aaaaaaa', 'Southern', 'Galle', 'Hikkaduwa', 712457802, '0.125478511200000', '0.125412541212000', 'active', '2020-07-11 03:09:15', '2020-07-11 03:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_add` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_per` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tell_no` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `sup_name`, `sup_add`, `contact_per`, `contact_no`, `user_id`, `tell_no`, `designation`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Hemas', 'Bambalapitiya, Colombo', 'Nishantha', 71000001, 'company1', 112000001, 'Supply Manager', 'nishantha@hemas.com', 'company123', 'active', '2020-07-09 01:03:17', '2020-07-09 01:03:17'),
(17, 'Mega Pharma', '93/5, Dutugemunu Street, Colombo 06, Sri Lanka.', 'Sampath', 712457820, 'company2', 112812390, 'Product Manager', 'info@megapharma.com', 'company123', 'active', '2020-07-13 22:28:26', '2020-07-13 22:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `company_product`
--

CREATE TABLE `company_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_product`
--

INSERT INTO `company_product` (`id`, `product_name`, `product_price`, `product_category`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Paracetamol', 500, 'Medicinal Pills', 'company1', 'active', '2020-07-07 04:48:31', '2020-07-07 10:00:42'),
(5, 'Piriton', 400, 'Medicinal Pills', 'company1', 'active', '2020-07-07 04:49:54', '2020-07-07 10:00:45'),
(12, 'Augmentin', 300, 'Medicinal Syrup', 'company1', 'active', NULL, NULL),
(13, 'Accutrim', 650, 'Medicinal Capsules', 'company1', 'active', NULL, NULL),
(14, 'Vitamin C', 250, 'Medicinal Pills', 'company1', 'active', NULL, NULL),
(15, 'Ascoril', 350, 'Medicinal Syrup', 'company1', 'active', NULL, NULL),
(16, 'Pseudoephedrine', 300, 'Medicinal Syrup', 'company1', 'active', NULL, NULL),
(17, 'Dextromethorphan', 750, 'Medicinal Capsules', 'company1', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_products`
--

CREATE TABLE `company_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_products`
--

INSERT INTO `company_products` (`id`, `product_name`, `product_price`, `product_category`, `product_category_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Paracetamol', 500, 'Medicinal Pills', 4, 'company1', 'active', '2020-07-07 04:48:31', '2020-07-07 10:00:42'),
(5, 'Piriton', 400, 'Medicinal Pills', 4, 'company1', 'active', '2020-07-07 04:49:54', '2020-07-07 10:00:45'),
(12, 'Augmentin', 300, 'Medicinal Syrup', 7, 'company1', 'active', '2020-07-10 04:37:12', NULL),
(13, 'Accutrim', 650, 'Medicinal Capsules', 5, 'company1', 'active', '2020-07-21 04:36:59', NULL),
(14, 'Vitamin C', 250, 'Medicinal Pills', 4, 'company1', 'active', '2020-07-07 04:49:54', NULL),
(15, 'Ascoril', 350, 'Medicinal Syrup', 7, 'company1', 'active', '2020-07-05 04:37:08', NULL),
(16, 'Pseudoephedrine', 300, 'Medicinal Syrup', 7, 'company1', 'active', '2020-07-01 04:37:27', NULL),
(17, 'Dextromethorphan', 750, 'Medicinal Capsules', 5, 'company1', 'active', '2020-07-10 04:37:22', NULL),
(18, 'Amber Glass', 430, 'Sterile', 8, 'company1', 'active', '2020-07-06 04:37:34', NULL),
(19, 'Cetirizine', 850, 'Medicinal Pills', 4, 'company1', 'active', '2020-07-06 04:36:54', NULL),
(20, 'Angizaar 25', 80, 'Allopathic Medicine', 10, 'company2', 'active', '2020-07-05 04:37:48', NULL),
(21, 'Olmat 40', 95, 'Allopathic Medicine', 10, 'company2', 'active', '2020-07-05 04:37:51', NULL),
(22, 'Ecosprin 150', 70, 'Allopathic Medicine', 10, 'company2', 'active', '2020-07-05 04:37:55', NULL),
(23, 'Maxima 20', 100, 'Allopathic Medicine', 10, 'company2', 'active', '2020-07-05 04:37:58', NULL),
(24, 'Abana Tablets', 475, 'Herbal Medicine', 9, 'company2', 'active', '2020-07-06 04:37:37', NULL),
(25, 'Diabecon Tablets', 890, 'Herbal Medicine', 9, 'company2', 'active', '2020-07-06 04:37:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dist_no` int(11) NOT NULL,
  `dist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `dist_no`, `dist_name`, `pro_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 203, 'Colombo', 'Western', 'active', '2020-07-06 00:52:54', '2020-07-06 00:52:54'),
(2, 201, 'Galle', 'Southern', 'active', '2020-07-06 01:24:51', '2020-07-06 01:24:51'),
(3, 204, 'Kaluthara', 'Western', 'active', '2020-07-06 06:44:50', '2020-07-06 06:44:50'),
(10, 202, 'Matara', 'Southern', 'active', '2020-07-07 01:16:04', '2020-07-07 01:16:04'),
(11, 205, 'Kandy', 'Central', 'active', '2020-07-09 00:50:23', '2020-07-09 00:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `name`, `designation`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dmanager@company.com', 'Ashen', 'Company Manager', 'company1', 'deactive', '2020-07-07 06:02:39', '2020-07-07 06:19:32'),
(2, 'dsmanager@company.com', 'Udithamal', 'Department Manager', 'company1', 'active', '2020-07-07 06:20:06', '2020-07-07 06:20:06'),
(3, 'dsssmanager@company.com', 'Ashen Abc', 'Department Manager', 'company1', 'deactive', '2020-07-07 22:05:58', '2020-07-07 22:14:04'),
(4, 'asda@sfsdf.cdas', 'Hasitha', 'Sales Manager', 'company1', 'deactive', '2020-07-07 22:08:05', '2020-07-07 22:14:17');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_05_142852_create_users_table', 1),
(4, '2020_07_06_051008_create_provinces_table', 2),
(5, '2020_07_06_060035_create_districts_table', 3),
(6, '2020_07_06_062626_create_cities_table', 4),
(8, '2020_07_06_100808_create_companies_table', 5),
(10, '2020_07_07_035658_create_products_table', 6),
(11, '2020_07_07_045553_create_clients_table', 7),
(13, '2020_07_07_083628_create_company_products_table', 8),
(14, '2020_07_07_110733_create_emails_table', 9),
(16, '2020_07_08_094654_create_orders_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `chemist_id` int(15) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `product_id`, `product_price`, `product_quantity`, `product_amount`, `total_amount`, `chemist_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 'active', NULL, NULL),
(27, 2, 17, 750, 6, 4500, 11500, 950000000, 'deactive', NULL, '2020-07-11 07:06:30'),
(28, 2, 12, 300, 6, 1800, 11500, 950000000, 'deactive', NULL, '2020-07-11 07:06:30'),
(29, 2, 13, 650, 8, 5200, 11500, 950000000, 'deactive', NULL, '2020-07-11 07:06:30'),
(34, 3, 12, 300, 15, 4500, 37700, 950000000, 'active', NULL, '2020-07-13 09:40:31'),
(35, 3, 19, 850, 15, 12750, 37700, 950000000, 'active', NULL, '2020-07-13 09:40:31'),
(36, 3, 15, 350, 10, 3500, 37700, 950000000, 'active', NULL, '2020-07-13 09:40:31'),
(37, 3, 18, 430, 15, 6450, 37700, 950000000, 'active', NULL, '2020-07-13 09:40:31'),
(38, 3, 17, 750, 14, 10500, 37700, 950000000, 'active', NULL, '2020-07-13 09:40:31'),
(39, 4, 13, 650, 15, 9750, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(40, 4, 18, 430, 13, 5590, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(41, 4, 15, 350, 25, 8750, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(42, 4, 12, 300, 3, 900, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(43, 4, 19, 850, 34, 28900, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(44, 4, 17, 750, 15, 11250, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(45, 4, 4, 500, 20, 10000, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(46, 4, 5, 400, 3, 1200, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:55'),
(47, 4, 16, 300, 10, 3000, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:56'),
(48, 4, 14, 250, 100, 25000, 104340, 950760710, 'deactive', NULL, '2020-07-13 09:48:56'),
(49, 5, 13, 650, 10, 6500, 30250, 950760710, 'active', NULL, '2020-07-13 11:50:42'),
(50, 5, 13, 650, 15, 9750, 30250, 950760710, 'active', NULL, '2020-07-13 11:50:42'),
(51, 5, 19, 850, 10, 8500, 30250, 950760710, 'active', NULL, '2020-07-13 11:50:42'),
(52, 5, 4, 500, 4, 2000, 30250, 950760710, 'active', NULL, '2020-07-13 11:50:42'),
(53, 5, 15, 350, 10, 3500, 30250, 950760710, 'active', NULL, '2020-07-13 11:50:42'),
(54, 6, 12, 300, 10, 3000, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(55, 6, 15, 350, 10, 3500, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(56, 6, 19, 850, 15, 12750, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(57, 6, 17, 750, 15, 11250, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(58, 6, 18, 430, 16, 6880, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(59, 6, 4, 500, 15, 7500, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(60, 6, 5, 400, 10, 4000, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(61, 6, 13, 650, 16, 10400, 59280, 950000000, 'active', NULL, '2020-07-14 03:22:23'),
(62, 7, 21, 95, 75, 7125, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:09'),
(63, 7, 20, 80, 32, 2560, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(64, 7, 23, 100, 10, 1000, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(65, 7, 13, 650, 15, 9750, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(66, 7, 12, 300, 20, 6000, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(67, 7, 4, 500, 75, 37500, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(68, 7, 24, 475, 100, 47500, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(69, 7, 5, 400, 32, 12800, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(70, 7, 16, 300, 70, 21000, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(71, 7, 22, 70, 10, 700, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(72, 7, 19, 850, 80, 68000, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10'),
(73, 7, 25, 890, 30, 26700, 240635, 950760710, 'active', NULL, '2020-07-14 04:08:10');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_no` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_no`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 40001, 'Medicinal Pills', 'active', '2020-07-07 04:42:01', '2020-07-07 05:28:28'),
(5, 40002, 'Medicinal Capsules', 'active', '2020-07-07 04:42:49', '2020-07-07 05:31:37'),
(7, 40003, 'Medicinal Syrup', 'active', '2020-07-07 06:31:02', '2020-07-07 06:31:27'),
(8, 40004, 'Sterile', 'active', '2020-07-10 05:47:32', '2020-07-10 05:47:32'),
(9, 40005, 'Herbal Medicine', 'active', '2020-07-13 22:30:55', '2020-07-13 22:30:55'),
(10, 40006, 'Allopathic Medicine', 'active', '2020-07-13 22:31:41', '2020-07-13 22:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_no` int(11) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `pro_no`, `pro_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 101, 'Western', 'active', '2020-07-06 00:24:23', '2020-07-06 00:24:23'),
(2, 102, 'Southern', 'active', '2020-07-06 01:24:13', '2020-07-06 01:24:13'),
(24, 103, 'Central', 'active', '2020-07-09 00:42:09', '2020-07-09 00:42:09'),
(25, 104, 'Eastern', 'active', '2020-07-09 00:44:01', '2020-07-09 00:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `role_id`, `password`, `email`, `status`, `created_at`, `updated_at`) VALUES
('950000000', 'user', 3, '123456', 'ashen@ashen.com', 'active', '2020-07-08 05:03:45', '2020-07-08 05:03:45'),
('9500000000', 'user', 3, '12345678', 'abcs@gnail.com', 'active', '2020-07-11 03:07:34', '2020-07-11 03:07:34'),
('950760710', 'user', 3, '123456', 'duranga.heshanaa@gmail.com', 'active', '2020-07-08 06:21:58', '2020-07-08 06:21:58'),
('admin', 'admin', 1, 'admin123', 'admin@admin.com', 'active', NULL, NULL),
('company1', 'company', 2, 'company123', 'nishantha@hemas.com', 'active', '2020-07-09 01:03:17', '2020-07-09 01:03:17'),
('company2', 'company', 2, 'company123', 'info@megapharma.com', 'active', '2020-07-13 22:28:26', '2020-07-13 22:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_product`
--
ALTER TABLE `company_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_products`
--
ALTER TABLE `company_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `company_product`
--
ALTER TABLE `company_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `company_products`
--
ALTER TABLE `company_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
