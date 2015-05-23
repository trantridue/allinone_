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
	function listUser($username,$name,$user_mail,$user_tel,$user_status_hidden,$user_description) {
		$qry = "SELECT t1.*, t2.name as shopname FROM user t1 LEFT JOIN shop t2 ON t1.shop_id=t2.id where 
		t1.username like '%" . $username . "%'" . "and 
		t1.email like '%" . $user_mail . "%'" . "and 
		t1.description like '%" . $user_description . "%'" . "and 
		t1.status like '%" . $user_status_hidden . "%'" . "and 
		t1.phone_number like '%" . $user_tel . "%'" . "and 
		t1.name like '%" . $name . "%'";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"username" => "User Name",
				"id,name,email,phone_number,description,shop_id,status" => "Edit",
				"name" => "Name",
				"email" => "Mail",
				"phone_number" => "Tel",
				"shopname" => "Shop",
				"description" => "Description",
				"status" => "Status",
				"id,deleteuser" => "Delete",
				"password" => "hidden_field",
				"shop_id*id" => "complex" 
		);
		$this->commonService->generateJSDatatableSimple ( userdatatable, 7, 'asc' );
		$this->commonService->generateJqueryDatatable ( $result, userdatatable, $array_column );
	}
	// delete user by idx
	function deleteUser($userid) {
		$qry = "delete from user where id = " . $userid;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateUser($user_id, $user_name, $user_email, $user_phone_number, $user_description, $user_password, $shop_dropdown_user, $status_value) {
		$actionType = 'update';
		$new_password = md5 ( $user_password );
		$qry = "";
		$date = date ( 'Y-m-d H:i:s' );
		if ($user_password != null && $user_password != '') {
			$qry = "update user set name='" . $user_name . "', email = '" . $user_email . "', phone_number = '" . $user_phone_number . "'
				,description='" . $user_description . "',password='" . $new_password . "',shop_id=" . $shop_dropdown_user . ",status='" . $status_value . "',end_date='".$date."'  where id = " . $user_id;
		} else {
			$qry = "update user set name='" . $user_name . "', email = '" . $user_email . "', phone_number = '" . $user_phone_number . "'
				,description='" . $user_description . "',shop_id=" . $shop_dropdown_user . ",status='" . $status_value . "',end_date='".$date."'  where id = " . $user_id;
		}
		$result = mysql_query ( $qry, $this->connection );
		$_SESSION ['id_of_shop'] = $shop_dropdown_user;
		echo "<script>userpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function addUser($user_username, $user_name, $user_email, $user_phone_number, $user_description, $user_password, $shop_dropdown_user, $status_value) {
		session_start();
		$actionType = 'insert';
		$new_password = '';
		$date = date ( 'Y-m-d H:i:s' );
		$qry = "";
		if ($user_password != null && $user_password != '') {
			$new_password = md5 ( $user_password );
		} else {
			$new_password = md5 ( $_SESSION['default_password'] );
		}
		$qry = "insert into user(username,name,email,phone_number,shop_id,password,confirmcode,status,start_date,description) values ('" . $user_username . "',
				'" . $user_name . "','" . $user_email . "','" . $user_phone_number . "'," . $shop_dropdown_user . ",'" . $new_password . "','y','" . $status_value . "','" . $date . "','" . $user_description . "')";
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>userpostaction('" . $result . "','" . $actionType . "');</script>";
	}
}
?>