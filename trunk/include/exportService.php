<?php
class ExportService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	function ExportService($hostname, $username, $password, $database, $commonService) {
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
	function getJsonProductCode($term) {
		session_start();
		
		$isSaleAll = $_SESSION ['is_sale_for_all'];
		$saleAllTaux = $_SESSION ['sale_all_taux'];
		if($isSaleAll) {
			$qry = "select t1.*,t1.export_price * (100-".$saleAllTaux.")/100 as price from product t1		
		where t1.code like '%" . $term . "%' limit 10";
		} else {
			$qry = "select t1.*,t1.export_price * (100-t1.sale)/100 as price from product t1		
		where t1.code like '%" . $term . "%' limit 10";
		}
		
		$result = mysql_query ( $qry, $this->connection );
		
		$jsonArray = array ();
	
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = "Code : " . $rows ['code'] . ", name :" . $rows ['name'];
			$element = array (code => $rows ['code'], name => $rows ['name'], price => $rows ['price'],posted_price => $rows ['export_price'], value => $rows ['code'], label => $labelvalue );
				
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getOrderParameters() {
		$paramsArray = array();
	
		$paramsArray['customer_tel'] 		= $_REQUEST['customer_tel'];
		$paramsArray['customer_name'] 			= $_REQUEST['customer_name'];
		$paramsArray['order_product_code'] 			= $_REQUEST['order_product_code'];
		$paramsArray['order_size'] 	= $_REQUEST['order_size'];
		$paramsArray['order_qty'] 	= $_REQUEST['order_qty'];
		$paramsArray['order_color'] 	= $_REQUEST['order_color'];
		$paramsArray['order_description'] 			= $_REQUEST['order_description'];
	
		return $paramsArray;
	}
	function saveOrder($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$qry = "insert into customer_order (customer_tel,customer_name,product_code,color,size,date,description,quantity) values ('"
				.$paramsArray['customer_tel']."','"
				.$paramsArray['customer_name']."','"
				.$paramsArray['order_product_code']."','"
				.$paramsArray['order_color']."','"
				.$paramsArray['order_size']."','"
				.date('Y-m-d H:i:s')."','"
				.$paramsArray['order_description']."',"
				.$paramsArray['order_qty'].")";
// 		echo $qry;
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	
	function listDebt() {
		$qry = "select *,(t.total-t.paid) as debt from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       (select sum(amount) from customer_paid t4 where t4.customer_id = t1.id) AS paid
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where (t.total-t.paid) > 0 order by date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				3 => "Total",
				4 => "Paid",
				5 => "Debt"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerdebtdatatable, 6, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerdebtdatatable, $this->buildArrayDebtParameter() );
	}
	function buildArrayDebtParameter() {
		return array (
				"counter_colum" => "No",
				"name" => "Khách Hàng",
				"tel" => "Điện thoại",
				"total" => "Tổng hàng",
				"paid" => "Đã Thanh Toán",
				"debt" => "Còn nợ",
				"date" => "Ngày mua gần nhất"
				
		);
	}
	function listReturn() {
		$qry = "SELECT t1.re_date as date,t3.name,t3.tel,t1.product_code,t4.name as product,t1.quantity,t1.export_price,t2.code,t1.re_qty,t1.re_date
FROM `export_facture_product` t1,export_facture t2,customer t3,product t4
where t1.re_qty > 0
and t1.export_facture_code = t2.code
and t3.id = t2.customer_id
and t4.code = t1.product_code and t1.re_date >=' " . $this->commonService->getDateBeforeSomeDays (default_nbr_days_load_import) . "' order by t1.re_date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				3 => "Total"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerreturndatatable, 7, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerreturndatatable, $this->buildArrayReturnParameter() );
	}
	function buildArrayReturnParameter() {
		return array (
				"counter_colum" => "No",
				"name" => "Khách Hàng",
				"tel" => "Điện thoại",
				"re_qty*export_price" => "complex",
				"quantity" => "Qty",
				"re_qty" => "Qty_re",
				"export_price" => "Price",
				"date" => "Ngày trả"
		);
	}
	function listReservation() {
		$qry = "SELECT t1.*,t1.status as reservation_status,t2.name,t2.tel FROM `customer_reservation_histo` t1 
		left join customer t2 on (t2.id = t1.customer_id) order by status asc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				3 => "Total"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerreservationdatatable, 6, 'asc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerreservationdatatable, $this->buildArrayReservationParameter() );
	}
	function buildArrayReservationParameter() {
		return array (
				"counter_colum" => "No",
				"name" => "Khách Hàng",
				"tel" => "Điện thoại",
				"amount" => "Tổng",
				"date" => "Ngày đặt",
				"complete_date" => "Ngày thanh toán",
				"reservation_status" => "Trạng thái"
				
		);
	}
	function listOrder() {
		$qry = "SELECT *,datediff(now(),date) as diff,status as order_status from customer_order order by diff desc ,status";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				1 => "Quantity"
		);
		$array_column1 = array (
			"id,customer_name,customer_tel,date,status" => "Name,customer_name", 
			"quantity" => "SL", 
			"size" => "Size",
			"color" => "Màu", 
			"order_status" => "Status",
			"diff" => "Days",
			"description" => "Description"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerorderdatatable, 4, 'asc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerorderdatatable, $array_column1 );
	}
}
?>