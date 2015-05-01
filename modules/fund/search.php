<form id="fundSearchFormId">
<h4>SEARCH FUND</h4>
<table class="searchcriteriatable">
	<tr>
		<td align="right">FUND : </td>
		<td><?php
		$commonService->printDropDownListFromTable( 'fund', 'add_fund');
		?>
		<input type="text" class="datefield" id="add_date" value=<?php echo date('Y-m-d');?> />
		</td>
	</tr>
	<tr>
		<td align="right">User :</td>
		<td><?php
		$commonService->printDropDownListFromTable( 'user', 'add_user');
		?></td>
	</tr>
	<tr>
		<td align="right">Amount :</td>
		<td>
		<input type="text" size="4" maxlength="12" autocomplete="off" onkeypress="validateFloat(event)" id="add_amount">
		<input type="text" size="3" maxlength="8" autocomplete="off" onkeypress="validateFloat(event)" id="add_ratio" value="1">
		</td>
	</tr>
	<tr>
		<td align="right">Description :</td>
		<td><textarea rows="3" cols="20" id="add_description"></textarea> </td>
	</tr>
	<tr>
		<td align="right"></td>
		<td>
			<input type="reset" value="RESET" class="menu_btn_sub">
			<input type="button" value="SEARCH" class="menu_btn_sub" onclick="listHistoFund();">
			<input type="button" value="ADD FORM FORM" class="menu_btn_sub" onclick="$('#searchFund').hide();$('#addFund').show();">
		</td>
	</tr>
</table>
</form>
