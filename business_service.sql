-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2020 lúc 10:21 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `business_service`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `biz_categories`
--

CREATE TABLE `biz_categories` (
  `business_id` int(11) NOT NULL,
  `category_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `biz_categories`
--

INSERT INTO `biz_categories` (`business_id`, `category_id`) VALUES
(1, 'SNIPPETS'),
(2, 'TEMPLATES'),
(43, 'THEMES');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `businesses`
--

CREATE TABLE `businesses` (
  `business_id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` int(12) NOT NULL,
  `URL` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `businesses`
--

INSERT INTO `businesses` (`business_id`, `Name`, `Address`, `City`, `Telephone`, `URL`) VALUES
(1, 'Bootstrap Snippets', 'Start Bootstrap website CC BY-NC 4.0.', 'Ha Noi', 2147483647, 'https://startbootstrap.com/snippets/'),
(2, 'Bootstrap Templates', 'Start Bootstrap website CC BY-NC 4.0.', 'Ha Noi', 2147483647, 'https://startbootstrap.com/templates/'),
(43, 'Đại học Bách Khoa', 'Ha Noi, Viet Nam', 'Ha Noi', 844343434, 'https://hust.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `description`) VALUES
('SNIPPETS', 'Snippets bootstrap', 'Snippets'),
('TEMPLATES', 'Templates bootstrap', 'Templates'),
('THEMES', 'Themes bootstrap', 'Start Bootstrap');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `biz_categories`
--
ALTER TABLE `biz_categories`
  ADD PRIMARY KEY (`business_id`,`category_id`);

--
-- Chỉ mục cho bảng `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`business_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `businesses`
--
ALTER TABLE `businesses`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
