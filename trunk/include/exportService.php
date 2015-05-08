<?php
class ExportService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function ExportService($hostname, $username, $password, $database, $commonService) {
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
	function getJsonProductCode($term) {
		$qry = "select t1.* from product t1		
		where t1.code like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
	
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = "Code : " . $rows ['code'] . ", name :" . $rows ['name'];
			$element = array (code => $rows ['code'], name => $rows ['name'], price => $rows ['export_price'],posted_price => $rows ['export_price'], value => $rows ['code'], label => $labelvalue );
				
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getOrderParameters() {
		$paramsArray = array();
	
		$paramsArray['customer_tel'] 		= $_REQUEST['customer_tel'];
		$paramsArray['customer_name'] 			= $_REQUEST['customer_name'];
		$paramsArray['order_product_code'] 			= $_REQUEST['order_product_code'];
		$paramsArray['order_size'] 	= $_REQUEST['order_size'];
		$paramsArray['order_color'] 	= $_REQUEST['order_color'];
		$paramsArray['order_description'] 			= $_REQUEST['order_description'];
	
		return $paramsArray;
	}
	function saveOrder($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = date('Y-m-d H:i:s');
		$color = $paramsArray['order_color'];		
		$size = $paramsArray['order_size'];		
		$qry = "insert into customer_order (customer_tel,customer_name,product_code,color,size,date,description) values ('"
				.$paramsArray['customer_tel']."','"
				.$paramsArray['customer_name']."','"
				.$paramsArray['order_product_code']."','"
				.$color."','"
				.$size."','"
				.$timeDate."','"
				.$paramsArray['order_description']."')";
// 		echo $qry;
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	
}
?>