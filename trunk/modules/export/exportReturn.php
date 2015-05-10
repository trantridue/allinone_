<hr>
<div class="titlecss">Danh sách hàng trả lại</div>
<?php 
$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/exportService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$exportService = new ExportService ( hostname, username, password, database, $commonService );
}
?>
<?php $exportService->listReturn();?>