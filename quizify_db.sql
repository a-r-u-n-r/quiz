-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 08:17 AM
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
-- Database: `quizify_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quiz_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`, `quiz_id`) VALUES
(39, 'Very Good', 'Achieved Very Good in the General Knowledge quiz!', 7, '2025-01-28 14:47:50', '2025-01-28 14:47:50', 8),
(40, 'Very Good', 'Achieved Very Good in the ICT quiz!', 8, '2025-01-28 14:50:18', '2025-01-28 14:50:18', 9),
(41, 'Improve', 'Achieved Improve in the English quiz!', 9, '2025-01-28 15:02:18', '2025-01-28 15:02:18', 10),
(42, 'Improve', 'Achieved Improve in the English quiz!', 7, '2025-01-28 23:49:37', '2025-01-28 23:49:37', 10),
(43, 'Very Good', 'Achieved Very Good in the ICT quiz!', 7, '2025-01-28 23:51:05', '2025-01-28 23:51:05', 9);

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
(5, '2025_01_17_141255_add_role_to_users_table', 1),
(6, '2025_01_19_170234_create_quizzes_table', 2),
(7, '2025_01_19_170245_create_questions_table', 2),
(8, '2025_01_19_190422_create_quiz_results_table', 3),
(9, '2025_01_26_164627_create_achievements_table', 4),
(10, '2025_01_26_171829_add_start_date_to_quizzes_table', 5),
(11, '2025_01_26_172101_add_is_challenge_to_quizzes_table', 6),
(12, '2025_01_26_200824_add_quiz_id_to_achievements_table', 7);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `created_at`, `updated_at`) VALUES
(18, 8, '১।প্রশ্ন: বাংলাদেশ ও মায়ানমার কোন নদী দ্বারা বিভক্ত?', 'নাফ', 'কর্ণফুলী', 'নবগঙ্গা', 'ভাগিরথী', 'A', '2025-01-28 14:25:48', '2025-01-28 14:25:48'),
(19, 8, '২।প্রশ্ন: কবি কাজী নজরুল ইসলামের কবর কোথায় অবস্থিত?', 'আজিমপুরের কবরস্থানে', 'মীরপুর শহীদ বুদ্ধিজীবী কবরস্থানে', 'বনানীতে', 'ঢাকা বিশ্ববিদ্যালয়ের মসজিদের পাশে', 'D', '2025-01-28 14:29:01', '2025-01-28 14:29:01'),
(20, 8, '৩।প্রশ্ন: বাংলাদেশের বৃহত্তম হাওড়-', 'পাথরচাওলি', 'হাইল', 'চলন বিল', 'হাকালুকি', 'D', '2025-01-28 14:29:39', '2025-01-28 14:29:39'),
(21, 8, '৪।প্রশ্ন: সিলেটের প্রাচীন নাম ছিল –', 'শ্রীহট্ট', 'জালালাবাদ', 'শ্রীভূমি', 'আফজালাবাদ', 'B', '2025-01-28 14:30:22', '2025-01-28 14:30:22'),
(22, 8, '৫।প্রশ্ন: নিম্নের কোন অঞ্চলটি পাহাড়ি এলাকাভুক্ত নয়?', 'খাগড়াছড়ি', 'কক্সবাজার', 'মৌলভীবাজার', 'ময়মনসিংহ', 'D', '2025-01-28 14:31:09', '2025-01-28 14:31:09'),
(23, 8, '৬।প্রশ্ন: তামাবিল সীমান্তের সাথে ভারতের কোন শহরটি অবস্থিত?', 'করিমগঞ্জ', 'খোয়াই', 'পেট্রাপল', 'ডাউকি', 'D', '2025-01-28 14:31:44', '2025-01-28 14:31:44'),
(24, 8, '৭।প্রশ্ন: ‘সাগরকন্যা’ কোন এলাকার ভৌগলিক নাম?', 'টেকনাফ', 'কক্সবাজার', 'পটুয়াখালী', 'খুলনা', 'C', '2025-01-28 14:32:21', '2025-01-28 14:32:21'),
(25, 8, '৮।প্রশ্ন: পদ্মা কোথায় মেঘনা নদীর সাথে মিশেছে?', 'গোয়ালন্দ', 'চাঁদপুর', 'ভৈরব', 'নরসিংদী', 'B', '2025-01-28 14:32:55', '2025-01-28 14:32:55'),
(26, 8, '৯।প্রশ্ন: ‘বলিশিরা ভ্যালি’ কোথায় অবস্থিত?', 'ঝালকাঠি', 'ভোলা', 'রাঙ্গামাটি', 'মৌলভীবাজার', 'D', '2025-01-28 14:33:36', '2025-01-28 14:33:36'),
(27, 8, '১০।প্রশ্ন: আরাকান পাহাড় হতে উৎপন্ন নদী কোনটি?', 'ফেনী নদী', 'সাঙ্গু নদী', 'নাফ নদী', 'কর্ণফুলী নদী', 'B', '2025-01-28 14:34:15', '2025-01-28 14:34:15'),
(28, 9, '1. Web hosting service is a type of-', 'Internet Hosting Service', 'Genetic algorithm', 'Computer programming', 'Hypertext transfer protocol', 'A', '2025-01-28 14:36:45', '2025-01-28 14:36:45'),
(29, 9, '2. Which one of the following is not an internet search engine?', 'Windows', 'Google', 'MSN', 'Network Address', 'A', '2025-01-28 14:37:24', '2025-01-28 14:37:24'),
(30, 9, '3. In which year internet service started?', '1981', '1965', '1969', '1971', 'C', '2025-01-28 14:37:59', '2025-01-28 14:37:59'),
(31, 9, '4. Who is called the father of the Internet?', 'Vinton Gray Cerf', 'Charles Babej', 'Warren Buffet', 'Vinton Gray', 'A', '2025-01-28 14:38:50', '2025-01-28 14:38:50'),
(32, 9, '5. What is the full meaning of CSS?', 'Cascading Sheets Style', 'Cascading System Sheets', 'Computer Style Sheets', 'Cascading Style Sheets', 'D', '2025-01-28 14:39:38', '2025-01-28 14:39:38'),
(33, 9, '6. How many bits are there in (Internet Protocol Version-6) IPV6?', '120', '128', '130', '136', 'a', '2025-01-28 14:40:34', '2025-01-28 14:40:48'),
(34, 9, '7. Which one is the first smartphone in the world?', 'IBM Simon', 'BlackBerry', 'HTC', 'Apple', 'A', '2025-01-28 14:41:58', '2025-01-28 14:41:58'),
(35, 9, '8. Who is the founder of Oracle Corporation?', 'Bill Gates', 'Andrew S Grove', 'Lawrence J . Ellison', 'Steve Jobs', 'C', '2025-01-28 14:42:49', '2025-01-28 14:42:49'),
(36, 9, '9. What was the previous or first name of Facebook?', 'Facebook', 'Face lock', 'Face mash', 'The facebook.com', 'C', '2025-01-28 14:43:42', '2025-01-28 14:43:42'),
(37, 9, '10. Which social media is suitable for professionals?', 'LinkedIn', 'Facebook', 'Twitter', 'Instagram', 'A', '2025-01-28 14:44:23', '2025-01-28 14:44:23'),
(38, 10, '1. They ______________ her and trusted her for years', 'know', 'had known', 'knew', 'known', 'C', '2025-01-28 14:54:36', '2025-01-28 14:54:36'),
(39, 10, '2. Every morning she ______________ up early and gets ready for work.', 'is waking', 'has woken', 'had woken', 'wakes', 'D', '2025-01-28 14:55:17', '2025-01-28 14:55:17'),
(40, 10, '3. People ______________ walk on grass.', 'couldn\'t', 'needn\'t', 'mustn\'t', 'may not', 'C', '2025-01-28 14:55:50', '2025-01-28 14:55:50'),
(41, 10, '4. ______________ you speak any foreign languages?', 'can\'t', 'should', 'couldn\'t', 'can', 'D', '2025-01-28 14:56:59', '2025-01-28 14:56:59'),
(42, 10, '5. World war I and World war II took place ______________ the 20th century.', 'on', 'in', 'at', 'into', 'B', '2025-01-28 14:57:33', '2025-01-28 14:57:33'),
(43, 10, '6. I wanted to go to the park, ______________ my mother refused.', 'but', 'or', 'so', 'and', 'A', '2025-01-28 14:58:16', '2025-01-28 14:58:16'),
(44, 10, '7. This must not happen again, ______________ you will be dismissed.', 'or', 'but', 'and', 'so', 'A', '2025-01-28 14:58:47', '2025-01-28 14:58:47'),
(45, 10, '8. ______________ is the one who starts the communication.', 'sender', 'receiver', 'feedback', 'noise', 'A', '2025-01-28 14:59:28', '2025-01-28 14:59:28'),
(46, 10, '9. There are ______________ C\'s in Communication principles.', 'eight', 'seven', 'six', 'five', 'B', '2025-01-28 15:00:03', '2025-01-28 15:00:03'),
(47, 10, '10. Most conflict is the result of ______________ communication.', 'effective', 'misunderstood', 'ineffective', 'spontaneous', 'B', '2025-01-28 15:00:40', '2025-01-28 15:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `is_challenge` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `created_at`, `updated_at`, `start_date`, `is_challenge`) VALUES
(8, 'General Knowledge', 'Time:20 | Q: 20', '2025-01-28 13:59:42', '2025-01-28 14:22:09', NULL, 0),
(9, 'ICT', 'Time: 20 | Q: 20', '2025-01-28 14:00:00', '2025-01-28 14:22:17', NULL, 0),
(10, 'English', 'Time: 20 | Q: 20', '2025-01-28 14:00:16', '2025-01-28 14:22:44', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `quiz_id`, `score`, `created_at`, `updated_at`) VALUES
(202, 7, 8, 8, '2025-01-28 14:47:50', '2025-01-28 14:47:50'),
(203, 8, 9, 8, '2025-01-28 14:50:18', '2025-01-28 14:50:18'),
(204, 9, 10, 4, '2025-01-28 15:02:18', '2025-01-28 15:02:18'),
(205, 7, 8, 8, '2025-01-28 23:38:20', '2025-01-28 23:38:20'),
(206, 7, 10, 3, '2025-01-28 23:49:37', '2025-01-28 23:49:37'),
(207, 7, 9, 8, '2025-01-28 23:51:05', '2025-01-28 23:51:05');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Shahin Alam', 'mdshaheenalam85@gmail.com', NULL, '$2y$10$1.9RyEhhDOOFqv1BGJllguAEgAO5kqos5r.q1XoxBhfoPcXpmVzcS', NULL, '2025-01-17 08:28:28', '2025-01-28 08:37:35', 'admin'),
(7, 'Shahin Alam', 'shahin@gmail.com', NULL, '$2y$10$XUvZnU.BuJu2ERE80wDkeulN0YBYuzFVhpoVhW3P13.x3MAlQUAaW', NULL, '2025-01-28 14:45:19', '2025-01-28 14:45:19', 'user'),
(8, 'tasnim Jahan', 'tasnim@gmail.com', NULL, '$2y$10$6MPcMKT97QMb8uGYFVgwmOgHEG8T8qVVIukpkYWMrptQgTkbW/RoS', NULL, '2025-01-28 14:49:18', '2025-01-28 14:49:18', 'user'),
(9, 'Shamim Alam', 'shamim@gmail.com', NULL, '$2y$10$n/CO7.3b/uI5JQo.6/pqauaTHSvNiXd.yLnROt8GTRAm4iMQ1y2Q2', NULL, '2025-01-28 15:01:38', '2025-01-28 15:01:38', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achievements_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_results_user_id_foreign` (`user_id`),
  ADD KEY `quiz_results_quiz_id_foreign` (`quiz_id`);

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
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
