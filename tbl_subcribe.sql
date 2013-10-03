/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : car_ci

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-10-04 00:34:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_subcribe`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_subcribe`;
CREATE TABLE `tbl_subcribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('price','testdrive','catalogue') DEFAULT 'price',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `date_create` int(11) DEFAULT NULL,
  `approve` enum('Y','N') DEFAULT 'N',
  `record_id` int(11) DEFAULT NULL,
  `date_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
