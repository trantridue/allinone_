<?php
$username = isset ( $_REQUEST ['username'] ) ? $_REQUEST ['username'] : '';
$name = isset ( $_REQUEST ['name'] ) ? $_REQUEST ['name'] : '';
$user_mail = isset ( $_REQUEST ['user_mail'] ) ? $_REQUEST ['user_mail'] : '';
$user_tel = isset ( $_REQUEST ['user_tel'] ) ? $_REQUEST ['user_tel'] : '';
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$userService = new UserService ( hostname, username, password, database, $commonService );
}
$userService->listUser ( $username,$name,$user_mail,$user_tel);
?>