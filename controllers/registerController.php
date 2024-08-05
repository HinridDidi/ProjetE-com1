<?php
require '../classes/connexion.class.php';
require '../classes/Utilisateur.class.php';

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification des champs du formulaire
    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        $user = new Utilisateur(); // Instanciation de la classe Utilisateur

        // Vérifier si l'email n'est pas déjà utilisé
        if ($user->emailExists($email)) {
            echo "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            // Créer un nouvel utilisateur
            if ($user->createUser($nom, $email, $mot_de_passe)) {
                echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
                header('Location: ../views/acceuilView.php');
            } else {
                echo "Erreur lors de l'inscription. Veuillez réessayer.";
            }
        }
    } else {
        // Afficher un message d'erreur si des champs requis sont manquants
        echo "Veuillez remplir tous les champs.";
    }
}
?>
