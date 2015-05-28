<?php
$isdefault = $_REQUEST ['isdefault'];
$isSearch = $_REQUEST ['issearch'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/customerService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$customerService = new CustomerService ( hostname, username, password, database, $commonService );
	$parameterArray = $customerService->getSearchParameters();
	if($isSearch == 'true') {
		$customerService->listCustomer ( $parameterArray );
	} else {
		$customerService->listCustomerDefault ();
	}
} else {
	$customerService->listCustomerDefault ();
}
?>