<?php 
require_once ("../../include/constant.php");
require_once ("../../include/userService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$userService = new UserService ( hostname, username, password, database, $commonService );
?>
	<?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'list_user',$_REQUEST['id']);
		?>
	<input type="text" id="requested_date" class="datetimefield" value="<?php echo $_REQUEST['requested_date'];?>"/>
<script>
$(function() {
	$(".datetimefield").datetimepicker({
		formatTime:'H:i:s',
		formatDate:'d.m.Y',
		timepickerScrollbar:true
	});
	});
</script>