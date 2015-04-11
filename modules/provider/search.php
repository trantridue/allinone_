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
		<td></td>
		<td colspan="7"><input type="button" name="search_btn"
			class="menu_btn_sub" value="SEARCH"
			onclick="javascript:listProvider();"> <input type="button"
			value="ADD PROVIDER"
			onclick="document.location.href='login-home.php?module=provider&submenu=add'"
			class="menu_btn_sub" /><input type="reset" value="RESET"
			class="menu_btn_sub" /></td>
	</tr>

</table>
</form>