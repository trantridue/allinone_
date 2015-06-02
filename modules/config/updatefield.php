<?php 
	require_once ("../../include/constant.php");
	require_once ("../../include/configService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$configService = new ConfigService ( hostname, username, password, database, $commonService );
	$configService->updateFieldConfig($_REQUEST['fieldname'],$_REQUEST['fieldvalue']);
?>