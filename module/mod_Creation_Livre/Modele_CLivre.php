<?php
require_once('Connexion.php');
class Modele_CLivre extends Connexion {
    public function __construct(){

    }
    public function create_book(){
    
       $arr = array($_POST["identifiant"] , password_hash($_POST["pwd"] , PASSWORD_DEFAULT) , $_POST["mail"]);
        $prepare = parent::$bdd->prepare("INSERT into Utilisateur ( userName, passWord, email) VALUES(?,?,?)");
        $exec = $prepare->execute($arr);
       
        if ($exec){
            return true ;
        }else {
            return false ;
        }
    }
   
    
    
}

?>
