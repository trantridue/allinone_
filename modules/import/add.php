<script type="text/javascript">
function resetContinue(){ 
	$("#continueImport").val(false);
}

</script>
<?php $importService->loadDefaultSeason();?>
<form method="post" action="?module=import&submenu=addproduct"
	onsubmit="return validateImportForm();">
	<label>Facture Code : </label><input onkeydown="resetContinue();"
		name="import_facture_code" id="import_facture_code"
		value="<?php echo $importService->getImportFactureCode();?>" /><?php echo tab4;?>
	<label>Provider : </label><input name="provider_name" onkeypress="resetProviderId();"
		id="provider_name" /><input type="hidden" name="provider_id"
		id="provider_id" /><?php echo tab4;?>
	<?php echo tab4;?> Sale: <input name="sale" id="sale" size="3" maxlength="2" onkeypress="validateNum(event);"/>%<?php echo tab4;?>
	<input type="hidden" name="continueImport" id="continueImport"
		value="false" /> <label>Season : </label><input name="season"
		id="season" value="<?php echo $_SESSION['default_season_name'];?>" /><input
		name="season_id" id="season_id" type="hidden"
		value="<?php echo $_SESSION['default_season_id'];?>" /><?php echo tab4;?>
	<?php $rowNum = $_SESSION ['import_number_row'];?>
	
	<br><label>Description : </label><?php echo tab2;?><textarea name="description" id="description" cols="40" rows="3"></textarea><?php echo tab4;?>
	<strong>Total : <input id="total_facture" value="0" onkeypress="validateNon(event);"/></strong>
	<input type="submit" value="IMPORT">
	<hr>
	<table width="100%" border="0" cellspacing="0" cellpadding="2"
		style="border-collapse: collapse;">
		<tbody>
			<tr style="text-align: center; font-weight: bold;">
				<td>Code</td>
				<td>Name</td>
				<td>Qty</td>
				<td>Post</td>
				<td>ImPr</td>
				<td>Sex</td>
				<td>Category</td>
				<td>Brand</td>
				<td>Description</td>
			</tr>       
    <?php for ($i=1;$i<=$rowNum;$i++) { ?>
    <tr>
				<td><input name="code_<?php echo $i;?>" id="code_<?php echo $i;?>" onkeypress="resetExisted('<?php echo $i;?>');"
					autocomplete="off" size="7"
					value="<?php echo $importService->currentMaxProductCode($i);?>" />
					<input type="hidden" name="isExisted_<?php echo $i;?>"
					id="isExisted_<?php echo $i;?>" value="false" /></td>
				<td><input class="product_name" name="name_<?php echo $i;?>"
					id="name_<?php echo $i;?>" autocomplete="off" size="40" /></td>
				<td><input name="qty_<?php echo $i;?>" id="qty_<?php echo $i;?>" onkeyup="calculateImportFacture();" onkeypress="validateFloat(event);"
					autocomplete="off" size="7" maxlength="4" /></td>
				<td><input name="post_<?php echo $i;?>" id="post_<?php echo $i;?>" onkeypress="validateFloat(event);"  
				maxlength="6"
					autocomplete="off" size="7" /></td>
				<td><input name="impr_<?php echo $i;?>" id="impr_<?php echo $i;?>" onkeyup="calculateImportFacture();" 
				onkeypress="validateFloat(event);"  maxlength="6"
					autocomplete="off" size="7" /></td>
				<td><div id="sex_<?php echo $i;?>" name="sex_<?php echo $i;?>"
						class="sex_woman" onclick="changeSex('<?php echo $i;?>');">WOMAN</div>
					<input type="hidden" name="sex_value_<?php echo $i;?>"
					id="sex_value_<?php echo $i;?>" value="1" /></td>
				<td><input name="category_<?php echo $i;?>" onkeypress="resetCategoryId('<?php echo $i;?>');"
					id="category_<?php echo $i;?>" autocomplete="off" size="20" value="VAY"/>
					<input type="hidden" name="category_id_<?php echo $i;?>"
					id="category_id_<?php echo $i;?>" value="1" />
					</td>
				<td><input name="brand_<?php echo $i;?>" value="MADEVN" onkeypress="resetBrandId('<?php echo $i;?>');"
					id="brand_<?php echo $i;?>" autocomplete="off" size="15" />
					<input type="hidden" name="brand_id_<?php echo $i;?>"
					id="brand_id_<?php echo $i;?>" value="1" />
					</td>
				<td><input name="description_<?php echo $i;?>"
					id="description_<?php echo $i;?>" autocomplete="off" size="40" />
					
					</td>
			</tr>
    <?php
				}
				?>
   
    </tbody>
	</table>
	<input type="hidden" id="totalRow" name="totalRow" value="<?php echo $rowNum;?>"/>
	<input type="hidden" id="dataRow" name="dataRow" value="0"/>
</form>
<script type="text/javascript">
$(document).ready(function() {
    $("#import_facture_code").focus(function() { $(this).select(); } );
    $("#season").focus(function() { $(this).select(); } );
    $("#description").focus(function() { $(this).select(); } );
    $("#provider_name").focus(function() { $(this).select(); } );
});			
<?php for ($i=1;$i<=$rowNum;$i++) { ?>

$(document).ready(function() {
    $("#code_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#name_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#impr_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#category_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#brand_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#description_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#qty_<?php echo $i;?>").focus(function() { $(this).select(); } );
    $("#post_<?php echo $i;?>").focus(function() { $(this).select(); } );
});

	$(document).ready(function(){
	var ac_config_product_code_<?php echo $i;?> = {
		source: "autocomplete/completed_import_products_code.php",
		select: function(event, ui){
			$("#code_<?php echo $i;?>").val(ui.item.code);
			$("#name_<?php echo $i;?>").val(ui.item.name);
			$("#post_<?php echo $i;?>").val(ui.item.post);
			$("#sex_value_<?php echo $i;?>").val(ui.item.sex_id);
			$("#sex_<?php echo $i;?>").html(ui.item.sextext);
			$("#sex_<?php echo $i;?>").addClass(ui.item.sexoldclass);
			$("#sex_<?php echo $i;?>").removeClass(ui.item.sexnewclass);
			$("#impr_<?php echo $i;?>").val(ui.item.impr);
			$("#category_<?php echo $i;?>").val(ui.item.category);
			$("#category_id_<?php echo $i;?>").val(ui.item.category_id);
			$("#brand_<?php echo $i;?>").val(ui.item.brand);
			$("#brand_id_<?php echo $i;?>").val(ui.item.brand_id);
			$("#description_<?php echo $i;?>").val(ui.item.description);
			$("#isExisted_<?php echo $i;?>").val("true");
			calculateImportFacture();
		},
		minLength:1
	};
	$("#code_<?php echo $i;?>").autocomplete(ac_config_product_code_<?php echo $i;?>);
});

	$(document).ready(function(){
		var ac_config_category_<?php echo $i;?> = {
			source: "autocomplete/completed_import_category.php",
			select: function(event, ui){
				$("#category_<?php echo $i;?>").val(ui.item.code);
				$("#category_id_<?php echo $i;?>").val(ui.item.category_id);
			},
			minLength:1
		};
		$("#category_<?php echo $i;?>").autocomplete(ac_config_category_<?php echo $i;?>);
	});
	$(document).ready(function(){
		var ac_config_brand_<?php echo $i;?> = {
			source: "autocomplete/completed_import_brand.php",
			select: function(event, ui){
				$("#brand_<?php echo $i;?>").val(ui.item.code);
				$("#brand_id_<?php echo $i;?>").val(ui.item.brand_id);
			},
			minLength:1
		};
		$("#brand_<?php echo $i;?>").autocomplete(ac_config_brand_<?php echo $i;?>);
	});
	<?php }?>
	</script>
	