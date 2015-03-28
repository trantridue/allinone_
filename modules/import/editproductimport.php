<?php
	$provider_name = $_REQUEST['provider_name']; 
	$brand_name = $_REQUEST['brand_name']; 
	$category_name = $_REQUEST['category_name']; 
	$season_name = $_REQUEST['season_name']; 
	$id = $_REQUEST['id']; 
	$product_code = $_REQUEST['product_code']; 
	$import_facture_code = $_REQUEST['import_facture_code']; 
	$quantity = $_REQUEST['quantity']; 
	$import_price = $_REQUEST['import_price']; 
	$name = $_REQUEST['name']; 
	$category_id = $_REQUEST['category_id']; 
	$season_id = $_REQUEST['season_id']; 
	$sex_id = $_REQUEST['sex_id']; 
	$export_price = $_REQUEST['export_price']; 
	$description = $_REQUEST['description']; 
	$brand_id = $_REQUEST['brand_id']; 
	$sale = $_REQUEST['sale']; 
	$link = $_REQUEST['link'];
	$date = $_REQUEST['date'];
	$descript = $_REQUEST['descript'];
?>
<form>
<table class="searchcriteriatable">
<tr>
<td align="right">Facture Code : </td>
<td><?php echo $import_facture_code;?></td>
<td align="right">Date : </td>
<td><input class="datefield hasDatepicker" value="<?php echo date('Y-m-d',strtotime($date));?>"> </td>
<td align="right">Import description : </td>
<td><input  value="<?php echo $descript;?>"></td>
<td align="right">Provider Name : </td>
<td><?php echo $provider_name;?></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
</tr>
</table>
</form>
