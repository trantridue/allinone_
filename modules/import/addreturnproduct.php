<?php 
require_once ("../../include/constant.php");
require_once ("../../include/importService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database, $commonService );
	$codes = $_REQUEST['codes'];
	$importService->addReturnProduct($codes);
?>