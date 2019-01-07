<?php
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    require_once "../includes/db.php";

    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $people_amount   = mysqli_escape_string($db, $_POST['people_amount']);
    $time  = mysqli_escape_string($db, $_POST['time']);
    $comment   = mysqli_escape_string($db, $_POST['comment']);
    $first_name = mysqli_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_escape_string($db, $_POST['last_name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $phone = mysqli_escape_string($db, $_POST['phone']);

    //Require the form validation handling
    require_once "../includes/form_validation.php";

    //Special check for add form only
    if ($_FILES['image']['error'] == 4) {
        $errors[] = 'Image cannot be empty';
    }

    if (empty($errors)) {
        //Store image & retrieve name for database saving
        $image = addImageFile($_FILES['image']);

        //Save the record to the database
        $query = "INSERT INTO albums (name, artist, genre, year, tracks, image)
                  VALUES ('$name', '$artist', '$genre', $year, $tracks, '$image')";
        $result = mysqli_query($db, $query)
        or die('Error: '.$query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="artist">Artist</label>
        <input id="artist" type="text" name="artist" value="<?= isset($artist) ? $artist : '' ?>"/>
        <span class="errors"><?= isset($errors['artist']) ? $errors['artist'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="name">Album</label>
        <input id="name" type="text" name="name" value="<?= isset($name) ? $name : '' ?>"/>
        <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value="<?= isset($genre) ? $genre : '' ?>"/>
        <span class="errors"><?= isset($errors['genre']) ? $errors['genre'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value="<?= isset($year) ? $year : '' ?>"/>
        <span class="errors"><?= isset($errors['year']) ? $errors['year'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value="<?= isset($tracks) ? $tracks : '' ?>"/>
        <span class="errors"><?= isset($errors['tracks']) ? $errors['tracks'] : '' ?></span>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>