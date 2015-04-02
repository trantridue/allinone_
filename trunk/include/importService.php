<?php
class ImportService {
	var $host;
	var $username;
	var $pwd;
	var $database;
	var $connection;
	var $commonService;
	// -----Initialization -------
	function ImportService($hostname, $username, $password, $database, $commonService) {
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
	function listProductDefault() {
		$dateBefore3Months = $this->commonService->getDateBefore3Months ();
		
		$qry = "SELECT t4.name as provider_name, t5.name as brand_name,t6.name as category_name, t7.name as season_name,
				 t1.*,t2.*,t3.code as facture_code,t3.date,t3.description as descript, t3.provider_id
				  FROM product_import t1,product t2,import_facture t3,provider t4, brand t5, category t6, season t7 where t1.product_code = t2.code 
				and t1.import_facture_code = t3.code and t4.id = t3.provider_id and t5.id = t2.brand_id and t6.id = t2.category_id and t7.id = t2.season_id 
				and t3.date >= '" . $dateBefore3Months . "'";
		$this->processImportQuery($qry);
	}
	
	function listProduct($parameterArray) {
		$qry = "SELECT t4.name as provider_name, t5.name as brand_name,t6.name as category_name, t7.name as season_name,
				 t1.*,t2.*,t3.code as facture_code,t3.date,t3.description as descript, t3.provider_id FROM 
				 product_import t1,
				 product t2,
				 import_facture t3,
				 provider t4, 
				 brand t5, 
				 category t6, 
				 season t7 
				 where t1.product_code = t2.code 
				 and t1.import_facture_code = t3.code and t4.id = t3.provider_id 
				 and t5.id = t2.brand_id and t6.id = t2.category_id and t7.id = t2.season_id ";
		
			if ($parameterArray ['product_name'] != '')
				$qry = $qry . " and t2.name like '%" . $parameterArray ['product_name'] . "%'";
		
			if ($parameterArray ['category_name'] != '')
				$qry = $qry . " and t6.name like '%" . $parameterArray ['category_name'] . "%'";
		
			if ($parameterArray ['provider_name'] != '')
				$qry = $qry . " and t4.name like '%" . $parameterArray ['provider_name'] . "%'";
		
			if ($parameterArray ['season_id'] != '')
				$qry = $qry . " and t7.id like '%" . $parameterArray ['season_id'] . "%'";
				
			if ($parameterArray ['brand_name'] != '')
				$qry = $qry . " and t5.name like '%" . $parameterArray ['brand_name'] . "%'";
				
			if ($parameterArray ['description'] != '')
				$qry = $qry . " and (t3.description like '%" . $parameterArray ['description'] . "%' or t2.description like '%" . $parameterArray ['description'] . "%') ";
		
			if ($parameterArray ['import_facture_code'] != '')
				$qry = $qry . " and t3.code like '%" . $parameterArray ['import_facture_code'] . "%'";
		
			if ($parameterArray ['datefrom'] != '')
				$qry = $qry . " and DATE_FORMAT(t3.date, '%Y-%m-%d') >= '" . $parameterArray ['datefrom'] . "'";
				
			if ($parameterArray ['dateto'] != '')
				$qry = $qry . " and DATE_FORMAT(t3.date, '%Y-%m-%d') <= '" . $parameterArray ['dateto'] . "'";
				
			if ($parameterArray ['sex_value_search'] != '')
				$qry = $qry . " and t2.sex_id = " . $parameterArray ['sex_value_search'];
				
				
		if ($parameterArray ['isadvancedsearch'] == 'true') {
			
			if ($parameterArray ['product_code_to'] != '')
				$qry = $qry . " and t1.product_code <= '" . $parameterArray ['product_code_to'] . "'";
			if ($parameterArray ['product_code'] != '')
				$qry = $qry . " and t1.product_code >= '" . $parameterArray ['product_code'] . "'";
			
			if ($parameterArray ['sale_to'] != '')
				$qry = $qry . " and t2.sale <= " . $parameterArray ['sale_to'];
			if ($parameterArray ['sale'] != '')
				$qry = $qry . " and t2.sale >= " . $parameterArray ['sale'];
				
			if ($parameterArray ['import_price_to'] != '')
				$qry = $qry . " and t1.import_price <= " . $parameterArray ['import_price_to'];
			if ($parameterArray ['import_price'] != '')
				$qry = $qry . " and t1.import_price >= " . $parameterArray ['import_price'] ;
			
			if ($parameterArray ['export_price_to'] != '')
				$qry = $qry . " and t2.export_price <= " . $parameterArray ['export_price_to'];
			if ($parameterArray ['export_price'] != '')
				$qry = $qry . " and t2.export_price >= " . $parameterArray ['export_price'] ;
				
			if ($parameterArray ['import_quantity_to'] != '')
				$qry = $qry . " and (select sum(quantity) from product_import where product_code = t2.code group by product_code) <= " . $parameterArray ['import_quantity_to'];
			if ($parameterArray ['import_quantity'] != '')
				$qry = $qry . " and (select sum(quantity) from product_import where product_code = t2.code group by product_code) >= " . $parameterArray ['import_quantity'];
			
		} else {
			if ($parameterArray ['product_code'] != '')
				$qry = $qry . " and t1.product_code like '%" . $parameterArray ['product_code'] . "%' ";
			if ($parameterArray ['sale'] != '')
				$qry = $qry . " and t2.sale = " . $parameterArray ['sale'];
			if ($parameterArray ['import_price'] != '')
				$qry = $qry . " and t1.import_price = " . $parameterArray ['import_price'];
			if ($parameterArray ['import_quantity'] != '')
				$qry = $qry . " and (select sum(quantity) from product_import where product_code = t2.code group by product_code) = " . $parameterArray ['import_quantity'];
			if ($parameterArray ['export_price'] != '')
				$qry = $qry . " and t2.export_price = " . $parameterArray ['export_price'];
		}
		$qry = $qry . " order by t3.date desc";
//		 echo $qry;
		$this->processImportQuery($qry);
		
	}
	function processImportQuery($qry){
		$result = mysql_query ( $qry, $this->connection );
		$resulttmp = mysql_query ( $qry, $this->connection );
		$this->commonService->generateJSDatatableComplex ( $result, 'product', 6, 'desc', $this->getArrayTotalImport() );
		$this->commonService->generateJqueryDatatable ( $result, 'product', $this->getArrayColumnImport() );
		$this->commonService->generateJqueryToolTipScript ( $resulttmp, 'product', $this->getArrayColumnImport() );
	}
	function getArrayTotalImport(){
		return array (2 => "Số lượng", 7 => "Tổng nhập", 8 => "Tổng NY" );
	}
	function getArrayColumnImport() {
		return array (
			"product_code" => "Mã hàng,product_code,image", 
			"name" => "Tên Hàng", 
			"quantity" => "Số lượng", 
			"import_price" => "Giá nhập", 
			"export_price" => "Giá bán", 
			"sale" => "Sale", 
			"import_facture_code,date" => "Mã Hóa Đơn,import_facture_code", 
			"quantity*import_price" => "complex", 
			"quantity*export_price" => "complex", 
			"provider_id,provider_name,name" => "Cung Cấp,provider_name", 
			"category_name" => "Loại", 
			"sex_id" => "Giới tính", 
			"brand_name" => "Hiệu", 
			"season_id,season_name" => "Mùa,season_name", 
			"provider_id,descript,date,provider_name,brand_name,category_name,season_name,id,product_code,quantity,import_facture_code,import_price,name,category_id,season_id,sex_id,export_price,description,brand_id,sale,link" => "Edit", 
			"id" => "Delete", 
			"quantity*export_price" => "complex" );
	}
	
	function currentMaxProductCode($i) {
		$qry = "select max(code) as maxproductcode from product where code > 0000 and code <9999 and length(code)=4 limit 1";
		$result = mysql_query ( $qry, $this->connection );
		$rows = mysql_fetch_array ( $result );
		if ($i <= 1 && $rows ['maxproductcode'] == null)
			return '0001';
		else
			return $this->commonService->displayCodeProduct ( intval ( $rows ['maxproductcode'] ) + $i );
	}
	function getImportFactureCode() {
		$qry = "select max(code) as amount from import_facture where LENGTH(code)=12 limit 1";
		$result = mysql_query ( $qry, $this->connection );
		$rows = mysql_fetch_assoc ( $result );
		
		if ($rows ['amount']) {
			return $this->commonService->getNextFactureCode ( $rows ['amount'] );
		} else
			return $this->commonService->getCurrentDateYYYYMMDD () . "_001";
	}
	// AUTOCOMPLETE
	function getJsonFactureImport($term) {
		$qry = "select t1.*,t2.name as provider_name from import_facture t1,provider t2 where t1.code like '%" . $term . "%' and t1.provider_id = t2.id limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['code'] . ":" . $rows ['provider_name'] . ":" . $rows ['description'];
			$element = array (code => $rows ['code'], description => $rows ['description'], provider_id => $rows ['provider_id'], provider_name => $rows ['provider_name'], value => $rows ['code'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProviderName($term) {
		$qry = "select * from provider where name like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'] . ":" . $rows ['tel'] . ":" . $rows ['address'];
			$element = array (code => $rows ['name'], provider_id => $rows ['id'], value => $rows ['name'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonSeason($term) {
		$qry = "select * from season where name like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'] . ":from " . $rows ['start_time'] . "-->" . $rows ['end_time'];
			$element = array (code => $rows ['name'], season_id => $rows ['id'], value => $rows ['name'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonCategory($term) {
		$qry = "select * from category where name like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'] . " - " . $rows ['description'];
			$element = array (code => $rows ['name'], category_id => $rows ['id'], value => $rows ['name'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonBrand($term) {
		$qry = "select * from brand where name like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'];
			$element = array (code => $rows ['name'], brand_id => $rows ['id'], value => $rows ['name'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProductCodeReturn($term) {
		$qry = "select (select sum(quantity) from product_return where product_code = t1.product_code) as qtyreturned, t1.product_code, sum(t1.quantity) as qty,t4.name as provider_name, t2.code as import_facture_code, t2.provider_id,t3.name,t1.import_price 
				from product_import t1, import_facture t2, product t3, provider t4
				 where t4.id = t2.provider_id and t1.product_code like '%" . $term . "%' and t1.import_facture_code = t2.code and t3.code = t1.product_code group by t1.product_code limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['product_code'] . " : Đã trả lại: " . ($rows ['qtyreturned'] ? $rows ['qtyreturned'] : '0');
			$element = array (code => $rows ['product_code'], qty => $rows ['qty'], facture => $rows ['import_facture_code'], provider_name => $rows ['provider_name'], provider_id => $rows ['provider_id'], provider_id => $rows ['provider_id'], qtyreturned => $rows ['qtyreturned'] ? $rows ['qtyreturned'] : '0', import_price => $rows ['import_price'], name => $rows ['name'], value => $rows ['product_code'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProductCode($term) {
		$qry = "select t1.*,t2.name as category,t2.id as category_id,t3.name as brand,t3.id as brand_id, 
				(select t2.import_price from (SELECT *,sum(quantity) FROM `product_import` group by product_code,import_facture_code) t2 
				where t2.product_code = t1.code and t2.import_facture_code = (select max(import_facture_code) from product_import where product_code = t2.product_code)) as impr 
				from product t1,category t2, brand t3 where t1.brand_id = t3.id and t1.category_id = t2.id and t1.code like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = "Code : " . $rows ['code'] . ", name :" . $rows ['name'] . ", Sex: " . (($rows ['sex_id'] == 1) ? "WOMAN" : "MAN");
			$element = array (code => $rows ['code'], name => $rows ['name'], post => $rows ['export_price'], sex_id => $rows ['sex_id'], sextext => ($rows ['sex_id'] == 1) ? "WOMAN" : "MAN", sexoldclass => ($rows ['sex_id'] == 2) ? "sex_man" : "sex_woman", sexnewclass => ($rows ['sex_id'] == 2) ? "sex_woman" : "sex_man", impr => $rows ['impr'], category => $rows ['category'], category_id => $rows ['category_id'], brand => $rows ['brand'], brand_id => $rows ['brand_id'], description => $rows ['description'], value => $rows ['code'], label => $labelvalue );
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProductName($term) {
		$qry = "select * from product where name like '%" . $term . "%' limit 10";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$jsonArray [] = $rows ['name'];
		}
		return $jsonArray;
	}
	function getJsonProductCodeOnly($term) {
		$qry = "select * from product where code like '%" . $term . "%' limit 10 ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$jsonArray [] = $rows ['code'];
		}
		return $jsonArray;
	}
	function loadDefaultSeason() {
		$season_time = date ( 'm-d' );
		$qry = "select * from season where '" . $season_time . "' between DATE_FORMAT(start_time,'%m-%d') and DATE_FORMAT(end_time,'%m-%d') ";
		$result = mysql_query ( $qry, $this->connection );
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$_SESSION ['default_season_name'] = $rows ['name'];
			$_SESSION ['default_season_id'] = $rows ['id'];
		}
	}
	function updateOrInsertCategory($categoryname, $categoryid) {
		if ($categoryid == null) {
			$qry = "insert into category(name) values ('" . $categoryname . "')";
			mysql_query ( $qry, $this->connection );
			return mysql_insert_id ();
		} else {
			return $categoryid;
		}
	}
	function updateOrInsertBrand($brandname, $brandid) {
		if ($brandid == null) {
			$qry = "insert into brand(name) values ('" . $brandname . "')";
			mysql_query ( $qry, $this->connection );
			return mysql_insert_id ();
		} else {
			return $brandid;
		}
	}
	// START BUSINESS IMPORT PROJECT
	function importProduct($totalRow, $continueImport, $provider_id, $import_facture_code, $description, $season, $codeArray, $codeExistedArray, $nameArray, $qtyArray, $postArray, $imprArray, $sexArray, $categoryIdArray, $brandIdArray, $descriptionArray, $sale) {
		// If import the new facture then
		if ($continueImport != "true") {
			$this->addFacture ( $import_facture_code, $provider_id, $description );
		}
		$this->addProducts ( $totalRow, $season, $codeArray, $codeExistedArray, $nameArray, $postArray, $sexArray, $categoryIdArray, $brandIdArray, $descriptiondArray, $sale );
		$this->addProductImport ( $totalRow, $import_facture_code, $codeArray, $qtyArray, $imprArray );
		$this->commonService->RedirectToURL ( "login-home.php?module=import&submenu=search" );
	
	}
	function addProductImport($totalRow, $import_facture_code, $codeArray, $qtyArray, $imprArray) {
		$qry = "INSERT INTO `product_import` (`product_code`, `import_facture_code`, `quantity`, `import_price`) VALUES ";
		for($i = 1; $i <= $totalRow; $i ++) {
			$strLine = "";
			if ($qtyArray [$i] != "") {
				$strLine = "('" . $codeArray [$i] . "', '" . $import_facture_code . "', " . $qtyArray [$i] . ", " . $imprArray [$i] . "),";
				$qry = $qry . $strLine;
			}
		}
		$qry = substr ( $qry, 0, - 1 ) . ";";
		mysql_query ( $qry, $this->connection );
	}
	function addFacture($import_facture_code, $provider_id, $description) {
		$qry = "insert into import_facture(code,date,description,provider_id) values ('" . $import_facture_code . "','" . $this->commonService->getFullDateTime () . "','" . $description . "'," . $provider_id . ")";
		mysql_query ( $qry, $this->connection );
	}
	function addProducts($totalRow, $season, $codeArray, $codeExistedArray, $nameArray, $postArray, $sexArray, $categoryIdArray, $brandIdArray, $descriptiondArray, $sale) {
		$haveNewProduct = false;
		$qry = "INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`,`sale`) VALUES ";
		for($i = 1; $i <= $totalRow; $i ++) {
			$strLine = "";
			if ($nameArray [$i] != "") {
				if ($codeExistedArray [$i] == 'false') {
					$haveNewProduct = true;
					$strLine = "('" . $codeArray [$i] . "', '" . $nameArray [$i] . "', " . $categoryIdArray [$i] . ", " . $season . ", " . $sexArray [$i] . ", " . $postArray [$i] . ", '" . $descriptiondArray [$i] . "', " . $brandIdArray [$i] . "," . $sale . "),";
				}
				$qry = $qry . $strLine;
			}
		}
		
		$qry = substr ( $qry, 0, - 1 ) . ";";
		// 		echo $qry;
		if ($haveNewProduct)
			mysql_query ( $qry, $this->connection );
	}
	function addReturnProduct($codes, $quantities, $descriptions, $providers) {
		$listcode = explode ( ',', substr ( $codes, 0, - 1 ) );
		$listquantity = explode ( ',', substr ( $quantities, 0, - 1 ) );
		$listdescriptions = explode ( ',', substr ( $descriptions, 0, - 1 ) );
		$listproviders = explode ( ',', substr ( $providers, 0, - 1 ) );
		
		$qry = "insert into product_return(product_code,quantity,date,description,provider_id) values ";
		for($i = 0; $i < sizeof ( $listcode ); $i ++) {
			if ($i < sizeof ( $listcode ) - 1)
				$qry = $qry . " ('" . $listcode [$i] . "'," . $listquantity [$i] . ",'" . date ( 'Y-m-d H:i:s' ) . "','" . $listdescriptions [$i] . "'," . $listproviders [$i] . "),";
			else
				$qry = $qry . " ('" . $listcode [$i] . "'," . $listquantity [$i] . ",'" . date ( 'Y-m-d H:i:s' ) . "','" . $listdescriptions [$i] . "'," . $listproviders [$i] . ")";
		}
		echo mysql_query ( $qry, $this->connection );
	}
	function updateSaleProduct($sale, $product_code, $product_name, $provider_name, $category_name, $brand_name, $season_id, $description) {
		$qry = "update product set sale = " . $sale . " where code like '" . $product_code . "' and name like '" . $product_name . "' and category_id in (select id from category where name like '" . $category_name . "') and brand_id in (select id from brand where name like '" . $brand_name . "') and code in (select product_code from product_import where import_facture_code in (select code from import_facture where provider_id in (select id from provider where name like '" . $provider_name . "')))";
		if ($season_id != null && $season_id != '') {
			$qry = $qry . " and season_id =" . $season_id;
		}
		// 		echo $qry;
		echo mysql_query ( $qry, $this->connection );
	}
	function updateImportProduct($parameterArray){
		echo mysql_query ( $qry, $this->connection );
	}
	function listProductReturnDefault() {
		$qry = "select t1.*,t2.*,t3.*,t4.*,t1.date as datereturn,t3.name as provider_name,t2.name as product_name,
				(select import_price from product_import where product_code = t1.product_code and id = (select max(id) from product_import where product_code = t1.product_code )) as import_price from 
				product_return t1, product t2, provider t3, category t4, brand t5,season t6 
				where t1.product_code = t2.code and t1.provider_id = t3.id and t2.category_id = t4.id and t2.brand_id = t5.id and t2.season_id = t6.id";
		$result = mysql_query ( $qry, $this->connection );
	
		$this->commonService->generateJSDatatableComplex ( $result, 'productreturn', 1, 'desc', $this->getArrayTotalReturn() );
		$this->commonService->generateJqueryDatatable ( $result, 'productreturn', $this->getArrayColumnReturn() );
	}
	function listProductReturn($parameterArray) {
		$qry = "select t1.*,t2.*,t3.*,t4.*,t1.date as datereturn,t3.name as provider_name,t2.name as product_name,
				(select import_price from product_import where product_code = t1.product_code and id = (select max(id) from product_import where product_code = t1.product_code )) as import_price 
				from product_return t1, product t2, provider t3, category t4, brand t5, season t6
				where t1.product_code = t2.code and t1.provider_id = t3.id and t2.category_id = t4.id and t2.brand_id = t5.id and t2.season_id = t6.id ";
			
			if ($parameterArray ['product_name'] != '')
				$qry = $qry . " and t2.name like '%" . $parameterArray ['product_name'] . "%'";
		
			if ($parameterArray ['category_name'] != '')
				$qry = $qry . " and t4.name like '%" . $parameterArray ['category_name'] . "%'";
		
			if ($parameterArray ['provider_name'] != '')
				$qry = $qry . " and t3.name like '%" . $parameterArray ['provider_name'] . "%'";
		
			if ($parameterArray ['season_id'] != '')
				$qry = $qry . " and t6.id like '%" . $parameterArray ['season_id'] . "%'";
				
			if ($parameterArray ['brand_name'] != '')
				$qry = $qry . " and t5.name like '%" . $parameterArray ['brand_name'] . "%'";
				
			if ($parameterArray ['description'] != '')
				$qry = $qry . " and  t2.description like '%" . $parameterArray ['description'] . "%' ";
				
			if ($parameterArray ['datefrom'] != '')
				$qry = $qry . " and DATE_FORMAT(t1.date, '%Y-%m-%d') >= '" . $parameterArray ['datefrom'] . "'";
				
			if ($parameterArray ['dateto'] != '')
				$qry = $qry . " and DATE_FORMAT(t1.date, '%Y-%m-%d') <= '" . $parameterArray ['dateto'] . "'";
				
			if ($parameterArray ['sex_value_search'] != '')
				$qry = $qry . " and t2.sex_id = " . $parameterArray ['sex_value_search'];
			//TODO to be completed later
			if ($parameterArray ['isadvancedsearch'] == 'true') {
				
			} else {
				
			}
//		 		echo $qry;
		$result = mysql_query ( $qry, $this->connection );
		
		$this->commonService->generateJSDatatableComplex ( $result, 'productreturn', 1, 'desc', $this->getArrayTotalReturn() );
		$this->commonService->generateJqueryDatatable ( $result, 'productreturn', $this->getArrayColumnReturn() );
	}
	function getArrayTotalReturn(){
		return array (
		2 => "Số lượng", 
		5 => "Tổng tiền trả" );
	}
	function getArrayColumnReturn() {
		return array (
		"product_code" => "Mã hàng", 
		"product_name" => "Tên hàng",
		"quantity" => "Số lượng", 
		"import_price" => "Giá nhập", 
		"export_price" => "Giá NY", 
		"quantity*import_price" => "complex", 
		"sex_id" => "Giới tính",
		"datereturn" => "Ngày trả", 
		"provider_name" => "Cung cấp" ,
		"tel" => "Phone" );
	}
	function getInputSearchParameters() {
		$parameterArray = array (
		'product_code' => $_REQUEST ['product_code'], 
		'product_code_to' => $_REQUEST ['product_code_to'], 
		'product_name' => $_REQUEST ['product_name'], 
		'category_name' => $_REQUEST ['category_name'], 
		'provider_name' => $_REQUEST ['provider_name'], 
		'brand_name' => $_REQUEST ['brand_name'], 
		'season_id' => $_REQUEST ['season_id'],
		'sale' => $_REQUEST ['sale'], 
		'sale_to' => $_REQUEST ['sale_to'], 
		'import_quantity' => $_REQUEST ['import_quantity'], 
		'import_quantity_to' => $_REQUEST ['import_quantity_to'], 
		'import_price' => $_REQUEST ['import_price'], 
		'import_price_to' => $_REQUEST ['import_price_to'], 
		'export_quantity' => $_REQUEST ['export_quantity'], 
		'export_quantity_to' => $_REQUEST ['export_quantity_to'], 
		'export_price' => $_REQUEST ['export_price'], 
		'export_price_to' => $_REQUEST ['export_price_to'], 
		'remain_quantity' => $_REQUEST ['remain_quantity'], 
		'remain_quantity_to' => $_REQUEST ['remain_quantity_to'], 
		'import_facture_code' => $_REQUEST ['import_facture_code'],
		'sex_value_search' => $_REQUEST ['sex_value_search'], 
		'description' => $_REQUEST ['description'], 
		'datefrom' => $_REQUEST ['datefrom'], 
		'dateto' => $_REQUEST ['dateto'], 
		'isadvancedsearch' => $_REQUEST ['isadvancedsearch'] );
		return $parameterArray;
	}
	function deleteProductImport($id) {
		$qry = "delete from product_import where id = " . $id;
		echo mysql_query ( $qry, $this->connection );
	}
function getProductParameters() {
		$parameterArray = array (
		'edit_import_facture_code' => $_REQUEST ['edit_import_facture_code'], 
		'edit_import_date' => $_REQUEST ['edit_import_date'], 
		'edit_import_description' => $_REQUEST ['edit_import_description'], 
		'id_edit_provider' => $_REQUEST ['id_edit_provider'], 
		'edit_product_code' => $_REQUEST ['edit_product_code'], 
		'edit_product_name' => $_REQUEST ['edit_product_name'], 
		'id_edit_category' => $_REQUEST ['id_edit_category'],
		'id_edit_season' => $_REQUEST ['id_edit_season'], 
		'id_edit_sex' => $_REQUEST ['id_edit_sex'], 
		'id_edit_brand' => $_REQUEST ['id_edit_brand'], 
		'edit_product_description' => $_REQUEST ['edit_product_description'], 
		'edit_export_price' => $_REQUEST ['edit_export_price'], 
		'edit_sale' => $_REQUEST ['edit_sale'], 
		'edit_link' => $_REQUEST ['edit_link'], 
		'edit_id' => $_REQUEST ['edit_id'], 
		'edit_quantity' => $_REQUEST ['edit_quantity'], 
		'edit_import_price' => $_REQUEST ['edit_import_price'] );
		return $parameterArray;
	}
	// END BUSINESS IMPORT PROJECT
}
?>