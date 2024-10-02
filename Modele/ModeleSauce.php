<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleSauce {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createSauce(string $sauceName, string $description): void {
        $parameter = ['sauceName' => $sauceName, 'description' => $description];
        $this->pdo->insert('Sauce', $parameter);
    }

    public function deleteSauce(int $id_sauce): bool {
        $where = "id_sauce = '$id_sauce'";
        return $this->pdo->delete('Sauce', $where);
    }

    public function updateSauce(int $id_sauce, array $data): void {
        $where = "id_sauce = '$id_sauce'";
        $this->pdo->update('Sauce', $data, $where);
    }

    public function getAllSauces(): array {
        return $this->pdo->getAll("Sauce");
    }

    public function getSauceById(int $id_sauce): array {
        return $this->pdo->getAll("Sauce", "id_sauce", $id_sauce);
    }

    public function getSauceName(int $id_sauce): string {
        return $this->pdo->getElement("Sauce", "sauceName", "id_sauce", $id_sauce);
    }

    public function getSauceDescription(int $id_sauce): string {
        return $this->pdo->getElement("Sauce", "description", "id_sauce", $id_sauce);
    }
}

?>
