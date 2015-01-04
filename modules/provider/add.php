<form action="?module=provider&submenu=addprovider" method="post" onsubmit="return validateEditProviderForm();">
	<table width="100%" class="edittable">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input autocomplete="off" type="text" name="provider_name" id="provider_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
			<td style="text-align: right;">Address :</td>
			<td><input autocomplete="off" type="text" name="provider_address" id="provider_address"
				value="<?php echo $_REQUEST['address'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Tel :</td>
			<td><input autocomplete="off" type="text" name="provider_tel" id="provider_tel"
				value="<?php echo $_REQUEST['tel'];?>" /></td>
			<td style="text-align: right;">Description :</td>
			<td><input autocomplete="off" type="text" name="provider_description" id="provider_description"
				value="<?php echo $_REQUEST['description'];?>" /></td>
		</tr>
		
		<tr>
			<td style="text-align: right;" colspan="4"><input type="submit"
				value="Add"></td>
		</tr>

	</table>
</form>