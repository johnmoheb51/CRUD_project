<?php
include_once "../shared/config.php";
include_once "../shared/nav.php";




if(isset($_POST['send'])) {
    $full_name = $_POST['full_name'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

$image_name=  rand(0,255). $_FILES['image']['name'] ; 
$tmp_name=$_FILES['image']['tmp_name'];
$location="./upload/$image_name";
move_uploaded_file($tmp_name,$location);



$insert = "INSERT INTO customers VALUES (NULL , '$full_name' ,'$country',$age , '$phone' ,'$image_name','$gender')";
$i = mysqli_query($connection, $insert);
    header(("location:/start/customers/ "));
}
?>
