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
		echo mysql_query ( $qry, $this->connection );
	}
	function listNews(){
		$qry = "select t1.id as identification, t1.*, t2.name as shop, t3.name as username,
				concat(DATE_FORMAT(t1.date,'%m/%d/%Y'),':',DATE_FORMAT(t1.date,'%T')) as displaydate
			   from news t1, shop t2, `user` t3
			   where t1.shop_id = t2.id
         and t1.user_id = t3.id order by date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"identification" => "ID",
				"description" => "Description",
				"username" => "Name",
				"shop" => "Shop",
				"displaydate" => "Date",
				"id,description,date,shop,username,shop_id,user_id" => "Edit",
				"id" => "Delete"
		);
		$this->commonService->generateJSDatatableSimple ( newsdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, newsdatatable, $array_column );
	}
}
?>