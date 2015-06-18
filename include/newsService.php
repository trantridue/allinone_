<?php
class NewsService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function NewsService($hostname, $username, $password, $database, $commonService) {
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
	function inserOrUpdatetNews($description, $id) {
		session_start ();
		$actionType = 'insert';
		$date = date ( 'Y-m-d H:i:s' );
		$user_id = $_SESSION ['id_of_user'];
		$shop_id = $_SESSION ['id_of_shop'];
		$qry = "";
		if ($id == null)
			$qry = "insert into news(description,date,shop_id,user_id) values ('" . $description . "',
				'" . $date . "'," . $shop_id . "," . $user_id . ")";
		else
			$qry = "update news set description='" . $description . "', date ='" . $date . "' where id = " . $id;
		
		echo mysql_query ( $qry, $this->connection );
	}
	function listNewsDefault() {
		session_start();
		$qry = "select t1.id as identification, t1.*, t2.name as shop, t3.name as username,
				concat(DATE_FORMAT(t1.date,'%m-%d-%Y'),':',DATE_FORMAT(t1.date,'%T')) as displaydate
			   from news t1, shop t2, `user` t3
			   where t1.shop_id = t2.id
         and t1.user_id = t3.id order by date desc limit ".$_SESSION['nbr_news_default'];
		$result = mysql_query ( $qry, $this->connection );
		$this->commonService->generateJSDatatableSimple ( newsdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, newsdatatable, $this->buildArrayParameter() );
	}
	function listNews($parameterArray) {
		$qry = "select t1.id as identification, t1.*, t2.name as shop, t3.name as username,
				concat(DATE_FORMAT(t1.date,'%m/%d/%Y'),':',DATE_FORMAT(t1.date,'%T')) as displaydate
			   from news t1, shop t2, `user` t3
			   where t1.shop_id = t2.id
         		and t1.user_id = t3.id 
				and t1.description like '%" . $parameterArray ['search_news_description'] . "%'
				order by date desc";
		$result = mysql_query ( $qry, $this->connection );
		$this->commonService->generateJSDatatableSimple ( newsdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, newsdatatable, $this->buildArrayParameter() );
	}
	function latestNews(){
		$count = 0;
		$qry = "select t1.*, t2.name as shop, t3.name as username,
				date_format(t1.date,'%Y-%m-%d') as datedisplay
			   from news t1, shop t2, `user` t3
			   where t1.shop_id = t2.id
         		and t1.user_id = t3.id 
				order by date desc";
		echo "<table width='100%' border='1'>";
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {	
			$count++;	
			if($count <= 5){
				echo "<tr><td width='20%'>".$count.".".$rows['username']." (".$rows['datedisplay'] .") </td><td style='color:#800080;'>" . $rows ['description'] . "</td></tr>";
			}
		}
		echo "</table>";
	}
	function buildArrayParameter() {
		session_start();
		if($this->commonService->isAdmin()){
			return array (
					"identification" => "ID",
					"description" => "Description",
					"username" => "Name",
					"shop" => "Shop",
					"displaydate" => "Date",
					"id,description,date,shop,username,shop_id,user_id" => "Edit",
					"id,deletenews" => "Delete"
			);
		} else {
			return array (
					"identification" => "ID",
					"description" => "Description",
					"username" => "Name",
					"shop" => "Shop",
					"displaydate" => "Date"
			);
		}
	}
	function getInputSearchParameters() {
		$parameterArray = array (
				'search_news_description' => $_REQUEST ['search_news_description'] 
		);
		return $parameterArray;
	}
	function deleteNews($newsid) {
		$qry = "delete from news where id = " . $newsid;
		echo mysql_query ( $qry, $this->connection );
	}
}
?>