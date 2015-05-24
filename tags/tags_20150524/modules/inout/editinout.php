<?php
	require_once ("../../include/constant.php");
	require_once ("../../include/inoutService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$inoutService = new InoutService ( hostname, username, password, database, $commonService );
?>
<form id="editInoutFormId">
<h3>EDIT SPEND</h3>
<input type="hidden" id="idinout" value="<?php echo $_REQUEST['id'];?>"/>
<table class="addcriteriatable" style="text-align: center;">
	<thead>
	<tr>
	<th>Amount</th>
	<th>Date</th>
	<th>User</th>
	<th>Type</th>
	<th>Shop</th>
	<th>Description</th>
	</tr>
	</thead>
		<tr>
		<td><input type="text" autocomplete="off" size="4" id="add_amount" maxlength="8" onkeypress="validateNum(event);" value="<?php echo abs($_REQUEST['amount']);?>"/></td>
		<td><input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d',strtotime($_REQUEST['date']));?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user',$_REQUEST['user_id'] );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'inout_type', 'add_type',$_REQUEST['type'] );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'shop', 'add_shop',$_REQUEST['shop_id'] );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description" size="40" value="<?php echo $_REQUEST['description']?>"/></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" colspan="6"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" value="UPDATE" onclick="updateInout();";
			class="menu_btn_sub" /><input type="button" value="SEARCH FORM"
			class="menu_btn_sub" onclick="$('#searchArea').show();$('#addArea').hide();$('#editArea').hide();"/></td>
	</tr>
</table>
</form>
<?php
echo "<script>";
echo "$(function() {
	$('.datefield').datepicker( {
		dateFormat : 'yy-mm-dd',
		destroy: true,
		changeMonth : true,
		changeYear : true
	});
});";
echo "</script>";
?>