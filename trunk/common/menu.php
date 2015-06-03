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
		"fund" => "FUND" 
);
} else {
	$arr = array (
		"export" => "EXPORT",
		"inout" => "IN-OUT",
		"news" => "NEWS"
);
}
foreach ( $arr as $value => $key ) {
	if ($value == $module) {
		echo "<input type='button' value='" . $key . "' class='menu_btn active_btn' onclick='goToPage(\"" . $value . "&submenu=search\");' /><br>";
	} else {
		echo "<input type='button' value='" . $key . "' class='menu_btn' onclick='goToPage(\"" . $value . "&submenu=search\");' /><br>";
	}
}
?>
