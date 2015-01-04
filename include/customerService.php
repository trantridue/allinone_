<?php
class CustomerService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	// -----Initialization -------
	function CustomerService($hostname, $username, $password, $database, $commonService) {
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
	function listCustomer($name) {
		$qry = "SELECT * FROM customer where name like '%" . $name . "%'";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array ("name" => "Name", "tel" => "Tel",  "description" => "Description","date" => "Modify date", "id,name,tel,address,description" => "Edit", "id" => "Delete" );
		$this->commonService->generateJSDatatableSimple ( customerdatatable, 0, 'asc' );
		$this->commonService->generateJqueryDatatable ( $result, customerdatatable, $array_column );
	}
	function deleteCustomer($customerid) {
		$qry = "delete from customer where id = " . $customerid;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateCustomer($customer_id, $customer_name, $customer_tel, $customer_description, $customer_address) {
		$actionType = 'update';
		$qry = "update customer set name='" . $customer_name . "', tel = '" . $customer_tel . "', description = '" . $customer_description . "'
				,address='" . $customer_address . "',date=now()  where id = " . $customer_id;
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>customerpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function addCustomer ( $customer_name, $customer_address, $customer_tel, $customer_description){
		$actionType = 'insert';
		$qry = "insert into customer(name,address,tel,description,date) values ('" . $customer_name . "',
				'" . $customer_address . "','" . $customer_tel . "','" . $customer_description . "',now())";
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>customerpostaction('" . $result . "','" . $actionType . "');</script>";
	}
}
?>