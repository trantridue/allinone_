<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');
require_once ("../include/constant.php");
require_once ("../include/reportService.php");
require_once ("../include/commonService.php");

function sendMail() {
	//$data = json_decode($_REQUEST['data']);
	$td = date('Y-m-d');
	$shopid = $_REQUEST['shop'];
	$export_facture_code = $_REQUEST['export_facture_code'];
	$final_total = $_REQUEST['final_total'];
	$customer_name = $_REQUEST['customer_name'];
	$customer_tel = $_REQUEST['customer_tel'];
	$export_number_row = $_REQUEST['export_number_row'];
	$customer_description = $_REQUEST['customer_description'];
	$export_date = $_REQUEST['export_date'];
	$site = $_SERVER['HTTP_HOST'];
	
	$detail = "<table style='border-collapse: collapse;border:1'>"
		."<tr>"
		."<td width='5%'>TT</td>"
		."<td width='10%'>Mã</td>"
		."<td>Tên</td>"
		."<td width='5%'>SL</td>"
		."<td width='5%'>Gốc</td>"
		."<td width='5%'>Bán</td>"
		."<td width='5%'>Sale</td>"
		."</tr>";
	$counter = 0;
	for($i = 1; $i <= $export_number_row; $i ++) {
		
		if($_REQUEST['productcode_' . $i] != '') {
			$counter = $counter + 1;
			$detail = $detail."<tr>"
			."<td>".$counter."</td>"
			."<td>".$_REQUEST['productcode_' . $i]."</td>"
			."<td>".$_REQUEST['hide_productname_' . $i]."</td>"
			."<td>".$_REQUEST['quantity_' . $i]."</td>"
			."<td>".$_REQUEST['hide_exportpostedprice_' . $i]."</td>"
			."<td>".$_REQUEST['exportprice_' . $i]."</td>"
			."<td>".$_REQUEST['salebyproduct_' . $i]."</td>"
			."</tr>";
		}
	}
	$detail = $detail . "</table>";
	
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
$subject= "Shop ".$shopid." : " .$final_total. " : ".$reportService->getAmountToDay();
$mail->Subject = "=?UTF-8?B?".base64_encode($subject)."?=";
$mail->Body = "Hóa đơn : ". $export_facture_code
."<br/> Khách :".$customer_name
."<br/> Tel :".$customer_tel
."<br/> Description :".$customer_description
."<br/> Date :".$export_date
."<hr>".$detail."<hr>"
."<br/> Shop 1 : ".$reportService->getCashByShop($td,$td,1)
."<br/> Shop 2 : ".$reportService->getCashByShop($td,$td,2)
."<br/> Shop 3 : ".$reportService->getCashByShop($td,$td,3)
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