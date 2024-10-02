<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleTenracMeal {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createTenracMeal(string $mail_tenrac, int $id_meal): void {
        $parameter = ['mail_tenrac' => $mail_tenrac, 'id_meal' => $id_meal];
        $this->pdo->insert('TenracMeal', $parameter);
    }

    public function deleteTenracMeal(string $mail_tenrac, int $id_meal): bool {
        $where = "mail_tenrac = '$mail_tenrac' AND id_meal = '$id_meal'";
        return $this->pdo->delete('TenracMeal', $where);
    }

    public function updateTenracMeal(string $mail_tenrac, int $id_meal, array $data): void {
        $where = "mail_tenrac = '$mail_tenrac' AND id_meal = '$id_meal'";
        $this->pdo->update('TenracMeal', $data, $where);
    }

    public function getAllTenracMeals(): array {
        return $this->pdo->getAll("TenracMeal");
    }

    public function getTenracMeal(string $mail_tenrac, int $id_meal): array {
        return $this->pdo->getAll("TenracMeal", "mail_tenrac", $mail_tenrac, "id_meal", $id_meal);
    }
}

?>
