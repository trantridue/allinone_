<?php
class CommonService {
	function generateJqueryDatatable($result, $userdatatable, $array_column) {
		$num_colum = sizeof ( $array_column );
		// generate header
		echo "<table id='" . $userdatatable . "' class='display' cellspacing='0' border='0' width='100%'>";
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
		echo "<tr>
		<td  style='display: none;'>Edinburgh 8</td>
		<td>8</td>
		<td style='display: none;'>8</td>
		<td>2008/04/25</td>
		<td>64</td>
		</tr>";
		echo "<tr>
		<td  style='display: none;'>Edinburgh 8</td>
		<td>8</td>
		<td style='display: none;'>8</td>
		<td>2008/04/25</td>
		<td>62</td>
		</tr>";
		// generate content
// 		while ( $rows = mysql_fetch_array ( $result ) ) {

// 		}
		// generate footer
		echo "</tbody>";
		echo "</table>";
	}
}
?>