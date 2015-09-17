<div id="serverMessage" style="display: none;"></div>
<input type="text" class="timefieldnosecond"></input>
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
<?php 
?>
</div>