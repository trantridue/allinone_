<?php 
if($commonService->isAdmin()) {?>
<div id="inputArea">
<?php
$submodule = isset ( $_REQUEST ['submenu'] ) ? $_REQUEST ['submenu'] : defaultsubmodule;
include $submodule . '.php';
?>
</div>
<hr>
<div id="listArea">
<?php 
	if ($submodule == 'trace') {
		include 'trace_list.php';
	} else {
		include 'list.php';
	}?>
</div>

<?php } else {
	include 'common/errorpage.php';
}?>