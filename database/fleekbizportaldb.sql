-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 24, 2018 at 07:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `admins`
--

TRUNCATE TABLE `admins`;
-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

DROP TABLE IF EXISTS `client_info`;
CREATE TABLE IF NOT EXISTS `client_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `about_company` text,
  `company_address` text,
  `company_phone` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `client_info`
--

TRUNCATE TABLE `client_info`;
--
-- Dumping data for table `client_info`
--

INSERT DELAYED IGNORE INTO `client_info` (`id`, `user_id`, `company_name`, `about_company`, `company_address`, `company_phone`, `site_url`, `create_at`, `updated_at`) VALUES
(1, 2, 'Dream Local Digitals', '<p>Digital Marketing Company provide solution for Web,Mobile and Business</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-18 09:43:03', '2018-01-19 06:39:01'),
(2, 3, 'FleekBiz', '<p>Testing</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-20 11:04:48', '2018-01-20 11:04:48'),
(3, 3, 'Dream Local Digital', '<p>Hi this is testing</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-22 08:31:00', '2018-01-22 08:31:00'),
(4, 2, 'Dream Local Digital', '<p>Hi Tesingt</p>', 'Airport,New York,United States of America', '+962813172128', 'http://www.dreamlocaldigital', '2018-01-22 09:34:32', '2018-01-22 09:34:32'),
(5, 2, 'FleekBiz', '<p>Hi This is testing<br></p>', 'New York', '+93251213214', 'http://www.fleekbiz.com', '2018-01-22 11:33:09', '2018-01-22 11:33:09'),
(6, 4, 'FleekBiz', '<p>Hi This is testing<br></p>', 'New York', '+93251213214', 'http://www.fleekbiz.com', '2018-01-22 13:19:24', '2018-01-22 13:19:24'),
(7, 5, 'FleekBiz', '<p>Hi This is Testing<br></p>', 'New York', '+93251213214', 'http://www.fleekbiz.com', '2018-01-22 14:19:57', '2018-01-22 14:19:57'),
(8, 6, 'FleekBiz', '<p>Hi This is Testing</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-23 09:52:04', '2018-01-23 09:52:04'),
(9, 9, 'Dream Local Digital', '<p>Hi This is Testing</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-23 12:07:14', '2018-01-23 12:07:14'),
(10, 10, 'James & Johnson', '<p>Hi this is testing</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-23 12:09:46', '2018-01-23 12:09:46'),
(11, 11, 'bet365.com', '<p>Hi this is Tesitng</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-23 12:12:51', '2018-01-23 12:12:51'),
(12, 12, 'Dream Local Digital', '<p>Hi This is Testing</p>', 'Airport,New York,United States of America', '+962813172125', 'http://www.dreamlocaldigital', '2018-01-23 12:44:23', '2018-01-23 12:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_types` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `type_of_logo` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_types` (`order_types`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `logo`
--

TRUNCATE TABLE `logo`;
--
-- Dumping data for table `logo`
--

INSERT DELAYED IGNORE INTO `logo` (`id`, `order_types`, `title`, `img_path`, `type_of_logo`, `status`, `create_at`, `updated_at`) VALUES
(2, 2, 'Lettermark', 'uploads/logotypes/1516363406.png', 'Logo Type', 1, '2018-01-19 12:03:26', '2018-01-19 12:03:26'),
(3, 2, 'Combination Mark', 'uploads/logotypes/1516371210.png', 'Logo Type', 1, '2018-01-19 12:05:40', '2018-01-19 14:13:30'),
(4, 2, 'ICONIC / ABSTRACT', 'uploads/logotypes/1516363564.png', 'Logo Type', 1, '2018-01-19 12:06:04', '2018-01-19 12:06:04'),
(5, 2, 'EMBLEM', 'uploads/logotypes/1516363647.png', 'Logo Type', 1, '2018-01-19 12:07:27', '2018-01-19 12:07:27'),
(6, 2, 'VINTAGE', 'uploads/logotypes/1516363708.png', 'Logo Type', 1, '2018-01-19 12:08:28', '2018-01-19 12:08:28'),
(7, 2, 'FUN', 'uploads/logotypes/1516363736.png', 'Logo Type', 1, '2018-01-19 12:08:56', '2018-01-19 12:08:56'),
(8, 2, 'MASCOT', 'uploads/logotypes/1516363759.png', 'Logo Type', 1, '2018-01-19 12:09:19', '2018-01-19 12:09:19'),
(9, 2, 'Artistic', 'uploads/logotypes/1516363805.png', 'Logo Feel', 1, '2018-01-19 12:10:05', '2018-01-19 14:12:11'),
(10, 2, 'MINIMAL', 'uploads/logotypes/1516363826.png', 'Logo Feel', 1, '2018-01-19 12:10:26', '2018-01-19 12:10:26'),
(11, 2, 'SOPHISTICATED', 'uploads/logotypes/1516363843.png', 'Logo Feel', 1, '2018-01-19 12:10:43', '2018-01-19 12:10:43'),
(12, 2, 'CORPORATE', 'uploads/logotypes/1516363863.png', 'Logo Feel', 1, '2018-01-19 12:11:03', '2018-01-19 12:11:03'),
(13, 2, 'Childish', 'uploads/logotypes/1516363891.png', 'Logo Feel', 1, '2018-01-19 12:11:31', '2018-01-19 14:12:47'),
(14, 2, 'WEB 2.0', 'uploads/logotypes/1516363914.png', 'Logo Feel', 1, '2018-01-19 12:11:54', '2018-01-19 12:11:54'),
(15, 2, 'FUN', 'uploads/logotypes/1516363933.png', 'Logo Feel', 1, '2018-01-19 12:12:13', '2018-01-19 12:12:13'),
(16, 2, 'RETRO', 'uploads/logotypes/1516363966.png', 'Logo Feel', 1, '2018-01-19 12:12:46', '2018-01-19 12:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `logo_font`
--

DROP TABLE IF EXISTS `logo_font`;
CREATE TABLE IF NOT EXISTS `logo_font` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_types` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_types` (`order_types`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `logo_font`
--

TRUNCATE TABLE `logo_font`;
--
-- Dumping data for table `logo_font`
--

INSERT DELAYED IGNORE INTO `logo_font` (`id`, `order_types`, `title`, `img_path`, `status`, `create_at`, `updated_at`) VALUES
(1, 2, 'Sans Serif', 'uploads/logofonts/1516431758.jpg', 1, '2018-01-20 07:02:38', '2018-01-20 07:05:06'),
(2, 2, 'Serif', 'uploads/logofonts/1516431824.jpg', 1, '2018-01-20 07:03:44', '2018-01-20 07:03:44'),
(3, 2, 'Script', 'uploads/logofonts/1516431842.jpg', 1, '2018-01-20 07:04:02', '2018-01-20 07:04:02'),
(4, 2, 'Decorative', 'uploads/logofonts/1516431942.jpg', 1, '2018-01-20 07:05:42', '2018-01-20 07:05:42'),
(5, 2, 'Retro', 'uploads/logofonts/1516431957.jpg', 1, '2018-01-20 07:05:57', '2018-01-20 07:05:57'),
(6, 2, 'Typewriter', 'uploads/logofonts/1516431982.jpg', 1, '2018-01-20 07:06:22', '2018-01-20 07:13:05'),
(7, 2, 'Chilly', 'uploads/logofonts/1516432196.jpg', 1, '2018-01-20 07:09:56', '2018-01-20 07:13:13'),
(8, 2, 'Comic', 'uploads/logofonts/1516432208.jpg', 1, '2018-01-20 07:10:08', '2018-01-20 07:10:08'),
(9, 2, 'Techno', 'uploads/logofonts/1516432225.jpg', 1, '2018-01-20 07:10:25', '2018-01-20 07:10:25'),
(10, 2, 'Stencil', 'uploads/logofonts/1516432244.jpg', 1, '2018-01-20 07:10:44', '2018-01-20 07:10:44'),
(11, 2, 'Handwritten', 'uploads/logofonts/1516432261.jpg', 1, '2018-01-20 07:11:01', '2018-01-20 07:11:01'),
(12, 2, 'Chineez', 'uploads/logofonts/1516432292.jpg', 1, '2018-01-20 07:11:32', '2018-01-20 07:11:32'),
(13, 2, 'Sans serif', 'uploads/logofonts/1516432325.jpg', 1, '2018-01-20 07:12:05', '2018-01-20 07:12:05'),
(14, 2, 'Serif Bold', 'uploads/logofonts/1516432345.jpg', 1, '2018-01-20 07:12:25', '2018-01-20 07:12:25'),
(15, 2, 'Formal Script', 'uploads/logofonts/1516432362.jpg', 1, '2018-01-20 07:12:42', '2018-01-20 07:12:42'),
(16, 2, 'Eroded', 'uploads/logofonts/1516432378.jpg', 1, '2018-01-20 07:12:58', '2018-01-20 07:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `logo_orders`
--

DROP TABLE IF EXISTS `logo_orders`;
CREATE TABLE IF NOT EXISTS `logo_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `order_type` int(10) NOT NULL,
  `logo_name` varchar(255) DEFAULT NULL,
  `logo_slogan` varchar(255) DEFAULT NULL,
  `logo_cat` varchar(255) DEFAULT NULL,
  `logo_web_url` varchar(255) DEFAULT NULL,
  `logo_target_audience` varchar(255) DEFAULT NULL,
  `logo_descrip` text,
  `logo_competitor_url` varchar(255) DEFAULT NULL,
  `logo_sample` varchar(255) DEFAULT NULL,
  `logo_visual_descp` text,
  `logo_visual_images` text,
  `logo_type` varchar(255) DEFAULT NULL,
  `logo_color` varchar(255) DEFAULT NULL,
  `logo_other_color` varchar(255) DEFAULT NULL,
  `logo_usage` varchar(255) DEFAULT NULL,
  `logo_other_usage` varchar(255) DEFAULT NULL,
  `logo_fonts` varchar(255) DEFAULT NULL,
  `logo_other_fonts` varchar(255) DEFAULT NULL,
  `logo_feel` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `order_type` (`order_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `logo_orders`
--

TRUNCATE TABLE `logo_orders`;
-- --------------------------------------------------------

--
-- Table structure for table `logo_usage`
--

DROP TABLE IF EXISTS `logo_usage`;
CREATE TABLE IF NOT EXISTS `logo_usage` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_types` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descp` text,
  `status` int(10) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_types` (`order_types`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `logo_usage`
--

TRUNCATE TABLE `logo_usage`;
--
-- Dumping data for table `logo_usage`
--

INSERT DELAYED IGNORE INTO `logo_usage` (`id`, `order_types`, `title`, `descp`, `status`, `create_at`, `updated_at`) VALUES
(1, 2, 'Print', '<p>\r\n\r\nCards, Letterheads, Brochures,\r\n\r\nBillboards \r\n\r\n etc\r\n\r\n<br></p>', 1, '2018-01-19 14:45:54', '2018-01-19 14:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `migrations`
--

TRUNCATE TABLE `migrations`;
--
-- Dumping data for table `migrations`
--

INSERT DELAYED IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_22_111920_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_payments`
--

DROP TABLE IF EXISTS `orders_payments`;
CREATE TABLE IF NOT EXISTS `orders_payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_type` int(10) NOT NULL,
  `package_id` int(10) NOT NULL,
  `coupon_id` int(10) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `discount_amount` int(10) DEFAULT NULL,
  `total_amount` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `order_type` (`order_type`),
  KEY `package_id` (`package_id`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `orders_payments`
--

TRUNCATE TABLE `orders_payments`;
-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

DROP TABLE IF EXISTS `order_types`;
CREATE TABLE IF NOT EXISTS `order_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `order_types`
--

TRUNCATE TABLE `order_types`;
--
-- Dumping data for table `order_types`
--

INSERT DELAYED IGNORE INTO `order_types` (`id`, `name`, `create_at`, `updated_at`) VALUES
(2, 'Logo Designing', '2018-01-19 07:10:52', '2018-01-19 07:10:52'),
(3, 'Web Developments', '2018-01-19 07:11:07', '2018-01-19 07:43:35'),
(4, 'Mobile Applications', '2018-01-19 07:12:18', '2018-01-19 07:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_type_id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sale_price` int(10) NOT NULL,
  `regular_price` int(10) NOT NULL,
  `descp` text,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_type_id` (`order_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `packages`
--

TRUNCATE TABLE `packages`;
--
-- Dumping data for table `packages`
--

INSERT DELAYED IGNORE INTO `packages` (`id`, `order_type_id`, `title`, `sale_price`, `regular_price`, `descp`, `create_at`, `updated_at`) VALUES
(1, 2, 'Logo Basic', 78, 98, '<p></p><ul><li>6 Unique Logo Concepts<br></li><li>Free Icon<br></li><li>Unlimited Revisions<br></li><li>100% Ownership Rights<br></li><li>AI, PSD, EPS, GIF, BMP, JPEG<br></li><li>All Formats<br></li><li>Free Rush Delivery<br></li><li>Get Initial Concepts within 24<br></li><li>FREE Stationery Design<br></li><li>FREE Stationery Printing<br></li></ul><p></p>', '2018-01-19 08:56:58', '2018-01-19 09:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `packages_payment_addons`
--

DROP TABLE IF EXISTS `packages_payment_addons`;
CREATE TABLE IF NOT EXISTS `packages_payment_addons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_type_id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `descp` text,
  `status` int(10) NOT NULL DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_type_id` (`order_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `packages_payment_addons`
--

TRUNCATE TABLE `packages_payment_addons`;
--
-- Dumping data for table `packages_payment_addons`
--

INSERT DELAYED IGNORE INTO `packages_payment_addons` (`id`, `order_type_id`, `title`, `img_path`, `price`, `descp`, `status`, `create_at`, `updated_at`) VALUES
(1, 2, 'Rush', 'uploads/paymentadons/1516436475.png', 75, '<p>\r\n\r\nIf you’re in a hurry, rush the order and we’ll make sure you get your initial designs in just 2 business days!\r\n\r\n<br></p>', 1, '2018-01-20 08:21:15', '2018-01-20 08:21:15'),
(2, 2, 'Experts Only', 'uploads/paymentadons/1516436449.png', 99, '<p>\r\n\r\nIf you’re in a hurry, rush the order and we’ll make sure you get your initial designs in just 2 business days!\r\n\r\n<br></p>', 1, '2018-01-20 08:20:49', '2018-01-20 08:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `password_resets`
--

TRUNCATE TABLE `password_resets`;
-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `site_currency_code` varchar(255) DEFAULT NULL,
  `site_currency_symbol` varchar(255) DEFAULT NULL,
  `payment_email` varchar(255) DEFAULT NULL,
  `payment_mood` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `settings`
--

TRUNCATE TABLE `settings`;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`, `phone`, `user_role`, `remember_token`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Super', 'Admin', 'superadmin@flkbiz.com', '$2y$10$eHKDuXE/VIouleN8vTH7PurlsWTKYF3s4DW1gL2XqwFz0leI/brxW', '+9628131721', 1, 'TkxhRXK1hRilkiglowTB594T3NMRGTI3pRkSalgLwzAQL6by9d4k27bufAUo', '2018-01-22 07:07:38', '2018-01-22 07:07:38', '1'),
(3, 'Fleek Biz', 'Admin', 'admin@fleekbiz.com', '$2y$10$eHKDuXE/VIouleN8vTH7PurlsWTKYF3s4DW1gL2XqwFz0leI/brxW', '+9628131721', 2, 'Yfpo7xecPY3iLZESa1mzUv7wy5x7khdemxuMWsQlIDLuIKp34vwm0hIZO02K', '2018-01-22 07:37:50', '2018-01-23 07:41:02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

DROP TABLE IF EXISTS `user_coupons`;
CREATE TABLE IF NOT EXISTS `user_coupons` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_type_id` int(10) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `descp` text,
  `price` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user_coupons`
--

TRUNCATE TABLE `user_coupons`;
--
-- Dumping data for table `user_coupons`
--

INSERT DELAYED IGNORE INTO `user_coupons` (`id`, `order_type_id`, `coupon_code`, `descp`, `price`, `status`, `create_at`, `updated_at`) VALUES
(1, 2, 'Az-254871', '<p>Hi iam testing</p>', 18, 1, '2018-01-20 09:07:20', '2018-01-20 09:12:26'),
(2, 2, 'Az-2548784', '<p>This is Testing</p>', 12, 1, '2018-01-20 14:12:58', '2018-01-20 14:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `user_role`
--

TRUNCATE TABLE `user_role`;
--
-- Dumping data for table `user_role`
--

INSERT DELAYED IGNORE INTO `user_role` (`id`, `name`, `create_at`, `updated_at`) VALUES
(1, 'admin', '2018-01-17 02:07:12', '2018-01-17 17:55:05'),
(2, 'author', '2018-01-17 17:55:05', '2018-01-17 17:55:05'),
(3, 'contributor', '2018-01-17 06:12:15', '2018-01-17 09:21:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
