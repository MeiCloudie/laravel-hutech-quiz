-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 08:47 AM
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
-- Database: `sql6697585`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `content`, `is_correct`, `order`, `created_at`, `updated_at`, `deleted_at`, `quiz_id`) VALUES
(1, '1', 0, 1, '2024-04-12 22:21:20', '2024-04-13 01:40:57', NULL, 1),
(2, '2', 1, 2, '2024-04-12 22:21:20', '2024-04-13 01:40:57', NULL, 1),
(3, '9', 0, 1, '2024-04-12 22:21:20', '2024-04-13 01:46:48', NULL, 2),
(4, '18', 1, 2, '2024-04-12 22:21:20', '2024-04-13 01:46:48', NULL, 2),
(5, '3', 1, 1, '2024-04-12 22:21:20', '2024-04-13 01:39:42', NULL, 3),
(6, '4', 0, 2, '2024-04-12 22:21:20', '2024-04-13 01:39:42', NULL, 3),
(7, '3', 0, 1, '2024-04-12 22:21:20', '2024-04-13 01:39:51', NULL, 4),
(8, '4', 1, 2, '2024-04-12 22:21:20', '2024-04-13 01:39:51', NULL, 4),
(9, '27', 0, 1, '2024-04-12 22:21:20', '2024-04-13 01:39:57', NULL, 5),
(10, '28', 1, 2, '2024-04-12 22:21:20', '2024-04-13 01:39:57', NULL, 5),
(11, '36', 1, 1, '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL, 6),
(12, '35', 0, 2, '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL, 6),
(13, '34', 0, 3, '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL, 6),
(14, '33', 0, 4, '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL, 6),
(15, '10', 1, 1, '2024-04-13 01:49:04', '2024-04-13 01:49:04', NULL, 7),
(16, '17', 0, 1, '2024-04-13 01:49:04', '2024-04-13 01:49:04', NULL, 7),
(17, '24', 0, 1, '2024-04-13 01:49:04', '2024-04-13 01:49:04', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Công nghệ thông tin', '2024-04-12 22:21:19', '2024-04-12 22:21:19', NULL),
(2, 'Anh ngữ', '2024-04-12 22:21:19', '2024-04-12 22:21:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
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
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_24_101241_create_quizzes_table', 1),
(7, '2024_03_26_022840_create_answers_table', 1),
(8, '2024_03_26_084045_create_quiz_collections_table', 1),
(9, '2024_03_26_095519_create_quiz_to_quiz_collections_table', 1),
(10, '2024_03_27_135137_create_rooms_table', 1),
(11, '2024_03_27_153930_create_records_table', 1),
(12, '2024_04_03_044146_create_faculties_table', 1),
(13, '2024_04_03_051601_add_faculty_id_to_users_table', 1),
(14, '2024_04_10_071344_create_user_to_rooms_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) NOT NULL,
  `explaination` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `content`, `explaination`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1 + 1 = ?', 'Phép cộng', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(2, '9 x 2 = ?', 'Phép nhân', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(3, '1 + 2 = ?', 'Phép cộng', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(4, '1 + 3 = ?', 'Phép cộng', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(5, '9 x 3 = ?', 'Phép nhân', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(6, '9 x 4 = ?', 'Phép nhân', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(7, '9 + 8', 'Cộng', '2024-04-13 01:49:04', '2024-04-13 01:49:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_collections`
--

CREATE TABLE `quiz_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_collections`
--

INSERT INTO `quiz_collections` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đại số tuyến tính 001', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(2, 'Cơ sở dữ liệu', '2024-04-12 22:21:20', '2024-04-13 01:47:04', NULL),
(3, 'Toán lớp 1', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL),
(4, 'Toán lớp 3', '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_to_quiz_collections`
--

CREATE TABLE `quiz_to_quiz_collections` (
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_collection_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_to_quiz_collections`
--

INSERT INTO `quiz_to_quiz_collections` (`quiz_id`, `quiz_collection_id`, `order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, NULL, NULL, NULL),
(2, 4, 1, NULL, NULL, NULL),
(3, 3, 2, NULL, NULL, NULL),
(4, 3, 3, NULL, NULL, NULL),
(5, 4, 2, NULL, NULL, NULL),
(6, 4, 3, NULL, NULL, NULL),
(7, 3, 4, '2024-04-13 01:49:04', '2024-04-13 01:49:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `created_at`, `updated_at`, `user_id`, `room_id`, `quiz_id`, `answer_id`) VALUES
(25, '2024-04-13 01:37:41', '2024-04-13 01:37:41', 1, 2, 1, 2),
(26, '2024-04-13 01:37:41', '2024-04-13 01:37:41', 1, 2, 3, 6),
(27, '2024-04-13 01:37:41', '2024-04-13 01:37:41', 1, 2, 4, 7),
(28, '2024-04-13 01:38:44', '2024-04-13 01:38:44', 1, 1, 2, 3),
(29, '2024-04-13 01:38:44', '2024-04-13 01:38:44', 1, 1, 5, 9),
(30, '2024-04-13 01:38:44', '2024-04-13 01:38:44', 1, 1, 6, 12),
(40, '2024-04-13 01:50:54', '2024-04-13 01:50:54', 3, 2, 1, 1),
(41, '2024-04-13 01:50:54', '2024-04-13 01:50:54', 3, 2, 3, 5),
(42, '2024-04-13 01:50:54', '2024-04-13 01:50:54', 3, 2, 4, 7),
(43, '2024-04-13 01:50:54', '2024-04-13 01:50:54', 3, 2, 7, 15);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0,
  `duration` int(11) NOT NULL DEFAULT 30,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `current_quiz_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quiz_collection_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `code`, `is_closed`, `duration`, `created_at`, `updated_at`, `deleted_at`, `owner_id`, `current_quiz_id`, `quiz_collection_id`) VALUES
(1, '12345', 0, 600, '2024-04-12 22:21:20', '2024-04-13 00:56:47', NULL, 1, 1, 4),
(2, '12346', 0, 60, '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` varchar(191) NOT NULL DEFAULT 'USER',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `faculty_id`) VALUES
(1, 'Thái', 'Nguyễn Hồng', '2080600914', 'thai@gmail.com', 'USER', NULL, '$2y$12$8tMfIMcKfIu.C8WxXQRaFeTxTnCr9F65WVo1Vd9uf//BZIh8qDuZy', NULL, '2024-04-12 22:21:20', '2024-04-12 22:21:20', 1),
(2, 'Vân', 'Trương Thục', '2080600803', 'mei@gmail.com', 'USER', NULL, '$2y$12$AxPQfjOIl2ThvDBk8YLyX.QXofYfmb1YfFObWJ4iSwoCtxAOQsABm', NULL, '2024-04-12 22:21:20', '2024-04-12 22:21:20', 1),
(3, 'Admin', 'I am', 'admin', 'admin@gmail.com', 'ADMIN', NULL, '$2y$12$hLxRdglehdRLH5O9YPv2b./B4vJbbylYiwR2eetBtkYaMyndHLy4q', NULL, '2024-04-12 22:21:20', '2024-04-12 22:21:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_to_rooms`
--

CREATE TABLE `user_to_rooms` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_to_rooms`
--

INSERT INTO `user_to_rooms` (`user_id`, `room_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, NULL, NULL),
(1, 1, NULL, NULL, NULL),
(3, 2, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_collections`
--
ALTER TABLE `quiz_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_to_quiz_collections`
--
ALTER TABLE `quiz_to_quiz_collections`
  ADD PRIMARY KEY (`quiz_id`,`quiz_collection_id`),
  ADD KEY `quiz_to_quiz_collections_quiz_collection_id_foreign` (`quiz_collection_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_user_id_foreign` (`user_id`),
  ADD KEY `records_room_id_foreign` (`room_id`),
  ADD KEY `records_quiz_id_foreign` (`quiz_id`),
  ADD KEY `records_answer_id_foreign` (`answer_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_code_unique` (`code`),
  ADD KEY `rooms_owner_id_foreign` (`owner_id`),
  ADD KEY `rooms_current_quiz_id_foreign` (`current_quiz_id`),
  ADD KEY `rooms_quiz_collection_id_foreign` (`quiz_collection_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `user_to_rooms`
--
ALTER TABLE `user_to_rooms`
  ADD KEY `user_to_rooms_user_id_foreign` (`user_id`),
  ADD KEY `user_to_rooms_room_id_foreign` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_collections`
--
ALTER TABLE `quiz_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
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
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_to_quiz_collections`
--
ALTER TABLE `quiz_to_quiz_collections`
  ADD CONSTRAINT `quiz_to_quiz_collections_quiz_collection_id_foreign` FOREIGN KEY (`quiz_collection_id`) REFERENCES `quiz_collections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_to_quiz_collections_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `records_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `records_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_current_quiz_id_foreign` FOREIGN KEY (`current_quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_quiz_collection_id_foreign` FOREIGN KEY (`quiz_collection_id`) REFERENCES `quiz_collections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_to_rooms`
--
ALTER TABLE `user_to_rooms`
  ADD CONSTRAINT `user_to_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_to_rooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
