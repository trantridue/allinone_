<?php
$isdefault = $_REQUEST ['isdefault'];
$isAjax = $_REQUEST ['isAjax'];
if($isAjax == '') {
	require_once ("./include/constant.php");
	require_once ("./include/userService.php");
	require_once ("./include/commonService.php");
} else {
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
}
$commonService = new CommonService ();
$userService = new UserService ( hostname, username, password, database, $commonService );
if ($isdefault == "false") {
	$userService->listAbsent ($_GET);
} else {
	$userService->listAbsentDefault ();	
}
?>