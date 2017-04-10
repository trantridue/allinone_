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
		if(!isset($_SESSION)){  session_start(); }
		$isSaleAll = $_SESSION ['is_sale_for_all'];
		$saleAllTaux = $_SESSION ['sale_all_taux'];
		if ($isSaleAll == '1') {
			$qry = "select t1.*,t1.export_price * (100-" . $saleAllTaux . ")/100 as price,". $saleAllTaux." as sale ,";
		} else {
			$qry = "select t1.*,t1.export_price * (100-t1.sale)/100 as price,sale,";
		}
		$suf_qry = "(select ifnull(sum(quantity),0) from product_import where product_code = t1.code) as init_import,
					(select ifnull(sum(quantity),0) from product_return where product_code = t1.code) as return_provider,
					(select ifnull(sum(quantity),0) from export_facture_product where product_code = t1.code) as export_qty,
					(select ifnull(sum(re_qty),0) from export_facture_product where product_code = t1.code) as cus_return,
					(select name from brand where id = t1.brand_id) as brand,
					(SELECT t2.name FROM provider t2, import_facture t3, product_import t4
						where t1.code = t4.product_code
						and t4.import_facture_code = t3.code
						and t3.provider_id = t2.id limit 1) as provider,
					(select ifnull(sum(quantity),0) from product_deviation where product_code = t1.code) as deviation 
					from product t1		
					where t1.code like '%" . $term . "%' limit 10";
		$qry = $qry . $suf_qry;
		$result = mysql_query ( $qry, $this->connection );
		
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = "Code : " . $rows ['code'] . ",Name :" . $rows ['name'] . ", Trong kho :" . ($rows ['init_import'] - $rows ['return_provider'] - $rows ['export_qty'] + $rows ['cus_return'] + $rows ['deviation']).", CC: ".$rows ['provider'];
			$element = array (code => $rows ['code'], 
			name => $rows ['name'], 
			posted_price => $rows ['export_price'], 
			stock => ($rows ['init_import'] - $rows ['return_provider'] - $rows ['export_qty'] + $rows ['cus_return'] + $rows ['deviation']), 
			price => $rows ['price'], 
			sale => $rows ['sale'], 
			detail => "<div style='background-color:pink; min-width:500px;'><span style='color:red;'>" . $rows ['name'] . "</span><hr>" . $rows ['description'] . "<table><tr><td>" . "<ul><li>  Tổng nhập : " . $rows ['init_import'] . "</li>
			<li> Trả CC    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " . $rows ['return_provider'] . "</li>
			<li> Đã bán    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: " . $rows ['export_qty'] . "</li><li> Khách Trả &nbsp;: " . $rows ['cus_return'] . "</li><li> Sai số  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  : " . $rows ['deviation'] . "</li></ul></td><td><img style='max-width:280px; max-height=200px' src='" . $rows ['link'] . "'></td>
			<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kho &nbsp;&nbsp;  :" . ($rows ['init_import'] - $rows ['return_provider'] - $rows ['export_qty'] + $rows ['cus_return'] + $rows ['deviation']) . "
			</tr></table></div>", 
			detail_emp => "<div style='background-color:pink;max-width:500px;max-height:350px;font-size:12px;'>
			<span style='color:red;'>" . $rows ['name']. " - ".$rows ['brand']."(<strong>Kho: " . ($rows ['init_import'] - $rows ['return_provider'] - $rows ['export_qty'] + $rows ['cus_return'] + $rows ['deviation']). "</strong>)</span><hr>" . $rows ['description'] . "<table><tr><td><img style='max-width:300px; max-height=300px' src='" . $rows ['link'] . "'></td>
			<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ". "
			</tr></table></div>", value => $rows ['code'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function saveOrder($paramsArray) {
		if(!isset($_SESSION)){  session_start(); }
		mysql_query ( "BEGIN" );
		$qry = "insert into customer_order (customer_tel,customer_name,product_code,color,size,date,description,quantity) values ('" . $paramsArray ['customer_tel'] . "','" . $paramsArray ['customer_name'] . "','" . $paramsArray ['order_product_code'] . "','" . $paramsArray ['order_color'] . "','" . $paramsArray ['order_size'] . "','" . date ( 'Y-m-d H:i:s' ) . "','" . $paramsArray ['order_description'] . "'," . $paramsArray ['order_qty'] . ")";
		if (mysql_query ( $qry, $this->connection ) != null) {
			mysql_query ( "COMMIT" );
			echo 'success';
		} else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function deleteExportFacture($export_facture_code) {
		//		if(!isset($_SESSION)){  session_start(); }
		mysql_query ( "BEGIN" );
		$flag = true;
		$qrySpend = "delete from spend where description like '%" . $export_facture_code . "%'";
		$qryInout = "delete from money_inout where description like '%" . $export_facture_code . "%'";
		$qryFund = "delete from fund_change_histo where description like '%" . $export_facture_code . "%'";
		$qryExportFactureProduct = "delete from export_facture_product where export_facture_code = '" . $export_facture_code . "'";
		$qryExportFactureTrace = "delete from export_facture_trace where export_facture_code = '" . $export_facture_code . "'";
		$qryExportFacture = "delete from export_facture where code = '" . $export_facture_code . "'";
		$qryExportReserve1 = "delete from customer_reservation_histo where reserved_facture = '" . $export_facture_code . "'";
		$qryExportReserve2 = "update customer_reservation_histo set status = 'N', complete_facture='',complete_date=null where complete_facture = '" . $export_facture_code . "'";
		
		$flag = $flag && (mysql_query ( $qrySpend, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryFund, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportFactureProduct, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportFactureTrace, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportFacture, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportReserve1, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExportReserve2, $this->connection ) != null);
		
		$this->commitOrRollback ( $flag );
		echo "success";
	}
	function getNextFactureCodeBydate($maxFactureCode) {
		$str1 = substr ( $maxFactureCode, 0, 8 );
		$str2 = substr ( $maxFactureCode, 9, 3 );
		return $str1 . "_" . $this->commonService->displayTowDigit ( $str2 + 1 );
	}
	function getExportFactureCodeByDate($date) {
		$query = "select max(code) as maxexportfacturecode from export_facture where DATE_FORMAT(date,'%Y-%m-%d')='" . $date . "' limit 1";
		$result = mysql_query ( $query ) or die ( mysql_error () );
		$rows = mysql_fetch_array ( $result );
		if ($rows ['maxexportfacturecode']) {
			return $this->getNextFactureCodeBydate ( $rows ['maxexportfacturecode'] );
		} else if($date != $this->commonService->getCurrentDateYYYYMMDD ()){
			return substr($date,0,4).substr($date,5,2).substr($date,8,2)."_001";
		} else {
			return $this->commonService->getCurrentDateYYYYMMDD () . "_001";
		}
	}
	function getExportFactureCode() {
		$query = "select max(code) as maxexportfacturecode from export_facture limit 1";
		$result = mysql_query ( $query ) or die ( mysql_error () );
		$rows = mysql_fetch_array ( $result );
		if ($rows ['maxexportfacturecode']) {
			return $this->commonService->getNextFactureCode ( $rows ['maxexportfacturecode'] );
		} else
			return $this->commonService->getCurrentDateYYYYMMDD () . "_001";
	}
	function saveExport($paramsArray) {
		if(!isset($_SESSION)){  session_start(); }
		mysql_query ( "BEGIN" );
		$flag = true;
		// 1. Get export facture code
		$export_facture_code = $this->getExportFactureCode ();
		// 2. get current date time
		$datetime = $this->commonService->getFullDateTime ();
		if ($paramsArray ['export_date'] != '') {
			$export_facture_code = $this->getExportFactureCodeByDate ( $paramsArray ['export_date'] );
			$datetime = $paramsArray ['export_date'] . ' ' . date ( 'H:i:s' );
		}
		//3. Get shop id
		$shopid = $_SESSION ['id_of_shop'];
		if ($paramsArray ['id_export_shop'] != '') {
			$shopid = $paramsArray ['id_export_shop'];
		}
		//4. Get employee id
		$userid = $_SESSION ['id_of_user'];
		if ($paramsArray ['id_search_user'] != '') {
			$userid = $paramsArray ['id_search_user'];
		}
		//5. Get customer ID
		$customer_id = $this->getCustomerId ( $paramsArray, $datetime );
		
		if ($paramsArray ['useBonus'] == 'false') {
			$paramsArray ['customer_bonus'] = 0;
		}
		if ($paramsArray ['give_customer'] <= 0) {
			$paramsArray ['customer_paid_amount'] = $paramsArray ['customer_give'] + $paramsArray ['customer_bonus'] - $paramsArray ['customer_reserve_more'] + $paramsArray ['customer_reserved'];
		} else {
			$paramsArray ['customer_paid_amount'] = $paramsArray ['customer_give'] - $paramsArray ['give_customer'] - $paramsArray ['customer_reserve_more'] + $paramsArray ['customer_bonus'] + $paramsArray ['customer_reserved'];
		}
		$isonline = 'N';
		if ($paramsArray ['online'] == 'true') {
			$isonline = 'Y';
		}
		//6. Insert export_facture
		$qryExport_facture = "insert into export_facture(code,customer_id,shop_id,description,date,user_id,isonline) values ('" . $export_facture_code . "'," . $customer_id . "," . $shopid . ",'" . $paramsArray ['customer_description'] . "','" . $datetime . "'," . $userid . ",'".$isonline."')";
		
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
		) values ('" . $export_facture_code . "'
		,'" . $paramsArray ['total_facture'] . "'
		,'" . $paramsArray ['customer_debt'] . "'
		,'" . $paramsArray ['customer_reserved'] . "'
		,'" . $paramsArray ['customer_reserve_more'] . "'
		,'" . $paramsArray ['customer_give'] . "'
		,'" . $paramsArray ['give_customer'] . "'
		,'" . $paramsArray ['customer_bonus'] . "'
		,'" . $paramsArray ['customer_returned'] . "'
		,'" . $shopid . "'
		,'" . $paramsArray ['customer_paid_amount'] . "'
		,'" . $customer_id . "'
		,'" . $_SESSION ['bonus_ratio'] . "')";
		
		//8. Export_facture_product
		$qryExport_facture_product = "insert into export_facture_product (product_code,quantity,export_price,export_facture_code) values ";
		$nbrRowExportReal = 0;
		for($i = 1; $i <= $paramsArray ['export_number_row']; $i ++) {
			if ($paramsArray ['productcode_' . $i] != '') {
				$nbrRowExportReal ++;
				$qryExport_facture_product = $qryExport_facture_product . "('" . $paramsArray ['productcode_' . $i] . "'
				," . $paramsArray ['quantity_' . $i] . "
				," . $paramsArray ['exportprice_' . $i] . "
				,'" . $export_facture_code . "'),";
			}
		}
		//9. Process return
		//echo $paramsArray['listProductReturnId'];
		$nbrLineReturn = 0;
		$reIdList = array ();
		$reQtyList = array ();
		if ($paramsArray ['listProductReturnId'] != '') {
			$reIdList = explode ( ';', substr ( $paramsArray ['listProductReturnId'], 0, - 1 ) );
			$reQtyList = explode ( ';', substr ( $paramsArray ['listProductReturnQty'], 0, - 1 ) );
			$nbrLineReturn = sizeof ( $reIdList );
		}
		
		//10. old reserved
		$updateOldReservation = "update customer_reservation_histo set status ='Y',complete_date ='" . $datetime . "',
		complete_facture='" . $export_facture_code . "' where customer_id =" . $customer_id;
		// 11. Reserved new 
		$addNewReservation = "insert into customer_reservation_histo(customer_id,description,amount,status,date,reserved_facture) 
		 values (" . $customer_id . ",'" . $paramsArray ['customer_description'] . "'," . $paramsArray ['customer_reserve_more'] . ",'N', '" . $datetime . "','" . $export_facture_code . "')";
		$qryFund = "";
		$qryInout = "";
		$qrySpend = "";
		
		// insert db******************************************************/
		$qryExport_facture_product = substr ( $qryExport_facture_product, 0, - 1 );
		$flag = $flag && (mysql_query ( $qryExport_facture, $this->connection ) != null);
		$flag = $flag && (mysql_query ( $qryExport_facture_trace, $this->connection ) != null);
		if ($nbrRowExportReal > 0) {
			$flag = $flag && (mysql_query ( $qryExport_facture_product, $this->connection ) != null);
		}
		if ($paramsArray ['customer_reserved'] > 0) {
			$flag = $flag && (mysql_query ( $updateOldReservation, $this->connection ) != null);
		}
		if ($paramsArray ['customer_reserve_more'] > 0) {
			$flag = $flag && (mysql_query ( $addNewReservation, $this->connection ) != null);
		}
		$lisIdReturnSql = "(";
		if ($nbrLineReturn > 0) {
			for($i = 0; $i < $nbrLineReturn; $i ++) {
				$qryRe = "update export_facture_product set re_qty = " . $reQtyList [$i] . ",re_date='" . $datetime . "',re_description='" . $paramsArray ['customer_description'] . "' where id=" . $reIdList [$i];
				$flag = $flag && (mysql_query ( $qryRe, $this->connection ) != null);
				$lisIdReturnSql = $lisIdReturnSql . $reIdList [$i] . ",";
			}
		}
		$lisIdReturnSql = substr ( $lisIdReturnSql, 0, - 1 ) . ")";
		
		if ($nbrLineReturn > 0) {
			if ($paramsArray ['customer_tel_guess'] == 'aaaaaaaaa' && $paramsArray ['customer_tel'] != '') {
				$qryUpdateCustomerReturn = "update export_facture_trace set customer_id = " . $customer_id . " where export_facture_code in 
				(select export_facture_code from export_facture_product where id in " . $lisIdReturnSql.") ";
				
				$qryupdateexportfacture = "update export_facture set customer_id = " . $customer_id . " where code in 
				(select export_facture_code from export_facture_product where id in " . $lisIdReturnSql.") ";
				
				$flag = $flag && (mysql_query ( $qryUpdateCustomerReturn, $this->connection ) != null);
				$flag = $flag && (mysql_query ( $qryupdateexportfacture, $this->connection ) != null);
			}
		}
		// 12. byCard
		if ($paramsArray ['byCard'] == 'true') {
			$qryFund = "insert into  fund_change_histo(fund_id,amount,date,description,ratio,user_id) values (8," . ($paramsArray ['customer_paid_amount'] + $paramsArray ['customer_reserve_more']) . ",'" . $datetime . "',concat('Hóa đơn số " . $export_facture_code . " | ',' " . $paramsArray ['customer_name'] . " | thanh toán thẻ ',' | " . $paramsArray ['customer_description'] . "'),1," . $userid . ")";
			$flag = $flag && (mysql_query ( $qryFund, $this->connection ) != null);
			//echo $qryFund;
			$qryInout = "insert into money_inout(shop_id,user_id,date,amount,description) values (" . $shopid . "," . $userid . ",'" . $datetime . "'," . (0 - $paramsArray ['customer_paid_amount'] - $paramsArray ['customer_reserve_more']) . "
		 	,concat('Hóa đơn số " . $export_facture_code . "| ',' " . $paramsArray ['customer_name'] . " | thanh toán thẻ ',' | " . $paramsArray ['customer_description'] . "'))";
			$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		}
		// 12.1 online
		if ($paramsArray ['online'] == 'true') {
			$qryFund = "insert into  fund_change_histo(fund_id,amount,date,description,ratio,user_id) values (".$paramsArray ['id_onlinefund']."," . ($paramsArray ['customer_paid_amount'] + $paramsArray ['customer_reserve_more']) 
			. ",'" . $datetime . "',concat('Hóa đơn số " . $export_facture_code . " | ',' " . $paramsArray ['customer_name'] . " | online | ".$paramsArray ['id_onlinefund']." ',' | " . $paramsArray ['customer_description'] . "'),1," . $userid . ")";
			$flag = $flag && (mysql_query ( $qryFund, $this->connection ) != null);
			//echo $qryFund;
			$qryInout = "insert into money_inout(shop_id,user_id,date,amount,description) values (" . $shopid . "," . $userid . ",'" . $datetime . "'," . (0 - $paramsArray ['customer_paid_amount'] - $paramsArray ['customer_reserve_more']) . "
		 	,concat('Hóa đơn số " . $export_facture_code . " | ',' " . $paramsArray ['customer_name'] . " | online | ".$paramsArray ['id_onlinefund_txt']."',' | " . $paramsArray ['customer_description'] . "'))";
			$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		}
		//13. isBoss
		if ($paramsArray ['isBoss'] == 'true') {
			$qrySpend = "insert into spend(spend_category_id,amount,user_id,description,date,spend_for_id,spend_type_id) values (8
		 	,'" . ($paramsArray ['customer_paid_amount'] + $paramsArray ['customer_reserve_more']) . "'
		 	,'" . $userid . "',concat('Hóa đơn số " . $export_facture_code . "',' " . $paramsArray ['customer_name'] . " lấy ( ','" . $paramsArray ['customer_description'] . ")')" . "
		 	,'" . $datetime . "','1','1')";
			//		 	echo $qrySpend;
			$flag = $flag && (mysql_query ( $qrySpend, $this->connection ) != null);
			$qryInout = "insert into money_inout(shop_id,user_id,date,amount,description) values (" . $shopid . "," . $userid . ",'" . $datetime . "'," . (0 - $paramsArray ['customer_paid_amount'] - $paramsArray ['customer_reserve_more']) . "
		 	,concat('Hóa đơn số " . $export_facture_code . "',' " . $paramsArray ['customer_name'] . " lấy ( ','" . $paramsArray ['customer_description'] . ")'))";
			$flag = $flag && (mysql_query ( $qryInout, $this->connection ) != null);
		}
		
		$this->commitOrRollback ( $flag );
		//echo "?shop=shop".$shopid;
		echo json_encode($paramsArray);
	}
	function commitOrRollback($flag) {
		if ($flag == false) {
			echo mysql_error ( $this->connection );
			mysql_query ( "ROLLBACK" );
			echo "error";
			return;
		} else {
			mysql_query ( "COMMIT" );
		}
	}
	function getCustomerId($paramsArray, $datetime) {
		$cus_id = 1288;
		if ($paramsArray ['customer_tel'] == '') {
			return $cus_id;
		} else if ($paramsArray ['customer_id'] != null) {
			$qry = "update customer set date = '" . $datetime . "', name='" . $paramsArray ['customer_name'] . "',
			description='" . $paramsArray ['customer_description'] . "' where id = " . $paramsArray ['customer_id'];
			mysql_query ( $qry, $this->connection );
			return $paramsArray ['customer_id'];
		} else {
			$qry = "insert into customer(name,tel,date,created_date) values ('" . $paramsArray ['customer_name'] . "','" . $paramsArray ['customer_tel'] . "','" . $datetime . "','" . $datetime . "')";
			if (mysql_query ( $qry, $this->connection ) != null) {
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
				       (SELECT t5.description
		                FROM   export_facture t5
		                WHERE  t5.code = (SELECT Max(export_facture_code)
		                                  FROM   export_facture_trace
		                                  WHERE  customer_id = t1.id) limit 1) AS
		               description,
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
		$array_total = array (3 => "Total", 4 => "Paid", 5 => "Debt" );
		$this->commonService->generateJSDatatableComplex ( $result, customerdebtdatatable, 6, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerdebtdatatable, $this->buildArrayDebtParameter () );
	}
	function listDebt($params) {
		$qry = "select *,(t.total-t.paid) as debt from (SELECT
				       t1.id,
				       t1.tel,
				       t1.name,
				       (SELECT t5.description
		                FROM   export_facture t5
		                WHERE  t5.code = (SELECT Max(export_facture_code)
		                                  FROM   export_facture_trace
		                                  WHERE  customer_id = t1.id) limit 1) AS
		               description,
				       (select max(t4.date) from export_facture t4 where t4.customer_id = t1.id) as date,
				       sum((t3.quantity-t3.re_qty)*t3.export_price) as total,
				       (select sum(amount) from export_facture_trace t4 where t4.customer_id = t1.id) AS paid
				FROM   customer t1,
				       export_facture t2,
				       export_facture_product t3
				WHERE  t1.id = t2.customer_id
				       AND t2.code = t3.export_facture_code
				       and t1.tel not like '%aaaaaaa%' group by t1.id) t where (t.total-t.paid) > 0 ";
		
		if ($params ['search_date_from'] != '') {
			$qry = $qry . " and date >= '" . $params ['search_date_from'] . "'";
		}
		if ($params ['search_date_to'] != '') {
			$qry = $qry . " and date <= '" . $params ['search_date_to'] . "'";
		}
		
		$qry = $qry . "order by date desc";
		//		echo $qry;
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (3 => "Total", 4 => "Paid", 5 => "Debt" );
		$this->commonService->generateJSDatatableComplex ( $result, customerdebtdatatable, 6, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerdebtdatatable, $this->buildArrayDebtParameter () );
	}
	function buildArrayDebtParameter() {
		return array ("counter_colum" => "No", "name,tel" => "Khách Hàng,name", "description" => "Ghi chú", "total" => "Tổng hàng", "paid" => "Đã Thanh Toán", "debt" => "Còn nợ", "date" => "Ngày mua gần nhất" )

		;
	}
	function listReturnDefault() {
		if(!isset($_SESSION)){  session_start(); }
		$qry = "SELECT t1.re_date as date,if(datediff(now(),t1.re_date)=0,'Hôm nay',t1.re_date) as istoday ,t4.link,
		t3.name,t3.tel,t1.product_code,t4.name as product,t1.quantity,t1.export_price,t2.code,t1.re_qty,t5.name as shop,
		t1.re_date, t2.date as buydate, date_format(t2.date,'%Y-%m-%d') as buydatedis,t2.code as export_facture_code
		FROM `export_facture_product` t1,export_facture t2,customer t3,product t4, shop t5
		where t1.re_qty > 0
		and t1.export_facture_code = t2.code
		and t3.id = t2.customer_id
		and t5.id = t2.shop_id
		and t4.code = t1.product_code and datediff(now(),t1.re_date) <= " . $_SESSION ['nbr_day_default_export_returned'] . " order by t1.re_date desc";
		$this->processListReturn($qry);
	}
	function listReturn($params) {
		$qry = "SELECT t1.re_date as date,if(datediff(now(),t1.re_date)=0,'Hôm nay',t1.re_date) as istoday ,t4.link,
		t3.name,t3.tel,t1.product_code,t4.name as product,t1.quantity,t1.export_price,t2.code,t1.re_qty,
		t2.code as export_facture_code, t5.name as shop,
		t1.re_date, t2.date as buydate, date_format(t2.date,'%Y-%m-%d') as buydatedis
		FROM `export_facture_product` t1,export_facture t2,customer t3,product t4, shop t5
		where t1.re_qty > 0
		and t1.export_facture_code = t2.code
		and t5.id = t2.shop_id
		and t3.id = t2.customer_id
		and t4.code = t1.product_code ";
		
		if ($params ['search_date_from'] != '') {
			$qry = $qry . " and t1.re_date >= '" . $params ['search_date_from'] . "'";
		}
		if ($params ['search_date_to'] != '') {
			$qry = $qry . " and t1.re_date <= '" . $params ['search_date_to'] . "'";
		}
		if ($params ['search_product_code'] != '') {
			$qry = $qry . " and t1.product_code like '%" . $params ['search_product_code'] . "%'";
		}
		if ($params ['id_search_shop'] != '') {
			$qry = $qry . " and t5.id =" . $params ['id_search_shop'];
		}
		if ($params ['id_search_user'] != '') {
			$qry = $qry . " and t2.user_id =" . $params ['id_search_user'];
		}
		
		$qry = $qry . " order by t1.re_date desc";
		//		echo $qry;
		$this->processListReturn($qry);
	}
	function processListReturn($qry) {
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (2 => "Total return", 5 => "Quantity", 6 => "Return" );
		$this->commonService->generateJSDatatableComplex ( $result, customerreturndatatable, 8, 'desc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerreturndatatable, $this->buildArrayReturnParameter () );
	}
	function buildArrayReturnParameter() {
		return array (
		"counter_colum" => "No"
		,"tel" => "Khách Hàng,name"
		, "re_qty*export_price" => "complex"
		, "export_facture_code" => "Code,product_code,link"
		, "product" => "Sản phẩm"
		, "quantity" => "Đã mua"
		, "re_qty" => "Trả lại"
		, "export_price" => "Giá bán"
		, "shop" => "shop"
		, "buydate,export_facture_code" => "Ngày mua,buydatedis"
		, "date" => "Ngày trả,istoday" );
	}
	function listReservationDefault() {
		$qry = "SELECT ef.shop_id as dat_o_shop,ef1.shop_id as tra_o_shop, ef.code as facture_reserved,ef1.code as facture_complete,
		t1.*,t1.status as reservation_status,t2.name,t2.tel FROM `customer_reservation_histo` t1 
		left join customer t2 on (t2.id = t1.customer_id) left join export_facture ef on ef.code = t1.reserved_facture
			left join export_facture ef1 on ef1.code = t1.complete_facture order by status asc, t1.date desc";
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (2 => "Total" );
		$this->commonService->generateJSDatatableComplex ( $result, customerreservationdatatable, 5, 'asc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerreservationdatatable, $this->buildArrayReservationParameter () );
	}
	function buildArrayReservationParameter() {
		return array ("counter_colum" => "No", "name,tel,dat_o_shop,tra_o_shop,facture_reserved,facture_complete" => "Khách Hàng,name", "amount" => "Tổng", "date" => "Ngày đặt", "description,complete_date" => "Desc,description", "reservation_status" => "Trạng thái" );
	}
	function listOrderDefault() {
		$qry = "SELECT t1.*,REPLACE(t1.description,'\'','') as new_description,t2.name as product_name,datediff(now(),t1.date) as diff,
		t1.status as order_status 
		from customer_order t1 left join product t2 on (t1.product_code = t2.code) order by diff desc ,t1.status";
		$this->processlistOrder ( $qry );
	}
	function listOrder($params) {
		$qry = "SELECT t1.*,REPLACE(t1.description,'\'','') as new_description,
       			t2.NAME AS product_name, Datediff(Now(), t1.date) AS diff, t1.status AS order_status 
				FROM   customer_order t1 LEFT JOIN product t2 ON ( t1.product_code = t2.code )";
		
		if ($params ['search_date_from'] != '') {
			$qry = $qry . " where t1.date >= '" . $params ['search_date_from'] . "'";
		}
		if ($params ['search_date_to'] != '' && $params ['search_date_from'] != '') {
			$qry = $qry . " and t1.date <= '" . $params ['search_date_to'] . "'";
		} else if ($params ['search_date_to'] != '') {
			$qry = $qry . " where t1.date <= '" . $params ['search_date_to'] . "'";
		}
		
		$qry = $qry . " ORDER  BY diff DESC, t1.status";
		$this->processlistOrder ( $qry );
	}
	function processlistOrder($qry) {
		$result = mysql_query ( $qry, $this->connection );
		$array_total = array (2 => "Quantity" );
		
		$this->commonService->generateJSDatatableComplex ( $result, customerorderdatatable, 6, 'asc', $array_total );
		$this->commonService->generateJqueryDatatable ( $result, customerorderdatatable, $this->getArrayColummOrder () );
	}
	function getArrayColummOrder() {
		$array_column1 = array ("id,customer_name,customer_tel,date,status,new_description" => "Name,customer_name", 
		"product_code" => "Pro. Name,product_name", 
		"quantity" => "SL", "size" => "Size", 
		"color" => "Màu", 
		"diff,date" => "Days,diff", 
		"order_status" => "Status" );
		return $array_column1;
	}
	function updateOrderStatus($id, $status) {
		if ($status == 'Y') {
			$status = 'N';
		} else {
			$status = 'Y';
		}
		if(!isset($_SESSION)){  session_start(); }
		mysql_query ( "BEGIN" );
		$qry = "update customer_order set status = '" . $status . "' where id =" . $id;
		if (mysql_query ( $qry, $this->connection ) != null) {
			mysql_query ( "COMMIT" );
			echo 'success';
		} else {
			mysql_query ( "ROLLBACK" );
			echo 'error';
		}
	}
	function listExportDefault() {
		if(!isset($_SESSION)){  session_start(); }
		$isAdminField = 'default';
		$qry = "SELECT t1.id,t1.product_code,t1.quantity,t1.export_price,t1.re_qty,t3.description,t2.description as facdesc,
		(select sum(quantity*export_price) from export_facture_product where export_facture_code = t1.export_facture_code) as total_facture,
    (select sum(tt.quantity*(select export_price from product where code = tt.product_code)) from export_facture_product tt where tt.export_facture_code = t1.export_facture_code) as total_facture_origine,
		format((1-t1.export_price/t3.export_price)*100,2) as salepercent,t2.customer_id, if((t1.quantity-t1.re_qty) >0,'','disabled') as checkbox,
		((select ifnull(sum(quantity),0) from product_import where product_code = t3.code) - 
(select ifnull(sum(quantity),0) from product_return where product_code = t3.code) -
(select ifnull(sum(quantity),0) from export_facture_product where product_code = t3.code) +
(select ifnull(sum(re_qty),0) from export_facture_product where product_code = t3.code) +
(select ifnull(sum(quantity),0) from product_deviation where product_code = t3.code)) as stock,
		t3.link,t3.name as product_name,t6.name as username,t3.export_price as price_origine,
		t1.export_facture_code, t2.date,date_format(t2.date,'%H:%i:%s') as time,t4.name as customer,t4.tel as customer_tel,t5.name as shop
		 FROM `export_facture_product` t1, export_facture t2, product t3, customer t4, shop t5, user t6
		where t1.export_facture_code = t2.code
		and t1.product_code = t3.code
		and t2.user_id = t6.id
		and t4.id = t2.customer_id
		and t5.id = t2.shop_id
		and datediff(now(),t2.date) <= " . $_SESSION ['listExportDefault_nbr_day_limit'] . " order by date desc";
				//echo $qry;
		$this->processExportQuery ( $qry , $isAdminField);
	}
	function processExportQuery($qry, $isAdminField) {
		$result = mysql_query ( $qry, $this->connection );
		$resulttmp = mysql_query ( $qry, $this->connection );
		$this->commonService->generateJSDatatableComplexExport ( $result, exportproductdatatable, 15, 'desc', $this->getExportListArrayTotal () );
		$this->commonService->generateJqueryDatatableExport ( $result, exportproductdatatable, $this->getExportListArrayColumn ( $isAdminField ) );
	}
	function listExport($params) {
		$isAdminField = $params ['isAdminField'];
		$qry = "SELECT t1.id,t1.product_code,t1.quantity,t1.export_price,t1.re_qty,t3.description,t2.description as facdesc,
		(select sum(quantity*export_price) from export_facture_product where export_facture_code = t1.export_facture_code) as total_facture,
    (select sum(tt.quantity*(select export_price from product where code = tt.product_code)) from export_facture_product tt where tt.export_facture_code = t1.export_facture_code) as total_facture_origine,
		format((1-t1.export_price/t3.export_price)*100,2) as salepercent,t2.customer_id, if((t1.quantity-t1.re_qty) >0,'','disabled') as checkbox,
		((select ifnull(sum(quantity),0) from product_import where product_code = t3.code) - 
(select ifnull(sum(quantity),0) from product_return where product_code = t3.code) -
(select ifnull(sum(quantity),0) from export_facture_product where product_code = t3.code) +
(select ifnull(sum(re_qty),0) from export_facture_product where product_code = t3.code) +
(select ifnull(sum(quantity),0) from product_deviation where product_code = t3.code)) as stock,
		t3.link,t3.name as product_name,t6.name as username,t3.export_price as price_origine,
		t1.export_facture_code, t2.date,date_format(t2.date,'%H:%i:%s') as time,t4.name as customer,t4.tel as customer_tel,t5.name as shop
		 FROM `export_facture_product` t1, export_facture t2, product t3, customer t4, shop t5, user t6
		where t1.export_facture_code = t2.code
		and t1.product_code = t3.code
		and t2.user_id = t6.id
		and t4.id = t2.customer_id
		and t5.id = t2.shop_id ";
//		echo $params ['search_online'];
		if ($params ['search_price_from'] != '') {
			$qry = $qry . " and t1.export_price >= " . $params ['search_price_from'];
		}
		if ($params ['search_price_to'] != '') {
			$qry = $qry . " and t1.export_price <= " . $params ['search_price_to'];
		}
		if ($params ['search_sale_from'] != '') {
			$qry = $qry . " and ( 1 - t1.export_price / t3.export_price ) * 100 >= " . $params ['search_sale_from'];
		}
		if ($params ['search_sale_to'] != '') {
			$qry = $qry . " and ( 1 - t1.export_price / t3.export_price ) * 100 <= " . $params ['search_sale_to'];
		}
		if ($params ['search_date_from'] != '') {
			$qry = $qry . " and t2.date >= '" . $params ['search_date_from'] . "'";
		}
		if ($params ['search_date_to'] != '') {
			$qry = $qry . " and t2.date <= '" . $params ['search_date_to'] . "'";
		}
		if ($params ['search_customer_name'] != '') {
			$qry = $qry . " and t4.name like '%" . $params ['search_customer_name'] . "%'";
		}
		if ($params ['search_facture_description'] != '') {
			$qry = $qry . " and t2.description like '%" . $params ['search_facture_description'] . "%'";
		}
		if ($params ['search_online'] == 'true') {
			$qry = $qry . " and t2.isonline = 'Y'";
		}
		if ($params ['search_customer_tel'] != '') {
			$qry = $qry . " and t4.tel like '%" . $params ['search_customer_tel'] . "%'";
		}
		if ($params ['search_product_code'] != '') {
			$qry = $qry . " and t3.code like '%" . $params ['search_product_code'] . "%'";
		}
		if ($params ['search_product_name'] != '') {
			$qry = $qry . " and t3.name like '%" . $params ['search_product_name'] . "%'";
		}
		if ($params ['id_search_shop'] != '') {
			$qry = $qry . " and t5.id = '" . $params ['id_search_shop'] . "'";
		}
		if ($params ['id_search_user'] != '') {
			$qry = $qry . " and t6.id = '" . $params ['id_search_user'] . "'";
		}
		if ($params ['isAdminField'] != '1') {
			echo "<div style='text-align:center;background-color:pink;padding-bottom:5px;font-weight:bold;font-style:italic;'>" . "(Bạn chỉ xem được các sản phầm đã bán từ tối đa " . $params ['default_nbr_days_load_export'] . " ngày gần đây!)</div>";
			$qry = $qry . " and datediff(now(),t2.date) < " . $params ['default_nbr_days_load_export'];
		}
		$qry = $qry . "  order by date desc";
		$this->processExportQuery ( $qry, $isAdminField );
	}
	function getExportListArrayTotal() {
		return $array_total = array (5 => "Q", 6 => "RE", 8 => "T", 9 => "TRE" );
	}
function getExportListArrayColumn($isAdminField) {
	$exportArray =  array (
		"checkbox" => "RE", 
		"qtyre" => "&nbsp;&nbsp;", 
		"product_code" => "Code,product_code,link,stock", 
		"product_name" => "Tên hàng", 
		"customer,customer_tel,customer_id" => "Khách,customer", 
		"quantity" => "SL&nbsp;&nbsp;", 
		"re_qty" => "RQ&nbsp;&nbsp;", 
		"export_price,price_origine,salepercent" => "PRI&nbsp;&nbsp;&nbsp;&nbsp;,export_price", 
		"export_price*quantity" => "complex", 
		"export_price*re_qty" => "complex", 
		"total_facture,total_facture_origine,salepercent,facdesc" => "MÃ_HÓA_ĐƠN,export_facture_code", 
		 "customer_id" => "hidden_label", 
		 "customer" => "hidden_label", 
		 "customer_tel" => "hidden_label" );
	if (($isAdminField == 'default' && $this->commonService->isAdmin ()) || $isAdminField == '1') {
		$exportArray["shop,export_facture_code"] = "Shop&nbsp;&nbsp;,shop";
		$exportArray["date,username"] = "Time,time";
		$exportArray["id,deleteExportFacture,export_facture_code"] = "Delete";
	} else {
		$exportArray["shop"] = "Shop&nbsp;&nbsp;";
		$exportArray["date,username"] = "Time,time";
	}
	
	return $exportArray;
}
	function showAllCashToday() {
		$date = date ( 'Y-m-d' );
		echo "CASH 1:<span style='background-color:yellow;'> " . $this->getCashByShop ( 1, $date, $date );
		echo tab4 . "</span>CASH 2:<span style='background-color:pink;'> " . $this->getCashByShop ( 2, $date, $date );
		echo tab4 . "</span>CASH 3: <span style='background-color:violet;'>" . $this->getCashByShop ( 3, $date, $date ) . "</span>";
	}
	function getCashByShop($shop_id, $start_date, $end_date) {
		if(!isset($_SESSION)){  session_start(); }
		$cash = 0;
		
		$qryFacture = "select sum(if((give_customer>0),(customer_give - give_customer),customer_give)) as amount
		from export_facture_trace where shop_id = " . $shop_id . " and export_facture_code in (select code from export_facture where date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "')";
		
		$qryInout = "select sum(amount) as amount from money_inout where shop_id = " . $shop_id . " and date_format(date,'%Y-%m-%d') between '" . $start_date . "' and '" . $end_date . "'";
		$cash = $_SESSION ['init_money'] + $this->commonService->getAmountResult ( $qryFacture ) + $this->commonService->getAmountResult ( $qryInout );
		return number_format ( $cash, 0, '.', ',' );
	}
	function updateProductLink($product_code, $link) {
		$datetime = date ( 'Y-m-d H:i:s' );
		mysql_query ( "BEGIN" );
		if ($link == '' || $link == 'undefined') {
			echo 'error';
		} else {
			$qry = "update product set description = concat('" . $datetime . " | ','" . $link . "','<br>',ifnull(description,'')) where code ='" . $product_code . "'";
			if (mysql_query ( $qry, $this->connection ) != null) {
				mysql_query ( "COMMIT" );
				echo 'success';
			} else {
				mysql_query ( "ROLLBACK" );
				echo 'error';
			}
		}
	}
	function changshop($export_facture_code, $shopid) {
		mysql_query ( "BEGIN" );
		if ($shopid == '' || $shopid == 'undefined') {
			echo 'error';
		} else {
			$qry = "update export_facture set shop_id = " . $shopid . " where code ='" . $export_facture_code . "'";
			$qry1 = "update export_facture_trace set shop_id = " . $shopid . " where export_facture_code ='" . $export_facture_code . "'";
			if (mysql_query ( $qry, $this->connection ) != null && mysql_query ( $qry1, $this->connection ) != null) {
				mysql_query ( "COMMIT" );
				echo 'success';
			} else {
				mysql_query ( "ROLLBACK" );
				echo 'error';
			}
		}
	}
}
?>