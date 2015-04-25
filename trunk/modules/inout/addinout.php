<?php 
	require_once ("../../include/constant.php");
	require_once ("../../include/inoutService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$inoutService = new InoutService ( hostname, username, password, database, $commonService );
	$params = $inoutService->getAddParameters();
	$inoutService->insertInout($params);
?>