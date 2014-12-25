<?php
$current_module = $_REQUEST ['module'];
?>

<?php
$arr = array (
		"import" => "IMPORT",
		"export" => "EXPORT",
		"sale" => "SALE",
		"spend" => "SPEND",
		"config" => "CONFIG",
		"news" => "NEWS",
		"report" => "REPORT",
		"user" => "USER",
		"fund" => "FUND" 
);

foreach ( $arr as $value => $key ) {
	if ($value == $current_module) {
		echo "<input type='button' value='" . $key . "' class='menu_btn active_btn' onclick='goToPage(\"" . $value . "\");' /><br>";
	} else {
		echo "<input type='button' value='" . $key . "' class='menu_btn' onclick='goToPage(\"" . $value . "\");' /><br>";
	}
}
?>
