<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";

if(isset($_GET['edit'])){
  $id = $_GET['edit'];

$select = "SELECT * FROM customers WHERE id = $id";

$data = mysqli_query($connection, $select);
$row= mysqli_fetch_assoc($data);

if(isset($_POST['update'])) {
  $full_name = $_POST['full_name'];
  $country = $_POST['country'];
  $age = $_POST['age'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $update = "UPDATE customers SET full_name='$full_name' ,country='$country',age='$age',phone='$phone',gender='$gender' WHERE id =$id ";

   mysqli_query($connection, $update);
  header("location:/start/customers/index.php");
}
}
?>
<h1 class="text-center my-3"> Update </h1>
<div class="container col-6">
  <div class="card">
    <a href="./index.php" class="btn btn-info">list </a>
    <div class="card-body">
      <form  method="POST">
        <div class="form-group">
          <label>customer name</label>
          <input type="text" value="<?=$row['full_name']?>" class="form-control" name="full_name">
        </div>
        <div>
          <label>customer country</label>
          <input type="text" value="<?=$row['country']?>" class="form-control" name="country">
        </div>
        <div>
          <label>customer age</label>
          <input type="number" value="<?=$row['age']?>" class="form-control" name="age">
        </div>
        <div>
          <label>customer phone</label>
          <input type="text" value="<?=$row['phone']?>" class="form-control" name="phone">
        </div>
        <div>
          <label>gender</label>
          <select class="form-control" name="gender">
            <?php  if ($row['gender'] == 'Male') : ?>
            <option selected value="Male">Male </option>
            <option value="Female">Female </option>
            <?php else: ?>
              <option value="Male">Male </option>
              <option selected value="Female">Female </option>  
              <?php endif ?> 
          </select>
        </div>
    </div>
    </div>
    <button class="btn btn-warning my-4" name="update" type="Submit">Update </button>
    </form>
  </div>


<?php
include_once "../shared/script.php";
?>