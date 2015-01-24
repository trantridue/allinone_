<script type="text/javascript">

function returnProduct(){
	var totalRows = $('#numberrows').val();
	var strCode = "";
	var strQty = "";
	var strDesc = "";
	var atLeastOneNotNul = false;
	var allNotNull = false;
	var flagRowWrong = true;
	
	for (var i=1;i<=totalRows;i++) {
		var code = $('#product_code_'+i).val();
		var qty = $('#product_return_qty_'+i).val();
		var desc = encodeURIComponent($('#description_return_'+i).val());
		if(code != '') {
			strCode = strCode + code + ",";
			strQty = strQty + qty + ",";
			strDesc = strDesc + desc + ",";
		}
		allNotNull = !(code != '' && qty != '' && desc != '');
		atLeastOneNotNul = (code != '' || qty != '' || desc != '');
		if (allNotNull && atLeastOneNotNul) {
			$('#product_code_'+i).addClass("errorField");
			$('#product_return_qty_'+i).addClass("errorField");
			$('#description_return_'+i).addClass("errorField");
			flagRowWrong = false;
		} else {
			$('#product_code_'+i).removeClass("errorField");
			$('#product_return_qty_'+i).removeClass("errorField");
			$('#description_return_'+i).removeClass("errorField");
		}
	}
	if(flagRowWrong && strCode !='') {
		alert("1");
		insertReturnProduct(strCode,strQty,strDesc);
	} else  {
		$('#serverMessage').show();
		$('#serverMessage').html("No product returned!");
		$('#serverMessage').removeClass('successMessage');
		$('#serverMessage').addClass('errorMessage');
	}
}

</script>
<hr>
<table>
<tr style="background-color: bisque;height: 30px;">
<td colspan="8" align="center" style="font-weight: bold;font-size: 15px;">
<input type="button" value="TRẢ HÀNG" class="menu_btn_sub" onclick="returnProduct();"/>
<input type="hidden" name="numberrows" id="numberrows" value="<?php echo default_row_product_return;?>"/>
</td>
</tr>
<tr>
<th>Mã hàng</th>
<th>Số lượng trả</th>
<th>Ghi chú</th>
<th>Số lượng nhập</th>
<th>Tên hàng</th>
<th>Giá nhập</th>
<th>Đã trả lại</th>
<th>Nhà Cung cấp</th>
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
			$("#qtyreturned_<?php echo $i;?>").val(ui.item.qtyreturned==null?0:ui.item.qtyreturned);
			$("#description_return_<?php echo $i;?>").val('Lỗi ');
			
		},
		minLength:1
	};
	$("#product_code_<?php echo $i;?>").autocomplete(ac_config_product_code_return_<?php echo $i;?>);
});
</script>
<tr>
<td><input type="text" size="4" id="product_code_<?php echo $i;?>" name="product_code_<?php echo $i;?>"></td>
<td><input type="text" size="4" id="product_return_qty_<?php echo $i;?>" name="product_return_qty_<?php echo $i;?>"></td>
<td><input type="text" id="description_return_<?php echo $i;?>" name="description_return_<?php echo $i;?>"></td>
<td><input type="text" size="4" class="transparentText" id="product_import_qty_<?php echo $i;?>" name="product_import_qty_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="20" class="transparentText" id="product_import_name_<?php echo $i;?>" name="product_import_name_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="4" class="transparentText" id="product_import_price_<?php echo $i;?>" name="product_import_price_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="4" class="transparentText" id="qtyreturned_<?php echo $i;?>" name="qtyreturned_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" class="transparentText" id="provider_name_<?php echo $i;?>" name="provider_name_<?php echo $i;?>" onkeypress="validateNon(event);">
<input type="hidden" id="provider_id_<?php echo $i;?>" name="provider_id_<?php echo $i;?>"></td>
</tr>
<?php }?>
</table>