<?php
require 'connexion.class.php';
// Inclusion de la classe de gestion des commentaires
require_once '../classes/utilisateur.class.php'; // Assurez-vous de renseigner le bon chemin vers votre classe Commentaire

// Vérification des données POST (il est recommandé de valider et filtrer les données avant de les utiliser dans la requête SQL)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contenu']) && isset($_POST['utilisateur_id']) && isset($_POST['telephone_id'])) {
    // Récupération des données POST
    $contenu = $_POST['contenu'];
    $utilisateur_id = $_POST['utilisateur_id'];
    $telephone_id = $_POST['telephone_id'];

    // Création d'une instance de votre classe Commentaire
    $commentaire = new Commentaire(); // Assurez-vous d'utiliser le bon nom de classe pour gérer les commentaires

    // Appel de la fonction EnvoiCommentaire() pour insérer le commentaire dans la base de données
    $result = $commentaire->EnvoiCommentaire($contenu, $utilisateur_id, $telephone_id);

    // Vérification du résultat de l'insertion
    if ($result === true) {
        // Succès de l'insertion du commentaire
        echo "Le commentaire a été inséré avec succès.";
        // Redirection vers une autre page, si nécessaire
        // header('Location: page_de_redirection.php');
        // exit();
    } else {
        // Affichage du message d'erreur en cas d'échec de l'insertion
        echo "Erreur lors de l'insertion du commentaire : " . $result;
    }
} else {
    // Si les données POST ne sont pas correctement définies
    echo "Erreur : Veuillez fournir les informations nécessaires pour ajouter un commentaire.";
}
?>
