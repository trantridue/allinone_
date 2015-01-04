<?php
$provider_name = $_REQUEST ['provider_name'];
$provider_address = $_REQUEST ['provider_address'];
$provider_tel = $_REQUEST ['provider_tel'];
$provider_description = $_REQUEST ['provider_description'];

$providerService->addProvider ( $provider_name, $provider_address, $provider_tel, $provider_description);
?>