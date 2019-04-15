<?php

require_once "../includes/db.php";

$username   = "petros";
$password   = password_hash("test123", PASSWORD_DEFAULT);
$name       = "Petros";

$query = "INSERT INTO users (username, password, name)
          VALUES ('$username', '$password', '$name')";
mysqli_query($db, $query);