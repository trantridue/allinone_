<form><input autocomplete="off" type="hidden" id="isadvancedsearch"
	value="false" />
<table class="searchcriteriatable">
	<tr>
		<td align="right">CATEGORY</td>
		<td><input autocomplete="off" name="category_name" id="category_name"
			size="18" /></td>
		<td align="right">PRODUCT NAME</td>
		<td><input autocomplete="off" name="product_name" id="product_name"
			class="product_name" size="18" /></td>
		<td align="right">PROVIDER</td>
		<td><input autocomplete="off" name="provider_name" id="provider_name"
			size="18" /></td>
	</tr>
	<tr>
		<td align="right">SALE</td>
		<td><input autocomplete="off" name="sale" id="sale" type="number" class="number80"
			onkeypress="validateFloat(event);" maxlength="4" size="7" /> <input  type="number" class="number80"
			autocomplete="off" name="sale_to" id="sale_to"
			onkeypress="validateFloat(event);" maxlength="4" size="7"
			style="display: none;" /></td>
		<td align="right">BRAND</td>
		<td><input autocomplete="off" name="brand_name" id="brand_name"
			size="18" /></td>
		<td align="right">SEASON</td>
		<td><input autocomplete="off" name="season" id="season" value=""
			onkeypress="$('#season_id').val('');" size="18" /> <input
			name="season_id" id="season_id" type="hidden" value="" /></td>
	</tr>
	<tr>
		<td align="right">IMPORT QUANTITY</td>
		<td><input autocomplete="off" name="import_quantity" type="number" class="number80"
			id="import_quantity" size="7" class="import_quantity" /> <input  type="number" class="number80"
			autocomplete="off" name="import_quantity_to" id="import_quantity_to"
			size="7" class="import_quantity_to" style="display: none;" /></td>
		<td align="right" title="Test This title <br> with HTML CODE">PRODUCT
		CODE</td>
		<td><input autocomplete="off" name="product_code" id="product_code"
			size="7" class="product_code" /> <input autocomplete="off"
			name="product_code_to" id="product_code_to" style="display: none;"
			size="7" class="product_code" /></td>
		<td align="right">FACTURE</td>
		<td><input autocomplete="off" name="import_facture_code"
			id="import_facture_code" size="18" /></td>
	</tr>
	<tr>
		<td align="right">IMPORT PRICE</td>
		<td><input autocomplete="off" name="import_price" id="import_price" type="number" class="number80"
			size="7" class="import_price" /> <input autocomplete="off"
			name="import_price_to" id="import_price_to" size="7" type="number" class="number80"
			class="import_price_to" style="display: none;" /></td>
		<td align="right">EXPORT PRICE</td>
		<td><input autocomplete="off" name="export_price" id="export_price" type="number" class="number80"
			size="7" class="export_price" /> <input autocomplete="off"
			name="export_price_to" id="export_price_to" size="7" type="number" class="number80"
			class="export_price_to" style="display: none;" /></td>
		<td align="right">DESCRIPTION</td>
		<td><input autocomplete="off" name="description" id="description"
			size="18" /></td>
	</tr>
	<tr>
		<td align="right">EXPORT QUANTITY</td>
		<td><input autocomplete="off" name="export_quantity" type="number" class="number80"
			id="export_quantity" size="7" class="export_quantity" /> <input type="number" class="number80"
			autocomplete="off" name="export_quantity_to" id="export_quantity_to"
			size="7" class="export_quantity_to" style="display: none;" /></td>
		<td align="right">REMAIN QUANTITY</td>
		<td><input autocomplete="off" name="remain_quantity"  type="number" class="number80"
			id="remain_quantity" size="7" class="remain_quantity" /> <input  type="number" class="number80"
			autocomplete="off" name="remain_quantity_to" id="remain_quantity_to"
			size="7" class="remain_quantity_to" style="display: none;" /></td>
		<td align="right">SEX</td>
		<td>
		<div id="sex_search" name="sex_search" class="sex_woman"
			onclick="changeSex('search');">WOMAN</div>
		<input autocomplete="off" type="hidden" name="sex_value_search"
			id="sex_value_search" value="" /></td>
	</tr>
	<tr>
		<td align="right">IMPORT FROM</td>
		<td colspan="2"><input autocomplete="off" type="text" value=""
			class="datefield" id="datefrom" name="datefrom" value=""/> TO <input
			autocomplete="off" type="text" class="datefield" id="dateto"
			name="dateto" /></td>
		<td colspan="5"><input type="button" value="SEARCH"
			class="menu_btn_sub"
			onclick="$('#returnProductInputArea').hide();$('#suplementaryListArea').hide();listProduct();">
		<input type="button" value="ADVANCE" class="menu_btn_sub"
			onclick="toggleImportSearchCriteria();"> <input type="reset"
			value="RESET">
			<input type="button" value="SALE" class="menu_btn_sub"
	onclick="javascript:saleListProduct();">
<input type="button" value="RETURN" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('returnProductInputArea',this);">
	
			</td>
	</tr>
</table>
<input autocomplete="off" type="hidden" name="limit_search" id="limit_search" value="" />
</form>
