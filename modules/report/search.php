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
function displayChart(){
	var url = 'modules/report/excomeReport.php' + getSearchParamsReport();
//	alert(url);
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