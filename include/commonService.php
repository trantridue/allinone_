<?php
ob_start ();
class CommonService {
	function generateJSDatatableSimple($datatable_id, $ordercolumn, $ordertype) {
		echo "<script>";
		echo "$(document).ready(function() { $('#" . datatable_prefix . $datatable_id . "').dataTable({
				'order': [[ " . $ordercolumn . ", '" . $ordertype . "' ]], 
				'pageLength': 10, 
				'aLengthMenu': [[5, 10, 15, 100], ['5 Per Page', '10 Per Page', '15 Per Page', '100 Per Page']],
				 'bPaginate': true,
        'sDom':'fptip'
	});});";
		echo "</script>";
	}
	function generateJSDatatableComplex($result, $datatable_id, $ordercolumn, $ordertype, $array_total) {
		if(mysql_num_rows($result)>0) {
		echo "<script>  ";
		echo "$(document).ready(  ";
		echo "function() {  ";
			echo "$('#" . datatable_prefix . $datatable_id . "').dataTable(  ";
					echo "{ ";
						echo "'destroy': true, 
						'order': [[ " . $ordercolumn . ", '" . $ordertype . "' ]],'pageLength': 10, 
						";
						echo "'footerCallback' : function(row, data, start, end, ";
								echo "display) { ";
							echo "var api = this.api(), data; ";
							echo "var intVal = function(i) { ";
								echo "return typeof i === 'string' ? i.replace( ";
										echo "/[\$,]/g, '') * 1  ";
										echo ": typeof i === 'number' ? i : 0; ";
							echo "}; ";
							echo "var allContent='';";
							foreach ( $array_total as $value => $key ) {
								echo "var all".$value." = 0; ";
								echo "for (var i = 0; i < data.length; i++) { ";
								echo "all".$value." += data[i][".$value."]*1; ";
								echo "} ";
								echo "all".$value. "=all".$value.".toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');";
							}
							echo "var currentContent='';";
							
							foreach ( $array_total as $value => $key ) {
								echo "var current".$value." = api.column(".$value." , { ";
								echo "page : 'current' ";
								echo "}).data().reduce(function(a, b) { ";
								echo "return (intVal(a) + intVal(b)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ";
								echo "}); ";
							}
							$counter = 1;
							foreach ( $array_total as $value => $key ) {
								if($counter < count($array_total)) {
									echo "currentContent = currentContent + '".$key." : ' + current".$value." + '&nbsp;|&nbsp;';";
									echo "allContent = allContent + '".$key." : ' + all".$value." + '&nbsp;|&nbsp;';";
								} else {
									echo "currentContent = currentContent + '".$key." : ' + current".$value." + '&nbsp;&nbsp;';";
									echo "allContent = allContent + '".$key." : ' + all".$value." + '&nbsp;&nbsp;';";
								}
								$counter++;
							}
							echo "$(api.column(1).footer()).html('<span>' + allContent + '</span>' +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + currentContent );";
							echo "$('#datatableDisplaySum".$datatable_id."').html('<span>' + allContent + '</span>' +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + currentContent );";
					echo "}});";
		echo "}); ";
echo "</script> ";
		} 
	}
function generateJSDatatableComplexExport($result, $datatable_id, $ordercolumn, $ordertype, $array_total) {
		if(mysql_num_rows($result)>0) {
		echo "<script>  ";
		echo "$(document).ready(  ";
		echo "function() {  ";
			echo "$('#" . datatable_prefix . $datatable_id . "').dataTable(  ";
					echo "{ ";
						echo "'destroy': true, 
						'order': [[ " . $ordercolumn . ", '" . $ordertype . "' ]],scrollY: 280,paging: false, 
						";
						echo "'footerCallback' : function(row, data, start, end, ";
								echo "display) { ";
							echo "var api = this.api(), data; ";
							echo "var intVal = function(i) { ";
								echo "return typeof i === 'string' ? i.replace( ";
										echo "/[\$,]/g, '') * 1  ";
										echo ": typeof i === 'number' ? i : 0; ";
							echo "}; ";
							echo "var allContent='';";
							foreach ( $array_total as $value => $key ) {
								echo "var all".$value." = 0; ";
								echo "for (var i = 0; i < data.length; i++) { ";
								echo "all".$value." += data[i][".$value."]*1; ";
								echo "} ";
								echo "all".$value. "=all".$value.".toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');";
							}
							echo "var currentContent='';";
							
							foreach ( $array_total as $value => $key ) {
								echo "var current".$value." = api.column(".$value." , { ";
								echo "page : 'current' ";
								echo "}).data().reduce(function(a, b) { ";
								echo "return (intVal(a) + intVal(b)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ";
								echo "}); ";
							}
							$counter = 1;
							foreach ( $array_total as $value => $key ) {
								if($counter < count($array_total)) {
									echo "currentContent = currentContent + '".$key." : ' + current".$value." + '&nbsp;|&nbsp;';";
									echo "allContent = allContent + '".$key." : ' + all".$value." + '&nbsp;|&nbsp;';";
								} else {
									echo "currentContent = currentContent + '".$key." : ' + current".$value." + '&nbsp;&nbsp;';";
									echo "allContent = allContent + '".$key." : ' + all".$value." + '&nbsp;&nbsp;';";
								}
								$counter++;
							}
							echo "$(api.column(1).footer()).html('<span>' + allContent + '</span>' +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + currentContent );";
							echo "$('#datatableDisplaySum".$datatable_id."').html('<span>' + allContent + '</span>' +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + currentContent );";
					echo "}});";
		echo "}); ";
echo "</script> ";
		} 
	}
	function generateJqueryToolTipScript($result, $datatable_id, $array_column) {
		if(mysql_num_rows($result)>0) {
			$num_colum = sizeof ( $array_column );
			
			while ( $rows = mysql_fetch_array ( $result ) ) {
				foreach ( $array_column as $value => $key ) {
					if(sizeof(explode ( ",", $key ))>2) {
						$fields = explode ( ",", $value );
						$fieldskey = explode ( ",", $key );
						
						echo "<script>";
						echo "$(document).ready(function() {";
						echo "$('#".$fieldskey [1].$rows [$fieldskey [1]]."').tooltip({contentAsHTML: true, content: '<img class=\"toltipimg\" src=\"".$rows[$fieldskey[2]]."\" />' });";
						echo "});";
						echo "</script>";
							
					}	
				}
			}
			
		}
	}
	function generateJqueryDatatable($result, $datatable_id, $array_column) {
		if(mysql_num_rows($result)>0) {
		$num_colum = sizeof ( $array_column );
		// generate header
		echo "<div class='datatableDisplaySum' id='datatableDisplaySum".$datatable_id."'></div>";
		echo "<table id='" . datatable_prefix . $datatable_id . "' class='display' cellspacing='0' class='order-column' width='100%'>";
		echo "<thead>";
		echo "<tr>";
		
		foreach ( $array_column as $value => $key ) {
			if ($key == 'hidden_field' || $key == 'complex') {
				echo "<th style='display: none;'>" . $key . "</th>";
			} else if(sizeof(explode ( ",", $key ))>1){
				$fieldskey = explode ( ",", $key );
				echo "<th>" . $fieldskey[0] . "</th>";
			} else {
				echo "<th>" . $key . "</th>";
			}
		}
		
		echo "</tr>";
		echo "</thead>";
		echo "<tfoot>";
		echo "<tr>";
		echo "<th colspan='" . $num_colum . "'></th>";
		echo "</tr>";
		echo "</tfoot>";
		echo "<tbody";
		$counter_colum = 0;
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$counter_colum = $counter_colum + 1;
			echo "<tr>";
			foreach ( $array_column as $value => $key ) {
				if ($key == 'hidden_field') {
					echo "<td style='display: none;'>" . $rows [$value] . "</td>";
				} else if ($key == 'complex') {
					$fields = explode ( "*", $value );
					echo "<td style='display: none;'>" . ($rows [$fields [0]] * $rows [$fields [1]]) . "</td>";
				
				} else if ($key == 'Edit') {
					$fields = explode ( ",", $value );
					$str = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]);
						}else {
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]) . "&";
						}
					}
					echo "<td><a onclick='edit".$datatable_id."(\"".$str."\");' href='javascript:void(0);'><div class='editIcon'></div></a></td>";
				} else if ($key == 'Delete') {
					$fields = explode ( ",", $value );
					if(sizeof ( $fields )==2){
						$str = $fields[1]."(".$rows [$fields [0]].")";
					} else if (sizeof ( $fields )==3){
						$str = $fields[1]."(".$rows [$fields [0]].",".$rows [$fields [2]].")";
					}
					echo "<td><div class='deleteIcon'><input type='hidden' value ='".$str."'></div></td>";
				} else if ($value == 'status') {
					if($rows [$value]=='y' || $rows [$value]=='Y'){
						echo "<td style='background-color:#FFE4C4;font-weight:bold;'> Active </td>";
					} else {
						echo "<td style='background-color:rgb(0, 69, 167);font-weight:bold'> Desactive </td>";
					}
				} else if ($value == 'isboss') {
					if($rows [$value]==1){
						echo "<td style='color:green;font-weight:bold'> BOSS </td>";
					} else {
						echo "<td style='color:red;font-weight:bold'> NOT BOSS </td>";
					}
				} else if ($value == 'order_status' || $value == 'reservation_status') {
					if($rows [$value]=='Y'){
						echo "<td style='background-color:green;font-weight:bold'> Xử lý xong </td>";
					} else {
						echo "<td style='color:red;font-weight:bold;background-color:yellow'> Chưa xong </td>";
					}
				}else if ($value == 'sex_id') {
					if($rows [$value]=='1'){
						echo "<td style='color:green;font-weight:bold'> WOMAN </td>";
					} else {
						echo "<td style='color:red;font-weight:bold'> MAN </td>";
					}
				} else if(sizeof(explode ( ",", $key ))>2) {
					$fields = explode ( ",", $value );
					$fieldskey = explode ( ",", $key );
					$str = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]);
						}else {
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]) . "&";
						}
					}
					echo "<td><a title='<img style=\"max-width:300px; max-height=300px\" class=\"toltipimg\" src=\"".$rows[$fieldskey[2]]."\" /><br>Kho : ".$rows[$fieldskey[3]]."' onclick='show_".$datatable_id."_".$fields [0]."(\"".$str."\");' href='javascript:void(0);' id='".$fieldskey [1].$rows [$fieldskey [1]]."'>".$rows [$fieldskey [1]]."</a></td>";
					
				}	else if(sizeof(explode ( ",", $key ))>1 && sizeof(explode ( ",", $key ))<=2) {
					$fields = explode ( ",", $value );
					$fieldskey = explode ( ",", $key );
					$str = "";
					$title = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]);
							$title = $title . $fields [$i] . ":<strong>" . $rows [$fields [$i]]."</strong>";
						}else {
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]) . "&";
							$title = $title . $fields [$i] . ":<strong>" . $rows [$fields [$i]] . "</strong><br>";
						}						
					}
					echo "<td><a title='".$title."' onclick='show_".$datatable_id."_".$fields [0]."(\"".$str."\");' href='javascript:void(0);' >".$rows [$fieldskey [1]]."</a></td>";
					
				} else if ($value == 'date'){
					echo "<td style='width:120px;'>" . $rows [$value] . "</td>";
				} else if ($value == 'counter_colum'){
					echo "<td>" . $counter_colum . "</td>";
				} else {
					echo "<td>" . $rows [$value] . "</td>";
				}
			}
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		} else {
			echo "<span align='center'>No data has been found!</span>";
		}
		//to apply the delete dialog box
		$this->generateDeleteJs();
	}
	function generateDeleteJs(){
		echo "<script> $(document).ready(function(){
	$('.deleteIcon').click(function(){
		var elem = $(this).closest('.item');
		var elemtxt = $(this).find('input[type=hidden],textarea,select').filter(':hidden:first').val();
		$.confirm({
			'title'		: 'Hãy xác nhận',
			'message'	: 'Bạn có muốn xóa không?',
			'buttons'	: {
				'Có'	: {
					'class'	: 'blue',
					'action': function(){
						eval(elemtxt);
					}
				},
				'Không'	: {
					'class'	: 'gray',
					'action': function(){}	
				}
			}
		});
		
	});
	
});</script>";
	}
function generateJqueryDatatableExport($result, $datatable_id, $array_column) {
		$counter_colum = 0;
		if(mysql_num_rows($result)>0) {
		$num_colum = sizeof ( $array_column );
		// generate header
		echo "<div class='datatableDisplaySum' id='datatableDisplaySum".$datatable_id."'></div>";
		echo "<table id='" . datatable_prefix . $datatable_id . "' class='display' cellspacing='0' class='order-column' width='100%'>";
		echo "<thead>";
		echo "<tr>";
		
		foreach ( $array_column as $value => $key ) {
			if ($key == 'hidden_field' || $key == 'complex') { 
				echo "<th style='display: none;'>" . $key . "</th>";
			} else if(sizeof(explode ( ",", $key ))>1){
				$fieldskey = explode ( ",", $key );
				echo "<th>" . $fieldskey[0] . "</th>";
			} else if($key == 'Delete') {
				echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
			} else {
				echo "<th>" . $key . "</th>";
			}
		}
		
		echo "</tr>";
		echo "</thead>";
		echo "<tfoot>";
		echo "<tr>";
		echo "<th colspan='" . $num_colum . "'></th>";
		echo "</tr>";
		echo "</tfoot>";
		echo "<tbody";
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$counter_colum = $counter_colum + 1;
			echo "<tr>";
			foreach ( $array_column as $value => $key ) {
				if ($key == 'hidden_field') {
					echo "<td style='display: none;'>" . $rows [$value] . "</td>";
				} else if ($key == 'complex') {
					$fields = explode ( "*", $value );
					echo "<td style='display: none;'>" . ($rows [$fields [0]] * $rows [$fields [1]]) . "</td>";
				
				} else if ($key == 'Edit') {
					$fields = explode ( ",", $value );
					$str = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]);
						}else {
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]) . "&";
						}
					}
					echo "<td><a onclick='edit".$datatable_id."(\"".$str."\");' href='javascript:void(0);'><div class='editIcon'></div></a></td>";
				}  else if ($key == 'Delete') {
					$fields = explode ( ",", $value );
					if(sizeof ( $fields )==2){
						$str = $fields[1]."(".$rows [$fields [0]].")";
					} else if (sizeof ( $fields )==3){
						$str = $fields[1]."(".$rows [$fields [0]].",\"".$rows [$fields [2]]."\")";
					}
					echo "<td><div class='deleteIcon'><input type='hidden' value ='".$str."'></div></td>";
				} else if ($value == 'status') {
					if($rows [$value]=='y' || $rows [$value]=='Y'){
						echo "<td style='color:green;font-weight:bold'> Active </td>";
					} else {
						echo "<td style='color:red;font-weight:bold'> Desactive </td>";
					}
				} else if ($value == 'order_status' || $value == 'reservation_status') {
					if($rows [$value]=='Y'){
						echo "<td style='background-color:green;font-weight:bold'> Xử lý xong </td>";
					} else {
						echo "<td style='color:red;font-weight:bold;background-color:yellow'> Chưa xong </td>";
					}
				}else if ($value == 'sex_id') {
					if($rows [$value]=='1'){
						echo "<td style='color:green;font-weight:bold'> WOMAN </td>";
					} else {
						echo "<td style='color:red;font-weight:bold'> MAN </td>";
					}
				} else if(sizeof(explode ( ",", $key ))>2) {
					$fields = explode ( ",", $value );
					$fieldskey = explode ( ",", $key );
					$str = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]);
						}else {
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]) . "&";
						}
					}
					echo "<td><a title='<img style=\"max-width:300px; max-height=300px\" class=\"toltipimg\" src=\"".$rows[$fieldskey[2]]."\" /><br>Kho:".$rows[$fieldskey[3]]."' onclick='show_".$datatable_id."_".$fields [0]."(\"".$str."\");' href='javascript:void(0);' id='".$fieldskey [1].$rows [$fieldskey [1]]."'>".$rows [$fieldskey [1]]."</a></td>";
					
				}	else if(sizeof(explode ( ",", $key ))>1 && sizeof(explode ( ",", $key ))<=2) {
					$fields = explode ( ",", $value );
					$fieldskey = explode ( ",", $key );
					$str = "";
					$title = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]);
							$title = $title . $fields [$i] . ":<strong>" . $rows [$fields [$i]]."</strong>";
						}else {
							$str = $str . $fields [$i] . "=" . urlencode($rows [$fields [$i]]) . "&";
							$title = $title . $fields [$i] . ":<strong>" . $rows [$fields [$i]] . "</strong><br>";
						}						
					}
					echo "<td><a title='".$title."' onclick='show_".$datatable_id."_".$fields [0]."(\"".$str."\");' href='javascript:void(0);' >".$rows [$fieldskey [1]]."</a></td>";
					
				} else if ($value == 'date'){
					echo "<td style='width:120px;'>" . $rows [$value] . "</td>";
				} else if ($value == 'counter_colum'){
					echo "<td style='width:15px;'>" . $counter_colum . "</td>";
				}else if ($value == 'checkbox'){
					echo "<td><input type='checkbox' onclick='toggleDivCheckBox(\"quantity_return_".$counter_colum
					."\");checkTheReturnCheckBox();' id='checkbox_return_".$counter_colum."'/></td>";
				}else if ($value == 'qtyre'){
					echo "<td><input type='number' style='width:30px;height:13px;display:none;margin-top:1px;' value='"
					.$rows ['quantity']."' id='quantity_return_".$counter_colum."' onclick='changeReturnQty(".$counter_colum.")'  onkeyup='changeReturnQty(".$counter_colum.")'>
					<input type='hidden' value='".$rows ['quantity']."' id='quantity_re_".$counter_colum."'>
					<input type='hidden' value='".$rows ['export_price']."' id='export_price_".$counter_colum."'>
					<input type='hidden' value='".$rows ['id']."' id='export_facture_product_id_".$counter_colum."'></td>";
				} else {
					echo "<td>" . $rows [$value] . "</td>";
				}
			}
			echo "</tr>";
		}
		
		echo "</tbody>";
		echo "</table>";
		} else {
			echo "<span align='center'>No data has been found!</span>";
		}
		echo "<input type='hidden' value='".$counter_colum."' id='numberlineexport'/>";
		$this->generateDeleteJs();
	}
	function RedirectToURL($url) {
		header ( "Location: $url" );
		exit ();
	}
function displayCodeProduct($code) {
	if ($code < 10) {
		return '000' . strval ( $code );
	} else if ($code < 100 && $code >= 10) {
		return '00' . strval ( $code );
	} else if ($code < 1000 && $code >= 100) {
		return '0' . strval ( $code );
	} else {
		return strval ( $code );
	}
}

function getNextFactureCode($maxFactureCode) {
	$str1 = substr ( $maxFactureCode, 0, 8 );
	$str2 = substr ( $maxFactureCode, 9, 3 );
	if ($str1 != $this->getCurrentDateYYYYMMDD ())
		return $this->getCurrentDateYYYYMMDD () . "_001";
	else
		return $str1 . "_" . $this->displayTowDigit ( $str2 + 1 );
}
function getCurrentDateYYYYMMDD() {
	return date ( 'Ymd' );
}

function displayTowDigit($str) {
	if ($str < 10) {
		return "00" . $str;
	} else if ($str < 100) {
		return "0" . $str;
	}
	return $str;
}
function getFullDateTime() {
	$date = date ( 'Y-m-d H:i:s' );
	return $date;
}
function getDateBeforeSomeDays($nbrDays) {
	return date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')- $nbrDays, date('Y')));
}
function getDateTimeBeforeSomeDaysExport() {
	return date("Y-m-d", mktime(0, 0, 0, date('m'), date('d')- $_SESSION['default_nbr_days_load_export'], date('Y'))).date ( ' H:i:s' );
}
function getDateBeforeDays() {
	return date("Y-m-d", mktime(0, 0, 0, date('m') , date('d') - 10 , date('Y')));
}
function printDropDownListFromTableSelected($table,$fieldname,$selectedId) {
	// get the query
	$selected = "";
	$sql = "select * from " . $table ;	
	if($table=="user"){
		$sql = $sql . " where status ='y'";
	}
	echo "<select name='" . $fieldname . "' id='id_" . $fieldname . "' style='width:110px;height:22px;'>";
	$sql = $sql . " order by name asc";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	while ( $rows = mysql_fetch_array ( $result ) ) {
		if($selected==""){
			$selected = ($rows['id']==$selectedId)?"selected='selected'":"";
			echo "<option value='" . $rows ['id'] . "' ".$selected.">" . $rows ['name'] . "</option>";
		} else{
			echo "<option value='" . $rows ['id'] . "'>" . $rows ['name'] . "</option>";
		}
	}
	echo "</select>";
}
function printDropDownListFromTableSelectedOneLine($table,$fieldname,$selectedId) {
	// get the query
	$selected = "";
	$sql = "select * from " . $table ;	
	if($table=="user"){
		$sql = $sql . " where status ='y' and id = ".$selectedId ;
	}
	$sql = $sql . " where id = ".$selectedId;
	echo "<select name='" . $fieldname . "' id='id_" . $fieldname . "' style='width:110px;height:22px;'>";
	$sql = $sql . " order by name asc";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	while ( $rows = mysql_fetch_array ( $result ) ) {
		if($selected==""){
			$selected = ($rows['id']==$selectedId)?"selected='selected'":"";
			echo "<option value='" . $rows ['id'] . "' ".$selected.">" . $rows ['name'] . "</option>";
		} else{
			echo "<option value='" . $rows ['id'] . "'>" . $rows ['name'] . "</option>";
		}
	}
	echo "</select>";
}
function printDropDownListFromTable($table,$fieldname) {
	// get the query
	$sql = "select * from " . $table ;	
	if($table=="user"){
		$sql = $sql . " where status ='y'";
	}
	echo "<select name='" . $fieldname . "' id='id_" . $fieldname . "' style='width:110px;height:22px;' onchange='displayChartNow();'>";
	echo "<option value=''>...Please select...</option>";
	$sql = $sql . " order by name asc";
	$result = mysql_query ( $sql ) or die ( mysql_error () );
	while ( $rows = mysql_fetch_array ( $result ) ) {
		echo "<option value='" . $rows ['id'] . "'>" . $rows ['name'] . "</option>";
	}
	echo "</select>";
}
function isAdmin() {
	return $_SESSION ['is_admin_user'];
}
function displayByAdmin() {
	echo ($this->isAdmin()?'':'style="display:none;"');
}
function isMobile(){
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
		return true;
	} else {
		return false;
	} 
}

	function unicode_str_filter ($str){
		
		$lowlst = "á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|đ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|í|ì|ỉ|ĩ|ị|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|ý|ỳ|ỷ|ỹ|ỵ";
		$highlst = "Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Đ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Í|Ì|Ỉ|Ĩ|Ị|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Ý|Ỳ|Ỷ|Ỹ|Ỵ";
		
		$paramsArrayLow = array();
		$paramsArrayHei = array();
		
		$paramsArrayLow = explode('|',$lowlst);
		$paramsArrayHei = explode('|',$highlst);
		$size = sizeof($paramsArrayLow);
		for($j=0; $j<strlen($str); $j++) {
			for($i=0;$i<$size;$i++) {
				if($str[$j] != $paramsArrayLow[$i] && $str[$j] != $paramsArrayHei[$i])
					$str = str_replace($str[$j],strtoupper($str[$j]),$str);
				else 
					$str = str_replace($paramsArrayLow[$i],$paramsArrayHei[$i],$str);
			}
		}
		return $str;
	}
	function getAmountResult($query) {
	$result = mysql_query ( $query ) or die ( mysql_error () );
	$rows = mysql_fetch_assoc ( $result );
	if ($rows ['amount'])
		return $rows ['amount'];
	else
		return 0;
}
	function printChartType(){
		echo "<select id='charttype' style='width: 145px;'
			onchange='displayChartNow();'>
			<option value='spline'>spline</option>
			<option value='line'>line</option>
			<option value='area'>area</option>
			<option value='column'>column</option>
		</select>";	
	}
	function printChartTime(){
		echo "<select id='charttime' style='width: 145px;'
			onchange='displaychartByTime();'>
			<option value='%Y-%m-%d' selected='selected'>By days</option>
			<option value='%Y-%m'>By month</option>
			<option value='%Y'>By Year</option>
		</select>";
	}
}
?>