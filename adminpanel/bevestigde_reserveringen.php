<?php
session_start();
include_once '../includes/bootstrap_link.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once '../includes/bootstrap_link.php'; ?>
    <link rel="stylesheet" href="../css/index.css">
    <title>Akropolis Naaldwijk | Bevestigde reserveringen</title>
</head>
<body>
<?php include_once '../includes/navbar.php';?>
<nav style="background-color: #383232!important" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="reserveringen.php">Huidige reserveringen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="bevestigde_reserveringen.php">Bevestigde reserveringen</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

</body>
</html>

<?php
include_once '../includes/footer.php';
include_once '../includes/bootstrap_script.php';
?>
