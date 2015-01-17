<script type="text/javascript">

</script>
<div id="inputArea">
	<div id="basicInputArea"><?php include 'basicinput.php';?></div>
	<div id="advancedInputArea" style="display: none;"><?php include 'advancedinput.php';?></div>
	<input type="button" value="SHOW ADVANCED"
		onclick="toggleDiv('advancedInputArea');">
</div>
<hr>
<div id="listArea">
	<div id="suplementaryListArea"></div>
	<div id="mainListArea"><?php include 'list.php'?></div>
</div>
