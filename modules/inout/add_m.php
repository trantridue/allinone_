<?php session_start();?>
<form id="addInoutFormId">
<h1>ADD INOUT</h1>
<table class="addcriteriatable" >
	<tr>
		<td align="right"></td>
		<td><input class="txt_mobile" type="number" id="add_amount" maxlength="8" onkeypress="validateNum(event);"/>
		<input type="button" value="SAVE" onclick="addInOut();"
			class="menu_btn_sub_mobile" /></td>
	</tr>
	<tr>
		<td align="right"></td>
		<td><?php	$commonService->printDropDownListFromTableSelected ( 'user', 'add_user',1);?></td>
	</tr>
	<tr>
		<td align="right"></td>
		<td><input type="button" id="id_add_inout_type_btn" onclick="changeStatusForInoutType()" value=" RÚT BỚT "/>
		<input type="hidden" id="id_add_inout_type" value="2">
		</td>
	</tr>
	<tr>
		<td align="right"></td>
		<td><?php
		if($commonService->isAdmin()) { ?>
			<input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d');?>"/>
		<?php } else { ?>
			<input type="text" autocomplete="off" id="add_date" class="datefield" value="<?php echo date('Y-m-d');?>" disabled="disabled"/>
		<?php }?></td>
	</tr>
	<tr>
		<td align="right"></td>
		<td><?php
		if($commonService->isAdmin())
			$commonService->printDropDownListFromTableSelected( 'shop', 'add_shop',$_SESSION ['id_of_shop'] );
		else 
			$commonService->printDropDownListFromTableSelectedOneLine( 'shop', 'add_shop',$_SESSION ['id_of_shop'] );
		?></td>
	</tr>
	<tr>
		<td align="right"></td>
		<td><textarea type="text"  id="add_description" cols="40">Mobile, Anh Duệ rút bớt </textarea></td>
	</tr>
	<tr><td></td>
		<td align="left"><input type="button" value="SEARCH FORM"
			class="menu_btn_sub_mobile" onclick="toggleDiv('searchArea');toggleDiv('addArea');"/></td>
	</tr>
</table>
</form>