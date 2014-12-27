<?php
$username = $_REQUEST ['username'];
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$userService = new UserService ( hostname, username, password, database, $commonService );
}
$userService->listUser ($username);
?>