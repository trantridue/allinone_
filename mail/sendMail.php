<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');

function sendMail() {
	//$data = json_decode($_REQUEST['data']);
	
	$shopid = $_REQUEST['shop'];
	$export_facture_code = $_REQUEST['export_facture_code'];
	$final_total = $_REQUEST['final_total'];
	$customer_name = $_REQUEST['customer_name'];
	$customer_tel = $_REQUEST['customer_tel'];
	$export_number_row = $_REQUEST['export_number_row'];
	$site = $_SERVER['HTTP_HOST'];
	
	$detail = "<table style='border-collapse: collapse;border:1'>"
		."<tr>"
		."<td width='10%'>TT</td>"
		."<td width='20%'>Mã</td>"
		."<td width='10%'>SL</td>"
		."<td width='20%'>Giá bán</td>"
		."<td>Sale</td>"
		."</tr>";
	$counter = 0;
	for($i = 1; $i <= $export_number_row; $i ++) {
		$counter = $counter + 1;
		if($_REQUEST['productcode_' . $i] != '') {
			$detail = $detail."<tr>"
			."<td>".$counter."</td>"
			."<td>".$_REQUEST['productcode_' . $i]."</td>"
			."<td>".$_REQUEST['quantity_' . $i]."</td>"
			."<td>".$_REQUEST['exportprice_' . $i]."</td>"
			."<td>".$_REQUEST['salebyproduct_' . $i]."</td>"
			."</tr>";
		}
	}
	$detail = $detail . "</table>";
	
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
$mail->Body = "Hóa đơn : ". $export_facture_code
."<br/> Khách :".$customer_name
."<br/> Tel :".$customer_tel
."<hr>".$detail."<hr>"
."<br/> Send From : ".$site;

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