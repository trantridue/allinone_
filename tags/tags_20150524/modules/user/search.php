<form>
<table width="100%" class="searchcriteriatable">
	<tr>
		<td style="text-align: right;">User Name :</td>
		<td><input id="user_username"></td>
		<td style="text-align: right;">Name :</td>
		<td><input id="user_name"></td>
	</tr>
	<tr>
		<td style="text-align: right;">Email :</td>
		<td><input id="user_mail"></td>
		<td style="text-align: right;">Tel :</td>
		<td><input id="user_tel"></td>
	</tr>
	<tr>
		<td style="text-align: right;">Status :</td>
		<td><div onclick="changeStatusUser();" class="status_on" name="user_status" id="user_status"></div></td>
		<td style="text-align: right;">Description :</td>
		<td><input id="user_description"><input type="button" name="search_btn"
		class="menu_btn_sub" value="Search" onclick="javascript:listUser();">
	<input type="reset" value="Reset" class="menu_btn_sub" /></td>
	</tr>
</table>
<input type="hidden" id="user_status_hidden" name="user_status_hidden" value="y">
</form>