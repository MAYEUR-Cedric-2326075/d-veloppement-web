<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDishmeal {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDishmeal(int $id_dish, int $id_meal): void {
        $parameter = ['id_dish' => $id_dish, 'id_meal' => $id_meal];
        $this->pdo->insert('Dishmeal', $parameter);
    }

    public function deleteDishmeal(int $id_dish, int $id_meal): bool {
        $where = "id_dish = '$id_dish' AND id_meal = '$id_meal'";
        return $this->pdo->delete('Dishmeal', $where);
    }

    public function updateDishmeal(int $id_dish, int $id_meal, array $data): void {
        $where = "id_dish = '$id_dish' AND id_meal = '$id_meal'";
        $this->pdo->update('Dishmeal', $data, $where);
    }

    public function getAllDishmeals(): array {
        return $this->pdo->getAll("Dishmeal");
    }

    public function getDishmeal(int $id_dish, int $id_meal): array {
        return $this->pdo->getAll("Dishmeal", "id_dish", $id_dish, "id_meal", $id_meal);
    }
}

?>
