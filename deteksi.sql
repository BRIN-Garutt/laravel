-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2024 at 05:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deteksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `datafeeds`
--

CREATE TABLE `datafeeds` (
  `id` bigint UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` double(10,2) DEFAULT NULL,
  `dataset_name` tinyint DEFAULT NULL,
  `data_type` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_sensor`
--

CREATE TABLE `data_sensor` (
  `id_sensor` int NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `hari` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `waktu` time NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `suhu`, `kelembapan`, `tanggal`, `hari`, `waktu`, `update_at`, `created_at`) VALUES
(19, 25.5, 61, '2024-08-27', 'Selasa', '13:02:42', '2024-08-27 06:02:42', '2024-08-27 06:02:42'),
(20, 25.5, 61, '2024-08-27', 'Selasa', '13:03:23', '2024-08-27 06:03:23', '2024-08-27 06:03:23'),
(21, 25.5, 61, '2024-08-27', 'Selasa', '13:06:23', '2024-08-27 06:06:23', '2024-08-27 06:06:23'),
(22, 25.5, 61, '2024-08-27', 'Selasa', '13:24:25', '2024-08-27 06:24:25', '2024-08-27 06:24:25'),
(23, 25.5, 61, '2024-08-27', 'Selasa', '13:28:17', '2024-08-27 06:28:18', '2024-08-27 06:28:18'),
(24, 26.9, 54, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(25, 27, 53, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(26, 23.2, 58, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(27, 27, 56, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(28, 20.3, 53, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(29, 29.6, 62, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(30, 28.6, 64, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(31, 24.4, 50, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(32, 25.4, 57, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(33, 26.6, 63, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(34, 26, 59, '2024-08-28', 'Rabu', '10:22:46', '2024-08-28 03:22:46', '2024-08-28 03:22:46'),
(35, 29.6, 51, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(36, 26.2, 53, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(37, 20.8, 66, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(38, 24.5, 57, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(39, 26.7, 69, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(40, 22.6, 67, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(41, 22.6, 57, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(42, 26.1, 69, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(43, 26.9, 65, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(44, 24.2, 70, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(45, 29.2, 64, '2024-08-28', 'Rabu', '11:34:11', '2024-08-28 04:34:11', '2024-08-28 04:34:11'),
(46, 24.9, 60, '2024-08-28', 'Rabu', '11:34:43', '2024-08-28 04:34:43', '2024-08-28 04:34:43'),
(47, 25.3, 54, '2024-08-28', 'Rabu', '11:34:43', '2024-08-28 04:34:43', '2024-08-28 04:34:43'),
(48, 26.8, 68, '2024-08-28', 'Rabu', '11:34:43', '2024-08-28 04:34:43', '2024-08-28 04:34:43'),
(49, 28.4, 57, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(50, 25.4, 50, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(51, 26.7, 65, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(52, 29.5, 53, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(53, 22.1, 62, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(54, 24.4, 70, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(55, 28.6, 62, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(56, 27.3, 62, '2024-08-28', 'Rabu', '11:34:44', '2024-08-28 04:34:44', '2024-08-28 04:34:44'),
(57, 20.6, 57, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(58, 23.1, 51, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(59, 29.1, 65, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(60, 21.2, 60, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(61, 28.2, 69, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(62, 26, 52, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(63, 24.6, 61, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(64, 20.7, 57, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(65, 29.2, 58, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(66, 25.4, 51, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(67, 22.7, 63, '2024-08-28', 'Rabu', '11:41:31', '2024-08-28 04:41:31', '2024-08-28 04:41:31'),
(68, 30, 57, '2024-08-28', 'Rabu', '11:45:46', '2024-08-28 04:45:46', '2024-08-28 04:45:46'),
(69, 20, 57, '2024-08-28', 'Rabu', '11:45:46', '2024-08-28 04:45:46', '2024-08-28 04:45:46'),
(70, 26.1, 70, '2024-08-28', 'Rabu', '11:45:46', '2024-08-28 04:45:46', '2024-08-28 04:45:46'),
(71, 24.9, 63, '2024-08-28', 'Rabu', '11:45:46', '2024-08-28 04:45:46', '2024-08-28 04:45:46'),
(72, 26.4, 51, '2024-08-28', 'Rabu', '11:45:46', '2024-08-28 04:45:46', '2024-08-28 04:45:46'),
(73, 28.7, 51, '2024-08-28', 'Rabu', '13:33:01', '2024-08-28 06:33:01', '2024-08-28 06:33:01'),
(74, 29.2, 66, '2024-08-28', 'Rabu', '13:33:01', '2024-08-28 06:33:01', '2024-08-28 06:33:01'),
(75, 27.1, 54, '2024-08-28', 'Rabu', '13:33:01', '2024-08-28 06:33:01', '2024-08-28 06:33:01'),
(76, 21.6, 52, '2024-08-28', 'Rabu', '13:33:01', '2024-08-28 06:33:01', '2024-08-28 06:33:01'),
(77, 29.6, 60, '2024-08-28', 'Rabu', '13:33:01', '2024-08-28 06:33:01', '2024-08-28 06:33:01'),
(78, 28, 55, '2024-08-28', 'Rabu', '14:57:05', '2024-08-28 07:57:05', '2024-08-28 07:57:05'),
(79, 24.7, 51, '2024-08-28', 'Rabu', '14:57:05', '2024-08-28 07:57:05', '2024-08-28 07:57:05'),
(80, 28.4, 67, '2024-08-28', 'Rabu', '14:57:05', '2024-08-28 07:57:05', '2024-08-28 07:57:05'),
(81, 29.7, 67, '2024-08-28', 'Rabu', '14:57:05', '2024-08-28 07:57:05', '2024-08-28 07:57:05'),
(82, 28.9, 70, '2024-08-28', 'Rabu', '14:57:05', '2024-08-28 07:57:05', '2024-08-28 07:57:05'),
(83, 30, 57, '2024-08-28', 'Rabu', '15:07:37', '2024-08-28 08:07:37', '2024-08-28 08:07:37'),
(84, 28.4, 66, '2024-08-28', 'Rabu', '15:07:37', '2024-08-28 08:07:37', '2024-08-28 08:07:37'),
(85, 28.1, 51, '2024-08-28', 'Rabu', '15:07:37', '2024-08-28 08:07:37', '2024-08-28 08:07:37'),
(86, 26.8, 58, '2024-08-28', 'Rabu', '15:07:37', '2024-08-28 08:07:37', '2024-08-28 08:07:37'),
(87, 23.9, 59, '2024-08-28', 'Rabu', '15:07:37', '2024-08-28 08:07:37', '2024-08-28 08:07:37'),
(88, 27.4, 57, '2024-08-28', 'Rabu', '20:37:11', '2024-08-28 13:37:11', '2024-08-28 13:37:11'),
(89, 24.5, 64, '2024-08-28', 'Rabu', '20:37:11', '2024-08-28 13:37:11', '2024-08-28 13:37:11'),
(90, 27, 60, '2024-08-28', 'Rabu', '20:37:11', '2024-08-28 13:37:11', '2024-08-28 13:37:11'),
(91, 25.5, 61, '2024-08-28', 'Rabu', '20:37:11', '2024-08-28 13:37:11', '2024-08-28 13:37:11'),
(92, 25.8, 66, '2024-08-28', 'Rabu', '20:37:11', '2024-08-28 13:37:11', '2024-08-28 13:37:11'),
(93, 20.3, 62, '2024-08-28', 'Rabu', '20:37:28', '2024-08-28 13:37:28', '2024-08-28 13:37:28'),
(94, 25, 61, '2024-08-28', 'Rabu', '20:37:28', '2024-08-28 13:37:28', '2024-08-28 13:37:28'),
(95, 20.7, 57, '2024-08-28', 'Rabu', '20:37:28', '2024-08-28 13:37:28', '2024-08-28 13:37:28'),
(96, 23.7, 66, '2024-08-28', 'Rabu', '20:37:28', '2024-08-28 13:37:28', '2024-08-28 13:37:28'),
(97, 23.3, 53, '2024-08-28', 'Rabu', '20:37:28', '2024-08-28 13:37:28', '2024-08-28 13:37:28'),
(98, 22.4, 68, '2024-08-28', 'Rabu', '20:37:43', '2024-08-28 13:37:43', '2024-08-28 13:37:43'),
(99, 22.8, 50, '2024-08-28', 'Rabu', '20:37:43', '2024-08-28 13:37:43', '2024-08-28 13:37:43'),
(100, 25.2, 62, '2024-08-28', 'Rabu', '20:37:43', '2024-08-28 13:37:43', '2024-08-28 13:37:43'),
(101, 29, 60, '2024-08-28', 'Rabu', '20:37:43', '2024-08-28 13:37:43', '2024-08-28 13:37:43'),
(102, 22.6, 50, '2024-08-28', 'Rabu', '20:37:43', '2024-08-28 13:37:43', '2024-08-28 13:37:43'),
(103, 23, 59, '2024-08-28', 'Rabu', '20:45:36', '2024-08-28 13:45:36', '2024-08-28 13:45:36'),
(104, 28.2, 56, '2024-08-28', 'Rabu', '20:45:36', '2024-08-28 13:45:36', '2024-08-28 13:45:36'),
(105, 22.4, 62, '2024-08-28', 'Rabu', '20:45:36', '2024-08-28 13:45:36', '2024-08-28 13:45:36'),
(106, 21.6, 59, '2024-08-28', 'Rabu', '20:45:36', '2024-08-28 13:45:36', '2024-08-28 13:45:36'),
(107, 20.3, 58, '2024-08-28', 'Rabu', '20:45:36', '2024-08-28 13:45:36', '2024-08-28 13:45:36'),
(108, 25.3, 62, '2024-08-28', 'Rabu', '20:45:46', '2024-08-28 13:45:46', '2024-08-28 13:45:46'),
(109, 20.9, 54, '2024-08-28', 'Rabu', '20:45:46', '2024-08-28 13:45:46', '2024-08-28 13:45:46'),
(110, 27.1, 68, '2024-08-28', 'Rabu', '20:45:46', '2024-08-28 13:45:46', '2024-08-28 13:45:46'),
(111, 20.8, 58, '2024-08-28', 'Rabu', '20:45:46', '2024-08-28 13:45:46', '2024-08-28 13:45:46'),
(112, 23.1, 57, '2024-08-28', 'Rabu', '20:45:46', '2024-08-28 13:45:46', '2024-08-28 13:45:46'),
(113, 25.1, 69, '2024-08-28', 'Rabu', '22:39:21', '2024-08-28 15:39:21', '2024-08-28 15:39:21'),
(114, 25.5, 68, '2024-08-28', 'Rabu', '22:39:21', '2024-08-28 15:39:21', '2024-08-28 15:39:21'),
(115, 21.8, 55, '2024-08-28', 'Rabu', '22:39:21', '2024-08-28 15:39:21', '2024-08-28 15:39:21'),
(116, 24.7, 50, '2024-08-28', 'Rabu', '22:39:21', '2024-08-28 15:39:21', '2024-08-28 15:39:21'),
(117, 24, 69, '2024-08-28', 'Rabu', '22:39:21', '2024-08-28 15:39:21', '2024-08-28 15:39:21'),
(118, 22.9, 58, '2024-08-29', 'Kamis', '11:06:35', '2024-08-29 04:06:36', '2024-08-29 04:06:36'),
(119, 26.1, 54, '2024-08-29', 'Kamis', '11:06:36', '2024-08-29 04:06:36', '2024-08-29 04:06:36'),
(120, 28.7, 54, '2024-08-29', 'Kamis', '11:08:36', '2024-08-29 04:08:36', '2024-08-29 04:08:36'),
(121, 27.1, 56, '2024-08-29', 'Kamis', '11:08:36', '2024-08-29 04:08:36', '2024-08-29 04:08:36'),
(122, 23.2, 52, '2024-08-29', 'Kamis', '11:10:26', '2024-08-29 04:10:26', '2024-08-29 04:10:26'),
(123, 20.1, 53, '2024-08-29', 'Kamis', '11:10:26', '2024-08-29 04:10:26', '2024-08-29 04:10:26'),
(124, 22.9, 56, '2024-08-29', 'Kamis', '11:29:09', '2024-08-29 04:29:09', '2024-08-29 04:29:09'),
(125, 21.7, 66, '2024-08-29', 'Kamis', '11:29:09', '2024-08-29 04:29:09', '2024-08-29 04:29:09'),
(126, 24.7, 62, '2024-08-29', 'Kamis', '12:15:28', '2024-08-29 05:15:28', '2024-08-29 05:15:28'),
(127, 27.2, 64, '2024-08-29', 'Kamis', '12:15:28', '2024-08-29 05:15:28', '2024-08-29 05:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_03_23_163443_create_sessions_table', 1),
(18, '2022_05_11_154250_create_datafeeds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('wpTGJV6XlhY67YRhI84uK3P5GfpJvmbA6bMH9YsP', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNjJpVFI3UlNEMnpRQWdxNXRxN0pSTTZab2FJUmI3dVQ2THBxT25hOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWFsdGltZS1kYXRhP2hhcmk9JnRhbmdnYWw9Jndha3R1X211bGFpPSZ3YWt0dV9zZWxlc2FpPSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkRlVMSC5pM2k4UFRpMGl6SWIvd1pFZU5vWXFyTFVsdktZTDFMV1VVbld4ZVFjOFFWUGZnT0MiO30=', 1724910649);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_suhu`
--

CREATE TABLE `tbl_log_suhu` (
  `id` int NOT NULL,
  `token` varchar(32) NOT NULL,
  `h` float NOT NULL,
  `t` float NOT NULL,
  `f` float NOT NULL,
  `hic` float NOT NULL,
  `hif` float NOT NULL,
  `tt` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$83iwc4D5sJySy4quJwBkWeiQvolEa0mry8ONkagyUAdIsO6hNqBdW', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-27 06:58:10', '2024-08-27 06:58:10'),
(2, 'Ilham Munawar', '10i.munawar@gmail.com', NULL, '$2y$12$FULH.i3i8PTi0izIb/wZEeNoYqrLUlvKYL1LWUUnWxeQc8QVPfgOC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-27 07:12:38', '2024-08-27 07:12:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datafeeds`
--
ALTER TABLE `datafeeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sensor`
--
ALTER TABLE `data_sensor`
  ADD PRIMARY KEY (`id_sensor`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_log_suhu`
--
ALTER TABLE `tbl_log_suhu`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `datafeeds`
--
ALTER TABLE `datafeeds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_sensor`
--
ALTER TABLE `data_sensor`
  MODIFY `id_sensor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_log_suhu`
--
ALTER TABLE `tbl_log_suhu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
