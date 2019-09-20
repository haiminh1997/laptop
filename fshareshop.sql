/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : 127.0.0.1:3306
 Source Schema         : fshareshop

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 20/09/2019 09:04:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `update_at` timestamp(0) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Lương Hải Minh', 'Quất Lâm Nam Định', 'haiminh97lqd@gmail.com', '123456', '0963243628', 1, 2, NULL, NULL, NULL);
INSERT INTO `admin` VALUES (3, 'Phạm Thị Hoài', 'Quất Lâm Nam Định', 'luonghaiminhnd@gmail.com', '202cb962ac59075b964b07152d234b70', '09999999', 1, 2, NULL, NULL, NULL);
INSERT INTO `admin` VALUES (4, 'Nguyễn Văn mèo', 'thanh hoa', 'meo@gmail.com', '202cb962ac59075b964b07152d234b70', '09876543', 1, 1, NULL, NULL, '2019-04-11 09:09:01');
INSERT INTO `admin` VALUES (6, 'Hải Minh', 'nam dinh', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '0947367463', 1, 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `images` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `banner` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Dell', 'dell', NULL, NULL, 1, 1, '2019-04-06 14:37:10', '2019-04-12 07:32:08');
INSERT INTO `category` VALUES (2, 'HP', 'hp', NULL, NULL, 1, 1, '2019-04-06 14:37:34', '2019-04-12 07:32:10');
INSERT INTO `category` VALUES (3, 'Xiaomi', 'xiaomi', NULL, NULL, 1, 1, '2019-04-07 21:21:35', '2019-04-12 07:32:11');
INSERT INTO `category` VALUES (4, 'Macbook', 'macbook', NULL, NULL, 1, 1, '2019-04-08 16:06:16', '2019-04-11 15:52:37');
INSERT INTO `category` VALUES (6, 'Lenovo', NULL, NULL, NULL, 1, 1, '2019-04-08 16:38:08', '2019-04-11 15:52:38');
INSERT INTO `category` VALUES (7, 'Acer', 'acer', NULL, NULL, 1, 1, '2019-04-11 14:08:43', '2019-04-12 07:32:13');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(100) DEFAULT NULL,
  `product_id` int(100) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (16, 11, 13, 1, 560000, '2019-04-14 22:34:52', '2019-04-14 22:34:52');
INSERT INTO `orders` VALUES (17, 11, 12, 1, 19710000, '2019-04-14 22:34:53', '2019-04-14 22:34:53');
INSERT INTO `orders` VALUES (18, 12, 14, 1, 10500000, '2019-04-15 08:56:56', '2019-04-15 08:56:56');
INSERT INTO `orders` VALUES (19, 13, 15, 1, 1700000, '2019-04-15 09:46:49', '2019-04-15 09:46:49');
INSERT INTO `orders` VALUES (20, 14, 15, 2, 1700000, '2019-04-15 09:49:28', '2019-04-15 09:49:28');
INSERT INTO `orders` VALUES (21, 14, 12, 1, 19710000, '2019-04-15 09:49:28', '2019-04-15 09:49:28');
INSERT INTO `orders` VALUES (22, 14, 16, 1, 20000000, '2019-04-15 09:49:28', '2019-04-15 09:49:28');
INSERT INTO `orders` VALUES (23, 14, 18, 1, 14700000, '2019-04-15 09:49:29', '2019-04-15 09:49:29');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT 0,
  `thunbar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `number` int(11) DEFAULT 0,
  `head` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `created_at` timestamp(0) DEFAULT NULL,
  `updated_at` timestamp(0) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (12, 'MacBook Pro X', 'macbook-pro-x', 21900000, 10, 'MacBook ProX.jpg', 4, ' Bộ xử lý	         :   Intel Core i5 lõi kép 1.6GHz  <br/>\r\nỔ đĩa cứng       :   SSD <br/>\r\nMàn hình          :	13inchs <br/>\r\nHệ điều hành    :  Mac OS <br/>\r\nKích thước & trọng lượng	<br/>\r\n    Chiều dài	30,41cm <br/>\r\n    Chiều ngang	21,24cm <br/>\r\n    Chiều cao	0,41-0,56cm <br/>\r\n    Trọng lượng	1,25kg <br/>\r\n', 16, 0, 0, 0, 1, NULL, '2019-04-15 09:49:37');
INSERT INTO `product` VALUES (13, 'Laptop Lenovo IdeaPad 130 ', 'laptop-lenovo-ideapad-130', 700000, 20, 'Laptop Lenovo IdeaPad 130 14IKB i3.jpg', 6, '  CPU:Intel Core i5 Coffee Lake, 8250U, 1.60 GHz <br/>\r\nRAM:4 GB, DDR4 (1 khe), 2400 MHz <br/>\r\nỔ cứng:SSD: 128 GB, M2, PCIe, Hỗ trợ khe cắm SSD M.2 PCIe <br/>\r\nMàn hình:14 inch, HD (1366 x 768) <br/>\r\nCard màn hình:Card đồ họa tích hợp, Intel® HD Graphics 620 <br/>\r\nCổng kết nối:HDMI 1.4, 2 x USB 3.1, USB Type-C <br/>\r\nĐặc biệt:Có màn hình cảm ứng <br/>\r\nHệ điều hành:Windows 10 Home SL <br/>\r\nThiết kế:Vỏ nhựa, PIN liền <br/>\r\nKích thước: 1.67 kg <br/>', 29, 0, 0, 0, 0, NULL, '2019-04-15 09:36:50');
INSERT INTO `product` VALUES (14, 'MacBook Air', 'macbook-air', 21000000, 50, 'macbook-air.jpg', 4, ' Bộ xử lý	         :   Intel Core i5 lõi kép 1.6GHz  <br/>\r\nỔ đĩa cứng       :   SSD <br/>\r\nMàn hình          :	13inchs <br/>\r\nHệ điều hành    :  Mac OS <br/>\r\nKích thước & trọng lượng	<br/>\r\n    Chiều dài	30,41cm <br/>\r\n    Chiều ngang	21,24cm <br/>\r\n    Chiều cao	0,41-0,56cm <br/>\r\n    Trọng lượng	1,25kg <br/>\r\n', 56, 0, 0, 0, 0, NULL, '2019-04-15 09:36:49');
INSERT INTO `product` VALUES (15, 'MacBook 5516 LL/A', 'macbook-5516-lla', 2000000, 15, 'MacBook5516.jpg', 4, ' Bộ xử lý	         :   Intel Core i5 lõi kép 1.6GHz  <br/>\r\nỔ đĩa cứng       :   SSD <br/>\r\nMàn hình          :	13inchs <br/>\r\nHệ điều hành    :  Mac OS <br/>\r\nKích thước & trọng lượng	<br/>\r\n    Chiều dài	30,41cm <br/>\r\n    Chiều ngang	21,24cm <br/>\r\n    Chiều cao	0,41-0,56cm <br/>\r\n    Trọng lượng	1,25kg <br/>\r\n', 9, 0, 0, 0, 2, NULL, '2019-04-15 09:49:37');
INSERT INTO `product` VALUES (16, 'MacBook Pro 2', 'macbook-pro-2', 25000000, 20, 'MacBook Pro.jpg', 4, ' Bộ xử lý	         :   Intel Core i5 lõi kép 1.6GHz  <br/>\r\nỔ đĩa cứng       :   SSD <br/>\r\nMàn hình          :	13inchs <br/>\r\nHệ điều hành    :  Mac OS <br/>\r\nKích thước & trọng lượng	<br/>\r\n    Chiều dài	30,41cm <br/>\r\n    Chiều ngang	21,24cm <br/>\r\n    Chiều cao	0,41-0,56cm <br/>\r\n    Trọng lượng	1,25kg <br/>\r\n', 11, 0, 0, 0, 1, NULL, '2019-04-15 09:49:37');
INSERT INTO `product` VALUES (17, 'Lenovo ThinkPad L580', 'lenovo-thinkpad-l580', 14000000, 50, 'Lenovo ThinkPad L580.jpg', 6, 'CPU:Intel Core i5 Coffee Lake, 8250U, 1.60 GHz <br/>\r\nRAM:4 GB, DDR4 (1 khe), 2400 MHz <br/>\r\nỔ cứng:SSD: 128 GB, M2, PCIe, Hỗ trợ khe cắm SSD M.2 PCIe <br/>\r\nMàn hình:14 inch, HD (1366 x 768) <br/>\r\nCard màn hình:Card đồ họa tích hợp, Intel® HD Graphics 620 <br/>\r\nCổng kết nối:HDMI 1.4, 2 x USB 3.1, USB Type-C <br/>\r\nĐặc biệt:Có màn hình cảm ứng <br/>\r\nHệ điều hành:Windows 10 Home SL <br/>\r\nThiết kế:Vỏ nhựa, PIN liền <br/>\r\nKích thước: 1.67 kg <br/>', 15, 0, 0, 0, 0, NULL, '2019-04-12 18:30:34');
INSERT INTO `product` VALUES (18, 'Lenovo ThinkPad T480s', 'lenovo-thinkpad-t480s', 21000000, 30, 'Laptop Lenovo ThinkPad T480s.jpg', 6, ' CPU:Intel Core i5 Coffee Lake, 8250U, 1.60 GHz <br/>\r\nRAM:4 GB, DDR4 (1 khe), 2400 MHz <br/>\r\nỔ cứng:SSD: 128 GB, M2, PCIe, Hỗ trợ khe cắm SSD M.2 PCIe <br/>\r\nMàn hình:14 inch, HD (1366 x 768) <br/>\r\nCard màn hình:Card đồ họa tích hợp, Intel® HD Graphics 620 <br/>\r\nCổng kết nối:HDMI 1.4, 2 x USB 3.1, USB Type-C <br/>\r\nĐặc biệt:Có màn hình cảm ứng <br/>\r\nHệ điều hành:Windows 10 Home SL <br/>\r\nThiết kế:Vỏ nhựa, PIN liền <br/>\r\nKích thước: 1.67 kg <br/>', 49, 0, 0, 0, 1, NULL, '2019-04-15 09:49:37');
INSERT INTO `product` VALUES (19, 'Lenovo ThinkPad E580XS', 'lenovo-thinkpad-e580xs', 14000000, 25, 'Laptop Lenovo Thinkpad E580.jpg', 6, ' CPU:Intel Core i5 Coffee Lake, 8250U, 1.60 GHz <br/>\r\nRAM:4 GB, DDR4 (1 khe), 2400 MHz <br/>\r\nỔ cứng:SSD: 128 GB, M2, PCIe, Hỗ trợ khe cắm SSD M.2 PCIe <br/>\r\nMàn hình:14 inch, HD (1366 x 768) <br/>\r\nCard màn hình:Card đồ họa tích hợp, Intel® HD Graphics 620 <br/>\r\nCổng kết nối:HDMI 1.4, 2 x USB 3.1, USB Type-C <br/>\r\nĐặc biệt:Có màn hình cảm ứng <br/>\r\nHệ điều hành:Windows 10 Home SL <br/>\r\nThiết kế:Vỏ nhựa, PIN liền <br/>\r\nKích thước: 1.67 kg <br/>', 22, 0, 0, 0, 0, NULL, '2019-04-12 18:31:13');

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `amount` int(100) DEFAULT NULL,
  `users_id` int(100) DEFAULT NULL,
  `status` tinyint(100) DEFAULT 0,
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created_at` timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transaction
-- ----------------------------
INSERT INTO `transaction` VALUES (11, 22297000, 5, 1, 'khách k nhận hàng vì bận đẻ', '2019-04-14 22:34:52', '2019-04-15 09:36:50');
INSERT INTO `transaction` VALUES (12, 11550000, 5, 1, 'khách k nhận hàng vì bận đẻ', '2019-04-15 08:56:56', '2019-04-15 09:36:49');
INSERT INTO `transaction` VALUES (13, 1870000, 5, 1, 'hi', '2019-04-15 09:46:49', '2019-04-15 09:47:34');
INSERT INTO `transaction` VALUES (14, 63591000, 5, 1, 'khách k nhận hàng vì bận đẻ', '2019-04-15 09:49:28', '2019-04-15 09:49:37');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp(0) DEFAULT NULL,
  `update_at` timestamp(0) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (5, 'Lương Hải Minh', 'haiminh97lqd@gmail.com', '0963243628', 'Quất Lâm Nam Định', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 'Phạm Thị Hoài', 'pth@gmail.com', '01234567', 'thai binh', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'Ngô Bá Khá', 'khabanh@gmail.com', '098438437', 'bắc ninh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 'Ngô Bá Khá', 'khabanh@gmail.com', '098438437', 'bắc ninh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'Nguyễn Văn Minh', 'nvm@gmail.com', '098756223', 'thai binh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 'nguyen van meo meo', 'meomeo@gmail.com', '90976867', 'nam dinh', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
