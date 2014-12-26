<?PHP
require_once("constant.php");
require_once("./include/fg_membersite.php");
require_once("./include/importService.php");

$fgmembersite = new FGMembersite(hostname, username, password, database,tablename);
$importService = new ImportService(hostname, username, password, database);

//Provide your site name here
$fgmembersite->SetWebsiteName('user11.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('user11@user11.com');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>