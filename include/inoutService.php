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
	function getAddParameters() {
		$paramsArray = array();
		$paramsArray['add_amount'] 		= $_REQUEST['add_amount'];
		$paramsArray['add_date'] 		= $_REQUEST['add_date'];
		$paramsArray['id_add_user'] 	= $_REQUEST['id_add_user'];
		$paramsArray['id_add_inout_type'] = $_REQUEST['id_add_inout_type'];
		$paramsArray['id_add_shop'] 		= $_REQUEST['id_add_shop'];
		$paramsArray['add_description'] = $_REQUEST['add_description'];
		return $paramsArray;
	}
	function getUpdateParameters() {
		$paramsArray = array();
		$paramsArray['idinout'] 		= $_REQUEST['idinout'];
		$paramsArray['add_amount'] 		= $_REQUEST['add_amount'];
		$paramsArray['add_date'] 		= $_REQUEST['add_date'];
		$paramsArray['id_add_user'] 	= $_REQUEST['id_add_user'];
		$paramsArray['id_add_shop'] 	= $_REQUEST['id_add_shop'];
		$paramsArray['id_add_type'] 	= $_REQUEST['id_add_type'];
		$paramsArray['add_description'] = $_REQUEST['add_description'];
		return $paramsArray;
	}
	function updateInout($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		$amount = ($paramsArray['id_add_type'] == 1) ? $paramsArray['add_amount'] : (0-$paramsArray['add_amount']);
		$qry = "update money_inout set amount=".$amount
		.", date = '".$paramsArray['add_date'].$timeDate
		."', user_id = ".$paramsArray['id_add_user']
		.", shop_id = ".$paramsArray['id_add_shop']
		.", description = '".$paramsArray['add_description']
		."' where id =" . $paramsArray['idinout'];
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function listInout($parameterArray) {
		
		$today = date('Y-m-d');
		$qry = "select t1.*,if(t1.amount>0,1,2) as `type`,if(t1.amount>0,t1.amount,0) as `in`,if(t1.amount<0,t1.amount,0) as `out`, t2.name as shop,t3.name as user
				from
				money_inout t1,
				shop t2,
				user t3
				where t2.id = t1.shop_id
				and t3.id = t1.user_id";
		
		if($parameterArray['id_search_type'] == 1) {
			if($parameterArray['search_amount_from'] != '' )
				$qry = $qry. " and t1.amount >=".$parameterArray['search_amount_from'];
			else 
				$qry = $qry. " and t1.amount >=0";
			if($parameterArray['search_amount_to'] != '' )
				$qry = $qry. " and t1.amount <=".$parameterArray['search_amount_to'];
		} else if ($parameterArray['id_search_type'] == 2) {
			if($parameterArray['search_amount_from'] != '' )
				$qry = $qry. " and t1.amount >=(0-".$parameterArray['search_amount_to'].")";
				
			if($parameterArray['search_amount_to'] != '' )
				$qry = $qry. " and t1.amount <=(0-".$parameterArray['search_amount_from'].")";
			else 
				$qry = $qry. " and t1.amount <=0";
		} else if($parameterArray['id_search_type'] == '') {
			if($parameterArray['search_amount_from'] != '' )
				$qry = $qry. " and t1.amount >=".$parameterArray['search_amount_from'];
			
			if($parameterArray['search_amount_to'] != '' )
				$qry = $qry. " and t1.amount <=".$parameterArray['search_amount_to'];
		}
		
		if($parameterArray['search_date_from'] != '' )
			$qry = $qry. " and date_format(t1.date,'%Y-%m-%d') >='".$parameterArray['search_date_from']."'";
		
		if($parameterArray['search_date_to'] != '' )
			$qry = $qry. " and date_format(t1.date,'%Y-%m-%d') <='".$parameterArray['search_date_to']."'";
		
		if($parameterArray['search_description'] != '' )
			$qry = $qry. " and t1.description like '%".$parameterArray['search_description']."%'";
		
		if($parameterArray['id_search_user'] != '' )
			$qry = $qry. " and t3.id =".$parameterArray['id_search_user'];
		
		if($parameterArray['id_search_shop'] != '' )
			$qry = $qry. " and t2.id =".$parameterArray['id_search_shop'];
		
		
		$qry = $qry. " order by date desc";
//		echo $qry;
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
		$qry = "select t1.*,if(t1.amount>0,1,2) as `type`, if(t1.amount>0,t1.amount,0) as `in`,if(t1.amount<0,t1.amount,0) as `out`, t2.name as shop,t3.name as user
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
		session_start();
		if($this->commonService->isAdmin()){
			return array (
					"amount" => "Amount",
					"in" => "hidden_field",
					"out" => "hidden_field",
					"description" => "Description",
					"date" => "Date",
					"id,description,date,shop_id,user_id,amount,type" => "Edit",
					"id,deletemoney_inout" => "Delete",
					"user" => "User",
					"shop" => "Shop"
			);
		} else { 
			return array (
					"amount" => "Amount",
					"in" => "In",
					"out" => "Out",
					"description" => "Description",
					"date" => "Date",
					"user" => "User",
					"shop" => "Shop"
			);
		}
	}
	function getInputParameters() {
		return array (
			'search_amount_from' 		=> $_REQUEST['search_amount_from'],
			'search_amount_to' 			=> $_REQUEST['search_amount_to'],
			'search_date_from' 			=> $_REQUEST['search_date_from'],
			'search_date_to' 			=> $_REQUEST['search_date_to'],
			'search_description' 		=> $_REQUEST['search_description'],
			'id_search_user' 			=> $_REQUEST['id_search_user'],
			'id_search_shop' 			=> $_REQUEST['id_search_shop'],
			'id_search_type' 			=> $_REQUEST['id_search_type']
		);
	}
	
	function deleteInout($id) {
		$qry = "delete from money_inout where id = " . $id;
		if(mysql_query ( $qry, $this->connection ) != null) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
	function insertInout($params){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		$date = ($params['add_date'] != '')?$params['add_date'].$timeDate:date('Y-m-d H:i:s');
		$amount = ($params['id_add_inout_type'] == 1)?$params['add_amount']:(0-$params['add_amount']);
		$qry = "insert into money_inout(shop_id,amount,user_id,description,date) values ";
		
		$qry = $qry. "(".$params['id_add_shop'].","
			.$amount.","
			.$params['id_add_user'].",'"
			.$params['add_description']."','"
			.$date."')";
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
}
?>