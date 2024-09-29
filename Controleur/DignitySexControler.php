<?php

require_once 'Noyau/ConnexionBD.php';

class DignitySexController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDignitySex($data) {
        $sql = "INSERT INTO dignitySex (id_dignity, id_sex) VALUES (:id_dignity, :id_sex)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dignity', $data['id_dignity']);
        $stmt->bindParam(':id_sex', $data['id_sex']);
        return $stmt->execute();
    }

    public function getDignitySex($id_dignity, $id_sex) {
        $sql = "SELECT * FROM dignitySex WHERE id_dignity = :id_dignity AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dignity', $id_dignity);
        $stmt->bindParam(':id_sex', $id_sex);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDignitySex() {
        $sql = "SELECT * FROM dignitySex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDignitySex($id_dignity, $id_sex) {
        $sql = "DELETE FROM dignitySex WHERE id_dignity = :id_dignity AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dignity', $id_dignity);
        $stmt->bindParam(':id_sex', $id_sex);
        return $stmt->execute();
    }
}

?>
