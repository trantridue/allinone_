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
var background = {
        type: 'linearGradient',
        x0: 0,
        y0: 0,
        x1: 1,
        y1: 1,
        colorStops: [{ offset: 0, color: '#d2e6c9' },
                     { offset: 1, color: 'white'}]
    };
     <?php echo $reportService->generateDataExportChart($params);?>
    </script>

<div id="reportChart1" style="width: 100%; height: 520px;"></div>
