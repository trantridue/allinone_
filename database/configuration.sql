-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 07, 2016 at 12:37 PM
-- Server version: 10.0.25-MariaDB
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zkpmolfu_banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `value` varchar(45) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Truncate table before insert `configuration`
--

TRUNCATE TABLE `configuration`;
--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `name`, `value`, `label`) VALUES
(1, 'import_number_row', '15', 'NBR ROW IMPORT'),
(2, 'export_number_row', '11', 'NBR ROW EXPORT'),
(3, 'default_row_product_return', '10', 'NBR ROW IMPORT RETURN'),
(4, 'default_password', '123456', 'DEFAULT PASSWORD'),
(5, 'is_sale_for_all', '1', 'SALE ON/OFF'),
(6, 'default_number_line_spend', '5', 'NBR ROW SPEND'),
(7, 'listExportDefault_nbr_day_limit', '0', 'NBR DAY EXPORT'),
(8, 'nbr_day_default_export_returned', '0', 'NBR DAY EXPORT RETURN'),
(9, 'default_nbr_days_load_export', '10', 'NBR DAY EXPORT DEFAULT'),
(10, 'bonus_ratio', '100', 'BONUS RATIO'),
(11, 'init_money', '500', 'AMOUNT INIT'),
(12, 'timeout', '21600', 'SYSTEM TIMEOUT'),
(13, 'limit_default_customer_after_search', '100', 'NBR ROW CUS AFTER'),
(14, 'limit_default_customer_before_search', '10', 'NBR ROW CUS BEFORE'),
(15, 'nbr_customer_by_group_csv', '20', 'NBR CUSTOMER BY GROUP'),
(16, 'nbr_news_default', '30', 'NBR NEWS DEFAULT'),
(17, 'max_width_upload_img', '800', 'max_width_upload_img'),
(18, 'max_height_upload_img', '600', 'max_height_upload_img'),
(19, 'upload_img_quality', '1', 'upload_img_quality'),
(20, 'max_img_size_upload', '2000000', 'max_img_size_upload'),
(21, 'default_nbr_days_load_import', '10', 'default_nbr_days_load_import'),
(22, 'sale_all_taux', '10', 'SALE TAUX'),
(23, 'start_time_backup', '8', 'START TIME_BACK_UP'),
(24, 'end_time_backup', '24', 'END TIME_BACK_UP'),
(25, 'default_discount_taux', '30', 'default_discount_taux'),
(26, 'default_fund_id', '18', 'default_fund_id'),
(27, 'defautl_source_fund_id', '1', 'defautl_source_fund_id'),
(28, 'defautl_dest_fund_id', '18', 'defautl_dest_fund_id');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
