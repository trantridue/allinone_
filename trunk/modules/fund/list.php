<?php
$isdefault = $_REQUEST ['isdefault'];
$isSearch = $_REQUEST ['issearch'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/fundService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$fundService = new FundService ( hostname, username, password, database, $commonService );
	$parameterArray = $fundService->getFundSearchParameters ();
	if($isSearch == 'true') {
		$fundService->listFundHisto ( $parameterArray );
	} else {
		$fundService->listFundHistoDefault ();
	}
} else {
	$fundService->listFundHistoDefault ();
}
?>