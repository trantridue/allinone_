<form id="fundAddFormId">
<h4>ADD FUND</h4>
<table class="addcriteriatable">
	<tr>
		<td align="right">FUND : </td>
		<td>
		<input type="hidden" id="id_add_fund"/>
		<input type="text" id="fund_id_txt" size="11" onkeyup="resetHiddenFundId();">
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
		<td><textarea rows="3" cols="40" id="add_description"></textarea> </td>
	</tr>
	<tr>
		<td align="right"></td>
		<td>
			<input type="button" value="SAVE" class="menu_btn_sub" onclick="addFund();">
			<input type="reset" value="RESET" class="menu_btn_sub">
			<input type="button" value="SEARCH FORM" class="menu_btn_sub" onclick="$('#searchFund').show();$('#addFund').hide();">
		</td>
	</tr>
</table>
</form>
