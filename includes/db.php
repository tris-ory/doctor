<?php
    $db_user = 'docto';
    $db_pass = 'docto';
    $db_dsn = 'mysql:host=localhost;dbname=doctolib;charset=utf8';

    $db = new PDO($db_dsn, $db_user, $db_pass);