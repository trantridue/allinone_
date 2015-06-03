
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>

</head>
<body>

<div class="wrap-page">


<div class="bodyBlock"><div id="bodyLeft" class="bodyLeft">
<script type="text/javascript">
function displaychart(){
//	var startdate = document.getElementById("startdate1").value;
//	var enddate = document.getElementById("enddate1").value;
	var startdate = document.forms['chartForm']['startdate1'].value;
	var enddate = document.forms['chartForm']['enddate1'].value;
	var charttype = document.forms['chartForm']['charttype'].value;
	var charttime = document.forms['chartForm']['charttime'].value;
//	alert(charttype);	
	var url = "component/chart/chartgraph.php?ajax=1&startdate="+startdate+"&enddate="+enddate+"&charttype="+charttype+"&charttime="+charttime;
	$("#chartmain").load(url);
}
function displaychartByTime(){
	var charttime = document.forms['chartForm']['charttime'].value;
	
	if(charttime=='month'){
		document.forms['chartForm']['startdate1'].value = getFirstDateOfYear();
		document.forms['chartForm']['enddate1'].value = getLastDateOfYear();
	}
	if(charttime=='date'){
		document.forms['chartForm']['startdate1'].value = getFirstDateOfMonth();
		document.forms['chartForm']['enddate1'].value = getLastDateOfMonth();
	}
	displaychart();
}
function getFirstDateOfYear(){
	 var d = new Date();
	    var curr_year = d.getFullYear();
	    return curr_year + "-" + "01-01";
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
</script>
<form name="chartForm" method="post">
<div id="chartcriteria">
<table>
	<tr style="font-weight: bold;">
		<td>Từ ngày</td>
		<td><input onchange="displaychart();" type="text" class="datefield"
			size="8" name="startdate" id="startdate1"
			value="2015-06-01" /></td>
		<td>Đến ngày</td>
		<td><input onchange="displaychart();" type="text" class="datefield"
			size="8" name="enddate" id="enddate1"
			value="2015-06-30" /></td>
		<td><select name="charttype" style="width: 145px;"
			onchange="displaychart();">
			<option value="">...Please select...</option>
			<option value="line">line</option>
			<option value="area">area</option>
			<option value="column">column</option>
		</select><select name="charttime" style="width: 145px;"
			onchange="displaychartByTime();">
			<option value="date" selected="selected">By days</option>
			<option value="month">By month</option>
			<option value="year">By Year</option>
		</select></td>
	</tr>

</table>
</div>
<div id="chartmain">


<link rel="stylesheet" type="text/css" href="style/jquery.jqChart.css" />
<link rel="stylesheet" type="text/css"
	href="style/jquery.jqRangeSlider.css" />
<link rel="stylesheet" type="text/css"
	href="themes/smoothness/jquery-ui-1.8.21.css" />
<!--<script src="scripts/jquery-1.5.1.min.js" type="text/javascript"></script>-->
<script src="scripts/jquery.jqChart.min.js" type="text/javascript"></script>
<script src="scripts/jquery.jqRangeSlider.min.js" type="text/javascript"></script>
<!--[if IE]><script lang="javascript" type="text/javascript" src="scripts/excanvas.js"></script><![endif]-->

<script lang="javascript" type="text/javascript">
var background = {
        type: 'linearGradient',
        x0: 0,
        y0: 0,
        x1: 0,
        y1: 1,
        colorStops: [{ offset: 0, color: '#d2e6c9' },
                     { offset: 1, color: 'white'}]
    };

        $(document).ready(function () {
            $('#jqChart').jqChart({
            	background: background,      
            	border: { strokeStyle: '#6ba851' },            	
            	tooltips: { type: 'shared' },
            	shadows: {
                    enabled: true,
                    shadowColor: 'gray',
                    shadowBlur: 10,
                    shadowOffsetX: 3,
                    shadowOffsetY: 3
                },
                crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
//            	animation: { duration: 1},
            	legend: { title: 'Legend' },            	
                title: { text: 'Biểu đồ doanh thu' },
                axes: [
                        {
                        	type: 'category',
                            location: 'bottom',
                            zoomEnabled: true
                        }
                      ],
                series: [
                            {   title : "2 Shop",
                                type: 'spline',                                
                                data: [
							['2015-06-01',2515]							]                                       
                            },
                            {	title : "Shop 1",
                            	type: 'spline',                              
                                data: [
							['2015-06-01',810]							]                                       
                            },
                            {	title : "Shop 2",                            
                            	type: 'spline',                                
                                data: [
							['2015-06-01',1105]							]                                       
                            }
                        ]
            });
        });
    </script>

<div>

<div id="jqChart" style="width: 100%; height: 520px;"></div>

</div>

</div>
</form>	
</div>

<div id="bodyRight" class="bodyRight">

<table style="font-weight: bold; text-align: center;">
	<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=user';"
			value="Nhân viên"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=import';"
			value="Nhập hàng"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=export';"
			value="Xuất hàng"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=moneyinout';"
			value="Giao nhận"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=query';"
			value="RunSQL"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=providerloan';"
			value="Nợ nhà CC"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=news';"
			value="Tin tức"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=chart';"
			value="CHART"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=cash';"
			value="CASH"></td>
	</tr>	
		<tr>
		<td><input type="button"
			onclick="javascript:document.location.href='index.php?module=spend';"
			value="Chi Phí"></td>
	</tr>	
		
	<tr>
		<td>
		<div class="formtitle">SHOP 1</div>
		</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;">
		<td>500</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>FINAL1: &nbsp;0</td>
	</tr>
	
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>FACT1: &nbsp;0</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>IN 1: 500</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>OUT 1: 0</td>
	</tr>
	<tr>
		<td>
		<div class="formtitle">SHOP 2</div>
		</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;">
		<td>500</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>FINAL2: &nbsp;0</td>
	</tr>
	
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>FACT2: &nbsp;0</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>IN 2: 500</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>OUT 2: 0</td>
	</tr>
	<tr>
		<td>
		<div class="formtitle">SHOP 3</div>
		</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;">
		<td>500</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>FINAL3: &nbsp;0</td>
	</tr>
	
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>FACT2: &nbsp;0</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>IN 3: 500</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;display: none;">
		<td>OUT 3: 0</td>
	</tr>
		<tr>
		<td>
		<div class="formtitle">CA</div>
		</td>
	</tr>
	<tr style="font-size: 12pt;color:red; background: bisque;">
		<td>1,500</td>
	</tr>
	

</table>
</div>

</div>

</body>