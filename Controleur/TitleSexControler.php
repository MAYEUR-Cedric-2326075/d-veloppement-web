<?php

require_once 'Noyau/ConnexionBD.php';

class TitleSexController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createTitleSex($data) {
        $sql = "INSERT INTO titleSex (id_title, id_sex) VALUES (:id_title, :id_sex)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_title', $data['id_title']);
        $stmt->bindParam(':id_sex', $data['id_sex']);
        return $stmt->execute();
    }

    public function getTitleSex($id_title, $id_sex) {
        $sql = "SELECT * FROM titleSex WHERE id_title = :id_title AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_title', $id_title);
        $stmt->bindParam(':id_sex', $id_sex);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTitleSex() {
        $sql = "SELECT * FROM titleSex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTitleSex($id_title, $id_sex) {
        $sql = "DELETE FROM titleSex WHERE id_title = :id_title AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_title', $id_title);
        $stmt->bindParam(':id_sex', $id_sex);
        return $stmt->execute();
    }
}

?>
