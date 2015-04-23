<?php
class SpendService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function SpendService($hostname, $username, $password, $database, $commonService) {
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
	
	function getAddParameters($nbrLine) {
		$paramsArray = array();
		for($i=1;$i<=$nbrLine;$i++){
			$paramsArray['add_amount_'.$i] 		= $_REQUEST['add_amount_'.$i];
			$paramsArray['add_date_'.$i] 		= $_REQUEST['add_date_'.$i];
			$paramsArray['id_add_user_'.$i] 	= $_REQUEST['id_add_user_'.$i];
			$paramsArray['id_add_category_'.$i] = $_REQUEST['id_add_category_'.$i];
			$paramsArray['id_add_for_'.$i] 		= $_REQUEST['id_add_for_'.$i];
			$paramsArray['id_add_type_'.$i] 	= $_REQUEST['id_add_type_'.$i];
			$paramsArray['add_description_'.$i] = $_REQUEST['add_description_'.$i];
		}
		return $paramsArray;
	}
	function insertSpends($nbrLine,$params){
		session_start ();
		mysql_query ( "BEGIN" );
		$qry = "insert into spend(spend_category_id,amount,user_id,description,date,spend_for_id,spend_type_id) values ";
		$counter = 0;
		for($i=1;$i<=$nbrLine;$i++){
			if($params['add_amount_'.$i] != 0 ) {
				$counter++;
				$qry = $qry. "(".$params['id_add_category_'.$i].","
								.$params['add_amount_'.$i].","
								.$params['id_add_user_'.$i].",'"
								.$params['add_description_'.$i]."','"
								.$params['add_date_'.$i]."',"
								.$params['id_add_for_'.$i].","
								.$params['id_add_type_'.$i]."),";
			}
		}
		if($counter>0) {
			$qry = substr($qry,0,-1);
			if(mysql_query ( $qry, $this->connection ) != null){
				mysql_query ( "COMMIT" );
				echo 'success';
			}else {
				mysql_query ( "ROLLBACK" );
				echo 'error';
			}
		} 
	}
}
?>