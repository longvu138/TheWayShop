-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2021 lúc 07:16 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thewayshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `deleted`) VALUES
(1, 'áo nam', 0),
(2, 'áo nữ', 0),
(3, 'quần nam', 0),
(4, 'quần nữ', 0),
(5, 'quần áo', 0),
(6, 'Túi Xách', 0),
(7, 'Giày Dép', 0),
(8, 'Váy nữ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `order_date`, `status`, `total_money`) VALUES
(1, 2, 'người dùng 1', 'user1@user.com', '1234567890', 'hà nội', 'giao thứ 2', '2021-10-23 11:47:42', 0, 50000),
(2, 3, 'người dùng 2', 'user2@user.com', '1234567890', 'Hưng yên', 'giao thứ 2', '2021-10-20 11:47:42', 2, 150000),
(3, 2, 'người dùng 1', 'user1@user.com', '1234567890', 'hà nội', 'giao thứ 2', '2021-10-23 11:47:42', 1, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`) VALUES
(1, 1, 2, 50000, 2, 10000),
(2, 2, 9, 14500, 2, 280000),
(3, 1, 3, 50000, 2, 10000),
(4, 2, 10, 14500, 2, 280000),
(5, 3, 3, 50000, 2, 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 2, 'áo thun ngắn tay  update', 60000, 10, '1.jpg', 'Áo Thun Nam Cổ tròn Nhật Bản (japan) Gold RHINO màu đen, trắng, xám , đỏ, xanh cotton tự nhiên cao cấp,kháng khuẩn update', '2021-10-22 15:21:59', '2021-10-23 11:39:57', 0),
(2, 2, 'áo thun nữ', 60000, 0, '3.jpg', 'ÁO THUN FORM CƠ BẢN, CỔ TRÒN, TAY NGẮN, TRƯỚC NGỰC CÓ IN CHỮ \"CLOUD\" CÁCH ĐIỆU TẠO ĐIỂM NHẤN.\" ', '2021-10-22 15:23:23', '2021-10-23 11:40:26', 0),
(3, 3, 'quần dài nam', 10000, 0, '75380511_1416724555160582_6567935710702075904_n.jpg', 'COTTON ON - Quần Dài Nam - Urban Jogger Cargo\r\n\" ', '2021-10-22 15:23:23', '2021-10-23 11:40:46', 0),
(4, 4, 'quần nữ', 100000, 0, 'CHOCOLATE-FREEZE.png', 'Quần jean Baggy ống xuông, rộng nam, nư TR01 hottrend hàn quốc 2021\" ', '2021-10-22 15:25:02', '2021-10-23 11:40:55', 0),
(5, 1, 'áo nam', 500000, 0, 'menu-PSD_3.png', 'áo nam áo nam\" ', NULL, '2021-10-23 11:41:03', 0),
(6, 2, 'áo nữ', 60000, 0, 'women5981_1.jpg', 'áo thun nữ', NULL, NULL, 0),
(7, 3, 'quần nam', 600000, 0, '3.jpg', 'quần dài nam', NULL, NULL, 0),
(8, 1, 'quần đùi nữ update', 50000, 1, '4.jpg', 'quần đùi nữ mùa hè\" update', NULL, '2021-10-23 11:38:01', 0),
(9, 2, 'váy nữ', 1555000, 0, '75380511_1416724555160582_6567935710702075904_n.jpg', 'váy nữ ', '2021-10-23 04:21:04', '2021-10-23 13:33:36', 0),
(10, 1, 'áo nam thứ 10', 650000, 0, '5.jpg', 'UPDATE table_name\r\nSET column1 = value1, column2 = value2, ...\r\nWHERE condition', '2021-10-23 11:45:36', '2021-10-23 11:45:36', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `phone_number`, `address`, `password`, `role_id`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'admin', 'admin@admin.com', '123456732', 'hà nội', '123456', 1, '2021-10-22 15:08:31', '2021-10-22 15:08:31', 0),
(2, 'user1', 'user1@user.com', '12345678', 'hà nội', '123456', 2, '2021-10-22 15:08:31', '2021-10-22 15:08:31', 0),
(3, 'user2', 'user2@user.com', '12345678', 'hà nội', '123456', 2, '2021-10-22 15:08:31', '2021-10-22 15:08:31', 0),
(4, 'user3', 'user3@user.com', '12345678', 'hà nội', '123456', 2, '2021-10-22 15:08:31', '2021-10-22 15:08:31', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
