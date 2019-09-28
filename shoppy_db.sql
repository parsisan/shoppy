/*
 Navicat Premium Data Transfer

 Source Server         : Local WAMP
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : shoppy_db

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 28/09/2019 20:20:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_order_details
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE `tbl_order_details`  (
  `id` int(11) NOT NULL,
  `order_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `qnty` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for tbl_order_payments
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_payments`;
CREATE TABLE `tbl_order_payments`  (
  `id` int(11) NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `bank_gateway` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `date` datetime(0) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `user_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_orders
-- ----------------------------
DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE `tbl_orders`  (
  `id` int(11) NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `faktor_id` int(11) NULL DEFAULT NULL,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  `order_date` datetime(0) NULL DEFAULT NULL,
  `payment_id` int(11) NULL DEFAULT NULL,
  `payment_status` int(1) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Table structure for tbl_product_catagories
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_catagories`;
CREATE TABLE `tbl_product_catagories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_catagories
-- ----------------------------
INSERT INTO `tbl_product_catagories` VALUES (1, 'Kitchen', 1);
INSERT INTO `tbl_product_catagories` VALUES (2, 'Digital Devices', 1);
INSERT INTO `tbl_product_catagories` VALUES (3, 'Digital', 1);
INSERT INTO `tbl_product_catagories` VALUES (4, 'Clothes', 1);

-- ----------------------------
-- Table structure for tbl_product_comments
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_comments`;
CREATE TABLE `tbl_product_comments`  (
  `id` int(11) NOT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  `reply_coment_id` int(11) NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_product_features
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_features`;
CREATE TABLE `tbl_product_features`  (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `model` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `camera` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_product_gallery
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_gallery`;
CREATE TABLE `tbl_product_gallery`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NULL DEFAULT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_gallery
-- ----------------------------
INSERT INTO `tbl_product_gallery` VALUES (1, 1, 'public/images/products/samsung-refrigerator-500x500.jpg');
INSERT INTO `tbl_product_gallery` VALUES (2, 1, 'public/images/products/download.jpg');
INSERT INTO `tbl_product_gallery` VALUES (3, 2, 'public/images/products/8102137_R_SET.jpg');

-- ----------------------------
-- Table structure for tbl_products
-- ----------------------------
DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE `tbl_products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_persian_ci NULL,
  `price` int(10) NULL DEFAULT NULL,
  `main_pic_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `rate` int(1) NULL DEFAULT NULL,
  `publish_date` datetime(0) NULL DEFAULT NULL,
  `qnty` int(10) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_products
-- ----------------------------
INSERT INTO `tbl_products` VALUES (1, 'SAMSUNG Freez', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas purus viverra accumsan in nisl nisi. Arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque. In egestas erat imperdiet sed euismod nisi porta lorem mollis. Morbi tristique senectus et netus. Mattis pellentesque id nibh tortor id aliquet lectus proin. Sapien faucibus et molestie ac feugiat sed lectus vestibulum. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget. Dictum varius duis at consectetur lorem. Nisi vitae suscipit tellus mauris a diam maecenas sed enim. Velit ut tortor pretium viverra suspendisse potenti nullam. Et molestie ac feugiat sed lectus. Non nisi est sit amet facilisis magna. Dignissim diam quis enim lobortis scelerisque fermentum. Odio ut enim blandit volutpat maecenas volutpat. Ornare lectus sit amet est placerat in egestas erat. Nisi vitae suscipit tellus mauris a diam maecenas sed. Placerat duis ultricies lacus sed turpis tinciduDES nt id aliquet.', 20000, 'public/images/products/4196226.jpg', 5, '2019-09-25 18:20:00', 10, 1, '2019-09-28 19:22:27', NULL, 1);
INSERT INTO `tbl_products` VALUES (2, 'Samsung TV', 'DES Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Egestas purus viverra accumsan in nisl nisi. Arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque. In egestas erat imperdiet sed euismod nisi porta lorem mollis. Morbi tristique senectus et netus. Mattis pellentesque id nibh tortor id aliquet lectus proin. Sapien faucibus et molestie ac feugiat sed lectus vestibulum. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget. Dictum varius duis at consectetur lorem. Nisi vitae suscipit tellus mauris a diam maecenas sed enim. Velit ut tortor pretium viverra suspendisse potenti nullam. Et molestie ac feugiat sed lectus. Non nisi est sit amet facilisis magna. Dignissim diam quis enim lobortis scelerisque fermentum. Odio ut enim blandit volutpat maecenas volutpat. Ornare lectus sit amet est placerat in egestas erat. Nisi vitae suscipit tellus mauris a diam maecenas sed. Placerat duis ultricies lacus sed turpis tincidunt id aliquet.', 10000000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', NULL, NULL, NULL, 1, '2019-09-28 19:22:32', NULL, 2);
INSERT INTO `tbl_products` VALUES (3, 'TEST 100 25', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:22:38', NULL, 1);
INSERT INTO `tbl_products` VALUES (4, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:22:44', NULL, 1);
INSERT INTO `tbl_products` VALUES (5, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:40:03', NULL, 2);
INSERT INTO `tbl_products` VALUES (6, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:40:04', NULL, 2);
INSERT INTO `tbl_products` VALUES (7, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:40:06', NULL, 2);
INSERT INTO `tbl_products` VALUES (8, 'TEST 100 01', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-01 18:20:00', 100, 1, '2019-09-28 19:40:07', NULL, 2);
INSERT INTO `tbl_products` VALUES (9, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:40:08', NULL, 2);
INSERT INTO `tbl_products` VALUES (10, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (11, 'TEST 1000', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 1000, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (12, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (13, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (14, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (15, 'TEST 1000', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 1000, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (16, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (17, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (18, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (19, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (20, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (21, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (22, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (23, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (24, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (25, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (26, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (27, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (28, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (29, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (30, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (31, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (32, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (33, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (34, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (35, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (36, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (37, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (38, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (39, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (40, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (41, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (42, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);
INSERT INTO `tbl_products` VALUES (43, 'TEST', 'DES TEST', 2000, 'public/images/products/QN75Q90RAFXZA_001_Front1_Silver_NS_01.webp', 5, '2019-09-25 18:20:00', 100, 1, '2019-09-28 19:24:54', NULL, 1);

-- ----------------------------
-- Table structure for tbl_system
-- ----------------------------
DROP TABLE IF EXISTS `tbl_system`;
CREATE TABLE `tbl_system`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `site_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_system
-- ----------------------------
INSERT INTO `tbl_system` VALUES (1, 'فروشگاه شاپی 2', 'http://localhost/shoppy/');

-- ----------------------------
-- Table structure for tbl_system_menus
-- ----------------------------
DROP TABLE IF EXISTS `tbl_system_menus`;
CREATE TABLE `tbl_system_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_system_menus
-- ----------------------------
INSERT INTO `tbl_system_menus` VALUES (1, 'HOME', '/', 1);
INSERT INTO `tbl_system_menus` VALUES (2, 'ABOUT', '/about.php', 1);
INSERT INTO `tbl_system_menus` VALUES (3, 'Products', '/products.php', 1);
INSERT INTO `tbl_system_menus` VALUES (4, 'Contact US', '/contact.php', 1);

-- ----------------------------
-- Table structure for tbl_system_pages_slider
-- ----------------------------
DROP TABLE IF EXISTS `tbl_system_pages_slider`;
CREATE TABLE `tbl_system_pages_slider`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `click_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_system_pages_slider
-- ----------------------------
INSERT INTO `tbl_system_pages_slider` VALUES (1, 'سلام', 'public/images/1000009932.jpg', '/about.php', 1);
INSERT INTO `tbl_system_pages_slider` VALUES (2, 'Test', 'public/images/1000009960.jpg', NULL, 3);
INSERT INTO `tbl_system_pages_slider` VALUES (3, NULL, 'public/images/1000009960.jpg', NULL, 1);

-- ----------------------------
-- Table structure for tbl_user_details
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_details`;
CREATE TABLE `tbl_user_details`  (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `stateCode` int(2) NULL DEFAULT NULL,
  `cityCode` int(4) NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `tell` varbinary(10) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `lastName` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `cell` varbinary(10) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_persian_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
