<?php
 include_once 'confirmed.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once '../includes/bootstrap_link.php'?>
    <link rel="stylesheet" href="../css/index.css">
    <title>Akropolis Naaldwijk | Reservering bevestigd</title>
</head>
<body>
<?php include_once '../includes_user/navbar.php'?>
<div class="container">
    <div class="card login">
        <div class="card  text-center">
            <h1 class="header-text" style="max-width: 17em; padding: 10px;">Reservering gelukt</h1>
        </div>

        <p class="text-center">Uw reservering is ontvangen en word verwerkt. U krijgt een mail als uw reservering is goedgekeurd.</p>
        <div class="login-form">
            <img class="text-center" src="../img/logo_small.png" width="250" height="auto" alt="">
            <div class="main-div">
                <div class="panel">

                </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary"><a href="index.php">Ga terug</a></button>
                        </div>


                </form>
            </div>

        </div>
    </div>
</div>
<h1>Reservering gelukt</h1>
<?php var_dump($query); ?>

<a href="index.php" class="btn btn-success">Ga terug</a>
<?php include_once '../includes/footer.php'?>
<?php include_once '../includes/bootstrap_script.php'?>
</body>
</html>