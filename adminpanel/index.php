<?php
session_start();//moet bij elk pagina waar gebruiker is ingelogt

//stuurt naar de login pagina als die ziet dat de gebruiker niet bestaat.
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

require_once '../includes/db.php';
$sql = "SELECT count(id) AS total FROM reservations WHERE confirmed = 0";
$result = mysqli_query($db, $sql);
$values = mysqli_fetch_assoc($result);
$num_rows = $values['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Akropolis Naaldwijk | Adminpaneel</title>
    <link rel="stylesheet" href="../css/index.css">
    <?php require_once '../includes/bootstrap_link.php' ?>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<?php require_once '../includes/navbar.php' ?>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <div class="container">
        <div class="my-2">
            <h1>Hallo <?php echo $_SESSION['name'] ?></h1>
            <h2>Je hebt op dit moment <a href="reserveringen.php"><?= $num_rows; ?></a> reserveringen die bevestigd
                moeten worden. </h2>
        </div>
    </div>


<?php
include_once '../includes/footer.php';
require_once '../includes/bootstrap_script.php'
?>
</body>
</html>