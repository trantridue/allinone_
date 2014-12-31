<?php
$user_id =  $_REQUEST['user_id'];
$user_name =  $_REQUEST['user_name'];
$user_email =  $_REQUEST['user_email'];
$userService->updateUser($user_id,$user_name,$user_email);
?>