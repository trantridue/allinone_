<input type="button" value="SHOW ADVANCED" class="menu_btn_sub"
	onclick="toggleDiv('advancedInputArea');">

<input type="button" value="SEARCH" class="menu_btn_sub"
	onclick="javascript:listProduct();">

<div id="basicInputArea"><?php
include 'basicinput.php';
?></div>
<div id="advancedInputArea" style="display: none;"><?php
include 'advancedinput.php';
?></div>

