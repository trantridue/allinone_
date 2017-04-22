<?php
if(!isset($_SESSION)){  session_start(); }
?>
<script language="javascript">
<?php
for($i = 1; $i <= $_SESSION ['export_number_row']; $i ++) {
	?>
$(document).ready(function(){
	var ac_config_export_product_<?php
	echo $i;
	?> = {
		source: "autocomplete/completed_export_products_code.php",
		select: function(event, ui){
			$("#productcode_<?php
	echo $i;
	?>").val(ui.item.code);
			$("#productname_<?php
	echo $i;
	?>").html(ui.item.name);
	$("#hide_productname_<?php
	echo $i;
	?>").val(ui.item.name);
			<?php
	if ($commonService->isAdmin ()) {
		?>
			$("#productname_<?php
		echo $i;
		?>").prop('title',ui.item.detail);
			<?php
	} else {
		?>
			$("#productname_<?php
		echo $i;
		?>").prop('title',ui.item.detail_emp);
			<?php
	}
	?>
			$("#exportprice_<?php
	echo $i;
	?>").val(Math.round(ui.item.price));
			$("#salebyproduct_<?php
	echo $i;
	?>").val(ui.item.sale);
			$("#exportpostedprice_<?php
	echo $i;
	?>").html(ui.item.posted_price);
	$("#hide_exportpostedprice_<?php
	echo $i;
	?>").val(ui.item.posted_price);
			$("#exportprice_" + <?php
	echo $i;
	?>).prop("title",ui.item.price);
			calculateExportForm();
		},
		minLength:1
	};
	$("#productcode_<?php
	echo $i;
	?>").autocomplete(ac_config_export_product_<?php
	echo $i;
	?>);
});
<?php
}
?>
</script>
<input type="hidden" id="export_number_row"
	value="<?php
	echo $_SESSION ['export_number_row'];
	?>" />
<table class="addcriteriatable" style="border-collapse: collapse;"
	border="1">
	<tr>
		<th width="10%">Mã</th>
		<th>Tên</th>
		<th width="8%">SL</th>
		<th width="8%">Giá gốc</th>
		<th width="8%">Giá bán</th>
		<th width="5%">Sale</th>
		<th width="8%">Hủy</th>
	</tr>
<?php
$rowNum = $_SESSION ['export_number_row'];
for($i = 1; $i <= $rowNum; $i ++) {
	?>
<tr>
		<td><input type="text" size="4" id="productcode_<?php
	echo $i;
	?>"
			maxlength="8" autocomplete="off"
			tabindex="<?php
	echo $i + $rowNum * 1;
	?>" /></td>
		<td><label id="productname_<?php
	echo $i;
	?>"></label><input type="text" id="hide_productname_<?php
	echo $i;
	?>" style="display:none;"/></td>
		<td><input type="number" id="quantity_<?php
	echo $i;
	?>"
			style="width: 35px;" value="1" autocomplete="off"
			onkeyup="calculateExportForm();" onclick="calculateExportForm();" />
		</td>
		<td style="text-align: center;"><label
			id="exportpostedprice_<?php
	echo $i;
	?>"></label><input type="text" id="hide_exportpostedprice_<?php
	echo $i;
	?>" style="display:none;"/></td>
		<td><input style="text-align: center;" type="number" class="number50"
			size="2" onpaste="return false;" id="exportprice_<?php
	echo $i;
	?>"
			maxlength="4" autocomplete="off" onkeypress="validateNum(event);"
			onkeyup="calculateExportForm();" /></td>
		<td><input style="text-align: center;" type="number" class="number30"
			size="2" id="salebyproduct_<?php
	echo $i;
	?>"
			onkeypress="saleExportLine('<?php
	echo $i;
	?>');"
			onkeyup="saleExportLine('<?php
	echo $i;
	?>');"
			onclick="saleExportLine('<?php
	echo $i;
	?>');" /></td>
		<td><input type="button"
			onclick="cancelExportLine('<?php
	echo $i;
	?>');" value="Hủy" /></td>
	</tr>
<?php }?>
</table>
