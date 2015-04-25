<form>
<h3>SEARCH INOUT</h3>
<table class="searchcriteriatable">
	<tr>
		<td align="right">Amount :</td>
		<td><input type="text" size="4" id="search_amount_from" maxlength="8" onkeypress="validateNum(event);"/>
		<input type="text" size="4" id="search_amount_to" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td align="right">Date :</td>
		<td><input type="text" id="search_date_from" class="datefield" /> <input
			type="text" id="search_date_to" class="datefield" /></td>
		<td align="right">Description :</td>
		<td colspan="3"><textarea rows="3" cols="40" id="search_description"></textarea></td>
	</tr>
	<tr>
		<td align="right">User :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'user', 'search_user' );
		?></td>
		<td align="right">Inout shop :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'shop', 'search_shop' );
		?></td>
		<td align="right">Inout Type :</td>
		<td><?php
		$commonService->printDropDownListFromTable ( 'inout_type', 'search_type' );
		?></td>
		<td align="right"></td>
		<td></td>
	</tr>

	<tr>
		<td></td>
		<td align="left" colspan="7"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" value="SEARCH" onclick="listInOut('true');"
			class="menu_btn_sub" /><input type="button" value="ADD FORM"
			class="menu_btn_sub" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>