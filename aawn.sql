-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 12:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aawn`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `ar_content`, `en_content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن', '', '15765076948722.jpg', '2019-12-17 22:00:00', '2019-12-16 12:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Student', 'karim@admin.com', '$2y$10$vKWvPh/FfVYGbsWNvbTlu.nuhsSXRom1oD/NFTyRFzJT6nQy5r0wS', 'KKQyXEWjPYYvG4410jx1k8whvlefR9xT8UgrE0nLVBodlqzbSXgB4Xg1RkXX', '2019-12-01 22:00:00', '2019-12-04 22:00:00'),
(2, 'waelserag', 'waelserag1@gmail.com', '$2y$10$94UPXWLwNenrV8BPNzTntON4c/PABUCeluSZYK8258GgGGYshe99O', NULL, '2020-01-09 07:19:32', '2020-01-09 07:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `main_country_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `user_id`, `country_id`, `main_country_id`, `name`, `email`, `status`, `address`, `phone`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 7, 'مستشفى مصر الدولى', 'MisrInternational@gmail.com', '1', '12ش السرايا، ميدان فيني', '011211224', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.778639039884!2d31.218349384930544!3d30.043207881882765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847326973319b%3A0xc3a09893e51a0df5!2z2YXYs9iq2LTZgdmKINmF2LXYsSDYp9mE2K_ZiNmE2Yo!5e0!3m2!1sar!2seg!4v1576583556163!5m2!1sar!2seg\"  frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', '2019-12-17 22:00:00', '2019-12-18 22:00:00'),
(5, 1, 12, 7, 'cvxxcv', 'aaa@gmail.com', '1', 'xbcx', '0526352255', 'fyyxj', NULL, NULL),
(6, 1, 14, 10, 'cvxxcv', 'wwwww@gmail.com', NULL, 'xbcx', '0000', 'fyyxj', '2020-01-07 10:57:57', '2020-01-07 10:57:57'),
(7, 1, 13, 10, 'وائل محمد سراج', 'waelserag1@gmail.com', NULL, 'حي الملز - الرياض', '0526352255', NULL, '2020-01-07 11:03:53', '2020-01-07 11:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `block_users`
--

CREATE TABLE `block_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `block_users`
--

INSERT INTO `block_users` (`id`, `ip`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.6', NULL, NULL),
(2, '127.0.0.5', NULL, NULL),
(6, '878787', '2020-01-13 06:33:45', '2020-01-13 06:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `news_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 3, 'التعليق الاول على الفعالية', 6, '2019-12-31 12:15:18', '2019-12-31 12:15:18'),
(3, 3, 'أول تعليق', 4, '2019-12-31 12:20:22', '2019-12-31 12:20:22'),
(5, 3, 'ثالث تعليق', 4, '2019-12-31 12:21:52', '2019-12-31 12:21:52'),
(6, 4, 'تعليق جديد', 6, '2019-12-31 12:22:42', '2019-12-31 12:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'وائل محمد سراج', 'waelserag1@gmail.com', 'استفسار', 'تجربة إرسال رسالة من الزوار', '2019-12-31 05:55:28', '2019-12-31 05:55:28'),
(3, 'dassadsad', 'test@gmail.com', 'dsadsadasdsadsadsad', '4564654654fsd4fsdf65465f4sd5f4sdf65ds56f4sdf55464f56sd4f65sdf4s65dfs6d5fsdf4f65', '2020-02-05 11:53:31', '2020-02-05 11:53:31'),
(4, 'dassadsad', 'test@gmail.com', 'dsadsadasdsadsadsad', '4564654654fsd4fsdf65465f4sd5f4sdf65ds56f4sdf55464f56sd4f65sdf4s65dfs6d5fsdf4f65', '2020-02-05 11:53:58', '2020-02-05 11:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name_ar`, `country_name_en`, `mob`, `code`, `logo`, `parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'مصر', NULL, NULL, 'eg', NULL, NULL, '2019-12-16 12:25:36', '2019-12-16 12:25:36', NULL),
(9, 'القاهرة', NULL, NULL, 'eg', NULL, '7', '2019-12-17 08:47:05', '2020-01-19 05:52:47', NULL),
(10, 'السعودية', NULL, NULL, 'KSA', NULL, NULL, '2019-12-18 08:40:24', '2019-12-18 08:40:24', NULL),
(11, 'الرياض', NULL, NULL, NULL, NULL, '10', '2019-12-19 06:40:20', '2019-12-19 06:40:20', NULL),
(12, 'جدة', NULL, NULL, NULL, NULL, '10', '2019-12-19 06:40:29', '2019-12-19 06:40:29', NULL),
(13, 'الدمام', NULL, NULL, NULL, NULL, '10', '2019-12-19 06:40:53', '2019-12-19 06:40:53', NULL),
(14, 'القصيم', NULL, NULL, NULL, NULL, '10', '2019-12-19 06:41:12', '2019-12-19 06:41:12', NULL),
(15, 'المنصورة', NULL, NULL, NULL, NULL, '7', '2020-01-09 07:36:09', '2020-01-09 07:36:09', NULL),
(16, 'الاسكندرية', NULL, NULL, NULL, NULL, '7', '2020-01-12 05:53:21', '2020-01-12 10:31:58', NULL),
(17, 'جازان', NULL, NULL, NULL, NULL, '10', '2020-01-12 06:02:40', '2020-01-12 06:02:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_news`
--

CREATE TABLE `department_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_news`
--

INSERT INTO `department_news` (`id`, `ar_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'مساعدات خيرية', 'cat test', '2019-12-12 11:00:20', '2019-12-16 07:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `department_products`
--

CREATE TABLE `department_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_products`
--

INSERT INTO `department_products` (`id`, `image`, `ar_name`, `en_name`, `parent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '15767458875575.jpg', 'الأجهزة الطبية', NULL, 0, '2019-12-19 06:58:07', '2019-12-19 06:58:07', NULL),
(2, '15760622397845.png', 'تجريبى رئيسى', 'cat test', 0, '2019-12-11 09:03:59', '2019-12-16 09:56:52', NULL),
(4, '15764974457945.png', 'تجريبى فرعى', NULL, 2, '2019-12-16 09:57:25', '2019-12-16 09:57:25', NULL),
(5, '15765027163756.png', 'مساعدات خيرية', NULL, 2, '2019-12-16 11:25:16', '2019-12-16 11:25:16', NULL),
(7, '157674590710042.jpg', 'الكراسي المتحركة', NULL, 1, '2019-12-19 06:58:27', '2019-12-19 06:58:27', NULL),
(8, '1576745936356.jpg', 'أجهزة الاستنشاق', NULL, 1, '2019-12-19 06:58:56', '2019-12-19 06:58:56', NULL),
(9, '15767536665275.jpg', 'أربطة طبية ودعامات', NULL, 0, '2019-12-19 09:07:46', '2019-12-19 09:07:46', NULL),
(10, '15788323649712.jpg', 'اجدد منتج', NULL, 9, '2020-01-12 10:32:44', '2020-01-12 10:33:19', '2020-01-12 10:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `product_id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(119, 9, 3, '2', '2020-01-13 05:34:57', '2020-01-13 05:34:57'),
(134, 7, 3, '1', '2020-01-21 11:48:59', '2020-01-21 11:48:59'),
(137, 21, 3, '1', '2020-01-21 11:49:10', '2020-01-21 11:49:10'),
(146, 33, 5, '2', '2020-01-26 09:19:03', '2020-01-26 09:19:03'),
(147, 34, 5, '2', '2020-01-26 09:19:05', '2020-01-26 09:19:05'),
(148, 19, 3, '1', '2020-01-28 11:28:03', '2020-01-28 11:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `department_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 4, 3, '2020-01-14 06:18:38', '2020-01-14 06:18:38'),
(9, 7, 3, '2020-01-14 06:18:38', '2020-01-14 06:18:38'),
(10, 5, 5, '2020-01-14 12:42:16', '2020-01-14 12:42:16'),
(11, 7, 5, '2020-01-14 12:42:16', '2020-01-14 12:42:16');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1131, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:38;s:5:\\\"title\\\";s:7:\\\"5432543\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-15 13:35:03.458925\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 255, NULL, 1579095373, 1579095373),
(1132, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:38;s:5:\\\"title\\\";s:7:\\\"5432543\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-15 13:35:13.501305\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 202, NULL, 1579095373, 1579095373),
(1133, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:39;s:5:\\\"title\\\";s:14:\\\"\\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-15 13:52:37.667117\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579096357, 1579096357),
(1134, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:39;s:5:\\\"title\\\";s:14:\\\"\\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-15 13:52:47.727683\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579096367, 1579096357),
(1135, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:40;s:5:\\\"title\\\";s:28:\\\"\\u0639\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0646\\u062f \\u062c\\u062f\\u064a\\u062f\\u0629\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-15 14:02:03.578273\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579096923, 1579096923),
(1136, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:40;s:5:\\\"title\\\";s:28:\\\"\\u0639\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0646\\u062f \\u062c\\u062f\\u064a\\u062f\\u0629\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-15 14:02:13.651899\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579096933, 1579096923),
(1137, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:41;s:5:\\\"title\\\";s:26:\\\"\\u0633\\u0631\\u064a\\u0631 \\u062c\\u062f\\u064a\\u062f \\u062e\\u0634\\u0628\\u064a\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-22 07:58:42.699616\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579679922, 1579679922),
(1138, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:41;s:5:\\\"title\\\";s:26:\\\"\\u0633\\u0631\\u064a\\u0631 \\u062c\\u062f\\u064a\\u062f \\u062e\\u0634\\u0628\\u064a\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-22 07:58:52.731229\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579679932, 1579679922),
(1139, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:43;s:5:\\\"title\\\";s:33:\\\"\\u0639\\u0631\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0628\\u062f\\u0648\\u0646 \\u0635\\u0648\\u0631\\u0629\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-22 08:00:47.876659\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579680047, 1579680047),
(1140, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:43;s:5:\\\"title\\\";s:33:\\\"\\u0639\\u0631\\u0636 \\u062c\\u062f\\u064a\\u062f \\u0628\\u062f\\u0648\\u0646 \\u0635\\u0648\\u0631\\u0629\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-22 08:00:57.901284\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579680057, 1579680047),
(1141, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:44;s:5:\\\"title\\\";s:28:\\\"\\u0639\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0646\\u062f \\u062c\\u062f\\u064a\\u062f\\u0629\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-22 08:01:16.613670\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579680076, 1579680076),
(1142, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:44;s:5:\\\"title\\\";s:28:\\\"\\u0639\\u0631\\u0636 \\u0645\\u0633\\u0627\\u0646\\u062f \\u062c\\u062f\\u064a\\u062f\\u0629\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-22 08:01:26.662413\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1579680086, 1579680076),
(1143, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:10:\\\"Wael Serag\\\";s:5:\\\"email\\\";s:20:\\\"waelserag1@gmail.com\\\";s:10:\\\"product_id\\\";i:45;s:5:\\\"title\\\";s:26:\\\"\\u0633\\u0631\\u064a\\u0631 \\u062c\\u062f\\u064a\\u062f \\u062e\\u0634\\u0628\\u064a\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-28 13:26:19.318262\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1580217979, 1580217979),
(1144, 'default', '{\"displayName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendInterestEmail\",\"command\":\"O:26:\\\"App\\\\Jobs\\\\SendInterestEmail\\\":8:{s:4:\\\"data\\\";a:4:{s:4:\\\"name\\\";s:42:\\\"\\u062e\\u0627\\u0644\\u062f \\u0625\\u0628\\u0631\\u0627\\u0647\\u064a\\u0645 \\u0639\\u0628\\u062f\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645\\\";s:5:\\\"email\\\";s:22:\\\"waelserag111@gmail.com\\\";s:10:\\\"product_id\\\";i:45;s:5:\\\"title\\\";s:26:\\\"\\u0633\\u0631\\u064a\\u0631 \\u062c\\u062f\\u064a\\u062f \\u062e\\u0634\\u0628\\u064a\\\";}s:6:\\\"\\u0000*\\u0000job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";O:25:\\\"Illuminate\\\\Support\\\\Carbon\\\":3:{s:4:\\\"date\\\";s:26:\\\"2020-01-28 13:26:29.475371\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1580217989, 1580217979);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_17_141051_create_department_news_table', 1),
(4, '2018_02_17_141051_create_department_product_table', 1),
(5, '2018_02_17_141051_create_news_table', 1),
(6, '2018_02_17_141051_create_posts_gallary_table', 1),
(7, '2018_02_17_141051_create_products_color_table', 1),
(8, '2018_02_17_141051_create_products_gallary_table', 1),
(9, '2018_02_17_141051_create_products_size_table', 1),
(10, '2018_02_17_141051_create_slider_image_table', 1),
(11, '2018_02_17_141051_create_wishlist_table', 1),
(12, '2018_02_20_025034_create_products_table', 1),
(13, '2018_02_20_025034_create_shopping_cart_table', 1),
(14, '2018_05_08_101248_create_admins_table', 1),
(15, '2018_05_14_145100_create_settings_table', 1),
(16, '2018_05_28_121718_create_countries_table', 1),
(17, '2018_06_12_113051_create_categories_table', 1),
(18, '2018_07_18_124326_create_orders', 1),
(19, '2018_07_18_124650_create_order_items', 1),
(20, '2018_07_18_150951_create_shipments_table', 1),
(21, '2018_07_26_161956_create_contactus', 1),
(22, '2018_07_29_110454_create_aboutus', 1),
(23, '2018_07_29_110454_create_faq', 1),
(24, '2014_10_12_000000_create_agents_table', 2),
(25, '2014_10_12_000000_create_users_table', 3),
(26, '2018_07_26_161956_create_support_tickets', 4),
(27, '2019_12_18_142820_add_provider_to_users', 5),
(29, '2019_12_26_082748_create_favourites_table', 6),
(30, '2019_12_26_121247_add_type_to_products', 6),
(31, '2020_01_12_131918_create_visitors_table', 7),
(32, '2020_01_12_150125_create_block_users_table', 8),
(33, '2020_01_13_072657_add_ip_to_users_table', 9),
(34, '2020_01_14_072206_create_interests_table', 10),
(35, '2016_06_01_000001_create_oauth_auth_codes_table', 11),
(36, '2016_06_01_000002_create_oauth_access_tokens_table', 11),
(37, '2016_06_01_000003_create_oauth_refresh_tokens_table', 11),
(38, '2016_06_01_000004_create_oauth_clients_table', 11),
(39, '2016_06_01_000005_create_oauth_personal_access_clients_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dep_id` int(11) DEFAULT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_country_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `user_id`, `dep_id`, `ar_title`, `en_title`, `en_content`, `ar_content`, `photo`, `main_country_id`, `country_id`, `date`, `address`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, 'مساعدات خيرية', NULL, NULL, 'تجريبى تجريبى تجريبى', NULL, 7, 9, NULL, 'حي الملز شارع 9 عمارة 8', '2019-12-16 08:40:36', '2019-12-16 08:40:36'),
(3, 1, NULL, 'الفعالية الاولى لنشر روح التعاون في المجتمع', NULL, NULL, 'الفعالية الاولى لنشر روح التعاون في المجتمع', NULL, 10, 13, NULL, 'حي الملز شارع 9 عمارة 8', '2019-12-19 09:48:38', '2019-12-19 09:48:38'),
(4, 1, NULL, 'الفعالية الثانية لنشر روح التعاون في المجتمع', NULL, NULL, 'الفعالية الثانية لنشر روح التعاون في المجتمع', NULL, 10, 13, NULL, 'حي الملز شارع 9 عمارة 8', '2019-12-19 09:48:52', '2019-12-19 09:48:52'),
(5, 1, NULL, 'قافلة الخير', NULL, NULL, 'قافلة الخير', NULL, 10, 14, NULL, 'حي المربع شارع 7', '2019-12-19 09:55:25', '2019-12-19 09:55:25'),
(6, 1, NULL, 'معرض القوافل الخير الخيري', NULL, NULL, 'الفعالية الاولى لنشر روح التعاون في المجتمع الفعالية الاولى لنشر روح التعاون في المجتمع الفعالية الاولى لنشر روح التعاون في المجتمع الفعالية الاولى لنشر روح التعاون في المجتمع الفعالية الاولى لنشر روح التعاون في المجتمع الفعالية الاولى لنشر روح التعاون في المجتمع الفعالية الاولى لنشر روح التعاون في المجتمع', NULL, 10, 13, '2019-12-31', 'حي الملز شارع 9 عمارة 8', '2019-12-31 11:02:40', '2019-12-31 11:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `news_gallary`
--

CREATE TABLE `news_gallary` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `media` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_gallary`
--

INSERT INTO `news_gallary` (`id`, `news_id`, `media`, `created_at`, `updated_at`) VALUES
(1, 2, 'SHxci-1576492836-Mti.jpg', '2019-12-16 08:40:36', '2019-12-16 08:40:36'),
(3, 2, 'QMurk-1576493285-pdI.jpg', '2019-12-16 08:48:05', '2019-12-16 08:48:05'),
(4, 3, 'vm2WW-1576756118-iXH.jpg', '2019-12-19 09:48:38', '2019-12-19 09:48:38'),
(5, 4, 'JS2Wk-1576756132-A2G.jpg', '2019-12-19 09:48:52', '2019-12-19 09:48:52'),
(6, 5, '2wuS7-1576756525-tc9.jpg', '2019-12-19 09:55:25', '2019-12-19 09:55:25'),
(7, 5, 'k7nsX-1576756525-bXG.jpg', '2019-12-19 09:55:25', '2019-12-19 09:55:25'),
(8, 6, 'cT8ad-1577797360-SxJ.jpg', '2019-12-31 11:02:40', '2019-12-31 11:02:40'),
(9, 6, 'kb1c4-1577797360-IU3.jpg', '2019-12-31 11:02:40', '2019-12-31 11:02:40'),
(10, 6, 'SkBqN-1577797360-6Hg.jpg', '2019-12-31 11:02:40', '2019-12-31 11:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('09fcd27d7560471f0a5c6b02838b08bbd01295e80ffe6f21855eb551b3d7f65df2e9323126eca974', 25, 3, 'Token', '[]', 0, '2020-02-06 05:47:29', '2020-02-06 05:47:29', '2021-02-06 07:47:29'),
('2db01fa9f4d934190a3ade7a7db25d811a50a365a198dc44cceceb75ecef6ec2666d01dc3705f1ea', 20, 3, 'TutsForWeb', '[]', 0, '2020-02-05 09:12:18', '2020-02-05 09:12:18', '2021-02-05 11:12:18'),
('3523807920c3708f3a30483fcddc026392a31fdbf46ee1cd4b86a5be50e4d2993e2e74234ddb02a3', 20, 3, 'TutsForWeb', '[]', 0, '2020-02-04 07:11:17', '2020-02-04 07:11:17', '2021-02-04 09:11:17'),
('4b6b36071162fb3b470618a2bf42d2a0b3fe701136a2a17cab66392d923277fcb54916198a7624d4', 20, 3, 'TutsForWeb', '[]', 0, '2020-02-02 10:55:45', '2020-02-02 10:55:45', '2021-02-02 12:55:45'),
('7fea56affa7f58abc5978bb5b0f94a370697bb2de428b3aec4d0ad408f668e4bf71b2016e8a56bb1', 23, 3, 'Token', '[]', 0, '2020-02-02 11:56:57', '2020-02-02 11:56:57', '2021-02-02 13:56:57'),
('95603fd849d1cbcafc83febb6a3ad1d5631af48168f498b594bdd486672746965a294197aa396be1', 26, 3, 'TutsForWeb', '[]', 0, '2020-02-06 05:47:46', '2020-02-06 05:47:46', '2021-02-06 07:47:46'),
('a9b32885fdf995239c1df2a0e72f494350766fe8ae60a493ea8fda4e0891545cad37311dccb1c66b', 20, 3, 'TutsForWeb', '[]', 0, '2020-02-05 09:08:54', '2020-02-05 09:08:54', '2021-02-05 11:08:54'),
('ac1a6792798484d1801ba7796db55503e3bbf865bd18284c984c758edcb2709a4f330070b6971eab', 20, 3, 'MyApp', '[]', 0, '2020-02-02 10:51:22', '2020-02-02 10:51:22', '2021-02-02 12:51:22'),
('b9925d3977f57e4653c1b8c46fbeab976dd3fd7031cc9701e11b6a3aab6d20076730993aeb37e3de', 22, 3, 'Token', '[]', 0, '2020-02-02 11:56:06', '2020-02-02 11:56:06', '2021-02-02 13:56:06'),
('bec0da4f0df93dd99ce013e9ac30c411fe86fa00c11c58ea578c04d0b08e7ce8ebca97e23f1e5ddb', 20, 3, 'TutsForWeb', '[]', 0, '2020-02-02 10:59:56', '2020-02-02 10:59:56', '2021-02-02 12:59:56'),
('c97c749e916ed80d2d306ba1585a736792cedf13c2cd9376e1bef8bfa26cf5a78b50316c485a1f8c', 26, 3, 'Token', '[]', 0, '2020-02-06 05:47:42', '2020-02-06 05:47:42', '2021-02-06 07:47:42'),
('dbde74b96ee0d58a875bbffe5bea621df6d30f1d455a1558a6d87f8e29f77fe54210732586ac05f2', 24, 3, 'Token', '[]', 0, '2020-02-04 06:43:52', '2020-02-04 06:43:52', '2021-02-04 08:43:52'),
('e22d82cdff4294a28f8d2b07cf32b868f4b61261d44ee0a8f5a3b8e471c75a94ee83947ae2089105', 21, 3, 'Token', '[]', 0, '2020-02-02 11:55:03', '2020-02-02 11:55:03', '2021-02-02 13:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'agKq3qGbcIYcuPzhW70Gjcnr59wPmWksexSxLeFJ', 'http://localhost', 1, 0, 0, '2020-02-02 10:24:27', '2020-02-02 10:24:27'),
(2, NULL, 'Laravel Password Grant Client', 'oh1xA2oLyihDCbso1IQZYdwKvGAwDaH6X7ziQD6d', 'http://localhost', 0, 1, 0, '2020-02-02 10:24:27', '2020-02-02 10:24:27'),
(3, NULL, 'Laravel Personal Access Client', 'MLTyWba6SdDdPKr31gC6T07BitfiGE3drfYbAdpa', 'http://localhost', 1, 0, 0, '2020-02-02 10:27:43', '2020-02-02 10:27:43'),
(4, NULL, 'Laravel Password Grant Client', '7DItjJNpXxxKTV8ElOhwDlDIgRtQNWx4lMEWlbHp', 'http://localhost', 0, 1, 0, '2020-02-02 10:27:43', '2020-02-02 10:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-02-02 10:24:27', '2020-02-02 10:24:27'),
(2, 3, '2020-02-02 10:27:43', '2020-02-02 10:27:43');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('prepare','ship','done','reject') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `country_id`, `name`, `address`, `phone`, `email`, `price`, `code`, `level`, `created_at`, `updated_at`, `seen`) VALUES
(1, 1, 9, 'محمد محمود', '27 nasr st , nasr city , cairo.', '011111111', 'moh@gmail.com', '0', '#5664677646', 'ship', '2019-11-10 22:00:00', '2020-01-02 07:40:30', 1),
(2, 3, 14, 'Wael Serag', 'بريدة - بجوار الجوازات', '0526352255', 'waelserag1@gmail.com', '600', '#31795', 'done', '2020-01-02 09:30:36', '2020-01-09 09:49:46', 1),
(6, 20, 14, 'Wael Serag', 'بريدة - بجوار الجوازات', '0526352255', 'waelserag1@gmail.com', '0', '#96991', 'prepare', '2020-01-02 09:35:15', '2020-01-02 09:35:15', NULL),
(7, 7, 13, 'وائل محمد سراج', '', '0526352255', 'ahmed@gmail.com', '0', '#87173', 'prepare', '2020-01-02 12:00:15', '2020-01-02 12:00:15', NULL),
(8, 7, 13, 'وائل محمد سراج', '', '0526352255', 'ahmed@gmail.com', '600', '#65747', 'prepare', '2020-01-02 12:00:23', '2020-01-02 12:00:23', NULL),
(9, 7, 13, 'وائل محمد سراج', '', '0526352255', 'ahmed@gmail.com', '0', '#97004', 'prepare', '2020-01-05 10:26:25', '2020-01-05 10:26:25', NULL),
(11, 20, 13, 'Wael Serag', 'بريدة - بجوار الجوازات', '0526352255', 'waelserag1@gmail.com', '1000', '#24361', 'done', '2020-01-09 07:04:39', '2020-01-09 09:27:11', NULL),
(12, 3, 13, 'Wael Serag', 'بريدة - بجوار الجوازات', '0526352255', 'waelserag1@gmail.com', '55', '#74364', 'prepare', '2020-01-28 11:29:01', '2020-01-28 11:29:01', NULL),
(13, 26, 9, 'test ets te te eteete', '', '01009739491', 'eslamelshenawy9316@gmail.com', '0', '#22071', 'prepare', '2020-02-06 08:18:07', '2020-02-06 08:18:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `status` enum('0','1','2','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `vendor_id`, `vendor_type`, `item_price`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'admin', 0, '0', NULL, '2019-11-10 22:00:00', '2019-10-23 22:00:00'),
(2, 10, 2, 3, 'user', 600, '1', 20, '2020-01-02 09:30:36', '2020-01-02 09:30:36'),
(6, 10, 7, 3, 'user', 200, '2', 20, '2020-01-02 09:35:15', '2020-01-05 07:43:00'),
(7, 10, 7, 1, 'admin', 0, '0', 20, '2020-01-02 12:00:15', '2020-01-02 12:00:15'),
(8, 10, 8, 3, 'user', 600, '1', 7, '2020-01-02 12:00:23', '2020-01-05 07:42:09'),
(9, 9, 9, 3, 'user', 0, '2', 7, '2020-01-05 10:26:25', '2020-01-28 11:27:49'),
(11, 7, 11, 1, 'admin', 1000, '0', 20, '2020-01-09 07:04:39', '2020-01-09 07:04:39'),
(12, 38, 12, 5, 'user', 55, '0', 3, '2020-01-28 11:29:01', '2020-01-28 11:29:01'),
(13, 13, 13, 3, 'user', 0, '0', 26, '2020-02-06 08:18:07', '2020-02-06 08:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('waelserasdsdsdg1@gmail.com', '$2y$10$tUtXfRPpKOp4A0ftgDAZsOT5j/KZaAo5bmmpfqqZ2ZO5y1pJzl1gi', '2020-01-12 06:46:14'),
('eslamelshenawy9316@gmail.com', '$2y$10$7y2cruoTkay3cxt2eaQ4qOXRZsp6Or7s7OjAcNCpwohKhMyUUpH/e', '2020-02-06 07:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts_gallary`
--

CREATE TABLE `posts_gallary` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `media` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_dep_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) DEFAULT 1,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_country_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `user_type`, `main_dep_id`, `dep_id`, `ar_title`, `en_title`, `en_content`, `ar_content`, `stock`, `price`, `size`, `color`, `photo`, `main_country_id`, `country_id`, `address`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
(2, 1, 'admin', 2, 5, 'كرسي متحرك جلد', NULL, NULL, 'كرسي متحرك جلد أزرق', 1, '0', NULL, NULL, NULL, 7, 9, NULL, '2019-12-19 07:47:27', '2019-12-19 07:47:27', NULL, '1'),
(5, 1, 'admin', 1, 8, 'جهاز الاستنشاق', NULL, NULL, 'جهاز الاستنشاق', 2, '0', NULL, NULL, NULL, 10, 13, NULL, '2019-12-19 07:49:31', '2019-12-19 07:49:31', NULL, '1'),
(6, 1, 'admin', 1, 7, 'كرسي متحرك', NULL, NULL, 'كرسي متحرك', 3, '0', NULL, NULL, NULL, 10, 12, NULL, '2019-12-19 07:49:57', '2019-12-19 07:49:57', NULL, '1'),
(7, 1, 'admin', 1, 7, 'كرسي متحرك جديد للبيع', NULL, NULL, 'كرسي متحرك جديد للبيع', 1, '1000', NULL, NULL, NULL, 10, 13, NULL, '2019-12-19 08:53:24', '2019-12-19 08:53:24', NULL, '1'),
(9, 3, 'user', 2, 5, 'سرير جديد خشبي', NULL, NULL, 'التفاصيلالتاالنفاصيل ىالتفاص تانتايلالتفاصيلنتانات   فالان  تلنصيل', 1, '0', NULL, NULL, NULL, 10, 13, NULL, '2019-12-29 06:53:46', '2020-01-12 10:38:52', NULL, '2'),
(10, 3, 'user', 2, 4, 'عرض مساند جديدة', NULL, NULL, 'التفاصيل 2', 0, '600', NULL, NULL, NULL, 10, 12, NULL, '2019-12-29 07:02:10', '2020-01-05 07:42:09', NULL, '1'),
(12, 3, 'user', 1, 8, 'عنوان طلب رقم 4', NULL, NULL, 'التفاصيل التفاصيل التفاصيل', 1, '0', NULL, NULL, NULL, 10, 12, NULL, '2019-12-29 07:06:17', '2019-12-29 07:06:17', NULL, '2'),
(13, 3, 'user', 1, 7, 'طلب جديد وضرورى', NULL, NULL, 'التفاصيل التفاصيل', 1, '0', NULL, NULL, NULL, 7, 9, NULL, '2019-12-29 07:06:48', '2019-12-29 07:06:48', NULL, '2'),
(14, 3, 'user', 1, 7, 'طلب كرسى جلد', NULL, NULL, 'التفاصيل التفاصيل', 1, '0', NULL, NULL, NULL, 10, 14, NULL, '2019-12-29 07:12:55', '2019-12-29 07:12:55', NULL, '2'),
(15, 3, 'user', 1, 5, 'طلب جهاز طبي جديد', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل الجديد', 1, '0', NULL, NULL, NULL, 10, 14, NULL, '2019-12-29 07:18:10', '2020-01-05 06:00:26', NULL, '2'),
(16, 3, 'user', 1, 8, 'طلب جديد', NULL, NULL, 'جهاز استنشاق جديد جدا', 1, '0', NULL, NULL, NULL, 7, 9, NULL, '2019-12-29 09:30:39', '2019-12-29 09:30:39', NULL, '2'),
(19, 1, 'admin', 1, 7, 'تجربة رفع أكثر من صورة', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 2, '0', NULL, NULL, NULL, 10, 11, NULL, '2020-01-05 12:39:13', '2020-01-09 09:36:42', NULL, '1'),
(20, 3, 'user', 2, 5, 'مساعدات خارجية', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 2, '0', NULL, NULL, NULL, 10, 12, NULL, '2020-01-07 10:04:21', '2020-01-07 10:04:21', NULL, '1'),
(21, 3, 'user', 1, 7, 'عرض جهاز جديد', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل', 3, '150', NULL, NULL, NULL, 10, 13, NULL, '2020-01-09 07:33:47', '2020-01-09 07:33:47', NULL, '1'),
(22, 19, 'user', 1, 8, 'طلب جهاز طبي جديد', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 3, '400', NULL, NULL, NULL, 7, 15, NULL, '2020-01-13 12:45:53', '2020-01-13 12:45:53', NULL, '1'),
(23, 3, 'user', 1, 7, 'عرض جديد', NULL, NULL, 'سبيسبيسب', 3, '400', NULL, NULL, NULL, 10, 13, NULL, '2020-01-14 11:46:26', '2020-01-14 11:46:26', NULL, '1'),
(24, 3, 'user', 1, 7, 'عرض جديد', NULL, NULL, 'سبيسبيسب', 3, '400', NULL, NULL, NULL, 7, 9, NULL, '2020-01-14 11:50:44', '2020-01-14 11:50:44', NULL, '1'),
(25, 5, 'user', 1, 7, 'عرض جديد جدا', NULL, NULL, 'التفاصيل', 25, '400', NULL, NULL, NULL, 10, 12, NULL, '2020-01-14 12:44:38', '2020-01-14 12:44:38', NULL, '1'),
(26, 5, 'user', 1, 7, 'عروض جديدة', NULL, NULL, 'التفاصيل', 25, '400', NULL, NULL, NULL, 7, 9, NULL, '2020-01-14 12:47:09', '2020-01-14 12:47:09', NULL, '1'),
(27, 5, 'user', 1, 7, 'جديد العروض', NULL, NULL, 'التفاصيل التفاصيل', 3, '400', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 06:41:03', '2020-01-15 06:41:03', NULL, '1'),
(28, 5, 'user', 1, 7, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل', 3, '0', NULL, NULL, NULL, 10, 13, NULL, '2020-01-15 06:52:19', '2020-01-15 11:30:07', '2020-01-15 11:30:07', '1'),
(29, 3, 'user', 1, 7, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 3, '400', NULL, NULL, NULL, 10, 11, NULL, '2020-01-15 10:00:03', '2020-01-15 10:00:03', NULL, '1'),
(30, 3, 'user', 1, 7, 'العنوان', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 111\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 222\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 33', 20, '0', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 10:00:52', '2020-01-15 10:00:52', NULL, '1'),
(31, 3, 'user', 1, 7, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 1111\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل  222\r\nالتفاصيل   التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 333\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 444التفاصيل \r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5', 5, '55', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 10:07:27', '2020-01-15 10:07:27', NULL, '2'),
(32, 3, 'user', 1, 7, 'طلب جهاز طبي جديد', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل5555 التفاصيل التفاصيل التفاصيل', 2, '555', NULL, NULL, NULL, 7, 15, NULL, '2020-01-15 10:20:37', '2020-01-15 10:20:37', NULL, '2'),
(33, 3, 'user', 1, 8, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5 التفاصيل التفاصيل التفاصيل 6 التفاصيل التفاصيل التفاصيل 7 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 9\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5 التفاصيل التفاصيل التفاصيل 6 التفاصيل التفاصيل التفاصيل 7 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 9\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5 التفاصيل التفاصيل التفاصيل 6 التفاصيل التفاصيل التفاصيل 7 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 9\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5 التفاصيل التفاصيل التفاصيل 6 التفاصيل التفاصيل التفاصيل 7 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 9\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5 التفاصيل التفاصيل التفاصيل 6 التفاصيل التفاصيل التفاصيل 7 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 8 التفاصيل التفاصيل التفاصيل 9', 2, '400', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 10:25:20', '2020-01-15 10:25:20', NULL, '2'),
(34, 3, 'user', 1, 7, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 55\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 6666\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 7777777\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 8888\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 55\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 6666\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 7777777\r\nالتفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 8888', 1, '500', NULL, NULL, NULL, 10, 11, NULL, '2020-01-15 10:28:25', '2020-01-15 10:28:25', NULL, '2'),
(35, 3, 'user', 2, 4, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 4', 1, '500', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 10:29:13', '2020-01-15 10:29:13', NULL, '2'),
(36, 3, 'user', 2, 4, 'dgdgd', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 5555555555 التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 66666666 التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل 7777', 3, '400', NULL, NULL, NULL, 10, 11, NULL, '2020-01-15 10:30:56', '2020-01-15 10:30:56', NULL, '1'),
(37, 5, 'user', 1, 7, 'طلب جهاز طبي جديد', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 2, '300', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 11:24:34', '2020-01-15 11:24:34', NULL, '1'),
(38, 5, 'user', 1, 7, '5432543', NULL, NULL, 'التفاصيل التفاصيل التفاصيل', 515, '55', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 11:35:00', '2020-01-15 11:35:00', NULL, '1'),
(39, 5, 'user', 1, 7, 'العنوان', NULL, NULL, 'العنوان العنوان', 5, '5', NULL, NULL, NULL, 7, 9, NULL, '2020-01-15 11:52:34', '2020-01-15 11:52:34', NULL, '1'),
(40, 5, 'user', 1, 7, 'عرض مساند جديدة', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 2, '2', NULL, NULL, NULL, 10, 11, NULL, '2020-01-15 12:02:02', '2020-01-15 12:02:02', NULL, '2'),
(41, 3, 'user', 1, 7, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 1, '0', NULL, NULL, NULL, 10, 11, NULL, '2020-01-22 05:58:39', '2020-01-22 05:58:39', NULL, '2'),
(42, 3, 'user', 1, 7, 'عرض جديد بدون صورة', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 5, '502', NULL, NULL, NULL, 10, 11, NULL, '2020-01-22 05:59:50', '2020-01-22 05:59:50', NULL, '1'),
(43, 3, 'user', 1, 7, 'عرض جديد بدون صورة', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 5, '502', NULL, NULL, NULL, 10, 11, NULL, '2020-01-22 06:00:47', '2020-01-22 06:00:47', NULL, '1'),
(44, 3, 'user', 1, 7, 'عرض مساند جديدة', NULL, NULL, 'التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل التفاصيل', 2, '22', NULL, NULL, NULL, 10, 11, NULL, '2020-01-22 06:01:16', '2020-01-22 06:08:42', '2020-01-22 06:08:42', '1'),
(45, 3, 'user', 1, 7, 'سرير جديد خشبي', NULL, NULL, 'التفاصيل التفاصيل', 2, '500', NULL, NULL, NULL, 10, 12, NULL, '2020-01-28 11:26:19', '2020-01-28 11:26:28', '2020-01-28 11:26:28', '1'),
(46, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:39:37', '2020-02-05 10:39:37', NULL, '1'),
(47, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:40:24', '2020-02-05 10:40:24', NULL, '1'),
(48, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:47:04', '2020-02-05 10:47:04', NULL, '1'),
(49, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:49:43', '2020-02-05 10:49:43', NULL, '1'),
(50, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:50:17', '2020-02-05 10:50:17', NULL, '1'),
(51, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:51:35', '2020-02-05 10:51:35', NULL, '1'),
(52, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:52:36', '2020-02-05 10:52:36', NULL, '1'),
(53, 20, 'user', 1, 7, 'القاهره  وسط البلد', NULL, NULL, 'يسشييييييييييييييييييييييييييييييييييييي يبسببببببببببببببببببببببب سيبسيببببببببببببببببببببببببببببببببببببببببببببب', 3, '100', NULL, NULL, NULL, 7, 9, NULL, '2020-02-05 10:53:14', '2020-02-05 10:53:14', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `products_gallary`
--

CREATE TABLE `products_gallary` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `media` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_gallary`
--

INSERT INTO `products_gallary` (`id`, `product_id`, `media`, `created_at`, `updated_at`) VALUES
(3, 2, 'IKGRx-1576748847-2Un.jpeg', '2019-12-19 07:47:27', '2019-12-19 07:47:27'),
(4, 3, 'nMpUu-1576748881-kpZ.jpg', '2019-12-19 07:48:01', '2019-12-19 07:48:01'),
(5, 4, 'Iq3uO-1576748947-6c7.jpeg', '2019-12-19 07:49:07', '2019-12-19 07:49:07'),
(6, 5, 'znbdD-1576748971-u6A.jpeg', '2019-12-19 07:49:31', '2019-12-19 07:49:31'),
(7, 6, 'uZTdd-1576748997-h1n.jpeg', '2019-12-19 07:49:57', '2019-12-19 07:49:57'),
(8, 7, 'z4aCJ-1576752804-vkP.jpeg', '2019-12-19 08:53:24', '2019-12-19 08:53:24'),
(9, 9, 'HbyXd-1577609626-Kqi.jpg', '2019-12-29 06:53:46', '2019-12-29 06:53:46'),
(10, 10, 'e1uAM-1577610130-k28.jpg', '2019-12-29 07:02:10', '2019-12-29 07:02:10'),
(11, 11, 'Hheiy-1577610337-37R.jpg', '2019-12-29 07:05:37', '2019-12-29 07:05:37'),
(12, 12, 'fMkPY-1577610377-cfm.jpeg', '2019-12-29 07:06:17', '2019-12-29 07:06:17'),
(13, 13, 'DtuZ6-1577610408-gF2.jpeg', '2019-12-29 07:06:48', '2019-12-29 07:06:48'),
(14, 14, 'tfZuI-1577610775-Zwy.jpeg', '2019-12-29 07:12:55', '2019-12-29 07:12:55'),
(16, 16, 'vjHCr-1577619039-3mH.jpeg', '2019-12-29 09:30:39', '2019-12-29 09:30:39'),
(17, 17, 'ethhq-1577794809-7G8.jpg', '2019-12-31 10:20:09', '2019-12-31 10:20:09'),
(18, 13, 'tfZuI-1577610775-Zwy.jpeg', '2019-12-29 07:12:55', '2019-12-29 07:12:55'),
(20, 15, 'huYYy-1578211688-E0I.jpg', '2020-01-05 06:08:08', '2020-01-05 06:08:08'),
(21, 19, 'pOQOL-1578235153-xE6.jpg', '2020-01-05 12:39:13', '2020-01-05 12:39:13'),
(22, 19, '74hjR-1578235153-fMO.jpg', '2020-01-05 12:39:13', '2020-01-05 12:39:13'),
(23, 19, 'W3rtf-1578235153-JFR.jpg', '2020-01-05 12:39:13', '2020-01-05 12:39:13'),
(25, 10, 'pCRFW-1578304430-BhD.jpg', '2020-01-06 07:53:50', '2020-01-06 07:53:50'),
(27, 10, 'fME4i-1578309872-lgc.jpg', '2020-01-06 09:24:32', '2020-01-06 09:24:32'),
(28, 20, 'C5mP5-1578398661-iE4.jpg', '2020-01-07 10:04:21', '2020-01-07 10:04:21'),
(29, 21, 'VfMIx-1578562427-RDA.jpg', '2020-01-09 07:33:47', '2020-01-09 07:33:47'),
(30, 22, 'L5tEv-1578926753-Hr4.jpg', '2020-01-13 12:45:53', '2020-01-13 12:45:53'),
(31, 23, '3g2Kw-1579009586-bbL.jpg', '2020-01-14 11:46:26', '2020-01-14 11:46:26'),
(32, 24, 'SguJ9-1579009844-zcH.jpg', '2020-01-14 11:50:44', '2020-01-14 11:50:44'),
(33, 25, 'F5y66-1579013078-JNM.png', '2020-01-14 12:44:38', '2020-01-14 12:44:38'),
(34, 26, 'xSFrn-1579013229-IHg.jpg', '2020-01-14 12:47:09', '2020-01-14 12:47:09'),
(35, 27, 'DZb70-1579077663-XKc.jpg', '2020-01-15 06:41:03', '2020-01-15 06:41:03'),
(36, 28, 'cTaPk-1579078339-JVe.png', '2020-01-15 06:52:19', '2020-01-15 06:52:19'),
(37, 29, 'b53rF-1579089603-dZI.jpeg', '2020-01-15 10:00:03', '2020-01-15 10:00:03'),
(38, 30, 'nrXbi-1579089652-wvZ.jpeg', '2020-01-15 10:00:52', '2020-01-15 10:00:52'),
(39, 31, 'pAm6z-1579090048-CeD.jpg', '2020-01-15 10:07:28', '2020-01-15 10:07:28'),
(40, 32, 'DYkw5-1579090837-bMr.jpeg', '2020-01-15 10:20:37', '2020-01-15 10:20:37'),
(41, 33, 'A2Xml-1579091121-XBk.jpg', '2020-01-15 10:25:21', '2020-01-15 10:25:21'),
(42, 34, 'EAOgR-1579091305-mRT.jpg', '2020-01-15 10:28:25', '2020-01-15 10:28:25'),
(43, 35, 'lWv5H-1579091353-k6H.jpg', '2020-01-15 10:29:13', '2020-01-15 10:29:13'),
(44, 36, 'vxf9i-1579091456-OMS.jpg', '2020-01-15 10:30:56', '2020-01-15 10:30:56'),
(45, 37, 'r2ur9-1579094674-KKp.jpeg', '2020-01-15 11:24:34', '2020-01-15 11:24:34'),
(46, 38, 'lOfSH-1579095300-yAk.jpeg', '2020-01-15 11:35:00', '2020-01-15 11:35:00'),
(47, 39, '4ydXz-1579096354-7TV.jpg', '2020-01-15 11:52:34', '2020-01-15 11:52:34'),
(48, 40, 'N4bCW-1579096922-Hbs.jpg', '2020-01-15 12:02:02', '2020-01-15 12:02:02'),
(49, 41, 'placeholder-slider.svg', '2020-01-22 05:58:39', '2020-01-22 05:58:39'),
(50, 42, 'placeholder-slider.svg', '2020-01-22 05:59:50', '2020-01-22 05:59:50'),
(52, 44, 'ntUKq-1579680076-JDz.jpg', '2020-01-22 06:01:16', '2020-01-22 06:01:16'),
(54, 43, 'X7Imu-1579680553-1d3.jpeg', '2020-01-22 06:09:13', '2020-01-22 06:09:13'),
(55, 43, 'wnY2B-1579680553-aFf.jpg', '2020-01-22 06:09:13', '2020-01-22 06:09:13'),
(56, 45, 'placeholder-slider.svg', '2020-01-28 11:26:19', '2020-01-28 11:26:19'),
(57, 46, 'Voy9B-1580906377-LzS.jpg', '2020-02-05 10:39:37', '2020-02-05 10:39:37'),
(58, 47, 'dS0ZD-1580906424-FXF.jpg', '2020-02-05 10:40:24', '2020-02-05 10:40:24'),
(59, 48, 'ASucc-1580906824-Xka.jpg', '2020-02-05 10:47:04', '2020-02-05 10:47:04'),
(60, 49, 'ToPmk-1580906983-JWu.jpg', '2020-02-05 10:49:43', '2020-02-05 10:49:43'),
(61, 50, 'w0m8M-1580907017-fQh.jpg', '2020-02-05 10:50:17', '2020-02-05 10:50:17'),
(62, 51, 'KelLj-1580907095-r1S.jpg', '2020-02-05 10:51:35', '2020-02-05 10:51:35'),
(63, 52, '0hrIV-1580907156-bhJ.jpg', '2020-02-05 10:52:36', '2020-02-05 10:52:36'),
(64, 53, 'UvubG-1580907194-4x5.jpg', '2020-02-05 10:53:14', '2020-02-05 10:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitename_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `message_mentenance` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitename_ar`, `sitename_en`, `logo`, `icon`, `email`, `main_lang`, `description`, `keywords`, `status`, `message_mentenance`, `created_at`, `updated_at`) VALUES
(1, 'عون الطبى', 'AAWNN', 'dd', 'dd', 'aawnn@aawnn', 'ar', 'gggggggggg', 'ggggggggggggg', 'open', 'ggggggggggggggggggg', '2019-11-30 22:00:00', '2019-12-02 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE `slider_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `en_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `en_content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `agent_id` int(11) NOT NULL,
  `main_country_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `level` enum('deserve','not') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `user_id`, `admin_id`, `agent_id`, `main_country_id`, `country_id`, `level`, `image`, `message`, `seen`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 7, 9, 'not', 'PV97f-1576063497-Pfj.png', 'fhgxhchhhhhhhhhhhhhhh', 1, '2019-11-10 22:00:00', '2020-01-09 07:36:36'),
(2, 7, NULL, 5, 10, 13, 'deserve', '3PpYp-1578233421-Lyh.jpg', 'يرجى الإهتمام بالتقرير الطبي', 0, '2020-01-05 12:10:21', '2020-01-05 12:12:01'),
(3, 20, NULL, 1, 7, 15, 'not', 'SZecD-1580904930-4Br.jpg', 'gdfgfdgfdgfdgfdgfdgdfgfdgfdgfdgdfg', 0, '2020-02-05 10:15:30', '2020-02-05 10:15:30'),
(4, 20, NULL, 1, 7, 15, 'not', 'sp8Nu-1580904948-bpO.jpg', 'gdfgfdgfdgfdgfdgfdgdfgfdgfdgfdgdfg', 0, '2020-02-05 10:15:48', '2020-02-05 10:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `main_country_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('user','vendor') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `country_id`, `main_country_id`, `name`, `email`, `password`, `attachment`, `image`, `level`, `status`, `address`, `location`, `phone`, `api_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `provider`, `active`, `ip`, `company`) VALUES
(1, NULL, 9, 7, 'محمد محمود', 'mohamed@gmail.com', '$2y$10$fzsLVkLoex2S1lKSYXhiE.IgL7iETbJB24YMaYUBDo2Oaflzsq0b.', 'b1hzl9m5kvow.jpg', NULL, 'user', '1', '12ش السرايا، ميدان فيني', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.778639039884!2d31.218349384930544!3d30.043207881882765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847326973319b%3A0xc3a09893e51a0df5!2z2YXYs9iq2LTZgdmKINmF2LXYsSDYp9mE2K_ZiNmE2Yo!5e0!3m2!1sar!2seg!4v1576583556163!5m2!1sar!2seg\"  frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', '011211224', '', NULL, '2019-11-10 22:00:00', '2020-01-15 08:02:30', NULL, NULL, NULL, '127.0.0.1', '0'),
(2, 1, 9, 7, 'Wael', 'admin@admin.com', '$2y$10$34JGL5jR7Vdb5c5mPtA5fObvailGgZRj.vcjmFDxQhEfUgjTJpTHe', NULL, NULL, NULL, NULL, 'llllllllllllll', 'lllllllllllllllllllll', '66666666666', NULL, NULL, '2019-12-18 10:15:50', '2019-12-18 10:15:50', NULL, NULL, NULL, NULL, '0'),
(3, NULL, 13, 10, 'Wael Serag', 'waelserag1@gmail.com', '$2y$10$F6fwbFCOrDDLGbwyfo7e6Oph/FHfI25dvCW67ugfEVWLEybsdpD7i', NULL, NULL, NULL, '1', 'بريدة - بجوار الجوازات', NULL, '0526352255', NULL, 'ybRaFesDWiZfUXY3bzIqE8s1mJM59qDk6iXluPb5G2dhSch8iHQbXdlrez8D', '2019-12-19 06:14:47', '2020-01-28 11:29:23', NULL, 'site', NULL, '127.0.0.1', '0'),
(4, NULL, NULL, NULL, 'محمود ابراهيم صلاح', 'mis@gmail.com', '$2y$10$B..YI73NQZUat/Ry4naCtOHIKlQE2/flxiVdlFZiP1iOqgDhr5Him', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 'mJXfWfrHnBLW6SfGXFX6TDmn2YLMmHSF94KjVMouVtRz4AFBLoDKrj7MTqWm', '2019-12-31 12:22:24', '2019-12-31 12:22:24', NULL, 'site', NULL, NULL, '0'),
(5, NULL, 14, 10, 'خالد إبراهيم عبدالسلام', 'waelserag111@gmail.com', '$2y$10$F6fwbFCOrDDLGbwyfo7e6Oph/FHfI25dvCW67ugfEVWLEybsdpD7i', NULL, NULL, NULL, '1', 'بريدة', NULL, '01020104730', NULL, 'X7Qmtc4nllPbaMKqKzgcy4ap92oKicMlnqV0cerxEs3FttieDqzRs0wfrR0h', '2020-01-01 11:38:12', '2020-01-26 09:18:49', NULL, 'site', NULL, '127.0.0.1', '0'),
(7, NULL, 13, 10, 'وائل محمد سراج', 'ahmed@gmail.com', '$2y$10$qCSCdqFXAVxW0UGvLq4G7.KQhid36/CRmFV2KJfgjrKmMZm2sR9j6', NULL, NULL, NULL, '1', NULL, NULL, '0526352255', NULL, 'zMNlZLM04bOO93OYX782eYSILnYtUPZBupnCpVK2dx8rTi5PMxF8FdXYGfd4', '2020-01-02 06:31:44', '2020-01-02 06:33:16', NULL, 'site', NULL, NULL, '0'),
(8, NULL, 13, 10, 'وائل محمد سراج', 'waelserttttag1@gmail.com', '$2y$10$wdrnwUwlR5/jXtWA3fTQP.q9RyEGYUk262IR9ofbp8m/qgkYu9W26', NULL, NULL, NULL, '0', NULL, NULL, '01020104730', NULL, NULL, '2020-01-12 05:35:43', '2020-01-12 05:35:43', NULL, 'site', '$2y$10$pEVhNdGCrhkdoRYhA60RouKbzz3a2erCtzARgjI4fX.Op32SWYbJa', NULL, '0'),
(9, NULL, 9, 7, 'werwertwtr', 'waelseraerwerewg1@gmail.com', '$2y$10$F6fwbFCOrDDLGbwyfo7e6Oph/FHfI25dvCW67ugfEVWLEybsdpD7i', NULL, NULL, NULL, '0', NULL, NULL, '0526352255', NULL, NULL, '2020-01-12 05:36:59', '2020-01-15 08:02:30', NULL, 'site', '$2y$10$Sz4THGeTz4hyBC6oeaVwJur3lIZjudvdAEpCwGyPt/yOLVUL3qKA6', '127.0.0.1', '0'),
(12, NULL, 12, 10, 'Wael Serag', 'waelsewrewrweerag1@gmail.com', '$2y$10$YBCQVvvPnOGyDjx2S8lFUuzcePRCevp8CdSO.WM65G6bKSpzVZpiG', NULL, NULL, NULL, '0', NULL, NULL, '0526352255', NULL, NULL, '2020-01-12 06:29:14', '2020-01-12 10:18:25', '2020-01-12 10:18:25', 'site', '$2y$10$b4Ygyhs3YekjLTWFsRH38uTxgjKp45GYFjW7lS/cUpkqK7FVfWMMq', NULL, '0'),
(17, NULL, 13, 10, 'Wael Serag', 'waelsera2g1@gmail.com', '$2y$10$qPytMnbRsfU/xY2HyvGqeec3/243kx8rejUwHwZehNhDpf30IK9kG', NULL, NULL, NULL, '0', NULL, NULL, '0526352255', NULL, NULL, '2020-01-13 05:47:40', '2020-01-13 05:47:40', NULL, 'site', '8085182631', '127.0.0.1', '1'),
(18, 1, 15, 7, 'Wael Serag', 'waelserag111111111111@gmail.com', '$2y$10$gQEzZvTn/Ig8tMASYlwaCuAt16Su4Sg9l7qqMVmfIAdwzLs2YX2om', NULL, NULL, NULL, NULL, 'مدينة نصر - القاهرة', NULL, '0526352255', NULL, NULL, '2020-01-13 12:25:22', '2020-01-13 12:41:28', '2020-01-13 12:41:28', NULL, NULL, NULL, '1'),
(19, 1, 9, 7, 'شركة حكومية', 'waelserag91@gmail.com', '$2y$10$mhryBkqWVBOEErSUscISJOhUgomsXbegnc1fE46N5y6qfyX/Q2tQ2', NULL, NULL, NULL, '1', 'مدينة نصر - القاهرة', NULL, '0526352255', NULL, NULL, '2020-01-13 12:42:16', '2020-01-13 12:45:57', NULL, NULL, NULL, '127.0.0.1', '1'),
(23, NULL, NULL, NULL, 'test ets te te eteete', 'eslamelshenawy93@gmail.com', '$2y$10$4HYrVZqhv9ulW.8TMGcm3uBs6S605EpmP4SMlryT42BTYM7N99pyG', NULL, NULL, NULL, NULL, NULL, NULL, '01009739491', NULL, NULL, '2020-02-02 11:56:57', '2020-02-02 11:56:57', NULL, NULL, NULL, NULL, '0'),
(25, NULL, 9, 7, 'test ets te te eteete', 'eslamelshenawy3@gmail.com', '$2y$10$a.STB5x29bQf5U1pOuhCyuWggTWVJsP6ooW/r/8cgJSz/2pruAgOa', NULL, NULL, NULL, NULL, NULL, NULL, '01009739491', NULL, NULL, '2020-02-06 05:47:28', '2020-02-06 05:47:28', NULL, NULL, NULL, NULL, '0'),
(26, NULL, 9, 7, 'test ets te te eteete', 'eslamelshenawy9316@gmail.com', '$2y$10$ItukwhgIWhqpQoU.22d3oeYXCtD6jxa.hmx5js0Qd/EDChhchS9cC', NULL, NULL, NULL, '1', NULL, NULL, '01009739491', NULL, NULL, '2020-02-06 05:47:42', '2020-02-06 08:17:59', NULL, NULL, NULL, '127.0.0.1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `created`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', '2020-01-11', '2020-01-12 11:33:04', '2020-01-12 11:33:04'),
(2, '127.0.0.1', '2020-01-12', '2020-01-12 11:33:33', '2020-01-12 11:33:33'),
(3, '127.0.0.1', '2020-01-13', '2020-01-13 05:20:09', '2020-01-13 05:20:09'),
(4, '127.0.0.1', '2020-01-14', '2020-01-14 05:14:33', '2020-01-14 05:14:33'),
(5, '127.0.0.1', '2020-01-15', '2020-01-15 06:40:05', '2020-01-15 06:40:05'),
(6, '127.0.0.1', '2020-01-19', '2020-01-19 05:52:25', '2020-01-19 05:52:25'),
(7, '127.0.0.1', '2020-01-20', '2020-01-20 09:45:21', '2020-01-20 09:45:21'),
(8, '127.0.0.1', '2020-01-21', '2020-01-21 10:31:36', '2020-01-21 10:31:36'),
(9, '127.0.0.1', '2020-01-22', '2020-01-22 05:50:26', '2020-01-22 05:50:26'),
(10, '127.0.0.1', '2020-01-23', '2020-01-23 08:11:45', '2020-01-23 08:11:45'),
(11, '127.0.0.1', '2020-01-26', '2020-01-26 08:00:27', '2020-01-26 08:00:27'),
(12, '127.0.0.1', '2020-01-27', '2020-01-27 06:41:24', '2020-01-27 06:41:24'),
(13, '127.0.0.1', '2020-01-28', '2020-01-28 11:24:40', '2020-01-28 11:24:40'),
(14, '127.0.0.1', '2020-02-02', '2020-02-02 10:07:31', '2020-02-02 10:07:31'),
(15, '::1', '2020-02-04', '2020-02-04 05:45:46', '2020-02-04 05:45:46'),
(16, '127.0.0.1', '2020-02-04', '2020-02-04 05:47:33', '2020-02-04 05:47:33'),
(17, '127.0.0.1', '2020-02-05', '2020-02-05 05:30:16', '2020-02-05 05:30:16'),
(18, '127.0.0.1', '2020-02-06', '2020-02-06 05:55:30', '2020-02-06 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_users`
--
ALTER TABLE `block_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_news`
--
ALTER TABLE `department_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_products`
--
ALTER TABLE `department_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_product_id_foreign` (`product_id`),
  ADD KEY `favourites_user_id_foreign` (`user_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interests_department_id_foreign` (`department_id`),
  ADD KEY `interests_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_gallary`
--
ALTER TABLE `news_gallary`
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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts_gallary`
--
ALTER TABLE `posts_gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_gallary`
--
ALTER TABLE `products_gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `block_users`
--
ALTER TABLE `block_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `department_news`
--
ALTER TABLE `department_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_products`
--
ALTER TABLE `department_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1145;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_gallary`
--
ALTER TABLE `news_gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts_gallary`
--
ALTER TABLE `posts_gallary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products_gallary`
--
ALTER TABLE `products_gallary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_image`
--
ALTER TABLE `slider_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `interests_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
