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
		$qry = "select *,(t.total-t.paid) as debt,round((t.total/(t.total+t.return_amount))*100,2) as efficient from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
                t1.description,
                t1.created_date,
                t1.isboss,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       sum(t3.export_price*t3.re_qty) as return_amount,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid,
				       (select sum(bonus_used*bonus_ratio) from export_facture_trace t4 where t4.customer_id = t1.id) AS bonus_used
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t order by id desc limit ".$_SESSION['limit_default_customer_before_search'];
		$result = mysql_query ( $qry, $this->connection );
		
		$this->commonService->generateJSDatatableSimple ( customerdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, customerdatatable, $this->getArrayColumn() );
	}
	function exportCsv($params) {
		session_start();
		$qry = "select *,(t.total-t.paid) as debt,round((t.total/(t.total+t.return_amount))*100,2) as efficient from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
                t1.description,
                t1.created_date,
                t1.isboss,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       sum(t3.export_price*t3.re_qty) as return_amount,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where t.tel not in (select phone_number from user union select tel from provider) ";
		if($params['search_customer_name']!=''){
			$qry = $qry . " and t.name like '%".$params['search_customer_name']."%'";
		}
		if($params['search_customer_tel']!=''){
			$qry = $qry . " and t.tel like '%".$params['search_customer_tel']."%'";
		}
		if($params['create_date_from']!=''){
			$qry = $qry . " and t.created_date >= '".$params['create_date_from']."'";
		}
		if($params['create_date_to']!=''){
			$qry = $qry . " and t.created_date <= '".$params['create_date_to']."'";
		}
		if($params['update_date_from']!=''){
			$qry = $qry . " and t.date >= '".$params['update_date_from']."'";
		}
		if($params['update_date_to']!=''){
			$qry = $qry . " and t.date <= '".$params['update_date_to']."'";
		}
		if($params['total_amount_from']!=''){
			$qry = $qry . " and t.total >= '".$params['total_amount_from']."'";
		}
		if($params['total_amount_to']!=''){
			$qry = $qry . " and t.total <= '".$params['total_amount_to']."'";
		}
		if($params['search_description']!=''){
			$qry = $qry . " and t.description like '%".$params['search_description']."%'";
		}
		$qry = $qry. " order by t.id";
		
		if($params['efficiency_from']!='' && $params['efficiency_to']!=''){
			$qry = "select * from (" .$qry . ") x where efficient between '".$params['efficiency_from']."' and '".$params['efficiency_to']."'";
		} else if($params['efficiency_to']!='' && $params['efficiency_from']==''){
			$qry = "select * from (" .$qry . ") x where efficient <= '".$params['efficiency_to']."'";
		} else if($params['efficiency_from']!='' && $params['efficiency_to']==''){
			$qry = "select * from (" .$qry . ") x where efficient >= '".$params['efficiency_from']."'";
		}
		$result = mysql_query ( $qry, $this->connection );
		echo $this->generateCsvFile($result);
	}
	function generateCsvFile($result){
		session_start();
		$contactFileNameReturn = "csv/contact_".date ( 'Y-m-d_H-i-s' ).".csv";
		$contactFileName = "../../".$contactFileNameReturn;

		$counter =0;
		$personPerGroup = $_SESSION['nbr_customer_by_group_csv'];
		//$counter_groupe = $_SESSION['nbr_group_from'];;
		
		$khach_hang = "Khach_Hang_";
		$blank1 = ",,,,,,,,,,,,,,,,,,,,,,,,,,";
		$blank2= ",,,,,Mobile,";
		$blank3 = ",,,,,,,,,,,,,,,,,,,,,,,,,,,";
		$group = "Group_";
		$counter_groupe_display = '';
		$hearder = "Name,Given Name,Additional Name,Family Name,Yomi Name,Given Name Yomi,Additional Name Yomi,Family Name Yomi,Name Prefix,Name Suffix,Initials,Nickname,Short Name,Maiden Name,Birthday,Gender,Location,Billing Information,Directory Server,Mileage,Occupation,Hobby,Sensitivity,Priority,Subject,Notes,Group Membership,E-mail 1 - Type,E-mail 1 - Value,E-mail 2 - Type,E-mail 2 - Value,Phone 1 - Type,Phone 1 - Value,Phone 2 - Type,Phone 2 - Value,Phone 3 - Type,Phone 3 - Value,Phone 4 - Type,Phone 4 - Value,Phone 5 - Type,Phone 5 - Value,Address 1 - Type,Address 1 - Formatted,Address 1 - Street,Address 1 - City,Address 1 - PO Box,Address 1 - Region,Address 1 - Postal Code,Address 1 - Country,Address 1 - Extended Address,Organization 1 - Type,Organization 1 - Name,Organization 1 - Yomi Name,Organization 1 - Title,Organization 1 - Department,Organization 1 - Symbol,Organization 1 - Location,Organization 1 - Job Description,Website 1 - Type,Website 1 - Value\n";
		file_put_contents($contactFileName, $hearder, FILE_APPEND | LOCK_EX);
		while ( $rows = mysql_fetch_array ( $result ) ) {
			//if($counter%$personPerGroup==0){
			   $counter_groupe = floor($rows['id']/$personPerGroup)+1;
			   if($counter_groupe<10) $counter_groupe_display = '00'.$counter_groupe;
			   else if($counter_groupe<100) $counter_groupe_display = '0'.$counter_groupe; 
			   else $counter_groupe_display = $counter_groupe;
			//}
			$str = $khach_hang.$rows['id'].$blank1.$group.$counter_groupe_display.$blank2.$rows['tel'].$blank3."\n";
			$counter ++;
		
		file_put_contents($contactFileName, $str , FILE_APPEND | LOCK_EX);
		}
		return $contactFileNameReturn;
	}
	function listCustomer($params) {
		session_start();
		$qry = "select *,(t.total-t.paid) as debt,round((t.total/(t.total+t.return_amount))*100,2) as efficient from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
                t1.description,
                t1.created_date,
                t1.isboss,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       sum(t3.export_price*t3.re_qty) as return_amount,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid,
				       (select sum(bonus_used*bonus_ratio) from export_facture_trace t4 where t4.customer_id = t1.id) AS bonus_used
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where 1 ";
		$flag = true;
		if($params['search_customer_name']!=''){
			$flag = false;
			$qry = $qry . " and t.name like '%".$params['search_customer_name']."%'";
		}
		if($params['search_customer_tel']!=''){
			$flag = false;
			$qry = $qry . " and t.tel like '%".$params['search_customer_tel']."%'";
		}
		if($params['create_date_from']!=''){
			$flag = false;
			$qry = $qry . " and t.created_date >= '".$params['create_date_from']."'";
		}
		if($params['create_date_to']!=''){
			$flag = false;
			$qry = $qry . " and t.created_date <= '".$params['create_date_to']."'";
		}
		if($params['update_date_from']!=''){
			$flag = false;
			$qry = $qry . " and t.date >= '".$params['update_date_from']."'";
		}
		if($params['update_date_to']!=''){
			$flag = false;
			$qry = $qry . " and t.date <= '".$params['update_date_to']."'";
		}
		if($params['total_amount_from']!=''){
			$flag = false;
			$qry = $qry . " and t.total >= '".$params['total_amount_from']."'";
		}
		if($params['total_amount_to']!=''){
			$flag = false;
			$qry = $qry . " and t.total <= '".$params['total_amount_to']."'";
		}
		
		if($params['search_description']!=''){
			$flag = false;
			$qry = $qry . " and t.description like '%".$params['search_description']."%'";
		}
		$qry = $qry. " order by t.id desc";
		
		if($params['efficiency_from']!='' && $params['efficiency_to']!=''){
			$flag = false;
			$qry = "select * from (" .$qry . ") x where efficient between '".$params['efficiency_from']."' and '".$params['efficiency_to']."'";
		} else if($params['efficiency_to']!='' && $params['efficiency_from']==''){
			$flag = false;
			$qry = "select * from (" .$qry . ") x where efficient <= '".$params['efficiency_to']."'";
		} else if($params['efficiency_from']!='' && $params['efficiency_to']==''){
			$flag = false;
			$qry = "select * from (" .$qry . ") x where efficient >= '".$params['efficiency_from']."'";
		}
		if($flag) 
		$qry = $qry. " limit ".$_SESSION['limit_default_customer_after_search'];
//		echo $qry;
		$result = mysql_query ( $qry, $this->connection );
		
		$this->commonService->generateJSDatatableSimple ( customerdatatable, 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, customerdatatable, $this->getArrayColumn() );
	}
	function getArrayColumn() {
		$array_column = array ("id,description" => "ID,id","name" => "Name", 
		"tel" => "Tel",  "description" => "Description",
		"created_date" => "Recent date,date", 
		"isboss" => "Is Boss", 
		"total" => "Total",
		"paid" => "Paid",
		"return_amount" => "re_A",
		"efficient" => "EFF",
		"debt" => "Debt",
		"bonus_used" => "Bonus",
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
			'total_amount_from' 		=> $_REQUEST['total_amount_from'],
			'total_amount_to' 			=> $_REQUEST['total_amount_to'],
			'efficiency_from' 		=> $_REQUEST['efficiency_from'],
			'efficiency_to' 		=> $_REQUEST['efficiency_to'],
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