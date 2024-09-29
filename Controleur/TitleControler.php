<?php

require_once 'Noyau/ConnexionBD.php';

class TitleController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createTitle($data) {
        $sql = "INSERT INTO Title (libelle_title) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getTitle($id) {
        $sql = "SELECT * FROM Title WHERE id_title = :id_title";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_title', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTitles() {
        $sql = "SELECT * FROM Title";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTitle($id, $data) {
        $sql = "UPDATE Title SET libelle_title = :libelle WHERE id_title = :id_title";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_title', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteTitle($id) {
        $sql = "DELETE FROM Title WHERE id_title = :id_title";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_title', $id);
        return $stmt->execute();
    }
}

?>
