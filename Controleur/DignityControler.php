<?php

require_once 'Noyau/ConnexionBD.php';

class DignityController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDignity($data) {
        $sql = "INSERT INTO Dignity (libelle_dignity) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getDignity($id) {
        $sql = "SELECT * FROM Dignity WHERE id_dignity = :id_dignity";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dignity', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDignities() {
        $sql = "SELECT * FROM Dignity";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateDignity($id, $data) {
        $sql = "UPDATE Dignity SET libelle_dignity = :libelle WHERE id_dignity = :id_dignity";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dignity', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteDignity($id) {
        $sql = "DELETE FROM Dignity WHERE id_dignity = :id_dignity";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dignity', $id);
        return $stmt->execute();
    }
}

?>
