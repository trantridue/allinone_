$(function() {
	$(".datefield").datepicker({
		dateFormat : "yy-mm-dd",
		changeMonth : true,
		changeYear : true
	});
});


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