<?php
class CommonService {
	function generateJSDatatableSimple($datatable_id, $ordercolumn, $ordertype) {
		echo "<script>";
		echo "$(document).ready(function() { $('#" . datatable_prefix . $datatable_id . "').dataTable({'order': [[ " . $ordercolumn . ", '" . $ordertype . "' ]]});});";
		echo "</script>";
	}
	function generateJSDatatableComplex($datatable_id, $ordercolumn, $ordertype) {
		echo "<script>";
		echo "$(document).ready(";
		echo "function() {";
		echo "$('#table_list_user').dataTable(";
		echo "{";
		echo "'order': [[ 0, 'asc' ]],";
		echo "'footerCallback' : function(row, data, start, end,";
		echo "display) {";
		echo "var api = this.api(), data;";
		echo "var intVal = function(i) {";
		echo "return typeof i === 'string' ? i.replace(";
		echo "/[\$,]/g, '') * 1";
		echo ": typeof i === 'number' ? i : 0;";
		echo "};";
		echo "var TotalMarks = 0;";
		echo "for (var i = 0; i < data.length; i++) {";
		echo "TotalMarks += data[i][11] * 1;";
		echo "}";
		echo "var pageTotal = api.column(11, {";
		echo "page : 'current'";
		echo "}).data().reduce(function(a, b) {";
		echo "return intVal(a) + intVal(b);";
		echo "});";
		echo "$(api.column(1).footer()).html(";
		echo "'Total :<strong>' + TotalMarks + '</strong> and Current page:<strong>' + pageTotal + '</strong>');";
		echo "}";
		echo "});";
		echo "});";
		echo "</script>";
	}
	function generateJqueryDatatable($result, $datatable_id, $array_column) {
		$num_colum = sizeof ( $array_column );
		// generate header
		echo "<table id='" . datatable_prefix . $datatable_id . "' class='display' cellspacing='0' class='order-column' width='100%'>";
		echo "<thead>";
		echo "<tr>";
		
		foreach ( $array_column as $value => $key ) {
			if ($key == 'hidden_field' || $key == 'complex') {
				echo "<th style='display: none;'>" . $key . "</th>";
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
		
		// generate content
		while ( $rows = mysql_fetch_array ( $result ) ) {
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
				} else {
					echo "<td>" . $rows [$value] . "</td>";
				}
			}
			echo "</tr>";
		}
		// generate footer
		echo "</tbody>";
		echo "</table>";
	}
	function RedirectToURL($url) {
		header ( "Location: $url" );
		exit ();
	}
	function dropDownList($table, $fieldname) {
		
	}
}
?>