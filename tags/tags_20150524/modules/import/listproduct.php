<?php

$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/importService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$importService = new ImportService ( hostname, username, password, database, $commonService );
	$parameterArray = $importService->getInputSearchParameters();
	if($_REQUEST ['loadall']=='false') {
		$importService->listProductDefault();
	} else {
		$importService->listProduct($parameterArray);
	}
} else {
	$importService->listProductDefault();
}
?>