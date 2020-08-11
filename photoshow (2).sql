-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 07:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photoshow`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(1, 'City', 'images/category/c3.jpg', 'images/category/c3.jpg', '2020-01-20 00:11:35', '2020-01-20 00:11:35'),
(7, 'Nature', 'images/category/c8.jpg', 'images/category/c8.jpg', '2020-01-31 21:37:47', '2020-01-31 21:37:47'),
(8, 'Fusion', 'images/category/c7.jpg', 'images/category/c7.jpg', '2020-01-31 21:38:25', '2020-01-31 21:38:25'),
(9, 'Education', 'images/category/c6.jpg', 'images/category/c6.jpg', '2020-01-31 21:38:58', '2020-01-31 21:38:58'),
(10, 'Shopping', 'images/category/c5.jpg', 'images/category/c5.jpg', '2020-01-31 21:39:16', '2020-01-31 21:39:16'),
(12, 'Travailing', 'images/category/c1.jpeg', 'images/category/c1.jpeg', '2020-01-31 21:41:02', '2020-01-31 21:41:02'),
(13, 'Food', 'images/category/c4.jpg', 'images/category/c4.jpg', '2020-01-31 21:42:00', '2020-01-31 21:42:00'),
(14, 'Travailing', 'images/category/c1.jpeg', 'images/category/c1.jpeg', '2020-01-31 21:42:12', '2020-01-31 21:42:12');

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
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `followers` int(11) NOT NULL,
  `followeing` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `followers`, `followeing`, `created_at`, `updated_at`) VALUES
(2, 15, 2, NULL, NULL),
(3, 15, 17, NULL, NULL),
(4, 17, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` int(11) NOT NULL DEFAULT 0,
  `youtube1` int(11) NOT NULL DEFAULT 0,
  `youtube2` int(11) NOT NULL DEFAULT 0,
  `website` int(11) NOT NULL DEFAULT 0,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_04_164641_create_settings_table', 2),
(5, '2020_01_06_170554_create_sliders_table', 3),
(6, '2020_01_14_164334_create_categories_table', 4),
(7, '2020_01_14_164657_create_points_table', 4),
(8, '2020_01_14_164847_create_photos_table', 4),
(9, '2020_01_14_165010_create_withdraws_table', 4),
(10, '2020_01_14_165042_create_links_table', 4),
(11, '2020_01_14_165415_create_profiles_table', 4),
(12, '2020_01_14_165446_create_promotions_table', 4),
(13, '2020_02_05_171112_create_followers_table', 5);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `photo`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'HTC', 'images/photo/p6.jpg', '2', '1', '2020-01-16 17:06:50', '2020-01-16 17:06:50'),
(3, 'Samsung', 'images/photo/p3.jpg', '2', '1', '2020-01-16 18:04:31', '2020-01-16 18:04:31'),
(4, 'Samsung', 'images/photo/p9.jpg', '2', '1', '2020-01-16 18:04:50', '2020-01-16 18:04:50'),
(5, 'phone', 'images/photo/p5.jpg', '2', '1', '2020-01-16 18:05:06', '2020-01-16 18:05:06'),
(6, 'Samsun phone', 'images/photo/night.jpg', '15', '1', '2020-01-16 18:05:27', '2020-01-16 18:05:27'),
(14, 'product', 'images/photo/500_F_226442355_IA9uiNbyD611R48kWrFVj8j671h70e98.jpg', '15', '1', '2020-01-16 19:43:15', '2020-01-16 19:43:15'),
(17, 'Iphone', 'images/photo/p9.jpg', '15', '1', '2020-01-19 22:40:02', '2020-01-19 22:40:02'),
(22, 'Samsung', 'images/photo/p2.jpg', '15', '1', '2020-02-01 22:08:56', '2020-02-01 22:08:56'),
(23, 'new product', 'images/photo/p4.jpg', '2', '1', '2020-02-01 23:53:29', '2020-02-01 23:53:29'),
(24, 'Iphone', 'images/photo/p1.jpg', '2', '1', '2020-02-02 00:02:25', '2020-02-02 00:02:25'),
(25, 'product', 'images/photo/p1.jpg', '2', '1', '2020-02-02 23:18:52', '2020-02-02 23:18:52'),
(26, 'HTC', 'images/photo/p8.jpg', '2', '1', '2020-02-02 23:19:13', '2020-02-02 23:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` double(15,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `point`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 100.00, 17, '2020-02-01 23:27:43', '2020-02-01 23:27:43'),
(2, 1650.00, 2, '2020-02-01 23:27:43', '2020-02-01 23:27:43'),
(3, 500.00, 15, '2020-02-01 23:27:43', '2020-02-01 23:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `photo`, `first_name`, `last_name`, `number`, `email`, `description`, `facebook`, `youtube`, `twitter`, `linkin`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'images/photo/r1.jpg', 'saiful', 'saiful', '0179999999999', 'saiful@gmail.com', 'Sep 28, 2018 - I installed Laravel 5.7 Added a form to the file ... Post request in Laravel 5.7 --- Error - 419 Sorry, your session has expired. ... login function maybe we used same route with that page and token was renewed after we submit.', '#', '#', '#', '#', '2', NULL, NULL),
(3, 'images/photo/p9.jpg', 'fahad', 'fahad', NULL, 'fahad@gmail.com', NULL, NULL, NULL, NULL, NULL, '15', '2020-02-01 21:59:29', '2020-02-01 21:59:29'),
(5, 'images/user/user.jpg', 'saif', 'khan', NULL, '123@gmail.com', NULL, NULL, NULL, NULL, NULL, '17', '2020-02-01 23:27:43', '2020-02-01 23:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `photo`, `title`, `link`, `created_at`, `updated_at`) VALUES
(6, 'images/promotion/81178882-hot-sale-banner-design-template-this-weekend-special-offer-big-sale-discount-up-to-60-off.jpg', 'মাশাআল্লাহ অনেক সুন্দর হয়েছে সবাইকে একসাথে দেখে ভাল লাগলো|মাশাআল্লাহ অনেক সুন্দর হয়েছে সবাইকে একসাথে দেখে ভাল লাগলো', 'www.offersite.com/offer/01', '2020-01-26 00:07:27', '2020-01-26 00:07:27'),
(10, 'images/promotion/recent2.jpg', 'মাশাআল্লাহ অনেক সুন্দর হয়েছে সবাইকে একসাথে দেখে ভাল লাগলো', 'www.offersite.com/offer/01', '2020-02-02 00:25:09', '2020-02-02 00:25:09'),
(11, 'images/promotion/recent1.jpg', 'Super Show Off', 'www.offersite.com/offer/01', '2020-02-02 00:25:32', '2020-02-02 00:25:32'),
(12, 'images/promotion/recent3.jpg', 'Super Show Off', 'www.offersite.com/offer/01', '2020-02-02 00:25:51', '2020-02-02 00:25:51'),
(13, 'images/promotion/recent3.jpg', 'Great Offer for You', 'www.offersite.com/offer/01', '2020-01-26 00:07:27', '2020-01-26 00:07:27'),
(14, 'images/promotion/recent1.jpg', 'Super Show Off', 'www.offersite.com/offer/01', '2020-02-02 00:25:09', '2020-02-02 00:25:09'),
(15, 'images/promotion/recent2.jpg', 'Super Show Off', 'www.offersite.com/offer/01', '2020-02-02 00:25:32', '2020-02-02 00:25:32'),
(16, 'images/promotion/81178882-hot-sale-banner-design-template-this-weekend-special-offer-big-sale-discount-up-to-60-off.jpg', 'Super Show Off', 'www.offersite.com/offer/01', '2020-02-02 00:25:51', '2020-02-02 00:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `header1`, `header2`, `facebook`, `twitter`, `youtube`, `address`, `phone`, `gmail`, `description`, `footer`, `created_at`, `updated_at`) VALUES
(1, 'images/logo/logo.png', 'FIND THE BEST PLACES TO BE', 'All the top locations – from restaurants and clubs, to cinemas, galleries, and more.', 'https://www.facebook.com/groupshttps://www.facebook.com/groups', '#', 'https://www.youtube.com/', 'AddressProudly Made in Canada & USA', '0175000000000', 'admin@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscingelit. Nulla ultrices nisi vitae laoreet dapibus. Etiampulvinar non justo at tincidunt. Cras turpis erat, ornare eget sem ut, tempus scelerisque lorem.', 'Copyright amrsoft© 2020. All Rights Reserved', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider`, `created_at`, `updated_at`) VALUES
(9, 'images/slider/parallax1.jpg', '2020-01-30 20:38:32', '2020-01-30 20:38:32'),
(10, 'images/slider/parallax2.jpg', '2020-01-30 20:38:40', '2020-01-30 20:38:40'),
(11, 'images/slider/parallax3.jpg', '2020-01-30 20:38:47', '2020-01-30 20:38:47'),
(12, 'images/slider/parallax4.jpg', '2020-01-30 20:38:54', '2020-01-30 20:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Saif', '', 'admin', 'saifulsaif5854@gmail.com', NULL, '$2y$10$jeu5vWf3rqlo5PH1LnTOCOp3pIM2epbUHShXt691OZM4AEZLGZKKG', 'uP96fh7s7k2ewCTjItP6BERZ7uhR9hi9SpV4a851n5PxybAbFTVPRmaS0KZm', '2019-12-30 23:18:24', '2019-12-30 23:18:24'),
(2, 'Saif', '', 'user', 'saiful@gmail.com', NULL, '$2y$10$jeu5vWf3rqlo5PH1LnTOCOp3pIM2epbUHShXt691OZM4AEZLGZKKG', 'LVE6dz2ZGsN8FRLGHqr742qRNjpE3O0sDrDFz47F8T2anBQ2qAhmsmT3efDh', '2019-12-30 23:18:24', '2019-12-30 23:18:24'),
(3, 'robin', 'khan', 'user', 'robinkhan5854@gmail.com', NULL, '$2y$10$URELIBdn8a0IkexVsisRduxqq7B9/TYere2lyURlyxy8k24qbKlu2', NULL, '2020-01-04 21:46:59', '2020-01-04 21:46:59'),
(4, 'rajib', 'mia', 'user', 'rajib@gmail.com', NULL, '$2y$10$DG35MPKVphmIyM9HrchXRu8Y4bYZUGWd9AoE2ieePkGTQSWxZEDLi', NULL, '2020-01-30 23:41:57', '2020-01-30 23:41:57'),
(15, 'fahad', 'khan', 'user', 'fahad@gmail.com', NULL, '$2y$10$ACRbDWaNfKak18FmAD7myOeGBGLUZIasafEoOTR3ycTH0XK4ROdPu', NULL, '2020-02-01 21:59:29', '2020-02-01 21:59:29'),
(17, 'saif', 'khan', 'user', '123@gmail.com', NULL, '$2y$10$UbQ5R6L/qhS5KsjVbhod3u9aCxoyIflULSvq2mUarLoZWry2/o6aK', NULL, '2020-02-01 23:27:43', '2020-02-01 23:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point` double(15,2) NOT NULL,
  `amount` double(15,2) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
