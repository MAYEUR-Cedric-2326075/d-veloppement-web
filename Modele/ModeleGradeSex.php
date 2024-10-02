<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleGradeSex {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createGradeSex(int $id_grade, string $libel_sex): void {
        $parameter = ['id_grade' => $id_grade, 'libel_sex' => $libel_sex];
        $this->pdo->insert('GradeSex', $parameter);
    }

    public function deleteGradeSex(int $id_grade, string $libel_sex): bool {
        $where = "id_grade = '$id_grade' AND libel_sex = '$libel_sex'";
        return $this->pdo->delete('GradeSex', $where);
    }

    public function updateGradeSex(int $id_grade, string $libel_sex, array $data): void {
        $where = "id_grade = '$id_grade' AND libel_sex = '$libel_sex'";
        $this->pdo->update('GradeSex', $data, $where);
    }

    public function getAllGradeSexes(): array {
        return $this->pdo->getAll("GradeSex");
    }

    public function getGradeSex(int $id_grade, string $libel_sex): array {
        return $this->pdo->getAll("GradeSex", "id_grade", $id_grade, "libel_sex", $libel_sex);
    }
}

?>
