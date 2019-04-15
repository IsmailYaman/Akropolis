<?php
session_start();

session_destroy(); //verwijderd de hele sessie
header('Location: ../reserveringssysteem/index.php');
exit;