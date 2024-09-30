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

    public function getAllClub():array{return $this->pdo->getAll("Club");}
    //public function getClub($id_club):string{return $this->pdo->getAll("Club","id_club", $id_club);}
    public function getCodePostal($id_club):string{
        return $this->pdo->getElement("Club","codePostal","id_club", $id_club);
    }
    public function getDenomination($id_club): string
    {
        return $this->pdo->getElement("Club", "denomination", "id_club", $id_club);
    }

    public function getAllDenomination($id_club): array{return $this->pdo->getAll("Club","denomination");}



}



?>