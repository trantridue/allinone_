<?php
class ProviderService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	// -----Initialization -------
	function ProviderService($hostname, $username, $password, $database, $commonService) {
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
	function listProvider($parameterArray) {
		$qry = "select t2.id,t2.name,t2.tel,t2.address,t2.description, t2.date,ifnull(t2.total,0) as total,
				ifnull(t2.paid,0) as paid,(ifnull(t2.total,0)-ifnull(t2.paid,0)) as remain from (SELECT t1.*,
		(SELECT round(sum(import_price*quantity) )
		FROM product_import where import_facture_code in
		(select code from import_facture where provider_id = t1.id)) as total, (select sum(amount) from provider_paid where provider_id=t1.id) as paid
		 FROM provider t1  
		 where t1.name like '%" . $parameterArray['provider_name'] . "%') t2 
		 where t2.tel like '%".$parameterArray['provider_tel']."%'";
		if($parameterArray['provider_address'] != null){
			$qry = $qry." and t2.address like '%".$parameterArray['provider_address']."%'";
		}
		if($parameterArray['provider_description'] != null){
			$qry = $qry." and t2.description like '%".$parameterArray['provider_description']."%'";
		}
		if($parameterArray['total_from'] != null){
			$qry = $qry." and ifnull(t2.total,0) >= ".$parameterArray['total_from'];
		}
		if($parameterArray['total_to'] != null){
			$qry = $qry." and ifnull(t2.total,0) <= ".$parameterArray['total_to'];
		}
		if($parameterArray['paid_from'] != null){
			$qry = $qry." and ifnull(t2.paid,0) >= ".$parameterArray['paid_from'];
		}
		if($parameterArray['paid_to'] != null){
			$qry = $qry." and ifnull(t2.paid,0) <= ".$parameterArray['paid_to'];
		}
		if($parameterArray['remain_from'] != null){
			$qry = $qry." and (ifnull(t2.total,0)-ifnull(t2.paid,0)) >= ".$parameterArray['remain_from'];
		}
		if($parameterArray['remain_to'] != null){
			$qry = $qry." and (ifnull(t2.total,0)-ifnull(t2.paid,0)) <= ".$parameterArray['remain_to'];
		}
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"id,name,tel" => "Name,name",
				"total,id" => "Tổng,total",
				"paid,id" => "Paid,paid",
				"remain" => "Remain",
				"tel" => "Tel",
				"address" => "Address",
				"description" => "Description",
				"date" => "Modify date",
				"id,name,tel,address,description" => "Edit",
				"id" => "Delete"
		);
		$array_total = array (
				1 => "Tổng nợ",
				2 => "Đã trả",
				3 => "Còn nợ" 
		);
		$this->commonService->generateJSDatatableComplex ( $result, providerdatatable, 3, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, providerdatatable, $array_column );
	}
	function deleteProvider($providerid) {
		$qry = "delete from provider where id = " . $providerid;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateProvider($provider_id, $provider_name, $provider_tel, $provider_description, $provider_address) {
		$actionType = 'update';
		$qry = "update provider set name='" . $provider_name . "', tel = '" . $provider_tel . "', description = '" . $provider_description . "'
				,address='" . $provider_address . "',date=now()  where id = " . $provider_id;
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>providerpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function addProvider($provider_name, $provider_address, $provider_tel, $provider_description) {
		$actionType = 'insert';
		$qry = "insert into provider(name,address,tel,description,date) values ('" . $provider_name . "',
				'" . $provider_address . "','" . $provider_tel . "','" . $provider_description . "',now())";
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>providerpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function getProviderParameters() {
		$parameterArray = array (
		'provider_name' => $_REQUEST ['provider_name'], 
		'provider_tel' => $_REQUEST ['provider_tel'], 
		'provider_address' => $_REQUEST ['provider_address'], 
		'provider_description' => $_REQUEST ['provider_description'], 
		'total_from' => $_REQUEST ['total_from'], 
		'total_to' => $_REQUEST ['total_to'], 
		'paid_from' => $_REQUEST ['paid_from'],
		'paid_to' => $_REQUEST ['paid_to'], 
		'remain_from' => $_REQUEST ['remain_from'], 
		'remain_to' => $_REQUEST ['remain_to'] );
		return $parameterArray;
	}
}
?>