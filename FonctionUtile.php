<?php
require_once('Connexion.php');

class FonctionUtile extends Connexion {
    public function __construct(){

    }
    public static function getLastBook(){
        $prepare = parent::$bdd->prepare("SELECT * FROM Livre where id = (SELECT MAX(id) FROM Livre)");
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        echo $result["id"];
        return $result;

    }
    
   
    
    
}

?>
