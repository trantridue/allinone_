
<div style="font-weight: bold;display: <?php echo $commonService->isAdmin()?'block':'none';?>">
<span style="background-color: yellow;">
EX : <?php echo $reportService->getExportByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(247, 128, 232);">
RE : <?php echo $reportService->getReturnByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(247, 128, 232);">
ROI : <?php echo $reportService->getRoiByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(247, 128, 232);">
CA : <?php echo $reportService->getCashByShop(date('Y-m-d'),date('Y-m-d'),'all');?><?php echo tab4;?>
</span>
<span style="background-color: rgb(247, 128, 232);">
KET : <?php echo number_format($reportService->amountInket(),2);?><?php echo tab4;?>
</span>
</div>