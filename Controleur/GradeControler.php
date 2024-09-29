<?php

require_once 'Noyau/ConnexionBD.php';

class GradeController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createGrade($data) {
        $sql = "INSERT INTO Grade (libelle_grade) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getGrade($id) {
        $sql = "SELECT * FROM Grade WHERE id_grade = :id_grade";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_grade', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllGrades() {
        $sql = "SELECT * FROM Grade";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateGrade($id, $data) {
        $sql = "UPDATE Grade SET libelle_grade = :libelle WHERE id_grade = :id_grade";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_grade', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteGrade($id) {
        $sql = "DELETE FROM Grade WHERE id_grade = :id_grade";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_grade', $id);
        return $stmt->execute();
    }
}

?>
