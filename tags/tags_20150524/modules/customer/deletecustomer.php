<?php 
require_once ("../../include/constant.php");
require_once ("../../include/customerService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$customerService = new CustomerService ( hostname, username, password, database, $commonService );
	$customerid = $_REQUEST['customerid'];
	$customerService->deleteCustomer($customerid);
?>