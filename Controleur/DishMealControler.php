<?php

require_once 'Noyau/ConnexionBD.php';

class DishMealController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDishMeal($data) {
        $sql = "INSERT INTO dishMeal (id_dish, id_meal) VALUES (:id_dish, :id_meal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $data['id_dish']);
        $stmt->bindParam(':id_meal', $data['id_meal']);
        return $stmt->execute();
    }

    public function getDishMeal($id_dish, $id_meal) {
        $sql = "SELECT * FROM dishMeal WHERE id_dish = :id_dish AND id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id_dish);
        $stmt->bindParam(':id_meal', $id_meal);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDishMeals() {
        $sql = "SELECT * FROM dishMeal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDishMeal($id_dish, $id_meal) {
        $sql = "DELETE FROM dishMeal WHERE id_dish = :id_dish AND id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_dish', $id_dish);
        $stmt->bindParam(':id_meal', $id_meal);
        return $stmt->execute();
    }
}

?>
