<?php
include_once '../includes/db.php';

//pakt de id van de reservering waarop je hebt geklikt
$reservationId = $_GET['id'];

$query = "UPDATE reservations SET confirmed = 1 WHERE id=" . mysqli_escape_string($db, $reservationId);
mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));

//Close connection
mysqli_close($db);

header('Location: ../adminpanel/reserveringen.php');
