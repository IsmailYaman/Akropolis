<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($date == "") {
    $errors['date'] = 'Selecteer een datum.';
}
if ($people_amount == "") {
    $errors['people_amount'] = 'Selecteer aantal personen.';
}
if ($time == "") {
    $errors['time'] = 'Selecteer een tijdstip.';
}

if ($first_name == "") {
    $errors['first_name'] = 'Voer uw voornaam in.';
}
if ($last_name == "") {
    $errors['last_name'] = 'Voer uw achternaam in.';
}

if ($email == "") {
    $errors['email'] = 'Voer uw e-mail in.';
}
if ($phone == "") {
    $errors['phone'] = 'Voer uw telefoonnummer in.';
}