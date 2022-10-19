<?php

class Modele_connexion extends Connexion {
    public function __construct(){

    }
    public function login(){
        $prepare = parent::$bdd->prepare("SELECT passWord FROM Utilisateur where login = ?");

        $tab = array($_POST["identifiant"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        $psw = $result[0] ; 
        if (password_verify($_POST["pwd"] , $psw)){
            echo "ok";
            $_SESSION["connected"] = true ; 
            $_SESSION["identifiant"] = $_POST["identifiant"];
            return true ;
        }else {
            echo "pas ok";
            return false ;
        }

        return $result;
    }
    public function signup(){
       $arr = array($_POST["identifiant"] , password_hash($_POST["pwd"] , PASSWORD_DEFAULT) , $_POST["mail"]);
        $prepare = parent::$bdd->prepare("INSERT into Utilisateur ( userName, passWord, email) VALUES(?,?,?)");
        $exec = $prepare->execute($arr);
       
        if ($exec){
            return true ;
        }else {
            return false ;
        }
    }
    public function deco(){
        unset($_SESSION["connected"]);
        unset($_SESSION["identifiant"]);
    }
    
}

?>
