<?php session_start();?>
<form id="addInoutFormId">
<h1>ADD INOUT</h1>
<table class="addcriteriatable" >
	<tr>
		<td align="right">Amount</td>
		<td><input style="height: 50px; width: 200px;" type="text" autocomplete="off" size="4" id="add_amount" maxlength="8" onkeypress="validateNum(event);"/></td>
	</tr>
	<tr>
		<td align="right">Thêm Hay Bớt</td>
		<td><?php $commonService->printDropDownListFromTable ( 'inout_type', 'add_inout_type');?></td>
	</tr>
	<tr>
		<td align="right">User</td>
		<td><?php	$commonService->printDropDownListFromTable ( 'user', 'add_user');?></td>
	</tr>
	<tr>
		<td align="right">Date</td>
		<td><?php
		if($commonService->isAdmin()) { ?>
			<input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d');?>"/>
		<?php } else { ?>
			<input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d');?>" disabled="disabled"/>
		<?php }?></td>
	</tr>
	<tr>
		<td align="right">Shop</td>
		<td><?php
		if($commonService->isAdmin())
			$commonService->printDropDownListFromTableSelected( 'shop', 'add_shop',$_SESSION ['id_of_shop'] );
		else 
			$commonService->printDropDownListFromTableSelectedOneLine( 'shop', 'add_shop',$_SESSION ['id_of_shop'] );
		?></td>
	</tr>
	<tr>
		<td align="right">Description</td>
		<td><textarea type="text"  id="add_description" cols="40">Mobile</textarea></td>
	</tr>
	<tr>
		<td></td>
		<td align="left" colspan="6"><input type="reset" value="RESET" style="width:200px;height:100px;font-weight: bold;"
			/><br><input type="button" value="SAVE" onclick="addInOut();"
			style="width:200px;height:100px;font-weight: bold;" /><br><input type="button" value="SEARCH FORM"
			style="width:200px;height:100px;font-weight: bold;" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>