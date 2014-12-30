function listUser() {
	var isdefault = "false";
	var username = $('#user_name_id').val();
	var url = "modules/user/list.php" + "?username=" + username + "&isdefault="
			+ isdefault;
	$('#listArea').load(url);
}

function deleteuser(userid) {
	var deleteuser = 'modules/user/deleteuser.php?userid=' + userid;
	$.ajax({
		url : deleteuser,
		success : function(data) {
			afterdeleteuser(data);
		}
	});
}

function afterdeleteuser(data) {
	$('#serverMessage').show();
	if (data) {
		$('#listArea').load("modules/user/list.php?isdefault=false");
		$('#serverMessage').html('Successful');
		$('#serverMessage').addClass('successMessage');
	} else {
		$('#serverMessage').html('Error');
		$('#serverMessage').addClass('errorMessage');
	}
}

function edituser(userid, username) {
	var url = 'modules/user/edituser.php?userid=' + userid + "&username="
			+ username;
	$('#inputArea').load(url);
}
