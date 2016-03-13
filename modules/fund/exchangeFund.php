<form id="fundExchangeFormId">
<h4>EXCHANGE FUND</h4>
<table  class="addcriteriatable">
	<tr>
		<td align="right">SOURCE : </td>
		<td><?php
		$commonService->printDropDownListFromTableSelected( 'fund', 'exchange_fund_source', $_SESSION['defautl_source_fund_id']);
		?>
		<input type="text" size="4" maxlength="8" autocomplete="off" onkeypress="validateNum(event)" id="exchange_source_amount"  onkeyup="updateExchangeFundDestAmount();">
		<input type="text" size="3" maxlength="8" autocomplete="off" onkeypress="validateFloat(event)" id="exchange_source_ratio" value="1" onkeyup="updateExchangeFundDestAmount();">
		</td>
	</tr>
	<tr>
		<td align="right">DESTINATION :</td>
		<td><?php
		$commonService->printDropDownListFromTableSelected( 'fund', 'exchange_fund_destination',$_SESSION['defautl_dest_fund_id']);		
		?>
		<input type="text" size="4" maxlength="8" autocomplete="off" onkeypress="validateNum(event)" id="exchange_destination_amount">
		<input type="text" size="3" maxlength="8" autocomplete="off" onkeypress="validateFloat(event)" id="exchange_destination_ratio" value="1"  onkeyup="updateExchangeFundDestAmount();">
		</td>
	</tr>
	<tr>
		<td align="right">Date :</td>
		<td><input type="text" class="datefield" id="exchange_date" value=<?php echo date('Y-m-d');?> /></td>
	</tr>
	<tr>
		<td align="right">Description :</td>
		<td><textarea rows="3" cols="20" id="exchange_description"></textarea> </td>
	</tr>
	<tr>
		<td align="right"></td>
		<td>
			<input type="button" value="SAVE" class="menu_btn_sub" onclick="exchangeFund();">
			<input type="reset" value="RESET" class="menu_btn_sub">
		</td>
	</tr>
</table>
</form>