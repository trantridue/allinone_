<?php
require_once ("../include/constant.php");
require_once ("../include/exportService.php");
require_once ("../include/commonService.php");
$commonService = new CommonService ();
$exportService = new ExportService ( hostname, username, password, database, $commonService );

if (isset ( $_GET ['term'] )) {
	echo json_encode ( $exportService->getJsonProductCode ( $_GET ['term'] ) );
}
?>