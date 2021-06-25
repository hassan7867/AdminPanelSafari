-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 06:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safaribookings`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_and_meals`
--

CREATE TABLE `accommodation_and_meals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accommodation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodation_and_meals`
--

INSERT INTO `accommodation_and_meals` (`id`, `tour_id`, `day`, `accommodation`, `meal`, `created_at`, `updated_at`) VALUES
(1, 3, 'Day 1', 'Acc1', 'Meal1', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(2, 4, 'Day 1', 'Acc1', 'Meal1', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(3, 5, 'Day 1', 'Acc1', 'Meal1', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `children` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `amount`, `name`, `email`, `country`, `phone`, `tour_id`, `tour_days`, `start_date`, `end_date`, `adults`, `children`, `message`, `operator_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '500', 'Ali Riaz', 'me.aliriaz007@gmail.com', 'Pakistan', '+923060460186', '3', '5', '2021-06-09', '2021-06-30', '3', '0', 'Please let me know. Thanks.', '1', 'Completed', '2021-06-01 05:43:13', '2021-06-14 05:20:10'),
(2, '500', 'Ali Riaz', 'me.aliriaz007@gmail.com', 'Pakistan', '+923060460186', '3', '3', '2021-06-15', '2021-06-18', '3', '0', 'please get back to me. thanks', '1', 'Rejected', '2021-06-05 10:26:42', '2021-06-12 02:27:08'),
(3, '400', 'Talha', 'talhaphanna@gmail.com', 'Pakistan', '03060460186', '3', '3', '2021-06-22', '2021-06-29', '2', '2', 'Please contact.', '1', 'Accepted', '2021-06-14 05:17:35', '2021-06-14 05:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `company_destinations`
--

CREATE TABLE `company_destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_destinations`
--

INSERT INTO `company_destinations` (`id`, `user_id`, `country`, `flag`, `created_at`, `updated_at`) VALUES
(1, '1', 'Belize', NULL, '2021-05-16 11:33:21', '2021-05-16 11:33:21'),
(2, '1', 'Kuwait', NULL, '2021-05-16 11:33:21', '2021-05-16 11:33:21'),
(3, '1', 'Albania', NULL, '2021-05-17 05:58:16', '2021-05-17 05:58:16'),
(6, '2', 'Latvia', NULL, '2021-05-23 03:27:48', '2021-05-23 03:27:48'),
(7, '2', 'Lebanon', NULL, '2021-05-23 03:27:48', '2021-05-23 03:27:48'),
(8, '2', 'Libya', NULL, '2021-05-23 03:27:48', '2021-05-23 03:27:48'),
(9, '3', 'Afghanistan', NULL, '2021-05-23 03:31:42', '2021-05-23 03:31:42'),
(10, '3', 'Algeria', NULL, '2021-05-23 03:31:42', '2021-05-23 03:31:42'),
(11, '3', 'Angola', NULL, '2021-05-23 03:31:42', '2021-05-23 03:31:42'),
(12, '4', 'Algeria', NULL, '2021-05-23 03:34:27', '2021-05-23 03:34:27'),
(13, '4', 'Angola', NULL, '2021-05-23 03:34:27', '2021-05-23 03:34:27'),
(14, '4', 'Barbados', NULL, '2021-05-23 03:34:27', '2021-05-23 03:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `company_offices`
--

CREATE TABLE `company_offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_offices`
--

INSERT INTO `company_offices` (`id`, `user_id`, `address`, `city`, `postal_code`, `state`, `country`, `created_at`, `updated_at`) VALUES
(1, '1', '166 D, Teacher Society, Johar Town, Lahore, Pakistan', 'Lahore', '54000', 'Punjab', 'Pakistan', '2021-05-16 11:33:21', '2021-05-16 11:33:21'),
(2, '2', '5827 NW 12th Ct, Sunrise, FL 33313, USA', 'Lahore', '54000', 'Punjab', 'United States', '2021-05-23 03:27:48', '2021-05-23 03:27:48'),
(3, '3', 'House no. 166D , Teachers Society, PIA Road, JoharTown, Lahore', 'Lahore', '54000', 'Punjab', 'Pakistan', '2021-05-23 03:31:42', '2021-05-23 03:31:42'),
(4, '4', 'House no. 166D , Teachers Society, PIA Road, JoharTown, Lahore', 'Lahore', '54000', 'Punjab', 'Pakistan', '2021-05-23 03:34:27', '2021-05-23 03:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `exclusions`
--

CREATE TABLE `exclusions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `excluded_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exclusions`
--

INSERT INTO `exclusions` (`id`, `tour_id`, `excluded_name`, `created_at`, `updated_at`) VALUES
(5, 3, 'International Flights', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(6, 3, 'Additional accommodation before and at the end of the tour', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(7, 4, 'International Flights', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(8, 4, 'Additional accommodation before and at the end of the tour', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(9, 5, 'Tips', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(3, 'Mid-range tour', 'This mid-range tour uses lodges and tented camps.', NULL, NULL, NULL),
(4, 'Can be customized', 'You can request minor changes to the accommodations and destinations of this tour.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inclusions`
--

CREATE TABLE `inclusions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `included_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inclusions`
--

INSERT INTO `inclusions` (`id`, `tour_id`, `included_name`, `created_at`, `updated_at`) VALUES
(5, 3, 'Park Fees', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(6, 3, 'All Activities', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(7, 4, 'Park Fees', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(8, 4, 'All Transportation', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(9, 5, 'Park Fees', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

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
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_05_16_124918_create_company_offices_table', 1),
(10, '2021_05_16_125053_create_company_destinations_table', 1),
(12, '2021_05_18_091455_create_features_table', 3),
(13, '2021_05_19_112855_create_tour_features_table', 4),
(14, '2021_05_19_113007_create_tour_activities_table', 4),
(15, '2021_05_19_113120_create_routes_table', 4),
(16, '2021_05_19_113246_create_accommodation_and_meals_table', 4),
(17, '2021_05_19_113358_create_rates_table', 4),
(18, '2021_05_19_113552_create_inclusions_table', 4),
(19, '2021_05_19_113633_create_exclusions_table', 4),
(20, '2021_05_19_113712_create_tour_photos_table', 4),
(21, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(22, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(23, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(24, '2016_06_01_000004_create_oauth_clients_table', 5),
(25, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(26, '2021_05_17_130518_create_tours_table', 5),
(27, '2021_05_24_125919_create_reviews_table', 6),
(28, '2021_05_24_125929_create_review_images_table', 6),
(29, '2021_06_01_101243_create_bids_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solo_room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `three_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `four_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `five_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `six_people` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `tour_id`, `start_date`, `end_date`, `solo_room`, `two_people`, `three_people`, `four_people`, `five_people`, `six_people`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-05-19', '2021-05-28', '1', '2', '3', '4', '5', '6', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(2, 5, '2021-05-19', '2021-05-20', '1', '2', '3', '4', '5', '6', '2021-05-19 08:20:48', '2021-05-19 08:20:48'),
(3, 5, '2021-05-27', '2021-05-28', '7', '8', '9', '10', '11', '12', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `month`, `year`, `rating`, `title`, `review`, `name`, `country`, `email`, `operator_id`, `created_at`, `updated_at`) VALUES
(1, '2', '2020', '5', 'Good', 'Very Good Experience overall. Enjoyed a lot during the whole trip.', 'Adam', 'United States', 'me.aliriaz007@gmail.com', '2', '2021-05-25 05:39:11', '2021-05-25 05:39:11'),
(2, '3', '2019', '5', 'Excellent', 'Very Good Experience overall. Enjoyed a lot during the whole trip.', 'Ava', 'United States', 'me.aliriaz007@gmail.com', '1', '2021-05-25 05:40:29', '2021-05-25 05:40:29'),
(3, '5', '2015', '4', 'Good', 'Very Good Experience overall. Enjoyed a lot during the whole trip.', 'MM G', 'United States', 'me.aliriaz007@gmail.com', '3', '2021-05-25 05:42:13', '2021-05-25 05:42:13'),
(4, '5', '2018', '5', 'Excellent trip', 'Very Good Experience overall. Enjoyed a lot during the whole trip.', 'PING', 'Australia', 'talhaphanna@gmail.com', '1', '2021-05-25 06:30:18', '2021-05-25 06:30:18'),
(5, '5', '2013', '5', 'Very Good Experience', 'Very Good Experience overall. Enjoyed a lot during the whole trip.', 'KK G', 'Bermuda', 'me.aliriaz007@gmail.com', '1', '2021-05-25 06:45:38', '2021-05-25 06:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `review_images`
--

CREATE TABLE `review_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review_images`
--

INSERT INTO `review_images` (`id`, `review_id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', '8851621939151.jpeg', '2021-05-25 05:39:11', '2021-05-25 05:39:11'),
(2, '3', '9031621939333.jpg', '2021-05-25 05:42:13', '2021-05-25 05:42:13'),
(3, '4', '8851621942218.jpg', '2021-05-25 06:30:18', '2021-05-25 06:30:18'),
(4, '5', '1421621943138.jpeg', '2021-05-25 06:45:38', '2021-05-25 06:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `route_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `tour_id`, `route_day`, `route_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Day 1', 'HSP', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(2, 4, 'Day 1', 'HSP', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(3, 5, 'Day 1', 'HSP', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_drives` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `getting_around` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_to_airport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `user_id`, `picture`, `title`, `price`, `country_name`, `description`, `total_days`, `game_drives`, `getting_around`, `back_to_airport`, `created_at`, `updated_at`) VALUES
(3, 1, '2431621430199.jpg', 'Fyrestream Top black nav Design settings', 1200, 'Uganda', 'saedas', '1', 'Game d2', 'Getting A 1', 'on', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(4, 1, '5391621430385.jpg', 'Fix oven', 1000, 'Tanzania', 'scdada', '1', 'Game d2', 'Getting A 1', 'on', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(5, 1, '4231621430448.jpg', 'Fix oven', 5000, 'Kenya', 'sadasd', '1', 'Game d2', 'Getting A 1', 'on', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tour_activities`
--

CREATE TABLE `tour_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_activities`
--

INSERT INTO `tour_activities` (`id`, `tour_id`, `activity`, `created_at`, `updated_at`) VALUES
(5, 3, 'Game Drives', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(6, 3, 'Boat Trip', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(7, 4, 'Game Drives', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(8, 4, 'Nature Hikes/Walks', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(9, 5, 'Boat Trip', '2021-05-19 08:20:48', '2021-05-19 08:20:48'),
(10, 5, 'Nature Hikes/Walks', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tour_features`
--

CREATE TABLE `tour_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_features`
--

INSERT INTO `tour_features` (`id`, `tour_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(4, 3, 3, '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(5, 3, 4, '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(6, 4, 3, '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(7, 4, 4, '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(8, 5, 3, '2021-05-19 08:20:48', '2021-05-19 08:20:48'),
(9, 5, 4, '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `tour_photos`
--

CREATE TABLE `tour_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tour_photos`
--

INSERT INTO `tour_photos` (`id`, `tour_id`, `photo`, `created_at`, `updated_at`) VALUES
(5, 3, '9801621430199.jpg', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(6, 3, '291621430199.jpg', '2021-05-19 08:16:39', '2021-05-19 08:16:39'),
(7, 4, '631621430385.jpg', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(8, 4, '3901621430385.jpg', '2021-05-19 08:19:45', '2021-05-19 08:19:45'),
(9, 5, '4251621430448.jpg', '2021-05-19 08:20:48', '2021-05-19 08:20:48'),
(10, 5, '7811621430448.jpg', '2021-05-19 08:20:48', '2021-05-19 08:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tourtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foundedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricerange` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `email`, `company_size`, `password`, `tourtype`, `foundedin`, `pricerange`, `overview`, `description`, `telephone`, `profile_pic`, `company_logo`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Ali Riaz', 'Safari Tours Group', 'me.aliriaz007@gmail.com', '0-10 employees', '827ccb0eea8a706c4c34a16891f84e7b', 'Customizable private tours and fixed group tours', '2010', '10-25', 'this is a testing overview', 'this is a testing description', '+923060460186', '631621430385.jpg', '161621182801.png', '1', '2021-05-16 11:33:21', '2021-05-16 11:34:44'),
(2, 'Hassan abbas', 'Big Cat Safaris', 'hassanabbas7462@gmail.com', '10-20 employees', '98209b6aebae5ba8cf37247e5514a1a2', 'Customizable private tours and fixed group tours', '1990', '20-30', 'this is a testing overview', 'this is a testing description', '+923008934616', '6771621758468.jpg', '4041621758468.png', '1', '2021-05-23 03:27:48', '2021-05-23 03:27:48'),
(3, 'Ali riaz', 'African Souls', 'aliriaz@gmail.com', '20-100 employees', '2240108550f4ecf6ce2e4fcea44778c5', 'Customizable private tours and fixed group tours', '1989', '20-40', 'this is a testing overview', 'this is a testing description', '03004567451', '7031621758702.jpg', '3821621758702.png', '1', '2021-05-23 03:31:42', '2021-05-23 03:31:42'),
(4, 'khizer Abbas', 'WayM Travels', 'khizer@gmail.com', '20-100 employees', 'b94b91227dd1fdd53b3428bff6c64d45', 'Customizable private tours and fixed group tours', '1869', '20-50', 'this is a testing overview', 'this is a testing description', '0300000000', '4791621758867.jpg', '1031621758867.png', '1', '2021-05-23 03:34:27', '2021-05-23 03:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation_and_meals`
--
ALTER TABLE `accommodation_and_meals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_destinations`
--
ALTER TABLE `company_destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_offices`
--
ALTER TABLE `company_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exclusions`
--
ALTER TABLE `exclusions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inclusions`
--
ALTER TABLE `inclusions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_images`
--
ALTER TABLE `review_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_activities`
--
ALTER TABLE `tour_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_features`
--
ALTER TABLE `tour_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_photos`
--
ALTER TABLE `tour_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation_and_meals`
--
ALTER TABLE `accommodation_and_meals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_destinations`
--
ALTER TABLE `company_destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company_offices`
--
ALTER TABLE `company_offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exclusions`
--
ALTER TABLE `exclusions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inclusions`
--
ALTER TABLE `inclusions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_images`
--
ALTER TABLE `review_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tour_activities`
--
ALTER TABLE `tour_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tour_features`
--
ALTER TABLE `tour_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tour_photos`
--
ALTER TABLE `tour_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
