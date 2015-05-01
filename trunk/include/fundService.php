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
	function insertSpends($nbrLine,$params){
		session_start ();
		mysql_query ( "BEGIN" );
		$timeDate = ' '.date('H:i:s');
		$qry = "insert into spend(spend_category_id,amount,user_id,description,date,spend_for_id,spend_type_id) values ";
		$counter = 0;
		for($i=1;$i<=$nbrLine;$i++){
			if($params['add_amount_'.$i] != 0 ) {
				$counter++;
				$qry = $qry. "(".$params['id_add_category_'.$i].","
								.$params['add_amount_'.$i].","
								.$params['id_add_user_'.$i].",'"
								.$params['add_description_'.$i]."','"
								.$params['add_date_'.$i].$timeDate."',"
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
				"amount" => "Amount",
				"date" => "Date",
				"description" => "Description",
				"ratio" => "Ratio",
				"username" => "User"
	
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
		$qry = "select t1.*,t2.name as username,t3.name as fundname from fund_change_histo t1,user t2,fund t3 where 
				t1.fund_id = t3.id and t1.user_id = t2.id and date >= '".$dateBeforeSomeDays."'";
				
				
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				1 => "Tổng"
		);
		$this->commonService->generateJSDatatableComplex ( $result, fundhistodatatable, 2, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, fundhistodatatable, $this->buildArrayParameterHisto() );
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