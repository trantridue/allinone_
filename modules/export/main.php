<style>
#exportLeft{
	float: left;
	width: 40%;
	height: 515px;
	overflow: auto;
	background-color: pink;
	padding: 5px;
}
#exportRight{
	float: right;
	padding:5px;
	width: 58%;
	height: 515px;
	overflow: auto;
	background-color: bisque;
}
#exportCustomerInformation{
	background-color: #FFFEE0;
}
#exportFactureInformation{
	background-color: #0FFEE0;
}
#exportInputProduct{
	background-color: #1FF1FF;
}
</style>
<div id="exportLeft">
	<div id="exportCustomerInformation"><?php include 'customerInfor.php';?></div>
	<div id="exportFactureInformation"><?php include 'factureInfor.php';?></div>
	<div id="exportInputProduct"><?php include 'exportInput.php';?></div>
</div>
<div id="exportRight">
</div>