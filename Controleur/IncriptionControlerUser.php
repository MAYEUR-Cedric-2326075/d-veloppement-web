<?php
require_once '../Modele/ModeleTenrac.php';
require_once '../Modele/ModeleClub.php';
require_once '../Vues/ViewInscriptionUser.php';

class InscriptionUserControler
{
    private $modelTenrac;
    private $modelClub;

    public function __construct()
    {
        $this->modelTenrac = new ModeleTenrac();
        $this->modelClub = new ModeleClub();
    }

    public function inscriptionValidation(): bool
    {

        $clubs = $this->modelClub->getAllClub();
        $view = new ViewInscriptionUser($clubs);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $motDePasse = $_POST['mot_de_passe'];
            $sexe = $_POST['sexe'];
            $idClub = $_POST['id_club'];

            if ($this->validateInput($nom, $prenom, $email, $motDePasse, $sexe, $idClub)) {
                $result = $this->modelTenrac->createTenrac(
                    $email,
                    $nom,
                    $prenom,
                    1,
                    $sexe,
                    1,
                    1,
                    1,
                    $idClub,
                    $motDePasse,
                    false
                );

                if ($result) {
                    $view->showSuccess();
                    return true;
                } else {
                    $view->showFailure("Erreur lors de l'inscription. Veuillez réessayer.");
                    return false;
                }
            } else {
                $view->showFailure("Données invalides. Veuillez vérifier les champs.");
                return false;
            }
        }

        $view->show();
        return false;
    }

    private function validateInput($nom, $prenom, $email, $motDePasse, $sexe, $idClub): bool
    {
        // Validation basique des champs
        if (empty($nom) || empty($prenom) || empty($email) || empty($motDePasse) || empty($sexe) || empty($idClub)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (!in_array($sexe, ['Male', 'Female'])) {
            return false;
        }

        // Vérifie que le club existe
        if (!$this->modelClub->getDenomination($idClub)) {
            return false;
        }

        // Vous pouvez ajouter plus de validations (longueur du mot de passe, etc.)
        return true;
    }
}


$a = new InscriptionUserControler();
$b = $a->inscriptionValidation();
?>
