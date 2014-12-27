<?php
$username = $_REQUEST ['username'];
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ( hostname, username, password, database );
	$userService = new UserService ( hostname, username, password, database );
}
$commonService->generateJqueryDatatable();
$userService->listUser ( $username );
// include 'common/test.php';
?>