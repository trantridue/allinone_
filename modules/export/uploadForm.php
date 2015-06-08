<form action="modules/export/upload.php" method="post" enctype="multipart/form-data" onsubmit="return validateBlankField('fileName');">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="fileName" id="fileName">
    <input type="submit" value="Upload Image" name="submit">
</form>