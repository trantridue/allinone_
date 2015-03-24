#prepare table shop
truncate user_role;
truncate user;
truncate shop;

insert into shop(id,name,address,date) values (1, 'shop1', '19 Vạn phúc Hà Đông Hà Nội',now());
insert into shop(id,name,address,date) values (2, 'shop2', 'Số 3 Lê Văn lương',now());

#Prepare table user


insert into user SELECT t1.id,t1.shops_id,CONVERT(CONVERT(CONVERT(t1.name USING latin1) USING binary) USING utf8),t1.email, t1.phone_number, t1.username, t1.password, t1.confirmcode, t1.active,
t1.start_time,t1.end_time, 'nothing' as description FROM `zabuzach_store`.`users` t1;

update user set status = 'y' where status = '1';
update user set status = 'n' where status = '0';

#prepare provider
truncate table product_import;
truncate table import_facture;
truncate table provider;
insert into provider select t1.id, CONVERT(CONVERT(CONVERT(t1.name USING latin1) USING binary) USING utf8), t1.tel,
CONVERT(CONVERT(CONVERT(t1.address USING latin1) USING binary) USING utf8),
CONVERT(CONVERT(CONVERT(t1.description USING latin1) USING binary) USING utf8), now() from `zabuzach_store`.`providers` t1;

#brand
truncate product;
truncate brand;
INSERT INTO `brand` (`name`) VALUES
('MADEVN'),
('F21'),
('MANGO'),
('NEW FASHION'),
('WACOAL'),
('TRIUMPH'),
('LEVIS'),
('D&G'),
('TOMMY'),
('BURBERRY'),
('EXPRESS'),
('ARISTINO'),
('ALDO'),
('RICHEVER'),
('VITCO'),
('ARMANI'),
('POLO'),
('GAP'),
('DESTINA'),
('NEXT FASHION'),
('UNIQUILO');

#category
truncate category;
INSERT INTO `category` (`name`) VALUES
('VAY'),
('JEANS'),
('QUAN AU'),
('AO PHONG'),
('DEP'),
('GIAY'),
('QUAN CHIP'),
('AO NGUC'),
('SO MI'),
('QUAN SOOC'),
('TAT CHAN'),
('TAT TAY'),
('DAY LUNG'),
('CHAN VAY'),
('TRE EM'),
('TUI  XACH'),
('VI');
UPDATE `category` set description = name;

#customer
truncate customer;
insert into customer (id,name,tel,description,date) select id,
CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8),tel,
CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),date
from `zabuzach_store`.`customers` where tel is not null and tel not like '%aaaaa%';
#Prepadata product
INSERT INTO `import_facture` (`code`, `date`, `description`, `provider_id`) VALUES ('20150324_001', '2015-03-24 05:36:57', 'Lấy hàng 1 mình', 2);
INSERT INTO `import_facture` (`code`, `date`, `description`, `provider_id`) VALUES ('20150324_002', '2015-03-24 05:42:29', 'Anh Thắng mang qua', 14);

INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0001', 'Áo phông nữ tommy', 4, 1, 1, 150, '', 9, 10, NULL);
INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0002', 'Áo phông nam tommy', 4, 1, 2, 200, '', 9, 10, NULL);
INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0003', 'Váy hoa Mango', 1, 1, 1, 300, '', 3, 10, NULL);
INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0004', 'Váy ren thêu', 1, 1, 1, 550, '', 4, 10, NULL);
INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0005', 'Quần sooc nam levis', 10, 1, 2, 300, '', 7, 10, NULL);
INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0006', 'Jean nam đẹp', 2, 1, 2, 500, '', 21, 5, NULL);
INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`, `sale`, `link`) VALUES ('0007', 'Jean nam lên', 2, 1, 2, 450, '', 7, 5, NULL);

INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (1, '0001', '20150324_001', 50, 80);
INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (2, '0002', '20150324_001', 35, 105);
INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (3, '0003', '20150324_001', 10, 135);
INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (4, '0004', '20150324_001', 20, 285);
INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (5, '0005', '20150324_001', 27, 150);
INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (6, '0006', '20150324_002', 10, 230);
INSERT INTO `product_import` (`id`, `product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES (7, '0007', '20150324_002', 20, 220);

