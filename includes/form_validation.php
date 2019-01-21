<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($date == "") {
    $errors['date'] = 'Selecteer een datum.';
}
if ($people_amount == "") {
    $errors['people_amount'] = 'Selecteer aantal personen.';
}elseif ($people_amount <= "0" || $people_amount>= "16"){
    $errors['people_amount'] = 'Maximaal aantal personen zijn 15.';
}
if ($time == "") {
    $errors['time'] = 'Selecteer een tijdstip.';
}elseif ($time <= "16:29" || $time >= "21:31"){
    $errors['time'] = 'Selecteer een tijdstip tussen 16:30 en 21:30.';
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
