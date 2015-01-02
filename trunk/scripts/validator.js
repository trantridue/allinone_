function userpostaction(data, actionType) {
	$('#serverMessage').show();
	var errorMessage = actionType + " user error";
	if (actionType == 'passwordnotmatch') {
		errorMessage = "Password not match, please re-type!";
	} else if(actionType == 'emailerror'){
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
function validateEditUserForm() {
	var flag = true;
	var emailReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!($("#retype_user_password").val() == $("#user_password").val())){
		userpostaction("", "passwordnotmatch");
		flag = false;
	} else if(!emailReg.test($("#user_email").val())){
		userpostaction("", "emailerror");
		flag = false;
	}
	
	return flag;
};