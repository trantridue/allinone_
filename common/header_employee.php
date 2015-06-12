<?php echo tab16.tab16;?>
<a href='javascript:void(0);' onclick="reloadParams();">Refresh</a><?php echo tab4;?>
<a href='login-home.php'>HOME</a><?php echo tab4;?>
<a href='logout.php'>Logout</a><?php echo tab4;?>
<input type="hidden" id="isAdminField" value="<?php echo $commonService->isAdmin();?>"><?php echo tab4;?>
<?php echo $commonService->isAdmin()==1?'Ông chủ':'Nhân viên';?><?php echo tab4;?>
<?php echo $fgmembersite->UserFullName(); ?><?php echo tab4;?>
<?php echo 'Shop '.$_SESSION ['id_of_shop'];?><?php echo tab4;?>
<?php echo $exportService->showAllCashToday();?><?php echo tab4;?>
<?php echo Date('Y-m-d H:i:s');?><?php echo tab4;?>
