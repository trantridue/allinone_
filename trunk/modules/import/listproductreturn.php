<hr>
<?php
$product_code = $_REQUEST['product_code']; 
$product_name = $_REQUEST['product_name']; 
$category_name = $_REQUEST['category_name']; 
$provider_name = $_REQUEST['provider_name']; 
$brand_name = $_REQUEST['brand_name']; 
$season_id = $_REQUEST['season_id']; 
$description =  $_REQUEST['description']; 
$isdefault = $_REQUEST ['isdefault'];

if ($isdefault == "false") {
	require_once ("../../include/constant.php");
	require_once ("../../include/importService.php");
	require_once ("../../include/commonService.php");
	$commonService = new CommonService ();
	$importService = new ImportService ( hostname, username, password, database, $commonService );
	$importService->listProductReturn($product_code,$product_name,$category_name,$provider_name,$brand_name
			,$season_id,$description);
} else {
	$importService->listProductReturnDefault();
}
?>
<br>