<?php

require_once '../includes/db.php';

if (isset($_POST["submit"])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people_amount = $_POST['people_amount'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $query = "INSERT INTO reservations(date, time, people_amount, first_name, last_name, phone, email, comment) VALUE ('$date', '$time', '$people_amount', '$first_name', '$last_name', '$phone', '$email', '$comment')";
    $upload = mysqli_query($db, $query) or die("Error: " . mysqli_error($db). '<br> Query:'.$query);
    header('Location: confirmpage.php');
}