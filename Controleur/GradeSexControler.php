<?php

require_once 'Noyau/ConnexionBD.php';

class GradeSexController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createGradeSex($data) {
        $sql = "INSERT INTO gradeSex (id_grade, id_sex) VALUES (:id_grade, :id_sex)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_grade', $data['id_grade']);
        $stmt->bindParam(':id_sex', $data['id_sex']);
        return $stmt->execute();
    }

    public function getGradeSex($id_grade, $id_sex) {
        $sql = "SELECT * FROM gradeSex WHERE id_grade = :id_grade AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_grade', $id_grade);
        $stmt->bindParam(':id_sex', $id_sex);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllGradeSex() {
        $sql = "SELECT * FROM gradeSex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteGradeSex($id_grade, $id_sex) {
        $sql = "DELETE FROM gradeSex WHERE id_grade = :id_grade AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_grade', $id_grade);
        $stmt->bindParam(':id_sex', $id_sex);
        return $stmt->execute();
    }
}

?>
