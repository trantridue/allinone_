<td <?php $commonService->displayColor('#F5FFC4','black');?>>EX : <?php echo $reportService->getAmountToDay();?></td>
<td <?php $commonService->displayColor('yellow','black');?>>EXM : <?php echo $reportService->getExportByShopAndDate(date('Y-m-01'),date('Y-m-t'),'all');?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>ERTD : <?php echo $reportService->getInteretByShopAndDate($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>>ERM : <?php echo $reportService->getInteretByShopAndDate(date('Y-m-01'),date('Y-m-t'),'all');?></td>
<td <?php $commonService->displayColor('yellow','black');?>>ROTD : <?php echo $reportService->getRoiByShopAndDate($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>>ROM : <?php echo $reportService->getRoiByShopAndDate(date('Y-m-01'),date('Y-m-t'),'all');?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>CA : <?php echo $reportService->getCashByShop($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>>KET : <?php echo number_format($reportService->amountInket(),0);?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>INOUT : <?php echo $reportService->getInoutByShopAndDate($td,$td,'all')?></td>
<?php if ($commonService->isMobile ()) {?> <span class="exportclass"> <?php echo $reportService->getAmountToDay();?> </span> <?php }?>