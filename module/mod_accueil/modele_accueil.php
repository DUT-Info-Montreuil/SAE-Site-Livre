<?php
require_once('Connexion.php');
class Modele_Accueil extends Connexion{
    public function __construct()
    {
    
    }
    public function getTopLikedBook()
    {

        $sql = "SELECT Livre.id,Livre.resumeLivre,Livre.titre FROM `Livre` ORDER BY nbrLike DESC LIMIT 3;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getTopViewedBook()
    {

        $sql = "SELECT Livre.id,Livre.resumeLivre,Livre.titre FROM `Livre` ORDER BY nbrVue DESC LIMIT 3;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getRandomBook()
    {

        $sql = "SELECT Livre.id,Livre.resumeLivre,Livre.titre FROM `Livre` ORDER BY RAND() DESC LIMIT 3;;";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
}


?>