<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";
$counter = 1;

if(isset($_GET['customers_id'])){
  $customer_id=$_GET['customers_id'] ; 

  $select = "SELECT * FROM orders WHERE customer_id=$customer_id   ORDER BY id DESC";
  $data = mysqli_query($connection, $select);
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $delete = "DELETE FROM orders where id = $id ";
  mysqli_query($connection, $delete);
  header("location: index.php");
}

if(isset($_GET['clear'])){

  session_unset();
  session_destroy();
  header("location:index.php ");
} 

?>
<div class="container col-md-4">
  <div class="card">
    <h1 class="text-center my-4 "> List All orders Table <a href="./create.php" class="btn btn-info">Create New order </a>
    </h1>
    <?php if (isset($_SESSION['Message'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $_SESSION['Message']  ;

  ?>
  <a href="index.php?clear=done"  class="btn-close" aria-label="Close"></a>
      </div>
    <?php endif; ?>
    <div class="card-body">
      <table class="table table-dark">
        <tr class="text-center">
          <th>id</th>
          <th>Amount</th>
          <th>Create_date</th>
          <th colspan="3">action</th>
        </tr>
        <?php foreach ($data as $items): ?>
          <tr class="text-center">
            <th> <?= $counter++ ?> </th>
            <th><?= $items['amount'] ?> </th>
            <th><?= $items['create_date'] ?> </th>
            <th><a href="/start/orders/view.php?view=<?= $items['id'] ?>"><i class=" text-info fa-solid fa-eye"></i> </a> </th>
            <th><a href="/start/orders/index.php?delete=<?= $items['id'] ?> "><i class=" text-danger fa-solid fa-trash"></i> </a></th>
            <th><a href="/start/orders/update.php?edit=<?= $items['id'] ?> "><i class="text-warning fa-solid fa-pen-to-square"></i> </a></th>
          </tr>

        <?php endforeach ?>
      </table>
    </div>
  </div>
</div>
<?php


if(isset($_SESSION['Message'])){
  echo "<script>
  setTimeout(()=>{
  window.location.replace('/start/orders/index.php?clear=done');
  }, 4000)
  </script>
  ";}  
include_once "../shared/script.php";
?>