<?php
require_once "../includes/db.php";
session_start(); //moet bij elke pagina waar iemand is ingelogd
// stuurt terug naar index pagina als de gebruiker niet ingelogd is
if (isset($_SESSION['name'])) {
    header('Location: index.php');
    exit;
}
//bij post submit, checkt de ingevulde gegevens
if (isset($_POST['submit'])) {
    //retrieve de gegevens van de persoon die inlogt
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = mysqli_escape_string($db, $_POST['password']);
    //Get wachtwoord & databse naam
    $query = "SELECT password, name FROM users
              WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
        //verify de wachtwoord
        if (password_verify($password, $user['password'])) {
            //Set session variable, redirect & exit script
            $_SESSION['name'] = $user['name'];
            header('Location: index.php');
            exit;
        } else {
            $message = "<strong>Fout!</strong> Je gebruikersnaam of wachtwoord is verkeerd. Probeer opnieuw.";
        }
    } else {
        $message = "<strong>Fout!</strong> Je gebruikersnaam of wachtwoord is verkeerd. Probeer opnieuw.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Akropolis Naaldwijk | Login</title>
    <?php require_once '../includes/bootstrap_link.php' ?>
    <link rel="stylesheet" href="../css/index.css   ">
</head>
<body>
<?php require_once '../includes/navbar_user.php' ?>

<div class="container">
    <div class="card login">
    <div class="card  text-center">
            <h1 class="header-text">Login</h1>
        </div>
        <div class="login-form">
            <div class="main-div text-center">

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="Login">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gebruikersnaam</label>
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="Gebruikersnaam" required/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Wachtwoord</label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Wachtwoord" required/>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary standard-primary-button">
                        Login
                    </button>
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