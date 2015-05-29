<h4>SEARCH CUSTOMER FORM</h4>
<hr>
<table width="100%" class="edittable">
	<tr>
		<td align="right"><label for="search_customer_name">Customer name :</label></td>
		<td><input class="search_customer_name" id="search_customer_name"></td>
		<td align="right"><label for="search_customer_tel">Customer tel :</label></td>
		<td><input id="search_customer_tel"></td>
	</tr>
	<tr>
		<td align="right"><label for="create_date_from">Create date :</label></td>
		<td><input class="datefield" id="create_date_from"> <input
			class="datefield" id="create_date_to"></td>
		<td align="right"><label for="update_date_from">Update date :</label></td>
		<td><input class="datefield" id="update_date_from"> <input
			class="datefield" id="update_date_to"></td>
	</tr>
	<tr>
		<td align="right"><label for="search_description">Description :</label></td>
		<td colspan="3">
			<textarea rows="3" cols="50" id="search_description"></textarea>
		</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2" align="center"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" name="search_btn"
			class="menu_btn_sub" value="SEARCH"
			onclick="javascript:listCustomer('true');"></td>
		<td></td>
	</tr>
</table>