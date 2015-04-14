<div id="inputArea">
<?php
$submodule = isset ( $_REQUEST ['submenu'] ) ? $_REQUEST ['submenu'] : defaultsubmodule;
include $submodule . '.php';
?>
</div>
<div id='paidArea' style="display: none;"></div>
<hr>
<div id="listArea">
<?php include 'list.php'?>
</div>
