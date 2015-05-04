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
,1 FROM `zabuzach_store`.`customers` t1 where t1.tel like '%709' or t1.id = 5566;



insert into customer_reservation_histo(id,customer_id,description,amount,status,date,complete_date)
select id,customers_id,description,amount,status,date,date_complete FROM zabuzach_store.customer_order ;

update customer_reservation_histo set status = 'Y' where status ='C';
update customer_reservation_histo set status = 'N' where status ='P';

SELECT * FROM `customer_reservation_histo` where status = 'N';

select code from `zabuzach_store`.export_facture where customers_id=5566;

select * from `zabuzach_store`.export where export_facture_code = '20150422_022';