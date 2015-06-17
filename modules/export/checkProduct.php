<script language="javascript">
$(document).ready(function(){
	var ac_config_export_product_0 = {
		source: "autocomplete/completed_export_products_code.php",
		select: function(event, ui){
			$("#productcode_0").val(ui.item.code);
			$("#productname_0").html(ui.item.name);
			<?php if($commonService->isAdmin()) {?>
			$("#productname_0").prop('title',ui.item.detail);
			<?php } else { ?>
			$("#productname_0").prop('title',ui.item.detail_emp);
			<?php }?>
		},
		minLength:1
	};
	$("#productcode_0").autocomplete(ac_config_export_product_0);
});
</script>

<table class="addcriteriatable" style="border-collapse: collapse;" border="1">
<tr>
<td width="20%">
<input type="text" style="height:60px;" id="productcode_0" maxlength="8"  autocomplete="off"/>
</td>
<td>
<label id="productname_0"></label>
</td>
</tr>
</table>