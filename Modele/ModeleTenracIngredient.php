<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleTenracIngredient {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createTenracIngredient(string $mail_tenrac, int $id_ingredient): bool {
        $parameter = ['mail_tenrac' => $mail_tenrac, 'id_ingredient' => $id_ingredient];
        return $this->pdo->insert('TenracIngredient', $parameter);
    }

    public function deleteTenracIngredient(string $mail_tenrac, int $id_ingredient): bool {
        $where = "mail_tenrac = '$mail_tenrac' AND id_ingredient = '$id_ingredient'";
        return $this->pdo->delete('TenracIngredient', $where);
    }

    public function updateTenracIngredient(string $mail_tenrac, int $id_ingredient, array $data): bool {
        $where = "mail_tenrac = '$mail_tenrac' AND id_ingredient = '$id_ingredient'";
        return $this->pdo->update('TenracIngredient', $data, $where);
    }

    public function getAllTenracIngredients(): array {
        return $this->pdo->getAll("TenracIngredient");
    }

    public function getTenracIngredient(string $mail_tenrac, int $id_ingredient): array {
        return $this->pdo->getAll("TenracIngredient", "mail_tenrac", $mail_tenrac, "id_ingredient", $id_ingredient);
    }
}

?>
