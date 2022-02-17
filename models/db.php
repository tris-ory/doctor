<?php
require_once '../config.php';

Class Db {
    private static $instance = NULL;
    public $db;

    private function __construct($dsn, $user, $pass){
        $this->db = new PDO($dsn, $user, $pass);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public static function getInstance($dsn, $user, $pass){
        if(is_null(self::$instance)){
            self::$instance = new Db($dsn, $user, $pass);
        }
        return self::$instance;
    }
}