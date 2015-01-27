<?php 
require_once ("../../include/constant.php");
require_once ("../../include/importService.php");
require_once ("../../include/commonService.php");
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database, $commonService );
	 
	$sale = $_REQUEST['sale'];
	$product_code = ($_REQUEST['product_code']!='')?'%'.$_REQUEST['product_code'].'%':'%%';
	$product_name = ($_REQUEST['product_name']!='')?'%'.$_REQUEST['product_name'].'%':'%%';
	$provider_name = ($_REQUEST['provider_name']!='')?'%'.$_REQUEST['provider_name'].'%':'%%';
	$category_name = ($_REQUEST['category_name']!='')?'%'.$_REQUEST['category_name'].'%':'%%';
	$brand_name = ($_REQUEST['brand_name']!='')?'%'.$_REQUEST['brand_name'].'%':'%%';
	$season_id = ($_REQUEST['season_id']!='')?'%'.$_REQUEST['season_id']:'1';
	$description = ($_REQUEST['description']!='')?'%'.$_REQUEST['description'].'%':'%%';
	$importService->updateSaleProduct($sale,$product_code,$product_name,$provider_name,$category_name,$brand_name,$season_id,$description);
?>