<?PHP
require_once ("./include/membersite_config.php");

if (! $fgmembersite->CheckLogin ()) {
	$fgmembersite->RedirectToURL ( "login.php" );
	exit ();
}

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
			<script src="scripts/all.js"></script>

</head>
<body>
	<div id='main_page_wrap'>
		<div id="main_page_header">
			<div class="wrappadding">Welcome back <?= $fgmembersite->UserFullName(); ?>!<a
					href='logout.php'>Logout</a><a href='change-pwd.php'>Change
					password</a>
			</div>
		</div>
		<div id="main_page_body">
			<div id="main_page_menu">
				<div class="wrappadding">menu</div>
			</div>
			<div id="main_page_content">
				<div class="wrappadding">
					<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th style="display: none;">Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</thead>

						<tfoot>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Office</th>
								<th>Age</th>
								<th style="display: none;">Age</th>
								<th>Start date</th>
								<th>Salary</th>
							</tr>
						</tfoot>

						<tbody>
							<tr>
								<td>Tiger Nixon</td>
								<td>System Architect</td>
								<td>Edinburgh</td>
								<td>61</td>
								<td style="display: none;">1</td>
								<td>2011/04/25</td>
								<td>$320,800</td>
							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Accountant</td>
								<td>Tokyo</td>
								<td>63</td>
								<td style="display: none;">1</td>
								<td>2011/07/25</td>
								<td>$170,750</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>Junior Technical Author</td>
								<td>San Francisco</td>
								<td>66</td>
								<td style="display: none;">1</td>
								<td>2009/01/12</td>
								<td>$86,000</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="main_page_footer">
			<div class="wrappadding">The footer</div>
		</div>
	</div>
</body>
</html>
