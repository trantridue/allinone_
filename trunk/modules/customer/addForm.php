<h4>ADD CUSTOMER FORM</h4>
<hr>
<form id="customerAddForm">
<input type="hidden" value="<?php echo $_REQUEST['id'];?>" id="editid"/>
	<table width="100%" class="edittable">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input autocomplete="off" type="text" id="customer_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Tel :</td>
			<td><input autocomplete="off" type="text"  id="customer_tel" maxlength="12" onkeypress="validateNum(event);"
				value="<?php echo $_REQUEST['tel'];?>" /></td>
			
		</tr>
		<tr>
			<td style="text-align: right;">Description :</td>
			<td ><textarea  id="customer_description" cols="30" rows="3"><?php echo $_REQUEST['description'];?></textarea></td>
		</tr>
		
		<tr>
			<td style="text-align: right;">
			</td>
			<td>
				<?php if($_REQUEST['isboss']=='1') { ?>
				<div id="customer_status" class="isboss_on" onclick="changeStatusCustomer();"></div>
			<?php } else { ?>
				<div id="customer_status" class="isboss_off" onclick="changeStatusCustomer();"></div>
			<?php }?>
			<input type="hidden" id="customer_status_hidden"  value="<?php echo isset($_REQUEST['isboss'])?$_REQUEST['isboss']:'0';?>">
			<input type="button" class="menu_btn_sub"
				value="SAVE" onclick="addOrUpdateCustomer();">
			</td>
		</tr>
	</table>
</form>