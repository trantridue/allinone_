<a href='change-pwd.php' style="display: none;">Change Pass</a><?php echo tab4;?>
<span style="background-color: yellow;">
EX : <?php echo $reportService->getAmountToDay();?><?php echo tab4;?>
</span>
<span style="background-color: rgb(247, 128, 232);">
RE : <?php echo $reportService->getReturnByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(34, 218, 120);">
ROI : <?php echo $reportService->getRoiByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(255, 192, 203);">
CA : <?php echo $reportService->getCashByShop(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(116, 221, 201);">
KET : <?php echo number_format($reportService->amountInket(),0);?><?php echo tab4;?>
</span>
<span style="background-color: rgb(116, 221, 201);">
INOUT : <?php echo $reportService->getInoutByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all')?><?php echo tab4;?>
</span>