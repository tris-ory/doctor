<?php
require_once '../config.php';
require_once 'db.php';

class Speciality {
    private $pdo;

    public function __construct(){
        global $db_dsn, $db_pass, $db_user;
        $this->pdo = Db::getInstance($db_dsn, $db_pass, $db_user);
    }

    /**
     * @return array
     * return all rows
     */
    public function getAll(){
        return $this->pdo->db->query('SELECT * FROM `speciality`')->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return bool|mixed
     * return name if id exists, false else
     */
    public function getNameById($id){
        $stmt = $this->pdo->db
            ->prepare('SELECT `name` FROM `speciality` WHERE `id` = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($result['name'])?$result['name']:false;
    }

    /**
     * @param $name
     * @return bool|mixed
     * return id if name exists, false else
     */
    public function getIdByName($name){
        $stmt = $this->pdo->db->prepare('SELECT `id` FROM `speciality` WHERE `name` = :name');
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($result['id'])?$result['id']:false;
    }

    /**
     * @param $name
     * @return bool
     * return true if insertion is OK, false else
     */
    public function insertNew($name){
        $result = false;
        // Try to
        if(preg_match(RX_NAME, $name) && !$this->getIdByName($name)){
            $stmt = $this->pdo->db->prepare('INSERT INTO `speciality`(`name`) VALUES(:name)');
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $result = $stmt->execute();
        }
        return $result;
    }
}