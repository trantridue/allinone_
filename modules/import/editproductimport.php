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
<form method="post">
<table class="searchcriteriatable">
<tr>
<td align="right">Facture Code : </td>
<td><?php echo $import_facture_code;?><input type="hidden" id="edit_import_facture_code" value="<?php echo $import_facture_code;?>"></td>
<td align="right">Date : </td>
<td><input class="datefield" value="<?php echo date('Y-m-d',strtotime($date));?>" name="edit_import_date" id="edit_import_date"> </td>
<td align="right" title="<?php echo $descript;?>">Import Desc : </td>
<td><input value="<?php echo $descript;?>" name="edit_import_description" id="edit_import_description"></td>
<td align="right">Provider Name : </td>
<td><?php $commonService->printDropDownListFromTableSelected('provider','edit_provider',$provider_id);?></td>
<td align="right"></td>
<td></td>
</tr>
<tr>
<td align="right">Product code : </td>
<td><?php echo $product_code;?><input type="hidden" id="edit_product_code" value="<?php echo $product_code;?>"></td>
<td align="right" title="<?php echo $name;?>" >Product name : </td>
<td><input autocomplete="off" value="<?php echo $name;?>" name="edit_product_name" id="edit_product_name"></td>
<td align="right">Category : </td>
<td><?php $commonService->printDropDownListFromTableSelected('category','edit_category',$category_id);?></td>
<td align="right">Season : </td>
<td><?php $commonService->printDropDownListFromTableSelected('season','edit_season',$season_id);?></td>

</tr>
<tr>
<td align="right"></td>
<td></td>
<td align="right">Sex : </td>
<td><?php $commonService->printDropDownListFromTableSelected('sex','edit_sex',$sex_id);?></td>
<td align="right">Brand : </td>
<td><?php $commonService->printDropDownListFromTableSelected('brand','edit_brand',$brand_id);?></td>
<td align="right">Product Desc : </td>
<td><input value="<?php echo $description;?>" name="edit_product_description" id="edit_product_description" title="<?php echo $description;?>"/></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td align="right">Export Price : </td>
<td><input value="<?php echo $export_price;?>" name="edit_export_price" id="edit_export_price" onkeypress="validateNum(event);" maxlength="4" size="4"/></td>
<td align="right">Sale : </td>
<td><input value="<?php echo $sale;?>" name="edit_sale" id="edit_sale" onkeypress="validateNum(event);" maxlength="2" size="4"/></td>
<td align="right" title="<?php echo $link;?>">Link : </td>
<td><input value="<?php echo $link;?>" name="edit_link" id="edit_link" onclick="this.select()"/></td>
</tr>
<tr>
<td align="right">Product Import ID : </td>
<td><?php echo $id;?><input type="hidden" id="edit_id" value="<?php echo $id;?>"></td>
<td align="right">Quantity : </td>
<td><input value="<?php echo $quantity;?>" name="edit_quantity" id="edit_quantity" onkeypress="validateNum(event);" maxlength="4" size="4"/>
<input value="<?php echo $deviation;?>" name="edit_deviation" id="edit_deviation" onkeypress="validateNum(event);" maxlength="4" size="4"/></td>
<td align="right">Import Price : </td>
<td><input value="<?php echo $import_price;?>" name="edit_import_price" id="edit_import_price" onkeypress="validateNum(event);" maxlength="4" size="4"/></td>
<td align="right"></td>
<td><input type="button" value="UPDATE PRODUCT" class="menu_btn_sub"
	onclick="javascript:updateProduct();"></td>
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
<?php
echo "<script>";
echo "$(function() {
	$('.datefield').datepicker( {
		dateFormat : 'yy-mm-dd',
		destroy: true,
		changeMonth : true,
		changeYear : true
	});
});";
echo "</script>";
?>