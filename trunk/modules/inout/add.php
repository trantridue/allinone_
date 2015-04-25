<form id="addSpendFormId">
<h3>ADD INOUT</h3>
<table class="addcriteriatable" style="text-align: center; width: auto;" >
	<thead>
	<tr>
	<th>Amount</th>
	<th>Date</th>
	<th>User</th>
	<th>Shop</th>
	<th></th>
	<th></th>
	<th>Description</th>
	</tr>
	</thead>
		<tr>
		<td><input type="text" autocomplete="off" size="4" id="add_amount" maxlength="8" onkeypress="validateNum(event);"/></td>
		<td>
		<?php
		if($commonService->isAdmin()) { ?>
			<input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d');?>"/>
		<?php } else { ?>
			<input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d');?>" disabled="disabled"/>
		<?php }?>
		</td>
		<td ><?php
		session_start();
		$commonService->printDropDownListFromTable ( 'user', 'add_user');
		?></td>
		<td><?php
		if($commonService->isAdmin())
			$commonService->printDropDownListFromTableSelected( 'shop', 'add_shop',$_SESSION ['id_of_shop'] );
		else 
			$commonService->printDropDownListFromTableSelectedOneLine( 'shop', 'add_shop',$_SESSION ['id_of_shop'] );
		?></td>
		<td></td>
		<td></td>
		<td><input type="text" autocomplete="off" id="add_description" size="40"/> </td>
	</tr>
	<tr>
		<td></td>
		<td align="left" colspan="6"><input type="reset" value="RESET"
			class="menu_btn_sub" /> <input type="button" value="SAVE" onclick="addSpends();";
			class="menu_btn_sub" /><input type="button" value="SEARCH FORM"
			class="menu_btn_sub" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>