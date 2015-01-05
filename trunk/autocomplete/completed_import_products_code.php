<?php
require_once ("../login/constant.php");
require_once ("../login/importServices/importServices.php");
$ImportServices = new ImportServices ( );
$ImportServices->InitDB ( hostname, username, password, database );
if (isset ( $_GET ['term'] )) {
	echo json_encode ( $ImportServices->getJsonProductImport ( $_GET ['term'] ) );
}
?>