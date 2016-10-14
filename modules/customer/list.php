<?php
$isdefault = $_REQUEST ['isdefault'];
$isAjax = $_REQUEST ['isAjax'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/customerService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$customerService = new CustomerService ( hostname, username, password, database, $commonService );
	if($isAjax == 'yes') {
		$customerService->listCustomer ( $_GET );
	} else {
		$customerService->listCustomerDefault ();
	}
} else {
	$customerService->listCustomerDefault ();
}
?>