<table class="addcriteriatable" border="1" style="border-collapse: collapse;border-color: red; text-align: center;">
<tr>
	<td width="11%">Nợ</td>
	<td width="11%">Đã đặt</td>
	<td width="11%">Trả lại</td>
	<td width="11%">Hóa đơn</td>
	<td width="11%">Điểm</td>
	<td width="11%">Tổng</td>
	<td width="11%">Đặt thêm</td>
	<td width="11%">Khách đưa</td>
	<td>Trả lại</td>
</tr>
<tr style="color: blue;">
	<td><label id="customer_debt">0</label></td>
	<td><label id="customer_reserved">0</label></td>
	<td><label id="customer_returned">0</label></td>
	<td><label id="total_facture">0</label></td>
	<td id="customer_bonus_td"><label id="customer_bonus">0</label></td>
	<td style="background-color: yellow;"><label id="final_total">0</label></td>
	<td><label id="customer_reserve_more_label" style="display:none;">0</label>
	<input type="text" maxlength="6" onpaste="return false;"
	id="customer_reserve_more" size="3" autocomplete="off" onclick="this.select();" onkeypress="validateNum(event);" value="0" onkeyup="calculateExportForm();" style="text-align: center;"/></td>
	<td><label id="customer_give_label" style="display:none;">0</label>
	<input type="text" maxlength="6" onpaste="return false;" 
	id="customer_give" size="3" autocomplete="off" onkeypress="validateNum(event);" value="0" onkeyup="calculateExportForm();"  onclick="this.select();" ondblclick="dbclickCustomerGive();" style="text-align: center;"/></td>
	<td style="background-color: red;color:white;"><label id="give_customer_label">0</label><input type="hidden" maxlength="6" id="give_customer" size="3" autocomplete="off"  onclick="this.select();" onkeypress="validateNon(event);" value="0" style="text-align: center;"/></td>
</tr>
<tr height="30px">
	<td colspan="2">N : <label id="total_quantity">0</label> </td> 	   
	<td colspan="2">∑ : <label id="total_origine">0</label> </td>
	<td colspan="2">$ : <label id="total_after_saled">0</label> </td>
	<td>~ : <label id="sale_different">0</label></td>
	<td>↓ : <label id="sale_percentage">0</label>% </td>
	<td>
	<input type="number" size="2" maxlength="2" value="0" id="salefacture"
	 onkeyup="updatePriceProduct();" onclick="updatePriceProduct();" style="width:40px;">
	</td>
</tr>
</table>
