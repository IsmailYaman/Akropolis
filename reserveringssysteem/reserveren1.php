<?php
require_once '../includes/form_validation.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require_once '../includes/bootstrap_link.php' ?>
    <link rel="stylesheet" href="../css/index.css">
    <title>Akropolis Naaldwijk | Reserveren </title>
</head>
<body>
<?php require_once '../includes_user/navbar.php' ?>

<div class="container">
    <div class="card login">
        <div class="card  text-center">
            <h1 class="header-text">Reserveren</h1>
        </div>
        <h3 class="text-center">Stap 1 van 2</h3>
        <div class="login-form">

            <div class="main-div">
                <div class="panel">

                </div>
                <form action="confirmed.php" method="POST" id="Login">
                    <div class="form-group">
                        <label for="date">Datum</label>
                        <input type="date" class="form-control" name="date" id="date" required/>
                    </div>
                    <div class="form-group">
                        <label for="people_amount">Aantal personen</label>
                        <input type="text" class="form-control" name="people_amount" id="people_amount" required/>
                    </div>
                    <div class="form-group">
                        <label for="time">Tijdstip</label>
                        <input type="time" class="form-control" name="time" id="time" required/>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Voornaam</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required/>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Achternaam</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="number" class="form-control" name="phone" id="phone" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required/>
                    </div>
                    <div class="form-group">
                        <label for="comment">Opmerking (optioneel)</label>
                        <input type="text" class="form-control" name="comment" id="comment">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary"><a
                                href="confirmpage.php">Volgende</a></button>
                    <!--                    --><?php //if (isset($message)) { ?>
                    <!--                        <div class="alert alert-warning alert-dismissible fade show" role="alert">-->
                    <!--                            <strong>--><? //= $message; ?><!--</strong>-->
                    <!--                            <button type="button button-danger" class="close" data-dismiss="alert" aria-label="Close">-->
                    <!--                                <span aria-hidden="true">&times;</span>-->
                    <!--                            </button>-->
                    <!--                        </div>-->
                    <!--                    --><?php //} ?>
                </form>
            </div>

        </div>
    </div>
</div>


<?php require_once '../includes/footer.php' ?>
<?php require_once '../includes/bootstrap_script.php' ?>
</body>
</html>
