<h3>SEARCH PROVIDER</h3>
<form>
<table class="searchcriteriatable">
	<tr>
		<td align="right">Name :</td>
		<td><input id="provider_name"></td>
		<td align="right">Tel :</td>
		<td><input id="provider_tel"></td>
		<td align="right">Address :</td>
		<td><input id="provider_address"></td>
		<td align="right">Description :</td>
		<td><input id="provider_description"></td>
	</tr>
	<tr>
		<td align="right">Total :</td>
		<td><input id="total_from" size="6" maxlength="8" onkeypress="validateNum(event);">
		<input id="total_to" size="6" maxlength="8" onkeypress="validateNum(event);"></td>
		<td align="right">Paid :</td>
		<td><input id="paid_from" size="6" maxlength="8" onkeypress="validateNum(event);">
		<input id="paid_to" size="6" maxlength="8" onkeypress="validateNum(event);"></td>
		<td align="right">Remain :</td>
		<td colspan="3"><input id="remain_from" size="6" maxlength="8" onkeypress="validateNum(event);">
		<input id="remain_to" size="6" maxlength="8" onkeypress="validateNum(event);"></td>
	</tr>
	<tr>
		<td></td>
		<td colspan="7"><input type="button" name="search_btn"
			class="menu_btn_sub" value="SEARCH"
			onclick="javascript:listProvider();$('#paidArea').hide();"> <input type="button"
			value="ADD PROVIDER"
			onclick="document.location.href='login-home.php?module=provider&submenu=add';$('#paidArea').hide();"
			class="menu_btn_sub" /><input type="reset" value="RESET" onclick="$('#paidArea').hide();"
			class="menu_btn_sub" /></td>
	</tr>

</table>
</form>