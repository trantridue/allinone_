<?php 
	require_once ("../../include/constant.php");
	require_once ("../../include/newsService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$newsService = new NewsService ( hostname, username, password, database, $commonService );
	$newsService->updateNewStatus($_REQUEST['id'],$_REQUEST['status']);
?>