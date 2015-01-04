<?php
$customer_name = $_REQUEST ['customer_name'];
$customer_tel = $_REQUEST ['customer_tel'];
$customer_description = $_REQUEST ['customer_description'];

$customerService->addCustomer ( $customer_name, $customer_tel, $customer_description);
?>