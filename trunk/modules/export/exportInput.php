<?php
session_start(); 
?>
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
<td></td>
<td></td>
<td></td>
</tr>
<?php }?>
</table>