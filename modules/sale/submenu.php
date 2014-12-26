<?php
$submenu = $_REQUEST['submenu'] ;
$module = $_REQUEST['module'] ;
?>

<?php
$arr = array (
		"list" => "LIST",
		"sale" => "UPDATE SALE" ,
		"promotion" => "PROMOTION" 
);

foreach ( $arr as $value => $key ) {
	if ($value == $submenu) {
		echo "<input type='button' value='" . $key . "' class='menu_btn_sub active_btn_sub' onclick='goToPage(\"".$module."&submenu=" . $value . "\");' />";
	} else {
		echo "<input type='button' value='" . $key . "' class='menu_btn_sub' onclick='goToPage(\"".$module."&submenu=" . $value . "\");' />";
	}
}
?>
