update export_facture set customer_id = 6698 where customer_id = 3641;
update customer_reservation_histo set customer_id = 6698 where customer_id = 3641;
update export_facture_trace set customer_id = 6698 where customer_id = 3641;

update customer set name = 'Chi Hoang', tel = '0945xxxxxx' where id = 3641;
