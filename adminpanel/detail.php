<?php
if (!isset($_GET['id'])) {
    // redirect to index.php
    header('Location: ../adminpanel/reserveringen.php');
    exit;
}
//Require database in this file
require_once "../includes/db.php";

//Retrieve the GET parameter from the 'Super global'
$reservationId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM reservations WHERE id =".mysqli_escape_string($db, $reservationId);

$result = mysqli_query($db, $query)
or die ('Error: ' . $query);

if (mysqli_num_rows($result) == 1) {
    $reservation = mysqli_fetch_assoc($result);
} else {
    // redirect when db returns no result
    header('Location: ../adminpanel/reserveringen.php');
    exit;
}

//Close connection
mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?= include_once '../includes/bootstrap_link.php' ?>
    <link rel="stylesheet" href="../css/index.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Akropolis Naaldwijk | Detailpagina reservering</title>
</head>
<body>
<?= include_once '../includes/navbar.php' ?>
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">Reserveringsnummer: <?= $reservation['id']; ?></li>
        <li class="list-group-item">Datum: <?= $reservation['date']; ?></li>
        <li class="list-group-item">Aantal personen: <?= $reservation['people_amount']; ?></li>
        <li class="list-group-item">Tijdstip: <?= $reservation['time']; ?></li>
        <li class="list-group-item">Voornaam: <?= $reservation['first_name']; ?></li>
        <li class="list-group-item">Achternaam: <?= $reservation['last_name']; ?></li>
        <li class="list-group-item">E-mail: <?= $reservation['email']; ?></li>
        <li class="list-group-item">Telefoonnummer: 0<?= $reservation['phone']; ?></li>
        <li class="list-group-item">Opmerking: <?= $reservation['comment']; ?></li>
    </ul>
</div>
<div>

    <?= include_once '../includes/footer.php' ?>
    <?= include_once '../includes/bootstrap_script.php' ?>
</body>
</html>


