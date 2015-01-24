
<hr>
<table>
<tr><td colspan="7">Trả hàng</td></tr>
<tr>
<th>Mã hàng</th>
<th>Số lượng nhập</th>
<th>Tên hàng</th>
<th>Giá nhập</th>
<th>Số lượng trả</th>
<th>Nhà Cung cấp</th>
<th>Ghi chú</th>
</tr>
<?php
for($i = 1; $i <= default_row_product_return; $i ++) {
	?>
<script type="text/javascript">
$(document).ready(function(){
	var ac_config_product_code_return_<?php echo $i;?> = {
		source: "autocomplete/completed_import_products_code_return.php",
		select: function(event, ui){
			$("#product_code_<?php echo $i;?>").val(ui.item.code);
			$("#product_import_qty_<?php echo $i;?>").val(ui.item.qty);
			$("#provider_name_<?php echo $i;?>").val(ui.item.provider_name);
			$("#provider_id_<?php echo $i;?>").val(ui.item.provider_id);
			$("#product_import_name_<?php echo $i;?>").val(ui.item.name);
			$("#product_import_price_<?php echo $i;?>").val(ui.item.import_price);
			
		},
		minLength:1
	};
	$("#product_code_<?php echo $i;?>").autocomplete(ac_config_product_code_return_<?php echo $i;?>);
});
</script>
<tr>
<td><input type="text" id="product_code_<?php echo $i;?>" name="product_code_<?php echo $i;?>"></td>
<td><input type="text" class="transparentText" id="product_import_qty_<?php echo $i;?>" name="product_import_qty_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" class="transparentText" id="product_import_name_<?php echo $i;?>" name="product_import_name_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" class="transparentText" id="product_import_price_<?php echo $i;?>" name="product_import_price_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" id="product_return_qty_<?php echo $i;?>" name="product_return_qty_<?php echo $i;?>"></td>
<td><input type="text" class="transparentText" id="provider_name_<?php echo $i;?>" name="provider_name_<?php echo $i;?>" onkeypress="validateNon(event);">
<input type="hidden" id="provider_id_<?php echo $i;?>" name="provider_id_<?php echo $i;?>"></td>
<td><input type="text" id="description_return_<?php echo $i;?>" name="description_return_<?php echo $i;?>"></td>
</tr>
<?php }?>
</table>
<input type="button" value="TRẢ HÀNG" class="menu_btn_sub"/>