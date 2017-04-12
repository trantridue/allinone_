<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');

function sendMail() {
	//$data = json_decode($_REQUEST['data']);
	
	$shopid = $_REQUEST['shop'];
	$export_facture_code = $_REQUEST['facture'];
	$final_total = $_REQUEST['final_total'];
	$cus_name = $_REQUEST['cus_name'];
	$cus_tel = $_REQUEST['cus_tel'];
	
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
$subject= "Shop ".$shopid.": " .$final_total. "K " . " : ".date("Y-m-d H:i:s");
$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$mail->Body = "Chi tiet hoa don so : ". $export_facture_code. " (đang được xử lý)<br/> Khách :".$cus_name."<br/> Tel :".$cus_tel;
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