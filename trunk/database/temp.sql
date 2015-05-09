SELECT t1.tel,t1.name,t1.id
,ifnull((select sum(quantity*export_price) from export_facture_product where export_facture_code in (select code from export_facture where customer_id=t1.id)),0) totalbuy
,ifnull((select sum(amount) from customer_paid where customer_id = t1.id),0) as paid
,ifnull((select sum(amount) from customer_reservation_histo where customer_id = t1.id and status='N'),0) as reserved

 FROM `customer` t1 where t1.tel like '%709' or t1.id = 5566;

truncate table customer_paid;
truncate table customer_reservation_histo;

insert into  `customer_paid`(customer_id,amount,`date`,description,shop_id)
SELECT t1.id
,ifnull((select sum(quantity*price) from `zabuzach_store`.export where export_facture_code in (select code from `zabuzach_store`.export_facture where customers_id=t1.id)),0) totalbuy
,now()
,'migrate'
,1 FROM `zabuzach_store`.`customers` t1 where
t1.id in (SELECT id FROM `zabuzach_store`.`customer_order` union SELECT id FROM `zabuzach_store`.`customer_debt`);



insert into customer_reservation_histo(id,customer_id,description,amount,status,date,complete_date)
select id,customers_id,description,amount,status,date,date_complete FROM zabuzach_store.customer_order ;

update customer_reservation_histo set status = 'Y' where status ='C';
update customer_reservation_histo set status = 'N' where status ='P';

--------------
SELECT sum(t1.quantity*t1.return_price), t1.customer_id,t1.date,(select name from customer where id = t1.customer_id) FROM `customer_return` t1 group by t1.customer_id order by sum(t1.quantity*t1.return_price) desc;

-- 20150509
SELECT t1.name,sum(t3.quantity*t3.export_price) FROM `customer` t1, export_facture t2,export_facture_product t3
where t1.id= t2.customer_id and t2.code = t3.export_facture_code group by t1.id order by sum(t3.quantity*t3.export_price) desc;