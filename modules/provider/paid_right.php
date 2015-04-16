<h4>LIST PAID</h4>
<?php
if($_REQUEST['isdefault'] != 'true') {
	require_once ("../../include/constant.php");
	require_once ("../../include/providerService.php");
	require_once ("../../include/commonService.php");
} else {
	require_once ("../include/constant.php");
	require_once ("../include/providerService.php");
	require_once ("../include/commonService.php");
}
$commonService = new CommonService ( );
$providerService = new ProviderService ( hostname, username, password, database, $commonService );

$providerService->listPaidHisto ( $_REQUEST ['id'] );
?>
