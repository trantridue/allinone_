<?php 
	require_once ("../../include/constant.php");
	require_once ("../../include/spendService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$spendService = new SpendService ( hostname, username, password, database, $commonService );
	$nbrLine = $_REQUEST['nbrLine'];
	$params = $spendService->getAddParameters($nbrLine);
//	echo $params['add_description_1'];
	$spendService->insertSpends($nbrLine,$params);
?>