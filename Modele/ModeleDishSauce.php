<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDishSauce {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDishSauce(int $id_dish, int $id_sauce): void {
        $parameter = ['id_dish' => $id_dish, 'id_sauce' => $id_sauce];
        $this->pdo->insert('DishSauce', $parameter);
    }

    public function deleteDishSauce(int $id_dish, int $id_sauce): bool {
        $where = "id_dish = '$id_dish' AND id_sauce = '$id_sauce'";
        return $this->pdo->delete('DishSauce', $where);
    }

    public function updateDishSauce(int $id_dish, int $id_sauce, array $data): void {
        $where = "id_dish = '$id_dish' AND id_sauce = '$id_sauce'";
        $this->pdo->update('DishSauce', $data, $where);
    }

    public function getAllDishSauces(): array {
        return $this->pdo->getAll("DishSauce");
    }

    public function getDishSauce(int $id_dish, int $id_sauce): array {
        return $this->pdo->getAll("DishSauce", "id_dish", $id_dish, "id_sauce", $id_sauce);
    }
}

?>
