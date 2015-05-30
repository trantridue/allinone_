<?php 
if($commonService->isAdmin()) {?>
<div id="user_role_area_id">
<?php include 'parameters.php';?>
</div>
<?php } else {
	include 'common/errorpage.php';
}?>