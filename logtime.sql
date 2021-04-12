-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2021 lúc 10:52 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `logtime`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attendences`
--

CREATE TABLE `attendences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `off_time` int(2) NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attendences`
--

INSERT INTO `attendences` (`id`, `user_id`, `date`, `off_time`, `reason`, `created_at`, `updated_at`) VALUES
(4, 3, '2021-03-24', 8, 'hhhhhhhhhhhhh', '2021-04-01 08:51:46', '2021-04-01 01:51:46'),
(9, 19, '2021-04-06', 8, 'addddddddddd', '2021-04-07 08:06:21', '2021-04-07 01:06:21'),
(10, 19, '2021-04-09', 8, 'aaaaaaaaaaaaaaaaaaaaaa', '2021-04-05 19:34:04', '2021-04-05 19:34:04'),
(11, 19, '2021-04-20', 8, 'ssssssssssssss', '2021-04-05 19:34:25', '2021-04-05 19:34:25'),
(12, 19, '2021-04-08', 1, 'aaa', '2021-04-07 01:38:14', '2021-04-07 01:38:14'),
(13, 19, '2021-04-08', 4, 'aaaafffffffffff', '2021-04-07 01:43:45', '2021-04-07 01:43:45'),
(14, 19, '2021-04-10', 1, 'fff', '2021-04-07 01:44:42', '2021-04-07 01:44:42'),
(15, 19, '2021-04-10', 1, 'hhhhhhhhhhh', '2021-04-07 01:45:03', '2021-04-07 01:45:03'),
(16, 19, '2021-04-10', 1, 'qdasfdg', '2021-04-07 01:45:39', '2021-04-07 01:45:39'),
(17, 19, '2021-04-10', 1, 'likujthyrgf', '2021-04-07 01:46:38', '2021-04-07 01:46:38'),
(18, 19, '2021-04-10', 1, 'qwdes', '2021-04-07 01:47:07', '2021-04-07 01:47:07'),
(19, 19, '2021-04-10', 1, 'asdfv', '2021-04-07 01:48:37', '2021-04-07 01:48:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_to_dos`
--

CREATE TABLE `list_to_dos` (
  `id` int(11) NOT NULL,
  `time` date NOT NULL,
  `work_to_do` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `list_to_dos`
--

INSERT INTO `list_to_dos` (`id`, `time`, `work_to_do`, `created_at`, `updated_at`) VALUES
(1, '2021-03-02', 'Design a nice theme', '2021-03-30 08:51:02', NULL),
(2, '2021-03-03', 'Make the theme responsive', '2021-03-30 08:51:22', NULL),
(3, '2021-03-18', 'Let theme shine like a star', '2021-03-30 08:51:53', NULL),
(4, '2021-03-10', 'Let theme shine like a star', '2021-03-30 08:51:53', NULL),
(5, '2021-03-19', 'Check your messages and notifications', '2021-03-30 08:52:42', NULL),
(6, '2021-03-03', 'Let theme shine like a star ', '2021-02-28 22:24:11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `overtimes`
--

CREATE TABLE `overtimes` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_type` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time DEFAULT NULL,
  `work` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `over_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `overtimes`
--

INSERT INTO `overtimes` (`id`, `date`, `date_type`, `user_id`, `time_start`, `time_end`, `work`, `over_time`, `created_at`, `updated_at`) VALUES
(1, '2021-03-03', 1, 3, '11:00:00', '17:00:00', 'aaaaaaaaaaaaaaaaaa', '09:00:00', '2021-04-08 07:44:24', '2021-03-30 21:28:38'),
(2, '2021-04-08', 1, 3, '10:30:00', '11:00:00', 'zzzzzzzzzzzzzzzzzzz', '00:45:00', '2021-04-08 07:44:24', '2021-04-07 03:19:39'),
(3, '2021-04-02', 1, 3, '05:25:00', '17:24:00', '111111111111', '17:58:00', '2021-04-08 07:44:24', '2021-04-02 01:24:18'),
(4, '2021-04-01', 1, 4, '03:00:00', '17:25:00', '!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '21:37:00', '2021-04-08 07:44:24', '2021-04-02 01:25:16'),
(5, '2021-04-06', 1, 19, '05:35:00', '09:00:00', 'aaaaaaaaaaaaaaa', '05:07:00', '2021-04-08 07:44:24', '2021-04-06 19:43:37'),
(6, '2021-04-02', 2, 19, '07:00:00', '09:45:00', 'sssssssssssssssss', '05:30:00', '2021-04-08 07:44:24', '2021-04-06 21:00:32'),
(7, '2021-04-06', 1, 19, '09:45:00', '10:00:00', 'dddddddddd', '00:22:00', '2021-04-08 07:44:24', '2021-04-06 19:49:26'),
(8, '2021-04-07', 1, 19, '10:00:00', '11:50:00', '!!!!!!!!!!!!!!!!!!', '02:45:00', '2021-04-08 07:44:24', '2021-04-06 21:35:41'),
(9, '2021-04-08', 1, 19, '05:00:00', '08:10:00', 'aaaaaaaaaa', '04:45:00', '2021-04-08 07:44:24', '2021-04-06 21:02:29'),
(10, '2021-04-08', 1, 19, '16:00:00', '17:30:00', 'ddddddddddddddddddd', '02:15:00', '2021-04-08 07:44:24', '2021-04-06 03:09:31'),
(11, '2021-04-07', 1, 3, '11:00:00', '11:30:00', 'ddddddddddddddddd', '00:45:00', '2021-04-08 07:44:24', '2021-04-07 03:24:14'),
(12, '2021-04-07', 1, 19, '21:17:00', '21:17:00', 'ddddddddddddddd', '00:00:00', '2021-04-08 07:44:24', '2021-04-07 07:17:16'),
(13, '2021-04-08', 1, 19, '11:00:00', '11:56:00', 'dddddd', '01:24:00', '2021-04-08 07:44:24', '2021-04-07 23:39:54'),
(14, '2021-04-08', 1, 19, '13:34:00', '15:30:00', 'sssssssssssss', '02:54:00', '2021-04-08 07:44:24', '2021-04-07 23:47:11'),
(15, '2021-04-12', 1, 19, '12:00:00', '14:37:00', 'abcdaasssssssss', '03:55:00', '2021-04-08 07:44:24', '2021-04-08 00:38:08'),
(16, '2021-04-08', 1, 19, '14:42:00', '14:42:00', 'ffffffffffffffff', '00:00:00', '2021-04-08 07:44:37', '2021-04-08 00:42:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `role` tinyint(1) NOT NULL,
  `phone_number` int(15) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `email`, `password`, `position`, `status`, `role`, `phone_number`, `picture`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'user1234', 'dinh van an', 'jombie@gmail.com', '$2y$10$wdEg62ZqK2.ljRmnN0JTjebUAstH..sYvtQamM4/cJLO818/Ju.xS', 'Interns', 0, 0, 909090909, 'default-150x150.png', '', '2021-04-07 07:17:09', '2021-04-07 00:17:09'),
(4, 'andinh123', 'an van dinh', 'dinhvanan12081996@gmail.com', '$2y$10$4uVnNs561F5dChyThlwGe.NYzLoIB9Wwh6wfMxJq/TdTf/iTmAZOe', 'Interns', 0, 0, NULL, 'default-150x150.png', '', '2021-04-07 07:19:49', '2021-04-07 00:19:49'),
(18, 'admin123', 'AnDinh', 'andv@allogical.com', '$2y$10$dHAvlyzlKZgsNNjPFuuLQ.NR.F2VplHJoqfpP7ptVo79UKoMsdFkW', 'admin', 0, 1, 904007007, 'avatar.png', NULL, '2021-04-07 09:27:03', '2021-04-07 02:27:03'),
(19, 'user123', 'Ấn Đinh', 'dvan.18i@cit.udn.vn', '$2y$10$FSo/knbJpiMv1PNlhTMcGuPaximPC9IJITGRU.Z6hxkph06qDOoJ6', 'Interns', 0, 0, 905841816, 'user1-128x128.jpg', NULL, '2021-04-08 08:17:16', '2021-04-08 01:17:16'),
(20, 'test123', 'test name', 'asdsjf@gmail.com', '$2y$10$4dWodYq12yZ5lHBQxcw7keRlvhZ8sJQ2tvgEwyipVS0OUSxfOvVQW', 'Interns', 0, 0, NULL, 'default-150x150.png', NULL, '2021-04-07 09:26:09', '2021-04-07 02:26:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attendences`
--
ALTER TABLE `attendences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `list_to_dos`
--
ALTER TABLE `list_to_dos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attendences`
--
ALTER TABLE `attendences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `list_to_dos`
--
ALTER TABLE `list_to_dos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `attendences`
--
ALTER TABLE `attendences`
  ADD CONSTRAINT `attendences_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
