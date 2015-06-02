<?php
$isdefault = $_REQUEST ['isdefault'];
$issearch = $_REQUEST ['issearch'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/newsService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ( );
	$newsService = new NewsService ( hostname, username, password, database, $commonService );
	$parameterArray = $newsService->getInputSearchParameters ();
	if ($issearch == "true")
		$newsService->listNews ( $parameterArray );
	else
		$newsService->listNewsDefault ();
} else {
	$newsService->listNewsDefault ();
}
?>