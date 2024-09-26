<?php 
print_r(value: $_GET); 
if(isset($_GET['btn']))
{
    $email=$_GET['email'] ; 
    $password=$_GET['password'] ; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <form>
                <input type="text"  name="email" placeholder="email"> 
                <input type="password" name="password" placeholder="password">

        <button class="btn btn-info">submit</button>
  
    </form>
<h1> "your email is :"<?php echo $email   ?> </h1>
<h1> "your password is :<?php echo $password   ?> </h1>
</body>
</html>

