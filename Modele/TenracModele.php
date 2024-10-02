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
    public function createTenrac(string $mail_tenrac, string $name, string $surname, int $id_dignite, string $libel_sex, int $id_titre, int $id_rang, int $id_grade, int $id_club, string $pass_word, bool $is_admin = false): bool
    {
        $hashed_password = password_hash($pass_word, PASSWORD_DEFAULT);
        $parameters = [
            'mail_tenrac' => $mail_tenrac,
            'Name' => $name,
            'Surname' => $surname,
            'id_dignite' => $id_dignite,
            'libel_sex' => $libel_sex,
            'id_titre' => $id_titre,
            'id_rang' => $id_rang,
            'id_grade' => $id_grade,
            'id_club' => $id_club,
            'pass_word' => $hashed_password,
            'is_admin' => $is_admin
        ];

        return $this->pdo->insert('Tenrac', $parameters);
    }

    // Méthode pour supprimer un Tenrac par son mail
    public function deleteTenrac(string $mail_tenrac): bool
    {
        $where = ['mail_tenrac' => $mail_tenrac];
        return $this->pdo->delete('Tenrac', $where);
    }

    // Méthode pour mettre à jour un enregistrement de Tenrac
    public function updateTenrac(string $mail_tenrac, array $data): bool
    {
        $where = "mail_tenrac = :mail_tenrac";
        $data['mail_tenrac'] = $mail_tenrac;
        return $this->pdo->update('Tenrac', $data, $where);
    }

    // Méthode pour récupérer tous les enregistrements de la table Tenrac
    public function getAllTenrac(): array
    {
        return $this->pdo->getAll('Tenrac');
    }

    // Méthode pour récupérer un Tenrac par son mail
    public function getTenrac(string $mail_tenrac): array
    {
        return $this->pdo->getAll('Tenrac', 'mail_tenrac', $mail_tenrac);
    }

    // Getters pour chaque champ de la table Tenrac
    public function getMailTenrac(string $mail_tenrac): string
    {
        return $this->pdo->getElement('Tenrac', 'mail_tenrac', 'mail_tenrac', $mail_tenrac);
    }
    public function getName(string $mail_tenrac): string
    {
        return $this->pdo->getElement('Tenrac', 'Name', 'mail_tenrac', $mail_tenrac);
    }
    public function getSurname(string $mail_tenrac): string
    {
        return $this->pdo->getElement('Tenrac', 'Surname', 'mail_tenrac', $mail_tenrac);
    }
    public function getIdDignite(string $mail_tenrac): int
    {
        return (int)$this->pdo->getElement('Tenrac', 'id_dignite', 'mail_tenrac', $mail_tenrac);
    }
    public function getLibelSex(string $mail_tenrac): string
    {
        return $this->pdo->getElement('Tenrac', 'libel_sex', 'mail_tenrac', $mail_tenrac);
    }
    public function getIdTitre(string $mail_tenrac): int
    {
        return (int)$this->pdo->getElement('Tenrac', 'id_titre', 'mail_tenrac', $mail_tenrac);
    }
    public function getIdRang(string $mail_tenrac): int
    {
        return (int)$this->pdo->getElement('Tenrac', 'id_rang', 'mail_tenrac', $mail_tenrac);
    }
    public function getIdGrade(string $mail_tenrac): int
    {
        return (int)$this->pdo->getElement('Tenrac', 'id_grade', 'mail_tenrac', $mail_tenrac);
    }
    public function getIdClub(string $mail_tenrac): int
    {
        return (int)$this->pdo->getElement('Tenrac', 'id_club', 'mail_tenrac', $mail_tenrac);
    }
    public function getPassWord(string $mail_tenrac): string
    {
        return $this->pdo->getElement('Tenrac', 'pass_word', 'mail_tenrac', $mail_tenrac);
    }

    public function getIsAdmin(string $mail_tenrac): bool
    {
        return (bool)$this->pdo->getElement('Tenrac', 'is_admin', 'mail_tenrac', $mail_tenrac);
    }

    // Méthode pour obtenir tous les Tenrac appartenant à un certain club
    public function getAllTenracByClub(int $id_club): array
    {
        return $this->pdo->getAll('Tenrac', 'id_club', $id_club);
    }
}


?>
