<?php
require_once '../includes/db.php';
session_start();
?>
<html lang="en">
<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <title>Akropolis Naaldwijk | Home</title>
</head>
<body>
<?php require_once '../includes/navbar_user.php' ?>

<h1 class="text-center my-3">Welkom bij Grieks Restaurant Akropolis Naaldwijk.</h1>
<?php
//include_once '../includes/db.php';
//
//$times = [];
//$time = strtotime('16:30');
//while ($time <= strtotime('21:30')) {
//
//    $times[] = date('H:i', $time);
//
//}
//
//$date = mysqli_escape_string($db, $_GET['date']);
//
//print_r($date);
?>

<?php require_once '../includes/footer.php'?>
<?php require_once '../includes/bootstrap_script.php' ?>
</body>
</html>
