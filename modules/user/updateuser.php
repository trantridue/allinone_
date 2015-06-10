<?php 
	require_once ("../../include/constant.php");
	require_once ("../../include/userService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$userService = new UserService ( hostname, username, password, database, $commonService );
?>
<?php
$user_id =  $_REQUEST['user_id'];
$user_name =  $_REQUEST['user_name'];
$user_email =  $_REQUEST['user_email'];
$user_phone_number =  $_REQUEST['user_phone_number'];
$user_description =  $_REQUEST['user_description'];
$user_password =  $_REQUEST['user_password'];
$shop_dropdown_user =  $_REQUEST['id_shop_dropdown_user'];
$status_value =  $_REQUEST['user_status_hidden'];
$start_date =  $_REQUEST['user_start_date'];

$userService->updateUser($user_id,$user_name,$user_email,$user_phone_number,
$user_description,$user_password,$shop_dropdown_user,$status_value,$start_date);
?>