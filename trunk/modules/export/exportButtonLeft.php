<input type="button" value="HỎI HÀNG" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportCustomerOrder',this);">
<input type="checkbox" id="isBoss" value="value" onclick="calculateExportForm();">
<label for="isBoss" title="Check nếu chị Châu hay anh Duệ lấy">Người nhà</label>
<input type="checkbox" id="useBonus" value="value" onclick="calculateExportForm();">
<label for="useBonus"  title="Check nếu khách muốn dùng điểm thưởng">Điểm</label>
<input type="checkbox"  id="byCard" value="value"  onclick="calculateExportForm();">
<label for="byCard"  title="Check nếu khách thanh toán bằng thẻ">Thẻ</label>
<input type="button" value="LƯU" class="menu_btn_sub" style="background-color: violet;"
	onclick="saveExport();">