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
	function getExportParameters() {
		$paramsArray = array();
	
		$paramsArray['customer_tel'] 		= $_REQUEST['customer_tel'];
		$paramsArray['customer_id'] 		= $_REQUEST['customer_id'];
		$paramsArray['customer_name'] 			= $_REQUEST['customer_name'];
		$paramsArray['export_date'] 			= $_REQUEST['export_date'];
		$paramsArray['id_export_shop'] 	= $_REQUEST['id_export_shop'];
		$paramsArray['customer_description'] 	= $_REQUEST['customer_description'];
		$paramsArray['isBoss'] 	= $_REQUEST['isBoss'];
		$paramsArray['useBonus'] 			= $_REQUEST['useBonus'];
		$paramsArray['byCard'] 			= $_REQUEST['byCard'];
		$paramsArray['customer_debt'] 		= $_REQUEST['customer_debt'];
		$paramsArray['customer_reserved'] 		= $_REQUEST['customer_reserved'];
		$paramsArray['customer_returned'] 		= $_REQUEST['customer_returned'];
		$paramsArray['total_facture'] 		= $_REQUEST['total_facture'];
		$paramsArray['customer_bonus'] 		= $_REQUEST['customer_bonus'];
		$paramsArray['final_total'] 		= $_REQUEST['final_total'];
		$paramsArray['customer_reserve_more'] 		= $_REQUEST['customer_reserve_more'];
		$paramsArray['customer_give'] 		= $_REQUEST['customer_give'];
		$paramsArray['give_customer'] 		= $_REQUEST['give_customer'];
		$paramsArray['id_search_user'] 		= $_REQUEST['id_search_user'];
		$paramsArray['export_number_row'] 		= $_REQUEST['export_number_row'];
		$paramsArray['listProductReturnQty'] 		= $_REQUEST['listProductReturnQty'];
		$paramsArray['listProductReturnId'] 		= $_REQUEST['listProductReturnId'];
		for($i =1;$i<=$_REQUEST['export_number_row'];$i++) {
			$code_field = 'productcode_' . $i;
			$qty_field = 'quantity_' . $i;
			$price_field = 'exportprice_' . $i;
			$code_val = $_REQUEST[$code_field];
			$qty_val = $_REQUEST[$qty_field];
			$price_val = $_REQUEST[$price_field];
			if($code_val !='') {
				$paramsArray[$code_field] = $code_val;
				$paramsArray[$qty_field] = $qty_val;
				$paramsArray[$price_field] = $price_val;
			}
		}
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
		if(mysql_query ( $qry, $this->connection ) != null){
			mysql_query ( "COMMIT" );
			echo 'success';
		}else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function deleteExportFacture($export_facture_code){
//		session_start ();
		mysql_query ( "BEGIN" );
		$flag = true;
		$qrySpend = "delete from spend where description like '%".$export_facture_code."%'";
		$qryInout = "delete from money_inout where description like '%".$export_facture_code."%'";
		$qryFund = "delete from fund_change_histo where description like '%".$export_facture_code."%'";
		$qryExportFactureProduct = "delete from export_facture_product where export_facture_code = '".$export_facture_code."'";
		$qryExportFactureTrace = "delete from export_facture_trace where export_facture_code = '".$export_facture_code."'";
		$qryExportFacture = "delete from export_facture where code = '".$export_facture_code."'";
		$qryExportReserve1 = "delete from customer_reservation_histo where reserved_facture = '".$export_facture_code."'";
		$qryExportReserve2 = "update customer_reservation_histo set status = 'N', complete_facture='',complete_date=null where complete_facture = '".$export_facture_code."'";
		
		$flag = $flag && (mysql_query ( $qrySpend, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryFund, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportFactureProduct, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportFactureTrace, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportFacture, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportReserve1, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportReserve2, $this->connection ) != null);
		
		$this->commitOrRollback($flag);
		echo "success";
	}
	function getNextFactureCodeBydate($maxFactureCode) {
		$str1 = substr ( $maxFactureCode, 0, 8 );
		$str2 = substr ( $maxFactureCode, 9, 3 );
		return $str1 . "_" . $this->commonService->displayTowDigit ( $str2 + 1 );
	}
	function getExportFactureCodeByDate($date) {
		$query = "select max(code) as maxexportfacturecode from export_facture where DATE_FORMAT(date,'%Y-%m-%d')='".$date."' limit 1";
		$result = mysql_query ( $query ) or die ( mysql_error () );
		$rows = mysql_fetch_array ( $result );
		if ($rows ['maxexportfacturecode']){
			return $this->getNextFactureCodeBydate ( $rows ['maxexportfacturecode'] );		
		}
		else
			return $this->commonService->getCurrentDateYYYYMMDD () . "_001";
	}
	function getExportFactureCode() {
		$query = "select max(code) as maxexportfacturecode from export_facture limit 1";
		$result = mysql_query ( $query ) or die ( mysql_error () );
		$rows = mysql_fetch_array ( $result );
		if ($rows ['maxexportfacturecode']){
			return $this->commonService->getNextFactureCode ( $rows ['maxexportfacturecode'] );
		}
		else
			return $this->commonService->getCurrentDateYYYYMMDD () . "_001";
	}
	function saveExport($paramsArray){
		session_start ();
		mysql_query ( "BEGIN" );
		$flag = true;
		// 1. Get export facture code
		$export_facture_code = $this->getExportFactureCode();
		// 2. get current date time
		$datetime = $this->commonService->getFullDateTime ();
		if ($paramsArray['export_date'] != '') {
			$export_facture_code = $this->getExportFactureCodeByDate($paramsArray['export_date']);
			$datetime = $paramsArray['export_date'].' '.date('H:i:s');
		}
		//3. Get shop id
		$shopid = $_SESSION ['id_of_shop'];
		if ($paramsArray['id_export_shop'] != '') {
			$shopid = $paramsArray['id_export_shop'];
		}
		//4. Get employee id
		$userid = $_SESSION ['id_of_user'];
		if ($paramsArray['id_search_user'] != '') {
			$userid = $paramsArray['id_search_user'];
		}
		//5. Get customer ID
		$customer_id = $this->getCustomerId($paramsArray,$datetime);

		if($paramsArray['useBonus']=='false'){
			$paramsArray['customer_bonus'] = 0;
		}
		if($paramsArray['give_customer'] <=0 ){
			$paramsArray['customer_paid_amount'] =    $paramsArray['customer_give']  
													+ $paramsArray['customer_bonus']
													- $paramsArray['customer_reserve_more']
													+ $paramsArray['customer_reserved'];
		} else {
			$paramsArray['customer_paid_amount'] =    $paramsArray['customer_give']  
													- $paramsArray['give_customer'] 
													- $paramsArray['customer_reserve_more']
													+ $paramsArray['customer_bonus']
													+ $paramsArray['customer_reserved'];
		}
		
		//6. Insert export_facture
		$qryExport_facture = "insert into export_facture(code,customer_id,shop_id,description,date,user_id) values ('".$export_facture_code
		."',".$customer_id.",".$shopid.",'".$paramsArray['customer_description']."','".$datetime."',".$userid.")";
		
		//7. Qry export facture trace
		$qryExport_facture_trace = "insert into export_facture_trace(
		export_facture_code,
		total,
		debt,
		reserved,
		`order`,
		customer_give,
		give_customer,
		bonus_used,
		return_amount,
		shop_id,
		amount,
		customer_id,
		bonus_ratio
		) values ('".$export_facture_code."'
		,'".$paramsArray['total_facture']."'
		,'".$paramsArray['customer_debt']."'
		,'".$paramsArray['customer_reserved']."'
		,'".$paramsArray['customer_reserve_more']."'
		,'".$paramsArray['customer_give']."'
		,'".$paramsArray['give_customer']."'
		,'".$paramsArray['customer_bonus']."'
		,'".$paramsArray['customer_returned']."'
		,'".$shopid."'
		,'".$paramsArray['customer_paid_amount']."'
		,'".$customer_id."'
		,'".$_SESSION['bonus_ratio']."')";
		
		//8. Export_facture_product
		$qryExport_facture_product = "insert into export_facture_product (product_code,quantity,export_price,export_facture_code) values ";
		$nbrRowExportReal = 0;
		for($i =1;$i<=$paramsArray['export_number_row'];$i++) {
			if($paramsArray['productcode_'.$i] != ''){
				$nbrRowExportReal++;
				$qryExport_facture_product = $qryExport_facture_product
				. "('".$paramsArray['productcode_'.$i]."'
				,".$paramsArray['quantity_'.$i]."
				,".$paramsArray['exportprice_'.$i]."
				,'".$export_facture_code."'),";
			}
		}
		//9. Process return
		//echo $paramsArray['listProductReturnId'];
		$nbrLineReturn = 0;
		$reIdList = array();
		$reQtyList = array();
		if($paramsArray['listProductReturnId'] != '') {
			$reIdList = explode ( ';', substr ( $paramsArray['listProductReturnId'], 0, - 1 ) );
			$reQtyList = explode ( ';', substr ( $paramsArray['listProductReturnQty'], 0, - 1 ) );
			$nbrLineReturn = sizeof($reIdList);
		}
		
		//10. old reserved
		$updateOldReservation = "update customer_reservation_histo set status ='Y',complete_date ='".$datetime."',
		complete_facture='".$export_facture_code."' where customer_id =".$customer_id;
		// 11. Reserved new 
		 $addNewReservation = "insert into customer_reservation_histo(customer_id,description,amount,status,date,reserved_facture) 
		 values (".$customer_id.",'".$paramsArray['customer_description']."',".$paramsArray['customer_reserve_more'].",'N', '".$datetime."','".$export_facture_code."')";
		$qryFund="" ;
		$qryInout="";
		$qrySpend="";
		
		 
		// insert db******************************************************/
		$qryExport_facture_product = substr($qryExport_facture_product, 0, -1);
		$flag = $flag && (mysql_query ( $qryExport_facture, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExport_facture_trace, $this->connection ) != null);
		if($nbrRowExportReal>0){
			$flag = $flag && (mysql_query ( $qryExport_facture_product, $this->connection ) != null);
		}
		if($paramsArray['customer_reserved'] > 0) {
			$flag = $flag && (mysql_query ( $updateOldReservation, $this->connection ) != null);
		}
		if($paramsArray['customer_reserve_more'] > 0) {
			$flag = $flag && (mysql_query ( $addNewReservation, $this->connection ) != null);
		}
		if($nbrLineReturn >0) {
			for ($i=0;$i<$nbrLineReturn;$i++) {
				$qryRe = "update export_facture_product set re_qty = ".$reQtyList[$i].",re_date='".$datetime."',re_description='".$paramsArray['customer_description']."' where id=".$reIdList[$i];
				$flag = $flag && (mysql_query ( $qryRe, $this->connection ) != null);
			}
		}
		// 12. byCard
		 if($paramsArray['byCard']=='true'){
		 	$qryFund="insert into  fund_change_histo(fund_id,amount,date,description,ratio,user_id) values (8,"
		 	.($paramsArray['customer_paid_amount']+$paramsArray['customer_reserve_more'])
		 	.",'".$datetime."',concat('Hóa đơn số ".$export_facture_code."',' ".$paramsArray['customer_name']." thanh toán thẻ ','".$paramsArray['customer_description']."'),1,".$userid.")" ;
		 	$flag = $flag && (mysql_query ( $qryFund, $this->connection ) != null);
		 	//echo $qryFund;
		 	$qryInout="insert into money_inout(shop_id,user_id,date,amount,description) values ("
		 	.$shopid.",".$userid.",'".$datetime."',".(0-$paramsArray['customer_paid_amount']-$paramsArray['customer_reserve_more'])."
		 	,concat('Hóa đơn số ".$export_facture_code."',' ".$paramsArray['customer_name']." thanh toán thẻ ','".$paramsArray['customer_description']."'))";
		 	$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		 }
		 
		 //13. isBoss
		if($paramsArray['isBoss']=='true'){
		 	$qrySpend="insert into spend(spend_category_id,amount,user_id,description,date,spend_for_id,spend_type_id) values (8
		 	,'".($paramsArray['customer_paid_amount']+$paramsArray['customer_reserve_more'])."'
		 	,'".$userid."',concat('Hóa đơn số ".$export_facture_code."',' ".$paramsArray['customer_name']." lấy ( ','".$paramsArray['customer_description'].")')"."
		 	,'".$datetime."','1','1')" ;
//		 	echo $qrySpend;
		 	$flag = $flag && (mysql_query ( $qrySpend, $this->connection ) != null);
		 	$qryInout="insert into money_inout(shop_id,user_id,date,amount,description) values ("
		 	.$shopid.",".$userid.",'".$datetime."',".(0-$paramsArray['customer_paid_amount']-$paramsArray['customer_reserve_more'])."
		 	,concat('Hóa đơn số ".$export_facture_code."',' ".$paramsArray['customer_name']." lấy ( ','".$paramsArray['customer_description'].")'))";
		 	$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		 }
		 
		$this->commitOrRollback($flag);
		echo "success";
	}
	function commitOrRollback($flag){
		if ($flag == false) {
			echo mysql_error($this->connection);
			mysql_query ( "ROLLBACK" );
			echo "error";
		} else {
			mysql_query ( "COMMIT" );
		}
	}
	function getCustomerId($paramsArray,$datetime){
		$cus_id = 1288;
		if($paramsArray['customer_tel'] == '') {
			return $cus_id;
		}
		if($paramsArray['customer_id'] != null) {
			return $paramsArray['customer_id'];
		} else { 
			$qry = "insert into customer(name,tel,date,created_date) values ('" . $paramsArray['customer_name'] 
			. "','".$paramsArray['customer_tel']."','"
			.$datetime."','".$datetime."')";
			
			if(mysql_query ( $qry, $this->connection ) != null){
				$cus_id = mysql_insert_id ();
				mysql_query ( "COMMIT" );
			} else {
				mysql_query ( "ROLLBACK" );
			}
			return $cus_id;
		}
	}
	function listDebtDefault() {
		$qry = "select *,(t.total-t.paid) as debt from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where (t.total-t.paid) > 0 order by date desc limit 100";
		$result = mysql_query ( $qry, $this->connection );
//		echo $qry;
		$array_total = array (
				3 => "Total",
				4 => "Paid",
				5 => "Debt"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerdebtdatatable, 6, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerdebtdatatable, $this->buildArrayDebtParameter() );
	}
	function listDebt($params) {
		$qry = "select *,(t.total-t.paid) as debt from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where (t.total-t.paid) > 0 ";
		
		if($params['search_date_from'] != ''){
			$qry = $qry." and date >= '".$params['search_date_from']."'";
		}
		if($params['search_date_to'] != ''){
			$qry = $qry." and date <= '".$params['search_date_to']."'";
		}
		
		$qry = $qry . "order by date desc";
//		echo $qry;
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
	function listReturnDefault() {
		session_start();
		$qry = "SELECT t1.re_date as date,if(datediff(now(),t1.re_date)=0,'Hôm nay',t1.re_date) as istoday ,
		t3.name,t3.tel,t1.product_code,t4.name as product,t1.quantity,t1.export_price,t2.code,t1.re_qty,t1.re_date
FROM `export_facture_product` t1,export_facture t2,customer t3,product t4
where t1.re_qty > 0
and t1.export_facture_code = t2.code
and t3.id = t2.customer_id
and t4.code = t1.product_code and datediff(now(),t1.re_date) <= ".$_SESSION['nbr_day_default_export_returned']." order by t1.re_date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (
				3 => "Total return",
				5 => "Quantity"
		);
		$this->commonService->generateJSDatatableComplex ( $result, customerreturndatatable, 8, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerreturndatatable, $this->buildArrayReturnParameter() );
	}
	function listReturn($params) {
		$qry = "SELECT t1.re_date as date,if(datediff(now(),t1.re_date)=0,'Hôm nay',t1.re_date) as istoday ,
		t3.name,t3.tel,t1.product_code,t4.name as product,t1.quantity,t1.export_price,t2.code,t1.re_qty,t1.re_date
		FROM `export_facture_product` t1,export_facture t2,customer t3,product t4
		where t1.re_qty > 0
		and t1.export_facture_code = t2.code
		and t3.id = t2.customer_id
		and t4.code = t1.product_code ";
		
		if($params['search_date_from'] != ''){
			$qry = $qry." and t1.re_date >= '".$params['search_date_from']."'";
		}
		if($params['search_date_to'] != ''){
			$qry = $qry." and t1.re_date <= '".$params['search_date_to']."'";
		}
		
		$qry = $qry . "order by t1.re_date desc";
//		echo $qry;
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
	function listReservationDefault() {
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
	function listOrderDefault() {
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
	function listOrder($params) {
		$qry = "SELECT t1.*, 
       			t2.NAME AS product_name, Datediff(Now(), t1.date) AS diff, t1.status AS order_status 
				FROM   customer_order t1 LEFT JOIN product t2 ON ( t1.product_code = t2.code )";
		
		if($params['search_date_from'] != ''){
			$qry = $qry." where t1.date >= '".$params['search_date_from']."'";
		} 
		if($params['search_date_to'] != '' && $params['search_date_from'] != ''){
			$qry = $qry." and t1.date <= '".$params['search_date_to']."'";
		} else if($params['search_date_to'] != '') {
			$qry = $qry." where t1.date <= '".$params['search_date_to']."'";
		}
		
		$qry = $qry . " ORDER  BY diff DESC, t1.status";
//		echo $qry;
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
		session_start();
		$qry = "SELECT t1.id,t1.product_code,t1.quantity,t1.export_price,t1.re_qty,t3.name as product_name,t6.name as username,
		t1.export_facture_code, t2.date,date_format(t2.date,'%H:%m:%s') as time,t4.name as customer,t4.tel as customer_tel,t5.name as shop
		 FROM `export_facture_product` t1, export_facture t2, product t3, customer t4, shop t5, user t6
		where t1.export_facture_code = t2.code
		and t1.product_code = t3.code
		and t2.user_id = t6.id
		and t4.id = t2.customer_id
		and t5.id = t2.shop_id
		and datediff(now(),t2.date) <= ".$_SESSION['listExportDefault_nbr_day_limit']." order by date desc";
		$result = mysql_query ( $qry, $this->connection );
//		echo $qry;
		$this->commonService->generateJSDatatableComplexExport ( $result, exportproductdatatable, 12, 'desc', $this->getExportListArrayTotal() );
		$this->commonService->generateJqueryDatatableExport ( $result, exportproductdatatable, $this->getExportListArrayColumn() );		
	}
	function listExport($params) {
		$qry = "SELECT t1.id,t1.product_code,t1.quantity,t1.export_price,t1.re_qty,t3.name as product_name,t6.name as username,
		t1.export_facture_code, t2.date,subStr(t2.date,12,8) as time,t4.name as customer,t4.tel as customer_tel,t5.name as shop
		 FROM `export_facture_product` t1, export_facture t2, product t3, customer t4, shop t5, user t6
		where t1.export_facture_code = t2.code
		and t1.product_code = t3.code
		and t2.user_id = t6.id
		and t4.id = t2.customer_id
		and t5.id = t2.shop_id ";
		
		if($params['search_price_from'] != ''){
			$qry = $qry." and t1.export_price >= '".$params['search_price_from']."'";
		}
		if($params['search_price_to'] != ''){
			$qry = $qry." and t1.export_price <= '".$params['search_price_to']."'";
		}
		if($params['search_date_from'] != ''){
			$qry = $qry." and t2.date >= '".$params['search_date_from']."'";
		}
		if($params['search_date_to'] != ''){
			$qry = $qry." and t2.date <= '".$params['search_date_to']."'";
		}
		if($params['search_customer_name'] != ''){
			$qry = $qry." and t4.name like '%".$params['search_customer_name']."%'";
		}
		if($params['search_customer_tel'] != ''){
			$qry = $qry." and t4.tel like '%".$params['search_customer_tel']."%'";
		}
		if($params['search_product_code'] != ''){
			$qry = $qry." and t3.code like '%".$params['search_product_code']."%'";
		}
		if($params['search_product_name'] != ''){
			$qry = $qry." and t3.name like '%".$params['search_product_name']."%'";
		}
		if($params['id_search_shop'] != ''){
			$qry = $qry." and t5.id = '".$params['id_search_shop']."'";
		}
		if($params['id_search_user'] != ''){
			$qry = $qry." and t6.id = '".$params['id_search_user']."'";
		}
//		echo $qry;
		if($_REQUEST['isAdminField'] != '1') {
			echo "<div style='text-align:center;background-color:pink;padding-bottom:5px;font-weight:bold;font-style:italic;'>".
			"(Bạn chỉ xem được các sản phầm đã bán từ tối đa ".$params['default_nbr_days_load_export']." ngày gần đây!)</div>";
			$qry = $qry." and datediff(now(),t2.date) < ". $params['default_nbr_days_load_export'];
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
		if($this->commonService->isAdmin()){
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
					"export_facture_code" => "MÃ_HÓA_ĐƠN",
					"shop" => "Shop&nbsp;&nbsp;",
					"date,username" => "Time,time",
					"id,deleteExportFacture,export_facture_code" => "Delete"
			);
		} else {
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
					"export_facture_code" => "MÃ_HÓA_ĐƠN",
					"shop" => "Shop&nbsp;&nbsp;",
					"date,username" => "Time,time"
			);
		}
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
			'default_nbr_days_load_export' 			=> $_REQUEST['default_nbr_days_load_export'],
			'id_search_user' 			=> $_REQUEST['id_search_user']
		);
	}
}
?>