<?php
ob_start ();
class ConfigService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function ConfigService($hostname, $username, $password, $database, $commonService) {
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
	function loadConfigParam() {
		session_start ();
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$_SESSION [$rows ['name']] = $rows ['value'];
		}
	}
	function listParameters() {
		$nbr_column = 4;
		$counter = 0;
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		echo "<table width='100%'>";
		while ( $rows = mysql_fetch_array ( $result ) ) {
			if (($counter % $nbr_column) == 0) {
				echo "<tr>";
			}
			if ($rows ['name'] == 'is_sale_for_all') {
				echo "<td><input type='number' style='width:70px;' id='" . $rows ['name'] . "' value='" . $rows ['value'] . "' 
				onclick=\"validateField('" . $rows ['name'] . "',0,1);\" 
				keypress=\"validateField('" . $rows ['name'] . "',0,1);\"  align='right'/></td>";
				echo "<td title='1: SALE ON <br> 0: SALE OFF' style='font-weight:bold'>
			<input type='button' value='" . $rows ['label'] . "' onclick='updateconfigfield(\"" . $rows ['name'] . "\");'></td>";
			} else {
				echo "<td><input type='number' style='width:70px;' id='" . $rows ['name'] . "' value='" . $rows ['value'] . "'  align='right'/></td>";
				echo "<td title='" . $rows ['name'] . "' style='font-weight:bold'>
			<input type='button' value='" . $rows ['label'] . "' onclick='updateconfigfield(\"" . $rows ['name'] . "\");'></td>";
			}
			
			if ((($counter - $nbr_column + 1) % $nbr_column) == 0) {
				echo "</tr>";
			}
			$counter ++;
		}
		echo "</table>";
	}
	function getListParameters() {
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		$listParams = "";
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$listParams = $listParams . $rows ['name'] . ";";
		}
		return substr ( $listParams, 0, - 1 );
	}
	function updateFieldConfig($fieldname, $fieldvalue) {
		mysql_query ( "BEGIN" );
		$qry = "update configuration set value = " . $fieldvalue . " where name = '" . $fieldname . "'";
		
		if (mysql_query ( $qry, $this->connection ) != null) {
			$this->loadConfigParam ();
			mysql_query ( "COMMIT" );
			echo 'success';
		} else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function listProductNoImage($params) {
		$qry = $this->initSqlForListProductNotCapturedImage();
		if($params['date_from'] !='') {
			$qry = $qry . " and t3.date >= '". $params['date_from']."' ";
		}
		if($params['date_to'] !='') {
			$qry = $qry . " and t3.date <= '". $params['date_to']."' ";
		}
		if($params['product_code_from'] !='') {
			$qry = $qry . " and t1.code >= '". $params['product_code_from']."' ";
		}
		if($params['product_code_to'] !='') {
			$qry = $qry . " and t1.code <= '". $params['product_code_to']."' ";
		}
		if($params['provider_name'] !='') {
			$qry = $qry . " and t4.name like '%". $params['provider_name']."%' ";
		}
		$qry = $qry . " and t1.code not in ".$this->getProductCaptured(true)." group by t1.code ) tt where tt.stock >0 ";
		$this->processListProductNotCapturedImage($qry);
	}
	
	function listProductNoImageDefault() {
		session_start();
		$dateBeforeSomeDays = $this->commonService->getDateBeforeSomeDays ( $_SESSION ['default_nbr_day_check_image'] );
		$qry = $this->initSqlForListProductNotCapturedImage();
		$qry = $qry . " and t3.date >= '".$dateBeforeSomeDays."' and t1.code not in ".$this->getProductCaptured(false)." group by t1.code) tt where tt.stock >0 ";
		$this->processListProductNotCapturedImage($qry);		
	}
	function initSqlForListProductNotCapturedImage(){
		
		$qry = "select tt.* from (select t2.import_facture_code,t3.date,t4.name as provider, t1.*, "
		."((select ifnull(sum(quantity),0) from product_import where product_code = t1.code) - "
	  	."(select ifnull(sum(quantity),0) from product_return where product_code = t1.code) - "
	  	."(select ifnull(sum(quantity),0) from export_facture_product where product_code = t1.code) + "
        ."(select ifnull(sum(re_qty),0) from export_facture_product where product_code = t1.code) + "
      	."(select ifnull(sum(quantity),0) from product_deviation where product_code = t1.code) ) as stock "
		."from product t1 , product_import t2, import_facture t3, provider t4 "
		."where t1.code = t2.product_code and t2.import_facture_code = t3.code and t4.id =t3.provider_id ";
		return $qry;
	}
	
	function processListProductNotCapturedImage($qry){
		echo $qry;
		$result = mysql_query ( $qry, $this->connection );
		$array_column = array (
			"code" => "Mã hàng"
			,"stock" => "Trong kho còn"
			,"name" => "Tên hàng"
			,"date" => "Ngày nhập"
			,"import_facture_code" => "Mã hóa đơn");

		if($this->commonService->isAdmin()) {
			$array_column['provider'] = 'Nhà Cung Cấp';
		}
		
		$this->commonService->generateJSDatatableSimple ( productdatatable, 1, 'desc' );
		$this->commonService->generateJqueryDatatable ( $result, productdatatable,$array_column );
	}
	function getProductCaptured($isAjax) {
		session_start();
		$str = "('";
		if($isAjax) {
			$filelist = glob("../../img/product/*.png");
			//filelist = glob("/data/www/sale/img/product/*.png");
		} else {
			$filelist = glob("./img/product/*.png");
			//$filelist = glob("/data/www/sale/img/product/*.png");
		}
		foreach ($filelist as $value) {
			$start =  strrpos($value,'/',-1);
			$end =  strrpos($value,'.',-1);
			$str = $str. substr($value,$start+1,$end-$start-1)."','";
		}
		$len = strlen ($str);
		//echo substr($str,0,$len-2).")";
		return substr($str,0,$len-2).")";
	}
}
?>