-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 08:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'DDL', '2023-08-06 07:08:56', '2023-08-06 07:08:56'),
(3, 'dd', '2023-08-09 05:47:13', '2023-08-09 05:47:13'),
(4, 'roua', '2023-08-16 05:43:07', '2023-08-16 05:43:07'),
(5, 'Hadeel', '2023-08-22 13:13:21', '2023-08-22 13:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `details` text NOT NULL,
  `hours` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `max_students` int(11) NOT NULL,
  `course_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `category_id`, `details`, `hours`, `start_date`, `teacher`, `max_students`, `course_price`, `created_at`, `updated_at`) VALUES
(11, 'rafah', 3, '<p>ddd</p>', 120, '2023-08-25', 'Amna', 4, 500, '2023-08-16 05:41:48', '2023-08-23 06:41:29'),
(12, 'jorden', 5, '<p>ssd</p>', 120, '2023-08-23', 'Amna', 10, 300, '2023-08-22 13:14:29', '2023-08-23 06:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `amount_paid` int(11) NOT NULL,
  `remaining_amount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `course_id`, `student_id`, `is_paid`, `amount_paid`, `remaining_amount`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(45, 12, 3, 0, 200, 100, '2023-08-23', '2023-08-24', '2023-08-22 13:33:21', '2023-08-23 06:53:07'),
(75, 11, 6, 0, 100, 400, '2023-08-31', '2023-09-15', '2023-08-24 03:21:02', '2023-08-24 03:27:56'),
(76, 11, 3, 0, 100, 400, '2023-08-31', '2023-09-01', '2023-08-24 03:21:53', '2023-08-24 03:21:53');

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
(5, '2023_07_30_204528_create_categorys_table', 1),
(6, '2023_08_01_222705_create_students_table', 1),
(7, '2023_08_06_091124_create_courses_table', 2),
(8, '2023_08_06_092351_create_course_student_table', 3),
(9, '2023_08_16_083556_create_payments_table', 4);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_student_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `course_student_id`, `amount`, `payment_date`, `created_at`, `updated_at`) VALUES
(18, 45, 23, '2023-09-07', '2023-08-23 05:59:48', '2023-08-23 05:59:48'),
(23, 45, 35, '2023-09-01', '2023-08-23 06:52:55', '2023-08-23 06:52:55'),
(24, 45, 35, '2023-09-08', '2023-08-23 06:53:07', '2023-08-23 06:53:07'),
(72, 75, 100, '2023-08-25', '2023-08-24 03:21:02', '2023-08-24 03:21:02'),
(73, 76, 100, '2023-08-31', '2023-08-24 03:21:53', '2023-08-24 03:21:53');

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_arabic` varchar(255) NOT NULL,
  `name_english` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `educational_stage` enum('Primary','Middle','High School','University') NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name_arabic`, `name_english`, `birth_date`, `educational_stage`, `major`, `email`, `phone`, `address`, `details`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'آلاء رائد أبو خريبة', 'Alaa Raed', '2017-12-08', 'Primary', NULL, 'alaa@gmail.com', '0569823698', 'gaza', 'no', 1, '2023-08-09 03:30:21', '2023-08-09 03:30:21'),
(4, 'سما عبدالله صالح نصرالله', 'sama abdallah saleh nasrallah', '2017-12-06', 'Primary', NULL, 'roua@gmail.com', '0598525825', 'gaza', 'f', 0, '2023-08-15 09:31:04', '2023-08-15 09:31:04'),
(5, 'آلاء رائد أبو خريبة', 'deema talal abu shammalah', '2017-12-19', 'Primary', NULL, 'hadeel@gmail.com', '0598525825', 'hhh', 'php', 1, '2023-08-16 05:40:48', '2023-08-16 05:41:14'),
(6, 'سما  نصرالله', 'sama nasrallah', '2017-12-13', 'High School', NULL, 'deema@gmail.com', '0598525825', 'gaza', 'no', 1, '2023-08-22 13:12:50', '2023-08-22 13:13:07');

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
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_course_id_foreign` (`course_id`),
  ADD KEY `course_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_course_student_id_foreign` (`course_student_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_course_student_id_foreign` FOREIGN KEY (`course_student_id`) REFERENCES `course_student` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
