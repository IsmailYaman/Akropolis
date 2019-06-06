<?php
include_once '../includes/db.php';

$times = [];
$time = strtotime('16:30');
while ($time <= strtotime('21:30')) {

    $times[] = date('H:i', $time);
    $time += 30 * 60;
}

$date = [];
var_dump($_POST);
//fix later
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
    <title>Akropolis Naaldwijk | Tijden blokkeren</title>
</head>
<body>
<?php include_once '../includes/navbar.php' ?>

<div class="container">
    <div class="card  text-center">
    </div>
    <div class="main-div-times">
        <div class="panel">

        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="date">Datum</label>
                <input type="date" class="form-control" name="date" id="date"/>
                <?php if (isset($errors )) { ?>
                    <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                        <?php echo $errors['date'] ?>
                    </div>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="time">Tijdstip</label>
                <select class="form-control" id="time" name="time">
                    <option value="">Selecteer een tijdstip</option>
                    <?php foreach ($times as $time) { ?>
                        <option value="<?= $time ?>"><?= $time ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($errors)) { ?>
                    <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                        <?php echo $errors['time'] ?>
                    </div>
                <?php } ?>
            </div>

            <input type="submit" name="submit" class="btn btn-primary standard-primary-button" value="Bevestig">

        </form>
    </div>


</div>
<?php
include_once '../includes/footer.php';
include_once '../includes/bootstrap_script.php'
?>
</body>
</html>