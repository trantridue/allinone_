<?php
$isdefault = $_REQUEST ['isdefault'];
$isSearch = $_REQUEST ['issearch'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/inoutService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$inoutService = new InoutService ( hostname, username, password, database, $commonService );
	$parameterArray = $inoutService->getInputParameters ();
	if($isSearch == 'true') {
		$inoutService->listSpend ( $parameterArray );
	} else {
		$inoutService->listInoutDefault ();
	}
} else {
	$inoutService->listInoutDefault ();
}
?>