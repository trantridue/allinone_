<?php
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/newsService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$newsService = new NewsService ( hostname, username, password, database, $commonService );
	$parameterArray = $newsService->getInputSearchParameters ();
	$newsService->listNews ( $parameterArray );
} else {
	$newsService->listNewsDefault ();
}
?>