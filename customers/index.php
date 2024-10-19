<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";
$counter=1; 







$select = "SELECT * FROM customers ORDER BY id DESC";
$data = mysqli_query($connection, $select);
if(isset($_GET['delete'])){
  $id=$_GET['delete'] ; 
$delete = "DELETE FROM customers where id = $id ";
mysqli_query($connection, $delete);
header("location:/start/customers/index.php");
}

?>
<div class="container col-md-4">
  <div class="card" >
    <h1 class="text-center my-3 "> List All Customer Table <a href="./create.php" class="btn btn-info">Create New </a>
    </h1>
    <div class="card-body"  >
      <table class="table table-dark">
        <tr class="text-center">
          <th>id</th>
          <th>fullname</th>
      
          <th colspan="3">action</th>
        </tr>
        <?php foreach ($data as $items): ?>
          <tr>
            <th> <?= $counter++ ?> </th>
            <th><?= $items['full_name'] ?> </th>
            <th><a href="/start/customers/view.php?view=<?=$items['id'] ?>"><i class=" text-info fa-solid fa-eye"></i> </a> </th>
            <th><a  href="/start/customers/index.php?delete=<?=$items['id'] ?> "><i class=" text-danger fa-solid fa-trash"></i> </a></th>
            <th><a href="/start/customers/update.php?edit=<?=$items['id'] ?> "><i class="text-warning fa-solid fa-pen-to-square"></i> </a></th>
          </tr>

        <?php endforeach ?>
      </table>
    </div>
  </div>
</div>
<?php
include_once "../shared/script.php";
?>