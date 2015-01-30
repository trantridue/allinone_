<script type="text/javascript">
function calculateReturnProduct() {
	var total = 0;
	var totalRow = parseInt($("#numberrows").val());
	for (var i = 1; i < totalRow; i++) {
		var qty = ($("#product_return_qty_"+i).val() == "") ? 0
				: parseInt($("#product_return_qty_" + i).val());
		var impr = ($("#product_import_price_"+i).val() == "") ? 0 : parseFloat($("#product_import_price_" + i)
				.val());
		if (impr && qty)
			total = total + qty * impr;
	}
	$("#total_return").val(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}
function returnProduct(){
	var totalRows = $('#numberrows').val();
	var strCode = "";
	var strQty = "";
	var strDesc = "";
	var strProvider = "";
	var atLeastOneNotNul = false;
	var allNotNull = false;
	var flagRowWrong = true;
	var returnable = true;
		
	for (var i=1;i<=totalRows;i++) {
		var provider_id = $('#provider_id_'+i).val();
		var code = $('#product_code_'+i).val();
		var qty = $('#product_return_qty_'+i).val();
		var provider_id = $('#provider_id_'+i).val();
		var qtyremain = $('#remained_'+i).val();
		
		var desc = encodeURIComponent($('#description_return_'+i).val());

		if((parseFloat(qtyremain) < parseFloat(qty)) && code!='') {
			returnable = false;
			$('#product_return_qty_'+i).addClass("errorField");
			$('#product_return_qty_'+i).addClass("transparentText");
			$('#remained_'+i).addClass("errorField");
			$('#remained_'+i).removeClass("transparentText");
		} else {
			$('#product_return_qty_'+i).removeClass("errorField");
			$('#remained_'+i).removeClass("errorField");
		}
		
		if(code != '') {
			strCode = strCode + code + ",";
			strQty = strQty + qty + ",";
			strDesc = strDesc + desc + ",";
			strProvider = strProvider + provider_id + ",";
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
	if(flagRowWrong && strCode !='' && returnable) {
		insertReturnProduct(strCode,strQty,strDesc,strProvider);
	} else  {
		$('#serverMessage').show();
		$('#serverMessage').html("No product returned!");
		$('#serverMessage').removeClass('successMessage');
		$('#serverMessage').addClass('errorMessage');
	}
}

</script>
<hr>
<form id="returnproductForm">
<div> 
<input type="button" value="SAVE" class="menu_btn_sub" onclick="returnProduct();"/>
<input type="button" value="SEARCH" class="menu_btn_sub" onclick="listReturnProduct();$('#returnproducttable').hide();"/>
<input type="reset" value="TRẢ HÀNG" onclick="$('#returnproducttable').show();">
<input type="hidden" name="numberrows" id="numberrows" value="<?php echo default_row_product_return;?>"/>
<?php echo tab4;?> <strong> TOTAL: </strong>
<input type="text" id="total_return" value="0" style="opacity:100%;" size="8" onkeypress="validateNon(event);"/>
</div>
<hr>
<table width="100%" id="returnproducttable">
<tr>
<th>Mã hàng</th>
<th>Trả</th>
<th>Ghi chú</th>
<th>Tổng nhập</th>
<th>Đã trả</th>
<th>Còn lại</th>
<th>Giá nhập</th>
<th>Tên hàng</th>
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
			$("#remained_<?php echo $i;?>").val(ui.item.qty-ui.item.qtyreturned);
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
<td><input type="text" size="6" id="product_code_<?php echo $i;?>" name="product_code_<?php echo $i;?>"></td>
<td><input type="text" size="6" id="product_return_qty_<?php echo $i;?>" name="product_return_qty_<?php echo $i;?>" onkeyup="calculateReturnProduct();"></td>
<td><input type="text" size="40" id="description_return_<?php echo $i;?>" name="description_return_<?php echo $i;?>"></td>
<td><input type="text" size="6" class="transparentText" id="product_import_qty_<?php echo $i;?>" name="product_import_qty_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="6" class="transparentText" id="qtyreturned_<?php echo $i;?>" name="qtyreturned_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="6" class="transparentText" id="remained_<?php echo $i;?>" name="remained_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="6" class="transparentText" id="product_import_price_<?php echo $i;?>" name="product_import_price_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" size="40" class="transparentText" id="product_import_name_<?php echo $i;?>" name="product_import_name_<?php echo $i;?>" onkeypress="validateNon(event);"></td>
<td><input type="text" class="transparentText" id="provider_name_<?php echo $i;?>" name="provider_name_<?php echo $i;?>" onkeypress="validateNon(event);">
<input type="hidden" id="provider_id_<?php echo $i;?>" name="provider_id_<?php echo $i;?>"></td>
</tr>
<?php }?>
</table>
</form>

<div id="listReturnProductArea"><?php include 'listproductreturn.php';?></div>