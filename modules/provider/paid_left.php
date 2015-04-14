<h4>LIST FACTURE</h4>
<?php
require_once ("../../include/constant.php");
require_once ("../../include/providerService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ( );
$providerService = new ProviderService ( hostname, username, password, database, $commonService );

$providerService->listFactureProvider ( $_REQUEST ['id'] );
?>
