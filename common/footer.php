<?php
echo "<strong>" . date ( 'Y-m-d H:i:s' ) . tab8 . "</strong>";
if ($commonService->isAdmin ()) {
	echo $reportService->showStaticInformationFooter ();
	echo tab4 . "<strong>EA_TD :" . $reportService->getInteretByShopAndDate ( date ( 'Y-m-d' ), date ( 'Y-m-d' ), 'all' ) . tab4;
	echo "EA_MO :" . $reportService->getInteretByShopAndDate ( date ( 'Y-m-01' ), date ( 'Y-m-t' ), 'all' ) . "</strong>";
}
$reportService->saveProperty ();
?>