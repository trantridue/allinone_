<?php

$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$params = $userService->getSearchAbsentParams();
	$userService = new UserService ( hostname, username, password, database, $commonService );
	$userService->listAbsent ($params);
}
$userService->listAbsentDefault ();
?>