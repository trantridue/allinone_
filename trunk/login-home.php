<?PHP
require_once ("./include/membersite_config.php");

$now = time ();
if (! $fgmembersite->CheckLogin () || ($now > $_SESSION ['expire1'])) {
	$fgmembersite->RedirectToURL ( "login.php" );
	exit ();
}

$_SESSION ['start1'] = time ();
$_SESSION ['expire1'] = $_SESSION ['start1'] + timeout;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Home page</title>
<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">


<link href="style/jquery.dataTables.css" rel="stylesheet">


<link href="style/style.css" rel="stylesheet">


<script src="scripts/jquery-1.11.1.min.js"></script>
<script src="scripts/jquery.dataTables.min.js"></script>
<script src="scripts/datatables.js"></script>
<script src="scripts/ui.js"></script>
<script src="scripts/jquery.datetimepicker.js"></script>

<script src="scripts/validator.js"></script>
<script src="scripts/input-validator.js"></script>
<link rel="stylesheet" href="style/jquery.datetimepicker.css">
<link rel="stylesheet" href="style/jquery-ui.css">
<script src="scripts/jquery-ui.js"></script>
<script src="scripts/ajax.js"></script>
<script src="scripts/calculator.js"></script>
<script src="scripts/jquery.confirm.js"></script>
<link rel="stylesheet" type="text/css" href="style/jquery.confirm.css" />
</head>
<body>
<div id='main_page_wrap'>
<div id="main_page_header">
<div class="wrappadding"><?php
include 'common/header.php'?>
			</div>
</div>
<div id="main_page_body">
<div id="main_page_menu">
<div class="wrappadding">
				<?php
				include 'common/menu.php';
				?>
				</div>
</div>
<div id="main_page_content">
<div class="wrappadding">
					<?php
					include 'common/body.php';
					?>
				</div>
</div>
</div>
<div id="main_page_footer">
<div class="wrappadding">The footer:</div>
</div>
</div>
</body>
</html>
