<?php

require_once '../config.php';

function select_spec_ids(){
    return $db->query('SELECT `id` FROM `speciality`');
}