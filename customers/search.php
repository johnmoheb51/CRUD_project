<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";
$counter = 1;


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

if(isset($_POST['search_value'])){
  $search_value=$_POST['search_value'];

$select = "SELECT * FROM customers WHERE full_name LIKE '%$search_value%' ORDER BY id DESC";
$data = mysqli_query($connection, $select);
 $numRows= mysqli_num_rows($data);
 if( $numRows==0){

  $select = "SELECT * FROM customers WHERE phone LIKE '%$search_value%' ORDER BY id DESC";
$data = mysqli_query($connection, $select);
 $numRows= mysqli_num_rows($data);
 if( $numRows==0){
  $_SESSION['Message']= "NOT FOUND";
 }

}
}


?>
<div class="container col-md-8">
  <div class="card">
    <h1 class="text-center my-3 "> List All Customer Table <a href="./create.php" class="btn btn-info">Create New </a>
    </h1>
    <?php if (isset($_SESSION['Message'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $_SESSION['Message']  ;

  ?>
  <a href="index.php?clear=done"  class="btn-close" aria-label="Close"></a>
      </div>
    <?php endif; ?>
    <div class="card-body">
      <form action="">
        <div class="form-group my-4">
          <div class="row">
            <div class="col-md-9">
              <input type="text" id="myInput"  value="<?=$_POST['search_value'] ?>" name="search_value" placeholder=" Search By Name" class="form-control my-0">
            </div>
            <div class="col-md-3">
              <div class="d-grid">
                <button class="btn btn-info" >search </button>
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