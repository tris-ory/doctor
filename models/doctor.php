<?php
// require_once '../config.php';
require_once 'human.php';
// require_once '../helpers/selectors.php';

class Doctor extends Human {
    private $spec_id;

    // Constructor
    public function __construct(){
        parent::__construct();
    }
    // setters and getters
    public function set_spec_id($id){
        // Get the specialities from database
        // $specs = select_specialities();
        // if(in_array($id, $specs)){
            $this->spec_id = $id;
        // } else {
            // $this->spec_id = NULL;
        // }
    }
    public function get_spec_id(){
        $result = false;
        // If no error
        if($this->spec_id != NULL){
            $result = $this->spec_id;
        }
        return $result;
    }
    // Other methods
    public function init_by_id($id){
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
            $this->set_spec_id($fields['spec_id']);
            parent::init($fields);
        }
    }
    public function push(){
        // Construction request
        $sql = 'INSERT INTO `doctors` (`lastname`, `firstname`, `address`, `zipcode`, `city`, `phone`, ';
        $values = 'VALUES (:lastname, :firstname, :address, , :zipcode, :city, ';
        // If the second phone is entered, add it into request and waited values
        if (!(is_null($this->alt_phone))){
            $sql .= '`phone2`, ';
            $values .= ':alt_phone, ';
        }
        $sql .= '`mail`, `spec_id`) ';
        $values .= ':mail, :spec_id)';

        // $qry is a PDOStatement
        $qry = $this->pdo->db->prepare($sql.$values);
        // We bind all the values to the request
        $qry->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $qry->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $qry->bindValue(':address', $this->address, PDO::PARAM_STR);
        $qry->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
        $qry->bindValue(':city', $this->city, PDO::PARAM_STR);
        if (!is_null($this->alt_phone)){
            $qry->bindValue(':alt_phone', $this->alt_phone, PDO::PARAM_STR);
        }
        $qry->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $qry->bindValue(':spec_id', $this->spec_id, PDO::PARAM_INT);
        // PDOStatement::execute() return a boolean, so we return the result
        return $qry->execute();
    }


}