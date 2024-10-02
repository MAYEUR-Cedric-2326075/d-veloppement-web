<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleGrade {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createGrade(string $libel_grade): void {
        $parameter = ['libel_grade' => $libel_grade];
        $this->pdo->insert('Grade', $parameter);
    }

    public function deleteGrade(int $id_grade): bool {
        $where = "id_grade = '$id_grade'";
        return $this->pdo->delete('Grade', $where);
    }

    public function updateGrade(int $id_grade, array $data): void {
        $where = "id_grade = '$id_grade'";
        $this->pdo->update('Grade', $data, $where);
    }

    public function getAllGrades(): array {
        return $this->pdo->getAll("Grade");
    }

    public function getGradeById(int $id_grade): array {
        return $this->pdo->getAll("Grade", "id_grade", $id_grade);
    }

    public function getLibelGrade(int $id_grade): string {
        return $this->pdo->getElement("Grade", "libel_grade", "id_grade", $id_grade);
    }
}

?>
