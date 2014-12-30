<?php
class CommonService {
	function generateJSDatatableSimple($datatable_id,$ordercolumn,$ordertype){
		echo "<script>";
		echo "$(document).ready(function() { $('#".datatable_prefix.$datatable_id."').dataTable({'order': [[ ".$ordercolumn.", '".$ordertype."' ]]});});";
		echo "</script>";
	}
	function generateJqueryDatatable($result, $datatable_id, $array_column) {
		
		$num_colum = sizeof ( $array_column );
		// generate header
		echo "<table id='" . datatable_prefix.$datatable_id . "' class='display' cellspacing='0' class='order-column' width='100%'>";
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
					echo "<td style='display: none;'>" . $rows[$value] . "</td>";
				} else if ($key == 'complex') {
					$fields = explode("*", $value);
					echo "<td style='display: none;'>" . ($rows[$fields[0]] * $rows[$fields[1]]). "</td>";
				} else if ($key == 'Edit') {
					$fields = explode(",", $value);
					echo "<td onclick='alert(\"test\");'><a>" . $key .$rows[$fields[0]] .",". $rows[$fields[1]]. "</a></td>";
				} else if ($key == 'Delete') {
					echo "<td onclick='delete".$datatable_id."(".$rows[$value].");'><a>" . $key .$rows[$value]. "</a></td>";
				} else {
					echo "<td>" . $rows[$value] . "</td>";
				}
			}
			echo "</tr>";
		}
		// generate footer
		echo "</tbody>";
		echo "</table>";
	}
}
?>