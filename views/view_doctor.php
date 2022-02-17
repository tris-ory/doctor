<?php
$page_title = 'Liste des médecins';
$actif = 'Médecins';

include '../config.php';
include '../models/doctor.php';

include '../modules/head.php';
include '../modules/header.php';

$arr = $db->query('SELECT `lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, `phone2`, `mail`, `speciality`.`name` AS `spec` FROM `doctors` INNER JOIN  `speciality` ON `spec_id` = `speciality`.`id` ')
    ->fetchAll();
var_dump($arr[0]);
?>

<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Ville</th>
        <th>N° de téléphone</th>
        <th>N° de téléphone secondaire</th>
        <th>E-Mail</th>
        <th>Spécialité</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($arr as $row): ?>
        <tr>
            <td><?= $row['lastname'] ?></td>
            <td><?= $row['firstname'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><?= $row['zipcode'] ?></td>
            <td><?= $row['city'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= is_null($row['phone2'])?'':$row['phone2'] ?></td>
            <td><?= $row['mail'] ?></td>
            <td><?= $row['spec'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>