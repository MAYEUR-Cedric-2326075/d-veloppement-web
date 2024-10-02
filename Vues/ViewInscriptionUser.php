<?php
include 'fonctions.php';

class ViewInscriptionUser {
    private string $email;
    private string $nom;
    private string $prenom;
    private string $sexe;
    private string $motDePasse;

    public function __construct() {
        // On initialise les propriétés avec des valeurs vides ou récupérées via POST
        $this->email = isset($_POST['email']) ? $_POST['email'] : '';
        $this->nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $this->prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $this->sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
        $this->motDePasse = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : '';  // Correction ici, 'mot_de_passe'
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getSexe(): string {
        return $this->sexe;
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
                <h1>Inscription</h1>
                <label for="email">Email : </label>
                <input id="email" type="email" name="email" value="" required="required"><br>

                <label for="nom">Nom : </label>
                <input id="nom" type="text" name="nom" value="" required="required"><br>

                <label for="prenom">Prénom : </label>
                <input id="prenom" type="text" name="prenom" value="" required="required"><br>

                <label>Sexe :</label>
                <input type="radio" name="sexe" value="Male" id="homme" required><label for="homme">Homme</label>
                <input type="radio" name="sexe" value="Female" id="femme" required><label for="femme">Femme</label><br>

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
                <h1>Inscription réussie</h1>
                <p>Bienvenue, votre compte a été créé avec succès.</p>
            </div>
        </main>
        <?php
        bas_page();
    }

    public function showFailure(string $message): void {
        ob_start();
        haut_page();
        header_page();
        ?>
        <main>
            <div class="failure-message">
                <h1>Échec de l'inscription</h1>
                <p><?php echo $message; ?></p>
            </div>
        </main>
        <?php
        bas_page();
    }
}
?>
