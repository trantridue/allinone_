function listUser() {
	var isdefault = "false";
	var username = $('#user_name_id').val();
	var url = "modules/user/list.php" + "?username=" + username
			+ "&isdefault=" + isdefault;
	$('#listArea').load(url);
}