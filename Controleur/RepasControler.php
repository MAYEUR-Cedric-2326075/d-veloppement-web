<?php

require_once 'Noyau/ConnexionBD.php';

class RepasController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createRepas($data) {
        $sql = "INSERT INTO Repas (libelle_repas, id_meal) VALUES (:libelle, :id_meal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        $stmt->bindParam(':id_meal', $data['id_meal']);
        return $stmt->execute();
    }

    public function getRepas($id) {
        $sql = "SELECT * FROM Repas WHERE id_repas = :id_repas";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_repas', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRepas() {
        $sql = "SELECT * FROM Repas";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRepas($id, $data) {
        $sql = "UPDATE Repas SET libelle_repas = :libelle, id_meal = :id_meal WHERE id_repas = :id_repas";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_repas', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        $stmt->bindParam(':id_meal', $data['id_meal']);
        return $stmt->execute();
    }

    public function deleteRepas($id) {
        $sql = "DELETE FROM Repas WHERE id_repas = :id_repas";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_repas', $id);
        return $stmt->execute();
    }
}

?>
