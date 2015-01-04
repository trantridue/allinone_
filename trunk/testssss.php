// ///////Customer Form

function customerpostaction(data, actionType) {
	$('#serverMessage').show();
	var errorMessage = actionType + " Customer error";
	if (actionType == 'passwordnotmatch') {
		errorMessage = "Password not match, please re-type!";
	} else if (actionType == 'emailerror') {
		errorMessage = "Email format not correct, please try again!";
	}
	var successMessage = actionType + " customer successful";
	displayMessageServer(data, errorMessage, successMessage);
}
function validateEditCustomerForm() {
	var nameReg = /^(?!\s*$).+$/;
	var telReg = /^[0-9]{9,12}$/;
	
	var flag1 = validateField(nameReg, 'customer_address');
	var flag2 = validateField(nameReg, 'customer_name');
	var flag3 = validateField(telReg, 'customer_tel');

	return flag1 && flag2 && flag3 ;
}