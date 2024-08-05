<?php
require '../classes/panier.class.php';
 $pan =new panier();
 $pan->ResetP();
 header("Location:../views/acceuilView.php");
?>