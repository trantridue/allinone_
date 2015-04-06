<?php
class NewsService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function NewsService($hostname, $username, $password, $database, $commonService) {
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
	function insertNews($description) {
		session_start ();
		$actionType = 'insert';
		$date = date ( 'Y-m-d H:i:s' );
		$user_id = $_SESSION ['id_of_user'];
		$shop_id = $_SESSION ['id_of_shop'];
		$qry = "insert into news(description,date,shop_id,user_id) values ('" . $description . "',
				'" . $date . "'," . $shop_id . "," . $user_id . ")";
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>userpostaction('" . $result . "','" . $actionType . "');</script>";
	}
}
?>