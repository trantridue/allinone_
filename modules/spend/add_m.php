<?php
echo $commonService->isMobile();
?>
<form>
<h3>ADD SPEND</h3>
<table class="addcriteriatable" style="text-align: center;">
	<thead>
	<tr>
	<th>Amount</th>
	<th>Date</th>
	<th>User</th>
	<th>Category</th>
	<th>Purpose</th>
	<th>Type</th>
	<th>Description</th>
	</tr>
	</thead>
	<tr>
		<td><input type="number" autocomplete="off" size="8" id="add_amount_1" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td><input type="text" autocomplete="off" id="add_date_1" class="datefield" value="<?php echo date('Y-m-d');?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user_1',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category_1',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for_1',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type_1',1 );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description_1" size="40"/> </td>
	</tr>
	<tr>
		<td><input type="number" autocomplete="off" size="8" id="add_amount_2" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td><input type="text" autocomplete="off" id="add_date_2" class="datefield" value="<?php echo date('Y-m-d');?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user_2',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category_2',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for_2',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type_2',1 );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description_2" size="40"/> </td>
	</tr>
	<tr>
		<td><input type="number" autocomplete="off" size="8" id="add_amount_3" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td><input type="text" autocomplete="off" id="add_date_3" class="datefield" value="<?php echo date('Y-m-d');?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user_3',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category_3',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for_3',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type_3',1 );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description_3" size="40"/> </td>
	</tr>
	<tr>
		<td><input type="number" autocomplete="off" size="8" id="add_amount_4" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td><input type="text" autocomplete="off" id="add_date_4" class="datefield" value="<?php echo date('Y-m-d');?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user_4',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category_4',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for_4',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type_4',1 );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description_4" size="40"/> </td>
	</tr>
	<tr>
		<td><input type="number" autocomplete="off" size="8" id="add_amount_5" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td><input type="text" autocomplete="off" id="add_date_5" class="datefield" value="<?php echo date('Y-m-d');?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user_5',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category_5',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for_5',1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type_5',1 );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description_5" size="40"/> </td>
	</tr>
	<tr>
		<td></td>
		<td align="left" colspan="6"><input type="reset" value="RESET" 
			class="btn_m" /> <input type="button" value="SAVE"
			class="btn_m" /><input type="button" value="SEARCH FORM"
			class="btn_m" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>