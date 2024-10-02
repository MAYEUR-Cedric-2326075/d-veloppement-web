<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleSex {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createSex(string $libel_sex): void {
        $parameter = ['libel_sex' => $libel_sex];
        $this->pdo->insert('Sex', $parameter);
    }

    public function deleteSex(string $libel_sex): bool {
        $where = "libel_sex = '$libel_sex'";
        return $this->pdo->delete('Sex', $where);
    }

    public function updateSex(string $libel_sex, array $data): void {
        $where = "libel_sex = '$libel_sex'";
        $this->pdo->update('Sex', $data, $where);
    }

    public function getAllSexes(): array {
        return $this->pdo->getAll("Sex");
    }

    public function getSexByLibel(string $libel_sex): array {
        return $this->pdo->getAll("Sex", "libel_sex", $libel_sex);
    }
}

?>
