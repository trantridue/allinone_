<hr>
<div class="titlecss">Danh sách nợ</div>
<?php
$isdefault = $_REQUEST ['isdefault'];
$isSearch = $_REQUEST ['issearch'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/exportService.php");
	require_once ("../../include/commonService.php");
	
	$commonService = new CommonService ();
	$exportService = new ExportService ( hostname, username, password, database, $commonService );
	$parameterArray = $exportService->getSearchParameters ();
	if($isSearch == 'true') {
		$exportService->listDebt ( $parameterArray );
	} else {
		$exportService->listDebtDefault ();
	}
} else {
	$exportService->listDebtDefault ();
}
?>
