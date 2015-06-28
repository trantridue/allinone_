<?php
ob_start ();
class ReportService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function ReportService($hostname, $username, $password, $database, $commonService) {
		// -----Initialization -------
		$this->InitDB ( $hostname, $username, $password, $database );
		$this->commonService = $commonService;
	}
	function InitDB($host, $uname, $pwd, $database) {
		$this->db_host = $host;
		$this->username = $uname;
		$this->pwd = $pwd;
		$this->database = $database;
		$this->DBLogin ();
	}
	function DBLogin() {
		$this->connection = mysql_connect ( $this->db_host, $this->username, $this->pwd );
		
		if (! $this->connection) {
			$this->HandleDBError ( "Database Login failed! Please make sure that the DB login credentials provided are correct" );
			return false;
		}
		if (! mysql_select_db ( $this->database, $this->connection )) {
			$this->HandleDBError ( 'Failed to select database: ' . $this->database . ' Please make sure that the database name provided is correct' );
			return false;
		}
		if (! mysql_query ( "SET NAMES 'UTF8'", $this->connection )) {
			$this->HandleDBError ( 'Error setting utf8 encoding' );
			return false;
		}
		return true;
	}
	function HandleDBError($err) {
		$this->HandleError ( $err . "\r\n mysqlerror:" . mysql_error () );
	}
	function getReportParameters() {
		$parameterArray = array ('datefrom' => $_REQUEST ['datefrom'], 'dateto' => $_REQUEST ['dateto'], 'id_shop' => $_REQUEST ['id_shop'], 'charttype' => $_REQUEST ['charttype'], 'charttime' => $_REQUEST ['charttime'] );
		return $parameterArray;
	}
	function generateDataExportChart($params, $chartId, $title, $nbrShop) {
		$datefrom = isset ( $params ['datefrom'] ) ? $params ['datefrom'] : date ( 'Y-m-01' );
		$dateto = isset ( $params ['dateto'] ) ? $params ['dateto'] : date ( 'Y-m-t' );
		$charttype = isset ( $params ['charttype'] ) ? $params ['charttype'] : 'spline';
		$charttime = isset ( $params ['charttime'] ) ? $params ['charttime'] : '%Y-%m-%d';
		$id_shop = $params ['id_shop'];
		$str = "$(document).ready(function () {
            $('#" . $chartId . "').jqChart({
            	background: background,      
            	border: { strokeStyle: '#6ba851' },            	
            	tooltips: { type: 'shared' },
            	shadows: {
                    enabled: true,
                    shadowColor: 'gray',
                    shadowBlur: 10,
                    shadowOffsetX: 3,
                    shadowOffsetY: 3
                },
                crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
            	legend: { title: 'Legend' },            	
                title: { text: '" . $title . "' },
                axes: [
                        {
                        	type: 'category',
                            location: 'bottom',
                            zoomEnabled: true
                        }
                      ],
                series: [";
		$str = $str . $this->genDataExport ( $datefrom, $dateto, $charttype, $charttime, $nbrShop, $id_shop ) . "]
            });
        });";
		echo $str;
	}
	function generateDataPropertyChart($params, $chartId, $title, $nbrShop) {
		$datefrom = isset ( $params ['datefrom'] ) ? $params ['datefrom'] : date ( 'Y-m-01' );
		$dateto = isset ( $params ['dateto'] ) ? $params ['dateto'] : date ( 'Y-m-t' );
		$charttype = isset ( $params ['charttype'] ) ? $params ['charttype'] : 'spline';
		$charttime = isset ( $params ['charttime'] ) ? $params ['charttime'] : '%Y-%m-%d';
		$id_shop = $params ['id_shop'];
		$str = "$(document).ready(function () {
            $('#" . $chartId . "').jqChart({
            	background: background,      
            	border: { strokeStyle: '#6ba851' },            	
            	tooltips: { type: 'shared' },
            	shadows: {
                    enabled: true,
                    shadowColor: 'gray',
                    shadowBlur: 10,
                    shadowOffsetX: 3,
                    shadowOffsetY: 3
                },
                crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
            	legend: { title: 'Legend' },            	
                title: { text: '" . $title . "' },
                axes: [
                        {
                        	type: 'category',
                            location: 'bottom',
                            zoomEnabled: true
                        }
                      ],
                series: [";
		$str = $str . $this->genDataProperty ( $datefrom, $dateto, $charttype, $charttime, $nbrShop, $id_shop ) . "]
            });
        });";
		echo $str;
	}
	function genDataExport($datefrom, $dateto, $charttype, $charttime, $nbrShop, $id_shop) {
		$returnStr = "";
		if ($id_shop != '') {
			$returnStr = $returnStr . $this->generateDataByShop ( $datefrom, $dateto, $charttype, $charttime, $id_shop );
		} else {
			for($i = 0; $i <= $nbrShop; $i ++) {
				$returnStr = $returnStr . $this->generateDataByShop ( $datefrom, $dateto, $charttype, $charttime, $i );
			}
		}
		return substr ( $returnStr, 0, - 1 );
	}
	function genDataProperty($datefrom, $dateto, $charttype, $charttime, $nbrShop, $id_shop) {
		$returnStr = "";
		$returnStr = $returnStr . $this->generateProperty ( $datefrom, $dateto, $charttype, $charttime, $id_shop );
		return substr ( $returnStr, 0, - 1 );
	}
	function generateProperty($datefrom, $dateto, $charttype, $charttime, $shop_id) {
		$qry = "";
		$str = "";
		
		$str = "{	title : 'Property',type: '" . $charttype . "',data: [";
		$qry = "select avg(t1.amount) as total,Date_format(t1.date, '" . $charttime . "') 
		as date from  property t1 where t1.date BETWEEN '" . $datefrom . "' and '" . $dateto . "'
		GROUP  BY Date_format(t1.date, '" . $charttime . "')";
		
		$str1 = "{	title : 'Fund',type: '" . $charttype . "',data: [";
		$qry1 = "select avg(t1.fund) as total,Date_format(t1.date, '" . $charttime . "') 
		as date from  property t1 where t1.date BETWEEN '" . $datefrom . "' and '" . $dateto . "'
		GROUP  BY Date_format(t1.date, '" . $charttime . "')";
		
		$str2 = "{	title : 'Chi phí ',type: '" . $charttype . "',data: [";
		$qry2 = "SELECT Sum(amount) AS total,
		       Date_format(date, '" . $charttime . "') as date
		FROM   spend
		WHERE  Date_format(date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
		GROUP  BY Date_format(date, '" . $charttime . "')";
		
		$result = mysql_query ( $qry, $this->connection );
		$result1 = mysql_query ( $qry1, $this->connection );
		$result2 = mysql_query ( $qry2, $this->connection );
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$str = $str . "['" . $rows ['date'] . "'," . $rows ['total'] . "],";
		}
		$str = $str . "]},";
		
		while ( $rows1 = mysql_fetch_array ( $result1 ) ) {
			$str1 = $str1 . "['" . $rows1 ['date'] . "'," . $rows1 ['total'] . "],";
		}
		$str1 = $str1 . "]},";
		
		while ( $rows2 = mysql_fetch_array ( $result2 ) ) {
			$str2 = $str2 . "['" . $rows2 ['date'] . "'," . $rows2 ['total'] . "],";
		}
		$str2 = $str2 . "]},";
		
		$str = $str.$str1.$str2;
		
		return $str;
	
	}
	function generateDataByShop($datefrom, $dateto, $charttype, $charttime, $shop_id) {
		$qry = "";
		$str = "";
		$qry1 = "";
		$str1 = "";
		$qry2 = "";
		$str2 = "";
		$qry3 = "";
		$str3 = "";
		$qry4 = "";
		$str4 = "";
		if ($shop_id == 0) {
			$str = "{	title : 'Income All ',type: '" . $charttype . "',data: [";
			$qry = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			t1.export_price ) AS total,
			       Date_format(t2.date, '" . $charttime . "') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND Date_format(t2.date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
			GROUP  BY Date_format(t2.date, '" . $charttime . "')";
			$str1 = "{	title : 'Interet All ',type: '" . $charttype . "',data: [";
			$qry1 = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			(t1.export_price - (SELECT Max(import_price)
                              FROM   product_import
                              WHERE  product_code =
       				t1.product_code) ) ) AS total,
			       Date_format(t2.date, '" . $charttime . "') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND Date_format(t2.date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
			GROUP  BY Date_format(t2.date, '" . $charttime . "')";
		
		} else {
			$str = "{	title : 'Income Shop " . $shop_id . "',type: '" . $charttype . "',data: [";
			$qry = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			t1.export_price ) AS total,
			       Date_format(t2.date, '" . $charttime . "') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND t2.shop_id = " . $shop_id . "
			       AND Date_format(t2.date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
			GROUP  BY Date_format(t2.date, '" . $charttime . "')";
			$str1 = "{	title : 'Interet Shop " . $shop_id . "',type: '" . $charttype . "',data: [";
			$qry1 = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			(t1.export_price - (SELECT Max(import_price)
                              FROM   product_import
                              WHERE  product_code =
       				t1.product_code) ) ) AS total,
			       Date_format(t2.date, '" . $charttime . "') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND t2.shop_id = " . $shop_id . "
			       AND Date_format(t2.date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
			GROUP  BY Date_format(t2.date, '" . $charttime . "')";
		}
		$str2 = "{	title : 'Chi phí ',type: '" . $charttype . "',data: [";
		$qry2 = "SELECT Sum(amount) AS total,
		       Date_format(date, '" . $charttime . "') as date
		FROM   spend
		WHERE  Date_format(date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
		GROUP  BY Date_format(date, '" . $charttime . "')";
		
		$str3 = "{	title : 'Chi phí Shop',type: '" . $charttype . "',data: [";
		$qry3 = "SELECT Sum(amount) AS total,
		       Date_format(date, '" . $charttime . "') as date
		FROM   spend
		WHERE  spend_for_id =2 and Date_format(date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
		GROUP  BY Date_format(date, '" . $charttime . "')";
		
		$str4 = "{	title : 'Chi phí Fami',type: '" . $charttype . "',data: [";
		$qry4 = "SELECT Sum(amount) AS total,
		       Date_format(date, '" . $charttime . "') as date
		FROM   spend
		WHERE  spend_for_id =1 and Date_format(date, '%Y-%m-%d') BETWEEN '" . $datefrom . "' and '" . $dateto . "'
		GROUP  BY Date_format(date, '" . $charttime . "')";
		
		$result = mysql_query ( $qry, $this->connection );
		$result1 = mysql_query ( $qry1, $this->connection );
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$str = $str . "['" . $rows ['date'] . "'," . $rows ['total'] . "],";
		}
		$str = $str . "]},";
		//
		while ( $rows1 = mysql_fetch_array ( $result1 ) ) {
			$str1 = $str1 . "['" . $rows1 ['date'] . "'," . $rows1 ['total'] . "],";
		}
		$str1 = $str1 . "]},";
		
		if ($shop_id == 0) {
			$result2 = mysql_query ( $qry2, $this->connection );
			$result3 = mysql_query ( $qry3, $this->connection );
			$result4 = mysql_query ( $qry4, $this->connection );
			//
			while ( $rows2 = mysql_fetch_array ( $result2 ) ) {
				$str2 = $str2 . "['" . $rows2 ['date'] . "'," . $rows2 ['total'] . "],";
			}
			$str2 = $str2 . "]},";
			//
			while ( $rows3 = mysql_fetch_array ( $result3 ) ) {
				$str3 = $str3 . "['" . $rows3 ['date'] . "'," . $rows3 ['total'] . "],";
			}
			$str3 = $str3 . "]},";
			//
			while ( $rows4 = mysql_fetch_array ( $result4 ) ) {
				$str4 = $str4 . "['" . $rows4 ['date'] . "'," . $rows4 ['total'] . "],";
			}
			$str4 = $str4 . "]},";
			return $str . $str1 . $str2 . $str3 . $str4;
		} else {
			return $str . $str1;
		}
	
	}
	function generateStatistic($params) {
		$datefrom = isset ( $params ['datefrom'] ) ? $params ['datefrom'] : date ( 'Y-m-d' );
		$dateto = isset ( $params ['dateto'] ) ? $params ['dateto'] : date ( 'Y-m-d' );
		echo "<div>";
		echo "<div class='reportStatDiv'>" . $this->showStaticInformation () . "</div>";
		echo "<div class='reportStatDiv'>" . $this->showDynamicInformation ( $datefrom, $dateto ) . "</div>";
		echo "</div>";
	}
	function getAmountReport($qry) {
		$amount = 0;
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$amount = $rows ['amount'];
		}
		return number_format ( $amount, 0, '.', ',' );
	}
	function getAmountReport2Zero($qry) {
		$amount = 0;
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$amount = $rows ['amount'];
		}
		return number_format ( $amount, 0, '.', ',' );
	}
	function getAmountReportnoFormat($qry) {
		$amount = 0;
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$amount = $rows ['amount'];
		}
		return $amount;
	}
	function amountInket() {
		//tien trong ket
		$qry = "select sum(amount*ratio) as amount from fund_change_histo where fund_id = 1 ";
		return $this->getAmountReportnoFormat ( $qry );
	}
	function amountImportLoan() {
		//no tien hang
		$qry = "SELECT
       sum(( Ifnull(t2.total, 0) - Ifnull(t2.paid, 0) - Ifnull(t2.total_return, 0))) AS amount
		FROM   (SELECT t1.*,
               (SELECT Round(Sum(import_price * quantity))
                FROM   product_import
                WHERE  import_facture_code IN (SELECT code 
                                               FROM   import_facture 
                                               WHERE  provider_id = t1.id)) AS
               total,
               (SELECT Sum(amount) 
                FROM   provider_paid
                WHERE  provider_id = t1.id)                                 AS
               paid,
               (select sum(quantity*return_price) from product_return where provider_id = t1.id) as total_return
        FROM   provider t1  ) t2";
		return $this->getAmountReportnoFormat ( $qry );
	}
	
	function showStaticInformation() {
		$amountInket = $this->amountInket ();
		$amountImportLoan = $this->amountImportLoan ();
		$amountInFund = $this->amountInFund ();
		$amountInstock = $this->amountInstock ();
		$amountDebt = $this->amountDebt ();
		
		return "<table width='100%'><tr><td align='right'>Tiền trong két :</td> <td><strong>" . $this->formatNumber ( $amountInket ) . "</strong></td>
		<td align='right'>Nợ tiền hàng : </td> <td><strong> " . $this->formatNumber ( $amountImportLoan ) . "</strong></td>
		<td align='right'>Tiền trong quỹ : </td> <td><strong> " . $this->formatNumber ( $amountInFund ) . "</strong></td>
		<td align='right'>Kho hàng : </td> <td><strong> " . $this->formatNumber ( $amountInstock ) . "</strong></td>
		<td align='right'>Khách nợ : </td> <td><strong> " . $this->formatNumber ( $amountDebt ) . "</strong></td>
		<td align='right'>Tổng tài sản : </td> <td><strong> " . $this->formatNumber ( $amountInFund - $amountImportLoan + $amountInstock + $amountDebt ) . "</strong></td></tr></table>";
	}
	function showStaticInformationFooter() {
		$amountInket = $this->amountInket ();
		$amountImportLoan = $this->amountImportLoan ();
		$amountInFund = $this->amountInFund ();
		$amountInstock = $this->amountInstock ();
		$amountDebt = $this->amountDebt ();
		
		return "<strong>" . "
		KET :" . $this->formatNumber ( $amountInket ) . tab4 . "
		LOAN :  " . $this->formatNumber ( $amountImportLoan ) . tab4 . "
		FUND :  " . $this->formatNumber ( $amountInFund ) . tab4 . "
		STORE : " . $this->formatNumber ( $amountInstock ) . tab4 . "
		DEBT :  " . $this->formatNumber ( $amountDebt ) . tab4 . "
		PROPERTY :  " . $this->formatNumber ( $amountInFund - $amountImportLoan + $amountInstock + $amountDebt ) . "</strong>";
	}
	function saveProperty() {
//		echo date ( 'H' );
		if (date ( 'H' ) <= $_SESSION['start_time_backup'] || date ( 'H' ) >= $_SESSION['end_time_backup']) {
			$query = "select count(*) as amount from property where date = '" . date ( 'Y-m-d' ) . "'";
			if ($this->getAmountReportnoFormat ( $query ) == 0) {
				$amountInket = $this->amountInket ();
				$amountImportLoan = $this->amountImportLoan ();
				$amountInFund = $this->amountInFund ();
				$amountInstock = $this->amountInstock ();
				$amountDebt = $this->amountDebt ();
				$property = $amountInFund - $amountImportLoan + $amountInstock + $amountDebt;
				
				$qryInsertProperty = "insert into property(date,amount,ket,loan,fund,store,debt) 
			values ('" . date ( 'Y-m-d' ) . "'," . $property . "," . $amountInket . "," . $amountImportLoan . "," . $amountInFund . "," . $amountInstock . "," . $amountDebt . ")";
				mysql_query ( $qryInsertProperty, $this->connection );
			}
		}
	}
	function formatNumber($number) {
		return number_format ( $number, 0, '.', ',' );
	}
	
	function showDynamicInformation($startdate, $enddate) {
		$str = "<table width='100%' style='font-size:10pt;'><tr><td align='right' style='background-color:pink;'>CASH All: </td>
				<td style='background-color:pink;'><strong>" . $this->getCashByShop ( $startdate, $enddate, 'all' ) . tab4 . "</strong></td>
				 <td align='right'>CASH 1: </td><td><strong>" . $this->getCashByShop ( $startdate, $enddate, 1 ) . tab4 . "</strong>
				 <td align='right'>CASH 2: </td><td><strong>" . $this->getCashByShop ( $startdate, $enddate, 2 ) . tab4 . "</strong>
				 <td align='right'>CASH 3: </td><td><strong>" . $this->getCashByShop ( $startdate, $enddate, 3 ) . tab4 . "</strong>
				 <td align='right' style='background-color:violet;'>ROI ALL: </td>
				 <td style='background-color:violet;'><strong>" . $this->getRoiByShopAndDate ( $startdate, $enddate, 'all' ) . tab4 . "</strong>
				 <td align='right'>ROI 1: </td><td><strong>" . $this->getRoiByShopAndDate ( $startdate, $enddate, 1 ) . tab4 . "</strong>
				 <td align='right'>ROI 2: </td><td><strong>" . $this->getRoiByShopAndDate ( $startdate, $enddate, 2 ) . tab4 . "</strong>
				 <td align='right'>ROI 3: </td><td><strong>" . $this->getRoiByShopAndDate ( $startdate, $enddate, 3 ) . tab4 . "</strong></td></tr>
				 <tr>
				 <td align='right' style='background-color:yellow;'>Ex ALL: </td>
				 <td style='background-color:yellow;'><strong>" . $this->getExportByShopAndDate ( $startdate, $enddate, 'all' ) . tab4 . "</strong>
				 <td align='right'>Ex 1: </td><td><strong>" . $this->getExportByShopAndDate ( $startdate, $enddate, 1 ) . tab4 . "</strong>
				 <td align='right'>Ex 2: </td><td><strong>" . $this->getExportByShopAndDate ( $startdate, $enddate, 2 ) . tab4 . "</strong>
				 <td align='right'>Ex 3: </td><td><strong>" . $this->getExportByShopAndDate ( $startdate, $enddate, 3 ) . tab4 . "</strong></td>
				 <td align='right' style='background-color:rgb(65, 140, 240);'>Re ALL: </td>
				 <td style='background-color:rgb(65, 140, 240);'><strong>" . $this->getReturnByShopAndDate ( $startdate, $enddate, 'all' ) . tab4 . "</strong>
				 <td align='right'>Re  1: </td><td><strong>" . $this->getReturnByShopAndDate ( $startdate, $enddate, 1 ) . tab4 . "</strong>
				 <td align='right'>Re  2: </td><td><strong>" . $this->getReturnByShopAndDate ( $startdate, $enddate, 2 ) . tab4 . "</strong>
				 <td align='right'>Re  3: </td><td><strong>" . $this->getReturnByShopAndDate ( $startdate, $enddate, 3 ) . tab4 . "</strong></td>
				
				 </tr>
				 </table>
				 ";
		return $str;
	}
	
	function getExportByShopAndDate($startdate, $enddate, $shopid) {
		$qry = "";
		if ($shopid == 'all') {
			$qry = "select sum((t1.quantity-t1.re_qty)*t1.export_price) AS amount
				FROM   export_facture_product t1,
				       export_facture t2
				WHERE  t1.export_facture_code = t2.code
				       AND date_format(t2.date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		
		} else {
			$qry = "select sum((t1.quantity-t1.re_qty)*t1.export_price) AS amount
				FROM   export_facture_product t1,
				       export_facture t2
				WHERE  t1.export_facture_code = t2.code and t2.shop_id=" . $shopid . "
				       AND date_format(t2.date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		}
		return $this->getAmountReport2Zero ( $qry );
	}
	function getInoutByShopAndDate($startdate, $enddate, $shopid) {
		$qry = "";
		if ($shopid == 'all') {
			$qry = "select sum(amount) AS amount
				FROM   money_inout t1
				WHERE  date_format(t1.date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		
		} else {
			$qry = "select sum(amount) AS amount
				FROM   money_inout t1
				WHERE  t1.shop_id = " . $shopid . " and date_format(t1.date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		}
		return $this->getAmountReport2Zero ( $qry );
	}
	function getReturnByShopAndDate($startdate, $enddate, $shopid) {
		$qry = "";
		if ($shopid == 'all') {
			$qry = "select sum(t1.re_qty*t1.export_price) AS amount
				FROM   export_facture_product t1
				WHERE  date_format(t1.re_date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		
		} else {
			$qry = "select sum(t1.re_qty*t1.export_price) AS amount
				FROM   export_facture_product t1,
					   export_facture t2
				WHERE  t1.export_facture_code = t2.code and t2.shop_id=" . $shopid . "
				       AND date_format(t1.re_date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		}
		return $this->getAmountReport2Zero ( $qry );
	}
	function getRoiByShopAndDate($startdate, $enddate, $shopid) {
		$qry = "";
		if ($shopid == 'all') {
			$qry = "SELECT ifnull((Sum(( t1.quantity - t1.re_qty ) *
	           			(t1.export_price - (SELECT Max(import_price)
	                              FROM   product_import
	                              WHERE  product_code =
	       				t1.product_code) ) )/Sum(( t1.quantity - t1.re_qty ) *
	           			t1.export_price )),0)*100 AS amount
				FROM   export_facture_product t1,
				       export_facture t2
				WHERE  t1.export_facture_code = t2.code
				       AND date_format(t2.date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		
		} else {
			$qry = "SELECT ifnull((Sum(( t1.quantity - t1.re_qty ) *
	           			(t1.export_price - (SELECT Max(import_price)
	                              FROM   product_import
	                              WHERE  product_code =
	       				t1.product_code) ) )/Sum(( t1.quantity - t1.re_qty ) *
	           			t1.export_price )),0)*100 AS amount
				FROM   export_facture_product t1,
				       export_facture t2
				WHERE  t1.export_facture_code = t2.code and t2.shop_id=" . $shopid . "
				       AND date_format(t2.date,'%Y-%m-%d') BETWEEN '" . $startdate . "' and '" . $enddate . "'";
		}
		return $this->getAmountReport2Zero ( $qry );
	}
	function getCashByShop($start_date, $end_date, $shop_id) {
		session_start ();
		$cash = 0;
		$qryFacture = "";
		$qryInout = "";
		$cashCaseAll = 0;
		if ($shop_id == 'all') {
			$qryFacture = "select sum(if((give_customer>0),(customer_give - give_customer),customer_give)) as amount
			from export_facture_trace where export_facture_code in 
			(select code from export_facture where date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "')";
			
			$qryInout = "select sum(amount) as amount 
			from money_inout where  date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";
			$cashCaseAll = $_SESSION ['init_money'] * 2;
		} else {
			$qryFacture = "select sum(if((give_customer>0),(customer_give - give_customer),customer_give)) as amount
			from export_facture_trace where shop_id = " . $shop_id . " and export_facture_code in 
			(select code from export_facture where date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "')";
			
			$qryInout = "select sum(amount) as amount from money_inout where shop_id = " . $shop_id . " 
			and date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";
		}
		$cash = $_SESSION ['init_money'] + $cashCaseAll + $this->commonService->getAmountResult ( $qryFacture ) + $this->commonService->getAmountResult ( $qryInout );
		return number_format ( $cash, 0, '.', ',' );
	}
	function amountInFund() {
		$qry = "select sum(amount*ratio) as amount from fund_change_histo where fund_id <> 18 ";
		return $this->getAmountReportnoFormat ( $qry );
	}
	function amountInstock() {
		$qry = "select sum((select max(import_price) from product_import where product_code =t1.code)*(
			(select ifnull(sum(quantity),0) from product_import where product_code = t1.code) -
		(select ifnull(sum(quantity),0) from product_return where product_code = t1.code) -
		(select ifnull(sum(quantity),0) from export_facture_product where product_code = t1.code) +
		(select ifnull(sum(re_qty),0) from export_facture_product where product_code = t1.code) +
		(select ifnull(sum(quantity),0) from product_deviation where product_code = t1.code))) as amount from product t1";
		return $this->getAmountReportnoFormat ( $qry );
	}
	function amountDebt() {
		$qry = "select sum(t.total-t.paid) as amount from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where (t.total-t.paid) > 0 ";
		return $this->getAmountReportnoFormat ( $qry );
	}
	function listExportTrace($params) {
		$datefrom = isset ( $params ['datefrom'] ) ? $params ['datefrom'] : date ( 'Y-m-01' );
		$dateto = isset ( $params ['dateto'] ) ? $params ['dateto'] : date ( 'Y-m-d' );
		
		$qry = "select t1.*,t2.date,t3.name as shop,t4.name as customer,t4.tel as tel 
		from export_facture_trace t1,
		 export_facture t2 ,shop t3, customer t4
		where t3.id = t1.shop_id and t4.id = t1.customer_id and t2.code = t1.export_facture_code and
		 Date_format(t2.date, '%Y-%m-%d') between '" . $datefrom . "' and '" . $dateto . "'";
		
		if ($params ['id_shop'] != '') {
			$qry = $qry . " and t1.shop_id = " . $params ['id_shop'];
		}
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array ("id,tel" => "id,customer", "export_facture_code" => "Code", "total" => "total", "customer_give" => "customer give", "give_customer" => "give customer", "return_amount" => "return amount", "amount" => "amount", "debt" => "debt", "reserved" => "reserved", "order" => "order", "bonus_used" => "bonus used", "shop" => "shop", "date" => "date" );
		$this->commonService->generateJSDatatableSimple ( 'export_trace', 12, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, 'export_trace', $array_column );
	}
}
?>