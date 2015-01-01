<?php
class UserService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	// -----Initialization -------
	function UserService($hostname, $username, $password, $database, $commonService) {
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
	function listUser($username) {
		$qry = "SELECT t1.*, t2.name as shopname FROM user t1 LEFT JOIN shop t2 ON t1.shop_id=t2.id where t1.username like '%" . $username . "%'";
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"username" => "User Name",
				"name" => "Name",
				"email" => "Mail",
				"phone_number" => "Tel",
				"shopname" => "Shop",
				"description" => "Description",
				"status" => "Status",
				"id,name,email,phone_number,description,shop_id,status" => "Edit",
				"id" => "Delete",
				"password" => "hidden_field",
				"shop_id*id" => "complex" 
		);
// 		$this->commonService->generateJSDatatableComplex ( userdatatable, 0, 'asc' );
		$this->commonService->generateJSDatatableSimple ( userdatatable, 0, 'asc' );
		$this->commonService->generateJqueryDatatable ( $result, userdatatable, $array_column );
	}
	// delete user by idx
	function deleteUser($userid) {
		$qry = "delete from user where id = " . $userid;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateUser($user_id, $user_name, $user_email, $user_phone_number, $user_description, $user_password, $shop_dropdown_user,$status_value) {
		$actionType = 'update';
		$new_password = md5 ( $user_password );
		$qry = "";
		if ($user_password != null && $user_password != '') {
			$qry = "update user set name='" . $user_name . "', email = '" . $user_email . "', phone_number = '" . $user_phone_number . "'
				,description='" . $user_description . "',password='" . $new_password . "',shop_id=" . $shop_dropdown_user . ",status='".$status_value."'  where id = " . $user_id;
		} else {
			$qry = "update user set name='" . $user_name . "', email = '" . $user_email . "', phone_number = '" . $user_phone_number . "'
				,description='" . $user_description . "',shop_id=" . $shop_dropdown_user . ",status='".$status_value."'  where id = " . $user_id;
		}
		$result = mysql_query ( $qry, $this->connection );
		echo "<script>userpostaction('" . $result . "','" . $actionType . "');</script>";
	}
	function dropDownList($table, $fieldname, $selectedId) {
		$selected = "";
		$sql = "select * from " . $table . " where 1 = 1";
		if ($table == "user") {
			$sql = $sql . " and status ='y'";
		}
		echo "<select name='" . $fieldname . "' style='width:140px;height:25px;'>";
		$sql = $sql . " order by name asc";
		$result = mysql_query ( $sql ) or die ( mysql_error () );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			if ($selected == "") {
				$selected = ($rows ['id'] == $selectedId) ? "selected='selected'" : "";
				echo "<option value='" . $rows ['id'] . "' " . $selected . ">" . $rows ['name'] . "</option>";
			} else {
				echo "<option value='" . $rows ['id'] . "'>" . $rows ['name'] . "</option>";
			}
		}
		echo "</select>";
	}
}
?>