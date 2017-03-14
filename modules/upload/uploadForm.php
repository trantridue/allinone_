<form action="modules/upload/upload.php" method="post"
	enctype="multipart/form-data" class="uploadFormStyle"
	onsubmit="return validateBlankField('fileName') && validateBlankField('fileToUpload');">
Select image to upload: <input type="file" name="fileToUpload"
	id="fileToUpload"> <input type="text" name="fileName" id="fileName"
	class="productcode"> <input type="submit" value="Upload Image Product"
	name="submit"></form>
	<?php 
if($commonService->isAdmin()) {?>
<form action="modules/upload/uploadFacture.php" method="post" class="uploadFormStyle"
	enctype="multipart/form-data"
	onsubmit="return validateBlankField('fileNameFacture') && validateBlankField('fileToUploadFacture');">
Select image to upload: <input type="file" name="fileToUploadFacture"
	id="fileToUploadFacture"> <input type="text" name="fileNameFacture"
	id="fileNameFacture" class="importfacturecode" value="<?php echo date('Ymd').'_00';?>"> <input type="submit"
	value="Upload Image Facture" name="submit"></form>
	<?php }?>