<?php
$isAjax = $_REQUEST ['isAjax'];
if ($isAjax == 'true') {
	require_once ("../../include/constant.php");
	require_once ("../../include/reportService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ( );
	$reportService = new ReportService ( hostname, username, password, database, $commonService );
	$params = $reportService->getReportParameters();
}
?>
<script lang="javascript" type="text/javascript">
     <?php echo $reportService->generateDataExportChart($params,"reportChart1","Biểu đồ lãi xuất");?>
    </script>

<div id="reportChart1" style="width: 100%; height: 520px;"></div>
