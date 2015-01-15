//////////COMMON
$(function() {
	$(".datefield").datepicker({
		dateFormat : "yy-mm-dd",
		changeMonth : true,
		changeYear : true
	});
});
function processUrlString(str) {
	var key = new Array();
	var value = new Array();
	key = str.split("&");
	var inputUrl = "";
	for (i in key) {
		value[i] = encodeURIComponent(key[i].split("=")[1]);
		key[i] = key[i].split("=")[0];
	}
	for (i in key) {
		inputUrl = inputUrl + key[i] + "=" + value[i] + "&";
	}
	return inputUrl;
}
//////////USER
function listUser() {
	var isdefault = "false";
	var username = $('#user_username').val();
	var name = $('#user_name').val();
	var url = "modules/user/list.php" + "?isdefault=" + isdefault
			+ "&username=" + username+ "&name=" + encodeURIComponent(name);
	$('#listArea').load(url);
}

function deleteuser(userid) {
	var deleteuser = 'modules/user/deleteuser.php?userid=' + userid;
	$.ajax({
		url : deleteuser,
		success : function(data) {
			var actionType = "delete";
			userpostaction(data, actionType);
		}
	});
}
function edituser(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/user/edituser.php?' + inputUrl;
	$('#inputArea').load(url);
}
function changeSex(i) {
	var oldClass = $("#sex_"+i).attr("class");
	var newClass = "";
	var sex_value = "";
	if(oldClass=='sex_man') { 
		newClass = 'sex_woman';
		sex_value = 'WOMAN';
		sexval = '1';
	} else {
		sex_value = 'MAN';
		sexval = '2';
		newClass = 'sex_man';
	}
	$("#sex_"+i).addClass(newClass);
	$("#sex_"+i).removeClass(oldClass);
	$("#sex_"+i).html(sex_value);
	$("#sex_value_"+i).val(sexval);
}
function resetCategoryId(i) {	
	$("#category_id_"+i).val('');
}
function resetBrandId(i) {	
	$("#brand_id_"+i).val('');
}
function changeStatusUser() {
	var oldClass = $("#user_status").attr("class");
	var newClass = "";
	var status_value = '';
	if(oldClass=='status_on') { 
		newClass = 'status_off';
		status_value = 'n';
	} else {
		status_value = 'y';
		newClass = 'status_on';
	}
	$("#user_status").addClass(newClass);
	$("#user_status").removeClass(oldClass);
	$("#user_status_hidden").val(status_value);
}

///PROVIDER
function listProvider() {
	var isdefault = "false";
	var name = $('#provider_name').val();
	var url = "modules/provider/list.php" + "?isdefault=" + isdefault
			+ "&name=" + encodeURIComponent(name);
	$('#listArea').load(url);
}

function editprovider(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/provider/editprovider.php?' + inputUrl;
	$('#inputArea').load(url);
}
function deleteprovider(providerid) {
	var deleteprovider = 'modules/provider/deleteprovider.php?providerid=' + providerid;
	$.ajax({
		url : deleteprovider,
		success : function(data) {
			var actionType = "delete";
			providerpostaction(data, actionType);
		}
	});
}
///CUSTOMER
function listCustomer() {
	var isdefault = "false";
	var name = $('#customer_name').val();
	var url = "modules/customer/list.php" + "?isdefault=" + isdefault
			+ "&name=" + encodeURIComponent(name);
	$('#listArea').load(url);
}

function editcustomer(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/customer/editcustomer.php?' + inputUrl;
	$('#inputArea').load(url);
}
function deletecustomer(customerid) {
	var deletecustomer = 'modules/customer/deletecustomer.php?customerid=' + customerid;
	$.ajax({
		url : deletecustomer,
		success : function(data) {
			var actionType = "delete";
			customerpostaction(data, actionType);
		}
	});
}
///////SINGLE AUTOCOMPLETE
$(function() {
	$(".productcode").autocomplete( {
		source : "autocomplete/productcode.php",
		minLength : 1
	});
});