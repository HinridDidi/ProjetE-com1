<?php
require '../classes/panier.class.php';
 $pan =new panier();
 $pan->updateBdd();
 $pan->ResetP();
 header("Location:../views/acceuilView.php");
?>