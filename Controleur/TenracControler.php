<?php

require_once 'Noyau/ConnexionBD.php';

class TenracController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createTenrac($data) {
        $sql = "INSERT INTO Tenrac (libelle_tenrac) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getTenrac($id) {
        $sql = "SELECT * FROM Tenrac WHERE id_tenrac = :id_tenrac";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_tenrac', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTenracs() {
        $sql = "SELECT * FROM Tenrac";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTenrac($id, $data) {
        $sql = "UPDATE Tenrac SET libelle_tenrac = :libelle WHERE id_tenrac = :id_tenrac";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_tenrac', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteTenrac($id) {
        $sql = "DELETE FROM Tenrac WHERE id_tenrac = :id_tenrac";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_tenrac', $id);
        return $stmt->execute();
    }
}

?>
