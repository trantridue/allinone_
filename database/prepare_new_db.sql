﻿use fuheiksj_banhang;
delete from customer_order;
delete from customer_reservation_histo;
delete from export_facture_trace;
delete from export_facture_product;
delete from export_facture;
delete from fund_change_histo;
delete from money_inout;
delete from news;
delete from product_deviation;
delete from product_import;
delete from product_return;
delete from property;
delete from provider_paid;
delete from provider_paid_fund_change_histo;
delete from spend;
delete from product;
delete from `customer` where id not in (1288);
#update `customer` set tel = '9999999999';
delete from `user` where phone_number not in ('0979355285','0966807709','01649785255');
delete from import_facture;
delete from provider;
delete from fund where id not in(8,1);
update `user` set name = 'Anh Minh', phone_number='0918888398' where id = 1;
update `user` set shop_id = 1;
delete from brand;
delete from category;
commit;