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
	if(confirm('Are you sure to delete?')) {
		var deleteuser = 'modules/user/deleteuser.php?userid=' + userid;
		$.ajax( {
			url : deleteuser,
			success : function(data) {
				var actionType = "delete";
				userpostaction(data, actionType);
			}
		});
	} else {
		return false;
	}
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
			+ export_price_to + remain_quantity_to + product_code_to + limit_search;
	return processUrlString(criteriaString);
}
function listProduct() {
	var url = "modules/import/listproduct.php?" + buildSearchImportCriteria();
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
	if(confirm('Are you sure to delete?')) {
		var deleteprovider = 'modules/provider/deleteprovider.php?providerid=' + providerid;
		$.ajax( {
			url : deleteprovider,
			success : function(data) {
				var actionType = "delete";
				providerpostaction(data, actionType);
			}
		});
	} else {
		return false;
	}
}
function deleteproduct(product_import_id) {
	if(confirm('Are you sure to delete?')) {
		var delete_product_import_id = 'modules/import/deleteproductimport.php?productimportid=' + product_import_id;
		$.ajax( {
			url : delete_product_import_id,
			success : function(data) {
				var actionType = "delete";
				productimportpostaction(data, actionType);
			}
		});
	} else {
		return false;
	}
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
	return processUrlString(criteriaString);
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
	if(confirm('Are you sure to delete?')) {
		var deletecustomer = 'modules/customer/deletecustomer.php?customerid=' + customerid;
		$.ajax( {
			url : deletecustomer,
			success : function(data) {
				var actionType = "delete";
				customerpostaction(data, actionType);
			}
		});
	}else {
		return false;
	}
}
function updateProduct() {
	var updateproduct = 'modules/import/updateproductimport.php?' + buildProductImportCriteria();
//	alert(buildProductImportCriteria());
	$.ajax( {
		url : updateproduct,
		success : function(data) {
//		alert(data);
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
			+ edit_link + edit_id + edit_quantity + edit_deviation + edit_deadline
			+ edit_import_price;

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
	if(confirm('Are you sure to delete?')) {
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
	} else {
		return false;
	}
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
	if(confirm('Are you sure to delete?')) {
		var provider_id = $('#paid_provider_id').val();
		var oldremain = parseInt($('#paid_remain_update').html());
		var paid = parseInt($('#paid_paid_update').html());
		var urls = 'modules/provider/paiddelete.php?idpad=' + idpad
				+ "&idprovider=" + provider_id;
		$.ajax( {
			url : urls,
			success : function(data) {
				if (data == 'true') {
					$('#rightpaid').load(
							"modules/provider/paid_right.php?id=" + provider_id);
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
function paidAllByFund(fundName){
	$('#paid_amount_1').val(0);
	$('#paid_amount_2').val(0);
	$('#paid_amount_3').val(0);
	$('#'+ fundName).val(parseInt($('#paid_remain_update').html()));
	calculateProviderPaid();
}

/* SPEND */
function addSpends() {
	var nbrLine = $('#default_number_line_spend').val();
	var urls = 'modules/spend/addspend.php' + getAddSpendInformation(nbrLine);
	$.ajax( {
		url : urls,
		success : function(data) {
//			alert(data);
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
	for (var i = 1; i <= nbrLine; i++) {
		params = params + "&add_amount_" + i + "=" + $('#add_amount_' + i).val();
		params = params + "&add_date_" + i + "=" + $('#add_date_' + i).val();
		params = params + "&id_add_fund_" + i + "=" + $('#id_add_fund_' + i).val();
		params = params + "&id_add_user_" + i + "=" + $('#id_add_user_' + i).val();
		params = params + "&id_add_category_" + i + "=" + $('#id_add_category_' + i).val();
		params = params + "&id_add_for_" + i + "=" + $('#id_add_for_' + i).val();
		params = params + "&id_add_type_" + i + "=" + $('#id_add_type_' + i).val();
		params = params + "&add_description_" + i + "=" + $('#add_description_' + i).val();
	}
	return processUrlString(params);
}
function getUpdateInoutInformation() {
	
	var params = "?idinout=" + $('#idinout').val();; 
	params = params + "&add_amount=" + $('#add_amount').val();
	params = params + "&add_date=" + $('#add_date').val();
	params = params + "&id_add_user=" + $('#id_add_user').val();
	params = params + "&id_add_shop=" + $('#id_add_shop').val();
	params = params + "&id_add_type=" + $('#id_add_type').val();
	params = params + "&add_description=" + $('#add_description').val();
	
	return processUrlString(params);
}
function getUpdateSpendInformation() {
	
	var params = "?idspend=" + $('#idspend').val();; 
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
function getSpendSearchCriteria(issearch){
	
	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_amount_from = "&search_amount_from=" + $('#search_amount_from').val();
	var search_amount_to = "&search_amount_to=" + $('#search_amount_to').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var search_description = "&search_description=" + $('#search_description').val();

	var id_search_user = "&id_search_user=" + $('#id_search_user').val();
	var id_search_category = "&id_search_category=" + $('#id_search_category').val();
	var id_search_for = "&id_search_for=" + $('#id_search_for').val();
	var id_search_type = "&id_search_type=" + $('#id_search_type').val();
	
	str = str + search_amount_from 
			+ search_amount_to 
			+ search_date_from 
			+ search_date_to 
			+ search_description 
			+ id_search_user 
			+ id_search_category 
			+ id_search_for 
			+ id_search_type 
	;
	return processUrlString(str);
}
function deletespend(id) {
	if(confirm('Are you sure to delete?')) {
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
}
function deletemoney_inout(id) {
	if(confirm('Are you sure to delete?')) {
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
	} else {
		return false;
	}
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
function updateSpend(){
	var urls = 'modules/spend/updatespend.php' + getUpdateSpendInformation();
//	alert(urls);
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
function updateInout(){
	var urls = 'modules/inout/updateinout.php' + getUpdateInoutInformation();
//	alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
//			alert(data);
		if (data == 'success') {
			operationSuccess();
			listInOut('true');
		} else {
			operationError();
		}
	}
	});
}
function updateInout(){
	var urls = 'modules/inout/updateinout.php' + getUpdateInoutInformation();
//	alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
//			alert(data);
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
}
function operationError() {
	$('#serverMessage').show();
	$('#serverMessage').html('Operation failed!');
	$('#serverMessage').removeClass('successMessage');
	$('#serverMessage').addClass('errorMessage');
}
/* MONEY INOUT */
function addInOut() {
	if(validateAddMoneyInout()) {
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
	params = params + "&id_add_inout_type" + "=" + $('#id_add_inout_type').val();
	params = params + "&id_add_shop" + "=" + $('#id_add_shop').val();
	params = params + "&add_description" + "=" + $('#add_description').val();
return processUrlString(params);
}
function validateAddMoneyInout(){
	var flag = true;
	if($('#add_amount').val()=='' || $('#add_amount').val()=='0') {
		$('#add_amount').addClass('errorField');
		flag = false;
	} else {
		$('#add_amount').removeClass('errorField');
	}
	if($('#id_add_inout_type').val()=='' || $('#id_add_inout_type').val()== null) {
		$('#id_add_inout_type').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_inout_type').removeClass('errorField');
	}
	
	if($('#id_add_user').val()=='' || $('#id_add_user').val()== null) {
		$('#id_add_user').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_user').removeClass('errorField');
	}
	if($('#add_description').val()=='' || $('#add_description').val()== null) {
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

function getInoutSearchCriteria(issearch){
	
	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_amount_from = "&search_amount_from=" + $('#search_amount_from').val();
	var search_amount_to = "&search_amount_to=" + $('#search_amount_to').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var search_description = "&search_description=" + $('#search_description').val();

	var id_search_user = "&id_search_user=" + $('#id_search_user').val();
	var id_search_shop = "&id_search_shop=" + $('#id_search_shop').val();
	var id_search_type = "&id_search_type=" + $('#id_search_type').val();
	
	str = str + search_amount_from 
			+ search_amount_to 
			+ search_date_from 
			+ search_date_to 
			+ search_description 
			+ id_search_user 
			+ id_search_shop 
			+ id_search_type 
	;
	return processUrlString(str);
}
function exchangeFund(){
	if(validateExchangeFund()) {
		saveExchange();
	}
}
function addFund(){
	if(validateAddFund()) {
		saveAddFund();
	}
}
function saveAddFund() {
	var urls = 'modules/fund/saveAdd.php' + getFundAddInformation();
//	alert(urls);
	$.ajax( {
		url : urls,
		success : function(data) {
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
function validateAddFund(){
	var flag = true;
	if($('#id_add_fund').val()=='' || $('#id_add_fund').val()==null) {
		$('#id_add_fund').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_fund').removeClass('errorField');
	}
	if($('#id_add_user').val()=='' || $('#id_add_user').val()== null) {
		$('#id_add_user').addClass('errorField');
		flag = false;
	} else {
		$('#id_add_user').removeClass('errorField');
	}
	
	if($('#add_amount').val()=='' || $('#add_amount').val()== '0') {
		$('#add_amount').addClass('errorField');
		flag = false;
	} else {
		$('#add_amount').removeClass('errorField');
	}
	if($('#add_ratio').val()=='' || $('#add_ratio').val()== '0') {
		$('#add_ratio').addClass('errorField');
		flag = false;
	} else {
		$('#add_ratio').removeClass('errorField');
	}
	if($('#add_description').val()=='' || $('#add_description').val()== null) {
		$('#add_description').addClass('errorField');
		flag = false;
	} else {
		$('#add_description').removeClass('errorField');
	}
	
	return flag;
}
function validateExchangeFund(){
	var flag = true;
	if($('#id_exchange_fund_source').val()=='' || $('#id_exchange_fund_source').val()==null) {
		$('#id_exchange_fund_source').addClass('errorField');
		flag = false;
	} else {
		$('#id_exchange_fund_source').removeClass('errorField');
	}
	if($('#id_exchange_fund_destination').val()=='' || $('#id_exchange_fund_destination').val()== null) {
		$('#id_exchange_fund_destination').addClass('errorField');
		flag = false;
	} else {
		$('#id_exchange_fund_destination').removeClass('errorField');
	}
	
	if($('#exchange_source_amount').val()=='' || $('#exchange_source_amount').val()== '0') {
		$('#exchange_source_amount').addClass('errorField');
		flag = false;
	} else {
		$('#exchange_source_amount').removeClass('errorField');
	}
	
	if($('#exchange_destination_amount').val()=='' || $('#exchange_destination_amount').val()== '0') {
		$('#exchange_destination_amount').addClass('errorField');
		flag = false;
	} else {
		$('#exchange_destination_amount').removeClass('errorField');
	}
	
	if($('#exchange_description').val()=='' || $('#exchange_description').val()== null) {
		$('#exchange_description').addClass('errorField');
		flag = false;
	} else {
		$('#exchange_description').removeClass('errorField');
	}
	if($('#id_exchange_fund_source').val()==$('#id_exchange_fund_destination').val()) {
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
	params = params + "&id_add_user" + "=" + $('#id_add_user').val();
	params = params + "&add_date" + "=" + $('#add_date').val();
	params = params + "&add_amount" + "=" + $('#add_amount').val();
	params = params + "&add_ratio" + "=" + $('#add_ratio').val();
	params = params + "&add_description" + "=" + $('#add_description').val();
	return processUrlString(params);
}
function getFundExchangeInformation() {
	var params = '';
	params = params + "?id_exchange_fund_source" + "=" + $('#id_exchange_fund_source').val();
	params = params + "&id_exchange_fund_destination" + "=" + $('#id_exchange_fund_destination').val();
	params = params + "&exchange_date" + "=" + $('#exchange_date').val();
	params = params + "&exchange_destination_ratio" + "=" + $('#exchange_destination_ratio').val();
	params = params + "&exchange_source_ratio" + "=" + $('#exchange_source_ratio').val();
	params = params + "&exchange_source_amount" + "=" + $('#exchange_source_amount').val();
	params = params + "&exchange_destination_amount" + "=" + $('#exchange_destination_amount').val();
	params = params + "&exchange_description" + "=" + $('#exchange_description').val();
	return processUrlString(params);
}
function updateExchangeFundSourceAmount() {
	var sourceAmount = 0;
	var destAmount = 0;
	var sourceRatio = 1;
	var destRatio = 1;
	
	if($('#exchange_destination_amount').val()!='') {
		destAmount = parseInt($('#exchange_destination_amount').val());
	}
	if($('#exchange_source_ratio').val()!='') {
		sourceRatio = parseInt($('#exchange_source_ratio').val());
	}
	if($('#exchange_destination_ratio').val()!='') {
		destRatio = parseInt($('#exchange_destination_ratio').val());
	}
	$('#exchange_source_amount').val(destAmount*destRatio/sourceRatio);	
}
function updateExchangeFundDestAmount() {
	var sourceAmount = 0;
	var destAmount = 0;
	var sourceRatio = 1;
	var destRatio = 1;
	
	if($('#exchange_source_amount').val()!='') {
		sourceAmount = parseInt($('#exchange_source_amount').val());
	}
	if($('#exchange_source_ratio').val()!='') {
		sourceRatio = parseInt($('#exchange_source_ratio').val());
	}
	if($('#exchange_destination_ratio').val()!='') {
		destRatio = parseInt($('#exchange_destination_ratio').val());
	}
	$('#exchange_destination_amount').val(sourceAmount*sourceRatio/destRatio);	
}
function listHistoFund(issearch) {
	var url = "modules/fund/list.php" + getFundSearchCriteria(issearch);
//	alert(url);
	$('#histoFund').load(url);
}
function getFundSearchCriteria(issearch){
	
	var str = "?issearch=" + issearch + "&isdefault=false";
	var search_amount_from = "&search_amount_from=" + $('#search_amount_from').val();
	var search_amount_to = "&search_amount_to=" + $('#search_amount_to').val();
	var search_date_from = "&search_date_from=" + $('#search_date_from').val();
	var search_date_to = "&search_date_to=" + $('#search_date_to').val();
	var search_description = "&search_description=" + $('#search_description').val();

	var id_search_user = "&id_search_user=" + $('#id_search_user').val();
	var id_search_fund = "&id_search_fund=" + $('#id_search_fund').val();
//	var id_search_type = "&id_search_type=" + $('#id_search_type').val();
	
	str = str + search_amount_from 
			+ search_amount_to 
			+ search_date_from 
			+ search_date_to 
			+ search_description 
			+ id_search_user 
			+ id_search_fund 
//			+ id_search_type 
	;
	return processUrlString(str);
}
function deletefund_change_histo(id) {
	if(confirm('Are you sure to delete?')) {
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
	} else {
		return false;
	}
}
function reloadFundList() {
	$('#listFund').load('modules/fund/listFund.php?isdefault=false');
	listHistoFund('true');
}
function updateFund(){
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
function saveExport(){
//	$('#customer_debt').html('1000');
}
function calculateExportForm(){
	if($('#quantity_1').val()==0) {
		$('#quantity_1').addClass('errorField');
		$('#quantity_1').val(1);
	}
	$('#productcode_1').val($('#quantity_1').val());
	
}