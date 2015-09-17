<td <?php $commonService->displayColor('#F5FFC4','black');?>>EX : <?php echo $reportService->getAmountToDay();?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>ETD : <?php echo $reportService->getInteretByShopAndDate($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>>EMO : <?php echo $reportService->getInteretByShopAndDate(date('Y-m-01'),date('Y-m-t'),'all');?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>RE : <?php echo $reportService->getReturnByShopAndDate($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>>ROI : <?php echo $reportService->getRoiByShopAndDate($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>CA : <?php echo $reportService->getCashByShop($td,$td,'all');?></td>
<td <?php $commonService->displayColor('#F5FFC4','black');?>>KET : <?php echo number_format($reportService->amountInket(),0);?></td>
<td <?php $commonService->displayColor('#E20C14','white');?>>INOUT : <?php echo $reportService->getInoutByShopAndDate($td,$td,'all')?></td>
