<?php
echo $commonService->isMobile();
?>
<form id="addSpendFormId">
<h3>ADD SPEND</h3>
<table class="addcriteriatable" style="text-align: center;">
	<input type="hidden" id="default_number_line_spend" value ="<?php echo default_number_line_spend;?>"/>
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
	<?php for ($i=1;$i<=default_number_line_spend;$i++) {?>
		<tr>
		<td><input type="text" autocomplete="off" size="4" id="add_amount_<?php echo $i;?>" maxlength="8" onkeypress="validateNum(event);" tabindex="<?php echo $i;?>"/></td>
		<td><input type="text" autocomplete="off" id="add_date_<?php echo $i;?>" class="datefield" value="<?php echo date('Y-m-d');?>"/></td>
		<td ><?php
		$commonService->printDropDownListFromTableSelected ( 'user', 'add_user_'.$i,1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_category', 'add_category_'.$i,1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_for', 'add_for_'.$i,1 );
		?></td>
		<td><?php
		$commonService->printDropDownListFromTableSelected ( 'spend_type', 'add_type_'.$i,1 );
		?></td>
		<td><input type="text" autocomplete="off" id="add_description_<?php echo $i;?>" size="40"/> </td>
	</tr>
	<?php }
	?>
	
	<tr>
		<td></td>
		<td align="left" colspan="6"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" value="SAVE" onclick="addSpends();";
			class="menu_btn_sub" /><input type="button" value="SEARCH FORM"
			class="menu_btn_sub" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>