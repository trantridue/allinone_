<?php
$submenu = $_REQUEST['submenu'] ;
$module = isset ( $_REQUEST ['module'] ) ? $_REQUEST ['module'] : defaultmodule;
?>

<?php
$arr = array (
		"list" => "LIST",
		"add" => "ADD" 
);

foreach ( $arr as $value => $key ) {
	if ($value == $submenu) {
		echo "<input type='button' value='" . $key . "' class='menu_btn_sub active_btn_sub' onclick='goToPage(\"".$module."&submenu=" . $value . "\");' />";
	} else {
		echo "<input type='button' value='" . $key . "' class='menu_btn_sub' onclick='goToPage(\"".$module."&submenu=" . $value . "\");' />";
	}
}
?>
