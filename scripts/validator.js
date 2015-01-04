//////////COMMON
function displayMessageServer(data, errorMessage, successMessage) {
	if (data && data != '') {
		$('#listArea').load("modules/provider/list.php?isdefault=false");
		$('#serverMessage').html(successMessage);
		$('#serverMessage').addClass('successMessage');
		$('#serverMessage').removeClass('errorMessage');
	} else {
		$('#serverMessage').html(errorMessage);
		$('#serverMessage').addClass('errorMessage');
		$('#serverMessage').removeClass('successMessage');
	}
}
function validateField(reg, fieldid) {
	if (!reg.test($("#" + fieldid).val())) {
		$("#" + fieldid).addClass("errorField");
		return false;
	} else {
		$("#" + fieldid).removeClass("errorField");
		return true;
	}
}
function validatePassword(passwordid, repasswordid) {
	if (!($("#" + passwordid).val() == $("#" + repasswordid).val())) {
		$("#" + passwordid).addClass("errorField");
		$("#" + repasswordid).addClass("errorField");
		return false;
	} else {
		$("#" + passwordid).removeClass("errorField");
		$("#" + repasswordid).removeClass("errorField");
		return true;
	}
}
// /////////USER
function userpostaction(data, actionType) {
	$('#serverMessage').show();
	var errorMessage = actionType + " user error";
	if (actionType == 'passwordnotmatch') {
		errorMessage = "Password not match, please re-type!";
	} else if (actionType == 'emailerror') {
		errorMessage = "Email format not correct, please try again!";
	}
	var successMessage = actionType + " user successful";

	displayMessageServer(data, errorMessage, successMessage);
}
function validateEditUserForm() {
	var flag = true;
	var emailReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var userNameReg = /^[a-z0-9_-]{3,15}$/;
	var nameReg = /^(?!\s*$).+$/;
	var phoneReg = /^[0-9]{9,12}$/;
	
	var flag1 = validateField(userNameReg, 'user_username');
	var flag2 = validateField(emailReg, 'user_email');
	var flag3 = validateField(nameReg, 'user_name');
	var flag4 = validateField(phoneReg, 'user_phone_number');
	var flag5 = validatePassword('user_password', 'retype_user_password');

	return flag && flag1 && flag2 && flag3 && flag4 && flag5;
};

// ////////Import form
function validateImportForm() {
	alert('import form');
	return true;
}
// ///////Provider Form

function providerpostaction(data, actionType) {
	$('#serverMessage').show();
	var errorMessage = actionType + " Provider error";
	if (actionType == 'passwordnotmatch') {
		errorMessage = "Password not match, please re-type!";
	} else if (actionType == 'emailerror') {
		errorMessage = "Email format not correct, please try again!";
	}
	var successMessage = actionType + " provider successful";
	displayMessageServer(data, errorMessage, successMessage);
}
function validateEditProviderForm() {
	var nameReg = /^(?!\s*$).+$/;
	var telReg = /^[0-9]{9,12}$/;
	
	var flag1 = validateField(nameReg, 'provider_address');
	var flag2 = validateField(nameReg, 'provider_name');
	var flag3 = validateField(telReg, 'provider_tel');

	return flag1 && flag2 && flag3 ;
}
