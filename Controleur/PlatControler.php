<?php

require_once 'Noyau/ConnexionBD.php';

class PlatController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createPlat($data) {
        $sql = "INSERT INTO Plat (libelle_plat, id_dish) VALUES (:libelle, :id_dish)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        $stmt->bindParam(':id_dish', $data['id_dish']);
        return $stmt->execute();
    }

    public function getPlat($id) {
        $sql = "SELECT * FROM Plat WHERE id_plat = :id_plat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_plat', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllPlats() {
        $sql = "SELECT * FROM Plat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatePlat($id, $data) {
        $sql = "UPDATE Plat SET libelle_plat = :libelle, id_dish = :id_dish WHERE id_plat = :id_plat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_plat', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        $stmt->bindParam(':id_dish', $data['id_dish']);
        return $stmt->execute();
    }

    public function deletePlat($id) {
        $sql = "DELETE FROM Plat WHERE id_plat = :id_plat";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_plat', $id);
        return $stmt->execute();
    }
}

?>
