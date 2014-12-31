<?php
$user_id =  $_REQUEST['user_id'];
$user_name =  $_REQUEST['user_name'];
$user_email =  $_REQUEST['user_email'];
$user_phone_number =  $_REQUEST['user_phone_number'];
$user_description =  $_REQUEST['user_description'];
$user_password =  $_REQUEST['user_password'];
$shop_dropdown_user =  $_REQUEST['shop_dropdown_user'];

$userService->updateUser($user_id,$user_name,$user_email,$user_phone_number,$user_description,$user_password,$shop_dropdown_user);
?>