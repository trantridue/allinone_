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
	function generateDataExportChart ($params){
		$datefrom = isset($params['datefrom'])?$params['datefrom']:date('Y-m-01');
		$dateto = isset($params['dateto'])?$params['dateto']:date('Y-m-t');
		$charttype = isset($params['charttype'])?$params['charttype']:'spline';
		$charttime = isset($params['charttime'])?$params['charttime']:'date';
//		echo $charttype;
		$str =		
		 "$(document).ready(function () {
            $('#exportChart').jqChart({
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
                title: { text: 'Biểu đồ doanh thu' },
                axes: [
                        {
                        	type: 'category',
                            location: 'bottom',
                            zoomEnabled: true
                        }
                      ],
                series: [";
          $str = $str.$this->genData($datefrom,$dateto,$charttype,$charttime)                 
                        ."]
            });
        });";
   echo $str;
	}
	function genData($datefrom,$dateto,$charttype,$charttime){
		$returnStr = "";
		for($i=0;$i<=3;$i++){
			$returnStr = $returnStr.$this->generateDataByShop($datefrom,$dateto,$charttype,$charttime,$i);
		}
		return substr($returnStr,0,-1);
	}
	function generateDataByShop($datefrom,$dateto,$charttype,$charttime,$shop_id){
		$qry = "";
		$str = "";
		if($shop_id==0){
			$str =   "{	title : 'All ',type: '".$charttype."',data: [";
			$qry = "select sum(t1.total) as total, date_format(t2.date,'".$charttime."') as date from export_facture_trace t1, export_facture t2 
		where t1.export_facture_code = t2.code and t2.date between '".$datefrom."' and '".$dateto."'  group by date_format(t2.date,'".$charttime."')";
		}else {
			$str =   "{	title : 'Shop ".$shop_id."',type: '".$charttype."',data: [";
			$qry = "select sum(t1.total) as total, date_format(t2.date,'".$charttime."') as date from export_facture_trace t1, export_facture t2 
			where t1.export_facture_code = t2.code and t2.date between '".$datefrom."' and '".$dateto."' and t1.shop_id =".$shop_id." group by date_format(t2.date,'".$charttime."')";
		}
		$result = mysql_query ( $qry, $this->connection );
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$str = $str."['".$rows['date']."',".$rows['total']."],";
		}
		$str = $str."]},";
		return $str;
//		return "-----".$qry."|";
	}
}
?>