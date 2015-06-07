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
<div id="reportChart1" style="width: 100%; min-height: 60px;">
<?php $reportService->generateStatistic($params);?>
</div>
