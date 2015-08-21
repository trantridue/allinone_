<table class="addcriteriatable">
<tr>
	<td align="right">Điện thoại : </td>
	<td>
		<input type="text" id="customer_tel" maxlength="12" 
		onkeypress="validateNum(event);" autocomplete="off" 
		onkeyup="updateCusIdWhenChangeTel();"/>
		<input type="hidden" id="customer_id"/>
		<input id="export_date" type="text" class="datefield" <?php $commonService->displayByAdmin();?>/>
	</td>
</tr>
<tr>
	<td align="right">Tên Khách : </td>
	<td>
	<input type="text" id="customer_name"  autocomplete="off"/>
	<span <?php $commonService->displayByAdmin();?>>
	<?php $commonService->printDropDownListFromTable( 'shop', 'export_shop');?>
	</span>
	</td>
</tr>
<tr <?php $commonService->displayByAdmin();?>>
	<td align="right">Online Fund : </td>
	<td>
	<?php $commonService->printDropDownListFromTable( 'fund', 'onlinefund');?>
	</td>
</tr>
<tr>
	<td align="right">Ghi chú : </td>
	<td><textarea rows="2" cols="40" id="customer_description"></textarea></td>
</tr>
<tr>
<td colspan="4">
<div id="exportButtonLeft"><?php include 'exportButtonLeft.php';?></div>
</td>
</tr>
</table>