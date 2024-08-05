<?php
require '../classes/panier.class.php';
 $pan =new panier();
 if(!isset($_SESSION['Panier'])){
    $pan->NewPanier();
 }
 $pan->AddPhoneP($_GET['id_phone'],1);
 header("Location:../views/acceuilView.php");
?>