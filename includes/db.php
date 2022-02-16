<?php
    $db_user = 'docto';
    $db_pass = 'docto';
    $db_dsn = 'mysql:host=localhost;dbname=doctolib;charset=utf8';

    $db = new PDO($db_dsn, $db_user, $db_pass);
// The 1st attribute force pdo to really use prepared queries although an emulation. The 2nd say to PDO that all errors
// are exceptions
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
