/* COMMON MODULE */
function processUrlString(str) {
	var key = new Array();
	var value = new Array();
	key = str.split("&");
	var inputUrl = "";
	for (i in key) {
		value[i] = encodeURIComponent(key[i].split("=")[1]);
		key[i] = key[i].split("=")[0];
	}
	for (i in key) {
		inputUrl = inputUrl + key[i] + "=" + value[i] + "&";
	}
	return inputUrl;
}

/* USER MODULE */
function listUser() {
	var isdefault = "false";
	var username = $('#user_username').val();
	var name = $('#user_name').val();
	var url = "modules/user/list.php" + "?isdefault=" + isdefault
			+ "&username=" + username + "&name=" + encodeURIComponent(name);
	$('#listArea').load(url);
}

function deleteuser(userid) {
	var deleteuser = 'modules/user/deleteuser.php?userid=' + userid;
	$.ajax({
		url : deleteuser,
		success : function(data) {
			var actionType = "delete";
			userpostaction(data, actionType);
		}
	});
}
function edituser(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/user/edituser.php?' + inputUrl;
	$('#inputArea').load(url);
}
function changeStatusUser() {
	var oldClass = $("#user_status").attr("class");
	var newClass = "";
	var status_value = '';
	if (oldClass == 'status_on') {
		newClass = 'status_off';
		status_value = 'n';
	} else {
		status_value = 'y';
		newClass = 'status_on';
	}
	$("#user_status").addClass(newClass);
	$("#user_status").removeClass(oldClass);
	$("#user_status_hidden").val(status_value);
}
/* IMPORT MODULE */
function changeSex(i) {
	var oldClass = $("#sex_" + i).attr("class");
	var newClass = "";
	var sex_value = "";
	if (oldClass == 'sex_man') {
		newClass = 'sex_woman';
		sex_value = 'WOMAN';
		sexval = '1';
	} else {
		sex_value = 'MAN';
		sexval = '2';
		newClass = 'sex_man';
	}
	$("#sex_" + i).addClass(newClass);
	$("#sex_" + i).removeClass(oldClass);
	$("#sex_" + i).html(sex_value);
	$("#sex_value_" + i).val(sexval);
}
function resetCategoryId(i) {
	$("#category_id_" + i).val('');
}
function resetBrandId(i) {
	$("#brand_id_" + i).val('');
}
function resetExisted(i) {
	$("#isExisted_" + i).val('false');
}
function resetProviderId() {
	$("#provider_id").val('');
}
$(document).ready(function() {
	var ac_config_import_facture = {
		source : "autocomplete/completed_import_facture_code.php",
		select : function(event, ui) {
			$("#import_facture_code").val(ui.item.code);
			$("#description").val(ui.item.description);
			$("#provider_name").val(ui.item.provider_name);
			$("#provider_id").val(ui.item.provider_id);
			$("#continueImport").val("true");
		},
		minLength : 1
	};
	$("#import_facture_code").autocomplete(ac_config_import_facture);
});
$(document).ready(function() {
	var ac_config_provider_name = {
		source : "autocomplete/completed_import_provider_name.php",
		select : function(event, ui) {
			$("#provider_name").val(ui.item.code);
			$("#provider_id").val(ui.item.provider_id);
		},
		minLength : 1
	};
	$("#provider_name").autocomplete(ac_config_provider_name);
});

$(document).ready(function() {
	var ac_config_season = {
		source : "autocomplete/completed_import_season.php",
		select : function(event, ui) {
			$("#season").val(ui.item.code);
			$("#season_id").val(ui.item.season_id);
		},
		minLength : 1
	};
	$("#season").autocomplete(ac_config_season);
});
$(document).ready(function() {
	var ac_config_product_code = {
		source : "autocomplete/completed_import_products_code.php",
		select : function(event, ui) {
			$("#product_code").val(ui.item.code);
		},
		minLength : 1
	};
	$("#product_code").autocomplete(ac_config_product_code);
});
$(document).ready(function() {
	var ac_config_product_code = {
		source : "autocomplete/completed_import_products_code.php",
		select : function(event, ui) {
			$("#product_code_to").val(ui.item.code);
		},
		minLength : 1
	};
	$("#product_code_to").autocomplete(ac_config_product_code);
});

$(document).ready(function() {
	var ac_config_category = {
		source : "autocomplete/completed_import_category.php",
		select : function(event, ui) {
			$("#category_name").val(ui.item.code);
		},
		minLength : 1
	};
	$("#category_name").autocomplete(ac_config_category);
});
$(document).ready(function() {
	var ac_config_brand = {
		source : "autocomplete/completed_import_brand.php",
		select : function(event, ui) {
			$("#brand_name").val(ui.item.code);
		},
		minLength : 1
	};
	$("#brand_name").autocomplete(ac_config_brand);
});
$(function() {
	$(".product_name").autocomplete( {
		source : "autocomplete/productname.php",
		minLength : 1
	});
});
function buildSearchImportCriteria(){
	var criteriaString = "isdefault=false&isadvancedsearch="+$('#isadvancedsearch').val();
	alert(criteriaString);
}
function listProduct() {
//	buildSearchImportCriteria();
	var isdefault = "false";
	var product_code = $('#product_code').val();
	var product_name = $('#product_name').val();
	var provider_name = $('#provider_name').val();
	var category_name = $('#category_name').val();
	var brand_name = $('#brand_name').val();
	var season = $('#season').val();
	var season_id = $('#season_id').val();
	var description = $('#description').val();

	var url = "modules/import/listproduct.php" + "?isdefault=" + isdefault
			+ "&product_code=" + encodeURIComponent(product_code)
			+ "&product_name=" + encodeURIComponent(product_name)
			+ "&category_name=" + encodeURIComponent(category_name)
			+ "&brand_name=" + encodeURIComponent(brand_name) + "&season="
			+ encodeURIComponent(season) + "&provider_name="
			+ encodeURIComponent(provider_name) + "&season_id="
			+ encodeURIComponent(season_id) + "&description="
			+ encodeURIComponent(description);
	$('#mainListArea').load(url);
}
function show_product_season_id(url) {
	$('#suplementaryListArea').html(url);
}
function show_product_provider_id(url) {
	$('#suplementaryListArea').html(url);
}
function show_product_import_facture_code(url) {
	$('#suplementaryListArea').html(url);
}
function show_product_product_code(url) {
	$('#suplementaryListArea').html(url);
}
function insertReturnProduct(codes, quantities, descriptions, providers) {
	var returnproduct = 'modules/import/addreturnproduct.php?codes=' + codes
			+ '&quantities=' + quantities + '&descriptions=' + descriptions
			+ '&providers=' + providers;
	$.ajax({
		url : returnproduct,
		success : function(data) {
			var actionType = "return";
			returnimportpostaction(data, actionType);
		}
	});
}
function updateSaleListProduct(sale,product_code,product_name,provider_name,category_name, brand_name, season_id, description) {
	var updatesaleproduct = 'modules/import/updatesaleproduct.php?sale=' + sale
			+ '&product_code=' + product_code 
			+ '&product_name=' + product_name
			+ '&provider_name=' + provider_name
			+ '&category_name=' + category_name
			+ '&brand_name=' + brand_name
			+ '&season_id=' + season_id
			+ '&description=' + description;
	$.ajax({
		url : updatesaleproduct,
		success : function(data) {
			alert(data);
			var actionType = "sale";
			updatesalepostaction(data, actionType);
		}
	});
}
function saleListProduct() {
	var sale = $('#sale').val();
	var product_code = encodeURIComponent($('#product_code').val());
	var product_name = encodeURIComponent($('#product_name').val());
	var provider_name = encodeURIComponent($('#provider_name').val());
	var category_name = encodeURIComponent($('#category_name').val());
	var brand_name = encodeURIComponent($('#brand_name').val());
	var season_id = $('#season_id').val();
	var description = encodeURIComponent($('#description').val());
	
	if (sale == '' || parseFloat(sale) == 0) {
		alert("Nhập sale khác 0");
		$('#sale').focus();
		$('#sale').addClass("errorField");
	} else {
		$('#sale').removeClass("errorField");
		if (confirm('Muốn sale-off ' + sale + '% các sản phẩm bên dưới?')) {
			updateSaleListProduct(sale,product_code,product_name,provider_name,category_name, brand_name, season_id, description);
		}
	}
}
function listReturnProduct(){
	var isdefault = "false";
	var product_code = $('#product_code').val();
	var product_name = $('#product_name').val();
	var provider_name = $('#provider_name').val();
	var category_name = $('#category_name').val();
	var brand_name = $('#brand_name').val();
	var season = $('#season').val();
	var season_id = $('#season_id').val();
	var description = $('#description').val();

	var url = "modules/import/listproductreturn.php" + "?isdefault=" + isdefault
			+ "&product_code=" + encodeURIComponent(product_code)
			+ "&product_name=" + encodeURIComponent(product_name)
			+ "&category_name=" + encodeURIComponent(category_name)
			+ "&brand_name=" + encodeURIComponent(brand_name) + "&season="
			+ encodeURIComponent(season) + "&provider_name="
			+ encodeURIComponent(provider_name) + "&season_id="
			+ encodeURIComponent(season_id) + "&description="
			+ encodeURIComponent(description);
	$('#listReturnProductArea').load(url);
}
/* PROVIDER MODULE */
function listProvider() {
	var isdefault = "false";
	var name = $('#provider_name').val();
	var url = "modules/provider/list.php" + "?isdefault=" + isdefault
			+ "&name=" + encodeURIComponent(name);
	$('#listArea').load(url);
}
function editprovider(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/provider/editprovider.php?' + inputUrl;
	$('#inputArea').load(url);
}
function deleteprovider(providerid) {
	var deleteprovider = 'modules/provider/deleteprovider.php?providerid='
			+ providerid;
	$.ajax({
		url : deleteprovider,
		success : function(data) {
			var actionType = "delete";
			providerpostaction(data, actionType);
		}
	});
}
/* CUSTOMER MODULE */
function listCustomer() {
	var isdefault = "false";
	var name = $('#customer_name').val();
	var url = "modules/customer/list.php" + "?isdefault=" + isdefault
			+ "&name=" + encodeURIComponent(name);
	$('#listArea').load(url);
}
function editcustomer(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/customer/editcustomer.php?' + inputUrl;
	$('#inputArea').load(url);
}
function deletecustomer(customerid) {
	var deletecustomer = 'modules/customer/deletecustomer.php?customerid='
			+ customerid;
	$.ajax({
		url : deletecustomer,
		success : function(data) {
			var actionType = "delete";
			customerpostaction(data, actionType);
		}
	});
}
