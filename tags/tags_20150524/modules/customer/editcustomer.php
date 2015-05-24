<?php 
require_once ("../../include/constant.php");
require_once ("../../include/customerService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$customerService = new CustomerService ( hostname, username, password, database, $commonService );
?>
<form action="?module=customer&submenu=updatecustomer" method="post" onsubmit="return validateEditCustomerForm();">
	<input type="hidden" name="customer_id" value="<?php echo $_REQUEST['id'];?>" />
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
			<td></td>
			<td colspan="3"><input type="submit" class="menu_btn_sub"
				value="UPDATE"></td>
		</tr>

	</table>
</form>