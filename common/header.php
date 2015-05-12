Welcome back <strong><?= $fgmembersite->UserFullName(); ?>!</strong>
<?php echo tab16;?>
<a href='logout.php'>Logout</a>
<?php echo tab16;?>
<a href='change-pwd.php'>Change password</a>
<?php echo tab16;?>
<a href='login-home.php'>HOME</a>
<?php echo tab16;?>
IsAdmin : <?php echo $commonService->isAdmin();?>
<?php echo tab16;?>
Logged in time : <?php echo Date('Y-m-d H:i:s');?>