<?php
    $page_title = 'Liste des médecins';
    $actif = 'Médecins';
    
    include '../includes/db.php';

    include '../modules/head.php';
    include '../modules/header.php';

    $query = 'SELECT `doctors`.`id` AS `doc_id`, `firstname`, `lastname`,';
    $query .= ' `speciality`.`name` AS `spec` FROM `doctors` INNER JOIN `speciality` ON `spec_id` = `speciality`.`id`';
    $result = $db->query($query);
?>

<table>
    <thead>
        <th>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Spécialité</td>
            <td>&nbsp;</td>
        </th>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?= $row['lastname'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td><?= $row['spec'] ?></td>
                    <td><a href="/doctors/details.php?id=<?= $row['doc_id'] ?>">Détails</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </thead>
</table>