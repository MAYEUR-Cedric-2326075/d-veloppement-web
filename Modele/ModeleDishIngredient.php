<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDishIngredients {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDishIngredients(int $id_dish, int $id_ingredient): void {
        $parameter = ['id_dish' => $id_dish, 'id_ingredient' => $id_ingredient];
        $this->pdo->insert('DishIngredients', $parameter);
    }

    public function deleteDishIngredients(int $id_dish, int $id_ingredient): bool {
        $where = "id_dish = '$id_dish' AND id_ingredient = '$id_ingredient'";
        return $this->pdo->delete('DishIngredients', $where);
    }

    public function updateDishIngredients(int $id_dish, int $id_ingredient, array $data): void {
        $where = "id_dish = '$id_dish' AND id_ingredient = '$id_ingredient'";
        $this->pdo->update('DishIngredients', $data, $where);
    }

    public function getAllDishIngredients(): array {
        return $this->pdo->getAll("DishIngredients");
    }

    public function getDishIngredients(int $id_dish, int $id_ingredient): array {
        return $this->pdo->getAll("DishIngredients", "id_dish", $id_dish, "id_ingredient", $id_ingredient);
    }
}

?>
