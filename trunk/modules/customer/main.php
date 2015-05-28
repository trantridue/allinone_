<?php 
if($commonService->isAdmin()) {?>
<div id="mainFund">
<div id="inputArea">
<?php
$submodule = isset ( $_REQUEST ['submenu'] ) ? $_REQUEST ['submenu'] : defaultsubmodule;
include 'inputCustomerForm.php';
?>
</div>
<div id="listArea">
<?php include 'list.php'?>
</div>
</div>
<?php } else {
	include 'common/errorpage.php';
}?>