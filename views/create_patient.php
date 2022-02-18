<?php
$page_title = 'Ajouter un médecin';
$actif = 'Médecins';

require_once '../config.php';
require_once '../models/patient.php';
require_once '../models/speciality.php';

require_once '../modules/head.php';
require_once '../modules/header.php';
$s = new Speciality();
$specs = $s->getAll();
unset($s);

function msgVoid($err){
    $result= str_replace('{err}', $err, 'veuillez préciser {err}.');
}
function msgInvalid($err){
    return str_replace('{err}', $err, '{err} est invalide.');
}

if(!empty($_POST)){
    $patient = new Patient();
    if (empty($_POST['firstname'])){
        $error['firstname'] = msgVoid('le prénom');
    } elseif(!$patient->setFirstname($_POST['firstname'])){
        $error['firstname'] = msgInvalid('Le prénom');
    }
    if (empty($_POST['lastname'])){
        $error['lastname'] = msgVoid('le nom');
    } elseif(!$patient->setLastname($_POST['lastname'])){
        $error['lastname'] = msgInvalid('Le nom');
    }
    if (empty($_POST['address'])){
        $error['address'] = msgVoid("l'adresse");
    } elseif(!$patient->setAddress($_POST['address'])){
        $error['address'] = msgInvalid("L'adresse");
    }
    if (empty($_POST['zipcode'])){
        $error['zipcode'] = msgVoid('le code postal');
    } elseif(!$patient->setZipcode($_POST['zipcode'])){
        $error['zipcode'] = msgInvalid('Le code postal');
    }
    if(empty($_POST['city'])){
        $error['city'] = msgVoid('la ville');
    }elseif(!$patient->setCity($_POST['city'])){
        $error['city'] = msgInvalid('La ville');
    }
    if(empty($_POST['phone'])){
        $error['phone'] = msgVoid('le numéro de téléphone');
    } elseif(!$patient->setPhone($_POST['phone'])){
        $error['phone'] = msgInvalid('Le numéro de téléphone');
    }
    // If the field is not (empty or correspond to the pattern) store error msg 
    if(!(empty($_POST['phone2']) || $patient->setAltPhone($_POST['phone2']))){
        $error['phone2'] = msgInvalid('Le numéro secondaire');
    }
    if(empty($_POST['mail'])){
        $error['mail'] = msgVoid("l'adresse mail");
    } elseif(!$patient->setMail($_POST['mail'])){
        $error['mail'] = msgInvalid("L'adresse mail");
    }
    // If no error, $patient can be insert in table
    if(!isset($error)){
       if($patient->insert()){
           header('location: insert_ok.php');
       }
    }
}
?>
<form method="POST" class="container">
    <fieldset class="row">
        <legend class="col-12">&Eacute;tat civil</legend>
        <div class="col-4">
            <label for="lastname" class="form-label">Nom&nbsp;: <span class="text-danger"><?=empty($error['lastname'])?'':$error['lastname']?></span></label>
            <input type="text" name="lastname" id="lastname" class="form-control" />
        </div>
        <div class="col-4">
            <label for="firstname" class="form-label">Prénom&nbsp;: <span class="text-danger"><?=empty($error['firstname'])?'':$error['firstname']?></span></label>
            <input type="text" name="firstname" id="firstname" class="form-control" />
        </div>
    </fieldset>
    <fieldset class="row">
        <legend col="col-12">Contact&nbsp;: <span class="text-danger"><?=empty($error['address'])?'':$error['address']?></span></legend>
        <div class="col-5">
            <label for="address" class="form-label">Adresse&nbsp;: <span class="text-danger"><?=empty($error['address'])?'':$error['address']?></span></label>
            <input type="text" name="address" id="address" class="form-control" />
        </div>
        <div class="col-2">
            <label for="zipcode" class="form-label">Code postal&nbsp;: <span class="text-danger"><?=empty($error['zipcode'])?'':$error['zipcode']?></span></label>
            <input type="text" name="zipcode" id="zipcode" class="form-control" />
        </div>
        <div class="col-5">
            <label for="city" class="form-label">Ville&nbsp;: <span class="text-danger"><?=empty($error['city'])?'':$error['city']?></span></label>
            <input type="text" name="city" id="city" class="form-control" />
        </div>
        <div class="col-5">
            <label for="phone" class="form-label">Téléphone&nbsp;: <span class="text-danger"><?=empty($error['phone'])?'':$error['phone']?></span></label>
            <input type="text" name="phone" id="phone" class="form-control" />
        </div>
        <div class="col-5">
            <label for="phone2" class="form-label">Téléphone alternatif&nbsp;: <span class="text-danger"><?=empty($error['phone2'])?'':$error['phone2']?></span></label>
            <input type="text" name="phone2" id="phone2" class="form-control" />
        </div>
        <div class="col-5">
            <label for="mail">Adresse mail&nbsp;: <span class="text-danger"><?=empty($error['mail'])?'':$error['mail']?></span></label>
            <input type="mail" name="mail" id="mail" class="form-control" />
        </div>
    </fieldset>
    <fieldset class="row">
        <div class="col-1">
            <input class="btn btn-primary" type="submit" value="Envoyer"/>
        </div>
    </fieldset>
</form>
<?php
include '../modules/footer.php';