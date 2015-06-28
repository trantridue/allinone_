<form>
<h3>SEARCH SPEND</h3>
<table class="searchcriteriatable">
	<tr>
		<td align="right">Amount :</td>
		<td><input type="number" class="number50" id="search_amount_from" />
		<input type="number" class="number50" id="search_amount_to" /></td>
		<td align="right">Date :</td>
		<td><input type="text" id="search_date_from" class="datefield" value="<?php echo date('Y-m-01');?>"/> <input
			type="text" id="search_date_to" class="datefield" /></td>
		<td align="right">Description :</td>
		<td colspan="3"><textarea rows="3" cols="40" id="search_description"></textarea></td>
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
			class="menu_btn_sub" /> <input type="button" value="SEARCH" onclick="listSpend('true');"
			class="menu_btn_sub" /><input type="button" value="ADD FORM"
			class="menu_btn_sub" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>