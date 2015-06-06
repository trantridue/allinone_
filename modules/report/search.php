<table class="searchcriteriatable" width="100%">
<tr>
<td align="right">Date :</td>
<td>
<input class="datefield" id="datefrom" value="<?php	echo date ( 'Y-m-01' );?>" />
<input class="datefield" id="dateto" value="<?php	echo date ( 'Y-m-t' );?>"/></td>
<td><input type="button" onclick="displayChart();" value="DISPLAY" class='menu_btn_sub'/> </td>
<td align="right">Shop : </td>
<td><?php $commonService->printDropDownListFromTable("shop","shop");?></td>
<td align="right">Chart Type:</td>
<td><?php $commonService->printChartType();?></td>
<td align="right">Chart Time:</td>
<td><?php $commonService->printChartTime();?></td>

</tr>
</table>

<script>
function displaychartByTime(){
	var charttime = $('#charttime').val();
	
	if(charttime=='%Y'){
		$("#datefrom").val(getFirstDateOfTenYearAgo());
		$("#dateto").val(getLastDateOfYear());
	}
	if(charttime=='%Y-%m'){
		$("#datefrom").val(getFirstDateOfYear());
		$("#dateto").val(getLastDateOfYear());
	}
	if(charttime=='%Y-%m-%d'){
		$("#datefrom").val(getFirstDateOfMonth());
		$("#dateto").val(getLastDateOfMonth());
	}
	displayChart();
}
function getFirstDateOfYear(){
	 var d = new Date();
	    var curr_year = d.getFullYear();
	    return curr_year + "-" + "01-01";
}
function getFirstDateOfTenYearAgo(){
	 var d = new Date();
	    var curr_year = d.getFullYear();
	    return eval(curr_year-10) + "-" + "01-01";
}
function getLastDateOfYear(){
	 var d = new Date();
	    var curr_year = d.getFullYear();
	    return curr_year + "-" + "12-31";
}
function getFirstDateOfMonth(){
	 var d = new Date();
	    var curr_year = d.getFullYear();
	    var curr_month = d.getMonth() + 1;
	    return curr_year + "-" + getMonthFormat(curr_month)+ "-01";
}
function getLastDateOfMonth(){
	var d = new Date();
  var curr_year = d.getFullYear();
  var curr_month = d.getMonth() + 1;
  var varldmt = new Date(curr_year, curr_month, 0);
  var ldmt = varldmt.getDate();
  return curr_year + "-" + getMonthFormat(curr_month)+ "-" + ldmt;
}
function getMonthFormat(curr_month){	
	return curr_month<10?"0"+curr_month:curr_month;
	
}
function displayChart(){
	var url = 'modules/report/excomeReport.php' + getSearchParamsReport();
	$('#excomeReport').load(url);
}
function getSearchParamsReport(){
	var params = '?isAjax=true';
	params = params + "&datefrom" + "=" + $('#datefrom').val();
	params = params + "&dateto" + "=" + $('#dateto').val();
	params = params + "&id_shop" + "=" + $('#id_shop').val();
	params = params + "&charttype" + "=" + $('#charttype').val();
	params = params + "&charttime" + "=" + $('#charttime').val();
	return processUrlString(params);
}
</script>