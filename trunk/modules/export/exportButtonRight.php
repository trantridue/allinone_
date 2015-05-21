
<input type="button" value="DEBT" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportDebt',this);">
<input type="button" value="RESERVA" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportReservation',this);">
<input type="button" value="RETURN" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportReturn',this);">
<input type="button" value="ORDER" class="menu_btn_sub"
	onclick="toggleDivShowBtnStatus('exportOrderList',this);">
<input type="reset" value="RESET" class="menu_btn_sub"
	onclick="$('#search_date_from').val(getDateResetSearch());">
<input type="button" value="SEARCH" class="menu_btn_sub" style="background-color: violet;"
	onclick="searchExportFull('true');">
<script>
function getDateResetSearch() {
	datereset = new Date();
	return (datereset.getYear()+1900) + "-" + datereset.getMonth() + "-" + datereset.getDate();
}
</script>