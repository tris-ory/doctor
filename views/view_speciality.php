<?php
$page_title = 'Liste des spécialités';
$actif = 'Spécialités';

require_once '../config.php';
require_once '../models/speciality.php';

include '../modules/head.php';
include '../modules/header.php';
$s = new Speciality();
$specs = $s->getAll();
unset($s);
?>
<div class="container">
<ul class="list-unstyled">
    <?php foreach($specs as $spec): ?>
        <li><?= $spec['name'] ?></li>
    <?php endforeach; ?>
</ul>
</div>