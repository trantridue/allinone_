<hr>
<form id="search_product_no_image">
<table>
<tr>
<td align="right"><label>Code From</label></td>
<td>
<input id="product_code_from" class="inputCode"/> <label> to </label>
<input id="product_code_to" class="inputCode"/>
</td>
<td align="right"><label>Date From</label></td>
<td>
<input id="date_from" class="datefield"/><label> to </label>
<input id="date_to" class="datefield"/>
</td>
<td align="right"><label> Provider </label></td>
<td><input id="provider_name" class="provider_name"/>
<input type="button" value="SEARCH" class="menu_btn_sub" onclick="searchProductNotCaptured('search_product_no_image');"></td>
</tr>
</table>
</form>
<hr>
<div id="listArea">
<?php include 'listProductNotCaptured.php';?>
</div>