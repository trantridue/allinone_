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

$(function() {
	$(document).tooltip({
	    content: function() {
	        var element = $(this);
	        return element.attr("title");
	    },
	    position: {
	    	my: "left bottom-10",
	    	at: "center top",
	    	using: function( position, feedback ) {
	    	$( this ).css( position );
	    	$( "<div>" )
	    	.addClass( "arrow" )
	    	.addClass( feedback.vertical )
	    	.addClass( feedback.horizontal )
	    	.appendTo( this );
	    	}
	    	}
	});
});