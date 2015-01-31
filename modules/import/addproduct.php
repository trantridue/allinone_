<?php
echo "aaa";
$totalRow = $_REQUEST ['totalRow'];
$dataRow = $_REQUEST ['dataRow'];

$continueImport = trim ( $_REQUEST ['continueImport'] );
$provider_id = trim ( $_REQUEST ['provider_id'] );
$import_facture_code = trim ( $_REQUEST ['import_facture_code'] );
$description = trim ( $_REQUEST ['description'] );
$season = trim ( $_REQUEST ['season_id'] );
if(trim ( $_REQUEST ['sale'] )=="") {
	$sale = '0';
} else {
	$sale = trim ( $_REQUEST ['sale'] );
}

$codeArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$codeArray [$i] = trim ( $_POST ['code_' . $i] );
}
$codeExistedArray = array (
		$totalRow
);
for($i = 1; $i <= $totalRow; $i ++) {
	$codeExistedArray [$i] = trim ( $_POST ['isExisted_' . $i] );
}
$nameArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$nameArray [$i] = trim ( $_POST ['name_' . $i] );
}

$qtyArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$qtyArray [$i] = trim ( $_POST ['qty_' . $i] );
}
$postArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$postArray [$i] = trim ( $_POST ['post_' . $i] );
}
$imprArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$imprArray [$i] = trim ( $_POST ['impr_' . $i] );
}
$categoryNameArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$categoryNameArray [$i] = trim ( $_POST ['category_' . $i] );
}
$categoryIdArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$categoryIdArray [$i] = trim ( $_POST ['category_id_' . $i] );
}
$brandIdArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$brandIdArray [$i] = trim ( $_POST ['brand_id_' . $i] );
}
$brandNameArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$brandNameArray [$i] = trim ( $_POST ['brand_' . $i] );
}
$descriptionArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$descriptionArray [$i] = trim ( $_POST ['description_' . $i] );
}

$sexArray = array (
		$totalRow 
);
for($i = 1; $i <= $totalRow; $i ++) {
	$sexArray [$i] = trim ( $_POST ['sex_value_' . $i] );
}
for($i = 1; $i <= $totalRow; $i ++) {
	if ($nameArray [$i] == null) {
		$categoryIdArray [$i] = $importService->updateOrInsertCategory($categoryNameArray [$i],$categoryIdArray [$i]);
	}
}
for($i = 1; $i <= $totalRow; $i ++) {
	if ($nameArray [$i] == null) {
		$brandIdArray [$i] = $importService->updateOrInsertBrand($brandNameArray [$i],$brandIdArray [$i]);
	}
}
$importService->importProduct($totalRow,$continueImport,$provider_id,$import_facture_code,$description,$season,
		$codeArray,$codeExistedArray,$nameArray,$qtyArray,$postArray,$imprArray,$sexArray,$categoryIdArray,$brandIdArray,
		$descriptionArray,$sale);
?>