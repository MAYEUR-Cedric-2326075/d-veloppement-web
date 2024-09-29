<?php

require_once 'Noyau/ConnexionBD.php';

class DishController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDish($data) {
        $sql = "INSERT INTO Dish (libelle_dish) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getDish($id) {
        $sql = "SELECT * FROM Dish WHERE id_dish = :id_dish";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDishes() {
        $sql = "SELECT * FROM Dish";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateDish($id, $data) {
        $sql = "UPDATE Dish SET libelle_dish = :libelle WHERE id_dish = :id_dish";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteDish($id) {
        $sql = "DELETE FROM Dish WHERE id_dish = :id_dish";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id);
        return $stmt->execute();
    }
}

?>
