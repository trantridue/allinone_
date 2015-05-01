<form id="fundSearchFormId">
<h4>SEARCH FUND</h4>
<table class="searchcriteriatable">
	<tr>
		<td align="right">FUND : </td>
		<td><?php
		$commonService->printDropDownListFromTable( 'fund', 'search_fund');
		?>
		</td>
		<td align="right">User :</td>
		<td><?php
		$commonService->printDropDownListFromTable( 'user', 'search_user');
		?></td>
	</tr>
	<tr>
		<td align="right">Amount :</td>
		<td>
		<input type="text" size="4" maxlength="12" autocomplete="off" onkeypress="validateFloat(event)" id="search_amount_from">
		<input type="text" size="4" maxlength="12" autocomplete="off" onkeypress="validateFloat(event)" id="search_amount_to">
		</td>
		<td align="right">Date :</td>
		<td>
		<input type="text" class="datefield" id="search_date_from" value=<?php echo date('Y-m-01');?> />
		<input type="text" class="datefield" id="search_date_to" value=<?php echo date('Y-m-t');?> />
		</td>
	</tr>
	<tr>
		<td align="right">Description :</td>
		<td colspan="3"><textarea rows="3" cols="20" id="search_description"></textarea> </td>
	</tr>
	<tr>
		<td align="right"></td>
		<td colspan="3">
			<input type="reset" value="RESET" class="menu_btn_sub">
			<input type="button" value="SEARCH" class="menu_btn_sub" onclick="listHistoFund('true');">
			<input type="button" value="ADD FORM FORM" class="menu_btn_sub" onclick="$('#searchFund').hide();$('#addFund').show();">
		</td>
	</tr>
</table>
</form>
