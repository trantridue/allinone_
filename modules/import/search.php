<input type="button" value="SALE" class="menu_btn_sub"
	onclick="javascript:saleListProduct();">
<input type="button" value="RETURN" class="menu_btn_sub"
	onclick="toggleDiv('returnProductInputArea');">
	
<div id="basicInputArea"><?php
include 'basicinput.php';
?></div>
<div id="returnProductInputArea" style="display: none;"><?php
include 'returnproduct.php';
?></div>

