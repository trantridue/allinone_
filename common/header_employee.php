<td><a href='javascript:void(0);' onclick="reloadParams();">Refresh</a>
<input type="hidden" id="isAdminField" value="<?php echo $commonService->isAdmin();?>"></td>
<td><a href='login-home.php'>HOME</a></td>
<td><a href='logout.php'>Logout</a></td>
<td><?php echo $fgmembersite->UserFullName(); ?></td>
<td><?php echo 'Shop '.$_SESSION ['id_of_shop'];?></td>
<td><?php $td = date('Y-m-d'); 
echo "CASH 1:".$reportService->getCashByShop($td,$td,1);
?></td>
<td><?php echo "CASH 2:".$reportService->getCashByShop($td,$td,2);?></td>
<td><?php echo "CASH 3:".$reportService->getCashByShop($td,$td,3);?></td>