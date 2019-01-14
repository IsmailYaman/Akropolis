<?php
session_start();
include_once '../includes/test.php';
require_once '../includes/db.php';
$sql = "SELECT count(id) AS total FROM reservations";
$result = mysqli_query($db, $sql);
$values = mysqli_fetch_assoc($result);
$num_rows = $values['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Akropolis Naaldwijk | Adminpaneel</title>
    <?php require_once '../includes/bootstrap_link.php' ?>
</head>
<body>
<?php require_once '../includes/navbar.php' ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<div class="card">
    <div class="container">
        <div class="my-2">
            <h1>Hallo <?php echo $_SESSION['name'] ?></h1>
            <h2>Je hebt op dit moment <a href="reserveringen.php"><?= $num_rows; ?></a> reserveringen die bevestigd
                moeten worden. </h2>
        </div>
    </div>
</div>

<?php

?>

<?php require_once '../includes/bootstrap_script.php' ?>
</body>
</html>