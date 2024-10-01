<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleTenrac
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionBD::getInstance();
    }

    // Méthode pour créer un enregistrement dans la table Tenrac
    public function createTenrac(string $name, string $surname, int $id_dignite, string $libel_sex, int $id_titre, int $id_rang, int $id_grade, int $id_club): void
    {
        $parameter = [
            'Name' => $name,
            'Surname' => $surname,
            'id_dignite' => $id_dignite,
            'libel_sex' => $libel_sex,
            'id_titre' => $id_titre,
            'id_rang' => $id_rang,
            'id_grade' => $id_grade,
            'id_club' => $id_club
        ];
        $this->pdo->insert('Tenrac', $parameter);
    }
    
    public function deleteTenrac(string $mail_tenrac): bool
    {
        $where = "mail_tenrac = $mail_tenrac";
        return $this->pdo->delete('Tenrac', $where);
    }
    public function updateTenrac(string $mail_tenrac, array $data): void
    {
        $where = "mail_tenrac = $mail_tenrac";
        $this->pdo->update('Tenrac', $data, $where);
    }

    // Méthode pour récupérer tous les enregistrements
    public function getAllTenrac(): array
    {
        return $this->pdo->getAll("Tenrac");
    }

    // Méthode pour récupérer un Tenrac par son ID
    public function getTenrac(string $mail_tenrac): array
    {
        return $this->pdo->getAll("Tenrac", "mail_tenrac", $mail_tenrac);
    }

    // Méthode pour obtenir le nom d'un Tenrac par son ID
    public function getTenracName(string $mail_tenrac): string
    {
        return $this->pdo->getElement("Tenrac", "Name", "mail_tenrac", $mail_tenrac);
    }

    // Méthode pour obtenir le nom complet (Name + Surname) d'un Tenrac par son ID
    public function getTenracFullName(string $mail_tenrac): string
    {
        $name = $this->pdo->getElement("Tenrac", "Name", "mail_tenrac", $mail_tenrac);
        $surname = $this->pdo->getElement("Tenrac", "Surname", "mail_tenrac", $mail_tenrac);
        return $name . " " . $surname;
    }

    // Méthode pour obtenir tous les enregistrements selon un certain critère
    public function getAllTenracByClub(int $id_club): array
    {
        return $this->pdo->getAll("Tenrac", "id_club", $id_club);
    }
}
?>
