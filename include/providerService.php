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
		$qry = "SELECT t2.id,
       t2.name, 
       t2.tel,
       t2.address, 
       t2.description,
       Date_format(t2.date, '%Y-%m-%d')             AS date,
       Ifnull(t2.total, 0)                          AS total,
       Ifnull(t2.total_return, 0)                          AS total_return,
       Ifnull(t2.paid, 0)                           AS paid,
       ( Ifnull(t2.total, 0) - Ifnull(t2.paid, 0) - Ifnull(t2.total_return, 0)) AS remain
FROM   (SELECT t1.*,
               (SELECT Round(Sum(import_price * quantity)) 
                FROM   product_import 
                WHERE  import_facture_code IN (SELECT code 
                                               FROM   import_facture 
                                               WHERE  provider_id = t1.id)) AS
               total, 
               (SELECT Sum(amount) 
                FROM   provider_paid 
                WHERE  provider_id = t1.id)                                 AS
               paid,
               (select sum(quantity*return_price) from product_return where provider_id = t1.id) as total_return
        FROM   provider t1  
		 where t1.name like '%" . $parameterArray ['provider_name'] . "%') t2 
		 where t2.tel like '%" . $parameterArray ['provider_tel'] . "%'";
		if ($parameterArray ['provider_address'] != null) {
			$qry = $qry . " and t2.address like '%" . $parameterArray ['provider_address'] . "%'";
		}
		if ($parameterArray ['provider_description'] != null) {
			$qry = $qry . " and t2.description like '%" . $parameterArray ['provider_description'] . "%'";
		}
		if ($parameterArray ['total_from'] != null) {
			$qry = $qry . " and ifnull(t2.total,0) >= " . $parameterArray ['total_from'];
		}
		if ($parameterArray ['total_to'] != null) {
			$qry = $qry . " and ifnull(t2.total,0) <= " . $parameterArray ['total_to'];
		}
		if ($parameterArray ['paid_from'] != null) {
			$qry = $qry . " and ifnull(t2.paid,0) >= " . $parameterArray ['paid_from'];
		}
		if ($parameterArray ['paid_to'] != null) {
			$qry = $qry . " and ifnull(t2.paid,0) <= " . $parameterArray ['paid_to'];
		}
		if ($parameterArray ['remain_from'] != null) {
			$qry = $qry . " and (ifnull(t2.total,0)-ifnull(t2.paid,0)) >= " . $parameterArray ['remain_from'];
		}
		if ($parameterArray ['remain_to'] != null) {
			$qry = $qry . " and (ifnull(t2.total,0)-ifnull(t2.paid,0)) <= " . $parameterArray ['remain_to'];
		}
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"id,name,tel,total,paid,remain" => "Provider_name,name",
				"total" => "Tổng",
				"paid" => "Đã Trả",
				"remain" => "Còn nợ",
				"total_return" => "Hàng trả",
				"tel" => "Tel",
				"address" => "Address",
				// "description" => "Description",
				"date" => "Modify date",
				"id,name,tel,address,description" => "Edit",
				"id,deleteprovider" => "Delete" 
		);
		$array_total = array (
				1 => "Tổng",
				2 => "Đã trả",
				3 => "Còn nợ", 
				4 => "Trả hàng" 
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
				'remain_to' => $_REQUEST ['remain_to'] 
		);
		return $parameterArray;
	}
	function getPaidParameters() {
		$parameterArray = array (
				'id_paid_fund_1' => $_REQUEST ['id_paid_fund_1'],
				'id_paid_fund_2' => $_REQUEST ['id_paid_fund_1'],
				'id_paid_fund_3' => $_REQUEST ['id_paid_fund_1'],
				'paid_amount_1' => $_REQUEST ['paid_amount_1'],
				'paid_amount_2' => $_REQUEST ['paid_amount_2'],
				'paid_amount_3' => $_REQUEST ['paid_amount_3'],
				'paid_description' => $_REQUEST ['paid_description'],
				'paid_provider_id' => $_REQUEST ['paid_provider_id'],
				'paid_provider_name' => $_REQUEST ['paid_provider_name'] 
		);
		return $parameterArray;
	}
	function getPaidParametersDelete() {
		$parameterArray = array (
				'idpad' => $_REQUEST ['idpad'],
				'idprovider' => $_REQUEST ['idprovider'] 
		);
		return $parameterArray;
	}
	function listFactureProvider($provider_id) {
		$qry = "select t1.*,date_format(t1.date,'%Y/%m/%d') as date1,(select sum(quantity*import_price) from product_import where import_facture_code = t1.code) as total from import_facture t1 where t1.provider_id = " . $provider_id;
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"code" => "Facture",
				"total" => "Total",
				"date1" => "Date",
				"description" => "Description"
//				"deadline" => "Deadline" 
		);
		$this->commonService->generateJSDatatableSimple ( "histofacture", 0, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, "histofacture", $array_column );
	}
	function listPaidHisto($provider_id) {
		$qry = "select t1.*,date_format(t1.date,'%Y/%m/%d_%H:%i:%s') as date1 from provider_paid t1 where t1.provider_id = " . $provider_id;
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
				"id,deletepaidhisto,amount" => "Delete",
				"amount" => "amount",
				"date1" => "Date",
				"description" => "Description" 
		);
		$this->commonService->generateJSDatatableSimple ( "paidhisto", 2, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, "paidhisto", $array_column );
	}
	function paidMoneyProvider($parameterPaid) {
		if(!isset($_SESSION)){  session_start(); }
		mysql_query ( "BEGIN" );
		$amount1 = $parameterPaid ['paid_amount_1'];
		$amount2 = $parameterPaid ['paid_amount_2'];
		$amount3 = $parameterPaid ['paid_amount_3'];
		
		$fund_id_1 = $_REQUEST ['id_paid_fund_1'];
		$fund_id_2 = $_REQUEST ['id_paid_fund_2'];
		$fund_id_3 = $_REQUEST ['id_paid_fund_3'];
		$desc = " | " . $fund_id_1 . ":" . $amount1 . " | " . $fund_id_2 . ":" . $amount2 . " | " . $fund_id_3 . ":" . $amount3 . " | ";
		$str = true;
		
		$amount = $amount1 + $amount2 + $amount3;
		// insert provider_paid first
		$qry = "insert into provider_paid(provider_id,amount,date,description) values (" . $parameterPaid ['paid_provider_id'] . "," . $amount . ",now(),'" . $parameterPaid ['paid_description'] . $desc . "')";
		if ($amount != 0) {
			$str = $str && (mysql_query ( $qry, $this->connection ) != null);
			
			$provider_paid_id = mysql_insert_id ();
			
			// insert fund_change_histo fund 1
			if ($amount1 != 0 && $provider_paid_id != null) {
				$qry = "insert into fund_change_histo(fund_id,amount,date,description,ratio,user_id) 
					values (" . $fund_id_1 . ",(0-" . $amount1 . "),now(),'" . "Trả nợ : " . $_REQUEST ['paid_provider_name'] . " | " . $_REQUEST ['paid_description'] . "',1," . $_SESSION ['id_of_user'] . ")";
				$str = $str && (mysql_query ( $qry, $this->connection ) != null);
				
				$qry = "insert into provider_paid_fund_change_histo(fund_change_histo_id,provider_paid_id)
					values (" . mysql_insert_id () . "," . $provider_paid_id . ")";
				$str = $str && (mysql_query ( $qry, $this->connection ) != null);
			}
			// insert fund_change_histo fund 2
			if ($amount2 != 0 && $provider_paid_id != null) {
				$qry = "insert into fund_change_histo(fund_id,amount,date,description,ratio,user_id) 
					values (" . $fund_id_2 . ",(0-" . $amount2 . "),now(),'" . "Trả nợ : " . $_REQUEST ['paid_provider_name'] . " | " . $_REQUEST ['paid_description'] . "',1," . $_SESSION ['id_of_user'] . ")";
				$str = $str && (mysql_query ( $qry, $this->connection ) != null);
				
				$qry = "insert into provider_paid_fund_change_histo(fund_change_histo_id,provider_paid_id)
					values (" . mysql_insert_id () . "," . $provider_paid_id . ")";
				$str = $str && (mysql_query ( $qry, $this->connection ) != null);
			}
			// insert fund_change_histo fund 3
			if ($amount3 != 0 && $provider_paid_id != null) {
				$qry = "insert into fund_change_histo(fund_id,amount,date,description,ratio,user_id) 
					values (" . $fund_id_3 . ",(0-" . $amount3 . "),now(),'" . "Trả nợ : " . $_REQUEST ['paid_provider_name'] . " | " . $_REQUEST ['paid_description'] . "',1," . $_SESSION ['id_of_user'] . ")";
				$str = $str && (mysql_query ( $qry, $this->connection ) != null);
				
				$qry = "insert into provider_paid_fund_change_histo(fund_change_histo_id,provider_paid_id) 
						values (" . mysql_insert_id () . "," . $provider_paid_id . ")";
				$str = $str && (mysql_query ( $qry, $this->connection ) != null);
			}
			if ($str == false) {
				mysql_query ( "ROLLBACK" );
				echo "false";
			} else {
				mysql_query ( "COMMIT" );
				echo "true";
			}
		} else {
			mysql_query ( "ROLLBACK" );
		}
	}
	function paidDelete($parameterPaidDelete) {
		if(!isset($_SESSION)){  session_start(); }
		mysql_query ( "BEGIN" );
		
		$str = true;
		
		// delete casscade
		$qry = "delete from fund_change_histo where id in (select fund_change_histo_id from provider_paid_fund_change_histo where provider_paid_id = " . $parameterPaidDelete ['idpad'] . ")";
		$str = $str && (mysql_query ( $qry, $this->connection ) != null);
		
		$qry = "delete from provider_paid where id = ".$parameterPaidDelete ['idpad'];
		
		$str = $str && (mysql_query ( $qry, $this->connection ) != null);
		
		if ($str == false) {
			mysql_query ( "ROLLBACK" );
			echo "false";
		} else {
			mysql_query ( "COMMIT" );
			echo "true";
		}
	}
}
?>