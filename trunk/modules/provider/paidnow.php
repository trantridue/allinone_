<?php 
require_once ("../../include/constant.php");
require_once ("../../include/providerService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$providerService = new ProviderService ( hostname, username, password, database, $commonService );
$parameterPaid = $providerService->getPaidParameters();
$providerService->paidMoneyProvider($parameterPaid);
?>