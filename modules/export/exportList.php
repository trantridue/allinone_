<hr>
<div class="titlecss">Danh sách sản phẩm đã bán</div>
<input type="hidden" id="listProductReturnId" value=""/>
<input type="hidden" id="listProductReturnQty" value=""/>
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
		$exportService->listExport ( $parameterArray );
	} else {
		$exportService->listExportDefault ();
	}
} else {
	$exportService->listExportDefault ();
}
?>