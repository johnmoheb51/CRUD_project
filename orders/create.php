<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";


$selectCustomers = "SELECT id ,full_name FROM customers";
$customers = mysqli_query($connection, $selectCustomers);
$selectProducts = "SELECT id ,title FROM products";
$products = mysqli_query($connection, $selectProducts);

if (isset($_POST['send'])) {
  $amount = $_POST['amount'];
  $date = date("Y-m-d H:i:s");
  $customer_id = $_POST['customer_id'];
  $product_id = $_POST['product_id'];


  $insert = "INSERT INTO orders VALUES(null, $amount, '$date', $customer_id, $product_id )";
  mysqli_query($connection, $insert);

  header("location:index.php ");
  $_SESSION['Message']= "inserted Succesfuly";

}
?>
<div class="container col-6">
  <div class="card">
    <h1 class="text-center my-3 ">Create New Order </h1>
    <a href="/start/orders/" class="btn btn-info">list </a>
    <div class="card-body">
      <form action="./create.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>order amount</label>
          <input type="number" class="form-control" name="amount">
        </div>
        <div class="form-group">
          <label>customer name</label>
          <select type="text" class="form-control" name="customer_id">
            <option selected disabled>select customer </option>
            <?php foreach ($customers as $items): ?>
              <option value="<?= $items['id'] ?>"><?= $items['full_name'] ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label>product name</label>
          <select type="text" class="form-control" name="product_id">
            <option selected disabled>--select product-- </option>
            <?php foreach ($products as $items): ?>
              <option value="<?= $items['id'] ?>"><?= $items['title'] ?> </option>
            <?php endforeach; ?>
          </select>
        </div>

    </div>
  </div>
  <button class="btn btn-info my-4" name="send" type="Submit">Submit </button>
  </form>
</div>
<?php



include_once "../shared/script.php";
?>