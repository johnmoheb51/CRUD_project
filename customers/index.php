<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";
$counter = 1;


$select = "SELECT * FROM customers ORDER BY id DESC";
$data = mysqli_query($connection, $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $select_one = "SELECT * FROM customers where id =$id";
  //String query
  $data_one = mysqli_query($connection, $select_one); // run query
  $row = mysqli_fetch_assoc($data_one);
  $old_image = $row['image'];
  if ($old_image != 'default.jpg') {
    unlink("./upload/$old_image");
  }

  $delete = "DELETE FROM customers where id = $id ";
  $d = mysqli_query($connection, $delete);
  header("location:index.php");
}

?>
<div class="container col-md-8">
  <div class="card">
    <h1 class="text-center my-3 "> List All Customer Table <a href="./create.php" class="btn btn-info">Create New </a>
    </h1>
    <div class="card-body">
      <form action="./search.php" method="post">
        <div class="form-group my-4">
          <div class="row">
            <div class="col-md-9">
              <input type="text" id="myInput" name="search_value" placeholder=" Search By Name OR Phone" class="form-control my-0">
            </div>
            <div class="col-md-3">
              <div class="d-grid">
                <button class="btn btn-info">Search </button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <table id="myTable" class="table table-dark">
        <tr class="text-center">
          <th>id</th>
          <th>fullname</th>
          <th>phone</th>
          <th colspan="4">action</th>
        </tr>
        <?php foreach ($data as $items): ?>
          <tr>
            <th> <?= $counter++ ?> </th>
            <th><?= $items['full_name'] ?> </th>
            <th><?= $items['phone'] ?> </th>
            <th> <a href="/start/orders/customers_order.php?customers_id=<?= $items['id'] ?>">your order </a> </th>
            <th><a href="/start/customers/view.php?view=<?= $items['id'] ?>"><i class=" text-info fa-solid fa-eye"></i> </a> </th>
            <th><a href="/start/customers/index.php?delete=<?= $items['id'] ?> "><i class=" text-danger fa-solid fa-trash"></i> </a></th>
            <th><a href="/start/customers/update.php?edit=<?= $items['id'] ?> "><i class="text-warning fa-solid fa-pen-to-square"></i> </a></th>
          </tr>

        <?php endforeach ?>
      </table>
    </div>
  </div>
</div>
<?php
include_once "../shared/script.php";
?>