<hr> 
<table class="addcriteriatable">
<tr>
	<td>Mã</td>
	<td>Size</td>
	<td>Màu</td>
	<td>Ghi chú</td>
</tr>
<?php for($i=1;$i<=2;$i++) { ?>
<tr>
	<td><input type="text" id="order_product_code_<?php echo $i;?>" size="8" autocomplete="off"/></td>
	<td><input type="text" id="order_size_<?php echo $i;?>" size="8" autocomplete="off"/></td>
	<td><input type="text" id="order_color_<?php echo $i;?>" size="8" autocomplete="off"/></td>
	<td><input type="text" id="order_description_<?php echo $i;?>" autocomplete="off"/></td>
</tr>
<?php } ?>
<tr>
<td colspan="4">
<input type="button" value="SAVE" class="menu_btn_sub" onclick="saveOrderProduct();"/>
</td>
</tr>
</table>
