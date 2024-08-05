<?php
 class connect{
    private $servername ='localhost';
private $username = 'root';
private $password='';
private $db='commerce';
public $con;
public function __construct(){
$this->con=new mysqli($this->servername,$this->username,$this->password,$this->db);
if($this->con->connect_error){
    die('problème de connexion avec la base de données ' .$conn->connect_error);
    }
   else{
       return $this->con;
   }
}

}

?>