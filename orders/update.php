<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";


$selectCustomers = "SELECT id ,full_name FROM customers";
$customers = mysqli_query($connection, $selectCustomers);
$selectProducts = "SELECT id ,title FROM products";
$products = mysqli_query($connection, $selectProducts);


if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $select = "SELECT * FROM orders WHERE id =$id";
  $data = mysqli_query($connection, $select);
  $row = mysqli_fetch_assoc($data);
}
if (isset($_POST['send'])) {
  $amount = $_POST['amount'];
  $date = date("Y-m-d H:i:s");
  $customer_id = $_POST['customer_id'];
  $product_id = $_POST['product_id'];


  $update = "UPDATE  orders SET amount=$amount, create_date='$date', customer_id=$customer_id, product_id=$product_id WHERE id=$id";
  mysqli_query($connection, $update);

  header("location:index.php ");
  $_SESSION['Message'] = "updated Succesfuly";
}
?>
<div class="container col-6">
  <div class="card">
    <h1 class="text-center my-3 ">update New </h1>
    <a href="/start/orders/" class="btn btn-info">list </a>
    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>order amount</label>
          <input type="number" value="<?= $row['amount'] ?>" class="form-control" name="amount">
        </div>
        <div class="form-group">
          <label>customer name</label>
          <select type="text" class="form-control" name="customer_id">
            <option selected disabled>select customer </option>
            <?php foreach ($customers as $items): ?>
              <?php if ($items['id'] == $row['customer_id']):    ?>
                <option selected value="<?= $items['id'] ?>"><?= $items['full_name'] ?> </option>
              <?php else: ?>
                <option selected value="<?= $items['id'] ?>"><?= $items['full_name'] ?> </option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label>product name</label>
          <select type="text" class="form-control" name="product_id">
            <option selected disabled>--select product-- </option>
            <?php foreach ($products as $items): ?>
              <?php if ($items['id'] == $row['product_id']):    ?>
                <option selected value="<?= $items['id'] ?>"><?= $items['title'] ?> </option>
              <?php else: ?>
                <option value="<?= $items['id'] ?>"><?= $items['title'] ?> </option>
              <?php endif; ?>
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