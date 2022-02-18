<?php
require_once '../config.php';
require_once 'db.php';

class Human{
    // DB Singleton
    protected $pdo;
    // DB Fields
    protected $id;
    protected $lastname;
    protected $firstname;
    protected $address;
    protected $zipcode;
    protected $city;
    protected $phone;
    protected $alt_phone;
    protected $mail;

    public function __construct(){
        global $db_dsn, $db_pass, $db_user;
        $this->pdo = Db::getInstance($db_dsn, $db_pass, $db_user);
    }

    // Setters
    public function setId($id){
        $result = false;
        if(filter_var($id, FILTER_VALIDATE_INT)){
            $this->id = $id;
            $result = true;
        } else {
            $this->id = NULL;            
        }
        return $result;
    }
    public function setLastname($str){
        if(preg_match(RX_NAME, $str)){
            $result = true;
            $this->lastname = $str;
        } else{
            $result = false;
            $this->lastname = NULL;
        }
        return $result;
    }
    public function setFirstname($str){
        if(preg_match(RX_NAME, $str)){
            $result = true;
            $this->firstname = $str;
        } else{
            $result = false;
            $this->firstname = NULL;
        }
        return $result;
    }
    public function setAddress($str){
        if(preg_match(RX_ADRESS, $str)){
            $result = true;
            $this->address = $str;
        } else {
            $result = false;
            $this->address = NULL;
        }
        return $result;
    }
    public function setZipcode($str){
        if(preg_match(RX_ZIP, $str)){
            $result = true;
            $this->zipcode = $str;
        } else {
            $result = false;
            $this->zipcode = NULL;
        }
        return $result;
    }
    public function setCity($str){
        if(preg_match(RX_NAME, $str)){
            $result = true;
            $this->city = $str;
        } else {
            $result = false;
            $this->city = NULL;
        }
        return $result;
    }
    public function setPhone($str){
        if(preg_match(RX_PHONE, $str)){
            $this->phone = $str;
            $result = true;
        } else {
            $this->phone = NULL;
            $result = false;
        }
        return $result;
    }
    public function setAltPhone($str){
        if(preg_match(RX_PHONE, $str)){
            $this->alt_phone = $str;
            $result = true;
        } else {
            $this->alt_phone = NULL;
            $result = false;
        }
        return $result;
    }
    public function setMail($str){
        if(filter_var($str, FILTER_VALIDATE_EMAIL) && strlen($str) <= 50 ){
            $this->mail = $str;
            $result = true;
        } else {
            $this->mail = NULL;
            $result = false;
        }
        return $result;
    }
    // Getters
    public function getId(){
        return $this->id;
    }
    public function getLastname(){
        $result = false;
        // If no error
        if(!($this->lastname != NULL)){
            $result = $this->lastname;
        }
        return $result;
    }
    public function getFirstname(){
        $result = false;
        // If no error
        if($this->firstname != NULL){
            $result = $this->firstname;
        }
        return $result;
    }
    public function getAddress(){
        $result = false;
        // If no error
        if($this->address != NULL){
            $result = $this->address;
        }
        return $result;
    }
    public function getZipcode(){
        $result = false;
        // If no error
        if($this->zipcode != NULL){
            $result = $this->zipcode;
        }
        return $result;
    }
    public function getCity(){
        $result = false;
        // If no error
        if($this->city != NULL){
            $result = $this->city;
        }
        return $result;
    }
    public function getPhone(){
        $result = false;
        // If no error
        if($this->phone != NULL){
            $result = $this->phone;
        }
        return $result;
    }
    public function getAltPhone(){
        $result = false;
        // If no error
        if($this->alt_phone != NULL){
            $result = $this->alt_phone;
        }
        return $result;
    }
    public function getMail(){
        $result = false;
        // If no error
        if($this->mail != NULL){
            $result = $this->mail;
        }
        return $result;
    }

    protected function init(array $values){
        $this->setId($values['id']);
        $this->setLastname($values['lastname']);
        $this->setFirstname($values['firstname']);
        $this->setAddress($values['address']);
        $this->setZipcode($values['zipcode']);
        $this->setCity($values['city']);
        $this->setPhone($values['phone']);
        $this->setAltPhone($values['phone2']);
        $this->setMail($values['mail']);
    }
}
