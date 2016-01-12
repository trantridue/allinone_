<?php
$submodule = isset ( $_REQUEST ['submenu'] ) ? $_REQUEST ['submenu'] : defaultsubmodule; 
if($commonService->isAdmin() || $submodule == 'add' || $submodule == 'addproduct') {?>
<div id="inputArea">
<?php
include $submodule . '.php';
?>
</div>
<hr>
<div id="listArea">
<?php
if ($submodule == "search")
	include 'list.php';?>
</div>
<?php } else {
	include 'common/errorpage.php';
}?>

