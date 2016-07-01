<?php
class UserService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function UserService($hostname, $username, $password, $database, $commonService) {
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
	//
	function listUser($username, $name, $user_mail, $user_tel, $user_status_hidden, $user_description) {
		$qry = "SELECT t1.*, t2.name as shopname FROM user t1 LEFT JOIN shop t2 ON t1.shop_id=t2.id where 
		t1.username like '%" . $username . "%'" . "and 
		t1.email like '%" . $user_mail . "%'" . "and 
		t1.description like '%" . $user_description . "%'" . "and 
		t1.status like '%" . $user_status_hidden . "%'" . "and 
		t1.phone_number like '%" . $user_tel . "%'" . "and 
		t1.name like '%" . $name . "%'";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array ("username" => "User Name", "id,name,email,phone_number,description,shop_id,status,start_date,end_date" => "Edit", "name" => "Name", "email" => "Mail", "phone_number" => "Tel", "shopname" => "Shop", "description" => "Description", "status" => "Status", "start_date,end_date" => "Start date,start_date", "id,deleteuser" => "Delete", "password" => "hidden_field", "shop_id*id" => "complex" );
		$this->commonService->generateJSDatatableSimple ( userdatatable, 7, 'asc' );
		$this->commonService->generateJqueryDatatable ( $result, userdatatable, $array_column );
	}
	// delete user by idx
	function deleteUser($userid) {
		$qry = "delete from user where id = " . $userid;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateUser($user_id, $user_name, $user_email, $user_phone_number, $user_description, $user_password, $shop_dropdown_user, $status_value, $start_date) {
		session_start ();
		mysql_query ( "BEGIN" );
		$new_password = md5 ( $user_password );
		$qry = "";
		$date = date ( 'Y-m-d H:i:s' );
		if ($user_password != null && $user_password != '') {
			$qry = "update user set name='" . $user_name . "', email = '" . $user_email . "', phone_number = '" . $user_phone_number . "'
				,description='" . $user_description . "',password='" . $new_password . "',shop_id=" . $shop_dropdown_user . ",
				status='" . $status_value . "',end_date='" . $date . "',start_date='" . $start_date . "'  where id = " . $user_id;
		} else {
			$qry = "update user set name='" . $user_name . "', email = '" . $user_email . "', phone_number = '" . $user_phone_number . "'
				,description='" . $user_description . "',shop_id=" . $shop_dropdown_user . ",
				status='" . $status_value . "',end_date='" . $date . "',start_date='" . $start_date . "'  where id = " . $user_id;
		}
		//		echo $qry;
		if (mysql_query ( $qry, $this->connection ) != null) {
			mysql_query ( "COMMIT" );
			$_SESSION ['id_of_shop'] = $shop_dropdown_user;
			echo 'success';
		} else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function addUser($user_username, $user_name, $user_email, $user_phone_number, $user_description, $user_password, $shop_dropdown_user, $status_value) {
		session_start ();
		$actionType = 'insert';
		$new_password = '';
		$date = date ( 'Y-m-d H:i:s' );
		$qry = "";
		if ($user_password != null && $user_password != '') {
			$new_password = md5 ( $user_password );
		} else {
			$new_password = md5 ( $_SESSION ['default_password'] );
		}
		$qry = "insert into user(username,name,email,phone_number,shop_id,password,confirmcode,status,start_date,description) values ('" . $user_username . "',
				'" . $user_name . "','" . $user_email . "','" . $user_phone_number . "'," . $shop_dropdown_user . ",'" . $new_password . "','y','" . $status_value . "','" . $date . "','" . $user_description . "')";
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>userpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	
	function getAbsentParameters() {
		$paramsArray = array ();
		
		$paramsArray ['id_list_user'] = $_REQUEST ['id_list_user'];
		$paramsArray ['nbrRows'] = $_REQUEST ['nbrRows'];
		
		for($i = 1; $i <= $_REQUEST ['nbrRows']; $i ++) {
			$absentfrom = 'absentfrom_' . $i;
			$absentto = 'absentto_' . $i;
			$nbrdays = 'nbrdays_' . $i;
			$absentfrom_val = $_REQUEST [$absentfrom];
			$absentto_val = $_REQUEST [$absentto];
			$nbrdays_val = $_REQUEST [$nbrdays];
			if ($absentfrom_val != '') {
				$paramsArray [$absentfrom] = $absentfrom_val;
				$paramsArray [$absentto] = $absentto_val;
				$paramsArray [$nbrdays] = $nbrdays_val;
			}
		}
		return $paramsArray;
	}
	function saveAbsent($paramsArray) {
		session_start ();
		mysql_query ( "BEGIN" );
		$flag = true;
		$userid = $paramsArray ['id_list_user'];
		$today = date ( 'Y-m-d H:m:s' );
		
		//insert absent
		$qry_insert_absent = "insert into user_absent_history (user_id,requested_date,`from`,`to`,nbr_working_day, description) values ";
		$nbrRowExportReal = 0;
		for($i = 1; $i <= $paramsArray ['nbrRows']; $i ++) {
			if ($paramsArray ['absentfrom_' . $i] != '') {
				$nbrRowExportReal ++;
				$qry_insert_absent = $qry_insert_absent . "(" . $userid . ",'" . $today . "','" . $paramsArray ['absentfrom_' . $i] . "','" . $paramsArray ['absentto_' . $i] . "'
				," . $paramsArray ['nbrdays_' . $i] . "
				,'sssss'),";
			}
		}
		
		// insert db******************************************************/
		$qry_insert_absent = substr ( $qry_insert_absent, 0, - 1 );
		
		if ($nbrRowExportReal > 0) {
			$flag = $flag && (mysql_query ( $qry_insert_absent, $this->connection ) != null);
		}
		//	echo $qry_insert_absent;
		$this->commitOrRollback ( $flag );
		echo "success";
	}
	function commitOrRollback($flag) {
		if ($flag == false) {
			echo mysql_error ( $this->connection );
			mysql_query ( "ROLLBACK" );
			echo "error";
		} else {
			mysql_query ( "COMMIT" );
		}
	}
	function listAbsent($params) {
		echo "listAbsent ";
	}
	function listAbsentDefault() {
		$qry = "select t1.*, t2.* from user t1, user_absent_history t2 where t1.id = t2.user_id";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"name" => "Name", 
				"requested_date" => "date request", 
				"from" => "from", 
				"to" => "to", 
				"nbr_working_day" => "nbrs days", 
				"description" => "description", 
				"id,requested_date,from,to,description,nbr_working_day" => "Edit",  
				"id,deleteuserabsenthistory" => "Delete");
		$this->commonService->generateJSDatatableSimple ( userabsenthistorydatatable, 1, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, userabsenthistorydatatable, $array_column );
	}
	function getSearchAbsentParams() {
		return null;
	}
	
}
?>