<input type="hidden" id="isadvancedsearch" value="false"/>
<table class="searchcriteriatable">
<tr>
<td align="right" title="Test This title <br> with HTML CODE">PRODUCT CODE</td>
<td><input name="product_code" id="product_code" size="7" class="product_code"/>
<input name="product_code_to" id="product_code_to" style="display: none;" size="7" class="product_code"/></td>
<td align="right">PRODUCT NAME</td>
<td><input name="product_name" id="product_name" class="product_name" size="19"/></td>
<td align="right">PROVIDER    </td>
<td><input name="provider_name" id="provider_name" size="19"/></td>
</tr>
<tr>
<td align="right">CATEGORY</td>
<td><input name="category_name" id="category_name" size="19"/></td>
<td align="right">BRAND</td>
<td><input name="brand_name" id="brand_name" size="19"/></td>
<td align="right">SEASON</td>
<td><input name="season" id="season" value="" onkeypress="$('#season_id').val('');" size="19"/>
<input	name="season_id" id="season_id" type="hidden" value="" /></td>
</tr>
<tr>
<td align="right">DESCRIPTION</td>
<td><input name="description" id="description" size="19"/></td>
<td align="right">SALE</td>
<td><input name="sale" id="sale" onkeypress="validateFloat(event);" maxlength="4" size="7"/>
<input name="sale_to" id="sale_to" onkeypress="validateFloat(event);" maxlength="4" size="7" style="display: none;"/></td>
<td align="right">FACTURE</td>
<td><input name="import_facture_code" id="import_facture_code" size="19"/> </td>
</tr>
<tr>
<td align="right">IMPORT PRICE</td>
<td><input name="import_price" id="import_price" size="7" class="import_price"/>
<input name="import_price_to" id="import_price_to" size="7" class="import_price_to" style="display: none;"/></td>
<td align="right">EXPORT PRICE</td>
<td><input name="export_price" id="export_price" size="7" class="export_price"/>
<input name="export_price_to" id="export_price_to" size="7" class="export_price_to" style="display: none;"/></td>
<td align="right">IMPORT QUANTITY</td>
<td><input name="import_quantity" id="import_quantity" size="7" class="import_quantity"/>
<input name="import_quantity_to" id="import_quantity_to" size="7" class="import_quantity_to" style="display: none;"/></td>
</tr>
<tr>
<td align="right">EXPORT QUANTITY</td>
<td><input name="export_quantity" id="export_quantity" size="7" class="export_quantity"/>
<input name="export_quantity_to" id="export_quantity_to" size="7" class="export_quantity_to" style="display: none;"/></td>
<td align="right">REMAIN QUANTITY</td>
<td><input name="remain_quantity" id="remain_quantity" size="7" class="remain_quantity"/>
<input name="remain_quantity_to" id="remain_quantity_to" size="7" class="remain_quantity_to" style="display: none;"/></td>
<td align="right">SEX</td>
<td><div id="sex_search" name="sex_search"
						class="sex_woman" onclick="changeSex('search');">WOMAN</div>
					<input type="hidden" name="sex_value_search"
					id="sex_value_search" value="" /></td>
</tr>
<tr>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
<td align="right"></td>
<td></td>
</tr>
</table>