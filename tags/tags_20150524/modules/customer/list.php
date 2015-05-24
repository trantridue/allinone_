<?php
$name = isset ( $_REQUEST ['name'] ) ? $_REQUEST ['name'] : '';
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/customerService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$customerService = new CustomerService ( hostname, username, password, database, $commonService );
}
$customerService->listCustomer ($name);
?>