/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : car_ci

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-09-28 16:38:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_cars`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cars`;
CREATE TABLE `tbl_cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `type_car` enum('Xe đã sử dụng','Xe mới') DEFAULT 'Xe mới',
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `thongso_kithuat` varchar(255) DEFAULT NULL,
  `hide` enum('N','Y') DEFAULT 'N',
  `date_create` int(11) DEFAULT NULL,
  `date_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_cars
-- ----------------------------
INSERT INTO `tbl_cars` VALUES ('3', '32', 'Xe mới', 'Mercedes-Benz GLK300 4Matic 2013', '1654000', '896_resize.php.jpg', 'Mercedes GLK300 ra mắt người tiêu dùng Việt Nam vào tháng 6/2009. Mẫu xe này đã được người tiêu dùng đón nhận và trở thành mẫu xe khá HOT trên thị trường nhờ ngoại hình khỏe khoắn, trang thiết bị tiện nghi cao cấp và đặc biệt là giá thành cạnh tranh trong', '<p>\r\n	Nằm trong ph&acirc;n kh&uacute;c SUV hạng sang cỡ nhỏ&nbsp;cạnh tranh với&nbsp;Audi Q3, BMW X3 c&ugrave;ng một loạt&nbsp;c&aacute;i t&ecirc;n &quot;chiếu dưới&quot;. Những thay đổi tr&ecirc;n phi&ecirc;n bản mới c&oacute; g&igrave; để tiếp tục giữ&a', null, 'N', '1379435225', '1379435271');
INSERT INTO `tbl_cars` VALUES ('4', '30', 'Xe mới', 'Mercedes-Benz E200 2013', '', '602_resize_300x170__h_849.jpg', 'Mercedes A-Class  ra mắt thế hệ đầu tiên (mã hiệu W168) tại triển lãm Frankfurt Motor Show năm 1997 với hơn 1,1 triệu chiếc từ năm 1997 - 2004. Thế hệ thứ 2 của mẫu xe (mã hiệu W169) được sản xuất ra từ năm 2004 - 2012. Ở thế hệ thứ ba  (mã hiệu W176) Mer', '<p>\r\n	<em>C</em>uộc c&aacute;ch mạng mới trong thiết kế mang t&ecirc;n&nbsp;A-Volution &quot;<em>thế hệ của&nbsp;những người ch&aacute;y hết m&igrave;nh trong cuộc sống, d&aacute;m nghĩ, d&aacute;m l&agrave;m, kh&ocirc;ng ngại thử th&aacute;ch v&agrave; d', null, 'N', '1379435675', null);
INSERT INTO `tbl_cars` VALUES ('7', '32', 'Xe đã sử dụng', 'Mercedes-Benz A-Class 2013', '', '472_1.jpg', 'Mercedes A-Class  ra mắt thế hệ đầu tiên (mã hiệu W168) tại triển lãm Frankfurt Motor Show năm 1997 với hơn 1,1 triệu chiếc từ năm 1997 - 2004. Thế hệ thứ 2 của mẫu xe (mã hiệu W169) được sản xuất ra từ năm 2004 - 2012. Ở thế hệ thứ ba  (mã hiệu W176) Mer', '<p>\r\n	Tại thị trường Việt Nam, Mercedes A-Class được ph&acirc;n phối ch&iacute;nh h&atilde;ng với hai phi&ecirc;n bản, phi&ecirc;n bản A200 c&oacute; gi&aacute; b&aacute;n&nbsp;1.264 tỷ v&agrave;&nbsp;A250 Sport AMG c&oacute; gi&aacute; b&aacute;n&nbsp;1.', null, 'N', '1379435824', null);
INSERT INTO `tbl_cars` VALUES ('8', '30', 'Xe mới', 'ercedes-Benz A-Class 2012', '', '446_2.jpg', 'Cuộc cách mạng mới trong thiết kế mang tên A-Volution \"thế hệ của những người cháy hết mình trong cuộc sống, dám nghĩ, dám làm, không ngại thử thách và dám dấn thân...\" Mercedes đã khiến những người trẻ tuổi phải phấn khích và thích thú trước một hình ảnh', '<p>\r\n	Tại thị trường Việt Nam, Mercedes A-Class được ph&acirc;n phối ch&iacute;nh h&atilde;ng với hai phi&ecirc;n bản, phi&ecirc;n bản A200 c&oacute; gi&aacute; b&aacute;n&nbsp;1.264 tỷ v&agrave;&nbsp;A250 Sport AMG c&oacute; gi&aacute; b&aacute;n&nbsp;1.', '<p>\r\n	thong so ki thuat</p>\r\n', 'N', '1379435932', '1380312832');

-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `caid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`caid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES ('24', 'Passenger cars', 'passenger-cars', '', '1', '0');
INSERT INTO `tbl_category` VALUES ('25', 'Vans', 'vans', '', '1', '0');
INSERT INTO `tbl_category` VALUES ('26', 'Transporter', 'transporter', '', '1', '0');
INSERT INTO `tbl_category` VALUES ('27', 'Trucks', 'trucks', '', '1', '0');
INSERT INTO `tbl_category` VALUES ('28', 'Buses', 'buses', '', '1', '0');
INSERT INTO `tbl_category` VALUES ('29', 'Corporate Sales', 'corporate-sales', '', '1', '0');
INSERT INTO `tbl_category` VALUES ('30', 'A-Class1', 'a-class1', '', '1', '24');
INSERT INTO `tbl_category` VALUES ('31', 'B-Class', 'b-class', '', '1', '24');
INSERT INTO `tbl_category` VALUES ('32', 'C-Class', 'c-class', '', '1', '28');

-- ----------------------------
-- Table structure for `tbl_category_tu_van`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category_tu_van`;
CREATE TABLE `tbl_category_tu_van` (
  `caid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`caid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_category_tu_van
-- ----------------------------
INSERT INTO `tbl_category_tu_van` VALUES ('13', 'Sedans & Coupes', 'ngan-hang-bao-hiem', '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('14', 'Roadsters & Supercars', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('15', 'SUVs & Crossovers1', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('16', 'C-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('17', 'A-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('18', 'B-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('19', 'D-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('20', 'A-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('21', 'B-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('22', 'C-Class', null, '', '1');
INSERT INTO `tbl_category_tu_van` VALUES ('23', 'D-Class', null, '', '1');

-- ----------------------------
-- Table structure for `tbl_khuyen_mai`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_khuyen_mai`;
CREATE TABLE `tbl_khuyen_mai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `intro` text CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `date_create` int(11) NOT NULL,
  `hide` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_khuyen_mai
-- ----------------------------
INSERT INTO `tbl_khuyen_mai` VALUES ('1', 'Thông Tin Định Cư', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '1374858548', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('2', 'Thông Tin Định Cư', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '1374858544', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('3', 'Thông Tin Định Cư', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '1374858541', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('4', 'Thông Tin Định Cư1', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '1379093642', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('5', 'test tin tuc1', 'test tin tuc', '<p>\r\n	test tin tuc</p>\r\n', '1379095430', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('6', 'test2', '', '', '1379095756', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('7', 'tes3', '', '', '1379095826', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('8', 'test tu van', '', '', '1379096121', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('9', 'test tu van', '', '', '1379096148', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('10', 'test tin tuc12', '', '', '1379096329', '1');
INSERT INTO `tbl_khuyen_mai` VALUES ('11', 'test khuyen mai1', '<p>\r\n	test gioi thieu-khuyen mai</p>\r\n', '<p>\r\n	test noi dung-khuyen mai</p>\r\n', '1379260300', '1');

-- ----------------------------
-- Table structure for `tbl_slide`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slide`;
CREATE TABLE `tbl_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hinh` varchar(255) DEFAULT NULL,
  `hide` enum('N','Y') DEFAULT NULL,
  `type` enum('category','car','banner') DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `date_create` int(11) DEFAULT NULL,
  `date_update` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_slide
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tin_tuc`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tin_tuc`;
CREATE TABLE `tbl_tin_tuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `intro` text CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `hinh` varchar(500) CHARACTER SET utf8 NOT NULL,
  `date_create` int(11) NOT NULL,
  `date_update` int(11) DEFAULT NULL,
  `hide` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tin_tuc
-- ----------------------------
INSERT INTO `tbl_tin_tuc` VALUES ('11', 'Bản tin cập nhật', 'Là một người yêu Ngôi sao ba cánh, có thể bạn sẽ muốn nhận được thông tin và các sự kiện mới nhất từ Mercedes-Benz Việt Nam như các chương trình khuyến mãi, triển lãm xe hơi, đăng ký huấn luyện lái xe an toàn, tham dự giải Golf....', '<p>\r\n	<span style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, verdana, \'times new roman\', sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 15px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;\">Qua bản tin điện tử, ch&uacute;ng t&ocirc;i h&acirc;n hạnh chia sẻ với bạn những g&igrave; đang diễn ra, m&agrave; ch&uacute;ng t&ocirc;i tin rằng sẽ l&agrave;m bạn th&uacute; vị, v&agrave; qua đ&oacute; thắt chặt mối quan hệ đặc biệt giữa bạn v&agrave; Mercedes-Benz.</span><br style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, verdana, \'times new roman\', sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 15px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\" />\r\n	<br style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, verdana, \'times new roman\', sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 15px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\" />\r\n	<br style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, verdana, \'times new roman\', sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 15px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\" />\r\n	<span style=\"color: rgb(102, 102, 102); font-family: arial, helvetica, verdana, \'times new roman\', sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 15px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none;\">Vui l&ograve;ng nhắp chuột v&agrave;o đường link dưới đ&acirc;y để đăng k&yacute; bản tin điện tử từ Mercedes-Benz:</span></p>\r\n', '810_1000x295C300-AMG.jpg', '1379432210', '1379432402', '0');
INSERT INTO `tbl_tin_tuc` VALUES ('12', 'GameK gửi tặng 1000 Gift Code CM Online', 'Nhân sự kiện CM Online mở cửa Closed Beta vào ngày 17/9 tới, GameK xin gửi tặng 1000 Gift Code tới độc giả.', '<p>\r\n	C&oacute; lẽ c&aacute;c game thủ v&agrave; người chơi game cũng kh&ocirc;ng c&ograve;n xa lạ g&igrave; với c&aacute;c d&ograve;ng webgame quản l&yacute; b&oacute;ng đ&aacute; ở Việt Nam. Tuy nhi&ecirc;n th&igrave; theo nhận định chung từ ph&iacute;a cộng đồng game thủ th&igrave; những game n&agrave;y dở th&igrave; chưa đ&uacute;ng m&agrave; hay th&igrave; chưa tới tầm.</p>\r\n', '429_00c-b9ac3.jpg', '1379432514', null, '0');

-- ----------------------------
-- Table structure for `tbl_tin_tuc_trang_chu`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tin_tuc_trang_chu`;
CREATE TABLE `tbl_tin_tuc_trang_chu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Hỗ trợ tài chính','Yêu cầu catalogue','Bảng giá') DEFAULT NULL,
  `title` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `date_create` int(11) NOT NULL,
  `date_update` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_tin_tuc_trang_chu
-- ----------------------------
INSERT INTO `tbl_tin_tuc_trang_chu` VALUES ('1', 'Hỗ trợ tài chính', '', '<p>\r\n	Đặc biệt th&iacute;ch hợp cho nhu cầu ti&ecirc;u d&ugrave;ng c&aacute; nh&acirc;n, g&oacute;i sản phẩm &ldquo;cho vay cầm cố giấy tờ c&oacute; gi&aacute;&rdquo; của MB cực kỳ thuận tiện v&agrave; ưu đ&atilde;i về l&atilde;i suất, cho ph&eacute;p&nbsp;bạn được vay với khoản tiền l&ecirc;n đến 100% gi&aacute; trị của c&aacute;c loại giấy tờ c&oacute; gi&aacute; đang sở hữu như thẻ tiết kiệm, chứng chỉ tiển gửi, tr&aacute;i phiếu, t&iacute;n phiếu, &hellip;Thủ tục vay vốn được giản lược tối đa , th&ecirc;m nữa, ch&uacute;ng t&ocirc;i muốn bạn ho&agrave;n to&agrave;n an t&acirc;m &nbsp;v&igrave; giấy tờ c&oacute; gi&aacute; của bạn sẽ được bảo to&agrave;n khi cất giữ tại MB.</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thủ tục đơn giản, thuận tiện, thời gian xử l&yacute; hồ sơ nhanh ch&oacute;ng: trong v&ograve;ng 30 ph&uacute;t kh&aacute;ch h&agrave;ng sẽ nhận được tiền vay;</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mức cho vay l&ecirc;n tới 100% gi&aacute; trị của GTCG;</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thời hạn cho vay linh hoạt ph&ugrave; hợp với nhu cầu của kh&aacute;ch h&agrave;ng;</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L&atilde;i suất ưu đ&atilde;i v&agrave; cạnh tranh.</p>\r\n<p>\r\n	<strong>Điều kiện vay vốn</strong></p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kh&aacute;ch h&agrave;ng c&oacute; đủ năng lực ph&aacute;p luật d&acirc;n sự v&agrave; năng lực h&agrave;nh vi d&acirc;n sự;</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kh&aacute;ch h&agrave;ng cam kết sử dụng vốn vay kh&ocirc;ng vi phạm ph&aacute;p luật.</p>\r\n<p>\r\n	<strong>Hồ sơ vay vốn</strong></p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CMND/Hộ chiếu của kh&aacute;ch h&agrave;ng hoặc giấy tờ c&oacute; gi&aacute; trị tương đương;</p>\r\n<p>\r\n	-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Giấy tờ c&oacute; gi&aacute; v&agrave; c&aacute;c giấy tờ uỷ quyền hợp ph&aacute;p (nếu c&oacute;).</p>\r\n', '1374858548', '1379431199');
INSERT INTO `tbl_tin_tuc_trang_chu` VALUES ('2', 'Yêu cầu catalogue', '', '<p>\r\n	H&atilde;y y&ecirc;u cầu những ấn phẩm giới thiệu mẫu xe bạn y&ecirc;u th&iacute;ch v&agrave; bạn sẽ c&oacute; mọi th&ocirc;ng tin tham khảm cần thiết để phục vụ cho lựa chọn của m&igrave;nh.<br />\r\n	<br />\r\n	Việc y&ecirc;u cầu catalogue rất dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng. Ch&uacute;ng t&ocirc;i sẽ gửi t&agrave;i liệu bạn y&ecirc;u cầu trong thời gian sớm nhất c&oacute; thể - v&agrave; ho&agrave;n to&agrave;n miễn ph&iacute;.</p>\r\n', '1374858544', '1379431495');
INSERT INTO `tbl_tin_tuc_trang_chu` VALUES ('3', 'Bảng giá', '', '<p>\r\n	Bảng gi&aacute; xe GL450 4MATIC<br />\r\n	Bạn c&oacute; thể tải về catalogue v&agrave; gi&aacute; xe GL 450 4MATIC do Mercedes-Benz Việt Nam ch&iacute;nh thức nhập về.<br />\r\n	<br />\r\n	Chỉ cần nhắp chuột v&agrave;o đường link dưới đ&acirc;y để bắt đầu tải về. T&agrave;i liệu tải về c&oacute; định dạng PDF. Để xem được t&agrave;i liệu n&agrave;y, bạn cần c&oacute; chương tr&igrave;nh Acrobat Reader của Adobe, bạn c&oacute; thể tải về chương tr&igrave;nh n&agrave;y từ website www.adobe.com.<br />\r\n	<br />\r\n	Mọi th&ocirc;ng tin cung cấp tr&ecirc;n trang web n&agrave;y mang t&iacute;nh chất tham khảo, nh&agrave; sản xuất bảo lưu quyền thay đổi thiết kế, th&ocirc;ng số kỹ thuật, c&aacute;c thuật ngữ v&agrave; c&aacute;c điều khoản li&ecirc;n quan đến sản phẩm v&agrave; gi&aacute; b&aacute;n.<br />\r\n	<br />\r\n	Th&ocirc;ng tin li&ecirc;n quan đến gi&aacute; xe, trang thiết bị ti&ecirc;u chuẩn, c&aacute;c qui định về ph&aacute;p l&yacute; v&agrave; ch&iacute;nh s&aacute;ch thuế được &aacute;p dụng tại nước Cộng H&ograve;a X&atilde; Hội Chủ Nghĩa Việt Nam.</p>\r\n', '1379264344', '1379431631');

-- ----------------------------
-- Table structure for `tbl_tu_van`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tu_van`;
CREATE TABLE `tbl_tu_van` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_tu_van_id` int(11) DEFAULT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `intro` text CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `hinh` varchar(500) CHARACTER SET utf8 NOT NULL,
  `date_create` int(11) NOT NULL,
  `hide` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_tu_van
-- ----------------------------
INSERT INTO `tbl_tu_van` VALUES ('1', '13', 'Thông Tin Định Cư1', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '689_Desert.jpg', '1379262723', '0');
INSERT INTO `tbl_tu_van` VALUES ('2', null, 'Thông Tin Định Cư', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '385_tintuc.jpg', '1374858544', '0');
INSERT INTO `tbl_tu_van` VALUES ('3', null, 'Thông Tin Định Cư', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '564_tintuc.jpg', '1374858541', '0');
INSERT INTO `tbl_tu_van` VALUES ('4', null, 'Thông Tin Định Cư1', 'Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ', '<p>\r\n	Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sit sagittis.Sagittis. Fusce elit ligula, Aenean. Sed laoreet. Aenean pede. hasellus porta. Ut dictum nonummy diam. Sed a leo. Cras ullamcorper nibh. Sed laoreet. Lorem ipsum dolor sito. Cras</p>\r\n', '251_tintuc.jpg', '1379093642', '0');
INSERT INTO `tbl_tu_van` VALUES ('5', null, 'test tin tuc', 'test tin tuc', '<p>\r\n	test tin tuc</p>\r\n', '627_Tulips.jpg', '1379094474', '0');
INSERT INTO `tbl_tu_van` VALUES ('6', null, 'test tu van1', '', '', '410_Tulips.jpg', '1379095080', '0');
INSERT INTO `tbl_tu_van` VALUES ('7', '17', 'test tu van2', '', '', '787_Penguins.jpg', '1379262675', '0');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL COMMENT 'Department',
  PRIMARY KEY (`id`),
  KEY `Group-User-FK` (`group_id`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `tbl_user_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='User table (Employees)';

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('2', 'Admin', 'admin', 'b3360cc45c2819fc1ea9b0f16c15fdee', 'vtriqn1@gmail.com', '1', '1');
INSERT INTO `tbl_users` VALUES ('3', 'master', 'webmaster', 'b3360cc45c2819fc1ea9b0f16c15fdee', 'tritruong@sevenart.vn', '1', '1');

-- ----------------------------
-- Table structure for `tbl_user_group`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE `tbl_user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='User Group Table (Department table)';

-- ----------------------------
-- Records of tbl_user_group
-- ----------------------------
INSERT INTO `tbl_user_group` VALUES ('1', 'Admin');
INSERT INTO `tbl_user_group` VALUES ('2', 'System');
