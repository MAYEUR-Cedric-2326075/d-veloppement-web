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

            // Ajoutez des messages de débogage
            echo "Nom : $nom<br>";
            echo "Prénom : $prenom<br>";
            echo "Email : $email<br>";
            echo "Mot de passe : $motDePasse<br>";
            echo "Sexe : $sexe<br>";
            echo "ID Club : $idClub<br>";

            if ($this->validateInput($nom, $prenom, $email, $motDePasse, $sexe)) {
                $result = $this->modelTenrac->createTenrac(
                    $email,
                    $nom,
                    $prenom,
                    1,  // Valeur par défaut pour id_dignite
                    $sexe,
                    1,  // Valeur par défaut pour id_titre
                    1,  // Valeur par défaut pour id_rang
                    1,  // Valeur par défaut pour id_grade
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


    private function validateInput($nom, $prenom, $email, $motDePasse, $sexe): bool
    {

        if (empty($nom) || empty($prenom) || empty($email) || empty($motDePasse) || empty($sexe) ) {
            return false;
        }
        return true;
    }
}


$a = new InscriptionUserControler();
$b = $a->inscriptionValidation();
?>
