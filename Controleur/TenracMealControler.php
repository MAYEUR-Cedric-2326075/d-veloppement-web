<?php

require_once 'Noyau/ConnexionBD.php';

class TenracMealController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createTenracMeal($data) {
        $sql = "INSERT INTO tenracMeal (id_tenrac, id_meal) VALUES (:id_tenrac, :id_meal)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_tenrac', $data['id_tenrac']);
        $stmt->bindParam(':id_meal', $data['id_meal']);
        return $stmt->execute();
    }

    public function getTenracMeal($id_tenrac, $id_meal) {
        $sql = "SELECT * FROM tenracMeal WHERE id_tenrac = :id_tenrac AND id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_tenrac', $id_tenrac);
        $stmt->bindParam(':id_meal', $id_meal);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllTenracMeals() {
        $sql = "SELECT * FROM tenracMeal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTenracMeal($id_tenrac, $id_meal) {
        $sql = "DELETE FROM tenracMeal WHERE id_tenrac = :id_tenrac AND id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_tenrac', $id_tenrac);
        $stmt->bindParam(':id_meal', $id_meal);
        return $stmt->execute();
    }
}

?>
