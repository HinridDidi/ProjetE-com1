<?php
 require '../classes/telephone.class.php';
 $tel = new telephone();
 $telData = $tel->deleteOnePhone($_GET['deleteId']);
?>