<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');
require_once ("../include/constant.php");
require_once ("../include/reportService.php");
require_once ("../include/commonService.php");

function sendMail() {
	//$data = json_decode($_REQUEST['data']);
	$td = date('Y-m-d');
	$site = $_SERVER['HTTP_HOST'];
	
	
	
$commonService = new CommonService ();
$reportService = new ReportService ( hostname, username, password, database,$commonService );

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "zabuza.vn@gmail.com";
$mail->Password = "Kh0ngba0gi0";
$mail->setFrom("zabuza.vn@gmail.com");
$subject= $reportService->getAmountToDay()." : ".$reportService->getCashByShop($td,$td,1)." : ".$reportService->getCashByShop($td,$td,2)." : ".$reportService->getCashByShop($td,$td,3);
$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$mail->Body = "<br/> Send From : ".$site;

$mail->AddAddress("trantridue@gmail.com");

 if(!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
}

try {
	sendMail();
} catch (Exception $exc) {
    $mail->setError($exc->getMessage());
    echo 'Send Mail Failed';
}
 ?>