<form action="?module=customer&submenu=addcustomer" method="post" onsubmit="return validateEditCustomerForm();">
	<table width="100%" class="edittable">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input autocomplete="off" type="text" name="customer_name" id="customer_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
			<td style="text-align: right;"></td>
			<td></td>
		</tr>
		<tr>
			<td style="text-align: right;">Tel :</td>
			<td><input autocomplete="off" type="text" name="customer_tel" id="customer_tel"
				value="<?php echo $_REQUEST['tel'];?>" /></td>
			<td style="text-align: right;">Description :</td>
			<td><input autocomplete="off" type="text" name="customer_description" id="customer_description"
				value="<?php echo $_REQUEST['description'];?>" /></td>
		</tr>
		
		<tr>
			<td style="text-align: right;" colspan="4"><input type="submit"
				value="Add"></td>
		</tr>

	</table>
</form>