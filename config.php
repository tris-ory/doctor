<?php
// DB parameters
$db_user = 'docto';
$db_pass = 'docto';
$db_dsn = 'mysql:host=localhost;dbname=doctolib;charset=utf8';

// views list 
$pages = ['create' => 'Ajouter', 'view' => 'Afficher'];
// regexes
define('RX_NAME', '/^\p{L}{1}[\p{L}\s-]{0,49}$/');
define('RX_ADRESS', '/^[\p{L}\d]{1}[\p{L}\d\s-]{0,254}$/');
define('RX_ZIP', '/^\d{5}$/');
define('RX_PHONE', '/^\d{10}$/');