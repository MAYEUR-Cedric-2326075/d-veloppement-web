<?php


require_once './../Noyau/ConnexionBD.php';
class ModeleClub
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createClub(string $codePostal, string $denomination): void
    {
        $pdo = ConnectionBD::getInstance();
        $parameter = ['codePostal' => $codePostal, 'denomination' => $denomination];
        $resultToInsert = $this->pdo->insert('Club', $parameter);
    }

    public function deleteClub(string $id_club): bool
    {
        $where = "id_club = 'id_club'";
        return $this->pdo->delete('Club', $where);
    }

    public function updateClub(string $old_, string $new_Date): void
    {
        $data = ['dat' => $new_Date];
        //$where = "dat = '$old_Date'";
        //$this->pdo->update('Date',$data,$where);
    }

    public function getIdClub($id_club)
    {
        return $this->pdo->getElement("Club", "id_club", true, "id_club", $id_club);
    }

    public function getAllClub():array{return $this->pdo->getAll("Club");}
    public function getClub($id_club):array{return $this->pdo->getAll("Club","id_club", $id_club);}
    public function getCodePostal($id_club):string{return $this->pdo->getElement("Club","codePostal",
        true,"id_club", $id_club);}
    public function getDenomination($id_club):string{return $this->pdo->getElement("Club","denomination"
        ,true,"id_club", $id_club);}

    public function getAllDenomination($id_club): array{return $this->pdo->getAll("Club","denomination");}



}




try {
    // Création d'une instance du modèle
    $modeleClub = new ModeleClub();

    echo "=== TEST : Afficher tous les clubs ===\n";
    $allClubs = $modeleClub->getAllClub();
    if (!empty($allClubs)) {
        foreach ($allClubs as $club) {
            echo "ID: " . $club['id_club'] . " | Code Postal: " . $club['codePostal'] . " | Dénomination: " . $club['denomination'] . "\n";
        }
    } else {
        echo "Aucun club trouvé.\n";
    }

    echo "\n=== TEST : Créer un nouveau club ===\n";
    $modeleClub->createClub('75003', 'Club Test');
    echo "Nouveau club ajouté avec succès.\n";

    echo "\n=== TEST : Afficher tous les clubs après ajout ===\n";
    $allClubs = $modeleClub->getAllClub();
    foreach ($allClubs as $club) {
        echo "ID: " . $club['id_club'] . " | Code Postal: " . $club['codePostal'] . " | Dénomination: " . $club['denomination'] . "\n";
    }

    echo "\n=== TEST : Afficher le Code Postal et la Dénomination d'un club ===\n";
    $id_club = $allClubs[0]['id_club'];  // Sélectionner le premier club dans la liste
    $codePostal = $modeleClub->getCodePostal($id_club);
    $denomination = $modeleClub->getDenomination($id_club);
    echo "Club ID: $id_club | Code Postal: " . $codePostal['codePostal'] . " | Dénomination: " . $denomination['denomination'] . "\n";

    echo "\n=== TEST : Supprimer un club ===\n";
    $id_club_to_delete = $allClubs[count($allClubs) - 1]['id_club'];  // Sélectionner le dernier club ajouté
    if ($modeleClub->deleteClub($id_club_to_delete)) {
        echo "Club ID $id_club_to_delete supprimé avec succès.\n";
    } else {
        echo "Erreur lors de la suppression du club ID $id_club_to_delete.\n";
    }

    echo "\n=== TEST : Afficher tous les clubs après suppression ===\n";
    $allClubs = $modeleClub->getAllClub();
    foreach ($allClubs as $club) {
        echo "ID: " . $club['id_club'] . " | Code Postal: " . $club['codePostal'] . " | Dénomination: " . $club['denomination'] . "\n";
    }

} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}


?>