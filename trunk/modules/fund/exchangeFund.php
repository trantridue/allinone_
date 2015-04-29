<form id="fundExchangeFormId">
<table>
	<tr>
		<td align="right">SOURCE : </td>
		<td><?php
		$commonService->printDropDownListFromTable( 'fund', 'exchange_fund_source');
		?></td>
	</tr>
	<tr>
		<td align="right">DESTINATION :</td>
		<td><?php
		$commonService->printDropDownListFromTable( 'fund', 'exchange_fund_destination');
		?></td>
	</tr>
	<tr>
		<td align="right">Amount :</td>
		<td><input type="text" size="4" maxlength="8" autocomplete="off" onkeypress="validateNum(event)" id="exchange_amount"></td>
	</tr>
	<tr>
		<td align="right">Description :</td>
		<td><textarea rows="3" cols="20" id="exchange_description"></textarea> </td>
	</tr>
	<tr>
		<td align="right"></td>
		<td>
			<input type="reset" value="RESET" class="menu_btn_sub">
			<input type="button" value="SAVE" class="menu_btn_sub" onclick="exchangeFund();">
		</td>
	</tr>
</table>
</form>