/*
SQLyog Job Agent v11.11 (64 bit) Copyright(c) Webyog Inc. All Rights Reserved.

MySQL - 5.1.36-community  
*********************************************************************
*/
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/* SYNC DB : zkpmolfu_banhang */ 
SET AUTOCOMMIT = 0;
/* SYNC TABLE : `brand` */

/* SYNC TABLE : `category` */

/* SYNC TABLE : `config` */

/* SYNC TABLE : `configuration` */

/* SYNC TABLE : `customer` */

/* SYNC TABLE : `customer_order` */

/* SYNC TABLE : `customer_reservation_histo` */

/* SYNC TABLE : `export_facture` */

/* SYNC TABLE : `export_facture_product` */

/* SYNC TABLE : `export_facture_trace` */

/* SYNC TABLE : `fund` */

	/*Start of batch : 1 */
INSERT INTO `zkpmolfu_banhang`.`fund` VALUES ('34', 'Chú Thúy', NULL);
	/*End   of batch : 1 */
/* SYNC TABLE : `fund_change_histo` */

	/*Start of batch : 1 */
UPDATE `zkpmolfu_banhang`.`fund_change_histo` SET `id`='377', `fund_id`='14', `amount`='1200000', `date`='2014-09-13 21:36:10', `description`='62.1 m, tự lam giay to', `ratio`='1', `user_id`='1'  WHERE (`id` = 377) ;
	/*End   of batch : 1 */
	/*Start of batch : 6 */
INSERT INTO `zkpmolfu_banhang`.`fund_change_histo` VALUES ('5586', '1', '-85', '2017-02-28 23:06:08', 'See spend : Đi ăn trưa 2 vợ chồng', '1', '1');
INSERT INTO `zkpmolfu_banhang`.`fund_change_histo` VALUES ('5584', '1', '-500', '2017-02-28 23:06:08', 'See spend : Mẹ nạp điện thoại', '1', '1');
INSERT INTO `zkpmolfu_banhang`.`fund_change_histo` VALUES ('5583', '34', '1000', '2017-02-27 23:04:52', 'Vay 1M', '1', '1');
INSERT INTO `zkpmolfu_banhang`.`fund_change_histo` VALUES ('5582', '1', '-1000', '2017-02-27 23:04:52', 'Vay 1M', '1', '1');
INSERT INTO `zkpmolfu_banhang`.`fund_change_histo` VALUES ('5585', '1', '-100', '2017-02-28 23:06:08', 'See spend : Bố nạp điện thoại', '1', '1');
	/*End   of batch : 6 */
	/*Start of batch : 7 */
INSERT INTO `zkpmolfu_banhang`.`fund_change_histo` VALUES ('5587', '1', '-115', '2017-02-28 23:06:08', 'See spend : Ăn sáng với chú thúy', '1', '1');
	/*End   of batch : 7 */
/* SYNC TABLE : `import_facture` */

/* SYNC TABLE : `inout_type` */

/* SYNC TABLE : `money_inout` */

/* SYNC TABLE : `news` */

/* SYNC TABLE : `product` */

/* SYNC TABLE : `product_deviation` */

/* SYNC TABLE : `product_import` */

/* SYNC TABLE : `product_return` */

/* SYNC TABLE : `property` */

	/*Start of batch : 1 */
UPDATE `zkpmolfu_banhang`.`property` SET `id`='506', `date`='2015-09-03', `amount`='1500280', `ket`='24000', `loan`='88224', `fund`='1120620', `store`='467548', `debt`='337'  WHERE (`id` = 506) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1008', `date`='2017-02-10', `amount`='2192990', `ket`='13700', `loan`='15120', `fund`='1740760', `store`='464287', `debt`='3055'  WHERE (`id` = 1008) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1007', `date`='2017-01-28', `amount`='2193490', `ket`='13700', `loan`='15120', `fund`='1740760', `store`='464789', `debt`='3055'  WHERE (`id` = 1007) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1006', `date`='2017-01-27', `amount`='2183990', `ket`='17200', `loan`='15120', `fund`='1731260', `store`='464789', `debt`='3055'  WHERE (`id` = 1006) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1005', `date`='2017-01-26', `amount`='2195690', `ket`='17200', `loan`='15120', `fund`='1731260', `store`='476487', `debt`='3055'  WHERE (`id` = 1005) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1004', `date`='2017-01-25', `amount`='2200400', `ket`='13050', `loan`='27220', `fund`='1725170', `store`='495558', `debt`='6894'  WHERE (`id` = 1004) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1003', `date`='2017-01-24', `amount`='2201530', `ket`='25700', `loan`='50253', `fund`='1734670', `store`='510224', `debt`='6894'  WHERE (`id` = 1003) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1002', `date`='2017-01-23', `amount`='2239350', `ket`='78070', `loan`='67967', `fund`='1786010', `store`='514414', `debt`='6894'  WHERE (`id` = 1002) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1001', `date`='2017-01-22', `amount`='2152800', `ket`='10500', `loan`='106297', `fund`='1721940', `store`='530261', `debt`='6894'  WHERE (`id` = 1001) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1000', `date`='2017-01-21', `amount`='2139340', `ket`='15200', `loan`='100152', `fund`='1698640', `store`='533961', `debt`='6894'  WHERE (`id` = 1000) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='999', `date`='2017-01-20', `amount`='2148480', `ket`='15200', `loan`='100152', `fund`='1699640', `store`='542093', `debt`='6894'  WHERE (`id` = 999) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='998', `date`='2017-01-19', `amount`='2157110', `ket`='15200', `loan`='100152', `fund`='1699640', `store`='550731', `debt`='6894'  WHERE (`id` = 998) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='997', `date`='2017-01-18', `amount`='2162090', `ket`='15200', `loan`='100152', `fund`='1699640', `store`='555711', `debt`='6894'  WHERE (`id` = 997) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='996', `date`='2017-01-17', `amount`='2167980', `ket`='15200', `loan`='100152', `fund`='1699640', `store`='561594', `debt`='6894'  WHERE (`id` = 996) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='995', `date`='2017-01-16', `amount`='2173270', `ket`='15200', `loan`='100152', `fund`='1699640', `store`='566887', `debt`='6894'  WHERE (`id` = 995) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='994', `date`='2017-01-15', `amount`='2170230', `ket`='4000', `loan`='100152', `fund`='1688440', `store`='575051', `debt`='6894'  WHERE (`id` = 994) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='993', `date`='2017-01-14', `amount`='2178440', `ket`='4000', `loan`='95582', `fund`='1737810', `store`='529313', `debt`='6894'  WHERE (`id` = 993) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='992', `date`='2017-01-13', `amount`='2169080', `ket`='9350', `loan`='125797', `fund`='1742980', `store`='545002', `debt`='6894'  WHERE (`id` = 992) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='991', `date`='2017-01-12', `amount`='2172920', `ket`='19500', `loan`='136787', `fund`='1753190', `store`='549841', `debt`='6671'  WHERE (`id` = 991) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='990', `date`='2017-01-11', `amount`='2173600', `ket`='19500', `loan`='136787', `fund`='1753190', `store`='550517', `debt`='6671'  WHERE (`id` = 990) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='989', `date`='2017-01-10', `amount`='2185810', `ket`='23700', `loan`='159117', `fund`='1782750', `store`='554632', `debt`='7547'  WHERE (`id` = 989) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='988', `date`='2017-01-09', `amount`='2160370', `ket`='23700', `loan`='159117', `fund`='1752750', `store`='559190', `debt`='7547'  WHERE (`id` = 988) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='987', `date`='2017-01-08', `amount`='2157670', `ket`='16500', `loan`='159117', `fund`='1745050', `store`='564186', `debt`='7547'  WHERE (`id` = 987) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='986', `date`='2017-01-07', `amount`='2160020', `ket`='16500', `loan`='159117', `fund`='1745050', `store`='566538', `debt`='7547'  WHERE (`id` = 986) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='985', `date`='2017-01-06', `amount`='2163040', `ket`='16500', `loan`='159117', `fund`='1745050', `store`='570023', `debt`='7079'  WHERE (`id` = 985) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='984', `date`='2017-01-05', `amount`='2152610', `ket`='15400', `loan`='152557', `fund`='1737050', `store`='561041', `debt`='7079'  WHERE (`id` = 984) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='983', `date`='2017-01-04', `amount`='2164200', `ket`='15400', `loan`='152557', `fund`='1744730', `store`='564949', `debt`='7079'  WHERE (`id` = 983) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='982', `date`='2017-01-03', `amount`='2162590', `ket`='30200', `loan`='152557', `fund`='1738530', `store`='569538', `debt`='7079'  WHERE (`id` = 982) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='981', `date`='2017-01-02', `amount`='2156890', `ket`='19500', `loan`='152507', `fund`='1704990', `store`='599458', `debt`='4949'  WHERE (`id` = 981) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='980', `date`='2017-01-01', `amount`='2158970', `ket`='19800', `loan`='152507', `fund`='1705290', `store`='601236', `debt`='4949'  WHERE (`id` = 980) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='978', `date`='2016-12-31', `amount`='2154020', `ket`='7000', `loan`='152507', `fund`='1693690', `store`='607884', `debt`='4949'  WHERE (`id` = 978) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='977', `date`='2016-12-30', `amount`='2156690', `ket`='9600', `loan`='152507', `fund`='1690340', `store`='613911', `debt`='4949'  WHERE (`id` = 977) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='976', `date`='2016-12-29', `amount`='2161050', `ket`='11100', `loan`='138675', `fund`='1691850', `store`='602929', `debt`='4949'  WHERE (`id` = 976) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='975', `date`='2016-12-28', `amount`='2151630', `ket`='11000', `loan`='151595', `fund`='1691750', `store`='606529', `debt`='4949'  WHERE (`id` = 975) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='974', `date`='2016-12-27', `amount`='2160250', `ket`='11000', `loan`='151760', `fund`='1691750', `store`='615306', `debt`='4949'  WHERE (`id` = 974) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='973', `date`='2016-12-26', `amount`='2151260', `ket`='8300', `loan`='154600', `fund`='1688820', `store`='612090', `debt`='4949'  WHERE (`id` = 973) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='972', `date`='2016-12-25', `amount`='2147100', `ket`='1300', `loan`='146215', `fund`='1681570', `store`='606790', `debt`='4949'  WHERE (`id` = 972) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='971', `date`='2016-12-24', `amount`='2160720', `ket`='8300', `loan`='146215', `fund`='1688570', `store`='613412', `debt`='4949'  WHERE (`id` = 971) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='970', `date`='2016-12-23', `amount`='2154320', `ket`='4600', `loan`='155215', `fund`='1685320', `store`='619264', `debt`='4949'  WHERE (`id` = 970) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='969', `date`='2016-12-22', `amount`='2158590', `ket`='4600', `loan`='155215', `fund`='1685320', `store`='623538', `debt`='4949'  WHERE (`id` = 969) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='968', `date`='2016-12-21', `amount`='2160180', `ket`='3500', `loan`='155215', `fund`='1684420', `store`='626435', `debt`='4541'  WHERE (`id` = 968) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='967', `date`='2016-12-20', `amount`='2162760', `ket`='3500', `loan`='155215', `fund`='1684420', `store`='629013', `debt`='4541'  WHERE (`id` = 967) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='966', `date`='2016-12-19', `amount`='2160010', `ket`='3100', `loan`='160225', `fund`='1683580', `store`='632115', `debt`='4541'  WHERE (`id` = 966) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='965', `date`='2016-12-18', `amount`='2156890', `ket`='4700', `loan`='168505', `fund`='1683180', `store`='637050', `debt`='5165'  WHERE (`id` = 965) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='964', `date`='2016-12-17', `amount`='2159340', `ket`='5700', `loan`='131430', `fund`='1683680', `store`='601921', `debt`='5165'  WHERE (`id` = 964) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='963', `date`='2016-12-16', `amount`='2155950', `ket`='4200', `loan`='138930', `fund`='1681850', `store`='607861', `debt`='5165'  WHERE (`id` = 963) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='962', `date`='2016-12-15', `amount`='2153340', `ket`='8200', `loan`='114190', `fund`='1684690', `store`='577671', `debt`='5165'  WHERE (`id` = 962) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='961', `date`='2016-12-14', `amount`='2152490', `ket`='9800', `loan`='114190', `fund`='1686370', `store`='574520', `debt`='5795'  WHERE (`id` = 961) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='960', `date`='2016-12-13', `amount`='2151550', `ket`='16000', `loan`='95120', `fund`='1692920', `store`='547957', `debt`='5795'  WHERE (`id` = 960) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='959', `date`='2016-12-12', `amount`='2149300', `ket`='10000', `loan`='95120', `fund`='1686920', `store`='551711', `debt`='5795'  WHERE (`id` = 959) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='958', `date`='2016-12-11', `amount`='2147020', `ket`='21800', `loan`='91005', `fund`='1698380', `store`='533848', `debt`='5795'  WHERE (`id` = 958) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='957', `date`='2016-12-10', `amount`='2145110', `ket`='15000', `loan`='91005', `fund`='1691550', `store`='538764', `debt`='5795'  WHERE (`id` = 957) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='956', `date`='2016-12-09', `amount`='2143990', `ket`='5100', `loan`='91005', `fund`='1681650', `store`='547550', `debt`='5795'  WHERE (`id` = 956) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='955', `date`='2016-12-08', `amount`='2144230', `ket`='9500', `loan`='90855', `fund`='1687850', `store`='541441', `debt`='5795'  WHERE (`id` = 955) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='954', `date`='2016-12-07', `amount`='2146910', `ket`='9500', `loan`='90855', `fund`='1687850', `store`='544121', `debt`='5795'  WHERE (`id` = 954) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='953', `date`='2016-12-06', `amount`='2112950', `ket`='13400', `loan`='90855', `fund`='1649750', `store`='547989', `debt`='6065'  WHERE (`id` = 953) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='952', `date`='2016-12-05', `amount`='2115330', `ket`='13400', `loan`='90855', `fund`='1649750', `store`='550369', `debt`='6065'  WHERE (`id` = 952) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='951', `date`='2016-12-04', `amount`='2115740', `ket`='15800', `loan`='82047', `fund`='1650980', `store`='540743', `debt`='6065'  WHERE (`id` = 951) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='950', `date`='2016-12-03', `amount`='2112370', `ket`='10400', `loan`='87047', `fund`='1645580', `store`='547805', `debt`='6037'  WHERE (`id` = 950) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='949', `date`='2016-12-02', `amount`='2101410', `ket`='3600', `loan`='95972', `fund`='1638960', `store`='552385', `debt`='6037'  WHERE (`id` = 949) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='948', `date`='2016-12-01', `amount`='2105640', `ket`='3600', `loan`='91352', `fund`='1638150', `store`='552798', `debt`='6037'  WHERE (`id` = 948) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='947', `date`='2016-11-30', `amount`='2108070', `ket`='16000', `loan`='116892', `fund`='1665550', `store`='553372', `debt`='6037'  WHERE (`id` = 947) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='946', `date`='2016-11-29', `amount`='2105960', `ket`='10800', `loan`='113792', `fund`='1660150', `store`='553565', `debt`='6037'  WHERE (`id` = 946) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='945', `date`='2016-11-28', `amount`='2153410', `ket`='3700', `loan`='111022', `fund`='1702560', `store`='556459', `debt`='5413'  WHERE (`id` = 945) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='944', `date`='2016-11-27', `amount`='2151310', `ket`='8800', `loan`='121983', `fund`='1698480', `store`='569404', `debt`='5413'  WHERE (`id` = 944) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='943', `date`='2016-11-26', `amount`='2149270', `ket`='9750', `loan`='105928', `fund`='1705020', `store`='544765', `debt`='5413'  WHERE (`id` = 943) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='942', `date`='2016-11-25', `amount`='2148350', `ket`='18100', `loan`='117788', `fund`='1713380', `store`='547349', `debt`='5413'  WHERE (`id` = 942) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='941', `date`='2016-11-24', `amount`='2143740', `ket`='7500', `loan`='109970', `fund`='1702880', `store`='545414', `debt`='5413'  WHERE (`id` = 941) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='940', `date`='2016-11-23', `amount`='2141730', `ket`='2700', `loan`='109970', `fund`='1698080', `store`='548208', `debt`='5413'  WHERE (`id` = 940) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='939', `date`='2016-11-22', `amount`='2140460', `ket`='-200', `loan`='105920', `fund`='1695130', `store`='545840', `debt`='5413'  WHERE (`id` = 939) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='938', `date`='2016-11-21', `amount`='2139760', `ket`='12500', `loan`='105828', `fund`='1707870', `store`='532308', `debt`='5413'  WHERE (`id` = 938) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='937', `date`='2016-11-20', `amount`='2138220', `ket`='7400', `loan`='105828', `fund`='1702770', `store`='535870', `debt`='5413'  WHERE (`id` = 937) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='936', `date`='2016-11-19', `amount`='2141560', `ket`='13000', `loan`='111828', `fund`='1708370', `store`='539604', `debt`='5413'  WHERE (`id` = 936) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='935', `date`='2016-11-18', `amount`='2139680', `ket`='7700', `loan`='107268', `fund`='1703020', `store`='538332', `debt`='5601'  WHERE (`id` = 935) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='934', `date`='2016-11-17', `amount`='2140280', `ket`='4700', `loan`='101343', `fund`='1699520', `store`='536499', `debt`='5601'  WHERE (`id` = 934) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='933', `date`='2016-11-16', `amount`='2138560', `ket`='7800', `loan`='102198', `fund`='1702720', `store`='532439', `debt`='5601'  WHERE (`id` = 933) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='932', `date`='2016-11-15', `amount`='2136680', `ket`='2800', `loan`='102198', `fund`='1697720', `store`='535558', `debt`='5601'  WHERE (`id` = 932) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='931', `date`='2016-11-14', `amount`='2173230', `ket`='16500', `loan`='88220', `fund`='1735070', `store`='520784', `debt`='5601'  WHERE (`id` = 931) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='930', `date`='2016-11-13', `amount`='2170390', `ket`='14900', `loan`='94220', `fund`='1733470', `store`='525538', `debt`='5601'  WHERE (`id` = 930) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='929', `date`='2016-11-12', `amount`='2162490', `ket`='14200', `loan`='100520', `fund`='1734740', `store`='523300', `debt`='4971'  WHERE (`id` = 929) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='928', `date`='2016-11-11', `amount`='2166070', `ket`='14200', `loan`='100520', `fund`='1734740', `store`='526878', `debt`='4971'  WHERE (`id` = 928) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='927', `date`='2016-11-10', `amount`='2165560', `ket`='17700', `loan`='102010', `fund`='1738040', `store`='524558', `debt`='4971'  WHERE (`id` = 927) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='926', `date`='2016-11-09', `amount`='2163950', `ket`='13250', `loan`='99420', `fund`='1732220', `store`='526446', `debt`='4701'  WHERE (`id` = 926) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='925', `date`='2016-11-08', `amount`='2130580', `ket`='5440', `loan`='96865', `fund`='1694420', `store`='529037', `debt`='3989'  WHERE (`id` = 925) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='924', `date`='2016-11-07', `amount`='2129260', `ket`='4600', `loan`='99275', `fund`='1693330', `store`='531217', `debt`='3989'  WHERE (`id` = 924) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='923', `date`='2016-11-06', `amount`='2126950', `ket`='12000', `loan`='114275', `fund`='1701100', `store`='536136', `debt`='3989'  WHERE (`id` = 923) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='922', `date`='2016-11-05', `amount`='2126170', `ket`='31550', `loan`='103600', `fund`='1695190', `store`='531092', `debt`='3494'  WHERE (`id` = 922) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='921', `date`='2016-11-04', `amount`='2123730', `ket`='30450', `loan`='106575', `fund`='1694090', `store`='532719', `debt`='3494'  WHERE (`id` = 921) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='920', `date`='2016-11-03', `amount`='2122600', `ket`='27250', `loan`='106575', `fund`='1690390', `store`='535291', `debt`='3494'  WHERE (`id` = 920) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='919', `date`='2016-11-02', `amount`='2116760', `ket`='11250', `loan`='92970', `fund`='1674390', `store`='531792', `debt`='3546'  WHERE (`id` = 919) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='918', `date`='2016-11-01', `amount`='2115530', `ket`='11050', `loan`='87580', `fund`='1674990', `store`='523112', `debt`='5007'  WHERE (`id` = 918) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='917', `date`='2016-10-31', `amount`='2113620', `ket`='6750', `loan`='85970', `fund`='1669690', `store`='524895', `debt`='5007'  WHERE (`id` = 917) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='916', `date`='2016-10-30', `amount`='2117230', `ket`='600', `loan`='91106', `fund`='1673520', `store`='529804', `debt`='5007'  WHERE (`id` = 916) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='915', `date`='2016-10-29', `amount`='2121980', `ket`='3300', `loan`='91106', `fund`='1676220', `store`='531860', `debt`='5007'  WHERE (`id` = 915) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='914', `date`='2016-10-28', `amount`='2139930', `ket`='19100', `loan`='91106', `fund`='1691960', `store`='534072', `debt`='5007'  WHERE (`id` = 914) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='913', `date`='2016-10-27', `amount`='2136230', `ket`='12500', `loan`='91106', `fund`='1685360', `store`='536968', `debt`='5007'  WHERE (`id` = 913) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='912', `date`='2016-10-26', `amount`='2141280', `ket`='16950', `loan`='77410', `fund`='1689940', `store`='523741', `debt`='5007'  WHERE (`id` = 912) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='911', `date`='2016-10-25', `amount`='2134270', `ket`='17100', `loan`='88210', `fund`='1690290', `store`='527183', `debt`='5007'  WHERE (`id` = 911) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='910', `date`='2016-10-24', `amount`='2132780', `ket`='20400', `loan`='94210', `fund`='1693040', `store`='528941', `debt`='5007'  WHERE (`id` = 910) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='909', `date`='2016-10-23', `amount`='2136190', `ket`='20400', `loan`='94210', `fund`='1693040', `store`='532357', `debt`='5007'  WHERE (`id` = 909) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='908', `date`='2016-10-22', `amount`='2136390', `ket`='22400', `loan`='94210', `fund`='1687880', `store`='537714', `debt`='5007'  WHERE (`id` = 908) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='907', `date`='2016-10-21', `amount`='2142800', `ket`='19600', `loan`='94210', `fund`='1692350', `store`='539652', `debt`='5007'  WHERE (`id` = 907) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='906', `date`='2016-10-20', `amount`='2141330', `ket`='12650', `loan`='94210', `fund`='1685400', `store`='545306', `debt`='4832'  WHERE (`id` = 906) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='905', `date`='2016-10-19', `amount`='2139370', `ket`='7300', `loan`='80196', `fund`='1678800', `store`='535930', `debt`='4832'  WHERE (`id` = 905) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='904', `date`='2016-10-18', `amount`='2139090', `ket`='11700', `loan`='88301', `fund`='1684040', `store`='538520', `debt`='4832'  WHERE (`id` = 904) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='903', `date`='2016-10-17', `amount`='2140510', `ket`='10300', `loan`='88301', `fund`='1682560', `store`='541177', `debt`='5072'  WHERE (`id` = 903) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='902', `date`='2016-10-16', `amount`='2139140', `ket`='14000', `loan`='89946', `fund`='1686210', `store`='538040', `debt`='4832'  WHERE (`id` = 902) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='901', `date`='2016-10-15', `amount`='2136540', `ket`='11850', `loan`='97946', `fund`='1684210', `store`='545717', `debt`='4556'  WHERE (`id` = 901) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='900', `date`='2016-10-14', `amount`='2134210', `ket`='4600', `loan`='87516', `fund`='1673660', `store`='543749', `debt`='4316'  WHERE (`id` = 900) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='899', `date`='2016-10-13', `amount`='2140230', `ket`='4550', `loan`='90916', `fund`='1673010', `store`='553823', `debt`='4316'  WHERE (`id` = 899) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='898', `date`='2016-10-12', `amount`='2141860', `ket`='4550', `loan`='90916', `fund`='1673010', `store`='555453', `debt`='4316'  WHERE (`id` = 898) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='897', `date`='2016-10-11', `amount`='2107080', `ket`='-3350', `loan`='70991', `fund`='1654030', `store`='519720', `debt`='4316'  WHERE (`id` = 897) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='896', `date`='2016-10-10', `amount`='2108370', `ket`='-3350', `loan`='70991', `fund`='1654030', `store`='521011', `debt`='4316'  WHERE (`id` = 896) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='895', `date`='2016-10-09', `amount`='2110410', `ket`='-3350', `loan`='70991', `fund`='1654030', `store`='523051', `debt`='4316'  WHERE (`id` = 895) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='894', `date`='2016-10-08', `amount`='2112840', `ket`='-3350', `loan`='70991', `fund`='1654030', `store`='525478', `debt`='4316'  WHERE (`id` = 894) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='893', `date`='2016-10-07', `amount`='2107060', `ket`='500', `loan`='75716', `fund`='1654630', `store`='523830', `debt`='4316'  WHERE (`id` = 893) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='892', `date`='2016-10-06', `amount`='2109150', `ket`='500', `loan`='75716', `fund`='1654630', `store`='525919', `debt`='4316'  WHERE (`id` = 892) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='891', `date`='2016-10-05', `amount`='2112660', `ket`='500', `loan`='75716', `fund`='1654630', `store`='529429', `debt`='4316'  WHERE (`id` = 891) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='890', `date`='2016-10-04', `amount`='2074260', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='512819', `debt`='4316'  WHERE (`id` = 890) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='889', `date`='2016-10-03', `amount`='2076200', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='514764', `debt`='4316'  WHERE (`id` = 889) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='888', `date`='2016-10-02', `amount`='2078470', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='517034', `debt`='4316'  WHERE (`id` = 888) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='887', `date`='2016-10-01', `amount`='2082210', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='520769', `debt`='4316'  WHERE (`id` = 887) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='886', `date`='2016-09-30', `amount`='2085740', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='524299', `debt`='4316'  WHERE (`id` = 886) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='885', `date`='2016-09-29', `amount`='2088050', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='526610', `debt`='4316'  WHERE (`id` = 885) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='884', `date`='2016-09-28', `amount`='2090640', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='529200', `debt`='4316'  WHERE (`id` = 884) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='883', `date`='2016-09-27', `amount`='2094970', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='533535', `debt`='4316'  WHERE (`id` = 883) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='882', `date`='2016-09-26', `amount`='2097760', `ket`='8600', `loan`='88012', `fund`='1645130', `store`='536326', `debt`='4316'  WHERE (`id` = 882) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='130', `date`='2014-08-01', `amount`='1017330', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 130) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='131', `date`='2014-08-02', `amount`='1019820', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 131) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='132', `date`='2014-08-03', `amount`='1021450', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 132) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='133', `date`='2014-08-04', `amount`='1022930', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 133) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='881', `date`='2016-09-25', `amount`='2100460', `ket`='5000', `loan`='88012', `fund`='1642090', `store`='542067', `debt`='4316'  WHERE (`id` = 881) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='880', `date`='2016-09-24', `amount`='2099990', `ket`='29100', `loan`='88012', `fund`='1639190', `store`='544496', `debt`='4316'  WHERE (`id` = 880) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='879', `date`='2016-09-23', `amount`='2102600', `ket`='29100', `loan`='88012', `fund`='1639190', `store`='547104', `debt`='4316'  WHERE (`id` = 879) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='878', `date`='2016-09-22', `amount`='2101350', `ket`='25400', `loan`='88012', `fund`='1635490', `store`='549554', `debt`='4316'  WHERE (`id` = 878) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='877', `date`='2016-09-21', `amount`='2093140', `ket`='10600', `loan`='95287', `fund`='1630650', `store`='553463', `debt`='4316'  WHERE (`id` = 877) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='876', `date`='2016-09-20', `amount`='2096780', `ket`='11150', `loan`='95287', `fund`='1631400', `store`='556353', `debt`='4316'  WHERE (`id` = 876) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='875', `date`='2016-09-19', `amount`='2093290', `ket`='7050', `loan`='71536', `fund`='1627300', `store`='533218', `debt`='4316'  WHERE (`id` = 875) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='874', `date`='2016-09-18', `amount`='2090130', `ket`='1050', `loan`='72646', `fund`='1621300', `store`='537163', `debt`='4316'  WHERE (`id` = 874) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='873', `date`='2016-09-17', `amount`='2085650', `ket`='11000', `loan`='89631', `fund`='1631070', `store`='539900', `debt`='4316'  WHERE (`id` = 873) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='872', `date`='2016-09-16', `amount`='2088710', `ket`='11000', `loan`='89631', `fund`='1631070', `store`='542962', `debt`='4316'  WHERE (`id` = 872) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='871', `date`='2016-09-15', `amount`='2092000', `ket`='11000', `loan`='89631', `fund`='1631070', `store`='546245', `debt`='4316'  WHERE (`id` = 871) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='145', `date`='2014-08-16', `amount`='1001120', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 145) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='146', `date`='2014-08-17', `amount`='1004240', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 146) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='147', `date`='2014-08-18', `amount`='1006460', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 147) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='148', `date`='2014-08-19', `amount`='1009140', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 148) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='149', `date`='2014-08-20', `amount`='1005860', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 149) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='150', `date`='2014-08-21', `amount`='1001890', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 150) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='151', `date`='2014-08-22', `amount`='1003230', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 151) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='152', `date`='2014-08-23', `amount`='1004490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 152) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='153', `date`='2014-08-24', `amount`='1006390', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 153) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='154', `date`='2014-08-25', `amount`='1006240', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 154) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='155', `date`='2014-08-26', `amount`='1007270', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 155) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='156', `date`='2014-08-27', `amount`='1008980', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 156) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='157', `date`='2014-08-28', `amount`='1008640', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 157) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='158', `date`='2014-08-29', `amount`='1004960', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 158) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='159', `date`='2014-08-30', `amount`='1013620', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 159) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='870', `date`='2016-09-14', `amount`='2091900', `ket`='23600', `loan`='102311', `fund`='1643720', `store`='545680', `debt`='4816'  WHERE (`id` = 870) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='869', `date`='2016-09-13', `amount`='2091440', `ket`='18200', `loan`='103311', `fund`='1637370', `store`='553064', `debt`='4316'  WHERE (`id` = 869) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='868', `date`='2016-09-12', `amount`='2093040', `ket`='16800', `loan`='85381', `fund`='1635970', `store`='538138', `debt`='4316'  WHERE (`id` = 868) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='867', `date`='2016-09-11', `amount`='2092550', `ket`='14200', `loan`='68641', `fund`='1633220', `store`='523650', `debt`='4316'  WHERE (`id` = 867) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='866', `date`='2016-09-10', `amount`='2090090', `ket`='7100', `loan`='68641', `fund`='1626270', `store`='528145', `debt`='4316'  WHERE (`id` = 866) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='865', `date`='2016-09-09', `amount`='2093840', `ket`='7100', `loan`='68641', `fund`='1626270', `store`='531890', `debt`='4316'  WHERE (`id` = 865) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='864', `date`='2016-09-08', `amount`='2093760', `ket`='11200', `loan`='73335', `fund`='1630330', `store`='532446', `debt`='4316'  WHERE (`id` = 864) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='863', `date`='2016-09-07', `amount`='2097710', `ket`='12400', `loan`='73335', `fund`='1631600', `store`='535125', `debt`='4316'  WHERE (`id` = 863) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='168', `date`='2014-09-08', `amount`='1047040', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 168) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='169', `date`='2014-09-09', `amount`='1039560', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 169) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='170', `date`='2014-09-10', `amount`='1058090', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 170) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='171', `date`='2014-09-11', `amount`='1058170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 171) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='172', `date`='2014-09-12', `amount`='1066110', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 172) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='173', `date`='2014-09-13', `amount`='1067160', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 173) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='174', `date`='2014-09-14', `amount`='1049310', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 174) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='175', `date`='2014-09-15', `amount`='1046150', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 175) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='176', `date`='2014-09-16', `amount`='1046240', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 176) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='177', `date`='2014-09-17', `amount`='1047600', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 177) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='178', `date`='2014-09-18', `amount`='1045660', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 178) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='179', `date`='2014-09-19', `amount`='1050730', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 179) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='180', `date`='2014-09-20', `amount`='1050410', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 180) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='181', `date`='2014-09-21', `amount`='1048210', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 181) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='182', `date`='2014-09-22', `amount`='1050230', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 182) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='183', `date`='2014-09-23', `amount`='1049110', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 183) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='184', `date`='2014-09-24', `amount`='1047000', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 184) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='185', `date`='2014-09-25', `amount`='1047760', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 185) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='186', `date`='2014-09-26', `amount`='1049670', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 186) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='187', `date`='2014-09-27', `amount`='1047850', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 187) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='188', `date`='2014-09-28', `amount`='1051440', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 188) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='189', `date`='2014-09-29', `amount`='1052260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 189) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='190', `date`='2014-09-30', `amount`='1051330', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 190) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='191', `date`='2014-10-01', `amount`='1052530', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 191) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='192', `date`='2014-10-02', `amount`='1054620', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 192) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='193', `date`='2014-10-03', `amount`='1056710', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 193) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='194', `date`='2014-10-04', `amount`='1053910', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 194) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='195', `date`='2014-10-05', `amount`='1056370', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 195) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='196', `date`='2014-10-06', `amount`='1056370', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 196) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='197', `date`='2014-10-07', `amount`='1053050', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 197) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='198', `date`='2014-10-08', `amount`='1055850', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 198) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='199', `date`='2014-10-09', `amount`='1066400', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 199) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='200', `date`='2014-10-10', `amount`='1063290', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 200) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='201', `date`='2014-10-11', `amount`='1060530', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 201) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='202', `date`='2014-10-12', `amount`='1063480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 202) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='203', `date`='2014-10-13', `amount`='1064490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 203) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='204', `date`='2014-10-14', `amount`='1066410', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 204) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='205', `date`='2014-10-15', `amount`='1068680', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 205) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='206', `date`='2014-10-16', `amount`='1072060', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 206) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='207', `date`='2014-10-17', `amount`='1073280', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 207) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='208', `date`='2014-10-18', `amount`='1075050', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 208) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='209', `date`='2014-10-19', `amount`='1069690', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 209) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='210', `date`='2014-10-20', `amount`='1079030', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 210) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='211', `date`='2014-10-21', `amount`='1076660', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 211) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='212', `date`='2014-10-22', `amount`='1075880', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 212) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='213', `date`='2014-10-23', `amount`='1079710', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 213) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='214', `date`='2014-10-24', `amount`='1080390', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 214) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='215', `date`='2014-10-25', `amount`='1077630', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 215) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='216', `date`='2014-10-26', `amount`='1081570', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 216) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='217', `date`='2014-10-27', `amount`='1085530', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 217) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='218', `date`='2014-10-28', `amount`='1086540', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 218) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='219', `date`='2014-10-29', `amount`='1087050', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 219) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='220', `date`='2014-10-30', `amount`='1089920', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 220) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='221', `date`='2014-10-31', `amount`='1093170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 221) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='222', `date`='2014-11-01', `amount`='1094830', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 222) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='223', `date`='2014-11-02', `amount`='1097300', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 223) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='224', `date`='2014-11-03', `amount`='1102630', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 224) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='225', `date`='2014-11-04', `amount`='1096570', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 225) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='226', `date`='2014-11-05', `amount`='1081780', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 226) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='227', `date`='2014-11-06', `amount`='1115540', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 227) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='228', `date`='2014-11-07', `amount`='1111110', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 228) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='229', `date`='2014-11-08', `amount`='1113400', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 229) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='230', `date`='2014-11-09', `amount`='1126360', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 230) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='231', `date`='2014-11-10', `amount`='1128260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 231) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='232', `date`='2014-11-11', `amount`='1131110', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 232) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='233', `date`='2014-11-12', `amount`='1124350', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 233) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='234', `date`='2014-11-13', `amount`='1140670', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 234) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='235', `date`='2014-11-14', `amount`='1147310', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 235) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='236', `date`='2014-11-15', `amount`='1148510', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 236) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='237', `date`='2014-11-16', `amount`='1151390', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 237) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='238', `date`='2014-11-17', `amount`='1155940', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 238) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='239', `date`='2014-11-18', `amount`='1159680', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 239) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='240', `date`='2014-11-19', `amount`='1117260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 240) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='241', `date`='2014-11-20', `amount`='1117860', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 241) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='242', `date`='2014-11-21', `amount`='1124040', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 242) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='243', `date`='2014-11-22', `amount`='1120400', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 243) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='244', `date`='2014-11-23', `amount`='1125190', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 244) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='245', `date`='2014-11-24', `amount`='1128180', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 245) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='246', `date`='2014-11-25', `amount`='1128480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 246) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='247', `date`='2014-11-26', `amount`='1135030', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 247) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='248', `date`='2014-11-27', `amount`='1132400', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 248) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='249', `date`='2014-11-28', `amount`='1139360', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 249) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='250', `date`='2014-11-29', `amount`='1141180', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 250) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='251', `date`='2014-11-30', `amount`='1142940', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 251) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='252', `date`='2014-12-01', `amount`='1139020', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 252) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='253', `date`='2014-12-02', `amount`='1137500', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 253) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='254', `date`='2014-12-03', `amount`='1143730', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 254) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='255', `date`='2014-12-04', `amount`='1141210', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 255) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='256', `date`='2014-12-05', `amount`='1148850', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 256) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='257', `date`='2014-12-06', `amount`='1153610', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 257) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='258', `date`='2014-12-07', `amount`='1156950', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 258) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='259', `date`='2014-12-08', `amount`='1163810', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 259) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='260', `date`='2014-12-09', `amount`='1174290', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 260) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='261', `date`='2014-12-10', `amount`='1177970', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 261) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='262', `date`='2014-12-11', `amount`='1180440', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 262) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='263', `date`='2014-12-12', `amount`='1173800', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 263) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='264', `date`='2014-12-13', `amount`='1203900', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 264) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='265', `date`='2014-12-14', `amount`='1209780', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 265) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='266', `date`='2014-12-15', `amount`='1202130', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 266) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='267', `date`='2014-12-16', `amount`='1220670', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 267) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='268', `date`='2014-12-17', `amount`='1249260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 268) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='269', `date`='2014-12-18', `amount`='1212030', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 269) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='270', `date`='2014-12-19', `amount`='1220080', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 270) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='271', `date`='2014-12-20', `amount`='1226480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 271) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='272', `date`='2014-12-21', `amount`='1224870', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 272) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='273', `date`='2014-12-22', `amount`='1220040', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 273) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='274', `date`='2014-12-23', `amount`='1230480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 274) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='275', `date`='2014-12-24', `amount`='1233900', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 275) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='276', `date`='2014-12-25', `amount`='1231350', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 276) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='277', `date`='2014-12-26', `amount`='1233530', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 277) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='278', `date`='2014-12-27', `amount`='1245870', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 278) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='279', `date`='2014-12-28', `amount`='1248490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 279) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='280', `date`='2014-12-29', `amount`='1242360', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 280) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='281', `date`='2014-12-30', `amount`='1250600', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 281) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='282', `date`='2014-12-31', `amount`='1245240', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 282) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='283', `date`='2015-01-01', `amount`='1234430', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 283) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='284', `date`='2015-01-02', `amount`='1226710', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 284) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='285', `date`='2015-01-03', `amount`='1229940', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 285) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='286', `date`='2015-01-04', `amount`='1242520', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 286) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='287', `date`='2015-01-05', `amount`='1237620', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 287) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='288', `date`='2015-01-06', `amount`='1242630', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 288) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='289', `date`='2015-01-07', `amount`='1242710', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 289) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='290', `date`='2015-01-08', `amount`='1247480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 290) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='291', `date`='2015-01-09', `amount`='1248780', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 291) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='292', `date`='2015-01-10', `amount`='1251560', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 292) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='293', `date`='2015-01-11', `amount`='1246260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 293) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='294', `date`='2015-01-12', `amount`='1248550', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 294) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='295', `date`='2015-01-13', `amount`='1259870', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 295) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='296', `date`='2015-01-14', `amount`='1252070', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 296) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='297', `date`='2015-01-15', `amount`='1258870', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 297) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='298', `date`='2015-01-16', `amount`='1271680', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 298) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='299', `date`='2015-01-17', `amount`='1268770', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 299) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='300', `date`='2015-01-18', `amount`='1269260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 300) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='301', `date`='2015-01-19', `amount`='1265890', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 301) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='302', `date`='2015-01-20', `amount`='1268830', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 302) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='303', `date`='2015-01-21', `amount`='1270890', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 303) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='304', `date`='2015-01-22', `amount`='1264840', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 304) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='305', `date`='2015-01-23', `amount`='1273720', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 305) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='306', `date`='2015-01-24', `amount`='1275800', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 306) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='307', `date`='2015-01-25', `amount`='1269760', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 307) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='308', `date`='2015-01-26', `amount`='1277780', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 308) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='309', `date`='2015-01-27', `amount`='1274150', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 309) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='310', `date`='2015-01-28', `amount`='1273910', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 310) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='311', `date`='2015-01-29', `amount`='1281910', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 311) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='312', `date`='2015-01-30', `amount`='1310940', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 312) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='313', `date`='2015-01-31', `amount`='1304780', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 313) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='314', `date`='2015-02-01', `amount`='1305830', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 314) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='315', `date`='2015-02-02', `amount`='1318510', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 315) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='316', `date`='2015-02-03', `amount`='1315410', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 316) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='317', `date`='2015-02-04', `amount`='1310550', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 317) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='318', `date`='2015-02-05', `amount`='1312960', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 318) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='319', `date`='2015-02-06', `amount`='1314680', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 319) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='320', `date`='2015-02-07', `amount`='1309440', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 320) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='321', `date`='2015-02-08', `amount`='1297060', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 321) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='322', `date`='2015-02-09', `amount`='1302740', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 322) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='323', `date`='2015-02-10', `amount`='1297650', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 323) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='324', `date`='2015-02-11', `amount`='1295530', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 324) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='325', `date`='2015-02-12', `amount`='1290480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 325) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='326', `date`='2015-02-13', `amount`='1207570', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 326) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='327', `date`='2015-02-14', `amount`='1290900', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 327) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='328', `date`='2015-02-15', `amount`='1291610', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 328) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='329', `date`='2015-02-16', `amount`='1306510', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 329) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='330', `date`='2015-02-19', `amount`='1288170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 330) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='331', `date`='2015-02-20', `amount`='1288170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 331) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='332', `date`='2015-02-21', `amount`='1288170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 332) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='333', `date`='2015-02-24', `amount`='1288170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 333) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='334', `date`='2015-02-26', `amount`='1288170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 334) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='335', `date`='2015-02-28', `amount`='1288090', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 335) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='336', `date`='2015-03-02', `amount`='1288090', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 336) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='337', `date`='2015-03-03', `amount`='1287570', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 337) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='338', `date`='2015-03-04', `amount`='1286960', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 338) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='339', `date`='2015-03-05', `amount`='1285980', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 339) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='340', `date`='2015-03-06', `amount`='1279050', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 340) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='341', `date`='2015-03-07', `amount`='1278270', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 341) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='342', `date`='2015-03-08', `amount`='1276410', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 342) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='343', `date`='2015-03-09', `amount`='1280820', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 343) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='344', `date`='2015-03-10', `amount`='1281450', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 344) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='345', `date`='2015-03-11', `amount`='1281660', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 345) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='346', `date`='2015-03-12', `amount`='1282030', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 346) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='347', `date`='2015-03-13', `amount`='1276260', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 347) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='348', `date`='2015-03-14', `amount`='1278620', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 348) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='349', `date`='2015-03-15', `amount`='1276720', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 349) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='350', `date`='2015-03-16', `amount`='1281900', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 350) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='351', `date`='2015-03-17', `amount`='1292470', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 351) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='352', `date`='2015-03-18', `amount`='1315740', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 352) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='353', `date`='2015-03-19', `amount`='1312160', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 353) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='354', `date`='2015-03-20', `amount`='1315640', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 354) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='355', `date`='2015-03-21', `amount`='1307290', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 355) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='356', `date`='2015-03-22', `amount`='1302510', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 356) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='357', `date`='2015-03-23', `amount`='1313960', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 357) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='358', `date`='2015-03-24', `amount`='1321450', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 358) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='359', `date`='2015-03-25', `amount`='1320550', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 359) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='360', `date`='2015-03-26', `amount`='1318720', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 360) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='361', `date`='2015-03-27', `amount`='1317500', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 361) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='362', `date`='2015-03-28', `amount`='1322360', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 362) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='363', `date`='2015-03-29', `amount`='1327180', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 363) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='364', `date`='2015-03-30', `amount`='1326680', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 364) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='365', `date`='2015-03-31', `amount`='1322810', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 365) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='366', `date`='2015-04-01', `amount`='1318910', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 366) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='367', `date`='2015-04-02', `amount`='1340220', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 367) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='368', `date`='2015-04-03', `amount`='1343130', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 368) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='369', `date`='2015-04-04', `amount`='1345520', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 369) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='370', `date`='2015-04-05', `amount`='1338310', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 370) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='371', `date`='2015-04-06', `amount`='1349480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 371) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='372', `date`='2015-04-07', `amount`='1346220', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 372) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='373', `date`='2015-04-08', `amount`='1356490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 373) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='374', `date`='2015-04-09', `amount`='1355590', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 374) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='375', `date`='2015-04-10', `amount`='1371770', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 375) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='376', `date`='2015-04-11', `amount`='1367890', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 376) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='377', `date`='2015-04-12', `amount`='1365080', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 377) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='378', `date`='2015-04-13', `amount`='1370650', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 378) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='379', `date`='2015-04-14', `amount`='1373670', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 379) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='380', `date`='2015-04-15', `amount`='1377330', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 380) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='381', `date`='2015-04-16', `amount`='1378010', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 381) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='382', `date`='2015-04-17', `amount`='1385490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 382) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='383', `date`='2015-04-18', `amount`='1386570', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 383) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='384', `date`='2015-04-19', `amount`='1379200', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 384) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='385', `date`='2015-04-20', `amount`='1387430', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 385) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='386', `date`='2015-04-21', `amount`='1385170', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 386) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='387', `date`='2015-04-22', `amount`='1386810', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 387) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='388', `date`='2015-04-23', `amount`='1389490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 388) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='389', `date`='2015-04-24', `amount`='1393480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 389) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='390', `date`='2015-04-25', `amount`='1383660', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 390) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='391', `date`='2015-04-26', `amount`='1388400', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 391) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='392', `date`='2015-04-27', `amount`='1388640', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 392) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='393', `date`='2015-04-28', `amount`='1391800', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 393) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='394', `date`='2015-04-29', `amount`='1396620', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 394) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='395', `date`='2015-04-30', `amount`='1392900', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 395) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='396', `date`='2015-05-01', `amount`='1393670', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 396) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='397', `date`='2015-05-02', `amount`='1393070', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 397) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='398', `date`='2015-05-03', `amount`='1397330', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 398) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='399', `date`='2015-05-04', `amount`='1401990', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 399) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='400', `date`='2015-05-05', `amount`='1402110', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 400) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='401', `date`='2015-05-06', `amount`='1404910', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 401) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='402', `date`='2015-05-07', `amount`='1408220', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 402) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='403', `date`='2015-05-08', `amount`='1408160', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 403) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='404', `date`='2015-05-09', `amount`='1427160', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 404) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='405', `date`='2015-05-10', `amount`='1393150', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 405) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='406', `date`='2015-05-11', `amount`='1414580', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 406) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='407', `date`='2015-05-12', `amount`='1415040', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 407) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='408', `date`='2015-05-13', `amount`='1413950', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 408) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='409', `date`='2015-05-14', `amount`='1417270', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 409) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='410', `date`='2015-05-15', `amount`='1413790', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 410) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='411', `date`='2015-05-16', `amount`='1406990', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 411) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='412', `date`='2015-05-17', `amount`='1407480', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 412) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='413', `date`='2015-05-18', `amount`='1405180', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 413) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='414', `date`='2015-05-19', `amount`='1427970', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 414) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='415', `date`='2015-05-20', `amount`='1433670', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 415) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='416', `date`='2015-05-21', `amount`='1436280', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 416) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='417', `date`='2015-05-22', `amount`='1432080', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 417) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='418', `date`='2015-05-23', `amount`='1432450', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 418) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='419', `date`='2015-05-24', `amount`='1419990', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 419) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='420', `date`='2015-05-25', `amount`='1436780', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 420) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='421', `date`='2015-05-26', `amount`='1436000', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 421) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='422', `date`='2015-05-27', `amount`='1426880', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 422) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='423', `date`='2015-05-28', `amount`='1429390', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 423) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='424', `date`='2015-05-29', `amount`='1397190', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 424) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='425', `date`='2015-05-30', `amount`='1397890', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 425) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='426', `date`='2015-05-31', `amount`='1393960', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 426) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='427', `date`='2015-06-01', `amount`='1388120', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 427) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='428', `date`='2015-06-02', `amount`='1408530', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 428) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='429', `date`='2015-06-03', `amount`='1412490', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 429) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='430', `date`='2015-06-04', `amount`='1409250', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 430) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='431', `date`='2015-06-05', `amount`='1411270', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 431) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='432', `date`='2015-06-06', `amount`='1418070', `ket`='0', `loan`='0', `fund`='0', `store`='0', `debt`='0'  WHERE (`id` = 432) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='435', `date`='2015-06-27', `amount`='1465840', `ket`='29000', `loan`='61819', `fund`='957855', `store`='568957', `debt`='849'  WHERE (`id` = 435) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='436', `date`='2015-06-28', `amount`='1463000', `ket`='29000', `loan`='61819', `fund`='957155', `store`='566812', `debt`='849'  WHERE (`id` = 436) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='437', `date`='2015-06-29', `amount`='1467370', `ket`='37200', `loan`='58879', `fund`='965635', `store`='559768', `debt`='849'  WHERE (`id` = 437) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='438', `date`='2015-06-30', `amount`='1467910', `ket`='40200', `loan`='58879', `fund`='968635', `store`='557309', `debt`='849'  WHERE (`id` = 438) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='439', `date`='2015-07-01', `amount`='1469200', `ket`='24500', `loan`='38754', `fund`='952935', `store`='554166', `debt`='849'  WHERE (`id` = 439) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='440', `date`='2015-07-02', `amount`='1469580', `ket`='30200', `loan`='38754', `fund`='958635', `store`='549583', `debt`='113'  WHERE (`id` = 440) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='441', `date`='2015-07-03', `amount`='1471530', `ket`='35500', `loan`='38754', `fund`='963935', `store`='546231', `debt`='113'  WHERE (`id` = 441) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='442', `date`='2015-07-04', `amount`='1474300', `ket`='44600', `loan`='38754', `fund`='973035', `store`='539901', `debt`='113'  WHERE (`id` = 442) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='443', `date`='2015-07-05', `amount`='1477120', `ket`='53500', `loan`='38754', `fund`='981935', `store`='533829', `debt`='113'  WHERE (`id` = 443) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='444', `date`='2015-07-06', `amount`='1479050', `ket`='61300', `loan`='38754', `fund`='989335', `store`='528356', `debt`='113'  WHERE (`id` = 444) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='445', `date`='2015-07-07', `amount`='1501560', `ket`='9900', `loan`='38754', `fund`='1013940', `store`='526269', `debt`='113'  WHERE (`id` = 445) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='446', `date`='2015-07-08', `amount`='1503200', `ket`='6600', `loan`='29734', `fund`='1010640', `store`='522189', `debt`='113'  WHERE (`id` = 446) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='447', `date`='2015-07-09', `amount`='1504830', `ket`='9700', `loan`='29734', `fund`='1016870', `store`='517580', `debt`='113'  WHERE (`id` = 447) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='448', `date`='2015-07-10', `amount`='1510730', `ket`='11400', `loan`='21474', `fund`='1018570', `store`='513423', `debt`='217'  WHERE (`id` = 448) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='449', `date`='2015-07-11', `amount`='1512490', `ket`='18250', `loan`='21474', `fund`='1025220', `store`='508530', `debt`='217'  WHERE (`id` = 449) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='452', `date`='2015-07-12', `amount`='1513940', `ket`='15700', `loan`='38074', `fund`='1022570', `store`='529225', `debt`='217'  WHERE (`id` = 452) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='453', `date`='2015-07-13', `amount`='1511050', `ket`='15400', `loan`='38074', `fund`='1022270', `store`='526517', `debt`='337'  WHERE (`id` = 453) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='454', `date`='2015-07-14', `amount`='1513550', `ket`='2550', `loan`='38074', `fund`='1030670', `store`='520617', `debt`='337'  WHERE (`id` = 454) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='455', `date`='2015-07-15', `amount`='1515530', `ket`='7850', `loan`='38074', `fund`='1036320', `store`='516941', `debt`='342'  WHERE (`id` = 455) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='456', `date`='2015-07-16', `amount`='1508450', `ket`='4700', `loan`='38074', `fund`='1033170', `store`='513022', `debt`='337'  WHERE (`id` = 456) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='457', `date`='2015-07-17', `amount`='1503880', `ket`='4700', `loan`='38074', `fund`='1033170', `store`='508446', `debt`='337'  WHERE (`id` = 457) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='458', `date`='2015-07-18', `amount`='1506030', `ket`='10800', `loan`='38074', `fund`='1039690', `store`='504076', `debt`='337'  WHERE (`id` = 458) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='459', `date`='2015-07-19', `amount`='1510140', `ket`='19600', `loan`='38074', `fund`='1048070', `store`='499809', `debt`='337'  WHERE (`id` = 459) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='460', `date`='2015-07-20', `amount`='1509780', `ket`='24200', `loan`='38074', `fund`='1052670', `store`='494851', `debt`='337'  WHERE (`id` = 460) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='461', `date`='2015-07-21', `amount`='1503460', `ket`='21900', `loan`='38074', `fund`='1050370', `store`='490816', `debt`='355'  WHERE (`id` = 461) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='462', `date`='2015-07-22', `amount`='1504570', `ket`='26700', `loan`='38074', `fund`='1055170', `store`='487124', `debt`='355'  WHERE (`id` = 462) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='463', `date`='2015-07-23', `amount`='1505460', `ket`='31600', `loan`='38074', `fund`='1060070', `store`='483132', `debt`='337'  WHERE (`id` = 463) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='464', `date`='2015-07-24', `amount`='1507390', `ket`='24400', `loan`='24074', `fund`='1052870', `store`='478262', `debt`='337'  WHERE (`id` = 464) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='465', `date`='2015-07-25', `amount`='1503340', `ket`='24400', `loan`='24074', `fund`='1052870', `store`='474211', `debt`='337'  WHERE (`id` = 465) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='466', `date`='2015-07-26', `amount`='1495940', `ket`='21900', `loan`='24074', `fund`='1050370', `store`='469314', `debt`='337'  WHERE (`id` = 466) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='467', `date`='2015-07-27', `amount`='1496060', `ket`='18200', `loan`='23224', `fund`='1046670', `store`='472277', `debt`='337'  WHERE (`id` = 467) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='468', `date`='2015-07-28', `amount`='1497360', `ket`='22400', `loan`='23224', `fund`='1050870', `store`='469376', `debt`='337'  WHERE (`id` = 468) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='469', `date`='2015-07-29', `amount`='1496950', `ket`='24800', `loan`='23224', `fund`='1053270', `store`='466568', `debt`='337'  WHERE (`id` = 469) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='470', `date`='2015-07-30', `amount`='1497670', `ket`='27900', `loan`='23224', `fund`='1056370', `store`='464185', `debt`='337'  WHERE (`id` = 470) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='471', `date`='2015-07-31', `amount`='1498450', `ket`='34700', `loan`='23224', `fund`='1063170', `store`='458170', `debt`='337'  WHERE (`id` = 471) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='472', `date`='2015-08-01', `amount`='1497730', `ket`='37500', `loan`='23224', `fund`='1065920', `store`='454700', `debt`='337'  WHERE (`id` = 472) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='473', `date`='2015-08-02', `amount`='1498850', `ket`='42000', `loan`='23224', `fund`='1070420', `store`='451315', `debt`='337'  WHERE (`id` = 473) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='474', `date`='2015-08-03', `amount`='1499940', `ket`='23600', `loan`='2144', `fund`='1052020', `store`='449727', `debt`='337'  WHERE (`id` = 474) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='475', `date`='2015-08-04', `amount`='1499270', `ket`='26000', `loan`='10994', `fund`='1054420', `store`='455511', `debt`='337'  WHERE (`id` = 475) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='476', `date`='2015-08-05', `amount`='1499310', `ket`='29300', `loan`='10994', `fund`='1057320', `store`='452648', `debt`='337'  WHERE (`id` = 476) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='477', `date`='2015-08-06', `amount`='1490650', `ket`='29300', `loan`='10969', `fund`='1057320', `store`='443961', `debt`='337'  WHERE (`id` = 477) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='478', `date`='2015-08-07', `amount`='1528780', `ket`='43050', `loan`='3969', `fund`='1095870', `store`='436540', `debt`='337'  WHERE (`id` = 478) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='479', `date`='2015-08-08', `amount`='1501730', `ket`='8250', `loan`='3969', `fund`='1071970', `store`='433390', `debt`='337'  WHERE (`id` = 479) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='480', `date`='2015-08-09', `amount`='1497800', `ket`='10500', `loan`='3969', `fund`='1074480', `store`='426500', `debt`='787'  WHERE (`id` = 480) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='481', `date`='2015-08-10', `amount`='1496900', `ket`='13000', `loan`='3969', `fund`='1076830', `store`='423252', `debt`='787'  WHERE (`id` = 481) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='482', `date`='2015-08-11', `amount`='1497030', `ket`='15250', `loan`='3969', `fund`='1078980', `store`='421680', `debt`='337'  WHERE (`id` = 482) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='483', `date`='2015-08-12', `amount`='1497330', `ket`='19150', `loan`='3969', `fund`='1082880', `store`='418083', `debt`='337'  WHERE (`id` = 483) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='484', `date`='2015-08-13', `amount`='1503100', `ket`='25050', `loan`='13869', `fund`='1088780', `store`='427851', `debt`='337'  WHERE (`id` = 484) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='485', `date`='2015-08-14', `amount`='1502010', `ket`='24100', `loan`='9719', `fund`='1087830', `store`='423557', `debt`='337'  WHERE (`id` = 485) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='486', `date`='2015-08-15', `amount`='1500110', `ket`='23600', `loan`='9719', `fund`='1087330', `store`='422163', `debt`='337'  WHERE (`id` = 486) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='487', `date`='2015-08-16', `amount`='1502530', `ket`='30900', `loan`='9719', `fund`='1094720', `store`='417197', `debt`='337'  WHERE (`id` = 487) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='488', `date`='2015-08-17', `amount`='1499410', `ket`='29900', `loan`='13819', `fund`='1093720', `store`='419176', `debt`='337'  WHERE (`id` = 488) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='489', `date`='2015-08-18', `amount`='1499570', `ket`='32500', `loan`='13819', `fund`='1095860', `store`='417194', `debt`='337'  WHERE (`id` = 489) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='490', `date`='2015-08-19', `amount`='1500870', `ket`='8900', `loan`='13819', `fund`='1100670', `store`='413689', `debt`='337'  WHERE (`id` = 490) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='491', `date`='2015-08-20', `amount`='1500850', `ket`='10700', `loan`='13819', `fund`='1102470', `store`='411868', `debt`='337'  WHERE (`id` = 491) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='492', `date`='2015-08-21', `amount`='1495710', `ket`='2900', `loan`='12519', `fund`='1094670', `store`='413228', `debt`='337'  WHERE (`id` = 492) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='493', `date`='2015-08-22', `amount`='1493710', `ket`='3400', `loan`='12519', `fund`='1095170', `store`='410723', `debt`='337'  WHERE (`id` = 493) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='494', `date`='2015-08-23', `amount`='1495460', `ket`='7300', `loan`='12519', `fund`='1102380', `store`='405264', `debt`='337'  WHERE (`id` = 494) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='495', `date`='2015-08-24', `amount`='1496760', `ket`='8000', `loan`='6219', `fund`='1103080', `store`='399561', `debt`='337'  WHERE (`id` = 495) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='496', `date`='2015-08-25', `amount`='1497740', `ket`='3800', `loan`='17694', `fund`='1098880', `store`='416213', `debt`='337'  WHERE (`id` = 496) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='497', `date`='2015-08-26', `amount`='1498550', `ket`='5700', `loan`='20769', `fund`='1102780', `store`='416203', `debt`='337'  WHERE (`id` = 497) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='498', `date`='2015-08-27', `amount`='1499090', `ket`='8300', `loan`='20769', `fund`='1105380', `store`='414141', `debt`='337'  WHERE (`id` = 498) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='499', `date`='2015-08-28', `amount`='1499190', `ket`='5900', `loan`='16769', `fund`='1102980', `store`='412641', `debt`='337'  WHERE (`id` = 499) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='500', `date`='2015-08-29', `amount`='1494510', `ket`='3000', `loan`='77064', `fund`='1099620', `store`='471611', `debt`='337'  WHERE (`id` = 500) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='501', `date`='2015-08-30', `amount`='1496500', `ket`='10500', `loan`='77064', `fund`='1107120', `store`='466109', `debt`='337'  WHERE (`id` = 501) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='502', `date`='2015-08-31', `amount`='1497900', `ket`='15800', `loan`='77064', `fund`='1112420', `store`='462202', `debt`='337'  WHERE (`id` = 502) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='504', `date`='2015-09-01', `amount`='1498960', `ket`='19200', `loan`='88224', `fund`='1115820', `store`='471027', `debt`='337'  WHERE (`id` = 504) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='505', `date`='2015-09-02', `amount`='1494050', `ket`='19200', `loan`='88224', `fund`='1115820', `store`='466114', `debt`='337'  WHERE (`id` = 505) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1009', `date`='2017-02-11', `amount`='2190650', `ket`='13700', `loan`='15120', `fund`='1740760', `store`='461952', `debt`='3055'  WHERE (`id` = 1009) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='507', `date`='2015-09-04', `amount`='1501230', `ket`='25200', `loan`='85749', `fund`='1121820', `store`='464819', `debt`='337'  WHERE (`id` = 507) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='509', `date`='2015-09-05', `amount`='1502960', `ket`='14300', `loan`='70749', `fund`='1110920', `store`='462449', `debt`='337'  WHERE (`id` = 509) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='510', `date`='2015-09-06', `amount`='1504880', `ket`='19600', `loan`='70229', `fund`='1116220', `store`='458550', `debt`='337'  WHERE (`id` = 510) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='511', `date`='2015-09-07', `amount`='1506180', `ket`='13700', `loan`='78804', `fund`='1110320', `store`='474329', `debt`='337'  WHERE (`id` = 511) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='512', `date`='2015-09-08', `amount`='1507100', `ket`='16700', `loan`='88214', `fund`='1113320', `store`='481658', `debt`='337'  WHERE (`id` = 512) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='513', `date`='2015-09-09', `amount`='1531520', `ket`='18500', `loan`='88374', `fund`='1140120', `store`='479437', `debt`='337'  WHERE (`id` = 513) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='514', `date`='2015-09-10', `amount`='1529300', `ket`='19200', `loan`='93424', `fund`='1140820', `store`='481568', `debt`='337'  WHERE (`id` = 514) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='515', `date`='2015-09-11', `amount`='1528120', `ket`='6000', `loan`='75949', `fund`='1128480', `store`='474977', `debt`='607'  WHERE (`id` = 515) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='516', `date`='2015-09-12', `amount`='1528830', `ket`='8000', `loan`='75949', `fund`='1130380', `store`='473784', `debt`='608'  WHERE (`id` = 516) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='517', `date`='2015-09-13', `amount`='1528180', `ket`='11900', `loan`='75949', `fund`='1134220', `store`='469299', `debt`='608'  WHERE (`id` = 517) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='518', `date`='2015-09-14', `amount`='1526080', `ket`='11900', `loan`='75949', `fund`='1134220', `store`='467201', `debt`='608'  WHERE (`id` = 518) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='519', `date`='2015-09-16', `amount`='1530010', `ket`='21000', `loan`='75949', `fund`='1143280', `store`='462066', `debt`='608'  WHERE (`id` = 519) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='520', `date`='2015-09-17', `amount`='1525770', `ket`='20800', `loan`='84224', `fund`='1143040', `store`='466348', `debt`='608'  WHERE (`id` = 520) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='521', `date`='2015-09-18', `amount`='1527140', `ket`='23500', `loan`='88719', `fund`='1145740', `store`='469508', `debt`='608'  WHERE (`id` = 521) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='522', `date`='2015-09-19', `amount`='1526650', `ket`='27000', `loan`='85767', `fund`='1150190', `store`='461625', `debt`='608'  WHERE (`id` = 522) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='523', `date`='2015-09-20', `amount`='1522570', `ket`='27000', `loan`='85767', `fund`='1150190', `store`='457537', `debt`='608'  WHERE (`id` = 523) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='524', `date`='2015-09-21', `amount`='1519990', `ket`='13550', `loan`='70767', `fund`='1136740', `store`='453406', `debt`='608'  WHERE (`id` = 524) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='525', `date`='2015-09-22', `amount`='1526140', `ket`='16100', `loan`='65062', `fund`='1141150', `store`='449439', `debt`='608'  WHERE (`id` = 525) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='526', `date`='2015-09-23', `amount`='1524150', `ket`='5700', `loan`='55062', `fund`='1130750', `store`='447854', `debt`='608'  WHERE (`id` = 526) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='527', `date`='2015-09-24', `amount`='1527040', `ket`='11300', `loan`='83042', `fund`='1136350', `store`='473127', `debt`='608'  WHERE (`id` = 527) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='528', `date`='2015-09-25', `amount`='1527890', `ket`='13700', `loan`='83042', `fund`='1138750', `store`='471577', `debt`='608'  WHERE (`id` = 528) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='529', `date`='2015-09-26', `amount`='1525200', `ket`='13700', `loan`='86642', `fund`='1138750', `store`='472487', `debt`='608'  WHERE (`id` = 529) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='530', `date`='2015-09-27', `amount`='1530290', `ket`='9500', `loan`='99782', `fund`='1134020', `store`='495451', `debt`='608'  WHERE (`id` = 530) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='531', `date`='2015-09-28', `amount`='1527720', `ket`='9300', `loan`='99782', `fund`='1133820', `store`='493080', `debt`='608'  WHERE (`id` = 531) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='532', `date`='2015-09-29', `amount`='1532320', `ket`='6600', `loan`='97307', `fund`='1131120', `store`='497899', `debt`='608'  WHERE (`id` = 532) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='533', `date`='2015-09-30', `amount`='1532560', `ket`='9700', `loan`='168402', `fund`='1134220', `store`='566135', `debt`='608'  WHERE (`id` = 533) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='534', `date`='2015-10-01', `amount`='1530250', `ket`='9700', `loan`='168402', `fund`='1134330', `store`='563720', `debt`='608'  WHERE (`id` = 534) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='535', `date`='2015-10-02', `amount`='1528220', `ket`='11100', `loan`='168402', `fund`='1136050', `store`='559962', `debt`='608'  WHERE (`id` = 535) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='536', `date`='2015-10-03', `amount`='1536220', `ket`='10400', `loan`='179498', `fund`='1134190', `store`='580427', `debt`='1103'  WHERE (`id` = 536) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='537', `date`='2015-10-04', `amount`='1533610', `ket`='10400', `loan`='179498', `fund`='1134690', `store`='577310', `debt`='1103'  WHERE (`id` = 537) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='538', `date`='2015-10-05', `amount`='1536250', `ket`='2300', `loan`='149963', `fund`='1112400', `store`='572714', `debt`='1103'  WHERE (`id` = 538) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='539', `date`='2015-10-06', `amount`='1537710', `ket`='6500', `loan`='149963', `fund`='1116400', `store`='570177', `debt`='1103'  WHERE (`id` = 539) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='540', `date`='2015-10-07', `amount`='1540020', `ket`='12000', `loan`='149963', `fund`='1121900', `store`='566984', `debt`='1103'  WHERE (`id` = 540) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='541', `date`='2015-10-08', `amount`='1538550', `ket`='11800', `loan`='149963', `fund`='1121700', `store`='565709', `debt`='1103'  WHERE (`id` = 541) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='542', `date`='2015-10-09', `amount`='1541970', `ket`='18800', `loan`='169043', `fund`='1128700', `store`='580594', `debt`='1723'  WHERE (`id` = 542) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='543', `date`='2015-10-10', `amount`='1543980', `ket`='24100', `loan`='169043', `fund`='1134000', `store`='577307', `debt`='1723'  WHERE (`id` = 543) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='544', `date`='2015-10-11', `amount`='1546590', `ket`='12200', `loan`='149490', `fund`='1123080', `store`='571285', `debt`='1723'  WHERE (`id` = 544) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='545', `date`='2015-10-12', `amount`='1535400', `ket`='5450', `loan`='198753', `fund`='1115930', `store`='616504', `debt`='1723'  WHERE (`id` = 545) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='546', `date`='2015-10-13', `amount`='1550810', `ket`='7900', `loan`='175393', `fund`='1118380', `store`='605787', `debt`='2043'  WHERE (`id` = 546) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='547', `date`='2015-10-14', `amount`='1554990', `ket`='15150', `loan`='205274', `fund`='1129880', `store`='628343', `debt`='2043'  WHERE (`id` = 547) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='548', `date`='2015-10-15', `amount`='1558150', `ket`='26350', `loan`='205274', `fund`='1140880', `store`='620814', `debt`='1723'  WHERE (`id` = 548) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='549', `date`='2015-10-16', `amount`='1560120', `ket`='33550', `loan`='205274', `fund`='1148080', `store`='615586', `debt`='1723'  WHERE (`id` = 549) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='550', `date`='2015-10-17', `amount`='1560290', `ket`='10350', `loan`='175274', `fund`='1124560', `store`='608181', `debt`='2823'  WHERE (`id` = 550) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='551', `date`='2015-10-18', `amount`='1562350', `ket`='17600', `loan`='175274', `fund`='1131810', `store`='602998', `debt`='2823'  WHERE (`id` = 551) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='552', `date`='2015-10-19', `amount`='1549450', `ket`='0', `loan`='259239', `fund`='1099860', `store`='705966', `debt`='2867'  WHERE (`id` = 552) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='553', `date`='2015-10-20', `amount`='1553690', `ket`='11300', `loan`='259239', `fund`='1112160', `store`='697624', `debt`='3147'  WHERE (`id` = 553) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='554', `date`='2015-10-21', `amount`='1551820', `ket`='42800', `loan`='259239', `fund`='1117160', `store`='690752', `debt`='3147'  WHERE (`id` = 554) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='555', `date`='2015-10-22', `amount`='1547040', `ket`='42800', `loan`='259239', `fund`='1116410', `store`='686717', `debt`='3147'  WHERE (`id` = 555) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='556', `date`='2015-10-23', `amount`='1549370', `ket`='7800', `loan`='218574', `fund`='1081210', `store`='683584', `debt`='3147'  WHERE (`id` = 556) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='557', `date`='2015-10-24', `amount`='1547340', `ket`='7800', `loan`='218574', `fund`='1081210', `store`='681554', `debt`='3147'  WHERE (`id` = 557) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='558', `date`='2015-10-25', `amount`='1550590', `ket`='11351', `loan`='218999', `fund`='1112990', `store`='653451', `debt`='3147'  WHERE (`id` = 558) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='559', `date`='2015-10-26', `amount`='1569140', `ket`='7801', `loan`='218999', `fund`='1134310', `store`='650677', `debt`='3147'  WHERE (`id` = 559) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='560', `date`='2015-10-27', `amount`='1574940', `ket`='9200', `loan`='290106', `fund`='1146770', `store`='715126', `debt`='3147'  WHERE (`id` = 560) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='561', `date`='2015-10-28', `amount`='1567250', `ket`='5200', `loan`='250106', `fund`='1100670', `store`='713541', `debt`='3147'  WHERE (`id` = 561) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='562', `date`='2015-10-29', `amount`='1566500', `ket`='5200', `loan`='250106', `fund`='1102900', `store`='710567', `debt`='3147'  WHERE (`id` = 562) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='563', `date`='2015-10-30', `amount`='1570760', `ket`='3600', `loan`='241106', `fund`='1100500', `store`='708223', `debt`='3147'  WHERE (`id` = 563) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='564', `date`='2015-10-31', `amount`='1573060', `ket`='9500', `loan`='241106', `fund`='1106700', `store`='704325', `debt`='3147'  WHERE (`id` = 564) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='565', `date`='2015-11-01', `amount`='1577150', `ket`='10350', `loan`='225651', `fund`='1101800', `store`='697859', `debt`='3147'  WHERE (`id` = 565) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='566', `date`='2015-11-02', `amount`='1597160', `ket`='30000', `loan`='238341', `fund`='1130720', `store`='701636', `debt`='3147'  WHERE (`id` = 566) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='567', `date`='2015-11-03', `amount`='1601790', `ket`='41000', `loan`='236051', `fund`='1142080', `store`='692622', `debt`='3147'  WHERE (`id` = 567) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='568', `date`='2015-11-04', `amount`='1603340', `ket`='24500', `loan`='221421', `fund`='1130580', `store`='691038', `debt`='3147'  WHERE (`id` = 568) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='569', `date`='2015-11-05', `amount`='1595970', `ket`='20550', `loan`='221421', `fund`='1126580', `store`='687673', `debt`='3147'  WHERE (`id` = 569) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='570', `date`='2015-11-06', `amount`='1594360', `ket`='25000', `loan`='252231', `fund`='1130380', `store`='713565', `debt`='2652'  WHERE (`id` = 570) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='571', `date`='2015-11-07', `amount`='1601750', `ket`='0', `loan`='217231', `fund`='1104860', `store`='711468', `debt`='2652'  WHERE (`id` = 571) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='572', `date`='2015-11-08', `amount`='1632840', `ket`='5700', `loan`='202082', `fund`='1125440', `store`='706824', `debt`='2652'  WHERE (`id` = 572) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='573', `date`='2015-11-09', `amount`='1635830', `ket`='7700', `loan`='199873', `fund`='1130260', `store`='702789', `debt`='2652'  WHERE (`id` = 573) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='574', `date`='2015-11-10', `amount`='1633990', `ket`='7700', `loan`='199873', `fund`='1130260', `store`='700954', `debt`='2652'  WHERE (`id` = 574) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='575', `date`='2015-11-11', `amount`='1636730', `ket`='6600', `loan`='228623', `fund`='1135700', `store`='727488', `debt`='2157'  WHERE (`id` = 575) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='576', `date`='2015-11-12', `amount`='1637550', `ket`='3100', `loan`='219479', `fund`='1132960', `store`='721912', `debt`='2157'  WHERE (`id` = 576) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='577', `date`='2015-11-13', `amount`='1634340', `ket`='3100', `loan`='219479', `fund`='1132960', `store`='718700', `debt`='2157'  WHERE (`id` = 577) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='578', `date`='2015-11-14', `amount`='1643490', `ket`='18900', `loan`='219479', `fund`='1148850', `store`='711955', `debt`='2161'  WHERE (`id` = 578) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='579', `date`='2015-11-15', `amount`='1635710', `ket`='18900', `loan`='219479', `fund`='1148850', `store`='704173', `debt`='2161'  WHERE (`id` = 579) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='580', `date`='2015-11-16', `amount`='1648670', `ket`='26450', `loan`='250769', `fund`='1161400', `store`='735873', `debt`='2161'  WHERE (`id` = 580) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='581', `date`='2015-11-17', `amount`='1643840', `ket`='26450', `loan`='250769', `fund`='1161400', `store`='731052', `debt`='2161'  WHERE (`id` = 581) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='582', `date`='2015-11-18', `amount`='1645240', `ket`='16000', `loan`='243054', `fund`='1151610', `store`='735144', `debt`='1541'  WHERE (`id` = 582) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='583', `date`='2015-11-19', `amount`='1646470', `ket`='22600', `loan`='243054', `fund`='1157510', `store`='730472', `debt`='1541'  WHERE (`id` = 583) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='584', `date`='2015-11-20', `amount`='1644420', `ket`='16100', `loan`='234254', `fund`='1152810', `store`='724322', `debt`='1541'  WHERE (`id` = 584) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='585', `date`='2015-11-21', `amount`='1634350', `ket`='16100', `loan`='234254', `fund`='1152810', `store`='714246', `debt`='1541'  WHERE (`id` = 585) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='586', `date`='2015-11-22', `amount`='1641350', `ket`='25450', `loan`='234254', `fund`='1162960', `store`='711100', `debt`='1541'  WHERE (`id` = 586) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='587', `date`='2015-11-23', `amount`='1644010', `ket`='31050', `loan`='234254', `fund`='1168260', `store`='708456', `debt`='1541'  WHERE (`id` = 587) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='588', `date`='2015-11-24', `amount`='1643080', `ket`='1700', `loan`='248244', `fund`='1150210', `store`='739572', `debt`='1541'  WHERE (`id` = 588) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='589', `date`='2015-11-25', `amount`='1646040', `ket`='8600', `loan`='247709', `fund`='1156710', `store`='735496', `debt`='1541'  WHERE (`id` = 589) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='590', `date`='2015-11-26', `amount`='1642850', `ket`='8600', `loan`='247709', `fund`='1156710', `store`='732301', `debt`='1541'  WHERE (`id` = 590) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='591', `date`='2015-11-27', `amount`='1652530', `ket`='31600', `loan`='247709', `fund`='1174460', `store`='724233', `debt`='1541'  WHERE (`id` = 591) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='592', `date`='2015-11-28', `amount`='1654060', `ket`='26400', `loan`='232633', `fund`='1169210', `store`='715934', `debt`='1541'  WHERE (`id` = 592) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='593', `date`='2015-11-29', `amount`='1659840', `ket`='12000', `loan`='249813', `fund`='1179780', `store`='728325', `debt`='1541'  WHERE (`id` = 593) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='594', `date`='2015-11-30', `amount`='1669410', `ket`='12000', `loan`='240009', `fund`='1173640', `store`='734141', `debt`='1643'  WHERE (`id` = 594) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='595', `date`='2015-12-01', `amount`='1633650', `ket`='12000', `loan`='259868', `fund`='1146640', `store`='745240', `debt`='1643'  WHERE (`id` = 595) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='596', `date`='2015-12-02', `amount`='1635880', `ket`='17400', `loan`='258173', `fund`='1152020', `store`='740381', `debt`='1643'  WHERE (`id` = 596) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='597', `date`='2015-12-03', `amount`='1639630', `ket`='26900', `loan`='277568', `fund`='1161520', `store`='754026', `debt`='1643'  WHERE (`id` = 597) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='598', `date`='2015-12-04', `amount`='1643320', `ket`='40000', `loan`='277568', `fund`='1174920', `store`='744331', `debt`='1643'  WHERE (`id` = 598) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='599', `date`='2015-12-05', `amount`='1645930', `ket`='40000', `loan`='275448', `fund`='1175390', `store`='743253', `debt`='2741'  WHERE (`id` = 599) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='600', `date`='2015-12-06', `amount`='1656510', `ket`='29600', `loan`='263270', `fund`='1164990', `store`='751504', `debt`='3291'  WHERE (`id` = 600) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='601', `date`='2015-12-07', `amount`='1643960', `ket`='-400', `loan`='260375', `fund`='1134990', `store`='766062', `debt`='3291'  WHERE (`id` = 601) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='602', `date`='2015-12-08', `amount`='1671050', `ket`='16100', `loan`='240375', `fund`='1154510', `store`='753628', `debt`='3291'  WHERE (`id` = 602) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='603', `date`='2015-12-09', `amount`='1676850', `ket`='15750', `loan`='256110', `fund`='1160240', `store`='766887', `debt`='5831'  WHERE (`id` = 603) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='604', `date`='2015-12-10', `amount`='1708740', `ket`='4500', `loan`='230480', `fund`='1175930', `store`='757458', `debt`='5831'  WHERE (`id` = 604) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='605', `date`='2015-12-11', `amount`='1712590', `ket`='19100', `loan`='260800', `fund`='1190630', `store`='776930', `debt`='5831'  WHERE (`id` = 605) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='606', `date`='2015-12-12', `amount`='1717610', `ket`='31200', `loan`='260800', `fund`='1203040', `store`='769538', `debt`='5831'  WHERE (`id` = 606) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='607', `date`='2015-12-13', `amount`='1725820', `ket`='43200', `loan`='271780', `fund`='1214720', `store`='776900', `debt`='5981'  WHERE (`id` = 607) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='608', `date`='2015-12-14', `amount`='1725390', `ket`='11250', `loan`='263780', `fund`='1181500', `store`='802090', `debt`='5581'  WHERE (`id` = 608) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='609', `date`='2015-12-15', `amount`='1732760', `ket`='12600', `loan`='271705', `fund`='1183300', `store`='816722', `debt`='4441'  WHERE (`id` = 609) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='610', `date`='2015-12-16', `amount`='1735080', `ket`='14300', `loan`='267115', `fund`='1183880', `store`='813873', `debt`='4441'  WHERE (`id` = 610) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='611', `date`='2015-12-17', `amount`='1743320', `ket`='30300', `loan`='267115', `fund`='1189780', `store`='815759', `debt`='4891'  WHERE (`id` = 611) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='612', `date`='2015-12-18', `amount`='1753780', `ket`='40200', `loan`='267115', `fund`='1199480', `store`='816525', `debt`='4891'  WHERE (`id` = 612) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='613', `date`='2015-12-19', `amount`='1765160', `ket`='20500', `loan`='224398', `fund`='1180180', `store`='804916', `debt`='4461'  WHERE (`id` = 613) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='614', `date`='2015-12-20', `amount`='1756840', `ket`='20500', `loan`='224398', `fund`='1180180', `store`='796600', `debt`='4461'  WHERE (`id` = 614) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='615', `date`='2015-12-21', `amount`='1764730', `ket`='1000', `loan`='199223', `fund`='1160630', `store`='799901', `debt`='3421'  WHERE (`id` = 615) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='616', `date`='2015-12-22', `amount`='1771340', `ket`='13600', `loan`='195133', `fund`='1173230', `store`='790198', `debt`='3041'  WHERE (`id` = 616) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='617', `date`='2015-12-23', `amount`='1776010', `ket`='26400', `loan`='237898', `fund`='1211680', `store`='799187', `debt`='3041'  WHERE (`id` = 617) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='618', `date`='2015-12-24', `amount`='1777330', `ket`='15000', `loan`='242208', `fund`='1200870', `store`='815621', `debt`='3041'  WHERE (`id` = 618) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='619', `date`='2015-12-25', `amount`='1776790', `ket`='19400', `loan`='242208', `fund`='1208060', `store`='807898', `debt`='3041'  WHERE (`id` = 619) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='620', `date`='2015-12-26', `amount`='1778290', `ket`='23200', `loan`='242208', `fund`='1215120', `store`='802339', `debt`='3041'  WHERE (`id` = 620) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='621', `date`='2015-12-27', `amount`='1773520', `ket`='14700', `loan`='234138', `fund`='1207430', `store`='795493', `debt`='4736'  WHERE (`id` = 621) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='622', `date`='2015-12-28', `amount`='1788390', `ket`='18700', `loan`='228578', `fund`='1213550', `store`='796890', `debt`='6526'  WHERE (`id` = 622) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='623', `date`='2015-12-29', `amount`='1792460', `ket`='28900', `loan`='228578', `fund`='1227620', `store`='786887', `debt`='6526'  WHERE (`id` = 623) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='624', `date`='2015-12-30', `amount`='1795790', `ket`='26600', `loan`='216713', `fund`='1225220', `store`='780749', `debt`='6526'  WHERE (`id` = 624) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='625', `date`='2015-12-31', `amount`='1803000', `ket`='34800', `loan`='226913', `fund`='1233950', `store`='789430', `debt`='6526'  WHERE (`id` = 625) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='626', `date`='2016-01-01', `amount`='1811210', `ket`='35600', `loan`='224288', `fund`='1235620', `store`='793350', `debt`='6526'  WHERE (`id` = 626) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='627', `date`='2016-01-02', `amount`='1813700', `ket`='45200', `loan`='224288', `fund`='1245220', `store`='786233', `debt`='6526'  WHERE (`id` = 627) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='628', `date`='2016-01-03', `amount`='1818930', `ket`='57200', `loan`='244658', `fund`='1265910', `store`='791546', `debt`='6126'  WHERE (`id` = 628) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='629', `date`='2016-01-04', `amount`='1816130', `ket`='46300', `loan`='244658', `fund`='1257030', `store`='797632', `debt`='6126'  WHERE (`id` = 629) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='630', `date`='2016-01-05', `amount`='1814220', `ket`='7500', `loan`='210168', `fund`='1227410', `store`='790848', `debt`='6126'  WHERE (`id` = 630) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='631', `date`='2016-01-06', `amount`='1816340', `ket`='6400', `loan`='210968', `fund`='1227650', `store`='793203', `debt`='6456'  WHERE (`id` = 631) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='632', `date`='2016-01-07', `amount`='1823200', `ket`='20100', `loan`='210968', `fund`='1241050', `store`='786990', `debt`='6126'  WHERE (`id` = 632) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='633', `date`='2016-01-08', `amount`='1850130', `ket`='32100', `loan`='210968', `fund`='1280110', `store`='774854', `debt`='6126'  WHERE (`id` = 633) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='634', `date`='2016-01-09', `amount`='1855320', `ket`='13800', `loan`='187667', `fund`='1263620', `store`='773243', `debt`='6126'  WHERE (`id` = 634) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='635', `date`='2016-01-10', `amount`='1862980', `ket`='26100', `loan`='183492', `fund`='1276490', `store`='762699', `debt`='7286'  WHERE (`id` = 635) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='636', `date`='2016-01-11', `amount`='1866300', `ket`='35800', `loan`='183492', `fund`='1286190', `store`='756317', `debt`='7286'  WHERE (`id` = 636) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='637', `date`='2016-01-12', `amount`='1868190', `ket`='12200', `loan`='183492', `fund`='1292590', `store`='751807', `debt`='7286'  WHERE (`id` = 637) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='638', `date`='2016-01-13', `amount`='1867090', `ket`='20200', `loan`='183492', `fund`='1298000', `store`='745302', `debt`='7286'  WHERE (`id` = 638) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='639', `date`='2016-01-14', `amount`='1867910', `ket`='29550', `loan`='180312', `fund`='1308680', `store`='732257', `debt`='7286'  WHERE (`id` = 639) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='640', `date`='2016-01-15', `amount`='1870760', `ket`='26100', `loan`='140312', `fund`='1276970', `store`='727064', `debt`='7036'  WHERE (`id` = 640) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='641', `date`='2016-01-16', `amount`='1870790', `ket`='37600', `loan`='140312', `fund`='1287690', `store`='717322', `debt`='6086'  WHERE (`id` = 641) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='642', `date`='2016-01-17', `amount`='1872550', `ket`='16600', `loan`='108922', `fund`='1266690', `store`='707592', `debt`='7186'  WHERE (`id` = 642) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='643', `date`='2016-01-18', `amount`='1877150', `ket`='31600', `loan`='108922', `fund`='1281690', `store`='696960', `debt`='7421'  WHERE (`id` = 643) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='644', `date`='2016-01-19', `amount`='1879540', `ket`='37600', `loan`='108302', `fund`='1289830', `store`='690599', `debt`='7421'  WHERE (`id` = 644) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='645', `date`='2016-01-20', `amount`='1884640', `ket`='19200', `loan`='108302', `fund`='1304630', `store`='680895', `debt`='7421'  WHERE (`id` = 645) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='646', `date`='2016-01-21', `amount`='1883350', `ket`='48100', `loan`='128477', `fund`='1335130', `store`='669020', `debt`='7681'  WHERE (`id` = 646) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='647', `date`='2016-01-22', `amount`='1884030', `ket`='3600', `loan`='127557', `fund`='1340430', `store`='663482', `debt`='7681'  WHERE (`id` = 647) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='648', `date`='2016-01-23', `amount`='1887590', `ket`='16950', `loan`='127557', `fund`='1353880', `store`='653586', `debt`='7681'  WHERE (`id` = 648) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='649', `date`='2016-01-25', `amount`='1859940', `ket`='16950', `loan`='127557', `fund`='1353880', `store`='625939', `debt`='7681'  WHERE (`id` = 649) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='650', `date`='2016-01-26', `amount`='1888780', `ket`='59450', `loan`='127557', `fund`='1396080', `store`='612209', `debt`='8056'  WHERE (`id` = 650) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='651', `date`='2016-01-27', `amount`='1898080', `ket`='75150', `loan`='129133', `fund`='1410490', `store`='609049', `debt`='7681'  WHERE (`id` = 651) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='652', `date`='2016-01-28', `amount`='1903990', `ket`='103650', `loan`='129133', `fund`='1424040', `store`='601403', `debt`='7681'  WHERE (`id` = 652) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='653', `date`='2016-01-29', `amount`='1888450', `ket`='98250', `loan`='129133', `fund`='1418640', `store`='591267', `debt`='7681'  WHERE (`id` = 653) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='654', `date`='2016-01-30', `amount`='1890650', `ket`='79250', `loan`='95539', `fund`='1400290', `store`='578219', `debt`='7681'  WHERE (`id` = 654) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='656', `date`='2016-01-31', `amount`='1916100', `ket`='106000', `loan`='83889', `fund`='1427340', `store`='564966', `debt`='7681'  WHERE (`id` = 656) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='657', `date`='2016-02-01', `amount`='1919900', `ket`='114000', `loan`='97018', `fund`='1455320', `store`='557626', `debt`='3976'  WHERE (`id` = 657) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='658', `date`='2016-02-02', `amount`='1903050', `ket`='114000', `loan`='97018', `fund`='1452440', `store`='543652', `debt`='3976'  WHERE (`id` = 658) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='659', `date`='2016-02-03', `amount`='1913810', `ket`='135000', `loan`='97018', `fund`='1473490', `store`='533359', `debt`='3976'  WHERE (`id` = 659) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='660', `date`='2016-02-04', `amount`='1896670', `ket`='600', `loan`='97018', `fund`='1473590', `store`='516122', `debt`='3976'  WHERE (`id` = 660) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='661', `date`='2016-02-05', `amount`='1900890', `ket`='25600', `loan`='100706', `fund`='1498340', `store`='499280', `debt`='3976'  WHERE (`id` = 661) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='662', `date`='2016-02-07', `amount`='1888720', `ket`='25600', `loan`='100706', `fund`='1498340', `store`='487110', `debt`='3976'  WHERE (`id` = 662) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='663', `date`='2016-02-15', `amount`='1949850', `ket`='17800', `loan`='84706', `fund`='1543470', `store`='487110', `debt`='3976'  WHERE (`id` = 663) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='664', `date`='2016-02-21', `amount`='1915790', `ket`='17800', `loan`='84706', `fund`='1510350', `store`='486170', `debt`='3976'  WHERE (`id` = 664) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='665', `date`='2016-02-22', `amount`='1911490', `ket`='13700', `loan`='84706', `fund`='1506250', `store`='485970', `debt`='3976'  WHERE (`id` = 665) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='666', `date`='2016-02-23', `amount`='1911140', `ket`='13700', `loan`='84706', `fund`='1506250', `store`='485620', `debt`='3976'  WHERE (`id` = 666) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='667', `date`='2016-02-25', `amount`='1893380', `ket`='12300', `loan`='84706', `fund`='1490720', `store`='483384', `debt`='3976'  WHERE (`id` = 667) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='668', `date`='2016-02-26', `amount`='1891620', `ket`='12300', `loan`='84706', `fund`='1490720', `store`='481628', `debt`='3976'  WHERE (`id` = 668) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='669', `date`='2016-02-27', `amount`='1893830', `ket`='15700', `loan`='84706', `fund`='1494020', `store`='480534', `debt`='3976'  WHERE (`id` = 669) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='670', `date`='2016-02-29', `amount`='1892820', `ket`='16300', `loan`='84706', `fund`='1494620', `store`='478924', `debt`='3976'  WHERE (`id` = 670) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='671', `date`='2016-03-01', `amount`='1891460', `ket`='15700', `loan`='84706', `fund`='1494120', `store`='478064', `debt`='3976'  WHERE (`id` = 671) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='672', `date`='2016-03-02', `amount`='1889890', `ket`='16700', `loan`='83872', `fund`='1494440', `store`='475350', `debt`='3976'  WHERE (`id` = 672) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='673', `date`='2016-03-03', `amount`='1889280', `ket`='15600', `loan`='83344', `fund`='1496340', `store`='472318', `debt`='3976'  WHERE (`id` = 673) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='674', `date`='2016-03-04', `amount`='1892960', `ket`='30300', `loan`='83344', `fund`='1500910', `store`='471422', `debt`='3976'  WHERE (`id` = 674) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='675', `date`='2016-03-05', `amount`='1890410', `ket`='30300', `loan`='83344', `fund`='1500910', `store`='468868', `debt`='3976'  WHERE (`id` = 675) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='676', `date`='2016-03-06', `amount`='1893730', `ket`='36400', `loan`='83344', `fund`='1507060', `store`='466036', `debt`='3976'  WHERE (`id` = 676) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='677', `date`='2016-03-07', `amount`='1893570', `ket`='13950', `loan`='59064', `fund`='1484560', `store`='464100', `debt`='3976'  WHERE (`id` = 677) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='678', `date`='2016-03-08', `amount`='1889420', `ket`='13950', `loan`='59064', `fund`='1484560', `store`='459952', `debt`='3976'  WHERE (`id` = 678) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='679', `date`='2016-03-09', `amount`='1922980', `ket`='5000', `loan`='133266', `fund`='1521560', `store`='530708', `debt`='3976'  WHERE (`id` = 679) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='680', `date`='2016-03-10', `amount`='1924840', `ket`='11300', `loan`='133266', `fund`='1527860', `store`='526270', `debt`='3976'  WHERE (`id` = 680) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='681', `date`='2016-03-11', `amount`='1926950', `ket`='10700', `loan`='136491', `fund`='1533260', `store`='526204', `debt`='3976'  WHERE (`id` = 681) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='682', `date`='2016-03-12', `amount`='1928560', `ket`='13000', `loan`='176265', `fund`='1537260', `store`='563582', `debt`='3976'  WHERE (`id` = 682) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='683', `date`='2016-03-13', `amount`='1929740', `ket`='18300', `loan`='176265', `fund`='1541720', `store`='560314', `debt`='3976'  WHERE (`id` = 683) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='684', `date`='2016-03-14', `amount`='1930780', `ket`='21800', `loan`='182565', `fund`='1545220', `store`='564150', `debt`='3976'  WHERE (`id` = 684) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='685', `date`='2016-03-15', `amount`='1933130', `ket`='8600', `loan`='172435', `fund`='1540890', `store`='560696', `debt`='3976'  WHERE (`id` = 685) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='686', `date`='2016-03-16', `amount`='1932980', `ket`='9600', `loan`='156375', `fund`='1527670', `store`='557708', `debt`='3976'  WHERE (`id` = 686) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='687', `date`='2016-03-17', `amount`='1933740', `ket`='6000', `loan`='161380', `fund`='1521900', `store`='569254', `debt`='3976'  WHERE (`id` = 687) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='688', `date`='2016-03-18', `amount`='1937270', `ket`='6000', `loan`='168661', `fund`='1521700', `store`='580254', `debt`='3976'  WHERE (`id` = 688) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='689', `date`='2016-03-19', `amount`='1939580', `ket`='12600', `loan`='168661', `fund`='1528300', `store`='575962', `debt`='3976'  WHERE (`id` = 689) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='690', `date`='2016-03-20', `amount`='1940210', `ket`='1500', `loan`='135092', `fund`='1499310', `store`='572012', `debt`='3976'  WHERE (`id` = 690) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='691', `date`='2016-03-21', `amount`='1935730', `ket`='1400', `loan`='135092', `fund`='1499210', `store`='567628', `debt`='3976'  WHERE (`id` = 691) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='692', `date`='2016-03-22', `amount`='1938610', `ket`='0', `loan`='163958', `fund`='1497660', `store`='600938', `debt`='3976'  WHERE (`id` = 692) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='693', `date`='2016-03-23', `amount`='1940580', `ket`='3000', `loan`='137813', `fund`='1500410', `store`='574011', `debt`='3976'  WHERE (`id` = 693) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='694', `date`='2016-03-24', `amount`='1938770', `ket`='4800', `loan`='142263', `fund`='1502210', `store`='574848', `debt`='3976'  WHERE (`id` = 694) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='695', `date`='2016-03-25', `amount`='1933520', `ket`='2200', `loan`='142263', `fund`='1499610', `store`='572202', `debt`='3976'  WHERE (`id` = 695) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='696', `date`='2016-03-26', `amount`='1939090', `ket`='9700', `loan`='129033', `fund`='1497110', `store`='567042', `debt`='3976'  WHERE (`id` = 696) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='697', `date`='2016-03-27', `amount`='1931580', `ket`='9700', `loan`='129033', `fund`='1497110', `store`='559524', `debt`='3976'  WHERE (`id` = 697) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='698', `date`='2016-03-28', `amount`='1937330', `ket`='800', `loan`='112253', `fund`='1470790', `store`='574823', `debt`='3976'  WHERE (`id` = 698) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='699', `date`='2016-03-29', `amount`='1934580', `ket`='800', `loan`='112253', `fund`='1470790', `store`='572074', `debt`='3976'  WHERE (`id` = 699) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='700', `date`='2016-03-30', `amount`='1939680', `ket`='5900', `loan`='96203', `fund`='1464140', `store`='567768', `debt`='3976'  WHERE (`id` = 700) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='701', `date`='2016-03-31', `amount`='1942550', `ket`='6800', `loan`='122053', `fund`='1464410', `store`='596214', `debt`='3976'  WHERE (`id` = 701) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='702', `date`='2016-04-01', `amount`='1941700', `ket`='1450', `loan`='110918', `fund`='1449060', `store`='599578', `debt`='3976'  WHERE (`id` = 702) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='703', `date`='2016-04-02', `amount`='1934660', `ket`='1450', `loan`='110918', `fund`='1449060', `store`='592546', `debt`='3976'  WHERE (`id` = 703) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='704', `date`='2016-04-03', `amount`='1945840', `ket`='18200', `loan`='110918', `fund`='1463810', `store`='588970', `debt`='3976'  WHERE (`id` = 704) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='705', `date`='2016-04-04', `amount`='1944320', `ket`='19900', `loan`='110918', `fund`='1465510', `store`='585748', `debt`='3976'  WHERE (`id` = 705) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='706', `date`='2016-04-05', `amount`='1942120', `ket`='22700', `loan`='110918', `fund`='1468310', `store`='580752', `debt`='3976'  WHERE (`id` = 706) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='707', `date`='2016-04-06', `amount`='1944570', `ket`='29200', `loan`='121958', `fund`='1474810', `store`='587744', `debt`='3976'  WHERE (`id` = 707) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='708', `date`='2016-04-07', `amount`='1947320', `ket`='5000', `loan`='96298', `fund`='1450610', `store`='589034', `debt`='3976'  WHERE (`id` = 708) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='709', `date`='2016-04-08', `amount`='1951970', `ket`='16300', `loan`='96298', `fund`='1461910', `store`='582384', `debt`='3976'  WHERE (`id` = 709) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='710', `date`='2016-04-09', `amount`='1954110', `ket`='22500', `loan`='96298', `fund`='1468420', `store`='578012', `debt`='3976'  WHERE (`id` = 710) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='711', `date`='2016-04-10', `amount`='1983630', `ket`='1850', `loan`='150268', `fund`='1472650', `store`='657272', `debt`='3976'  WHERE (`id` = 711) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='712', `date`='2016-04-11', `amount`='1986340', `ket`='8650', `loan`='154558', `fund`='1479300', `store`='657624', `debt`='3976'  WHERE (`id` = 712) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='713', `date`='2016-04-12', `amount`='1986500', `ket`='7000', `loan`='140258', `fund`='1469600', `store`='653186', `debt`='3972'  WHERE (`id` = 713) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='714', `date`='2016-04-13', `amount`='1993490', `ket`='18000', `loan`='140258', `fund`='1480440', `store`='649332', `debt`='3972'  WHERE (`id` = 714) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='715', `date`='2016-04-14', `amount`='1978180', `ket`='13000', `loan`='147933', `fund`='1462200', `store`='660100', `debt`='3812'  WHERE (`id` = 715) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='716', `date`='2016-04-15', `amount`='1971520', `ket`='13000', `loan`='147933', `fund`='1462200', `store`='653440', `debt`='3812'  WHERE (`id` = 716) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='717', `date`='2016-04-16', `amount`='1979830', `ket`='23450', `loan`='147933', `fund`='1474700', `store`='649252', `debt`='3812'  WHERE (`id` = 717) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='718', `date`='2016-04-17', `amount`='1990200', `ket`='24000', `loan`='135895', `fund`='1475250', `store`='647036', `debt`='3812'  WHERE (`id` = 718) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='719', `date`='2016-04-18', `amount`='1984000', `ket`='24000', `loan`='138145', `fund`='1475250', `store`='643086', `debt`='3812'  WHERE (`id` = 719) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='720', `date`='2016-04-19', `amount`='1997790', `ket`='10550', `loan`='116330', `fund`='1461930', `store`='648378', `debt`='3812'  WHERE (`id` = 720) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='721', `date`='2016-04-20', `amount`='1994250', `ket`='10550', `loan`='116330', `fund`='1461930', `store`='644838', `debt`='3812'  WHERE (`id` = 721) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='722', `date`='2016-04-21', `amount`='1994720', `ket`='8700', `loan`='117156', `fund`='1454080', `store`='653978', `debt`='3812'  WHERE (`id` = 722) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='723', `date`='2016-04-22', `amount`='1992020', `ket`='8700', `loan`='117156', `fund`='1454080', `store`='651288', `debt`='3812'  WHERE (`id` = 723) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='724', `date`='2016-04-23', `amount`='1987700', `ket`='8700', `loan`='117156', `fund`='1454080', `store`='646966', `debt`='3812'  WHERE (`id` = 724) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='725', `date`='2016-04-24', `amount`='2000470', `ket`='27500', `loan`='116139', `fund`='1472700', `store`='640098', `debt`='3812'  WHERE (`id` = 725) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='726', `date`='2016-04-25', `amount`='2002230', `ket`='32600', `loan`='123039', `fund`='1477800', `store`='643656', `debt`='3812'  WHERE (`id` = 726) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='727', `date`='2016-04-26', `amount`='2006530', `ket`='17650', `loan`='105919', `fund`='1462850', `store`='645782', `debt`='3812'  WHERE (`id` = 727) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='728', `date`='2016-04-27', `amount`='2008780', `ket`='8000', `loan`='107652', `fund`='1453200', `store`='659422', `debt`='3812'  WHERE (`id` = 728) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='729', `date`='2016-04-28', `amount`='2013140', `ket`='18400', `loan`='107652', `fund`='1464600', `store`='652377', `debt`='3812'  WHERE (`id` = 729) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='730', `date`='2016-04-29', `amount`='2008700', `ket`='19000', `loan`='107652', `fund`='1465200', `store`='647336', `debt`='3812'  WHERE (`id` = 730) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='731', `date`='2016-04-30', `amount`='2014070', `ket`='18350', `loan`='108775', `fund`='1463500', `store`='655535', `debt`='3812'  WHERE (`id` = 731) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='733', `date`='2016-05-01', `amount`='2016660', `ket`='15050', `loan`='95775', `fund`='1460200', `store`='648066', `debt`='4169'  WHERE (`id` = 733) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='734', `date`='2016-05-02', `amount`='2020230', `ket`='27450', `loan`='124845', `fund`='1467600', `store`='673300', `debt`='4169'  WHERE (`id` = 734) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='735', `date`='2016-05-03', `amount`='2021280', `ket`='32150', `loan`='124845', `fund`='1472300', `store`='669653', `debt`='4169'  WHERE (`id` = 735) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='736', `date`='2016-05-04', `amount`='2022570', `ket`='25200', `loan`='113160', `fund`='1465070', `store`='666486', `debt`='4169'  WHERE (`id` = 736) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='737', `date`='2016-05-05', `amount`='2017050', `ket`='25200', `loan`='113160', `fund`='1465070', `store`='660965', `debt`='4169'  WHERE (`id` = 737) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='738', `date`='2016-05-06', `amount`='2013990', `ket`='25200', `loan`='113160', `fund`='1465070', `store`='657907', `debt`='4169'  WHERE (`id` = 738) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='739', `date`='2016-05-07', `amount`='2010690', `ket`='25200', `loan`='113160', `fund`='1465070', `store`='654605', `debt`='4169'  WHERE (`id` = 739) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='740', `date`='2016-05-08', `amount`='2007970', `ket`='25200', `loan`='121831', `fund`='1465670', `store`='659962', `debt`='4169'  WHERE (`id` = 740) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='741', `date`='2016-05-09', `amount`='2004520', `ket`='25200', `loan`='121831', `fund`='1465670', `store`='656513', `debt`='4169'  WHERE (`id` = 741) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='742', `date`='2016-05-10', `amount`='2019580', `ket`='13450', `loan`='107246', `fund`='1459970', `store`='662688', `debt`='4169'  WHERE (`id` = 742) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='743', `date`='2016-05-11', `amount`='2008470', `ket`='4800', `loan`='107246', `fund`='1451670', `store`='659878', `debt`='4169'  WHERE (`id` = 743) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='744', `date`='2016-05-12', `amount`='2011560', `ket`='12200', `loan`='105896', `fund`='1459030', `store`='654253', `debt`='4169'  WHERE (`id` = 744) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='745', `date`='2016-05-13', `amount`='2005050', `ket`='12200', `loan`='105896', `fund`='1459030', `store`='647748', `debt`='4169'  WHERE (`id` = 745) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='746', `date`='2016-05-14', `amount`='2019690', `ket`='32200', `loan`='118179', `fund`='1469180', `store`='664517', `debt`='4169'  WHERE (`id` = 746) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='747', `date`='2016-05-15', `amount`='2021550', `ket`='26100', `loan`='107159', `fund`='1463080', `store`='661458', `debt`='4169'  WHERE (`id` = 747) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='748', `date`='2016-05-16', `amount`='2022400', `ket`='11000', `loan`='78360', `fund`='1447980', `store`='648610', `debt`='4169'  WHERE (`id` = 748) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='749', `date`='2016-05-17', `amount`='2025210', `ket`='6800', `loan`='98585', `fund`='1444350', `store`='675270', `debt`='4169'  WHERE (`id` = 749) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='750', `date`='2016-05-18', `amount`='2027780', `ket`='6200', `loan`='102340', `fund`='1443550', `store`='682401', `debt`='4169'  WHERE (`id` = 750) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='751', `date`='2016-05-19', `amount`='2029500', `ket`='11400', `loan`='102340', `fund`='1449130', `store`='678122', `debt`='4584'  WHERE (`id` = 751) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='752', `date`='2016-05-20', `amount`='2026810', `ket`='11400', `loan`='111535', `fund`='1449130', `store`='684634', `debt`='4584'  WHERE (`id` = 752) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='753', `date`='2016-05-21', `amount`='2022540', `ket`='1300', `loan`='101965', `fund`='1438930', `store`='680989', `debt`='4584'  WHERE (`id` = 753) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='754', `date`='2016-05-22', `amount`='2025220', `ket`='7600', `loan`='101965', `fund`='1445230', `store`='677372', `debt`='4584'  WHERE (`id` = 754) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='755', `date`='2016-05-23', `amount`='2030710', `ket`='11600', `loan`='90665', `fund`='1446230', `store`='670560', `debt`='4584'  WHERE (`id` = 755) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='756', `date`='2016-05-24', `amount`='2032140', `ket`='15650', `loan`='90665', `fund`='1450000', `store`='668216', `debt`='4584'  WHERE (`id` = 756) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='757', `date`='2016-05-25', `amount`='2032730', `ket`='16750', `loan`='102508', `fund`='1451300', `store`='679354', `debt`='4584'  WHERE (`id` = 757) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='758', `date`='2016-05-26', `amount`='2034480', `ket`='22350', `loan`='102508', `fund`='1456700', `store`='675699', `debt`='4584'  WHERE (`id` = 758) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='759', `date`='2016-05-27', `amount`='2033630', `ket`='22850', `loan`='102508', `fund`='1458200', `store`='673350', `debt`='4584'  WHERE (`id` = 759) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='760', `date`='2016-05-28', `amount`='2029780', `ket`='500', `loan`='83508', `fund`='1435900', `store`='672802', `debt`='4584'  WHERE (`id` = 760) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='761', `date`='2016-05-29', `amount`='2027540', `ket`='500', `loan`='99567', `fund`='1435900', `store`='686626', `debt`='4584'  WHERE (`id` = 761) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='762', `date`='2016-05-30', `amount`='2024400', `ket`='500', `loan`='99567', `fund`='1435900', `store`='683481', `debt`='4584'  WHERE (`id` = 762) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='763', `date`='2016-05-31', `amount`='2036810', `ket`='15800', `loan`='99567', `fund`='1451200', `store`='680593', `debt`='4584'  WHERE (`id` = 763) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='765', `date`='2016-06-01', `amount`='2037870', `ket`='19700', `loan`='99567', `fund`='1455100', `store`='677750', `debt`='4584'  WHERE (`id` = 765) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='766', `date`='2016-06-02', `amount`='2032840', `ket`='0', `loan`='82247', `fund`='1435400', `store`='675097', `debt`='4584'  WHERE (`id` = 766) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='768', `date`='2016-06-03', `amount`='2034650', `ket`='4300', `loan`='52247', `fund`='1409700', `store`='672612', `debt`='4584'  WHERE (`id` = 768) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='769', `date`='2016-06-04', `amount`='2034990', `ket`='11200', `loan`='54435', `fund`='1411820', `store`='673020', `debt`='4584'  WHERE (`id` = 769) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='770', `date`='2016-06-05', `amount`='2040440', `ket`='24000', `loan`='50585', `fund`='1424620', `store`='661829', `debt`='4584'  WHERE (`id` = 770) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='771', `date`='2016-06-06', `amount`='2041760', `ket`='27400', `loan`='51995', `fund`='1429340', `store`='659835', `debt`='4584'  WHERE (`id` = 771) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='772', `date`='2016-06-07', `amount`='2066620', `ket`='31500', `loan`='92285', `fund`='1533920', `store`='620923', `debt`='4069'  WHERE (`id` = 772) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='773', `date`='2016-06-08', `amount`='2063890', `ket`='31500', `loan`='107855', `fund`='1533920', `store`='633758', `debt`='4069'  WHERE (`id` = 773) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='774', `date`='2016-06-09', `amount`='2072120', `ket`='43600', `loan`='107855', `fund`='1548040', `store`='627868', `debt`='4069'  WHERE (`id` = 774) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='775', `date`='2016-06-10', `amount`='2068380', `ket`='12400', `loan`='107855', `fund`='1547040', `store`='625129', `debt`='4069'  WHERE (`id` = 775) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='776', `date`='2016-06-11', `amount`='2074820', `ket`='17400', `loan`='101705', `fund`='1550750', `store`='621706', `debt`='4069'  WHERE (`id` = 776) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='777', `date`='2016-06-12', `amount`='2077230', `ket`='18300', `loan`='110196', `fund`='1550920', `store`='632436', `debt`='4069'  WHERE (`id` = 777) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='778', `date`='2016-06-13', `amount`='2074070', `ket`='18300', `loan`='110196', `fund`='1550920', `store`='629273', `debt`='4069'  WHERE (`id` = 778) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='779', `date`='2016-06-14', `amount`='2075380', `ket`='21600', `loan`='118649', `fund`='1556120', `store`='634118', `debt`='3789'  WHERE (`id` = 779) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='780', `date`='2016-06-15', `amount`='2076160', `ket`='13100', `loan`='116446', `fund`='1545600', `store`='643213', `debt`='3789'  WHERE (`id` = 780) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='781', `date`='2016-06-16', `amount`='2074030', `ket`='4900', `loan`='104143', `fund`='1533800', `store`='640582', `debt`='3789'  WHERE (`id` = 781) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='782', `date`='2016-06-17', `amount`='2074090', `ket`='9200', `loan`='104143', `fund`='1538900', `store`='635542', `debt`='3789'  WHERE (`id` = 782) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='783', `date`='2016-06-18', `amount`='2075260', `ket`='12300', `loan`='103741', `fund`='1542170', `store`='633045', `debt`='3789'  WHERE (`id` = 783) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='784', `date`='2016-06-19', `amount`='2073460', `ket`='12300', `loan`='103741', `fund`='1542170', `store`='631241', `debt`='3789'  WHERE (`id` = 784) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='785', `date`='2016-06-20', `amount`='2074220', `ket`='11100', `loan`='95741', `fund`='1537610', `store`='628563', `debt`='3789'  WHERE (`id` = 785) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='786', `date`='2016-06-21', `amount`='2070160', `ket`='6300', `loan`='92341', `fund`='1532560', `store`='626157', `debt`='3789'  WHERE (`id` = 786) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='787', `date`='2016-06-22', `amount`='2066340', `ket`='900', `loan`='85867', `fund`='1527870', `store`='620545', `debt`='3789'  WHERE (`id` = 787) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='788', `date`='2016-06-23', `amount`='2067620', `ket`='4200', `loan`='88753', `fund`='1531820', `store`='620764', `debt`='3789'  WHERE (`id` = 788) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='789', `date`='2016-06-24', `amount`='2069140', `ket`='11300', `loan`='85867', `fund`='1535240', `store`='615978', `debt`='3789'  WHERE (`id` = 789) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='790', `date`='2016-06-25', `amount`='2067900', `ket`='11300', `loan`='85867', `fund`='1535240', `store`='614734', `debt`='3789'  WHERE (`id` = 790) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='791', `date`='2016-06-26', `amount`='2072080', `ket`='9200', `loan`='75562', `fund`='1532960', `store`='610887', `debt`='3789'  WHERE (`id` = 791) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='792', `date`='2016-06-27', `amount`='2073270', `ket`='3250', `loan`='65269', `fund`='1525570', `store`='609176', `debt`='3789'  WHERE (`id` = 792) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='793', `date`='2016-06-28', `amount`='2075160', `ket`='8050', `loan`='81904', `fund`='1531050', `store`='622221', `debt`='3789'  WHERE (`id` = 793) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='794', `date`='2016-06-29', `amount`='2072050', `ket`='8050', `loan`='81904', `fund`='1531050', `store`='619119', `debt`='3789'  WHERE (`id` = 794) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='795', `date`='2016-06-30', `amount`='2073140', `ket`='13050', `loan`='81904', `fund`='1535850', `store`='615406', `debt`='3789'  WHERE (`id` = 795) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='796', `date`='2016-07-01', `amount`='2079180', `ket`='11300', `loan`='73904', `fund`='1535120', `store`='614179', `debt`='3789'  WHERE (`id` = 796) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='797', `date`='2016-07-02', `amount`='2082220', `ket`='15900', `loan`='81969', `fund`='1540070', `store`='620327', `debt`='3789'  WHERE (`id` = 797) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='798', `date`='2016-07-03', `amount`='2080270', `ket`='15900', `loan`='81969', `fund`='1540070', `store`='618378', `debt`='3789'  WHERE (`id` = 798) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='799', `date`='2016-07-04', `amount`='2080400', `ket`='17500', `loan`='81969', `fund`='1542070', `store`='616505', `debt`='3789'  WHERE (`id` = 799) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='800', `date`='2016-07-05', `amount`='2078630', `ket`='17500', `loan`='81969', `fund`='1542070', `store`='614738', `debt`='3789'  WHERE (`id` = 800) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='801', `date`='2016-07-06', `amount`='2078420', `ket`='19500', `loan`='81969', `fund`='1544070', `store`='612526', `debt`='3789'  WHERE (`id` = 801) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='802', `date`='2016-07-07', `amount`='2080220', `ket`='25400', `loan`='81969', `fund`='1549570', `store`='608828', `debt`='3789'  WHERE (`id` = 802) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='803', `date`='2016-07-08', `amount`='2106810', `ket`='4900', `loan`='81969', `fund`='1579070', `store`='605919', `debt`='3789'  WHERE (`id` = 803) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='804', `date`='2016-07-09', `amount`='2103070', `ket`='5900', `loan`='81969', `fund`='1579070', `store`='602172', `debt`='3789'  WHERE (`id` = 804) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='805', `date`='2016-07-10', `amount`='2105540', `ket`='11900', `loan`='81969', `fund`='1584770', `store`='598951', `debt`='3789'  WHERE (`id` = 805) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='806', `date`='2016-07-11', `amount`='2110980', `ket`='20850', `loan`='93229', `fund`='1592920', `store`='607492', `debt`='3789'  WHERE (`id` = 806) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='807', `date`='2016-07-12', `amount`='2109510', `ket`='20850', `loan`='93229', `fund`='1592920', `store`='606023', `debt`='3789'  WHERE (`id` = 807) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='808', `date`='2016-07-13', `amount`='2113560', `ket`='27700', `loan`='93229', `fund`='1600770', `store`='602227', `debt`='3789'  WHERE (`id` = 808) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='809', `date`='2016-07-14', `amount`='2115860', `ket`='16800', `loan`='82009', `fund`='1595140', `store`='598945', `debt`='3789'  WHERE (`id` = 809) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='810', `date`='2016-07-15', `amount`='2115850', `ket`='3500', `loan`='66009', `fund`='1581910', `store`='596162', `debt`='3789'  WHERE (`id` = 810) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='811', `date`='2016-07-16', `amount`='2114540', `ket`='2600', `loan`='71113', `fund`='1583510', `store`='598354', `debt`='3789'  WHERE (`id` = 811) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='812', `date`='2016-07-17', `amount`='2111830', `ket`='2600', `loan`='71113', `fund`='1583510', `store`='595643', `debt`='3789'  WHERE (`id` = 812) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='813', `date`='2016-07-18', `amount`='2110140', `ket`='2600', `loan`='71113', `fund`='1583510', `store`='593957', `debt`='3789'  WHERE (`id` = 813) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='814', `date`='2016-07-19', `amount`='2107450', `ket`='2600', `loan`='71113', `fund`='1583510', `store`='591264', `debt`='3789'  WHERE (`id` = 814) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='815', `date`='2016-07-20', `amount`='2117450', `ket`='5150', `loan`='76489', `fund`='1596760', `store`='593390', `debt`='3789'  WHERE (`id` = 815) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='816', `date`='2016-07-21', `amount`='2111350', `ket`='0', `loan`='51425', `fund`='1572310', `store`='586676', `debt`='3789'  WHERE (`id` = 816) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='817', `date`='2016-07-22', `amount`='2113650', `ket`='7900', `loan`='48210', `fund`='1575480', `store`='582588', `debt`='3789'  WHERE (`id` = 817) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='818', `date`='2016-07-23', `amount`='2115670', `ket`='14200', `loan`='48430', `fund`='1581780', `store`='577996', `debt`='4316'  WHERE (`id` = 818) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='819', `date`='2016-07-24', `amount`='2116760', `ket`='17200', `loan`='48430', `fund`='1584580', `store`='576293', `debt`='4316'  WHERE (`id` = 819) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='820', `date`='2016-07-25', `amount`='2111410', `ket`='17200', `loan`='48430', `fund`='1584580', `store`='570943', `debt`='4316'  WHERE (`id` = 820) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='821', `date`='2016-07-26', `amount`='2117750', `ket`='23350', `loan`='45455', `fund`='1589010', `store`='569874', `debt`='4316'  WHERE (`id` = 821) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='822', `date`='2016-07-27', `amount`='2097600', `ket`='3800', `loan`='45455', `fund`='1570060', `store`='568679', `debt`='4316'  WHERE (`id` = 822) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='823', `date`='2016-07-29', `amount`='2098330', `ket`='9700', `loan`='53792', `fund`='1575970', `store`='571833', `debt`='4316'  WHERE (`id` = 823) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='824', `date`='2016-07-30', `amount`='2098410', `ket`='13600', `loan`='53792', `fund`='1578830', `store`='569049', `debt`='4316'  WHERE (`id` = 824) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='825', `date`='2016-07-31', `amount`='2094230', `ket`='13600', `loan`='53792', `fund`='1578830', `store`='564876', `debt`='4316'  WHERE (`id` = 825) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='826', `date`='2016-08-01', `amount`='2100610', `ket`='18000', `loan`='48297', `fund`='1583140', `store`='561448', `debt`='4316'  WHERE (`id` = 826) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='827', `date`='2016-08-02', `amount`='2101130', `ket`='20400', `loan`='48297', `fund`='1585240', `store`='559868', `debt`='4316'  WHERE (`id` = 827) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='828', `date`='2016-08-03', `amount`='2100560', `ket`='2100', `loan`='28277', `fund`='1567440', `store`='557081', `debt`='4316'  WHERE (`id` = 828) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='829', `date`='2016-08-04', `amount`='2101420', `ket`='6400', `loan`='25074', `fund`='1571760', `store`='550418', `debt`='4316'  WHERE (`id` = 829) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='830', `date`='2016-08-05', `amount`='2099010', `ket`='6400', `loan`='25074', `fund`='1571760', `store`='548011', `debt`='4316'  WHERE (`id` = 830) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='831', `date`='2016-08-06', `amount`='2100450', `ket`='9700', `loan`='25074', `fund`='1575460', `store`='545749', `debt`='4316'  WHERE (`id` = 831) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='832', `date`='2016-08-07', `amount`='2101570', `ket`='13200', `loan`='25074', `fund`='1578960', `store`='543365', `debt`='4316'  WHERE (`id` = 832) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='833', `date`='2016-08-08', `amount`='2128190', `ket`='18000', `loan`='25074', `fund`='1607860', `store`='541085', `debt`='4316'  WHERE (`id` = 833) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='834', `date`='2016-08-09', `amount`='2126340', `ket`='18000', `loan`='25074', `fund`='1607860', `store`='539242', `debt`='4316'  WHERE (`id` = 834) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='835', `date`='2016-08-10', `amount`='2129600', `ket`='23800', `loan`='25074', `fund`='1613260', `store`='537094', `debt`='4316'  WHERE (`id` = 835) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='836', `date`='2016-08-11', `amount`='2123630', `ket`='19800', `loan`='9129', `fund`='1599160', `store`='529282', `debt`='4316'  WHERE (`id` = 836) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='837', `date`='2016-08-12', `amount`='2087840', `ket`='12700', `loan`='9129', `fund`='1565360', `store`='527297', `debt`='4316'  WHERE (`id` = 837) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='838', `date`='2016-08-13', `amount`='2089580', `ket`='17900', `loan`='9129', `fund`='1570560', `store`='523839', `debt`='4316'  WHERE (`id` = 838) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='839', `date`='2016-08-14', `amount`='2090610', `ket`='22100', `loan`='9129', `fund`='1574760', `store`='520668', `debt`='4316'  WHERE (`id` = 839) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='840', `date`='2016-08-15', `amount`='2088240', `ket`='22600', `loan`='9129', `fund`='1575060', `store`='517995', `debt`='4316'  WHERE (`id` = 840) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='841', `date`='2016-08-16', `amount`='2088750', `ket`='26100', `loan`='9129', `fund`='1578560', `store`='515008', `debt`='4316'  WHERE (`id` = 841) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='842', `date`='2016-08-17', `amount`='2090080', `ket`='30400', `loan`='9129', `fund`='1582860', `store`='512037', `debt`='4316'  WHERE (`id` = 842) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='843', `date`='2016-08-18', `amount`='2089850', `ket`='25400', `loan`='9129', `fund`='1583560', `store`='511110', `debt`='4316'  WHERE (`id` = 843) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='844', `date`='2016-08-19', `amount`='2088000', `ket`='25400', `loan`='9129', `fund`='1583560', `store`='509260', `debt`='4316'  WHERE (`id` = 844) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='845', `date`='2016-08-20', `amount`='2090670', `ket`='27900', `loan`='9129', `fund`='1586410', `store`='509075', `debt`='4316'  WHERE (`id` = 845) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='846', `date`='2016-08-21', `amount`='2088490', `ket`='29000', `loan`='8159', `fund`='1586510', `store`='505828', `debt`='4316'  WHERE (`id` = 846) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='847', `date`='2016-08-22', `amount`='2070600', `ket`='14900', `loan`='9129', `fund`='1573330', `store`='502087', `debt`='4316'  WHERE (`id` = 847) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='848', `date`='2016-08-23', `amount`='2068490', `ket`='14900', `loan`='9129', `fund`='1573330', `store`='499975', `debt`='4316'  WHERE (`id` = 848) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='849', `date`='2016-08-24', `amount`='2071250', `ket`='18600', `loan`='9129', `fund`='1577230', `store`='498836', `debt`='4316'  WHERE (`id` = 849) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='850', `date`='2016-08-25', `amount`='2071640', `ket`='21400', `loan`='9129', `fund`='1579830', `store`='496626', `debt`='4316'  WHERE (`id` = 850) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='851', `date`='2016-08-26', `amount`='2070090', `ket`='21400', `loan`='9129', `fund`='1579830', `store`='495071', `debt`='4316'  WHERE (`id` = 851) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='852', `date`='2016-08-27', `amount`='2072730', `ket`='8200', `loan`='50124', `fund`='1584630', `store`='533914', `debt`='4316'  WHERE (`id` = 852) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='853', `date`='2016-08-28', `amount`='2072790', `ket`='9600', `loan`='50124', `fund`='1586370', `store`='532228', `debt`='4316'  WHERE (`id` = 853) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='854', `date`='2016-08-29', `amount`='2069110', `ket`='7400', `loan`='50124', `fund`='1584170', `store`='530749', `debt`='4316'  WHERE (`id` = 854) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='855', `date`='2016-08-30', `amount`='2069650', `ket`='9900', `loan`='50124', `fund`='1586670', `store`='528791', `debt`='4316'  WHERE (`id` = 855) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='856', `date`='2016-08-31', `amount`='2070620', `ket`='7400', `loan`='71135', `fund`='1583810', `store`='553628', `debt`='4316'  WHERE (`id` = 856) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='857', `date`='2016-09-01', `amount`='2072420', `ket`='13100', `loan`='71135', `fund`='1589510', `store`='549725', `debt`='4316'  WHERE (`id` = 857) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='858', `date`='2016-09-02', `amount`='2068740', `ket`='13100', `loan`='71135', `fund`='1589160', `store`='546394', `debt`='4316'  WHERE (`id` = 858) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='859', `date`='2016-09-03', `amount`='2066800', `ket`='13100', `loan`='71135', `fund`='1589160', `store`='544452', `debt`='4316'  WHERE (`id` = 859) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='860', `date`='2016-09-04', `amount`='2069750', `ket`='18100', `loan`='71135', `fund`='1595400', `store`='541164', `debt`='4316'  WHERE (`id` = 860) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='861', `date`='2016-09-05', `amount`='2070940', `ket`='22900', `loan`='71135', `fund`='1599900', `store`='537858', `debt`='4316'  WHERE (`id` = 861) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='862', `date`='2016-09-06', `amount`='2096370', `ket`='8800', `loan`='71135', `fund`='1628000', `store`='535190', `debt`='4316'  WHERE (`id` = 862) ;
	/*End   of batch : 1 */
	/*Start of batch : 2 */
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1009', `date`='2017-02-11', `amount`='2190650', `ket`='13700', `loan`='15120', `fund`='1740760', `store`='461952', `debt`='3055'  WHERE (`id` = 1009) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1010', `date`='2017-02-12', `amount`='2196310', `ket`='0', `loan`='15120', `fund`='1747060', `store`='461307', `debt`='3055'  WHERE (`id` = 1010) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1011', `date`='2017-02-14', `amount`='2190470', `ket`='1500', `loan`='15120', `fund`='1745560', `store`='456973', `debt`='3055'  WHERE (`id` = 1011) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1012', `date`='2017-02-15', `amount`='2193980', `ket`='7300', `loan`='15120', `fund`='1751360', `store`='454683', `debt`='3055'  WHERE (`id` = 1012) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1013', `date`='2017-02-16', `amount`='2195030', `ket`='11000', `loan`='38350', `fund`='1754810', `store`='475633', `debt`='2935'  WHERE (`id` = 1013) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1014', `date`='2017-02-17', `amount`='2158110', `ket`='9200', `loan`='42600', `fund`='1721310', `store`='476457', `debt`='2935'  WHERE (`id` = 1014) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1015', `date`='2017-02-18', `amount`='2160020', `ket`='7800', `loan`='43770', `fund`='1721290', `store`='479556', `debt`='2935'  WHERE (`id` = 1015) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1016', `date`='2017-02-19', `amount`='2155760', `ket`='-200', `loan`='47290', `fund`='1713290', `store`='486820', `debt`='2935'  WHERE (`id` = 1016) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1017', `date`='2017-02-20', `amount`='2159110', `ket`='1500', `loan`='53475', `fund`='1714890', `store`='494757', `debt`='2935'  WHERE (`id` = 1017) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1018', `date`='2017-02-21', `amount`='2153520', `ket`='600', `loan`='62160', `fund`='1711570', `store`='501172', `debt`='2935'  WHERE (`id` = 1018) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1019', `date`='2017-02-22', `amount`='2151530', `ket`='600', `loan`='62160', `fund`='1711570', `store`='499180', `debt`='2935'  WHERE (`id` = 1019) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1020', `date`='2017-02-23', `amount`='2155270', `ket`='2600', `loan`='87265', `fund`='1721400', `store`='518195', `debt`='2935'  WHERE (`id` = 1020) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1021', `date`='2017-02-24', `amount`='2152870', `ket`='2600', `loan`='94637', `fund`='1721400', `store`='523164', `debt`='2935'  WHERE (`id` = 1021) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1022', `date`='2017-02-25', `amount`='2152440', `ket`='6200', `loan`='94637', `fund`='1725000', `store`='519136', `debt`='2935'  WHERE (`id` = 1022) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1023', `date`='2017-02-26', `amount`='2168650', `ket`='22200', `loan`='95897', `fund`='1743900', `store`='517706', `debt`='2935'  WHERE (`id` = 1023) ;
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1024', `date`='2017-02-27', `amount`='2167130', `ket`='20600', `loan`='125932', `fund`='1742300', `store`='547822', `debt`='2935'  WHERE (`id` = 1024) ;
	/*End   of batch : 2 */
	/*Start of batch : 3 */
UPDATE `zkpmolfu_banhang`.`property` SET `id`='1025', `date`='2017-02-28', `amount`='2165980', `ket`='13000', `loan`='104407', `fund`='1724700', `store`='542746', `debt`='2935'  WHERE (`id` = 1025) ;
	/*End   of batch : 3 */
/* SYNC TABLE : `provider` */

/* SYNC TABLE : `provider_paid` */

/* SYNC TABLE : `provider_paid_fund_change_histo` */

/* SYNC TABLE : `role` */

/* SYNC TABLE : `season` */

/* SYNC TABLE : `sex` */

/* SYNC TABLE : `shop` */

/* SYNC TABLE : `spend` */

	/*Start of batch : 4 */
INSERT INTO `zkpmolfu_banhang`.`spend` VALUES ('3140', '1', '85', '1', 'Đi ăn trưa 2 vợ chồng', '2017-02-28 23:06:08', '1', '1');
INSERT INTO `zkpmolfu_banhang`.`spend` VALUES ('3138', '1', '500', '1', 'Mẹ nạp điện thoại', '2017-02-28 23:06:08', '1', '1');
INSERT INTO `zkpmolfu_banhang`.`spend` VALUES ('3139', '1', '100', '1', 'Bố nạp điện thoại', '2017-02-28 23:06:08', '1', '1');
	/*End   of batch : 4 */
	/*Start of batch : 5 */
INSERT INTO `zkpmolfu_banhang`.`spend` VALUES ('3141', '1', '115', '1', 'Ăn sáng với chú thúy', '2017-02-28 23:06:08', '1', '1');
	/*End   of batch : 5 */
/* SYNC TABLE : `spend_category` */

/* SYNC TABLE : `spend_for` */

/* SYNC TABLE : `spend_type` */

/* SYNC TABLE : `stock_all` */

/* SYNC TABLE : `stock_za` */

/* SYNC TABLE : `user` */

/* SYNC TABLE : `user_absent_history` */

/* SYNC TABLE : `user_role` */

/* SYNC TABLE : `user_salary_history` */


COMMIT;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
