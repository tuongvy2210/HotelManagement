-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 07:01 AM
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
-- Database: `laravel_quanlykhachsan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `booking_at` datetime NOT NULL,
  `checkin_at` datetime NOT NULL,
  `number_of_adults` int(11) NOT NULL DEFAULT 0,
  `number_of_children` int(11) NOT NULL DEFAULT 0,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `room_type_id`, `booking_at`, `checkin_at`, `number_of_adults`, `number_of_children`, `fullname`, `phone`, `email`, `note`, `is_cancelled`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-20 21:36:33', '2023-12-20 21:36:38', 2, 1, 'vy', '0903254331', NULL, NULL, 0, '2023-12-20 14:37:03', '2023-12-20 14:50:12'),
(2, 1, 1, '2023-12-20 21:36:33', '2023-12-20 21:36:38', 2, 1, 'vy', '0903254331', NULL, NULL, 1, '2023-12-20 14:37:03', '2023-12-21 17:18:37'),
(3, 1, 2, '2023-12-22 00:37:02', '2023-12-19 06:07:00', 0, 0, 'Bùi Thị Tường Vy 123', '0987654321', NULL, NULL, 0, '2023-12-21 17:37:02', '2023-12-21 17:37:02'),
(4, 1, 2, '2023-12-22 07:08:41', '2024-01-04 06:42:00', 0, 0, 'Bùi Thị Tường Vy 123', '0987654321', NULL, NULL, 0, '2023-12-22 00:08:41', '2023-12-22 00:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Thị Tường Vy 123', '0987654321', NULL, '2023-12-17 14:32:32', '2023-12-21 17:35:07'),
(2, 'ABCDEF', '0912345678', NULL, '2023-12-17 14:35:33', '2023-12-17 14:35:34');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_05_27_052524_create_customers_table', 1),
(12, '2023_05_27_052525_create_services_table', 1),
(13, '2023_05_27_052526_create_facilities_table', 1),
(14, '2023_05_27_052639_create_room_types_table', 1),
(15, '2023_05_27_052640_create_room_statuses_table', 1),
(16, '2023_05_27_054155_create_rooms_table', 1),
(17, '2023_05_27_054237_create_bookings_table', 1),
(18, '2023_05_27_054307_create_orders_table', 1),
(19, '2023_06_06_191138_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `checkin_at` datetime DEFAULT NULL,
  `checkout_at` datetime DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `booking_id`, `room_id`, `customer_id`, `fullname`, `phone`, `email`, `checkin_at`, `checkout_at`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 'vy', '0903254331', NULL, '2023-12-21 14:45:09', '2023-12-21 23:45:42', 600000, 0, '2023-12-21 15:11:23', '2023-12-21 16:25:41'),
(3, 3, 7, 1, 'Bùi Thị Tường Vy 123', '0987654321', NULL, NULL, NULL, 1200000, 0, '2023-12-21 17:37:53', '2023-12-21 17:37:53'),
(4, NULL, 2, 1, 'Bùi Thị Tường Vy 123', '0987654321', NULL, '2023-12-22 01:14:10', NULL, 600000, 0, '2023-12-21 18:14:10', '2023-12-21 18:14:10'),
(5, 4, 8, 1, 'Bùi Thị Tường Vy 123', '0987654321', NULL, '2023-12-22 07:10:13', '2023-12-22 07:10:52', 1200000, 0, '2023-12-22 00:09:42', '2023-12-22 00:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `service_id`, `price`, `discount`, `quantity`) VALUES
(1, 2, 1, 20000, 5, 5),
(2, 2, 2, 40000, 5, 5),
(3, 2, 3, 25000, 0, 8),
(4, 4, 2, 40000, 5, 5),
(5, 5, 2, 40000, 5, 7);

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `room_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `order_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type_id`, `room_status_id`, `order_id`, `name`, `is_shown`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '101', 0, NULL, '2023-12-21 16:25:41'),
(2, 1, 3, 4, '102', 1, NULL, '2023-12-21 18:14:10'),
(3, 1, 1, 0, '103', 1, NULL, NULL),
(4, 1, 1, 0, '104', 1, NULL, NULL),
(5, 1, 1, 0, '105', 1, NULL, NULL),
(6, 2, 1, 0, '201', 1, NULL, NULL),
(7, 2, 2, 3, '202', 1, NULL, '2023-12-21 17:37:53'),
(8, 2, 1, NULL, '203', 1, NULL, '2023-12-22 00:10:52'),
(9, 2, 1, 0, '204', 1, NULL, NULL),
(10, 2, 1, 0, '205', 1, NULL, NULL),
(11, 3, 1, 0, '301', 1, NULL, NULL),
(12, 3, 1, 0, '302', 1, NULL, NULL),
(13, 3, 1, 0, '303', 1, NULL, NULL),
(14, 3, 1, 0, '304', 1, NULL, NULL),
(15, 3, 1, 0, '305', 1, NULL, NULL),
(16, 4, 1, 0, '401', 1, NULL, NULL),
(17, 4, 1, 0, '402', 1, NULL, NULL),
(18, 4, 1, 0, '403', 1, NULL, NULL),
(19, 4, 1, 0, '404', 1, NULL, NULL),
(20, 4, 1, 0, '405', 1, NULL, NULL),
(21, 5, 1, 0, '501', 1, NULL, NULL),
(22, 5, 1, 0, '502', 1, NULL, NULL),
(23, 5, 1, 0, '503', 1, NULL, NULL),
(24, 5, 1, 0, '504', 1, NULL, NULL),
(25, 5, 1, 0, '505', 1, NULL, '2023-12-22 00:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `room_statuses`
--

CREATE TABLE `room_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_statuses`
--

INSERT INTO `room_statuses` (`id`, `name`, `color`, `is_shown`) VALUES
(1, 'Trống', '#13deb9', 1),
(2, 'Đã đặt', '#ffae1f', 1),
(3, 'Đang thuê', '#5d87ff', 1),
(4, 'Đang dọn dẹp', '#fa896b', 1),
(5, 'Đang sửa chữa', '#5a6a85', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `image_url` text NOT NULL DEFAULT '[]',
  `description` longtext DEFAULT NULL,
  `number_of_bed` int(11) NOT NULL DEFAULT 1,
  `number_of_bathroom` int(11) NOT NULL DEFAULT 1,
  `utilities` varchar(255) NOT NULL DEFAULT '[]',
  `is_shown` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `price`, `discount`, `image_url`, `description`, `number_of_bed`, `number_of_bathroom`, `utilities`, `is_shown`, `created_at`, `updated_at`) VALUES
(1, 'Phòng Deluxe', 600000, 0, '[\"upload\\/31uMSmGe7SSzc1pJeHEvOGDdbRMSeUwEGO7ch7Ge.jpg\",\"upload\\/0AwFikZkgojwBnpMFq2KJkPygPD8BwwqZNUmN6Ik.jpg\",\"upload\\/3X8tl7xqTPnjTu8RQ8ZVcBl0IZqncsooSHLzYFLR.jpg\",\"upload\\/TaOVxzWVIRTqwJivBXCbYrKsMbd9VoeuRua356DM.jpg\",\"upload\\/mIomJrtVJlEeNq1FHHGusnKQH7lcz5gy1eRz2AFT.jpg\"]', '<p><span style=\"color: rgb(33, 37, 41); font-family: Helvetica, Arial, sans-serif; text-align: justify;\">Loại phòng Deluxe tại khách sạn là sự kết hợp hiện đại và tinh tế với ưu tiên trong tiện nghi và sự thoải mái dành cho khách hàng. Ngoài sự lựa chọn giữa hai giường đơn hoặc giường đôi lớn, mỗi phòng Deluxe mang lại một sự khác biệt riêng và tất cả được thiết kế cho các khách hàng tìm kiếm sự nghỉ ngơi đồng hành cùng quang cảnh tuyệt đẹp của Sài Gòn.&nbsp;</span><br></p>', 1, 1, '[\"3\",\"4\"]', 1, '2023-10-21 01:12:59', '2023-12-21 23:33:06'),
(2, 'Phòng Premier River View', 1200000, 0, '[\"upload\\/HQUJ5ieGbVA1BMj4Uiqu445RVhyhDozB61h3YbPc.jpg\",\"upload\\/pbRBI5crDLlGHFdTjpQpr4Cu7XjZdDm7ZDYVu6Un.jpg\",\"upload\\/50FUvwVs2ri7SqJ2jvBGTuvFJUrkvZrgMozWqiNc.jpg\",\"upload\\/TAXONE9SQCYpYdPtG99jwFU90e3h1xMlW5Hy9ffJ.jpg\",\"upload\\/oz0E81pUkTuYYrUxKKHbedgdFlk5Hwv7cKdJqLhC.jpg\"]', '<p><span style=\"color: rgb(33, 37, 41); font-family: Helvetica, Arial, sans-serif; text-align: justify;\">Với tất cả các tính năng trong phòng nghỉ được tối ưu hoá để khách hàng có thể dễ dàng sử dụng trong chuyến đi của mình, loại phòng Premier Rỉver View được thiết kế với sự chú ý đến từng chi tiết nhỏ, nhằm tạo ra không gian nghỉ ngơi thoải mái cho cả khách doanh nhân và khách du lịch. Với khung cửa sổ lớn chạy dọc từ trần đến sàn nhà, khách hàng lưu trú tại loại phòng này có thể dễ dàng nhìn ngắm dòng sông Sài Gòn – nơi mà mỗi thời điểm khác nhau trong ngày lại mang đến một vẻ đẹp riêng biệt.</span><br></p>', 1, 1, '[\"3\",\"4\",\"5\"]', 1, '2023-10-30 15:05:20', '2023-12-21 23:32:41'),
(3, 'Phòng Executive', 1500000, 0, '[\"upload\\/Tg7dzBCuQmhQSBVoup2Yn0O4sIZsm439bzoQONN9.jpg\",\"upload\\/vATKZCMIcJiWh6H8IIhAZEjIyr06ANJlf9hXvnWa.jpg\",\"upload\\/oSS8CeZgOrQ7erC8UdVNqQPj9JbbHIFR2uB5KCom.jpg\",\"upload\\/xy41SF2B3Q1dSNBJdSnTWQoLaO1oLV6GGZ7jekEV.jpg\",\"upload\\/B9KeGjL897pO1yDDdUZP473AO1PJwgeWrvevMJuk.jpg\"]', '<p><span style=\"color: rgb(33, 37, 41); font-family: Helvetica, Arial, sans-serif; text-align: justify;\">Phòng Executive hội tụ đủ những tiện nghi cần thiết để khách hàng có thể dễ dàng nghỉ ngơi trong khi lưu trú ở Sài Gòn. Với tầm nhìn cận cảnh thành phố sôi động, loại phòng này còn mang lại không gian nghỉ ngơi yên tĩnh và sự thoải mái tối ưu. Được thiết kế nhằm mang lại một ngôi nhà thứ hai cho khách, loại phòng này còn đi kèm với đặc quyền sử dụng&nbsp;</span><a href=\"https://www.libertycentralsaigonriverside.com/en/facilities/#home\" style=\"color: rgb(0, 123, 255); text-decoration: none; background-color: rgb(255, 255, 255); -webkit-tap-highlight-color: rgba(255, 255, 255, 0); font-weight: 500; font-family: Helvetica, Arial, sans-serif; text-align: justify;\">Executive Lounge</a><span style=\"color: rgb(33, 37, 41); font-family: Helvetica, Arial, sans-serif; text-align: justify;\">&nbsp;cũng như các dịch vụ và lợi ích đi kèm.</span><br></p>', 1, 1, '[\"3\"]', 1, '2023-10-30 15:05:35', '2023-12-21 23:28:05'),
(4, 'Phòng Liberty Central Suite', 2100000, 0, '[\"upload\\/e6LJb5Wm2jLjEMBHhJf9nJIFHcEcpojJ3RkRhHjQ.jpg\",\"upload\\/Q8QRxMHfSX3lV3FeQZS1ulhkL0T37ZTGp9biyzfq.jpg\",\"upload\\/UN80vQ7Se4hi78kS3qyQQFEGOqg2wqVs7oYwwbVw.jpg\",\"upload\\/lfCKrF7QeqZjUiEMrgJyuo4ddDQjGEtQyzSmThMd.jpg\",\"upload\\/SPFJUhNM9ownIuoHY57upfpSU4QajSJPohAVKHtH.jpg\"]', '<p><span style=\"color: rgb(33, 37, 41); font-family: Helvetica, Arial, sans-serif; text-align: justify;\">Với mục đích giúp khách hàng có thể tách biệt các hoạt động trong ngày và thời gian nghỉ ngơi của mình, loại phòng Liberty Central Suite được thiết kế một cách rộng rãi và hợp lý để có thể là nơi dừng chân lý tưởng cho cả khách doanh nhân và khách du lịch. Để tạo sự thuận tiện cho khách hàng, tất cả các phòng Liberty Central Suite đều có không gian sinh hoạt riêng biệt và phòng ngủ rộng rãi – cho phép khách hàng dễ dàng lựa chọn thực hiện những gì mình muốn ngay tại không gian riêng. Để giúp khách hàng tận dụng tối đa kỳ nghỉ của mình, Liberty Central Suite còn mang đến đặc quyền sử dụng&nbsp;</span><a href=\"http://https//www.libertycentralsaigonriverside.com/en/facilities/#home\" style=\"color: rgb(0, 123, 255); text-decoration: none; background-color: rgb(255, 255, 255); -webkit-tap-highlight-color: rgba(255, 255, 255, 0); font-weight: 500; font-family: Helvetica, Arial, sans-serif; text-align: justify;\">Executive Lounge</a><span style=\"color: rgb(33, 37, 41); font-family: Helvetica, Arial, sans-serif; text-align: justify;\">&nbsp;cùng những dịch vụ và lợi ích đi kèm.&nbsp; &nbsp;</span><br></p>', 1, 1, '[\"3\",\"5\"]', 0, '2023-10-30 15:17:35', '2023-12-21 23:35:53'),
(5, 'Phòng Signature River View', 900000, 0, '[\"upload\\/pIAeCTgXOkChW1JoQwb84gTQNOTjrHmBgRBSQcJj.jpg\",\"upload\\/ufL4QAz56IrzIwHS3eMifsg1bc7Vs4z4cYHNqaoz.jpg\",\"upload\\/Re6ALSOCvMK4PjOhQDzGqVjpwjXOpWiI3Yh5YCYZ.jpg\",\"upload\\/9cSN5Hy61lNr8TmEhH7x1iDOPxARw5IFcuBJkDhU.jpg\",\"upload\\/lsSoh7PQXWouNt3ROt2YeIxS8mj24981wnm5dqka.jpg\"]', '<div style=\"text-align: justify;\">Nổi trội trong phong cách và diện tích, loại phòng Signature River View sẽ là một sự lựa chọn độc đáo cho kỳ nghỉ của bạn tại Sài Gòn. Ngoài việc được đồng hành cùng giường đôi cỡ lớn và lối trang trí đầy phong cách, loại phòng này còn mang đến tầm nhìn mê hoặc lòng người ra toàn cảnh sông Sài Gòn. Ngoài ra, phòng Signature River View còn đi kèm với đặc quyền sử dụng <a href=\"https://www.libertycentralsaigonriverside.com/en/facilities/#home\" style=\"color: rgb(0, 123, 255); text-decoration: none; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); font-weight: 500;\">Executive Lounge</a> cũng như các dịch vụ và lợi ích đi kèm. </div>', 5, 2, '[\"3\",\"4\",\"5\"]', 1, '2023-10-30 15:17:49', '2023-12-22 00:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `discount`, `is_shown`, `created_at`, `updated_at`) VALUES
(1, 'Sting', 20000, 5, 1, '2023-12-20 17:30:07', '2023-12-20 17:31:14'),
(2, 'C2', 40000, 5, 1, '2023-12-20 17:30:07', '2023-12-20 17:31:14'),
(3, '7UP', 25000, 0, 1, '2023-12-21 15:24:19', '2023-12-21 15:24:20'),
(4, 'Rượu champaign', 5000000, 1, 1, '2023-12-22 00:04:57', '2023-12-22 00:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `customer_id`, `username`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', '$2y$10$mlV95LvfWW8C7xskYW054.oFxuIIH5D0g01l9HGV.mdqspARLEKR2', 1, 'XSctKHoklUj7Qsvms1wMwo0SH5G2MoNWIgDBgJRwcOetPfG0GLhiVnCf7e7a', '2023-10-15 15:11:51', '2023-10-15 15:11:51'),
(2, 1, 'vybtt', '$2y$10$LEz8Qd.uLMxAodz200QxeOV3KYpZqd.utPswvqMwlcug7gVEyzYeW', 1, NULL, '2023-11-03 16:01:55', '2023-12-21 17:36:17'),
(3, 2, 'abcdef', '$2y$10$v4LJfhXr9kqadBFT0tlouOsCDAla1fOxpGaEQ25RW55p50t6.lmra', 1, NULL, '2023-11-03 16:04:20', '2023-11-03 16:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `icon`, `is_shown`) VALUES
(3, 'TV', 'fas fa-home', 1),
(4, 'Máy sấy', '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"16\" width=\"20\" viewBox=\"0 0 640 512\"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d=\"M64 64V352', 1),
(5, 'Bàn ủi', '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"16\" width=\"20\" viewBox=\"0 0 640 512\"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d=\"M64 64V352', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`room_type_id`),
  ADD KEY `booking_order` (`room_type_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`,`room_id`,`customer_id`),
  ADD KEY `or2` (`customer_id`),
  ADD KEY `or3` (`room_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`service_id`),
  ADD KEY `od2` (`service_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_type_id` (`room_type_id`,`room_status_id`,`order_id`),
  ADD KEY `r2` (`room_status_id`);

--
-- Indexes for table `room_statuses`
--
ALTER TABLE `room_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room_statuses`
--
ALTER TABLE `room_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `booking_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `booking_order` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `or2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `or3` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `or_boo` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `od1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `od2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `r1` FOREIGN KEY (`room_type_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `r2` FOREIGN KEY (`room_status_id`) REFERENCES `room_statuses` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `u` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
