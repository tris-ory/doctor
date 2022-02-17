<?php
include 'models/doctor.php';

$fields = [];
$arr = $db->query('SELECT * FROM `doctors`')
            ->fetchAll();
if (is_array($arr)){
    foreach($arr as $row){
        $field = new Doctor();
        $field->init($row);
        $fields[] = $field;
    }
}

