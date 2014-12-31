function validateEditUserForm(){
	userpostaction("","passwordnotmatch");
	return $("#retype_user_password").val() == $("#user_password").val();
}