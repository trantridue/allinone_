function listUser() {
	var isdefault = "false";
	var username = $('#user_name_id').val();
	var url = "modules/user/list.php" + "?username=" + username + "&isdefault="
			+ isdefault;
	$('#listArea').load(url);
}

function deleteuser(userid) {
	var deleteuser = 'modules/user/deleteuser.php?userid='+userid;
	$.ajax( {
		url : deleteuser,
		success : setTimeout(deleteusersuccess, 1000)
	});
}

function deleteusersuccess(){
	$('#listArea').load("modules/user/list.php?isdefault=false");
	$('#errorMessageId').html('ok');
	$('#errorMessageId').show();
}