/* COMMON MODULE */
var defaultItemAfterAjax = 100;
function processUrlString(str) {
	var key = new Array();
	var value = new Array();
	key = str.split("&");
	var inputUrl = "";
	for (i in key) {
		value[i] = key[i].split("=")[1];
		key[i] = key[i].split("=")[0];
	}
	for (i in key) {
		inputUrl = inputUrl + key[i] + "=" + value[i] + "&";
	}
	return inputUrl;
}
function processUrlStringEncode(str) {
	var key = new Array();
	var value = new Array();
	key = str.split("&");
	var inputUrl = "";
	for (i in key) {
		value[i] = key[i].split("=")[1];
		key[i] = key[i].split("=")[0];
	}
	for (i in key) {
		inputUrl = inputUrl + key[i] + "=" + encodeURIComponent(value[i]) + "&";
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
			+ "&user_tel=" + user_tel + "&user_mail=" + user_mail
			+ "&username=" + username + "&user_status_hidden="
			+ user_status_hidden + "&name=" + encodeURIComponent(name)
			+ "&user_description=" + encodeURIComponent(user_description);
	$('#listArea').load(url);
}

function deleteuser(userid) {
		var deleteuser = 'modules/user/deleteuser.php?userid=' + userid;
		alert(userid);
		$.ajax( {
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
function changeStatusCustomer() {
	var oldClass = $("#customer_status").attr("class");
	var newClass = "";
	var status_value = '';
	if (oldClass == 'status_on') {
		newClass = 'status_off';
		status_value = '0';
	} else {
		status_value = '1';
		newClass = 'status_on';
	}
	$("#customer_status").addClass(newClass);
	$("#customer_status").removeClass(oldClass);
	$("#customer_status_hidden").val(status_value);
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
$(function() {
	$(".search_customer_name").autocomplete( {
		source : "autocomplete/customername.php",
		minLength : 1
	});
});
function buildSearchImportCriteria() {
	var criteriaString = "isdefault=false&isadvancedsearch="
			+ $('#isadvancedsearch').val();
	// BASIC FIELD
	var product_code = "&product_code=" + $('#product_code').val();
	var product_name = "&product_name=" + $('#product_name').val();
	var provider_name = "&provider_name=" + $('#provider_name').val();
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
	var import_facture_code = "&import_facture_code="
			+ $('#import_facture_code').val();
	var sex_value_search = "&sex_value_search=" + $('#sex_value_search').val();
	// ADVANCED
	var sale_to = "&sale_to=" + $('#sale_to').val();
	var import_quantity_to = "&import_quantity_to="
			+ $('#import_quantity_to').val();
	var import_price_to = "&import_price_to=" + $('#import_price_to').val();
	var export_quantity_to = "&export_quantity_to="
			+ $('#export_quantity_to').val();
	var export_price_to = "&export_price_to=" + $('#export_price_to').val();
	var remain_quantity_to = "&remain_quantity_to="
			+ $('#remain_quantity_to').val();
	var product_code_to = "&product_code_to=" + $('#product_code_to').val();
	var limit_search = "&limit_search=" + $('#limit_search').val();

	criteriaString = criteriaString + product_code + product_name
			+ provider_name + category_name + brand_name + season + season_id
			+ description + import_quantity + import_price + export_quantity
			+ export_price + remain_quantity + datefrom + dateto
			+ import_facture_code + sale + sex_value_search + sale_to
			+ import_quantity_to + import_price_to + export_quantity_to
			+ export_price_to + remain_quantity_to + product_code_to
			+ limit_search;
	return processUrlStringEncode(criteriaString);
}
function listProduct() {
	var url = "modules/import/listproduct.php?" + buildSearchImportCriteria();
	// alert(url);
	$('#mainListArea').load(url);
}
function listProductReload() {
	var url = "modules/import/listproduct.php?loadall=false&isdefault=false";
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
	$.ajax( {
		url : returnproduct,
		success : function(data) {
			var actionType = "return";
			returnimportpostaction(data, actionType);
		}
	});
}
function updateSaleListProduct() {
	var updatesaleproduct = 'modules/import/updatesaleproduct.php?' + buildSearchImportCriteria();
	$.ajax( {
		url : updatesaleproduct,
		success : function(data) {
			$('#listArea').html(data);
			var actionType = "sale";
			$('#limit_search').val(defaultItemAfterAjax);
			updatesalepostaction(data, actionType);
			$('#limit_search').val('');
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
function listReturnProduct() {
	var url = "modules/import/listproductreturn.php?"
			+ buildSearchImportCriteria();
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

	var url = "modules/provider/list.php?" + buildSearchProviderCriteria();
	$('#listArea').load(url);
}
function editprovider(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/provider/editprovider.php?' + inputUrl;
	$('#inputArea').load(url);
	$('#inputArea').show();
	$('#paidArea').hide();
}
function deleteprovider(providerid) {
	var deleteprovider = 'modules/provider/deleteprovider.php?providerid=' + providerid;
	$.ajax( {
		url : deleteprovider,
		success : function(data) {
			var actionType = "delete";
			providerpostaction(data, actionType);
		}
	});
}
function deleteproduct(product_import_id) {
		var delete_product_import_id = 'modules/import/deleteproductimport.php?productimportid=' + product_import_id;
		$.ajax( {
			url : delete_product_import_id,
			success : function(data) {
				if (data == 'success') {
					operationSuccess();
					listProductReload();
				} else {
					operationError();
				}
			}
		});
	
}
function buildSearchProviderCriteria() {
	var criteriaString = "isdefault=false";
	// BASIC FIELD
	var provider_name = "&provider_name=" + $('#provider_name').val();
	var provider_tel = "&provider_tel=" + $('#provider_tel').val();
	var provider_address = "&provider_address=" + $('#provider_address').val();
	var provider_description = "&provider_description="
			+ $('#provider_description').val();
	var total_from = "&total_from=" + $('#total_from').val();
	var total_to = "&total_to=" + $('#total_to').val();
	var paid_from = "&paid_from=" + $('#paid_from').val();
	var paid_to = "&paid_to=" + $('#paid_to').val();
	var remain_from = "&remain_from=" + $('#remain_from').val();
	var remain_to = "&remain_to=" + $('#remain_to').val();

	criteriaString = criteriaString + provider_name + provider_tel
			+ provider_address + provider_description + total_from + total_to
			+ paid_from + paid_to + remain_from + remain_to;
	return processUrlStringEncode(criteriaString);
}
/* CUSTOMER MODULE */
function listCustomer(issearch) {
	var isdefault = "false";
	var url = "modules/customer/list.php" + getCustomerSearchCriteria(issearch);
//	alert(url);
	$('#listArea').load(url);
}
function getCustomerSearchCriteria(issearch) {

	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_customer_name = "&search_customer_name=" + $('#search_customer_name').val();
	var search_customer_tel = "&search_customer_tel=" + $('#search_customer_tel').val();
	
	var create_date_from = "&create_date_from=" + $('#create_date_from').val();
	var create_date_to = "&create_date_to=" + $('#create_date_to').val();
	var update_date_from = "&update_date_from=" + $('#update_date_from').val();
	var update_date_to = "&update_date_to=" + $('#update_date_to').val();
	
	var search_description = "&search_description=" + $('#search_description').val();
	
	str = str + search_customer_name;
	str = str + search_customer_tel;
	str = str + create_date_from;
	str = str + create_date_to;
	str = str + update_date_from;
	str = str + update_date_to;
	str = str + search_description;
	return processUrlStringEncode(str);
}
function editcustomer(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/customer/addForm.php?' + inputUrl;
	$('#customerAddForm').load(url);
}
function deletecustomer(customerid) {
		var deletecustomer = 'modules/customer/deletecustomer.php?customerid=' + customerid;
		$.ajax( {
			url : deletecustomer,
			success : function(data) {
			var actionType = "delete";
			customerpostaction(data, actionType);
			}
		});
}
function updateProduct() {
	var updateproduct = 'modules/import/updateproductimport.php?' + buildProductImportCriteria();
	// alert(buildProductImportCriteria());
	$.ajax( {
		url : updateproduct,
		success : function(data) {
			// alert(data);
		var actionType = "update";
		$('#limit_search').val(defaultItemAfterAjax);
		updateproductpostaction(data, actionType);
		$('#limit_search').val('');
	}
	});
}
function buildProductImportCriteria() {
	var criteriaString = "isdefault=false";

	var edit_import_facture_code = "&edit_import_facture_code="
			+ $('#edit_import_facture_code').val();
	var edit_import_date = "&edit_import_date=" + $('#edit_import_date').val();
	var edit_import_description = "&edit_import_description="
			+ $('#edit_import_description').val();
	var id_edit_provider = "&id_edit_provider=" + $('#id_edit_provider').val();
	var edit_product_code = "&edit_product_code="
			+ $('#edit_product_code').val();
	var edit_product_name = "&edit_product_name="
			+ $('#edit_product_name').val();
	var id_edit_category = "&id_edit_category=" + $('#id_edit_category').val();
	var id_edit_season = "&id_edit_season=" + $('#id_edit_season').val();
	var id_edit_sex = "&id_edit_sex=" + $('#id_edit_sex').val();
	var id_edit_brand = "&id_edit_brand=" + $('#id_edit_brand').val();
	var edit_product_description = "&edit_product_description="
			+ $('#edit_product_description').val();
	var edit_export_price = "&edit_export_price="
			+ $('#edit_export_price').val();
	var edit_sale = "&edit_sale=" + $('#edit_sale').val();
	var edit_link = "&edit_link=" + $('#edit_link').val();
	var edit_id = "&edit_id=" + $('#edit_id').val();
	var edit_quantity = "&edit_quantity=" + $('#edit_quantity').val();
	var edit_deadline = "&edit_deadline=" + $('#edit_deadline').val();
	var edit_deviation = "&edit_deviation=" + $('#edit_deviation').val();
	var edit_import_price = "&edit_import_price="
			+ $('#edit_import_price').val();

	criteriaString = criteriaString + edit_import_facture_code
			+ edit_import_date + edit_import_description + id_edit_provider
			+ edit_product_code + edit_product_name + id_edit_category
			+ id_edit_season + id_edit_sex + id_edit_brand
			+ edit_product_description + edit_export_price + edit_sale
			+ edit_link + edit_id + edit_quantity + edit_deviation
			+ edit_deadline + edit_import_price;

	return processUrlString(criteriaString);
}
// NEWS
function addNews() {
	var addnews = 'modules/news/addnews.php?description='
			+ encodeURIComponent($('#news_description').val()) + "&id="
			+ encodeURIComponent($('#idhidden').val());
	$.ajax( {
		url : addnews,
		success : function(data) {
			if (data != null) {
				listNews('false');
				$('#news_description').val('');
			} else
				alert('error created news!');
			$('#addNewsAreaId').load('modules/news/add.php');
		}
	});
}
function listNews(isdefault) {
	var listnewsurl = 'modules/news/list.php?' + buildSearchNewsCriteria(isdefault);
	$('#listNewsAreaId').load(listnewsurl);
}
function buildSearchNewsCriteria(isdefault) {
	var criteriaString = "isdefault=" + isdefault;
	var search_news_description = "&search_news_description="
			+ $('#search_news_description').val();

	criteriaString = criteriaString + search_news_description;
	return processUrlString(criteriaString);
}
function deletenews(newsid) {
	var deletenews = 'modules/news/deletenews.php?newsid=' + newsid;
	$.ajax( {
		url : deletenews,
		success : function(data) {
			if (data != null)
				listNews('false');
			else
				alert('error deleting news!');
		}
	});
}
function editnews(str) {
	var inputUrl = processUrlString(str);
	var url = 'modules/news/add.php?' + inputUrl;
	$('#addNewsAreaId').load(url);
	$('#addNewsAreaId').show();
	$('#searchNewsAreaId').hide();
}
function show_provider_id(url) {
	var paidProvider = 'modules/provider/paid.php?' + processUrlString(url);
	$('#paidArea').load(paidProvider);
	$('#inputArea').hide();
	$('#paidArea').show();
}
function paidMoneyProvider() {
	var paidMoneyProvider = 'modules/provider/paidnow.php' + getPaidProviderInformation();
	var idprovider = $('#paid_provider_id').val();
	$.ajax( {
		url : paidMoneyProvider,
		success : function(data) {
			if (data == 'true') {
				$('#rightpaid').load(
						"modules/provider/paid_right.php?id=" + idprovider);
				listProvider();
				$('#paid_paid_update').html(
						parseInt($('#paid_paid_update').html())
								+ parseInt($('#paid_amount_1').val())
								+ parseInt($('#paid_amount_2').val())
								+ parseInt($('#paid_amount_3').val()));
				$('#paid_remain_update').html(
						parseInt($('#paid_remain_update').html())
								- parseInt($('#paid_amount_1').val())
								- parseInt($('#paid_amount_2').val())
								- parseInt($('#paid_amount_3').val()));
				$('#paid_remaining').val(
						parseInt($('#paid_remain_update').html()));
				$('#paid_amount_1').val(0);
				$('#paid_amount_2').val(0);
				$('#paid_amount_3').val(0);
			} else
				alert('error paid money provider!');
		}
	});
}
function deletepaidhisto(idpad, amount) {
	if (confirm('Are you sure to delete?')) {
		var provider_id = $('#paid_provider_id').val();
		var oldremain = parseInt($('#paid_remain_update').html());
		var paid = parseInt($('#paid_paid_update').html());
		var urls = 'modules/provider/paiddelete.php?idpad=' + idpad
				+ "&idprovider=" + provider_id;
		$.ajax( {
			url : urls,
			success : function(data) {
				if (data == 'true') {
					$('#rightpaid')
							.load(
									"modules/provider/paid_right.php?id="
											+ provider_id);
					listProvider();
					$('#paid_remain_update').html(oldremain + amount);
					$('#paid_remaining').val(oldremain + amount);
					$('#paid_paid_update').html(paid - amount);
					$('#paid_amount_1').val(0);
					$('#paid_amount_2').val(0);
					$('#paid_amount_3').val(0);
				} else
					alert('error delete payment!');
			}
		});
	} else {
		return false;
	}
}
function getPaidProviderInformation() {
	var str = "";
	var id_paid_fund_1 = "?id_paid_fund_1=" + $('#id_paid_fund_1').val();
	var id_paid_fund_2 = "&id_paid_fund_2=" + $('#id_paid_fund_2').val();
	var id_paid_fund_3 = "&id_paid_fund_3=" + $('#id_paid_fund_3').val();

	var paid_amount_1 = "&paid_amount_1=" + $('#paid_amount_1').val();
	var paid_amount_2 = "&paid_amount_2=" + $('#paid_amount_2').val();
	var paid_amount_3 = "&paid_amount_3=" + $('#paid_amount_3').val();

	var paid_description = "&paid_description=" + $('#paid_description').val();
	var paid_provider_id = "&paid_provider_id=" + $('#paid_provider_id').val();
	var paid_description = "&paid_description=" + $('#paid_description').val();
	var paid_provider_name = "&paid_provider_name="
			+ $('#paid_provider_name').val();

	str = str + id_paid_fund_1 + id_paid_fund_2 + id_paid_fund_3
			+ paid_amount_1 + paid_amount_2 + paid_amount_3 + paid_description
			+ paid_provider_id + paid_provider_name;
	return processUrlString(str);
}
function paidAllByFund(fundName) {
	$('#paid_amount_1').val(0);
	$('#paid_amount_2').val(0);
	$('#paid_amount_3').val(0);
	$('#' + fundName).val(parseInt($('#paid_remain_update').html()));
	calculateProviderPaid();
}

/* SPEND */
function addSpends() {
	var nbrLine = $('#default_number_line_spend').val();
	var urls = 'modules/spend/addspend.php' + getAddSpendInformation(nbrLine);
	$.ajax( {
		url : urls,
		success : function(data) {
			// alert(data);
		if (data == 'success') {
			operationSuccess();
			listSpend('false');
			$('#addSpendFormId')[0].reset();
		} else {
			operationError();
		}
	}
	});
}
function getAddSpendInformation(nbrLine) {

	var params = "?nbrLine=" + nbrLine;
	for ( var i = 1; i <= nbrLine; i++) {
		params = params + "&add_amount_" + i + "="
				+ $('#add_amount_' + i).val();
		params = params + "&add_date_" + i + "=" + $('#add_date_' + i).val();
		params = params + "&id_add_fund_" + i + "="
				+ $('#id_add_fund_' + i).val();
		params = params + "&id_add_user_" + i + "="
				+ $('#id_add_user_' + i).val();
		params = params + "&id_add_category_" + i + "="
				+ $('#id_add_category_' + i).val();
		params = params + "&id_add_for_" + i + "="
				+ $('#id_add_for_' + i).val();
		params = params + "&id_add_type_" + i + "="
				+ $('#id_add_type_' + i).val();
		params = params + "&add_description_" + i + "="
				+ $('#add_description_' + i).val();
	}
	return processUrlString(params);
}
function getUpdateInoutInformation() {

	var params = "?idinout=" + $('#idinout').val();
	;
	params = params + "&add_amount=" + $('#add_amount').val();
	params = params + "&add_date=" + $('#add_date').val();
	params = params + "&id_add_user=" + $('#id_add_user').val();
	params = params + "&id_add_shop=" + $('#id_add_shop').val();
	params = params + "&id_add_type=" + $('#id_add_type').val();
	params = params + "&add_description=" + $('#add_description').val();

	return processUrlString(params);
}
function getUpdateSpendInformation() {

	var params = "?idspend=" + $('#idspend').val();
	;
	params = params + "&add_amount=" + $('#add_amount').val();
	params = params + "&add_date=" + $('#add_date').val();
	params = params + "&id_add_user=" + $('#id_add_user').val();
	params = params + "&id_add_category=" + $('#id_add_category').val();
	params = params + "&id_add_for=" + $('#id_add_for').val();
	params = params + "&id_add_type=" + $('#id_add_type').val();
	params = params + "&add_description=" + $('#add_description').val();

	return processUrlString(params);
}
function listSpend(issearch) {
	var url = "modules/spend/list.php" + getSpendSearchCriteria(issearch);
	$('#listArea').load(url);
}
function getSpendSearchCriteria(issearch) {

	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_amount_from = "&search_amount_from="
			+ $('#search_amount_from').val();
	var search_amount_to = "&search_amount_to=" + $('#search_amount_to').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var search_description = "&search_description="
			+ $('#search_description').val();

	var id_search_user = "&id_search_user=" + $('#id_search_user').val();
	var id_search_category = "&id_search_category="
			+ $('#id_search_category').val();
	var id_search_for = "&id_search_for=" + $('#id_search_for').val();
	var id_search_type = "&id_search_type=" + $('#id_search_type').val();

	str = str + search_amount_from + search_amount_to + search_date_from
			+ search_date_to + search_description + id_search_user
			+ id_search_category + id_search_for + id_search_type;
	return processUrlString(str);
}
function deletespend(id) {
	var urls = 'modules/spend/deletespend.php?id=' + id;
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				listSpend('false');
			} else {
				operationError();
			}
		}
	});
}
function deletemoney_inout(id) {
	var urls = 'modules/inout/deleteinout.php?id=' + id;
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				listInOut('false');
			} else {
				operationError();
			}
		}
	});
}

function editspend(str) {
	var inputparams = processUrlString(str);
	var url = 'modules/spend/editspend.php?' + inputparams;
	$('#editArea').show();
	$('#addArea').hide();
	$('#serverMessage').hide();
	$('#editArea').load(url);
}
function editfund_change_histo(str) {
	var inputparams = processUrlString(str);
	var url = 'modules/fund/editfundhisto.php?' + inputparams;
	$('#addFund').hide();
	$('#searchFund').hide();
	$('#editFund').show();
	$('#serverMessage').hide();
	$('#editFund').load(url);
}
function editmoney_inout(str) {
	var inputparams = processUrlString(str);
	var url = 'modules/inout/editinout.php?' + inputparams;
	$('#editArea').show();
	$('#addArea').hide();
	$('#serverMessage').hide();
	$('#editArea').load(url);
}
function updateSpend() {
	var urls = 'modules/spend/updatespend.php' + getUpdateSpendInformation();
	// alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				listSpend('false');
			} else {
				operationError();
			}
		}
	});
}
function updateInout() {
	var urls = 'modules/inout/updateinout.php' + getUpdateInoutInformation();
	// alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
			// alert(data);
		if (data == 'success') {
			operationSuccess();
			listInOut('true');
		} else {
			operationError();
		}
	}
	});
}
function updateInout() {
	var urls = 'modules/inout/updateinout.php' + getUpdateInoutInformation();
	// alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
			// alert(data);
		if (data == 'success') {
			operationSuccess();
			listInOut('true');
		} else {
			operationError();
		}
	}
	});
}
function operationSuccess() {
	$('#serverMessage').show();
	$('#serverMessage').html('Operation success!');
	$('#serverMessage').addClass('successMessage');
	$('#serverMessage').removeClass('errorMessage');
	// setTimeout(function() {
	// $('#serverMessage').fadeOut('fast');
	// }, 10000);
	// $('#serverMessage').hide();
}
function operationError() {
	$('#serverMessage').show();
	$('#serverMessage').html('Operation failed!');
	$('#serverMessage').removeClass('successMessage');
	$('#serverMessage').addClass('errorMessage');
}
/* MONEY INOUT */
function addInOut() {
	if (validateAddMoneyInout()) {
		saveInOut();
	}
}
function saveInOut() {
	var urls = 'modules/inout/addinout.php' + getAddInoutInformation();
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				listInOut('false');
				$('#addInoutFormId')[0].reset();
			} else {
				operationError();
			}
		}
	});
}

function getAddInoutInformation() {
	var params = '';
	params = params + "?add_amount" + "=" + $('#add_amount').val();
	params = params + "&add_date" + "=" + $('#add_date').val();
	params = params + "&id_add_user" + "=" + $('#id_add_user').val();
	params = params + "&id_add_inout_type" + "="
			+ $('#id_add_inout_type').val();
	params = params + "&id_add_shop" + "=" + $('#id_add_shop').val();
	params = params + "&add_description" + "=" + $('#add_description').val();
	return processUrlString(params);
}
function validateAddMoneyInout() {
	var flag = true;
	if ($('#add_amount').val() == '' || $('#add_amount').val() == '0') {
		$('#add_amount').addClass('errorField');
		flag = false;
	} else {
		$('#add_amount').removeClass('errorField');
	}
	if ($('#id_add_inout_type').val() == ''
			|| $('#id_add_inout_type').val() == null) {
		$('#id_add_inout_type').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_inout_type').removeClass('errorField');
	}

	if ($('#id_add_user').val() == '' || $('#id_add_user').val() == null) {
		$('#id_add_user').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_user').removeClass('errorField');
	}
	if ($('#add_description').val() == ''
			|| $('#add_description').val() == null) {
		$('#add_description').addClass('errorField');
		flag = false;
	} else {
		$('#add_description').removeClass('errorField');
	}
	return flag;
}
function listInOut(issearch) {
	var url = "modules/inout/list.php" + getInoutSearchCriteria(issearch);
	$('#listArea').load(url);
}

function getInoutSearchCriteria(issearch) {

	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_amount_from = "&search_amount_from="
			+ $('#search_amount_from').val();
	var search_amount_to = "&search_amount_to=" + $('#search_amount_to').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var search_description = "&search_description="
			+ $('#search_description').val();

	var id_search_user = "&id_search_user=" + $('#id_search_user').val();
	var id_search_shop = "&id_search_shop=" + $('#id_search_shop').val();
	var id_search_type = "&id_search_type=" + $('#id_search_type').val();

	str = str + search_amount_from + search_amount_to + search_date_from
			+ search_date_to + search_description + id_search_user
			+ id_search_shop + id_search_type;
	return processUrlString(str);
}
function exchangeFund() {
	if (validateExchangeFund()) {
		saveExchange();
	}
}
function addFund() {
	if (validateAddFund()) {
		saveAddFund();
	}
}
function saveAddFund() {
	var urls = 'modules/fund/saveAdd.php' + getFundAddInformation();
	// alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
			alert(data);
			if (data == 'success') {
				operationSuccess();
				reloadFundList();
				$('#fundAddFormId')[0].reset();
			} else {
				operationError();
			}
		}
	});
}
function saveExchange() {
	var urls = 'modules/fund/saveExchange.php' + getFundExchangeInformation();
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				reloadFundList();
				$('#fundExchangeFormId')[0].reset();
			} else {
				operationError();
			}
		}
	});
}
function saveOrderProduct() {
	var urls = 'modules/export/saveOrder.php' + getOrderInformation();
	// alert(validateOrderForm());
	if (validateOrderForm()) {
		$.ajax( {
			url : urls,
			success : function(data) {
				// alert(data);
			if (data == 'success') {
				operationSuccess();
				$('#order_product_code').val('');
				$('#order_size').val('');
				$('#order_qty').val(1);
				$('#order_color').val('');
				$('#order_description').val('');
				$('#order_product_code').removeClass("errorField");
				$('#order_size').removeClass("errorField");
				$('#order_color').removeClass("errorField");
				$('#order_description').removeClass("errorField");
				$('#customer_tel').removeClass("errorField");
				$('#customer_name').removeClass("errorField");
				reloadCustomerOrder();
			} else {
				operationError();
			}
		}
		});
	}
}
function validateOrderForm() {
	return validateBlankField('customer_tel')&& validateBlankField('customer_name') 
			&& validateBlankField('order_size')
			&& validateBlankField('order_color')
			&& validateBlankField('order_description')
			&& validateBlankField('order_product_code');
}
function isFactureInforBlank(){
	return ($('#customer_reserve_more').val()=='' || $('#customer_reserve_more').val()=='0') &&
	($('#customer_give').val()=='' || $('#customer_give').val()=='0') &&
	($('#give_customer').val()=='' || $('#give_customer').val()=='0');
}
function validateAddFund() {
	var flag = true;
	// if($('#id_add_fund').val()=='' || $('#id_add_fund').val()==null) {
	// $('#id_add_fund').addClass('errorField');
	// flag = false;
	// } else {
	// $('#id_add_fund').removeClass('errorField');
	// }
	if ($('#id_add_user').val() == '' || $('#id_add_user').val() == null) {
		$('#id_add_user').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_user').removeClass('errorField');
	}

	if ($('#add_amount').val() == '' || $('#add_amount').val() == '0') {
		$('#add_amount').addClass('errorField');
		flag = false;
	} else {
		$('#add_amount').removeClass('errorField');
	}
	if ($('#add_ratio').val() == '' || $('#add_ratio').val() == '0') {
		$('#add_ratio').addClass('errorField');
		flag = false;
	} else {
		$('#add_ratio').removeClass('errorField');
	}
	if ($('#add_description').val() == ''
			|| $('#add_description').val() == null) {
		$('#add_description').addClass('errorField');
		flag = false;
	} else {
		$('#add_description').removeClass('errorField');
	}

	return flag;
}
function validateExchangeFund() {
	var flag = true;
	if ($('#id_exchange_fund_source').val() == ''
			|| $('#id_exchange_fund_source').val() == null) {
		$('#id_exchange_fund_source').addClass('errorField');
		flag = false;
	} else {
		$('#id_exchange_fund_source').removeClass('errorField');
	}
	if ($('#id_exchange_fund_destination').val() == ''
			|| $('#id_exchange_fund_destination').val() == null) {
		$('#id_exchange_fund_destination').addClass('errorField');
		flag = false;
	} else {
		$('#id_exchange_fund_destination').removeClass('errorField');
	}

	if ($('#exchange_source_amount').val() == ''
			|| $('#exchange_source_amount').val() == '0') {
		$('#exchange_source_amount').addClass('errorField');
		flag = false;
	} else {
		$('#exchange_source_amount').removeClass('errorField');
	}

	if ($('#exchange_destination_amount').val() == ''
			|| $('#exchange_destination_amount').val() == '0') {
		$('#exchange_destination_amount').addClass('errorField');
		flag = false;
	} else {
		$('#exchange_destination_amount').removeClass('errorField');
	}

	if ($('#exchange_description').val() == ''
			|| $('#exchange_description').val() == null) {
		$('#exchange_description').addClass('errorField');
		flag = false;
	} else {
		$('#exchange_description').removeClass('errorField');
	}
	if ($('#id_exchange_fund_source').val() == $(
			'#id_exchange_fund_destination').val()) {
		$('#id_exchange_fund_source').addClass('errorField');
		$('#id_exchange_fund_destination').addClass('errorField');
		flag = false;
	} else {
		$('#id_exchange_fund_source').removeClass('errorField');
		$('#id_exchange_fund_destination').removeClass('errorField');
	}
	return flag;
}
function getFundAddInformation() {
	var params = '';
	params = params + "?id_add_fund" + "=" + $('#id_add_fund').val();
	params = params + "&fund_id_txt" + "=" + $('#fund_id_txt').val();
	params = params + "&id_add_user" + "=" + $('#id_add_user').val();
	params = params + "&add_date" + "=" + $('#add_date').val();
	params = params + "&add_amount" + "=" + $('#add_amount').val();
	params = params + "&add_ratio" + "=" + $('#add_ratio').val();
	params = params + "&add_description" + "=" + $('#add_description').val();
	return processUrlString(params);
}
function getFundExchangeInformation() {
	var params = '';
	params = params + "?id_exchange_fund_source" + "="
			+ $('#id_exchange_fund_source').val();
	params = params + "&id_exchange_fund_destination" + "="
			+ $('#id_exchange_fund_destination').val();
	params = params + "&exchange_date" + "=" + $('#exchange_date').val();
	params = params + "&exchange_destination_ratio" + "="
			+ $('#exchange_destination_ratio').val();
	params = params + "&exchange_source_ratio" + "="
			+ $('#exchange_source_ratio').val();
	params = params + "&exchange_source_amount" + "="
			+ $('#exchange_source_amount').val();
	params = params + "&exchange_destination_amount" + "="
			+ $('#exchange_destination_amount').val();
	params = params + "&exchange_description" + "="
			+ $('#exchange_description').val();
	return processUrlString(params);
}
function getOrderInformation() {
	var params = '';
	params = params + "?customer_tel" + "=" + $('#customer_tel').val();
	params = params + "&customer_name" + "=" + $('#customer_name').val();
	params = params + "&order_product_code" + "="
			+ $('#order_product_code').val();
	params = params + "&order_qty" + "=" + $('#order_qty').val();
	params = params + "&order_size" + "=" + $('#order_size').val();
	params = params + "&order_color" + "=" + $('#order_color').val();
	params = params + "&order_description" + "="
			+ $('#order_description').val();
	return processUrlStringEncode(params);
}
function updateExchangeFundSourceAmount() {
	var sourceAmount = 0;
	var destAmount = 0;
	var sourceRatio = 1;
	var destRatio = 1;

	if ($('#exchange_destination_amount').val() != '') {
		destAmount = parseInt($('#exchange_destination_amount').val());
	}
	if ($('#exchange_source_ratio').val() != '') {
		sourceRatio = parseInt($('#exchange_source_ratio').val());
	}
	if ($('#exchange_destination_ratio').val() != '') {
		destRatio = parseInt($('#exchange_destination_ratio').val());
	}
	$('#exchange_source_amount').val(destAmount * destRatio / sourceRatio);
}
function updateExchangeFundDestAmount() {
	var sourceAmount = 0;
	var destAmount = 0;
	var sourceRatio = 1;
	var destRatio = 1;

	if ($('#exchange_source_amount').val() != '') {
		sourceAmount = parseInt($('#exchange_source_amount').val());
	}
	if ($('#exchange_source_ratio').val() != '') {
		sourceRatio = parseInt($('#exchange_source_ratio').val());
	}
	if ($('#exchange_destination_ratio').val() != '') {
		destRatio = parseInt($('#exchange_destination_ratio').val());
	}
	$('#exchange_destination_amount').val(
			sourceAmount * sourceRatio / destRatio);
}
function listHistoFund(issearch) {
	var url = "modules/fund/list.php" + getFundSearchCriteria(issearch);
	// alert(url);
	$('#histoFund').load(url);
}
function getFundSearchCriteria(issearch) {

	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_amount_from = "&search_amount_from="
			+ $('#search_amount_from').val();
	var search_amount_to = "&search_amount_to=" + $('#search_amount_to').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var search_description = "&search_description="
			+ $('#search_description').val();

	var id_search_user = "&id_search_user=" + $('#id_search_user').val();
	var id_search_fund = "&id_search_fund=" + $('#id_search_fund').val();
	// var id_search_type = "&id_search_type=" + $('#id_search_type').val();

	str = str + search_amount_from + search_amount_to + search_date_from
			+ search_date_to + search_description + id_search_user
			+ id_search_fund
	// + id_search_type
	;
	return processUrlString(str);
}
function deletefund_change_histo(id) {
	var urls = 'modules/fund/deletefundhisto.php?id=' + id;
	$.ajax( {
		url : urls,
		success : function(data) {
		if (data == 'success') {
			operationSuccess();
			reloadFundList();
		} else {
			operationError();
		}
	}
	});
}
function deleteExportFacture(id,facture_code) {
		var urls = 'modules/export/deleteExportFacture.php?export_facture_code=' + facture_code;
		$.ajax( {
			url : urls,
			success : function(data) {
//			$("#exportSearch").html(data);
				if (data == 'success') {
					operationSuccess();
					location.reload();
				} else {
					operationError();
				}
			}
		});
}
function reloadFundList() {
	$('#listFund').load('modules/fund/listFund.php?isdefault=false');
	listHistoFund('true');
}
function updateFund() {
	var urls = 'modules/fund/updatefundhisto.php' + getUpdateFundInformation();
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				reloadFundList();
				$('#searchFund').show();
				$('#editFund').hide();
			} else {
				operationError();
			}
		}
	});
}
function getUpdateFundInformation() {
	var params = '';
	params = params + "?id_edit_fund" + "=" + $('#id_edit_fund').val();
	params = params + "&id_edit_user" + "=" + $('#id_edit_user').val();
	params = params + "&id_histo_fund" + "=" + $('#id_histo_fund').val();
	params = params + "&edit_date" + "=" + $('#edit_date').val();
	params = params + "&edit_amount" + "=" + $('#edit_amount').val();
	params = params + "&edit_ratio" + "=" + $('#edit_ratio').val();
	params = params + "&edit_description" + "=" + $('#edit_description').val();
	return processUrlString(params);
}
/* EXPORT */
function saveExport() {
	if(validateExportForm()) {
	var urls = 'modules/export/saveExport.php' + getExportProductParameter();
//	alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
//		alert(data);
		$("#exportSearch").html(data);
			if (data == 'success') {
				operationSuccess();
				location.reload();
			} else {
				operationError();
			}
		}
	});
	} else {
//		alert('do nothing');
	}
}
function validateExportForm() {
	var flag = true;
	
	var export_number_row = parseInt($('#export_number_row').val());
	var customer_tel = $('#customer_tel').val();
	var customer_id = $('#customer_id').val();
	var export_date = $('#export_date').val();
	var customer_name = $('#customer_name').val();
	var id_export_shop = $('#id_export_shop').val();
	var export_date = $('#export_date').val();
	var customer_description = $('#customer_description').val();
	
	var isBoss = $('#isBoss').is(":checked");
	var useBonus = $('#useBonus').is(":checked");
	var byCard = $('#byCard').is(":checked");
	var customer_debt = $('#customer_debt').html();
	var customer_reserved = $('#customer_reserved').html();
	var customer_returned = $('#customer_returned').html();
	var total_facture = $('#total_facture').html();
	var customer_bonus = $('#customer_bonus').html();
	var final_total = $('#final_total').html();
	var customer_reserve_more = $('#customer_reserve_more').val();
	var customer_give = $('#customer_give').val();
	var give_customer = $('#give_customer').val();
	var id_search_user = $('#id_search_user').val();
	var listProductReturnId = $('#listProductReturnId').val();
	var listProductReturnQty = $('#listProductReturnQty').val();
	//Validate  date export 
	if(export_date > getCurrentDate_YYYYmmdd()){
		return showNote('Không nhập ngày trong tương lai!');
	}
	//Validate tel & name
	if(customer_tel !='' && customer_name==''){
		return showNote('Tên khách phải nhập nếu đã nhập số điện thoại');
	}
	//Validate cannot give negative amount
	if(customer_give < 0){
		return showNote('Khách không thể đưa số tiền âm!');
	}
	//Validate byCard not debt 
	if(byCard && (give_customer < 0)){
		return showNote('Thanh toán thẻ thì không nợ!');
	}
	
	//Validate tel and use bonus 
	if(customer_tel =='' && useBonus){
		return showNote('Khách dùng điểm thưởng phải nhập số điện thoại');
	}
	// validate facture infor blank
	if(isFactureInforBlank()){
		return showNote('Không nhập được hóa đơn trống!');
	}
 	//Validate list product
	for(var i =1;i<=export_number_row;i++) {
		var code_field = 'productcode_' + i;
		var qty_field = 'quantity_' + i;
		var price_field = 'exportprice_' + i;
		var code_val = $('#'+code_field).val();
		var qty_val = $('#'+qty_field).val();
		var price_val = $('#'+price_field).val();
		if(!((code_val !='' && price_val !='') || (code_val =='' && price_val =='')))  {
			return showNote('Nhập sai tại dòng số ' + i);
		} 
	}
	
	return flag;
}
function getCurrentDate_YYYYmmdd(){
	var today = new Date();
	var thismonthtoday = today.getMonth()+1;
	if(thismonthtoday<10) thismonthtoday = '0' + thismonthtoday;
	var thisdatetoday = today.getDate();
	if(thisdatetoday<10) thisdatetoday = '0' + thisdatetoday;
	var strDate = 'Y-m-d'
	  .replace('Y', today.getFullYear())
	  .replace('m', thismonthtoday)
	  .replace('d', thisdatetoday);
	return strDate;
}
function showNote(msg) {
	$('#noteForEmployee').show();
	$('#noteForEmployee').css('background-color','red');
	$('#noteForEmployee').css('color','yellow');
	$('#noteForEmployee').html(msg);
	return false;
}
function getExportProductParameter() {
	var str = '';
	var export_number_row = parseInt($('#export_number_row').val());
	var customer_tel = $('#customer_tel').val();
	var customer_id = $('#customer_id').val();
	var export_date = $('#export_date').val();
	var customer_name = $('#customer_name').val();
	var id_export_shop = $('#id_export_shop').val();
	var export_date = $('#export_date').val();
	var customer_description = $('#customer_description').val();
	
	var isBoss = $('#isBoss').is(":checked");
	var useBonus = $('#useBonus').is(":checked");
	var byCard = $('#byCard').is(":checked");
	var customer_debt = $('#customer_debt').html();
	var customer_reserved = $('#customer_reserved').html();
	var customer_returned = $('#customer_returned').html();
	var total_facture = $('#total_facture').html();
	var customer_bonus = $('#customer_bonus').html();
	var final_total = $('#final_total').html();
	var customer_reserve_more = $('#customer_reserve_more').val();
	var customer_give = $('#customer_give').val();
	var give_customer = $('#give_customer').val();
	var id_search_user = $('#id_search_user').val();
	var listProductReturnId = $('#listProductReturnId').val();
	var listProductReturnQty = $('#listProductReturnQty').val();
	
	str = str + "?customer_tel=" + customer_tel;
	str = str + "&customer_id=" + customer_id;
	str = str + "&export_date=" + export_date;
	str = str + "&customer_name=" + customer_name;
	str = str + "&id_export_shop=" + id_export_shop;
	str = str + "&customer_description=" + customer_description;
	str = str + "&isBoss=" + isBoss;
	str = str + "&useBonus=" + useBonus;
	str = str + "&byCard=" + byCard;
	str = str + "&customer_debt=" + customer_debt;
	str = str + "&customer_reserved=" + customer_reserved;
	str = str + "&customer_returned=" + customer_returned;
	str = str + "&total_facture=" + total_facture;
	str = str + "&customer_bonus=" + customer_bonus;
	str = str + "&final_total=" + final_total;
	str = str + "&customer_reserve_more=" + customer_reserve_more;
	str = str + "&customer_give=" + customer_give;
	str = str + "&give_customer=" + give_customer;
	str = str + "&export_date=" + export_date;
	str = str + "&id_search_user=" + id_search_user;
	str = str + "&export_number_row=" + export_number_row;
	str = str + "&listProductReturnQty=" + listProductReturnQty;
	str = str + "&listProductReturnId=" + listProductReturnId;
	
	for(var i =1;i<=export_number_row;i++) {
		var code_field = 'productcode_' + i;
		var qty_field = 'quantity_' + i;
		var price_field = 'exportprice_' + i;
		var code_val = $('#'+code_field).val();
		var qty_val = $('#'+qty_field).val();
		var price_val = $('#'+price_field).val();
		if(code_val !='') {
			str = str + "&"+code_field+"=" + code_val;
			str = str + "&"+qty_field+"=" + qty_val;
			str = str + "&"+price_field+"=" + price_val;
		}
	}
	
	return processUrlStringEncode(str);
}
function calculateExportForm() {
	var nbrow = parseInt($('#export_number_row').val());
//	updateCheckBoxIfIsboss();
	validateQuantity(nbrow);
	calculateTotalQuality(nbrow);
	calculateTotalFactureOrigin(nbrow);
	calculateTotalFactureSaled(nbrow);
	calculateTotalFactureFinal();
	calculateGiveCustomer();
	updateCheckBoxIfIsboss();
}
function updateCheckBoxIfIsboss() {
	var isBoss = $('#isBoss').is(":checked");
	if (isBoss) {
		$('#useBonus').prop('checked', false);
		$('#byCard').prop('checked', false);
		$('#customer_give').val(parseInt($('#final_total').html()));
		$('#isBoss').hide();
		$('#customer_reserve_more').hide();
		$('#customer_give').hide();
		$('#customer_reserve_more_label').show();
		$('#customer_give_label').show();
		$('#customer_reserve_more_label').html($('#customer_reserve_more').val());
		$('#customer_give_label').html($('#customer_give').val());
		$('#give_customer').val(0);
		$("#noteForEmployee").show();
		$("#noteForEmployee").html('Không phải nhập gì, chỉ cần lưu vào máy!');
		$("#isBossLabel").css('background-color','yellow');
		$("#isBossLabel").html($('#customer_name').val()+' Lấy');
	} else {
		$("#noteForEmployee").hide();
		$('#customer_reserve_more').show();
		$('#customer_give').show();
		$('#customer_reserve_more_label').hide();
		$('#customer_give_label').hide();
	}
}

function calculateGiveCustomer() {
	$('#give_customer').val(
			$('#customer_give').val() - $('#final_total').html());
}
function dbclickCustomerGive() {
	$('#customer_give').val(parseInt($('#final_total').html()));
	calculateExportForm();
}
function calculateTotalFactureFinal() {
	var usedBonus = $('#useBonus').is(":checked");
	var isBoss = $('#isBoss').is(":checked");
	if (usedBonus) {
		if(isBoss){
			$('#final_total').html(
					parseInt($('#customer_reserve_more').val())
							+ parseInt($('#total_facture').html())
							+ parseInt($('#customer_debt').html())
							- parseInt($('#customer_returned').html())
							- parseInt($('#customer_reserved').html()));
		} else {
			$('#final_total').html(
					parseInt($('#customer_reserve_more').val())
							+ parseInt($('#total_facture').html())
							+ parseInt($('#customer_debt').html())
							- parseInt($('#customer_returned').html())
							- parseInt($('#customer_bonus').html())
							- parseInt($('#customer_reserved').html()));
		}
	} else {
		$('#final_total').html(
				parseInt($('#customer_reserve_more').val())
						+ parseInt($('#total_facture').html())
						+ parseInt($('#customer_debt').html())
						- parseInt($('#customer_returned').html())
						- parseInt($('#customer_reserved').html()));
	}
	
}

function validateQuantity(nbrow) {
	for ( var i = 1; i <= nbrow; i++) {
		if ($('#quantity_' + i).val() == 0) {
			$('#quantity_' + i).addClass('errorField');
			$('#quantity_' + i).val(1);
		} else {
			$('#quantity_' + i).removeClass('errorField');
		}
	}
}
function calculateTotalQuality(nbrow) {
	var total = 0;
	for ( var i = 1; i <= nbrow; i++) {
		if ($('#productcode_' + i).val() != '') {
			total = total + parseInt($('#quantity_' + i).val());
		}
	}
	$('#total_quantity').html(total);
}
function calculateTotalFactureOrigin(nbrow) {
	var total = 0;
	for ( var i = 1; i <= nbrow; i++) {
		if ($('#productcode_' + i).val() != '') {
			total = total + parseInt($('#quantity_' + i).val())
					* parseInt($('#exportpostedprice_' + i).html());
		}
	}
	$('#total_origine').html(total);
}
function calculateTotalFactureSaled(nbrow) {
	var total = 0;
	for ( var i = 1; i <= nbrow; i++) {
		if ($('#productcode_' + i).val() != '') {
			total = total + parseInt($('#quantity_' + i).val())
					* parseInt($('#exportprice_' + i).val());
		}
	}
	$('#total_after_saled').html(total);
	$('#total_facture').html(total);
	$('#sale_different').html(parseInt($('#total_origine').html()) - total);
	$('#sale_percentage')
			.html(
					Math.round((1 - (total / parseInt($('#total_origine')
							.html()))) * 100));
	$('#sale_percentage').prop(
			'title',
			((1 - (total / parseInt($('#total_origine').html()))) * 100)
					.toFixed(2));
}
$(function() {
	$(".productcode").autocomplete( {
		source : "autocomplete/productcode.php",
		minLength : 1
	});
});
$(function() {
	$(".productname").autocomplete( {
		source : "autocomplete/productname.php",
		minLength : 1
	});
});
$(function() {
	$(".order_size").autocomplete( {
		source : "autocomplete/order_size.php",
		minLength : 1
	});
});
$(function() {
	$(".order_color").autocomplete( {
		source : "autocomplete/order_color.php",
		minLength : 1
	});
});
function cancelExportLine(line) {
	$('#productcode_' + line).val('');
	$('#productname_' + line).html('');
	$('#exportpostedprice_' + line).html('');
	$('#quantity_' + line).val(1);
	$('#exportprice_' + line).val('');
	calculateExportForm();
}
$(document).ready(
		function() {
			var ac_config_export_customer_tel = {
				source : "autocomplete/completed_export_customer_tel.php",
				select : function(event, ui) {
					$("#customer_tel").val(ui.item.tel);
					$("#customer_id").val(ui.item.id);
					$("#customer_name").val(ui.item.name);
					$("#customer_debt").html(ui.item.debt);
					$("#customer_reserved").html(ui.item.reserved);
					$("#customer_bonus_td").prop(
							'title',
							"<ul><li>Tổng : " + ui.item.totalbuy
									+ "</li><br><li>Điểm Đã Dùng : "
									+ ui.item.bonus_used + "</li></ul>");
					$("#customer_bonus").html(ui.item.bonus);
					$("#isBoss").prop('checked', ui.item.isboss);
					calculateExportForm();
				},
				minLength : 1
			};
			$("#customer_tel").autocomplete(ac_config_export_customer_tel);
		});
$(document).ready(function() {
	var ac_config_fund = {
		source : "autocomplete/completed_fund.php",
		select : function(event, ui) {
			$("#fund_id_txt").val(ui.item.name);
			$("#id_add_fund").val(ui.item.id);
		},
		minLength : 1
	};
	$("#fund_id_txt").autocomplete(ac_config_fund);
});
function updateCusIdWhenChangeTel() {
	$("#customer_name").val('');
	$("#customer_id").val('');
	$("#customer_debt").html('0');
	$("#customer_reserved").html('0');
	// $("#customer_returned").html('0');
	$("#customer_bonus").html('0');
	$("#isBoss").prop('checked', false);

	calculateExportForm();
}
function updatePriceProduct() {
	if ($('#salefacture').val() < 0) {
		$('#salefacture').val('0');
	} else if ($('#salefacture').val() > 100) {
		$('#salefacture').val('100');
	}
	for ( var i = 1; i <= 10; i++) {
		if ($('#productcode_' + i).val() != '')
			$('#exportprice_' + i).val(
					Math.ceil(parseInt($('#exportpostedprice_' + i).html())
							* (100 - $('#salefacture').val()) / 100));
	}
	calculateExportForm();
}
function reloadCustomerOrder() {
	$('#exportOrderList').load(
			'modules/export/exportOrderList.php?isdefault=false');
}
function show_customer_order_id(str) {
	var urls = 'modules/export/updatecustomerorder.php?' + str;
	// alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
			if (data == 'success') {
				operationSuccess();
				reloadCustomerOrder();
			} else {
				operationError();
			}
		}
	});
}
function changeStatusFor(i) {

	var hidenVal = $('#id_add_for_' + i).val();
	if (hidenVal == 1) {
		$('#id_add_for_' + i).val(2);
		$('#spend_for_btn_' + i).val('CỬA HÀNG');
		$('#spend_for_btn_' + i).addClass('shopStyle');
	} else {
		$('#id_add_for_' + i).val(1);
		$('#spend_for_btn_' + i).val(' GIA  ĐÌNH ');
		$('#spend_for_btn_' + i).removeClass('shopStyle');
	}
}
function changeReturnQty(line) {
	var quantity_return = "quantity_return_" + line;
	var quantity = "quantity_re_" + line;
	if ($('#' + quantity_return).val() <= 0)
		$('#' + quantity_return).val(1);
	if ($('#' + quantity_return).val() > $('#' + quantity).val())
		$('#' + quantity_return).val($('#' + quantity).val());
	updateListProductAndTotalReturn();
}
function checkTheReturnCheckBox() {
	// alert('checkTheReturnCheckBox()');
	updateListProductAndTotalReturn();
}
function updateListProductAndTotalReturn() {
	var nbrLine = $('#numberlineexport').val();
	var totalReturn = 0;
	var lstReturnId = '';
	var lstReturnQty = '';
	for ( var i = 1; i <= nbrLine; i++) {
		var isCheckedReturn = $('#checkbox_return_' + i).is(":checked");
		if (isCheckedReturn) {
			var qty_return = parseInt($('#quantity_return_' + i).val());
			var export_price = parseInt($('#export_price_' + i).val());
			var export_facture_product_id = $('#export_facture_product_id_' + i)
					.val();
			totalReturn = totalReturn + qty_return * export_price;
			lstReturnId = lstReturnId + export_facture_product_id + ";";
			lstReturnQty = lstReturnQty + qty_return + ";";
		}
	}
	$('#customer_returned').html(totalReturn);
	$('#listProductReturnId').val(lstReturnId);
	$('#listProductReturnQty').val(lstReturnQty);
	calculateExportForm();
}
function resetHiddenFundId() {
	$("#id_add_fund").val('');
}
function searchExportFull(issearch) {
	searchExport(issearch, 'exportList', 'exportList');
	
	if ($('#exportReturn').css('display') != "none") {
		searchExport(issearch, 'exportReturn', 'exportReturn');
	}
	if ($('#exportOrderList').css('display') != "none") {
		searchExport(issearch, 'exportOrderList', 'exportOrderList');
	}
	if ($('#exportDebt').css('display') != "none") {
		searchExport(issearch, 'exportDebt', 'exportDebt');	
	}
}
function searchExport(issearch, divid, filename) {
	var url = "modules/export/" + filename + ".php"
			+ getExportSearchCriteria(issearch);
//	alert(url);
//	alert(divid);
	$('#' + divid).load(url);
}
function getExportSearchCriteria(issearch) {

	var str = "?issearch=" + issearch + "&isdefault=false";
	var isAdminField = "&isAdminField=" + $('#isAdminField').val();
	var search_customer_name = "&search_customer_name="
			+ $('#search_customer_name').val();
	var search_product_code = "&search_product_code="
			+ $('#search_product_code').val();
	var search_price_from = "&search_price_from="
			+ $('#search_price_from').val();
	var search_price_to = "&search_price_to=" + $('#search_price_to').val();
	var default_nbr_days_load_export = "&default_nbr_days_load_export=" + $('#default_nbr_days_load_export').val();
	var search_customer_tel = "&search_customer_tel="
			+ $('#search_customer_tel').val();

	var search_product_name = "&search_product_name="
			+ $('#search_product_name').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var id_search_shop = "&id_search_shop=" + $('#id_search_shop').val();
	var id_search_user = "&id_search_user=" + $('#id_search_user').val();

	str = str + search_customer_name + search_product_code + search_price_from
			+ search_price_to + search_customer_tel + search_product_name
			+ search_date_from + search_date_to + id_search_shop
			+ default_nbr_days_load_export
			+ id_search_user + isAdminField;
	return processUrlStringEncode(str);
}
function reloadParams() {
	var urls = 'modules/config/reloadparams.php';
	$.ajax( {
		url : urls,
		success : function(data) {
			operationSuccess();
		}
	});
}
$(document).ready(function() {
	$(".search_customer_name").focus(function() {
		$(this).select();
	});
});