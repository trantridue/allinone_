<?php
if(!isset($_SESSION)){  session_start(); }
if (!$commonService->isMobile ()){ 
?>
<div id="exportLeft" class="exportLeft">
<form id="exportLeftForm">
	<div id="exportCustomerInformation"><?php include 'customerInfor.php';?></div>
	<div id="exportCustomerOrder" style="display: none;"><?php include 'customerOrder.php';?></div>
	<hr>
	<div id="exportFactureInformation"><?php include 'factureInfor.php';?></div>
	<div id="exportInputProduct"><?php include 'exportInput.php';?></div>
	<div id="marqueeId"><?php include 'marquee.php';?></div>
</form>
</div>

<div id="exportRight" class="exportRight">
	<div id="exportSearch"><?php include 'exportSearch.php';?></div>
	<div id="exportButtonRight"><?php include 'exportButtonRight.php';?></div>
	<div id="exportCalculator" style="display: none;"><?php include 'exportCalculator.php';?></div>
	<div id="exportDebt" style="display: none;"><?php include 'exportDebt.php';?></div>
	<div id="exportReservation" style="display: none;"><?php include 'exportReservation.php';?></div>
	<div id="exportReturn" style="display: none;"><?php include 'exportReturn.php';?></div>
	<div id="exportOrderList" style="display: none;"><?php include 'exportOrderList.php';?></div>
	<div id="exportList" ><?php include 'exportList.php';?></div>
</div>
<?php } else {?>

	<div id="exportLeft" class="exportLeftm">
<form id="exportLeftForm">
	<div id="exportCustomerInformation"><?php include 'customerInfor.php';?></div>
	<div id="exportCustomerOrder" style="display: none;"><?php include 'customerOrder.php';?></div>
	<hr>
	<div id="exportFactureInformation"><?php include 'factureInfor.php';?></div>
	<div id="exportInputProduct"><?php include 'exportInput.php';?></div>
	<div id="marqueeId"><?php include 'marquee.php';?></div>
</form>
</div>

<div  id="exportRight" class="exportRightm">
	<div id="exportSearch"><?php include 'exportSearch.php';?></div>
	<div id="exportButtonRight"><?php include 'exportButtonRight.php';?></div>
	<div id="exportCalculator" style="display: none;"><?php include 'exportCalculator.php';?></div>
	<div id="exportDebt" style="display: none;"><?php include 'exportDebt.php';?></div>
	<div id="exportReservation" style="display: none;"><?php include 'exportReservation.php';?></div>
	<div id="exportReturn" style="display: none;"><?php include 'exportReturn.php';?></div>
	<div id="exportOrderList" style="display: none;"><?php include 'exportOrderList.php';?></div>
	<div id="exportList" ><?php include 'exportList.php';?></div>
</div>
<!--	<div style="min-height:1100px;overflow: auto;">&nbsp;</div>-->
<?php } ?>