<?php 
require_once ("../../include/constant.php");
require_once ("../../include/userService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$userService = new UserService ( hostname, username, password, database, $commonService );
?>
<script type="text/javascript">

function changeStatusUser() {
	var oldClass = $("#user_status").attr("class");
	var newClass = "";
	var status_value = '';
	if(oldClass=='status_on') { 
		newClass = 'status_off';
		status_value = 'n';
	} else {
		status_value = 'y';
		newClass = 'status_on';
	}
	$("#user_status").addClass(newClass);
	$("#user_status").removeClass(oldClass);
	$("#user_status_hidden").val(status_value);
}
</script>
<form action="?module=user&submenu=updateuser" method="post" onsubmit="return validateEditUserForm();">
	<input type="hidden" name="user_id" value="<?php echo $_REQUEST['id'];?>" />
	<table width="100%" style="background-color: bisque; padding-top: 10px;">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input type="text" name="user_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
			<td style="text-align: right;">Email :</td>
			<td><input type="text" name="user_email"
				value="<?php echo $_REQUEST['email'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Phone Number :</td>
			<td><input type="text" name="user_phone_number"
				value="<?php echo $_REQUEST['phone_number'];?>" /></td>
			<td style="text-align: right;">Description :</td>
			<td><input type="text" name="user_description"
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