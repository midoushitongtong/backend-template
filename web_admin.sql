/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : 127.0.0.1:3306
Source Database       : web_admin

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-04-26 12:55:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu` (
  `sys_menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `src` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sys_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES ('1', '系统', 'fa-bar-chart-o', '', '0', '1', '1', null, null, null, null);
INSERT INTO `sys_menu` VALUES ('2', '系统信息', 'fa-angle-double-right', 'admin/system/index', '1', null, '1', null, null, null, null);
INSERT INTO `sys_menu` VALUES ('3', 'Test', 'fa-bar-chart-o', '', '0', '1', '1', null, null, null, null);
INSERT INTO `sys_menu` VALUES ('4', 'test_two', 'fa-angle-double-right', '', '3', '1', '1', null, null, null, null);
INSERT INTO `sys_menu` VALUES ('5', 'test_three', 'fa-angle-double-right', 'admin/test/index', '4', null, '1', null, null, null, null);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `sys_user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` char(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`sys_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('1', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', '1', '1', '1', '1');
SET FOREIGN_KEY_CHECKS=1;
