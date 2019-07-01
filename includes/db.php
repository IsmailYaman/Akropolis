<?php
$host       = "localhost";
$database   = "u54933p52213_akropolis";
$user       = "u54933p52213_akropolis";
$password   = "IsoYaman01!";
// login gegevens van de database

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;
// als de ingevulde gegevens verkeerd zijn geeft hij error
