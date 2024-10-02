<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDignitySex {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDignitySex(int $id_dignite, string $libel_sex): void {
        $parameter = ['id_dignite' => $id_dignite, 'libel_sex' => $libel_sex];
        $this->pdo->insert('DignitySex', $parameter);
    }

    public function deleteDignitySex(int $id_dignite, string $libel_sex): bool {
        $where = "id_dignite = '$id_dignite' AND libel_sex = '$libel_sex'";
        return $this->pdo->delete('DignitySex', $where);
    }

    public function updateDignitySex(int $id_dignite, string $libel_sex, array $data): void {
        $where = "id_dignite = '$id_dignite' AND libel_sex = '$libel_sex'";
        $this->pdo->update('DignitySex', $data, $where);
    }

    public function getAllDignitySexes(): array {
        return $this->pdo->getAll("DignitySex");
    }

    public function getDignitySex(int $id_dignite, string $libel_sex): array {
        return $this->pdo->getAll("DignitySex", "id_dignite", $id_dignite, "libel_sex", $libel_sex);
    }
}

?>
