<?php
$submodule = isset ( $_REQUEST ['submenu'] ) ? $_REQUEST ['submenu'] : defaultsubmodule;
$module = isset ( $_REQUEST ['module'] ) ? $_REQUEST ['module'] : defaultmodule;
?>

<?php
$arr = array (
		//"search" => "LIST",
		//"add" => "ADD" 
);

foreach ( $arr as $value => $key ) {
	if ($value == $submodule) {
		echo "<input type='button' value='" . $key . "' class='menu_btn_sub active_btn_sub' onclick='goToPage(\"".$module."&submenu=" . $value . "\");' />";
	} else {
		echo "<input type='button' value='" . $key . "' class='menu_btn_sub' onclick='goToPage(\"".$module."&submenu=" . $value . "\");' />";
	}
}
?>
