<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";
$counter=1; 

if(isset($_GET['view'])){
  $id=$_GET['view']; 
  $select = "SELECT * FROM customers WHERE id=$id ";
  $data = mysqli_query($connection, $select);
  $row=mysqli_fetch_assoc($data);

}




?>
<div class="container col-md-4">
<h1 class="text-center my-3 "> Show customer:<?=$row['id'] ?><a href="./create.php" class="btn btn-info">Create New</a></h1>
  <div class="card">
  <img src="./upload/<?=$row['image']?>" class="img-fluid img-top">   
    <div class="card-body">
      <h6>full name: <?=$row['full_name']?> </h6>
      <hr>
      <h6>country: <?=$row['country']?> </h6>  
      <hr>
      <h6>age: <?=$row['age']?></h6>
      <hr>
      <h6>phone: <?=$row['phone']?> </h6>
      <hr>
      <h6>gender: <?=$row['gender']?> </h6>
      <hr>
    </div>
  </div>
</div>

<?php
include_once "../shared/script.php";
?>