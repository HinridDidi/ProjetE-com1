<?php
require 'connexion.class.php';
class telephone{
    private $conn;
    public function getAllPhones(){
        $this->conn= new connect();
        $req="SELECT * FROM telephones";
        $res= $this->conn->con->query($req);
      if($res->num_rows > 0){
          $allhpones = array();
          while($row = $res->fetch_assoc()){
              $allhpones[] = $row;
          }
          return $allhpones;
      }
      else{
          echo 'Aucun Telephone Enregistré Veuillez ajouter des Telephones';
      }
    }
    public function getOnePhone($id){
        $this->conn= new connect();
        $req="SELECT * FROM telephones WHERE id_phone = $id";
        $res= $this->conn->con->query($req);
          if($res->num_rows > 0){            
             $row = $res->fetch_assoc();
              return $row;
          }
          else{
              echo 'ID invalid veuillez Ressayer';
          }
      }
      public function UpdateOnePhone($f,$g)
    {
        $this->conn= new connect();
  
        $Nom = $_POST["Nom"];
        echo $Nom;
        $desc = $_POST["Description"];
        echo $desc;
        $couleur = $_POST["Couleur"];
        echo $couleur;
        $Storage =  $_POST["Storage"];
        echo $Storage;
        $prix = $_POST["Prix"];
        echo $prix;
        $stock = $_POST["Stock"];
        echo $stock;
        $var_id = $f;
        $new_query="";  
        $choix=1;
        $tmp="";
  
          if(!empty($_FILES['photo']['name']))
            {   
                $nom_photo = $_FILES['photo']['name']; 
                $photo_bdd = "../photos/".$nom_photo;
                $photo_dossier="C:/xampp/htdocs/dashboard/E-com/ProjetE-com/photos/".$nom_photo;
                $tmp ="C:/xampp/htdocs/dashboard/E-com/ProjetE-com/photos/".$g; 
                copy($_FILES['photo']['tmp_name'],$photo_dossier);
              
                if(!empty($var_id)){
                    
                      $new_query = "UPDATE telephones SET 
                      Nom = '$Nom',
                      Description = '$desc', 
                      Couleur ='$couleur',
                      Storage = '$Storage',
                        Prix = $prix, 
                       Stock = $stock,
                        Photo = '$photo_bdd' 
                        WHERE id_phone = $var_id";     
                        $choix =2;
                    }                  
            }
            else
            {
                if(!empty($var_id)){
                      
                    $new_query = "UPDATE telephones SET 
                      Nom = '$Nom',
                      Description = '$desc', 
                      Couleur ='$couleur',
                      Storage = '$Storage',
                        Prix = $prix, 
                       Stock = $stock 
                        WHERE id_phone = $var_id";
                }
            }
            $new_query = "UPDATE telephones SET 
                      Nom = '$Nom',
                      Description = '$desc', 
                      Couleur ='$couleur',
                      Storage = '$Storage',
                        Prix = $prix, 
                       Stock = $stock 
                        WHERE id_phone = $var_id";
            $result = $this->conn->con->query($new_query);
            if($result){       
                       
                header("Location:../views/admin.php");
            }else{
                echo 'Une erreur est survenue lors de la maj!';
            }
  
          
    }
    public function deleteOnePhone($id){
        $this->conn= new connect();
        $new_query = "DELETE FROM telephones WHERE id_phone = $id";
        $result = $this->conn->con->query($new_query);
        if($result){
            header("Location:../views/admin.php");
        }
        else{
            echo 'Une erreur est survenue lors de la Suppression!';
        }
      }
    public function Addphone(){
        $this->conn= new connect();
         $Nom = $_POST["Nom"];
         $desc = $_POST["Description"];
         $couleur = $_POST["Couleur"];
         $Storage =  $_POST["Storage"];
         $prix = $_POST["Prix"];
         $stock = $_POST["Stock"];
        $photo_bdd = ""; 
        if(!empty($_FILES['photo']['name']))
        {   
            $nom_photo = $_FILES['photo']['name'];
            
            $photo_bdd = "../photos/".$nom_photo;
            $photo_dossier="C:/xampp/htdocs/ProjetE-com/photos/".$nom_photo;
            copy($_FILES['photo']['tmp_name'],$photo_dossier);
           $req="INSERT INTO telephones(Nom,Description,Couleur,Storage,Photo,Prix,Stock) VALUES ('$Nom','$desc','$couleur','$Storage','$photo_bdd',$prix,$stock)";
          $res= $this->conn->con->query($req);
          if($res){
            echo'Les données ont bien été ajoutées à la base de données';
            header("Location:../views/admin.php");
          }
          else{
            echo'Une erreur est survenue lors de l\'ajout';
          }
            
        }  

    }
}


?>