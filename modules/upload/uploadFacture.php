<?php
session_start();
$max_img_size_upload = $_SESSION['max_img_size_upload'];
$target_dir = "../../img/facture/";
$target_file = $target_dir . basename($_FILES["fileToUploadFacture"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$target_file_uploaded = $target_dir .$_POST['fileNameFacture'].".png";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUploadFacture"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file_uploaded)) {
    unlink($target_file_uploaded);
    $uploadOk = 1;
}
// Check file size
if ($_FILES["fileToUploadFacture"]["size"] > $max_img_size_upload) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    echo "<a href='../../login-home.php'>Home page</a>";
// if everything is ok, try to upload file
} else {
	$max_width = $_SESSION['max_width_upload_img']*3;
	$max_height = $_SESSION['max_height_upload_img']*3;
	$quality = $_SESSION['upload_img_quality'];
    if (move_uploaded_file($_FILES["fileToUploadFacture"]["tmp_name"], $_FILES["fileToUploadFacture"]["tmp_name"]."tmp")) {
		GenerateThumbnail($_FILES["fileToUploadFacture"]["tmp_name"]."tmp",$target_file_uploaded,$max_width,$max_height,$quality);
		unlink($_FILES["fileToUploadFacture"]["tmp_name"]."tmp"); 
        echo "<script>document.location.href='../../login-home.php?module=upload&submenu=search'</script>";
    } else {
        echo "Sorry, there was an error uploading your file.";
        echo "<a href='../../login-home.php'>Home page</a>";
    }
}
function GenerateThumbnail($im_fileNameFacture,$th_fileNameFacture,$max_width,$max_height,$quality = 0.75)
{
// The original image must exist
if(is_file($im_fileNameFacture))
{
    // Let's create the directory if needed
    $th_path = dirname($th_fileNameFacture);
    if(!is_dir($th_path))
        mkdir($th_path, 0777, true);
    // If the thumb does not aleady exists
    if(!is_file($th_fileNameFacture))
    {
        // Get Image size info
        list($width_orig, $height_orig, $image_type) = @getimagesize($im_fileNameFacture);
        if(!$width_orig)
            return 2;
        switch($image_type)
        {
            case 1: $src_im = @imagecreatefromgif($im_fileNameFacture);    break;
            case 2: $src_im = @imagecreatefromjpeg($im_fileNameFacture);   break;
            case 3: $src_im = @imagecreatefrompng($im_fileNameFacture);    break;
        }
        if(!$src_im)
            return 3;


        $aspect_ratio = (float) $height_orig / $width_orig;

        $thumb_height = $max_height;
        $thumb_width = round($thumb_height / $aspect_ratio);
        if($thumb_width > $max_width)
        {
            $thumb_width    = $max_width;
            $thumb_height   = round($thumb_width * $aspect_ratio);
        }

        $width = $thumb_width;
        $height = $thumb_height;

        $dst_img = @imagecreatetruecolor($width, $height);
        if(!$dst_img)
            return 4;
        $success = @imagecopyresampled($dst_img,$src_im,0,0,0,0,$width,$height,$width_orig,$height_orig);
        if(!$success)
            return 4;
        switch ($image_type) 
        {
            case 1: $success = @imagegif($dst_img,$th_fileNameFacture); break;
            case 2: $success = @imagejpeg($dst_img,$th_fileNameFacture,intval($quality*100));  break;
            case 3: $success = @imagepng($dst_img,$th_fileNameFacture,intval($quality*9)); break;
        }
        if(!$success)
            return 4;
    }
    return 0;
}
return 1;
}
?>