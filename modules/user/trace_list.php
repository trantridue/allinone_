<?php
$username = isset ( $_REQUEST ['username'] ) ? $_REQUEST ['username'] : '';
$name = isset ( $_REQUEST ['name'] ) ? $_REQUEST ['name'] : '';
$user_mail = isset ( $_REQUEST ['user_mail'] ) ? $_REQUEST ['user_mail'] : '';
$user_tel = isset ( $_REQUEST ['user_tel'] ) ? $_REQUEST ['user_tel'] : '';
$user_status_hidden = isset ( $_REQUEST ['user_status_hidden'] ) ? $_REQUEST ['user_status_hidden'] : '';
$user_description = isset ( $_REQUEST ['user_description'] ) ? $_REQUEST ['user_description'] : '';
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$userService = new UserService ( hostname, username, password, database, $commonService );
}
$userService->listUser ( $username,$name,$user_mail,$user_tel,$user_status_hidden,$user_description);
?>