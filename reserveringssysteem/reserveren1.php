<?php
require_once '../includes/beschikbare_tijden.php';
//require_once '../includes/form_validation.php';

$query = '';
if (isset($_POST['submit'])) {
    require_once '../includes/db.php';

    $date               = mysqli_escape_string($db, $_POST['date']);
    $people_amount      = mysqli_escape_string($db, $_POST['people_amount']);
    $time               = mysqli_escape_string($db, $_POST['time']);
    $comment            = mysqli_escape_string($db, $_POST['comment']);
    $first_name         = mysqli_escape_string($db, $_POST['first_name']);
    $last_name          = mysqli_escape_string($db, $_POST['last_name']);
    $email              = mysqli_escape_string($db, $_POST['email']);
    $phone              = mysqli_escape_string($db, $_POST['phone']);

    //Require the form validation handling
    require_once "../includes/form_validation.php";
    //Special check for add form only
    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO reservations(date, time, people_amount, first_name, last_name, phone, email, comment) VALUE ('$date', '$time', '$people_amount', '$first_name', '$last_name', '$phone', '$email', '$comment')";

        $result = mysqli_query($db, $query)
        or die('Error: '.$query);

        if ($result) {
            header('Location: confirmpage.php');
            exit;
        } else {
            $errors[] = 'Er is iets fout gegaan. Ptobeer op nieuw' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}
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
<?php require_once '../includes/navbar_user.php' ?>

<div class="container">
    <div class="card login">
        <div class="card  text-center">
            <h1 class="header-text">Reserveren</h1>
        </div>

        <div class="login-form">
            <div class="main-div">
                <div class="panel">

                </div>
                <form action="" method="post" >
                    <div class="form-group">
                        <label for="date">Datum</label>
                        <input type="date" class="form-control" name="date" id="date"/>
                    <?php if($errors){?>
                        <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                        <?php echo $errors['date']?>
                        </div>
                        <?php }else{}?>
                    </div>

                    <div class="form-group">
                        <label for="people_amount">Aantal personen</label>
                        <input type="number" class="form-control" name="people_amount" id="people_amount"/>
                        <?php if($errors == true){?>
                            <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                                <?php echo $errors['people_amount']?>
                            </div>
                        <?php }else {}?>
                    </div>


                    <div class="form-group">
                        <label for="time">Tijdstip</label>
                    <select class="form-control" id="time" name="time">
                        <option value="">Selecteer een tijdstip</option>
                        <?php foreach ($times as $time) { ?>
                            <option value="<?= $time ?>"><?= $time ?></option>
                        <?php } ?>
                    </select>
                        <?php if($errors == true){?>
                            <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                                <?php echo $errors['time']?>
                            </div>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Voornaam</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"/>
                        <?php if($errors == true){?>
                            <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                                <?php echo $errors['first_name']?>
                            </div>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Achternaam</label>
                        <input type="text" class="form-control" name="last_name" id="last_name"/>
                        <?php if($errors == true){?>
                            <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                                <?php echo $errors['last_name']?>
                            </div>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="number" class="form-control" name="phone" id="phone"/>
                        <?php if($errors == true){?>
                            <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                                <?php echo $errors['phone']?>
                            </div>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"/>
                        <?php if($errors == true){?>
                            <div class=" mt-2 mb-0 alert alert-warning" role="alert">
                                <?php echo $errors['email']?>
                            </div>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label for="comment">Opmerking (optioneel)</label>
                        <input type="text" class="form-control" name="comment" id="comment">
                    </div>

                    <button type="submit" name="submit" value="submit" class="btn btn-primary standard-primary-button">Volgende</button>

                </form>
            </div>

        </div>
    </div>
</div>

<?php require_once '../includes/footer.php' ?>
<?php require_once '../includes/bootstrap_script.php' ?>
</body>
</html>
