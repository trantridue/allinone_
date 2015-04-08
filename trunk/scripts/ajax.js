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
	var user_mail = $('#user_mail').val();
	var user_tel = $('#user_tel').val();
	var user_status_hidden = $('#user_status_hidden').val();
	var user_description = $('#user_description').val();
	var url = "modules/user/list.php" + "?isdefault=" + isdefault
			+ "&user_tel=" + user_tel 
			+ "&user_mail=" + user_mail 
			+ "&username=" + username 
			+ "&user_status_hidden=" + user_status_hidden 
			+ "&name=" + encodeURIComponent(name)
			+ "&user_description=" + encodeURIComponent(user_description);
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
	var ac_config_provider_name1 = {
		source : "autocomplete/completed_import_provider_name.php",
		select : function(event, ui) {
			$("#provider_name1").val(ui.item.code);
			$("#provider_id1").val(ui.item.provider_id);
		},
		minLength : 1
	};
	$("#provider_name1").autocomplete(ac_config_provider_name1);
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
	// BASIC FIELD
	var product_code = "&product_code="+$('#product_code').val();
	var product_name = "&product_name="+$('#product_name').val();
	var provider_name ="&provider_name=" + $('#provider_name').val();
	var category_name = "&category_name=" + $('#category_name').val();
	var sale = "&sale=" + $('#sale').val();
	var brand_name = "&brand_name=" + $('#brand_name').val();
	var season = "&season=" + $('#season').val();
	var season_id = "&season_id=" + $('#season_id').val();
	var description = "&description=" + $('#description').val();
	var import_quantity = "&import_quantity=" + $('#import_quantity').val();
	var import_price = "&import_price=" + $('#import_price').val();
	var export_quantity = "&export_quantity=" + $('#export_quantity').val();
	var export_price = "&export_price=" + $('#export_price').val();
	var remain_quantity = "&remain_quantity=" + $('#remain_quantity').val();
	var datefrom = "&datefrom=" + $('#datefrom').val();
	var dateto = "&dateto=" + $('#dateto').val();
	var import_facture_code = "&import_facture_code=" + $('#import_facture_code').val();
	var sex_value_search = "&sex_value_search=" + $('#sex_value_search').val();
	// ADVANCED
	var sale_to = "&sale_to=" + $('#sale_to').val();
	var import_quantity_to = "&import_quantity_to=" + $('#import_quantity_to').val();
	var import_price_to = "&import_price_to=" + $('#import_price_to').val();
	var export_quantity_to = "&export_quantity_to=" + $('#export_quantity_to').val();
	var export_price_to = "&export_price_to=" + $('#export_price_to').val();
	var remain_quantity_to = "&remain_quantity_to=" + $('#remain_quantity_to').val();
	var product_code_to = "&product_code_to=" + $('#product_code_to').val();
	
	criteriaString = criteriaString + product_code + product_name + provider_name 
					+ category_name + brand_name + season + season_id + description
					+ import_quantity + import_price + export_quantity + export_price 
					+ remain_quantity + datefrom + dateto + import_facture_code + sale 
					+ sex_value_search + sale_to + import_quantity_to + import_price_to
					+ export_quantity_to + export_price_to + remain_quantity_to
					+ product_code_to;
	return processUrlString(criteriaString);
}
function listProduct() {
	var url = "modules/import/listproduct.php?" + buildSearchImportCriteria();
// alert(url);
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
function updateSaleListProduct() {
	var updatesaleproduct = 'modules/import/updatesaleproduct.php?' + buildSearchImportCriteria();
	alert(updatesaleproduct);
	$.ajax({
		url : updatesaleproduct,
		success : function(data) {
			var actionType = "sale";
			updatesalepostaction(data, actionType);
		}
	});
}
function saleListProduct() {
	var sale = $('#sale').val();
	if (sale == '' || parseFloat(sale) == 0) {
		alert("Nhập sale khác 0");
		$('#sale').focus();
		$('#sale').addClass("errorField");
	} else {
		$('#sale').removeClass("errorField");
		if (confirm('Muốn sale-off ' + sale + '% các sản phẩm bên dưới?')) {
			updateSaleListProduct();
		}
	}
}
function listReturnProduct(){
	var url = "modules/import/listproductreturn.php?" + buildSearchImportCriteria();
	$('#listReturnProductArea').load(url);
}
function editproduct(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/import/editproductimport.php?' + inputUrl;
	$('#suplementaryListArea').show();
	$('#suplementaryListArea').load(url);
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
function deleteproduct(product_import_id){
	var delete_product_import_id = 'modules/import/deleteproductimport.php?productimportid='
		+ product_import_id;
$.ajax({
	url : delete_product_import_id,
	success : function(data) {
		var actionType = "delete";
		productimportpostaction(data, actionType);
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
function updateProduct() {
	var updateproduct = 'modules/import/updateproductimport.php?' + buildProductImportCriteria();
// alert(updateproduct);
	$.ajax({
		url : updateproduct,
		success : function(data) {
// alert(data);
			var actionType = "update";
			updateproductpostaction(data, actionType);
		}
	});
}
function buildProductImportCriteria(){
	var criteriaString = "isdefault=false";
	
	var edit_import_facture_code = "&edit_import_facture_code="+$('#edit_import_facture_code').val();
	var edit_import_date = "&edit_import_date="+$('#edit_import_date').val();
	var edit_import_description = "&edit_import_description="+$('#edit_import_description').val();
	var id_edit_provider = "&id_edit_provider="+$('#id_edit_provider').val();
	var edit_product_code = "&edit_product_code="+$('#edit_product_code').val();
	var edit_product_name = "&edit_product_name="+$('#edit_product_name').val();
	var id_edit_category = "&id_edit_category="+$('#id_edit_category').val();
	var id_edit_season = "&id_edit_season="+$('#id_edit_season').val();
	var id_edit_sex = "&id_edit_sex="+$('#id_edit_sex').val();
	var id_edit_brand = "&id_edit_brand="+$('#id_edit_brand').val();
	var edit_product_description = "&edit_product_description="+$('#edit_product_description').val();
	var edit_export_price = "&edit_export_price="+$('#edit_export_price').val();
	var edit_sale = "&edit_sale="+$('#edit_sale').val();
	var edit_link = "&edit_link="+$('#edit_link').val();
	var edit_id = "&edit_id="+$('#edit_id').val();
	var edit_quantity = "&edit_quantity="+$('#edit_quantity').val();
	var edit_deviation = "&edit_deviation="+$('#edit_deviation').val();
	var edit_import_price = "&edit_import_price="+$('#edit_import_price').val();
	
	criteriaString = criteriaString 
					+ edit_import_facture_code 
					+ edit_import_date 
					+ edit_import_description 
					+ id_edit_provider 
					+ edit_product_code 
					+ edit_product_name 
					+ id_edit_category 
					+ id_edit_season 
					+ id_edit_sex 
					+ id_edit_brand 
					+ edit_product_description 
					+ edit_export_price 
					+ edit_sale 
					+ edit_link 
					+ edit_id 
					+ edit_quantity 
					+ edit_deviation 
					+ edit_import_price 
					;
	
	return processUrlString(criteriaString);
}
// NEWS
function addNews() {
	var addnews = 'modules/news/addnews.php?description=' + encodeURIComponent($('#news_description').val());
	$.ajax({
		url : addnews,
		success : function(data) {
			if(data != null) {
				listNews('false');
				$('#news_description').val('');
			}
			else alert('error created news!');
		}
	});
}
function listNews(isdefault) {
	var listnewsurl = 'modules/news/list.php?' + buildSearchNewsCriteria(isdefault);
	$('#listNewsAreaId').load(listnewsurl);
}
function buildSearchNewsCriteria(isdefault){
	var criteriaString = "isdefault="+isdefault;
	var search_news_description = "&search_news_description="+$('#search_news_description').val();
	
	criteriaString = criteriaString + search_news_description;
	return processUrlString(criteriaString);
}