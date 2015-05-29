<h4>ADD CUSTOMER FORM</h4>
<hr>
<input type="hidden" value="<?php echo $_REQUEST['id'];?>" id="editid"/>
	<table width="100%" class="edittable">
		<tr>
			<td style="text-align: right;">Name :</td>
			<td><input autocomplete="off" type="text" name="customer_name" id="add_customer_name"
				value="<?php echo $_REQUEST['name'];?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Tel :</td>
			<td><input autocomplete="off" type="text" name="customer_tel" id="customer_tel" maxlength="12" onkeypress="validateNum(event);"
				value="<?php echo $_REQUEST['tel'];?>" /></td>
			
		</tr>
		<tr>
			<td style="text-align: right;">Description :</td>
			<td ><textarea name="customer_description" id="customer_description" cols="30" rows="3">
				<?php echo $_REQUEST['description'];?> </textarea></td>
		</tr>
		
		<tr>
			<td style="text-align: right;">
			</td>
			<td>
			<input type="button" class="menu_btn_sub"
				value="SAVE" onclick="addOrUpdateCustomer();">
				<?php if($_REQUEST['isboss']==1) {?>
			<div style="float:right;padding:0 15px 10px 0;" title="ON : IS BOSS</br>OFF: NOT BOSS" onclick="changeStatusCustomer();" class="status_on" name="customer_status" id="customer_status"></div>
			<input id="customer_status_hidden" value="1" type="hidden">
			<?php } else {?>
			<div style="float:right;padding:0 15px 10px 0;" title="ON : IS BOSS</br>OFF: NOT BOSS" onclick="changeStatusCustomer();" class="status_off" name="customer_status" id="customer_status"></div>
			<input id="customer_status_hidden" value="0" type="hidden">
			<?php }?>
			</td>
		</tr>
	</table>
</form>