<?php
$customer_id =  $_REQUEST['customer_id'];
$customer_name =  $_REQUEST['customer_name'];
$customer_tel =  $_REQUEST['customer_tel'];
$customer_description =  $_REQUEST['customer_description'];

$customerService->updateCustomer($customer_id,$customer_name,$customer_tel,$customer_description);
?>