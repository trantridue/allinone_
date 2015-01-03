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
	var userNameReg = /^[a-z0-9_-]{3,15}$/;
	var nameReg = /^(?!\s*$).+$/;
	var phoneReg = /^[0-9]{9,12}$/;
	
	if (!($("#retype_user_password").val() == $("#user_password").val())){
		$("#retype_user_password").addClass("errorField");
		$("#user_password").addClass("errorField");
		flag = false;
	} else {
		$("#retype_user_password").removeClass("errorField");
		$("#user_password").removeClass("errorField");
	}
	if(!emailReg.test($("#user_email").val())){
		$("#user_email").addClass("errorField");
		flag = false;
	} else {
		$("#user_email").removeClass("errorField");
	}
	if(!userNameReg.test($("#user_username").val())){
		$("#user_username").addClass("errorField");
		flag = false;
	} else {
		$("#user_username").removeClass("errorField");
	}
	if(!nameReg.test($("#user_name").val())){
		$("#user_name").addClass("errorField");
		flag = false;
	}else {
		$("#user_name").removeClass("errorField");
	}
	
	if(!phoneReg.test($("#user_phone_number").val())){
		$("#user_phone_number").addClass("errorField");
		flag = false;
	}else {
		$("#user_phone_number").removeClass("errorField");
	}
	return flag;
};

//////////Import form
function validateImportForm() {
	alert('import form');
	return true;
}