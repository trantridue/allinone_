<?php 
require_once ("../../include/constant.php");
require_once ("../../include/importService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database, $commonService );
	$codes = $_REQUEST['codes'];
	$quantities = $_REQUEST['quantities'];
	$descriptions = $_REQUEST['descriptions'];
	$providers = $_REQUEST['providers'];
	$prices = $_REQUEST['prices'];
	$date_return_product = $_REQUEST['date_return_product'];
	$importService->addReturnProduct($codes,$quantities,$descriptions,$providers,$prices,$date_return_product);
?>