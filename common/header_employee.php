<?php $td = date('Y-m-d'); ?>
<td><a href='javascript:void(0);' onclick="reloadParams();" style="display:none;">Refresh</a>
<input type="hidden" id="isAdminField" value="<?php echo $commonService->isAdmin();?>"></td>
<td><a href='login-home.php' style="display:none;">HOME</a></td>
<td><a href='logout.php'>Logout</a></td>
<td title='<?php echo $reportService->getAmountToDay()."<br>".$reportService->getRoiByShopAndDate($td,$td,'all');?>'><?php echo $fgmembersite->UserFullName(); ?></td>
<td><?php echo 'Shop '.$_SESSION ['id_of_shop'];?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>><?php echo "CASH 1 : ".$reportService->getCashByShop($td,$td,1);?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>><?php echo "CASH 2 : ".$reportService->getCashByShop($td,$td,2);?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>><?php echo "CASH 3 : ".$reportService->getCashByShop($td,$td,3);?></td>