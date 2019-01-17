<?php
require_once "../includes/db.php";

if (isset($_POST['submit'])) {
    //Require database in this file & image helpers


    $date =             mysqli_escape_string($db, $_POST['date']);
    $people_amount =    mysqli_escape_string($db, $_POST['people_amount']);
    $time =             mysqli_escape_string($db, $_POST['time']);
    $comment =          mysqli_escape_string($db, $_POST['comment']);
    $first_name =       mysqli_escape_string($db, $_POST['first_name']);
    $last_name =        mysqli_escape_string($db, $_POST['last_name']);
    $email =            mysqli_escape_string($db, $_POST['email']);
    $phone =            mysqli_escape_string($db, $_POST['phone']);

    //Require the form validation handling
    require_once "../includes/form_validation.php";
    //Special check for add form only
    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO reservations(date, time, people_amount, first_name, last_name, phone, email, comment) 
VALUE ('$date', '$time', '$people_amount', '$first_name', '$last_name', '$phone', '$email', '$comment')";

        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);

        if ($result) {
            header('Location: confirmpage.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    } else {
        var_dump($errors);
    }
}