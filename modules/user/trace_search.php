<form id="seach_absent_criteria">
<table>
	<tr>
		<td style="text-align: right; font-weight: bold;">Request from :</td>
		<td><input type="text" class="datetimefield" id="request_from"> TO <input
			type="text" class="datetimefield" id="request_to"></td>
		<td style="text-align: right; font-weight: bold;">NBR DAYS :</td>
		<td><input type="number" class="number50" id="nbr_days_from"> TO <input
			type="number" class="number50" id="nbr_days_to"></td>
		<td style="text-align: right; font-weight: bold;">Employee :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'user', 'list_user_search' );
		?></td>
	</tr>
	<tr>
		<td style="text-align: right; font-weight: bold;">Start Absent from :</td>
		<td><input type="text" class="datefield" id="start_absent_from"> TO <input
			type="text" class="datefield" id="start_absent_to"></td>
		<td style="text-align: right; font-weight: bold;">End Absent from :</td>
		<td><input type="text" class="datefield" id="end_absent_from"> TO <input
			type="text" class="datefield" id="end_absent_to"></td>
		<td style="text-align: right; font-weight: bold;">Description :</td>
		<td><input type="text" style="width: 100px;" id="absent_description"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="button"
	onclick="toggleDiv('trace_input');toggleDiv('trace_search');"
	value="GO TO ADD" class="menu_btn_sub"></input></td>
	<td colspan="4"><input type="button" value="SEARCH" class="menu_btn_sub" onclick="searchAbsent('seach_absent_criteria');"></td>
	</tr>
</table>
</form>