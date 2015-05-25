<div id="noteForEmployee" style="display: none;text-align: center;background-color: yellow;padding:5px 0px 5px 0px;">Không phải nhập gì, chỉ cần lưu vào máy!</div>
<input type="button" value="HỎI HÀNG" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportCustomerOrder',this);">
<input type="checkbox" id="isBoss" value="value" onclick="calculateExportForm();" style="display: none;">
<label for="isBoss" title="Không phải nhập gì, chỉ cần lưu vào máy!" style="display: none;" id="isBossLabel">Save Now</label>
<input type="checkbox" id="useBonus" value="value" onclick="calculateExportForm();">
<label for="useBonus"  title="Check nếu khách muốn dùng điểm thưởng">Dùng điểm</label>
<input type="checkbox"  id="byCard" value="value"  onclick="calculateExportForm();">
<label for="byCard"  title="Check nếu khách thanh toán bằng thẻ">Thanh toán thẻ</label>
<input type="button" value="LƯU" class="menu_btn_sub" style="background-color: violet;"
	onclick="saveExport();">