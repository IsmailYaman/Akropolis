<?php
require_once "../includes/db.php";


if (isset($_POST['submit'])) {

    $date           = mysqli_escape_string($db, $_POST['date']);
    $people_amount  = mysqli_escape_string($db, $_POST['people_amount']);
    $time           = mysqli_escape_string($db, $_POST['time']);
    $comment        = mysqli_escape_string($db, $_POST['comment']);
    $first_name     = mysqli_escape_string($db, $_POST['first_name']);
    $last_name      = mysqli_escape_string($db, $_POST['last_name']);
    $email          = mysqli_escape_string($db, $_POST['email']);
    $phone          = mysqli_escape_string($db, $_POST['phone']);

    require_once "../includes/form_validation.php";

    if (empty($errors)) {
        $query = "INSERT INTO reservations(date, time, people_amount, first_name, last_name, phone, email, comment) 
                  VALUE ('$date', '$time', '$people_amount', '$first_name', '$last_name', '$phone', '$email', '$comment')";

        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);

        if ($result) {
            header('Location: confirmpage.php');
            exit;
        } else {
            $errors[] = 'Er is iets mis gegaan met de database query: '. mysqli_error($db);
        }


        mysqli_close($db);
    } else {
        var_dump($errors);
    }
}