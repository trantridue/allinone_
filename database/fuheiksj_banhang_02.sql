-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 02, 2015 at 12:35 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";

-- 
-- Database: `fuheiksj_banhang`
-- 
-- drop database `fuheiksj_banhang`;
-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `fuheiksj_banhang` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fuheiksj_banhang`;
-- 
-- Table structure for table `brand`
-- 

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `brand`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `description` varchar(245) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `category`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `config`
-- 

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  `description` varchar(245) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `config`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `configuration`
-- 

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  `label` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

-- 
-- Dumping data for table `configuration`
-- 

INSERT INTO `configuration` VALUES (1, 'import_number_row', '21', 'NBR ROW IMPORT');
INSERT INTO `configuration` VALUES (2, 'export_number_row', '8', 'NBR ROW EXPORT');
INSERT INTO `configuration` VALUES (3, 'default_row_product_return', '5', 'NBR ROW IMPORT RETURN');
INSERT INTO `configuration` VALUES (4, 'default_password', '123456', 'DEFAULT PASSWORD');
INSERT INTO `configuration` VALUES (5, 'is_sale_for_all', '1', 'SALE ON/OFF');
INSERT INTO `configuration` VALUES (6, 'default_number_line_spend', '5', 'NBR ROW SPEND');
INSERT INTO `configuration` VALUES (7, 'listExportDefault_nbr_day_limit', '0', 'NBR DAY EXPORT');
INSERT INTO `configuration` VALUES (8, 'nbr_day_default_export_returned', '0', 'NBR DAY EXPORT RETURN');
INSERT INTO `configuration` VALUES (9, 'default_nbr_days_load_export', '10', 'NBR DAY EXPORT DEFAULT');
INSERT INTO `configuration` VALUES (10, 'bonus_ratio', '100', 'BONUS RATIO');
INSERT INTO `configuration` VALUES (11, 'init_money', '500', 'AMOUNT INIT');
INSERT INTO `configuration` VALUES (12, 'timeout', '21600', 'SYSTEM TIMEOUT');
INSERT INTO `configuration` VALUES (13, 'limit_default_customer_after_search', '100', 'NBR ROW CUS AFTER');
INSERT INTO `configuration` VALUES (14, 'limit_default_customer_before_search', '10', 'NBR ROW CUS BEFORE');
INSERT INTO `configuration` VALUES (15, 'nbr_customer_by_group_csv', '250', 'NBR CUSTOMER BY GROUP');
INSERT INTO `configuration` VALUES (16, 'nbr_news_default', '20', 'NBR NEWS DEFAULT');
INSERT INTO `configuration` VALUES (17, 'max_width_upload_img', '800', 'max_width_upload_img');
INSERT INTO `configuration` VALUES (18, 'max_height_upload_img', '600', 'max_height_upload_img');
INSERT INTO `configuration` VALUES (19, 'upload_img_quality', '1', 'upload_img_quality');
INSERT INTO `configuration` VALUES (20, 'max_img_size_upload', '2000000', 'max_img_size_upload');
INSERT INTO `configuration` VALUES (21, 'default_nbr_days_load_import', '5', 'default_nbr_days_load_import');
INSERT INTO `configuration` VALUES (22, 'sale_all_taux', '10', 'SALE TAUX');
INSERT INTO `configuration` VALUES (23, 'start_time_backup', '8', 'START TIME_BACK_UP');
INSERT INTO `configuration` VALUES (24, 'end_time_backup', '24', 'END TIME_BACK_UP');

-- --------------------------------------------------------

-- 
-- Table structure for table `customer`
-- 

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `description` varchar(245) default NULL,
  `date` datetime default NULL,
  `created_date` datetime default NULL,
  `isboss` varchar(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1289;

-- 
-- Dumping data for table `customer`
-- 

INSERT INTO `customer` VALUES (1288, 'Khach le', 'aaaaaaaaa', 'Anh khach co the doi', '2015-06-12 20:54:04', '2014-03-01 23:42:54', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `customer_order`
-- 

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` int(11) NOT NULL auto_increment,
  `customer_tel` varchar(45) NOT NULL,
  `customer_name` varchar(45) default NULL,
  `product_code` varchar(16) default NULL,
  `color` varchar(45) NOT NULL,
  `size` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL default '1',
  `date` datetime NOT NULL,
  `description` varchar(255) default NULL,
  `status` varchar(1) default 'N',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `customer_order`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `customer_reservation_histo`
-- 

DROP TABLE IF EXISTS `customer_reservation_histo`;
CREATE TABLE IF NOT EXISTS `customer_reservation_histo` (
  `id` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(45) NOT NULL default '0',
  `status` varchar(1) NOT NULL default 'Y',
  `date` datetime NOT NULL,
  `complete_date` datetime default NULL,
  `reserved_facture` varchar(45) default NULL,
  `complete_facture` varchar(45) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_customer_reservation_histo_customer1_idx` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `customer_reservation_histo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `export_facture`
-- 

DROP TABLE IF EXISTS `export_facture`;
CREATE TABLE IF NOT EXISTS `export_facture` (
  `code` varchar(45) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `description` varchar(1000) default NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `isonline` varchar(1) default 'N',
  PRIMARY KEY  (`code`),
  KEY `fk_export_facture_customer1_idx` (`customer_id`),
  KEY `fk_export_facture_shop1_idx` (`shop_id`),
  KEY `fk_export_facture_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `export_facture`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `export_facture_product`
-- 

DROP TABLE IF EXISTS `export_facture_product`;
CREATE TABLE IF NOT EXISTS `export_facture_product` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(16) NOT NULL,
  `quantity` int(11) NOT NULL default '0',
  `export_price` float NOT NULL default '0',
  `export_facture_code` varchar(45) NOT NULL,
  `re_qty` int(11) NOT NULL default '0',
  `re_date` datetime default NULL,
  `re_description` varchar(245) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_export_facture_product_product1_idx` (`product_code`),
  KEY `fk_export_facture_product_export_facture1_idx` (`export_facture_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `export_facture_product`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `export_facture_trace`
-- 

DROP TABLE IF EXISTS `export_facture_trace`;
CREATE TABLE IF NOT EXISTS `export_facture_trace` (
  `id` int(11) NOT NULL auto_increment,
  `export_facture_code` varchar(45) NOT NULL,
  `total` float NOT NULL default '0',
  `debt` float NOT NULL default '0',
  `reserved` float NOT NULL default '0',
  `order` float NOT NULL default '0',
  `customer_give` float NOT NULL default '0',
  `give_customer` float NOT NULL default '0',
  `bonus_used` float NOT NULL default '0',
  `return_amount` float NOT NULL default '0',
  `shop_id` int(11) NOT NULL,
  `amount` float NOT NULL default '0',
  `customer_id` int(11) NOT NULL,
  `bonus_ratio` float NOT NULL default '100',
  PRIMARY KEY  (`id`),
  KEY `fk_export_facture_trace_export_facture1_idx` (`export_facture_code`),
  KEY `fk_export_facture_trace_shop1_idx` (`shop_id`),
  KEY `fk_export_facture_trace_customer1_idx` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `export_facture_trace`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fund`
-- 

DROP TABLE IF EXISTS `fund`;
CREATE TABLE IF NOT EXISTS `fund` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `fund`
-- 

INSERT INTO `fund` VALUES (1, 'KÉT SẮT', 'KETSAT');
INSERT INTO `fund` VALUES (8, 'OCEANBANK', 'OCEANBANK');
INSERT INTO `fund` VALUES (2, 'Anh Minh', NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `fund_change_histo`
-- 

DROP TABLE IF EXISTS `fund_change_histo`;
CREATE TABLE IF NOT EXISTS `fund_change_histo` (
  `id` int(11) NOT NULL auto_increment,
  `fund_id` int(11) NOT NULL,
  `amount` float NOT NULL default '0',
  `date` datetime NOT NULL,
  `description` varchar(245) default NULL,
  `ratio` float NOT NULL default '1',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_fund_change_histo_fund1_idx` (`fund_id`),
  KEY `fk_fund_change_histo_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `fund_change_histo`
-- 

INSERT INTO `fund_change_histo` VALUES (1, 2, 20000, '2015-10-02 00:25:07', 'gửi 20M', 1, 1);
INSERT INTO `fund_change_histo` VALUES (2, 2, -2160, '2015-10-01 00:29:00', 'See spend : Mua thanh ray, thanh đỡ kính (Anh Minh   Anh Duệ)', 1, 1);
INSERT INTO `fund_change_histo` VALUES (3, 2, -34, '2015-10-02 00:29:00', 'See spend : Mua đồ thắp hương', 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `import_facture`
-- 

DROP TABLE IF EXISTS `import_facture`;
CREATE TABLE IF NOT EXISTS `import_facture` (
  `code` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(1000) default NULL,
  `provider_id` int(11) NOT NULL,
  `deadline` datetime default NULL,
  `link` varchar(255) default NULL,
  PRIMARY KEY  (`code`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_import_facture_provider1_idx` (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `import_facture`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `inout_type`
-- 

DROP TABLE IF EXISTS `inout_type`;
CREATE TABLE IF NOT EXISTS `inout_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `inout_type`
-- 

INSERT INTO `inout_type` VALUES (1, 'Thêm tiền');
INSERT INTO `inout_type` VALUES (2, 'Rút tiền');

-- --------------------------------------------------------

-- 
-- Table structure for table `money_inout`
-- 

DROP TABLE IF EXISTS `money_inout`;
CREATE TABLE IF NOT EXISTS `money_inout` (
  `id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `amount` float NOT NULL default '0',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_money_inout_shop1_idx` (`shop_id`),
  KEY `fk_money_inout_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `money_inout`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `description` varchar(1000) default NULL,
  `date` datetime default NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_news_shop1_idx` (`shop_id`),
  KEY `fk_news_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `news`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product`
-- 

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `code` varchar(16) NOT NULL,
  `name` varchar(245) NOT NULL,
  `category_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `sex_id` int(11) NOT NULL,
  `export_price` float NOT NULL,
  `description` varchar(1000) default NULL,
  `brand_id` int(11) NOT NULL,
  `sale` float NOT NULL default '0',
  `link` varchar(255) default NULL,
  PRIMARY KEY  (`code`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_product_product_type1_idx` (`category_id`),
  KEY `fk_product_season1_idx` (`season_id`),
  KEY `fk_product_sex1_idx` (`sex_id`),
  KEY `fk_product_brand1_idx` (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `product`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product_deviation`
-- 

DROP TABLE IF EXISTS `product_deviation`;
CREATE TABLE IF NOT EXISTS `product_deviation` (
  `product_code` varchar(16) NOT NULL,
  `quantity` float NOT NULL default '0',
  `date` datetime default NULL,
  `description` varchar(245) default NULL,
  KEY `fk_product_deviation_product1_idx` (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `product_deviation`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product_import`
-- 

DROP TABLE IF EXISTS `product_import`;
CREATE TABLE IF NOT EXISTS `product_import` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(16) NOT NULL,
  `import_facture_code` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `import_price` float NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_product_import_product1_idx` (`product_code`),
  KEY `fk_product_import_import_facture1_idx` (`import_facture_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `product_import`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product_return`
-- 

DROP TABLE IF EXISTS `product_return`;
CREATE TABLE IF NOT EXISTS `product_return` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime default NULL,
  `description` varchar(245) default NULL,
  `provider_id` int(11) NOT NULL,
  `return_price` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fk_product_return_provider1_idx` (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `product_return`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `property`
-- 

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `id` int(11) NOT NULL auto_increment,
  `date` date NOT NULL,
  `amount` float NOT NULL default '0',
  `ket` float default '0',
  `loan` float default '0',
  `fund` float default '0',
  `store` float default '0',
  `debt` float default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `property`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `provider`
-- 

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `address` varchar(245) default NULL,
  `description` varchar(245) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `provider`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `provider_paid`
-- 

DROP TABLE IF EXISTS `provider_paid`;
CREATE TABLE IF NOT EXISTS `provider_paid` (
  `id` int(11) NOT NULL auto_increment,
  `provider_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(245) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_provider_paid_provider1_idx` (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `provider_paid`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `provider_paid_fund_change_histo`
-- 

DROP TABLE IF EXISTS `provider_paid_fund_change_histo`;
CREATE TABLE IF NOT EXISTS `provider_paid_fund_change_histo` (
  `id` int(11) NOT NULL auto_increment,
  `fund_change_histo_id` int(11) NOT NULL,
  `provider_paid_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_provider_paid_fund_change_fund_change_histo1_idx` (`fund_change_histo_id`),
  KEY `fk_provider_paid_fund_change_provider_paid1_idx` (`provider_paid_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `provider_paid_fund_change_histo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `role`
-- 

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(8) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `role`
-- 

INSERT INTO `role` VALUES (1, 'admin', 'Quản Trị');
INSERT INTO `role` VALUES (2, 'editor', 'Nhập Liệu');
INSERT INTO `role` VALUES (3, 'employee', 'Nhân Viên');

-- --------------------------------------------------------

-- 
-- Table structure for table `season`
-- 

DROP TABLE IF EXISTS `season`;
CREATE TABLE IF NOT EXISTS `season` (
  `id` int(11) NOT NULL auto_increment,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `season`
-- 

INSERT INTO `season` VALUES (1, '2014-01-01', '2014-03-31', 'SPRING');
INSERT INTO `season` VALUES (2, '2014-04-01', '2014-06-30', 'SUMMER');
INSERT INTO `season` VALUES (3, '2014-07-01', '2014-09-30', 'AUTUMN');
INSERT INTO `season` VALUES (4, '2014-10-01', '2014-12-31', 'WINTER');

-- --------------------------------------------------------

-- 
-- Table structure for table `sex`
-- 

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) NOT NULL,
  `name` varchar(6) NOT NULL default 'woman',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `sex`
-- 

INSERT INTO `sex` VALUES (1, 'WOMAN');
INSERT INTO `sex` VALUES (2, 'MAN');

-- --------------------------------------------------------

-- 
-- Table structure for table `shop`
-- 

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `address` varchar(256) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `shop`
-- 

INSERT INTO `shop` VALUES (1, 'shop1', '19 Vạn phúc Hà Đông Hà Nội', '2015-06-12 22:38:34');
INSERT INTO `shop` VALUES (2, 'shop2', 'Số 3 Lê Văn Lương - Vạn Phúc', '2015-06-12 22:38:34');
INSERT INTO `shop` VALUES (3, 'shop3', 'Số 5 Lê Văn Lương - Vạn Phúc', '2015-06-12 22:38:34');

-- --------------------------------------------------------

-- 
-- Table structure for table `spend`
-- 

DROP TABLE IF EXISTS `spend`;
CREATE TABLE IF NOT EXISTS `spend` (
  `id` int(11) NOT NULL auto_increment,
  `spend_category_id` int(11) NOT NULL,
  `amount` float NOT NULL default '0',
  `user_id` int(11) NOT NULL,
  `description` varchar(245) default NULL,
  `date` datetime default NULL,
  `spend_for_id` int(11) NOT NULL,
  `spend_type_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_spend_spend_category1_idx` (`spend_category_id`),
  KEY `fk_spend_user1_idx` (`user_id`),
  KEY `fk_spend_spend_for1_idx` (`spend_for_id`),
  KEY `fk_spend_spend_type1_idx` (`spend_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `spend`
-- 

INSERT INTO `spend` VALUES (1, 1, 2160, 1, 'Mua thanh ray, thanh đỡ kính (Anh Minh   Anh Duệ)', '2015-10-01 00:29:00', 2, 2);
INSERT INTO `spend` VALUES (2, 1, 34, 1, 'Mua đồ thắp hương', '2015-10-02 00:29:00', 2, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `spend_category`
-- 

DROP TABLE IF EXISTS `spend_category`;
CREATE TABLE IF NOT EXISTS `spend_category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `spend_category`
-- 

INSERT INTO `spend_category` VALUES (1, 'Chi tiêu hàng ngày');
INSERT INTO `spend_category` VALUES (2, 'Giao thông');
INSERT INTO `spend_category` VALUES (3, 'Y tế');
INSERT INTO `spend_category` VALUES (4, 'Giáo dục');
INSERT INTO `spend_category` VALUES (5, 'Ngoại giao');
INSERT INTO `spend_category` VALUES (6, 'Viễn thông');
INSERT INTO `spend_category` VALUES (7, 'Khác');
INSERT INTO `spend_category` VALUES (8, 'Lấy quần áo');

-- --------------------------------------------------------

-- 
-- Table structure for table `spend_for`
-- 

DROP TABLE IF EXISTS `spend_for`;
CREATE TABLE IF NOT EXISTS `spend_for` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `spend_for`
-- 

INSERT INTO `spend_for` VALUES (1, 'Gia đình');
INSERT INTO `spend_for` VALUES (2, 'Cửa hàng');

-- --------------------------------------------------------

-- 
-- Table structure for table `spend_type`
-- 

DROP TABLE IF EXISTS `spend_type`;
CREATE TABLE IF NOT EXISTS `spend_type` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `spend_type`
-- 

INSERT INTO `spend_type` VALUES (1, 'Khấu hao ngay');
INSERT INTO `spend_type` VALUES (2, 'Khấu hao dần');
INSERT INTO `spend_type` VALUES (3, 'Không khấu hao');

-- 
-- Table structure for table `user`
-- 

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) default NULL,
  `phone_number` varchar(16) default NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) default 'y',
  `status` varchar(1) NOT NULL default 'Y',
  `start_date` datetime NOT NULL default '2014-01-01 08:00:00',
  `end_date` datetime default '2020-12-31 22:00:00',
  `description` varchar(500) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_user_shop_idx` (`shop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Employees Information' AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, 1, 'Anh Minh', 'trantridue@gmail.com', '0918888398', 'admin', '4eae18cf9e54a0f62b44176d074cbe2f', 'y', 'y', '2013-01-01 09:07:18', '2015-08-19 20:19:40', 'nothing');
INSERT INTO `user` VALUES (2, 1, 'Chị Châu', 'zabuza.vn@gmail.com', '0966807709', 'chau ', 'e10adc3949ba59abbe56e057f20f883e', 'y', 'y', '2015-06-15 09:08:37', '2015-09-04 08:00:41', 'nothing');
INSERT INTO `user` VALUES (3, 1, 'Bảo', 'baobao@gmail.com', '01649785255', 'bao', 'e10adc3949ba59abbe56e057f20f883e', 'y', 'y', '2013-06-01 20:47:12', '2015-09-21 20:34:22', 'nothing');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_role`
-- 

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL auto_increment,
  `role_id` int(11) NOT NULL,
  `description` varchar(255) default NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`user_id`),
  KEY `fk_user_role_role_idx` (`role_id`),
  KEY `fk_user_role_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `user_role`
-- 

INSERT INTO `user_role` VALUES (1, 1, NULL, 1);

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `customer_reservation_histo`
-- 
ALTER TABLE `customer_reservation_histo`
  ADD CONSTRAINT `fk_customer_reservation_histo_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `export_facture`
-- 
ALTER TABLE `export_facture`
  ADD CONSTRAINT `fk_export_facture_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_export_facture_shop1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_export_facture_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `export_facture_product`
-- 
ALTER TABLE `export_facture_product`
  ADD CONSTRAINT `fk_export_facture_product_export_facture1` FOREIGN KEY (`export_facture_code`) REFERENCES `export_facture` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_export_facture_product_product1` FOREIGN KEY (`product_code`) REFERENCES `product` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `export_facture_trace`
-- 
ALTER TABLE `export_facture_trace`
  ADD CONSTRAINT `fk_export_facture_trace_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_export_facture_trace_export_facture1` FOREIGN KEY (`export_facture_code`) REFERENCES `export_facture` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_export_facture_trace_shop1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `fund_change_histo`
-- 
ALTER TABLE `fund_change_histo`
  ADD CONSTRAINT `fk_fund_change_histo_fund1` FOREIGN KEY (`fund_id`) REFERENCES `fund` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fund_change_histo_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `import_facture`
-- 
ALTER TABLE `import_facture`
  ADD CONSTRAINT `fk_import_facture_provider1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `money_inout`
-- 
ALTER TABLE `money_inout`
  ADD CONSTRAINT `fk_money_inout_shop1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_money_inout_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `news`
-- 
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_shop1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_news_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `product`
-- 
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_season1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_sex1` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `product_deviation`
-- 
ALTER TABLE `product_deviation`
  ADD CONSTRAINT `fk_product_deviation_product1` FOREIGN KEY (`product_code`) REFERENCES `product` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `product_import`
-- 
ALTER TABLE `product_import`
  ADD CONSTRAINT `fk_product_import_import_facture1` FOREIGN KEY (`import_facture_code`) REFERENCES `import_facture` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_import_product1` FOREIGN KEY (`product_code`) REFERENCES `product` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `product_return`
-- 
ALTER TABLE `product_return`
  ADD CONSTRAINT `fk_product_return_provider1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `provider_paid`
-- 
ALTER TABLE `provider_paid`
  ADD CONSTRAINT `fk_provider_paid_provider1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `provider_paid_fund_change_histo`
-- 
ALTER TABLE `provider_paid_fund_change_histo`
  ADD CONSTRAINT `fk_provider_paid_fund_change_fund_change_histo1` FOREIGN KEY (`fund_change_histo_id`) REFERENCES `fund_change_histo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_provider_paid_fund_change_provider_paid1` FOREIGN KEY (`provider_paid_id`) REFERENCES `provider_paid` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

-- 
-- Constraints for table `spend`
-- 
ALTER TABLE `spend`
  ADD CONSTRAINT `fk_spend_spend_category1` FOREIGN KEY (`spend_category_id`) REFERENCES `spend_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_spend_spend_for1` FOREIGN KEY (`spend_for_id`) REFERENCES `spend_for` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_spend_spend_type1` FOREIGN KEY (`spend_type_id`) REFERENCES `spend_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_spend_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `user`
-- 
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_shop` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Constraints for table `user_role`
-- 
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_user_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_role_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
