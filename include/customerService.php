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
		$qry = "SELECT *, id as iden FROM customer where name like '%" . $name . "%' order by id desc limit 100";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array ("iden" => "Identication","name" => "Name", "tel" => "Tel",  "description" => "Description","date" => "Modify date", "id,name,tel,description" => "Edit", "id" => "Delete" );
		$this->commonService->generateJSDatatableSimple ( customerdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, customerdatatable, $array_column );
	}
	function deleteCustomer($customerid) {
		$qry = "delete from customer where id = " . $customerid;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateCustomer($customer_id, $customer_name, $customer_tel, $customer_description) {
		$actionType = 'update';
		$qry = "update customer set name='" . $customer_name . "', tel = '" . $customer_tel . "', description = '" . $customer_description . "'
				,date=now()  where id = " . $customer_id;
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>customerpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function addCustomer ( $customer_name, $customer_tel, $customer_description){
		$actionType = 'insert';
		$qry = "insert into customer(name,tel,description,date) values ('" . $customer_name . "',
				'" . $customer_tel . "','" . $customer_description . "',now())";
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>customerpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function getJsonCustomerTel($term) {
		
		$qry = "select ta.*,(ta.totalbuy - ta.reserved - ta.paid - ta.returned) as debt from (SELECT t1.isboss,t1.tel,t1.name,t1.id
			,ifnull((select sum(quantity*export_price) from export_facture_product where export_facture_code in (select code from export_facture where customer_id=t1.id)),0) totalbuy
			,ifnull((select sum(amount) from customer_paid where customer_id = t1.id),0) as paid
			,ifnull((select sum(amount) from customer_reservation_histo where customer_id = t1.id and status='N'),0) as reserved
			,ifnull((select sum(quantity*return_price) from customer_return where customer_id = t1.id ),0) as returned
			 FROM `customer` t1 where t1.tel like '%" . $term . "' limit 10) ta";
		
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = "Tel : " . $rows ['tel'] . ", name :" . $rows ['name'] 
			. ", ID: " . $rows ['id']
			.", totalbuy:".$rows['totalbuy']
			.", paid:".$rows['paid']
			.", reserved:".$rows['reserved']
			.", debt:".$rows['debt']
			.", returned:".$rows['returned']
			.", isBoss:".(($rows['isboss']==1)?'true':'false');
			$element = array (value => $rows ['tel'], 
					name => $rows ['name'],
					debt => $rows ['debt'],
					reserved => $rows ['reserved'],
					returned => $rows ['returned'],
					isboss => (($rows['isboss']==1)?true:false), 
					id => $rows ['id'], 
					label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
}
?>