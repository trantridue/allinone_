<?php
ob_start ();
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
		$qry = "SELECT t1.re_date as date,if(datediff(now(),t1.re_date)=0,'Hôm nay',t1.re_date) as istoday ,
		t3.name,t3.tel,t1.product_code,t4.name as product,t1.quantity,t1.export_price,t2.code,t1.re_qty,t1.re_date
FROM `export_facture_product` t1,export_facture t2,customer t3,product t4
where t1.re_qty > 0
and t1.export_facture_code = t2.code
and t3.id = t2.customer_id
and t4.code = t1.product_code and t1.re_date >=' " . $this->commonService->getDateBeforeSomeDays (default_nbr_days_load_import) . "' order by t1.re_date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				3 => "Total return",
				5 => "Quantity"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerreturndatatable, 8, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerreturndatatable, $this->buildArrayReturnParameter() );
	}
	function buildArrayReturnParameter() {
		return array (
				"counter_colum" => "No",
				"name" => "Khách Hàng",
				"tel" => "Điện thoại",
				"re_qty*export_price" => "complex",
				"product_code,code" => "Sản phẩm,product",
				"quantity" => "Đã mua",
				"re_qty" => "Trả lại",
				"export_price" => "Giá bán",
				"date" => "Ngày trả,istoday"
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
		$qry = "SELECT t1.*,t2.name as product_name,datediff(now(),t1.date) as diff,t1.status as order_status from customer_order t1 left join product t2 on (t1.product_code = t2.code) order by diff desc ,t1.status";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				2 => "Quantity"
		);
		$array_column1 = array (
			"id,customer_name,customer_tel,date,status,description" => "Name,customer_name", 
		    "product_code" => "Pro. Name,product_name",
			"quantity" => "SL", 
			"size" => "Size",
			"color" => "Màu", 
			"diff,date" => "Days,diff",
			"order_status" => "Status"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerorderdatatable, 6, 'asc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerorderdatatable, $array_column1 );
	}
	
	function updateOrderStatus($id,$status){
		if($status=='Y') {
			$status = 'N';
		} else {
			$status = 'Y';
		}
		session_start ();
		mysql_query ( "BEGIN" );
		$qry = "update customer_order set status = '".$status."' where id =".$id;
// 		echo $qry;
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function listExportDefault() {
		$qry = "SELECT t1.id,t1.product_code,t1.quantity,t1.export_price,t1.re_qty,t3.name as product_name,
		t1.export_facture_code, t2.date,date_format(t2.date,'%H:%m:%s') as time,t4.name as customer,t4.tel as customer_tel,t5.name as shop
		 FROM `export_facture_product` t1, export_facture t2, product t3, customer t4, shop t5
		where t1.export_facture_code = t2.code
		and t1.product_code = t3.code
		and t4.id = t2.customer_id
		and t5.id = t2.shop_id
		and datediff(now(),t2.date) < ".default_nbr_days_load_export." order by date desc";
		$result = mysql_query ( $qry, $this->connection );
//		echo $qry;
		$this->commonService->generateJSDatatableComplexExport ( $result, exportproductdatatable, 12, 'desc', $this->getExportListArrayTotal() );
		$this->commonService->generateJqueryDatatableExport ( $result, exportproductdatatable, $this->getExportListArrayColumn() );		
	}
	function listExport($params) {
		$qry = "SELECT t1.id,t1.product_code,t1.quantity,t1.export_price,t1.re_qty,t3.name as product_name,
		t1.export_facture_code, t2.date,subStr(t2.date,12,8) as time,t4.name as customer,t4.tel as customer_tel,t5.name as shop
		 FROM `export_facture_product` t1, export_facture t2, product t3, customer t4, shop t5
		where t1.export_facture_code = t2.code
		and t1.product_code = t3.code
		and t4.id = t2.customer_id
		and t5.id = t2.shop_id ";
		if($params['search_date_from'] != ''){
			$qry = $qry." and t2.date >= '".$params['search_date_from']."'";
		}
		if($params['search_date_to'] != ''){
			$qry = $qry." and t2.date <= '".$params['search_date_to']."'";
		}
		if($_REQUEST['isAdminField'] != '1') {
			echo "<div style='text-align:center;background-color:pink;padding-bottom:5px;font-weight:bold;font-style:italic;'>".
			"(Bạn chỉ xem được các sản phầm đã bán từ tối đa ".default_nbr_days_load_export." ngày gần đây!)</div>";
			$qry = $qry." and datediff(now(),t2.date) < ". default_nbr_days_load_export;
		}
		$qry = $qry . "  order by date desc";
		$result = mysql_query ( $qry, $this->connection );
		
		$this->commonService->generateJSDatatableComplexExport ( $result, exportproductdatatable, 12, 'desc', $this->getExportListArrayTotal() );
		$this->commonService->generateJqueryDatatableExport ( $result, exportproductdatatable, $this->getExportListArrayColumn() );		
	}
	function getExportListArrayTotal() {
		return  $array_total = array (
				5 => "Q",
				6 => "RE",
				8 => "T",
				9 => "TRE"
		);
	}
	function getExportListArrayColumn() {
		return array (
				"checkbox" => "RE",
				"qtyre" => "&nbsp;&nbsp;",
				"product_code" => "Mã",
				"product_name" => "Tên hàng",
				"customer,customer_tel" => "Khách,customer",
				"quantity" => "SL&nbsp;&nbsp;",
				"re_qty" => "RQ&nbsp;&nbsp;",
				"export_price" => "PRI&nbsp;&nbsp;&nbsp;&nbsp;",
				"export_price*quantity" => "complex",
				"export_price*re_qty" => "complex",
				"export_facture_code" => "MÃ_HÓA_ĐƠN&nbsp;&nbsp;",
				"shop" => "Shop&nbsp;&nbsp;",
				"date" => "Time,time"
		);
	}
	function getSearchParameters(){
			return array (
			'isAdminField' 				=> $_REQUEST['isAdminField'],
			'search_customer_name' 		=> $_REQUEST['search_customer_name'],
			'search_product_code' 		=> $_REQUEST['search_product_code'],
			'search_price_from' 		=> $_REQUEST['search_price_from'],
			'search_price_to' 			=> $_REQUEST['search_price_to'],
			'search_customer_tel' 		=> $_REQUEST['search_customer_tel'],
			'search_product_name' 		=> $_REQUEST['search_product_name'],
			'search_date_from' 			=> $_REQUEST['search_date_from'],
			'search_date_to' 			=> $_REQUEST['search_date_to'],
			'id_search_shop' 			=> $_REQUEST['id_search_shop'],
			'id_search_user' 			=> $_REQUEST['id_search_user']
		);
	}
	function loadConfigParam(){
		session_start();
	$params = array('import_number_row', 
		'default_password', 
		'default_row_product_return', 
		'export_number_row', 
		'is_sale_for_all', 
		'sale_all_taux');
		$qry = "select * from configuration";
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			for($i =0; $i< sizeof($params);$i++){
				if($rows['name'] == $params[$i]) 
				$_SESSION[$params[$i]] = $rows['value'];
			}
		}
	}
}
?>