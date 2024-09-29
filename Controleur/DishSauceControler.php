<?php

require_once 'Noyau/ConnexionBD.php';

class DishSauceController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDishSauce($data) {
        $sql = "INSERT INTO dishSauce (id_dish, id_sauce) VALUES (:id_dish, :id_sauce)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $data['id_dish']);
        $stmt->bindParam(':id_sauce', $data['id_sauce']);
        return $stmt->execute();
    }

    public function getDishSauce($id_dish, $id_sauce) {
        $sql = "SELECT * FROM dishSauce WHERE id_dish = :id_dish AND id_sauce = :id_sauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id_dish);
        $stmt->bindParam(':id_sauce', $id_sauce);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDishSauces() {
        $sql = "SELECT * FROM dishSauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDishSauce($id_dish, $id_sauce) {
        $sql = "DELETE FROM dishSauce WHERE id_dish = :id_dish AND id_sauce = :id_sauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id_dish);
        $stmt->bindParam(':id_sauce', $id_sauce);
        return $stmt->execute();
    }
}

?>
