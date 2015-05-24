<?php 
	require_once ("../../include/constant.php");
	require_once ("../../include/exportService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$exportService = new ExportService ( hostname, username, password, database, $commonService );
	$params = $exportService->getExportParameters();
	$exportService->saveExport($params);
//	echo "success";
?>
