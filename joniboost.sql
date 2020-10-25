/*
 Navicat MySQL Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : joniboost

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 25/10/2020 12:01:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `userId` int(10) UNSIGNED NOT NULL,
  `commentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topicId` int(10) UNSIGNED NOT NULL,
  `text` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `creation_date` datetime(0) NOT NULL,
  PRIMARY KEY (`commentId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 1, 1, 'asd', '2020-10-24 06:28:00');
INSERT INTO `comments` VALUES (1, 2, 1, 'pls sikeruljon', '2020-10-24 08:39:00');
INSERT INTO `comments` VALUES (1, 3, 1, 'comment 3', '2020-10-24 08:49:00');
INSERT INTO `comments` VALUES (1, 4, 6, 'hali', '2020-10-24 08:49:00');
INSERT INTO `comments` VALUES (1, 5, 6, 'cso', '2020-10-24 08:49:00');
INSERT INTO `comments` VALUES (1, 6, 6, 'hali', '2020-10-24 08:50:00');
INSERT INTO `comments` VALUES (5, 7, 1, 'comment 4\r\n', '2020-10-25 09:56:00');
INSERT INTO `comments` VALUES (5, 8, 1, ':)', '2020-10-25 10:50:00');
INSERT INTO `comments` VALUES (5, 9, 2, 'first comment here', '2020-10-25 10:52:00');
INSERT INTO `comments` VALUES (5, 10, 7, 'im monka', '2020-10-25 11:27:00');

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics`  (
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `creation_date` datetime(0) NOT NULL,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('first', 'im blue dabadidabiba', 1, '2020-10-24 00:00:00', 1);
INSERT INTO `topics` VALUES ('ss', 'ss', 2, '2020-10-24 00:00:00', 1);
INSERT INTO `topics` VALUES ('a', 'a', 4, '2020-10-24 11:07:00', 1);
INSERT INTO `topics` VALUES ('d', 'd', 5, '2020-10-24 05:00:00', 1);
INSERT INTO `topics` VALUES ('rq', 'rqrq', 6, '2020-10-24 05:32:00', 1);
INSERT INTO `topics` VALUES ('monkas topic', 'oh monkaS', 7, '2020-10-25 11:25:00', 5);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_hungarian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('asd', '123', 1);
INSERT INTO `users` VALUES ('monka', 'S', 5);

SET FOREIGN_KEY_CHECKS = 1;
