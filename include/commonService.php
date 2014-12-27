<?php
class CommonService {
	function generateJqueryDatatable($result, $userdatatable, $array_column) {
		echo "<script>";
		echo "$(document).ready(function() { $('#table_list_user').dataTable();	});";
		echo "</script>";
		
		
		$num_colum = sizeof ( $array_column );
		// generate header
		echo "<table id='" . $userdatatable . "' class='display' cellspacing='0' class='order-column' width='100%'>";
		echo "<thead>";
		echo "<tr>";
		
		foreach ( $array_column as $value => $key ) {
			if ($key == 'hidden_field') {
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