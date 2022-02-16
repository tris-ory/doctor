<?php
    $page_title = 'Nouveau médecin';
    $actif = 'Médecins';
    // Regexes
    $rx_zip = '/^\d{5}$/';
    $rx_phone = '/^\d{10$/';

    require_once '../includes/db.php';

    if(!empty($_POST)):
        // If form was send
        // First we test the fields
        if(empty($_POST['lastname'])){
            $err['firstname'] = 'Vous n\'avez pas saisi de nom';
        } elseif (strlen($_POST['lastname']) > 50){
            $err['firstname'] = 'Nous ne pouvons enregistrer de nom de plus de 50 caractères';
        } else {
            $fields['firstname'] = htmlspecialchars($_POST['firstname']);
        }
        if(empty($_POST['firstname'])){
            $err['firstname'] = 'Vous n\'avez pas saisi de prénom';
        } elseif (strlen($_POST['firstname'])>50){
            $err['firstname'] = 'Nous ne pouvons enregistrer de prénom de plus de 50 caractères';
        } else {
            $fields['lastname'] = htmlspecialchars($_POST['lastname']);
        }
        if(empty($_POST['address'])){
            $err['address'] = 'Vous n\'avez pas saisi d\'adresse';
        } elseif (strlen($_POST['address'])>255){
            $error_count++;
            $err['address'] = 'Nous ne pouvons enregistrer d\'adresse de plus de 255 caractères';
        } else {
            $fields['address'] = htmlspecialchars($_POST['address']);
        }
        if(empty($_POST['zipcode'])){
            $err['zipcode'] = 'Vous n\'avez pas saisi de code postal';
        } elseif (!preg_match($rx_zip, $_POST['zipcode'])) {
            $err['zipcode'] = 'Le code postal doit comporter exactement 5 chiffres';
        } else {
            $fields['zipcode'] = $_POST['zipcode'];
        }
        if(empty($_POST['city'])){
            $err['city'] = 'Vous n\'avez pas saisi de nom de ville';
        } elseif (strlen($_POST['city'])>50) {
            $err['city'] = 'Nous ne pouvons enregistrer de nom de ville de plus de 50 caractères';
        } else {
            $fields['city'] = $_POST['city'];
        }
        if(empty($_POST['phone'])){
            $err['phone'] = 'Vous n\'avez pas saisi de n° de téléphone';
        } elseif (!preg_match($rx_phone, $_POST['phone'])){
            $err['phone'] = 'Le n° de téléphone doit comporter exactement 10 chiffres';
        } else {
            $fields['phone'] = $_POST['phone'];
        }
        if(!empty($_POST['phone2'])){
            if(!preg_match($rx_phone, $_POST['phone2'])){
                $err['phone2'] = 'Le n° de téléphone doit comporter exactement 10 chiffres';
            } else {
                $fields['phone2'] = $_POST['phone2'];
            }
        }
        if(empty($_POST['mail'])){
            $err['mail'] = 'Vous n\'avez pas saisi de mail';
        } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $err['mail'] = 'Le format de l\'adresse mail est invalide';
        } else {
            $fields['mail'] = $_POST['mail'];
        }
        if (empty($_POST['speciality'])){
            $err['speciality'] = 'Vous n\'avez pas choisi de spécialité';
        } elseif ($_POST['speciality'] <= 0) {
            $err['speciality'] = 'Vous avez choisi une spécialité invalide';
        } else {
            $fields['speciality'] = $_POST['speciality'];
        }
    else:
        include '../modules/head.php';
        include '../modules/header.php';
?>

<form class="row" method="post">
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="lastname">Nom&nbsp;:</label>
        <input class="form-control" type="text" name="lastname" id="lastname" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="firstname">Prénom&nbsp;:</label>
        <input class="form-control" type="text" name="firstname" id="lastname" placeholder="Bon" />
    </div>
    <div class="mx-1 my-1 form-floating col-6">
        <label class="form-label" for="address">Adresse&nbsp;:</label>
        <input class="form-control" type="text" name="address" id="address" />
    </div>
    <div class="mx-1 my-1 form-floating col-2">
        <label class="form-label" for="zipcode">Code postal&nbsp;</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" maxlength="5" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="city">Ville&nbsp;:</label>
        <input class="form-control" type="text" name="city" id="city" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="phone">Téléphone principal&nbsp;:</label>
        <input class="form-control" type="text" name="phone" id="phone" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="phone2">Téléphone secondaire&nbsp;:</label>
        <input class="form-control" type="text" name="phone2" id="phone2" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="mail">E-mail&nbsp;:</label>
        <input class="form-control" type="email" name="mail" id="mail" />
    </div>
    <div class="mx-1 my-1 col-4">
        <?php include_once '../modules/select_spec.php'; ?>
    </div>
    <div class="mx-1 my-1 col-4">
        <input type="submit" value="Envoyer" class="btn btn-primary" />
    </div>
</form>
                    
<?php
    endif;

