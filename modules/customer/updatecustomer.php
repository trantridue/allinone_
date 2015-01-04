<?php
$provider_id =  $_REQUEST['provider_id'];
$provider_name =  $_REQUEST['provider_name'];
$provider_tel =  $_REQUEST['provider_tel'];
$provider_description =  $_REQUEST['provider_description'];
$provider_address =  $_REQUEST['provider_address'];

$providerService->updateProvider($provider_id,$provider_name,$provider_tel,$provider_description,$provider_address);
?>