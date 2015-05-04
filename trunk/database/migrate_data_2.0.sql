#prepare table shop
use allinone;
truncate customer_paid;
truncate export_facture_product;
truncate export_facture;
truncate table spend;
truncate table money_inout;
truncate table inout_type;
truncate table product_return;
truncate table provider_paid_fund_change_histo;
truncate table fund_change_histo;
truncate table provider_paid;
truncate news;
truncate provider_paid;
truncate user_role;
truncate user;
truncate shop;

insert into shop(id,name,address,date) values (1, 'shop1', '19 Vạn phúc Hà Đông Hà Nội',now());
insert into shop(id,name,address,date) values (2, 'shop2', 'Số 3 Lê Văn Lương - Vạn Phúc',now());
insert into shop(id,name,address,date) values (3, 'shop3', 'Số 5 Lê Văn Lương - Vạn Phúc',now());

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
truncate product_deviation;
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
-- from `zabuzach_store`.`customers` where tel is not null and tel not like '%aaaaa%';
from `zabuzach_store`.`customers`;
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
insert into fund (name, description) values ('BALANCE','CÂN ĐỐI CHI TRẢ');

insert into fund_change_histo(id,fund_id,amount,date,description,ratio,user_id)
SELECT id,cash_id,amount,inputdate,description,ratio,users_id FROM `zabuzach_store`.`cash_histo`;
update fund_change_histo set description = CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) where date >= '2014-07-16';
#product_return
insert into product_return (product_code,quantity,date,description,provider_id,return_price)
select t1.product_code,t1.quantity,t1.date,'migrated',t1.providers_id,
(select import_price from product_import where product_code =t1.product_code limit 1)
from zabuzach_store.return_provider t1;

update import_facture set deadline = date;
# spend
truncate spend;
truncate spend_for;
truncate spend_category;
truncate spend_type;

insert into spend_category(id,name) SELECT id,CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8) FROM `zabuzach_store`.`ref_spend_domain`;
insert into spend_for(id,name) SELECT id,CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8) FROM `zabuzach_store`.`ref_spend_for`;
insert into spend_type(id,name) SELECT id,CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8) FROM `zabuzach_store`.`ref_spend_type`;
insert into spend(id,spend_category_id,amount,user_id,description,date,spend_for_id,spend_type_id)
SELECT id,spend_domain_id,amount,users_id,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),date,spend_for_id,spend_type_id FROM `zabuzach_store`.`spend`;

#money in out
insert into money_inout(id,shop_id,user_id,date,amount,description)
select id,shops_id,users_id,fulldate,amount,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) from `zabuzach_store`.`money_inout` where type='in';
insert into money_inout(id,shop_id,user_id,date,amount,description)
select id,shops_id,users_id,fulldate,(0-amount),CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) from `zabuzach_store`.`money_inout` where type='out';
insert into inout_type(id,name) values (1,'Thêm tiền'),(2,'Rút tiền');
delete from money_inout where description = 'De lai' and amount=500;
#news
insert into news (id,date,description,shop_id,user_id) select id,date,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),1,users_id from `zabuzach_store`.`news`;

#export
insert into export_facture(code,customer_id,shop_id,`date`,description,user_id) select code,customers_id,shops_id,`date`,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),users_id FROM `zabuzach_store`.`export_facture`;

#export_facture_product
insert into export_facture_product(id,product_code,quantity,export_price,export_facture_code)
select id,products_code,quantity,price,export_facture_code from `zabuzach_store`.`export`;
SELECT t1.tel,t1.name,t1.id, (select sum(quantity*export_price) from export_facture_product where export_facture_code in (select code from export_facture where customer_id=t1.id)) totalbuy FROM `customer` t1 where t1.tel like '%833';