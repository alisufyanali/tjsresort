-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2024 at 05:22 AM
-- Server version: 10.6.18-MariaDB-cll-lve-log
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tjstutks_resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `featured_image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Sample Blog Post', 'This is a sample blog post content.', 'featured_images/GFgCo6tyOZoPuz5WyjV9weA4nc9WPKID6iLv5YWo.png', 1, '2024-07-25 08:24:50', '2024-08-12 16:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tag`
--

CREATE TABLE `blog_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tag`
--

INSERT INTO `blog_tag` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-08-12 16:56:16', '2024-08-12 16:56:16'),
(2, 1, 4, '2024-08-12 16:56:16', '2024-08-12 16:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, 'Health', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(3, 'Business', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(4, 'Entertainment', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(5, 'Sports', '2024-07-25 08:24:50', '2024-07-25 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `email`, `author`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'john@example.com', 'John Doe', 'Great post!', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, 1, 'jane@example.com', 'Jane Doe', 'Very informative.', '2024-07-25 08:24:50', '2024-07-25 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `discount_type` varchar(8) NOT NULL,
  `discount_usage` decimal(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `discount_type`, `discount_usage`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'dpahse', 16.26, 'percent', 20.00, '2025-06-12', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, 'offptj', 16.02, 'percent', 20.00, '2024-08-27', '2024-07-25 08:24:50', '2024-07-25 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `bcc` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `sent_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `subject`, `body`, `recipient`, `cc`, `bcc`, `status`, `sent_at`, `created_at`, `updated_at`) VALUES
(1, 'sd', '<p>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.</p>', 'jesasor279@foraro.com', NULL, NULL, 'draft', NULL, '2024-08-05 13:53:00', '2024-08-05 13:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_driver` varchar(255) NOT NULL,
  `mail_host` varchar(255) NOT NULL,
  `mail_port` int(11) NOT NULL,
  `mail_username` varchar(255) NOT NULL,
  `mail_password` varchar(255) NOT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `mail_from_address` varchar(255) NOT NULL,
  `mail_from_name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `mail_from_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'tjstruckresort.com', 587, 'info@tjstruckresort.com', 'Admin123!@@!', 'tls', 'info@tjstruckresort.com', 'Admin User', 1, '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, 'smtp', 'tjstruckresort.com', 587, 'info@tjstruckresort.com', 'Admin123!@@!', 'tls', 'info@tjstruckresort.com', 'Employee User', 2, '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(3, 'smtp', 'tjstruckresort.com', 587, 'info@tjstruckresort.com', 'Admin123!@@!', 'tls', 'info@tjstruckresort.com', 'Member User', 3, '2024-07-25 08:24:50', '2024-07-25 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `schedule` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `more_about_event` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `open_time`, `close_time`, `start_date`, `end_date`, `title`, `location`, `schedule`, `description`, `more_about_event`, `image`, `created_at`, `updated_at`) VALUES
(1, '17:00:00', '05:59:00', '2024-08-13', '2024-08-21', 'new', 's', 's', 's', 's', '1723467474.webp', '2024-08-12 16:57:54', '2024-08-12 16:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_comments`
--

CREATE TABLE `event_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `homepage_content`
--

CREATE TABLE `homepage_content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_heading` text DEFAULT NULL,
  `sub_heading` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `intro_decs` text DEFAULT NULL,
  `intro_icon_1` text DEFAULT NULL,
  `intro_icon_2` text DEFAULT NULL,
  `intro_icon_3` text DEFAULT NULL,
  `intro_name_1` text DEFAULT NULL,
  `intro_name_2` text DEFAULT NULL,
  `intro_name_3` text DEFAULT NULL,
  `intro_img_back` text DEFAULT NULL,
  `intro_img_front` text DEFAULT NULL,
  `why_us` text DEFAULT NULL,
  `why_us_services` text DEFAULT NULL,
  `why_us_img_1` text DEFAULT NULL,
  `why_us_img_2` text DEFAULT NULL,
  `why_us_img_3` text DEFAULT NULL,
  `virtual_link` text DEFAULT NULL,
  `virtual_img` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_content`
--

INSERT INTO `homepage_content` (`id`, `main_heading`, `sub_heading`, `banner`, `intro_decs`, `intro_icon_1`, `intro_icon_2`, `intro_icon_3`, `intro_name_1`, `intro_name_2`, `intro_name_3`, `intro_img_back`, `intro_img_front`, `why_us`, `why_us_services`, `why_us_img_1`, `why_us_img_2`, `why_us_img_3`, `virtual_link`, `virtual_img`, `created_at`, `updated_at`) VALUES
(1, 'RESERVE A SPOT NOW', 'ESCAPE THE HIGHWAY CHAOS AND DOWN SHIFT AT TJ’S TRUCK RESORT', 'images/7bntOJ1VmbfSBCFhUH0twgCSnrqk0v1t71vxxMMu.jpg', '<h4> WE ARE AVAILABLE FOR BUSINESS </h4>  <p> The first-ever Semi-truck Resort in America. Offering a unique, tranquil, and safe environment for truck drivers to unwind and reset during their breaks. A one-of-a-kind retreat, tailored specifically for truck drivers, with a wide range of amenities provided to make their stay comfortable, relaxing, and enjoyable. </p>.', 'fa-solid fa-paw', 'fa-solid fa-water-ladder', 'fa-solid fa-wifi', 'DOG PARK/WASH', 'SWIMMING POOL', 'FREE WIFI', 'images/introduction-img2.jpg', 'images/introduction-img3.jpg', 'We provide a premier destination with top-notch amenities, exceptional service, and a welcoming environment tailored specifically for truck drivers.', 'Wifi, secure parking, customer satisfaction, gym & drivers lounge, Hot showers, Lake for fishing, Drivers Van, Dog Wash & Park', 'images/pexels-donaldtong94-189296.jpg', 'images/pexels-pixabay-258154.jpg', 'images/pexels-kampus-7967392.jpg', 'https://www.youtube.com/watch?v=48uPk1SA37Y', 'images/pexels-donaldtong94-189296.jpg', '2024-07-25 08:24:50', '2024-08-04 08:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_testimonial`
--

CREATE TABLE `homepage_testimonial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `postion` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_testimonial`
--

INSERT INTO `homepage_testimonial` (`id`, `comment`, `name`, `postion`, `image`, `created_at`, `updated_at`) VALUES
(1, 'TJ’s Truck Resort is a game-changer for truck drivers. The facilities are top-notch, and the environment is incredibly relaxing. Highly recommended!', 'Mark Peterson', ' Long-Haul Driver', 'testimonials/client-1.png', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, 'Our drivers love the amenities at TJ’s Truck Resort. It’s the perfect place for them to recharge during long hauls. Great job!', 'Lisa Rodriguez', 'Fleet Manager', 'testimonials/client-1.png', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(3, 'I\'ve never felt more at ease during my breaks. TJ’s Truck Resort has everything a trucker could ask for. Thank you for this amazing place!', 'Jake Williams', 'Independent Trucker\n\n', 'testimonials/client-1.png', '2024-07-25 08:24:50', '2024-07-25 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL DEFAULT '0',
  `per_night_charges` decimal(8,2) DEFAULT NULL,
  `daily` decimal(8,2) NOT NULL,
  `weekly` decimal(8,2) NOT NULL,
  `monthly` decimal(8,2) NOT NULL,
  `children` varchar(255) DEFAULT NULL,
  `adult` varchar(255) DEFAULT NULL,
  `pet` varchar(255) DEFAULT NULL,
  `avaliablity_from` date DEFAULT NULL,
  `avaliablity_to` date DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location_images` varchar(255) DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `location_services` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `slug`, `featured`, `per_night_charges`, `daily`, `weekly`, `monthly`, `children`, `adult`, `pet`, `avaliablity_from`, `avaliablity_to`, `short_description`, `description`, `location_images`, `featured_image`, `location_services`, `latitude`, `longitude`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Houston, TX', 'houston', '1', 100.00, 100.00, 160.00, 200.00, '50', '50', '50', NULL, NULL, NULL, 'Secure parking with electric fence, 24/7 access, bright lighting at night, and security images.', '[\"location-details-.jpg\",\"location-details.jpg\"]', 'location-1.jpg', 'Electric fence , 24/7 access , Bright lighting , Security', NULL, NULL, NULL, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(2, 'Dallas, TX', 'dallas', '1', 120.00, 120.00, 160.00, 300.00, '20', '20', '20', NULL, NULL, NULL, 'Parking available with CCTV surveillance, gated entry, and security patrols.', '[\"location-details-.jpg\",\"location-details.jpg\"]', 'location-2.jpg', 'CCTV surveillance , Gated entry , Security patrols', NULL, NULL, NULL, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(3, 'Austin, TX', 'austin', '1', 110.00, 110.00, 160.00, 200.00, '30', '30', '30', NULL, NULL, NULL, 'Affordable parking with ample space and easy access to major highways.', '[\"location-details-.jpg\",\"location-details.jpg\"]', 'location-3.jpg', 'Ample space , Easy highway access', NULL, NULL, NULL, '2024-07-25 08:24:48', '2024-07-25 08:24:48');

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
(69, '2014_10_12_000000_create_users_table', 1),
(70, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(71, '2014_10_12_100000_create_password_resets_table', 1),
(72, '2019_08_19_000000_create_failed_jobs_table', 1),
(73, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(74, '2024_06_12_065059_create_time_off_requests_table', 1),
(75, '2024_06_12_065109_create_working_hours_table', 1),
(76, '2024_06_12_065119_create_scheduled_days_table', 1),
(77, '2024_06_12_065129_create_pays_table', 1),
(78, '2024_06_15_165056_create_locations_table', 1),
(79, '2024_06_21_103110_create_contacts_table', 1),
(80, '2024_06_22_074700_create_reviews_table', 1),
(81, '2024_06_22_122455_create_permission_tables', 1),
(82, '2024_06_26_114524_coupen', 1),
(83, '2024_06_27_162558_create_to_do_cards_table', 1),
(84, '2024_06_27_172305_create_to_do_lists_table', 1),
(85, '2024_06_27_181640_create_emails_table', 1),
(86, '2024_06_29_134448_create_resort_gallery_images_table', 1),
(87, '2024_06_29_191737_create_resort_social_links_table', 1),
(88, '2024_07_02_080900_create_prices_table', 1),
(89, '2024_07_04_195519_create_sessions_table', 1),
(90, '2024_07_07_194310_create_events_table', 1),
(91, '2024_07_07_213832_create_events_comments_table', 1),
(92, '2024_07_10_231726_create_reservations_table', 1),
(93, '2024_07_11_081454_create_spots_table', 1),
(94, '2024_07_16_081417_create_category_table', 1),
(95, '2024_07_16_081454_create_blogs_table', 1),
(96, '2024_07_16_081466_create_comments_table', 1),
(97, '2024_07_16_081477_create_tags_table', 1),
(98, '2024_07_16_081488_create_blog_tag_table', 1),
(99, '2024_07_17_203955_create_homepage_content_table', 1),
(100, '2024_07_17_204255_create_homepage_testimonial_table', 1),
(101, '2024_07_18_095823_create_settings_table', 1),
(102, '2024_07_21_170244_create_email_settings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `pay_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(2, 'role-create', 'web', '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(3, 'role-edit', 'web', '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(4, 'role-delete', 'web', '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(5, 'location-list', 'web', '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(6, 'location-create', 'web', '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(7, 'location-edit', 'web', '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(8, 'location-delete', 'web', '2024-07-25 08:24:49', '2024-07-25 08:24:49');

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
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `daily` decimal(8,2) NOT NULL,
  `weekly` decimal(8,2) NOT NULL,
  `monthly` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `nights` int(11) NOT NULL,
  `truck_number` varchar(255) DEFAULT NULL,
  `truck_color` varchar(255) DEFAULT NULL,
  `number_of_spaces` int(11) DEFAULT NULL,
  `over_sized` varchar(255) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `pet` int(11) DEFAULT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `grand_price` decimal(8,2) NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Card',
  `stripe_response` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `date_in`, `date_out`, `nights`, `truck_number`, `truck_color`, `number_of_spaces`, `over_sized`, `children`, `adult`, `pet`, `total_price`, `grand_price`, `location_id`, `user_id`, `coupon_id`, `payment_method`, `stripe_response`, `created_at`, `updated_at`) VALUES
(1, '1985-05-05', '2023-02-17', 5, 'no4-499', 'yellow', 3, NULL, NULL, NULL, NULL, 139.35, 381.59, 1, 3, 2, 'Card', 'Voluptate nisi ea est nam et occaecati. Velit nobis dolores quaerat. Aliquam consequatur facere excepturi magnam enim blanditiis.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, '1984-10-26', '1999-02-06', 7, 'gw6-974', 'blue', 2, NULL, NULL, NULL, NULL, 190.05, 394.51, 3, 2, 2, 'Cash', 'Vero debitis officiis vitae molestiae non recusandae ut. Distinctio quas minus sit temporibus nam voluptatem. Repellat vero id vel rerum et ducimus.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(3, '1987-11-03', '2013-07-24', 7, 'wk6-869', 'aqua', 4, NULL, NULL, NULL, NULL, 199.53, 358.74, 1, 2, 1, 'Cash', 'Fuga doloribus animi sint reprehenderit rerum. Necessitatibus officiis esse aliquid dolore. Impedit voluptatem sunt voluptatem quia id quia. Harum autem reiciendis cum quia est vitae optio.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(4, '1971-10-19', '1993-03-20', 1, 'je2-569', 'maroon', 3, NULL, NULL, NULL, NULL, 195.89, 258.12, 1, 3, 1, 'Cash', 'Aut illo nihil dolorum sit ratione. Excepturi soluta omnis accusantium quia similique porro. Minus sit quam itaque.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(5, '2000-02-06', '1985-10-01', 4, 'ms0-931', 'blue', 5, NULL, NULL, NULL, NULL, 53.28, 482.81, 3, 2, 2, 'Cash', 'Odit ut enim facilis harum velit sed. Aut sint similique voluptatum unde dolores eligendi quae. Illum necessitatibus facilis hic a.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(6, '2015-04-29', '1995-02-20', 6, 'uq9-280', 'black', 4, NULL, NULL, NULL, NULL, 74.14, 498.62, 2, 2, 2, 'Card', 'Ut est similique et eum vero aut reprehenderit. Magnam delectus odit explicabo quae rerum perspiciatis nemo. Assumenda nemo libero aut repellat repellendus dolores.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(7, '1987-08-30', '1990-09-16', 4, 'yd5-149', 'fuchsia', 5, NULL, NULL, NULL, NULL, 83.31, 227.12, 2, 3, 2, 'Cash', 'Quas eum aliquid similique occaecati. Unde voluptatem ipsum tempora rerum non. Debitis eos natus excepturi quibusdam cumque. Qui possimus et debitis sint odit veniam qui.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(8, '1981-07-01', '2021-06-01', 4, 'sz1-058', 'yellow', 3, NULL, NULL, NULL, NULL, 192.73, 322.89, 1, 2, 2, 'Card', 'Et optio ut fuga sit harum. Ut aspernatur totam dolorum aliquid provident laudantium. Consequatur laboriosam sit omnis nulla voluptas.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(9, '1999-12-25', '1982-04-03', 2, 'pr0-353', 'black', 2, NULL, NULL, NULL, NULL, 64.42, 375.62, 1, 3, 2, 'Card', 'Iste animi veniam et dolor. Possimus repudiandae nemo delectus velit autem neque. Alias voluptatem quo nam quia.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(10, '2020-04-30', '1981-01-29', 4, 'vw9-234', 'blue', 5, NULL, NULL, NULL, NULL, 161.97, 496.86, 3, 3, 2, 'Card', 'Esse non tempora repellat temporibus voluptatum quaerat eum. Aut voluptatibus in ut aut. Quis ratione sapiente ipsa similique voluptas est mollitia.', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(11, '2024-07-28', '2024-08-07', 10, '123-3123', 'yellow', 2, NULL, NULL, NULL, NULL, 2000.00, 2000.00, 1, 4, 0, 'Card', '0', '2024-07-28 22:51:55', '2024-07-28 22:51:55'),
(12, '2024-07-24', '2024-08-01', 8, '123-3123', 'ew', 1, NULL, NULL, NULL, NULL, 960.00, 960.00, 2, 5, 0, 'Card', '0', '2024-07-31 11:14:41', '2024-07-31 11:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `resort_gallery_images`
--

CREATE TABLE `resort_gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resort_social_links`
--

CREATE TABLE `resort_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `rating`, `message`, `location_id`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', 5, 'The service at this parking location is exceptional. The staff were extremely helpful and made sure that my truck was parked securely. The area is well-lit and has a strong electric fence, making me feel safe leaving my vehicle here. Highly recommend!', 1, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(2, 'Jane Smith', 'jane@example.com', 4, 'Overall, I had a very good experience at this parking lot. The location is convenient and the security measures are solid. However, there was a minor delay during check-in, which is why I am giving it 4 stars instead of 5. Still, I would definitely use their services again.', 1, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(3, 'Bob Johnson', 'bob@example.com', 3, 'Average experience, nothing special.', 1, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(4, 'Bob Johnson', 'bob@example.com', 3, 'My experience was average. While the location is good and the facilities are adequate, I found the pricing to be a bit high for what is offered. Additionally, the lighting at night could be better. It was a decent experience, but there is room for improvement.', 2, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(5, 'Alice Brown', 'alice@example.com', 5, 'I was very impressed with the parking services provided. The 24/7 access is a huge plus for me, and the security features like the electric fence and surveillance cameras are top-notch. The staff were friendly and efficient. I will definitely be using this service regularly.', 2, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(6, 'John Doe', 'john@example.com', 5, 'Great service, highly recommend!', 2, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(7, 'Charlie Davis', 'charlie@example.com', 4, 'Good overall experience. The location in Houston is excellent and easy to find. The parking spaces are well-maintained and the security is reassuring. However, I did notice that the restroom facilities could use some improvement. Other than that, I was satisfied with the service.', 3, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(8, 'Jane Smith', 'jane@example.com', 4, 'Very good, but could improve in some areas.', 3, 1, '2024-07-25 08:24:48', '2024-07-25 08:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(2, 'employee', 'web', '2024-07-25 08:24:48', '2024-07-25 08:24:48'),
(3, 'member', 'web', '2024-07-25 08:24:48', '2024-07-25 08:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_days`
--

CREATE TABLE `scheduled_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `sliders` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `meta_tags` text DEFAULT NULL,
  `coming_soon_visible` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `logo`, `favicon`, `sliders`, `address`, `contact_no`, `email`, `meta_tags`, `coming_soon_visible`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/assets/img/logo.png', 'public/assets/img/logo.png', 'public/assets/img/home-slider/slider-5.jpg,public/assets/img/home-slider/slider-6.jpg,public/assets/img/home-slider/slider-7.jpg', '1234 Main St, Anytown, USA', '3466419617', 'info@example.com', 'example,site,meta,tags', '1', '2024-07-25 08:24:50', '2024-08-16 21:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `spots`
--

CREATE TABLE `spots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `spot_number` varchar(255) NOT NULL,
  `is_reserved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'alisufyan2410@gmail.com', '2024-08-16 19:49:38', '2024-08-16 19:49:38'),
(3, 'admin@example.com', '2024-08-16 19:50:35', '2024-08-16 19:50:35'),
(4, 'uzair3w3+2@gmail.com', '2024-08-19 07:31:09', '2024-08-19 07:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Holidays', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(2, 'Food & Drink', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(3, 'Hotels', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(4, 'Activites', '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(5, 'Travel Tips', '2024-07-25 08:24:50', '2024-07-25 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `time_off_requests`
--

CREATE TABLE `time_off_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_cards`
--

CREATE TABLE `to_do_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `completed` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `to_do_lists`
--

CREATE TABLE `to_do_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `completed` varchar(255) NOT NULL DEFAULT '0',
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
  `phone` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `profile`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, NULL, NULL, '$2y$12$fu70R3wm4XnkijWqHENWUOFV2cs4SbkZSGFSyRbA8EIfUe1keyxAa', 'admin', 'Prbu8nlqQlzHlRJhlHazELsFci7SE3Zbn6xzJ2IJ9rdrEcwEPrrJzGMbT4s2', '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(2, 'Employee User', 'employee@example.com', NULL, NULL, NULL, '$2y$12$NHZokvK9u8uk8kzSXzocfeJA.Me.IztTwM/AYMWXmu9sc.MFmOXTq', 'emp', NULL, '2024-07-25 08:24:49', '2024-07-25 08:24:49'),
(3, 'Member User', 'member@example.com', NULL, NULL, NULL, '$2y$12$4vHBbes.01.Utp2e1Pr8tegz1Opd40LzQmXV0DOJFcdKjs1t8p.9y', 'member', NULL, '2024-07-25 08:24:50', '2024-07-25 08:24:50'),
(4, 'sufyan', 'alisufyan2410@gmail.com', '03172159160', NULL, NULL, '$2y$12$5GI3L9CvWeOLxYIFYCAyEe9NAjGfY14njYOAtNw5hO1RiZeXq4RLW', 'member', NULL, '2024-07-28 22:51:55', '2024-07-28 22:51:55'),
(5, 'sufyan', 'test@example.us', '03111111111', NULL, NULL, '$2y$12$LLch8Fcz6rh6ddTtwULMpuDfdl/WQiv6RNAsLQTRH4IxCfO9I/Oo2', 'member', NULL, '2024-07-31 11:14:41', '2024-07-31 11:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `working_hours`
--

CREATE TABLE `working_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `working_day` varchar(255) NOT NULL,
  `working_on` varchar(255) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_tag_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_comments_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homepage_content`
--
ALTER TABLE `homepage_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_testimonial`
--
ALTER TABLE `homepage_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays_employee_id_foreign` (`employee_id`);

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
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_location_id_foreign` (`location_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_location_id_foreign` (`location_id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `resort_gallery_images`
--
ALTER TABLE `resort_gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resort_gallery_images_location_id_foreign` (`location_id`);

--
-- Indexes for table `resort_social_links`
--
ALTER TABLE `resort_social_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resort_social_links_location_id_foreign` (`location_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `scheduled_days`
--
ALTER TABLE `scheduled_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scheduled_days_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_user_id_foreign` (`user_id`);

--
-- Indexes for table `spots`
--
ALTER TABLE `spots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spots_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_off_requests`
--
ALTER TABLE `time_off_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_off_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `to_do_cards`
--
ALTER TABLE `to_do_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_do_cards_user_id_foreign` (`user_id`);

--
-- Indexes for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_do_lists_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `working_hours_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_content`
--
ALTER TABLE `homepage_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage_testimonial`
--
ALTER TABLE `homepage_testimonial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resort_gallery_images`
--
ALTER TABLE `resort_gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resort_social_links`
--
ALTER TABLE `resort_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scheduled_days`
--
ALTER TABLE `scheduled_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spots`
--
ALTER TABLE `spots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_off_requests`
--
ALTER TABLE `time_off_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `to_do_cards`
--
ALTER TABLE `to_do_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `working_hours`
--
ALTER TABLE `working_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD CONSTRAINT `blog_tag_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD CONSTRAINT `email_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_comments`
--
ALTER TABLE `event_comments`
  ADD CONSTRAINT `event_comments_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resort_gallery_images`
--
ALTER TABLE `resort_gallery_images`
  ADD CONSTRAINT `resort_gallery_images_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resort_social_links`
--
ALTER TABLE `resort_social_links`
  ADD CONSTRAINT `resort_social_links_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scheduled_days`
--
ALTER TABLE `scheduled_days`
  ADD CONSTRAINT `scheduled_days_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spots`
--
ALTER TABLE `spots`
  ADD CONSTRAINT `spots_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_off_requests`
--
ALTER TABLE `time_off_requests`
  ADD CONSTRAINT `time_off_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `to_do_cards`
--
ALTER TABLE `to_do_cards`
  ADD CONSTRAINT `to_do_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  ADD CONSTRAINT `to_do_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
