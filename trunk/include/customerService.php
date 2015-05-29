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
	function listCustomerDefault() {
		$qry = "SELECT *, id as iden FROM customer order by id desc limit 100";
		$result = mysql_query ( $qry, $this->connection );
		
		$this->commonService->generateJSDatatableSimple ( customerdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, customerdatatable, $this->getArrayColumn() );
	}
	function listCustomer($params) {
		$qry = "SELECT *, id as iden FROM customer where 1 ";
		$flag = true;
		if($params['search_customer_name']!=''){
			$flag = false;
			$qry = $qry . " and name like '%".$params['search_customer_name']."%'";
		}
		if($params['search_customer_tel']!=''){
			$flag = false;
			$qry = $qry . " and tel like '%".$params['search_customer_tel']."%'";
		}
		if($params['create_date_from']!=''){
			$flag = false;
			$qry = $qry . " and created_date >= '".$params['create_date_from']."'";
		}
		if($params['create_date_to']!=''){
			$flag = false;
			$qry = $qry . " and created_date <= '".$params['create_date_to']."'";
		}
		if($params['update_date_from']!=''){
			$flag = false;
			$qry = $qry . " and date >= '".$params['update_date_from']."'";
		}
		if($params['update_date_to']!=''){
			$flag = false;
			$qry = $qry . " and date <= '".$params['update_date_to']."'";
		}
		if($params['search_description']!=''){
			$flag = false;
			$qry = $qry . " and description like '%".$params['search_description']."%'";
		}
		$qry = $qry. " order by id desc";
		if($flag) 
		$qry = $qry. " limit 1000";
//		echo $qry;
		$result = mysql_query ( $qry, $this->connection );
		
		$this->commonService->generateJSDatatableSimple ( customerdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, customerdatatable, $this->getArrayColumn() );
	}
	function getArrayColumn() {
		$array_column = array ("iden" => "Identication","name" => "Name", 
		"tel" => "Tel",  "description" => "Description",
		"created_date" => "Create date",
		"date" => "Modify date", 
		"isboss" => "Is Boss", 
		"id,name,tel,description,isboss" => "Edit", 
		"id,deletecustomer" => "Delete" );
		return $array_column;
	}
	function deleteCustomer($customerid) {
		$qry = "delete from customer where id = " . $customerid;
		echo mysql_query ( $qry, $this->connection );
	}
	function saveOrUpdateCustomer($params){
		if($params['editid']==''){
			$this->addCustomer($params);			
		} else {
			$this->updateCustomer($params);
		}
	}
	function addCustomer ( $params){
		mysql_query ( "BEGIN" );
		$qry = "insert into customer(name,tel,description,date,isboss,created_date) values ('" . $params['customer_name'] . "',
				'" . $params['customer_tel'] . "','" . $params['customer_description'] . "',now(),".$params['customer_status_hidden'].",now())";

		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			echo mysql_error($this->connection);
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function updateCustomer($params) {
		mysql_query ( "BEGIN" );
		$qry = "update customer set name='" . $params['customer_name'] . "', tel = '" . $params['customer_tel'] . "'
		, description = '" . $params['customer_description'] . "'
				,date=now(),isboss=".$params['customer_status_hidden']."  where id = " . $params['editid'];

		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			echo mysql_error($this->connection);
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function getJsonCustomerTel($term) {
		session_start();
		$qry = "select ta.*,(ta.totalbuy - ta.paid) as debt,floor((ta.totalbuy-ta.bonus_used)/".$_SESSION['bonus_ratio'].") as bonus from (SELECT t1.isboss,t1.tel,t1.name,t1.id
			,ifnull((select sum((quantity-re_qty)*export_price) from export_facture_product where export_facture_code in (select code from export_facture where customer_id=t1.id)),0) totalbuy
			,ifnull((select sum(amount) from export_facture_trace where customer_id = t1.id),0) as paid
			,ifnull((select sum(amount) from customer_reservation_histo where customer_id = t1.id and status='N'),0) as reserved
			,ifnull((select sum(bonus_used*bonus_ratio) from export_facture_trace where customer_id = t1.id ),0) as bonus_used
			 FROM `customer` t1 where t1.tel like '%" . $term . "' limit 10) ta";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name']." : " . $rows ['tel']
			. ", ID: " . $rows ['id']
			.", totalbuy:".$rows['totalbuy']
// 			.", paid:".$rows['paid']
// 			.", reserved:".$rows['reserved']
// 			.", debt:".$rows['debt']
//			.", returned:".$rows['returned']
// 			.", bonus:".$rows['bonus']
//			.", isBoss:".(($rows['isboss']==1)?'true':'false')
;
			$element = array (value => $rows ['tel'], 
					name => $rows ['name'],
					totalbuy => $rows ['totalbuy'],
					debt => $rows ['debt'],
					reserved => $rows ['reserved'],
					bonus_used => $rows ['bonus_used'],
					bonus => $rows ['bonus'],
					isboss => (($rows['isboss']==1)?true:false), 
					id => $rows ['id'], 
					label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
function getSearchParameters(){
			return array (
			'search_customer_name' 		=> $_REQUEST['search_customer_name'],
			'search_customer_tel' 		=> $_REQUEST['search_customer_tel'],
			'create_date_from' 			=> $_REQUEST['create_date_from'],
			'create_date_to' 			=> $_REQUEST['create_date_to'],
			'update_date_to' 			=> $_REQUEST['update_date_to'],
			'update_date_from' 			=> $_REQUEST['update_date_from'],
			'search_description' 		=> $_REQUEST['search_description']
		);
	}
function getCustomerParameters(){
			return array (
			'editid' 		=> $_REQUEST['editid'],
			'customer_name' 		=> $_REQUEST['customer_name'],
			'customer_tel' 			=> $_REQUEST['customer_tel'],
			'customer_description' 			=> $_REQUEST['customer_description'],
			'customer_status_hidden' 			=> $_REQUEST['customer_status_hidden']
		);
	}
}
?>