<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";

if(isset($_GET['view'])){
  $id= $_GET['id'];
  print_r($id); 
  $select = "SELECT * FROM customers WHERE id =$id";
  $data = mysqli_query($connection, $select);
  $row=mysqli_fetch_assoc($data) ; 
}
?>
<div class="container col-md-4">
    <h1 class="text-center my-3 "> Show customer:<?=$row['id'] ?> <a href="./create.php" class="btn btn-info">Create New </a></h1>
    <div class="card">
      <img src="./update.php/<?=$row['image'] ?>" class="img-fluid img-top" alt="">
    <div class="card-body">

    
    </div>
  </div>
</div>

<?php
include_once "../shared/script.php";
?>