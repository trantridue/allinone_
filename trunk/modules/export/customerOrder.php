<hr> 

<table class="addcriteriatable">
<tr>
	<td>Mã</td>
	<td>SL</td>
	<td>Size</td>
	<td>Màu</td>
	<td>Ghi chú</td>
</tr>
<tr>
	<td><input type="text" id="order_product_code" size="5" autocomplete="off" class="productcode"/></td>
	<td><input type="number" id="order_qty" class="order_qty" style="width: 30px;" autocomplete="off" value="1"
	onkeyup="if(parseInt($('#order_qty').val())<1) $('#order_qty').val(1);"
	onclick="if(parseInt($('#order_qty').val())<1) $('#order_qty').val(1);" /></td>
	<td><input type="text" id="order_size" class="order_size" size="5" autocomplete="off" onkeyup="$('#order_size').val($('#order_size').val().toUpperCase());"/></td>
	<td><input type="text" id="order_color" class="order_color" size="8" autocomplete="off"
	onkeyup="$('#order_color').val($('#order_color').val().toUpperCase());"/></td>
	<td><input type="text" id="order_description" autocomplete="off"/></td>
</tr>
<tr>
<td colspan="4">
<input type="button" value="SAVE" class="menu_btn_sub" onclick="saveOrderProduct();"/>
</td>
</tr>
</table>

