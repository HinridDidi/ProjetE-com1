<?php
 require '../classes/telephone.class.php';
 $tel = new telephone();
 $telData = $tel->getOnePhone($_GET['editID']);
 $tel->UpdateOnePhone($telData['id_phone'],$telData['Photo']);
?>