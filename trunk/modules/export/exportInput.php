<?php
session_start(); 
?>
<script language="javascript">
<?php
for($i = 1; $i <= $_SESSION ['export_number_row']; $i ++) {
?>
$(document).ready(function(){
	var ac_config_export_product_<?php echo $i;?> = {
		source: "autocomplete/completed_export_products_code.php",
		select: function(event, ui){
			$("#productcode_<?php echo $i;?>").val(ui.item.code);
			$("#productname_<?php echo $i;?>").html(ui.item.name);
			$("#exportprice_<?php echo $i;?>").val(Math.trunc(ui.item.price));
			$("#exportpostedprice_<?php echo $i;?>").html(ui.item.posted_price);
			calculateExportForm();
		},
		minLength:1
	};
	$("#productcode_<?php echo $i;?>").autocomplete(ac_config_export_product_<?php echo $i;?>);
});
<?php }?>
</script>
<input type="hidden" id="export_number_row" value="<?php echo $_SESSION ['export_number_row'];?>"/>
<table class="addcriteriatable" style="border-collapse: collapse;" border="1">
<tr>
	<th width="10%">Mã</th>
	<th>Tên</th>
	<th width="8%">SL</th>
	<th width="8%">Giá gốc</th>
	<th width="8%">Giá bán</th>
	<th width="8%">Hủy</th>
</tr>
<?php
for($i = 1; $i <= $_SESSION ['export_number_row']; $i ++) { 
?>
<tr>
<td>
<input type="text" size="4"	id="productcode_<?php echo $i;?>" maxlength="8" autocomplete="off"/>
</td>
<td>
<label id="productname_<?php echo $i;?>"></label>
</td>
<td>
<input type="number" id="quantity_<?php	echo $i;?>" style="width:35px;" value="1" autocomplete="off" onkeyup="calculateExportForm();" onclick="calculateExportForm();" />
</td>
<td style="text-align: center;">
<label id="exportpostedprice_<?php echo $i;?>"></label>
</td>
<td>
<input style="text-align: center;" type="text" size="2"	id="exportprice_<?php echo $i;?>" maxlength="4" autocomplete="off" onkeypress="validateNum(event);" onkeyup="calculateExportForm();"/>
</td>
<td><input type="button" onclick="cancelExportLine('<?php echo $i;?>');" value="Hủy"/></td>
</tr>
<?php }?>
</table>