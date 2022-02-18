<?php
require_once '../config.php';
require_once 'human.php';

class Doctor extends Human {
    private $spec_id;

    // Constructor
    public function __construct(){
        parent::__construct();
    }
    // setters and getters
    public function setSpecId($id){
        $spec = new Speciality();
        $result = false;
        if($spec->getNameById($id)){
            $this->spec_id = $id;
            $result = true;
        } else {
            $this->spec_id = NULL;
            $result = false;
        }
        return $result;
    }
    public function getSpecId(){
        $result = false;
        // If no error
        if($this->spec_id != NULL){
            $result = $this->spec_id;
        }
        return $result;
    }
    // Other methods
    public function getById($id){
        $query = $this->db
            ->getPDO()
            ->prepare('SELECT * FROM `doctors` WHERE `id` = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $arr = $query->fetch(PDO::FETCH_ASSOC);
        $this->init($arr);
    }
    public function init($fields){
        if (is_array($fields)){
            $this->setSpecId($fields['spec_id']);
            parent::init($fields);
        }
    }
    public function insert(){
        // Construction request
        if(is_null($this->alt_phone)){
            $sql = 'INSERT INTO `doctors` (`lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, `mail`, `spec_id`) VALUES (:lastname, :firstname, :address, :zipcode, :city, :phone, :mail, :spec_id)';
        } else {
            $sql = 'INSERT INTO `doctors` (`lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, `phone2`, `mail`, `spec_id`) VALUES (:lastname, :firstname, :address, :zipcode, :city, :phone, :phone2, :mail, :spec_id)';
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
        $stmt->bindValue(':spec_id', $this->spec_id);
        return $stmt->execute();
    }
    public function getBySpecId($id){
        $sql = 'SELECT `firstname`, `lastname` FROM `speciality` AS `spec` INNER JOIN `doctors` ON `spec`.`id` = `spec_id` WHERE `spec`.`id` = :id';
        $stmt = $this->pdo->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySpecName($name){
        $sql = 'SELECT `firstname`, `lastname` FROM `speciality` AS `spec` INNER JOIN `doctors` ON `spec`.`id` = `spec_id` WHERE `spec`.`name` = :name';
        $stmt = $this->pdo->db->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName($lastname, $firstname=NULL){
        $sql = 'SELECT `lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, `phone2`, `mail`, `spec_id` FROM `doctors` WHERE `lastname` = :lastname';
        if(!is_null($firstname)){
             $sql .= 'AND `firstname` = :firstname';
        }
        $stmt = $this->pdo->db->prepare($sql);
        $stmt->bindValue(':lastname', $lastname);
        if(!is_null($firstname)){
            $stmt->bindValue(':firstname', $firstname);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}