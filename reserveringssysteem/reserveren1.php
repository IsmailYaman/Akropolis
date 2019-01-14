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
    <?php require_once '../includes/bootstrap_link.php'?>
    <link rel="stylesheet" href="../css/index.css">
    <title>Akropolis Naaldwijk | Reserveren </title>
</head>
<body>
<?php require_once '../includes_user/navbar.php'?>

<div class="container">
    <div class="card login">
        <div class="card">
            <h1>Reserveren</h1>
         </div>
        <h3 class="text-center">Stap 1 van 2</h3>
        <div class="login-form">
            <img class="text-center" src="../img/logo_small.png" width="250" height="auto" alt="">
            <div class="main-div">
                <div class="panel">

                </div>
                <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" id="Login">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Gebruikersnaam" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Wachtwoord" required/>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Login</button>
                    <?php if (isset($message)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?= $message; ?></strong>
                            <button type="button button-danger" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                </form>
            </div>

        </div>
    </div>
</div>


<?php require_once '../includes/footer.php' ?>
<?php require_once '../includes/bootstrap_script.php' ?>
</body>
</html>
