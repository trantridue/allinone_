<?php
require_once ("../../include/constant.php");
require_once ("../../include/importService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database, $commonService );
$parameterArray = $importService->getProductParameters();
$importService->updateImportProduct($parameterArray);
	
?>