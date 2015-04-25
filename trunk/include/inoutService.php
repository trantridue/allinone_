<?php
class InoutService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function InoutService($hostname, $username, $password, $database, $commonService) {
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
	function getUpdateParameters() {
		$paramsArray = array();
		$paramsArray['idspend'] 		= $_REQUEST['idspend'];
		$paramsArray['add_amount'] 		= $_REQUEST['add_amount'];
		$paramsArray['add_date'] 		= $_REQUEST['add_date'];
		$paramsArray['id_add_user'] 	= $_REQUEST['id_add_user'];
		$paramsArray['id_add_category'] = $_REQUEST['id_add_category'];
		$paramsArray['id_add_for'] 		= $_REQUEST['id_add_for'];
		$paramsArray['id_add_type'] 	= $_REQUEST['id_add_type'];
		$paramsArray['add_description'] = $_REQUEST['add_description'];
		return $paramsArray;
	}
	function updateSpend($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		$qry = "update spend set amount=".$paramsArray['add_amount']
		.", date = '".$paramsArray['add_date'].$timeDate
		."', user_id = ".$paramsArray['id_add_user']
		.", spend_category_id = ".$paramsArray['id_add_category']
		.", spend_for_id = ".$paramsArray['id_add_for']
		.", spend_type_id = ".$paramsArray['id_add_type']
		.", description = '".$paramsArray['add_description']
		."' where id =" . $paramsArray['idspend'];
		
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function listInout($params) {
		$today = date('Y-m-d');
		$qry = "select t1.*,if(t1.amount>0,t1.amount,0) as `in`,if(t1.amount<0,t1.amount,0) as `out`, t2.name as shop,t3.name as user
				from
				money_inout t1,
				shop t2,
				user t3
				where t2.id = t1.shop_id
				and t3.id = t1.user_id
				and date_format(t1.date,'%Y-%m-%d') <='".$today."' order by date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				0 => "Total",
				1 => "In",
				2 => "Out",
		);
		$this->commonService->generateJSDatatableComplex ( $result, inoutdatatable, 4, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, inoutdatatable, $this->buildArrayParameter() );
	}
	function listInoutDefault() {
		$today = date('Y-m-d');
		$qry = "select t1.*,if(t1.amount>0,t1.amount,0) as `in`,if(t1.amount<0,t1.amount,0) as `out`, t2.name as shop,t3.name as user
				from
				money_inout t1,
				shop t2,
				user t3
				where t2.id = t1.shop_id
				and t3.id = t1.user_id
				and date_format(t1.date,'%Y-%m-%d') ='".$today."' order by date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				0 => "Total",
				1 => "In",
				2 => "Out",
		);
		$this->commonService->generateJSDatatableComplex ( $result, inoutdatatable, 4, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, inoutdatatable, $this->buildArrayParameter() );
	}
	function buildArrayParameter() {
		return array (
				"amount" => "Amount",
				"in" => "In",
				"out" => "Out",
				"description" => "Description",
				"date" => "Date",
				"id,description,date,spend_category_id,user_id,spend_for_id,spend_type_id,amount" => "Edit",
				"id" => "Delete",
				"user" => "User",
				"shop" => "Shop"
		);
	}
	function getInputParameters() {
		return array (
			'search_amount_from' 		=> $_REQUEST['search_amount_from'],
			'search_amount_to' 			=> $_REQUEST['search_amount_to'],
			'search_date_from' 			=> $_REQUEST['search_date_from'],
			'search_date_to' 			=> $_REQUEST['search_date_to'],
			'search_description' 		=> $_REQUEST['search_description'],
			'id_search_user' 			=> $_REQUEST['id_search_user'],
			'id_search_category' 		=> $_REQUEST['id_search_category'],
			'id_search_for' 			=> $_REQUEST['id_search_for'],
			'id_search_type' 			=> $_REQUEST['id_search_type']
		);
	}
	function listSpend($parameterArray) {
		$qry = "select t1.*, t2.name as category,t3.name as user,t4.name as fors, t5.name as types
				from
				spend t1,
				spend_category t2,
				user t3,
				spend_for t4,
				spend_type t5
				where t2.id = t1.spend_category_id
				and t3.id = t1.user_id
				and t4.id = t1.spend_for_id
				and t5.id = t1.spend_type_id ";
				
				if($parameterArray['search_amount_from'] != '' )
				$qry = $qry. " and t1.amount >=".$parameterArray['search_amount_from'];
				
				if($parameterArray['search_amount_to'] != '' )
				$qry = $qry. " and t1.amount <=".$parameterArray['search_amount_to'];
				
				if($parameterArray['search_date_from'] != '' )
				$qry = $qry. " and date_format(t1.date,'%Y-%m-%d') >='".$parameterArray['search_date_from']."'";
				
				if($parameterArray['search_date_to'] != '' )
				$qry = $qry. " and date_format(t1.date,'%Y-%m-%d') <='".$parameterArray['search_date_to']."'";
				
				if($parameterArray['search_description'] != '' )
				$qry = $qry. " and t1.description like '%".$parameterArray['search_description']."%'";
				
				if($parameterArray['id_search_user'] != '' )
				$qry = $qry. " and t3.id =".$parameterArray['id_search_user'];
				
				if($parameterArray['id_search_category'] != '' )
				$qry = $qry. " and t2.id =".$parameterArray['id_search_category'];
				
				if($parameterArray['id_search_for'] != '' )
				$qry = $qry. " and t4.id =".$parameterArray['id_search_for'];
				
				if($parameterArray['id_search_type'] != '' )
				$qry = $qry. " and t5.id =".$parameterArray['id_search_type'];
				
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				0 => "Tổng Chi"
		);
//		echo $qry;
		$this->commonService->generateJSDatatableComplex ( $result, spenddatatable, 2, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, spenddatatable, $this->buildArrayParameter() );
	}
	function deleteSpend($spendid) {
		$qry = "delete from spend where id = " . $spendid;
		if(mysql_query ( $qry, $this->connection ) != null) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
?>