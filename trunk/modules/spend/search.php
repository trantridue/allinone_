<form>
<table class="searchcriteriatable">
	<tr>
		<td align="right">Amount :</td>
		<td><input type="text" size="4" id="search_amount_from" maxlength="8" />
		<input type="text" size="4" id="search_amount_to" maxlength="8" /></td>
		<td align="right">Date :</td>
		<td><input type="text" id="search_date_from" class="datefield" /> <input
			type="text" id="search_date_to" class="datefield" /></td>
		<td align="right">Description :</td>
		<td colspan="3"><textarea rows="3" cols="40"></textarea></td>
	</tr>
	<tr>
		<td align="right">User :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'user', 'search_user' );
		?></td>
		<td align="right">Spend Category :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'spend_category', 'search_category' );
		?></td>
		<td align="right">Spend For :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'spend_for', 'search_for' );
		?></td>
		<td align="right">Type :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'spend_type', 'search_type' );
		?></td>
	</tr>

	<tr>
		<td></td>
		<td align="left" colspan="7"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" value="SEARCH"
			class="menu_btn_sub" /></td>
	</tr>
</table>
</form>