<?php
class CommonService {
	function generateJSDatatableSimple($datatable_id, $ordercolumn, $ordertype) {
		echo "<script>";
		echo "$(document).ready(function() { $('#" . datatable_prefix . $datatable_id . "').dataTable({'order': [[ " . $ordercolumn . ", '" . $ordertype . "' ]]});});";
		echo "</script>";
	}
	function generateJSDatatableComplex($result, $datatable_id, $ordercolumn, $ordertype, $array_total) {
		if(mysql_num_rows($result)>0) {
		echo "<script>  ";
		echo "$(document).ready(  ";
		echo "function() {  ";
			echo "$('#" . datatable_prefix . $datatable_id . "').dataTable(  ";
					echo "{ ";
						echo "'destroy': true, ";
						echo "'order': [[ " . $ordercolumn . ", '" . $ordertype . "' ]], ";
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
								echo "all".$value." += data[i][".$value."] * 1; ";
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
							echo "$(api.column(1).footer()).html('<span>Tổng:'+allContent + '</span>' +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + currentContent );";
							echo "$('#datatableDisplaySum".$datatable_id."').html('<span>Tổng:'+allContent + '</span>' +'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + currentContent );";
					echo "}});";
		echo "}); ";
echo "</script> ";
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
			if ($key == 'hidden_field' || $key == 'complex' || $key == 'remain') {
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
		
// 		if(count($rows)>0) {
		// generate content
		while ( $rows = mysql_fetch_array ( $result ) ) {
			echo "<tr>";
			foreach ( $array_column as $value => $key ) {
				if ($key == 'hidden_field') {
					echo "<td style='display: none;'>" . $rows [$value] . "</td>";
				} else if ($key == 'complex') {
					$fields = explode ( "*", $value );
					echo "<td style='display: none;'>" . ($rows [$fields [0]] * $rows [$fields [1]]) . "</td>";
				}else if ($key == 'remain') {
					$fields = explode ( "-", $value );
					echo "<td style='display: none;'>" . ($rows [$fields [0]] - $rows [$fields [1]]) . "</td>";
				} else if ($key == 'Edit') {
					$fields = explode ( ",", $value );
					$str = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . $rows [$fields [$i]];
						}else {
							$str = $str . $fields [$i] . "=" . $rows [$fields [$i]] . "&";
						}
					}
					echo "<td><a onclick='edit".$datatable_id."(\"".$str."\");' href='javascript:void(0);'><div class='editIcon'></div></a></td>";
				} else if ($key == 'Delete') {
					echo "<td><a onclick='delete" . $datatable_id . "(" . $rows [$value] . ");' href='javascript:void(0);'><div class='deleteIcon'></div></a></td>";
				} else if ($value == 'status') {
					if($rows [$value]=='y'){
						echo "<td style='color:green;font-weight:bold'> Active </td>";
					} else {
						echo "<td style='color:red;font-weight:bold'> Desactive </td>";
					}
				}else if ($value == 'sex_id') {
					if($rows [$value]=='1'){
						echo "<td style='color:green;font-weight:bold'> WOMAN </td>";
					} else {
						echo "<td style='color:red;font-weight:bold'> MAN </td>";
					}
				} else if(sizeof(explode ( ",", $key ))>1) {
					$fields = explode ( ",", $value );
					$fieldskey = explode ( ",", $key );
					$str = "";
					for($i = 0; $i < sizeof ( $fields ); $i ++) {
						if($i==sizeof ( $fields )-1){
							$str = $str . $fields [$i] . "=" . $rows [$fields [$i]];
						}else {
							$str = $str . $fields [$i] . "=" . $rows [$fields [$i]] . "&";
						}
					}
					echo "<script>";
					echo "$(document).ready(function() {";
					echo "$('#".$fieldskey [1].$rows [$fieldskey [1]]."').tooltip({ content: '<img src=\"".$rows['link']."\" />' });";
					echo "});";
					echo "</script>";
					echo "<td><a title='' onclick='show_".$datatable_id."_".$fields [0]."(\"".$str."\");' href='javascript:void(0);' id='".$fieldskey [1].$rows [$fieldskey [1]]."'>".$rows [$fieldskey [1]]."</a></td>";
					
				}else {
					echo "<td>" . $rows [$value] . "</td>";
				}
			}
			echo "</tr>";
		}
// 		}
		// generate footer
		echo "</tbody>";
		echo "</table>";
		} else {
			echo "No data found";
		}
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
}
?>