-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 08:54 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `state`, `city`, `address`, `postal_code`) VALUES
(1, 'Serbia', 'Novi Sad', 'Skojevska 4', '11000'),
(2, 'Serbia', 'Novi Sad', 'B.Berića 7', '11000');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`) VALUES
(1, 'casio', 'casio'),
(2, 'citizen', 'citizen'),
(3, 'fossil', 'fossil'),
(4, 'festina', 'festina'),
(5, 'Emporio Armani', 'emporio-armani'),
(6, 'Hugo Boss', 'hugo-boss'),
(7, 'tissot', 'tissot'),
(8, 'rotary', 'rotary'),
(9, 'seiko', 'seiko');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `email`, `product_id`, `created_at`, `updated_at`, `comment_text`) VALUES
(1, 'simke', 'sima@s.com', 6, '2017-06-05 19:26:45', '2017-06-05 19:26:45', 'Nice watch! I will buy for my soon'),
(3, 'mikac', 'mile@m.com', 6, '2017-06-05 20:01:36', '2017-06-05 20:01:36', 'To expensive for simple kids watch!'),
(4, 'mikac', 'mile@m.com', 6, '2017-06-05 20:04:39', '2017-06-05 20:04:39', 'testing'),
(5, 'mikac', 'mile@m.com', 6, '2017-06-05 20:23:42', '2017-06-05 20:23:42', 'One more'),
(6, 'zile z', 'zika@z.com', 1, '2017-06-05 20:41:18', '2017-06-05 20:41:18', 'Nice!!!'),
(7, 'Petar', 'pera@p.com', 1, '2017-06-05 20:43:56', '2017-06-05 20:43:56', 'More testing'),
(24, 'test test', 'test@t.com', 1, '2017-07-27 17:38:39', '2017-07-27 17:38:39', 'One more test'),
(66, 'Marinko Magla', 'marinko@m.com', 8, '2017-07-30 11:23:18', '2017-07-30 11:23:18', 'Armani looks very nice'),
(68, 'Živan Radosavljević', 'zika@alkohol.rs', 8, '2018-04-22 18:14:44', '2018-04-22 18:14:44', 'Great!'),
(72, 'teds@a.sd', 'teds@a.sd', 5, '2018-04-23 22:33:01', '2018-04-23 22:33:01', 'sfdff sfd');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `phone`, `email`, `created_at`, `updated_at`, `state`, `city`, `address`, `postal_code`) VALUES
(1, 'Ana', 'Anić', '042/ 564-789', 'ana@a.com', '2017-06-26 21:12:58', '2017-06-26 21:12:58', 'Serbia', 'Mojkovac', 'Anje Njegomir 15', '41230'),
(2, 'test', 'test', '56562323', 'test@t.com', '2017-07-05 19:55:45', '2017-07-05 19:55:45', 'Spain', 'Barcelona', 'Camp Nou 2', '140000'),
(3, 'test4', 'test4', '111222', 'test4@t.com', '2017-07-10 08:36:34', '2017-07-10 08:36:34', 'test', 'test', 'test', '11111'),
(4, 'test2', 'test2', '2346', 'test2@t.com', '2017-07-11 22:18:02', '2017-07-11 22:18:02', 'Italy', 'Milano', 'San Siro 12', '12000'),
(5, 'test', 'test', '56562323', 'test@t.com', '2017-07-12 21:37:18', '2017-07-12 21:37:18', 'Spain', 'Barcelona', 'Camp', '140000');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'men'),
(2, 'women'),
(3, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(29, '592386bf45f6f-100009730_v_1484915076.jpg', 13, '2017-05-22 22:47:59', '2017-05-22 22:47:59'),
(28, '59238634a4387-s-l300.jpg', 12, '2017-05-22 22:45:40', '2017-05-22 22:45:40'),
(24, '592230a8df89d-ea-ar1863_6.jpg', 8, '2017-05-21 22:28:24', '2017-05-21 22:28:24'),
(23, '592230a8e1fae-AR1863_main.jpg', 8, '2017-05-21 22:28:24', '2017-05-21 22:28:24'),
(11, '59222a4175c43-508837-41-55-50_1.jpg', 1, '2017-05-21 22:01:05', '2017-05-21 22:01:05'),
(12, '59222c22d4e78-s-l300.jpg', 2, '2017-05-21 22:09:06', '2017-05-21 22:09:06'),
(13, '59222c6eddc75-f20205-1.jpg', 3, '2017-05-21 22:10:22', '2017-05-21 22:10:22'),
(14, '59222c99473f5-51D7lm0GM8L.jpg', 4, '2017-05-21 22:11:05', '2017-05-21 22:11:05'),
(16, '59222d8d7bba6-product.png', 5, '2017-05-21 22:15:09', '2017-05-21 22:15:09'),
(33, '592f531d276bc-59222f848d552-so-2053.jpg', 6, '2017-05-31 21:34:53', '2017-05-31 21:34:53'),
(21, '59222fe6dc192-BM7251-53L_fullsize_1419877646.jpg', 7, '2017-05-21 22:25:10', '2017-05-21 22:25:10'),
(22, '59222fe7230b0-citizen-men_s-bracelet-blue-dial-watch-bm7251-53l_2.jpg', 7, '2017-05-21 22:25:11', '2017-05-21 22:25:11'),
(30, '5923874a8a8f6-s-l225.jpg', 13, '2017-05-22 22:50:18', '2017-05-22 22:50:18'),
(31, '5924db5a54b68-177.jpg', 14, '2017-05-23 23:01:14', '2017-05-23 23:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(11) NOT NULL DEFAULT '0',
  `reply_id` int(11) NOT NULL DEFAULT '0',
  `likes_count` int(11) NOT NULL DEFAULT '0',
  `dislikes_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `comment_id`, `reply_id`, `likes_count`, `dislikes_count`) VALUES
(1, 1, 0, 27, 4),
(2, 3, 0, 7, 2),
(3, 4, 0, 6, 2),
(4, 5, 0, 3, 2),
(5, 6, 0, 2, 0),
(6, 7, 0, 1, 0),
(7, 24, 0, 0, 0),
(8, 66, 0, 6, 1),
(9, 68, 0, 6, 2),
(13, 72, 0, 1, 1),
(14, 0, 2, 3, 2),
(15, 0, 3, 1, 1),
(16, 0, 4, 2, 0),
(17, 0, 5, 1, 1),
(18, 0, 6, 0, 0),
(19, 0, 7, 0, 0),
(20, 0, 8, 0, 0),
(21, 0, 9, 0, 0),
(22, 0, 10, 0, 0),
(24, 0, 11, 4, 0),
(25, 0, 12, 0, 0),
(26, 0, 13, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2017_05_17_201413_create_roles_table', 1),
(30, '2017_05_17_202201_create_addresses_table', 1),
(31, '2017_05_17_203255_create_customers_table', 1),
(32, '2017_05_17_204034_create_products_table', 1),
(33, '2017_05_17_205136_create_images_table', 1),
(34, '2017_05_17_210139_create_brands_table', 1),
(35, '2017_05_17_210943_create_genders_table', 1),
(36, '2017_05_17_213103_create_sizes_table', 1),
(37, '2017_05_17_213404_create_orders_table', 1),
(38, '2017_05_17_221843_create_order_product_table', 1),
(39, '2017_05_17_230130_add_old_price_to_products_table', 1),
(40, '2017_05_18_125647_add_address_to_users_table', 2),
(41, '2017_05_18_204123_add_address_to_customers_table', 3),
(42, '2017_05_18_205137_add_address_to_orders_table', 4),
(43, '2017_05_20_213117_delete_size_id_from_products_table', 5),
(44, '2017_06_02_000034_add_discount_to_products_table', 6),
(45, '2017_06_02_005217_add_slug_to_products_table', 7),
(46, '2017_06_05_193609_add_slug_to_brands_table', 8),
(47, '2017_06_05_200533_create_comments_table', 9),
(48, '2017_06_05_212519_add_comment_text_to_comments_table', 10),
(49, '2017_06_26_224522_add_collums_to_orders_table', 11),
(50, '2017_06_27_225340_drop_colums_to_order-product_table', 12),
(51, '2017_07_10_102725_drop_user_id_to_orders_table', 13),
(52, '2017_07_10_222219_add_paid_to_orders_table', 14),
(53, '2018_04_22_180224_create_likes_table', 15),
(54, '2018_04_24_222835_create_replies_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `order-product`
--

CREATE TABLE `order-product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order-product`
--

INSERT INTO `order-product` (`id`, `order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 6, 7, '2017-06-27 21:06:02', '2017-06-27 21:06:02'),
(2, 7, 13, '2017-06-27 21:15:30', '2017-06-27 21:15:30'),
(3, 8, 8, '2017-06-27 21:15:30', '2017-06-27 21:15:30'),
(4, 9, 3, '2017-06-27 21:33:53', '2017-06-27 21:33:53'),
(5, 10, 8, '2017-07-03 18:17:14', '2017-07-03 18:17:14'),
(35, 40, 14, '2017-07-26 16:14:17', '2017-07-26 16:14:17'),
(34, 39, 7, '2017-07-13 22:35:17', '2017-07-13 22:35:17'),
(33, 38, 13, '2017-07-13 22:35:17', '2017-07-13 22:35:17'),
(32, 37, 7, '2017-07-12 21:37:18', '2017-07-12 21:37:18'),
(31, 36, 7, '2017-07-11 22:18:02', '2017-07-11 22:18:02'),
(30, 35, 3, '2017-07-11 22:18:02', '2017-07-11 22:18:02'),
(25, 30, 6, '2017-07-10 20:33:52', '2017-07-10 20:33:52'),
(26, 31, 13, '2017-07-10 20:35:11', '2017-07-10 20:35:11'),
(27, 32, 6, '2017-07-10 20:40:06', '2017-07-10 20:40:06'),
(28, 33, 4, '2017-07-10 20:40:06', '2017-07-10 20:40:06'),
(29, 34, 14, '2017-07-10 20:41:27', '2017-07-10 20:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `was_paid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total`, `customer_id`, `created_at`, `updated_at`, `qty`, `size`, `was_paid`) VALUES
(8, 839.97, 1, '2017-06-27 21:15:30', '2017-06-27 21:15:30', 3, 'medium', 0),
(6, 749.97, 1, '2017-06-27 21:06:02', '2017-06-27 21:06:02', 3, 'medium', 0),
(7, 719.98, 1, '2017-06-27 21:15:30', '2017-06-27 21:15:30', 2, 'large', 0),
(9, 199.98, 1, '2017-06-27 21:33:53', '2017-06-27 21:33:53', 2, 'large', 0),
(10, 839.97, 1, '2017-07-03 18:17:14', '2017-07-03 18:17:14', 3, 'small', 0),
(40, 149.99, 5, '2017-07-26 16:14:17', '2017-07-26 16:14:17', 1, 'small', 0),
(39, 249.99, 5, '2017-07-13 22:35:17', '2017-07-13 22:35:17', 1, 'small', 0),
(38, 359.99, 5, '2017-07-13 22:35:16', '2017-07-13 22:35:16', 1, 'small', 0),
(37, 499.98, 5, '2017-07-12 21:37:18', '2017-07-12 21:37:18', 2, 'medium', 0),
(36, 499.98, 4, '2017-07-11 22:18:02', '2017-07-11 22:18:02', 2, 'medium', 1),
(35, 99.99, 4, '2017-07-11 22:18:02', '2017-07-11 22:18:02', 1, 'small', 1),
(34, 149.99, 1, '2017-07-10 20:41:27', '2017-07-11 22:15:47', 1, 'small', 1),
(33, 329.97, 2, '2017-07-10 20:40:06', '2017-07-10 20:40:06', 3, 'large', 1),
(30, 69.99, 2, '2017-07-10 20:33:52', '2017-07-10 20:33:52', 1, 'small', 0),
(31, 719.98, 2, '2017-07-10 20:35:11', '2017-07-10 20:35:11', 2, 'small', 0),
(32, 69.99, 2, '2017-07-10 20:40:06', '2017-07-10 20:40:06', 1, 'medium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `sale` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `old_price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model`, `brand_id`, `gender_id`, `description`, `price`, `sale`, `created_at`, `updated_at`, `old_price`, `discount`, `slug`) VALUES
(1, 'G-Shock Mudmaster', 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum mollis neque quis nulla dictum bibendum. Morbi mollis, leo consequat egestas finibus, dolor ligula iaculis ex, interdum sollicitudin tellus lorem et ipsum. Integer magna diam, luctus sit amet velit eget, efficitur pharetra justo. Sed a ante mauris. Nullam facilisis eros et viverra rutrum. Pellentesque ac feugiat augue. Sed tincidunt eros neque, id hendrerit turpis faucibus quis. Nullam tincidunt faucibus posuere. Vivamus tempor leo ut felis dictum, sit amet bibendum arcu efficitur. Praesent vitae viverra ipsum.', 120.00, 0, '2017-05-20 19:37:50', '2017-06-01 23:03:47', 140.00, 5.00, 'g-shock-mudmaster'),
(2, 'gw 5000 1jf', 1, 1, 'Donec maximus dui enim. Phasellus eget gravida lorem. Aliquam suscipit ultricies nunc, sed porttitor diam sagittis ut. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In felis ex, ultrices ac dui molestie, porta consectetur justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lobortis tristique lobortis. Donec metus dui, ultrices vitae pharetra vel, vulputate eu dolor. Curabitur pulvinar bibendum felis non hendrerit. In tincidunt lacinia sem, non luctus metus. Suspendisse ut lacinia augue. Sed sagittis ante quis magna suscipit vestibulum.', 65.00, 0, '2017-05-20 19:41:22', '2017-06-01 23:03:29', 80.00, 5.00, 'gw-5000-1jf'),
(3, 'f20205 3', 4, 2, 'Sed et tellus enim. Aenean varius porttitor enim, ac venenatis augue molestie sed. Praesent dignissim nisi mauris, ut molestie arcu tincidunt non. Vestibulum volutpat imperdiet tempus. Sed sed dolor eros. In maximus metus nec turpis hendrerit consequat. Integer euismod interdum leo in placerat. Duis at fermentum nibh, quis laoreet ligula. Nulla lectus ipsum, maximus eget orci at, dignissim sagittis erat. Ut ac tristique ligula, tempor commodo turpis. Praesent lacus dolor, euismod sit amet est ut, tempor lacinia tellus. Nullam eu dolor tempus, auctor dolor nec, ullamcorper urna. Duis libero eros, pellentesque nec dolor elementum, accumsan sollicitudin risus.', 99.99, 1, '2017-05-20 20:57:14', '2017-06-01 23:03:12', 145.99, 20.00, 'f20205-3'),
(4, 'LTP 1358D 2AVDF', 1, 2, 'Vivamus nisi arcu, maximus nec turpis id, pharetra egestas nulla. Nulla facilisi. Proin rhoncus ultricies consectetur. Suspendisse ut dapibus sapien. Donec varius, orci finibus sollicitudin fringilla, nunc tortor pellentesque tortor, at mattis nibh ipsum in mi. Quisque auctor sem dignissim, scelerisque leo ac, euismod eros. Ut quis vestibulum nisi, id dictum risus.', 109.99, 0, '2017-05-20 21:00:30', '2017-06-01 23:02:49', 120.00, 3.00, 'ltp-1358d-2avdf'),
(5, 'SO-3107-PQ', 9, 3, 'Etiam vestibulum lorem non ligula porttitor aliquet. Suspendisse dignissim lorem nulla, vitae vulputate elit pharetra nec. Ut tempus felis sem, eget congue est laoreet ut. Aenean sit amet purus sit amet sem consequat venenatis sit amet eget lorem. Fusce nec nulla non purus pulvinar ornare. Etiam interdum nulla ut arcu ultricies tempus. Sed ut vehicula ex. Quisque dictum et mi eu sodales. Suspendisse eros sapien, egestas sed turpis et, iaculis consequat mauris. Proin vulputate augue in vestibulum consequat. Mauris venenatis turpis neque, at dignissim diam blandit a.', 49.99, 1, '2017-05-20 21:02:48', '2017-06-07 17:54:12', 79.99, 25.00, 'so-3107-pq'),
(6, 'SO-3131-LQ', 9, 3, 'Curae; Vestibulum dignissim nunc sed libero interdum mattis. Integer euismod a nisi ut iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras ultricies lacinia justo eu aliquam. Ut sollicitudin tincidunt velit, ut sollicitudin libero imperdiet vel. Nam purus tortor, faucibus eget elementum sit amet, placerat ut lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed rutrum mollis nulla id ullamcorper. Nam vestibulum eros a lectus posuere, vitae convallis nulla pharetra. In semper volutpat quam sit amet tincidunt. Integer dictum ipsum fringilla velit malesuada, sit amet placerat augue imperdiet. Phasellus eget egestas enim. Fusce erat mauris, viverra id metus eget, commodo sagittis est.', 69.99, 1, '2017-05-20 21:05:50', '2017-06-02 21:53:24', 89.99, 10.00, 'so-3131-lq'),
(7, 'BM7251 53L', 2, 1, 'Nunc porta velit eu sapien egestas porta. Integer dictum cursus varius. Curabitur ullamcorper, metus id faucibus vestibulum, lorem nisl condimentum arcu, ac hendrerit libero leo luctus sem. Integer ac risus at enim pellentesque tempus. In efficitur ex a vehicula aliquam. Aliquam aliquam tincidunt elit a viverra. Aliquam vestibulum pharetra auctor. Mauris facilisis dui a ex porta, eget imperdiet diam interdum. Curabitur quis ante in risus venenatis luctus. Morbi tincidunt nec sapien aliquam sagittis. Vestibulum suscipit sapien eu mattis sagittis.', 249.99, 1, '2017-05-20 21:07:59', '2017-06-01 23:01:59', 299.00, 20.00, 'bm7251-53l'),
(8, 'AR1863', 5, 1, 'Integer tempus neque at placerat mollis. Aenean tellus nunc, efficitur non purus in, porta sollicitudin eros. In maximus tellus scelerisque mollis vehicula. Suspendisse potenti. Aliquam vitae blandit turpis, ut sollicitudin nulla. Morbi urna diam, eleifend eget porta sed, tempor eu tortor. Vestibulum tincidunt lacus eu dui tempor, vitae mollis dui interdum. In semper, orci in commodo dapibus, mi magna tincidunt diam, quis tristique tortor urna non neque. Nunc tristique nisl eget nisi rutrum, sit amet vehicula ex scelerisque. Pellentesque ut eros interdum, commodo quam sit amet, auctor dolor. In nulla massa, tincidunt in dui vitae, pretium bibendum nisi. Sed vel nibh in quam malesuada sagittis. Donec fringilla tempor velit quis varius. Fusce a sapien ullamcorper, lacinia nulla vitae, varius lectus. Aenean dapibus erat quis feugiat facilisisaa.', 279.99, 1, '2017-05-20 21:12:12', '2017-06-07 19:01:42', 329.99, 12.00, 'ar1863'),
(12, 't0332101105300', 7, 2, 'Nulla a mi at quam semper molestie non rutrum quam. Mauris pellentesque, arcu vel bibendum pellentesque, lectus urna ullamcorper elit, eu viverra arcu lectus eu felis. Nam ut purus vel nisi rhoncus vestibulum. Donec rhoncus justo dolor, vitae pretium augue rutrum ut. Fusce varius ligula sed faucibus congue. Praesent lacinia faucibus vulputate. Quisque purus urna, viverra quis luctus quis, venenatis vitae mi.', 199.99, 1, '2017-05-22 22:45:40', '2017-06-01 23:01:23', 250.00, 30.00, 't0332101105300'),
(13, 'GRAND PRIX 1513474', 6, 1, 'In semper sem eget turpis cursus egestas. Proin semper dapibus urna sit amet lobortis. Aliquam erat volutpat. Suspendisse eget nisi tempor, dictum enim in, dictum massa. Quisque posuere tellus augue. Curabitur pulvinar eget risus et mollis. Vivamus imperdiet gravida lectus vitae ornare. Vivamus non tempus libero. Pellentesque eget mauris nec neque ullamcorper blandit a at lorem. Curabitur vulputate felis vitae enim lobortis dignissim. Duis sagittis felis id dui laoreet, vitae feugiat arcu dignissim. Ut mollis turpis vel massa auctor, quis interdum massa fringilla. Donec sit amet ullamcorper enim, sit amet feugiat felis. Aenean scelerisque orci a ligula blandit hendrerit. Vestibulum interdum dictum nunc non vestibulum.', 359.99, 1, '2017-05-22 22:47:59', '2017-07-27 17:42:40', 430.00, 5.00, 'grand-prix-1513474'),
(14, 'ELEGANT', 2, 1, 'Morbi at neque malesuada, venenatis enim id, tincidunt quam. Proin rutrum nunc ut mauris rutrum, et viverra nisl tempus. Phasellus non porttitor sapien. Sed bibendum lobortis purus id tempus. Praesent tristique aliquet condimentum. Cras consequat mollis dui, facilisis maximus neque. Quisque dictum, mi ac vulputate sollicitudin, sem ex facilisis enim, at viverra ligula nulla id turpis. Integer velit massa, malesuada a volutpat vel, accumsan at sapien. Etiam in lacinia diam. Nam arcu erat, posuere id gravida ac, hendrerit ut risus. Integer ipsum urna, laoreet non sapien vel, venenatis rhoncus leo. Donec facilisis urna at arcu rhoncus gravida.', 149.99, 1, '2017-05-23 23:01:13', '2017-06-01 23:00:50', 220.00, 33.00, 'elegant');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `reply_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `username`, `email`, `product_id`, `comment_id`, `reply_text`, `created_at`, `updated_at`) VALUES
(11, 'werwe', 'ssddf@sd.ew', 6, 1, 'we ew', '2018-04-27 22:05:48', '2018-04-27 22:05:48'),
(2, 'asdfsd', 'ssd@sd.sd', 6, 1, 'saaeewwe', '2018-04-24 21:58:09', '2018-04-24 21:58:09'),
(3, 'dfssdd', 'asssdf@sd.sa', 6, 1, 'assddssdf', '2018-04-24 22:01:38', '2018-04-24 22:01:38'),
(4, 'sdfwe', 'sdf@dssl.ww', 6, 1, 'sadfwweew', '2018-04-24 22:08:36', '2018-04-24 22:08:36'),
(5, 'sdfwe', 'sdf@dssl.ww', 6, 1, 'sadfwweew', '2018-04-24 22:08:36', '2018-04-24 22:08:36'),
(6, '234234', 'asdf@ss.we', 6, 1, '234523', '2018-04-24 22:09:20', '2018-04-24 22:09:20'),
(7, 'sdwwa', 'aaa@aa.ss', 6, 1, 'swewe', '2018-04-24 22:11:25', '2018-04-24 22:11:25'),
(8, 'wer1221', 'sdf@ds.sd', 6, 1, 'fsd sdf asd', '2018-04-25 22:29:23', '2018-04-25 22:29:23'),
(9, '222222', 'sdf@ds.sd', 6, 5, '122121', '2018-04-25 22:36:37', '2018-04-25 22:36:37'),
(10, 'woeee', 'sd@sd.aw', 8, 68, 'qw qwdasd', '2018-04-25 22:37:19', '2018-04-25 22:37:19'),
(12, 'rwewer', 'sdsd@sdf.sd', 8, 66, 'eeeeeeeee d', '2018-04-27 22:20:38', '2018-04-27 22:20:38'),
(13, 'Milan Tarot', 'mikitarot@m.se', 6, 3, 'Agree!', '2018-04-29 16:53:21', '2018-04-29 16:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'subscriber', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `role_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `state`, `city`, `address`, `postal_code`) VALUES
(1, 'admin', 'adminović', '123456', 1, 'admin@a.com', '$2y$10$UEqsJR3s5bkAbv7yWUuVqu3Tqni1lwOz4B2oqz1SXn.22Dl3St2he', 'BA5sswUAs4DUOYDtXDzlNzEktK6C0k0hNPlbfOTA5zu0RubpvMovzmFNlygD', NULL, NULL, '', '', '', ''),
(2, 'user1', 'user1LastName', '111222', 2, 'user1@u.com', '$2y$10$DrZhe8l.iLYjDLeLuTXf3..6OZt4IoXL1Q1jc1i0mhKqfF8AoOhqu', 'DvWkb7IyJm9Pjwdy4KnuES9YHGhEE0ytw9SxINzN2nEEUfRAQQ7AxvPfggw8', NULL, NULL, '', '', '', ''),
(3, 'test', 'test', '56562323', 2, 'test@t.com', '$2y$10$5Co1H4utXpS1YjAZlvI4le1M/heXrdZYfhXeYmUvsVh.U/wH59pNu', 'uzvMB0YohRbNEtSriOgduIycBpLsMGgsnAx3gvD8krLr4lfDD9YDPmbdndwh', '2017-05-18 11:23:15', '2017-05-18 11:23:15', 'Spain', 'Barcelona', 'Camp Nou 2', '140000'),
(4, 'test2', 'test2', '2346', 2, 'test2@t.com', '$2y$10$rCI6QgHCCBSTnDxy1bd8b.hJYeqdV5nc8b.fRWhahNWSmb2nkJney', 'jmLT2F2u1QdKu1oUxxRgq2A5ssOHEBs8hBRiN7TXJYGtzQ5UKKCtBhyIonNy', '2017-05-18 18:54:49', '2017-05-18 18:54:49', 'Italy', 'Milano', 'San Siro 12', '12000'),
(5, 'test3', 'test3', '4142', 2, 'test@t.com3', '$2y$10$JmoGrR.TNbHY7D5HVxV0BenmaJCxj2dx48eQbkNeDta16NO6EPtxW', 'K3ghtYqgk9HdoIBARaTvS0LTv2YvZFn9c0dQbf0FWlASmNF3NoIxARla1484', '2017-05-18 19:01:58', '2017-05-18 19:01:58', 'Spain', 'Madrid', 'Visente Calderon 14', '45000'),
(6, 'test4', 'test4', '111222', 2, 'test4@t.com', '$2y$10$JiM99fhHlIQqUrdXAusN0Oc/lDyKfe3WI.sP.YLEeQdgOBNPuLlfu', 'PCTKBvIKGu1sQe3VfWgXkOEq4B02mPyIcT1SciFZtIMCtnniMRRHm6FmPAwx', '2017-07-09 09:01:50', '2017-07-09 09:01:50', 'test', 'test', 'test', '11111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order-product`
--
ALTER TABLE `order-product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_model_unique` (`model`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_product_id_foreign` (`product_id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `order-product`
--
ALTER TABLE `order-product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
