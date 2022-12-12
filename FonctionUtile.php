<?php
require_once('Connexion.php');

class FonctionUtile extends Connexion {
    public function __construct(){

    }
    public static function getLastBook(){
        $prepare = parent::$bdd->prepare("SELECT * FROM Livre where id = (SELECT MAX(id) FROM Livre)");
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;

    }

    public static function generateToken(){
        $token = bin2hex(random_bytes(32));
        
       
        $arr = array($token , time()+600 , $_SESSION['id']);
        $prepare = parent::$bdd->prepare("INSERT INTO TokenCSRF (token, expirationDate , idUser) VALUES (?,?, ?)");
        $exec = $prepare->execute($arr);
        $_SESSION['token'] = $token;
    }
    
   public static function verifToken($strangeToken){
        $prepare = parent::$bdd->prepare("SELECT * FROM TokenCSRF where token = ? AND expirationDate > ? AND idUser = ? AND Usable = 1");
        $arr = array($strangeToken, time() , $_SESSION['id']);
        $exec = $prepare->execute($arr);
        $result = $prepare->fetch();
        if ($result != false){
            $prepare = parent::$bdd->prepare("UPDATE TokenCSRF SET Usable = 0 where token = ? AND idUser = ? AND Usable = 1");
            $arr = array($_SESSION['token'] , $_SESSION['id']);
            $exec = $prepare->execute($arr);
            return true;
        }else{
            return false;
        }
    }
    
    public static function deleteToken(){
        $prepare = parent::$bdd->prepare("DELETE FROM TokenCSRF where token = ? AND idUser = ?");
        $arr = array($_SESSION['token'] , time() , $_SESSION['id']);
        $exec = $prepare->execute($arr);
    }
    
    
    
    
}

?>
