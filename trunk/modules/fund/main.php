<div id=mainFund>
<div id="topFund">
	<div id="exchangeFund"><?php include 'exchangeFund.php';?></div>
	<div id="addFund"><?php include 'addFund.php';?></div>
	<div id="searchFund" style="display: none;">searchFund</div>
</div>
<div id="bottomFund">
	<div id="listFund"><?php $fundService->listFund();?></div>
	<div id="histoFund">histoFund</div>
</div>
</div>