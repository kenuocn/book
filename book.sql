/*
Navicat MySQL Data Transfer

Source Server         : 虫洞翻翻
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : book

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2017-01-22 16:21:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(20) DEFAULT NULL,
  `category_no` int(11) DEFAULT NULL,
  `preview` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'uid',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `phone` char(11) unique NOT NULL DEFAULT '' COMMENT '手机号',
  `email` varchar(32) unique NOT NULL DEFAULT '' COMMENT 'email邮箱',
  `password` char(40) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(44) NOT NULL DEFAULT '' COMMENT '盐值',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY username(`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------

-- ----------------------------
-- Table structure for pdt_content
-- ----------------------------
DROP TABLE IF EXISTS `pdt_content`;
CREATE TABLE `pdt_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `content` varchar(20000) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdt_content
-- ----------------------------

-- ----------------------------
-- Table structure for pdt_images
-- ----------------------------
DROP TABLE IF EXISTS `pdt_images`;
CREATE TABLE `pdt_images` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `image_path` varchar(200) DEFAULT NULL,
  `image_no` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pdt_images
-- ----------------------------

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(20) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `preview` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for temp_phone
-- ----------------------------
DROP TABLE IF EXISTS `temp_phone`;
CREATE TABLE `temp_phone` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `phone` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `code` char(4) NOT NULL DEFAULT '' COMMENT '手机验证码',
  `deadline` int(11) DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of temp_phone
-- ----------------------------
INSERT INTO `temp_phone` VALUES ('1', '13594727434', '3535', '1485071346');
