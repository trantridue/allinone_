<h4>SEARCH CUSTOMER FORM</h4>
<hr>
<form id='search_customer_criteria_form'>
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
		<td align="right" rowspan="2"><label for="search_description">Description :</label></td>
		<td rowspan="2">
			<textarea rows="3" cols="30" id="search_description"></textarea>
		</td>
		<td align="right"><label for="total_amount_from">Total amount :</label></td>
		<td>
			<input id="total_amount_from" type="number" style="width:80px;"/>
			<input id="total_amount_to" type="number" style="width:80px;"/>
		</td>
	</tr>
	<tr>
		<td align="right"><label for="efficiency_from">Efficiency :</label></td>
		<td>
			<input id="efficiency_from" type="number" style="width:80px;"/>
			<input id="efficiency_to" type="number" style="width:80px;"/>
		</td>
	</tr>
	<tr>
		<td></td>
		<td colspan="2" align="center"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" name="search_btn"
			class="menu_btn_sub" value="SEARCH"
			onclick="javascript:listCustomer('search_customer_criteria_form');"><input type="button" 
			class="menu_btn_sub" value="EXPORT CSV"
			onclick="exportCustomerCsv();"></td>
		<td></td>
	</tr>
</table>
</form>