
<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}
//Get variable from session to use
$name = $_SESSION['name'];

require_once "../includes/db.php";

//Get the result set from the database with a SQL query
$query = "SELECT * FROM reservations WHERE confirmed = 1";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

//Loop through the result to create a custom array
$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

//Close connection
mysqli_close($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Akropolis Naaldwijk | Adminpaneel</title>
    <?php include_once '../includes/bootstrap_link.php'?>
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<?php
include_once '../includes/navbar.php'
?>
<nav style="background-color: #383232!important" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="reserveringen.php">Openstaande reserveringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="bevestigde_reserveringen.php">Bevestigde reserveringen</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Reserveringsnummer</th>
        <th scope="col">Datum</th>
        <th scope="col">Aantal personen</th>
        <th scope="col">Tijdstip</th>
        <th scope="col">Opmerking</th>
        <th scope="col">Voornaam</th>
        <th scope="col">Achternaam</th>
        <th scope="col">E-mail</th>
        <th scope="col">Telefoon</th>
        <th scope="col">Bekijk</th>
        <th colspan="3">Wis</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reservations as $reservation) { ?>
        <tr>
            <td><?= $reservation['id']; ?></td>
            <td><?= $reservation['date']; ?></td>
            <td><?= $reservation['people_amount']; ?></td>
            <td><?= $reservation['time']; ?></td>
            <td><?= $reservation['comment']; ?></td>
            <td><?= $reservation['first_name']; ?></td>
            <td><?= $reservation['last_name']; ?></td>
            <td><?= $reservation['email']; ?></td>
            <td>0<?= $reservation['phone']; ?></td>
            <td><a href="detail.php?id=<?=$reservation['id']?>">Bekijk</a></td>
            <td><a href="delete_confirmed.php?id=<?=$reservation['id']?>"><i style="color: red; font-size: 2rem ;" class="material-icons">clear</i></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php
include_once '../includes/footer.php';
include_once '../includes/bootstrap_script.php';
?>
</body>
</html>