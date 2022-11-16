<?php
require_once('Connexion.php');
class Modele_Livre extends Connexion
{
    public function __construct()
    {
    }
    public function getLivre($idLivre)
    {
        $sql = "SELECT * FROM Livre where id='$idLivre'";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getChapitre($chapitre,$livre){
        
        $sql = "SELECT titre,id FROM Chapitre where numeroChap=$chapitre and id_livre=$livre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;

    }
    public function getAllChap($livre){
        $sql = "SELECT * FROM Chapitre where id_livre=$livre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getPages($chapitre){
        $sql="SELECT TexteDeLaPage, numeroPage FROM Page where Page.id_chapitre=$chapitre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetchAll();
        return $result;
    }
    public function getNbrChapLivre($idLivre){
        $sql="SELECT NbrDeChapitre FROM Livre where id=$idLivre";
        $prepare = parent::$bdd->prepare($sql);
        $exec = $prepare->execute();
        $result = $prepare->fetch();
        return $result;
    }

    public function enregistreLivreLu($idLivreLu){
        $sql = "INSERT INTO historique_livre_lu (id_utilisateur,id_livre_lu) VALUES (?,?)";
        $prepare = parent::$bdd->prepare($sql);
        $tab = array($_SESSION["id"],$idLivreLu);
        $exec = $prepare->execute($tab);
    }
    
}

