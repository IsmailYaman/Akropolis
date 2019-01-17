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
    <?php include_once '../includes/bootstrap_link.php'?>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<?php
include_once '../includes/navbar.php'
?>
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
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



<?php
include_once '../includes/footer.php';
include_once '../includes/bootstrap_script.php';
?>
</body>
</html>