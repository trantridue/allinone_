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

     <?php echo $reportService->generateDataPropertyChart($params,"reportChart3","Tài Sản ",$nbrShop);?>
    </script>

<div id="reportChart3" style="width: 100%; height: 520px;"></div>

