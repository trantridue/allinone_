<form action="?module=customer&submenu=addcustomer" method="post" onsubmit="return validateEditCustomerForm();">
	<table width="100%" class="edittable">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input autocomplete="off" type="text" name="customer_name" id="customer_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
			<td style="text-align: right;" rowspan="2">Description :</td>
			<td  rowspan="2"><textarea name="customer_description" id="customer_description" cols="40" rows="3">
				<?php echo $_REQUEST['description'];?> </textarea></td>
		</tr>
		<tr>
			<td style="text-align: right;">Tel :</td>
			<td><input autocomplete="off" type="text" name="customer_tel" id="customer_tel" maxlength="12" onkeypress="validateNum(event);"
				value="<?php echo $_REQUEST['tel'];?>" /></td>
			
		</tr>
		
		<tr>
			<td style="text-align: right;" ></td>
			<td colspan="3">
			<input type="submit" class="menu_btn_sub"
				value="ADD">
			</td>
		</tr>

	</table>
</form>