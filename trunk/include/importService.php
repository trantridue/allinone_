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
	function listProduct($username) {
		$this->commonService->generateJqueryDatatable ( $username );
		$qry = "select * from user";
		$result = mysql_query ( $qry, $this->connection );
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
		$qry = "select t1.*,t2.name as provider_name from import_facture t1,provider t2 where t1.code like '%" . $term . "%' and t1.provider_id = t2.id";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['code'] . ":" . $rows ['provider_name'] . ":" . $rows ['description'];
			$element = array (
					code => $rows ['code'],
					description => $rows ['description'],
					provider_id => $rows ['provider_id'],
					provider_name => $rows ['provider_name'],
					value => $rows ['code'],
					label => $labelvalue 
			);
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProviderName($term) {
		$qry = "select * from provider where name like '%" . $term . "%' ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'] . ":" . $rows ['tel'] . ":" . $rows ['address'];
			$element = array (
					code => $rows ['name'],
					provider_id => $rows ['id'],
					value => $rows ['name'],
					label => $labelvalue 
			);
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonSeason($term) {
		$qry = "select * from season where name like '%" . $term . "%' ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'] . ":from " . $rows ['start_time'] . "-->" . $rows ['end_time'];
			$element = array (
					code => $rows ['name'],
					season_id => $rows ['id'],
					value => $rows ['name'],
					label => $labelvalue 
			);
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonCategory($term) {
		$qry = "select * from category where name like '%" . $term . "%' ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'] . " - " . $rows ['description'];
			$element = array (
					code => $rows ['name'],
					category_id => $rows ['id'],
					value => $rows ['name'],
					label => $labelvalue 
			);
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonBrand($term) {
		$qry = "select * from brand where name like '%" . $term . "%' ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = $rows ['name'];
			$element = array (
					code => $rows ['name'],
					brand_id => $rows ['id'],
					value => $rows ['name'],
					label => $labelvalue 
			);
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProductCode($term) {
		$qry = "select t1.*,t2.name as category,t2.id as category_id,t3.name as brand,t3.id as brand_id, 
				(select t2.import_price from (SELECT *,sum(quantity) FROM `product_import` group by product_code,import_facture_code) t2 
				where t2.product_code = t1.code and t2.import_facture_code = (select max(import_facture_code) from product_import where product_code = t2.product_code)) as impr 
				from product t1,category t2, brand t3 where t1.brand_id = t3.id and t1.category_id = t2.id and t1.code like '%" . $term . "%' ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$labelvalue = "Code : " . $rows ['code'] . ", name :" . $rows ['name'] . ", Sex: " . (($rows ['sex_id'] == 1) ? "WOMAN" : "MAN");
			$element = array (
					code => $rows ['code'],
					name => $rows ['name'],
					post => $rows ['export_price'],
					sex_id => $rows ['sex_id'],
					sextext => ($rows ['sex_id'] == 1) ? "WOMAN" : "MAN",
					sexoldclass => ($rows ['sex_id'] == 2) ? "sex_man" : "sex_woman",
					sexnewclass => ($rows ['sex_id'] == 2) ? "sex_woman" : "sex_man",
					impr => $rows ['impr'],
					category => $rows ['category'],
					category_id => $rows ['category_id'],
					brand => $rows ['brand'],
					brand_id => $rows ['brand_id'],
					description => $rows ['description'],
					value => $rows ['code'],
					label => $labelvalue 
			);
			
			$jsonArray [] = $element;
		}
		return $jsonArray;
	}
	function getJsonProductName($term) {
		$qry = "select * from product where name like '%" . $term . "%' ";
		$result = mysql_query ( $qry, $this->connection );
		$jsonArray = array ();
		while ( $rows = mysql_fetch_array ( $result ) ) {
			$jsonArray [] = $rows ['name'];
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
	function importProduct($totalRow, $continueImport, $provider_id, $import_facture_code, $description, $season, $codeArray, $codeExistedArray, $nameArray, $qtyArray, $postArray, $imprArray, $sexArray, $categoryIdArray, $brandIdArray, $descriptionArray) {
		// If import the facture then
		if ($continueImport != "true") {
			$this->addFacture ( $import_facture_code, $provider_id, $description );
		}
		$this->addProducts ( $totalRow, $season, $codeArray, $codeExistedArray, $nameArray, $postArray, $sexArray, $categoryIdArray, $brandIdArray, $descriptiondArray );
		$this->addProductImport ( $totalRow, $import_facture_code, $codeArray, $qtyArray, $imprArray );
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
// 		echo $qry;
		mysql_query ( $qry, $this->connection );
	}
	function addFacture($import_facture_code, $provider_id, $description) {
		$qry = "insert into import_facture(code,date,description,provider_id) values ('" . $import_facture_code . "','" . $this->commonService->getFullDateTime () . "','" . $description . "'," . $provider_id . ")";
		mysql_query ( $qry, $this->connection );
	}
	function addProducts($totalRow, $season, $codeArray, $codeExistedArray, $nameArray, $postArray, $sexArray, $categoryIdArray, $brandIdArray, $descriptiondArray) {
		$haveNewProduct = false;
		$qry = "INSERT INTO `product` (`code`, `name`, `category_id`, `season_id`, `sex_id`, `export_price`, `description`, `brand_id`) VALUES ";
		for($i = 1; $i <= $totalRow; $i ++) {
			$strLine = "";
			if ($nameArray [$i] != "") {
				if ($codeExistedArray [$i] == 'false') {
					$haveNewProduct = true;
					$strLine = "('" . $codeArray [$i] . "', '" . $nameArray [$i] . "', " . $categoryIdArray [$i] . ", " . $season . ", " . $sexArray [$i] . ", " . $postArray [$i] . ", '" . $descriptiondArray [$i] . "', " . $brandIdArray [$i] . "),";
				}
				$qry = $qry . $strLine;
			}
		}
		
		$qry = substr ( $qry, 0, - 1 ) . ";";
// 		echo $qry;
		if ($haveNewProduct)
			mysql_query ( $qry, $this->connection );
	}
	
	// END BUSINESS IMPORT PROJECT
}
?>