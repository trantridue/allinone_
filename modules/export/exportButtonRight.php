
<input type="button" value="KHÁCH NỢ" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportDebt',this);">
<input type="button" value="ĐÃ ĐẶT TIỀN" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportReservation',this);">
<input type="button" value="TRẢ HÀNG" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportReturn',this);">
<input type="button" value="ĐẶT HÀNG" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportOrderList',this);">
<input type="reset" value="RESET" class="menu_btn_sub"
	onclick="$('#search_date_from').val(getDateResetSearch());">
<input type="button" value="TÌM KIẾM" class="menu_btn_sub" style="background-color: violet;"
	onclick="searchExportFull('true');">
	<input type="hidden" id="date_before_some_day" value="<?php echo $commonService->getDateTimeBeforeSomeDaysExport();?>"></input>
<script>
function getDateResetSearch() {
	return $('#date_before_some_day').val();
}
</script>