-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 فبراير 2026 الساعة 00:24
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topsisters`
--

-- --------------------------------------------------------

--
-- بنية الجدول `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `notes` text DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `department` varchar(50) NOT NULL,
  `service` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `bookings`
--

INSERT INTO `bookings` (`id`, `customer_name`, `phone`, `booking_date`, `booking_time`, `notes`, `image`, `department`, `service`, `category_id`) VALUES
(13, 'شهد عمر يحيى', '0594919652', '2026-02-15', '05:03:00', '', '', '', 'جل مع تركيب لليدين', 1),
(28, 'شهد عمر يحيى', '0594919652', '2026-02-19', '03:16:00', '', '', '', 'قفع رموش', 2),
(29, 'شهد عمر يحيى', '0594919652', '2026-02-12', '05:17:00', '', '', '', 'جلسة السبا', 3);

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'بشرة'),
(2, 'أظافر'),
(3, 'بديكير');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `customer_name`, `comment_text`, `created_at`, `department`) VALUES
(6, 'شوش', 'يسخنبس', '2026-02-12 23:17:56', 'us');

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`id`, `service_name`, `category_id`, `price`) VALUES
(1, 'جلسة ميزوثيرابي', 1, 150.00),
(2, 'جلسة هايدروفشل', 1, 130.00),
(3, 'جلسة تقشير الطحالب', 1, 150.00),
(4, 'جلسة نضارة', 1, 100.00),
(5, 'جلسة قفع الرموش', 1, 50.00),
(6, 'جلسة تنظيف اللحمية', 2, 35.00),
(7, 'جلسة تنظيف اللحمية مع تقشير وترطيب', 2, 50.00),
(8, 'جلسة جل على أظافر طبيعي', 2, 70.00),
(9, 'جلسة جل مع تركيب', 2, 90.00),
(10, 'جلسة جل مع تركيب مدعم', 2, 130.00),
(11, 'جلسة جل روسي', 2, 130.00),
(12, 'جلسة اكستنشن', 2, 130.00),
(13, 'جلسة بولي جل', 2, 130.00),
(14, 'جلسة حناء الأظافر لون أسود', 2, 50.00),
(15, 'جلسة إزالة جل قديم مع تنظيف اللحمية', 2, 45.00),
(16, 'جلسة إزالة جل قديم بدون تنظيف اللحمية', 2, 20.00),
(17, 'جلسة البرافين لليدين', 2, 40.00),
(18, 'جلسة البديكير', 3, 90.00),
(19, 'جلسة Foot Spa', 3, 100.00),
(20, 'جلسة تقشير الأقدام', 3, 60.00),
(21, 'جلسة الجل الطبيعي للأقدام', 3, 70.00),
(22, 'جلسة البرافين للأقدام', 3, 40.00),
(23, 'جلسة جل تركيب الأظافر للأقدام', 3, 90.00),
(24, 'جلسة إزالة الجل القديم للأقدام', 3, 30.00),
(25, 'جلسة تنظيف اللحمية وبرد الأظافر للأقدام', 3, 30.00);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(3, 'shahd@', '323d4b59f77209fa61ef430ec55a1021', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- قيود الجداول `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
