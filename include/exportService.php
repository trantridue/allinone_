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
}
?>