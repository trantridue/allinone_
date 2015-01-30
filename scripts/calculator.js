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