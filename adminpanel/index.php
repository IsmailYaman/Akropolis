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
    <link rel="stylesheet"
          href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
</head>
<body>
<div class="mx-auto">
<div class="row justify-content-center">
    <img class="logo" src="../img/logo.png" alt="">
</div>
</div>
<nav style="background-color: #383232!important" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="reserveringen.php">Reserveringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="tijden_blokkeren.php">Tijden blokkeren</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h1>CMS</h1>

<div>
    Welkom <?= $name; ?>, Je bent ingelogd en mag nu van alles doen!
</div>
<div>
    <a href="logout.php">logout</a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script>$(document).ready(function () {
        $('body').bootstrapMaterialDesign();
    });</script>
</body>
</html>