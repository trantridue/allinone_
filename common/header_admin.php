<td <?php $commonService->displayBg();?>>EX : <?php echo $reportService->getAmountToDay();?></td>
<td <?php $commonService->displayBg();?>>ETD : <?php echo $reportService->getInteretByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td <?php $commonService->displayBg();?>>EMO : <?php echo $reportService->getInteretByShopAndDate(date('Y-m-01'),date('Y-m-t'),'all');?></td>
<td <?php $commonService->displayBg();?>RE : <?php echo $reportService->getReturnByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td <?php $commonService->displayBg();?>>ROI : <?php echo $reportService->getRoiByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td <?php $commonService->displayBg();?>>CA : <?php echo $reportService->getCashByShop(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td <?php $commonService->displayBg();?>>KET : <?php echo number_format($reportService->amountInket(),0);?></td>
<td <?php $commonService->displayBg();?>>INOUT : <?php echo $reportService->getInoutByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all')?></td>
