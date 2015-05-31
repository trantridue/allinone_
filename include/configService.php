<?php
ob_start ();
class ConfigService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function ConfigService($hostname, $username, $password, $database, $commonService) {
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
	function loadConfigParam(){
		session_start();
		$params = array(
		'import_number_row', 
		'default_password', 
		'default_row_product_return', 
		'export_number_row', 
		'is_sale_for_all', 
		'listExportDefault_nbr_day_limit', 
		'default_number_line_spend', 
		'nbr_day_default_export_returned', 
		'default_nbr_days_load_export', 
		'bonus_ratio', 
		'init_money', 
		'timeout', 
		'limit_default_customer_after_search', 
		'limit_default_customer_before_search', 
		'nbr_customer_by_group_csv', 
		'sale_all_taux'
		);
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			for($i =0; $i< sizeof($params);$i++){
				if($rows['name'] == $params[$i]) 
				$_SESSION[$params[$i]] = $rows['value'];
			}
		}
	}
	function listParameters(){
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		$listParams = "";
		echo "<table>";
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$listParams = $listParams.$rows['name'].";";
			echo "<tr>";
			echo "<td>".$rows['label']."</td><td><input type='number' id='".$rows['name']."' value='".$rows['value']."' /></td>";
			echo "</tr>";
		}
		echo "</table>";
		return $listParams;
	}
	function getListParameters(){
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		$listParams = "";
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$listParams = $listParams.$rows['name'].";";
		}
		return substr($listParams,0,-1);
	}
}
?>