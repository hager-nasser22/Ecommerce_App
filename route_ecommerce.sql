-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2025 at 10:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `route_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_37097fba0a318210ac13a4517468c39d', 'i:1;', 1751980677),
('laravel_cache_37097fba0a318210ac13a4517468c39d:timer', 'i:1751980677;', 1751980677),
('laravel_eccommerce_cache_37097fba0a318210ac13a4517468c39d', 'i:1;', 1751995119),
('laravel_eccommerce_cache_37097fba0a318210ac13a4517468c39d:timer', 'i:1751995119;', 1751995119);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '0001_01_01_000000_create_users_table', 1),
(11, '0001_01_01_000001_create_cache_table', 1),
(12, '0001_01_01_000002_create_jobs_table', 1),
(13, '2025_05_31_181626_create_products_table', 1),
(14, '2025_05_31_181657_add_to_users_table', 1),
(15, '2025_05_31_192405_add_two_factor_columns_to_users_table', 1),
(16, '2025_05_31_192559_create_personal_access_tokens_table', 1),
(17, '2025_07_07_122112_create_orders_table', 1),
(18, '2025_07_07_180501_create_order_details_table', 1),
(19, '2025_07_08_132016_create_favorites_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL DEFAULT 'pending',
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `user_id`, `total_price`, `status`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, '2025-07-08 09:31:26', 2, 200.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 06:31:26', '2025-07-08 06:31:26'),
(2, '2025-07-08 17:34:08', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:34:08', '2025-07-08 14:34:08'),
(3, '2025-07-08 17:35:14', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:35:14', '2025-07-08 14:35:14'),
(4, '2025-07-08 17:35:54', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:35:54', '2025-07-08 14:35:54'),
(5, '2025-07-08 17:38:49', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:38:49', '2025-07-08 14:38:49'),
(6, '2025-07-08 17:41:40', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:41:40', '2025-07-08 14:41:40'),
(7, '2025-07-08 17:42:24', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:42:24', '2025-07-08 14:42:24'),
(8, '2025-07-08 17:46:57', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:46:57', '2025-07-08 14:46:57'),
(9, '2025-07-08 17:47:21', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:47:21', '2025-07-08 14:47:21'),
(10, '2025-07-08 17:49:39', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:49:39', '2025-07-08 14:49:39'),
(11, '2025-07-08 17:51:16', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:51:16', '2025-07-08 14:51:16'),
(12, '2025-07-08 17:52:32', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 14:52:32', '2025-07-08 14:52:32'),
(13, '2025-07-08 19:10:34', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 16:10:34', '2025-07-08 16:10:34'),
(14, '2025-07-08 19:12:36', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 16:12:36', '2025-07-08 16:12:36'),
(15, '2025-07-08 19:13:48', 2, 120.00, 'pending', 'Zagazig', '+201552959396', '2025-07-08 16:13:48', '2025-07-08 16:13:48'),
(16, '2025-07-08 19:25:45', 2, 110.00, 'pending', 'Minya Al Qamh, Al-Sharqia', '+201552959396', '2025-07-08 16:25:45', '2025-07-08 16:25:45'),
(17, '2025-07-08 19:27:00', 2, 110.00, 'pending', 'Minya Al Qamh, Al-Sharqia', '+201552959396', '2025-07-08 16:27:00', '2025-07-08 16:27:00'),
(18, '2025-07-08 19:29:16', 3, 150.00, 'pending', 'Minya Al Qamh, Al-Sharqia', '+201552959396', '2025-07-08 16:29:16', '2025-07-08 16:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 40.00, '2025-07-08 06:31:26', '2025-07-08 06:31:26'),
(1, 1, 2, 40.00, '2025-07-08 06:31:26', '2025-07-08 06:31:26'),
(2, 2, 2, 40.00, '2025-07-08 14:34:08', '2025-07-08 14:34:08'),
(2, 1, 1, 40.00, '2025-07-08 14:34:08', '2025-07-08 14:34:08'),
(3, 2, 2, 40.00, '2025-07-08 14:35:14', '2025-07-08 14:35:14'),
(3, 1, 1, 40.00, '2025-07-08 14:35:14', '2025-07-08 14:35:14'),
(4, 2, 2, 40.00, '2025-07-08 14:35:54', '2025-07-08 14:35:54'),
(4, 1, 1, 40.00, '2025-07-08 14:35:54', '2025-07-08 14:35:54'),
(5, 2, 2, 40.00, '2025-07-08 14:38:49', '2025-07-08 14:38:49'),
(5, 1, 1, 40.00, '2025-07-08 14:38:49', '2025-07-08 14:38:49'),
(6, 2, 2, 40.00, '2025-07-08 14:41:40', '2025-07-08 14:41:40'),
(6, 1, 1, 40.00, '2025-07-08 14:41:40', '2025-07-08 14:41:40'),
(7, 2, 2, 40.00, '2025-07-08 14:42:24', '2025-07-08 14:42:24'),
(7, 1, 1, 40.00, '2025-07-08 14:42:24', '2025-07-08 14:42:24'),
(8, 2, 2, 40.00, '2025-07-08 14:46:57', '2025-07-08 14:46:57'),
(8, 1, 1, 40.00, '2025-07-08 14:46:57', '2025-07-08 14:46:57'),
(9, 2, 2, 40.00, '2025-07-08 14:47:21', '2025-07-08 14:47:21'),
(9, 1, 1, 40.00, '2025-07-08 14:47:21', '2025-07-08 14:47:21'),
(10, 2, 2, 40.00, '2025-07-08 14:49:39', '2025-07-08 14:49:39'),
(10, 1, 1, 40.00, '2025-07-08 14:49:39', '2025-07-08 14:49:39'),
(11, 2, 2, 40.00, '2025-07-08 14:51:16', '2025-07-08 14:51:16'),
(11, 1, 1, 40.00, '2025-07-08 14:51:16', '2025-07-08 14:51:16'),
(12, 2, 2, 40.00, '2025-07-08 14:52:32', '2025-07-08 14:52:32'),
(12, 1, 1, 40.00, '2025-07-08 14:52:32', '2025-07-08 14:52:32'),
(13, 2, 2, 40.00, '2025-07-08 16:10:34', '2025-07-08 16:10:34'),
(13, 1, 1, 40.00, '2025-07-08 16:10:34', '2025-07-08 16:10:34'),
(14, 2, 2, 40.00, '2025-07-08 16:12:36', '2025-07-08 16:12:36'),
(14, 1, 1, 40.00, '2025-07-08 16:12:36', '2025-07-08 16:12:36'),
(15, 1, 1, 40.00, '2025-07-08 16:13:48', '2025-07-08 16:13:48'),
(15, 2, 2, 40.00, '2025-07-08 16:13:48', '2025-07-08 16:13:48'),
(16, 2, 2, 40.00, '2025-07-08 16:25:45', '2025-07-08 16:25:45'),
(17, 2, 2, 40.00, '2025-07-08 16:27:00', '2025-07-08 16:27:00'),
(18, 1, 3, 40.00, '2025-07-08 16:29:16', '2025-07-08 16:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `image`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Watermelon', 'Fresh Watermelon Fresh Watermelon Fresh Watermelon Fresh Watermelon', 'products/8SjwhSpHV2dZYagBVvC9ECPYfR5UZmK7c1squt6j.jpg', 40.00, 3, '2025-07-08 06:27:14', '2025-07-08 06:27:14'),
(2, 'Fresh Watermelon', 'Fresh Watermelon Fresh Watermelon Fresh Watermelon Fresh Watermelon', 'products/yU1BkwMXdphf9O47DuqKbek7PWyuLruNOuwwSdSH.jpg', 40.00, 3, '2025-07-08 06:27:51', '2025-07-08 06:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4yPCz9ZD69YxFJEw4oHOOYLEGPyzIrN0aYtptqP6', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib01meENXcWkyYzBrRFR6MHM4bGE0eUdoZ28yc09qRUhIdlJqUTFhNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2R1Y3RzL215Q2FydCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1752003217),
('Bm8qNunveDdNDUMxSRHfNuhkGysHdtCFAOZQZV0h', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiemVRcXQ2cEt6aUxrUmc3T1FyOFM0VXVOTTV4enZ5VGxpS21YUjFvRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1751993553),
('dNBlenaaKPJbYJ3E69aqJBQBSCBq1wZ3bU9py9zX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVWhuMzRXbEgwOFhzbVdZdERYc01NS21MMHlGR1Z0cDZYR2Rnb3lUayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vcHJvZHVjdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1751966872),
('EMJIa8vh9wEF32tuOH6NaN1X8YjzvtxNVXNmvbHw', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYmxoNDZqcmNOakhsRk9QWjJWRlFYdFA1andTdXo4eHhjQWliamVhUiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXNlci9wcm9kdWN0cy8yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1751982170),
('fIzpnHZ240AOt73lS2EGi07BUgCWFCdFQHmLMHl3', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieFBOOFpvSjgzVzZsUnV0OVlmM094SVlJMThwUVIzTk85ZnhSMEZ2byI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdXNlci9wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJsYW5nIjtzOjI6ImVuIjt9', 1751967801),
('PrEfTyT8YwC5gIqa1qBxawf1nVbvP3NmxJvuUKbv', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2FiTThTSU4xRXAwTGJiS3dpTzNiT2Q1YVJobTN0djg5aXN0YkxOdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2R1Y3RzL215Q2FydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1752002958);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `image` text NOT NULL DEFAULT 'user.png',
  `access_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role`, `image`, `access_token`) VALUES
(1, 'Salwa', 'salwa@gmail.com', NULL, '$2y$12$7UPfYXXR.yKNvgNDMBblleQjHg7I/9.HsiTT/A76MtA6s31AOcWlu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-08 06:19:00', '2025-07-08 06:19:00', 'admin', 'user.png', NULL),
(2, 'Hager Nasser', 'hager.nasser.32002@gmail.com', NULL, '$2y$12$Xzfvt/K9LdDHdafPVnxQCenlSnQHlPJiFbzozaFplvVyNbU9EkYJ2', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-08 06:19:42', '2025-07-08 06:19:42', 'user', 'user.png', NULL),
(3, 'Ahmed', 'nasrh2442@gmail.com', NULL, '$2y$12$tgq4Q3TpGtF8I9U5NhF4KOMO3zUt.mljunghgTnnnT3oqs6ZcwSDe', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-08 16:28:25', '2025-07-08 16:28:25', 'user', 'user.png', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
