<?php
require_once '../config.php';

class Human{
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
    // Errors counter
    protected $errors;

    // Setters
    public function set_id($id){
        $result = false;
        if(filter_var($id, FILTER_VALIDATE_INT)){
            $this->id = $id;
            $result = true;
        } else {
            $this->id = NULL;            
        }
        return $result;
    }
    public function set_lastname($str){
        if(preg_match(RX_NAME, $str)){
            $this->lastname = $str;
        } else{
            $this->lastname = NULL;
        }
    }
    public function set_firstname($str){
        if(preg_match(RX_NAME, $str)){
            $this->firstname = $str;
        } else{
            $this->firstname = NULL;
        }
    }
    public function set_address($str){
        if(preg_match(RX_ADRESS, $str)){
            $this->address = $str;
        } else {
            $this->address = NULL;
        }
    }
    public function set_zipcode($str){
        if(preg_match(RX_ZIP, $str)){
            $this->zipcode = $str;
        } else {
            $this->zipcode = NULL;
        }
    }
    public function set_city($str){
        if(preg_match(RX_NAME, $str)){
            $this->city = $str;
        } else {
            $this->city = NULL;
        }
    }
    public function set_phone($str){
        if(preg_match(RX_PHONE, $str)){
            $this->phone = $str;
        } else {
            $this->phone = NULL;
        }
    }
    public function set_alt_phone($str){
        if(preg_match(RX_PHONE, $str)){
            $this->alt_phone = $str;
        } else {
            $this->alt_phone = NULL;
        }
    }
    public function set_mail($str){
        if(filter_var($str, FILTER_VALIDATE_EMAIL) && strlen($str) <= 50 ){
            $this->mail = $str;
        } else {
            $this->mail = NULL;
        }
    }
    // Getters
    public function get_id(){
        return $this->id;
    }
    public function get_lastname(){
        $result = false;
        // If no error
        if(!($this->lastname != NULL)){
            $result = $this->lastname;
        }
        return $result;
    }
    public function get_firstname(){
        $result = false;
        // If no error
        if($this->firstname != NULL){
            $result = $this->firstname;
        }
        return $result;
    }
    public function get_address(){
        $result = false;
        // If no error
        if($this->address != NULL){
            $result = $this->address;
        }
        return $result;
    }
    public function get_zipcode(){
        $result = false;
        // If no error
        if($this->zipcode != NULL){
            $result = $this->zipcode;
        }
        return $result;
    }
    public function get_city(){
        $result = false;
        // If no error
        if($this->city != NULL){
            $result = $this->city;
        }
        return $result;
    }
    public function get_phone(){
        $result = false;
        // If no error
        if($this->phone != NULL){
            $result = $this->phone;
        }
        return $result;
    }
    public function get_alt_phone(){
        $result = false;
        // If no error
        if($this->alt_phone != NULL){
            $result = $this->alt_phone;
        }
        return $result;
    }
    public function get_mail(){
        $result = false;
        // If no error
        if($this->mail != NULL){
            $result = $this->mail;
        }
        return $result;
    }

    protected function init(array $values){
        $this->set_id($values['id']);
        $this->set_lastname($values['lastname']);
        $this->set_firstname($values['firstname']);
        $this->set_address($values['address']);
        $this->set_zipcode($values['zipcode']);
        $this->set_city($values['city']);
        $this->set_phone($values['phone']);
        $this->set_alt_phone($values['phone2']);
        $this->set_mail($values['mail']);
    }
}
