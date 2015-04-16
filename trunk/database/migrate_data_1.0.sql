#prepare table shop
truncate table fund_change_histo;
truncate table provider_paid;
truncate news;
truncate provider_paid;
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
truncate product_return;
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
('UNIQUILO'),
('HOLISTER'),
('ABERCROMBIE');

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
insert into import_facture (code,date,description,provider_id) select code,date,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),providers_id from `zabuzach_store`.`import_facture`;

insert into product (code,name,category_id,season_id,sex_id,export_price,description,brand_id,sale)
select code,CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8),1,1,1,posted_price,
CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),1,sale from `zabuzach_store`.`products`;

insert into `product_import` (product_code,import_facture_code,quantity,import_price)
select t1.code,t1.import_facture_code,
(select sum(quantity) from `zabuzach_store`.shop_product where products_code = t1.code group by products_code) as quantity,
t1.import_price
from `zabuzach_store`.products t1;

#sex
update sex set name='WOMAN' where id = 1;
update sex set name='MAN' where id = 2;
#user_role
insert into user_role(user_id,role_id) values (1,1);
#paid

insert into `provider_paid`(id,provider_id,amount,date,description)
SELECT id,providers_id,paid,date,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) FROM `zabuzach_store`.`provider_paid_histo`;

#fund
truncate fund;
insert into fund(id,name,description)
SELECT id,CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8),CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) FROM `zabuzach_store`.`cash`;

insert into fund_change_histo(id,fund_id,amount,date,description,ratio,user_id)
SELECT id,cash_id,amount,inputdate,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),ratio,users_id FROM `zabuzach_store`.`cash_histo`;
