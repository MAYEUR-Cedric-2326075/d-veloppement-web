<?php
require_once '../Modele/ModeleTenrac.php';
require_once '../Vues/ViewIntranetUser.php';

class IntranetUserControler
{
    private $modelTenrac;

    public function __construct()
    {
        $this->modelTenrac = new ModeleTenrac();
    }

    public function afficherIntranet(string $mail_tenrac): void
    {
        // Récupère les informations de l'utilisateur
        $user = $this->modelTenrac->getTenrac($mail_tenrac);

        if (!empty($user)) {
            $view = new ViewIntranetUser($user);
            $view->show();
        } else {
            echo "Utilisateur non trouvé.";
        }
    }

    public function modifierInformations(string $mail_tenrac): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $sexe = $_POST['sexe'];
            $idClub = $_POST['id_club'];

            $data = [
                'Name' => $nom,
                'Surname' => $prenom,
                'libel_sex' => $sexe,
                'id_club' => $idClub
            ];

            $result = $this->modelTenrac->updateTenrac($mail_tenrac, $data);

            if ($result) {
                header('Location: /intranet.php?success=1');
                return true;
            } else {
                header('Location: /intranet.php?error=1');
                return false;
            }
        }

        return false;
    }
}
$Intra= new IntranetUserControler();
$Intra->afficherIntranet("testuser@example.com");
?>
