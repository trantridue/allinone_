<?php
require_once ("../../include/constant.php");
require_once ("../../include/userService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ( );
$userService = new UserService ( hostname, username, password, database, $commonService );
$userService->deleteAbsent ( $_REQUEST ['id'] );
?>