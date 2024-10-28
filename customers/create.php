<?php
include_once "../shared/config.php";
include_once "../shared/head.php";
include_once "../shared/nav.php";

?>
<div class="container col-6">
  <div class="card">
  <h1 class="text-center my-3 ">Create New </h1>
    <a href="./index.php" class="btn btn-info">list </a>
    <div class="card-body">
      <form action="./customer_request.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>customer name</label>
          <input type="text" class="form-control" name="full_name">
        </div>
        <div>
          <label>customer country</label>
          <input type="text" class="form-control" name="country">
        </div>
        <div>
          <label>customer age</label>
          <input type="number" class="form-control" name="age">
        </div>
        <div>
          <label>customer phone</label>
          <input type="text" class="form-control" name="phone">
        </div>
        <div>
        <label>customer image</label>
          <input type="file" class="form-control"  accept="image/*" name="image">
        </div>
        <div>
          <label>gender</label>
          <select class="form-control" name="gender">
            <option value="Male">Male </option>
            <option value="Female">Female </option>
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