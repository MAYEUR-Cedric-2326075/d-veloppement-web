<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleMeal {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createMeal(string $mealName, string $description): void {
        $parameter = ['mealName' => $mealName, 'description' => $description];
        $resultToInsert = $this->pdo->insert('Meal', $parameter);
    }

    public function deleteMeal(string $id_meal): bool {
        $where = "id_meal = '$id_meal'";
        return $this->pdo->delete('Meal', $where);
    }

    public function updateMeal(string $id_meal, array $data): void {
        $where = "id_meal = '$id_meal'";
        $this->pdo->update('Meal', $data, $where);
    }

    public function getAllMeals(): array {
        return $this->pdo->getAll("Meal");
    }

    public function getMealById(string $id_meal): array {
        return $this->pdo->getAll("Meal", "id_meal", $id_meal);
    }

    public function getMealName(string $id_meal): string {
        return $this->pdo->getElement("Meal", "mealName", "id_meal", $id_meal);
    }

    public function getMealDescription(string $id_meal): string {
        return $this->pdo->getElement("Meal", "description", "id_meal", $id_meal);
    }
}

?>
