<hr>
<?php
$isdefault = $_REQUEST ['isdefault'];

if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/importService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$importService = new ImportService ( hostname, username, password, database, $commonService );
	$parameterArray = $importService->getInputSearchParameters();
	$importService->listProductReturn( $parameterArray );
} else {
	$importService->listProductReturnDefault();
	$importService->test();
}

?>
<br>