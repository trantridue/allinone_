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
	function getReportParameters(){
		$parameterArray = array (
				'datefrom' => $_REQUEST ['datefrom'],
				'dateto' => $_REQUEST ['dateto'],
				'id_shop' => $_REQUEST ['id_shop'],
				'charttype' => $_REQUEST ['charttype'],
				'charttime' => $_REQUEST ['charttime']
		);
		return $parameterArray;
	}
	function generateDataExportChart ($params,$chartId,$title,$nbrShop){
		$datefrom = isset($params['datefrom'])?$params['datefrom']:date('Y-m-01');
		$dateto = isset($params['dateto'])?$params['dateto']:date('Y-m-t');
		$charttype = isset($params['charttype'])?$params['charttype']:'spline';
		$charttime = isset($params['charttime'])?$params['charttime']:'%Y-%m-%d';
		$id_shop = $params['id_shop'];
		$str =		
		 "$(document).ready(function () {
            $('#".$chartId."').jqChart({
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
                title: { text: '".$title."' },
                axes: [
                        {
                        	type: 'category',
                            location: 'bottom',
                            zoomEnabled: true
                        }
                      ],
                series: [";
          $str = $str.$this->genData($datefrom,$dateto,$charttype,$charttime,$nbrShop,$id_shop)                 
                        ."]
            });
        });";
  	echo $str;
	}
	function genData($datefrom,$dateto,$charttype,$charttime,$nbrShop,$id_shop){
		$returnStr = "";
		if($id_shop !='') {
			$returnStr = $returnStr.$this->generateDataByShop($datefrom,$dateto,$charttype,$charttime,$id_shop);
		}else {
			for($i=0;$i<=$nbrShop;$i++){
				$returnStr = $returnStr.$this->generateDataByShop($datefrom,$dateto,$charttype,$charttime,$i);
			}
		}
		return substr($returnStr,0,-1);
	}
	function generateDataByShop($datefrom,$dateto,$charttype,$charttime,$shop_id){
		$qry = "";
		$str = "";
		$qry1 = "";
		$str1 = "";
		$qry2 = "";
		$str2 = "";
		if($shop_id==0){
			$str =   "{	title : 'Income All ',type: '".$charttype."',data: [";
			$qry = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			t1.export_price ) AS total,
			       Date_format(t2.date, '".$charttime."') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND t2.date BETWEEN '".$datefrom."' and '".$dateto."'
			GROUP  BY Date_format(t2.date, '".$charttime."')";
			$str1 =   "{	title : 'Interet All ',type: '".$charttype."',data: [";
			$qry1 = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			(t1.export_price - (SELECT Max(import_price)
                              FROM   product_import
                              WHERE  product_code =
       				t1.product_code) ) ) AS total,
			       Date_format(t2.date, '".$charttime."') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND t2.date BETWEEN '".$datefrom."' and '".$dateto."'
			GROUP  BY Date_format(t2.date, '".$charttime."')";
			
		}else {
			$str =   "{	title : 'Income Shop ".$shop_id."',type: '".$charttype."',data: [";
			$qry = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			t1.export_price ) AS total,
			       Date_format(t2.date, '".$charttime."') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND t2.shop_id = ".$shop_id."
			       AND t2.date BETWEEN '".$datefrom."' and '".$dateto."'
			GROUP  BY Date_format(t2.date, '".$charttime."')";
			$str1 =   "{	title : 'Interet Shop ".$shop_id."',type: '".$charttype."',data: [";
			$qry1 = "SELECT Sum(( t1.quantity - t1.re_qty ) *
           			(t1.export_price - (SELECT Max(import_price)
                              FROM   product_import
                              WHERE  product_code =
       				t1.product_code) ) ) AS total,
			       Date_format(t2.date, '".$charttime."') as date
			FROM   export_facture_product t1,
			       export_facture t2
			WHERE  t1.export_facture_code = t2.code
			       AND t2.shop_id = ".$shop_id."
			       AND t2.date BETWEEN '".$datefrom."' and '".$dateto."'
			GROUP  BY Date_format(t2.date, '".$charttime."')";
		}
		$str2 =   "{	title : 'Chi phí ',type: '".$charttype."',data: [";
		$qry2 = "SELECT Sum(amount) AS total,
		       Date_format(date, '".$charttime."') as date
		FROM   spend
		WHERE  date BETWEEN '".$datefrom."' and '".$dateto."'
		GROUP  BY Date_format(date, '".$charttime."')";
			
		$result = mysql_query ( $qry, $this->connection );
		$result1 = mysql_query ( $qry1, $this->connection );
		$result2 = mysql_query ( $qry2, $this->connection );
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$str = $str."['".$rows['date']."',".$rows['total']."],";
		}
		$str = $str."]},";
		while ( $rows1 = mysql_fetch_array ( $result1 ) ) {
			$str1 = $str1."['".$rows1['date']."',".$rows1['total']."],";
		}
		$str1 = $str1."]},";
		while ( $rows2 = mysql_fetch_array ( $result2 ) ) {
			$str2 = $str2."['".$rows2['date']."',".$rows2['total']."],";
		}
		$str2 = $str2."]},";
		if($shop_id==0){
			return $str.$str1.$str2;
		} else {
			return $str.$str1;	
		}
		
	}
	function generateStatistic($params){
		$datefrom = isset($params['datefrom'])?$params['datefrom']:date('Y-m-01');
		$dateto = isset($params['dateto'])?$params['dateto']:date('Y-m-t');
		echo "<div>";
		$this->generateCash();
		$this->generateLoan();
		echo "</div>";
	}
	function getAmountReport($qry){
		$amount = 0;
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$amount = $rows['amount'];
		}
		return number_format($amount,2,'.',',');
	}
	function generateCash(){
		$qry = "select sum(amount) as amount from fund_change_histo where fund_id = 1 ";
		echo "<div class='reportStatDiv'>Tiền trong két : <strong>".$this->getAmountReport($qry)."</strong> </div>";
	}
	function generateLoan(){
		echo "<div class='reportStatDiv'>LOAN:</div>";
	}
}
?>