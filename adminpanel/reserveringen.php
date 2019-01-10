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
$query = "SELECT * FROM reservations";
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
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
</head>
<body>
<div class="mx-auto">
    <div class="row justify-content-center">
        <img class="logo" src="../img/logo.png" alt="">
    </div>
</div>
<nav style="background-color: #383232!important" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="reserveringen.php">Reserveringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="tijden_blokkeren.php">Tijden blokkeren</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="logout.php">Uitloggen</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Datum</th>
            <th scope="col">Aantal personen</th>
            <th scope="col">Tijdstip</th>
            <th scope="col">Opmerking</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefoon</th>

            <th colspan="3"></th>
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
                <td><?= $reservation['phone']; ?></td>
                <!--            <td><a href="detail.php?id=--><? //= $reservation['id']; ?><!--">Details</a></td>-->
                <!--            <td><a href="edit.php?id=--><? //= $reservation['id']; ?><!--">Edit</a></td>-->
                <!--            <td><a href="delete.php?id=--><? //= $reservation['id']; ?><!--&image=-->
                <? //= $musicAlbum['image']; ?><!--">Delete</a></td>-->
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>
</body>
</html>