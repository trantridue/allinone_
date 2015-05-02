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
</style>
<div id="exportLeft">
	<div id="exportCustomerInformation"><?php include 'customerInfor.php';?></div>
	<div id="exportFactureInformation"><?php include 'factureInfor.php';?></div>
	<div id="exportProductList">3</div>
</div>
<div id="exportRight">
</div>