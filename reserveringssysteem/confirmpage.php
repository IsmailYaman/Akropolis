<?php
include_once '../includes/confirmed.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once '../includes/bootstrap_link.php' ?>
    <link rel="stylesheet" href="../css/index.css">
    <title>Akropolis Naaldwijk | Reservering bevestigd</title>
</head>
<body>
<?php include_once '../includes/navbar_user.php' ?>
<?php if (empty($errors)): ?>
    <div class="container">
        <div class="card login">
            <div class="card  text-center">
                <h1 class="header-text">Reservering gelukt</h1>
            </div>

            <p class="text-center">Uw aanvraag is ontvangen en word verwerkt. U krijgt een mail als uw aanvraag is
                goedgekeurd.</p>

            <img class="text-center" src="../img/logo_small.png" width="250" height="auto" alt="">
            <div class="main-div text-center">
                <a href="index.php">
                    <button type="submit" name="submit" value="submit"
                            class="mb-0 p-2 mt-5 btn btn-primary standard-primary-button">Ga terug
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!--kijk hoe je dit kan fixen-->
    <?php //include_once '../includes/mail.php' ?>
<?php else: ?>
    Er zijn errors.
<?php endif; ?>


<?php include_once '../includes/footer.php' ?>
<?php include_once '../includes/bootstrap_script.php' ?>
</body>
</html>