<?php
$isdefault = $_REQUEST ['isdefault'];
$isAjax = $_REQUEST ['isAjax'];
if($isAjax == '') {
	require_once ("./include/constant.php");
	require_once ("./include/configService.php");
	require_once ("./include/commonService.php");
} else {
	require_once ("../../include/constant.php");
	require_once ("../../include/configService.php");
	require_once ("../../include/commonService.php");
}
$commonService = new CommonService ();
$configService = new ConfigService ( hostname, username, password, database, $commonService );
if ($isdefault == "false") {
	$configService->listProductNoImage ($_GET);
} else {
	$configService->listProductNoImageDefault ();	
}
?>