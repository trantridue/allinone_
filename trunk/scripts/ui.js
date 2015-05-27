var delaytime = 300;
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
$(function() {
$(".datetimefield").datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
//	defaultDate:'+03.01.1970', // it's my birthday
//	defaultTime:'10:00',
	timepickerScrollbar:true
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
		$('#' + divID).show(delaytime);
	} else {
		$('#' + divID).hide(delaytime);
	}
	$('#serverMessage').hide(delaytime);
}
function toggleDivCheckBox(divID) {
	
	if ($('#' + divID).css('display') == "none") {
		$('#' + divID).show(10);
	} else {
		$('#' + divID).hide(10);
	}
	$('#serverMessage').hide(delaytime);
}
function toggleDivShowBtnStatus(divID,this1) {
	
	if ($('#' + divID).css('display') == "none") {
		$('#' + divID).show(delaytime);
		this1.style.backgroundColor='violet';
	} else {
		$('#' + divID).hide(delaytime);
		this1.style.backgroundColor='#EBEBEB';
	}
	$('#serverMessage').hide(delaytime);
}
// IMPORT TOGGLE FIELD
function toggleImportSearchCriteria(){
	toggleDiv('product_code_to');
	toggleDiv('import_price_to');
	toggleDiv('export_price_to');
	toggleDiv('sale_to');
	toggleDiv('import_quantity_to');
	toggleDiv('export_quantity_to');
	toggleDiv('remain_quantity_to');
	$('#isadvancedsearch').val($('#isadvancedsearch').val()=='false');
//	alert($('#isadvancedsearch').val());
}

$(document).ready(function(){
	$('.deleteIcon').click(function(){
		var elem = $(this).closest('.item');
		var elemtxt = $(this).find('input[type=hidden],textarea,select').filter(':hidden:first').val();
		$.confirm({
			'title'		: 'Hãy xác nhận',
			'message'	: 'Bạn có muốn xóa không?',
			'buttons'	: {
			'Có'	: {
			'class'	: 'blue',
			'action': function(){
			eval(elemtxt);
		}
		},
		'Không'	: {
			'class'	: 'gray',
			'action': function(){}	
		}
		}
		});
		
	});
	
});
$(document).ready(function(){
	$('#saveExportBtn').click(function(){
		var give_customer = parseInt($('#give_customer').val());
		var customer_tel = $('#customer_tel').val();
		if(give_customer < 0 ){
			$.confirm({
				'title'		: 'Hãy xác nhận',
				'message'	: 'Bạn có muốn cho khách nợ không?',
				'buttons'	: {
				'Có'	: {
				'class'	: 'blue',
				'action': function(){
				if(customer_tel == '') {
					return showNote('Khách nợ phải nhập số điện thoại');
				} else {
					saveExport();
				}
			}
			},
			'Không'	: {
				'class'	: 'gray',
				'action': function(){}	
			}
			}
			});
		} else {
			saveExport();
		}
	});
//	}
});
