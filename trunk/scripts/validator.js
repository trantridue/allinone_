function validateEditUserForm(){
	var flag = ($("#retype_user_password").val() == $("#user_password").val());
	if(!flag) userpostaction("","passwordnotmatch");
	return flag;
}