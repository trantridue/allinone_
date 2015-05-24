<?php
	require_once ("../../include/constant.php");
	require_once ("../../include/fundService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$fundService = new FundService ( hostname, username, password, database, $commonService ); 
?>
<form id="fundEditFormId">
<h4>EDIT FUND HISTO</h4>
<table class="addcriteriatable">
<input type="hidden" id="id_histo_fund" value="<?php echo $_REQUEST['id'];?>"/>
	<tr>
		<td align="right">Fund : </td>
		<td><?php
		$commonService->printDropDownListFromTableSelected( 'fund', 'edit_fund',$_REQUEST['fund_id']);
		?>
		<input type="text" class="datefield" id="edit_date" value="<?php echo date('Y-m-d',strtotime($_REQUEST['date']));?>"/>
		</td>
	</tr>
	<tr>
		<td align="right">User :</td>
		<td><?php
		$commonService->printDropDownListFromTableSelected( 'user', 'edit_user',$_REQUEST['user_id']);
		?></td>
	</tr>
	<tr>
		<td align="right">Amount :</td>
		<td>
		<input type="text" size="4" maxlength="12" autocomplete="off" onkeypress="validateFloat(event)" id="edit_amount" value="<?php echo $_REQUEST['amount'];?>">
		<input type="text" size="3" maxlength="8" autocomplete="off" onkeypress="validateFloat(event)" id="edit_ratio" value="<?php echo $_REQUEST['ratio'];?>">
		</td>
	</tr>
	<tr>
		<td align="right">Description :</td>
		<td><textarea rows="3" cols="40" id="edit_description"><?php echo $_REQUEST['description'];?></textarea> </td>
	</tr>
	<tr>
		<td align="right"></td>
		<td>
			<input type="reset" value="RESET" class="menu_btn_sub">
			<input type="button" value="UPDATE" class="menu_btn_sub" onclick="updateFund();">
			<input type="button" value="SEARCH FORM" class="menu_btn_sub" onclick="$('#searchFund').show();$('#addFund').hide();$('#editFund').hide();">
		</td>
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