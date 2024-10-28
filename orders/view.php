<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";
$counter = 1;


if (isset($_GET['view'])) {
  $ord_id = $_GET['view'];
  $select = "SELECT * FROM join_all_data WHERE ord_id = $ord_id ";
  $data = mysqli_query($connection, $select);
  $row = mysqli_fetch_assoc($data);
}
?>
<div class="container col-md-4">
  <h1 class="text-center my-3 "> Show orders:<?= $row['ord_id'] ?><a href="./create.php" class="btn btn-info">Create New</a></h1>
      <h6>amount: <?= $row['amount'] ?> </h6>
      <hr>
      <h6>create_date: <?= $row['create_date'] ?> </h6>
      <hr>
      <h6>cust_id: <?= $row['cust_id'] ?> </h6>
      <hr>
      <h6>full name: <?= $row['full_name'] ?> </h6>
      <hr>
      <h6>gender: <?= $row['gender'] ?> </h6>
      <hr>
      <h6>prod_id: <?= $row['prod_id'] ?></h6>
      <hr>
      <h6>price: <?= $row['price'] ?> </h6>
      <hr>
      <h6>title: <?= $row['title'] ?> </h6>
      <hr>
    </div>
  </div>
</div>

<?php
include_once "../shared/script.php";
?>