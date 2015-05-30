<?php
require_once ("../../include/constant.php");
require_once ("../../include/providerService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ( );
$providerService = new ProviderService ( hostname, username, password, database, $commonService );
?>
<input type="hidden" value="<?php
echo $_REQUEST ['id'];
?>"
	id="paid_provider_id" />
<input type="hidden" value="<?php
echo $_REQUEST ['name'];
?>"
	id="paid_provider_name" />
<form>
<table class="searchcriteriatable">
	<tr>
		<td colspan="7" align="center" style="color: blue;">
		<?php
		echo $_REQUEST ['name'];
		?></td>
	</tr>
	<tr align="center" style="color: red; background-color: yellow;">
		<td>Tổng nợ</td>
		<td>Đã thanh toán</td>
		<td>Còn nợ</td>
		<td>Nguồn rút</td>
		<td>Số tiền</td>
		<td>Sẽ còn nợ</td>
		<td>Ghi chú</td>
	</tr>
	<tr align="center">
		<td><input type="hidden" id="paid_total"
			value="<?php
			echo $_REQUEST ['total'];
			?>" />
		<?php
		echo $_REQUEST ['total'];
		?>
		</td>
		<td><input type="hidden" id="paid_paid"
			value="<?php
			echo $_REQUEST ['paid'];
			?>" /> <span id="paid_paid_update">
		<?php
		echo $_REQUEST ['paid'];
		?>
		</span></td>
		<td><input type="hidden" id="paid_remain"
			value="<?php
			echo $_REQUEST ['remain'];
			?>" /> <span id="paid_remain_update">
		<?php
		echo $_REQUEST ['remain'];
		?>
		</span></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'fund', 'paid_fund_1', default_id_source_1 );
		?></td>
		<td><input type="text" id="paid_amount_1" onclick="this.select();"
			onkeypress="validateFloat(event);" size="6" maxlength="8" value="0"
			onkeyup="calculateProviderPaid();" 
			ondblclick="paidAllByFund('paid_amount_1');"/></td>
		<td><input type="number" id="paid_remaining" style="width: 100px;" onclick="this.select();" onkeyup="calculatePaid();" 	
			value="<?php
			echo $_REQUEST ['remain'];
			?>" /></td>
		<td rowspan="3"><textarea rows="4" cols="60" id="paid_description"></textarea>
		</td>
	</tr>
	<tr align="center">
		<td colspan="3"></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'fund', 'paid_fund_2', default_id_source_2 );
		?></td>
		<td><input type="text" id="paid_amount_2" onclick="this.select();"
			onkeypress="validateFloat(event);" size="6" maxlength="8" value="0"
			onkeyup="calculateProviderPaid();" 
			ondblclick="paidAllByFund('paid_amount_2');"/></td>
		<td rowspan="2"><input type="button" value="PAID" class="menu_btn_sub"
			onclick="paidMoneyProvider();"> <input type="reset" value="RESET"
			class="menu_btn_sub"></td>
	</tr>
	<tr align="center">
		<td colspan="3"></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'fund', 'paid_fund_3', default_id_source_3 );
		?></td>
		<td><input type="text" id="paid_amount_3" onclick="this.select();"
			onkeypress="validateFloat(event);" size="6" maxlength="8" value="0"
			onkeyup="calculateProviderPaid();" 
			ondblclick="paidAllByFund('paid_amount_3');"/></td>
	</tr>
</table>

</form>