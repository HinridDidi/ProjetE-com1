<?php


class Utilisateur {
    private $con;

    public function __construct() {
        $this->con= new connect();
    }
    // Exemple hypothétique de la méthode GetId() dans la classe Utilisateur
    public function GetId($email) {
        $sql = "SELECT id FROM utilisateur WHERE email = ?";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('s', $email);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['id']; // Retourne l'ID de l'utilisateur
            } else {
                return null; // Aucune correspondance trouvée pour cet email
            }
        } else {
            return null; // Erreur lors de l'exécution de la requête SQL
        }
    }
    

    

    public function login($email, $mot_de_passe) {
        $sql = "SELECT * FROM utilisateur WHERE email=? AND mot_de_passe=?";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('ss', $email, $mot_de_passe);
        $stmt->execute();
        $res = $stmt->get_result();
        
        return $res->num_rows > 0;
    }
    public function emailExists($email) {
        $sql = "SELECT COUNT(*) as count FROM utilisateur WHERE email=?";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['count'] > 0;
    }

    public function createUser($nom, $email, $mot_de_passe) {
        $sql = "INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES (?, ?, ?)";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('sss', $nom, $email, $mot_de_passe);
        
        if ($stmt->execute()) {
            return true; // Succès de l'insertion
        } else {
            return "Erreur lors de l'inscription : " . $stmt->error; // Message d'erreur spécifique
        }
    }
    

    public function ajouterCommentaire($contenu, $utilisateur_id, $telephone_id) {
        $sql = "INSERT INTO commentaire (contenu, utilisateur_id, telephone_id, date) VALUES (?, ?, ?, NOW())";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('sii', $contenu, $utilisateur_id, $telephone_id);
        
        return $stmt->execute();
    }

    public function commanderProduit($utilisateur_id, $telephone_id) {
        // Logique pour traiter la commande du produit
        // Par exemple, mettre à jour le stock dans la table telephones, créer une commande dans une table "commandes", etc.
        // À adapter en fonction de votre logique métier spécifique
    }

    public function effectuerPaiement($montant, $utilisateur_id) {
        // Logique pour effectuer le paiement
        // Par exemple, enregistrer le paiement dans une table "paiements", mettre à jour le solde de l'utilisateur, etc.
        // À adapter en fonction de votre logique métier spécifique
    }
    public function EnvoiCommentaire($contenu, $utilisateur_id, $telephone_id){
        $date_now = date("Y-m-d"); // Obtenir la date actuelle au format YYYY-MM-DD
    
        $sql = "INSERT INTO commentaire (contenu, utilisateur_id, telephone_id, date) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('ssss', $contenu, $utilisateur_id, $telephone_id, $date_now);
        
        if ($stmt->execute()) {
            return true; // Succès de l'insertion
        } else {
            return "Erreur : " . $stmt->error; // Message d'erreur spécifique
        }
    }
    public function VerifComment($utilisateur_id, $telephone_id){
        $sql = "SELECT * FROM commentaire WHERE utilisateur_id = ? AND telephone_id = ?";
        $stmt = $this->con->con->prepare($sql);
        $stmt->bind_param('ss', $utilisateur_id, $telephone_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // L'utilisateur a déjà envoyé un commentaire pour ce produit
            return true;
        } else {
            // L'utilisateur n'a pas encore envoyé de commentaire pour ce produit
            return false;
        }
    }
    
    
}
?>

