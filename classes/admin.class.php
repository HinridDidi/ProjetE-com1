<?php
require 'connexion.class.php';
class admin{
    private $con;
    public function AddAdmin(){
       if(!VerifierAdmin())
        {
            $this->con = new connect();
            $user = $_POST['UserName'];
            $nom = $_POST['Nom'];
            $mdp = $_POST['Mdp'];
            
            $sql = "INSERT INTO admin(Nom,Mdp,Statut,UserName) VALUES('$nom','$mdp','ACTIF','$user')";
            
            $res= $this->con->con->query(sql);
                if($res){
                    echo 'Le Nouvel Admin a bien Eté Ajouté';
                }
                else{
                    echo 'Error System';
                }
        }
       else
       {
        echo 'Nom d\'utilisateur deja pris';
       }
    }

    public function VerifierAdmin(){
        $this->con = new connect();
        $USER = $_POST['UserName'];
        $mdp = $_POST['Mdp'];
        $sql= "SELECT * FROM admin WHERE UserName='$USER'";
        $res= $this->con->con->query($sql);
        return $res->num_rows > 0;
    }
    public function LoginAdmin(){
        $this->con = new connect();
        $USER = $_POST['UserName'];
        $mdp = $_POST['Mdp'];
        $sql= "SELECT * FROM admin WHERE UserName='$USER'";
        $res= $this->con->con->query($sql);
         if($res->num_rows > 0){
            $row=  $res->fetch_assoc();
            if($row['Mdp']==$mdp){
                header('location:../Views/admin.php');
            }
            else{
                echo 'Le mot de passe n\'est pas correct';
            }
        }
        else{
            echo 'UserName Non Valide';
        }
    }
    
}



?>