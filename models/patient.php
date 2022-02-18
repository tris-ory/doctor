<?php
require_once 'human.php';
class Patient extends Human{
    public function __construct(){
        parent::__construct();
    }
    public function insert(){
        // Construction request
        if(is_null($this->alt_phone)){
            $sql = 'INSERT INTO `patients` (`lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, `mail`, `spec_id`) VALUES (:lastname, :firstname, :address, :zipcode, :city, :phone, :mail)';
        } else {
            $sql = 'INSERT INTO `patients` (`lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, `phone2`, `mail`, `spec_id`) VALUES (:lastname, :firstname, :address, :zipcode, :city, :phone, :phone2, :mail)';
        }

        // $stmt is a PDOStatement
        $stmt = $this->pdo->db->prepare($sql);
        // We bind all the values to the request
        $stmt->bindValue(':lastname', $this->lastname);
        $stmt->bindValue(':firstname', $this->firstname);
        $stmt->bindValue(':address', $this->address);
        $stmt->bindValue(':zipcode', $this->zipcode);
        $stmt->bindValue(':city', $this->city);
        $stmt->bindValue(':phone', $this->phone);
        if (!is_null($this->alt_phone)){
            $stmt->bindValue(':phone2', $this->alt_phone);
        }
        $stmt->bindValue(':mail', $this->mail);
        return $stmt->execute();
    }
    public function getAll(){
        return $this->pdo->db
            ->query('SELECT * FROM `clients`')
            ->fetchAll(PDO::FETCH_ASSOC);
    }
}