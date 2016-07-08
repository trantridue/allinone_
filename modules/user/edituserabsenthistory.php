<?php 
require_once ("../../include/constant.php");
require_once ("../../include/userService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$userService = new UserService ( hostname, username, password, database, $commonService );
?>
<div id="trace_input"  style="display:none;">
<?php include 'trace_input.php';?>
</div>
<div id="trace_search" style="display:none;">
<?php include 'trace_search.php';?>
</div>			
<div id="trace_edit">
<?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'list_user_update',$_REQUEST['id']);
		?>
	<input type="text" id="requested_date" class="datetimefield" value="<?php echo $_REQUEST['requested_date'];?>"/>
	<input type="text" id="absentfrom" class="datefield" value="<?php echo $_REQUEST['from'];?>"/>
	<input type="text" id="absentto" class="datefield" value="<?php echo $_REQUEST['to'];?>"/>
	<input type="hidden" id="id"  value="<?php echo $_REQUEST['id'];?>"/>
	<input type="text" id="description_update" value="<?php echo $_REQUEST['description'];?>"/>
	<input type="number" id="nbr_working_day" value="<?php echo $_REQUEST['nbr_working_day'];?>" class="number50"/>
	<input type="button"
			onclick="toggleDiv('trace_input');toggleDiv('trace_edit');"
			value="GO TO ADD" class="menu_btn_sub"></input>
		<input type="button" value="UPDATE" class="menu_btn_sub" onclick="updateAbsent();">
</div>
<script>
$(function() {
	$(".datetimefield").datetimepicker({
		formatTime:'H:i:s',
		formatDate:'d.m.Y',
		timepickerScrollbar:true
	});
	});
</script>