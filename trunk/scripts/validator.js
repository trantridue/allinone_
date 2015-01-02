function validateEditUserForm() {
	var flag = true;
	alert($("#user_email").val())
	var emailReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!($("#retype_user_password").val() == $("#user_password").val())){
		userpostaction("", "passwordnotmatch");
		flag = false;
	} else if(!emailReg.test($("#user_email").val())){
		userpostaction("", "email");
		flag = false;
	}
	
	return flag;
};