<?PHP
require_once ("include/membersite_config.php");

$now = time ();
if (! $fgmembersite->CheckLogin () || ($now > $_SESSION ['expire1'])) {
	$fgmembersite->RedirectToURL ( "login.php" );
	exit ();
}

$_SESSION ['start1'] = time ();
$_SESSION ['expire1'] = $_SESSION ['start1'] + $_SESSION ['timeout'];
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
<script src="scripts/ajax.js?rd=20161108"></script>
<script src="scripts/calculator.js"></script>
<script src="scripts/jquery.confirm.js"></script>
<script type="text/javascript">
            $(function () {
                var cancelKeypress = false;
                // Need to cancel event (only applies to IE)
                if ( "onhelp" in window ) {
                    // (jQuery cannot bind "onhelp" event)
                    window.onhelp = function () {
                        return false;
                    };
                }
                $(document).keydown(function ( evt ) {
                    // F1 pressed
                    if ( evt.keyCode === 220 ) {
                        if ( window.event ) {
                            // Write back to IE's event object
                            window.event.keyCode = 0;
                        }
                        cancelKeypress = true;
                        $("#saveExportBtn" ).focus();
                        $("#saveExportBtn" ).select();
                        return false;
                    }
					// F2 pressed
                    if ( evt.keyCode === 113 ) {
                        if ( window.event ) {
                            // Write back to IE's event object
                            window.event.keyCode = 0;
                        }
                        cancelKeypress = true;

                        // Trigger custom help here
                        $("#customer_tel").select();

                        return false;
                    }
					// F3 pressed
                    if ( evt.keyCode === 112 ) {
                        if ( window.event ) {
                            // Write back to IE's event object
                            window.event.keyCode = 0;
                        }
                        cancelKeypress = true;

                        // Trigger custom help here
						$("#productcode_1").focus();
                        return false;
                    }
                });
                // Needed for Opera (as in Andy E's answer)
                $(document).keypress(function ( evt ) {
                    if ( cancelKeypress ) {
                        cancelKeypress = false; // Only this keypress
                        return false;
                    }
                });
            });
        </script>
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
<div class="wrappadding"><?php include 'common/footer.php'?></div>
</div>
</div>
</body>
</html>
