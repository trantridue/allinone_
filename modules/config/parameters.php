<h4>PARAMETER CONFIGURATION</h4>
<hr>
<?php $configService->listParameters();?>

<input type="hidden" value="<?php echo $configService->getListParameters();?>" id="listParameter">

<input type="button" onclick="updateAllParameter();" class="menu_btn_sub" value="SAVE"/>