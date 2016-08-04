/* COMMON MODULE */

/* IMPORT MODULE */
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

/* PROVIDER MODULE */
function calculateProviderPaid() {
	var remain = 0;
	remain = parseInt($('#paid_remain_update').html()) - $("#paid_amount_1").val() - $("#paid_amount_2").val() - $("#paid_amount_3").val();
	$("#paid_remaining").val(remain.toFixed(0).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}
function calculatePaid() {
	var paid = 0;
	paid = parseInt($('#paid_remain_update').html()) - $("#paid_remaining").val() - $("#paid_amount_2").val() - $("#paid_amount_3").val();
	$("#paid_amount_1").val(paid.toFixed(0).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}

function calculateSpend() {
	var total = 0;
	var totalRow = parseInt($("#default_number_line_spend").val());
	for (var i = 1; i < totalRow; i++) {
		var amount = ($("#add_amount_"+i).val() == "") ? 0
				: parseInt($("#add_amount_" + i).val());
		if (amount !=0){
			total = total + amount;
		}
	}
	$("#total_spend").text(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
}