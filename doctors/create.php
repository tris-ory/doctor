<?php
    $page_title = 'Nouveau médecin';
    $actif = 'Médecins';
    require_once '../includes/db.php';

    if(!empty($_POST)):
        // If form was send
        // First we test the fields
        require_once '../includes/human_form_test.php';

    else:
        include '../modules/head.php';
        include '../modules/header.php';
?>


                    
<?php
    endif;

