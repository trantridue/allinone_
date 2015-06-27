<?php
echo "<strong>".date('Y-m-d H:i:s').tab8."</strong>"; 
if($commonService->isAdmin()) 
echo $reportService->showStaticInformationFooter();
$reportService->saveProperty();
?>