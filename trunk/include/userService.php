<?php
class UserService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	// -----Initialization -------
	function UserService($hostname, $username, $password, $database,$commonService) {
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
	//
	function listUser($username) {
		$qry = "SELECT t1.*, t2.name as shopname FROM user t1 LEFT JOIN shop t2 ON t1.shop_id=t2.id where t1.username like '%".$username."%'";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"username" => "User Name",
				"name" => "Name",
				"email" => "Mail",
				"phone_number" => "Tel",
				"shopname" => "Shop",
				"description" => "Description",
				"id" => "Edit",
				"id" => "Delete",
				"password" => "hidden_field",
				"shop_id*id" => "complex"
		);
		$this->commonService->generateJSDatatableSimple(userdatatable,1,'asc');
		$this->commonService->generateJqueryDatatable($result,userdatatable,$array_column);
	}
}
?>