<?Php
$host = "localhost";
$user = "root";
$pass = "";
$DBname = "round30_st";

$connection = mysqli_connect($host, $user, $pass, $DBname);
try {
  $connection = mysqli_connect($host, $user, $pass, $DBname);
  //  echo "true connection";
} catch (Exception $e) {
  echo $e->getmessage();

}


?>