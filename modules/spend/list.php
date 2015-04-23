<?php
$isdefault = $_REQUEST ['isdefault'];
$isSearch = $_REQUEST ['issearch'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/spendService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$spendService = new SpendService ( hostname, username, password, database, $commonService );
	$parameterArray = $spendService->getInputParameters ();
	if($isSearch == 'true') {
		$spendService->listSpend ( $parameterArray );
	} else {
		$spendService->listSpendDefault ();
	}
} else {
	$spendService->listSpendDefault ();
}
?>