<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleIngredient {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createIngredient(string $ingredient_name): void {
        $parameter = ['ingredient_name' => $ingredient_name];
        $this->pdo->insert('Ingredient', $parameter);
    }

    public function deleteIngredient(int $id_ingredient): bool {
        $where = "id_ingredient = '$id_ingredient'";
        return $this->pdo->delete('Ingredient', $where);
    }

    public function updateIngredient(int $id_ingredient, array $data): void {
        $where = "id_ingredient = '$id_ingredient'";
        $this->pdo->update('Ingredient', $data, $where);
    }

    public function getAllIngredients(): array {
        return $this->pdo->getAll("Ingredient");
    }

    public function getIngredientById(int $id_ingredient): array {
        return $this->pdo->getAll("Ingredient", "id_ingredient", $id_ingredient);
    }

    public function getIngredientName(int $id_ingredient): string {
        return $this->pdo->getElement("Ingredient", "ingredient_name", "id_ingredient", $id_ingredient);
    }
}

?>
