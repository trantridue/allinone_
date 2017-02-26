<div class='titlecss'>
ADD ABSENT USER
</div>
<input type="hidden" id="nbrRows"
	value="<?php
	if(!isset($_SESSION)){  session_start(); }
	echo $_SESSION ['nbr_row_absent'];
	?>" />
<table>
	<tr>
		<td>User</td>
		<td colspan="4"><?php
		$commonService->printDropDownListFromTable ( 'user', 'list_user' );
		?> <textarea id="description" value="Ly do"
			onfocus="if (this.value == this.defaultValue) this.value = ''"
			onblur="if (this.value == '') this.value = this.defaultValue"
			rows="2" cols="40">ly do</textarea></td>
	</tr>
	<?php
	for($i = 1; $i <= $_SESSION ['nbr_row_absent']; $i ++) {
		?>
	<tr>
		<td>From</td>
		<td style="text-align: left;"><input type="text" class="datefield"
			id="absentfrom_<?php
		echo $i;
		?>"></input></td>
		<td>To</td>
		<td style="text-align: left;"><input type="text" class="datefield"
			id="absentto_<?php
		echo $i;
		?>"></input></td>

		<td><input type="number" class="number50"
			id="nbrdays_<?php
		echo $i;
		?>"></input></td>
	</tr>
	<?php
	}
	?>
	<tr>
		<td colspan="5"><input type="button"
			onclick="toggleDiv('trace_input');toggleDiv('trace_search');"
			value="GO TO SEARCH" class="menu_btn_sub"></input><input
			type="button" value="SAVE" class="menu_btn_sub"
			onclick="addAbsent();"></td>
	</tr>
</table>


