<td>EX : <?php echo $reportService->getAmountToDay();?></td>
<td>ETD : <?php echo $reportService->getInteretByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td>EMO : <?php echo $reportService->getInteretByShopAndDate(date('Y-m-01'),date('Y-m-t'),'all');?></td>
<td>RE : <?php echo $reportService->getReturnByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td>ROI : <?php echo $reportService->getRoiByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td>CA : <?php echo $reportService->getCashByShop(date('Y-m-d'),date('Y-m-d'),'all');?></td>
<td>KET : <?php echo number_format($reportService->amountInket(),0);?></td>
<td>INOUT : <?php echo $reportService->getInoutByShopAndDate(date('Y-m-d'),date('Y-m-d'),'all')?></td>
