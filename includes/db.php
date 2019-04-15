<?php
$host       = "localhost";
$database   = "akropolis";
$user       = "root";
$password   = "";
// login gegevens van de database

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;
// als de ingevulde gegevens verkeerd zijn geeft hij error
