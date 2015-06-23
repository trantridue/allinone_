<hr>
<div class="titlecss">Danh sách sản phẩm đã bán</div>
<input type="hidden" id="listProductReturnId" value=""/>
<input type="hidden" id="listProductReturnQty" value=""/>
<input type="hidden" id="customer_tel_last" value=""/>
<input type="hidden" id="customer_tel_first" value=""/>
<input type="hidden" id="customer_tel_guess" value=""/>
<input type="hidden" id="customer_tel_flag" value="true"/>
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