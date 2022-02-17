<?php
// DB parameters
$db_user = 'docto';
$db_pass = 'docto';
$db_dsn = 'mysql:host=localhost;dbname=doctolib;charset=utf8';

// The 1st attribute force pdo to really use prepared queries although an emulation. The 2nd say to PDO that all errors
// are exceptions
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// views list 
$pages = ['create' => 'Ajouter', 'view' => 'Afficher'];
// regexes
define('RX_NAME', '/^[a-zA-Z]{1}[a-zA-Z\s-]{0,49}$/');
define('RX_ADRESS', '/^[a-zA-Z\d]{1}[a-zA-Z\d\s-]{0,254}$/');
define('RX_ZIP', '/^\d{5}$/');
define('RX_PHONE', '/^\d{10}$/');