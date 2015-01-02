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

function userpostaction(data, actionType) {
	$('#serverMessage').show();
	var errorMessage = actionType + " user error";
	if (actionType == 'passwordnotmatch') {
		errorMessage = "Password not match, please re-type!";
	} else if(actionType == 'email'){
		errorMessage = "Email format not correct, please try again!";
	}
	var successMessage = actionType + " user successful";

	if (data && data != '') {
		$('#listArea').load("modules/user/list.php?isdefault=false");
		$('#serverMessage').html(successMessage);
		$('#serverMessage').addClass('successMessage');
		$('#serverMessage').removeClass('errorMessage');
	} else {
		$('#serverMessage').html(errorMessage);
		$('#serverMessage').addClass('errorMessage');
		$('#serverMessage').removeClass('successMessage');
	}
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
