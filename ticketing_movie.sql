-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2023 at 03:46 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` int NOT NULL,
  `description` longtext NOT NULL,
  `tumbnail` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('COMING SOON','CURRENTLY AIRING','ENDED') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'COMING SOON',
  `genre` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `duration`, `description`, `tumbnail`, `start_date`, `end_date`, `status`, `genre`) VALUES
(1, 'Testing', 120, 'Testing Validator', 'testing-1680066532.png', '2023-03-29', '2023-04-05', 'CURRENTLY AIRING', 'Horror'),
(2, 'Garapan', 60, 'Garapan Magang', 'garapan-1680058887.png', '2023-03-29', '2023-04-05', 'CURRENTLY AIRING', 'Action,Sci-Fi'),
(3, 'Try', 120, 'Mencoba coba', 'try-1679991320.png', '2023-03-28', '2023-04-04', 'CURRENTLY AIRING', 'Action'),
(4, 'The Try & Try', 120, 'Mencoba dan mencoba', 'the-try-try-1679988311.png', '2023-03-28', '2023-04-04', 'CURRENTLY AIRING', 'Action'),
(5, 'Coba', 999, 'Dada Geprek', 'coba-1679988218.png', '2023-03-28', '2023-04-04', 'COMING SOON', 'Action'),
(6, 'Seram 2', 111, 'The Traveler has survived the Seram Island, but instead of return to home, he trapped in the unknown world', 'seram-2-1679644406.png', '2023-03-24', '2023-04-07', 'COMING SOON', 'Horror'),
(7, 'Seram', 120, 'Seram Island Adventure', 'default_tumbnail.jpg', '2023-03-24', '2023-04-07', 'CURRENTLY AIRING', 'Action,Horror');

-- --------------------------------------------------------

--
-- Table structure for table `films_has_genres`
--

CREATE TABLE `films_has_genres` (
  `films_id` int NOT NULL,
  `genres_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `films_has_genres`
--

INSERT INTO `films_has_genres` (`films_id`, `genres_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 1),
(1, 2),
(7, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `is_active`) VALUES
(1, 'Action', 1),
(2, 'Horror', 1),
(3, 'Fantasy', 0),
(4, 'Sci-Fi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'create.film', 'web', '2023-03-26 20:05:51', '2023-03-26 20:05:51'),
(4, 'read.film', 'web', '2023-03-26 20:10:30', '2023-03-26 20:10:30'),
(5, 'update.film', 'web', '2023-03-26 20:12:02', '2023-03-26 20:12:02'),
(6, 'delete.film', 'web', '2023-03-26 20:12:17', '2023-03-26 20:12:17'),
(7, 'edit.genre', 'web', '2023-03-28 19:24:50', '2023-03-28 19:24:50'),
(8, 'read.genre', 'web', '2023-03-28 19:24:59', '2023-03-28 19:24:59'),
(9, 'create.genre', 'web', '2023-03-28 19:26:12', '2023-03-28 19:26:12'),
(10, 'delete.genre', 'web', '2023-03-28 19:26:40', '2023-03-28 19:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-03-26 19:57:34', '2023-03-26 19:57:34'),
(2, 'operator', 'web', '2023-03-26 19:57:34', '2023-03-26 19:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int NOT NULL,
  `row` varchar(45) NOT NULL,
  `number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `row`, `number`) VALUES
(1, 'A', '1'),
(2, 'A', '2'),
(3, 'A', '3'),
(4, 'A', '4'),
(5, 'A', '5'),
(6, 'A', '6'),
(7, 'A', '7'),
(8, 'A', '8'),
(9, 'A', '9'),
(10, 'A', '10'),
(11, 'B', '1'),
(12, 'B', '2'),
(13, 'B', '3'),
(14, 'B', '4'),
(15, 'B', '5'),
(16, 'B', '6'),
(17, 'B', '7'),
(18, 'B', '8'),
(19, 'B', '9'),
(20, 'B', '10'),
(21, 'C', '1'),
(22, 'C', '2'),
(23, 'C', '3'),
(24, 'C', '4'),
(25, 'C', '5'),
(26, 'C', '6'),
(27, 'C', '7'),
(28, 'C', '8'),
(29, 'C', '9'),
(30, 'C', '10'),
(31, 'D', '1'),
(32, 'D', '2'),
(33, 'D', '3'),
(34, 'D', '4'),
(35, 'D', '5'),
(36, 'D', '6'),
(37, 'D', '7'),
(38, 'D', '8'),
(39, 'D', '9'),
(40, 'D', '10'),
(41, 'E', '1'),
(42, 'E', '2'),
(43, 'E', '3'),
(44, 'E', '4'),
(45, 'E', '5'),
(46, 'E', '6'),
(47, 'E', '7'),
(48, 'E', '8'),
(49, 'E', '9'),
(50, 'E', '10');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `class` enum('REGULAR','PREMIUM') DEFAULT NULL,
  `is_active` tinyint NOT NULL,
  `price` int NOT NULL,
  `weekend_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `name`, `class`, `is_active`, `price`, `weekend_price`) VALUES
(1, 'Studio 1', 'REGULAR', 1, 20000, 30000),
(2, 'Studio 2', 'REGULAR', 1, 20000, 30000),
(3, 'Studio 3', 'PREMIUM', 1, 40000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int NOT NULL,
  `film_id` int NOT NULL,
  `studio_id` int NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `film_id`, `studio_id`, `date`, `start_time`) VALUES
(1, 1, 1, '2023-04-04', '2023-04-04 10:00:00'),
(2, 4, 2, '2023-04-04', '2023-04-04 14:00:00'),
(3, 5, 3, '2023-04-04', '2023-04-04 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_has_seat`
--

CREATE TABLE `timetable_has_seat` (
  `timetable_id` int NOT NULL,
  `seat_id` int NOT NULL,
  `studio_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `timetable_has_seat`
--

INSERT INTO `timetable_has_seat` (`timetable_id`, `seat_id`, `studio_id`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 18, 1),
(1, 19, 1),
(1, 20, 1),
(1, 21, 1),
(1, 22, 1),
(1, 23, 1),
(1, 24, 1),
(1, 25, 1),
(1, 26, 1),
(1, 27, 1),
(1, 28, 1),
(1, 29, 1),
(1, 30, 1),
(1, 31, 1),
(1, 32, 1),
(1, 33, 1),
(1, 34, 1),
(1, 35, 1),
(1, 36, 1),
(1, 37, 1),
(1, 38, 1),
(1, 39, 1),
(1, 40, 1),
(1, 41, 1),
(1, 42, 1),
(1, 43, 1),
(1, 44, 1),
(1, 45, 1),
(1, 46, 1),
(1, 47, 1),
(1, 48, 1),
(1, 49, 1),
(1, 50, 1),
(2, 1, 2),
(2, 2, 2),
(2, 3, 2),
(2, 4, 2),
(2, 5, 2),
(2, 6, 2),
(2, 7, 2),
(2, 8, 2),
(2, 9, 2),
(2, 10, 2),
(2, 11, 2),
(2, 12, 2),
(2, 13, 2),
(2, 14, 2),
(2, 15, 2),
(2, 16, 2),
(2, 17, 2),
(2, 18, 2),
(2, 19, 2),
(2, 20, 2),
(2, 21, 2),
(2, 22, 2),
(2, 23, 2),
(2, 24, 2),
(2, 25, 2),
(2, 26, 2),
(2, 27, 2),
(2, 28, 2),
(2, 29, 2),
(2, 30, 2),
(2, 31, 2),
(2, 32, 2),
(2, 33, 2),
(2, 34, 2),
(2, 35, 2),
(2, 36, 2),
(2, 37, 2),
(2, 38, 2),
(2, 39, 2),
(2, 40, 2),
(2, 41, 2),
(2, 42, 2),
(2, 43, 2),
(2, 44, 2),
(2, 45, 2),
(2, 46, 2),
(2, 47, 2),
(2, 48, 2),
(2, 49, 2),
(2, 50, 2),
(3, 1, 3),
(3, 2, 3),
(3, 3, 3),
(3, 4, 3),
(3, 5, 3),
(3, 6, 3),
(3, 7, 3),
(3, 8, 3),
(3, 9, 3),
(3, 10, 3),
(3, 11, 3),
(3, 12, 3),
(3, 13, 3),
(3, 14, 3),
(3, 15, 3),
(3, 16, 3),
(3, 17, 3),
(3, 18, 3),
(3, 19, 3),
(3, 20, 3),
(3, 21, 3),
(3, 22, 3),
(3, 23, 3),
(3, 24, 3),
(3, 25, 3),
(3, 26, 3),
(3, 27, 3),
(3, 28, 3),
(3, 29, 3),
(3, 30, 3),
(3, 31, 3),
(3, 32, 3),
(3, 33, 3),
(3, 34, 3),
(3, 35, 3),
(3, 36, 3),
(3, 37, 3),
(3, 38, 3),
(3, 39, 3),
(3, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_has_transaction`
--

CREATE TABLE `timetable_has_transaction` (
  `timetable_id` int NOT NULL,
  `seat_id` int NOT NULL,
  `transaction_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `timetable_has_transaction`
--

INSERT INTO `timetable_has_transaction` (`timetable_id`, `seat_id`, `transaction_id`) VALUES
(1, 1, 1),
(3, 1, 4),
(1, 2, 2),
(3, 2, 5),
(1, 3, 3),
(3, 3, 5),
(1, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `timetable_id` int NOT NULL,
  `invoice_code` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int NOT NULL,
  `unit_price` float NOT NULL,
  `cash` int DEFAULT NULL,
  `return` int DEFAULT NULL,
  `total` float NOT NULL,
  `payment_method` enum('CASH','QRIS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `timetable_id`, `invoice_code`, `date`, `quantity`, `unit_price`, `cash`, `return`, `total`, `payment_method`) VALUES
(1, 1, 1, 'TUE040420230001', '2023-04-04 08:05:00', 1, 20000, 50000, 30000, 20000, 'CASH'),
(2, 1, 1, 'TUE040420230002', '2023-04-04 08:35:31', 1, 20000, 20000, 0, 20000, 'CASH'),
(3, 1, 1, 'TUE040420230003', '2023-04-04 08:36:56', 2, 20000, 50000, 10000, 40000, 'CASH'),
(4, 1, 3, 'TUE040420230004', '2023-04-04 08:37:56', 1, 40000, 40000, 0, 40000, 'CASH'),
(5, 1, 3, 'TUE040420230005', '2023-04-04 08:39:07', 2, 40000, 100000, 20000, 80000, 'CASH');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int NOT NULL,
  `transaction_id` int NOT NULL,
  `film` varchar(45) DEFAULT NULL,
  `studio` varchar(45) DEFAULT NULL,
  `seat` varchar(45) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `transaction_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', '2023-03-26 19:57:34', '$2y$10$IMXSN4C/3l61Zw5rVeVPqe1PxpVDx5TVzJR8aHUnkO/uy9pRyMwNi', NULL, '2023-03-26 19:57:34', '2023-03-26 19:57:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `films_has_genres`
--
ALTER TABLE `films_has_genres`
  ADD PRIMARY KEY (`films_id`,`genres_id`),
  ADD KEY `fk_films_has_genres_genres1_idx` (`genres_id`),
  ADD KEY `fk_films_has_genres_films1_idx` (`films_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`,`film_id`,`studio_id`),
  ADD KEY `fk_timetable_film1_idx` (`film_id`) INVISIBLE,
  ADD KEY `fk_timetable_studio1_idx` (`studio_id`);

--
-- Indexes for table `timetable_has_seat`
--
ALTER TABLE `timetable_has_seat`
  ADD PRIMARY KEY (`timetable_id`,`seat_id`,`studio_id`),
  ADD KEY `fk_seat_has_timetable_timetable1_idx` (`timetable_id`),
  ADD KEY `fk_seat_has_timetable_seat1_idx` (`seat_id`),
  ADD KEY `fk_timetable_has_seat_studio1_idx` (`studio_id`);

--
-- Indexes for table `timetable_has_transaction`
--
ALTER TABLE `timetable_has_transaction`
  ADD PRIMARY KEY (`timetable_id`,`seat_id`,`transaction_id`),
  ADD KEY `fk_timetable_has_seat1_seat1_idx` (`seat_id`),
  ADD KEY `fk_timetable_has_seat1_timetable1_idx` (`timetable_id`),
  ADD KEY `fk_timetable_has_seat1_transaction1_idx` (`transaction_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`,`user_id`,`timetable_id`),
  ADD UNIQUE KEY `invoice_UNIQUE` (`invoice_code`),
  ADD KEY `fk_transaction_timetable1_idx` (`timetable_id`),
  ADD KEY `fk_transactions_users1_idx` (`user_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`,`transaction_id`),
  ADD KEY `fk_transaction_detail_transaction1_idx` (`transaction_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `films_has_genres`
--
ALTER TABLE `films_has_genres`
  ADD CONSTRAINT `fk_films_has_genres_films1` FOREIGN KEY (`films_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_films_has_genres_genres1` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `fk_model_has_permissions_permissions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `fk_model_has_roles_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `fk_role_has_permissions_permissions1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `fk_role_has_permissions_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `fk_timetable_film1` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_timetable_studio1` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`);

--
-- Constraints for table `timetable_has_seat`
--
ALTER TABLE `timetable_has_seat`
  ADD CONSTRAINT `fk_seat_has_timetable_seat1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`),
  ADD CONSTRAINT `fk_seat_has_timetable_timetable1` FOREIGN KEY (`timetable_id`) REFERENCES `timetables` (`id`),
  ADD CONSTRAINT `fk_timetable_has_seat_studio1` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`id`);

--
-- Constraints for table `timetable_has_transaction`
--
ALTER TABLE `timetable_has_transaction`
  ADD CONSTRAINT `fk_timetable_has_seat1_seat1` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`),
  ADD CONSTRAINT `fk_timetable_has_seat1_timetable1` FOREIGN KEY (`timetable_id`) REFERENCES `timetables` (`id`),
  ADD CONSTRAINT `fk_timetable_has_seat1_transaction1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transaction_timetable1` FOREIGN KEY (`timetable_id`) REFERENCES `timetables` (`id`),
  ADD CONSTRAINT `fk_transactions_users2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `fk_transaction_detail_transaction1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
