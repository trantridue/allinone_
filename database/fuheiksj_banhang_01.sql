-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 02, 2015 at 12:19 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `fuheiksj_banhang`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `brand`
-- 

CREATE TABLE `brand` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

-- 
-- Dumping data for table `brand`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `category`
-- 

CREATE TABLE `category` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `description` varchar(245) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- 
-- Dumping data for table `category`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `config`
-- 

CREATE TABLE `config` (
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

CREATE TABLE `configuration` (
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

CREATE TABLE `customer` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `description` varchar(245) default NULL,
  `date` datetime default NULL,
  `created_date` datetime default NULL,
  `isboss` varchar(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6558 ;

-- 
-- Dumping data for table `customer`
-- 

INSERT INTO `customer` VALUES (1288, 'Khach le', 'aaaaaaaaa', 'Anh khach co the doi', '2015-06-12 20:54:04', '2014-03-01 23:42:54', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `customer_order`
-- 

CREATE TABLE `customer_order` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `customer_order`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `customer_reservation_histo`
-- 

CREATE TABLE `customer_reservation_histo` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

-- 
-- Dumping data for table `customer_reservation_histo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `export_facture`
-- 

CREATE TABLE `export_facture` (
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

CREATE TABLE `export_facture_product` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22349 ;

-- 
-- Dumping data for table `export_facture_product`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `export_facture_trace`
-- 

CREATE TABLE `export_facture_trace` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14809 ;

-- 
-- Dumping data for table `export_facture_trace`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `fund`
-- 

CREATE TABLE `fund` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `fund`
-- 

INSERT INTO `fund` VALUES (1, 'KÉT SẮT', 'KETSAT');
INSERT INTO `fund` VALUES (8, 'OCEANBANK', 'OCEANBANK');

-- --------------------------------------------------------

-- 
-- Table structure for table `fund_change_histo`
-- 

CREATE TABLE `fund_change_histo` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1490 ;

-- 
-- Dumping data for table `fund_change_histo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `import_facture`
-- 

CREATE TABLE `import_facture` (
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

CREATE TABLE `inout_type` (
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

CREATE TABLE `money_inout` (
  `id` int(11) NOT NULL auto_increment,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `amount` float NOT NULL default '0',
  `description` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_money_inout_shop1_idx` (`shop_id`),
  KEY `fk_money_inout_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3350 ;

-- 
-- Dumping data for table `money_inout`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

CREATE TABLE `news` (
  `id` int(11) NOT NULL auto_increment,
  `description` varchar(1000) default NULL,
  `date` datetime default NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_news_shop1_idx` (`shop_id`),
  KEY `fk_news_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=639 ;

-- 
-- Dumping data for table `news`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product`
-- 

CREATE TABLE `product` (
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

CREATE TABLE `product_deviation` (
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

CREATE TABLE `product_import` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(16) NOT NULL,
  `import_facture_code` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `import_price` float NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_product_import_product1_idx` (`product_code`),
  KEY `fk_product_import_import_facture1_idx` (`import_facture_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2053 ;

-- 
-- Dumping data for table `product_import`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `product_return`
-- 

CREATE TABLE `product_return` (
  `id` int(11) NOT NULL auto_increment,
  `product_code` varchar(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime default NULL,
  `description` varchar(245) default NULL,
  `provider_id` int(11) NOT NULL,
  `return_price` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fk_product_return_provider1_idx` (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=366 ;

-- 
-- Dumping data for table `product_return`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `property`
-- 

CREATE TABLE `property` (
  `id` int(11) NOT NULL auto_increment,
  `date` date NOT NULL,
  `amount` float NOT NULL default '0',
  `ket` float default '0',
  `loan` float default '0',
  `fund` float default '0',
  `store` float default '0',
  `debt` float default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=535 ;

-- 
-- Dumping data for table `property`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `provider`
-- 

CREATE TABLE `provider` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `address` varchar(245) default NULL,
  `description` varchar(245) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

-- 
-- Dumping data for table `provider`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `provider_paid`
-- 

CREATE TABLE `provider_paid` (
  `id` int(11) NOT NULL auto_increment,
  `provider_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(245) default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_provider_paid_provider1_idx` (`provider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=364 ;

-- 
-- Dumping data for table `provider_paid`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `provider_paid_fund_change_histo`
-- 

CREATE TABLE `provider_paid_fund_change_histo` (
  `id` int(11) NOT NULL auto_increment,
  `fund_change_histo_id` int(11) NOT NULL,
  `provider_paid_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_provider_paid_fund_change_fund_change_histo1_idx` (`fund_change_histo_id`),
  KEY `fk_provider_paid_fund_change_provider_paid1_idx` (`provider_paid_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

-- 
-- Dumping data for table `provider_paid_fund_change_histo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `role`
-- 

CREATE TABLE `role` (
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

CREATE TABLE `season` (
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

CREATE TABLE `sex` (
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

CREATE TABLE `shop` (
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

CREATE TABLE `spend` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1435 ;

-- 
-- Dumping data for table `spend`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `spend_category`
-- 

CREATE TABLE `spend_category` (
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

CREATE TABLE `spend_for` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `spend_for`
-- 

INSERT INTO `spend_for` VALUES (1, 'Gia đình');
INSERT INTO `spend_for` VALUES (2, 'Cửa hàng');
INSERT INTO `spend_for` VALUES (3, 'Khác');

-- --------------------------------------------------------

-- 
-- Table structure for table `spend_type`
-- 

CREATE TABLE `spend_type` (
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

-- --------------------------------------------------------

-- 
-- Table structure for table `stock_all`
-- 

CREATE TABLE `stock_all` (
  `code` varchar(16) NOT NULL,
  `in_stock` double default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `stock_all`
-- 

INSERT INTO `stock_all` VALUES ('0086', 2);
INSERT INTO `stock_all` VALUES ('0163', -2);
INSERT INTO `stock_all` VALUES ('0281', -1);
INSERT INTO `stock_all` VALUES ('0290', -1);
INSERT INTO `stock_all` VALUES ('0352', -1);
INSERT INTO `stock_all` VALUES ('0421', -1);
INSERT INTO `stock_all` VALUES ('0480', -5);
INSERT INTO `stock_all` VALUES ('0485', -2);
INSERT INTO `stock_all` VALUES ('0487', -1);
INSERT INTO `stock_all` VALUES ('0489', -1);
INSERT INTO `stock_all` VALUES ('0491', -2);
INSERT INTO `stock_all` VALUES ('0492', -3);
INSERT INTO `stock_all` VALUES ('0506', -2);
INSERT INTO `stock_all` VALUES ('0507', 0);
INSERT INTO `stock_all` VALUES ('0570', -7);
INSERT INTO `stock_all` VALUES ('0584', -4);
INSERT INTO `stock_all` VALUES ('0588', -3);
INSERT INTO `stock_all` VALUES ('0589', -1);
INSERT INTO `stock_all` VALUES ('0590', -2);
INSERT INTO `stock_all` VALUES ('0636', -3);
INSERT INTO `stock_all` VALUES ('0637', -2);
INSERT INTO `stock_all` VALUES ('0639', -1);
INSERT INTO `stock_all` VALUES ('0641', -1);
INSERT INTO `stock_all` VALUES ('0645', -2);
INSERT INTO `stock_all` VALUES ('0651', -2);
INSERT INTO `stock_all` VALUES ('0652', -1);
INSERT INTO `stock_all` VALUES ('0676', -11);
INSERT INTO `stock_all` VALUES ('0681', -10);
INSERT INTO `stock_all` VALUES ('0685', -4);
INSERT INTO `stock_all` VALUES ('0687', -3);
INSERT INTO `stock_all` VALUES ('0688', -6);
INSERT INTO `stock_all` VALUES ('0690', -5);
INSERT INTO `stock_all` VALUES ('0693', -3);
INSERT INTO `stock_all` VALUES ('0696', -9);
INSERT INTO `stock_all` VALUES ('0717', -4);
INSERT INTO `stock_all` VALUES ('0737', -9);
INSERT INTO `stock_all` VALUES ('0738', -2);
INSERT INTO `stock_all` VALUES ('0739', -3);
INSERT INTO `stock_all` VALUES ('0748', -7);
INSERT INTO `stock_all` VALUES ('0750', -5);
INSERT INTO `stock_all` VALUES ('0778', -1);
INSERT INTO `stock_all` VALUES ('0779', -4);
INSERT INTO `stock_all` VALUES ('0804', -1);
INSERT INTO `stock_all` VALUES ('0825', -6);
INSERT INTO `stock_all` VALUES ('0834', -1);
INSERT INTO `stock_all` VALUES ('0835', -4);
INSERT INTO `stock_all` VALUES ('0843', -8);
INSERT INTO `stock_all` VALUES ('0844', -15);
INSERT INTO `stock_all` VALUES ('0869', -6);
INSERT INTO `stock_all` VALUES ('0872', -1);
INSERT INTO `stock_all` VALUES ('0889', -8);
INSERT INTO `stock_all` VALUES ('0894', -1);
INSERT INTO `stock_all` VALUES ('0912', -1);
INSERT INTO `stock_all` VALUES ('0916', -2);
INSERT INTO `stock_all` VALUES ('0943', -6);
INSERT INTO `stock_all` VALUES ('0959', -2);
INSERT INTO `stock_all` VALUES ('0962', -1);
INSERT INTO `stock_all` VALUES ('0965', -4);
INSERT INTO `stock_all` VALUES ('0991', -2);
INSERT INTO `stock_all` VALUES ('0992', -1);
INSERT INTO `stock_all` VALUES ('1001', -4);
INSERT INTO `stock_all` VALUES ('1006', -1);
INSERT INTO `stock_all` VALUES ('1017', 1);
INSERT INTO `stock_all` VALUES ('1020', -3);
INSERT INTO `stock_all` VALUES ('1029', -2);
INSERT INTO `stock_all` VALUES ('1044', -17);
INSERT INTO `stock_all` VALUES ('1050', -2);
INSERT INTO `stock_all` VALUES ('1051', -7);
INSERT INTO `stock_all` VALUES ('1052', -1);
INSERT INTO `stock_all` VALUES ('1059', -9);
INSERT INTO `stock_all` VALUES ('1063', -4);
INSERT INTO `stock_all` VALUES ('1083', -20);
INSERT INTO `stock_all` VALUES ('1085', -4);
INSERT INTO `stock_all` VALUES ('1086', -1);
INSERT INTO `stock_all` VALUES ('1087', -4);
INSERT INTO `stock_all` VALUES ('1092', -2);
INSERT INTO `stock_all` VALUES ('1096', -3);
INSERT INTO `stock_all` VALUES ('1112', -12);
INSERT INTO `stock_all` VALUES ('1125', -1);
INSERT INTO `stock_all` VALUES ('1136', -1);
INSERT INTO `stock_all` VALUES ('1138', -3);
INSERT INTO `stock_all` VALUES ('1146', -2);
INSERT INTO `stock_all` VALUES ('1158', -1);
INSERT INTO `stock_all` VALUES ('1163', -2);
INSERT INTO `stock_all` VALUES ('1165', -1);
INSERT INTO `stock_all` VALUES ('1168', -3);
INSERT INTO `stock_all` VALUES ('1183', -9);
INSERT INTO `stock_all` VALUES ('1187', -6);
INSERT INTO `stock_all` VALUES ('1190', -13);
INSERT INTO `stock_all` VALUES ('1193', -2);
INSERT INTO `stock_all` VALUES ('1198', 0);
INSERT INTO `stock_all` VALUES ('1206', -3);
INSERT INTO `stock_all` VALUES ('1224', -1);
INSERT INTO `stock_all` VALUES ('1226', -1);
INSERT INTO `stock_all` VALUES ('1282', -1);
INSERT INTO `stock_all` VALUES ('1321', -1);
INSERT INTO `stock_all` VALUES ('1334', -5);
INSERT INTO `stock_all` VALUES ('1335', 1);
INSERT INTO `stock_all` VALUES ('1337', -2);
INSERT INTO `stock_all` VALUES ('1342', -1);
INSERT INTO `stock_all` VALUES ('1344', -1);
INSERT INTO `stock_all` VALUES ('1347', -4);
INSERT INTO `stock_all` VALUES ('1391', -18);
INSERT INTO `stock_all` VALUES ('1392', 0);
INSERT INTO `stock_all` VALUES ('1393', -1);
INSERT INTO `stock_all` VALUES ('1394', 2);
INSERT INTO `stock_all` VALUES ('1414', 0);
INSERT INTO `stock_all` VALUES ('1435', -1);
INSERT INTO `stock_all` VALUES ('1459', -86);
INSERT INTO `stock_all` VALUES ('1478', -6);
INSERT INTO `stock_all` VALUES ('1479', 0);
INSERT INTO `stock_all` VALUES ('1493', -19);
INSERT INTO `stock_all` VALUES ('1498', 0);
INSERT INTO `stock_all` VALUES ('1499', -1);
INSERT INTO `stock_all` VALUES ('1500', 1);
INSERT INTO `stock_all` VALUES ('1504', -2);
INSERT INTO `stock_all` VALUES ('1512', -1);
INSERT INTO `stock_all` VALUES ('1528', -1);
INSERT INTO `stock_all` VALUES ('1530', -2);
INSERT INTO `stock_all` VALUES ('1536', 3);
INSERT INTO `stock_all` VALUES ('1539', -1);
INSERT INTO `stock_all` VALUES ('1540', -1);
INSERT INTO `stock_all` VALUES ('1555', -7);
INSERT INTO `stock_all` VALUES ('1558', -9);
INSERT INTO `stock_all` VALUES ('1561', -1);
INSERT INTO `stock_all` VALUES ('1572', 0);
INSERT INTO `stock_all` VALUES ('1576', -1);
INSERT INTO `stock_all` VALUES ('1579', 10);
INSERT INTO `stock_all` VALUES ('1581', 3);
INSERT INTO `stock_all` VALUES ('1585', -1);
INSERT INTO `stock_all` VALUES ('1587', -9);
INSERT INTO `stock_all` VALUES ('1590', 7);
INSERT INTO `stock_all` VALUES ('1593', 4);
INSERT INTO `stock_all` VALUES ('1597', 2);
INSERT INTO `stock_all` VALUES ('1598', 0);
INSERT INTO `stock_all` VALUES ('1600', -2);
INSERT INTO `stock_all` VALUES ('1605', -1);
INSERT INTO `stock_all` VALUES ('1608', -1);
INSERT INTO `stock_all` VALUES ('1615', -2);
INSERT INTO `stock_all` VALUES ('1616', 3);
INSERT INTO `stock_all` VALUES ('1628', -1);
INSERT INTO `stock_all` VALUES ('1635', -7);
INSERT INTO `stock_all` VALUES ('1639', -2);
INSERT INTO `stock_all` VALUES ('1651', -1);
INSERT INTO `stock_all` VALUES ('1669', -1);
INSERT INTO `stock_all` VALUES ('1673', -9);
INSERT INTO `stock_all` VALUES ('1703', 17);
INSERT INTO `stock_all` VALUES ('1705', 6);
INSERT INTO `stock_all` VALUES ('1721', 0);
INSERT INTO `stock_all` VALUES ('1723', -3);
INSERT INTO `stock_all` VALUES ('1725', -4);
INSERT INTO `stock_all` VALUES ('1726', -2);
INSERT INTO `stock_all` VALUES ('1727', -1);
INSERT INTO `stock_all` VALUES ('1729', -6);
INSERT INTO `stock_all` VALUES ('1730', -4);
INSERT INTO `stock_all` VALUES ('1733', -5);
INSERT INTO `stock_all` VALUES ('1734', -4);
INSERT INTO `stock_all` VALUES ('1735', -11);
INSERT INTO `stock_all` VALUES ('1736', -2);
INSERT INTO `stock_all` VALUES ('1738', -4);
INSERT INTO `stock_all` VALUES ('1739', -9);
INSERT INTO `stock_all` VALUES ('1740', -4);
INSERT INTO `stock_all` VALUES ('1762', -4);
INSERT INTO `stock_all` VALUES ('1763', -2);
INSERT INTO `stock_all` VALUES ('1764', -10);
INSERT INTO `stock_all` VALUES ('1765', -4);
INSERT INTO `stock_all` VALUES ('1767', -6);
INSERT INTO `stock_all` VALUES ('1768', 46);
INSERT INTO `stock_all` VALUES ('1769', 4);
INSERT INTO `stock_all` VALUES ('1776', 0);
INSERT INTO `stock_all` VALUES ('1779', 6);
INSERT INTO `stock_all` VALUES ('1782', 1);
INSERT INTO `stock_all` VALUES ('1789', -13);
INSERT INTO `stock_all` VALUES ('1823', 7);
INSERT INTO `stock_all` VALUES ('1825', 8);
INSERT INTO `stock_all` VALUES ('1828', 1);
INSERT INTO `stock_all` VALUES ('1848', -3);
INSERT INTO `stock_all` VALUES ('1849', 3);
INSERT INTO `stock_all` VALUES ('1850', -9);
INSERT INTO `stock_all` VALUES ('1851', -6);
INSERT INTO `stock_all` VALUES ('1854', -2);
INSERT INTO `stock_all` VALUES ('1860', -1);
INSERT INTO `stock_all` VALUES ('1862', 15);
INSERT INTO `stock_all` VALUES ('1864', 24);
INSERT INTO `stock_all` VALUES ('1865', 2);
INSERT INTO `stock_all` VALUES ('1866', -4);
INSERT INTO `stock_all` VALUES ('1872', -1);
INSERT INTO `stock_all` VALUES ('1879', -25);
INSERT INTO `stock_all` VALUES ('1881', 0);
INSERT INTO `stock_all` VALUES ('1929', -2);
INSERT INTO `stock_all` VALUES ('1932', -6);
INSERT INTO `stock_all` VALUES ('1939', 5);
INSERT INTO `stock_all` VALUES ('1943', -8);
INSERT INTO `stock_all` VALUES ('1944', -8);
INSERT INTO `stock_all` VALUES ('1945', 2);
INSERT INTO `stock_all` VALUES ('1946', -3);
INSERT INTO `stock_all` VALUES ('1949', -10);
INSERT INTO `stock_all` VALUES ('1953', 3);
INSERT INTO `stock_all` VALUES ('1954', 0);
INSERT INTO `stock_all` VALUES ('1955', -6);
INSERT INTO `stock_all` VALUES ('1956', -6);
INSERT INTO `stock_all` VALUES ('1957', -10);
INSERT INTO `stock_all` VALUES ('1958', -9);
INSERT INTO `stock_all` VALUES ('1959', -3);
INSERT INTO `stock_all` VALUES ('1960', -10);
INSERT INTO `stock_all` VALUES ('1966', -1);
INSERT INTO `stock_all` VALUES ('1967', -1);
INSERT INTO `stock_all` VALUES ('1975', -5);
INSERT INTO `stock_all` VALUES ('1976', -10);
INSERT INTO `stock_all` VALUES ('1977', -14);
INSERT INTO `stock_all` VALUES ('1978', -9);
INSERT INTO `stock_all` VALUES ('1979', -9);
INSERT INTO `stock_all` VALUES ('1980', -15);
INSERT INTO `stock_all` VALUES ('1981', -15);
INSERT INTO `stock_all` VALUES ('1982', -4);
INSERT INTO `stock_all` VALUES ('1983', -2);
INSERT INTO `stock_all` VALUES ('1986', -20);
INSERT INTO `stock_all` VALUES ('1987', 1);
INSERT INTO `stock_all` VALUES ('1989', -4);
INSERT INTO `stock_all` VALUES ('1990', -2);
INSERT INTO `stock_all` VALUES ('1991', -6);
INSERT INTO `stock_all` VALUES ('1992', -16);
INSERT INTO `stock_all` VALUES ('1993', -22);
INSERT INTO `stock_all` VALUES ('1995', -10);
INSERT INTO `stock_all` VALUES ('1998', -5);
INSERT INTO `stock_all` VALUES ('2001', 13);
INSERT INTO `stock_all` VALUES ('2009', -25);
INSERT INTO `stock_all` VALUES ('2010', -1);
INSERT INTO `stock_all` VALUES ('2011', -13);
INSERT INTO `stock_all` VALUES ('2012', -20);
INSERT INTO `stock_all` VALUES ('2015', -2);
INSERT INTO `stock_all` VALUES ('2018', -10);
INSERT INTO `stock_all` VALUES ('2026', 10);
INSERT INTO `stock_all` VALUES ('2029', -1);
INSERT INTO `stock_all` VALUES ('2043', -23);
INSERT INTO `stock_all` VALUES ('2045', -1);
INSERT INTO `stock_all` VALUES ('2046', -6);
INSERT INTO `stock_all` VALUES ('2053', -3);
INSERT INTO `stock_all` VALUES ('2054', -4);
INSERT INTO `stock_all` VALUES ('2058', 0);
INSERT INTO `stock_all` VALUES ('2060', -4);
INSERT INTO `stock_all` VALUES ('2061', -2);
INSERT INTO `stock_all` VALUES ('2065', -1);
INSERT INTO `stock_all` VALUES ('2066', -1);
INSERT INTO `stock_all` VALUES ('2075', 2);
INSERT INTO `stock_all` VALUES ('2076', -7);
INSERT INTO `stock_all` VALUES ('2077', -6);
INSERT INTO `stock_all` VALUES ('2079', -2);
INSERT INTO `stock_all` VALUES ('2080', -3);
INSERT INTO `stock_all` VALUES ('2081', 2);
INSERT INTO `stock_all` VALUES ('2083', 11);
INSERT INTO `stock_all` VALUES ('2084', -30);
INSERT INTO `stock_all` VALUES ('2089', 67);
INSERT INTO `stock_all` VALUES ('2093', -8);
INSERT INTO `stock_all` VALUES ('2098', 1);
INSERT INTO `stock_all` VALUES ('2125', 65);
INSERT INTO `stock_all` VALUES ('2126', -17);
INSERT INTO `stock_all` VALUES ('2134', 0);
INSERT INTO `stock_all` VALUES ('2139', -9);
INSERT INTO `stock_all` VALUES ('2140', 6);
INSERT INTO `stock_all` VALUES ('2142', -15);
INSERT INTO `stock_all` VALUES ('2143', -3);
INSERT INTO `stock_all` VALUES ('2145', -2);
INSERT INTO `stock_all` VALUES ('2147', -6);
INSERT INTO `stock_all` VALUES ('2148', -6);
INSERT INTO `stock_all` VALUES ('2149', 3);
INSERT INTO `stock_all` VALUES ('2153', -18);
INSERT INTO `stock_all` VALUES ('2154', -2);
INSERT INTO `stock_all` VALUES ('2155', -5);
INSERT INTO `stock_all` VALUES ('2159', 29);
INSERT INTO `stock_all` VALUES ('2162', 22);
INSERT INTO `stock_all` VALUES ('2164', -10);
INSERT INTO `stock_all` VALUES ('2166', -4);
INSERT INTO `stock_all` VALUES ('2168', -24);
INSERT INTO `stock_all` VALUES ('2194', 5);
INSERT INTO `stock_all` VALUES ('2198', 17);
INSERT INTO `stock_all` VALUES ('2206', 4);
INSERT INTO `stock_all` VALUES ('2208', 52);
INSERT INTO `stock_all` VALUES ('2209', 10);
INSERT INTO `stock_all` VALUES ('2213', 13);
INSERT INTO `stock_all` VALUES ('2247', 0);
INSERT INTO `stock_all` VALUES ('2248', -19);
INSERT INTO `stock_all` VALUES ('2251', 3);
INSERT INTO `stock_all` VALUES ('2253', -4);
INSERT INTO `stock_all` VALUES ('2267', -5);
INSERT INTO `stock_all` VALUES ('2269', -15);
INSERT INTO `stock_all` VALUES ('2273', 3);
INSERT INTO `stock_all` VALUES ('2276', 6);
INSERT INTO `stock_all` VALUES ('2279', -5);
INSERT INTO `stock_all` VALUES ('2295', -1);
INSERT INTO `stock_all` VALUES ('2296', 5);
INSERT INTO `stock_all` VALUES ('2299', 45);
INSERT INTO `stock_all` VALUES ('2339', 1);
INSERT INTO `stock_all` VALUES ('ADM22', -7);
INSERT INTO `stock_all` VALUES ('BCS01', -8);
INSERT INTO `stock_all` VALUES ('CSP05', 20);

-- --------------------------------------------------------

-- 
-- Table structure for table `stock_za`
-- 

CREATE TABLE `stock_za` (
  `code` varchar(16) NOT NULL,
  `name` varchar(128) NOT NULL,
  `sale` float NOT NULL default '0',
  `total` int(11) NOT NULL default '0',
  `posted_price` float NOT NULL default '0',
  `instock` decimal(33,0) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `stock_za`
-- 

INSERT INTO `stock_za` VALUES ('0086', 'Ão lÃ³t nam', 0, 8, 100, 3);
INSERT INTO `stock_za` VALUES ('0163', 'Quáº§n Ä‘Ã¹i ná»¯', 0, 2, 160, -1);
INSERT INTO `stock_za` VALUES ('0281', 'VÃ¡y', 0, 1, 520, 0);
INSERT INTO `stock_za` VALUES ('0290', 'VÃ¡y', 0, 2, 400, 1);
INSERT INTO `stock_za` VALUES ('0352', 'VÃ¡y', 0, 5, 270, 0);
INSERT INTO `stock_za` VALUES ('0421', 'SÆ¡ mi nam', 0, 2, 395, 0);
INSERT INTO `stock_za` VALUES ('0480', 'Ão thun ná»¯ mango', 0, 1, 170, 0);
INSERT INTO `stock_za` VALUES ('0485', 'VÃ¡y tay ren', 0, 2, 400, 0);
INSERT INTO `stock_za` VALUES ('0487', 'Ão len', 0, 2, 225, 0);
INSERT INTO `stock_za` VALUES ('0489', 'Ão len zara tay háº¿n', 0, 3, 225, 0);
INSERT INTO `stock_za` VALUES ('0491', 'VÃ¡y len', 0, 1, 280, 0);
INSERT INTO `stock_za` VALUES ('0492', 'VÃ¡y len', 0, 3, 290, 0);
INSERT INTO `stock_za` VALUES ('0506', 'SÆ¡ mi nam', 0, 4, 445, 0);
INSERT INTO `stock_za` VALUES ('0507', 'SÆ¡ mi nam', 0, 2, 395, 1);
INSERT INTO `stock_za` VALUES ('0570', 'VÃ¡y ná»¯ cÃ³ nÆ¡', 0, 2, 350, 0);
INSERT INTO `stock_za` VALUES ('0584', 'Vest ná»¯', 0, 1, 350, 0);
INSERT INTO `stock_za` VALUES ('0588', 'Bá»™ Ä‘á»“ thá»ƒ thao', 0, 0, 450, 0);
INSERT INTO `stock_za` VALUES ('0589', 'Ão len ná»¯', 0, 0, 250, 0);
INSERT INTO `stock_za` VALUES ('0590', 'Ão len ná»¯', 0, 1, 290, 0);
INSERT INTO `stock_za` VALUES ('0636', 'Ão nam cá»• trÆ¡n', 0, 4, 200, 0);
INSERT INTO `stock_za` VALUES ('0637', 'VÃ¡y', 0, 3, 270, 0);
INSERT INTO `stock_za` VALUES ('0639', 'Ão len dÃ i tay háº¿n', 0, 2, 180, 0);
INSERT INTO `stock_za` VALUES ('0641', 'Ão len nam cá»• trÃ²n sá»c', 0, 1, 270, 0);
INSERT INTO `stock_za` VALUES ('0645', 'Ão len ná»¯ dÃ i', 0, 2, 230, 0);
INSERT INTO `stock_za` VALUES ('0651', 'VÃ¡y', 0, 0, 250, 0);
INSERT INTO `stock_za` VALUES ('0652', 'VÃ¡y', 0, 1, 260, 0);
INSERT INTO `stock_za` VALUES ('0676', 'VÃ¡y', 0, 6, 240, 0);
INSERT INTO `stock_za` VALUES ('0681', 'vÃ¡y tay lá»¡ chloe', 0, 2, 270, 0);
INSERT INTO `stock_za` VALUES ('0685', 'Ão len khoÃ¡c cÃ³ tÆ°i', 0, 7, 250, 0);
INSERT INTO `stock_za` VALUES ('0687', 'Ão len zara sá»c ngang', 0, 3, 190, 0);
INSERT INTO `stock_za` VALUES ('0688', 'Ão khoÃ¡c len 1 mau', 0, 4, 215, 0);
INSERT INTO `stock_za` VALUES ('0690', 'Ão khoÃ¡c len lá»­ng zara', 0, 5, 150, 0);
INSERT INTO `stock_za` VALUES ('0693', 'Ão len dai sá»c ngang', 0, 6, 220, 0);
INSERT INTO `stock_za` VALUES ('0696', 'Ão len lá»­ng zara', 0, 3, 160, 0);
INSERT INTO `stock_za` VALUES ('0717', 'VÃ¡y esteem', 0, 1, 290, 0);
INSERT INTO `stock_za` VALUES ('0737', 'Bá»™ Ä‘á»“ addidas', 0, 9, 330, 0);
INSERT INTO `stock_za` VALUES ('0738', 'Thun nam co giÃ£n', 0, 14, 110, 0);
INSERT INTO `stock_za` VALUES ('0739', 'Thun nam káº» ngang', 0, 3, 220, 0);
INSERT INTO `stock_za` VALUES ('0748', 'vÃ¡y banana', 0, 3, 340, 0);
INSERT INTO `stock_za` VALUES ('0750', 'Vest veromoza', 0, 1, 425, 0);
INSERT INTO `stock_za` VALUES ('0778', 'Ão len nam cá»• trÃ²n', 0, 16, 290, 0);
INSERT INTO `stock_za` VALUES ('0779', 'Ão khoÃ¡c len lá»­ng', 0, 4, 220, 0);
INSERT INTO `stock_za` VALUES ('0804', 'Vest ná»¯', 0, 0, 500, 0);
INSERT INTO `stock_za` VALUES ('0825', 'Vest veromoza', 0, 11, 425, 0);
INSERT INTO `stock_za` VALUES ('0834', 'Legging tam giÃ¡c', 0, 10, 130, 0);
INSERT INTO `stock_za` VALUES ('0835', 'Legging cáº¡p cao', 0, 10, 135, 0);
INSERT INTO `stock_za` VALUES ('0843', 'Gile ná»¯ nhung', 0, 2, 250, 0);
INSERT INTO `stock_za` VALUES ('0844', 'VÃ¡y tay lá»— zara basic', 0, 1, 270, 0);
INSERT INTO `stock_za` VALUES ('0869', 'Ão black jack khÃ´ng mÅ©', 0, 14, 550, 0);
INSERT INTO `stock_za` VALUES ('0872', 'Ão thun nam cá»• trÃ²n', 0, 4, 150, 0);
INSERT INTO `stock_za` VALUES ('0889', 'Vest ná»¯ 2 cÃºc', 0, 7, 370, 0);
INSERT INTO `stock_za` VALUES ('0894', 'Vest ná»¯', 0, 0, 550, 0);
INSERT INTO `stock_za` VALUES ('0912', 'Ão len nam', 0, 2, 500, 0);
INSERT INTO `stock_za` VALUES ('0916', 'SÆ¡ mi nam', 0, 4, 390, 0);
INSERT INTO `stock_za` VALUES ('0943', 'Ão thun nam cá»• trÃ²n', 0, 4, 150, 0);
INSERT INTO `stock_za` VALUES ('0959', 'Vest ná»¯', 0, 0, 550, 0);
INSERT INTO `stock_za` VALUES ('0962', 'Vest ná»¯ truyá»n thá»‘ng', 0, 2, 550, 0);
INSERT INTO `stock_za` VALUES ('0965', 'Ão da nam', 0, 5, 495, 0);
INSERT INTO `stock_za` VALUES ('0991', 'Thun zara cá»• trÃ²n', 0, 24, 120, 0);
INSERT INTO `stock_za` VALUES ('0992', 'Ão da nam', 0, 5, 495, 0);
INSERT INTO `stock_za` VALUES ('1001', 'Dáº¡ ngáº¯n banana', 0, 9, 595, 0);
INSERT INTO `stock_za` VALUES ('1006', 'Quáº§n Legging da cÃ¡', 0, 33, 130, 0);
INSERT INTO `stock_za` VALUES ('1017', 'Táº¥t nam', 0, 32, 30, 2);
INSERT INTO `stock_za` VALUES ('1020', 'Ão phao nam', 0, 21, 695, 0);
INSERT INTO `stock_za` VALUES ('1029', 'Quáº§n Legging da cÃ¡', 0, 11, 130, 0);
INSERT INTO `stock_za` VALUES ('1044', 'Quáº§n chip ná»¯', 0, 79, 60, 2);
INSERT INTO `stock_za` VALUES ('1050', 'Ão thun nam cá»• trÆ¡n', 0, 7, 150, 0);
INSERT INTO `stock_za` VALUES ('1051', 'Ao da to', 0, 12, 1000, 0);
INSERT INTO `stock_za` VALUES ('1052', 'Ão bÃ  giÃ  len', 0, 1, 350, 0);
INSERT INTO `stock_za` VALUES ('1059', 'Ão khoÃ¡c kaki ná»¯ ngáº¯n', 0, 5, 585, 0);
INSERT INTO `stock_za` VALUES ('1063', 'Ão len cá»• lá» sá»c ná»¯', 0, 15, 215, 0);
INSERT INTO `stock_za` VALUES ('1083', 'Dáº¡ nam lÃ´ng cá»«u', 0, 3, 900, 0);
INSERT INTO `stock_za` VALUES ('1085', 'Ão khoÃ¡ch ná»¯ dÃ i mÅ© lÃ´ng', 0, 41, 620, 0);
INSERT INTO `stock_za` VALUES ('1086', 'Dáº¡ cÃºc mÃ u Ä‘á» vÃ  Ä‘en', 0, 4, 620, 0);
INSERT INTO `stock_za` VALUES ('1087', 'Dáº¡ cÃºc mÃ u xanh vÃ  vÃ ng', 0, 2, 580, 0);
INSERT INTO `stock_za` VALUES ('1092', 'Ão phao tráº» em hÃ¬nh con váº­t', 0, 5, 90, 0);
INSERT INTO `stock_za` VALUES ('1096', 'Ão phao tráº» em gáº¥u hai bÃªn', 0, 2, 135, 0);
INSERT INTO `stock_za` VALUES ('1112', 'Ão thun nam cá»• trÃ²n', 0, 18, 150, 0);
INSERT INTO `stock_za` VALUES ('1125', 'Ão lÃ´ng vÅ© nam', 0, 5, 1100, 0);
INSERT INTO `stock_za` VALUES ('1136', 'Ão len cá»• lá»', 0, 11, 230, 0);
INSERT INTO `stock_za` VALUES ('1138', 'Ão thun nam cá»• trÃ²n', 0, 14, 150, 0);
INSERT INTO `stock_za` VALUES ('1146', 'GilÃª nam', 0, 4, 340, 0);
INSERT INTO `stock_za` VALUES ('1158', 'Ão len ná»¯ cá»• cao', 0, 5, 230, 0);
INSERT INTO `stock_za` VALUES ('1163', 'Ão lÃ´ng vÅ© hÃ¬nh trÃ¡m', 0, 3, 695, 0);
INSERT INTO `stock_za` VALUES ('1165', 'Dáº¡ ná»¯ mango xuáº¥t dÆ°', 0, 11, 900, 0);
INSERT INTO `stock_za` VALUES ('1168', 'Ão dáº¡ cá»• kÃ©p', 0, 6, 695, 0);
INSERT INTO `stock_za` VALUES ('1183', 'Quáº§n táº¥t nam', 0, 11, 115, 0);
INSERT INTO `stock_za` VALUES ('1187', 'Ão len ná»¯ káº» ngang', 0, 12, 230, 0);
INSERT INTO `stock_za` VALUES ('1190', 'Ão len nam cá»• lá»', 0, 42, 295, 0);
INSERT INTO `stock_za` VALUES ('1193', 'Ão lÃ´ng vÅ© levis ná»¯', 0, 2, 1000, 0);
INSERT INTO `stock_za` VALUES ('1198', 'Ão khoÃ¡c ná»¯ collection', 0, 8, 570, 1);
INSERT INTO `stock_za` VALUES ('1206', 'Quáº§n táº¥t nam hÃ n', 0, 7, 145, 0);
INSERT INTO `stock_za` VALUES ('1224', 'SÆ¡ mi tráº¯ng', 0, 34, 230, 0);
INSERT INTO `stock_za` VALUES ('1226', 'Quáº§n jeans ná»¯ Mango', 0, 62, 345, 0);
INSERT INTO `stock_za` VALUES ('1282', 'Tháº¯t lÆ°ng nam TOMA  dÃ¢y cuá»™n vÃ²ng 37', 0, 3, 350, 0);
INSERT INTO `stock_za` VALUES ('1321', 'Ão triumph thÃ¡i hoa', 0, 10, 160, 0);
INSERT INTO `stock_za` VALUES ('1334', 'Jeans ná»¯', 0, 23, 345, 0);
INSERT INTO `stock_za` VALUES ('1335', 'Ão sÆ¡ mi ná»¯ tay vÃ©n', 0, 26, 220, 2);
INSERT INTO `stock_za` VALUES ('1337', 'VÃ¡y káº»', 0, 3, 195, 0);
INSERT INTO `stock_za` VALUES ('1342', 'Ão phÃ´ng nam cá»• trÃ²n levis', 0, 33, 200, 3);
INSERT INTO `stock_za` VALUES ('1344', 'Ão phÃ´ng nam polo', 0, 33, 200, 0);
INSERT INTO `stock_za` VALUES ('1347', 'Quáº§n ná»¯ mango dÆ°', 0, 0, 300, 0);
INSERT INTO `stock_za` VALUES ('1391', 'Bá»™ Ä‘á»“ ná»¯', 0, 2, 295, 0);
INSERT INTO `stock_za` VALUES ('1392', 'Quáº§n sooc bÃ² nam', 0, 35, 270, 2);
INSERT INTO `stock_za` VALUES ('1393', 'Quáº§n sooc káº» nam levis', 0, 29, 250, 0);
INSERT INTO `stock_za` VALUES ('1394', 'Quáº§n sooc trÆ¡n nam Guess', 0, 17, 220, 3);
INSERT INTO `stock_za` VALUES ('1414', 'Ão phÃ´ng burberry nam', 0, 83, 180, 1);
INSERT INTO `stock_za` VALUES ('1435', 'Ão sÆ¡ mi nam LEE', 0, 42, 330, 0);
INSERT INTO `stock_za` VALUES ('1459', 'Ão cuá»™n giáº£i nhiá»‡t', 0, 106, 110, 0);
INSERT INTO `stock_za` VALUES ('1478', 'Ão sÆ¡ mi tisa cÃ¡c loáº¡i', 0, 36, 230, 1);
INSERT INTO `stock_za` VALUES ('1479', 'Ão body nam ex', 0, 24, 200, 1);
INSERT INTO `stock_za` VALUES ('1493', 'XÄƒng Ä‘an bá»‡t dÃ¢y ngang mÃ u sáº¯c', 0, 1, 265, 0);
INSERT INTO `stock_za` VALUES ('1498', 'SÆ¡ mi ná»¯ tráº¯ng cá»™c tay', 0, 5, 220, 1);
INSERT INTO `stock_za` VALUES ('1499', 'ChÃ¢n vÃ¡y cÃ³ tÃºi', 0, 13, 220, 0);
INSERT INTO `stock_za` VALUES ('1500', 'Quáº§n Ã¢u thÃ´ ná»¯', 0, 19, 285, 2);
INSERT INTO `stock_za` VALUES ('1504', 'Quáº§n legging trÆ¡n', 0, 32, 120, 0);
INSERT INTO `stock_za` VALUES ('1512', 'Quáº§n ngá»‘ polo nam', 0, 14, 220, 0);
INSERT INTO `stock_za` VALUES ('1528', 'Ão phÃ´ng nam body ex cá»• tim', 0, 26, 200, 0);
INSERT INTO `stock_za` VALUES ('1530', 'SÆ¡ mi thÃªu', 0, 6, 235, 0);
INSERT INTO `stock_za` VALUES ('1536', 'VÃ¡y xuÃ´ng hai tÃºi tráº§n', 0, 33, 340, 4);
INSERT INTO `stock_za` VALUES ('1539', 'Ão phÃ´ng ná»¯ khuy ngá»±c aber', 0, 9, 100, 0);
INSERT INTO `stock_za` VALUES ('1540', 'Ão phÃ´ng voan in hÃ¬nh sÃ¡t nÃ¡ch', 0, 7, 125, 0);
INSERT INTO `stock_za` VALUES ('1555', 'SÆ¡ mi ná»¯ tráº¯ng', 0, 50, 220, 9);
INSERT INTO `stock_za` VALUES ('1558', 'XÄƒng Ä‘an bá»‡t ferragamor', 0, 6, 265, 0);
INSERT INTO `stock_za` VALUES ('1561', 'Giáº§y bá»‡t da miáº¿ng 4 mÃ u (den, do, da bo, nau)', 0, 19, 350, 0);
INSERT INTO `stock_za` VALUES ('1572', 'Ão sÆ¡ mi nam holister', 0, 71, 295, 1);
INSERT INTO `stock_za` VALUES ('1576', 'Ão phÃ´ng tommy ná»¯', 0, 12, 160, 0);
INSERT INTO `stock_za` VALUES ('1579', 'XÄƒng Ä‘an bá»‡t xá» ngÃ³n quai háº­u, 35-38, zara women', 0, 19, 250, 11);
INSERT INTO `stock_za` VALUES ('1581', 'VÃ¡y lá»¥a vitakar', 0, 11, 270, 4);
INSERT INTO `stock_za` VALUES ('1585', 'Ão phÃ´ng ná»¯ cÃ¡nh dÆ¡i HM', 0, 22, 140, 1);
INSERT INTO `stock_za` VALUES ('1587', 'Ão sÆ¡ mi thÃªu cÃ¡c mÃ u', 0, 15, 235, 1);
INSERT INTO `stock_za` VALUES ('1590', 'Ão phÃ´ng nam body Holister, Express', 0, 97, 200, 8);
INSERT INTO `stock_za` VALUES ('1593', 'Quáº§n sooc nam lascote', 0, 35, 220, 5);
INSERT INTO `stock_za` VALUES ('1597', 'VÃ¡y in hoa 3D 156', 0, 17, 290, 3);
INSERT INTO `stock_za` VALUES ('1598', 'VÃ¡y thun káº» ngang phá»‘i mÃ u 171', 0, 14, 260, 1);
INSERT INTO `stock_za` VALUES ('1600', 'Quáº§n sooc bÃ² CK xuáº¥t dÆ° 133', 0, 12, 220, 0);
INSERT INTO `stock_za` VALUES ('1605', 'Ão phÃ´ng buberry ná»¯ 019', 0, 50, 155, 0);
INSERT INTO `stock_za` VALUES ('1608', 'Ão phÃ´ng burberry nam 012', 0, 20, 180, 0);
INSERT INTO `stock_za` VALUES ('1615', 'Ão cuá»™n tÃºi giáº£i nhiá»‡t landen sooc trÆ¡n', 0, 66, 110, 0);
INSERT INTO `stock_za` VALUES ('1616', 'Ão cuá»™n tÃºi giáº£i nhiá»‡t dÃ¡ng dÃ i', 0, 48, 130, 5);
INSERT INTO `stock_za` VALUES ('1628', 'Bá»™ Ä‘á»“ cotton láº¡nh victoria', 0, 3, 200, 0);
INSERT INTO `stock_za` VALUES ('1635', 'VÃ¡y hoa xÃ²e xáº» vai', 0, 2, 230, 0);
INSERT INTO `stock_za` VALUES ('1639', 'Ão cuá»™n tÃºi giáº£i nhiá»‡t landend', 0, 12, 110, 0);
INSERT INTO `stock_za` VALUES ('1651', 'Ão triumph ren bÆ°á»›m', 0, 5, 155, 0);
INSERT INTO `stock_za` VALUES ('1669', 'ChÃ¢n vÃ¡y Ä‘en', 0, 11, 220, 2);
INSERT INTO `stock_za` VALUES ('1673', 'ChÃ¢n vÃ¡y dÃ y Ä‘en Ä‘á»', 0, 24, 220, 4);
INSERT INTO `stock_za` VALUES ('1703', 'Giáº§y da miáº¿ng Ä‘áº¯p trÃªn new style', 0, 74, 330, 18);
INSERT INTO `stock_za` VALUES ('1705', 'SÆ¡ mi nam dÃ i tay holister', 0, 57, 330, 8);
INSERT INTO `stock_za` VALUES ('1721', 'DÃ¢y lÆ°ng da táº¿t nam 3.5 F', 0, 3, 280, 1);
INSERT INTO `stock_za` VALUES ('1723', 'VÃ­ nam toma', 0, 2, 320, 0);
INSERT INTO `stock_za` VALUES ('1725', 'ChÃ¢n vÃ¡y ná»¯ dÃ y Ä‘en Ä‘á»', 0, 43, 220, 8);
INSERT INTO `stock_za` VALUES ('1726', 'Ão sÆ¡ mi ná»¯ tráº¯ng dÃ i tay', 0, 43, 230, 9);
INSERT INTO `stock_za` VALUES ('1727', 'Quáº§n jean ná»¯ cáº¡p cao mango', 0, 18, 345, 0);
INSERT INTO `stock_za` VALUES ('1729', 'Quáº§n jean ná»¯ LV cáº¡p cao', 0, 0, 345, 0);
INSERT INTO `stock_za` VALUES ('1730', 'Quáº§n jean ná»¯ TOPSHOP', 0, 0, 360, 0);
INSERT INTO `stock_za` VALUES ('1733', 'Quáº§n jean ná»¯ DT jean', 0, 0, 335, 0);
INSERT INTO `stock_za` VALUES ('1734', 'Quáº§n jean ná»¯ cáº¡p cao mango 004', 0, 1, 335, 0);
INSERT INTO `stock_za` VALUES ('1735', 'Quáº§n jean ná»¯ SQUARED', 0, 1, 360, 0);
INSERT INTO `stock_za` VALUES ('1736', 'Giáº§y ná»¯ accos da má» gÃ³t nhá»n 3 phÃ¢n', 0, 97, 295, 1);
INSERT INTO `stock_za` VALUES ('1738', 'Quáº§n jean ná»¯ MNG cáº¡p cao 1 khuy', 0, 1, 345, 0);
INSERT INTO `stock_za` VALUES ('1739', 'Quáº§n jean ná»¯ Burberry Ä‘en 003', 0, 1, 335, 0);
INSERT INTO `stock_za` VALUES ('1740', 'Quáº§n jean ná»¯ MNG xanh 76', 0, 0, 345, 0);
INSERT INTO `stock_za` VALUES ('1762', 'Giáº§y ná»¯ ANDO 5 p', 0, 6, 275, 0);
INSERT INTO `stock_za` VALUES ('1763', 'Giáº§y ná»¯ khoÃ©t cá»• tim ANDO 5p', 0, 42, 290, 1);
INSERT INTO `stock_za` VALUES ('1764', 'ChÃ¢n vÃ¡y mÃ u Ä‘áº¹p', 0, 94, 250, 3);
INSERT INTO `stock_za` VALUES ('1765', 'ChÃ¢n vÃ¡y Ä‘en', 0, 2, 230, 1);
INSERT INTO `stock_za` VALUES ('1767', 'Ão sÆ¡mi káº» caro to nhá» dÃ y tay', 0, 21, 240, 5);
INSERT INTO `stock_za` VALUES ('1768', 'Ão sÆ¡mi tráº¯ng dÃ i tay Ä‘áº¹p', 0, 121, 240, 47);
INSERT INTO `stock_za` VALUES ('1769', 'VÃ¡y cÃ´ng sá»Ÿ cao cáº¥p pha ren', 0, 23, 550, 7);
INSERT INTO `stock_za` VALUES ('1776', 'Ão khoÃ¡c len má»ng phá»‘i hai mÃ u dÃ i tay', 0, 13, 260, 1);
INSERT INTO `stock_za` VALUES ('1779', 'Ão thun káº» ngang dÃ i tay MGN', 0, 38, 200, 7);
INSERT INTO `stock_za` VALUES ('1782', 'Ão sÆ¡ mi voan ná»¯ dÃ i tay MNG hoa bi', 0, 17, 250, 2);
INSERT INTO `stock_za` VALUES ('1789', 'Ão vest ná»¯ tay lá»¡ hoa vÄƒn VERA', 0, 9, 450, 0);
INSERT INTO `stock_za` VALUES ('1823', 'Vest ná»¯ 2 cÃºc', 0, 9, 400, 8);
INSERT INTO `stock_za` VALUES ('1825', 'Gile ná»¯ nhung', 0, 9, 290, 9);
INSERT INTO `stock_za` VALUES ('1828', 'Vest veromoza', 0, 12, 450, 3);
INSERT INTO `stock_za` VALUES ('1848', 'Giáº§y ZARA da má» gÃ³t nhá»n 7p', 0, 25, 300, 2);
INSERT INTO `stock_za` VALUES ('1849', 'Giáº§y ANDO da má» gÃ³t nhá»n 5p', 0, 33, 290, 5);
INSERT INTO `stock_za` VALUES ('1850', 'Giáº§y ANDO da má» nÆ¡ cá»• tim gÃ³t nhá»n 5p', 0, 10, 280, 1);
INSERT INTO `stock_za` VALUES ('1851', 'Quáº§n jean ná»¯ LANA 4933', 0, 1, 335, 0);
INSERT INTO `stock_za` VALUES ('1854', 'GiÃ y cao Ä‘áº¿ kÃ©p ZARA (Ä‘en, máº­n, vÃ ng, da)', 0, 33, 330, 5);
INSERT INTO `stock_za` VALUES ('1860', 'Ão len váº·n thá»«ng dÃ y', 0, 14, 290, 0);
INSERT INTO `stock_za` VALUES ('1862', 'Ão phao ná»¯ holister', 0, 50, 560, 16);
INSERT INTO `stock_za` VALUES ('1864', 'Ão ná»‰ nam nhiá»u mÃ u', 0, 26, 450, 25);
INSERT INTO `stock_za` VALUES ('1865', 'Quáº§n Ã¢u ná»¯ váº£i Ä‘áº¹p', 0, 20, 315, 7);
INSERT INTO `stock_za` VALUES ('1866', 'Giáº§y ANDO da má» mÅ©i chÃ©o 7p', 0, 50, 290, 1);
INSERT INTO `stock_za` VALUES ('1872', 'Ão len dá»‡t vi tÃ­nh cá»• trÃ²n Ä‘á»¥c lá»—', 0, 21, 280, 0);
INSERT INTO `stock_za` VALUES ('1879', 'Ão khoÃ¡c giÃ³ ná»¯ VITAKAR', 0, 73, 300, 1);
INSERT INTO `stock_za` VALUES ('1881', 'Ão len nam dáº§y cá»• trÃ²n cá»• tim', 0, 17, 280, 1);
INSERT INTO `stock_za` VALUES ('1929', 'Giáº§y zara má» gÃ³t vuÃ´ng 3p lÆ°á»¡i gÃ ', 0, 43, 290, 0);
INSERT INTO `stock_za` VALUES ('1932', 'Quáº§n jeans ná»¯ cáº¡p cao 1 khuy MNG tÃºi cong', 0, 0, 345, 0);
INSERT INTO `stock_za` VALUES ('1939', 'Quáº§n Ã¢u ná»¯ á»‘ng cÃ´n', 0, 35, 315, 16);
INSERT INTO `stock_za` VALUES ('1943', 'Ão khoÃ¡c len ná»¯ hÃ¬nh trÃ¡m', 0, 2, 295, 0);
INSERT INTO `stock_za` VALUES ('1944', 'Ão khoÃ¡c len ná»¯ trÆ¡n pha viá»n cá»• tim', 0, 4, 260, 0);
INSERT INTO `stock_za` VALUES ('1945', 'Ão len ná»¯ cÃ³ tÃºi hai khuy', 0, 12, 250, 3);
INSERT INTO `stock_za` VALUES ('1946', 'Ão len ná»¯ dÃ y váº·n thá»«ng cá»• trÃ²n', 0, 23, 295, 2);
INSERT INTO `stock_za` VALUES ('1949', 'Quáº§n táº¥t má»ng kÃ­n bÃ n GUNZE', 0, 20, 70, 0);
INSERT INTO `stock_za` VALUES ('1953', 'Quáº§n giÃ³ nam', 0, 19, 200, 4);
INSERT INTO `stock_za` VALUES ('1954', 'Ão giÃ³ nam zara nhiá»u mÃ u', 0, 35, 420, 1);
INSERT INTO `stock_za` VALUES ('1955', 'Ão vest ná»¯ 2 lÆ¡p hoa vÄƒn pha viá»n', 0, 6, 500, 0);
INSERT INTO `stock_za` VALUES ('1956', 'Ão khoÃ¡c kaki dÃ¡ng dÃ i ná»¯ zara', 0, 0, 600, 0);
INSERT INTO `stock_za` VALUES ('1957', 'Ão phao nao xuáº¥t dÆ° the northface', 0, 0, 950, 0);
INSERT INTO `stock_za` VALUES ('1958', 'VÃ¡y len káº» ngang', 0, 1, 320, 0);
INSERT INTO `stock_za` VALUES ('1959', 'VÃ¡y hoáº¡ tiáº¿t da bÃ¡o sÃ¡t nÃ¡ch', 0, 0, 380, 0);
INSERT INTO `stock_za` VALUES ('1960', 'VÃ¡y khÃ³a ngá»±c tay lá»¡', 0, 0, 380, 0);
INSERT INTO `stock_za` VALUES ('1966', 'Quáº§n Jeans nam Levis 2 mÃ u sÃ¡ng tá»‘i', 0, 30, 450, 0);
INSERT INTO `stock_za` VALUES ('1967', 'Ão khoÃ¡c nam lÃ³t lÃ´ng xuáº¥t dÆ° F&B', 0, 7, 900, 0);
INSERT INTO `stock_za` VALUES ('1975', 'XHTE Ão phao chÃ¢n chÃ³ lÃ³t lÃ´ng', 0, 5, 150, 0);
INSERT INTO `stock_za` VALUES ('1976', 'XHTE Ão phao 3 khoang lÃ³t lÃ´ng', 0, 0, 150, 0);
INSERT INTO `stock_za` VALUES ('1977', 'XHTE Ão', 0, 16, 150, 0);
INSERT INTO `stock_za` VALUES ('1978', 'XHTE Ão kitty bÃ¡o', 0, 6, 170, 0);
INSERT INTO `stock_za` VALUES ('1979', 'XHTE Ão nÆ¡ khuy báº¥m', 0, 0, 240, 0);
INSERT INTO `stock_za` VALUES ('1980', 'XHTE Ão phao nam ba khoang', 0, 3, 260, 0);
INSERT INTO `stock_za` VALUES ('1981', 'XHTE Ão phao ná»¯ ba khoang Ä‘áº¹p', 0, 2, 260, 0);
INSERT INTO `stock_za` VALUES ('1982', 'XHTE Ão phao nam to', 0, 3, 290, 0);
INSERT INTO `stock_za` VALUES ('1983', 'XHTE Ão phao nam', 0, 3, 260, 0);
INSERT INTO `stock_za` VALUES ('1986', 'XHTE quáº§n bÃ² ná»¯', 0, 0, 160, 0);
INSERT INTO `stock_za` VALUES ('1987', 'Ão giá»¯ nhiá»‡t uniqo cá»• 3 phÃ¢n', 0, 91, 110, 2);
INSERT INTO `stock_za` VALUES ('1989', 'Ão phao ná»¯ VITAKA', 0, 0, 560, 0);
INSERT INTO `stock_za` VALUES ('1990', 'Ão khoÃ¡c nam siÃªu nháº¹', 0, 10, 600, 0);
INSERT INTO `stock_za` VALUES ('1991', 'Ão mangto dÃ¡ng dÃ i lascoste', 0, 0, 800, 0);
INSERT INTO `stock_za` VALUES ('1992', 'Ão len nam káº» body cá»• tim', 0, 13, 290, 1);
INSERT INTO `stock_za` VALUES ('1993', 'Ão len nem káº» body cá»• trÃ²n', 0, 33, 290, 2);
INSERT INTO `stock_za` VALUES ('1995', 'Ão len cá»• tim ZARA nÅ©', 0, 15, 245, 0);
INSERT INTO `stock_za` VALUES ('1998', 'Ão gile ná»¯ VITAKA', 0, 13, 350, 0);
INSERT INTO `stock_za` VALUES ('2001', 'Bá»‘t cá»• ngáº¯n zara da má»', 0, 42, 450, 16);
INSERT INTO `stock_za` VALUES ('2009', 'Ão khoÃ¡c ná»¯ vitaka', 0, 38, 570, 0);
INSERT INTO `stock_za` VALUES ('2010', 'Ão khoÃ¡c ná»¯ massimo cá»• lÃ´ng xuáº¥t dÆ°', 0, 23, 900, 0);
INSERT INTO `stock_za` VALUES ('2011', 'Ão lÃªn gilÃª nam', 0, 25, 250, 12);
INSERT INTO `stock_za` VALUES ('2012', 'Ão len nam tim HM', 0, 0, 290, 0);
INSERT INTO `stock_za` VALUES ('2015', 'Ão phao ná»¯ cháº§n hoa uniqilo', 0, 62, 520, 0);
INSERT INTO `stock_za` VALUES ('2018', 'Ão phao ná»¯ dÃ¡ng dÃ i Hum', 0, 1, 600, -1);
INSERT INTO `stock_za` VALUES ('2026', 'Bá»™ giÃ³ nam', 0, 29, 535, 11);
INSERT INTO `stock_za` VALUES ('2029', 'Quáº§n ná»‰ ná»¯ Ä‘Ã­nh Ä‘Ã¡ ghen bá»¥ng', 0, 38, 225, 1);
INSERT INTO `stock_za` VALUES ('2043', 'Ão phao ná»¯ siÃªu nháº¹ Eider', 0, 0, 520, 0);
INSERT INTO `stock_za` VALUES ('2045', 'Ão len váº·n thá»«ng', 0, 12, 270, 0);
INSERT INTO `stock_za` VALUES ('2046', 'VÃ¡y len váº·n thá»«ng', 0, 0, 350, 0);
INSERT INTO `stock_za` VALUES ('2053', 'Bá»‘t cá»• ngáº¯n buá»™c dÃ¢y CLANK', 0, 10, 440, 2);
INSERT INTO `stock_za` VALUES ('2054', 'Giáº§y da miáº¿ng cá»• chun GEOX', 0, 11, 350, 0);
INSERT INTO `stock_za` VALUES ('2058', 'Ão len nam cá»• ba phÃ¢n', 0, 9, 280, 1);
INSERT INTO `stock_za` VALUES ('2060', 'Ão dáº¡ ná»¯ cháº¥m bi', 0, 0, 750, 0);
INSERT INTO `stock_za` VALUES ('2061', 'Ã¡o phao lÃ´ng vÅ© siÃªu nháº¹ nam uniqlo', 0, 28, 900, 0);
INSERT INTO `stock_za` VALUES ('2065', 'Ã¡o phao ná»¯ siÃªu nháº¹ talbots cÃ³ mÅ©', 0, 29, 600, 0);
INSERT INTO `stock_za` VALUES ('2066', 'Ã¡o phao ná»¯ siÃªu nháº¹ talbots khÃ´ng mÅ©', 0, 9, 580, 1);
INSERT INTO `stock_za` VALUES ('2075', 'Ão phÃ´ng ná»¯ káº» khÃ³a cá»• váº¡t tÃ´m', 0, 67, 165, 3);
INSERT INTO `stock_za` VALUES ('2076', 'Ão phÃ´ng ná»¯ dÃ¡ng dÃ i váº¡t tÃ´m', 0, 20, 165, 5);
INSERT INTO `stock_za` VALUES ('2077', 'Ão phÃ´ng ná»¯ in lá»¥a hoa', 0, 0, 150, 0);
INSERT INTO `stock_za` VALUES ('2079', 'VÃ¡y phá»‘i ren cup ngá»±c dÃ¡ng xÃ²e', 0, 1, 400, 0);
INSERT INTO `stock_za` VALUES ('2080', 'VÃ¡y há»a tiáº¿t tay háº¿n', 0, 0, 360, 0);
INSERT INTO `stock_za` VALUES ('2081', 'VÃ¡y xÃ²e phá»‘i mÃ u', 0, 12, 380, 5);
INSERT INTO `stock_za` VALUES ('2083', 'Quáº§n sooc nam GAP', 0, 92, 230, 13);
INSERT INTO `stock_za` VALUES ('2084', 'Ão phÃ´ng nam chá»¯', 0, 0, 200, 0);
INSERT INTO `stock_za` VALUES ('2089', 'Ão phÃ´ng ná»¯ TOMMY', 0, 179, 150, 68);
INSERT INTO `stock_za` VALUES ('2093', 'Quáº§n sooc ná»¯ rÃ¡ch F21', 0, 0, 230, 0);
INSERT INTO `stock_za` VALUES ('2098', 'Ão phÃ´ng giáº£i nhiá»‡t ná»¯ sá»c ngang', 0, 21, 90, 2);
INSERT INTO `stock_za` VALUES ('2125', 'Ão phÃ´ng ná»¯ trÆ¡n mÃ u cá»• trÃ²n', 0, 123, 95, 67);
INSERT INTO `stock_za` VALUES ('2126', 'Ão phÃ´ng ná»¯ cháº¥m bi', 0, 5, 130, 0);
INSERT INTO `stock_za` VALUES ('2134', 'Quáº§n Jean ná»¯ trÆ¡n khÃ³a hÃ´ng MNG 6313', 0, 6, 345, 1);
INSERT INTO `stock_za` VALUES ('2139', 'Quáº§n bÃ² ná»¯ dÃ¡ng lá»¡ MNG', 0, 1, 345, 0);
INSERT INTO `stock_za` VALUES ('2140', 'Quáº§n bÃ² ná»¯ dÃ¡ng ngá»‘', 0, 36, 295, 7);
INSERT INTO `stock_za` VALUES ('2142', 'Ão sÆ¡ mi voan ná»¯', 0, 2, 250, 0);
INSERT INTO `stock_za` VALUES ('2143', 'Quáº§n kaki Ä‘en ná»¯ dÃ¡ng lá»¡', 0, 1, 290, 0);
INSERT INTO `stock_za` VALUES ('2145', 'VÃ¡y ren xuáº¥t kháº©u', 0, 0, 320, 0);
INSERT INTO `stock_za` VALUES ('2147', 'VÃ¡y hoa nhÃ­', 0, 0, 290, 0);
INSERT INTO `stock_za` VALUES ('2148', 'VÃ¡y hoa xÃ²e há»“ng', 0, 0, 300, 0);
INSERT INTO `stock_za` VALUES ('2149', 'VÃ¡y xuÃ´ng pha viá»n tráº¯ng', 0, 11, 350, 4);
INSERT INTO `stock_za` VALUES ('2153', 'Sandal báº£n to zara phá»‘i mÃ u', 0, 2, 285, 0);
INSERT INTO `stock_za` VALUES ('2154', 'Sandal quai hoa zalong phá»‘i mÃ u', 0, 10, 290, 3);
INSERT INTO `stock_za` VALUES ('2155', 'GiÃ y bÃ¡nh má»³ zalong', 0, 0, 295, 0);
INSERT INTO `stock_za` VALUES ('2159', 'Ão phÃ´ng ná»¯ POLO', 0, 80, 150, 31);
INSERT INTO `stock_za` VALUES ('2162', 'Ão sÆ¡ mi nam body dÃ i tay káº» tÄƒm', 0, 30, 350, 24);
INSERT INTO `stock_za` VALUES ('2164', 'GiÃ y Zalong P015', 0, 0, 260, 0);
INSERT INTO `stock_za` VALUES ('2166', 'Sandal Ä‘áº¿ kÃ©p quai ngang ZARA ST53', 0, 5, 280, 1);
INSERT INTO `stock_za` VALUES ('2168', 'Giáº§y da tháº­t nguyÃªn miáº¿ng P160', 0, 5, 350, 2);
INSERT INTO `stock_za` VALUES ('2194', 'Sandal Ä‘áº¿ xuáº¥t coco diva', 0, 9, 340, 6);
INSERT INTO `stock_za` VALUES ('2198', 'Ão sÆ¡ mi phá»‘i ren', 0, 34, 230, 19);
INSERT INTO `stock_za` VALUES ('2206', 'GiÃ y da miáº¿ng cao gÃ³t 3p', 0, 14, 360, 5);
INSERT INTO `stock_za` VALUES ('2208', 'Quáº§n sooc nam ABER', 0, 117, 230, 55);
INSERT INTO `stock_za` VALUES ('2209', 'Quáº§n Ä‘Ã¹i cotton ná»¯', 0, 14, 80, 11);
INSERT INTO `stock_za` VALUES ('2213', 'Giáº§y VNXK COCO DIVA Ä‘áº¿ xuá»“ng', 0, 19, 345, 14);
INSERT INTO `stock_za` VALUES ('2247', 'VÃ¡y cháº¥m bi xÃ²e', 0, 5, 320, 1);
INSERT INTO `stock_za` VALUES ('2248', 'VÃ¡y maxi voan', 0, 1, 350, 0);
INSERT INTO `stock_za` VALUES ('2251', 'Ão sÆ¡ mi hoa thÃ´', 0, 9, 230, 4);
INSERT INTO `stock_za` VALUES ('2253', 'Ão croptop káº»', 0, 6, 130, 2);
INSERT INTO `stock_za` VALUES ('2267', 'GiÃ y lÆ°á»i nam C.HN GL 1038', 0, 0, 650, 0);
INSERT INTO `stock_za` VALUES ('2269', 'GiÃ y lÆ°á»i nam LACINO 2035', 0, 0, 660, 0);
INSERT INTO `stock_za` VALUES ('2273', 'Sandal nam C.HN 2046', 0, 10, 365, 8);
INSERT INTO `stock_za` VALUES ('2276', 'Giáº§y nam A.P 5540', 0, 8, 695, 7);
INSERT INTO `stock_za` VALUES ('2279', 'Giáº§y nam A.P 7714', 0, 0, 695, 0);
INSERT INTO `stock_za` VALUES ('2295', 'SÆ¡ mi hoa ná»•i', 0, 25, 240, 4);
INSERT INTO `stock_za` VALUES ('2296', 'Quáº§n kaki nam PUMA trÆ¡n 090', 0, 23, 230, 6);
INSERT INTO `stock_za` VALUES ('2299', 'Quáº§n ngá»‘ kaki ESPRIT', 0, 85, 180, 62);
INSERT INTO `stock_za` VALUES ('2339', 'Ão sÆ¡ mi lanh lá»¥a ZARA', 0, 17, 225, 8);
INSERT INTO `stock_za` VALUES ('ADM22', 'Ão ba lá»— aristino', 0, 2, 145, 1);
INSERT INTO `stock_za` VALUES ('BCS01', 'Bá»™ Ä‘á»“ xuÃ¢n hÃ¨ Cecina CS-01(Há»“ng Cam, Xanh DÆ°Æ¡ng)', 0, 9, 350, 4);
INSERT INTO `stock_za` VALUES ('CSP05', 'Táº¥t', 0, 104, 35, 21);

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Employees Information' AUTO_INCREMENT=26 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, 1, 'Anh Minh', 'trantridue@gmail.com', '0918888398', 'admin', '4eae18cf9e54a0f62b44176d074cbe2f', 'y', 'y', '2013-01-01 09:07:18', '2015-08-19 20:19:40', 'nothing');
INSERT INTO `user` VALUES (4, 1, 'Chị Châu', 'zabuza.vn@gmail.com', '0966807709', 'chau ', 'e10adc3949ba59abbe56e057f20f883e', 'y', 'y', '2015-06-15 09:08:37', '2015-09-04 08:00:41', 'nothing');
INSERT INTO `user` VALUES (6, 1, 'Bảo', 'baobao@gmail.com', '01649785255', 'bao', 'e10adc3949ba59abbe56e057f20f883e', 'y', 'y', '2013-06-01 20:47:12', '2015-09-21 20:34:22', 'nothing');
INSERT INTO `user` VALUES (25, 1, 'Anh Duệ', 'trantridue@gmail.cp,', '0979355285', 'due', 'e10adc3949ba59abbe56e057f20f883e', 'y', 'y', '2015-10-02 00:16:47', '2020-12-31 22:00:00', 'tran tri due');

-- --------------------------------------------------------

-- 
-- Table structure for table `user_role`
-- 

CREATE TABLE `user_role` (
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
