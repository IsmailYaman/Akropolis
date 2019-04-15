<?php
include_once '../includes/db.php';

$reservationId = $_GET['id'];
$query = "DELETE FROM reservations WHERE id =" . mysqli_escape_string($db, $reservationId);

mysqli_query($db, $query) or die ('Error: ' . mysqli_error($db));


mysqli_close($db);

header('Location: ../adminpanel/reserveringen.php');
exit;
