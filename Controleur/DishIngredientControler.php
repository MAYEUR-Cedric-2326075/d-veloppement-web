<?php

require_once 'Noyau/ConnexionBD.php';

class DishIngredientsController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDishIngredient($data) {
        $sql = "INSERT INTO dishIngredients (id_dish, id_ingredient) VALUES (:id_dish, :id_ingredient)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $data['id_dish']);
        $stmt->bindParam(':id_ingredient', $data['id_ingredient']);
        return $stmt->execute();
    }

    public function getDishIngredient($id_dish, $id_ingredient) {
        $sql = "SELECT * FROM dishIngredients WHERE id_dish = :id_dish AND id_ingredient = :id_ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id_dish);
        $stmt->bindParam(':id_ingredient', $id_ingredient);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDishIngredients() {
        $sql = "SELECT * FROM dishIngredients";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDishIngredient($id_dish, $id_ingredient) {
        $sql = "DELETE FROM dishIngredients WHERE id_dish = :id_dish AND id_ingredient = :id_ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id_dish);
        $stmt->bindParam(':id_ingredient', $id_ingredient);
        return $stmt->execute();
    }
}

?>
