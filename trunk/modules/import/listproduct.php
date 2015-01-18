<?php
echo "product_code: " . $_REQUEST['product_code']."<br>"; 
echo "product_name: " . $_REQUEST['product_name']."<br>"; 
echo "category_name: " . $_REQUEST['category_name']."<br>"; 
echo "provider_name: " . $_REQUEST['provider_name']."<br>"; 
echo "brand_name: " . $_REQUEST['brand_name']."<br>"; 
echo "season: " . $_REQUEST['season']."<br>"; 
echo "season_id: " . $_REQUEST['season_id']."<br>"; 
echo "description: " . $_REQUEST['description']."<br>"; 

$isdefault = $_REQUEST ['isdefault'];
if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/importService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$importService = new ImportService ( hostname, username, password, database, $commonService );
}
$importService->listProduct('aaa');
?>