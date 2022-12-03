<?php

class Modele_connexion extends Connexion {
    public function __construct(){

    }
    public function login(){
        $prepare = parent::$bdd->prepare("SELECT passWord , id, email FROM Utilisateur where userName = ?");
        $tab = array($_POST["identifiant"]);
        $exec = $prepare->execute($tab);
        $result = $prepare->fetch();
        $psw = $result[0] ; 
        if (password_verify($_POST["pwd"] , $psw)){

            $_SESSION["jeton"] = bin2hex(openssl_random_pseudo_bytes(32, $cstrong));
            $_SESSION["expiration_jeton"] = time()+600; //10 minutes
            $_SESSION["connected"] = true ;
            $_SESSION["identifiant"] = htmlspecialchars($_POST["identifiant"]);
            $_SESSION["id"] = $result[1];
            $_SESSION["email"] = $result[2];
            return true ;
        }else {
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
        unset($_SESSION["connected"], $_SESSION["identifiant"], $_SESSION["id"], $_SESSION["email"], $_SESSION["jeton"]);
    }
    
}

?>
