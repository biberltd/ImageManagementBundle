/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50712
 Source Host           : localhost
 Source Database       : database-structure

 Target Server Type    : MySQL
 Target Server Version : 50712
 File Encoding         : utf-8

 Date: 08/12/2016 10:43:41 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `image_crop`
-- ----------------------------
DROP TABLE IF EXISTS `image_crop`;
CREATE TABLE `image_crop` (
  `id` int(10) unsigned NOT NULL,
  `respect_ratio` char(1) NOT NULL DEFAULT 'y',
  `prefix` text,
  `postfix` text,
  `height` int(5) NOT NULL,
  `width` int(5) NOT NULL,
  `quality` int(3) NOT NULL DEFAULT '100',
  `site` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site` (`site`),
  CONSTRAINT `idxFSiteOfImageCrop` FOREIGN KEY (`site`) REFERENCES `site` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `image_crop_localization`
-- ----------------------------
DROP TABLE IF EXISTS `image_crop_localization`;
CREATE TABLE `image_crop_localization` (
  `crop` int(10) unsigned NOT NULL,
  `language` int(5) unsigned NOT NULL,
  `name` varchar(155) NOT NULL,
  `url_key` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`crop`),
  KEY `language` (`language`),
  CONSTRAINT `idxFCropOfImageCropLocalization` FOREIGN KEY (`crop`) REFERENCES `image_crop` (`id`) ON DELETE CASCADE,
  CONSTRAINT `idxFLanguageOfImageCropLocalization` FOREIGN KEY (`language`) REFERENCES `language` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
