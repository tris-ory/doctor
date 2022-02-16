<?php
    $page_title = 'Index des médecins';
    $actif = 'Médecins';
    
    include 'includes/pageslist.php';

    include 'modules/head.php';
    include 'modules/header.php';

?>
<div class="container">
    <div class="row my-2">
        <?php foreach ($pages_list as $k => $v): ?>
            <div class="col-4 col-sm-8">
                <a href="doctors/<?= $k ?>.php"><?= $v ?></a>
            </div>
        <?php endforeach; ?>
    </div>
</div>