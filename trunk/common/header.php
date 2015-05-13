<strong>
<a href='login-home.php'>HOME</a><?php echo tab4;?>
<a href='logout.php'>Logout</a><?php echo tab4;?>
<a href='change-pwd.php'>Change password</a><?php echo tab4;?>
<?php echo tab8;?>
<?php echo $commonService->isAdmin()==1?'Ông chủ':'Nhân viên';?><?php echo tab4;?>
<?= $fgmembersite->UserFullName(); ?><?php echo tab4;?>
<?php echo 'Shop '.$_SESSION ['id_of_shop'];?><?php echo tab4;?>
Last Time : <?php echo Date('Y-m-d H:i:s');?><?php echo tab4;?>
</strong>