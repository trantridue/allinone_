<?php 
require_once ("../../include/constant.php");
require_once ("../../include/importService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database, $commonService );
	$codes = $_REQUEST['codes'];
	$quantities = $_REQUEST['quantities'];
	$descriptions = $_REQUEST['descriptions'];
	$importService->addReturnProduct($codes,$quantities,$descriptions);
?>