<?php 
require_once ("../../include/constant.php");
require_once ("../../include/userService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$userService = new UserService ( hostname, username, password, database, $commonService );
?>
<form action="?module=user&submenu=updateuser" method="post" onsubmit="return validateEditUserForm();">
	<input type="hidden" name="user_id" value="<?php echo $_REQUEST['id'];?>" />
	<table width="100%" class="edittable">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input autocomplete="off" type="text" name="user_name" id="user_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
			<td style="text-align: right;">Email :</td>
			<td><input autocomplete="off" type="text" name="user_email" id="user_email"
				value="<?php echo $_REQUEST['email'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Phone Number :</td>
			<td><input autocomplete="off" type="text" name="user_phone_number" id="user_phone_number"
				value="<?php echo $_REQUEST['phone_number'];?>" /></td>
			<td style="text-align: right;">Description :</td>
			<td><input autocomplete="off" type="text" name="user_description"
				value="<?php echo $_REQUEST['description'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Password :</td>
			<td><input type="password" name="user_password" id="user_password"/></td>
			<td style="text-align: right;">Shop :</td>
			<td><?php $userService->dropDownList('shop','shop_dropdown_user',$_REQUEST['shop_id']);?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Re-Password :</td>
			<td><input type="password" name="retype_user_password" id="retype_user_password"/></td>
			<td style="text-align: right;">Status : </td>
			<td>
			<?php if($_REQUEST['status']=='y') { ?>
				<div id="user_status" name="user_status" class="status_on" onclick="changeStatusUser();"></div>
			<?php } else { ?>
				<div id="user_status" name="user_status" class="status_off" onclick="changeStatusUser();"></div>
			<?php }?>
			<input type="hidden" id="user_status_hidden" name="user_status_hidden" value="<?php echo $_REQUEST['status'];?>">
			</td>
		</tr>
		<tr>
			<td style="text-align: right;" colspan="4"><input type="submit"
				value="Update"></td>
		</tr>

	</table>
</form>