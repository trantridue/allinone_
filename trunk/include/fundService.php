<?php
class FundService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function FundService($hostname, $username, $password, $database, $commonService) {
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
	

	function getExchangeFundParameters() {
		$paramsArray = array();
		
		$paramsArray['id_exchange_fund_source'] 		= $_REQUEST['id_exchange_fund_source'];
		$paramsArray['exchange_source_amount'] 			= $_REQUEST['exchange_source_amount'];
		$paramsArray['exchange_source_ratio'] 			= $_REQUEST['exchange_source_ratio'];
		$paramsArray['id_exchange_fund_destination'] 	= $_REQUEST['id_exchange_fund_destination'];
		$paramsArray['exchange_destination_amount'] 	= $_REQUEST['exchange_destination_amount'];
		$paramsArray['exchange_destination_ratio'] 		= $_REQUEST['exchange_destination_ratio'];
		$paramsArray['exchange_date'] 					= $_REQUEST['exchange_date'];
		$paramsArray['exchange_description'] 			= $_REQUEST['exchange_description'];
		
		return $paramsArray;
	}
	function getAddFundParameters() {
		$paramsArray = array();
		
		$paramsArray['id_add_fund'] 		= $_REQUEST['id_add_fund'];
		$paramsArray['id_add_user'] 		= $_REQUEST['id_add_user'];
		$paramsArray['add_date'] 			= $_REQUEST['add_date'];
		$paramsArray['add_amount'] 			= $_REQUEST['add_amount'];
		$paramsArray['add_ratio'] 			= $_REQUEST['add_ratio'];
		$paramsArray['add_description'] 	= $_REQUEST['add_description'];
		
		return $paramsArray;
	}
	function getUpdateFundParameters() {
		$paramsArray = array();
		
		$paramsArray['id_histo_fund'] 		= $_REQUEST['id_histo_fund'];
		$paramsArray['id_edit_fund'] 		= $_REQUEST['id_edit_fund'];
		$paramsArray['id_edit_user'] 		= $_REQUEST['id_edit_user'];
		$paramsArray['edit_date'] 			= $_REQUEST['edit_date'];
		$paramsArray['edit_amount'] 		= $_REQUEST['edit_amount'];
		$paramsArray['edit_ratio'] 			= $_REQUEST['edit_ratio'];
		$paramsArray['edit_description'] 	= $_REQUEST['edit_description'];
		
		return $paramsArray;
	}
	
	
	function saveExchange($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		
		$qry = "insert into fund_change_histo (fund_id,amount,date,description,ratio,user_id) values ("
				.$paramsArray['id_exchange_fund_source'].","
				.(0-$paramsArray['exchange_source_amount']).",'"
				.$paramsArray['exchange_date'].$timeDate."','"
				.$paramsArray['exchange_description']."',"
				.$paramsArray['exchange_source_ratio'].","
				."1),("
				.$paramsArray['id_exchange_fund_destination'].","
				.$paramsArray['exchange_destination_amount'].",'"
				.$paramsArray['exchange_date'].$timeDate."','"
				.$paramsArray['exchange_description']."',"
				.$paramsArray['exchange_destination_ratio'].","
				."1)";
// 		echo $qry;
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function updateFund($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		
		$qry = "update fund_change_histo set fund_id = ".$paramsArray['id_edit_fund']
				.",amount =".$paramsArray['edit_amount']
				.",date='".$paramsArray['edit_date'].$timeDate
				."',description='".$paramsArray['edit_description']
				."',ratio=".$paramsArray['edit_ratio']
				.",user_id=".$paramsArray['id_edit_user']
				." where id =".$paramsArray['id_histo_fund'];
//				echo $qry;
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function saveAddFund($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		
		$qry = "insert into fund_change_histo (fund_id,amount,date,description,ratio,user_id) values ("
				.$paramsArray['id_add_fund'].","
				.$paramsArray['add_amount'].",'"
				.$paramsArray['add_date'].$timeDate."','"
				.$paramsArray['add_description']."',"
				.$paramsArray['add_ratio'].","
				.$paramsArray['id_add_user'].")";
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function listFund() {
		$qry = "select t1.*, (select sum(t2.amount*ratio) from fund_change_histo t2 where t2.fund_id = t1.id) as total,
				FORMAT((select sum(t2.amount*ratio) from fund_change_histo t2 where t2.fund_id = t1.id)*1000,0) as total_dis,
				(select abs(sum(t2.amount*ratio)) from fund_change_histo t2 where t2.fund_id = t1.id) as total_abs from fund t1";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				1 => "Total"
		);
		$this->commonService->generateJSDatatableComplex ( $result, spenddatatable, 3, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, spenddatatable, $this->buildArrayParameter() );
	}
	function buildArrayParameter() {
		return array (
				"name" => "Fund",
				"total" => "hidden_field",
				"total_dis" => "Total",
				"total_abs" => "hidden_field"
		);
	}
	function buildArrayParameterHisto() {
		return array (
				"fundname" => "Fund",
				"total" => "hidden_field",
				"amount_dis" => "Amount",
				"date" => "Date",
				"description" => "Description",
				"ratio" => "Ratio",
				"username" => "User",
				"id,fund_id,user_id,amount,description,date,ratio" => "Edit",
				"id" => "Delete"
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
	function listFundHistoDefault() {
		$dateBeforeSomeDays = $this->commonService->getDateBeforeSomeDays (default_nbr_days_load_import);
		$qry = "select (t1.amount*t1.ratio) as total,t1.*,t2.name as username,t3.name as fundname, format(t1.amount,0) as amount_dis from fund_change_histo t1,user t2,fund t3 where 
				t1.fund_id = t3.id and t1.user_id = t2.id and date >= '".$dateBeforeSomeDays."'";
				
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				1 => "Tổng"
		);
		$this->commonService->generateJSDatatableComplex ( $result, fundhistodatatable, 3, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, fundhistodatatable, $this->buildArrayParameterHisto() );
	}
	function deleteFundHisto($id) {
		$qry = "delete from fund_change_histo where id = " . $id;
		if(mysql_query ( $qry, $this->connection ) != null) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
	function listFundHisto($parameterArray) {
		$qry = "select (t1.amount*t1.ratio) as total,t1.*,t2.name as username,t3.name as fundname, format(t1.amount,0) as amount_dis from fund_change_histo t1,user t2,fund t3 where 
				t1.fund_id = t3.id and t1.user_id = t2.id";
		
		if($parameterArray['search_date_from'] != '' )
			$qry = $qry. " and date_format(t1.date,'%Y-%m-%d') >='".$parameterArray['search_date_from']."'";
		
		if($parameterArray['search_date_to'] != '' )
			$qry = $qry. " and date_format(t1.date,'%Y-%m-%d') <='".$parameterArray['search_date_to']."'";
		
		if($parameterArray['search_amount_from'] != '' )
			$qry = $qry. " and t1.amount >=".$parameterArray['search_amount_from'];
		
		if($parameterArray['search_amount_to'] != '' )
			$qry = $qry. " and t1.amount <=".$parameterArray['search_amount_to'];
		
		if($parameterArray['search_description'] != '' )
			$qry = $qry. " and t1.description like '%".$parameterArray['search_description']."%'";
		
		if($parameterArray['id_search_user'] != '' )
			$qry = $qry. " and t2.id =".$parameterArray['id_search_user'];
		
		if($parameterArray['id_search_fund'] != '' )
			$qry = $qry. " and t3.id =".$parameterArray['id_search_fund'];
		
// 		echo $qry;		
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				1 => "Tổng"
		);
		$this->commonService->generateJSDatatableComplex ( $result, fundhistodatatable, 3, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, fundhistodatatable, $this->buildArrayParameterHisto() );
	}
	function getFundSearchParameters() {
		return array (
			'search_amount_from' 		=> $_REQUEST['search_amount_from'],
			'search_amount_to' 			=> $_REQUEST['search_amount_to'],
			'search_date_from' 			=> $_REQUEST['search_date_from'],
			'search_date_to' 			=> $_REQUEST['search_date_to'],
			'search_description' 		=> $_REQUEST['search_description'],
			'id_search_user' 			=> $_REQUEST['id_search_user'],
			'id_search_fund' 			=> $_REQUEST['id_search_fund']
		);
	}
}
?>