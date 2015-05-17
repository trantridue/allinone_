<?php
require_once ("../include/constant.php");
require_once ("../include/importService.php");
require_once ("../include/commonService.php");
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database, $commonService );

if (isset ( $_GET ['term'] )) {
	echo json_encode ( $importService->getJsonCustomerName ( $_GET ['term'] ) );
}
?>