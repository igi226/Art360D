-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 02:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art360`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `slug`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin-art360', 'Admin Art360', 'admin@mail.com', '$2y$10$TbR.m5FOaihGq7FK9DLbsOLqdiI852ha469dKFl1PaGXzcka8qc6y', '2023-01-24 07:11:44', '2023-02-01 23:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `artist_follows`
--

CREATE TABLE `artist_follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_follows`
--

INSERT INTO `artist_follows` (`id`, `artist_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 7, 12, '2023-03-24 00:10:31', NULL),
(3, 3, 12, '2023-03-24 00:10:48', NULL),
(4, 12, 12, '2023-03-27 00:57:11', NULL),
(5, 8, 12, '2023-03-27 04:08:22', NULL),
(6, 14, 3, '2023-03-28 05:22:55', NULL),
(7, 8, 3, '2023-03-28 06:26:51', NULL),
(8, 3, 3, '2023-03-28 07:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artist_likes`
--

CREATE TABLE `artist_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_likes`
--

INSERT INTO `artist_likes` (`id`, `artist_id`, `user_id`, `created_at`, `updated_at`) VALUES
(19, 10, 12, NULL, NULL),
(23, 14, 12, '2023-03-27 00:57:03', NULL),
(26, 12, 12, '2023-03-27 03:51:53', NULL),
(28, 8, 3, '2023-03-28 05:22:46', NULL),
(29, 12, 3, '2023-03-28 05:22:53', NULL),
(30, 9, 3, '2023-03-28 07:38:30', NULL),
(32, 8, 12, '2023-03-29 04:30:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artist_subscription_plan_features`
--

CREATE TABLE `artist_subscription_plan_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `num_of_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `num_of_statues` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `max_exhibition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_subscription_plan_features`
--

INSERT INTO `artist_subscription_plan_features` (`id`, `subscription_id`, `num_of_video`, `num_of_statues`, `max_exhibition`, `created_at`, `updated_at`) VALUES
(1, 1, '0', '0', '0', NULL, NULL),
(2, 2, '5', '12', '3', '2023-01-28 10:19:23', '2023-01-28 10:19:23'),
(3, 3, '5', '5', '5', '2023-01-28 10:21:40', '2023-01-28 10:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `artist_types`
--

CREATE TABLE `artist_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist_types`
--

INSERT INTO `artist_types` (`id`, `artist_type`, `created_at`, `updated_at`) VALUES
(1, 'Architectural', NULL, '2023-02-01 04:41:40'),
(2, 'Modern', NULL, '2023-02-01 05:14:16'),
(4, 'Acting', NULL, NULL),
(5, 'Fitness', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `year_created` date NOT NULL,
  `medium` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_id` bigint(20) UNSIGNED NOT NULL,
  `style_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `other_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_frame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movement_id` bigint(20) UNSIGNED NOT NULL,
  `markings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exhibitions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_the_work` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prints_available` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `also_available_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artwork_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auction_starting_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_end_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_reserve_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price_per_one_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price_per_three_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price_per_six_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_price_per_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_discount_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct_sale_discount_percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ready_to_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_market` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `style_other` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_other` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `literature` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`id`, `title`, `artist_id`, `year_created`, `medium`, `category_ids`, `collection_id`, `style_id`, `subject_id`, `other_subject`, `material_id`, `edition`, `width`, `height`, `depth`, `number_of_frame`, `price`, `movement_id`, `markings`, `exhibitions`, `about_the_work`, `prints_available`, `also_available_condition`, `artwork_type`, `auction_starting_price`, `auction_end_price`, `auction_reserve_price`, `auction_start_date`, `auction_end_date`, `rent_price_per_one_month`, `rent_price_per_three_month`, `rent_price_per_six_month`, `rent_price_per_year`, `rent_discount_percentage`, `direct_sale_discount_percentage`, `discount_start_dt`, `discount_end_dt`, `copyright`, `ready_to_hang`, `certification`, `signed_by`, `city`, `on_market`, `created_at`, `updated_at`, `style_other`, `material_other`, `literature`, `featured`) VALUES
(17, 'one cat', 9, '2023-02-03', 'UZdcTpnqfu', '1', 3, 1, 4, NULL, 2, 'lJf8x9EH5s', 'pnhoYumTab', 'E5MyxbJEJP', 'wzySkzZeWD', '1', '2344', 3, 'LaL3om1QfQ', 'i3SMnfTQua', 'cUDI0RSji7', 'sIKqrmciQb', 'DX6nhov4uk', 'Purchase,Bid,Rent', '1atUIwvfsv', '6JAmKeSYwn', 'RAuokTl1qT', '2023-02-25', '2023-02-23', '45', 'jxotGRWnw4', 'emf4ctD5pW', '46WC8vtwQP', '1Ks0IJWLF6', 'nih7oaAyP2', '2023-02-24', '2023-02-08', 'n5dPlZqBY4', 'yes', NULL, 'no', NULL, 1, '2023-02-13 06:37:56', '2023-03-15 00:58:36', NULL, NULL, 'g6HK7FaOMh', 1),
(18, 'hhh', 9, '2023-02-03', 'UZdcTpnqfu', '1', 3, 1, 4, NULL, 0, 'lJf8x9EH5s', 'pnhoYumTab', 'E5MyxbJEJP', 'wzySkzZeWD', '1', '2344', 3, 'LaL3om1QfQ', 'i3SMnfTQua', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Donec ut vulputate odio, in pellentesque massa. Suspendisse potenti. Maecenas congue nec mauris et tincidunt. Proin ut velit finibus, malesuada enim quis, finibus tortor. Pellentesque euismod neque eget tristique fringilla. Donec malesuada, nisi nec scelerisque rhoncus, dolor est ullamcorper dolor, ac luctus tortor lacus vitae nulla. Sed hendrerit, magna vitae eleifend tincidunt, tortor nunc finibus erat, nec vulputate lorem nibh vel velit. Phasellus libero tortor, eleifend id sodales quis, consectetur id nulla. Integer eleifend elit non turpis mattis, quis gravida nunc lacinia. Aliquam hendrerit vestibulum pulvinar. Fusce sit amet ante vel lacus egestas bibendum. Vivamus commodo massa ut metus luctus, at dapibus nisl vulputate. Sed tempor nunc ipsum, nec bibendum tellus finibus in.</p>', 'sIKqrmciQb', 'DX6nhov4uk', 'Purchase,Bid,Rent', '123', '4242', 'ky5lHoE6KL', '2023-03-21', '2023-03-22', '123', '2344', '23456', '100000', '12', 'nih7oaAyP2', '2023-02-24', '2023-02-08', 'n5dPlZqBY4', 'yes', NULL, 'no', NULL, 1, '2023-02-13 06:41:31', '2023-03-15 00:56:05', NULL, 'new o  at', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus commodo tempor ligula porta dapibus. Curabitur in massa magna. Vestibulum dignissim mi sit amet purus luctus, vitae accumsan quam pulvinar. Donec posuere vulputate augue, gravida dictum velit bibendum ac. Morbi a lectus semper nunc cursus euismod. Praesent dictum tristique erat, eget blandit nibh pulvinar quis. Mauris eu fermentum diam.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Donec ut vulputate odio, in pellentesque massa. Suspendisse potenti. Maecenas congue nec mauris et tincidunt. Proin ut velit finibus, malesuada enim quis, finibus tortor. Pellentesque euismod neque eget tristique fringilla. Donec malesuada, nisi nec scelerisque rhoncus, dolor est ullamcorper dolor, ac luctus tortor lacus vitae nulla. Sed hendrerit, magna vitae eleifend tincidunt, tortor nunc finibus erat, nec vulputate lorem nibh vel velit. Phasellus libero tortor, eleifend id sodales quis, consectetur id nulla. Integer eleifend elit non turpis mattis, quis gravida nunc lacinia. Aliquam hendrerit vestibulum pulvinar. Fusce sit amet ante vel lacus egestas bibendum. Vivamus commodo massa ut metus luctus, at dapibus nisl vulputate. Sed tempor nunc ipsum, nec bibendum tellus finibus in.</p>', 1),
(19, 'Test art', 8, '2020-03-12', 'test', '1,2', 3, 1, 3, NULL, 0, 'Test', 'TbolUj9gSt', 'Wt4VEeIx9I', 'MyFyzIMnh3', NULL, '2344', 2, 'iIC9TcUopX', '1b3q75LS6i', '<p>seg</p>', '<p>seg</p>', '<p>set</p>', 'Purchase,Bid,Rent', NULL, NULL, NULL, NULL, NULL, '78', NULL, NULL, NULL, NULL, 'mCoHADxARv', '2023-02-24', '2023-02-08', 'AD9l0xZbwH', 'yes', NULL, 'no', NULL, 0, '2023-02-15 01:16:21', '2023-03-15 01:00:23', NULL, 'hafiz other', NULL, 1),
(20, 'last', 8, '2023-02-03', '114GT31FjF', '2', 3, 1, 3, NULL, 0, '5oH3LJwZe3', 'n4WYUxudTt', 'FUkfdzL3xX', 'Lg2qJSIFYX', NULL, '2344', 2, 'XSPcgyx68S', 'uOVc1jn98P', 'k9axqDYvRc', 'TMhCDyDLDT', '3CW6uB4XoM', 'null', NULL, NULL, NULL, NULL, NULL, '878', NULL, NULL, NULL, NULL, 's8Vi4ROroW', '2023-02-24', '2023-02-08', 'm2MwxvXKOY', 'yes', NULL, 'no', NULL, 0, '2023-02-15 01:21:58', '2023-03-03 07:32:30', NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artwork_categories`
--

CREATE TABLE `artwork_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artwork_categories`
--

INSERT INTO `artwork_categories` (`id`, `slug`, `name`, `created_at`, `updated_at`, `image`) VALUES
(1, 'technology', 'Photography', '2023-02-07 18:30:00', '2023-03-01 18:30:00', '16777395227669.png'),
(2, 'gender-and-sexuality', 'Gender and sexuality', '2023-02-07 18:30:00', '2023-03-01 18:30:00', '16777360373107.jpg'),
(4, 'ink-painting', 'Ink Painting', '2023-03-01 18:30:00', '2023-03-01 18:30:00', '16777393684026.png'),
(5, 'pop-art', 'Pop Art', '2023-03-01 18:30:00', NULL, '16777392493657.jpg'),
(6, 'calligraphy', 'Calligraphy', '2023-03-01 18:30:00', NULL, '16777394257107.jpg'),
(7, 'test', 'Test', '2023-03-15 18:30:00', NULL, '16789456057779.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artwork_images`
--

CREATE TABLE `artwork_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artwork_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artwork_images`
--

INSERT INTO `artwork_images` (`id`, `artwork_id`, `image`, `created_at`, `updated_at`) VALUES
(26, 12, '16762697172963.PNG', '2023-02-12 18:30:00', NULL),
(27, 12, '16762697171261.PNG', '2023-02-12 18:30:00', NULL),
(28, 12, '16762697176293.PNG', '2023-02-12 18:30:00', NULL),
(29, 12, '16762697179532.PNG', '2023-02-12 18:30:00', NULL),
(30, 12, '16762697175958.PNG', '2023-02-12 18:30:00', NULL),
(54, 18, '16788614633524.jpg', '2023-03-14 18:30:00', NULL),
(55, 18, '16788615658527.jpg', '2023-03-14 18:30:00', NULL),
(56, 18, '16788615656140.jpg', '2023-03-14 18:30:00', NULL),
(57, 18, '16788615656162.jpg', '2023-03-14 18:30:00', NULL),
(58, 17, '1678861716487.jpg', '2023-03-14 18:30:00', NULL),
(59, 17, '16788617163439.png', '2023-03-14 18:30:00', NULL),
(60, 17, '16788617166064.jpg', '2023-03-14 18:30:00', NULL),
(61, 19, '16788618237347.jpg', '2023-03-14 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artwork_subjects`
--

CREATE TABLE `artwork_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artwork_subjects`
--

INSERT INTO `artwork_subjects` (`id`, `slug`, `name`, `created_at`, `updated_at`, `image`) VALUES
(2, 'l', 'Florals', '2023-02-05 18:30:00', '2023-02-06 23:53:36', NULL),
(3, '755740-landscapes', 'Portraits', '2023-02-05 18:30:00', '2023-02-06 23:53:25', NULL),
(4, '512704-landscapes', 'Landscapes', '2023-02-05 18:30:00', NULL, NULL),
(5, 'animals', 'Animals', '2023-02-05 18:30:00', NULL, NULL),
(6, 'still-life', 'Still life', '2023-02-06 18:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'discovering-the-royal-academy-summer-exhibition', 'Discovering the Royal Academy Summer Exhibition', NULL, '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><img src=\"data:image/jpeg;base64,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\" data-filename=\"4-150x150.jpg\" style=\"width: 267.484px; height: 267.484px;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br></span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br></span><br></p>', NULL, NULL),
(2, 'what-is-lorem-ipsum', 'What is Lorem Ipsum?', '16790344924142.jpg', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', '2023-03-17 00:15:01', '2023-03-17 00:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `slug`, `page`, `title`, `short_desc`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'gallery', 'home', 'Gallery', 'http://127.0.0.1:8000/', '<p>Gallery show<br></p>', '16778460074293.jpg', NULL, NULL),
(2, 'art', 'home', 'Art', 'http://127.0.0.1:8000/', '<p>Gallery show<br></p>', '16780978274938.jpg', NULL, NULL),
(3, 'art-show', 'home', 'Art Show', 'http://127.0.0.1:8000/', '<p>Gallery show<br></p>', '16780979062280.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `slug`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'flamimgo-vives', 'Flamimgo vives', '16756598207596.jpg', 1, '2023-02-05 18:30:00', '2023-02-06 00:49:00'),
(5, 'fff', 'ffff', NULL, 1, NULL, NULL),
(6, 'ccc', 'ccc', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frames`
--

CREATE TABLE `frames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artwork_id` bigint(20) UNSIGNED NOT NULL,
  `frame_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frame_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frames`
--

INSERT INTO `frames` (`id`, `slug`, `artwork_id`, `frame_type`, `frame_color`, `frame_price`, `created_at`, `updated_at`) VALUES
(6, 'wgjiywc8qw', 17, 'WgjIYWC8Qw', '#000000', 'qT6RSmiNFm', NULL, NULL),
(7, '938423-wgjiywc8qw', 17, 'WgjIYWC8Qw', '#000000', 'qT6RSmiNFm', NULL, NULL),
(8, '292679-wgjiywc8qw', 17, 'WgjIYWC8Qw', '#000000', 'qT6RSmiNFm', NULL, NULL),
(9, '5yagfq8hog', 17, '5YagfQ8hog', '#000000', '6Xjn3qyg2f', NULL, NULL),
(10, 'ckki4isvhf', 17, 'Ckki4isvHF', '#000000', 'F9TKjZt8KU', NULL, NULL),
(11, 'mm8ikihorb', 17, 'MM8IkIHOrb', '#000000', 'dvDkkMz3QA', NULL, NULL),
(12, 'prmpgot1as', 17, 'prmpGoT1as', '#000000', '76UiltNAZO', NULL, NULL),
(13, 'psvciqncwk', 18, 'psvciQncWK', '#0dd92f', '17FFWJKkQW', NULL, NULL),
(14, '35wfjlvrms', 18, '35WFjlvrms', '#cc1e1e', '0EW4Ej2jvr', NULL, NULL),
(15, 'qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(16, '239440-prmpgot1as', 17, 'prmpGoT1as', '#13a0dd', '76UiltNAZO', NULL, NULL),
(17, '683404-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(18, '368135-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(19, '565067-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(20, '728907-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(21, '577198-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(22, '708795-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(23, '191362-qitlemjyp9', 18, 'qITlEmjyp9', '#186df7', 'hcmJszbJNB', NULL, NULL),
(24, '283278-prmpgot1as', 17, 'prmpGoT1as', '#13a0dd', '76UiltNAZO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'oil', 'Oil', '2023-02-06 18:30:00', NULL),
(2, 'canvas', 'Canvas', '2023-02-06 18:30:00', NULL),
(3, 'trdtyy', 'Water', '2023-02-06 18:30:00', '2023-02-06 18:30:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_24_121228_create_admins_table', 2),
(8, '2023_01_25_105502_create_user_artists_table', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(12, '2023_01_27_112500_create_subscriptions_table', 7),
(13, '2023_01_27_112547_create_artist_subscription_plan_features_table', 8),
(14, '2023_01_28_114015_create_artist_types_table', 9),
(15, '2023_01_30_103236_add_bio_to_timeline_users_table', 10),
(16, '2023_01_30_123923_add_fields_to_artist_subscription_plan_features_table', 11),
(17, '2023_01_30_130918_create_subscription_takens_table', 12),
(18, '2023_01_31_094355_add_fields_to_user_artists_table', 13),
(19, '2023_02_03_085800_create_collections_table', 14),
(20, '2023_02_06_062040_create_styles_table', 15),
(21, '2023_02_06_100238_create_artwork_subjects_table', 16),
(22, '2023_02_07_055747_create_materials_table', 17),
(24, '2023_02_07_072222_create_frames_table', 18),
(25, '2023_02_08_045633_create_movements_table', 19),
(26, '2023_02_08_073048_create_artwork_categories_table', 20),
(27, '2023_02_08_094958_create_artworks_table', 21),
(28, '2023_02_08_110427_create_artwork_images_table', 21),
(29, '2023_03_02_052154_add_paid_to_artwork_subjects_table', 22),
(30, '2023_03_02_054635_add_paid_to_artwork_categories_table', 23),
(31, '2023_03_03_115548_create_cms_table', 24),
(32, '2023_03_10_102607_create_blogs_table', 25),
(33, '2023_03_23_042045_create_artist_likes_table', 26),
(34, '2023_03_23_045757_create_artist_likes_table', 27),
(35, '2023_03_24_044928_create_artist_follows_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `movements`
--

CREATE TABLE `movements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movements`
--

INSERT INTO `movements` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'impressionism', 'Impressionism', '2023-02-07 18:30:00', NULL),
(2, 'expressionism', 'Expressionism', '2023-02-07 18:30:00', NULL),
(3, 'abstract-impressionism', 'Abstract Impressionism', '2023-02-07 18:30:00', NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

CREATE TABLE `styles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`id`, `slug`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'calligraphy', 'Calligraphy', '16756687093548.jpg', '2023-02-05 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `slug`, `plan_name`, `plan_price`, `duration`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'basic', 'Basic', '0', 'Per Month', 'artist', '2023-01-28 04:47:32', '2023-01-28 04:47:32'),
(2, 'artist', 'Artist', '50', 'Per Year', 'artist', '2023-01-28 04:49:23', '2023-01-28 04:49:23'),
(3, 'artist-pro', 'Artist pro', '100', 'Per Year', 'artist', '2023-01-28 04:51:40', '2023-01-28 04:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_takens`
--

CREATE TABLE `subscription_takens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_takens`
--

INSERT INTO `subscription_takens` (`id`, `subscription_id`, `artist_id`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 2, 7, '2024-01-31', NULL, NULL),
(7, 3, 8, '2024-02-02', '2023-02-02 02:08:33', '2023-02-02 02:08:33'),
(16, 3, 3, '2024-02-02', '2023-02-02 04:50:49', '2023-02-02 04:50:49'),
(17, 2, 9, '2024-02-02', NULL, NULL),
(18, 2, 10, '2024-02-02', NULL, NULL),
(19, 2, 12, '2024-03-21', NULL, NULL),
(20, 1, 13, '2023-04-21', NULL, NULL),
(21, 3, 14, '2024-03-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `company_name`, `email`, `phone`, `join_date`, `address`, `city`, `state`, `country`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`, `bio`, `dob`, `image`, `slug`) VALUES
(3, 'Pradipta s', 'Bhuin', 'Igi', 'bhuin@mail.com', '1234567890', '2022-09-14', 'Durgapur Station Rd', 'Durgapur', 'WB', 'India', NULL, '$2y$10$pm.BGIaCSIJb4WfLfy8TTuVj2NiwE22JJ7igrU2xynq9Xjbb1d1Lu', 'artist', NULL, '2023-01-26 06:41:00', '2023-02-02 04:50:49', '<p><span style=\"font-size: 14.4px;\">Bio</span><br></p>', '2023-01-31', '16753310267441.jpg', 'pradipta-s'),
(7, 'Ranjit', 'Kumar', 'Igi', 'ranjit@mail.com', '1234567890', NULL, 'Durgapur Station Rd', 'Durgapur', 'WB', 'India', NULL, '$2y$10$zWIFDpgA871sybH9Vb.cNOskMonA51Ervex5SFuUcjkThizbbG/u2', 'artist', NULL, '2023-01-31 06:41:55', '2023-03-27 03:59:20', NULL, '1988-06-14', '16799093606310.jpg', 'ranjit-kumar'),
(8, 'Mohammad', 'Hafiz', 'Igi 21', 'hafiz@mail.com', '1234567890', NULL, 'Walking road', 'Arizona', 'Los V', 'India', NULL, '$2y$10$4TgUXXbZYEekm4wbptkSNeoO7mfw.zPJ448MkA6vkPkE6hG3CATkG', 'artist', NULL, '2023-01-31 07:27:46', '2023-03-27 03:58:54', 'In publishing&nbsp;', '1988-06-14', '16799093342541.jpg', 'mohammad-hafiz'),
(9, 'Mohammad', 'Hafiz', 'Igi', 'admin4312@mail.com', '1234567890', NULL, 'Walking road', 'Arizona', 'Los V', 'India', NULL, '$2y$10$UBaxaiIIm/BOHEsNJ5jbaeDtazV0XrA6Q108es2ko/1IAl6aNUXda', 'artist', NULL, '2023-02-02 07:37:24', '2023-02-02 07:37:24', NULL, '1988-06-14', NULL, 'mohammad-hafiz-2'),
(10, 'hhhh', 'Hafiz', 'Igi', 'admin431299@mail.com', '1234567890', NULL, 'Walking road', 'Arizona', 'Los V', 'India', NULL, '$2y$10$vFptPLm5wMie9H4BuDq/GuK.T6HJzjFLmYMW4Hq4hq7hxOE79bO06', 'artist', NULL, '2023-02-02 07:41:47', '2023-03-27 03:58:00', '<p>thigtyfyufguyugliugu iuhug</p>', '1988-06-14', '16799092805086.jpg', 'hhh-hafiz'),
(12, 'Ranjit', 'Kumar', 'ABC', 'r@gmail.com', '1234567890', NULL, 'Durgapur Station Rd', 'Durgapur', 'WB', 'Canada', NULL, '$2y$10$FtauqTDZjhimJ0e5h43nl.DbiBNeXjBhLDqoU8eh5In3yL9yQILVG', 'artist', NULL, '2023-03-22 01:10:49', '2023-04-07 04:25:20', '<p>THis is some thing about my self</p>', '1987-01-07', '16808609844861.jpg', 'ranjit'),
(14, 'Ranjit', 'Kumar', 'Xyz', 'r6@mail.com', '1234567890', NULL, 'Durgapur Station Rd', 'Durgapur', 'WB', 'Usa', NULL, '$2y$10$oDg20abxZiBLNjxTTNcRxuzhh70xj/fli/4UFkhbgx9fg4GECRNtq', 'artist', NULL, '2023-03-22 01:19:36', '2023-03-27 03:59:53', '<p>THis is bio</p>', '1983-06-16', '1679909393589.jpg', '11aa0e67225134c844298af770a8021f35882b34-ranjit');

-- --------------------------------------------------------

--
-- Table structure for table `user_artists`
--

CREATE TABLE `user_artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `artist_type` bigint(255) NOT NULL,
  `feature_artist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `condition_report` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history_and_Provenance` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_information` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_and_return_policies` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fearured_artist` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_artists`
--

INSERT INTO `user_artists` (`id`, `user_id`, `artist_type`, `feature_artist`, `created_at`, `updated_at`, `condition_report`, `history_and_Provenance`, `shipping_information`, `payment_and_return_policies`, `fearured_artist`) VALUES
(2, 3, 4, 'X', NULL, NULL, '<p><span style=\"font-size: 14.4px;\">Condition Report</span><br></p>', '<p><span style=\"font-size: 14.4px;\">History and Provenance</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Shipping Information</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Payment and return Policies</span><br></p>', 1),
(4, 7, 2, 'V', '2023-01-31 12:11:55', '2023-01-31 12:11:55', '<p>Nothing</p>', '<p><span style=\"font-size: 14.4px;\">Nothing</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Nothing</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Nothing</span><br></p>', 0),
(5, 8, 1, 'X', '2023-01-31 12:57:46', '2023-01-31 12:57:46', '<p><span style=\"font-size: 14.4px;\">Condition Report</span><br></p>', '<p><span style=\"font-size: 14.4px;\">History and Provenance</span><br></p>', '<p><span style=\"font-size: 14.4px;\">Shipping Information</span><br></p>', '<p>IYGGKGLYUG</p>', 1),
(6, 9, 2, 'V', '2023-02-02 13:07:24', '2023-02-02 13:07:24', '<p>admin4312@mail.com<br></p>', '<p>admin4312@mail.com<br></p>', '<p>admin4312@mail.com<br></p>', '<p>admin4312@mail.com<br></p>', 0),
(7, 10, 2, 'V', '2023-02-02 13:11:47', '2023-02-02 13:11:47', '<p>adminmail.com@<br></p>', '<p>adminmail.com@<br></p>', '<p>adminmail.com@<br></p>', '<p>adminmail.com@<br></p>', 0),
(8, 12, 2, 'V', '2023-03-22 06:40:49', '2023-03-22 06:40:49', '<p><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><br></p>', '<p><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><br></p>', '<p><span style=\"font-size: 14.4px;\">self</span><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><br></p>', '<p><span style=\"font-size: 14.4px;\">THis is some thing about my self</span><br></p>', 1),
(10, 14, 2, 'X', '2023-03-22 06:49:36', '2023-03-22 06:49:36', '<p>r6@mail.comr6@mail.comr6@mail.comr6@mail.com<br></p>', '<p>r6@mail.comr6@mail.comr6@mail.com<br></p>', NULL, '<p>r6@mail.comr6@mail.comr6@mail.com<br></p>', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_slug_unique` (`slug`);

--
-- Indexes for table `artist_follows`
--
ALTER TABLE `artist_follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_likes`
--
ALTER TABLE `artist_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_subscription_plan_features`
--
ALTER TABLE `artist_subscription_plan_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_types`
--
ALTER TABLE `artist_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artwork_categories`
--
ALTER TABLE `artwork_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artwork_categories_slug_unique` (`slug`);

--
-- Indexes for table `artwork_images`
--
ALTER TABLE `artwork_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artwork_subjects`
--
ALTER TABLE `artwork_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artwork_subjects_slug_unique` (`slug`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `collections_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `frames`
--
ALTER TABLE `frames`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `frames_slug_unique` (`slug`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movements_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `styles_slug_unique` (`slug`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_slug_unique` (`slug`);

--
-- Indexes for table `subscription_takens`
--
ALTER TABLE `subscription_takens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_artists`
--
ALTER TABLE `user_artists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artist_follows`
--
ALTER TABLE `artist_follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `artist_likes`
--
ALTER TABLE `artist_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `artist_subscription_plan_features`
--
ALTER TABLE `artist_subscription_plan_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artist_types`
--
ALTER TABLE `artist_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `artwork_categories`
--
ALTER TABLE `artwork_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `artwork_images`
--
ALTER TABLE `artwork_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `artwork_subjects`
--
ALTER TABLE `artwork_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frames`
--
ALTER TABLE `frames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `movements`
--
ALTER TABLE `movements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `styles`
--
ALTER TABLE `styles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_takens`
--
ALTER TABLE `subscription_takens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_artists`
--
ALTER TABLE `user_artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
