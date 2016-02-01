<?php
$module = isset ( $_REQUEST ['module'] ) ? $_REQUEST ['module'] : defaultmodule;
?>

<?php
$arr = array();
if($commonService->isAdmin()) {
$arr = array (
		"export" => "EXPORT",
		"user" => "EMPLOYEE",
		"import" => "IMPORT",
		"inout" => "IN-OUT",
		"spend" => "SPEND",
		"config" => "CONFIG",
		"news" => "NEWS",
		"report" => "REPORT",
		"provider" => "PROVIDER",
		"customer" => "CUSTOMER",		
		"fund" => "FUND",
		"upload" => "UPLOAD"
		 
);
} else {
	$arr = array (
		"export" => "BÁN HÀNG",
		"inout" => "THÊM/RÚT TIỀN",
		"news" => "TIN TỨC",
		"upload" => "UPLOAD"
);
}
foreach ( $arr as $value => $key ) {
	if ($value == $module) {
		echo "<input type='button' value='" . $key . "' class='menu_btn active_btn' onclick='goToPage(\"" . $value . "&submenu=search\");' /><br>";
	} else {
		echo "<input type='button' value='" . $key . "' class='menu_btn' onclick='goToPage(\"" . $value . "&submenu=search\");' /><br>";
	}
}
if(!$commonService->isAdmin())
	echo "<div style='background-color: violet; margin-top:10px;height:30px;padding:13px 0 0 13px;font-weight:bold;'> MAX CODE : ".$importService->currentMaxProductCode(0)."</div>";
?>
