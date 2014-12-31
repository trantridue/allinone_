function goToPage(link) {
	window.location.href = "login-home.php?module=" + link;
}
$(function() {
	$(".datefield").datepicker({
		dateFormat : "yy-mm-dd",
		changeMonth : true,
		changeYear : true
	});
});