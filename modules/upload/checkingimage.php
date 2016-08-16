<hr>
<form id="search_product_no_image">
<table width="100%">
<tr style="background-color: violet;font-weight: bold;height: 50px;" > <td colspan="8">DANH SÁCH CÁC MÃ HÀNG CHƯA CHỤP ẢNH</td></tr>
<tr>
<td align="right"><label>Code From</label></td>
<td>
<input id="product_code_from" class="product_code"/> <label> to </label>
<input id="product_code_to" class="product_code"/>
</td>
<td align="right"><label>Date From</label></td>
<td>
<input id="date_from" class="datefield"/><label> to </label>
<input id="date_to" class="datefield"/>
</td>
<?php if($commonService->isAdmin()) {?>
<td align="right"><label> Provider </label></td>
<td><input id="provider_name" class="provider_name"/></td>
<?php }?>
<td><input type="button" value="SEARCH" class="menu_btn_sub" onclick="searchProductNotCaptured('search_product_no_image');"></td>
</tr>
</table>
</form>
<hr>
<div id="listArea">
<?php include 'listProductNotCaptured.php';?>
</div>
