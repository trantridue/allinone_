<input type="hidden" id="nbrRows" value="<?php echo 5;?>"/>
<table>
	<tr>
	<td>User</td>
		<td colspan="4"><?php
		$commonService->printDropDownListFromTable ( 'user', 'list_user' );
		?><input type="button"
			onclick="toggleDiv('trace_input');toggleDiv('trace_search');"
			value="GO TO SEARCH" class="menu_btn_sub"></input></td>
	</tr>
	<?php for  ($i=1;$i<=5;$i++) {?>
	<tr>
		<td>From</td>
		<td style="text-align: left;"><input type="text" class="datefield"
			id="absentfrom_<?php echo $i;?>"></input></td>
		<td>To</td>
		<td style="text-align: left;"><input type="text" class="datefield"
			id="absentto_<?php echo $i;?>"></input></td>
			
			<td ><input type="text" class="number50"
			id="nbrdays_<?php echo $i;?>"></input></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="5">
			<input type="button" value="SAVE" class="menu_btn_sub" onclick="addAbsent();"></td>
	</tr>
</table>


