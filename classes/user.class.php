<?php
require 'connexion.class.php';
<?php

class User {
    private $dbConn;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'commerce'; 
        $username = 'nom'; 
        $password = 'mot_de_passe'; 

        try {
            $this->dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
        }
    }

    public function register($prenom, $nom, $email, $mot_de_passe, $tel) {
        $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        
        $query = $this->dbConn->prepare("INSERT INTO Utilisateur (prenom, nom, email, mot_de_passe, tel) VALUES (:prenom, :nom, :email, :mot_de_passe, :tel)");
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':email', $email);
        $query->bindParam(':mot_de_passe', $hashedPassword);
        $query->bindParam(':tel', $tel);
        
        return $query->execute();
    }
    

    public function login($email, $mot_de_passe) {
        $query = $this->dbConn->prepare("SELECT * FROM Utilisateur WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            // L'utilisateur est connecté
            return $user;
        } else {
            // Identifiants incorrects
            return false;
        }
    }
}

// Exemple d'utilisation :
$user = new User();

// Enregistrement d'un nouvel utilisateur
$user->register('John Doe', 'john@example.com', 'motdepasse123');

// Tentative de connexion
$result = $user->login('john@example.com', 'motdepasse123');

if ($result) {
    echo "Connexion réussie pour l'utilisateur : " . $result['nom'];
} else {
    echo "Échec de la connexion. Veuillez vérifier vos identifiants.";
}
