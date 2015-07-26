<link rel="stylesheet" type="text/css" href="style/jquery.jqChart.css" />
<link rel="stylesheet" type="text/css"
	href="style/jquery.jqRangeSlider.css" />
<link rel="stylesheet" type="text/css"
	href="themes/smoothness/jquery-ui-1.8.21.css" />
<script src="scripts/jquery.jqChart.min.js" type="text/javascript"></script>
<script src="scripts/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
<?php 
if($commonService->isAdmin()) {?>
<div id="inputArea">
<div><?php include 'search.php'?></div>
<hr>

  <div id="chartArea">
  <div>
  	<input type="button" value="STATISTIC" class="menu_btn_sub" style="background-color:violet;"
	onclick="toggleDivShowBtnStatusAndRefresh('report1',this);">
  	
  	<input type="button" value="CHART GRAPH" class="menu_btn_sub"  style="background-color:violet;"
	onclick="toggleDivShowBtnStatusAndRefresh('report0',this);">
	
	<input type="button" value="EXPORT TRACE" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatusAndRefresh('report2',this);">
	
	<input type="button" value="EFFICIENT PRODUCT" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatusAndRefresh('report5',this);">
	
	<input type="button" value="PROPERTY" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatusAndRefresh('report3',this);">
	
	<input type="button" value="CUSTOMER COUNT" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatusAndRefresh('report4',this);">

  </div>
     <div id="report1"  style="display:block;">
	<?php include 'report1Report.php';?>
	</div>
	<div id="report3" style="display:none;">
	<?php include 'report3Report.php';?>
	</div>
  	<div id="report0" style="display:block;">
	<?php include 'report0Report.php';?>
	</div>
  	<div id="report2" style="display:none;">
	<?php include 'report2Report.php';?>
	</div>
  	<div id="report4" style="display:none;">
	<?php include 'report4Report.php';?>
	</div>
  	<div id="report5" style="display:none;">
	<?php include 'report5Report.php';?>
	</div>
   
  </div>
 
</div>

<?php } else {
	include 'common/errorpage.php';
}?>