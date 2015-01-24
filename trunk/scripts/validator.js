//////////COMMON
function validateBlankField(fieldid) {
	if ($("#" + fieldid).val() == "") {
		$("#" + fieldid).addClass("errorField");
		if (fieldid == "provider_id")
			$("#provider_name").addClass("errorField");
		return false;
	} else {
		$("#" + fieldid).removeClass("errorField");
		if (fieldid == "provider_id")
			$("#provider_name").removeClass("errorField");
		return true;
	}
}
function displayMessageServer(data, errorMessage, successMessage, module) {
	if (data && data != '') {
		$('#listArea').load("modules/" + module + "/list.php?isdefault=false");
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

	displayMessageServer(data, errorMessage, successMessage, "user");
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
	var flag = true;
	var flagRowWrong = true;
	var flg_provider_name = true;
	var flg_description = true;
	var dataRow = 0;
	var totalRow = $("#totalRow").val();
	var atLeastOneNotNul = false;
	var allNotNull = false;
	// validate the blank field
	var flg_import_facture_code = validateBlankField("import_facture_code");
	var flg_provider_name = validateBlankField("provider_name");
	var flg_provider_id = validateBlankField("provider_id");
	var flg_description = validateBlankField("description");
	var flg_season = validateBlankField("season");

	flag = flg_import_facture_code && flg_provider_name && flg_description
			&& flg_provider_id && flg_season;
	// if (!flag) return false;
	// validate product line
	for (var i = 1; i <= totalRow; i++) {
		var code = '#code_' + i;
		var name = '#name_' + i;
		var qty = '#qty_' + i;
		var post = '#post_' + i;
		var impr = '#impr_' + i;

		codeval = $(code).val();
		nameval = $(name).val();
		qtyval = $(qty).val();
		postval = $(post).val();
		imprval = $(impr).val();

		if (codeval != '' && nameval != '') {
			dataRow++;
		}
		$("#dataRow").val(dataRow);

		allNotNull = !(nameval != '' && qtyval != '' && postval != '' && imprval != '');
		atLeastOneNotNul = (nameval != '' || qtyval != '' || postval != '' || imprval != '');

		if (allNotNull && atLeastOneNotNul) {
			$(name).addClass("errorField");
			$(qty).addClass("errorField");
			$(impr).addClass("errorField");
			$(post).addClass("errorField");
			flagRowWrong = false;
		} else {
			$(name).removeClass("errorField");
			$(qty).removeClass("errorField");
			$(impr).removeClass("errorField");
			$(post).removeClass("errorField");
		}
	}
	if ($("#dataRow").val() == '0') {
		alert("Please add some product!");
		flagdata = false;
	}
	return flagRowWrong && flag && flagdata;
	// return true;
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
	displayMessageServer(data, errorMessage, successMessage, "provider");
}
function validateEditProviderForm() {
	var nameReg = /^(?!\s*$).+$/;
	var telReg = /^[0-9]{9,12}$/;

	var flag1 = validateField(nameReg, 'provider_address');
	var flag2 = validateField(nameReg, 'provider_name');
	var flag3 = validateField(telReg, 'provider_tel');

	return flag1 && flag2 && flag3;
}
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
	displayMessageServer(data, errorMessage, successMessage, "customer");
}
function validateEditCustomerForm() {
	var nameReg = /^(?!\s*$).+$/;
	var telReg = /^[0-9]{9,12}$/;

	var flag2 = validateField(nameReg, 'customer_name');
	var flag3 = validateField(telReg, 'customer_tel');

	return flag2 && flag3;
}
function calculateImportFacture() {
	var total = 0;
	var totalRow = parseInt($("#totalRow").val());
	for (var i = 1; i < totalRow; i++) {
		var qty = ($("#qty_1").val() == "") ? 0
				: parseInt($("#qty_" + i).val());
		var impr = ($("#impr_1").val() == "") ? 0 : parseFloat($("#impr_" + i)
				.val());
		if (impr && qty)
			total = total + qty * impr;
	}
	$("#total_facture").val(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}
function toggleDiv(divID) {
	if($('#'+divID).css('display')=="none") {
		$('#'+divID).show();
	} else {
		$('#'+divID).hide();
	}
}
function returnimportpostaction(data, actionType) {
	alert('aa');
	$('#serverMessage').show();
	var errorMessage = actionType + " product error";
	var successMessage = actionType + " product successful";
	displayMessageServer(data, errorMessage, successMessage, "product");
}