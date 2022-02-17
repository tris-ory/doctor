<?php
    $page_title = 'Index des médecins';
    $actif = 'Médecins';

    require 'config.php';
    // include 'models/doctor.php';

    include 'modules/head.php';
    include 'modules/header.php';
?>
<div class="container">
    <div class="row my-2">
        <?php foreach($pages as $page => $label): ?>
            <p class="col-4"><a href="/views/<?= $page ?>_doctor.php"><?= $label ?></a></p>
        <?php endforeach; ?>
    </div>
</div>