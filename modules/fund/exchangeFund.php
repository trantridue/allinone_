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
		<td align="right">Amount :</td>
		<td><textarea rows="3" cols="20" id="exchange_description">aaa</textarea> </td>
	</tr>
</table>