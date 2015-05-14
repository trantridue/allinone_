<form id="exportSearchCriteria">
<table class="searchcriteriatable">
<tr>
<td align="right">Tên Khách : </td>
<td><input type="text" id="search_customer_name" maxlength="12" size="12"></td>
<td align="right">Mã Hàng : </td>
<td><input type="text" id="search_product_code" maxlength="12" size="12" class="productcode"></td>
<td align="right">Giá bán : </td>
<td>
<input type="text" id="search_price_from" maxlength="6" size="4" autocomplete="off"  onkeypress="validateNum(event);"/>
<input type="text" id="search_price_to" maxlength="6" size="4" autocomplete="off"  onkeypress="validateNum(event);"/>
</td>
</tr>
<tr>
<td align="right">Tel : </td>
<td><input type="text" id="search_customer_tel" onkeypress="validateNum(event);" maxlength="12" size="12"></td>
<td align="right">Tên Hàng : </td>
<td><input type="text" id="search_product_name" maxlength="12" size="12" class="productname"></td>
<td align="right" rowspan="2">Ngày bán : </td>
<td><input type="text" id="search_date_from" class="datetimefield"></td>
</tr>
<tr>
<td align="right">Shop : </td>
<td><?php $commonService->printDropDownListFromTable( 'shop', 'search_shop');?></td>
<td align="right">Nhân viên : </td>
<td><?php $commonService->printDropDownListFromTable( 'user', 'search_user');?></td>
<td><input type="text" id="search_date_to" class="datetimefield"></td>
</tr>
</table>
</form>