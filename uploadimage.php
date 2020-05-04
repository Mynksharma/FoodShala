<?php 
require 'includes/common.php';$id=$_SESSION['id'];
$email=$_SESSION['email'];
if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpname=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fleType=$_FILES['file']['type'];
$fileExt=explode('.',$fileName);

$fileActualExt=strtolower(end($fileExt));

$allowed=array('jpg','jpeg','png');
if(in_array($fileActualExt,$allowed)){
    $fileNameNew=uniqid($email,true).".".$fileActualExt;
        $fileDestination='restaurant_images/'.$fileNameNew;
    move_uploaded_file($fileTmpname,$fileDestination);
    $sql="Update restaurant_details set profile_image='$fileNameNew' where resid='$id'";
    mysqli_query($con,$sql);
    header("location:addmenu.php");   
}
}?>