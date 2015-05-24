<?php 
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/fundService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$fundService = new FundService ( hostname, username, password, database, $commonService );
}
?>
<?php $fundService->listFund();?>