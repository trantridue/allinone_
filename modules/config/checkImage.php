<?php
$filelist = glob("../../img/product/*.png");
foreach ($filelist as $value) {
$start =  strrpos($value,'/',-1);
$end =  strrpos($value,'.',-1);
echo substr($value,$start+1,$end-$start-1)."<br>";
}
?>