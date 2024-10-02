<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDish {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDish(string $dish_name): void {
        $parameter = ['dish_name' => $dish_name];
        $this->pdo->insert('Dish', $parameter);
    }

    public function deleteDish(string $id_dish): bool {
        $where = "id_dish = '$id_dish'";
        return $this->pdo->delete('Dish', $where);
    }

    public function updateDish(string $id_dish, array $data): void {
        $where = "id_dish = '$id_dish'";
        $this->pdo->update('Dish', $data, $where);
    }

    public function getAllDishes(): array {
        return $this->pdo->getAll("Dish");
    }

    public function getDishById(string $id_dish): array {
        return $this->pdo->getAll("Dish", "id_dish", $id_dish);
    }

    public function getDishName(string $id_dish): string {
        return $this->pdo->getElement("Dish", "dish_name", "id_dish", $id_dish);
    }
}

?>
