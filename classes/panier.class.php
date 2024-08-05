<?php
require 'connexion.class.php';
session_start();
class panier{
    private $conn;
    public function NewPanier(){
        $_SESSION["Panier"]=array();
        $_SESSION["Panier"]["Nom"]=array();
        $_SESSION["Panier"]["idPhone"]=array();
        $_SESSION["Panier"]["Quantite"]=array();
        $_SESSION["Panier"]["Prix"]=array();
    }
    public function findPhone($id){
        $this->conn= new connect();
        $req="SELECT * FROM telephones WHERE id_phone = $id";
        $res= $this->conn->con->query($req);
        $row = $res->fetch_assoc();
        return $row;
    }
    public function AddPhoneP($id_phone,$q){
        $this->conn= new connect();
        $req="SELECT * FROM telephones WHERE id_phone = $id_phone";
        $res= $this->conn->con->query($req);
        $row = $res->fetch_assoc();
        $index_Phone =  array_search($id_phone,  $_SESSION["Panier"]["idPhone"]);
        
        if($index_Phone!==false){
            if($q+ $_SESSION["Panier"]["Quantite"][$index_Phone]>$row["Stock"]){
               
                $_SESSION["Panier"]["Quantite"]=$row["Stock"];
            }
            else{
                
                $_SESSION["Panier"]["Quantite"][$index_Phone]+=$q;        
            }
        }
        else{
          
            $_SESSION["Panier"]["Nom"][]=$row["Nom"];
            $_SESSION["Panier"]["idPhone"][]=$id_phone;
            if($q>$row["Stock"]){
                $_SESSION["Panier"]["Quantite"][]=$row["Stock"];
            }
            else{
                $_SESSION["Panier"]["Quantite"][]=$q;  
                          
            }
           
            $_SESSION["Panier"]["Prix"][]=$row["Prix"];
        }
            
        
    }
    public function MoovPhoneP($id_phone){
        $index_Phone =  array_search($id_phone, $_SESSION["Panier"]["idPhone"]);
            array_splice($_SESSION["Panier"]["Nom"],$index_Phone,1);
            array_splice($_SESSION["Panier"]["idPhone"],$index_Phone,1);
            array_splice($_SESSION["Panier"]["Quantite"],$index_Phone,1);
            array_splice($_SESSION["Panier"]["Prix"],$index_Phone,1);
        
    }
    public function ResetP(){
        unset($_SESSION["Panier"]);
    }
    public function Pay(){
        $som=0;
        for($i=0;$i<count($_SESSION["Panier"]["idPhone"]);$i++){
            $som += $_SESSION["Panier"]["Quantite"][$i]*$_SESSION["Panier"]["Prix"][$i];
        }
        return $som;
    }
    public function updateBdd(){
        $this->conn= new connect();
        for($i=0;$i<count($_SESSION["Panier"]["idPhone"]);$i++){
            $id_phone = $_SESSION["Panier"]["idPhone"][$i];
            $req="SELECT * FROM telephones WHERE id_phone = $id_phone";
            $res= $this->conn->con->query($req);
            $row = $res->fetch_assoc();
            $q = $_SESSION["Panier"]["Quantite"][$i];
            $stock = $row["Stock"];
            $stock -=$q;
            $req = "UPDATE telephones SET Stock=$stock WHERE id_phone= $id_phone"; 
            $res= $this->conn->con->query($req);
        }

    }
}


?>