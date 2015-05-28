<?php 
if($commonService->isAdmin()) {?>
<div id="user_role_area_id">
<?php include 'userroleform.php';?>
</div>
<?php } else {
	include 'common/errorpage.php';
}?>