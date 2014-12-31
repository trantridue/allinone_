<form action="?module=user&submenu=updateuser" method="post">
	<input type="hidden" name="user_id" value="<?php echo $_REQUEST['id'];?>" />
	<table width="100%" style="background-color: bisque;">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input type="text" name="user_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
			<td style="text-align: right;">Email :</td>
			<td><input type="text" name="user_email"
				value="<?php echo $_REQUEST['email'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;"></td>
			<td></td>
			<td style="text-align: right;"></td>
			<td></td>
		</tr>

		<tr>
			<td style="text-align: right;" colspan="4"><input type="submit"
				value="Update"></td>
		</tr>

	</table>
</form>