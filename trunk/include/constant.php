<?php
//Timeout server
define('timeout', '3600');
//DB configuration
define('hostname', 'localhost');
define('username', 'root');
define('password', '123456');
define('database', 'allinone');
define('tablename', 'user');
//String Constant
define('tab2', '&nbsp;&nbsp;');
define('tab4', tab2.tab2);
define('tab8', tab4.tab4);
define('tab16', tab8.tab8);
//Default param
define('defaultmodule','export');
define('defaultsubmodule','search');
//datatableid
define('userdatatable','user');
define('customerdebtdatatable','customer_debt');
define('customerorderdatatable','customer_order');
define('exportproductdatatable','export_facture_product');
define('customerreservationdatatable','customer_reservation_histo');
define('customerreturndatatable','customer_return');
define('spenddatatable','spend');
define('fundhistodatatable','fund_change_histo');
define('newsdatatable','news');
define('providerdatatable','provider');
define('customerdatatable','customer');
define('inoutdatatable','money_inout');
define('datatable_prefix','table_list_');
//default password
//define('default_password','123456');
//Default product row return
//define('default_row_product_return','5');
define('default_number_line_spend','5');
//Default number days for paid
define('default_nbr_day_paid','14');
//Paid provider default source
define('default_id_source_1','1');
define('default_id_source_2','18');
define('default_id_source_3','3');
//default number months load product import
define('default_nbr_days_load_import','30');
define('default_nbr_days_load_export','6');
?>