-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 03:13 PM
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
-- Database: `database_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `claim_date` date DEFAULT NULL,
  `claim_type` varchar(255) DEFAULT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `employee_id`, `employee_name`, `claim_date`, `claim_type`, `amount`, `created_at`, `updated_at`) VALUES
(4, '121237', 'aaa', '2024-10-08', 'Travel Expenses gg', 9000, '2024-10-13 15:14:44', '2024-10-13 15:28:59');

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
-- Table structure for table `hr1_employee_info`
--

CREATE TABLE `hr1_employee_info` (
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `generate_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr1_employee_info`
--

INSERT INTO `hr1_employee_info` (`employee_id`, `employee_name`, `generate_code`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa', 'cEiS3Ojx7c', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr3_attendance`
--

CREATE TABLE `hr3_attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `time_in` varchar(255) DEFAULT NULL,
  `time_out` varchar(255) DEFAULT NULL,
  `date_time_in` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr3_attendance`
--

INSERT INTO `hr3_attendance` (`id`, `employee_id`, `time_in`, `time_out`, `date_time_in`, `created_at`, `updated_at`) VALUES
(3, '1', '03:07 pm', '03:07 pm', '2024-10-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hr3_leave_management`
--

CREATE TABLE `hr3_leave_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `date_request` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr3_leave_management`
--

INSERT INTO `hr3_leave_management` (`id`, `employee_id`, `employee_name`, `start_date`, `end_date`, `leave_type`, `date_request`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'awit sayo', '2024-10-04', '2024-10-23', 'Peternity Leave', '2024-10-13 08:28:22', 'Pending', '2024-10-13 15:25:43', '2024-10-13 15:28:22'),
(2, '1', 'aaaa', '2024-10-08', '2024-10-22', 'Peternity Leave', '2024-10-13 08:28:40', 'Pending', '2024-10-13 15:28:40', '2024-10-13 15:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `hr3_shift_and_scheduling`
--

CREATE TABLE `hr3_shift_and_scheduling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `shift_start` varchar(255) DEFAULT NULL,
  `shift_end` varchar(255) DEFAULT NULL,
  `shift_type` varchar(255) DEFAULT NULL,
  `shift_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr3_shift_and_scheduling`
--

INSERT INTO `hr3_shift_and_scheduling` (`id`, `employee_id`, `employee_name`, `shift_start`, `shift_end`, `shift_type`, `shift_date`, `created_at`, `updated_at`) VALUES
(1, '787878', NULL, '04:32', '03:32', 'Day Shift', NULL, '2024-10-13 15:29:44', '2024-10-13 15:29:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_05_144318_create_claims_table', 1),
(6, '2024_10_06_084303_hr3_leave_management', 1),
(7, '2024_10_08_092201_hr3_shift_and_scheduling', 1),
(8, '2024_10_08_100019_hr3_attendance', 1),
(9, '2024_10_13_021929_hr1_employee_info', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marielle Ratke V', 'ireynolds@example.net', '2024-10-13 15:04:47', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'K1nwozsj0F', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(2, 'Ms. Alessandra Kiehn Jr.', 'molly76@example.org', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'Aw0dmurpsE', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(3, 'Prof. Nelle Schuppe', 'lebsack.noemie@example.com', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'diFuZHlMa0', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(4, 'Shyanne Schowalter', 'gusikowski.jess@example.net', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', '0E7APRUzNF', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(5, 'Angelica Cruickshank Jr.', 'stoltenberg.austin@example.net', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'U9c2GWDVNb', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(6, 'Evan Jast', 'alverta43@example.net', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'hUgTAzAOIe', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(7, 'Tom Becker', 'wpfannerstill@example.org', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'ktpZ0jLmVU', '2024-10-13 15:04:48', '2024-10-13 15:04:48'),
(8, 'Winfield Wiegand Sr.', 'wlueilwitz@example.com', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'cqYo4S1Drv', '2024-10-13 15:04:49', '2024-10-13 15:04:49'),
(9, 'Hayden Hoppe', 'nichole99@example.net', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'mi3xkiFnuQ', '2024-10-13 15:04:49', '2024-10-13 15:04:49'),
(10, 'Bernadine Jenkins', 'pbartell@example.org', '2024-10-13 15:04:48', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'h6SfBfJshx', '2024-10-13 15:04:49', '2024-10-13 15:04:49'),
(11, 'Test User', 'test@example.com', '2024-10-13 15:04:49', '$2y$12$v1zR7oWjUmmfvuCkcBsATe5nZE1PiYAWmZaJzOslwWykF/9VkUZWm', 'cXtleMGQtP', '2024-10-13 15:04:49', '2024-10-13 15:04:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hr1_employee_info`
--
ALTER TABLE `hr1_employee_info`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `hr3_attendance`
--
ALTER TABLE `hr3_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr3_leave_management`
--
ALTER TABLE `hr3_leave_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr3_shift_and_scheduling`
--
ALTER TABLE `hr3_shift_and_scheduling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr1_employee_info`
--
ALTER TABLE `hr1_employee_info`
  MODIFY `employee_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr3_attendance`
--
ALTER TABLE `hr3_attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hr3_leave_management`
--
ALTER TABLE `hr3_leave_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hr3_shift_and_scheduling`
--
ALTER TABLE `hr3_shift_and_scheduling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
