<script type="text/javascript">

$(document).ready(function(){
	var ac_config_import_facture = {
		source: "autocomplete/completed_import_facture_code.php",
		select: function(event, ui){
			$("#import_facture_code").val(ui.item.code);
			$("#description").val(ui.item.description);
			$("#provider_name").val(ui.item.provider_name);
			$("#provider_id").val(ui.item.provider_id);
			$("#continueImport").val("true");
		},
		minLength:1
	};
	$("#import_facture_code").autocomplete(ac_config_import_facture);
});
$(document).ready(function(){
	var ac_config_provider_name = {
		source: "autocomplete/completed_import_provider_name.php",
		select: function(event, ui){
			$("#provider_name").val(ui.item.code);
			$("#provider_id").val(ui.item.provider_id);
		},
		minLength:1
	};
	$("#provider_name").autocomplete(ac_config_provider_name);
});



$(document).ready(function(){
	var ac_config_season = {
		source: "autocomplete/completed_import_season.php",
		select: function(event, ui){
			$("#season").val(ui.item.code);
			$("#season_id").val(ui.item.season_id);
		},
		minLength:1
	};
	$("#season").autocomplete(ac_config_season);
});

function resetContinue(){ 
	$("#continueImport").val(false);
}

$(document).ready(function() {
    $("#provider_name").focus(function() { $(this).select(); } );
    $("#season").focus(function() { $(this).select(); } );
});

$(function() {
	$(".product_name").autocomplete( {
		source : "autocomplete/productname.php",
		minLength : 1
	});
});
</script>
<?php $importService->loadDefaultSeason();?>
<form method="post" action="?module=import&submenu=addproduct"
	onsubmit="return validateImportForm();">
	<label>Facture Code : </label><input onkeydown="resetContinue();"
		name="import_facture_code" id="import_facture_code"
		value="<?php echo $importService->getImportFactureCode();?>" /><?php echo tab4;?>
	<label>Provider : </label><input name="provider_name"
		id="provider_name" /><input type="hidden" name="provider_id"
		id="provider_id" /><?php echo tab4;?>
	<label>Description : </label><input name="description" id="description" /><?php echo tab4;?>
	<input type="hidden" name="continueImport" id="continueImport"
		value="false" /> <label>Season : </label><input name="season"
		id="season" value="<?php echo $_SESSION['default_season_name'];?>" /><input
		name="season_id" id="season_id" type="hidden"
		value="<?php echo $_SESSION['default_season_id'];?>" /><?php echo tab4;?>
	<?php $rowNum = $_SESSION ['import_number_row'];?>
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
				<td><input name="code_<?php echo $i;?>" id="code_<?php echo $i;?>"
					autocomplete="off" size="7"
					value="<?php echo $importService->currentMaxProductCode($i);?>" /></td>
				<td><input class="name" name="name_<?php echo $i;?>"
					id="name_<?php echo $i;?>" autocomplete="off" size="40" /></td>
				<td><input name="qty_<?php echo $i;?>" id="qty_<?php echo $i;?>"
					autocomplete="off" size="7" /></td>
				<td><input name="post_<?php echo $i;?>" id="post_<?php echo $i;?>"
					autocomplete="off" size="7" /></td>
				<td><input name="impr_<?php echo $i;?>" id="impr_<?php echo $i;?>"
					autocomplete="off" size="7" /></td>
				<td><div id="sex_<?php echo $i;?>" name="sex_<?php echo $i;?>"
						class="sex_woman" onclick="changeSex('<?php echo $i;?>');">WOMAN</div>
					<input type="hidden" name="sex_value_<?php echo $i;?>"
					id="sex_value_<?php echo $i;?>" value="1" /></td>
				<td><input class="product_category" name="category_<?php echo $i;?>"
					id="category_<?php echo $i;?>" autocomplete="off" size="20" /></td>
				<td><input class="product_brand" name="brand_<?php echo $i;?>"
					id="brand_<?php echo $i;?>" autocomplete="off" size="15" /></td>
				<td><input name="description_<?php echo $i;?>"
					id="description_<?php echo $i;?>" autocomplete="off" size="40" /></td>
			</tr>
    <?php
				}
				?>
   
    </tbody>
	</table>
</form>
<script type="text/javascript">
<?php for ($i=1;$i<=$rowNum;$i++) { ?>

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
		},
		minLength:1
	};
	$("#code_<?php echo $i;?>").autocomplete(ac_config_product_code_<?php echo $i;?>);
});
	<?php }?>
	</script>