<?php
session_start();
//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}
//Get variable from session to use
$name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>CMS</title>
</head>
<body>
<h1>CMS</h1>

<div>
    Welkom <?= $name; ?>, Je bent ingelogd en mag nu van alles doen!
</div>
<div>
    <a href="logout.php">logout</a>
</div>
</body>
</html>