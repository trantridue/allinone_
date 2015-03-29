<?php
	require_once ("../../include/constant.php");
	require_once ("../../include/importService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$importService = new ImportService ( hostname, username, password, database, $commonService );
	
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
	$provider_id = $_REQUEST['provider_id'];
?>
<form>
<table class="searchcriteriatable">
<tr>
<td align="right">Facture Code : </td>
<td><?php echo $import_facture_code;?></td>
<td align="right">Date : </td>
<td><input class="datefield hasDatepicker" value="<?php echo date('Y-m-d',strtotime($date));?>" name="edit_import_date" id="edit_import_date_id"> </td>
<td align="right">Import Desc : </td>
<td><input  value="<?php echo $descript;?> name="edit_import_description" id="edit_import_description_id""></td>
<td align="right">Provider Name : </td>
<td><?php $importService->printDropDownListFromTableSelected('provider','edit_provider',$provider_id);?></td>
<td align="right"></td>
<td></td>
</tr>
<tr>
<td align="right">Product code : </td>
<td><?php echo $product_code;?></td>
<td align="right">Product name : </td>
<td><input autocomplete="off" value="<?php echo $name;?>" name="edit_product_name" id="edit_product_name_id"></td>
<td align="right">Category : </td>
<td><?php $importService->printDropDownListFromTableSelected('category','edit_category',$category_id);?></td>
<td align="right">Season : </td>
<td><?php $importService->printDropDownListFromTableSelected('season','edit_season',$season_id);?></td>

</tr>
<tr>
<td align="right"></td>
<td></td>
<td align="right">Sex : </td>
<td><?php $importService->printDropDownListFromTableSelected('sex','edit_sex',$sex_id);?></td>
<td align="right">Brand : </td>
<td><?php $importService->printDropDownListFromTableSelected('brand','edit_brand',$brand_id);?></td>
<td align="right">Product Desc : </td>
<td><input value="<?php echo $description;?>" name="edit_product_description" id="edit_product_description_id"/></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td align="right">Export Price : </td>
<td><input value="<?php echo $export_price;?>" name="edit_export_price" id="edit_export_price_id"/></td>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
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
</tr>
</table>
</form>
