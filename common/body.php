<div id="errorMessageId" style="display: none;"></div>
<div id='submenucontent'>
<?php
$module = isset ( $_REQUEST ['module'] ) ? $_REQUEST ['module'] : defaultmodule;
include 'modules/' . $module . '/submenu.php';
?>
</div>
<div id='bodycontent'>
<?php
$module = isset ( $_REQUEST ['module'] ) ? $_REQUEST ['module'] : defaultmodule;
include 'modules/' . $module . '/main.php';
?>
</div>