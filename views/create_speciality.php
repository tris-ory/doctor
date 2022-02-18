<?php
$page_title = 'Liste des spécialités';
$actif = 'Spécialités';

require_once '../config.php';
require_once '../models/speciality.php';

include '../modules/head.php';
include '../modules/header.php';

$spec = new Speciality();
if(!empty($_POST)){
    if ($spec->insertNew($_POST['spec'])){
        header('Location: /views/insert_ok.php');
    } else {
        $err = "La spécialité existe déjà ou le nom n'est pas valide.";
    }
}
?>
<form method="POST">
    <label for="spec" class="form-label">Nom&nbsp;:<span class="text-danger"><?=isset($err)?$err:''?></span> </label>
    <input type="text" name="spec" id="spec" class="form-control" />
    <input type="submit" value="Envoyer" class="btn btn-primary" />
</form>