<?php SESSION_start();
//include_once "Macintosh/HD/Applications/XAMPP/xamppfiles/htdocs/start/shared";
include_once "/Applications/XAMPP/xamppfiles/htdocs/start/shared/config.php";

$select = "SELECT color FROM theem ";
$data = mysqli_query($connection, $select);
$row = mysqli_fetch_assoc($data);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>johnn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/start/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <?php if ($row['color'] == 'dark'):  ?>
        <link rel="stylesheet" href="/start/css/dark.css">
    <?php else: ?>
        <link rel="stylesheet" href="/start/css/main.css">
    <?php endif ?>
</head>

<body>