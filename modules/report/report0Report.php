<?php
$isAjax = $_REQUEST ['isAjax'];
$nbrShop = 0;
if($_REQUEST['issimplechart']=='false') $nbrShop = 3;
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

     <?php echo $reportService->generateDataExportChart($params,"reportChart0","Biểu đồ doanh thu & lợi nhuận & Chi phi",$nbrShop);?>
    </script>

<div id="reportChart0" style="width: 100%; height: 520px;"></div>

