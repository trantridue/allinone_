<?PHP
require_once ("constant.php");
require_once ("./include/fg_membersite.php");
require_once ("./include/commonService.php");
require_once ("./include/importService.php");
require_once ("./include/userService.php");
require_once ("./include/providerService.php");
require_once ("./include/customerService.php");
require_once ("./include/newsService.php");
require_once ("./include/spendService.php");
require_once ("./include/inoutService.php");
require_once ("./include/fundService.php");

$fgmembersite = new FGMembersite ( hostname, username, password, database, tablename );
$commonService = new CommonService ();
$importService = new ImportService ( hostname, username, password, database,$commonService );
$userService = new UserService ( hostname, username, password, database,$commonService );
$providerService = new ProviderService ( hostname, username, password, database,$commonService );
$customerService = new CustomerService ( hostname, username, password, database,$commonService );
$newsService = new NewsService ( hostname, username, password, database,$commonService );
$spendService = new SpendService ( hostname, username, password, database,$commonService );
$inoutService = new InoutService ( hostname, username, password, database,$commonService );
$fundService = new FundService ( hostname, username, password, database,$commonService );

// Provide your site name here
$fgmembersite->SetWebsiteName ( 'user11.com' );

// Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail ( 'user11@user11.com' );

// For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey ( 'qSRcVS6DrTzrPvr' );

?>