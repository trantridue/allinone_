<input type="button" value="SHOW ADVANCED"
	onclick="toggleDiv('advancedInputArea');">
<div id="basicInputArea"><?php
include 'basicinput.php';
?></div>
<div id="advancedInputArea" style="display: none;"><?php
include 'advancedinput.php';
?></div>
