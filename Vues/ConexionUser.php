<?php
include 'fonctions.php';

class ConexionUser {
    private string $identifiant;
    private string $motDePasse;

    public function __construct() {
        // On initialise les propriétés avec des valeurs vides ou récupérées via POST
        $this->identifiant = isset($_POST['Identifiant']) ? $_POST['Identifiant'] : '';
        $this->motDePasse = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';
    }

    public function GetEmail(): string {
        return $this->identifiant;
    }

    public function getMotDePasse(): string {
        return $this->motDePasse;
    }

    public function show(): void {
        ob_start();
        haut_page();
        header_page();
        ?>
        <main>
            <form class="corps" action="" method="post">
                <h1>Connexion</h1>
                <label for="Identifiant">Identifiant : </label>
                <input id="Identifiant" type="text" name="Identifiant" value="" required="required"><br>

                <label for="mot_de_passe">Mot de passe : </label>
                <input id="mot_de_passe" type="password" name="mot_de_passe" value="" required="required"><br>

                <input id="send" class="envoi" type="submit" value="Envoyer">
            </form>
        </main>
        <?php
        bas_page();
    }

    public function showSuccess(): void {
        ob_start();
        haut_page();
        header_page();
        ?>
        <main>
            <div class="success-message">
                <h1>Connexion réussie</h1>
                <p>Bienvenue, vous êtes maintenant connecté à l'intranet.</p>
                <a href="/intranet.html" class="button">Accéder à l'intranet</a>
            </div>
        </main>
        <?php
        bas_page();
    }
}
?>
