<?php
require '../classes/panier.class.php';
 $pan =new panier();
 $pan->MoovPhoneP($_GET['id_phone']);
 header("Location:../views/panierView.php");
?>