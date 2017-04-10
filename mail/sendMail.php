<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');

function sendMail() {
	$data = $_REQUEST['data'];

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "dtrantri.fr@gmail.com";
$mail->Password = "Kh0ngba0gi0";
$mail->setFrom("trantridue@gmail.com");
$subject= " vừa bán hàng" ;
$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$mail->Body = $data;
$mail->AddAddress("dtrantri.fr@gmail.com");

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