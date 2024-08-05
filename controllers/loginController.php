<?php
require 'connexion.class.php';
require '../classes/utilisateur.class.php';

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification des champs du formulaire
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $mot_de_passe = $_POST['password'];

        $user = new Utilisateur(); // Instanciation de la classe Utilisateur

        // Vérification des identifiants d'utilisateur
        if ($user->login($email, $mot_de_passe)) {
            // L'utilisateur est authentifié avec succès
            // Rediriger vers la page d'accueil ou une autre page sécurisée
            session_start();
            $_SESSION["idUser"] = $user->GetId($email); // Ajout du point-virgule ici
            header('Location: ../views/acceuilView.php');
            exit(); // Assurez-vous d'ajouter exit() après la redirection
        } else {
            // Afficher un message d'erreur si l'authentification a échoué
            echo "Identifiants incorrects. Veuillez réessayer.";
        }
    } else {
        // Afficher un message d'erreur si des champs requis sont manquants
        echo "Veuillez remplir tous les champs.";
    }
}
?>
