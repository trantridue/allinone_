#prepare table shop
use allinone;

#truncate customer_bonus_used;
truncate configuration;
truncate customer_reservation_histo;
#truncate customer_paid;
truncate export_facture_product;
truncate export_facture_trace;
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
insert into customer (id,name,tel,description,date,created_date) select id,
CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8),tel,
CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8),date,date
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
select t1.product_code,t1.quantity,t1.date,(select CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) 
from zabuzach_store.products where code = t1.product_code) as description,t1.providers_id,
(select import_price from product_import where product_code =t1.product_code limit 1)
from zabuzach_store.return_provider t1;

update import_facture set deadline = date;
# spend
truncate spend;
truncate spend_for;
truncate spend_category;
truncate spend_type;

insert into spend_category(id,name) SELECT id,CONVERT(CONVERT(CONVERT(name USING latin1) USING binary) USING utf8) FROM `zabuzach_store`.`ref_spend_domain`;
insert into spend_category(id,name) values (8,'Lấy quần áo');
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
insert into export_facture_product(id,product_code,quantity,export_price,export_facture_code,re_qty,re_date,re_description)
select id,products_code,quantity,price,export_facture_code,qty_return,return_date,CONVERT(CONVERT(CONVERT(description USING latin1) USING binary) USING utf8) from `zabuzach_store`.`export`;

#truncate table customer_paid;
truncate table customer_reservation_histo;

/*insert into  `customer_paid`(customer_id,amount,`date`,description,shop_id)
select t1.id as customer_id,sum(t3.price*(t3.quantity-t3.qty_return)) as amount,t2.date,CONVERT(CONVERT(CONVERT(t2.description USING latin1) USING binary) USING utf8),t2.shops_id
from zabuzach_store.customers t1,zabuzach_store.export_facture t2, zabuzach_store.export t3
where t1.id = t2.customers_id
and t2.code = t3.export_facture_code group by t1.id;
*/
insert into customer_reservation_histo(id,customer_id,description,amount,status,date,complete_date)
select id,customers_id,description,amount,status,date,date_complete FROM zabuzach_store.customer_order;

update customer_reservation_histo set status = 'Y' where status ='C';
update customer_reservation_histo set status = 'N' where status ='P';

/*
insert into `customer_bonus_used` (id,customer_id,amount,date)
select id,customer_id,total_sale,date FROM `zabuzach_store`.`customer_sale_histo`;
*/
update  `customer` set isboss = 1 where tel in ('0979355285','0936496833','0966807709');

/*update customer_paid t1
set t1.amount = (t1.amount - (SELECT t2.amount FROM `zabuzach_store`.`customer_debt` t2 where t2.status = 'P' and t2.customers_id = t1.customer_id))
where t1.customer_id in (SELECT customers_id FROM `zabuzach_store`.`customer_debt` where status = 'P');
*/
#export_trace
truncate export_facture_trace;
insert into export_facture_trace (id,export_facture_code,total,debt,reserved,`order`,customer_give,give_customer,bonus_used,bonus_ratio,return_amount,
shop_id,amount,customer_id)
select t1.id,t1.export_facture_code,t1.total_facture,t1.old_debt,t1.ordered,t1.neworder,t1.customer_paid,t1.shop_repaid,
t1.coupon,100,t1.returned,
(select shops_id  FROM `zabuzach_store`.`export_facture` where code = t1.export_facture_code),
(t1.total_facture-t1.returned+t1.coupon),
(select customers_id  FROM `zabuzach_store`.`export_facture` where code = t1.export_facture_code) from `zabuzach_store`.`export_trace` t1;
#
update export_facture_trace t1 set t1.amount = (t1.amount + ifnull((select debt from (SELECT code,
       ( t.total - t.paid ) AS debt
FROM   (SELECT t1.id,
               t1.tel,
               t1.NAME,
               (SELECT Max(t4.date)
                FROM   export_facture t4
                WHERE  t4.customer_id = t1.id)                    AS date,
                (SELECT Max(t4.code)
                FROM   export_facture t4
                WHERE  t4.customer_id = t1.id)                    AS code,
               Sum(( t3.quantity - t3.re_qty ) * t3.export_price) AS total,
               (SELECT Sum(amount)
                FROM   export_facture_trace t4
                WHERE  t4.customer_id = t1.id)                    AS paid
        FROM   customer t1,
               export_facture t2,
               export_facture_product t3
        WHERE  t1.id = t2.customer_id
               AND t2.code = t3.export_facture_code 
               AND t1.tel NOT LIKE '%aaaaaaa%'
        GROUP  BY t1.id) t
WHERE  ( t.total - t.paid ) <> 0) t2 where t2.code = t1.export_facture_code),0));
update export_facture_trace set amount = 0 where id = 12073;
#update `export_facture_trace` set amount = (amount+customer_give-give_customer+bonus_used) where give_customer >0;
#update `export_facture_trace` set amount = (amount+customer_give+bonus_used) where give_customer <=0;
update customer t1 set t1.date = (SELECT max(date) FROM `export_facture` where customer_id = t1.id);

#migrate deviation
drop table if exists stock_za;
create table stock_za as SELECT t1.code,t1.name,t1.sale,t1.quantity as total, t1.posted_price,(select sum(t2.quantity-t2.outstock)
 from zabuzach_store.shop_product t2 where t2.products_code = t1.code) as instock
		from zabuzach_store.products t1 where ucase(t1.code) in (select product_code from zabuzach_store.return_provider);


drop table if exists stock_all;
create table stock_all as  select code, (init_import-return_provider-export_qty+cus_return+deviation) as in_stock from (select t1.*,
			(select ifnull(sum(quantity),0) from product_import where product_code = t1.code) as init_import,
(select ifnull(sum(quantity),0) from product_return where product_code = t1.code) as return_provider,
(select ifnull(sum(quantity),0) from export_facture_product where product_code = t1.code) as export_qty,
(select ifnull(sum(re_qty),0) from export_facture_product where product_code = t1.code) as cus_return,
(select ifnull(sum(quantity),0) from product_deviation where product_code = t1.code) as deviation
			from product t1
		where t1.code in (select product_code from zabuzach_store.return_provider)) t;


truncate table product_deviation;
insert into product_deviation (product_code,quantity,date,description) select t1.code, (t1.instock - t2.in_stock) as deviation,now(),'migration correct instock'
from stock_za t1 left join stock_all t2 on (t1.code = t2.code);
/* 
drop table if exists product_1;
create table product_1 as select * from product_return group by product_code having count(*) <2;

update product_return t1 set t1.quantity = (t1.quantity - (select quantity from product_deviation where product_code = t1.product_code))
where t1.product_code in (select product_code from product_1);


delete from product_deviation where product_code in (select product_code from product_1);

*/
insert into `configuration`(`name`,`value`,`label`) values
('import_number_row','15','NBR ROW IMPORT'),
('export_number_row','9','NBR ROW EXPORT'),
('default_row_product_return','5','NBR ROW IMPORT RETURN'),
('default_password','123456','DEFAULT PASSWORD'),
('is_sale_for_all','1','SALE ON/OFF'),
('default_number_line_spend','7','NBR ROW SPEND'),
('listExportDefault_nbr_day_limit','1','NBR DAY EXPORT'),
('nbr_day_default_export_returned','1','NBR DAY EXPORT RETURN'),
('default_nbr_days_load_export','10','NBR DAY EXPORT DEFAULT'),
('bonus_ratio','100','BONUS RATIO'),
('init_money','500','AMOUNT INIT'),
('timeout','7200','SYSTEM TIMEOUT'),
('limit_default_customer_after_search','500','NBR ROW CUS AFTER'),
('limit_default_customer_before_search','100','NBR ROW CUS BEFORE'),
('nbr_customer_by_group_csv','250','NBR CUSTOMER BY GROUP'),
('sale_all_taux','10','SALE TAUX');