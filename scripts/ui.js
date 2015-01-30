// GO TO DIRECTLY AN URL
function goToPage(link) {
	window.location.href = "login-home.php?module=" + link;
}
// DATE FIELD ALLOW CHOICE MONTH, YEAR IN THE DROPDOWN LIST
$(function() {
	$(".datefield").datepicker( {
		dateFormat : "yy-mm-dd",
		changeMonth : true,
		changeYear : true
	});
});
// TOOLTIP WITH STYLE AND ALLOW HTML TAGS VALID
$(function() {
	$(document).tooltip(
			{
				content : function() {
					var element = $(this);
					return element.attr("title");
				},
				position : {
					my : "left bottom-10",
					at : "center top",
					using : function(position, feedback) {
						$(this).css(position);
						$("<div>").addClass("arrow")
								.addClass(feedback.vertical).addClass(
										feedback.horizontal).appendTo(this);
					}
				}
			});
});
// SHOW OR HIDE A OBJECT BY INPUT ID
function toggleDiv(divID) {
	if ($('#' + divID).css('display') == "none") {
		$('#' + divID).show(1000);
	} else {
		$('#' + divID).hide(1000);
	}
	$('#serverMessage').hide(100);
}