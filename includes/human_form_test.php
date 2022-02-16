<?php
/**
 * This file contain all the test code for the values send with the form defined in
 * /modules/human_form.php. The errors are compiled into $err, an associative array
 * and the valid fields are compiled into $fields, another associative array.
 */

// Regexes
$rx_zip = '/^\d{5}$/';
$rx_phone = '/^\d{10$/';
$rx_string50 = '/^[a-zA-Z\s-]{1,50}$/';
$rx_string255 = '/^[a-zA-Z\s\d-]{1,255}$/';

if (empty($_POST['lastname'])) {
    $err['firstname'] = 'Vous n\'avez pas saisi de nom';
} elseif (!preg_match($rx_string50, $_POST['lastname'])) {
    $err['firstname'] = 'Le nom saisi est invalide';
} else {
    $fields['firstname'] = $_POST['firstname'];
}
if (empty($_POST['firstname'])) {
    $err['firstname'] = 'Vous n\'avez pas saisi de prénom';
} elseif (!preg_match($rx_string50, $_POST['firstname'])) {
    $err['firstname'] = 'Le prénom saisi est invalide';
} else {
    $fields['firstname'] = $_POST['firstname'];
}
if (empty($_POST['address'])) {
    $err['address'] = 'Vous n\'avez pas saisi d\'adresse';
} elseif (!preg_match($rx_string255, $_POST['address'])) {
    $err['address'] = 'Nous ne pouvons enregistrer d\'adresse de plus de 255 caractères';
} else {
    $fields['address'] = $_POST['address'];
}
if (empty($_POST['zipcode'])) {
    $err['zipcode'] = 'Vous n\'avez pas saisi de code postal';
} elseif (!preg_match($rx_zip, $_POST['zipcode'])) {
    $err['zipcode'] = 'Le code postal doit comporter exactement 5 chiffres';
} else {
    $fields['zipcode'] = $_POST['zipcode'];
}
if (empty($_POST['city'])) {
    $err['city'] = 'Vous n\'avez pas saisi de nom de ville';
} elseif (!preg_match($rx_string50, $_POST['city'])) {
    $err['city'] = 'Le nom de ville n\'est pas valide';
} else {
    $fields['city'] = $_POST['city'];
}
if (empty($_POST['phone'])) {
    $err['phone'] = 'Vous n\'avez pas saisi de n° de téléphone';
} elseif (!preg_match($rx_phone, $_POST['phone'])) {
    $err['phone'] = 'Le n° de téléphone doit comporter exactement 10 chiffres';
} else {
    $fields['phone'] = $_POST['phone'];
}
if (!empty($_POST['phone2'])) {
    if (!preg_match($rx_phone, $_POST['phone2'])) {
        $err['phone2'] = 'Le n° de téléphone doit comporter exactement 10 chiffres';
    } else {
        $fields['phone2'] = $_POST['phone2'];
    }
}
if (empty($_POST['mail'])) {
    $err['mail'] = 'Vous n\'avez pas saisi de mail';
} elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $err['mail'] = 'Le format de l\'adresse mail est invalide';
} else {
    $fields['mail'] = $_POST['mail'];
}
if (empty($_POST['speciality'])) {
    $err['speciality'] = 'Vous n\'avez pas choisi de spécialité';
} elseif ($_POST['speciality'] <= 0) {
    $err['speciality'] = 'Vous avez choisi une spécialité invalide';
} else {
    $fields['speciality'] = $_POST['speciality'];
}