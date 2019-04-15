<?php
include_once '../includes/db.php';

if (!isset($_GET['email'])) {

    header('Location: ../reserveringssysteem/index.php');
    exit;
}
$email = $_GET['email'];

$query = "SELECT * FROM reservations WHERE email =" . mysqli_escape_string($db, $email);

$result = mysqli_query($db, $query)
or die ('Error: ' . $query);

if (mysqli_num_rows($result) == 1) {
    $reservation = mysqli_fetch_assoc($result);
} else {
    // redirect when db returns no result
    header('Location: ../reserveringssysteem/index.php');
    exit;
}


mysqli_close($db);

//bruh fix later. naar wie stuurt hij de mail?
$to = $reservation['email'];
$subject = 'Reservering ontvangen';
$message = 'Uw verzoek is ontvangen en word verwerkt. U krijgt een bevestigingsmail zodra uw reservering is bevestigd ';
$headers = 'From: test@gmail.com' . "\r\n" .
    'Reply-To: test@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>