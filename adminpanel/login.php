<?php
require_once "../includes/db.php";
session_start();
//If already logged in, no need to be here
if (isset($_SESSION['name'])) {
    header('Location: index.php');
    exit;
}
//On post submit, check the credentials
if (isset($_POST['submit'])) {
    //Retrieve values (email safe for query)
    $username = mysqli_escape_string($db, $_POST['username']);
    $password = $_POST['password'];
    //Get password & name from DB
    $query = "SELECT password, name FROM users
              WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    //Go on if we got an user (which means email is correct)
    if ($user) {
        //Validate password
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
    <title>kropolis Naaldwijk | Login</title>
    <?php require_once '../includes/bootstrap_link.php' ?>
    <link rel="stylesheet" href="../css/index.css   ">
</head>
<body>
<?php require_once '../includes_user/navbar.php' ?>

<div class="container">
    <div class="card login">
    <h1 class="text-center">Login Akropolis</h1>
    <div class="login-form">
        <img class="text-center" src="../img/logo_small.png" width="250" height="auto" alt="">
        <div class="main-div">
            <div class="panel">

            </div>
            <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" id="Login">
                <div class="form-group">
                    <label for="exampleInputEmail1">Gebruikersnaam</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Gebruikersnaam" required/>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Wachtwoord</label>
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