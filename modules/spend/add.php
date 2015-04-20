<form>
<h3>ADD SPEND</h3>
<table class="addcriteriatable">
	<tr>
		<td align="right">Amount :</td>
		<td><input type="text" size="4" id="add_amount" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td align="right">Date :</td>
		<td><input type="text" id="add_date" class="datefield" /> </td>
		<td align="right">Description :</td>
		<td colspan="3"><textarea rows="3" cols="40"></textarea></td>
	</tr>
	<tr>
		<td align="right">User :</td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user',1 );
		?></td>
		<td align="right">Spend Category :</td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category',1 );
		?></td>
		<td align="right">Spend For :</td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for',1 );
		?></td>
		<td align="right">Type :</td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type',1 );
		?></td>
	</tr>

	<tr>
		<td></td>
		<td align="left" colspan="7"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" value="ADD"
			class="menu_btn_sub" /><input type="button" value="SEARCH FORM"
			class="menu_btn_sub" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>