<?php
	require_once ("../../include/constant.php");
	require_once ("../../include/spendService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$spendService = new SpendService ( hostname, username, password, database, $commonService );
	$spendService->deleteSpend ($_REQUEST['id']);
?>