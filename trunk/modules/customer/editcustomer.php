<?php 
require_once ("../../include/constant.php");
require_once ("../../include/providerService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$providerService = new ProviderService ( hostname, username, password, database, $commonService );
?>
<form action="?module=provider&submenu=updateprovider" method="post" onsubmit="return validateEditProviderForm();">
	<input type="hidden" name="provider_id" value="<?php echo $_REQUEST['id'];?>" />
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
				value="Update"></td>
		</tr>

	</table>
</form>